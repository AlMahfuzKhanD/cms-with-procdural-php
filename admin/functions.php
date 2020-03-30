<?php 
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







?>
