$(function() {
	$("#enviamail").click(function() {
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
		$.post("index.php?modulo=edicion&pagina=envioemail", $("#formail").serialize(),
			function(data) {
				alert("prueba envio " + data);
		});
	});
})
