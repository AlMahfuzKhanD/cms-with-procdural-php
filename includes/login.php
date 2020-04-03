<?php include "db.php"; ?>
<?php ob_start(); ?>
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

if($userName !== $dbUserName &&  $userPassword !== $dbUserPassword){
	header("Location: ../index.php");
}else if($userName == $dbUserName &&  $userPassword == $dbUserPassword){
header("Location: ../admin");
}else{
	header("Location: ../index.php");
}


?>