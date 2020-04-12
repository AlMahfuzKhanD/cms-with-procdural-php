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

//$userPassword = crypt($userPassword,$dbUserPassword); // decrypting password by replacing randsalt value with the original password(we don't use rand salt anymore. besides we use password_hash function)

 

//checking login info with database
//previous logic was if($userName === $dbUserName &&  $userPassword === $dbUserPassword)
if(password_verify($userPassword, $dbUserPassword)) {

	$_SESSION['userName'] = $dbUserName; //set session
	$_SESSION['userFirstName'] = $dbUserFirstName; //set session
	$_SESSION['userLastName'] = $dbUserLastName; //set session
	$_SESSION['userRole'] = $dbUserRole; //set session

	header("Location: ../admin");
}else{
	header("Location: ../index.php");
}


?>