<?php

require 'Controllers/controllers.php';
require 'Core/middleware/Authmiddleware.php';
require 'Core/middleware/Guestmiddleware.php';

class Router{
    public $router = [];

    public $controller;

    public function __construct()
    {
        $this->controller = new userController();
    }
    public function only($middleware)
    {
        $this->router[count($this->router) - 1]['middleware'] = $middleware;
    }

    public function get($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => "GET",
            'middleware' => null
        ];
        return $this;
    }
    public function post($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => "POST",
            'middleware' => null
        ];
        return $this;
    }

    public function routerConnection($serverUri,$serverMethod){
        foreach ($this->router as $router){
            $action = $router['action'];
//                var_dump($action);
            if($router['uri'] == $serverUri && $router['method'] == $serverMethod){
                if ($router['middleware'] == "auth") {
                    $redirect = new \Core\middleware\Authmiddleware();
                    $redirect->handler();
                }
                if ($router['middleware'] == "guest") {
                    $redirect = new \Core\middleware\Guestmiddleware();
                    $redirect->handler();
                }

                switch ($action){
                    case "showHomePage":
                        $this->controller->showHomePage();
                        break;
                    case "loginPage":
                        $this->controller->loginPage();
                        break;
//                    case "checkUserDetails":
//                        $this->controller->checkUserDetails($_POST);
//                        break;
                    case "errorPage":
                        $this->controller->errorPage();
                        break;
                    case "addNewSongs":
                        $this->controller->addNewSongs($_FILES);
                        break;
                    case "addPlaylist":
                        $this->controller->addPlaylist($_FILES,$_POST);
                        break;
                    case "login-logic":
                        $this->controller->loginLogic($_POST);
                        break;
                    case "logOut";
                        $this->controller->logOutLogic();
                        break;
                    case "registerPage":
                        $this->controller->registerPage();
                        break;
                    case "register":
                        $this->controller->register($_POST);
                        break;
                    case "search":
                        $this->controller->search($_POST);
                        break;
                }
            }
        }

    }
}
