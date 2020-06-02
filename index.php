<?php 
include('includes/data.php');
$title = 'Covid-19 Details';
include("includes/header.php") 
?>
<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include('includes/nav.php') ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">India</h3>
                    </div>
                        <?php  include('includes/dashboard.php') ?>
                    <?php include('includes/ctable.php') ?>                    
                </div>
            </div>
            <?php include('includes/footer.php') ?>