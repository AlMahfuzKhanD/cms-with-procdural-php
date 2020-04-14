<?php


$dbHost = "localhost";    //for better security the data of database is sent as a constant data using array
$dbUser = "root";
$dbPass = "";
$dbName = "cms";




$connection = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);


?>
 <?php  include "includes/header.php"; ?>
 

 <?php

// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("mahfuz9380@gmail.com","My subject",$msg);


if(isset($_POST['submit'])){

    $to = "almahfuz380@gmail.com";
    
    //$headers = $_POST['mail'];
    $body = $_POST['body'];
    // use wordwrap() if lines are longer than 70 characters
    $subject = wordwrap($_POST['subject'],70);

    if (mail($to,$subject,$body)) {
    echo "Email successfully sent to $to ...";
} else {
    echo "Email sending failed...";

       
    }}

 


    



 

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
                    <form role="form" action="" method="post" id="contact-form" autocomplete="off">
                        
                        
                         <!-- <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                        </div> -->
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
