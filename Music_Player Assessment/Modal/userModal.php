<?php

require 'connection.php';

class userModal extends DatabaseConnection{
    public function checkUserDetails($userValues){
        var_dump($userValues);
        $userDetailCheck = $this->db->query("SELECT * FROM users");
        $userValue = $userDetailCheck->fetchAll();
//        var_dump($userValue);
        $enteredUserName = $userValues['userName'];
        $enteredPassword = $userValues['Password'];

       var_dump($enteredPassword,$enteredUserName);
        echo "<pre>";
//      var_dump($userValues['user_name']);
        echo "</pre>";

        foreach ($userValue as $storedValue){
//            var_dump($storedValue['PASSWORD']);
            if($storedValue['user_name'] === $enteredUserName && $storedValue['PASSWORD'] === $enteredPassword){
                header('location:/');
                echo "success";
                $_SESSION['userName'] = $enteredUserName;
                $_SESSION['user_type'] = $storedValue['user_type'];
                $_SESSION['id'] = $storedValue['id'];
                die();
            }
            else{
                header('location:/errorPage');
                echo "not yet";
            }
        }
    }
    public function getValueFromAdmin(){
        $songAndArtist = $this->db->query("SELECT * FROM admin WHERE admin_id = 1");
        $allSongAndArtist = $songAndArtist->fetchAll(PDO::FETCH_OBJ);
//        var_dump($allSongAndArtist);
        return $allSongAndArtist;
    }
    public function songArtist(){
        $artist = $this->db->query("SELECT * FROM images WHERE admin_id = 1");
        $allArtist = $artist->fetchAll(PDO::FETCH_OBJ);
//        var_dump($allSongAndArtist);
        return $allArtist;
    }

    public function addSongs($value){
//        var_dump($value['songName']);
//        var_dump($value['artistName']);


        $songName = $value['songName']['name'];
        $imgPath = "images/".$songName;
        $taskImg = $value['songName']['tmp_name'];
        move_uploaded_file($taskImg,$imgPath);

        $insertsongName = $this->db->prepare("INSERT INTO admin(song_name,admin_id)VALUES ('$imgPath',1)");
        $insertsongName->execute();
        foreach ($_FILES['artistName']['tmp_name'] as $key =>$value){
            $id = $_SESSION['id'];
            $file_tmpname = $_FILES['artistName']['tmp_name'][$key];
//            var_dump($file_tmpname);
            $file_name = $_FILES['artistName']['name'][$key];
            $imgPath = "images/".$file_name;
            move_uploaded_file($file_tmpname,$imgPath);
            $insertImg = $this->db->prepare("INSERT INTO images(images,module_type,admin_id)VALUES ('$imgPath','Artist','$id')");
            $insertImg->execute();
        }
        header('location:/');

    }


    public function addPlaylist($value,$premium){
//        var_dump($value['follwerId']);
        $followerId = $value['follwerId'];
        var_dump($followerId);

        $id = $_SESSION['id'];
        //        var_dump($premium['premiumUser']);
        if($premium['premiumUser'] == 'Yes'){
             $updatePremium = $this->db->query("UPDATE users SET is_premium = 1  WHERE id = '$id'");
        }
        else if ($premium['premiumUser'] == 'no'){
            $updatePremium = $this->db->query("UPDATE users SET is_premium = 0  WHERE id = '$id'");
        }


//        if (!$id == 1){
            $songName = $value['playlistSongName']['name'];
            $imgPath = "images/".$songName;
            $taskImg = $value['playlistSongName']['tmp_name'];
            move_uploaded_file($taskImg,$imgPath);
            $playListAdded = $this->db->query("INSERT INTO playlist(song_name,user_id)VALUES ('$imgPath','$id')");
//        }
        $insertFollwers = $this->db->query("INSERT INTO followers(user_id,follower_id)VALUES ('$id','$followerId')");

        header('location:/');

    }
}