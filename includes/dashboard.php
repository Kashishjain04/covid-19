<?php
$pop = file_get_contents('includes/poparrays.json');
$pop = json_decode($pop, true);
$tconf = $data['statewise'][0]['confirmed'];
$trec = $data['statewise'][0]['recovered'];
$tdec = $data['statewise'][0]['deaths'];
$tact = $tconf-($trec+$tdec);
$dconf = 0;
$drec = 0;
$ddec = 0;
foreach($data[statewise] as $State){
    if($State[state]=="Total"){
      continue;                
    } 
    $conf = $State['deltaconfirmed'];
    $rec = $State['deltarecovered'];
    $dec = $State['deltadeaths'];
    if($conf<0){
      $conf=0;
      $rec=0;
      $dec=0;
    }    
    $dconf+=$conf;
    $drec+=$rec;
    $ddec+=$dec;
}
$dact = $dconf-($drec+$ddec);
    if($dconf)
        $dconf = "↑ ".$dconf;
    if(!$dconf)
        $dconf = "♥︎";          
    if($drec)
        $drec = "↑ ".$drec;
    if(!$drec)
        $drec = "♥︎";
    if($ddec)
        $ddec = "↑ ".$ddec;
    if(!$ddec)
        $dec = "♥︎";        
    if($dact>0)
        $dact = "↑ ".$dact;
    if($dact<0)
        $dact = "↓ ".abs($dact);
    if(!$dact)
        $dact = "♥︎";   
$cpm = round($tconf/$pop['India']*1000000, 2);
?>

<div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: #ed3838;">Confirmed</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $tconf?></span></div>                                            
                                        </div>                                                                              
                                        <div style="font-size: 20px;" class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #ed383887; font-size: medium;"><?= $dconf ?></span></div>                                        
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $tact?></span></div>
                                        </div>
                                        <div class="col mr-2">                                        
                                        <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($tact/$tconf*100), 2) ."%)"; ?></span></div>                                      
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #1579f687; font-size: medium;"><?= $dact?></span></div>
                                        
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $trec ?></span></div>
                                        </div>
                                        <div class="col mr-2">                                                                                
                                        <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($trec/$tconf*100), 2) ."%)"; ?></span></div>                                      
                                        </div>                                        
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #4ca74687; font-size: medium;"><?= $drec ?></span></div>
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?=$tdec ?></span></div>
                                        </div>
                                        <div class="col mr-2">                                        
                                        <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($tdec/$tconf*100), 2) ."%)"; ?></span></div>                                        
                                        </div>
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: transparent;  text-shadow: 0 0 0 #6c757c87; font-size: medium;"><?= $ddec?></span></div>                                        
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
