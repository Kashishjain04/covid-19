

    <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
    <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                <th>State/UT</th>
                <th>Confirmed</th>
                <th>Active</th>
                <th>Recovered</th>
                <th>Deceased</th> 
                </tr>
              </thead>
              <?php
            foreach($data[state_wise] as $State){            
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
              </div>


