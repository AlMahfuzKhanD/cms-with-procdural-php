<?php
if(isset($_POST['createUser'])){

	 
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

	$query = "INSERT INTO users(userFirstName, userLastName, userRole, userName, userEmail, userPassword, userStatus) ";

	$query .= "VALUES('{$userFirstName}','{$userLastName}','{$userRole}','{$userName}','{$userEmail}','{$userPassword}', 'Denied' ) ";
	$insertUserQuery = mysqli_query($connection, $query);

	queryCheck($insertUserQuery);

} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="userFirstName">First Name</label>
		<input type="text" class="form-control" name="userFirstName">
	</div>

	<div class="form-gorup">
		<label for="userLastName">Last Name</label>
		<input type="text" class="form-control" name="userLastName">
	</div>

	<div class="form-gorup">
	
		<label for="userRole">User Role</label>
		
	 
		<select class="form-control" name="userRole" id="userRole">
			<option value="Subscriber">Select Options</option>
			<option value="Admin">Admin</option>
			<option value="Subscriber">Subscriber</option>
		</select>
		


	</div>

	

	<!-- <div class="form-gorup">
		<label for="postImage">Post Image</label>
		<input type="file" name="postImage">
	</div> -->

	<div class="form-gorup">
		<label for="userName">User Name</label>
		<input type="text" class="form-control" name="userName">
	</div>

	<div class="form-gorup">
		<label for="userEmail">Email</label>
		<input type="email" class="form-control" name="userEmail">
	</div>

	<div class="form-gorup">
		<label for="userPassword">Password</label>
		<input type="password" class="form-control" name="userPassword">
	</div>

	<div class="form-gorup">
		<input type="submit" class="btn btn-primary" name="createUser" value="Add User">
	</div>
	
</form>