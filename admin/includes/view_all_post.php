<?php // cathing post id from check box for executing bulk options action
include ("delete_modal.php");
if(isset($_POST['checkBoxArry'])){

    foreach($_POST['checkBoxArry'] as $checkBoxPostId){

        $bulkOptions = $_POST['bulkOptions'];

        switch ($bulkOptions) {
            case 'published':
                $query = "UPDATE posts SET postStatus = '{$bulkOptions}' WHERE postId = {$checkBoxPostId}";
                $updatePostStatusPub = mysqli_query($connection, $query);
                queryCheck($updatePostStatusPub);
                break;

                case 'draft':
                $query = "UPDATE posts SET postStatus = '{$bulkOptions}' WHERE postId = {$checkBoxPostId}";
                $updatePostStatusDraft = mysqli_query($connection, $query);
                queryCheck($updatePostStatusDraft);
                break;

                case 'delete':
                $query = "DELETE FROM posts WHERE postId = {$checkBoxPostId}";
                $deletePosts = mysqli_query($connection, $query);
                queryCheck($deletePosts);
                break;

                case 'clone':
                $query = "SELECT * FROM posts WHERE postId = {$checkBoxPostId}";
                $selectPostsQuery = mysqli_query($connection, $query);
                queryCheck($selectPostsQuery);

                while($row = mysqli_fetch_array($selectPostsQuery)){ //fetching data usin loop
                
                $postUser = $row['postUser'];    
                $postTitle = $row['postTitle'];
                $postCatagoryId = $row['postCatagoryId'];
                $postStatus = $row['postStatus'];
                $postImage = $row['postImage'];
                $postTags = $row['postTags'];
                $postContent = $row['postContent'];
                $postDate = $row['postDate'];

            } //end while

            $query = "INSERT INTO posts(postCatagoryId, postTitle, postUser, postDate, postImage, postContent, postTags, postStatus) ";

    $query .= "VALUES({$postCatagoryId},'{$postTitle}','{$postUser}',now(),'{$postImage}','{$postContent}','{$postTags}','{$postStatus}' ) ";
    $copyPostQuery = mysqli_query($connection, $query);

    queryCheck($copyPostQuery);
                break;
            
            default:
                
                break;
        } // end of switch



    } //end foreach
} //end if

?>

<form action="" method="post">
    <table class="table table-bordered table-hover">
    <div id="bulkOptionContainer" class="col-xs-4">
        
        <select name="bulkOptions" class="form-control" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option> 
            <option value="clone">Clone</option> 
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
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
                    <th>View Posts</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Views</th>
                </tr>
            </thead>
        <tbody>
            <?php 

            $query = "SELECT * FROM posts ORDER BY postId DESC";
            $selectPosts = mysqli_query($connection,$query); //select all postsdata from database

            while($row = mysqli_fetch_assoc($selectPosts)){ //fetching data usin loop
                $postId = $row['postId'];
                $postAuthor = $row['postAuthor'];    
                $postUser = $row['postUser'];    
                $postTitle = $row['postTitle'];
                $postCatagoryId = $row['postCatagoryId'];
                $postStatus = $row['postStatus'];
                $postImage = $row['postImage'];
                $postTags = $row['postTags'];
                $postCommentCount = $row['postCommentCount'];
                $postDate = $row['postDate'];
                $postViewsCount = $row['postViewsCount'];
                //$postContent = $row['postContent'];

                echo "<tr>"; 
                ?> <!-- break Php -->

<td><input class='checkBoxes' type='checkbox' name='checkBoxArry[]' value='<?php echo $postId ?>'></td>

                <?php /*start again php*/

                echo "<td>{$postId}</td>";

                if(isset($postAuthor) && !empty($postAuthor)){
                   echo "<td>{$postAuthor}</td>"; 
               }else if(isset($postUser) && !empty($postUser)){
                   echo "<td>{$postUser}</td>";
                   }


                
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


                $query = "SELECT * FROM comments WHERE commentPostId = $postId";
                $commentCountQuery = mysqli_query($connection,$query);
                $row = mysqli_fetch_array($commentCountQuery);
                $commentId = $row['commentId'];
                queryCheck($commentCountQuery);
                $countComment = mysqli_num_rows($commentCountQuery);

                echo "<td><a href='post_comments.php?id=$postId'>{$countComment}</a></td>";


                echo "<td>{$postDate}</td>";
                echo "<td><a href='../post.php?p_id={$postId}'>View Post</a></td>";
                echo "<td><a href='posts.php?source=editPost&p_id={$postId}'>Edit</a></td>";
                //echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delet?'); \" href='posts.php?delete={$postId}'>Delete</a></td>";
                echo "<td><a rel='$postId' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                echo "<td><a href='posts.php?reset={$postId}'>{$postViewsCount}</a></td>";
                echo "</tr>"; 

        } //end while


            ?>


               
                
            
        </tbody>


        </table>
        </form>

        <?php 

        if(isset($_GET['reset'])){  //reset posts
            $getPostId = $_GET['reset'];
            $query = "UPDATE posts SET postViewsCount = 0 WHERE postId =" . mysqli_real_escape_string($connection, $getPostId) . " ";
                    $resetPost = mysqli_query($connection, $query);
                    header("Location: posts.php");
            $deletePost = mysqli_query($connection, $query);
            queryCheck($resetPost);

        }

        if(isset($_GET['delete'])){  //delete posts
            $getPostId = $_GET['delete'];
            $query = "DELETE FROM posts WHERE postId = {$getPostId}";
                    $delePost = mysqli_query($connection, $query);
                    header("Location: posts.php");
            $deletePost = mysqli_query($connection, $query);
            queryCheck($deletePost);

        }


?>

<script>
    

$(document).ready(function () {

    $(".delete_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "posts.php?delete="+ id +"";

        $(".modal_delete_link").attr("href", delete_url);
        $("#myModal").modal('show');

        
        //alert(delete_url);
    });
    //alert("hello");
    

});



</script>
<!-- <script src="js/jquery.js"></script> -->