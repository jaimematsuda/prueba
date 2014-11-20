function cambiareadonly(input) 
{
    var checknam = input.value;
    var checkval = checknam.substring(0, checknam.length-2);
    if ($("#"+checknam).attr("checked")) {
        $("#"+checkval).removeAttr("readonly").focus();
    }else{
        $("#"+checkval).attr("readonly",true);
    }
}

function cambiareadonlyclear(input) 
{
    var checknam = input.value;
    var checkval = checknam.substring(0, checknam.length-2);
    if ($("#"+checknam).attr("checked")) {
		$("#"+checkval).attr("value", "");
        $("#"+checkval).removeAttr("readonly").focus();
    }else{
        $("#"+checkval).attr("readonly",true);
    }
}

function cambiareadonlydatepicker(input) 
{
    var checknam = input.value;
    var checkval = checknam.substring(0, checknam.length-2);
    if ($("#"+checknam).attr("checked")) {
        $("#"+checkval).removeAttr("readonly");
		$("#"+checkval).datepicker("enable");
        $("#"+checkval).datepicker( {
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
    }else{ 
		$("#"+checkval).attr("readonly", true).datepicker("disable");
    }   
}    

function valida(form)
{
	var vfechain = form.vigencia_inicio.value;
	var vfechafi = form.vigencia_final.value;

	if(form.vigencia_inicio.value==""){
		alert("Debe Ingresar la fecha de VIGENCIA INICIAL");
		form.vigencia_inicio.focus();
		return false;
	}
	
	if(validafecha(vfechain)) {
		form.vigencia_inicio.focus();
		return false;
	}

	if($("#vigencia_finalck").attr("checked")) {
		if($("#vigencia_final").val() == "") {
			alert("Debe Ingresar la fecha de VIGENCIA FINAL");
			$("#vigencia_final").focus();
			return false;
		}
		if(validafecha(vfechafi)) {
			form.vigencia_final.focus();
			return false;
		}
	}else{
		$("#vigencia_final").attr("value", "00/00/0000");
	}
	if(form.proveedor.value==""){
		alert("Debe Ingresar el Proveedor");
		form.proveedor.focus();
		return false;
	}

	if(form.producto.value==""){
		alert("Debe Ingresar el Producto");
		form.producto.focus();
		return false;
	}

	if(form.unidad.value==""){
		alert("Debe Ingresar la Unidad");
		form.unidad.focus();
		return false;
	}

	if(form.valor_venta.value==""){
		alert("Debe Ingresar el Valor Venta");
		form.valor_venta.focus();
		return false;
	}

	return true;
}

function validatodo(form)
{
	var vfechain = form.vigencia_inicio.value;
	var vfechafi = form.vigencia_final.value;

	if($("#vigencia_iniciock").attr("checked")) {
		if($("#vigencia_inicio").val() == ""){
			alert("Debe Ingresar la fecha de VIGENCIA INICIAL");
			$("#vigencia_inicio").focus();
			return false;
		}
		if(validafecha(vfechain)) {
			form.vigencia_inicio.focus();
			return false;
		}
	}

	if($("#vigencia_finalck").attr("checked")) {
		if($("#vigencia_final").val() == "") {
			alert("Debe Ingresar la fecha de VIGENCIA FINAL");
			$("#vigencia_final").focus();
			return false;
		}
		if(validafecha(vfechafi)) {
			form.vigencia_final.focus();
			return false;
		}
	}

	if($("#proveedorck").attr("checked")) {
		if($("#proveedor").val() == ""){
			alert("Debe Ingresar el Proveedor");
			$("#proveedor").focus();
			return false;
		}
	}

	if($("#productock").attr("checked")) {
		if($("#producto").val() == ""){
			alert("Debe Ingresar el Producto");
			$("#producto").focus();
			return false;
		}
	}
	if($("#unidadck").attr("checked")) {
		if($("#unidad").val() == ""){
			alert("Debe Ingresar el Unidad");
			$("#unidad").focus();
			return false;
		}
	}
	if($("#valor_ventack").attr("checked")) {
		if($("#valor_venta").val() == ""){
			alert("Debe Ingresar el Valor Venta");
			$("#valor_venta").focus();
			return false;
		}
	}
	return true;
}

function validafecha(fecha)
{
	var expfecha = /^\d{2}\/\d{2}\/\d{4}$/;
	var dmy = fecha.split("/");
	var dia = dmy[0];
	var mes = dmy[1];
	if(!fecha.match(expfecha)) {
		alert("Ingrese el formato correcto ejm. 01/12/2011");
		return true;
	}
	if(dia > 31) {
		alert("El dia no puede ser mayor a 31");
		return true;
	}
	if(mes > 12) {
		alert("El mes no puede ser mayor a 12");
		return true;
	}
	return false;
}

function borrarcampos()
{
	$("#vigencia_inicio").attr("value", "");
	$("#vigencia_final").attr("value", "");
	$("#vigencia_proveedor").attr("value", "");
	$("#vigencia_producto").attr("value", "");
	$("#vigencia_unidad").attr("value", "");
	$("#vigencia_valor_venta").attr("value", "");
	return;
}
