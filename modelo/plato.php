<?php

function agregar_uso_descartable($tienda_tipo, $pedido_tipo, $area, $plato, 
	$uso_descartable = array(), $db)
{
	mysql_query ("BEGIN");	

	//*** Busca id de tiendas_tipos si no encuentra inserta un nuevo registro ***
	$query = "SELECT id_tienda_tipo FROM tiendas_tipos WHERE tienda_tipo = '$tienda_tipo'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	if ($id = mysql_fetch_assoc($fid)) {
		$id_tienda_tipo = $id['id_tienda_tipo'];
	}else{
		$query = "INSERT INTO tiendas_tipos(tienda_tipo) VALUES(UPPER('".utf8_decode($tienda_tipo)."'))";
		$rs = mysql_query($query, $db) or die ("error al ingresar datos de Tipo de Tienda");
		$id_tienda_tipo = mysql_insert_id();
	}


	//*** Busca id de pedidos_tipos si no encuentra inserta un nuevo registro ***
	$query = "SELECT id_pedido_tipo FROM pedidos_tipos WHERE pedido_tipo = '$pedido_tipo'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	if ($id = mysql_fetch_assoc($fid)) {
		$id_pedido_tipo = $id['id_pedido_tipo'];
	}else{
		$query = "INSERT INTO pedidos_tipos(pedido_tipo) VALUES(UPPER('".utf8_decode($pedido_tipo)."'))";
		$rs = mysql_query($query, $db) or die ("error al ingresar datos de Tipo de Tienda");
		$id_pedido_tipo = mysql_insert_id();
	}


	//*** Busca id de platos si no encuentra inserta un nuevo registro ***
	$query = "SELECT id_plato FROM platos WHERE plato = '$plato'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	if ($id = mysql_fetch_assoc($fid)) {
		$id_plato = $id['id_plato'];
	}else{
		$query = "INSERT INTO platos(plato, activo, id_area) VALUES(UPPER('".
			utf8_decode($plato)."'), 1, (SELECT id_area FROM areas WHERE ".
			"area = '".utf8_decode($area)."'))";
		$rs = mysql_query($query, $db) or die ("error al ingresar datos de Platos");
		$id_plato = mysql_insert_id();
	}


	//*** Busca el id de la relacion tiendas_platos si encuentra Inserta la relacion  ***
	$query = "SELECT id_rel_tienda_plato FROM rel_tiendas_platos WHERE id_tienda_tipo = 
		$id_tienda_tipo AND id_pedido_tipo =$id_pedido_tipo AND id_plato = $id_plato";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br />".$query);
	if ($id = mysql_fetch_assoc($fid)) {
		$id_rel_tienda_plato = $id['id_rel_tienda_plato'];
	} else {
		$query = "INSERT INTO rel_tiendas_platos(id_tienda_tipo, id_pedido_tipo, ".
			"id_plato, activo) VALUES(".$id_tienda_tipo.", ".$id_pedido_tipo.", ".
			$id_plato.", 1)";
		$rs = mysql_query($query, $db) or die ("error al ingresar Relacion Tiendas_Platos");
		$id_rel_tienda_plato = mysql_insert_id();
	}

	//*** Bucle para recorrer array de uso_para y buscar id del descartable ***
	foreach ($uso_descartable as $listarry => $uso_para) {
		if (!empty($uso_para[0])) {
			$query = "SELECT id_articulo_sistema FROM articulos_sistemas WHERE detallado = '".
				utf8_decode($uso_para[1])."'";
			$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
			$id = mysql_fetch_assoc($fid);
			$id_articulo_sistema = $id['id_articulo_sistema'];

			$query = "SELECT id_uso_descartable FROM usos_descartables WHERE uso_para = '".
				$uso_para[0]."' && id_articulo_sistema = '".$id_articulo_sistema."'";
			$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
			if ($id = mysql_fetch_assoc($fid)) {
				$id_uso_descartable = $id['id_uso_descartable'];
			}else{
				$query = "INSERT INTO usos_descartables(uso_para, id_articulo_sistema) ".
					"VALUES(UPPER('".utf8_decode($uso_para[0])."'), '".$id_articulo_sistema."')";
				$rs = mysql_query($query, $db) or die ("error al ingresar datos de Usos Descartables");
				$id_uso_descartable = mysql_insert_id();
			}

			$query = "INSERT INTO rel_platos_descartables(id_rel_tienda_plato, id_uso_descartable, cantidad) ".
				"VALUES(".$id_rel_tienda_plato.", ".$id_uso_descartable.", ".$uso_para[2].")";
			$rs = mysql_query($query, $db) or die ("error al ingresar datos de Platos");
		}
	}
	mysql_query("COMMIT");

	return true;
}

?>
