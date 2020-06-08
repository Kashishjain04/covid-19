
<div class="row py-5">
  <div class="col-lg-5 mx-auto" style="max-width:50%">
    <div class="card shadow mb-4"style="background: #ed383823">
      <div class="d-flex justify-content-between align-items-center" style="color: #ed3838; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Confirmed</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="conf"></canvas>
      </div>
    </div>
  </div>                                                                        
  <div class="col-lg-5 mx-auto" style="max-width:50%">
    <div class="card shadow mb-4"style="background: #1579f623">
      <div class="d-flex justify-content-between align-items-center"  style="color: #1579f6; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Active</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="act"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mx-auto" style="max-width:50%">                        
    <div class="card shadow mb-4"style="background: #4ca74623">
      <div class="d-flex justify-content-between align-items-center"  style="color: #4ca746; align-self: center; margin-top: 10px;">
        <h6 class="font-weight-bold m-0">Recovered</h6>                                    
      </div>
      <div class="card-body">
        <canvas class="w-100" id="rec"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-5 mx-auto" style="max-width:50%">
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
        


        <?php 
$count = count($stdaily);
    foreach($data['statewise'] as $State){
      if($State['state'] == $name){              
        $Key = $count - 93;
        $c=0;
        $r=0;        
        $d=0;
        for($Key=0; $Key<($count-93); $Key+=3){
          $c+= $stdaily[$Key][strtolower($State['statecode'])];
        }
        for($Key=1; $Key<($count-92); $Key+=3){
          $r+= $stdaily[$Key][strtolower($State['statecode'])];
        }
        for($Key=2; $Key<($count-91); $Key+=3){
          $d+= $stdaily[$Key][strtolower($State['statecode'])];
        }
        $a=$c-($r+$d);
?>



<script>        
(function () {
  'use strict'

  feather.replace()
  // Graphs
  var cnf = document.getElementById('conf')
  var ac = document.getElementById('act')
  var re = document.getElementById('rec')
  var de = document.getElementById('dec')
  Chart.Tooltip.positioners.custom = function(elements, position) {   
    return {
      x: 100,
      y: 0
    }
  }
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(cnf, {
    type: 'line', 
    data: {
      labels: [
        <?php         
        for($Key= $count-93; $Key<$count; $Key+=3){            
            ?>
          '<?= $stdaily[$Key]['date']?>',
        <?php  }?>               
      ],
      datasets: [{
        data: [
          <?php         
        for($Key= $count-93; $Key<$count; $Key+=3){            
            $c += $stdaily[$Key][strtolower($State['statecode'])];
            ?>
          '<?= $c?>',
        <?php  }?>   
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
        position: 'custom',    
        callbacks: {
        title: function(tooltipItem, data) {
          return data['labels'][tooltipItem[0]['index']];
        },
        label: function(tooltipItem, data) {          
          return data['datasets'][0]['data'][tooltipItem['index']];
        },
        afterLabel: function(tooltipItem, data) {
          var dataset = data['datasets'][0]['data'][tooltipItem['index']]-data['datasets'][0]['data'][tooltipItem['index']-1];                    
          if(dataset>0)
            return "+ " + dataset;          
        },
        },
        backgroundColor: 'transparent',
        titleFontSize: 12,
        titleFontColor: '#ed3838',
        bodyFontColor: '#ed3838',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false,
        },
      hover: {      
      intersect: false
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
          ticks :{
                autoSkip: true,
                maxRotation: 0,
                minRotation: 0
              },
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
        for($Key= $count-93; $Key<$count; $Key+=3){            
            ?>
          '<?= $stdaily[$Key]['date']?>',
        <?php  }?>               
      ],
      datasets: [{
        data: [
          <?php         
        for($Key= $count-93; $Key<$count; $Key+=3){            
            $a += ($stdaily[$Key][strtolower($State['statecode'])]-(($stdaily[$Key+1][strtolower($State['statecode'])])+($stdaily[$Key+2][strtolower($State['statecode'])])));
            ?>
          '<?= $a?>',
        <?php  }?>   
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
        position: 'custom',    
        callbacks: {
        title: function(tooltipItem, data) {
          return data['labels'][tooltipItem[0]['index']];
        },
        label: function(tooltipItem, data) {          
          return data['datasets'][0]['data'][tooltipItem['index']];
        },
        afterLabel: function(tooltipItem, data) {
          var dataset = data['datasets'][0]['data'][tooltipItem['index']]-data['datasets'][0]['data'][tooltipItem['index']-1];                    
          if(dataset>0)
            return "+ " + dataset;
          if(dataset<0)
            return "- " + -1*dataset;
        },
        },
        backgroundColor: 'transparent',
        titleFontSize: 12,
        titleFontColor: '#1579f6',
        bodyFontColor: '#1579f6',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false,
        },
      hover: {      
      intersect: false
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
          ticks :{
                autoSkip: true,
                maxRotation: 0,
                minRotation: 0
              },
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
        for($Key= $count-92; $Key<$count; $Key+=3){            
            ?>
          '<?= $stdaily[$Key]['date']?>',
        <?php  }?>               
      ],
      datasets: [{
        data: [
          <?php         
        for($Key= $count-92; $Key<$count; $Key+=3){            
            $r += $stdaily[$Key][strtolower($State['statecode'])];
            ?>
          '<?= $r?>',
        <?php  }?>   
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
        position: 'custom',    
        callbacks: {
        title: function(tooltipItem, data) {
          return data['labels'][tooltipItem[0]['index']];
        },
        label: function(tooltipItem, data) {          
          return data['datasets'][0]['data'][tooltipItem['index']];
        },
        afterLabel: function(tooltipItem, data) {
          var dataset = data['datasets'][0]['data'][tooltipItem['index']]-data['datasets'][0]['data'][tooltipItem['index']-1];                    
          if(dataset>0)
            return "+ " + dataset;                      
        },
        },
        backgroundColor: 'transparent',
        titleFontSize: 12,
        titleFontColor: '#4ca746',
        bodyFontColor: '#4ca746',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false,
        },
      hover: {      
      intersect: false
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
          ticks :{
                autoSkip: true,
                maxRotation: 0,
                minRotation: 0
              },
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
        for($Key= $count-91; $Key<$count; $Key+=3){            
            ?>
          '<?= $stdaily[$Key]['date']?>',
        <?php  }?>               
      ],
      datasets: [{
        data: [
          <?php         
        for($Key= $count-91; $Key<$count; $Key+=3){            
            $d += $stdaily[$Key][strtolower($State['statecode'])];
            ?>
          '<?= $d?>',
        <?php  }?>   
        ],
        lineTension: 0,       
        borderColor: '#6c757c',
        backgroundColor: 'transparent',
        borderWidth: 1,
        pointBackgroundColor: '#6c757c',        
        hoverBorderWidth: '2'
      }]
    },
    options: {
      tooltips: {
        position: 'custom',    
        callbacks: {
        title: function(tooltipItem, data) {
          return data['labels'][tooltipItem[0]['index']];
        },
        label: function(tooltipItem, data) {          
          return data['datasets'][0]['data'][tooltipItem['index']];
        },
        afterLabel: function(tooltipItem, data) {
          var dataset = data['datasets'][0]['data'][tooltipItem['index']]-data['datasets'][0]['data'][tooltipItem['index']-1];                    
          if(dataset>0)
            return "+ " + dataset;                      
        },
        },
        backgroundColor: 'transparent',
        titleFontSize: 12,
        titleFontColor: '#6c757c',
        bodyFontColor: '#6c757c',
        bodyFontSize: 14,
        displayColors: false,
        intersect: false,
        },
      hover: {      
      intersect: false
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
          ticks :{
                autoSkip: true,
                maxRotation: 0,
                minRotation: 0
              },
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
}())
</script>
<?php };}?>
