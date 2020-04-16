<?php


$dbHost = "localhost";    //for better security the data of database is sent as a constant data using array
$dbUser = "root";
$dbPass = "";
$dbName = "cms";




$connection = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);


?>
 <?php  include "includes/header.php"; ?>

 

 <?php


if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $userName = trim($_POST['username']);
    $userEmail = trim($_POST['email']);
    $userPassword = trim($_POST['password']);

    /****  validating error  ****/

    $error = [

        'username' =>  '',
        'email' =>  '',
        'password' =>  ''


    ];

    if(strlen($userName) <4){
        $error['username'] = 'Username needs to be longer than 4 charackter';
    }

    if($userName ==''){
        $error['username'] = 'Username cannot be empty';
    }

    if(userNameExists($userName)){
        $error['username'] = 'Username already Exists';
    }

    if($userEmail ==''){
        $error['email'] = 'Email cannot be empty';
    }

    if(userEmailExists($userEmail)){
        $error['email'] = 'Email already Exists, <a href="index.php">Please Login</a>';
    }

    if($userPassword ==''){
        $error['password'] = 'Password cannot be empty';
    }

    foreach ($error as $key => $value) {
        if(empty($value)){ // if empty that means no error
            
            unset($error[$key]);
        }
    } //foreach

    if(empty($error)){
        registerUser($userName,$userEmail,$userPassword);
        loginUser($userName,$userPassword);
    }

} //end if

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
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <!-- <h6 class="text-center"><?php //echo $messege; ?></h6> -->
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" autocomplete="on"
                            value="<?php echo isset($userName) ? $userName : ''?>"><!--echo isset($userName) ? $userName : '' confirms if error, user does not need to ty again -->

                            <p class="text-center"><?php echo isset($error['username']) ? $error['username'] : ''?></p> <!-- error messege -->
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                            autocomplete="on"
                            value="<?php echo isset($userEmail) ? $userEmail : ''?>"> <!--echo isset($userEmail) ? $userEmail : '' confirms if error, user does not need to ty again -->
                            <p class="text-center"><?php echo isset($error['email']) ? $error['email'] : ''?></p> <!-- error messege -->

                        </div>
                         <div class="form-group">
                         <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p class="text-center"><?php echo isset($error['password']) ? $error['password'] : ''?></p> <!-- error messege -->
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
