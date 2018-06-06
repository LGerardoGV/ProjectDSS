<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<?php
error_reporting(0);

function calcular(){
$k = $_POST['k'];
$j = $_POST['j'];
$alfa = $_POST['alfa'];
$frec = $_POST['frec'];

$mej = 2;

include("conexion.php");
$con= Conectar();

if($frec == "magna"){
	$consulta="SELECT periodo, frecuencia FROM gasolina";
}
if($frec == "premium"){
	$consulta="SELECT periodo, frecuencia2 FROM gasolina";
}else{
	if($frec == "" || $k=="" || $j=="" || $alfa==""){
		//header('Location: tablas.php');
	}
}

$query=EjecutaQuery($con,$consulta);
Desconectar($con);

$contador=0;

//LLENAR LA MATRIZ CON LOS VALORES DE LA BD
for($i=0;$i<mysqli_num_rows($query)+1;$i++){
	$row=mysqli_fetch_row($query);
	$Matriz[$i][0]=$row[0];
	$Matriz[$i][1]=$row[1];
	if($i==mysqli_num_rows($query)){
		$Matriz[$i][0]= $i+1;
		//$row2 = mysqli_field_name($query, 0);
		$Matriz[$i][1]="";
	}
	$contador++;
}

$colName = array();
while($property = mysqli_fetch_field($query))
{
	array_push($colName, $property->name);
}

//CALCULAR EL PROMEDIO SIMPLE
$Matriz[0][2]='';
$Matriz[0][3]='';
$Matriz[mysqli_num_rows($query)][3]='';
$acumulador = 0;
$acumulador2=0;
$cont = 0;
$errabs = 0;
$err = 0;
$conterr = 0;
$errormpmsabs = 0;
$errormpms = 0;
$conterrpms = 0;
$errpse = 0;
$errpseabs = 0;
$conterrpse = 0;
for ($i=1; $i < mysqli_num_rows($query)+1; $i++) {

	$acumulador = $acumulador + $Matriz[$i-1][1];
	$Matriz[$i][2]= round(($acumulador/$i),4,PHP_ROUND_HALF_UP);
	//EABS
	if($Matriz[$i][1]!=NULL AND $Matriz[$i][2]!=NULL){
		$Matriz[$i][3]= round((ABS($Matriz[$i][1]-$Matriz[$i][2])),4,PHP_ROUND_HALF_UP);
		$errabs = $errabs + $Matriz[$i][3];
		$conterr = $conterr + 1;
	}else{
		$Matriz[$i][3]='';
	}

	//PMS
	if($i>=$k){
		for ($a=1; $a <= $k; $a++) {
			$acumulador2 = $acumulador2 + $Matriz[$i-$a][1];
		}
		$Matriz[$i][4]= round(($acumulador2/$k),4,PHP_ROUND_HALF_UP);
		$acumulador2=0;
		//eabs(pms)
		if($Matriz[$i][1]!=NULL AND $Matriz[$i][4]!=NULL){
			$Matriz[$i][5]= round((ABS($Matriz[$i][1]-$Matriz[$i][4])),4,PHP_ROUND_HALF_UP);
			$errormpmsabs = $errormpmsabs + $Matriz[$i][5];
			$conterrpms = $conterrpms + 1 ;
		}else{
			$Matriz[$i][5]='';
		}
	}else{
		$Matriz[$i][4]='';
	}
	//PSE(PMS)
	if($Matriz[$i][1]!=NULL AND $Matriz[$i][4]!=NULL){
		$Matriz[$i+1][6] = round(($Matriz[$i][1] + ($alfa * ($Matriz[$i][4] - $Matriz[$i][1]))),4,PHP_ROUND_HALF_UP);
	}
	if($Matriz[$i][1]!=NULL AND $Matriz[$i][6]!=NULL){
		$Matriz[$i][7] = ABS($Matriz[$i][1]-$Matriz[$i][6]);
		$errpseabs = $errpseabs + $Matriz[$i][7];
		$conterrpse = $conterrpse + 1;
	}else{
		$Matriz[$i][7] = '';
	}

}
//ERRORES MEDIOS PMS
$err = round(($errabs/$conterr),4,PHP_ROUND_HALF_UP);
$errormpms = round(($errormpmsabs/$conterrpms),4,PHP_ROUND_HALF_UP);
$errpse = round(($errpseabs/$conterrpse),4,PHP_ROUND_HALF_UP);

/////////////Calcular PSE

//CALCULAR PMD

$acumulador = 0;
$acumulador2=0;
$val = 0;
$cont = 0;
$errpmd = 0;
$errpmdabs = 0;
$conterrpmd = 0;
for ($i=1; $i < mysqli_num_rows($query)+2; $i++) {

	//PMD CUANDO J=2
	if($i>$j+$k){
		for ($a=1; $a <= $j; $a++) {
			$acumulador2 = $acumulador2 + $Matriz[$i-$a][4];
		}
		$val = round(($acumulador2/$j),4,PHP_ROUND_HALF_UP);
		if($val == 0){
			$val = "";
		}
		$Matriz[$i][8]= $val;
		$acumulador2=0;
		//eabs(pmd)
		if($Matriz[$i][1]!=NULL AND $Matriz[$i][8]!=NULL){
			$Matriz[$i][9]= round((ABS($Matriz[$i][1]-$Matriz[$i][8])),4,PHP_ROUND_HALF_UP);
			$errpmdabs = $errpmdabs + $Matriz[$i][9];
			$conterrpmd = $conterrpmd +1;
		}else{
			$Matriz[$i][9]='';
		}
	}else{
		$Matriz[$i][8]='';
	}
}
//ERROR MEDIO PMD
$errpmd = round(($errpmdabs/$conterrpmd),4,PHP_ROUND_HALF_UP);

//CALCULAR PMDA
$a = 0;
$b = 0;
$pmda = 0;
$errpmda = 0;
$errpmdabs = 0;
$conterrpmda = 0;
for ($i=1; $i < mysqli_num_rows($query)+1; $i++) {

	//A
	if($Matriz[$i][4]!=NULL AND $Matriz[$i][8]!=NULL){
		$a = (2*$Matriz[$i][4])-$Matriz[$i][8];
		$Matriz[$i][10] = round(($a),4,PHP_ROUND_HALF_UP);
	}else{
		$Matriz[$i][10]='';
	}
	//B
	if($Matriz[$i][4]!=NULL AND $Matriz[$i][8]!=NULL){
		$b = 2*(ABS($Matriz[$i][4]-$Matriz[$i][8])/10);
		$Matriz[$i][11] = round(($b),4,PHP_ROUND_HALF_UP);
	}else{
		$Matriz[$i][11]='';
	}
	//PMDA
	if($Matriz[$i][10]!=NULL AND $Matriz[$i][11]!=NULL){
		$pmda = $Matriz[$i][10]+$Matriz[$i][11];
		$Matriz[$i][12] = round(($pmda),4,PHP_ROUND_HALF_UP);
	}else{
		$Matriz[$i][12]='';
	}
	//EABS(PMDA)
	if($Matriz[$i][1]!=NULL AND $Matriz[$i][12]!=NULL){
		$Matriz[$i][13] = round((ABS($Matriz[$i][1]-$Matriz[$i][12])),4,PHP_ROUND_HALF_UP);
		$errpmdabs = $errpmdabs + $Matriz[$i][13];
		$conterrpmda = $conterrpmda + 1;
	}else{
		$Matriz[$i][13]='';
	}
}
$errpmda = round(($errpmdabs/$conterrpmda),4,PHP_ROUND_HALF_UP);

//CALCULAR TMAC
$TMAC = 0;
$PTMAC = 0;
$errtmac =0;
$errtmacabs = 0;
$conterrtmac = 0;
for ($i=1; $i < mysqli_num_rows($query)+1; $i++) {

	//TMAC
	if($Matriz[$i-1][1]!=NULL AND $Matriz[$i-2][1]!=NULL){
		$TMAC = (($Matriz[$i-1][1]/$Matriz[$i-2][1])-1)*100;
		$Matriz[$i][14] = round(($TMAC),4,PHP_ROUND_HALF_UP);
	}else{
		$Matriz[$i][14]='';
	}
	//PTMAC
	if($Matriz[$i-1][1]!=NULL AND $Matriz[$i-2][1]!=NULL){
		$PTMAC = $Matriz[$i-1][1]+($Matriz[$i-1][1]*($Matriz[$i][14])/100);
		$Matriz[$i][15] = round(($PTMAC),4,PHP_ROUND_HALF_UP);
	}else{
		$Matriz[$i][15]='';
	}
	//EABS(PMDA)
	if($Matriz[$i][1]!=NULL AND $Matriz[$i][13]!=NULL){
		$Matriz[$i][16] = round((ABS($Matriz[$i][1]-$Matriz[$i][15])),4,PHP_ROUND_HALF_UP);
		$errtmacabs = $errtmacabs + $Matriz[$i][16];
		$conterrtmac = $conterrtmac + 1;
	}else{
		$Matriz[$i][16]='';
	}
}
$errtmac = round(($errtmacabs/$conterrtmac),4,PHP_ROUND_HALF_UP);

//MOSTRAR ELEMENTOS DE LA MATRIZ
print("<table><tr style= 'box-shadow:0px 5px 5px -2px rgba(0, 0, 0, 0.25)'>");
for ($i = 0; $i < count($colName); $i++){
	print("<th>".$colName[$i]."</th>");
}
print("<th>PS</th><th>EABS(PS)</th><th>PMS(k)</th><th>EABS(PMS(k))</th><th>PSE(PMS)</th><th>EABS(PSE)</th><th>PMD(J))</th><th>EA(PMD(J))</th><th>A</th><th>B</th><th>PMDA</th><th>EPMDA</th><th>TMAC</th><th>PTMAC</th><th>EABS(PTMAC)</th>");
print("</tr>");
for($i=0;$i<mysqli_num_rows($query)+2;$i++){

	print("<tr><td>".@$Matriz[$i][0]."</td>
			<td>".@$Matriz[$i][1]."</td>
			<td>".@$Matriz[$i][2]."</td>
			<td>".@$Matriz[$i][3]."</td>
			<td>".@$Matriz[$i][4]."</td>
			<td>".@$Matriz[$i][5]."</td>
			<td>".@$Matriz[$i][6]."</td>
			<td>".@$Matriz[$i][7]."</td>
			<td>".@$Matriz[$i][8]."</td>
			<td>".@$Matriz[$i][9]."</td>
			<td>".@$Matriz[$i][10]."</td>
			<td>".@$Matriz[$i][11]."</td>
			<td>".@$Matriz[$i][12]."</td>
			<td>".@$Matriz[$i][13]."</td>
			<td>".@$Matriz[$i][14]."</td>
			<td>".@$Matriz[$i][15]."</td>
			<td>".@$Matriz[$i][16]."</td></tr>");
}
print("<tr><td>Errores Medios</td><td></td><td></td><td>".$err."</td>
	<td></td><td>".$errormpms."</td>
	<td></td><td>".$errpse."</td>
	<td></td><td>".$errpmd."</td>
	<td></td><td></td><td></td><td>".$errpmda."</td>
	<td></td><td></td><td>".$errtmac."</td></tr>");

print("</table>");

$_SESSION["k"] = $k;
$_SESSION['j'] = $j;
$_SESSION['alfa'] = $alfa;

if ($err<$errormpms && $err<$errpse && $err<$errpmd && $err<$errpmda && $err<$errtmac) {
	echo "<script>alert('El pronostico del Promedio Simple es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoPSF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoPSF2.php'\">Ver grafica</button>";
	}
}
if ($errormpms<$err && $errormpms<$errpse && $errormpms<$errpmd && $errormpms<$errpmda && $errormpms<$errtmac) {
	echo "<script>alert('El pronostico del Promedio Movil Simple es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMSF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMSF2.php'\">Ver grafica</button>";
	}

}
if ($errpse<$err && $errpse<$errormpms && $errpse<$errpmd && $errpse<$errpmda && $errpse<$errtmac) {
	echo "<script>alert('El pronostico del Promedio Movil Simple Suavizado es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoPSEF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoPSEF2.php'\">Ver grafica</button>";
	}
}
if ($errpmd<$err && $errpmd<$errormpms && $errpmd<$errpse && $errpmd<$errpmda && $errpmd<$errtmac) {
	echo "<script>alert('El pronostico del Promedio Movil Doble es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMDF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMDF2.php'\">Ver grafica</button>";
	}

}
if ($errpmda<$err && $errpmda<$errormpms && $errpmda<$errpse && $errpmda<$errpmd && $errpmda<$errtmac) {
	echo "<script>alert('El pronostico del Promedio Movil Doble Ajustado es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMDAF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoPMDAF2.php'\">Ver grafica</button>";
	}

}
if ($errtmac<$err && $errtmac<$errormpms && $errtmac<$errpse && $errtmac<$errpmd && $errtmac<$errpmda) {
	echo "<script>alert('El pronostico del Promedio Tasas Medias de Crecimiento es la mejor opción')</script>";

	if($frec == "magna"){
		echo "<button onclick=\"window.location.href='graficoProyectoTMACF1.php'\">Ver grafica</button>";
	}
	if($frec == "premium"){
		echo "<button onclick=\"window.location.href='graficoProyectoTMACF2.php'\">Ver grafica</button>";
	}
}

$contador=$contador-1;

}
?>

</body>
</html>
