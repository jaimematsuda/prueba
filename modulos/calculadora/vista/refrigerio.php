<br />
<br />
<form name="calcrefrig" action="">
	<fieldset>
		<legend>REFRIGERIO AFECTO INAFECTO</legend>
		<label>Ingresar Total Factura :</label>
		<input id="totalfact" type="text" size="10" /><br /><br />
		<label>Ingresar IGV :</label>
		<input id="igvafec" type="text" size="10" /><br /><br />&nbsp;&nbsp;
		<input id="borrar" type="button" value="Borrar" />&nbsp;&nbsp;
		<input id="calcular" type="button" value="Calcular" /><br /><br />
		<label>Refrigerio afecto igv   :</label>&nbsp;<span id="afecto" class="calref"></span>
		<br /><br />
		<label>Refrigerio inafecto igv :</label>&nbsp;<span id="inafecto" class="calref"></span>
	</fieldset>	
</form>
<br />
<?php 
	echo "<h4>".$mensaje."</h4>"; 
?>
