<?php

if(isset($_GET['p_id'])){
	$getPostId = $_GET['p_id'];


}

$query = "SELECT * FROM posts";
                                $selectPostsById = mysqli_query($connection,$query); //select all postsdata from database

                                while($row = mysqli_fetch_assoc($selectPostsById)){ //fetching data usin loop
                                    $postId = $row['postId'];
                                    $postAuthor = $row['postAuthor'];    
                                    $postTitle = $row['postTitle'];
                                    $postCatagoryId = $row['postCatagoryId'];
                                    $postStatus = $row['postStatus'];
                                    $postImage = $row['postImage'];
                                    $postTags = $row['postTags'];
                                    $postCommentCount = $row['postCommentCount'];
                                    $postDate = $row['postDate'];
                                    $postContent = $row['postContent'];
                                }



if(isset($_POST['updatePost'])){


} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="title">Post Title</label>
		<input value="<?php echo $postTitle;?>" type="text" class="form-control" name="title">
	</div>

	<div class="form-gorup">

		<select name="postCatagory" id="postCatagory">
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

	<div class="form-gorup">
		<label for="postAuthor">Post Author</label>
		<input value="<?php echo $postAuthor;?>" type="text" class="form-control" name="postAuthor">
	</div>

	<div class="form-gorup">
		<label for="postStatus">Post Status</label>
		<input value="<?php echo $postStatus;?>" type="text" class="form-control" name="postStatus">
	</div>

	<div class="form-gorup">
		<img width="100" src="../images/<?php echo $postImage;?>" alt="">
	</div>

	<div class="form-gorup">
		<label for="postTags">Post Tags</label>
		<input value="<?php echo $postTags;?>" type="text" class="form-control" name="postTags">
	</div>

	<div class="form-gorup">
		<label for="postContent">Post Content</label>
		
		<textarea  class="form-control" name="postContent" id="" cols="30" rows="10"><?php echo $postContent;?></textarea>
	</div>

	<div class="form-gorup">
		<input type="submit" class="btn btn-primary" name="updatePost" value="Update Post">
	</div>
	
</form>