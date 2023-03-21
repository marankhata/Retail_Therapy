<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<h3>Retail Therapy</h3>
						</a>
					</div>
					<div class="col-xl-5 col-lg-4">
						<form class="header-search-form" action="products.php" method="GET">
							<input type="text" name="search" id="search" placeholder="Search">
							<button type="submit" ><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"></i>
								<?php
								session_start(); 
								$USER_ID=0;
								if(isset($_SESSION['USER_ID'])){
									$USER_ID=$_SESSION['USER_ID'];
									$USER_NAME=$_SESSION['NAME'];
									echo '<a href="profile.php"  >'.$USER_NAME.'</a>';
								}else{
									echo '<a href="#" data-toggle="modal" data-target="#Modal_login" >Login</a> or <a href="#" data-toggle="modal" data-target="#Modal_register">Signup</a>';
								}
								?>
							</div>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<span>
									<?php
										include('db/db.php');
										$querry= mysqli_query($con,"SELECT count(*) as total FROM `cart` 
										where cart.USER_ID='$USER_ID' and BOUGHTORNOT=0 ORDER BY `cart`.`DATE` ASC");
															
										$total=0;

										if (mysqli_num_rows($querry)>0) 
										{ 
											while ($row=mysqli_fetch_array($querry)) 
											{
												if($USER_ID!=0)
												{
													echo $row['total'];
												}
												
														
											}
										}
									?>  
									</span>
								</div>
								<a href="cart.php"> Cart</a>
							</div>
							<div class="up-item">
								<div class="shopping-card" style="margin-left:10px;">
									<i class="flaticon-logout"></i>
									
								</div>
								<a href="actions.php?destroy_session=1" >LOGOUT</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
					<?php
										include('db/db.php');
										$querry= mysqli_query($con,"SELECT * FROM `categories` ORDER BY `categories`.`CATEGORY` ASC");
															
										$total=0;

										if (mysqli_num_rows($querry)>0) 
										{ 
											while ($row=mysqli_fetch_array($querry)) 
											{
											
													echo"<li><a href='products.php?category_id=".$row['CATEGORY_ID']."'>".$row['CATEGORY']."</a></li>" ;
												
												
														
											}
										}
									?>  
					
					
				</ul>
			</div>
		</nav>
	</header>
	
	<div class="modal fade" id="Modal_register" role="dialog" style="display: none;">
                        <div class="modal-dialog modal-lg" style="">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              
                            </div>
                            <div class="modal-body">
                               <div class="wait overlay" style="display: none;">
        <div class="loader"></div>
    </div>

				<!-- row -->
				
                <div class="container-fluid">
					
						
						
						<!-- /Billing Details -->
						
								<form  onsubmit="return false"  class="login100-form" id="RegisterForm">
									<div class="billing-details jumbotron">
                                    <div class="section-title">
                                        <h3 class="login100-form-title p-b-49">Create New Account</h3>
									</div>
									<br>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="FIRST_NAME">First Name</label>
											<input class="input form-control input-borders" required  type="text" name="FIRST_NAME" id="FIRST_NAME" placeholder="">
										</div>
										<div class="form-group col-md-6">
											<label for="LAST_NAME">Last Name</label>
											<input class="input form-control input-borders" required type="text" name="LAST_NAME" id="LAST_NAME" placeholder="">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="BIRTHDAY">Date of Birth</label>
											<input class="input form-control input-borders" required type="date" name="BIRTHDAY" id="BIRTHDAY" placeholder="">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
											<label for="GENDER">Gender</label>
											<select  class="input form-control input-borders" required name="GENDER" id="GENDER">
												<option value="1">Male</option>
												<option value="2">Female</option>
											</select>
                                        </div>
									</div>
									<div class="row">
                                    	<div class="form-group col-md-6">
                                       		<label for="EMAIL">Email address</label>
                                        	<input class="input form-control input-borders" required  type="email" name="EMAIL" id="EMAIL" placeholder="">
                                    	</div>
										<div class="form-group col-md-6">
                                       		<label for="PHONE_NUMBER">Phone number</label>
                                        	<input class="input form-control input-borders" required type="number" minlength="10" maxlength="11" name="PHONE_NUMBER" id="PHONE_NUMBER" placeholder="">
                                    	</div>
									</div>
									<div class="row">
											<div class="form-group col-md-6">
                                       			<label for="PASSWORD">Password</label>
                                        		<input class="input form-control input-borders" required minlength="6" maxlength="30" type="password" name="PASSWORD" id="PASSWORD" placeholder="Minimum 8 characters">
											</div>
                                    		<div class="form-group col-md-6">
                                       			<label for="RE_PASSWORD">Re-type password</label>
                                        		<input class="input form-control input-borders" required minlength="6" maxlength="30" type="password" name="RE_PASSWORD" id="RE_PASSWORD" placeholder="Re-type password">
                                    		</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label for="CITY">City</label>
											<select  class="input form-control input-borders" required name="CITY" id="CITY">
												<option value="Blantyre">Blantyre</option>
												<option value="Lilongwe">Lilongwe</option>
												<option value="Zomba">Zomba</option>
												<option value="Mzuzu">Mzuzu</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label for="repassword">Delivery Address</label>
											<textarea class="input form-control input-borders" required name="ADDRESS" id="ADDRESS"></textarea>
                                    	</div>
										
                                    </div>
                                    
                                    <div style="form-group">
                                       <input class="primary-btn btn-block" value="Sign Up" type="submit" name="REGISTER" id="REGISTER">
									</div>
									<p id = "error" class="text-center" style =  "color:red;"></p>
                                </div>
							</form>
                    	</div> 

					
				
				<!-- /row -->
			</div>
            </div>
		</div>
					  </div>
					  

					  <div class="modal fade" id="Modal_login" role="dialog" style="display: none;">
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
						
								<form  onsubmit="return false"  class="login100-form" id="LoginForm">
									<div class="billing-details jumbotron">
										<div class="section-title">
											<h3 class="login100-form-title p-b-49">Login</h2>
										</div>
										<div class="row">
											<div class="form-group col-md-12">
												<label for="EMAIL">Email</label>
												<input class="input form-control input-borders" type="email" name="LOGIN_EMAIL" id="LOGIN_EMAIL" placeholder="Enter your email">
											</div>
											<div class="form-group col-md-12">
												<label for="PASSWORD">Password</label>
												<input class="input form-control input-borders" type="password" name="LOGIN_PASSWORD" id="LOGIN_PASSWORD" placeholder="Enter your password">
											</div>
											<div class="form-group col-md-12">
												<p id = "error_login" class="text-center" style =  "color:red;"></p>
											</div>
										</div>
										<input value="Login" type="submit" name="LOGIN" id="LOGIN" class="site-btn pull-right btn-sm">
											
									</div>
								</form>

							</div>          
                            </div>
                            
                          </div>
													
                        </div>
                      </div>