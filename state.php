<?php
$id =2;
$today = date("Y-m-d");
$name = $_GET['name'];
if($_GET['date']){
$now = $_GET['date'];
}
$state = $data1[$name];
$title = $name;
$icon = 'https://image.flaticon.com/icons/png/512/2785/2785819.png';
include('includes/header.php');
$scode = file_get_contents('includes/statecode.json');
$scode = json_decode($scode, true);
$map = file_get_contents('includes/maps.json');
$map = json_decode($map, true);
include('includes/data.php');
?>

<body id="page-top">
    <meta name="title" content="Covid-19-<?= $name ?> Complete analysis" />
    <meta name="keywords" content="cov19india.live <?= $name?> coronavirus status district wise charts first case in <?= $name?>covid-19 pandemic coronavirus chart tracking live data doubling rate india state wise state-wise confirmed per million" />
    <meta name="description" content="Track Live status of coronavirus in <?= $name?> with District-wise data with chart comparison of last 30 days and miscellaneous data like Confirmed per million and Doubling rate." />
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
                        <div id="heading" class="border-0 card shadow py-2 mx-auto">
                            <div class="card-body row mx-4"  style="font-family: me ; font-size: 30px; letter-spacing: 2px; align-items: center; ">
                                <image height="40px" src=<?= $map[$name]?>>
                            <h3 id="name" class="text-dark mb-0 mx-2"><?php echo$name ?></h3>                        
                            </div>
                        </div>
                    </div>
                    <?php  
                        include('includes/dashboardstate.php');
                        include('includes/stable.php');
                        include('includes/schart.php')
                    ?>  
                </div>
            </div>
            <?php            
            include('includes/footer.php');
            ?>