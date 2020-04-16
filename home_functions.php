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

    if(!empty($userName) && !empty($userEmail) && !empty($userPassword)){

        $userName = mysqli_real_escape_string($connection, $userName);
        $userEmail = mysqli_real_escape_string($connection, $userEmail);
        $userPassword = mysqli_real_escape_string($connection, $userPassword);

        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 12));

        //##i use password_hash function, i don't need this randsalt any more.

        /*$query = "SELECT randSalt FROM users";
        $selectRandSalt = mysqli_query($connection,$query);
        queryCheck($selectRandSalt);*/ 

        /*$row = mysqli_fetch_array($selectRandSalt);
        $salt = $row['randSalt']; //fetching randsalt from database
        $userPassword = crypt($userPassword,$salt); //encrypt password using crypt function*/

        $query = "INSERT INTO users(userRole, userName, userEmail, userPassword) ";

        $query .= "VALUES('subscriber','{$userName}','{$userEmail}','{$userPassword}' ) ";
        $registerUserQuery = mysqli_query($connection, $query);

        queryCheck($registerUserQuery);
        //$messege = "Your registration has been submitted";
       
    }else{//end nested if
        //$messege = "Fields cannot be empty";
    }

}

function loginUser(){
	
}




?>