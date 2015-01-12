<?php

function agregar_articulo($proveedor, $articulo_sistema, $unidad, $articulo_documento, $presentacion, $db)
{
	mysql_query ("BEGIN");	

	//*** Busca id de proveedores_sistemas ***
	$query = "SELECT id_proveedor_sistema FROM proveedores_sistemas WHERE razon_social = '$proveedor'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	$id = mysql_fetch_assoc($fid);
	$id_proveedor = $id['id_proveedor_sistema'];

	//*** Busca id de articulos_sistemas ***
	$query = "SELECT id_articulo_sistema FROM articulos_sistemas WHERE detallado = '".
		utf8_decode($articulo_sistema)."'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	$id = mysql_fetch_assoc($fid);
	$id_articulo_sistema = $id['id_articulo_sistema'];

	//*** Inserta articulos_documentos y recoge id del insert ***
	$query = "INSERT INTO articulos_documentos(descripcion, presentacion) VALUES(UPPER('".
			utf8_decode($articulo_documento)."'), UPPER('".utf8_decode($presentacion)."'))";
	$rs = mysql_query($query, $db) or die ("error al ingresar ARTICULO DOCUMENTO");

	$id_articulo_documento = mysql_insert_id();

	//*** Inserta relacion proveedor articulos documentos sistemas ***
	$query = "INSERT INTO rel_provs_arts_docs_sists(id_proveedor_sistema, id_articulo_sistema, ".
			"id_articulo_documento, estado) VALUES('".$id_proveedor."', '".$id_articulo_sistema.
			"', ".$id_articulo_documento.", 1)";
	$rs = mysql_query($query, $db) or die ("error al ingresar datos de la relación");
	
	mysql_query("COMMIT");

	return true;
}


function agregar_tipologia($tipo_egreso, $descripcion, $db)
{
	mysql_query ("BEGIN");	

	$query = "SELECT id_tipo_egreso FROM tipologias_egresos WHERE tipo_egreso='".
		utf8_decode($tipo_egreso)."'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	$id = mysql_fetch_assoc($fid);
	if($id){
		$id_tipo_egreso = $id['id_tipo_egreso'];
		$query = "INSERT INTO tipologias_descripciones(id_tipo_egreso, descripcion) ".
			"VALUES(".$id_tipo_egreso.", '".utf8_decode($descripcion)."')";
		$rs = mysql_query($query, $db) or die ("error al ingresar TIPOLOGÍA DE EGRESOS1");
	}else{
		$query = "INSERT INTO tipologias_egresos(tipo_egreso) VALUES(UPPER('".
			utf8_decode($tipo_egreso)."'))";
		$rs = mysql_query($query, $db) or die ("error al ingresar TIPOLOGÍA DE EGRESOS2");
		$id_tipo_egreso = mysql_insert_id();
		$query = "INSERT INTO tipologias_descripciones(id_tipo_egreso, descripcion) ".
			"VALUES(".$id_tipo_egreso.", '".utf8_decode($descripcion)."')";
		$rs = mysql_query($query, $db) or die ("error al ingresar TIPOLOGÍA DE EGRESOS3");
	}
		
	mysql_query("COMMIT");

	return true;
}

function actualizar_articulo_sist()
{
	$query = "SELECT id_articulo_sistema FROM articulos_sistemas ORDER BY ".
		"id_articulo_sistema DESC LIMIT 1";

	$mensaje = "Error al ejecutar consulta de articulos_sistemas";
	$rs = mysql_query($query) or die("$mensaje");
	$row = mysql_fetch_array($rs);
	$idproducto = $row['id_articulo_sistema'];

	conectar_mssql($conn);
	$query = "SELECT tCodigoProducto, tCodigoSubFamilia, tResumido, tDetallado, tUnidadEntrada FROM TPRODUCTO WHERE tCodigoProducto > '".
		$idproducto."'";
	$rs = mssql_query($query);
	if ($rs == false) 
	{
		echo "Error al ejecutar consuta";
		echo "<br />";
		die (print_r (mssql_get_last_message()));
	}
	$actualizado = array();
	$mensaje = "Error al ingresar precios";
	mysql_query ("BEGIN");	
	while ($rs = mssql_fetch_array($rs))
	{
		$query = "INSERT INTO articulos_sistemas(id_articulo_sistema, ".
			"id_articulo_sub_familia, detallado, resumido, id_unidad) ".
			"VALUES('%s', '%s', '%s', '%s', '%s')",
			$rs['tCodiogProducto'], $rs['tCodigoSubFamilia'],
			$rs['tDetallado'], $rs['tResumido'],
			$rs['tUnidadEntrada'];
		
		$dato = mysql_query($query) or die("$mensaje");
		$actualizado[] = $rs['tDetallado'];
		
	}
	mysql_query("COMMIT");
	mssql_free_result($rs);
	mssql_close($)
	return $actualizado; 
}


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

