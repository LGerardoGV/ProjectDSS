<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          <?php 
            error_reporting(0);

            include("conexion.php");
            $con= Conectar();
            $consulta="SELECT periodo, frecuencia FROM gasolina";
            $query=EjecutaQuery($con,$consulta);
            Desconectar($con);
            $arrayPS = array(null);
            $contador=0;
            for($i=0;$i<mysqli_num_rows($query);$i++){
              $row=mysqli_fetch_row($query);
              $Matriz[$i][1]=$row[1];
            }
            //CALCULAR EL PROMEDIO SIMPLE
            $acumulador = 0;
            for ($i=1; $i < mysqli_num_rows($query)+1; $i++) {
              $row=mysqli_fetch_row($query);
              $acumulador = $acumulador + $Matriz[$i-1][1];
              $Matriz[$i][2]=$acumulador/$i;
              array_push($arrayPS, $Matriz[$i][2]);
            }
           
          print("['Pronostico',".end($arrayPS)."]");
          ?>
        ]);


        var options = {
          width: 800, height: 240,
          greenFrom: 0, greenTo: 19,
          redFrom: 20, redTo: 100,
          yellowFrom:19, yellowTo: 20,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
  </body>
</html>