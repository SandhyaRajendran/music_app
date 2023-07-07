<?php

//echo "homePage showing";
//var_dump($allSongAndArtistDetail);
//var_dump($allSongAndArtistDetail);
//var_dump($songArtist);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Welcome, <?php echo $_SESSION['userName'] ?>
new <?php echo $_SESSION['user_type'] ?>;
<form action="/loginPage" method="post">
    <button>Login</button>
</form>

<h1>AdminPage</h1>
<? if ($_SESSION['user_type'] == "admin"): ?>
<form action="/addNewSongs" method="post" enctype="multipart/form-data">
    <p><b>Add New songs,<?php echo $_SESSION['userName'] ?></b></p>
    <p>Song Name</p>
    <input type="file" name="songName" required>
    <p>New Artist</p>
    <input type="file" name="artistName[]" multiple required>
    <input type="submit">
</form>

<!--//elseif usertype = user_type = login-->
    <h1>Login User</h1>

<? elseif ($_SESSION['user_type'] == "login"): ?>
<form action="/addPlaylist" enctype="multipart/form-data" method="post">
    <p>Add Playlist</p>
    <input type="file" name="playlistSongName" required>
    <p>follow artist</p>
    <?php foreach ($allSongAndArtistDetail as $detail): ?>
        <img src="<?php echo $detail->song_name ?>" height="100px" width="100px" >
        <button name="follwerId" value="<?php echo $detail->id?>">Follow</button>
    <?php endforeach; ?>
        <p>Are you like to be a Premium user?</p>
    <select name="premiumUser">
    <option>Yes</option>
    <option>no</option>
    </select>
    <input type="submit">
</form>

    <h1>User</h1>

<? else: ?>
    <h1>All Songs For you</h1>
    <div class="main" style="display:flex;" >
        <?php foreach ($allSongAndArtistDetail as $detail): ?>
            <div class="songs">
                <h3>Song name</h3>
                <img src="<?php echo $detail->song_name ?>" height="100px" width="100px" >
            </div>
        <?php endforeach; ?>
        <h3>Artist Name</h3>
        <?php foreach ($songArtist as $artist): ?>
            <div class="songs">
                <img src="<?php echo $artist->images ?>" height="100px" width="100px" >
            </div>
        <?php endforeach; ?>
    </div>
<? endif; ?>
</body>
</html>

<?// if ($condition): ?>
<!--    <p>Content</p>-->
<?// elseif ($other_condition): ?>
<!--    <p>Other Content</p>-->
<?// else: ?>
<!--    <p>Default Content</p>-->
<?// endif; ?>