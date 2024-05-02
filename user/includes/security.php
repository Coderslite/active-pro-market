<?php
if(!$_SESSION['email'])
{
	header('location:../authentication/login.html');
}

?>