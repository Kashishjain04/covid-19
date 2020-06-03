

    <div class="row py-5">
    <div class="col-lg-10 mx-auto">
    <div style="margin-top: 10px; margin-bottom: 0px;" class="form-group pull-right col-lg-4">
      <input type="text" class="bg-light text-dark search" style="border: 1px solid #aaa; height: 40px; width: 100%; border-radius: 10px;" placeholder="Search by typing here.." />
      </div>
      <span class="counter pull-right"></span>
      <div class="card rounded shadow border-0">
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
            ?>
            <tr>
                <td><a style="text-decoration: none;" href="state.php?name=<?= $State[state]?>"><?= $State[state] ?></a></td>
                <td><?= $State[confirmed] ?></td>
                <td><?= $State[active] ?></td>
                <td><?= $State[recovered] ?></td>
                <td><?= $State[deaths] ?></td>                
            </tr>
            <?php
                }
            ?>
            </table>              
              </div>
              </div>
              </div>
              </div>


