<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Date</th>
                                    <th>Apporve</th>
                                    <th>Deny</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $query = "SELECT * FROM comments";
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


                                    $query = "SELECT * FROM posts WHERE postId = $commentPostId"; //showing the post related to specific comments
                                    $selectPostIdQuery = mysqli_query($connection, $query);
                                    while($row = mysqli_fetch_assoc($selectPostIdQuery)){
                                         $postId = $row['postId'];
                                         $postTitle = $row['postTitle'];
                                         echo "<td><a href='../post.php?p_id=$postId'>{$postTitle}</a></td>";
                                    }


                                    echo "<td>{$commentDate}</td>";
                                    echo "<td><a href='comments.php?approve={$commentId}'>Approve</a></td>";
                                    echo "<td><a href='comments.php?deny={$commentId}'>Deny</a></td>";
                                    
                                    echo "<td><a href='comments.php?delete={$commentId}'>Delete</a></td>";
                                    echo "</tr>";

                            } 


                                ?>


                                   
                                    
                                
                            </tbody>


                        </table>

                        <?php 

                        if(isset($_GET['delete'])){  //delete comments
                            $getCommentId = $_GET['delete'];
                            $query = "DELETE FROM comments WHERE commentId = {$getCommentId}";
                                    $deletComment = mysqli_query($connection, $query);
                                    header("Location: comments.php");
                            $deletComment = mysqli_query($connection, $query);
                            queryCheck($deletComment);

                        }

                        if(isset($_GET['approve'])){  //approve comments
                            $getCommentId = $_GET['approve'];
                            $query = "UPDATE comments SET commentStatus = 'Approved' WHERE commentId = $getCommentId ";
                                    $approveComment = mysqli_query($connection, $query);
                                    header("Location: comments.php");
                            $approveComment = mysqli_query($connection, $query);
                            queryCheck($approveComment);

                        }

                        if(isset($_GET['deny'])){  //deny comments
                            $getCommentId = $_GET['deny'];
                            $query = "UPDATE comments SET commentStatus = 'Denied' WHERE commentId = $getCommentId";
                                    $denyComment = mysqli_query($connection, $query);
                                    header("Location: comments.php");
                            $denyComment = mysqli_query($connection, $query);
                            queryCheck($denyComment);

                        }


                        ?>