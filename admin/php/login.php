<?php

session_start();
include "db_config.php";

$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE email='$email' && password='$password'";
    $result= mysqli_query($con, $query);
     $num=mysqli_num_rows($result);
     if ($num==1){
        $_SESSION['email'] = $email;
        header('location:../../xhtml/index.php');
     }
     else{
        echo "failed";
     }


?>