<br />
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validausrmod(this)">
	<fieldset>
		<legend>Modificar Datos de Contacto</legend>
		<label>Nombre :</label>
		<input type ="text" id="nombre" name="nombre" size="30" readonly value="<?php echo $editarcontacto[0]['nombre'];?>" />
		<input type ="checkbox" id="modnombre" name="nombreck" value="nombreck" onclick="cambiareadonly(this)" />Modificar<br />
		<label>Email :</label>
		<input type = "text" id="email" name="email" size="30" readonly value="<?php echo $editarcontacto[0]['email'];?>" />
		<input type ="checkbox" id="modemail" name="emailck" value="emailck" onclick="cambiareadonly(this)" />Modificar<br />
		<input type = "hidden" id="rel_maila" name="rel_maila" size="30" readonly value="<?php echo $editarcontacto[0]['rel_mail'];?>" />
		<input type = "hidden" id="grpa" name="grpa" size="30" readonly value="<?php echo $editarcontacto[0]['grupo'];?>" />
		<?php if (isset($editarcontacto[1]['rel_mail'])) { ?>
			<input type = "hidden" id="rel_mailb" name="rel_mailb" size="30" readonly value="<?php echo $editarcontacto[1]['rel_mail'];?>" />
			<input type = "hidden" id="grpb" name="grpb" size="30" readonly value="<?php echo $editarcontacto[1]['grupo'];?>" />
		<?php } ?>
		
		<?php
//dump($editarcontacto, true);
			$checko0 = "";
			$checka0 = ""; 
			$checkv0 = ""; 
			$checko1 = "";
			$checka1 = ""; 
			$checkv1 = ""; 
			$checko2 = "";
			$checka2 = ""; 
			$checkv2 = ""; 
			switch ($editarcontacto[0]['grupo']) {
				case "Pollo":
					if ($editarcontacto[0]['estgrp'] == "Activo") {
						$checko0 = "checked";
					}else{
						$checko0 = "";
					}
					break;
				case "Papa":
					if ($editarcontacto[0]['estgrp'] == "Activo") {
						$checka0 = "checked";
					}else{
						$checka0 = "";
					}
					break;
				case "Verdura":
					if ($editarcontacto[0]['estgrp'] == "Activo") {
						$checkv0 = "checked";
					}else{
						$checkv0 = "";
					}
					break;
			}
			if (isset($editarcontacto[1]['grupo'])) {
				switch ($editarcontacto[1]['grupo']) {
					case "Pollo":
						if ($editarcontacto[1]['estgrp'] == "Activo") {
							$checko1 = "checked";
						}else{
							$checko1 = "";
						}
						break;
					case "Papa":
						if ($editarcontacto[1]['estgrp'] == "Activo") {
							$checka1 = "checked";
						}else{
							$checka1 = "";
						}
						break;
					case "Verdura":
						if ($editarcontacto[0]['estgrp'] == "Activo") {
							$checkv1 = "checked";
						}else{
							$checkv1 = "";
						}
						break;
				}
			}
			if (isset($editarcontacto[2]['grupo'])) {
				switch ($editarcontacto[2]['grupo']) {
					case "Pollo":
						if ($editarcontacto[2]['estgrp'] == "Activo") {
							$checko2 = "checked";
						}else{
							$checko2 = "";
						}
						break;
					case "Papa":
						if ($editarcontacto[2]['estgrp'] == "Activo") {
							$checka2 = "checked";
						}else{
							$checka2 = "";
						}
						break;
					case "Verdura":
						if ($editarcontacto[2]['estgrp'] == "Activo") {
							$checkv2 = "checked";
						}else{
							$checkv2 = "";
						}
						break;
				}
			}
			$checko = $checko0.$checko1.$checko2;
			$checka = $checka0.$checka1.$checka2;
			$checkv = $checkv0.$checkv1.$checkv2;
			echo "<label>Grupo Pollo :</label> \r";
			echo "<input type='checkbox' id='g_pollo' name='g_pollo' value='Pollo' $checko disabled /> \r";
			echo "<input type='checkbox' id='g_pollock' name='g_pollock' value='Pollo' onclick='cambiardisabledgrpollo(this)'/> :Modificar \r";
			echo "<br /> \r";
			echo "<label>Grupo Papa :</label> \r";
			echo "<input type='checkbox' id='g_papa' name='g_papa' value='Papa' $checka disabled /> \r";
			echo "<input type='checkbox' id='g_papack' name='g_papack' value='Papa' onclick='cambiardisabledgrpapa(this)' /> :Modificar \r";
			echo "<br /> \r";
			echo "<label>Grupo Verdura :</label> \r";
			echo "<input type='checkbox' id='g_verdura' name='g_verdura' value='Verdura' $checkv disabled /> \r";
			echo "<input type='checkbox' id='g_verdurack' name='g_verdurack' value='Verdura' onclick='cambiardisabledgrverdura(this)' /> :Modificar \r";
		?>
		<br />
		<label>Estado :</label>
		<select id="estado" name="estado" disabled="disabled">
			<?php if ($editarcontacto[0]['estmail'] == "Activo") { ?>
				<option value='activo' selected>Activo</option>
				<option value='inactivo'>Inactivo</option>
			<?php }else{ ?>
				<option value='activo'>Activo</option>
				<option value='inactivo' selected>Inactivo</option>
			<?php } ?>
		</select>
		<input type ="checkbox" id="modestado" name="estadock" value="estadock" onclick="cambiardisabled(this)" />Modificar<br />
		<br />
		<input type="submit" value="Modificar" />
		&nbsp; &nbsp;
		<input type="button" value="Regresar" onclick="window.location.href='index.php?modulo=contacto&pagina=contactos'" />
	</fieldset>
</form><br />
