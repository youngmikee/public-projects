<?php
// constants

define("DEBUG", TRUE);
define("APP_PATH", dirname(dirname(__FILE__)));
define("DIR_PATH", "/ahlo/public");
define("HASH_GENERAL_KEY", "pOCKERface1990");
define("HASH_PWD_KEY", "catsFLYhigh2015pocker");
define("KELVIN", "273.15");

try{
    
    //core
    require("../framework/core.php");
    Framework\Core::initialize();
    
    //configuration
    $configuration = new Framework\Configuration(array(
            "type" => "ini"
    ));
    Framework\Registry::set("configuration", $configuration->initialize());
    
    //database
    $database = new Framework\Database();
    Framework\Registry::set("database", $database->initialize());
    
    //cache
    $cache = new Framework\Cache();
    Framework\Registry::set("cache", $cache->initialize());
    
    //session
    $session = new Framework\Session();
    Framework\Registry::set("session", $session->initialize());
    
    //router
    $router = new Framework\Router(array(
        "url" => isset($_GET["url"]) ? $_GET["url"] : "authenticate/index",
        "extension" => isset($_GET["url"]) ? $_GET["url"] : "html"
    ));
    Framework\Registry::set("router", $router);
    
    //include custom routes
    
    include("routes.php");
    
    //dispatch request
    
    $router->dispatch();
    
    //unset globals
    unset($configuration);
    unset($database);
    unset($cache);
    unset($session);
    unset($router);
    
} catch (Exception $e) {
    // list exceptions
    
    $exceptions = array(
        "500" => array(
            "Framework\Cache\Exception",
            "Framework\Cache\Exception\Argument",
            "Framework\Cache\Exception\Implementation",
            "Framework\Cache\Exception\Service",
            
            "Framework\Configuration\Exception",
            "Framework\Configuration\Exception\Argument",
            "Framework\Configuration\Exception\Implementation",
            "Framework\Configuration\Exception\Syntax",
            
            "Framework\Controller\Exception",
            "Framework\Controller\Exception\Argument",
            "Framework\Controller\Exception\Implementation",
            
            "Framework\Core\Exception",
            "Framework\Core\Exception\Argument",
            "Framework\Core\Exception\Implementation",
            "Framework\Core\Exception\Property",
            "Framework\Core\Exception\ReadOnly",
            "Framework\Core\Exception\WriteOnly",
            
            "Framework\Database\Exception",
            "Framework\Database\Exception\Argument",
            "Framework\Database\Exception\Implementation",
            "Framework\Database\Exception\Service",
            "Framework\Database\Exception\Sql",
            
            "Framework\Model\Exception",
            "Framework\Model\Exception\Argument",
            "Framework\Model\Exception\Connector",
            "Framework\Model\Exception\Implementation",
            "Framework\Model\Exception\Primary",
            "Framework\Model\Exception\Type",
            "Framework\Model\Exception\Validation",
            
            "Framework\Request\Exception",
            "Framework\Request\Exception\Argument",
            "Framework\Request\Exception\Implementation",
            "Framework\Request\Exception\Response",
            
            "Framework\Router\Exception",
            "Framework\Router\Exception\Argument",
            "Framework\Router\Exception\Implementation",
            
            "Framework\Session\Exception",
            "Framework\Session\Exception\Argument",
            "Framework\Session\Exception\Implementation",
            
            "Framework\Template\Exception",
            "Framework\Template\Exception\Argument",
            "Framework\Template\Exception\Implementation",
            "Framework\Template\Exception\Parser",
            
            "Framework\View\Exception",
            "Framework\View\Exception\Argument",
            "Framework\View\Exception\Data",
            "Framework\View\Exception\Implementation",
            "Framework\View\Exception\Renderer",
            "Framework\View\Exception\Syntax"
        ),
        "404" => array(
            "Framework\Router\Exception\Action",
            "Framework\Router\Exception\Controller"
        )
    );
    
    $exception = get_class($e);
    
    // attempt to find the approapriate template, and render
    
    foreach ($exceptions as $template => $classes)
    {
        foreach ($classes as $class)
        {
            if ($class == $exception)
            {
                header("Content-type: text/html");
                include(APP_PATH."/application/views/errors/{$template}.php");
                exit;
            }
        }
    }
    
    // render fallback template
    header("Content-type: text/html");
    echo "An error occurred.";
    exit; 
}