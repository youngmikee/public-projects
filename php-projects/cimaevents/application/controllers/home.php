<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Home extends Controller {

        public function index(){
            
            $session = Registry::get('session');
            $session->set("customer", RequestMethods::server("REMOTE_ADDR"));
            
            $this->getLayoutView()
                    ->set("controller", lcfirst(get_class($this)))
                    ->set("date", date("Y"));
    
            $populars = Product::all(array(
                "visibility = ?" => "popular",
                "live = ?" => true,
                "deleted = ?" => false
            ));

            $this->getActionView()->set("populars", $populars)
                    ->set("controller", get_class($this) );
    
        }
     
        public function emptyBasket(){
            $this->setWillRenderLayoutView(FALSE);
            $this->setWillRenderActionView(FALSE);
            
            $session = Registry::get('session');
            $basket = $session->get("basket");
            if(isset($basket)){
                $session->erase("basket");
                $session->erase("total");
                
                echo json_encode(1);
                exit();
            }
        }
        
        public function basketDelete(){
            $this->setWillRenderLayoutView(FALSE);
            $this->setwillRenderActionView(FALSE);
            
            $session = Registry::get("session");
            $basket = $session->get("basket");
            
            $id = $_GET['product'];
            
            if(isset($basket)){

                for($a = 0; $a <= count($basket); $a++){

                    if($basket[$a]['id'] == $id){
                        unset($basket[$a]);
                        $basket = array_values($basket);
                        $session->erase("basket");
                        $session->set("basket", $basket);
                        
                        if(empty($basket)){
                            echo json_encode(0);
                        }else{
                            
                            $total = array();
                            //$quantity = array();
                            //$totals = array();
                            
                            foreach($basket as $item){
                                $price = $item['price'];
                                $qty = $item['qty'];
                                $total[] = $price * $qty;
                                //$quantity[] = $qty;
                            }
                            
                            //$qty = array_sum($quantity);
                            //$price = array_sum($total);
                            $sum = array_sum($total);
                            
                            $session->erase("total");
                            $session->set("total", $sum);
                            
                            echo json_encode($sum);
                            exit();
                        }
                    }
                }
                
            }
        }
        
    }