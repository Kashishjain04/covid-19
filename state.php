<?php
include('includes/data.php');
$name = $_GET['name'];
$title = $data[state_wise][$name][state];
include('includes/header.php');
?>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include('includes/nav.php') ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0"><?php echo $data[state_wise][$name][state] ?></h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a></div>
                        <?php  include('includes/dashboardstate.php') ?>
                    <?php include('includes/stable.php') ?>                    
                </div>
            </div>
            <?php
            include('includes/footer.php');
            ?>