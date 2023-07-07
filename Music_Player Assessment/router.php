<?php

require 'Controllers/controllers.php';

class Router{
    public $router = [];

    public $controller;

    public function __construct()
    {
        $this->controller = new userController();
    }

    public function get($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => "GET"
        ];
    }
    public function post($uri,$action){
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => "POST"
        ];
    }

    public function routerConnection($serverUri,$serverMethod){
        foreach ($this->router as $router){
            if($router['uri'] == $serverUri && $router['method'] == $serverMethod){
                $action = $router['action'];
//                var_dump($action);
                switch ($action){
                    case "showHomePage":
                        $this->controller->showHomePage();
                        break;
                    case "loginPage":
                        $this->controller->loginPage();
                        break;
                    case "checkUserDetails":
                        $this->controller->checkUserDetails($_POST);
                        break;
                    case "errorPage":
                        $this->controller->errorPage();
                        break;
                    case "addNewSongs":
                        $this->controller->addNewSongs($_FILES);
                        break;
                    case "addPlaylist":
                        $this->controller->addPlaylist($_FILES,$_POST);
                        break;
                }
            }
        }

    }

}