<?php include('includes/statedaily.php') ?>
    <div class="row py-5">
  <div class="col-auto mx-auto" style="width: 90%;">
    <div style="margin-top: 10px; margin-bottom: 0px;" class="form-group pull-right col-lg-4">
      <input type="text" class=" text-dark search" style="border: 1px solid #aaa; height: 40px; width: 100%; border-radius: 10px;" placeholder="Search by typing here.." />
    </div>
      <span class="counter pull-right"></span>
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
      <div class="table-responsive results">
    <table id="example" style="width: 100%; border-collapse: inherit;" class="table table-hover table-sm table-striped table-bordered">
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
<style> 
th td{
  border-radius: 10px;
}
</style>
              <?php
            foreach($data[statewise] as $State){
              if($State[state]=="Total"){
                continue;
              } 
              $conf = $State['deltaconfirmed'];
              $rec = $State['deltarecovered'];
              $dec = $State['deltadeaths'];                            
              if($conf>0)
                  $conf = "↑ ".$conf;
              if($conf<0)
                  $conf = "↓ ".abs($conf);
              if($rec>0)
                  $rec = "↑ ".$rec;              
              if($rec<0)
                  $rec = "↓ ".abs($rec);
              if($dec>0)
                  $dec = "↑ ".$dec;              
              if($dec<0)
                  $dec = "↓ ".abs($dec);
              if($act>0)
                  $act = "↑ ".$act;
              if($act<0)
                  $act = "↓ ".abs($act);  

              $act=$conf-($rec+$dec);
            ?>
            <?php if($State[state]=="State Unassigned"){?>
            <tr class="clickable" >
            <?php } else{?>
            <tr class="clickable"  onclick="window.location='state.php?name=<?= $State[state]?>'">
            <?php }?>
                <div class=row><td><?= $State[state] ?></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;"><?php if($conf){echo $conf;}?></span><span class="row"><?= $State[confirmed] ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;"><?php if($act){echo $act;}?></span><span class="row"><?= $State[active] ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;"><?php if($rec){echo $rec;}?> </span><span class="row"><?= $State[recovered] ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;"><?php if($dec){echo $dec;}?></span><span class="row"><?= $State[deaths] ?></span></div></td></div>                
            </tr>             
            <?php
                }
            ?>
    </table>              
      </div>
      </div>
  </div>           
              



