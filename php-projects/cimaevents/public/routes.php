<?php

// define routes

$routes = array(
    
    array(
        "pattern" => "admin",
        "controller" => "admins",
        "action" => "login"
    ),
    
    array(
        "pattern" => "register",
        "controller" => "home",
        "action" => "register"
    ),
    
    array(
        "pattern" => "login",
        "controller" => "home",
        "action" => "login"
    ),
    
    array(
        "pattern" => "logout",
        "controller" => "users",
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
        "pattern" => "settings",
        "controller" => "users",
        "action" => "settings"
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
        "action" => "index",
    )
);

// add defined routes

foreach($routes as $route){
    
    $router->addRoute( new Framework\Router\Route\Simple($route));
    
}

// unset globals

unset($routes);

