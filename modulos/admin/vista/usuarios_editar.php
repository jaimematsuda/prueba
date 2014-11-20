<br />
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validausrmod(this)">
	<fieldset>
		<legend>Modificar Datos de Usuario</legend>
		<label>Nombre :</label>
		<input type ="text" id="nombre" name="nombre" readonly value="<?php echo $editarusr['nombre'];?>" />
		<input type ="checkbox" id="modnombre" name="nombreck" value="nombreck" onclick="cambiareadonly(this)" />Modificar<br />
		<label>Usuario :</label>
		<input type = "text" id="usuario" name="usuario" readonly value="<?php echo $editarusr['usuario'];?>" />
		<input type ="checkbox" id="modusuario" name="usuariock" value="usuariock" onclick="cambiareadonly(this)" />Modificar<br />
		<label>Clave :</label>
		<input type="password" id="clave" name="clave" readonly value="" />
		<input type ="checkbox" id="modclave" name="claveck" value="claveck" onclick="cambiareadonly(this) "/>Modificar<br />
		<label>Repetir clave :</label>
		<input type="password" id="clave2" name="clave2" readonly value="" /><br />
		<br />
		<label>Perfil :</label>
		<select id="perfil" name="perfil" disabled="disabled">
			<option value="admin">Admin</option>
			<option value="usuario" selected>Usuario</option>
			<option value="editor">Editor</option>
			<option value="consulta">Consulta</option>
		</select>
		<input type ="checkbox" id="modperfil" name="perfilck" value="perfilck" onclick="cambiardisabled(this)" />Modificar<br />
		<br />
		<input type="submit" value="Modificar" />
	</fieldset>
</form><br />
