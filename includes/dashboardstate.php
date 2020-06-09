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
    $act = $conf-($rec+$dec);
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
    if($act>0)
        $act = "↑ ".$act;
    if($act<0)
        $act = "↓ ".abs($act);
    if(!$act){
        $act = "♥︎";
    }
    $cpm = round($State[confirmed]/$pop[$State[state]]*1000000, 2);
    $count = count($stdaily);
    $today = new DateTime("now", new DateTimeZone('Asia/Kolkata')); 
    $c=0;
    $half = ($State['confirmed'])/2;
    for($Key = 0; $Key<$count; $Key+=3){
        $c += $stdaily[$Key][strtolower($State['statecode'])];
        if($c >= $half){
            $hdate = $stdaily[$Key]['date'];
            break;
        };
    }
    
    $double = date_diff(date_create($hdate),$today)->format("%a days");
?>
<div class="row mx-auto" style="width: 80%; margin-top: 50px;">
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">                                            
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: #ed3838;">Confirmed</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #ed383887; font-size: medium;"><?= $conf ?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[confirmed] ?></span></div>
                                        </div>                                        
                                    </div>                                
                        </div>
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"> 
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="color: #1579f6;">Active</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #1579f687; font-size: medium;"><?= $act?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[active] ?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?php echo "(".round(($State[active]/$State[confirmed]*100), 2) ."%)"; ?></span></div>                                      
                                        </div>                                                                                
                                    </div>
                        </div>
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"> 
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span style="color: #4ca746;">recovered</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #4ca74687; font-size: medium;"><?= $rec ?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[recovered] ?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?php echo "(".round(($State[recovered]/$State[confirmed]*100), 2) ."%)"; ?></span></div>                                      
                                        </div>                                                                               
                                    </div>
                        </div>
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"> 
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #6c757c;">deceased</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #6c757c87; font-size: medium;"><?= $dec ?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $State[deaths] ?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?php  echo "(".round(($State[deaths]/$State[confirmed]*100), 2) ."%)"; ?></span></div>
                                        </div>                                        
                                    </div>
                        </div>
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #ef7c39;">doubling rate</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $double ?></span></div>
                                        </div>                                        
                                    </div>                       
                        </div>
                        <div class="col-auto" style="width: 16.6%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto"> 
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #7c4bde;">confirmed per million</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $cpm ?></span></div>
                                        </div>                                        
                                    </div>
                        </div>       
                        </div>                                         

<?php } ?>

