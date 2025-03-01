<?php
// $isLive = false;
$isLive = true;
$servername = "localhost";
$username = $isLive?"autoqnkv_user":"root";
$password = $isLive?"Autoglobalfx$$":"root";
$dbname = $isLive?"autoqnkv_db":"blackrock";
$con = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>