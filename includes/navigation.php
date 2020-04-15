<?php include "db.php";?>
<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


                    <?php 


                    $query = "SELECT * FROM catagories";
                    $selectAllCatagoriesQuery = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($selectAllCatagoriesQuery)){
                    	$catId = $row['catId'];
                        $catTitle = $row['catTitle'];

                        $catagory_class = '';
                        $registration_class = '';

                        $contact_class = '';

                        $pageName = basename($_SERVER['PHP_SELF']); // name of the current location
                        $ragistration = 'registration.php';
                        $contact = 'contact.php';
                        if(isset($_GET['catagory']) && $_GET['catagory'] == $catId ){
                            $catagory_class = 'active';
                        }else if($pageName == $ragistration){
                            $registration_class = 'active';
                        }else if($pageName == $contact){
                            $contact_class = 'active';
                        } 

                    	echo "<li class='$catagory_class'><a href='catagory.php?catagory=$catId'>{$catTitle}</a></>";
                    }

                    ?>


                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li class="<?php echo $registration_class;?>">
                        <a href="registration.php">Registration</a>
                    </li>
                    <li class="<?php echo $contact_class;?>">
                        <a href="contact.php">Contact Us</a>
                    </li>
                    <?php
                    if(isset($_SESSION['userRole'])){ //if logged in as admin, edit post button will be shownn
                        if(isset($_GET['p_id'])){
                            $postId = $_GET['p_id'];
                            echo "<li>
                        <a href='admin/posts.php?source=editPost&p_id={$postId}'>Edit Post</a></li>";
                        }
                    } 



                    ?>
                    



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>