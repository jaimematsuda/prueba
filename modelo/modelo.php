<?php

	//*** Inserta un query ***
function insert($query, $db) 
{
    exec_query($query,true,$db);
	return true;
}

	//*** Busca id segun los datos que se envia ***
function buscar_id($campos, $tabla, $condicion)
{
    $fid = mysql_query("SELECT ".$campos." FROM ".$tabla." WHERE ".$condicion);
    $rs = mysql_fetch_assoc($fid);
    return $rs;
}

	//*** Busca id segun los datos que se envia ***
function buscar_idpp($campos, $tabla, $condicion)
{
    $fid = mysql_query("SELECT ".$campos." FROM ".$tabla." WHERE ".$condicion);
    $rs = mysql_fetch_assoc($fid);
    return $rs;
}

	//*** Devuelve un registro segun el id, y el query que envia el controlador ***
function select_editar_info($id, $query, $db)
{
    $data = rs_row($query,$db);
    return $data;
}

	//*** Devuelve una lista segun el query que envia el controlador ***
function select_list_edit($query, $db)
{
	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve una lista para un combo segun el query que envia el controlador ***
function select_list_combo($query, $db)
{
	$data = rs_table($query,$db);
	return $data;
}

	//*** Modifica un registro segun el query que envia el controlador ***
function reg_modify($query,$db) {
    exec_query($query,true,$db);
}


?>
