<?php 
if(isset($_GET['u_id'])){
	$getUserId = $_GET['u_id'];

	$query = "SELECT * FROM users WHERE userId = {$getUserId}";
    $selectUsersById = mysqli_query($connection,$query); //select all postsdata from database

    while($row = mysqli_fetch_assoc($selectUsersById)){ //fetching data usin loop
        $userId = $row['userId'];
        $userName = $row['userName'];    
        
        $userPassword = $row['userPassword'];
        $userFirstName = $row['userFirstName'];
        
        $userLastName = $row['userLastName'];
        $userEmail = $row['userEmail'];
        $userImage = $row['userImage'];
        $userRole = $row['userRole'];
        $userStatus = $row['userStatus'];
    }

}else{
	header("Location: index.php");
}

?>


<?php
if(isset($_POST['editUser'])){

	 
	$userFirstName = $_POST['userFirstName'];
	$userLastName = $_POST['userLastName']; 
	$userRole = $_POST['userRole'];

	// $useerImage = $_FILES['useerImage']['name'];
	// $useerImageTemp = $_FILES['useerImage']['tmp_name'];

	$userName = $_POST['userName'];
	$userEmail = $_POST['userEmail'];
	$userPassword = $_POST['userPassword'];
	//$postDate = date('d-m-y');
	

	//move_uploaded_file($postImageTemp, "../images/$postImage"); //upload image source to image folder

	//rand salt query

	/*$query = "SELECT randSalt FROM users";
    $selectRandSalt = mysqli_query($connection,$query);
    queryCheck($selectRandSalt);

    $row = mysqli_fetch_array($selectRandSalt);
    $salt = $row['randSalt']; //fetching randsalt from database
    $hashedPassword = crypt($userPassword,$salt); //encrypt password using crypt*/ 

    $userPassword = mysqli_real_escape_string($connection, $userPassword);

    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 12));




// update query
	$query = "UPDATE users SET ";
    $query .= "userFirstName = '{$userFirstName}', ";
    $query .= "userLastName = '{$userLastName}', ";
    $query .= "userRole = '{$userRole}', ";
    $query .= "userName = '{$userName}', ";
    $query .= "userEmail = '{$userEmail}', ";
    $query .= "userPassword = '{$hashedPassword}' ";
    $query .= "WHERE userId = {$getUserId}";

    $updateUser = mysqli_query($connection,$query);
    queryCheck($updateUser);

    header("Location:users.php");

} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="userFirstName">First Name</label>
		<input value="<?php echo $userFirstName;?>" type="text" class="form-control" name="userFirstName">
	</div>

	<div class="form-gorup">
		<label for="userLastName">Last Name</label>
		<input value="<?php echo $userLastName;?>" type="text" class="form-control" name="userLastName">
	</div>

	<div class="form-gorup">
	
		<label for="userRole">User Role</label>
		
	 
		<select class="form-control" name="userRole" id="userRole">
			<option value='<?php echo $userRole;?>'><?php echo $userRole;?></option>

			<?php 

			if($userRole == 'Admin'){
				echo "<option value='Subscriber'>Subscriber</option>";
			}else{
				echo "<option value='Admin'>Admin</option>";
			}

			?>
		</select>
		


	</div>

	

	<!-- <div class="form-gorup">
		<label for="postImage">Post Image</label>
		<input type="file" name="postImage">
	</div> -->

	<div class="form-gorup">
		<label for="userName">User Name</label>
		<input value="<?php echo $userName;?>" type="text" class="form-control" name="userName">
	</div>

	<div class="form-gorup">
		<label for="userEmail">Email</label>
		<input value="<?php echo $userEmail;?>" type="email" class="form-control" name="userEmail">
	</div>

	<div class="form-gorup">
		<label for="userPassword">Password</label>
		<input value="<?php echo $userPassword;?>" type="password" class="form-control" name="userPassword">
	</div>

	<div class="form-gorup">
		<input type="submit" class="btn btn-primary" name="editUser" value="Update User">
	</div>
	
</form>