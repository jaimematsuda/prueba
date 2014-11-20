function multiplicarprod(r)
{
	var m1 = parseFloat(document.getElementById("tablaprod").rows[r].cells[3].innerHTML);
	var m2 = parseFloat(document.getElementById("cantprod"+r).value);
	var t = m1 * m2;
	if(m2) {
		document.getElementById("totalprod"+r).value = t;
	}else{
		t = Math.round(t*1000)/1000;
		document.getElementById("totalprod"+r).value = "";
	}
}

function multiplicarverd(r)
{
	var m1 = parseFloat(document.getElementById("tablaverd").rows[r].cells[3].innerHTML);
	var m2 = parseFloat(document.getElementById("cantverd"+r).value);
	var t = m1 * m2;
	if(m2) {
		document.getElementById("totalverd"+r).value = t;
	}else{
		t = Math.round(t*1000)/1000;
		document.getElementById("totalverd"+r).value = "";
	}
}
