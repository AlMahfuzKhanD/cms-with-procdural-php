<?php include "includes/admin_header.php"?>

    <div id="wrapper">
        <!-- Navigation -->

        <!-- users online code -->
        


<!-- end users online code -->

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
                        
                  <div class='huge'><?php echo $postCounts = recordCount('posts');?></div>
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
            
                     <div class='huge'><?php echo $commentCounts = recordCount('comments');?></div>
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
                        
                    <div class='huge'><?php echo $userCounts = recordCount('users');?></div>
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
                    
                        <div class='huge'><?php echo $catagoryCounts = recordCount('catagories');?></div>
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
    $draftPostCounts = checkStatus('posts','postStatus','draft');
    //Active posts
    
    $activPostCounts = checkStatus('posts','postStatus','published');
    //approved comments 
     
    $approvedCommentCounts = checkStatus('comments','commentStatus','Approved');
    //Denied comments

     
    $deniedCommentCounts = checkStatus('comments','commentStatus','Denied');
    // admin users
     
    $adminUserCounts = checkUserRole('users','userRole','Admin');
    // subscriber users
     
    $subscriberUserCounts = checkUserRole('users','userRole','Subscriber');
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