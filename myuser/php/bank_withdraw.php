<?php 

include "db_config.php";
$amount = $_POST['amount'];
$email= $_POST['email'];
$bank_name= $_POST['bank_name'];
$account_number= $_POST['account_number'];
$account_name= $_POST['account_name'];
$sort_code= $_POST['sort_code'];

$query = mysqli_query($con,"INSERT INTO bank_withdraw(amount,email,bank_name,account_number,account_name,sort_code,status)VALUES('$amount','$email','$bank_name','$account_number','$account_name','$sort_code','pending')");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';

}

header('content-Type: application/json');
echo json_encode($data);

?>