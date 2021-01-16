@extends('layouts.app', [
'namePage' => 'Statistics',
'class' => 'sidebar-mini',
'activePage' => 'icons',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">2018 Sales</h5>
          <h4 class="card-title">All products</h4>
          <div class="dropdown">
            <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
              data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <a class="dropdown-item text-danger" href="#">Remove Data</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <div id="chart_div"></div>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header">
          <h5 class="card-category">2018 Sales</h5>
          <h4 class="card-title">All products</h4>
          <div class="dropdown">
            <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
              data-toggle="dropdown">
              <i class="now-ui-icons loader_gear"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <a class="dropdown-item text-danger" href="#">Remove Data</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <div id="line1_chart_div"></div>
          </div>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="places-buttons">
          <div class="row">
            <div class="col-md-6 ml-auto mr-auto text-center">
              <h4 class="card-title">
                Notifications Places
                <p class="category">Click to view notifications</p>
              </h4>
            </div>
          </div>
          <div class="row">
            <div id="line_chart_div"></div>
          </div>
          <div class="row">
            <div class="col-lg-8 ml-auto mr-auto">
              <div class="row">
                <div class="col-md-4">
                  <button class="btn btn-primary btn-block"
                    onclick="nowuiDashboard.showNotification('bottom','left')">Bottom Left</button>
                </div>
                <div class="col-md-4">
                  <button class="btn btn-primary btn-block"
                    onclick="nowuiDashboard.showNotification('bottom','center')">Bottom Center</button>
                </div>
                <div class="col-md-4">
                  <button class="btn btn-primary btn-block"
                    onclick="nowuiDashboard.showNotification('bottom','right')">Bottom Right</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  // Load the Visualization API and the corechart package.
          google.charts.load('current', {'packages':['corechart']});
    
          // Set a callback to run when the Google Visualization API is loaded.
          google.charts.setOnLoadCallback(drawChart);
    
          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {
    
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
              ['Mushrooms', 3],
              ['Onions', 1],
              ['Olives', 1],
              ['Zucchini', 1],
              ['Pepperoni', 2]
            ]);
    
            // Set chart options
            var options = {};
    
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }


          google.charts.load('current', {packages: ['corechart', 'line']});
          google.charts.setOnLoadCallback(drawBasic);
          
          function drawBasic() {
          
          var data = new google.visualization.DataTable();
          data.addColumn('number', 'X');
          data.addColumn('number', 'Dogs');
          
          data.addRows([
          [0, 0], [1, 10], [2, 23], [3, 17], [4, 18], [5, 9],
          [6, 11], [7, 27], [8, 33], [9, 40], [10, 32], [11, 35],
          [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
          [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
          [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
          [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
          [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
          [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
          [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
          [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
          [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
          [66, 70], [67, 72], [68, 75], [69, 80]
          ]);
          
          var options = {
          hAxis: {
          title: 'Time'
          },
          vAxis: {
          title: 'Popularity'
          }
          };
          
          var chart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
          
          chart.draw(data, options);
          }

          $(window).resize(function(){
          drawChart();
          drawBasic();
          });
</script>
@endpush