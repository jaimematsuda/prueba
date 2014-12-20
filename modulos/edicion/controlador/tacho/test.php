<?php
	require "/var/www/html/guiaprecios/lib/php/funciones.php";
	if(!empty($_POST)) {
	dump($_POST,true);
	}
	echo $_POST["name"];
?>
