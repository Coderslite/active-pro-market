<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';

include "db_config.php";
$transaction_id = $_POST['transaction_id'];
$email = $_POST['email'];

$query = mysqli_query($con, "UPDATE deposit SET status = 'confirm_payment' WHERE transaction_id='$transaction_id' ");

if ($query) {
                                    $mail = new PHPMailer();
                    // configure an SMTP
                    $mail->isSMTP();
                    $mail->Host = 'localhost';
                    $mail->SMTPAuth = false;
                    $mail->SMTPAutoTLS = false; 
                    $mail->Port = 25; 
                    
                    $mail->setFrom('support@Autoglobalfx.com', 'Active Pro Market');
                    $mail->addAddress('abrahamgreatebele@gmail.com', 'Admin');
                    $mail->Subject = 'Payment Status!';
                    // Set HTML
                    $mail->isHTML(TRUE);
                    $mail->Body = '<html>Your payment was rejected</br> 
                    please re-upload  your payment proof with a valid and clear image
                    <a href="https://aftbroker.unaux.com/login.html" class="btn btn-success">login</a>
                    </html>';
                    $mail->AltBody = 'Payment Rejected, login to re-upload your proof with a clear image <a href="https://aftbroker.unaux.com/login.html" class="btn btn-success">confirm now</a>';
    // Send email 
    if (!$mail->send()) {
        $data = 'failed_mail';
    } else {
        $data = 'success';
    }
} else {
    $data = 'failed';
}
header('content-Type: application/json');
echo json_encode($data);
