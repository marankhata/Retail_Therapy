<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Retail Therapy| Checkout</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

-
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
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action="actions.php" method="POST">
						<div class="cf-title">Billing Information </div>
						<div class="row">
							<div class="col-md-7">
								<p>*Payment Method*</p>
							</div>
							<div class="col-md-5">
								<div class=" pull-left">
									<div class="cfr-item">
										<input type="radio" name="PAYMENT_METHOD" id="MPAMBA" value="MPAMBA">
										<label for="one">Mpamba: (+265) 888 1234 865</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="PAYMENT_METHOD"  id="AIRTEL_MONEY" value="AIRTEL_MONEY">
										<label for="two">Airtel Money: (+265) 999 1234 865</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="PAYMENT_METHOD"  id="MO626" value="MO626">
										<label for="two">Mo626: 00125759</label>
									</div>
								</div>
							</div>
						</div>
					
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" name="ACC_NAME" id="ACC_NAME" placeholder="Name To Be Used When Sending(Account Name)">
								<input type="text" name="ADDRESS" id="ADDRESS" placeholder="Address line 2">
							</div>
							<div class="col-md-12">
								<input type="text" name="PHONE_NO" id="PHONE_NO" placeholder="Phone no.">
							</div>
						</div>
						<button class="site-btn submit-order-btn" type="submit" id="PURCHASE" name="PURCHASE" >Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Cart</h3>
						
						<ul class="price-list">
						<?php
							include('db/db.php');

							$USER_ID=$_SESSION['USER_ID'];

                            $querry= mysqli_query($con,"SELECT * FROM `cart` 
							LEFT JOIN products on cart.PRODUCT_ID=products.PRODUCT_ID
							where cart.USER_ID='$USER_ID' and BOUGHTORNOT=0 ORDER BY `cart`.`DATE` ASC");
												
							$total=0;

						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
									$total+=$row['PRICE'];	
									$PRICE=$row['PRICE']*$row['QUANTITY_BOUGHT'];
									echo '<li class="border-bottom">
									'.$row['NAME'].'
									
									<label class="pull-right">MWK '.($PRICE).' </label>
											</li>';
								}
							}
							echo "<li class='total'>Total<label class='pull-right'>MWK $total</label></li>";
						?>  
							
							
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

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
