<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'composer/vendor/autoload.php';

// require 'composer/vendor/phpmailer/phpmailer/src/Exception.php';
// require 'composer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'composer/vendor/phpmailer/phpmailer/src/SMTP.php';

include "db_config.php";
$transaction_id = $_POST['transaction_id'];
$email = $_POST['email'];

$query = "SELECT * FROM deposit WHERE transaction_id='$transaction_id'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);
if ($num == 1) {



    if (!empty($_FILES['file'])) {

        // File upload configuration 
        $targetDir = "../../payment_images/";
        $allowTypes = array('jpg', 'jpeg', 'png');
        // $allowTypes = strtolower($allowTypes); 

        // $fileName = basename($_FILES['file']['name']); 
        $temp = explode(".", strtolower($_FILES["file"]["name"]));
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $newfilename;
        // Check whether file type is valid 
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server 
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $query = mysqli_query($con, "UPDATE deposit SET status = 'pending', image = '$newfilename' WHERE transaction_id = '$transaction_id'");

                if ($query) {
                    
                    
                    //                     $mail = new PHPMailer();
                    // // configure an SMTP
                    // $mail->isSMTP();
                    // $mail->Host = 'localhost';
                    // $mail->SMTPAuth = false;
                    // $mail->SMTPAutoTLS = false; 
                    // $mail->Port = 25; 
                    
                    // $mail->setFrom('support@Autoglobalfx.com', 'Active Pro Market');
                    // $mail->addAddress('abrahamgreatebele@gmail.com', 'Admin');
                    // $mail->Subject = 'Payment Confirmation Request!';
                    // // Set HTML
                    // $mail->isHTML(TRUE);
                    // $mail->Body = '<html>Some amount of USD has been made to your account</br> 
                    // <h2>'.'Transaction ID : '.$transaction_id.'</h2>
                    // <h2>'.'Email: '.$email.'</h2>
                    // <a href="https://aftbroker.unaux.com/login.html" class="btn btn-success">confirm now</a>
                    // </html>';
                    // $mail->AltBody = 'Payment confirmation requested, login to verify <a href="http://aftbroker.unaux.com/login.html" class="btn btn-success">confirm now</a>';
                    
                    

                    // // Send email 
                    // if (!$mail->send()) {
                    //     // echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
                    //     $data = 'success';
                    // } else {
                        $data = 'success';
                    // }
                } else {
                    $data = 'failed';
                }
            }
        }
    }
}
else{
    $data = 'notExist';

}


header('content-Type: application/json');
echo json_encode($data);

?>