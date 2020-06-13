<?php include('includes/news.php') ?>
<?php include('includes/vaccine.php') ?>
<link rel="stylesheet" href="themes/bootstrap-theme/ej.web.all.min.css" />
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                    <div class="sidebar-brand-icon rotate-n-15 mx-3"><a href="/"><image width="40px" src="https://image.flaticon.com/icons/png/512/2785/2785819.png" /></a></div>
                    <div class="sidebar-brand-text mx-1" style="font-family: Nunito; font-weight: 800; text-transform: uppercase; letter-spacing: .05rem;"><span>Covid-19 India</span></div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto align-items-center">  
                            <li class="nav-item dropdown no-arrow mr-4">
                            <a type="button" data-toggle="modal" data-target="#exampleModal">
                            <image width="30px" src="https://image.flaticon.com/icons/svg/2370/2370264.svg" />
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: max-content; font-size: x-large;" role="document">
                                    <div class="modal-content">                                    
                                    <div class="modal-body">
                                    <form method="GET">
                                    <input style="width: 100%; height: 40px;" name="date" type="date" min="2020-04-01" max="<?= $today?>" />                                  
                                    <button type="submit" class="btn btn-primary w-100 my-2"><h4>Go</h4></button>
                                    </form>
                                    </div>                                                                                                            
                                    </div>
                                </div>
                            </div>
                            </li>                                                                       
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div style="margin-right: 20px;" class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><image width="27px" src="https://image.flaticon.com/icons/svg/2932/2932642.svg" /></a>
                                    <div style="max-height: 400px; overflow: scroll;" class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Vaccine Center</h6>
                                        <?php                                            
                                            foreach($vdata['articles'] as $article){
                                            ?>
                                        <a class="d-flex align-items-center dropdown-item" href="<?= $article['url'] ?>" target="_blank">
                                            <div class="mr-3">
                                            <image height="50px" src="<?= $article['urlToImage'] ?>"><!--i class="fas fa-file-alt text-white"></i-->
                                            </div>                                            
                                            <div><span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($article['publishedAt'])) ?></span>
                                           <p><?= $article[title] ?></p>
                                           <span class="small float-right text-gray-500">- <?= $article['source']['name'] ?>
                                            </div>                                            
                                            </a>
                                            <?php } ?>
                                        <!--a class="text-center dropdown-item small text-gray-500" href="#">Show All Articles</a--></div>
                                </div>
                            </li> 
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div style="margin-right: 20px;" class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><image width="27px" src="https://image.flaticon.com/icons/png/512/2971/2971446.png" /></a>
                                    <div style="max-height: 400px; overflow: scroll;" class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <?php
                                            $count=0;
                                            foreach($ndata['articles'] as $article){                                                                                                
                                                if($count++ == 10){
                                                break;
                                                }                                         
                                            ?>
                                        <a class="d-flex align-items-center dropdown-item" href="<?= $article['url'] ?>" target="_blank">
                                            <div class="mr-3">
                                            <image height="50px" src="<?= $article['urlToImage'] ?>"><!--i class="fas fa-file-alt text-white"></i-->
                                            </div>                                            
                                            <div><span class="small text-gray-500"><?= date("d-m-Y H:i", strtotime($article['publishedAt'])) ?></span>
                                           <p><?= $article[title] ?></p>
                                           <span class="small float-right text-gray-500">- <?= $article['source']['name'] ?>
                                            </div>                                            
                                            </a>
                                            <?php } ?>
                                        <a class="text-center dropdown-item small text-gray-500" href="articles.php">Show All Articles</a></div>
                                </div>
                            </li>                                                        
                        </ul>
                    </div>                                            
                </nav>
                <script src="assets/js/popover.min.js"></script> 
                