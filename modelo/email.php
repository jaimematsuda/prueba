<?php

	//*** Devuelve array de EMAIL DEL GRUPO POLLO PARA EL FORMULARIO ***
function para_form_pollo($db)
{	
	$query = "SELECT nombre, email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=1 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	$cadena_para = "";
	foreach ($data as $fila) {
		$nombre = $fila["nombre"];
		$email = $fila["email"];
		$cadena_para = $cadena_para.$nombre." [".$email."], ";
	}
	return $cadena_para;
}

	//*** Devuelve array de EMAIL DEL GRUPO POLLO PARA ENVIAR EMAIL ***
function para_email_pollo($db)
{	
	$query = "SELECT email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=1 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve array de EMAIL DEL GRUPO PAPA PARA EL FORMULARIO ***
function para_form_papa($db)
{	
	$query = "SELECT nombre, email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=2 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	$cadena_para = "";
	foreach ($data as $fila) {
		$nombre = $fila["nombre"];
		$email = $fila["email"];
		$cadena_para = $cadena_para.$nombre." [".$email."], ";
	}
	return $cadena_para;
}

	//*** Devuelve array de EMAIL DEL GRUPO PAPA PARA ENVIAR EMAIL ***
function para_email_papa($db)
{	
	$query = "SELECT email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=2 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	return $data;
}

	//*** Devuelve array de EMAIL DEL GRUPO PAPA PARA EL FORMULARIO ***
function para_form_verdura($db)
{	
	$query = "SELECT nombre, email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=3 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	$cadena_para = "";
	foreach ($data as $fila) {
		$nombre = $fila["nombre"];
		$email = $fila["email"];
		$cadena_para = $cadena_para.$nombre." [".$email."], ";
	}
	return $cadena_para;
}

	//*** Devuelve array de EMAIL DEL GRUPO PAPA PARA ENVIAR EMAIL ***
function para_email_verdura($db)
{	
	$query = "SELECT email ".
	"FROM emails as a ".
	"INNER JOIN rel_estados_emails as b ON a.id_email=b.id_email AND b.id_estado=1 ".
	"INNER JOIN emails_users_grupos as c ON a.id_email=c.id_email AND c.id_grupo=3 ".
	"INNER JOIN rel_estados_email_use_grps as d ON c.id_email_use_grp=d.id_email_use_grp AND d.id_estado=1";
	$data = rs_table($query,$db);
	return $data;
}
