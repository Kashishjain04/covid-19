<style> 
th {
  border-radius: 10px;
  position: sticky; 
  top: 0;  
  background: #8497ab;
  color: #fff;
  z-index: 10;
  font-size: 16px;
  font-weight: 700;
  text-align: center;
}
td{
  border-radius: 10px;
}
.sort:before,
.sort:after {
	border: 4px solid transparent;
	content: "";
	display: block;
	height: 0;
	right: 5px;
	top: 50%;
	position: absolute;
	width: 0;
}
.sort:before {
	border-bottom-color: #fff;
	margin-top: -9px;
}
.sort:after {
	border-top-color: #fff;
	margin-top: 1px;
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
                <th class="sort" onclick="nameSort()"style="width: 35%;">State/UT</th>
                <th class="sort" onclick="sortTable(0)">Confirmed</th>
                <th class="sort" onclick="sortTable(1)">Active</th>
                <th class="sort" onclick="sortTable(2)">Recovered</th>
                <th class="sort" onclick="sortTable(3)">Deceased</th> 
                </tr>                          
              </thead>              
            <?php
            $today = date("Y-m-d");
            if($now == $today){
              $array = $data;              
            }
            else{
              $array = $timeseries;
            }
            foreach($array as $Key => $State){
              if($Key=="TT"){
                continue;
              }
              if($now == $today){
              $conf = $State['delta']['confirmed'];
              $rec = $State['delta']['recovered'];
              $dec = $State['delta']['deceased'];    
              $act=$conf-($rec+$dec); 
              
              $tconf = $State['total']['confirmed'];
              $trec = $State['total']['recovered'];
              $tdec = $State['total']['deceased'];
              $tact = $tconf-($trec+$tdec);
              }
              else{
                $conf = $State[$now]['delta']['confirmed'];
                $rec = $State[$now]['delta']['recovered'];
                $dec = $State[$now]['delta']['deceased'];    
                $act=$conf-($rec+$dec); 
              
                $tconf = $State[$now]['total']['confirmed'];
                $trec = $State[$now]['total']['recovered'];
                $tdec = $State[$now]['total']['deceased'];
                $tact = $tconf-($trec+$tdec);
              }
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
            <tr class="clickable"  onclick="window.location='state.php?name=<?= $scode[$Key]?>&date=<?= $now?>'">
            <?php }?>
                <div class="row"><td style="font-size: x-large; text-align: center;"><b><?= $scode[$Key] ?></b></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;"><?php if($conf){echo $conf;}?></span><span class="row comp"><?= $tconf ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;"><?php if($act){echo $act;}?></span><span class="row comp"><?= $tact ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;"><?php if($rec){echo $rec;}?> </span><span class="row comp"><?= $trec ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;"><?php if($dec){echo $dec;}?></span><span class="row comp"><?= $tdec ?></span></div></td></div>                
            </tr>             
            <?php
              }
            ?>
    </table>              
      </div>
      </div>
  </div>           
<script>
  window.onload = sortTable(0);
  window.onload = sortTable(0);
  function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("example");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByClassName("comp")[n];
      y = rows[i + 1].getElementsByClassName("comp")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
      } else if (dir == "desc") {
        if (Number(x.innerHTML) < Number(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
  }
  function nameSort() {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("example");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
      }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;     
      }
    }    
  }
  }
</script>
