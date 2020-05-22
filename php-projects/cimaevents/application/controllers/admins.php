<?php

use Shared\Controller as Controller;
use Framework\RequestMethods as RequestMethods;
use Framework\Registry as Registry;

    class Admins extends Controller {
        
        /**
         * @before _secure
         */
        public function index(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $sales = Sale::all(array(
                "deleted = ?" => false
            ));
            
            $payments = Income::all(array(
                "deleted = ?" => false
            ));
            
            $totalPayment;
            $countPayment;
            
            foreach($payments as $payment){
                $totalPayment += $payment->amount;
                $countPayment++;
            }
            
            $averagePayment = round($totalPayment / $countPayment, 2);
            
            $view = $this->getActionView();
            $view->set("payments", $payments)
                ->set("sales", $sales)
                ->set("totalPayment", $totalPayment)
                ->set("averagePayment", $averagePayment);
           
        }
        
        /**
         * @before _secure
         */
        public function catalog(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $view = $this->getActionView();
            $view->set("errors", array());
            
            if (RequestMethods::post("createCatalog"))
            {
                
                if (!$error){
                    $catalog = new Catalog(array(
                        'name' => $name,
                        'type' => $type,
                        'price' => $price,
                        'qty' => $qty,
                        'visibility' => $visibility,
                        'status' => $status
                    ));
                    if($catalog->validate()){
                        $catalog->save();
                        $view->set("success", true);
                    }else{
                        $view->set("errors", $catalog->getErrors());
                    }
                }
            }
            
        }
        
        /**
         * @before _secure
         */
        public function product(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $products = Product::all(array(
                "deleted = ?" => false
            ));
            
            $deletedProducts = Product::all(array(
                "deleted = ?" => true
            ));
            
            $view = $this->getActionView();
            $view->set("errors", array())
                ->set("products", $products)
                ->set("deletedProducts", $deletedProducts);
            
        }
        
        /**
         * @before _secure
         */
        public function createProduct(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $view = $this->getActionView();
            $view->set("errors", array());
            
            if(RequestMethods::post("create")){
                
                $image = pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
                
                $product = new Product(array(
                    "name" => RequestMethods::post("name"),
                    "catalog" => RequestMethods::post("catalog"),
                    "description" => RequestMethods::post("description"),
                    "price" => RequestMethods::post("price"),
                    "qty" => RequestMethods::post("qty"),
                    "type" => RequestMethods::post("type"),
                    "visibility" => RequestMethods::post("visibility"),
                    "image" => $image
                ));

                if ($product->validate()){
                    $this->_upload("image", "product");
                    $product->save();
                    $view->set("success", true);
                }else{
                    $view->set("errors", $product->getErrors());
                }
                
            }
            
        }        
        
        /**
         * @before _secure
         */
        public function deleteProduct($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/product");

            $product = Product::first(array(
                "id = ?" => $id
            ));

            if ($product)
            {
                $product->deleted = true;
                $product->save();
            }
            
            self::redirect(DIR_PATH."/admins/product");
        }        
        
        /**
         * @before _secure
         */
        public function undeleteProduct($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/product");

            $product = Product::first(array(
                "id = ?" => $id
            ));

            if ($product)
            {
                $product->deleted = false;
                $product->save();
            }
            
            self::redirect(DIR_PATH."/admins/product");
        }        
        
        /**
         * @before _secure
         */
        public function editProduct(){
            
            if (RequestMethods::post("editProduct")){
                $product = Product::first(array(
                    "id = ?" => RequestMethods::post("id")
                ));

                if ($product)
                {
                    $product->name = RequestMethods::post("name");
                    $product->catalog = RequestMethods::post("catalog");
                    $product->qty = RequestMethods::post("qty");
                    $product->type = RequestMethods::post("type");
                    $product->visibility = RequestMethods::post("visibility");
                    $product->price = RequestMethods::post("price");
                    $product->save();
                }
            }
            
            self::redirect(DIR_PATH."/admins/product");
        }
        
        /**
         * @before _secure
         */
        public function service(){
            
            $this->setWillRenderLayoutView(FALSE);
   
            $services = Service::all(array(
               "deleted = ?" => false 
            ));
            
            $deletedServices = Service::all(array(
                "deleted = ?" => true
            ));
            
            $view = $this->getActionView();
            $view->set("services", $services)
                ->set("deletedServices", $deletedServices);
                 
        }
        
        /**
         * @before _secure
         */
        public function createService(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $view = $this->getActionView();
            $view->set("errors", array());
            
            if(RequestMethods::post("create")){
                
                $image = pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
                
                $service = new Service(array(
                    "name" => RequestMethods::post("name"),
                    "description" => RequestMethods::post("description"),
                    "price" => RequestMethods::post("price"),
                    "type" => RequestMethods::post("type"),
                    "visibility" => RequestMethods::post("visibility"),
                    "image" => $image
                ));

                if ($service->validate()){
                    $this->_upload("image", "service");
                    $service->save();
                    $view->set("success", true);
                }else{
                    $view->set("errors", $service->getErrors());
                }
                
            }
            
        }        
        
        /**
         * @before _secure
         */
        public function deleteService($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/service");

            $service = Service::first(array(
                "id = ?" => $id
            ));

            if ($service)
            {
                $service->deleted = true;
                $service->save();
            }
            
            self::redirect(DIR_PATH."/admins/service");
        }        
        
        /**
         * @before _secure
         */
        public function undeleteService($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/service");

            $service = Service::first(array(
                "id = ?" => $id
            ));

            if ($service)
            {
                $service->deleted = false;
                $service->save();
            }
            
            self::redirect(DIR_PATH."/admins/service");
        }        
        
        /**
         * @before _secure
         */
        public function editService(){
            
            if (RequestMethods::post("editService")){
                $service = Service::first(array(
                    "id = ?" => RequestMethods::post("id")
                ));

                if ($service)
                {
                    $service->name = RequestMethods::post("name");
                    $service->catalog = RequestMethods::post("catalog");
                    $service->qty = RequestMethods::post("qty");
                    $service->type = RequestMethods::post("type");
                    $service->visibility = RequestMethods::post("visibility");
                    $service->price = RequestMethods::post("price");
                    $service->save();
                }
            }
            
            self::redirect(DIR_PATH."/admins/service");
        }

        
        /**
         * @before _secure
         */
        public function sale(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $sales = Sale::all(array(
                "deleted = ?" => false
            ));
            
            $deletedSales = Sale::all(array(
                "deleted = ?" => true
            ));
            
            $view = $this->getActionView();
            $view->set("sales", $sales)
                ->set("deletedSales", $deletedSales);
            
        }        
        
        /**
         * @before _secure
         */
        public function deleteSale($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/sale");

            $sale = Sale::first(array(
                "id = ?" => $id
            ));

            if ($sale)
            {
                $sale->deleted = true;
                $sale->save();
            }
            
            self::redirect(DIR_PATH."/admins/sale");
        }      
        
        /**
         * @before _secure
         */
        public function undeleteSale($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/sale");

            $sale = Sale::first(array(
                "id = ?" => $id
            ));

            if ($sale)
            {
                $sale->deleted = false;
                $sale->save();
            }
            
            self::redirect(DIR_PATH."/admins/sale");
        }
        
        /**
         * @before _secure
         */
        public function payment(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $payments = Income::all(array(
                "deleted = ?" => false
            ));
            
            $deletedpayments = Income::all(array(
                "deleted = ?" => true
            ));
            
            $view = $this->getActionView();
            $view->set("payments", $payments)
                ->set("deletedPayments", $deletedpayments);
            
        }         
        
        /**
         * @before _secure
         */
        public function deletePayment($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/payment");

            $payment = Income::first(array(
                "id = ?" => $id
            ));

            if ($payment)
            {
                $payment->deleted = true;
                $payment->save();
            }
            
            self::redirect(DIR_PATH."/admins/payment");
        }        
        
        /**
         * @before _secure
         */
        public function undeletePayment($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/payment");

            $payment = Income::first(array(
                "id = ?" => $id
            ));

            if ($payment)
            {
                $payment->deleted = false;
                $payment->save();
            }
            
            self::redirect(DIR_PATH."/admins/payment");
        }
        
        /**
         * @before _secure
         */
        public function setting(){
            
            $this->setWillRenderLayoutView(FALSE);
            
        }
        
        /**
         * @before _secure
         */
        public function gallery(){
            
            $this->setWillRenderLayoutView(FALSE);            
            
            $galleries = Gallery::all(array(
                "deleted = ?" => false
            ));
            
            $deletedGalleries = Gallery::all(array(
                "deleted = ?" => true
            ));
            
            $view = $this->getActionView();
            $view->set("galleries", $galleries)
                 ->set("deletedGalleries", $deletedGalleries);
            
        }
        
        /**
         * @before _secure
         */
        public function createGallery(){
            
            $this->setWillRenderLayoutView(FALSE);
            
            $view = $this->getActionView();
            $view->set("errors", array());
            
            if(RequestMethods::post("create")){
                
                $extension = pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
                $image = str_replace(" ", "-", RequestMethods::post("name")).".".$extension;
                
                $gallery = new Gallery(array(
                    "name" => RequestMethods::post("name"),
                    "category" => RequestMethods::post("category"),
                    "description" => RequestMethods::post("description"),
                    "author" => RequestMethods::post("author"),
                    "visibility" => RequestMethods::post("visibility"),
                    "image" => $image
                ));

                if ($gallery->validate()){
                    $this->_upload("image", "gallery");
                    $gallery->save();
                    $view->set("success", true);
                }else{
                    $view->set("errors", $gallery->getErrors());
                }
                
            }
            
        } 
        
        /**
         * @before _secure
         */
        public function deleteGallery($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/gallery");

            $gallery = Gallery::first(array(
                "id = ?" => $id
            ));

            if ($gallery)
            {
                $gallery->deleted = true;
                $gallery->save();
            }
            
            self::redirect(DIR_PATH."/admins/gallery");
        } 
        
        /**
         * @before _secure
         */
        public function undeleteGallery($id){
            $id = (int)$id;
            
            if(empty($id))
                self::redirect(DIR_PATH."/admins/gallery");

            $gallery = Gallery::first(array(
                "id = ?" => $id
            ));

            if ($gallery)
            {
                $gallery->deleted = false;
                $gallery->save();
            }
            
            self::redirect(DIR_PATH."/admins/gallery");
        }
        
        /**
         * @before _secure
         */
        protected function _upload($file, $type){
            
            $view = $this->getActionView();
            
            if (isset($_FILES)){
                
                $file = $_FILES[$file];
                $path = APP_PATH."/public/$type/photo/";
                
                if(!file_exists($path)){
                    $error = "File error: FILE PATH NOT FOUND...";
                    $view->set("file_error", $error); 
                    exit();
                }
                
                $time = time();
                $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
                $name = str_replace(" ", "-", RequestMethods::post("name"));
                $url = $name.".".$extension;
                $filename = "{$name}.{$extension}";

                if (move_uploaded_file($file["tmp_name"], $path.$filename)){
                    $meta = getimagesize($path.$filename);
                    if ($meta){
                        $width = $meta[0];
                        $height = $meta[1];

                        $file = new File(array(
                            "name" => RequestMethods::post("name"),
                            "width" => $width,
                            "height" => $height,
                            "size" => $file["size"],
                            "url" => $url,
                            "mime" => $file["type"],
                            "type" => $type
                        ));
                        $file->save();
                    }else{
                       $error = "File save error: FAILED TO SAVE FILE INFO..";
                       $view->set("file_error", $error); 
                       exit();
                    }
                }else{
                    $error = "File upload error: FAILED TO UPLOAD FILE...";
                    $view->set("file_error", $error); 
                    exit();
                }
            }else{
                $error = "File error: FILE NOT FOUND...";
                $view->set("file_error", $error); 
                exit();
            }
        }  
        
        public function login(){
            
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
                        "accountType = ?" => "admin",
                        "live=?" => true,
                        "deleted=?" => false
                    ));
                    
                    if (!empty($user)){
                        $this->user = $user;
                        self::redirect(DIR_PATH."/admins");
                    }
                    else
                    {
                        $view->set("login_error", "Email address and/or password are incorrect");
                    }
                }
            }
        }
        
        public function register(){

            $view = $this->getActionView();
            $view->set("errors", array());
            
            if(RequestMethods::post("register")){
                
                $admin = Admin::first(array(
                    "first = ?" => RequestMethods::post("first"),
                    "last = ?" => RequestMethods::post("last"),
                    "adminNumber = ?" => RequestMethods::post("adminNumber"),
                    "live=?" => true,
                    "deleted=?" => false
                ));
                
                if($admin){

                    $user = User::first(array(
                        "accountType = ?" => "admin",
                        "email = ?" => RequestMethods::post("email"),
                        "live=?" => true,
                        "deleted=?" => false
                    ));
                    
                    if($user){
                        $view->set("error_user", "user already exist");
                        exit();
                    }
                    
                    $user = new User(array(
                        "first" => RequestMethods::post("first"),
                        "last" => RequestMethods::post("last"),
                        "accountType" => "admin",
                        "email" => RequestMethods::post("email"),
                        "password" => $this->_hashCreate("sha256", RequestMethods::post("password"), HASH_PWD_KEY)
                    ));

                    if ($user->validate()){
                        $user->save();
                        $view->set("success", true);
                    }else{
                        $view->set("errors", $user->getErrors());
                    }
                    
                }else{
                    $view->set("error_adminNumber", "Admin number is invalid: Please contact your admin");
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

            $user = $this->getUser();

            if(!$user){

                header("Location: /admins/login");
                exit();

            }

        }
        
    }
