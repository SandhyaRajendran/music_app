<?php

require 'Modal/userModal.php';

class userController{
   public $modal;

   public function __construct()
   {
       $this->modal = new userModal();
   }
   public function showHomePage(){
       $allSongAndArtistDetail = $this->modal->getValueFromAdmin();
       $songArtist = $this->modal->songArtist();

       $search = $this->modal->search();
       require 'Views/homePage.php';
   }
   public function loginPage(){
       require 'Views/Login/login.view.php';
   }
//   public function checkUserDetails($userValues){
//      $stored =  $this->modal->checkUserDetails($userValues);
//       require 'Views/loginPage.php';
//   }
    public function errorPage(){
       require 'Views/Errors/404.view.php';
    }
    public function addNewSongs($values){
        $this->modal->addSongs($values);
    }
    public function addPlaylist($playListDetails,$premium){
//       var_dump($playListDetails,$premium);
        $this->modal->addPlaylist($playListDetails,$premium);
    }
    public function loginLogic($userValues){
       $this->modal->loginLogic($userValues);
    }
    public function logOutLogic(){
       $this->modal->logOutLogic();
    }
    public function registerPage(){
       $this->modal->registerPage();
    }
    public function register($userValues){
       $this->modal->register($userValues);
    }
    public function search($value){
//       var_dump($value);
//       $this->modal->search($value);
        $_SESSION['search'] = $value['search'];
        require 'Views/homePage.php';
    }
}