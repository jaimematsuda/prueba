<?php
	$mensaje = "";
	// id es el id_email
	if(isset($_GET["id"])) {
		$id = addslashes(trim($_GET["id"]));
		if(!is_dir("modulos/$modulo")) {
			die("Modulo no existe");
		}
	}
	$js_vista = array();
	$js_vista[] = $dir_js."/contactos_editar.js";
	require "modelo/contacto.php";
	// si hay alguna modificacion se procede a comparar con el anterior
	// si no es igual se procedera al cambio

	if (!empty ($_POST) ) { 
//dump($_POST, true);
		mysql_query("BEGIN");
		$concatenado = "";
		if (isset($_POST["nombreck"])) {
			$nombre = addslashes(trim($_POST["nombre"]));
			$concatenado = "nombre='$nombre', ";
		}
		if (isset($_POST["emailck"])) {			
			$email = addslashes(trim($_POST["email"]));
			$concatenado = $concatenado."email='$email'";
		}
		if (!empty($concatenado)) {
			$query = "UPDATE emails SET $concatenado WHERE id_email=$id";
			contacto_modify($query, $db);
		}
		if (isset($_POST["estadock"])) {			
			$estado = addslashes(trim($_POST["estado"]));
			if ($estado == "activo") {
				$id_estado = 1;
			}else{
				$id_estado = 2;
			}
		}
		if (!empty($estado)) {
			$query = "UPDATE rel_estados_emails SET id_estado='$id_estado' WHERE id_email=$id";
			contacto_modify($query, $db);
		}
		if (isset($_POST["g_pollock"])) {
			$query = "SELECT id_email_use_grp FROM emails_users_grupos WHERE id_email=$id AND id_grupo=1";
			$id_emailgrp = select_id($query, $db);
			if ($id_emailgrp) {
				if (isset($_POST["g_pollo"])) {
					$estado = 1;
				} else {
					$estado = 2;
				}
				$query = "UPDATE rel_estados_email_use_grps SET id_estado=$estado WHERE id_email_use_grp=$id_emailgrp";
				$idmod = contacto_modify($query, $db);
			}else{
				$query = "INSERT emails_users_grupos(id_email, id_grupo) VALUES($id, 1)";
				$id_emailgrp = contacto_insert($query, $db);
				$query = "INSERT rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_emailgrp, 1)";
				$id_relemailgpr = contacto_insert($query,$db);
			}
		}					
		if (isset($_POST["g_papack"])) {
			$query = "SELECT id_email_use_grp FROM emails_users_grupos WHERE id_email=$id AND id_grupo=2";
			$id_emailgrp = select_id($query, $db);
			if ($id_emailgrp) {
				if (isset($_POST["g_papa"])) {
					$estado = 1;
				} else {
					$estado = 2;
				}
				$query = "UPDATE rel_estados_email_use_grps SET id_estado=$estado WHERE id_email_use_grp=$id_emailgrp";
				$idmod = contacto_modify($query, $db);
			}else{
				$query = "INSERT emails_users_grupos(id_email, id_grupo) VALUES($id, 2)";
				$id_emailgrp = contacto_insert($query, $db);
				$query = "INSERT rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_emailgrp, 1)";
				$id_relemailgpr = contacto_insert($query,$db);
			}
		}					
		if (isset($_POST["g_verdurack"])) {
			$query = "SELECT id_email_use_grp FROM emails_users_grupos WHERE id_email=$id AND id_grupo=3";
			$id_emailgrp = select_id($query, $db);
			if ($id_emailgrp) {
				if (isset($_POST["g_verdura"])) {
					$estado = 1;
				} else {
					$estado = 2;
				}
				$query = "UPDATE rel_estados_email_use_grps SET id_estado=$estado WHERE id_email_use_grp=$id_emailgrp";
				$idmod = contacto_modify($query, $db);
			}else{
				$query = "INSERT emails_users_grupos(id_email, id_grupo) VALUES($id, 3)";
				$id_emailgrp = contacto_insert($query, $db);
				$query = "INSERT rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_emailgrp, 1)";
				$id_relemailgpr = contacto_insert($query,$db);
			}
		}					
		mysql_query("COMMIT");
		$lista = list_contacto($db);
		$vista = $dir_vista."/contactos_lista.php";
	}else{
		$editarcontacto = contacto_data($id, $db);
		$vista = $dir_vista."/contactos_editar.php";
	}
require_once "temas/$tema/tema.php";
?>
