<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/index.php";
	$css_vista = array();
	$css_vista[] = $dir_css."/".$pagina.".css";
	$js_vista = array();
	$js_vista[] = $dir_js."/multiplicar.js";
	$jq_vista = "$(document).ready(function() {
		setInterval(function() {
			$(\"#body\").load(location.href+\" #body>*\",\"\");
		}, 1800000);
		});";
	$id_usuario = $_SESSION["id_usuario"];

	require_once "modelo/lista.php";
	$lista = lista($db);
	$lista_verdura = lista_verdura($db);
	
	require_once "temas/$tema/tema.php"; 
?>
