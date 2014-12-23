<span class="rojo"><?php echo $mensaje;?></span><br />

<form class="formarticulo" id="agregararticulo" method="post" action="" enctype="multipart/form-data" accept-charset="utf-8">
	<fieldset>
		<legend>Agregar Nuevo Articulo</legend>
		<label>Proveedor :</label>
		<input type="text" id="proveedor" name="proveedor" value="" autofocus required/><br />
		<label>Articulo en Sist. :</label>
		<input type="text" id="articulo_sistema" name="articulo_sistema" value="" required/><br />
		<label>Unidad :</label>
		<input type="text" id="unidad" name="unidad" required/><br />
		<label>Articulo en Doc. :</label>
		<input type="text" id="ariculo_documento" name="articulo_documento" value="" required/><br />
		<label>Presentación :</label>
		<input type="text" id="presentacion" name="presentacion" value="" required/><br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="reset" name="cancelar" value="Cancelar" />
	</fieldset>
</form>

