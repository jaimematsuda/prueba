<span class="rojo"><?php echo $mensaje;?></span><br />

<form method="post" action="" enctype="multipart/form-data" accept-charset="utf-8" onsubmit="return valida(this)">
	<fieldset>
		<legend>Agregar Nuevo Articulo</legend>
		<label>Proveedor :</label>
		<input type="text" id="proveedor" name="proveedor" value="" autofocus/><br />
		<label>Articulo en Sist. :</label>
		<input type="text" id="articulo_sistema" name="articulo_sistema" value="" /><br />
		<label>Unidad :</label>
		<input type="text" id="unidad" name="unidad" /><br />
		<label>Articulo en Doc. :</label>
		<input type="text" id="ariculo_documento" name="articulo_documento" value="" /><br />
		<label>Presentación :</label>
		<input type="text" id="presentacion" name="presentacion" value="" /><br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=articulo&pagina=agregar_articulo&action=insertar'" />
	</fieldset>
</form>
