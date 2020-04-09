<?php
$db['dbHost'] = "localhost";    //for better security the data of database is sent as a constant data using array
$db['dbUser'] = "root";
$db['dbPass'] = "";
$db['dbName'] = "cms";

foreach ($db as $key => $value) {
	 define(strtoupper($key),$value);
}



$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
// if($connection){
// 	echo "we are connected";
// }
?>