
<?php
include "includes/header.php"; 
include "includes/navigation.php";
//include "admin/functions.php" 
?>
    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                if(isset($_GET['p_id'])){   //collecting individual post id
                $individualPostId = $_GET['p_id'];

                $query = "UPDATE posts SET postViewsCount = postViewsCount + 1 WHERE postId = $individualPostId";
                $sendQuery = mysqli_query($connection,$query);
                queryCheck($sendQuery);
                

                $query = "SELECT * FROM posts WHERE postId = $individualPostId";  //fetching individual post from posts table
                $selectAllPostsQuery = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_assoc($selectAllPostsQuery)){  //collecting all data using while loop
                        $postTitle = $row['postTitle'];
                        $postAuthor = $row['postAuthor'];
                        $postDate = $row['postDate'];
                        $postImage = $row['postImage'];
                        $postContent = $row['postContent'];
                        
                        ?>

                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $postTitle?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $postImage?>" alt="Image Not Found">
                <hr>
                <p><?php echo $postContent?></p>
                

                <hr>

<?php    } 



}else{
    header("Location: index.php");
}



 ?>

<!-- Blog Comments -->

<?php

    if(isset($_POST['createComment'])){

        $individualPostId = $_GET['p_id'];  //cathing data from comment form

        $commentAuthor = $_POST['commentAuthor'];
        $commentEmail = $_POST['commentEmail'];
        $commentContent = $_POST['commentContent'];

        if(!empty($commentAuthor) && !empty($commentEmail) && !empty($commentContent)){

                $query = "INSERT INTO comments (commentPostId, commentAuthor, commentEmail, commentContent, commentStatus, commentDate)";
                $query .= "VALUES ($individualPostId ,'{$commentAuthor}', '{$commentEmail}', '{$commentContent}', 'Denied', now())";
                $createCommentQuery = mysqli_query($connection, $query);
                queryCheck($createCommentQuery);


                 //previous comment count code
                /*$query = "UPDATE posts SET postCommentCount = postCommentCount + 1 "; //increasing comment count +1 after every new comment
                $query .= "WHERE postId = $individualPostId";

                $updateCommentCount = mysqli_query($connection, $query);*/

                }else{
                    echo "<script>alert('Fields cannot be empty');</script>";
                }

            } 

        ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input class="form-control" type="text" name="commentAuthor" placeholder="Write your Name">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input class="form-control" type="email" name="commentEmail" placeholder="Put your Email">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Your Comment</label>
                            <textarea name="commentContent" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="createComment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                            $query = "SELECT * FROM comments WHERE commentPostId = $individualPostId ";
                            $query .= "AND commentStatus = 'Approved' ";
                            $query .= "ORDER BY commentId DESC ";
                                $selectIndividualCommentsQuery = mysqli_query($connection,$query); //select individual comment data from database
                                queryCheck($selectIndividualCommentsQuery);

                                while($row = mysqli_fetch_array($selectIndividualCommentsQuery)){  //collecting all data using while loop
                                   
                                        
                                    $commentAuthor = $row['commentAuthor'];
                                    $commentContent = $row['commentContent'];
                                    $commentDate = $row['commentDate'];
                                    ?>

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $commentAuthor;?>
                                                <small><?php echo $commentDate;?> </small>
                                            </h4>
                                             <?php echo $commentContent;?>
                                        </div>
                                    </div>

                                <?php } ?>

                                    
                



                <!-- Comment -->
                



 
                

                

                
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->

<?php
include "includes/sidebar.php"; 
?> 

            </div>
        <!-- /.row -->

        <hr>
<?php
include "includes/footer.php"; 
?>       