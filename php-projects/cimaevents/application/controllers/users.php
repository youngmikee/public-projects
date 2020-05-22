<?php
    
use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Users extends Controller{
    
    /**
     * @before _secure
     */
    public function index(){
        
        
        
    }
    
        
    public function login(){
        $this->setWillRenderLayoutView(FALSE);
        $this->setWillRenderActionView(FALSE);
        
        $email = RequestMethods::post("email");
        $password = RequestMethods::post("password");

        $user = User::first(array(
            "email=?" => $email,
            "password = ?" => $this->_hashCreate("sha256", $password, HASH_PWD_KEY),
            "accountType = ?" => "customer",
            "live=?" => true,
            "deleted=?" => false
        ));

        if (!empty($user)){
            $this->user = $user;

            echo json_encode(1);
            //self::redirect(DIR_PATH."/admin");
        }
        else
        {
            echo json_encode(0);
            //$view->set("login_error", "Email address and/or password are incorrect");
        }
            
    }

    public function register(){
        $this->setWillRenderActionView(FALSE);
        $this->setWillRenderLayoutView(FALSE);
            
        $user = User::first(array(
            "first = ?" => RequestMethods::post("first"),
            "last = ?" => RequestMethods::post("last"),
            "accountType = ?" => "customer",
            "email = ?" => RequestMethods::post("email"),
            "live = ?" => true,
            "deleted = ?" => false
        ));

        if($user){
            echo json_encode(0);
            exit();
        }

        $user = new User(array(
            "first" => RequestMethods::post("first"),
            "last" => RequestMethods::post("last"),
            "accountType" => "customer",
            "email" => RequestMethods::post("email"),
            "password" => $this->_hashCreate("sha256", RequestMethods::post("password"), HASH_PWD_KEY),
            "postcode" => RequestMethods::post("postcode"),
            "address" => RequestMethods::post("address")
        ));

        if ($user->validate()){
            $user->save();
            //$view->set("success", true);
            echo json_encode(1);
            exit();
        }else{
            echo 1;
            exit();
            echo json_encode(0);
            exit();
        }

        //$view->set("errors", $user->getErrors());
    }

    protected function _hashCreate($algo, $data, $salt){
            $context = hash_init($algo, HASH_HMAC, $salt);
            hash_update($context, $data);

            return hash_final($context);
    }

    public function logout(){
        $this->setUser(false);
        self::redirect(DIR_PATH);
    }
    
    /**
     * @protected
     */
    public function _secure(){
        $this->setWillRenderLayoutView(FALSE);
        $this->setwillRenderActionView(FALSE);

        $user = $this->getUser();

        if(!$user){

            //header("Location: /cemaevents/public/admin/login");
            echo json_encode(0);
            exit();

        }else{
            echo json_encode(1);
            exit();
        }

    }

}
