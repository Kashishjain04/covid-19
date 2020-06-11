<?php 
$title = 'Covid-19 Details';
$icon = 'https://image.flaticon.com/icons/png/512/2785/2785819.png';
include("includes/header.php"); 
$scode = file_get_contents('includes/statecode.json');
$scode = json_decode($scode, true);
include('includes/data.php');
?>
<body id="page-top">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KL3N95B"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" >
                <?php include('includes/nav.php') ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <div class="card shadow py-2 mx-auto">
                        <div class="card-body row mx-4"  style="font-family: me ; letter-spacing: 2px; align-items: center; ">
                            <image height="50px" src="https://img.freepik.com/free-vector/watercolor-map-indian-flag_1035-1099.jpg?size=338&ext=jpg">
                          <h1 class="text-dark mb-0">India</h1>                        
                        </div>
                    </div>
                        
                    </div>
                        <?php  include('includes/dashboard.php') ?>
                    <?php include('includes/ctable.php') ?>                    
                    <?php include('includes/cchart.php') ?>
                </div>
            </div>
            <?php include('includes/footer.php') ?>