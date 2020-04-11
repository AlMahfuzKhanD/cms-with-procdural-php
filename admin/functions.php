<?php



	function queryCheck($result){
		global $connection;
		if(!$result){
		die("QUERY FAILED" . mysqli_error($connection));
	}
	}

	function insert_catagories(){
	global $connection;
	if(isset($_POST['submit'])){
        $catTitle = $_POST['catTitle'];

        if($catTitle == "" || empty($catTitle)){  //verifyeing if the field is empty or not
            echo "An empty catagory cannot be added";
            }else{

                $query = "INSERT INTO catagories(catTitle) ";
                 $query .= "VALUE('{$catTitle}')";

                    $creatCatagoryQuery = mysqli_query($connection, $query);

                        if(!$creatCatagoryQuery){
                                    die('Query Failed' . mysqli_error($connection));
                                }
                }
            }
        }
function findAllCatagories(){
	global $connection;
	$query = "SELECT * FROM catagories";
                                $selectCatagories = mysqli_query($connection,$query); //select all catagory data from database

                                while($row = mysqli_fetch_assoc($selectCatagories)){ //fetching data usin loop
                                $catId = $row['catId'];    
                                $catTitle = $row['catTitle'];


                                echo " <tr>";
                                echo "<td>{$catId}</td>";  //printing fetched data in the page
                                echo "<td>{$catTitle}</td>";
                                echo "<td><a href='catagories.php?delete={$catId}'>Delete</a></td>";
                                echo "<td><a href='catagories.php?edit={$catId}'>Edit</a></td>";
                                echo " </tr>";
                                
                                }
}

function deleteCatagories(){
	global $connection;
	if(isset($_GET['delete'])){
                                    $getCatId = $_GET['delete'];

                                    $query = "DELETE FROM catagories WHERE catId = {$getCatId}";
                                    $deleCatagory = mysqli_query($connection, $query);
                                    header("Location: catagories.php");
                                }
}

function usersOnline(){

    if(isset($_GET['onlineUsers'])){

        global $connection;
        if(!$connection){
            session_start();
            include("../includes/db.php");

            $session = session_id();
         $time = time();
         $timeOutInSeconds = 05;
         $timeOut = $time - $timeOutInSeconds;
         $query = "SELECT * FROM usersOnline WHERE session = '$session'";
         $sendQuery = mysqli_query($connection,$query);
         queryCheck($sendQuery);
         $count = mysqli_num_rows($sendQuery);
         if($count == null){
            $query = "INSERT INTO usersOnline(session, time) VALUES('$session','$time')";
            $sendQuery = mysqli_query($connection,$query);
            queryCheck($sendQuery);
         }else{
            $query = "UPDATE usersOnline SET time = '$time' WHERE session = '$session'";
            $updateQuery = mysqli_query($connection,$query);
            queryCheck($updateQuery);

         }
            $query = "SELECT * FROM usersOnline WHERE time > '$timeOut'";
            $selectQuery = mysqli_query($connection,$query);
            queryCheck($selectQuery);
            echo $countUser = mysqli_num_rows($selectQuery);
        } //end nested if


    
        } // end if
    } //end usersOnline

    usersOnline(); // calling function
    









?>
