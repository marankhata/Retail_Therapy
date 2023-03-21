<?php
if(isset($_GET['category_id'])){
    $CATEGORY_ID=$_GET['category_id'];
}else{
    header("location:index.php");
}
?>
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
                    <a href="index.php">Back</a>
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                    <!-- ============================================================== -->
                    <!-- line chart  -->
                    <!-- ============================================================== -->
                    
                    <!-- ============================================================== -->
                    <!-- end line chart  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- bar chart  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Sales Chart </h5>
                            <div class="card-body">
                                <div id="c3chart_donut"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card">
                            <h5 class="card-header">Product vs  Quantity </h5>
                            
                            <div class="card-body" height="100px">
                                <div id="morris_bar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end bar chart  -->
                    <!-- ============================================================== -->
                </div>
                </div>  
              
            
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/vendor/charts/morris-bundle/Morrisjs.js"></script>


    <script src="assets/libs/js/main-js.js"></script>
    <script>
              (function(window, document, $, undefined) {
        "use strict";
        if ($('#c3chart_donut').length) {
            var chart = c3.generate({
                bindto: "#c3chart_donut",
                data: {
                    columns: [
                        <?php
                                        include('../db/db.php');
                                        $querry= mysqli_query($con,"SELECT * FROM `products` where CATEGORY_ID=$CATEGORY_ID ORDER BY `products`.`NAME` ASC");
                                                            
                                        $counter=0;
                                        $label="";
                                        if (mysqli_num_rows($querry)>0) 
                                        { 
                                            while ($row=mysqli_fetch_array($querry)) 
                                            {
                                                $PRODUCT_ID=$row['PRODUCT_ID'];
                                                $PRODUCT_NAME=$row['NAME'];
                                                //echo "'$Product',"; 
                                                
                                                    $querrys= mysqli_query($con,"SELECT sum(BOUGHTORNOT) as TOTAL FROM `cart` where PRODUCT_ID=$PRODUCT_ID");
                                                     
                                                    if (mysqli_num_rows($querrys)>0) 
                                                    { 
                                                        while ($rows=mysqli_fetch_array($querrys)) 
                                                        {
                                                            $TOTAL=$rows['TOTAL'];
                                                            echo  "['$PRODUCT_NAME',$TOTAL]," ; 
                                                        }
                                                    }
                                                  
                                                                 
                                            }
                                        }
                                      
                                    ?>
                    ],
                    type: 'donut',
                    onclick: function(d, i) { console.log("onclick", d, i); },
                    onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                    onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                    colors: {
                         data1: '#5969ff',
                        data2: '#ff407b'


                    }
                },
                donut: {
                    title: "Product Sales"


                }


            });

          

            setTimeout(function() {
                chart.unload({
                    ids: 'data1'
                });
                chart.unload({
                    ids: 'data2'
                });
            }, 2500);
        }
        $(function() {

            if ($('#morris_bar').length) {
            Morris.Bar({
                element: 'morris_bar',
                data: [
                    <?php

                                        include('../db/db.php');
                                        $querry= mysqli_query($con,"SELECT * FROM `products` where CATEGORY_ID=$CATEGORY_ID ORDER BY `products`.`NAME` ASC");
                                                            
                                        $counter=0;
                                        $label="";
                                        if (mysqli_num_rows($querry)>0) 
                                        { 
                                            while ($row=mysqli_fetch_array($querry)) 
                                            {
                                                $PRODUCT_ID=$row['PRODUCT_ID'];
                                                $PRODUCT_NAME=$row['NAME'];
                                                //echo "'$Product',"; 
                                                
                                                    $querrys= mysqli_query($con,"SELECT count(BOUGHTORNOT) as TOTAL FROM `cart` where PRODUCT_ID=$PRODUCT_ID");
                                                     
                                                    if (mysqli_num_rows($querrys)>0) 
                                                    { 
                                                        while ($rows=mysqli_fetch_array($querrys)) 
                                                        {
                                                            $TOTAL=$rows['TOTAL'];
                                                            echo  "{ x: '$PRODUCT_NAME', y: $TOTAL }," ; 
                                                        }
                                                    }
                                                  
                                                                 
                                            }
                                        }
                                      
                                    ?>
                ],
                xkey: 'x',
                ykeys: ['y'],
                labels: ['Sold'],
                   barColors: ['#32CD32'],
                     resize: true,
                        gridTextSize: '10px'

            });
        }


            
           
        });

})(window, document, window.jQuery);
    </script>
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