<?php
include "db_config.php";
$email = $_POST['email'];
$amount = $_POST['amount'];
$bonus = $_POST['bonus'];
$method = $_POST['method'];
$rand = mt_rand(100000,1000000);
$transaction_id = 'MMFX-'.$rand;
$date = date("l jS \of F Y");


$query = mysqli_query($con, "INSERT INTO deposit (email,amount,type,method,transaction_id,date, status)VALUES('$email','$amount','investment','$method','$transaction_id'
,'$date','pending')");

if($query){
    $data = 'success';
}
else{
    $data = 'failed';
}

header('content-Type: application/json');
echo json_encode($data);
?>