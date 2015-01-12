<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/".$pagina.".php";

	$css_vista = array();
	$css_vista[] = $dir_css."/".$pagina.".css";

	require_once "modelo/articulo.php";
	$articulos_actualizados = actualizar_articulo_sist($db);

	require_once "temas/$tema/tema.php"; 
?>
