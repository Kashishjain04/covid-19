<?php include('includes/news.php') ?>
<?php include('includes/vaccine.php') ?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>                        
                    <div class="sidebar-brand-icon rotate-n-15 mx-3"><a href="/"><image width="40px" src="https://image.flaticon.com/icons/png/512/2785/2785819.png" /></a></div>
                    <div class="sidebar-brand-text mx-1" style="font-family: Nunito; font-weight: 800; text-transform: uppercase; letter-spacing: .05rem;"><span>Covid-19 India</span></div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">                                                     
                        <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div style="margin-right: 20px;" class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><image width="27px" src="https://image.flaticon.com/icons/svg/2932/2932642.svg" /></a>
                                    <div style="max-height: 400px; overflow: scroll;" class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Vaccine Center</h6>
                                        <?php                                            
                                            foreach($vdata['extractorData']['data'][0]['group'] as $article){                                                                                                                                                                                       
                                            ?>
                                        <a class="d-flex align-items-center dropdown-item" href="<?= $article["Group Content"][0]['href'] ?>" target="_blank">
                                            <div class="mr-3">
                                            <image height="50px" src="<?= $article['Image'][0]['src'] ?>"><!--i class="fas fa-file-alt text-white"></i-->
                                            </div>                                            
                                            <div><span class="small text-gray-500"><?= $article["Field Item 1"][0]['text'] ?></span>
                                           <p><?= "<b>".$article["Field Item 2"][0]['text']."</b><br>".$article["Field Item 3"][0]['text'] ?></p>
                                           <span class="small float-right text-gray-500">- 
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
                                        <!--a class="text-center dropdown-item small text-gray-500" href="#">Show All Articles</a--></div>
                                </div>
                            </li>                                                        
                        </ul>
                    </div>
                </nav>