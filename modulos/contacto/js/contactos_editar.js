function validausr(form) {
	
	if(form.nombre.value=="") {
		alert("Ingrese el Nombre ");
		form.nombre.focus();
		return false;
	}

	if(form.usuario.value==""){
		alert("Debe Ingresar el Usuario");
		form.usuario.focus();
		return false;
	}

	if(form.clave.value==""){
		alert("Debe Ingresar Clave");
		form.clave.focus();
		return false;
	}

	if(form.clave2.value==""){
		alert("Debe Volver a Ingresar la Clave");
		form.clave2.focus();
		return false;
	}

	if(form.clave.value!==form.clave2.value){
		alert("La Clave no COINCIDE Ingrese Nuevamente");
		form.clave.focus();
		return false;
	}
	return true;
}

function validausrmod(form) {
	
	if ($("#modnombre").attr("checked")) {	
		if($("#nombre").val() == "") {
			alert("Ingrese el Nombre ");
			$("#nombre").focus();
			return false;
		}
	}

	if ($("#modusuario").attr("checked")) {
		if($("#usuario").val() == "") {
			alert("Debe Ingresar el Usuario");
			$("#usuario").focus();
			return false;
		}
	}

	if ($("#modclave").attr("checked")) {
		if($("#clave").val() == "") {
			alert("Debe Ingresar Clave");
			$("#clave").focus();
			return false;
		}	
	}

	if ($("#modclave").attr("checked")) {
		if($("#clave").val()!==$("#clave2").val()){
			alert("La Clave no COINCIDE Ingrese Nuevamente");
			$("#clave").focus();
			return false;
		}
	}
	return true;
}

function cambiareadonly(input) {
	var checknam = input.value;
	var checkval = checknam.substring(0, checknam.length-2);
	if ($("#mod"+checkval).attr("checked")) {
		$("#"+checkval).removeAttr("readonly").focus();
		if (checkval == "clave") {		
			$("#"+checkval).val("");
			$("#"+checkval+"2").removeAttr("readonly").val("");
		}
	}else{
		$("#"+checkval).attr("readonly",true);
		if (checkval == "clave") {		
			$("#"+checkval+"2").attr("readonly",true);
		}
	}
}	

function cambiardisabled(input) {
	if ($("#modestado").attr("checked")) {
		$("#estado").removeAttr("disabled");
	}else{
		$("#estado").attr("disabled","disabled");
	}
}

function cambiardisabledgrpollo(input) {
	if ($("#g_pollock").attr("checked")) {
		$("#g_pollo").removeAttr("disabled");
	}else{
		$("#g_pollo").attr("disabled","disabled");
	}
}

function cambiardisabledgrpapa(input) {
	if ($("#g_papack").attr("checked")) {
		$("#g_papa").removeAttr("disabled");
	}else{
		$("#g_papa").attr("disabled","disabled");
	}
}
function cambiardisabledgrverdura(input) {
	if ($("#g_verdurack").attr("checked")) {
		$("#g_verdura").removeAttr("disabled");
	}else{
		$("#g_verdura").attr("disabled","disabled");
	}
}
