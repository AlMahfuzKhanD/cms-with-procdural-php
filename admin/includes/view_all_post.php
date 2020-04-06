<?php // cathing post id from check box for executing bulk options action
if(isset($_POST['checkBoxArry'])){
    echo "recievieng data";
}

?>

<form action="" method="post">
    <table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class="col-xs-4">
        
        <select name="" class="form-control" id="">
            <option value="">Select Options</option>
            <option value="">Publish</option>
            <option value="">Draft</option>
            <option value="">Delete</option> 
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="apply">
        <a class="btn btn-primary" href="add_post.php">Add New</a>
    </div>




            <thead>
                <tr>
                    <th><input id="selectAllBoxes" type="checkbox"></th>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Catagory</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
        <tbody>
            <?php 

            $query = "SELECT * FROM posts";
            $selectPosts = mysqli_query($connection,$query); //select all postsdata from database

            while($row = mysqli_fetch_assoc($selectPosts)){ //fetching data usin loop
                $postId = $row['postId'];
                $postAuthor = $row['postAuthor'];    
                $postTitle = $row['postTitle'];
                $postCatagoryId = $row['postCatagoryId'];
                $postStatus = $row['postStatus'];
                $postImage = $row['postImage'];
                $postTags = $row['postTags'];
                $postCommentCount = $row['postCommentCount'];
                $postDate = $row['postDate'];
                //$postContent = $row['postContent'];

                echo "<tr>"; 
                ?> <!-- break Php -->

<td><input class='checkBoxes' type='checkbox' name='checkBoxArry[]' value='<?php echo $postId ?>'></td>

                <?php /*start again php*/

                echo "<td>{$postId}</td>";
                echo "<td>{$postAuthor}</td>";
                echo "<td>{$postTitle}</td>";

                $query = "SELECT * FROM catagories WHERE catId = {$postCatagoryId}";
                $selectCatagoriesUpdate = mysqli_query($connection,$query); //select all catagory data from database

                while($row = mysqli_fetch_assoc($selectCatagoriesUpdate)){ //fetching data usin loop
                    $catId = $row['catId'];    
                    $catTitle = $row['catTitle'];


                echo "<td>{$catTitle}</td>";
            }


                echo "<td>{$postStatus}</td>";
                echo "<td><img width='100' src='../images/{$postImage}' alt = 'image'></td>";
                echo "<td>{$postTags}</td>";
                echo "<td>{$postCommentCount}</td>";
                echo "<td>{$postDate}</td>";
                echo "<td><a href='posts.php?source=editPost&p_id={$postId}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$postId}'>Delete</a></td>";
                echo "</tr>";

        } 


            ?>


               
                
            
        </tbody>


        </table>
        </form>

        <?php 

        if(isset($_GET['delete'])){  //delete posts
            $getPostId = $_GET['delete'];
            $query = "DELETE FROM posts WHERE postId = {$getPostId}";
                    $delePost = mysqli_query($connection, $query);
                    header("Location: posts.php");
            $deletePost = mysqli_query($connection, $query);
            queryCheck($deletePost);

        }


?>