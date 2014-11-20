<div>
	<h2>ENVIAR EMAIL POLLO</h2>
	<br />
		<span>Email :</span>
		<input type="textbox" id="para_email" name="para_email" value="pdiaz@macroscem.com" size="50px" />
		<br />
		<br />
		<span>Cabezera :</span>
		<br />
		<textarea id="cabezera" name="cabezera" value="" rows="5" cols="50"></textarea>
		<br />
		<br />
		<?php data_to_table_chico($proveedor_pollo, "enviar"); ?>
		<span>Notas :</span>
		<br />
		<textarea id="nota" name="nota" value="" rows="10" cols="50"></textarea>
		<br />
		<br />
		<input id="enviardtdb" type="button" name="enviar" value="Modificar Precios" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_chico'" />
		&nbsp; &nbsp;
		<input type="button" name="enviamail" value="Enviar Email" onclick="window.location.href='index.php?modulo=edicion&pagina=form_email'" />
		<br />
</div>
	
