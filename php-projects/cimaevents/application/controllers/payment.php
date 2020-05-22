<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Payment extends Controller {
        
        public function index(){
            
            $this->setWillRenderLayoutView(FALSE);
            $this->setwillRenderActionView(FALSE);
            
            $session = Registry::get("session");
            $basket = $session->get("basket"); 
            $total = $session->get("total");
            
            if($total < 49.99){
                $total = $total + 6.99;
            }
            
            // set post fields
            $post = [
                'USER' => 'paypal_api1.cimaeventsupplies.com',
                'PWD' => 'PJXCRDD3LFWDT2PQ',
                'SIGNATURE'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbhmAkRzzEknX1zcu1AVPmBkV6OA',
                'VERSION' => '109.0',
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
                'PAYMENTREQUEST_0_AMT' => $total,
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'GBP',
                'RETURNURL' => 'https://www.cimaeventsupplies.com/payment/expressCheckoutSuccessfull',
                'CANCELURL' => 'https://www.cimaeventsupplies.com/payment/expressCheckoutCancel',
                'METHOD' => 'SetExpressCheckout'
            ];

            $ch = curl_init('https://api-3t.paypal.com/nvp');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS , http_build_query($post));

            // execute!
            $response = curl_exec($ch);
            
            // close the connection, release resources used
            curl_close($ch);

            // do anything you want with your response
            if(stripos($response, "ACK=Success")){
                //echo 1;
                self::redirect("https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&".$response);
            }else{
                self::redirect(DIR_PATH);
                exit();
            }
           
        }
        
        public function expressCheckoutSuccessfull(){
            
            $session = Registry::get("session");
            $basket = $session->get("basket");
            $total = $session->get("total");
            
            if(isset($basket) and !empty($basket)){
                $view = $this->getActionView();
                $view->set("baskets", $basket);
                $view->set("total", $total);
            }
            
            $token = $_GET['token'];
            
            
            // set post fields
            $post = [
                'USER' => 'paypal_api1.cimaeventsupplies.com',
                'PWD' => 'PJXCRDD3LFWDT2PQ',
                'SIGNATURE'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbhmAkRzzEknX1zcu1AVPmBkV6OA',
                'VERSION' => '109.0',
                'TOKEN' => $token,
                'METHOD' => 'GetExpressCheckoutDetails'
            ];

            $ch = curl_init('https://api-3t.paypal.com/nvp');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS , http_build_query($post));

            // execute!
            $response = curl_exec($ch);
            
            // close the connection, release resources used
            curl_close($ch);
            
            // do anything you want with your response
            if(stripos($response, "ACK=Failure")){
                self::redirect(DIR_PATH);
                exit();
            }
            
            $response = str_replace('%2d', '-', $response);
            $response = str_replace('%20', ' ', $response);
            $response = str_replace('%2e', '.', $response);
            $response = str_replace('%40', '@', $response);
            $response = explode('&', $response);
            
            $responses = array();
            
            foreach($response as $datas){
                
                $data = explode('=', $datas);
                $responses[$data[0]] = $data[1];
                
            }
            
            $view = $this->getActionView();
            $view->set("errors", array())
                ->set("responses", $responses);
        //var_dump($responses);
        //exit;
            
        }
        
        public function expressCheckoutCancel(){
            self::redirect(DIR_PATH);
            exit();
        }
        
        public function doCheckout(){
            
            $payerId = $_POST['PAYERID'];
            $token = $_POST['TOKEN'];
            
            if(empty($payerId || $token)){
                self::redirect(DIR_PATH);
                exit();
            }
            
            $post = [
                'USER' => 'paypal_api1.cimaeventsupplies.com',
                'PWD' => 'PJXCRDD3LFWDT2PQ',
                'SIGNATURE'   => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AbhmAkRzzEknX1zcu1AVPmBkV6OA',
                'VERSION' => '109.0',
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
                'PAYMENTREQUEST_0_AMT' => '0.02',
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'GBP',
                'PAYERID' => $payerId,
                'TOKEN' => $token,
                'METHOD' => 'DoExpressCheckoutPayment'
            ];

            $ch = curl_init('https://api-3t.paypal.com/nvp');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS , http_build_query($post));

            // execute!
            $response = curl_exec($ch);
            
            // close the connection, release resources used
            curl_close($ch);

            // do anything you want with your response
            if(stripos($response, "ACK=Success")){
            
                $session = Registry::get("session");
                $basket = $session->get("basket"); 
                $total = $session->get("total");
                
                //var_dump($basket->id);
                //exit();

                if($total < 49.99){
                    $total = $total + 6.99;
                }
                
                $income = new Income(array(
                    "payerId" => RequestMethods::post("PAYERID"),
                    "name" => RequestMethods::post("NAME"),
                    "email" => RequestMethods::post("EMAIL"),
                    "country" => RequestMethods::post("COUNTRY"),
                    "amount" => $total,
                    "type" => "PAYPAL"
                ));
                
                if ($income->validate()){
                    $income->save();
                }

                foreach($basket as $product){


                    $id = (int)$product['id'];
                    $qty = (int)$product['qty'];

                    $product = Product::first(array(
                        "id = ?" => $id
                    ));

                    if ($product)
                    {
                        $product->qty -= $qty;
                        $product->save();
                    }

                }
                
                foreach($basket as $product){
                    
                    $sale = new Sale(array(
                        "product" => $product['name'],
                        "qty" => $product['qty'],
                        "amount" => $product['price'],
                        "status" => "Completed"
                    ));
                    
                    if($sale->validate()){
                       $sale->save();
                    }
                    
                }

                if(isset($basket)){
                    $session->erase("basket");
                    $session->erase("total");
                    
                    echo""
                    . "<script type='text/javascript'>
                      //jsFunction();
                      location.reload();
                    </script> ";
                }
                
            }else{
                self::redirect(DIR_PATH);
                exit();
            }
        }
        
        public function login(){
            $this->setWillRenderLayoutView(FALSE);
            $this->setwillRenderActionView(FALSE);
            
            if (RequestMethods::post("login")){
                $email = RequestMethods::post("email");
                $password = RequestMethods::post("password");
                
                $view = $this->getActionView();
                $error = false;
                
                if (empty($email)){
                    $view->set("email_error", "Email not provided");
                    $error = true;
                }
                
                if (empty($password)){
                    $view->set("password_error", "Password not provided");
                    $error = true;
                }
                
                if (!$error){
                    $user = User::first(array(
                        "email=?" => $email,
                        "password = ?" => $this->_hashCreate("sha256", $password, HASH_PWD_KEY),
                        "live=?" => true,
                        "deleted=?" => false
                    ));
                    
                    if (!empty($user)){
                        $this->user = $user;
                        self::redirect(DIR_PATH."/admin");
                    }
                    else
                    {
                        $view->set("login_error", "Email address and/or password are incorrect");
                    }
                }
            }
        }
        
        public function register(){
            $this->setWillRenderLayoutView(FALSE);
            $this->setwillRenderActionView(FALSE);

            $view = $this->getActionView();
            $view->set("errors", array());
            
            if(RequestMethods::post("register")){
                $user = new User(array(
                    "first" => RequestMethods::post("first"),
                    "last" => RequestMethods::post("last"),
                    "email" => RequestMethods::post("email"),
                    "password" => $this->_hashCreate("sha256", RequestMethods::post("password"), HASH_PWD_KEY)
                ));

                if ($user->validate()){
                    $user->save();
                    $view->set("success", true);
                }else{
                    $view->set("errors", $user->getErrors());
                }
            }
        }
        
        public function logout(){
            $this->setUser(false);
            self::redirect(DIR_PATH);
        }
    
	protected function _hashCreate($algo, $data, $salt){
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		
		return hash_final($context);
	}

        /**
         * @protected
         */
        public function _secure(){
            $this->setWillRenderLayoutView(FALSE);
            $this->setwillRenderActionView(FALSE);

            $user = $this->getUser();

            if(!$user){

                echo json_encode(0);
                exit();

            }

        }
        
    }
