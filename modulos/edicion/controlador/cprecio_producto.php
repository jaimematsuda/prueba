<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/cprecio_producto.php";
	// Aca el controlador llama al css
	$css_vista = array();
	$css_vista[] = $dir_css."/index.css";
	require_once "modelo/producto_precio.php";
	$producto_precios = producto_precios($db);
	require_once "temas/$tema/tema.php"; 
?>
