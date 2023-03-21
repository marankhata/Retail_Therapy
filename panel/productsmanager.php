<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css" />
    <title>ADMIN PANEL</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include("header.php"); ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include("sidebar.php"); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Products Manager</h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Products Manager</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Products Manager</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <?php include("functions.php"); ?>
                        </div>
                        <div class="col-md-12">
                               
                                <div class="card">
                                    <h5 class="card-header text-center">Add New Product</h5>
                                    <div class="card-body">
                                        <form action="productsmanager.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Name</label>
                                                    <input id="NAME" name="NAME"  type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Price(MWK)</label>
                                                    <input id="PRICE" name="PRICE" type="number" class="form-control">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Discount(MWK)</label>
                                                    <input id="DISCOUNT" name="DISCOUNT" type="number" class="form-control">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Quantity</label>
                                                    <input id="QUANTITY" name="QUANTITY" type="number" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Brand</label>
                                                    <select  class="input form-control input-borders" required name="BRAND_ID" id="BRAND_ID">
                                                   
                                                    <?php
                                                            include('../db/db.php');
                                                            $querry= mysqli_query($con,"SELECT * FROM `label` 
                                                           
                                                           ORDER BY `label`.`LABEL` ASC"
                                                        );
                                                                
                                                                $counter=0;
                                                                if (mysqli_num_rows($querry)>0) 
                                                                { 
                                                                    while ($row=mysqli_fetch_array($querry)) 
                                                                    {
                                                                        $counter++;
                                                                            echo '<option value="'.$row['LABEL_ID'].'">'.$row['LABEL'].'</option>';
                                                                                
                                                                }
                                                            }
                                                    ?> 
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Location</label>
                                                    <select  class="input form-control input-borders" required name="LOCATION" id="LOCATION">
                                                    <option value="Blantyre">Blantyre</option>
                                                    <option value="Lilongwe">Lilongwe</option>
                                                    <option value="Zomba">Zomba</option>
                                                    <option value="Mzuzu">Mzuzu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Sizes(separated by comma</label>
                                                    <input id="SIZES_AVAILABLE" name="SIZES_AVAILABLE"  type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Age range</label>
                                                    <select  class="input form-control input-borders" required name="AGE_RANGE" id="AGE_RANGE">
                                                    <option value="Blantyre">All ages</option>
                                                    <option value="Blantyre">0-10 years old</option>
                                                    <option value="Blantyre">10-20 years old</option>
                                                    <option value="Blantyre">20-30 years old</option>
                                                    <option value="Blantyre">40-50 years old</option>
                                                    <option value="Blantyre">50-60 years old</option>
                                                    <option value="Blantyre">60+ years old</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group col-md-3">
                                                    <label for="inputText3" class="col-form-label">Category</label>
                                                    
                                                    <select  class="input form-control input-borders" required name="CATEGORY_ID" id="CATEGORY_ID">
                                                  
                                                    <?php
                                                            include('../db/db.php');
                                                            $querry= mysqli_query($con,"SELECT * FROM `categories` 
                                                           
                                                           ORDER BY `categories`.`CATEGORY` ASC"
                                                        );
                                                                
                                                                $counter=0;
                                                                if (mysqli_num_rows($querry)>0) 
                                                                { 
                                                                    while ($row=mysqli_fetch_array($querry)) 
                                                                    {
                                                                        $counter++;
                                                                            echo '<option value="'.$row['CATEGORY_ID'].'">'.$row['CATEGORY'].'</option>';
                                                                                
                                                                }
                                                            }
                                                    ?> 
                                                    </select>
                                                </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputText3" class="col-form-label">Picture</label>
                                                <input id="PHOTO" name="PHOTO" type="file" class="form-control">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputText3" class="col-form-label">Description</label>
                                                <textarea id="DESCRIPTION" name="DESCRIPTION" type="text" class="form-control"></textarea>
                                            </div>
                                            </div>
                                           
                                            <button id="ADD_PRODUCT" name="ADD_PRODUCT" type="submit" class="btn btn-lg btn-primary block mt-4">
                                                <i class="fa fa-upload fa-lg"></i>&nbsp;
                                                <span id="payment-button-amount">Upload</span>
                                            </button>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                               
                          
                        </div>
                        
                        <?php
                            include('../db/db.php');
                            $querry= mysqli_query($con,"SELECT * FROM `products` ORDER BY `products`.`NAME` ASC");
												
							$counter=0;
						    if (mysqli_num_rows($querry)>0) 
							{ 
								while ($row=mysqli_fetch_array($querry)) 
								{
                                    $counter++;
                                   
                                    echo '
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img class="card-img-top img-fluid" src="'.$row['PHOTO'].'" alt="Card image cap" style="height:250px;">
                                            <div class="card-body">
                                                <h3 class="card-title">'.$row['NAME'].'</h3>
                                                ';

                                                if($row['DISCOUNT']=="0"){
                                                    echo   '<label class="card-text">mwk '.$row['PRICE'].'</label>';
                                                }else{
                                                    $realPrice=$row['PRICE']-$row['DISCOUNT'];
                                                    echo   '<label class="card-text"><strike>mwk '.$row['PRICE'].'</strike></label>';
                                                    echo   ' &nbsp; &nbsp;<label class="card-text">mwk '.$realPrice.'</label>';
                                                }
                                                echo '
                                                <p class="card-text">'.$row['QUANTITY'].' Pieces Left</p>
                                                <a href="functions.php?deleteproduct='.$row['PRODUCT_ID'].'" class="btn btn-danger btn-sm">Delete Product</a>
                                            </div>
                                        </div>
                                    </div>
                                
                                ';
																
								}
							}
						?>                                   
                        
                   
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- end inventory turnover -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include("footer.php"); ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
    <!-- chart C3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <!-- chartjs js -->
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- dashboard finance js -->
    <script src="assets/libs/js/dashboard-finance.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- gauge js -->
    <script src="assets/vendor/gauge/gauge.min.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- daterangepicker js -->
    <script src="../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
    </script>
</body>
</html>
