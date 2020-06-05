<?php 

$count = 0;
foreach($data['cases_time_series'] as $check){
  if($check['date'])
    $count++;
}

?>
<div class="row py-5">
  <div class="col-lg-5 mx-auto">
    <div class="card shadow mb-4"style="background: #ed383823">
      <div class="d-flex justify-content-between align-items-center" style="color: #ed3838; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Confirmed</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="conf"></canvas>
      </div>
    </div>
  </div>                                                                        
  <div class="col-lg-5 mx-auto">
    <div class="card shadow mb-4"style="background: #1579f623">
      <div class="d-flex justify-content-between align-items-center"  style="color: #1579f6; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Active</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="act"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mx-auto">                        
    <div class="card shadow mb-4"style="background: #4ca74623">
      <div class="d-flex justify-content-between align-items-center"  style="color: #4ca746; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Recovered</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="rec"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mx-auto">
    <div class="card shadow mb-4"style="background: #6c757c23">
      <div class="d-flex justify-content-between align-items-center"  style="color: #6c757c; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Deceased</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="dec"></canvas>
      </div>
    </div>
  </div>                                               
</div> 
</div>                           

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        
        <script>        
(function () {
  'use strict'

  feather.replace()
  // Graphs
  var cnf = document.getElementById('conf')
  var ac = document.getElementById('act')
  var re = document.getElementById('rec')
  var de = document.getElementById('dec')

  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(cnf, {
    type: 'line', 
    data: {
      labels: [
        <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['date']?>',
        <?php }?>                
      ],
      datasets: [{
        data: [
          <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['totalconfirmed']?>',
        <?php }?>   
        ],
        lineTension: 0,        
        borderColor: '#ed3838',
        backgroundColor: 'transparent',
        borderWidth: 1,
        pointBackgroundColor: '#ed3838',        
        hoverBorderWidth: '2'
      }]
    },
    options: {
      tooltips: {
            intersect: false,
          },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
            gridLines: {
            display: false,
        }
        }],
        xAxes: [{
            gridLines: {
            display: false,
        }
        }]
      },
      legend: {
        display: false
      }
    }
  })
  var myChart = new Chart(ac, {
    type: 'line',
    data: {
      labels: [
        <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['date']?>',
        <?php }?>                
      ],
      datasets: [{
        data: [
          <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['totalconfirmed']-($data1['totalrecovered']+$data1['totaldeceased'])?>',
        <?php }?>   
        ],
        lineTension: 0,        
        borderColor: '#1579f6',
        backgroundColor: 'transparent',
        borderWidth: 1,
        pointBackgroundColor: '#1579f6',        
        hoverBorderWidth: '2'
      }]
    },
    options: {
      tooltips: {
            intersect: false,
          },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
            gridLines: {
            display: false,
        }
        }],
        xAxes: [{
            gridLines: {
            display: false,
        }
        }]
      },
      legend: {
        display: false
      }
    }
  })
  var myChart = new Chart(re, {
    type: 'line',
    data: {
      labels: [
        <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['date']?>',
        <?php }?>                
      ],
      datasets: [{
        data: [
          <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['totalrecovered']?>',
        <?php }?>   
        ],
        lineTension: 0,        
        borderColor: '#4ca746',
        backgroundColor: 'transparent',
        borderWidth: 1,
        pointBackgroundColor: '#4ca746',        
        hoverBorderWidth: '2'
      }]
    },
    options: {
      tooltips: {
            intersect: false,
          },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
            gridLines: {
            display: false,
        }
        }],
        xAxes: [{
            gridLines: {
            display: false,
        }
        }]
      },
      legend: {
        display: false
      }
    }
  })
  var myChart = new Chart(de, {
    type: 'line',
    data: {
      labels: [
        <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['date']?>',
        <?php }?>                
      ],
      datasets: [{
        data: [
          <?php 
        $i =0;
        foreach( $data['cases_time_series'] as $data1){
          if(($count-$i++)>31)
            continue;
            ?>
          '<?= $data1['totaldeceased']?>',
        <?php }?>   
        ],
        borderColor: '#6c757c',
            backgroundColor: 'transparent',
            borderWidth: 1,
            pointBackgroundColor: '#6c757c',  
            pointHitRadius: 2,      
            hoverBorderWidth: 2,
            
      }]
    },
    
    options: {

          maintainAspectRatio: true,
          legend: {
            display: false
          },          
          tooltips: {
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                offsetGridLines: true,
                display: false,
                drawBorder: true
              },              
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: true
              },
              ticks: {
                beginAtZero: true,
                display: true,
              }
            }]
          },
          title: {
            display: false,
          },          
        }
      });        
}())
</script>