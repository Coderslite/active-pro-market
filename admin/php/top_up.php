<?php
include "db_config.php";
$email = $_POST['email'];
$amount = $_POST['amount'];
$top_up = $_POST['top_up'];
$rand = mt_rand(100000,1000000);
$transaction_id = 'MMFX-'.$rand;
$date = date("l jS \of F Y");




if($top_up == 'invested'){
$queryInvested = "INSERT INTO deposit(amount,type,email,transaction_id,method,status,date)VALUES('$amount','investment','$email','$transaction_id','bitcoin','confirmed','$date')";
$query_run_invested = mysqli_query($con, $queryInvested);
if($query_run_invested){
    $data = 'success';
}
else{
    $data = 'failed';
}
}
else if($top_up == 'bonus'){
    $queryBonus = "INSERT INTO deposit(amount,type,email,transaction_id,method,status,date)VALUES('$amount','investment_bonus','$email','$transaction_id','bitcoin','confirmed','$date')";
$query_run_bonus = mysqli_query($con, $queryBonus);
if($query_run_bonus){
    $data = 'success';
}
else{
    $data = 'failed';
}

}
else if($top_up == 'profit'){
    $queryProfit = "INSERT INTO deposit(amount,type,email,transaction_id,method,status,date)VALUES('$amount','profit','$email','$transaction_id','bitcoin','confirmed','$date')";
$query_run_profit = mysqli_query($con, $queryProfit);
if($query_run_profit){
    $data = 'success';
}
else{
    $data = 'failed';
}
}

header('content-Type: application/json');
echo json_encode($data);
?>