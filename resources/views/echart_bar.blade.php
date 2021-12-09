<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>EChart</title>
    <!-- Include the ECharts file you just downloaded -->
    <script src="{{asset('echarts.js')}}"></script>
  </head>
  <body>
    <!-- Prepare a DOM with a defined width and height for ECharts -->
    <div id="main" style="width: 600px;height:400px; margin-top: 60px;"></div>

    <script type="text/javascript">
      
      // Initialize the echarts instance based on the prepared dom
      var myChart = echarts.init(document.getElementById('main'));

      // extract product name and sales
      nameArr = [];
      salesArr = [];

      // use render data from controller to js
      var products = {!! json_encode($products->toArray()) !!};
      
      for (let i = 0; i < products.length; i++) {
        nameArr.push(products[i].name);
        salesArr.push(products[i].sales);
      }
         

      // Specify the configuration items and data for the chart
      var option = {
        title: {
          text: 'ECharts Bar'
        },
        tooltip: {},
        legend: {
          data: ['sales']
        },
        xAxis: {
          
          data: nameArr
        },
        yAxis: {},
        series: [
          {
            name: 'sales',
            type: 'bar',
            data: salesArr
          }
        ]
      };

      // Display the chart using the configuration items and data just specified.
      myChart.setOption(option);
    </script>
  </body>
</html>