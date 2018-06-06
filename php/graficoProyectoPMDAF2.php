<?php
// Start the session
session_start();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        //var k = sessionStorage.getItem('k');


        var data = google.visualization.arrayToDataTable([
          ['Periodo', 'Precio', 'Promedio Movil Doble Ajustado'],
          //OBTENER DATOS DE MANERA DINAMICA
          <?php 
            error_reporting(0);

            
            $k = $_SESSION["k"];
            $j = $_SESSION["j"];

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
              $Matriz[$i][3]="null";
              $Matriz[$i][4]="null";
              $contador++;
              $acumulador2 = 0;
              $a=0;
              $b = 0;

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
              //PMD 
              if($i>$j+$k){
                for ($a=1; $a <= $j; $a++) { 
                  $acumulador2 = $acumulador2 + $Matriz[$i-$a][2];
                }
                $Matriz[$i][3] = $acumulador2/$j;
              }else{
                $Matriz[$i][3]="null";
              }
            
              //A
              if($Matriz[$i][2]!=NULL AND $Matriz[$i][3]!=NULL AND $i>$j+$k){
                $a = (2*$Matriz[$i][2])-$Matriz[$i][3];
              }else{
                $a="null";
              }
              //B 
              if($Matriz[$i][2]!=NULL AND $Matriz[$i][3]!=NULL AND $i>$j+$k){
                $b = 2*(ABS($Matriz[$i][2]-$Matriz[$i][3])/$a);
              }else{
                $b="null";
              }
              //PMDA
              if($a!=NULL AND $b!=NULL AND $i>$j+$k){
                $pmda = $a+$b;
                $Matriz[$i][4] = $a+$b;
              }else{
                $Matriz[$i][4]="null";
              }
            }

            //LLENAR LA GRAFICA CON LOS VALORES DE LA BD
            for($i=0;$i<mysqli_num_rows($query);$i++){
              $row=mysqli_fetch_row($query);
              print("['".$Matriz[$i][0]."',".$Matriz[$i][1].",".$Matriz[$i][4]."],");
            }
              print("['101',,".$Matriz[$i][4]."]");
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