<div>
	<form action="" id="formail">
	<h2>ENVIAR EMAIL POLLO</h2>
	<br />
		<span>Para :</span>
		<br />
		<textarea id="para_email" name="para_email" value="" rows="5" cols="85">
jaimematsuda@gmail.com
		</textarea>
		<input type="button" id="edit_email" value="Editar Direcciones" />
		<br />
		<br />
		<span>Asunto :</span>
		<br />
		<textarea id="asunto_email" name="asunto_email" value="" rows="1" cols="35">
PRECIO DEL POLLO
		</textarea>
		<br />
		<br />
		<span>Cabezera :</span>
		<br />
		<textarea id="cabezera_email" name="cabezera_email" value="" rows="5" cols="50">
		</textarea>
		<br />
		<br />
		<span>REVISAR LOS DATOS A ENVIAR</span>
		<br />
		<br />
		<?php data_to_table_mail($proveedor_pollo, "precio+IGV"); ?>
		<span>Notas :</span>
		<br />
		<textarea id="nota_email" name="nota_email" value="" rows="7" cols="85"></textarea>
		<br />
		<br />
		<span>Pie de Email :</span>
		<br />
		<textarea id="pie_email" name="pie_email" value="" rows="6" cols="35">
Sachi Kina
Area de Facturaci&oacute;n y Pagos 
Telef. 719-7664 Anex. 541 
Nextel: 427*0931 / 837*4689
skina@macroscem.com
		</textarea>
		<br />
		<br />
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_chico'" />
		&nbsp; &nbsp;
		<input type="button" id="enviamail" name="enviamail" value="Enviar Email" />
		<br />
	</form>
</div>
	
