<?php
session_start();
include "db_config.php";
include "session.php";

$email =$_POST['email'];
$query = mysqli_query($con, "DELETE FROM users WHERE email = '$email'");
$query_deposit_clear = mysqli_query($con,"DELETE FROM deposit where email ='$email'");
$query_withdraw_clear = mysqli_query($con,"DELETE FROM withdraw where email ='$email'");


if ($query) {
    $_SESSION['SuccessMessage'] = "User Deleted Successfully";
    header('location:../registered_users.php');
} else {
    $_SESSION['SuccessMessage'] = "Failed delete user";
    header('location:../registered_users.php');
}


?>