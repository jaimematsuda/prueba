<br />
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validausrmod(this)">
	<fieldset>
		<legend>Agregar Contacto</legend>
		<label>Nombre :</label>
		<input type ="text" id="nombre" name="nombre" size="30" value="" />
		<label>Email :</label>
		<input type = "text" id="email" name="email" size="30" value="" />
		<br />
		<br />
		<label>Grupo Pollo :</label>
		<input type='checkbox' id='g_pollo' name='g_pollo' value='Pollo' />
		<br />
		<label>Grupo Papa :</label>
		<input type='checkbox' id='g_papa' name='g_papa' value='Papa' />
		<br />
		<label>Grupo Verdura :</label>
		<input type='checkbox' id='g_verdura' name='g_verdura' value='Verdura' />
		<br />
		<br />
		<label>Estado :</label>
		<select id="estado" name="estado">
				<option value='Activo' selected>Activo</option>
				<option value='Inactivo'>Inactivo</option>
		</select>
		<br />
		<br />
		&nbsp; &nbsp;
		<input type="submit" value="Grabar" />
		&nbsp; &nbsp;
		<input type="button" value="Regresar" onclick="window.location.href='index.php?modulo=contacto&pagina=contactos'" />
	</fieldset>
</form><br />
