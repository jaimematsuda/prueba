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

function valida(form)
{
	if($("#bkn_dias").val() == "") {
		alert("Debe Ingresar CANTIDAD DE DIAS");
		$("#bkn_dias").focus();
		return false;
	}
	return true;
}
