<?php 

$conexion = new mysqli('localhost','root','','ProyectoDSS');
	//CREAR LA PETICION
	$contactos = "SELECT * FROM gasolina";
	//EJECUTAR PETICION Y GUARDAR RESPUESTA
	$respuesta = $conexion->query($contactos);
	//HACER ARREGLO Y VOLVERLO JSON
	$arreglo = array();
	while ($contacto = $respuesta->fetch_object()) {
		array_push($arreglo, array(
			"periodo"=>$contacto->periodo,
			"fecha"=>$contacto->fecha,
			"magna"=>$contacto->frecuencia,
			"premium"=>$contacto->frecuencia2
		));
	}
	//IMPRIMIR LA RESPUESTA EN JSON
	echo json_encode($arreglo);

?>