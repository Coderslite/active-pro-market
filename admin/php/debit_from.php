<?php
include "db_config.php";
$amount = $_POST['amount'];
$debit_from = $_POST['debit_from'];
$email = $_POST['email'];
$date = date("l jS \of F Y");




$querydebited = "INSERT INTO withdraw(amount,debit_from,email,status,date)VALUES('$amount','$debit_from','$email','confirmed','$date')";
$query_run_debited = mysqli_query($con, $querydebited);
if($query_run_debited){
    $data = 'success';
}
else{
    $data = 'failed';
}
header('content-Type: application/json');
echo json_encode($data);
?>