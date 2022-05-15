<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';
include "db_config.php";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$password = $_POST['pass'];
$package = $_POST['package'];
$currency = $_POST['cur'];
$phone = $_POST['phone'];

$checkQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
$num=mysqli_num_rows($checkQuery);
if ($num==1){
    $result = "exist";
}
else{

    $query = mysqli_query($con,"INSERT INTO users(firstname,lastname,email,gender,country,password,package,phone_number,currency,role,status)VALUES('$fname','$lname','$email','$gender','$country','$password','$package','$phone','$currency','user','pending')");


    if($query){
        
        $mail = new PHPMailer();
        // configure an SMTP
        $mail->isSMTP();
        $mail->Host = 'localhost';
        $mail->SMTPAuth = false;
        $mail->SMTPAutoTLS = false; 
        $mail->Port = 25;
        // Sender info 
        $mail->setFrom('support@activepromarket.com', 'Active Pro Market');
        
        // Add a recipient 
        $mail->addAddress($email, 'Me');
        
        // Set email format to HTML 
        $mail->isHTML(true); 
        
        // Mail subject 
        $mail->Subject = 'Account Created';

        // Mail body content 
        // $bodyContent = 
        // '<html>
        // <head>
        // </head>
        // <body>
        // <h2>Account Created Successful</h2>
        // <h5>Dear '.$fname.' '.$lname.', '.'your account has been created successful, click the link below to activate your account.</h5>
        // <a href="https://www.activepromarket.com?username='.$fname .' '.$lname.'&email='.$email.'>activate now</a>
        // <body>
        // </html>';
        // $bodyContent .= $template; 
        // $mail->Body = $bodyContent;
        $mail->Body = '<html>
        <head></head>
        <body>
        Account created. <br> 
        <a href="https://www.activepromarket.com/php/confirm_registration.php?username='.$fname.'&email='.$email.'>activate now</a>
        </body>
        </html>';
        $mail->AltBody = 'Account Successfully created <a href="https://www.activepromarket.com/php/confirm_registration.php?username='.$fname.'&email='.$email.'">activate now</a>';
        if($mail->send()){
                  // $_SESSION['email'] = $email;
                   $result= 'success';
                    }
                    else{
                    $data = 'failed';
                    }
    }
    else{
        $result = "failed";
    }
}

header('content-Type: application/json');
echo json_encode($result);
// echo $upload; 
 

?>