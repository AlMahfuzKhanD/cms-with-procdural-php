<?php
function redirect($location){
	return header("Location:" . $location);
}

function escape($string){
        global $connection;
        return mysqli_real_escape_string($connection,trim($string));
    }
function queryCheck($result){
		global $connection;
		if(!$result){
		die("QUERY FAILED" . mysqli_error($connection));
	}
	}

function userNameExists($username){
    global $connection;
    $query = "SELECT userName FROM users WHERE userName = '$username'";
    $result = mysqli_query($connection,$query);
    queryCheck($result);

    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function userEmailExists($email){
    global $connection;
    $query = "SELECT userEmail FROM users WHERE userEmail = '$email'";
    $result = mysqli_query($connection,$query);
    queryCheck($result);

    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function registerUser($userName,$email,$password){
	global $connection;

    $userName = mysqli_real_escape_string($connection, $userName);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

        //##i use password_hash function, i don't need this randsalt any more.

        /*$query = "SELECT randSalt FROM users";
        $selectRandSalt = mysqli_query($connection,$query);
        queryCheck($selectRandSalt);*/ 

        /*$row = mysqli_fetch_array($selectRandSalt);
        $salt = $row['randSalt']; //fetching randsalt from database
        $userPassword = crypt($userPassword,$salt); //encrypt password using crypt function*/

        $query = "INSERT INTO users(userRole, userName, userEmail, userPassword) ";

        $query .= "VALUES('subscriber','{$userName}','{$email}','{$password}' ) ";
        $registerUserQuery = mysqli_query($connection, $query);

        queryCheck($registerUserQuery);
        
       
    

}

function loginUser($userName,$userPassword){
	global $connection;
	$userName = trim($userName);
	$userPassword = trim($userPassword);


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

	
	redirect("/projects/cmsDevelopment/cms/admin");
}else{
	
	redirect("/projects/cmsDevelopment/cms");
	}

}





?>