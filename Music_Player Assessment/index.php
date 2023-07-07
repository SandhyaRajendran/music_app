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
$routerConnection->post('/loginPage','loginPage');
$routerConnection->post('/checkUserDetails','checkUserDetails');
$routerConnection->post('/errorPage','errorPage');
$routerConnection->post('/addNewSongs','addNewSongs');
$routerConnection->post('/addPlaylist','addPlaylist');

$routerConnection->routerConnection($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);