<div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span style="color: #ed3838;">Confirmed</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data[total_values][confirmed] ?></span></div>
                                        </div>                                        
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data[total_values][active] ?></span></div>
                                        </div>
                                        <div style="font-size: 20px;" class="col-auto"><span><?php echo "(".round(($data[total_values][active]/$data[total_values][confirmed]*100), 2) ."%)"; ?></span></div>                                      
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data[total_values][recovered] ?></span></div>
                                        </div>
                                          <div style="font-size: 20px;" class="col-auto"><span><?php echo "(".round(($data[total_values][recovered]/$data[total_values][confirmed]*100), 2) ."%)"; ?></span></div>                                      
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
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php echo $data[total_values][deaths] ?></span></div>
                                        </div>
                                        <div style="font-size: 20px;" class="col-auto"><span><?php  echo "(".round(($data[total_values][deaths]/$data[total_values][confirmed]*100), 2) ."%)"; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
