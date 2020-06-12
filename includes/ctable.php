<style> 
th {
  border-radius: 10px;
  position: sticky; 
  top: 0;  
  background: #8497ab;
  color: #fff;
  z-index: 10;
  font-size: 14px;
  font-weight: 700
  text-align: center;
}
td{
  border-radius: 10px;
}
</style>
    <div class="row py-5">
  <div class="col-auto mx-auto" style="width: 90%;">          
      <div class="mx-2 row py-1 px-3 bill-header cs" style="display: inline-block; border-radius: 10px;">Click the state for more data...</div>
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
      <div class="table-responsive">
    <table id="example" style="width: 100%; border-collapse: inherit;" class="table table-hover table table-striped table-bordered">            
              <thead>              
                <tr>
                <th style="width: 35%;">State/UT</th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>                          
              </thead>              
              <?php
            foreach($data as $Key => $State){
              if($Key=="TT"){
                continue;
              } 
              $conf = $State['delta']['confirmed'];
              $rec = $State['delta']['recovered'];
              $dec = $State['delta']['deceased'];    
              $act=$conf-($rec+$dec);                        
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
              
              $tconf = $State['total']['confirmed'];
              $trec = $State['total']['recovered'];
              $tdec = $State['total']['deceased'];
              $tact = $tconf-($trec+$tdec);
              if(!$tconf)
                $tconf=0;
              if(!$trec)
                $trec=0;
              if(!$tdec)
                $tdec=0;
              if(!$tact)
                $tact=0;
            ?>
            <?php if($Key=="UN"){?>
            <tr class="clickable" >
            <?php } else{?>
            <tr class="clickable"  onclick="window.location='state.php?name=<?= $scode[$Key]?>'">
            <?php }?>
                <div class="row"><td style="font-size: x-large; text-align: center;"><b><?= $scode[$Key] ?></b></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;"><?php if($conf){echo $conf;}?></span><span class="row"><?= $tconf ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;"><?php if($act){echo $act;}?></span><span class="row"><?= $tact ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;"><?php if($rec){echo $rec;}?> </span><span class="row"><?= $trec ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;"><?php if($dec){echo $dec;}?></span><span class="row"><?= $tdec ?></span></div></td></div>                
            </tr>             
            <?php
                }
            ?>
    </table>              
      </div>
      </div>
  </div>           
