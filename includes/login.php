<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../home_functions.php"; ?>


<?php

if (isset($_POST['createLogin'])) {
	$userName = $_POST['userName'];
	$userPassword = $_POST['userPassword'];
}

$userName = mysqli_real_escape_string($connection, $userName);
$userPassword = mysqli_real_escape_string($connection, $userPassword);

$query = "SELECT * FROM users WHERE userName ='{$userName}'";
$selectUserQury = mysqli_query($connection,$query);
queryCheck($selectUserQury);

while($row = mysqli_fetch_array($selectUserQury)){
	$dbUserName = $row['userName'];
	$dbUserPassword = $row['userPassword'];
	$dbUserFirstName = $row['userFirstName'];
	$dbUserLastName = $row['userLastName'];
	$dbUserRole = $row['userRole'];
	
}
//checking login info with database
if($userName === $dbUserName &&  $userPassword === $dbUserPassword){
	$_SESSION['userName'] = $dbUserName; //set session
	$_SESSION['userFirstName'] = $dbUserFirstName; //set session
	$_SESSION['userLastName'] = $dbUserLastName; //set session
	$_SESSION['userRole'] = $dbUserRole; //set session

	header("Location: ../admin");
}else{
	header("Location: ../index.php");
}


?>