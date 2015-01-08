<?php

function agregar_uso_descartable($tienda_tipo, $area, $plato, 
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

	//*** Busca id de platos si no encuentra inserta un nuevo registro ***
	$query = "SELECT id_plato FROM platos WHERE plato = '$plato'";
	$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
	if ($id = mysql_fetch_assoc($fid)) {
		$id_plato = $id['id_plato'];
	}else{
		$query = "INSERT INTO platos(plato, area, activo) VALUES(UPPER('".utf8_decode($plato)."'), UPPER('".
		utf8_decode($area)."'), 1)";
		$rs = mysql_query($query, $db) or die ("error al ingresar datos de Platos");
		$id_plato = mysql_insert_id();
	}


	//*** Inserta la relacion rel_tiendas_platos ***
	$query = "INSERT INTO rel_tiendas_platos(id_tienda_tipo, id_plato) VALUES(".
	$id_tienda_tipo.", ".$id_plato.")";
	$rs = mysql_query($query, $db) or die ("error al ingresar ARTICULO DOCUMENTO");


	//*** Bucle para recorrer array de uso_para y buscar id del descartable ***
	foreach ($uso_descartable as $uso_para => $detallado) {
		if (!empty($uso_para)) {

			$query = "SELECT id_articulo_sistema FROM articulos_sistemas WHERE detallado = '".
				utf8_decode($detallado)."'";
			$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
			$id = mysql_fetch_assoc($fid);
			$id_articulo_sistema = $id['id_articulo_sistema'];

			$query = "SELECT id_uso_descartable FROM usos_descartables WHERE uso_para = '".
				$uso_para."' && id_articulo_sistema = '".$id_articulo_sistema."'";
			$fid = mysql_query($query, $db) or die (mysql_query()."<br /> ".$query);
			if ($id = mysql_fetch_assoc($fid)) {
				$id_uso_descartable = $id['id_uso_descartable'];
			}else{
				$query = "INSERT INTO usos_descartables(uso_para, id_articulo_sistema) ".
					"VALUES(UPPER('".utf8_encode($uso_para)."'), '".$id_articulo_sistema."')";
				$rs = mysql_query($query, $db) or die ("error al ingresar datos de Usos Descartables");
				$id_uso_descartable = mysql_insert_id();
			}

			$query = "INSERT INTO rel_platos_descartables(id_plato, id_uso_descartable) ".
				"VALUES(".$id_plato.", ".$id_uso_descartable.")";
			$rs = mysql_query($query, $db) or die ("error al ingresar datos de Platos");
		}
	}
	mysql_query("COMMIT");

	return true;
}

?>
