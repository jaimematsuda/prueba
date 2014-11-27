$(function() {
	$("#enviaemail").click(function() {
//		$("input[type=text]").removeAttr("readonly");
		var para = $("#para_email").val();
		var asunto = $("#asunto_email").val();
		var cabezera = $("#cabezera_email").val();
		var i = 1;
		var postdata = "to: \"" + para + "\", subject: \"" + asunto + "\", cabezera: \"" + cabezera + "\", ";
		$("#tabla tbody tr").not(":first").each(function(index) {
			var producto, precio;
			$(this).children("td").each(function(index2) {
				switch (index2) {
					case 5:
						producto = $(this).text();
						break;
					case 7:
						precio = $(this).children("input").val();
						break;
				}
			})
			postdata += "producto" + i + ": '" + producto + "', " + "precio" + i + ": '" + precio + "', ";
			i += 1;
		})
		var nota = $("#nota_email").val();
		var pie = $("#pie_email").val();
		postdata += "nota: '" + nota + "', pie: '" + pie + "'";
//		alert(postdata);
		if($("#enviaemail").val() == "Enviar Email Papa") {
				var mensajesss = $("#enviaemail").val();
				alert(mensajesss);
			$.post("index.php?modulo=email&pagina=envioemail_papa", $("#formail").serialize(),
				function(data) {
					alert("Mensaje Enviado Revisar Bandeja de entrada para verificar si hay algun correo rebotado");
					window.location.href='index.php?modulo=email&pagina=index';
			});
		}
		if($("#enviaemail").val() == "Enviar Email Pollo") {
				var mensajesss = $("#enviaemail").val();
				alert(mensajesss);
			$.post("index.php?modulo=email&pagina=envioemail_pollo", $("#formail").serialize(),
				function(data) {
					alert("Mensaje Enviado Revisar Bandeja de entrada para verificar si hay algun correo rebotado");
					window.location.href='index.php?modulo=email&pagina=index';
			});
		}
		if($("#enviaemail").val() == "Enviar Email Verdura") {
			$.post("index.php?modulo=email&pagina=envioemail_verdura", $("#formail").serialize(),
				function(data) {
					alert("Mensaje enviado Revisar Bandeja de entrada para verificar si hay algun correo rebotado");
					window.location.href='index.php?modulo=email&pagina=index';
			});
		}
	});
})
