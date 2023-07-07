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

       require 'Views/homePage.php';
   }
   public function loginPage(){
       require 'Views/loginPage.php';
   }
   public function checkUserDetails($userValues){
//        var_dump($userValues);

//       echo($userValues['Password']);
//        print_r($userValues);
//       $enteredUserName = $userValues['userName'];
//       $enteredPassword = $userValues['Password'];
//
////       var_dump($enteredPassword,$enteredUserName);
//
      $stored =  $this->modal->checkUserDetails($userValues);
//      echo "<pre>";
////      var_dump($stored['user_name']);
//       echo "</pre>";
//
//       foreach ($stored as $storedValue){
//           if($storedValue['user_name'] === $enteredUserName && $storedValue['PASSWORD'] === $enteredPassword){
//                require 'Views/homePage.php';
//                echo "success";
//           }
//           else{
//                require 'Views/errorShower/error.php';
//               }
//       }
       require 'Views/loginPage.php';

   }
    public function errorPage(){
       require 'Views/errorShower/error.php';
    }
    public function addNewSongs($values){
//       echo "<pre>";
//       var_dump($values);
//        echo "</pre>";
        $this->modal->addSongs($values);
    }
    public function addPlaylist($playListDetails,$premium){
//       var_dump($playListDetails,$premium);
        $this->modal->addPlaylist($playListDetails,$premium);
    }


}