

    <div class="row py-5">
    <div class="col-lg-10 mx-auto">
    <div style="margin-top: 10px; margin-bottom: 0px;" class="form-group pull-right col-lg-4">
      <input type="text" class="bg-light text-dark search" style="border: 1px solid #aaa; height: 40px; width: 100%; border-radius: 10px;" placeholder="Search by typing here.." />
      </div>
      <span class="counter pull-right"></span>
      <div class="card rounded shadow border-0">
          <div class="table-responsive results">
    <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead class="bill-header cs">
                <tr>
                <th> </th>
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
            foreach( $data[state_wise][$name][district] as $Key => $District){            
            ?>
            <tr>
                <td><?= $Key?></td>
                <td><?= $District[confirmed] ?></td>
                <td><?= $District[active] ?></td>
                <td><?= $District[recovered] ?></td>
                <td><?= $District[deceased] ?></td>                
            </tr>
            <?php
                }
            ?>
            </table>
              
              </div>
              </div>
              </div>
              </div>


