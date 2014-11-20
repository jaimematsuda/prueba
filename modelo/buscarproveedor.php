<?php
	//probar llamando a la funcion de conexion a la base sin usar mysqli
	$conexion = new mysqli('localhost','guiaprecios','prat38','guiaprecios',3306);
	$proveedor = utf8_decode($_GET['term']);
	$consulta = "SELECT razon_social FROM proveedores_sistemas WHERE razon_social LIKE '%$proveedor%'";
	
	$result = $conexion->query($consulta);
	
	if($result->num_rows > 0){
		while($fila = $result->fetch_array()){
			$proveedores[] = utf8_encode($fila['razon_social']);
		}
		echo json_encode($proveedores);
	}
?>	
