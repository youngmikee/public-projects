<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Purchase extends Controller{
    
    public function index(){

        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        $products = Product::all(array(
            "qty > ?" => 0,
            "visibility = ?" => "purchase",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $this->getActionView()->set("products", $products)
                ->set("controller", get_class($this) );

    }
    
    public function product(){
        
        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        $product_id = RequestMethods::get("selected");
        
        $product = Product::first(array(
            "id = ?" => $product_id,
            "live = ?" => true,
            "deleted = ?" => false
        ));
            
        $this->getActionView()
                ->set("controller", get_class($this))
                ->set("product", $product);
        
        
    }

    public function addToBasket(){
        $this->setWillRenderLayoutView(FALSE);
        $this->setWillRenderActionView(FALSE);
        
        $id = RequestMethods::post("id");
        $qty = RequestMethods::post("qty");
        $id = (int)$id;
        $qty = (int)$qty;
        
        if(empty($qty)){
            echo json_encode(0);
            exit;
        }else{
            
            if($qty == 0){
                echo json_encode(0);
                exit();
            }
            
            $products = Product::first(array(
                "id = ?" => $id,
                "live = ?" => true,
                "deleted = ?" => false
            ));
            
            $total = $products->price * $qty;
            
           
            $product = array(
                'id' => $products->id,
                'name' => $products->name,
                'price' => $products->price,
                'image' => str_replace(' ', '_', $products->name).".".$products->image,
                'qty' => $qty
            );
          
            $session = Registry::get("session");
            $basket = $session->get("basket");
            $totals = $session->get("total");
            
            if(isset($basket) and !empty($basket)){
                $basket[] = $product;
                $total = $totals + $total;
                $session->set("basket", $basket);
                $session->set("total", $total);

                echo json_encode($basket);
                exit();
            }else {
                $basket = array();
                $basket[] = $product;
                $session->set("basket", $basket);
                $session->set("total", $total);
                
                echo json_encode($basket);
                exit();
            }
        }
     
    }
    
    public function search(){
        
        $view = $this->getActionView();
        
        $query = RequestMethods::post("query");
        $order = RequestMethods::post("order", "modified");
        $direction = RequestMethods::post("direction", "desc");
        $page = RequestMethods::post("page", 1);
        $limit = RequestMethods::post("limit", 10);
        $count = 0;
        $users = false;
        
        if(RequestMethods::post("search")){
            
            $where = array(
                "SOUNDEX(first) = SOUNDEX(?)" => $query,
                "live = ?" => true,
                "deleted = ?" => false
            );
            
            $fields = array(
                "id", "first", "last"
            );
            
            $count = User::count($where);
            $users = User::all($where, $fields, $order, $direction, $limit, $page);
            
        }
        
        $view
                ->set("query", $query)
                ->set("order", $order)
                ->set("direction", $direction)
                ->set("page", $page)
                ->set("limit", $limit)
                ->set("count", $count)
                ->set("users", $users);
        
    }

    /**
     * @before _secure
     */
    public function settings(){

        $view = $this->getActionView();
        $user = $this->getUser();
        
        if(RequestMethods::post("update")){

            $user = new User(array(
                "id" => $user->id,
                "first" => RequestMethods::post("first", $user->first),
                "last" => RequestMethods::post("last", $user->last),
                "email" => RequestMethods::post("email", $user->email),
                "password" => RequestMethods::post("password", $user->password)
            ));
            
            if($user->validate()){
                
                $user->save();

                $session = Registry::get("session");
                $session->set("user", serialize($user));
                
                $view->set("success", true);
                
            }
            
            $view->set("errors", $user->getErrors());
            
        }
        
    }
    
    /**
     * @before _secure
     */
    public function friend($id){

        $user = $this->getUser();

        $friend = new Friend(array(
            "user" => $user->id,
            "friend" => $id
        ));

        $friend->save();
        
        header("Location: ".DIR_PATH."/users/search");
        exit();
        
    }
    
    /**
     * @before _secure
     */
    public function unfriend($id){
        
        $user = $this->getUser();
        
        $friend = Friend::first(array(
            "user" => $user->id,
            "friend" => $id
        ));
        
        if($friend){
        
            $friend = new Friend(array(
                "id" => $friend->id
            ));

            $friend->delete();
            
        }
        
        header("Location: ".DIR_PATH."/users/search");
        exit();
        
    }

}
