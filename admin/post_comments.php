<?php include "includes/admin_header.php"?>


    <div id="wrapper">
 
        <!-- Navigation -->

        <?php include "includes/admin_nav.php"?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            
            <th>Date</th>
            <th>Apporve</th>
            <th>Deny</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

    if(isset($_GET['id'])){   //collecting individual post id
    $getPostId = $_GET['id'];
    $getPostId = mysqli_real_escape_string($connection, $getPostId);  

        $query = "SELECT * FROM comments WHERE commentPostId = $getPostId";
        $selectComments = mysqli_query($connection,$query); //select all comment data from database

        while($row = mysqli_fetch_assoc($selectComments)){ //fetching data usin loop
            $commentId = $row['commentId'];
            $commentPostId = $row['commentPostId'];    
            $commentAuthor = $row['commentAuthor'];
            $commentContent = $row['commentContent'];
            $commentEmail = $row['commentEmail'];
            
            $commentStatus = $row['commentStatus'];
            $commentDate = $row['commentDate'];
            

            echo "<tr>";
            echo "<td>{$commentId}</td>";
            echo "<td>{$commentAuthor}</td>";
            echo "<td>{$commentContent}</td>";

    //     $query = "SELECT * FROM catagories WHERE catId = {$postCatagoryId}";
    //     $selectCatagoriesUpdate = mysqli_query($connection,$query); //select all catagory data from database

    //     while($row = mysqli_fetch_assoc($selectCatagoriesUpdate)){ //fetching data usin loop
    //         $catId = $row['catId'];    
    //         $catTitle = $row['catTitle'];


    //     echo "<td>{$catTitle}</td>";
    // }


        echo "<td>{$commentEmail}</td>";
         
        echo "<td>{$commentStatus}</td>";


        


        echo "<td>{$commentDate}</td>";
        echo "<td><a href='post_comments.php?approve={$commentId}&&id=$getPostId'>Approve</a></td>";
        echo "<td><a href='post_comments.php?deny={$commentId}&&id=$getPostId'>Deny</a></td>";
        
        echo "<td><a href='post_comments.php?delete={$commentId}&&id=$getPostId'>Delete</a></td>";
        echo "</tr>";

    }


    if(isset($_GET['delete'])){  //delete comments
                            $getCommentId = $_GET['delete'];
                            $query = "DELETE FROM comments WHERE commentId = {$getCommentId}";
                                    $deletComment = mysqli_query($connection, $query);
                                    header("Location: post_comments.php?id=$getPostId");
                            $deletComment = mysqli_query($connection, $query);
                            queryCheck($deletComment);

                        }

                        if(isset($_GET['approve'])){  //approve comments
                            $getCommentId = $_GET['approve'];
                            
                            
                            $query = "UPDATE comments SET commentStatus = 'Approved' WHERE commentId = $getCommentId ";
                                    $approveComment = mysqli_query($connection, $query);
                                    header("Location: post_comments.php?id=$getPostId");
                            $approveComment = mysqli_query($connection, $query);
                            queryCheck($approveComment);

                        }

                        if(isset($_GET['deny'])){  //deny comments
                            $getCommentId = $_GET['deny'];
                            $query = "UPDATE comments SET commentStatus = 'Denied' WHERE commentId = $getCommentId";
                                    $denyComment = mysqli_query($connection, $query);
                                    header("Location: post_comments.php?id=$getPostId");
                            $denyComment = mysqli_query($connection, $query);
                            queryCheck($denyComment);

                        }
} 


?>
</tbody>


                        </table>

                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php"?>

<?php 

                        

?>