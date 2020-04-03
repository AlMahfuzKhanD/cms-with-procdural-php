<?php include "includes/admin_header.php"?>

<?php
if(isset($_SESSION['userName'])){

    $sessionUserName = $_SESSION['userName'];

    $query = "SELECT * FROM users WHERE userName = '{$sessionUserName}'";
    $selectUserProfile = mysqli_query($connection,$query);
    queryCheck($selectUserProfile);

    while($row = mysqli_fetch_array($selectUserProfile)){
        $userId = $row['userId'];
        $userName = $row['userName'];    
        $userPassword = $row['userPassword'];
        $userFirstName = $row['userFirstName'];
        $userLastName = $row['userLastName'];
        $userEmail = $row['userEmail'];
        $userRole = $row['userRole'];
        $userStatus = $row['userStatus'];
    }

}

                         

                        
 ?>


 <?php 
 if(isset($_POST['editProfile'])){

     
    $userFirstName = $_POST['userFirstName'];
    $userLastName = $_POST['userLastName']; 
    $userRole = $_POST['userRole'];

    // $useerImage = $_FILES['useerImage']['name'];
    // $useerImageTemp = $_FILES['useerImage']['tmp_name'];

    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    //$postDate = date('d-m-y');
    

    //move_uploaded_file($postImageTemp, "../images/$postImage"); //upload image source to image folder

    $query = "UPDATE users SET ";
    $query .= "userFirstName = '{$userFirstName}', ";
    $query .= "userLastName = '{$userLastName}', ";
    $query .= "userRole = '{$userRole}', ";
    $query .= "userName = '{$userName}', ";
    $query .= "userEmail = '{$userEmail}', ";
    $query .= "userPassword = '{$userPassword}' ";
    $query .= "WHERE userName = '{$sessionUserName}'";

    $updateProfile = mysqli_query($connection,$query);
    queryCheck($updateProfile);

    header("Location:users.php");

} 


 ?>
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
                        
                        <form action="" method="post" enctype="multipart/form-data">

    <div class="form-gorup">
        <label for="userFirstName">First Name</label>
        <input value="<?php echo $userFirstName;?>" type="text" class="form-control" name="userFirstName">
    </div>

    <div class="form-gorup">
        <label for="userLastName">Last Name</label>
        <input value="<?php echo $userLastName;?>" type="text" class="form-control" name="userLastName">
    </div>

    <div class="form-gorup">
    
        <label for="userRole">User Role</label>
        
     
        <select class="form-control" name="userRole" id="userRole">
            <option><?php echo $userRole;?></option>

            <?php 

            if($userRole == 'Admin'){
                echo "<option value='Subscriber'>Subscriber</option>";
            }else{
                echo "<option value='Admin'>Admin</option>";
            }

            ?>
        </select>
        


    </div>

    

    <!-- <div class="form-gorup">
        <label for="postImage">Post Image</label>
        <input type="file" name="postImage">
    </div> -->

    <div class="form-gorup">
        <label for="userName">User Name</label>
        <input value="<?php echo $userName;?>" type="text" class="form-control" name="userName">
    </div>

    <div class="form-gorup">
        <label for="userEmail">Email</label>
        <input value="<?php echo $userEmail;?>" type="email" class="form-control" name="userEmail">
    </div>

    <div class="form-gorup">
        <label for="userPassword">Password</label>
        <input value="<?php echo $userPassword;?>" type="password" class="form-control" name="userPassword">
    </div>

    <div class="form-gorup">
        <input type="submit" class="btn btn-primary" name="editProfile" value="Update Profile">
    </div>
    
</form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php"?>