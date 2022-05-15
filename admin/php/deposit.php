<?php
include "db_config.php";
$amount = $_POST['amount'];
$bonus = $_POST['bonus'];
$method = $_POST['method'];
$amount = $_POST['amount'];
$email =  $_POST['email'];
$rand = mt_rand(100000,1000000);
$transaction_id = 'AFT-'.$rand;
$query = mysqli_query($con,"INSERT INTO deposit (username,useremail,amount,method,bonus,transaction_id,status)VALUES('Ossai Abraham','$email','$amount','$method','$bonus','$transaction_id','confirm_payment')");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';

}

header('content-Type: application/json');
echo json_encode($data);


?>