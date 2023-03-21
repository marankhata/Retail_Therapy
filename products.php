<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Retail Therapy</title>
	<meta charset="UTF-8">
	<meta name="description" content=" ">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/bg3.jpg" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<?php include("header.php"); ?>
	<!-- Header section end -->


	<!-- Page info -->

	<!-- Page info end -->


	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Filter by Category</h2>
						<ul class="category-menu" style="margin-top:-40px;">
						<?php
                            include('db/db.php');
                            $querry= mysqli_query($con,"SELECT * FROM `categories` ORDER BY `categories`.`CATEGORY` ASC");
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
									echo '<li><a href="products.php?category_id='.$row['CATEGORY_ID'].'">'.$row['CATEGORY'].'</a></li>';
																
								}
							}
						?>  
							
						<li><a href="products.php">Clear Category Filters</a></li>
						</ul>
					</div>
					<div class="filter-widget">
						<h2 class="fw-title">Filter by Brand</h2>
						<ul class="category-menu" style="margin-top:-40px;">
						<?php
                            include('db/db.php');
                            $querry= mysqli_query($con,"SELECT * FROM `label` ORDER BY `label`.`LABEL` ASC");
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
									echo '<li><a href="products.php?brand_id='.$row['LABEL_ID'].'">'.$row['LABEL'].'</a></li>';
																
								}
								
							}
							
						?> 
						<li><a href="products.php">Clear Brand Filters</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					<div class="row">
						
						
					<?php
							include('db/db.php');
							$querry= mysqli_query($con,"SELECT * FROM `products` ORDER BY `products`.`NAME` ASC");
							$mainQuerry="SELECT * FROM `products` 
							LEFT JOIN label on label.LABEL_ID=products.BRAND_ID
							LEFT JOIN categories ON categories.CATEGORY_ID=products.CATEGORY_ID";

							if(isset($_GET['brand_id'])){
								$BRAND_ID=$_GET['brand_id'];
								$querry= mysqli_query($con,$mainQuerry." where products.BRAND_ID='$BRAND_ID' ORDER BY `products`.`NAME` ASC");
							}
							if(isset($_GET['category_id'])){
								$CATEGORY_ID=$_GET['category_id'];
								$querry= mysqli_query($con,$mainQuerry." where products.CATEGORY_ID='$CATEGORY_ID' ORDER BY `products`.`NAME` ASC");
							}
							if(isset($_GET['search'])){
								$SEARCH_QUERY=$_GET['search'];
								$querry= mysqli_query($con,$mainQuerry." where NAME='$SEARCH_QUERY' or CATEGORY='$SEARCH_QUERY' or LABEL='$SEARCH_QUERY' ORDER BY `products`.`NAME` ASC");
							}
							
							
                            
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
									echo '
									<div class="col-lg-6 col-sm-6  ">
										<div class="product-item">
											<div class="pi-pic">
												<img  src="panel/'.$row['PHOTO'].'" style="height:250px;" alt="">
												<div class="pi-links">
													<a href="product.php?product_id='.$row['PRODUCT_ID'].'" class="add-card"><i class="flaticon-info"></i><span>View</span></a>
												
												</div>
											</div>
											<div class="pi-text">';

											if($row['DISCOUNT']=="0"){
												echo   '<h5>Mwk '.$row['PRICE'].'</h5>';
											}else{
												$realPrice=$row['PRICE']-$row['DISCOUNT'];
											
												echo   ' &nbsp; &nbsp;<h5>Mwk '.$realPrice.'</h5>';
												echo   '<h5><strike>Mwk '.$row['PRICE'].'</strike></h5>';
											}
												echo '
												<p>'.$row['NAME'].' </p>
											</div>
										</div>
									</div>';
																
								}
							}
						?>  
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Category section end -->




	<!-- Footer section -->
	<?php include("footer.php"); ?>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
