<?php

	//*** Agrega un nuevo registro ***
function agregar_nuevo($fecha,$vigencia_inicio, $vigencia_final, $proveedor,$producto,$unidad,$valor_venta,$db)
{
	mysql_query ("BEGIN");	

	$query = "INSERT IGNORE proveedores (proveedor) "."VALUES ('$proveedor')";
	$rs = mysql_query($query, $db) or die ("error al ingresar proveedor");
	$fid = mysql_query("SELECT id_proveedor FROM proveedores WHERE proveedor='$proveedor'") or die (mysql_query()."<br/> ".$query);
	$id_proveedor = mysql_fetch_assoc($fid);

	$query = "INSERT IGNORE productos (producto) "."VALUES ('$producto')";
	$rs = mysql_query($query) or die ("error al ingresar producto");	
	$fid = mysql_query("SELECT id_producto FROM productos WHERE producto ='$producto'") or die (mysql_query()."<br/> ".$query);
	$id_producto = mysql_fetch_assoc($fid);

	$fid = mysql_query("SELECT * FROM"." proveedores_productos WHERE id_proveedor = ".$id_proveedor['id_proveedor']." AND id_producto = ".$id_producto['id_producto']) or die (mysql_query()."<br/> ".$query);

	$cant_filas = mysql_num_rows($fid);

	if ($cant_filas == 0){
			$query = "INSERT INTO proveedores_productos (id_proveedor, id_producto) "."VALUES (".$id_proveedor['id_proveedor'].",". $id_producto['id_producto'].")";
		$rs = mysql_query($query) or die ("error al ingresar proveedores_productos");
	}

	$fid = mysql_query("SELECT id_prov_prod FROM proveedores_productos WHERE id_proveedor = ".$id_proveedor['id_proveedor']." AND id_producto =". $id_producto['id_producto']) or die (mysql_query()."<br/> ".$query);
	$id_prov_prod = mysql_fetch_assoc($fid) or die (mysql_query()."<br/> ".$query);

	$query = "INSERT INTO precios (id_prov_prod, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta) "."VALUES (".$id_prov_prod['id_prov_prod'].", '$fecha', '$vigencia_inicio', '$vigencia_final', '$unidad', $valor_venta)";
	$mensajef = "error al ingresar VALOR VENTA";
	$rs = mysql_query($query) or die ("$mensajef");

	mysql_query("COMMIT");

	return true;
}

	//*** Devuelve array de datos relacionados de proveedor producto precios SIN VERDURAS SIN PROVEEDOR CHICO***
function producto_precios($db)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor AND (c.id_proveedor <> 17 AND c.id_proveedor <> 15 AND c.id_proveedor <> 19) ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve array de datos relacionados de proveedor producto precios PROVEEDOR CHICO***
function producto_precios_chico($db, $cons_prov, $cons_prod)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor AND c.id_proveedor = $cons_prov ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto $cons_prod".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve array de datos relacionados de proveedor producto precios SOLO VERDURAS***
function producto_precios_verd($db)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor AND (c.id_proveedor = 17 OR c.id_proveedor = 19) ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve array de datos relacionados PROVEEDOR CHICO POLLO***
function proveedor_pollo($db)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd AND (c.id_prov_prod = 15 OR c.id_prov_prod = 16 OR c.id_prov_prod = 17 OR c.id_prov_prod = 18) ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}


	//*** Devuelve array de datos relacionados PROVEEDOR CHICO PAPA ***
function proveedor_papa($db)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd AND (c.id_prov_prod = 19 OR c.id_prov_prod = 20 OR c.id_prov_prod = 21) ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}


	//*** Devuelve array de datos relacionados PROVEEDOR CHICO VERDURA***
function proveedor_verdura($db)
{
	$query = "SELECT d.id_pvd, d.fecha, d.vigencia_inicio, d.vigencia_final, a.proveedor, b.producto, d.unidad, d.valor_venta ".
	"FROM ".
	"(SELECT id_prov_prod AS id_pvd, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_pvd DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd AND (c.id_prov_prod = 25 OR c.id_prov_prod = 26 OR c.id_prov_prod = 27) ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
 	"ORDER BY producto, proveedor";
 	$data = rs_table($query,$db);
	return $data;
}


	//*** Borra el registro seleccionado ***
function borrar($id, $db){
	mysql_query ("BEGIN");
	$query = "DELETE FROM proveedores_productos WHERE id_prov_prod = ".$id;
	mysql_query($query, $db) or die ("ERROR AL BORRAR");
	return true;
}


	//*** Compara e inserta un query ***
function insertar_precio($id_pr_pr, $cfecha, $cunidad, $cvalor_venta){
	mysql_query("BEGIN");
	$query = "INSERT INTO precios (id_prov_prod, fecha, unidad, valor_venta) VALUES (".$id_pr_pr.", '".$cfecha."', '".$cunidad."', ".$cvalor_venta.")";
	$mensaje = "Error al ingresar precios";
	$rs = mysql_query($query) or die("$mensaje");
	return $rs; 
}

	//*** Modifica un registro de una sola columna valor segun la condicion que envia el controlador ***
function editar_registro($tabla, $columna, $valor, $condicion, $db){
		$query = "UPDATE ".$tabla." SET ".$columna." = ".$valor." WHERE ".$condicion;
		$mensaje = "Error al modificar producto";
		$rs = mysql_query($query) or die("$mensaje");
		return $rs; 
}
?>

