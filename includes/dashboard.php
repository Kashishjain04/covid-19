<?php

$tconf = $livedata['stats']['totalConfirmedCases'];
$trec = $livedata['stats']['totalRecoveredCases'];
$tdec = $livedata['stats']['totalDeaths'];
$tact = $tconf-($trec+$tdec);
$dconf = $livedata['stats']['newlyConfirmedCases'];
$drec = $livedata['stats']['newlyRecoveredCases'];
$ddec = $livedata['stats']['newDeaths'];
$dact = $dconf-($drec+$ddec);
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
                                        <div style="font-size: 20px;" class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #ed383887; font-size: medium;">↑ <?= $dconf ?></span></div>                                        
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
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #1579f687; font-size: medium;"><?php if($dact>0){ ?>↑ <?= $dact?><?php }; if($dact<0){ echo "↓ ".abs($dact);} ?></span></div>
                                        
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
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #4ca74687; font-size: medium;">↑<?= $drec ?></span></div>
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
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1 col-auto"><span style="color: #6c757c87; font-size: medium;">↑ <?= $ddec?></span></div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
