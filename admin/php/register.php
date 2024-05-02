<?php
session_start();
include "db_config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$password = $_POST['password'];
$phone = $_POST['phone'];
@$referral_id= $_POST['referral_id'];
$account_type = $_POST['account_type'];
$date = date("l jS \of F Y");

$checkEmailQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
$num=mysqli_num_rows($checkEmailQuery);
if ($num==1){
    $result = "email_exist";
}
else{
$checkUsernameQuery = mysqli_query($con,"SELECT * FROM users WHERE uName = '$username' ");
$numUser=mysqli_num_rows($checkUsernameQuery);
if ($numUser==1){
    $result = "username_exist";
}
else{
    $query = mysqli_query($con,"INSERT INTO users(fName,lName,email,password,uName,gender,phone,country,referral,accountType,image,role,status,date)VALUES('$fname','$lname','$email','$password','$username','$gender','$phone','$country','$referral_id','$account_type','','user','active','$date')");

    if($query){
        $query_run_bonus = mysqli_query($con, "INSERT INTO deposit(amount,type,email,transaction_id,method,status,date)VALUES(20,'investment_bonus','$email','$transaction_id','bitcoin','pending','$date')");

        $_SESSION['email'] = $email;
        $result = "success";
       
    }
    else{
        $result = "failed";
    }
}
}

header('content-Type: application/json');
echo json_encode($result);
// echo $upload; 
 

?>