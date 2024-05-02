<?php 
include "db_config.php";
$email = $_POST['email'];
$fName = $_POST['fullName'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$query = mysqli_query($con,"UPDATE users SET fullName = '$fName',phone = '$phone',password= '$password' WHERE email = '$email'");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';
}

header('content-Type: application/json');
echo json_encode($data);
?>