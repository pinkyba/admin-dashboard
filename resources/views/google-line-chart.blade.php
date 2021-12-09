<html>

  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

      var product = <?php echo $product; ?>;

      console.log(product);

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(product);

        var options = {

          title: 'Product Line Chart',

          curveType: 'function',

          legend: { position: 'bottom' }

        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart'));

        chart.draw(data, options);

      }

    </script>

  </head>

  <body>

    <h1>Laravel Google Chart</h1>

    <div id="linechart" style="width: 900px; height: 500px"></div>

  </body>

</html>