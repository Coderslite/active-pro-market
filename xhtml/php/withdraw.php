<?php
include "db_config.php";
$email = $_POST['email'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$wallet_address = $_POST['wallet_address'];
$debit_from = $_POST['debit_from'];
$date = date("l jS \of F Y");


$query = mysqli_query($con, "INSERT INTO withdraw (email,amount,method,wallet_address,debit_from,date, status)VALUES('$email','$amount','$method','$wallet_address'
,'$debit_from','$date','pending')");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';
}

header('content-Type: application/json');
echo json_encode($data);
?>