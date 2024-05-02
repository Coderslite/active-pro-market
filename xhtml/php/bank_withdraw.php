<?php
include "db_config.php";
$email = $_POST['email'];
$amount = $_POST['amount'];
$debit_from = $_POST['debit_from'];
$bankName = $_POST['bankName'];
$accountName = $_POST['accountName'];
$accountNumber = $_POST['accountNumber'];
$sortCode = $_POST['sortCode'];

$date = date("l jS \of F Y");


$query = mysqli_query($con, "INSERT INTO withdraw (email,amount,method,wallet_address,debit_from,date, status,bank_name,account_name,account_number,sort_code)VALUES('$email','$amount','bank','','$debit_from','$date','pending','$bankName','$accountName','$accountNumber','$sortCode')");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';
}

header('content-Type: application/json');
echo json_encode($data);
?>