<?php
if(isset($_POST['createPost'])){

	$postTitle = $_POST['title'];
	$postAuthor = $_POST['postAuthor'];
	$postCatagoryId = $_POST['postCatagoryId'];
	$postStatus = $_POST['postStatus'];

	$postImage = $_FILES['postImage']['name'];
	$postImageTemp = $_FILES['postImage']['tmp_name'];

	$postTags = $_POST['postTags'];
	$postContent = $_POST['postContent'];
	$postDate = date('d-m-y');
	$postCommentCount = 4;

	move_uploaded_file($postImageTemp, "../images/$postImage"); //upload image source to image folder

	$query = "INSERT INTO posts(postCatagoryId, postTitle, postAuthor, postDate, postImage, postContent, postTags, postCommentCount, postStatus) ";

	$query .= "VALUES({$postCatagoryId},'{$postTitle}','{$postAuthor}',now(),'{$postImage}','{$postContent}','{$postTags}',{$postCommentCount},'{$postStatus}' ) ";
	$insertPostQuery = mysqli_query($connection, $query);

	queryCheck($insertPostQuery);

} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-gorup">
		<label for="PostCatagory">Post Catatory Id</label>
		<input type="text" class="form-control" name="postCatagoryId">
	</div>

	<div class="form-gorup">
		<label for="postAuthor">Post Author</label>
		<input type="text" class="form-control" name="postAuthor">
	</div>

	<div class="form-gorup">
		<label for="postStatus">Post Status</label>
		<input type="text" class="form-control" name="postStatus">
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
		
		<textarea class="form-control" name="postContent" id="" cols="30" rows="10"></textarea>
	</div>

	<div class="form-gorup">
		<input type="submit" class="btn btn-primary" name="createPost" value="Publish Post">
	</div>
	
</form>