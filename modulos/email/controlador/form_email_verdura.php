<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/form_email_verdura.php";
	// Aca el controlador llama al css
	$css_vista = array();
	$css_vista[] = $dir_css."/index.css";
	$js_vista = array();
	$js_vista[] = $dir_js."/edicion.js";
	$js_vista[] = $dir_js."/cabezera_email.js";
	$js_vista[] = $dir_js."/form_email.js";
	require_once "modelo/producto_precio.php";
	require_once "modelo/email.php";
	$proveedor_verdura = producto_precios_verd($db);
	$para_form_verdura = para_form_verdura($db);
	require_once "temas/$tema/tema.php"; 
?>
