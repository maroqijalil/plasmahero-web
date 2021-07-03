<script>
let my_labels = [
  <?php echo '"'.$my_labels[6].'"';?>,
  <?php echo '"'.$my_labels[5].'"';?>,
  <?php echo '"'.$my_labels[4].'"';?>,
  <?php echo '"'.$my_labels[3].'"';?>,
  <?php echo '"'.$my_labels[2].'"';?>,
  <?php echo '"'.$my_labels[1].'"';?>,
  <?php echo '"'.$my_labels[0].'"';?>
];
let pencocokan = [
  <?php echo '"'.$new_pencocokan[6].'"';?>,
  <?php echo '"'.$new_pencocokan[5].'"';?>,
  <?php echo '"'.$new_pencocokan[4].'"';?>,
  <?php echo '"'.$new_pencocokan[3].'"';?>,
  <?php echo '"'.$new_pencocokan[2].'"';?>,
  <?php echo '"'.$new_pencocokan[1].'"';?>,
  <?php echo '"'.$new_pencocokan[0].'"';?>
];
let my_new_user = [
  <?php echo '"'.$new_users[6].'"';?>,
  <?php echo '"'.$new_users[5].'"';?>,
  <?php echo '"'.$new_users[4].'"';?>,
  <?php echo '"'.$new_users[3].'"';?>,
  <?php echo '"'.$new_users[2].'"';?>,
  <?php echo '"'.$new_users[1].'"';?>,
  <?php echo '"'.$new_users[0].'"';?>,
]
//
// Bars chart
//
var BarsChart = (function() {

	//
	// Variables
	//
	var $chart = $('#chart-bars');


	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'bar',
			data: {
				labels: my_labels,
				datasets: [{
					label: 'New User',
					data: my_new_user
				}]
			}
		});

		// Save to jQuery object
		$chart.data('chart', ordersChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();

'use strict';

//
// Sales chart
//
var SalesChart = (function() {

  // Variables
  var $chart = $('#chart-sales-dark');

  // Methods
  function init($chart) {

    var salesChart = new Chart($chart, {
      type: 'line',
      options: {
        scales: {
          yAxes: [{
            gridLines: {
              lineWidth: 1,
              color: Charts.colors.gray[900],
              zeroLineColor: Charts.colors.gray[900]
            },
            ticks: {
              callback: function(value) {
                if (!(value % 10)) {
                  return value;
                }
              }
            }
          }]
        },
        tooltips: {
          callbacks: {
            label: function(item, data) {
              var label = data.datasets[item.datasetIndex].label || '';
              var yLabel = item.yLabel;
              var content = '';

              if (data.datasets.length > 1) {
                content += label;
              }

              content += yLabel;
              return content;
            }
          }
        }
      },
      data: {
        labels: my_labels,
        datasets: [{
          label: 'Performance',
          data: pencocokan
        }]
      }
    });

    // Save to jQuery object
    $chart.data('chart', salesChart);

  };

  // Events
  if ($chart.length) {
    init($chart);
  }

})();
</script>