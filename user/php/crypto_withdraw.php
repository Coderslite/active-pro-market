<?php 

include "db_config.php";
$amount = $_POST['amount'];
$email= $_POST['email'];
$method= $_POST['method'];
$wallet_address = $_POST['wallet_address'];

$query = mysqli_query($con,"INSERT INTO crypto_withdraw(amount,method,wallet_address,email,status)VALUES('$amount','$method','$wallet_address','$email','pending')");
if($query){
    $data = 'success';
}
else{
    $data = 'failed';

}

header('content-Type: application/json');
echo json_encode($data);

?>