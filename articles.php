<?php
$title = "Headlines";
$icon = "https://image.flaticon.com/icons/svg/2680/2680927.svg";
include('includes/news.php');
include('includes/header.php');
include('includes/nav.php');
?>
<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">    
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">
          <div class="col-md-4">
            <a href="<?= $ndata1['articles'][0]['url']?>" class="h-entry mb-30 v-height gradient" style="background-image: url('<?= $ndata1['articles'][0]['urlToImage']?>');">
              
              <div class="text">
                <h2><?= $ndata1['articles'][0]['title']?></h2>
                <span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($ndata1['articles'][0]['publishedAt']))?></span>
              </div>
            </a>
            <a href="<?= $ndata1['articles'][1]['url']?>" class="h-entry v-height gradient" style="background-image: url('<?= $ndata1['articles'][1]['urlToImage']?>');">
              
              <div class="text">
                <h2><?= $ndata1['articles'][1]['title']?></h2>
                <span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($ndata1['articles'][1]['publishedAt']))?></span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= $ndata1['articles'][2]['url']?>" class="h-entry img-5 h-100 gradient" style="background-image: url('<?= $ndata1['articles'][2]['urlToImage']?>');">
              
            <div class="text">
                <h2><?= $ndata1['articles'][2]['title']?></h2>
                <span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($ndata1['articles'][2]['publishedAt']))?></span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= $ndata1['articles'][3]['url']?>" class="h-entry mb-30 v-height gradient" style="background-image: url('<?= $ndata1['articles'][3]['urlToImage']?>');">
              
            <div class="text">
                <h2><?= $ndata1['articles'][3]['title']?></h2>
                <span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($ndata1['articles'][3]['publishedAt']))?></span>
              </div>
            </a>
            <a href="<?= $ndata1['articles'][4]['url']?>"class="h-entry v-height gradient" style="background-image: url('<?= $ndata1['articles'][4]['urlToImage']?>');">
              
            <div class="text">
                <h2><?= $ndata1['articles'][4]['title']?></h2>
                <span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($ndata1['articles'][4]['publishedAt']))?></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">
          <?php
            foreach($ndata1['articles'] as $Key => $article){
              if($Key<5){
                continue;
              }              
          ?>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="<?= $article['url']?>"><img src="<?php if($article['urlToImage']){echo $article['urlToImage'];} else{echo "https://miro.medium.com/max/1200/1*cEaeMuTvINqIgyYQMSJWUA.jpeg";}?>" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">              
              <h2><a href="<?= $article['url']?>"><?= $article['title']?></a></h2>
              <div class="post-meta align-items-center text-left clearfix">                                
                <span><?= date("d-m-Y H:i", strtotime($article['publishedAt']))?></span>
              </div>
              
                <p><?= $article['description']?></p>
            <p><a href="<?= $article['url']?>">Read More</a></p>
              </div>
            </div>
          </div>   
            <?php }?>       
        </div>        
      </div>
    </div>
  </div>


  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <?php include('includes/footer.php');?>
