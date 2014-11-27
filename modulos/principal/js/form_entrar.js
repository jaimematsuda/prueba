function clearField(obj) {
	if (obj.defaultValue==obj.value) obj.value = '';
}

function pwdFocus() {
	$("#password").hide();
	$("#clave").show();
	$("#clave").focus();
}

function pwdBlur() {
	if ($("#clave").attr("value") == '') {
		$("#clave").hide();
		$("#password").show();
	}
}
