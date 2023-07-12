<?php

//require 'connection.php';
//
//$checkConnection = new DatabaseConnection();
//
unset($_SESSION);
session_start();
require 'router.php';

$routerConnection = new Router();

$routerConnection->get('/','showHomePage');
$routerConnection->post('/registerPage','registerPage');
$routerConnection->post('/register','register');
$routerConnection->post('/loginPage','loginPage');
$routerConnection->post('/login-logic','login-logic');
$routerConnection->post('/checkUserDetails','checkUserDetails');
$routerConnection->post('/errorPage','errorPage');
$routerConnection->post('/addNewSongs','addNewSongs');
$routerConnection->post('/addPlaylist','addPlaylist');
$routerConnection->post('/logOut','logOut');
$routerConnection->post('/search','search');
$routerConnection->routerConnection($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);