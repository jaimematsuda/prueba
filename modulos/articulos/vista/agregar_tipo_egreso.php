<span class="rojo"><?php echo $mensaje;?></span><br />

<form class="formarticulo" id="agregararticulo" method="post" action="" enctype="multipart/form-data" accept-charset="utf-8">
	<fieldset>
		<legend>Agregar Nueva Tipología de Egresos</legend>
		<label>Tipología de Egreso :</label>
		<input type="text" id="tipo_egreso" name="tipo_egreso" value="" autofocus required/><br />
		<label>Descripción:</label>
		<textarea id="descripcion" name="descripcion" rows="5" cols="40" required>
		</textarea>
		<br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="reset" name="cancelar" value="Cancelar" />
	</fieldset>
</form>

