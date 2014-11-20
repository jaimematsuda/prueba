$(function() {
	var campo3, campo4;
	$("#tabla tbody tr").not(":first").not(":last").each(function(index) {
		$(this).children("td").each(function(index2) {
			switch (index2) {
				case 2:
					campo3 = $(this).text();
					break;
				case 3:
					campo4 = $(this).text();
					break;
			}
		})
	})
	var texto1 = "BUENAS TARDES";
	var texto2 = "PRECIO DEL POLLO,";
	var texto3 = "SEMANA DEL " + campo3 + " AL " + campo4;
	var texto4 = texto1 + "\n" + "\n" + texto2 + "\n" + texto3;
	$("#cabezera_email").val(texto4);
})
