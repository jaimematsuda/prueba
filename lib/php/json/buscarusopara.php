<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$busopara = utf8_decode($_GET['term']);
	$consulta = "SELECT DISTINCT uso_para FROM usos_descartables WHERE uso_para LIKE '%$busopara%'";
	
	$result = $conexion->query($consulta);
	
	if($result->num_rows > 0){
		while($fila = $result->fetch_array()){
			$usosparas[] = utf8_encode($fila['uso_para']);
		}
		echo json_encode($usosparas);
	}
?>	
