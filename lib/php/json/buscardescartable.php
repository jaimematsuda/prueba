<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$bdescartable = utf8_decode($_GET['term']);
	$consulta = "SELECT detallado FROM articulos_sistemas WHERE detallado LIKE '%$bdescartable%' AND id_articulo_sub_familia = '0302'";
	
	$result = $conexion->query($consulta);
	
	if($result->num_rows > 0){
		while($fila = $result->fetch_array()){
			$descartables[] = utf8_encode($fila['detallado']);
		}
		echo json_encode($descartables);
	}
?>	
