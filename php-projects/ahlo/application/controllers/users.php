<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Users extends Controller{
    
    /**
     * @before _secure
     */
    public function index(){

        $session = Registry::get("session");
        $user = unserialize($session->get("user", null));
        
        if(empty($user)){

            header("Location: ".DIR_PATH);
            exit();
           
        }
        
        $this->getActionView()->set("user", $user);
        
        $this->expenses();
        
        if(RequestMethods::post("new")){

            switch (RequestMethods::post("type")){
                case "Basic Expenses":
                    $this->newExpense();
                    break;
                case "Fixed Expenses":
                    $this->newExpense();
                    break;
                case "Receipts":
                    $this->receipts();
                    break;
                case "Basic Income":
                    $this->income();
                    break;
            }
            

        }

    }
    
    private function expenses(){
        
        $expenses = Expense::all();
        
        $this->getActionView()->set("expenses", $expenses);
        
    }
    
    public function newExpense(){
        
        $user = $this->getUser();
        
        if($user){

            if(RequestMethods::post("type") == "Basic Expenses"){
                
                $view = $this->getLayoutView();

                $expense = new Expense(array(
                    "type" => RequestMethods::post("type"),
                    "retailer" => RequestMethods::post("retailer"),
                    "item" => RequestMethods::post("item"),
                    "amount" => RequestMethods::post("amount")
                ));
          
                if($expense->validate()){

                    $expense->save();

                    header("Location: ".DIR_PATH."/users/index");
                    exit(); 

                }

                $view->set("errors", $expense->getErrors());
                
            }

            if(RequestMethods::post("type") == "Fixed Expenses"){

                $view = $this->getLayoutView();

                $expense = new Expense(array(
                    "type" => RequestMethods::post("type"),
                    "retailer" => RequestMethods::post("retailer"),
                    "item" => RequestMethods::post("item"),
                    "amount" => RequestMethods::post("amount"),
                    "period" => RequestMethods::post("period")
                ));
          
                if($expense->validate()){

                    $expense->save();

                    header("Location: ".DIR_PATH."/users/index");
                    exit(); 

                }

                $view->set("errors", $expense->getErrors());
                
            }
            
        }
        
    }
    
    public function receipts(){
        echo "reciepts";
    }
    
    public function income(){
        echo "income";
    }

    public function logout(){
        
        $this->setUser(false);
        
        $session = Registry::get("session");
        $session->erase("user");
        
        header("Location: ".DIR_PATH);
        exit();
        
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
    
    /**
     * @protected
     */
    public function _secure(){
        
        $user = $this->getUser();
        
        if(!$user){
            
            header("Location: ".DIR_PATH);
            exit();
            
        }
        
    }

}
