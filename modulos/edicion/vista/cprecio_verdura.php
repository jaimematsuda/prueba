<div>
	<h2>VERDURA CAMBIAR PRECIO</h2>
	<br />
	<span>Ingresar Fecha :</span>
	<input type="texbox" id="vigencia_inicio" name="vigencia_inicio" value="Vigencia inicio" size="8px" readonly />
	&nbsp;
	<input type="texbox" id="vigencia_final" name="vigencia_final" value="Vigencia final" size="8px" readonly />
	<br /><br />
	<?php data_to_table_chico($producto_precios_verdura, "cambiar"); ?>
	<br />
	<input id="enviardtdb" type="button" name="enviar" value="Modificar Precios" />
	&nbsp; &nbsp;
	<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_verdura'" />
	&nbsp; &nbsp;
	<input type="button" id="formMail" name="formMail" value="Enviar Email" onclick="window.location.href='index.php?modulo=email&pagina=form_email_verdura'" />
	&nbsp; &nbsp;
</div>
