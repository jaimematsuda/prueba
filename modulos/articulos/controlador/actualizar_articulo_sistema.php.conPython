<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/".$pagina.".php";

	$css_vista = array();
	$css_vista[] = $dir_css."/".$pagina.".css";

	$salida = array();
	exec("python /var/www/html/guiaprecios/lib/python/actualizar_registros/actualizar_articulos.py", $salida);
	foreach ($salida as $rs) {
		$salida1 = $rs;
	}
	require_once "temas/$tema/tema.php"; 
?>
