<?php

	//*** Lista todos los Contactos ***
function list_contacto($db)
{
	$query = "SELECT b.id_email_use_grp AS id_relc, a.id_email, nombre , email, f.estado AS estmail FROM emails AS a ".
			"INNER JOIN emails_users_grupos AS b ON b.id_email=a.id_email ".
			"INNER JOIN emails_grupos AS c ON b.id_grupo=c.id_grupo ".
			"INNER JOIN rel_estados_emails AS d ON a.id_email=d.id_email ".
			"INNER JOIN rel_estados_email_use_grps AS e ON b.id_email_use_grp=e.id_email_use_grp ".
			"INNER JOIN estados AS f ON f.id_estado=d.id_estado ".
			"INNER JOIN estados AS g ON g.id_estado=e.id_estado ".
			"GROUP BY nombre, email";
	$contactolist = rs_table($query,$db);
//dump($contactolist, true);
	return $contactolist;
}

	//*** Inserta un nuevo usuario ***
function contacto_insert($query, $db)
{
	if (isset($GLOBAS["debug"]) && $GLOBALS["debug"]) {
		$fech = mysql_query($query) or die (mysql_error()."<br />".$query);
	}else{
		$fech = mysql_query($query) or die ("ERROR EN LA GRABACION");
	}
	$id = mysql_insert_id();
	return $id;
}

	//*** Selecciona un Contacto segun el id ***
function contacto_data($id,$db) 
{
	$query = "SELECT a.id_email, nombre, email, f.estado AS estmail, b.id_email_use_grp AS rel_mail, b.id_grupo, grupo, g.estado AS estgrp FROM emails AS a ".
			"INNER JOIN emails_users_grupos AS b ON a.id_email=b.id_email ".
			"INNER JOIN emails_grupos AS c ON b.id_grupo=c.id_grupo ".
			"INNER JOIN rel_estados_emails AS d ON a.id_email=d.id_email ".
			"INNER JOIN rel_estados_email_use_grps AS e ON b.id_email_use_grp=e.id_email_use_grp ".
			"INNER JOIN estados AS f ON f.id_estado=d.id_estado ".
			"INNER JOIN estados AS g ON g.id_estado=e.id_estado ".
			"WHERE a.id_email=$id ";
	$contacto_data = rs_table($query, $db);
//dump($contacto_data, true);
	return $contacto_data;
}

	//*** Modifica el registro de un usuario segun el query que manda el controlador ***
function contacto_modify($query,$db) 
{
	if (isset($GLOBAS["debug"]) && $GLOBALS["debug"]) {
		$fech = mysql_query($query) or die (mysql_error()."<br />".$query);
	}else{
		$fech = mysql_query($query) or die ("ERROR EN LA MODIFICACION");
	}
	$id = mysql_insert_id();
	return $id;		
}

function select_id($query, $db) 
{
	$fid = mysql_query($query, $db) or die (mysql_query()."<br />".$query);
	$arrayid = mysql_fetch_assoc($fid);
	if(!empty($arrayid)){
		foreach ($arrayid AS $c => $id);
		return $id;
	}else{
		return false;
	}
}

	//*** Borra todo el registro de la DB ****
function contacto_delete($id,$db) 
{
	$query = "DELETE FROM usuarios WHERE id_usuario='$id'";
	exec_query($query,true,$db);
}

?>
