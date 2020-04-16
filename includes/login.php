<?php session_start(); ?>
<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php include "../home_functions.php"; ?>


<?php

if (isset($_POST['createLogin'])) {

	loginUser($_POST['userName'],$_POST['userPassword']);
	
}
?>