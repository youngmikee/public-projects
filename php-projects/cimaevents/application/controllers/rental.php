<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Rental extends Controller{
    
    public function index(){

        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        $products = Product::all(array(
            "qty > ?" => 0,
            "visibility = ?" => "rental",
            "live = ?" => true,
            "deleted = ?" => false
        ));
        
        $this->getActionView()->set("products", $products)
                ->set("controller", get_class($this) );
        
    }
    
    public function product(){
        
        $session = Registry::get("session");
        $user = $session->get("customer");
        
        $this->getLayoutView()
                ->set("controller", lcfirst(get_class($this)))
                ->set("date", date("Y"));
        
        if(RequestMethods::get("selected")){
        
            $product = Product::first(array(
                "id = ?" => (int)RequestMethods::get("selected"),
                "live = ?" => true,
                "deleted = ?" => false
            ));

            $this->getActionView()
                    ->set("controller", get_class($this))
                    ->set("product", $product);
        
        }
        
        if(RequestMethods::post("basket")){
            echo "added to basket";
        }
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

}
