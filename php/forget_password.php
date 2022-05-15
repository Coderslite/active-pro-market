<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';
include "db_config.php";

$email = $_POST['email'];

$checkQuery = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' ");
$num=mysqli_num_rows($checkQuery);
if ($num != 1){
    $result = "not_exist";
}
else{        
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
        $mail->Subject = 'Reset Password';

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
        Password reset requested.  <br> click on the link below to change your password
        <a href="https://www.activepromarket.com/reset_password.php?email='.$email.'">reset password</a>
        </body>
        </html>';
        $mail->AltBody = 'Password reset requested.  <br> click on the link below to change your password <a href="https://www.activepromarket.com/reset_password.php?email='.$email.'">reset password</a>';
        if($mail->send()){
                  // $_SESSION['email'] = $email;
                   $result= 'success';
                    }
                    else{
                    $data = 'failed';
                    }
}

header('content-Type: application/json');
echo json_encode($result);
// echo $upload; 
 

?>