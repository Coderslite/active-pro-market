<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';
include "db_config.php";
$transaction_id = $_POST['transaction_id'];
$email = $_POST['email'];

$query = mysqli_query($con, "UPDATE deposit SET status = 'confirmed' WHERE transaction_id = '$transaction_id'");

if ($query) {
                        
                    
                    //                     $mail = new PHPMailer();
                    // // configure an SMTP
                    // $mail->isSMTP();
                    // $mail->Host = 'localhost';
                    // $mail->SMTPAuth = false;
                    // $mail->SMTPAutoTLS = false; 
                    // $mail->Port = 25; 
                    
                    // $mail->setFrom('support@activepromarket.com', 'Active Pro Market');
                    // $mail->addAddress('abrahamgreatebele@gmail.com', 'Admin');
                    // $mail->Subject = 'Payment Status!';
                    // // Set HTML
                    // $mail->isHTML(TRUE);
                    // $mail->Body = '<html>Your payment has been approved</br> 
                    // login to your dashboard to confirm your bonus
                    // <a href="https://aftbroker.unaux.com/login.html" class="btn btn-success">confirm now</a>
                    // </html>';
                    // $mail->AltBody = 'Payment Confirmed, login to verify <a href="https://aftbroker.unaux.com/login.html" class="btn btn-success">confirm now</a>';
                    
        $data = 'success';
} else {
    $data = 'failed';
}



header('content-Type: application/json');
echo json_encode($data);
