<?php

if(isset($_GET['p_id'])){
	$getPostId = $_GET['p_id'];


}

$query = "SELECT * FROM posts WHERE postId = {$getPostId}";
                                $selectPostsById = mysqli_query($connection,$query); //select all postsdata from database

                                while($row = mysqli_fetch_assoc($selectPostsById)){ //fetching data usin loop
                                    $postId = $row['postId'];
                                    $postUser = $row['postUser'];    
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

	$postTitle = $_POST['title'];
	$postUser = $_POST['postUser'];
	$postCatagoryId = $_POST['postCatagory'];
	$postStatus = $_POST['postStatus'];

	$postImage = $_FILES['postImage']['name'];
	$postImageTemp = $_FILES['postImage']['tmp_name'];

	$postTags = $_POST['postTags'];
	$postContent = $_POST['postContent'];
	move_uploaded_file($postImageTemp, "../images/$postImage");

	if(empty($postImage)){

		$query = "SELECT * FROM posts WHERE postId = $getPostId";
		$selectImage = mysqli_query($connection, $query);
		

		while ($row = mysqli_fetch_array($selectImage)){
            $postImage = $row['postImage'];
        }


	}

	//update post query

	$query = "UPDATE posts SET postTitle='{$postTitle}' ,";
    $query .= "postCatagoryId='{$postCatagoryId}' ,";
    $query .= "postDate= now(),";
    $query .= "postUser='{$postUser}' ,";
    $query .= "postStatus='{$postStatus}' ,";
    $query .= "postTags='{$postTags}' ,";
    $query .= "postContent='{$postContent}' ,";
    $query .= "postImage='{$postImage}' ";
    $query .= "WHERE postId={$getPostId}";

    $update_post = mysqli_query($connection,$query);
    queryCheck($update_post);

    echo "<p class='bg-success'>Post Updated.<a href='../post.php?p_id=$getPostId'>View Posts</a> OR <a href='posts.php'>Edit More Posts</a></p>";

    //header("Location:posts.php");
	

} 

?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-gorup">
		<label for="title">Post Title</label>
		<input value="<?php echo $postTitle;?>" type="text" class="form-control" name="title">
	</div>

	<div class="form-gorup">

		<label for="postCatagory">Post Catagory</label>
		

		<select class="form-control" name="postCatagory" id="postCatagory">
			<?php

			$query = "SELECT * FROM catagories";
	                $selectCatagories = mysqli_query($connection,$query); //select all catagory data from database

	                queryCheck($selectCatagories);

	                while($row = mysqli_fetch_assoc($selectCatagories)){ //fetching data using loop
		                $catId = $row['catId'];    
		                $catTitle = $row['catTitle'];

		                

		                if($catId == $postCatagoryId){
		                	
		                echo "<option selected value='{$catId}'>{$catTitle}</option>";
		                }else{
		                	echo "<option value='{$catId}'>{$catTitle}</option>";
		                }
		            }

		 
			?>
		</select>
		


	</div>

	<!-- <div class="form-gorup">
		<label for="postAuthor">Post Author</label>
		<input value="<?php echo $postAuthor;?>" type="text" class="form-control" name="postAuthor">
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

		                
		                if($userName == $postUser){
		                	
		                echo "<option selected value='{$userName}'>{$userName}</option>";
		                }else{
		                	echo "<option value='{$userName}'>{$userName}</option>";
		                }
		            }

		 
			?>
		</select>
		


	</div>

	
	<div class="form-gorup">
		<label for="postStatus">Post Status</label>
		<select class="form-control" name="postStatus" id="">
		<option value='<?php echo $postStatus;?>'><?php echo $postStatus;?></option>
		<?php

		if($postStatus == 'published'){
				echo "<option value='draft'>Draft</option>";
			}else{
				echo "<option value='published'>Publish</option>";
			} 

		?>
		
	</select>
	</div>


	<div class="form-gorup">
		<label for="postImage">Post Image</label>
		<input type="file" name="postImage">
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