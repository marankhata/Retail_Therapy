<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Retail Therapy</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Retail Therapy">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
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
	<?php 
					if(isset($_GET['registersuccess'])){
						echo '
						<div  id="sucess" name="sucess" class="col-lg-12 card-right bg-success mb-2" style="color:white;">
							<center>Registered Successfully, you can now login</center>
					 	</div>';
					}
				?>
	<!-- Header section -->
	<?php include("header.php"); ?>
	<!-- Header section end -->



	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/intro-bg_2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-black">
							<span>Welcome to</span>
							<h2>your all in one Online Store.</h2>
							
						</div>
					</div>
					
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/cardd.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-black">
						<span>Create your account </span>
							<h2>Begin your shopping experience.</h2>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/1.png" alt="#">
						</div>
						<h2>Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/2.png" alt="#">
						</div>
						<h2>Quality Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="img/icons/3.png" alt="#">
						</div>
						<h2>Fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Top Selling Products</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php
                            include('db/db.php');
                            $querry= mysqli_query($con,"SELECT * FROM `products` ORDER BY `products`.`NAME` ASC");
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
                                    echo '
									<div class="product-item">
										<div class="pi-pic">
											<img src="panel/'.$row['PHOTO'].'" style="height:250px;" alt="">
											<div class="pi-links">
												<a href="product.php?product_id='.$row['PRODUCT_ID'].'" class="add-card"><i class="flaticon-info"></i><span>View product</span></a>
												<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
											</div>
										</div>
										<div class="pi-text">
											<h6>Mwk '.$row['PRICE'].'</h6>
											<p>'.$row['NAME'].' </p>
										</div>
									</div>
                                
                                ';
																
								}
							}
						?>             
				
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>Recently added products</h2>
			</div>
		
			<div class="row">
			<?php
                            include('db/db.php');
                            $querry= mysqli_query($con,"SELECT * FROM `products` ORDER BY `products`.`NAME` ASC");
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
									echo '
									<div class="col-lg-3 col-sm-6">
										<div class="product-item">
											<div class="pi-pic">
												<img  src="panel/'.$row['PHOTO'].'" style="height:250px;" alt="">
												<div class="pi-links">
													<a href="product.php?product_id='.$row['PRODUCT_ID'].'" class="add-card"><i class="flaticon-info"></i><span>View Product</span></a>
												
												</div>
											</div>
											<div class="pi-text">
												<h6>Mwk '.$row['PRICE'].'</h6>
												<p>'.$row['NAME'].' </p>
											</div>
										</div>
									</div>';
																
								}
							}
						?>  

				
				
			</div>
			<div class="text-center pt-5">
				<a href="products.php" class="site-btn sb-line sb-dark">LOAD MORE</a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="img/banner.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h3>Mind Blowing Discounts</h3><br>
				<a href="products.php" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->


	<!-- Footer section -->
	<?php include("footer.php"); ?>
	<!-- Footer section end -->

	</body>
</html>
