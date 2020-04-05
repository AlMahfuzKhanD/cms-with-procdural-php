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
                            Welcome to 
                            <small><?php echo $_SESSION['userName'];?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                         $query = "SELECT * FROM posts";
                         $selectAllPosts = mysqli_query($connection,$query);
                         $postCounts = mysqli_num_rows($selectAllPosts);
                        ?>
                  <div class='huge'><?php echo $postCounts;?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                         $query = "SELECT * FROM comments";
                         $selectAllComments = mysqli_query($connection,$query);
                         $commentCounts = mysqli_num_rows($selectAllComments);
                        ?>
                     <div class='huge'><?php echo $commentCounts;?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                         $query = "SELECT * FROM users";
                         $selectAllUsers = mysqli_query($connection,$query);
                         $userCounts = mysqli_num_rows($selectAllUsers);
                        ?>
                    <div class='huge'><?php echo $userCounts;?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                         $query = "SELECT * FROM catagories";
                         $selectAllCatagories = mysqli_query($connection,$query);
                         $catagoryCounts = mysqli_num_rows($selectAllCatagories);
                        ?>
                        <div class='huge'><?php echo $catagoryCounts;?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="catagories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->



                 <?php
                        //draft posts
                         $query = "SELECT * FROM posts WHERE postStatus = 'draft'";
                         $selectAllDraftPosts = mysqli_query($connection,$query);
                         $draftPostCounts = mysqli_num_rows($selectAllDraftPosts);
                         //Active posts
                         $query = "SELECT * FROM posts WHERE postStatus = 'published'";
                         $selectAllActivPosts = mysqli_query($connection,$query);
                         $activPostCounts = mysqli_num_rows($selectAllActivPosts);
                        //approved comments 
                         $query = "SELECT * FROM comments WHERE commentStatus = 'Approved'";
                         $selectAllApprovedComments = mysqli_query($connection,$query);
                         $approvedCommentCounts = mysqli_num_rows($selectAllApprovedComments);
                         //Denied comments

                         $query = "SELECT * FROM comments WHERE commentStatus = 'Denied'";
                         $AllDeniedComments = mysqli_query($connection,$query);
                         $deniedCommentCounts = mysqli_num_rows($AllDeniedComments);
                        // admin users
                         $query = "SELECT * FROM users WHERE userRole = 'Admin'";
                         $selectAllAdmin = mysqli_query($connection,$query);
                         $adminUserCounts = mysqli_num_rows($selectAllAdmin);
                         // subscriber users
                         $query = "SELECT * FROM users WHERE userRole = 'Subscriber'";
                         $selectAllSubscriber = mysqli_query($connection,$query);
                         $subscriberUserCounts = mysqli_num_rows($selectAllSubscriber);
                ?>



               <!--  ##chart Javascript -->

                <div class="row">
                    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php
          $element_text = ['Posts','Active Posts','Draft Posts', 'Comments', 'Active Comments', 'Denied Comments', 'Users', 'Admin', 'Subscriber'];
          $element_count = [$postCounts, $activPostCounts, $draftPostCounts, $commentCounts, $approvedCommentCounts, $deniedCommentCounts, $userCounts, $adminUserCounts, $subscriberUserCounts];
 //, 'Categories'         
//, $catagoryCounts
          for($i =0; $i<9;$i++){
            echo "['{$element_text[$i]}'" . " ," . "{$element_count[$i]}],";

          }


          ?>
          //['Posts', 1000]
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    


                </div>









            </div>
            <!-- /.container-fluid -->
     </div>
  <!-- /#page-wrapper -->
  
<?php include "includes/admin_footer.php"?>