<?php
	require_once "modelo/lista.php";
	$cambio = tcambio_sunat();
	$compra = $cambio["cambio_compra"];
	$venta = $cambio["cambio_venta"];
	echo "<p>Tipo de cambio SUNAT</p><br />\n";
	echo "<p>Compra&nbsp; : &nbsp;".$compra."</p>\n";
	echo "<p>Venta &nbsp; &nbsp; &nbsp;: &nbsp;".$venta."</p>";
?>
