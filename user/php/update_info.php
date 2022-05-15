<?php
session_start();
include "db_config.php";
include "session.php";
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$query = mysqli_query($con, "UPDATE users SET firstname = '$fname', lastname = '$lname', password = '$password', phone_number ='$phone' WHERE email ='$email' ");
if($query){
    $_SESSION['SuccessMessage'] = "Information Updated Successfully";
    header('location:../profile.php');
}
else{
    $_SESSION['ErrorMessage'] = "Fail to update profile";
    header('location:../profile.php');
}
?>