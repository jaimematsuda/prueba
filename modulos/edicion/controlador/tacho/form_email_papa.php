<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/form_email.php";
	// Aca el controlador llama al css
	$css_vista = array();
	$css_vista[] = "css/jquery-ui.css";
	$css_vista[] = $dir_css."/index.css";
	$js_vista = array();
	$js_vista[] = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js";
	$js_vista[] = $dir_js."/edicion.js";
	require_once "modelo/producto_precio.php";
	$proveedor_pollo = proveedor_pollo($db);
	require_once "temas/$tema/tema.php"; 
?>
