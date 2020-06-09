<?php
$name = $_GET['name'];
$state = $data1[$name];
$title = $name;
$icon = 'https://image.flaticon.com/icons/png/512/2781/2781395.png';
include('includes/header.php');
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
            <div id="content">
                <?php include('includes/nav.php') ?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0"><?php echo $name ?></h3></div>
                        <?php  include('includes/dashboardstate.php') ?>
                    <?php include('includes/stable.php') ?>
                    <?php include('includes/schart.php') ?>  
                </div>
            </div>
            <?php            
            include('includes/footer.php');
            ?>