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
  font-size: 16px;
  font-weight: 700
  text-align: center;
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
      <div class="card rounded shadow border-0" style="max-height: 800px; overflow: scroll;">
          <div class="table-responsive">
    <table id="example" style="width:100%; border-collapse: inherit;" class="table table table-striped table-bordered">
              <thead class="bill-header cs">
                <tr>
                <th class="sort" onclick="nameSort()"></th>
                <th class="sort" onclick="sortTable(0)">Confirmed</th>
                <th class="sort" onclick="sortTable(1)">Active</th>
                <th class="sort" onclick="sortTable(2)">Recovered</th>
                <th class="sort" onclick="sortTable(3)">Deceased</th>
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
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #ed3838;"><?php if($dc){echo $dc;}?></span><span class="row comp"><?= $c ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #1579f6;"><?php if($da){echo $da;}?></span><span class="row comp"><?= $a ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #4ca746;"><?php if($dr){echo $dr;}?></span><span class="row comp"><?= $r ?></span></div></td>
                <td><div class="col-auto"><span class="row" style="font-size: smaller; font-weight: 700; color: #6c757c;"><?php if($dd){echo $dd;}?></span><span class="row comp"><?= $d ?></span></div></td></div>                                
            </tr>
            <?php
                }
            ?>
    </table>
              
              </div>
              </div>
    </div>    
              

              <?php } ?>
 <script>
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

