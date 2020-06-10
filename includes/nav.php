<?php include('includes/news.php') ?>
<style>
    .btn {    
    background-color: #004A7F;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    border: none;
    color: #FFFFFF;
    cursor: pointer;
    display: inline-block;
    font-family: Arial;
    font-size: 20px;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    -webkit-animation: glowing 1500ms infinite;
    -moz-animation: glowing 1500ms infinite;
    -o-animation: glowing 1500ms infinite;
    animation: glowing 1500ms infinite;    
}
@-webkit-keyframes glowing {
  0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
}

@-moz-keyframes glowing {
  0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
}

@-o-keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}

@keyframes glowing {
  0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
  50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
  100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
}
</style>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>                        
                    <div class="sidebar-brand-icon rotate-n-15 mx-3"><a href="/"><image width="40px" src="https://image.flaticon.com/icons/png/512/2785/2785819.png" /></a></div>
                    <div class="sidebar-brand-text mx-1" style="font-family: Nunito; font-weight: 800; text-transform: uppercase; letter-spacing: .05rem;"><span>Covid-19 India</span></div>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">     
                            <li style="align-self: center;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Vaccine Status
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content w-61">                                
                                <div class="modal-body ">
                                    <image width="465px" src="https://i1.wp.com/indianmemetemplates.com/storage/Bahut-tez-ho-gaye-ho.jpg?ssl=1">
                                </div>                                
                                </div>
                            </div>
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