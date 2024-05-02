<?php
session_start();
include "db_config.php";
include "session.php";

$email =$_POST['email'];
$query = mysqli_query($con,"DELETE FROM deposit where email ='$email'");
$query_clear = mysqli_query($con,"DELETE FROM withdraw where email ='$email'");

if ($query) {
    $_SESSION['SuccessMessage'] = "Account Clear Successfully";
    header('location:../registered_users.php');
} else {
    $_SESSION['SuccessMessage'] = "Failed to Clear Account";
    header('location:../registered_users.php');
}


?>