<?php
	$vista = $dir_vista."/lista_edit.php";
	require "modelo/producto_precio.php";
	require "modelo/modelo.php";
	$producto_precios = producto_precios($db);
	$producto_precios_verd = producto_precios_verd($db);
	$producto_precios_chico = producto_precios_chico($db, 15, "");
	require_once "temas/$tema/tema.php";
?>
