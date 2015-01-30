<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$bplato = utf8_decode($_GET['term']);
	$consulta = "SELECT plato FROM platos WHERE plato LIKE '%$bplato%'";
	
	$result = $conexion->query($consulta);
	
	if($result->num_rows > 0){
		while($fila = $result->fetch_array()){
			$platos[] = utf8_encode($fila['plato']);
		}
		echo json_encode($platos);
	}
?>	
