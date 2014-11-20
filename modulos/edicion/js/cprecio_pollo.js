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
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	});
	$("#vigencia_inicio").change(function() {
		var fecha = $("#vigencia_inicio").val();
		$("#tabla tbody tr").each(function(index) {
			if (index != 0) {
				$(this).children("td").each(function(index2) {
					if (index2 == 2) {
						$(this).text(fecha);
					}                
				});
			}
		});  
		$("#vigencia_final").datepicker( {
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
		$("#vigencia_final").change(function() {
			var fecha1 = $("#vigencia_inicio").val();
			var fecha2 = $("#vigencia_final").val();
			if (validafechamayor(fecha1, fecha2)) {
				alert ("La Vigencia FINAL NO PUEDE SER MENOR QUE la Vigencia INICIO");
				return false;
			}
			$("#tabla tbody tr").each(function(index) {
				if (index != 0) {
					$(this).children("td").each(function(index2) {
						if (index2 == 3) {
							$(this).text(fecha2);
						}                
					});
				}
			});  
		});
	});
	$("#fecha_siguiente").datepicker( {
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
	$("#fecha_siguiente").change(function() {
		var fecha1 = $("#vigencia_final").val();
		var fecha2 = $("#fecha_siguiente").val();
		if (validafechamayor(fecha1, fecha2)) {
			alert ("La fecha del Siguiente Cambio NO PUEDE SER MENOR QUE la Vigencia FINAL");
			return false;
		}
	});
	$("#enviardtdb").click(function() {
		if ($("#vigencia_inicio").val() == ("" || "Vigencia inicio")) {
			alert("Ingrese la Fecha Vigencia INICIO");
			return false;
		}
		if ($("#vigencia_final").val() == ("" || "Vigencia final")) {
			alert("Ingrese la Fecha Vigencia FINAL");
			return false;
		}
		if ($("#fecha_siguiente").val() == "") {
			alert("Ingrese la Fecha del siguiente CAMBIO");
			return false;
		}
		$("#tabla tbody tr").not("*:first").each(function(index) { 
		var campo1, campo2, campo3, campo4, campo5, campo6, campo7, campo8;
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
				}
			});
			$.post("index.php?modulo=edicion&pagina=cprecio_pollo", {id_pvd: campo1, vigencia_inicio: campo3, vigencia_final: campo4, unidad: campo7, precio: campo8});
		});
		$("#formMail").show();
		$("#enviardtdb").hide();
	});	
});
