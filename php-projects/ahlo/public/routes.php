<?php

// define routes

$routes = array(
    array(
        "pattern" => "register",
        "controller" => "authenticate",
        "action" => "register"
    ),
    
    array(
        "pattern" => "create",
        "controller" => "authenticate",
        "action" => "create"
    ),
	
    array(
        "pattern" => "login",
        "controller" => "authenticate",
        "action" => "login"
    ),
    
    array(
        "pattern" => "logout",
        "controller" => "authenticate",
        "action" => "logout"
    ),
    
    array(
        "pattern" => "search",
        "controller" => "users",
        "action" => "search"
    ),
    
    array(
        "pattern" => "users",
        "controller" => "users",
        "action" => "index"
    ),
    
    array(
        "pattern" => "unfriend/?",
        "controller" => "users",
        "action" => "friend",
        "parameters" => array("id")
    ),
    
    array(
        "pattern" => "friend/?",
        "controller" => "users",
        "action" => "friend",
        "parameters" => array("id")
    ),
    
    array(
        "pattern" => "home",
        "controller" => "home",
        "action" => "index"
    )
	
);

// add defined routes

foreach($routes as $route){
    
    $router->addRoute( new Framework\Router\Route\Simple($route));
    
}

// unset globals

unset($routes);

