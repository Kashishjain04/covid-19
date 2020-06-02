<?php include('includes/news.php') ?>
<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>                        
                        <ul class="nav navbar-nav flex-nowrap ml-auto">                            
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div style="margin-right: 40px;" class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><image width="27px" src="https://image.flaticon.com/icons/png/512/2971/2971446.png" /></a>
                                    <div style="max-height: 400px; overflow: scroll;" class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <?php
                                            $count=0;
                                            foreach($news as $date => $arr){                                                
                                                if($count++ == 0){
                                                continue;
                                                }                                         
                                                if($count == 9){
                                                break;
                                                }                                         
                                            ?>
                                        <a class="d-flex align-items-center dropdown-item" href="#">
                                            <div class="mr-3">
                                            <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>                                            
                                            <div><span class="small text-gray-500"><?= $date ?></span>
                                            <p><?= $arr[0]['info'] ?></p>
                                            </div>                                            
                                            </a>
                                            <?php } ?>
                                        <a class="text-center dropdown-item small text-gray-500" href="#">Show All Articles</a></div>
                                </div>
                            </li>                                                        
                        </ul>
                    </div>
                </nav>