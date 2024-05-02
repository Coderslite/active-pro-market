<?php
session_start();
include "db_config.php";
include "session.php";
$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE withdraw SET status = 'confirmed' WHERE id = '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Withdraw Accepted";
    header('location:../withdraw_confirmation.php');
}
else{
    $_SESSION['ErrorMessage'] = "Failed to Update Transaction Status";
    header('location:../withdraw_confirmation.php');
}

?>