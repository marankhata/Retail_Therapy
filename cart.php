
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Retail Therapy</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

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


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<table>
							<thead>
								<tr style="margin-left:20px;">
									<th class="product-th"><h4>Product</h4></th>
									<th class="product-th"><h4>Size</h4></th>
									<th class="product-th"><h4>Quantity</h4></th>
									<th class="total-th"><h4>Price</h4></th>
								</tr>
							</thead>
							<tbody>
							
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
									if($row['DISCOUNT']=="0"){
										$PRICE=$row['PRICE']*$row['QUANTITY_BOUGHT'];
									}else{
										$realPrice=$row['PRICE']-$row['DISCOUNT'];
										$PRICE=$realPrice*$row['QUANTITY_BOUGHT'];
									}

								
									echo '
									<tr>
									<td class="product-col">
										<img src="panel/'.$row['PHOTO'].'"  alt="">
										<div class="pc-title">
											<h4 style="margin-top:10px;">'.$row['NAME'].'</h4>
											
										</div>
									</td>
									
									<td class="total-col"><h4 style="margin-top:-5px;">'.$row['SIZE'].'</h4></td>
									<td class="total-col"><h4 style="margin-top:-5px;">'.$row['QUANTITY_BOUGHT'].'</h4></td>
									<td class="total-col"><h4 style="margin-top:-5px;">MWK '.($PRICE).'</h4><p><a href="actions.php?remove_cartitem='.$row['CART_ID'].'">Remove From Cart</a></p></td>
								</tr>

                                
                                ';
								$total+=$PRICE;					
								}
							}
						?>  
								
							</tbody>
						</table>
						</div>
						<div class="total-cost">
							<h6>Total <span><?php echo "MWK ".$total; ?></span></h6>
						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form" action="actions.php" method="POST">
					<a href="checkout.php" class="site-btn">Checkout</a>
					<input type="submit" class="site-btn" value="CANCEL PURCHASES" id="CANCEL" name="CANCEL">
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	
	<!-- Related product section end -->



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
