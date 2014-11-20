<span class="rojo"><?php echo $mensaje;?></span><br />
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

<form method="post" action="" enctype="multipart/form-data" onsubmit="return valida(this)">
	<fieldset>
		<legend>Agregar Nuevo Dato</legend>
		<label>Fecha :</label>
		<input type="date" name="fecha" readonly="readonly" value=<?php echo date("d/m/Y"); ?> /><br />
		<label>Vigencia inicio :</label>
		<input type="text" id="vigencia_inicio" name="vigencia_inicio" /><br />
		<label>Vigencia final :</label>
		<input type="text" id="vigencia_final" name="vigencia_final" readonly value="" />
		<input type ="checkbox" id="vigencia_finalck" name="vigencia_finalck" value="vigencia_finalck" onclick="cambiareadonlydatepicker(this)" />Ingresar<br />
		<label>Proveedor :</label>
		<input type="text" id="proveedor" name="proveedor" /><br />
		<label>Producto :</label>
		<input type="text" id="producto" name="producto" /><br />
		<label>Unidad :</label>
		<input type="text" id="unidad" name="unidad" /><br />
		<label>Valor Venta :</label>
		<input type="text" id="valor_venta" name="valor_venta" /><br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=agregar_nuevo&action=insertar'" />
	</fieldset>
</form>
