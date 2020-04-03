<div class="col-md-4">



                

				<!-- Blog Search Well -->
				<div class="well">
					<h4>Blog Search</h4>
					<form action="search.php" method="post">
					<div class="input-group">
						<input name="search" type="text" class="form-control">
						<span class="input-group-btn">
							<button name="submit" class="btn btn-default" type="submit">
								<span class="glyphicon glyphicon-search"></span>
						</button>
						</span>
					</div>
				</form> <!--search form -->
					<!-- /.input-group -->
				</div>

				<!-- Blog Search Well -->
				<div class="well">
					<h4>Login Here</h4>
					<form action="includes/login.php" method="post">
					<div class="form-group">
						<input placeholder="Enter User Name" name="userName" type="text" class="form-control"></div>
					<div class="input-group">
						<input placeholder="Enter User Password" name="userPassword" type="password" class="form-control">
						
						<span class="input-group-btn">
							<button name="createLogin" class="btn btn-primary" type="submit">
								<span>Submit</span>
						</button>
					</div>
				</form> <!--search form -->
					<!-- /.input-group -->
				</div>

				<!-- Blog Categories Well -->
				<div class="well">

				<?php 

				$query = "SELECT * FROM catagories";
				$selectCatagoriesSidebar = mysqli_query($connection,$query);


				?>



					<h4>Blog Categories</h4>
					<div class="row">
						<div class="col-lg-12">
							<ul class="list-unstyled">

								<?php 

								while($row = mysqli_fetch_assoc($selectCatagoriesSidebar)){
								$catTitle = $row['catTitle'];
								$catId = $row['catId'];
								echo "<li><a href='catagory.php?catagory=$catId'>{$catTitle}</a></>";
								}

								?>

							</ul>
						</div>


						

						
					</div>
					<!-- /.row -->
				</div>




				<!-- Side Widget Well -->
				<?php include "widget.php"; ?>

			</div>

		