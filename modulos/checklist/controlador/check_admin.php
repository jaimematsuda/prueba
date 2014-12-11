<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/".$pagina.".php";
	$css_vista = array();
	$css_vista[] = $dir_css."/".$pagina.".css";
	$css_vista[] = "js/tooltip/css/jquery.tooltip.css";
	$js_vista = array();
	$js_vista[] = "js/tooltip/jquery.tooltip.min.js";
	$jq_vista = '$j = jQuery.noConflict();
					$j(document).ready(function(){
					$j("div.item").tooltip();
				});';
	require_once "temas/$tema/tema.php"; 
?>
