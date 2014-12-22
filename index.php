<?php
	//*** Definiendo variables de configuracion ***
	require_once "config/config.php";

	//*** Inicia la sesion y carga las variables de sesion existentes, si es que las hay ***
	session_start(); // Inicia la sesion y carga las variables de sesión existentes
	// si es que las hay

	$modulo = "principal"; 		//*** Modulo por defecto ***
	if(isset($_GET["modulo"])){
		$modulo = addslashes(trim($_GET["modulo"]));
		if(!is_dir("modulos/$modulo")){
			die("Modulo no existe");
		}
	}

	$pagina = "index";
	if(isset($_GET["pagina"])){
		$pagina = addslashes(trim($_GET["pagina"]));	
	}

	require_once "modulos/$modulo/index.php";
?>
