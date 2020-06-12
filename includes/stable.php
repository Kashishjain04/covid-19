<?php 

foreach($data as $Key=> $State){
    //var_dump($State);    
    if($scode[$Key] != $name){
        continue;
    }
?>
<style> 
td{
  border-radius: 10px;
}
th {
  border-radius: 10px;
  position: sticky; 
  top: 0;  
  background: #8497ab;
  color: #fff;
  z-index: 10;
  font-size: 12px;
  text-align: center;
}
</style>
  <div class="row py-5">
  <div class="col-auto mx-auto" style="width: 90%;">    
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
          <div class="table-responsive">
    <table id="example" style="width:100%; border-collapse: inherit;" class="table table table-striped table-bordered">
              <thead class="bill-header cs">
                <tr>
                <th></th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>
              </thead>              
              <?php
              
            foreach( $data[$Key]['districts'] as $key => $District){                      
              $dc = $District[delta][confirmed];
              $dr = $District[delta][recovered];
              $dd = $District[delta][deceased];
              $da = $dc-($dr+$dd);
              if($dc>0)
                  $dc = "↑ ".$dc;
              if($dc<0)
                  $dc = "↓ ".abs($dc);
              if($dr>0)
                  $dr = "↑ ".$dr;              
              if($dr<0)
                  $dr = "↓ ".abs($dr);
              if($dd>0)
                  $dd = "↑ ".$dd;              
              if($dd<0)
                  $dd = "↓ ".abs($dd);
              if($da>0)
                  $da = "↑ ".$da;
              if($da<0)
                  $da = "↓ ".abs($da);          
              
              $c = $District[total][confirmed];
              $r = $District[total][recovered];
              $d = $District[total][deceased];
              $a = $c-($r+$d);
              if(!$c)
                $c=0;
              if(!$r)
                $r=0;
              if(!$d)
                $d=0;
              if(!$a)
                $a=0;
            ?>
            <tr>
            <div class=row><td style="font-size: x-large; text-align: center;"><b><?= $key?></b></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;"><?php if($dc){echo $dc;}?></span><span class="row"><?= $c ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;"><?php if($da){echo $da;}?></span><span class="row"><?= $a ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;"><?php if($dr){echo $dr;}?></span><span class="row"><?= $r ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;"><?php if($dd){echo $dd;}?></span><span class="row"><?= $d ?></span></div></td></div>                                
            </tr>
            <?php
                }
            ?>
    </table>
              
              </div>
              </div>
    </div>    
              

              <?php } ?>
