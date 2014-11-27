function calrefri()
{
	var total = parseFloat(document.getElementById("totalfact").value);
	var igvafec = parseFloat(document.getElementById("igvafec").value);
	var afecto = (igvafec * 100) / 18;
	alert(afecto);
	document.getElementById("igvafec").value() = afecto;
}
