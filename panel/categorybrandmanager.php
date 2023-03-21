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
                                            <li class="breadcrumb-item active" aria-current="page">Category & Brand Manager</li>
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
                        <div class="col-md-6">
                               
                                <div class="card">
                                    <h5 class="card-header">Add New Category</h5>
                                    <div class="card-body">
                                        <form action="categorybrandmanager.php" method="POST">
                                            <div class="input-group mb-3">
                                                <input type="text" id="CATEGORY" name="CATEGORY" class="form-control">
                                                <div class="input-group-append">
                                                    <input type="submit" id="ADD_CATEGORY" name="ADD_CATEGORY" class="btn btn-primary" value="Quick Add">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                                
                            <div class="card">
                                <h5 class="card-header"></h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             include('../db/db.php');
                                            $querry= mysqli_query($con,"SELECT * FROM categories ORDER BY `categories`.`CATEGORY` ASC");
												
												$counter=0;
												if (mysqli_num_rows($querry)>0) 
												{ 
													while ($row=mysqli_fetch_array($querry)) 
													{
                                                        $counter++;
                                                            echo '
                                                            <tr>
                                                            <td scope="row" >'.$counter.'</td>
                                                            <td>'.$row['CATEGORY'].' </td>
                                                            
                                                            <td>
                                                                <a href="functions.php?deletcategory='.$row['CATEGORY_ID'].' ">
                                                                    <i id="DELETECATEGORY" value="ddd" name="DELETECATEGORY"   class="fa fa-trash  p-1 font-2xl ml-1 float-left text-dark"></i>
                                                                </a>
                                                            
                                                            </td>
                                                            
                                                        </tr>

															';
																
												}
											}
												?>
                                           
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       
                          
                        </div>
                        <div class="col-md-6">
                                <div class="card">
                                    <h5 class="card-header">New Brand Name</h5>
                                    <div class="card-body">
                                        <form action="categorybrandmanager.php" method="POST">
                                            <div class="input-group mb-3">
                                                <input type="text" id="LABEL" name="LABEL" class="form-control">
                                                <div class="input-group-append">
                                                    <input type="submit" id="ADD_LABEL" name="ADD_LABEL" class="btn btn-primary" value="Quick Add">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card">
                                <h5 class="card-header"></h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Brand Name</th>
                                                <th scope="col">Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                             include('../db/db.php');
                                            $querry= mysqli_query($con,"SELECT * FROM label ORDER BY `label`.`LABEL` ASC");
												
												$counter=0;
												if (mysqli_num_rows($querry)>0) 
												{ 
													while ($row=mysqli_fetch_array($querry)) 
													{
                                                        $counter++;
                                                            echo '
                                                            <tr>
                                                            <td scope="row" >'.$counter.'</td>
                                                            <td>'.$row['LABEL'].' </td>
                                                            
                                                            <td>
                                                                <a href="functions.php?deletlabel='.$row['LABEL_ID'].' ">
                                                                    <i id="DELETELABEL" value="ddd" name="DELETELABEL"   class="fa fa-trash  p-1 font-2xl ml-1 float-left text-dark"></i>
                                                                </a>
                                                            
                                                            </td>
                                                            
                                                        </tr>

															';
																
												}
											}
												?>
                                           
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
