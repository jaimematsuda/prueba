<div>
	<form action="" id="formail">
	<h2>ENVIAR EMAIL VERDURA</h2>
	<br />
		<span>Para :</span>
		<br />
		<textarea id="para_email" name="para_email" value="" rows="5" cols="85">
			<?php echo $para_form_verdura ?>
		</textarea>
		<input type="button" id="edit_email" value="Editar Contactos" onclick="window.location.href='index.php?modulo=contacto&pagina=contactos&action=listar'"/>
		<br />
		<span>Con Copia :  INGRESAR SEPARADOS POR COMA EJEMPLO... direc1@gmail.com, direc22@hotmail.com</span>
		<br />
		<textarea id="cc_email" name="cc_email" value="" rows="2" cols="85">
		</textarea>
		<br />
		<span>Asunto :</span>
		<br />
		<textarea id="asunto_email" name="asunto_email" value="" rows="1" cols="85">
PRECIO DE VERDURA
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
		<?php data_to_table_mail_verd($proveedor_verdura); ?>
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
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=email&pagina=index'" />
		&nbsp; &nbsp;
		<input type="button" id="enviaemail" name="enviaemail" value="Enviar Email Verdura" />
		<br />
	</form>
</div>
	
