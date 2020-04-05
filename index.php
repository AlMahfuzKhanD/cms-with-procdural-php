
<?php
include "includes/header.php"; 
include "includes/navigation.php"; 
?>
    <!-- Navigation -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                $query = "SELECT * FROM posts";  //fetching data from posts table
                $selectAllPostsQuery = mysqli_query($connection,$query); 
                while($row = mysqli_fetch_assoc($selectAllPostsQuery)){  //collecting all data using while loop
                        $postId = $row['postId'];
                        $postTitle = $row['postTitle'];
                        $postAuthor = $row['postAuthor'];
                        $postDate = $row['postDate'];
                        $postImage = $row['postImage'];
                        $postContent = substr($row['postContent'], 0,100);
                        $postStatus = $row['postStatus'];

                        if($postStatus == 'published'){
                            


                        
                        ?>

                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $postId?>"><?php echo $postTitle?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $postAuthor?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $postId?>"><img class="img-responsive" src="images/<?php echo $postImage?>" alt="Image Not Found"></a>
                <hr>
                <p><?php echo $postContent?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php    } } ?>

                

                
                
                

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