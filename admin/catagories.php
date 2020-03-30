<?php include "includes/admin_header.php"?>


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

                        <div class="col-xs-6">
                            
                            <?php insert_catagories(); ?> <!--Inserting data into catagory table of Database -->

                            <form action="" method="post">
                                <label for="catTitle">Add Catagory</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="catTitle">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value = "Add Catagory">
                                </div>
                            </form><!-- Add catagory Form -->

                            <?php //update and include query

                            if(isset($_GET['edit'])){
                                $catId = $_GET['edit'];
                                include "update_catagories.php";
                            } 


                            ?>

                            
                        </div> 

                        
                         

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Catagory Title</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
 
                                findAllCatagories(); //Find All Catagories
                                deleteCatagories(); // Delete query
                                ?>



                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php"?>