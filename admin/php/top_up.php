<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';
include "db_config.php";
$amount = $_POST['amount'];
$top_up = $_POST['top_up'];
$email = $_POST['email'];

$newAmount = $amount + $top_up;

$query = mysqli_query($con, "UPDATE users SET profit = '$newAmount' WHERE email = '$email'");

if ($query) {
        $data = 'success';
} else {
    $data = 'failed';
}



header('content-Type: application/json');
echo json_encode($data);
