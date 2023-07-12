<?php
//var_dump($search);
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
<div class="navBar" style="display: flex; justify-content: space-between">
    <div>
Hello, <?php echo $_SESSION['login']['email']; ?>
        <form method="post" action="/search">
        <input type="search" name="search" >
            <input type="submit">
        </form>
    </div>
    <div style="display: flex">
<form action="/loginPage" method="post">
    <button>Login</button>
</form>
<?php if(isset($_SESSION['login']['email'])): ?>
<form action="/logOut" method="post">
    <?php endif; ?>
    <button>Logout</button>
</form>
<form action="/registerPage" method="post">
    <button>Register</button>
</form>
    </div>
</div>
<table>
    <h1>User</h1>
    <h1>All Songs For you</h1>
    <?php foreach ($search as $searches): ?>
    <img src="<?php echo $searches->song_name ?>" height="100px" width="100px" alt="welcome">
    <?php endforeach; ?>
    <div class="main"  >
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
</table>
<h1>AdminPage</h1>

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
</body>
</html>
