<div>
	<h2>PROVEEDOR POLLO CAMBIAR PRECIO</h2>
	<br />
		<span>Ingresar Fecha :</span>
		<input type="textbox" id="vigencia_inicio" name="vigencia_inicio" value="Vigencia inicio" size="8px" readonly/>
		&nbsp;
		<input type="textbox" id="vigencia_final" name="vigencia_final" value="Vigencia final" size="8px" readonly />
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<span>Fecha del Siguiente Cambio :</span>
		<input id="fecha_siguiente" name="fecha_siguiente" value="" size="10px" readonly/>
		<br /><br />
		<?php data_to_table_chico($producto_precios_chico, "cambiar"); ?>
		<br />
		<input id="enviardtdb" type="button" name="enviar" value="Modificar Precios" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_pollo'" />
		&nbsp; &nbsp;
		<input type="button" id="formMail" name="formMail" value="Enviar Email" onclick="window.location.href='index.php?modulo=email&pagina=form_email_pollo'" />
		<br />
</div>
