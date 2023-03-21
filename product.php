<?php

$PRODUCT_ID=0;
if(isset($_GET['product_id'])){
	$PRODUCT_ID=$_GET['product_id'];
	$_SESSION['PRODUCT_ID']=$PRODUCT_ID;
  
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Retail Therapy</title>
	<meta charset="UTF-8">
	<meta name="description" content=" ">
	<meta name="keywords" content="">
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


	<!-- product section -->
	<section class="product-section">
	
		<div class="container">
				<?php 
					if(isset($_GET['purchase'])){
						if($_GET['purchase']==1){
							echo '
							<div class="col-lg-12 card-right bg-success mb-2" style="border-radius:5px;color:white;">
								<center>Product added to cart</center>
							 </div>';
						}else{
							echo '
							<div class="col-lg-12 card-right bg-danger mb-2" style="border-radius:5px;color:white;">
								<center>Please make sure you have logged in before proceeding</center>
							 </div>';
						}
						
					}
				?>
				
			<div class="row">
						<?php
							include('db/db.php');
							
                            $querry= mysqli_query($con,"SELECT * FROM `products` where PRODUCT_ID='$PRODUCT_ID' ORDER BY `products`.`NAME` ASC");
												
							$counter=0;
							$CATEGORY_ID;
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
									$CATEGORY_ID=$row['CATEGORY_ID'];
									$BRAND_ID=$row['BRAND_ID'];
									$DESCRIPTION=$row['DESCRIPTION'];
								
									echo '
									<div class="col-lg-6">
										<div class="product-pic-zoom">
											<img class="product-big-img" src="panel/'.$row['PHOTO'].'" alt="">
										</div>
									</div>
								   
									<div class="col-lg-6 product-details">
										<h2 class="p-title">'.$row['NAME'].'</h2>
										<h3 class="p-price">
										';

										if($row['DISCOUNT']=="0"){
											echo 'Mwk '.$row['PRICE'].'';
										}else{
											$realPrice=$row['PRICE']-$row['DISCOUNT'];
											echo   '<strike>Mwk '.$row['PRICE'].'</strike>';
											echo   ' &nbsp; &nbsp;mwk '.$realPrice.'';
										
										}

										echo '
										</h3>
										<h4 class="p-stock">Available: <span> '.$row['QUANTITY'].' In Stock</span></h4>
										
										
					<div class="p-review">
						<a href="#" data-toggle="modal" data-target="#Modal_review">Post a review</a>
					</div>
					
										<p>Size</p>
										<div class="fw-size-choose">
										<form method="POST" action="actions.php">';
										
										$sizes=explode(",",$row['SIZES_AVAILABLE']);
										foreach($sizes as $size){
											echo'	<div class="sc-item">
													
														<input type="radio" name="SIZE" id="'.$size.'" value="'.$size.'">
														<label for="'.$size.'">'.$size.'</label>
													</div>';
										}
										echo '	</div>
												<div class="form-group col-md-12">
													<label for="QUANTITY">Quanity</label>
													<input class="input form-control input-borders" type="number" name="QUANTITY" id="QUANTITY" placeholder="" style="width:80px;">
												</div>
												<input class="input form-control input-borders" type="number" name="PRODUCT_ID_TOP" id="PRODUCT_ID_TOP" value="'.$row['PRODUCT_ID'].'" placeholder="" style="width:50px;display:none;">
											<input type="submit" name="ADD_TO_CART" id="ADD_TO_CART" class="site-btn" style="margin-top:20px;" value="Add To Cart">
										</form>
										
									</div>
                                
                                ';
																
								}
							}
						?>  
				
				
			</div>
		</div>
	</section>

                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-b-60">
                                    <div class="simple-card">
                                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active border-left-0" id="product-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="product-tab-1" aria-selected="true">Descriptions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="product-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="product-tab-2" aria-selected="false">Reviews</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent5">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="product-tab-1">
                                               <?php echo $DESCRIPTION; ?>
											</div>
											<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="product-tab-2">
											
											<?php
												include('db/db.php');
												
												$querrys= mysqli_query($con,"
												SELECT * FROM `product_reviews` 
												left JOIN users
												on users.USER_ID=product_reviews.USER_ID where product_reviews.PRODUCT_ID='$PRODUCT_ID'ORDER BY `product_reviews`.`REVIEW_DATE` DESC");
																	
											
												if (mysqli_num_rows($querrys)>0) 
												{ 
													while ($row=mysqli_fetch_array($querrys)) 
													{
														echo ' 
																	<div class="review-block mt-2 border-bottom">
																		<p class="review-text font-italic m-0">“'.$row['REVIEW'].'”</p>
																		
																		<span class="text-dark font-weight-bold">'.$row['FIRST_NAME'].' '.$row['LAST_NAME'].'</span><small class="text-mute"> ('.$row['REVIEW_DATE'].')</small>
																	</div>
																';
													}
												}
											?>
											<a href="#" data-toggle="modal" data-target="#Modal_review" class="btn btn-primary block pull-right" >Add Review</a>
										
										   </div>
										   
										   
                                        </div>
                                    </div>
								</div>
								</div>
						
	<!-- product section end -->


	<!-- RELATED PRODUCTS section --><br>
	<section class="related-product-section ">
		<div class="container">
			<div class="section-title">
				<h2>RELATED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
			<?php
							include('db/db.php');
							
                            $querry= mysqli_query($con,"SELECT * FROM `products` where CATEGORY_ID='$CATEGORY_ID' or BRAND_ID='$BRAND_ID' ORDER BY `products`.`NAME` ASC");
												
							$counter=0;
							$CATEGORY_ID;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
									echo '
									<div class="product-item">
										<div class="pi-pic">
											<img  src="panel/'.$row['PHOTO'].'"alt="">
											<div class="pi-links">
											<a href="product.php?product_id='.$row['PRODUCT_ID'].'" class="add-card"><i class="flaticon-info"></i><span>More Details</span></a>
											</div>
										</div>
										<div class="pi-text">';

										if($row['DISCOUNT']==0){
											echo '<h6>mwk '.$row['PRICE'].'</h6>';
										}else{
											$realPrice=$row['PRICE']-$row['DISCOUNT'];
											echo   ' &nbsp; &nbsp;<h6>mwk '.$realPrice.'</h6>';
											echo   '<h6><strike>mwk '.$row['PRICE'].'</strike></h6>';
										}

										echo '
											<p>'.$row['NAME'].' </p>
										</div>
									</div>';
																
								}
							}
						?>  

					
				
			</div>
		</div>
	</section>
	
	<div class="modal fade" id="Modal_review" role="dialog" style="display: none;">
                        <div class="modal-dialog">
													
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              
                            </div>
                            <div class="modal-body">
                            
								<div class="wait overlay" style="display: none;">
									<div class="loader"></div>
								</div>
								<div class="container-fluid">
												
						
						
						<!-- /Billing Details -->
						
								<form  action="actions.php"  method="POST"  >
									<div class="billing-details jumbotron">
										
										<div class="row">
											<input id="PRODUCT_ID" name="PRODUCT_ID" value="<?php echo $PRODUCT_ID?>" type="text" class="form-control" style="display:none">
											<div class="form-group col-md-12">
												<label for="REVIEW">Write Your Review Here</label>
												<textarea class="input form-control input-borders" name="REVIEW" id="REVIEW"></textarea>
											</div>
											
										
										</div>
										<input value="Post Review" type="submit" name="POST_REVIEW" id="POST_REVIEW" class="site-btn pull-right btn-sm">
											
									</div>
								</form>

							</div>          
                            </div>
                            
                          </div>
													
                        </div>
                      </div>
	<!-- RELATED PRODUCTS section end -->


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
