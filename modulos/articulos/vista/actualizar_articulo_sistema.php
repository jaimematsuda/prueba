<br />
<h2>ARTICULOS DE INFOREST ACTUALIZADOS :</h2>
<?php
	if (empty($salida))
	{
		echo "<br />";
		echo "No hay articulos por actualizar";
	}
	else
	{
		echo "<br />";
		foreach ($salida as $lista) {
			echo "<p>".$lista."</p>";
		}
	}
?>
<br />

