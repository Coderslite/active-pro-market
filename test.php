<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="GET">
        <input type="text" placeholder="first name" name="fname">
        <input type="text" placeholder="last name" name="lname">
        <input type="text" placeholder="email" name="email">
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>

<?php
if(isset($_GET['submit'])){
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    echo "clicked";
    echo '<a href="confirm_registration.php?username='.$fname.' '.$lname.'&email='.$email.'">hi, clicked</a>';
//   echo '<a href="confirm_registration.php?username='.$email.'&name='.$fname.'>click here</a>';
}
?>