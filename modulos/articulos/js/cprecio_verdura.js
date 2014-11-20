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
		dayNamesShortMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	});
	$("#vigencia_inicio").change(function() { 
		var fecha = $("#vigencia_inicio").val();
		$("#tabla tbody tr").not("*:first").each(function(index) {
			$(this).children("td").each(function(index2) {
				if (index2 == 2) {
					$(this).text(fecha);
				}
			});
		});
		$("#vigencia_final").removeAttr("readonly");
		$("#vigencia_final").val("");
		$("#vigencia_final").datepicker( {
			closeText: 'Cerrar',
			prevText: '&#x3c;Ant',
			nextText: 'Sig&#x3e;',
			currentText: 'Hoy',
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Set','Oct','Nov','Dic'],
			dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
			dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Jue','Vie','S&aacute;b'],
			dayNamesShortMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		});
		$("#vigencia_final").change(function() {
			var fecha1 = $("#vigencia_inicio").val();
			var fecha2 = $("#vigencia_final").val();
			if (!(fecha2 == ("00/00/0000" | ""))) {
				if (validafechamayor(fecha1, fecha2)) {
					alert("La Vigencia FINAL NO PUEDE SER MENOR QUE la Vigencia INICIO");
					return false;
				}
			}
			$("#tabla tbody tr").not("*:first").each(function(index) {
				$(this).children("td").each(function(index2) {
					if (index2 == 2) {
						$(this).text(fecha);
					}
				});
			});
		});

	});
	$("#enviardtdb").click(function() {
		if ($("#vigencia_inicio").val() == ("" || "Vigencia inicio")) {
			alert("Ingrese la Fecha Vigencia INICIO");
			return false;
		}
			if($("input:checked").length < 1) {
				alert ("Tiene que cambiar la menos un precio");
				return false;
			}
		$("#tabla tbody tr").not("*:first").each(function(index) {
			var campo1, campo2, campo3, campo4, campo5, campo6, campo7, campo8, campo9;
			$(this).children("td").each(function(index2) {
				switch (index2) {
					case 0:
						campo1 = $(this).text();
						break;
					case 1:
						campo2 = $(this).text();
						break;
					case 2:
						campo3 = $(this).text();
						break;
					case 3:
						campo4 = $(this).text();
						break;
					case 4:
						campo5 = $(this).text();
						break;
					case 5:
						campo6 = $(this).text();
						break;
					case 6:
						campo7 = $(this).text();
						break;
					case 7:
						campo8 = $(this).children("input").val();
						break;
					case 8:
						campo9 = $(this).children("input").is(":checked");
						break;
				}
			});
			if(campo9 == 1) {
				$.post("index.php?modulo=edicion&pagina=cprecio_verdura", {id_pvd: campo1, vigencia_inicio: campo3, vigencia_final: campo4, unidad: campo7, precio: campo8, logica: campo9, pagina: "cprecio_verdura"});
			}
		});
		$("#formMail").show();
		$("#enviardtdb").hide();
	});

});
