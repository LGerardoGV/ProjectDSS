<?php
// Start the session
session_start();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Periodo', 'Precio', 'Promedio Movil Simple Suavizado'],
          //OBTENER DATOS DE MANERA DINAMICA
          <?php 
            error_reporting(0);

            
            $k = $_SESSION["k"];
            $alfa = $_SESSION["alfa"];

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
              $Matriz[$i][3]="null";
              $contador++;

              //PMS 
              if($i>=$k){
                for ($a=1; $a <= $k; $a++) { 
                  $acumulador = $acumulador + $Matriz[$i-$a][1];
                }
                $Matriz[$i][2]= $acumulador/$k;
                $acumulador=0;               
              }else{
                $Matriz[$i][2]="null";
              }
              if($Matriz[$i-1][1]!=NULL AND $Matriz[$i-1][2]!=NUL){
                if ($i>$k) {
                  $Matriz[$i][3] = $Matriz[$i-1][1] + ($alfa * ($Matriz[$i-1][2] - $Matriz[$i-1][1]));
                }else{
                  $Matriz[$i][3] = 'null';                  
                }
              }
            }

            //LLENAR LA GRAFICA CON LOS VALORES DE LA BD
            for($i=0;$i<mysqli_num_rows($query);$i++){
              $row=mysqli_fetch_row($query);
              print("['".$Matriz[$i][0]."',".$Matriz[$i][1].",".$Matriz[$i][3]."],");
            }
              print("['101',,".$Matriz[$i][3]."]");
              $ult = $Matriz[$i][3];
              $_SESSION["ult"] = $ult;
           ?>
        ]);

        var options = {
          title: 'Precio Gasolina',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
        drawChart2();
      }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          <?php 
            
            $ult = $_SESSION["ult"];
            
            print("['Pronostico',".$ult."]");
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

    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
  </body>
</html>