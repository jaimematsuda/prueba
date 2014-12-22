<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$artsist = utf8_decode($_GET['term']);
	$consulta = "SELECT detallado FROM articulos_sistemas WHERE detallado LIKE '%$artsist%'";
	
	$result = $conexion->query($consulta);

	if($result->num_rows > 0){
		while($fila = $result->fetch_array()){
			$articulosist[] = utf8_encode($fila['detallado']); // utf8_encode
		}
		echo json_encode($articulosist);
	}
?>
