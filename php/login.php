<?php
session_start();
include "db_config.php";


$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM users WHERE email='$email' && password='$password'";
    $result= mysqli_query($con, $query);
     $num=mysqli_num_rows($result);
     if ($num==1){
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['role']=='user'){
                    if($row['status']== 'blocked'){
                        $data = 'blocked';
                    }
                    else if($row['status']== 'active'){             
                    // create a new object
                //     $mail = new PHPMailer();
                //     // configure an SMTP
                //     $mail->isSMTP();
                //     $mail->Host = 'localhost';
                //     $mail->SMTPAuth = false;
                //     $mail->SMTPAutoTLS = false; 
                //     $mail->Port = 25; 
                    
                //     $mail->setFrom('support@Autoglobalfx.com', 'Active Pro Market');
                //     $mail->addAddress($email, 'Me');
                //     $mail->Subject = 'Login Successful!';
                //     // Set HTML
                //     $mail->isHTML(TRUE);
                //     $mail->Body = '<html>Hi there, we detected a login reject to your dashboard</br> Please verify if its you, ignorre the message, else, login to your dashboard to change you password</html>';
                //     $mail->AltBody = 'Login requested dectected on your dashboard, ignore the message if its you, else login in to change your password.';
                //     // add attachment
                //     // $mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
                //    // Send email 
                //    if($mail->send()){
                   $_SESSION['email'] = $email;
                   $data = 'user';
                //    }
                //    else{
                //    $data = 'failed_mail';
                //    }
                }
                else if($row['status']=='pending'){
                    $data = 'pending';

            }
        }
                else if($row['role']=='admin'){
                 $_SESSION['email'] = $email;
                 $data = 'admin';
                }
            }
     }
     else{
         $data = 'failed';
     }

     header('content-Type: application/json');
     echo json_encode($data);
     // echo $upload; 
 

?>