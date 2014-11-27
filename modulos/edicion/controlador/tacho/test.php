<?php
	require "/var/www/html/guiaprecios/lib/funciones.php";
	if(!empty($_POST)) {
	dump($_POST,true);
	}
	echo $_POST["name"];
?>
