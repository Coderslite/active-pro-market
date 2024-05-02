<?php
session_start();
include "db_config.php";
include "session.php";
$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE deposit SET status = 'confirmed' WHERE id = '$id'");
if($query){
    $_SESSION['SuccessMessage'] = "Deposit Accepted";
    header('location:../deposit_confirmation.php');
}
else{
    $_SESSION['ErrorMessage'] = "Failed to Update Transaction Status";
    header('location:../deposit_confirmation.php');
}

?>