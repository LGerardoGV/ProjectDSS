<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Periodo', 'Precio', 'Promedio Simple'],
          //OBTENER DATOS DE MANERA DINAMICA
          <?php 
            error_reporting(0);

            include("conexion.php");
            $con= Conectar();
            $consulta="SELECT periodo, frecuencia2 FROM gasolina";
            $query=EjecutaQuery($con,$consulta);
            Desconectar($con);

             $contador=0;
            $acumulador =0;
            $pronostico;
            //LLENAR LA MATRIZ CON LOS VALORES DE LA BD

            for ($i=0; $i <mysqli_num_rows($query)+1; $i++) { 
              $row=mysqli_fetch_row($query);
              $Matriz[$i][0]=$row[0];
              $Matriz[$i][1]=$row[1];
              $Matriz[$i][2]="null";
              $contador++;

              if ($i>0) {
                $acumulador = $acumulador + $Matriz[$i-1][1];
                $Matriz[$i][2]="null";
                $Matriz[$i][2]=$acumulador/$i;
              }
            }

            //LLENAR LA GRAFICA CON LOS VALORES DE LA BD
            for($i=0;$i<mysqli_num_rows($query);$i++){
              $row=mysqli_fetch_row($query);
              print("['".$Matriz[$i][0]."',".$Matriz[$i][1].",".$Matriz[$i][2]."],");
            }
              print("['101',,".$Matriz[$i][2]."]");
           ?>
        ]);

        var options = {
          title: 'Precio Gasolina',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      } 
    </script>
  </head>
  <body>

    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>