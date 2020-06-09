<?php
$pop = file_get_contents('includes/poparrays.json');
$pop = json_decode($pop, true);
$tconf = $data['TT']['total']['confirmed'];
$trec = $data['TT']['total']['recovered'];
$tdec = $data['TT']['total']['deceased'];
$tact = $tconf-($trec+$tdec);
$dconf = 0;
$drec = 0;
$ddec = 0;
$dconf = $data['TT']['delta']['confirmed'];
$drec = $data['TT']['delta']['recovered'];
$ddec = $data['TT']['delta']['deceased'];
$dact = $dconf-($drec+$ddec);
    if($dconf>0)
        $dconf = "↑ ".$dconf;
    if($dconf<0)
        $dconf = "↓ ".abs($dconf);
    if(!$dconf)
        $dconf = "♥︎";          
    if($drec)
        $drec = "↑ ".$drec;
    if($drec<0)
        $drec = "↓ ".abs($drec);
    if(!$drec)
        $drec = "♥︎";
    if($ddec)
        $ddec = "↑ ".$ddec;
    if($ddec<0)
        $ddec = "↓ ".abs($ddec);
    if(!$ddec)
        $ddec = "♥︎";    
    if($dact>0)
        $dact = "↑ ".$dact;
    if($dact<0)
        $dact = "↓ ".abs($dact);
    if(!$dact)
        $dact = "♥︎";   
$cpm = round($tconf/$pop['India']*1000000, 2);
$half = $tconf/2;
$today = new DateTime("now", new DateTimeZone('Asia/Kolkata')); 
foreach($timeseries['TT'] as $Key => $check){    
    if($check['total']['confirmed']>=$half){        
        $hdate = $Key;
        break;
        };
    }
$double = date_diff(date_create($hdate), $today)->format("%a days");
?>
                <div class=" mx-auto"style="width: 80%;">
                    <div class="row" style="width: 60%; margin-top: 50px;display: inline-flex;">                    
                        <div class="col-auto" style="width: 24%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: #ed3838;">Confirmed</span></div>
                                            <div style="font-size: 20px;" class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: transparent;  text-shadow: 0 0 0 #ed383887; font-size: medium;"><?= $dconf ?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $tconf?></span></div>                                            
                                        </div>                                                                                                                  
                                    </div>
                        </div>
                        <div class="col-auto" style="width: 24%; text-align: center;">                                
                                <div class="row align-items-center no-gutters">                                   
                                        <div class="col-auto">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="color: #1579f6;">Active</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: transparent;  text-shadow: 0 0 0 #1579f687; font-size: medium;"><?= $dact?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $tact?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($tact/$tconf*100), 2) ."%)"; ?></span></div>                                      
                                        </div>                                                                                                                  
                                </div>                            
                        </div>
                        <div class="col-auto" style="width: 24%; text-align: center;">                                
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span style="color: #4ca746;">recovered</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: transparent;  text-shadow: 0 0 0 #4ca74687; font-size: medium; max-width:10%;"><?= $drec ?></span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $trec ?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($trec/$tconf*100), 2) ."%)"; ?></span></div>
                                        </div>                                        
                                    </div>                                
                        </div>
                        <div class="col-auto" style="width: 24%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #6c757c;">deceased</span></div>
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: transparent;  text-shadow: 0 0 0 #6c757c87; font-size: medium;"><?= $ddec?></span></div>                                        
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?=$tdec ?></span></div>
                                            <div style="font-size: 16px;" class="col-auto"><span><?= "(".round(($tdec/$tconf*100), 2) ."%)"; ?></span></div>
                                        </div>                                        
                                    </div>
                        </div>
                        </div>
                        <div class="row" style="width: 40%; margin-top: 50px; float: right; display: inline-flex;">
                        <div class="col-auto" style="width: 33%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #ef7c39;">doubling rate</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $double ?></span></div>
                                        </div>                                        
                                    </div>                       
                        </div>
                        <div class="col-auto" style="width: 33%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #7c4bde;">confirmed per million</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= $cpm ?></span></div>
                                        </div>                                        
                                    </div>                       
                        </div>                                            
                        <div class="col-auto" style="width: 33%; text-align: center;">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-auto">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span style="color: #681633;">First Case on</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?= date_format(date_create(array_key_first($timeseries['TT'])), "d-M") ?></span></div>
                                        </div>                                        
                                    </div>                       
                        </div>
                        </div>    
                        </div>                                        
                    </div>
                </div>

