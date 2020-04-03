

<?php session_start(); ?>
<?php 

$_SESSION['userName'] = null; //destroying session
$_SESSION['userFirstName'] = null;
$_SESSION['userLastName'] = null;
$_SESSION['userRole'] = null;

header("Location: ../index.php");

?>