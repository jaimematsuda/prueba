<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/index.php";

	$css_vista = array();
	$css_vista[] = $dir_css."/".$pagina.".css";

	require_once "temas/$tema/tema.php"; 
?>
