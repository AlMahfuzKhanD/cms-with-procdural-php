<?php
if(isset($_POST['createPost'])){

	$postTitle = $_POST['title'];
	$postUser = $_POST['postUser'];
	$postCatagoryId = $_POST['postCatagory'];
	$postStatus = $_POST['postStatus'];

	$postImage = $_FILES['postImage']['name'];
	$postImageTemp = $_FILES['postImage']['tmp_name'];

	$postTags = $_POST['postTags'];
	$postContent = $_POST['postContent'];
	$postDate = date('d-m-y');
	

	move_uploaded_file($postImageTemp, "../images/$postImage"); //upload image source to image folder

	$query = "INSERT INTO posts(postCatagoryId, postTitle, postUser, postDate, postImage, postContent, postTags, postStatus) ";

	$query .= "VALUES({$postCatagoryId},'{$postTitle}','{$postUser}',now(),'{$postImage}','{$postContent}','{$postTags}','{$postStatus}' ) ";
	$insertPostQuery = mysqli_query($connection, $query);

	queryCheck($insertPostQuery);

	$getPostId = mysqli_insert_id($connection); // pullling last id from database

	echo "<p class='bg-success'>Post Added.<a href='../post.php?p_id=$getPostId'>View Posts</a> OR <a href='posts.php'>View All Posts</a></p>";

} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-gorup">

		<label for="postCatagory">Post Catagory</label>
		

		<select class="form-control" name="postCatagory" id="postCatagory">
			<?php

			$query = "SELECT * FROM catagories";
	                $selectCatagories = mysqli_query($connection,$query); //select all catagory data from database

	                queryCheck($selectCatagories);

	                while($row = mysqli_fetch_assoc($selectCatagories)){ //fetching data usin loop
		                $catId = $row['catId'];    
		                $catTitle = $row['catTitle'];

		                echo "<option value='{$catId}'>{$catTitle}</option>";
		            }

		 
			?>
		</select>
		


	</div>

	<!-- <div class="form-gorup">
		<label for="postAuthor">Post Author</label>
		<input type="text" class="form-control" name="postAuthor">
	</div> -->
	<div class="form-gorup">

		<label for="postUser">Post Users</label>
		

		<select class="form-control" name="postUser" id="postUser">
			<?php

			$query = "SELECT * FROM users";
	                $selectUsers = mysqli_query($connection,$query); //select all users data from database

	                queryCheck($selectUsers);

	                while($row = mysqli_fetch_assoc($selectUsers)){ //fetching data usin loop
		                $userId = $row['userId'];    
		                $userName = $row['userName'];

		                echo "<option value='{$userName}'>{$userName}</option>";
		            }

		 
			?>
		</select>
		


	</div>

	<div class="form-gorup">
		<label for="postStatus">Post Status</label>
		<select class="form-control" name="postStatus" id="">
			
			<option value="draft">Slect Option</option>
			<option value="published">Publish</option>
			<option value="draft">Draft</option>
		</select>
	</div>

	<div class="form-gorup">
		<label for="postImage">Post Image</label>
		<input type="file" name="postImage">
	</div>

	<div class="form-gorup">
		<label for="postTags">Post Tags</label>
		<input type="text" class="form-control" name="postTags">
	</div>

	<div class="form-gorup">
		<label for="postContent">Post Content</label>
		
		<textarea class="form-control" name="postContent" id="body" cols="30" rows="10"></textarea>
	</div>

	<div class="form-gorup">
		<input type="submit" class="btn btn-primary" name="createPost" value="Publish Post">
	</div>
	
</form>