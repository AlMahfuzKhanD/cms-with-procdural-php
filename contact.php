<?php


$dbHost = "localhost";    //for better security the data of database is sent as a constant data using array
$dbUser = "root";
$dbPass = "";
$dbName = "cms";




$connection = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);


?>
 <?php  include "includes/header.php"; ?>
 

 <?php


if(isset($_POST['submit'])){

    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $userPassword = $_POST['password'];

    if(!empty($userName) && !empty($userEmail) && !empty($userPassword)){

        $userName = mysqli_real_escape_string($connection, $userName);
        $userEmail = mysqli_real_escape_string($connection, $userEmail);
        $userPassword = mysqli_real_escape_string($connection, $userPassword);

        $userPassword = password_hash($userPassword, PASSWORD_BCRYPT, array('cost' => 12));

        //##i use password_hash function, i don't need this randsalt any more.

        /*$query = "SELECT randSalt FROM users";
        $selectRandSalt = mysqli_query($connection,$query);
        queryCheck($selectRandSalt);*/ 

        /*$row = mysqli_fetch_array($selectRandSalt);
        $salt = $row['randSalt']; //fetching randsalt from database
        $userPassword = crypt($userPassword,$salt); //encrypt password using crypt function*/

        $query = "INSERT INTO users(userRole, userName, userEmail, userPassword) ";

        $query .= "VALUES('subscriber','{$userName}','{$userEmail}','{$userPassword}' ) ";
        $registerUserQuery = mysqli_query($connection, $query);

        queryCheck($registerUserQuery);
        $messege = "Your registration has been submitted";
       
    }else{//end nested if
        $messege = "Fields cannot be empty";
    }

    



}else{//end if
    $messege= "";
} 

 ?> 


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    <form role="form" action="contact.php" method="post" id="contact-form" autocomplete="off">
                        <h6 class="text-center"><?php echo $messege; ?></h6>
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter your Subject">
                        </div>
                         <div class="form-group">
                            <label for="body" class="sr-only">Your Messege</label>
                            <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
