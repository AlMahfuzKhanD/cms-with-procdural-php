<form action="" method="post">
    <label for="catTitle">Update Catagory</label>
        <div class="form-group">
            <?php 

	            if(isset($_GET['edit'])){
	                $catId = $_GET['edit'];

	                $query = "SELECT * FROM catagories WHERE catId = {$catId}";
	                $selectCatagoriesUpdate = mysqli_query($connection,$query); //select all catagory data from database

	                while($row = mysqli_fetch_assoc($selectCatagoriesUpdate)){ //fetching data usin loop
		                $catId = $row['catId'];    
		                $catTitle = $row['catTitle']; 

                        ?>


		                <input value="<?php if(isset($catTitle)) {echo $catTitle;}?>" type="text" class="form-control" name="catTitle">

            <?php }} ?>

            <?php 
                // Update Query

                if(isset($_POST['updateCatagory'])){
                    $getCatTitle = $_POST['catTitle'];

                    $query = "UPDATE catagories SET catTitle = '{$getCatTitle}' WHERE catId = {$catId} ";
                    $updateCatagory = mysqli_query($connection, $query);

                    if(!$updateCatagory){
                        die("Query failed" . mysqli_error($connection));
                    }
                    
                }


            ?> <!-- Update Query -->                 
                                    
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="updateCatagory" value = "Update Catagory">
            </div>
        </form><!-- Update catagory Form -->