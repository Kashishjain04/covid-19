

    <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
    <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                <th> </th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>
              </thead>
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
              </div>


