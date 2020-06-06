<?php
$pop = file_get_contents('includes/poparrays.json');
$pop = json_decode($pop, true);
include('includes/statedaily.php');
foreach($data[statewise] as $State){
    if($State[state] != $name){
        continue;
    }
    $conf = $State['deltaconfirmed'];;
    $rec = $State['deltarecovered'];
    $dec = $State['deltadeaths'];
    if($conf)
        $conf = "↑ ".$conf;
    else
        $conf = "♥︎";
    if($rec)
        $rec = "↑ ".$rec;
    else
        $rec = "♥︎";
    if($dec)
        $dec = "↑ ".$dec;
    else
        $dec = "♥︎";
    $act = $conf-($rec+$dec);
    if($act>0)
        $act = "↑ ".$act;
    if($act<0)
        $act = "↓ ".$act;
    else
        $act = "&#10084;";
    $cpm = round($State[confirmed]/$pop[$State[state]]*1000000, 2);
?>
<div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: #ed3838;">Confirmed</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[confirmed] ?></span></div>
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #ed383887; font-size: medium;"><?= $conf ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="color: #1579f6;">Active</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[active] ?></span></div>
                                        </div>
                                        <div class="col mr-2">
                                        <div style="font-size: 16px;" class="col-auto"><span><?php echo "(".round(($State[active]/$State[confirmed]*100), 2) ."%)"; ?></span></div>                                      
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #1579f687; font-size: medium;"><?= $act?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span style="color: #4ca746;">recovered</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[recovered] ?></span></div>
                                        </div>
                                        <div class="col mr-2">
                                        <div style="font-size: 16px;" class="col-auto"><span><?php echo "(".round(($State[recovered]/$State[confirmed]*100), 2) ."%)"; ?></span></div>                                      
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #4ca74687; font-size: medium;"><?= $rec ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #6c757c;">deceased</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[deaths] ?></span></div>
                                        </div>
                                        <div class="col mr-2">
                                        <div style="font-size: 16px;" class="col-auto"><span><?php  echo "(".round(($State[deaths]/$State[confirmed]*100), 2) ."%)"; ?></span></div>
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #6c757c87; font-size: medium;"><?= $dec ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-light py-2"style="border-left:.25rem solid #ef7c39!important">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #ef7c39;">confirmed per million</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $cpm ?></span></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php } ?>

