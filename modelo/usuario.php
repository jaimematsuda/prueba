<?php

	//*** Selecciona los datos del usuario que hace login ***
function login_user($usuario,$clave,$db){
	$query = "SELECT id_usuario,usuario,perfil FROM usuarios WHERE ".
			"usuario='$usuario' AND clave=md5('$clave')";
	$userdata = rs_row($query,$db);
	return $userdata;
}

	//*** Lista todos los usuarios ***
function list_user($db){
	$query = "SELECT id_usuario,nombre,usuario,perfil FROM usuarios";
	$userlist = rs_table($query,$db);
	return $userlist;
}

	//*** Inserta un nuevo usuario ***
function user_insert($nombre,$usuario,$clave,$perfil,$db){
	$query = "INSERT INTO usuarios (nombre, usuario, clave, perfil) values ('$nombre', '$usuario', md5('$clave'), '$perfil')";
	exec_query($query,true,$db);
}

	//*** Selecciona un usuarios segun el id ***
function user_data($id,$db) {
	$query = "SELECT nombre, usuario, clave, perfil FROM usuarios WHERE id_usuario = $id";
	if(isset($GLOBALS["debug"]) && $GLOBALS["debug"]) {
		$fetch = mysql_query($query) or die (mysql_error()."<br />".$query);
		$userdata = mysql_fetch_assoc($fetch);
		return $userdata;
	}else{
		$fetch = mysql_query($query) or die ("error en la consulta");
		$userdata = mysql_fetch_assoc($fetch);
		return $userdata;
	}
}

	//*** Modifica el registro de un usuario segun el query que manda el controlador ***
function user_modify($query,$db) {
	exec_query($query,true,$db);
}

	//*** Borra todo el registro de la DB ****
function user_delete($id,$db) {
	$query = "DELETE FROM usuarios WHERE id_usuario='$id'";
	exec_query($query,true,$db);
}

?>
