<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>User Status</th>
                                    <th>Change User Role</th>
                                    <th>Change User Role</th>
                                    <th>Approve</th>
                                    <th>Deny</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $query = "SELECT * FROM users";
                                $selectUsers = mysqli_query($connection,$query); //select all comment data from database

                                while($row = mysqli_fetch_assoc($selectUsers)){ //fetching data usin loop
                                    $userId = $row['userId'];
                                    $userName = $row['userName'];    
                                    
                                    $userPassword = $row['userPassword'];
                                    $userFirstName = $row['userFirstName'];
                                    
                                    $userLastName = $row['userLastName'];
                                    $userEmail = $row['userEmail'];
                                    $userImage = $row['userImage'];
                                    $userRole = $row['userRole'];
                                    $userStatus = $row['userStatus'];
                                    
                                    

                                    echo "<tr>";
                                    echo "<td>{$userId}</td>";
                                    echo "<td>{$userName}</td>";
                                    echo "<td>{$userFirstName}</td>";

                                //     $query = "SELECT * FROM catagories WHERE catId = {$postCatagoryId}";
                                //     $selectCatagoriesUpdate = mysqli_query($connection,$query); //select all catagory data from database

                                //     while($row = mysqli_fetch_assoc($selectCatagoriesUpdate)){ //fetching data usin loop
                                //         $catId = $row['catId'];    
                                //         $catTitle = $row['catTitle'];


                                //     echo "<td>{$catTitle}</td>";
                                // }


                                    echo "<td>{$userLastName}</td>";
                                     
                                    echo "<td>{$userEmail}</td>";
                                    echo "<td>{$userRole}</td>";
                                    echo "<td>{$userStatus}</td>";


                                    // $query = "SELECT * FROM posts WHERE postId = $commentPostId";
                                    // $selectPostIdQuery = mysqli_query($connection, $query);
                                    // while($row = mysqli_fetch_assoc($selectPostIdQuery)){
                                    //      $postId = $row['postId'];
                                    //      $postTitle = $row['postTitle'];
                                    //      echo "<td><a href='../post.php?p_id=$postId'>{$postTitle}</a></td>";
                                    // }


                                    
                                    echo "<td><a href='users.php?changeToAdmin={$userId}'>Admin</a></td>";
                                    echo "<td><a href='users.php?changeToSubcriber={$userId}'>Subscriber</a></td>";
                                    echo "<td><a href='users.php?approve={$userId}'>Approve</a></td>";
                                    echo "<td><a href='users.php?deny={$userId}'>Deny</a></td>";
                                    
                                    echo "<td><a href='users.php?source=editUser&u_id={$userId}'>Edit</a></td>";
                                    echo "<td><a href='users.php?delete={$userId}'>Delete</a></td>";
                                    echo "</tr>";

                            } 


                                ?>


                                   
                                    
                                
                            </tbody>


                        </table>

                        <?php 

                        if(isset($_GET['delete'])){  //delete users
                            $getUserId = $_GET['delete'];
                            $query = "DELETE FROM users WHERE userId = {$getUserId}";
                                    $deletUser = mysqli_query($connection, $query);
                                    header("Location: users.php");
                            $deletUser = mysqli_query($connection, $query);
                            queryCheck($deletUser);

                        }

                        if(isset($_GET['approve'])){  //approve comments
                            $getUserId = $_GET['approve'];
                            $query = "UPDATE users SET userStatus = 'Approved' WHERE userId = $getUserId ";
                                    $approveUser = mysqli_query($connection, $query);
                                    header("Location: users.php");
                            $approveUser = mysqli_query($connection, $query);
                            queryCheck($approveUser);

                        }

                        if(isset($_GET['deny'])){  //deny comments
                            $getUserId = $_GET['deny'];
                            $query = "UPDATE users SET userStatus = 'Denied' WHERE userId = $getUserId";
                                    $denyUser = mysqli_query($connection, $query);
                                    header("Location: users.php");
                            $denyUser = mysqli_query($connection, $query);
                            queryCheck($denyUser);

                        }

                        if(isset($_GET['changeToAdmin'])){  //change user role to admin
                            $getUserId = $_GET['changeToAdmin'];
                            $query = "UPDATE users SET userRole = 'Admin' WHERE userId = $getUserId";
                                    $changeUserRole = mysqli_query($connection, $query);
                                    header("Location: users.php");
                            $changeUserRole = mysqli_query($connection, $query);
                            queryCheck($changeUserRole);

                        }

                        if(isset($_GET['changeToSubcriber'])){  //change user role to subscriber
                            $getUserId = $_GET['changeToSubcriber'];
                            $query = "UPDATE users SET userRole = 'Subscriber' WHERE userId = $getUserId";
                                    $changeUserRole = mysqli_query($connection, $query);
                                    header("Location: users.php");
                            $changeUserRole = mysqli_query($connection, $query);
                            queryCheck($changeUserRole);

                        }


                        ?>