<?php
	$mensaje = "";
	if(isset($_GET["id"])) {
		$id = addslashes(trim($_GET["id"]));
		if(!is_dir("modulos/$modulo")) {
			die("Modulo no existe");
		}
	}
	$css_vista = array();
	$css_vista[] = $dir_css."/usuarios_editar.css";
	$js_vista = array();
	$js_vista[] = $dir_js."/usuarios_editar.js";
	require "modelo/usuario.php";
	// si hay alguna modificacion se procede a comparar con el anterior
	// si no es igual se procedera al cambio

	if(!empty($_POST)){
		$nombre = addslashes(trim($_POST["nombre"]));
		$usuario = addslashes(trim($_POST["usuario"]));
		$clave = addslashes(trim($_POST["clave"]));
		if(isset($_POST["perfil"])) {
			$perfil = addslashes(trim($_POST["perfil"]));
		}
		$concatenado = "";
		if(isset($_POST["nombreck"])) {
			$nombreck = addslashes(trim($_POST["nombreck"]));
			$concatenado = substr($nombreck, 0, strlen($nombreck) - 2)."='".$nombre."', ";
		}
		if(isset($_POST["usuariock"])) {
			$usuariock = addslashes(trim($_POST["usuariock"]));
			$concatenado = $concatenado.substr($usuariock, 0, strlen($usuariock) - 2)."='".$usuario."', ";
		}
		if(isset($_POST["claveck"])) {
			$claveck = addslashes(trim($_POST["claveck"]));
			$concatenado = $concatenado.substr($claveck, 0, strlen($claveck) - 2)."=md5('".$clave."'), ";
		}
		if(isset($_POST["perfilck"])) {
			$perfilck = addslashes(trim($_POST["perfilck"]));
			$concatenado = $concatenado.substr($perfilck, 0, strlen($perfilck) - 2)."='".$perfil."', ";
		}
		$concatenado = substr($concatenado, 0, strlen($concatenado) - 2);
//		dump($concatenado,true);
		$query = "UPDATE usuarios SET ".$concatenado." WHERE id_usuario=$id";
		user_modify($query, $db);
		$lista = list_user($db);
		$vista = $dir_vista."/usuarios_lista.php";
	}else{
		$editarusr = user_data($id, $db);
		$vista = $dir_vista."/usuarios_editar.php";
	}
require_once "temas/$tema/tema.php";
?>
