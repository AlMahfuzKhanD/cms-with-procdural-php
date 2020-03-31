<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Catagory</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
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
                                    echo "<td>{$postId}</td>";
                                    echo "<td>{$postAuthor}</td>";
                                    echo "<td>{$postTitle}</td>";
                                    echo "<td>{$postCatagoryId}</td>";
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