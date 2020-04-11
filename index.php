
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

                $per_page = 2;

                //code for pagination
                if(isset($_GET['page'])){

                    
                    $page = $_GET['page'];

                }else{

                    $page = "";
                }

                if($page == "" || $page == 1){
                    $page1 = 0;
                }else{
                    $page1 = ($page * $per_page) -$per_page;

                }


                $postQueryCount = "SELECT * FROM posts";
                $findCountQuery = mysqli_query($connection,$postQueryCount);
                $count = mysqli_num_rows($findCountQuery);
                $count = ceil($count/$per_page); //ceil used to round up


                //end code for pagination



                $query = "SELECT * FROM posts LIMIT $page1, $per_page";  //fetching data from posts table
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

                <!-- <h1><?php //echo $count?></h1> --> <!-- testing count -->
                <h2>
                    <a href="post.php?p_id=<?php echo $postId?>"><?php echo $postTitle?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $postAuthor?>&p_id=<?php echo $postId?>"><?php echo $postAuthor?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $postDate?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $postId?>"><img class="img-responsive" src="images/<?php echo $postImage?>" alt="Image Not Found"></a>
                <hr> 
                <p><?php echo $postContent?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $postId?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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
        <ul class="pager">
            <?php
            for($i = 1;$i<=$count;$i++){
                echo "<li><a href='index.php?page=$i'>{$i}</a></li>";
            }


            ?>
        </ul>
<?php
include "includes/footer.php"; 
?>       