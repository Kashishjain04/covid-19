<?php include('includes/statedaily.php') ?>
<?php include('includes/schartscript.php') ?>
    <div class="row py-5">
    <div class="col-auto mx-auto">
    <div style="margin-top: 10px; margin-bottom: 0px;" class="form-group pull-right col-lg-4">
      <input type="text" class="bg-light text-dark search" style="border: 1px solid #aaa; height: 40px; width: 100%; border-radius: 10px;" placeholder="Search by typing here.." />
    </div>
      <span class="counter pull-right"></span>
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
          <div class="table-responsive results">
    <table id="example" style="width: 100%;" class="table table-striped table-bordered">
              <thead class="bill-header cs">
                <tr>
                <th>State/UT</th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>
              </thead>
              <tr class="warning no-result">
                <td colspan="12"><i class="fa fa-warning"></i>  No Result !!!</td>
              </tr>
              <?php
            foreach($data[statewise] as $State){     
              if($State[state]=="Total"){
                continue;                
              } 
              $conf = $State['deltaconfirmed'];
              $rec = $State['deltarecovered'];
              $dec = $State['deltadeaths'];
              $act=$conf-($rec+$dec);
              
            ?>
            <tr>
                <div class=row><td><a style="color: #858796; text-decoration: none;"<?php if($State[state]!="State Unassigned"){ ?> href="state.php?name=<?= $State[state];}?>"><?= $State[state] ?></a></td>
                <td><div class="col-auto"><?php if($conf){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;">↑ <?=$conf?></span><?php }?><span class="row"><?= $State[confirmed] ?></span></div></td>
                <td><div class="col-auto"><?php if($act>0){ ?>
                    <span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;">↑ <?=$act?> </span><?php }?>
                    <?php if($act<0){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;">↓ <?=abs($act)?> </span><?php }?>
                    <span class="row"><?= $State[active] ?></span></div></td>
                <td><div class="col-auto"><?php if($rec){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;">↑ <?=$rec?> </span><?php }?><span class="row"><?= $State[recovered] ?></span></div></td>
                <td><div class="col-auto"><?php if($dec){ ?><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;">↑ <?=$dec?> </span><?php }?><span class="row"><?= $State[deaths] ?></span></div></td></div>                
            </tr>
            <?php
                }
            ?>
            </table>              
              </div>
              </div>
              </div>
                        
              


