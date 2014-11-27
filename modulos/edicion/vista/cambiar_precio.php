<script type="text/javascript">
	$(function() {
		$("#vigencia_inicio").datepicker( {
        	closeText: 'Cerrar',
	        prevText: '&#x3c;Ant',
    	    nextText: 'Sig&#x3e;',
        	currentText: 'Hoy',
	        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'],
    	    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Set','Oct','Nov','Dic'],
        	dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	        dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Jue','Vie','S&aacute;b'],
    	    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
        	weekHeader: 'Sm',
	        dateFormat: 'dd/mm/yy',
    	    firstDay: 1,
        	isRTL: false,
	        showMonthAfterYear: false,
    	    yearSuffix: ''
		});
	});
</script>

<span class="rojo"><?php echo $mensaje;?></span><br />
<form method="post" action="" enctype="multipart/form-data" onsubmit="return valida(this)">
	<fieldset>
		<legend>CAMBIAR PRECIO</legend>
		<label>Fecha :</label>
		<input type="date" name="fecha" readonly value="<?php echo date("d/m/Y");?>" /><br />
		<label>Vigencia inicio :</label>
		<input type="textbox" id="vigencia_inicio" name="vigencia_inicio"  value="<?php echo cform_fecha($editar['vigencia_inicio']);?>" /><br />
		<label>Vigencia final :</label>
		<input id="vigencia_final" name="vigencia_final" readonly value="<?php echo cform_fecha($editar['vigencia_final']);?>" />
		<input type="checkbox" id="vigencia_finalck" name="vigencia_finalck" value="vigencia_finalck" onclick="cambiareadonlydatepicker(this)" />Modificar<br />
		<label>Proveedor :</label>
		<input type="text" name="proveedor" readonly="readonly" value="<?php echo $editar['proveedor'];?>" /><br />
		<label>Producto :</label>
		<input type="text" name="producto" readonly="readonly" value="<?php echo $editar['producto'];?>" /><br />
		<label>Unidad :</label>	
		<input type="text" name="unidad" readonly="readonly" value="<?php echo $editar['unidad'];?>" /><br />
		<label>Valor Venta :</label>
		<input type="text" name="valor_venta" value=<?php echo $editar['valor_venta'];?> /><br />
		<br /> &nbsp;
		<input type="submit" name="enviar" value="Cambiar" href="index.php?modulo=edicion&pagina=cambiar_precio&id=<?php echo $id;?>" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=index'" />
	</fieldset>
</form>
