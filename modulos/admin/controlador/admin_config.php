<?php
	$mensaje = "";
	if(!empty($_POST)) {
		require "modelo/modelo.php";
		$dias = addslashes(trim($_POST["bkn_dias"]));
		$query = "UPDATE config SET valor='$dias' where id_config=1";
		if(insert($query, $db)) {
		  echo "<script javascript> alert ('El Registro se ingreso correctamente') </script>";
		}
	}
	$js_vista = array();
	$js_vista[] = $dir_js."/admin.js";
	$vista = $dir_vista."/admin_config.php";
	require_once "temas/$tema/tema.php";
?>
