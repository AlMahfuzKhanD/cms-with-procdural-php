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

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Catagory</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $query = "SELECT * FROM posts";
                                $selectPosts = mysqli_query($connection,$query); //select all catagory data from database

                                while($row = mysqli_fetch_assoc($selectPosts)){ //fetching data usin loop
                                $catId = $row['catId'];    
                                $catTitle = $row['catTitle'];

                            }


                                ?>


                                    <td>10</td>
                                    <td>Edwin</td>
                                    <td>Bootstrap</td>
                                    <td>ddd</td>
                                    <td>fff</td>
                                    <td>ggg</td>
                                    <td>hhh</td>
                                    <td>rrr</td>
                                    <td>eee</td>
                                
                            </tbody>


                        </table>

                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

   
<?php include "includes/admin_footer.php"?>