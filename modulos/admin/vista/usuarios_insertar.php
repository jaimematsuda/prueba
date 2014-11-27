<br />
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validausr(this)">
	<fieldset>
		<legend>Ingresar Nuevo Usudario</legend>
		<label>Nombre :</label>
		<input type ="text" name="nombre" /><br />
		<label>Usuario :</label>
		<input type = "text" name="usuario" /><br />
		<label>Clave :</label>
		<input type="password" name="clave" /><br />
		<label>Repetir clave :</label>
		<input type="password" name="clave2" /><br />
		<br />
		<label>Perfil :</label>
		<select name="perfil">
			<option value="admin">Admin</option>
			<option value="usuario" selected>Usuario</option>
			<option value="editor">Editor</option>
			<option value="consulta">Consulta</option>
		</select><br/>
		<br />
		<input type="submit" value="Ingresar" />
	</fieldset>
</form><br />
