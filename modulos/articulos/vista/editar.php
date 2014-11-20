<span class="rojo"><?php echo $mensaje;?></span><br />
<form method="post" action="" enctype="multipart/form-data" onsubmit="return validatodo(this)">
	<fieldset>
		<legend>EDITAR REGISTRO</legend>
		<label>Fecha :</label>
		<input type="date" name="fecha" readonly value=<?php echo date("d/m/Y"); ?> /><br />
		<label>Vigencia inicio :</label>
		<input type="text" id="vigencia_inicio" name="vigencia_inicio" readonly value="<?php echo cform_fecha($vigencia_inicio) ?>" />
		<input type ="checkbox" id="vigencia_iniciock" name="vigencia_iniciock" value="vigencia_iniciock" onclick="cambiareadonlydatepicker(this)" />editar<br />
		<label>Vigencia final :</label>
		<input type="text" id="vigencia_final" name="vigencia_final" readonly value="<?php echo cform_fecha($vigencia_final) ?>" />
		<input type ="checkbox" id="vigencia_finalck" name="vigencia_finalck" value="vigencia_finalck" onclick="cambiareadonlydatepicker(this)" />editar<br />
		<label>Proveedor :</label>
		<input type="text" id="proveedor" name="proveedor" readonly value="<?php echo $proveedor; ?>" />
		<input type ="checkbox" id="proveedorck" name="proveedorck" value="proveedorck" onclick="cambiareadonly(this)" />editar<br />
		<label>Producto :</label>
		<input type="text" id="producto" name="producto" readonly value="<?php echo $producto ?>" />
		<input type ="checkbox" id="productock" name="productock" value="productock" onclick="cambiareadonly(this)" />editar<br />
		<label>Unidad :</label>
		<input type="text" id="unidad" name="unidad" readonly value="<?php echo $unidad ?>" />
		<input type ="checkbox" id="unidadck" name="unidadck" value="unidadck" onclick="cambiareadonly(this)" />editar<br />
		<label>Valor Venta :</label>
		<input type="text" id="valor_venta" name="valor_venta" readonly value="<?php echo $valor_venta?>" />
		<input type ="checkbox" id="valor_ventack" name="valor_ventack" value="valor_ventack" onclick="cambiareadonly(this)" />editar<br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=seleccionar&id=<?php echo $id_prov_prod ?>'" />
	</fieldset>
</form>
