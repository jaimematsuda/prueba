<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$artsist = utf8_decode($_POST['articulosistema']);
	$consulta = "SELECT u.detallado FROM articulos_sistemas AS a ".
				"INNER JOIN unidades AS u ON a.id_unidad = u.id_unidad ".
				"WHERE a.detallado = '".$artsist."'";

	$result = $conexion->query($consulta);

	if($result->num_rows > 0){
		$fila = $result->fetch_array();
		$unidad = utf8_encode($fila['detallado']);
	}
	
	echo json_encode($unidad);
?>
