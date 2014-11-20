<script type="text/javascript">
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
		});
    });
</script>

<script type="text/javascript">
	$(function() {
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
			var fecha = $("#vigencia_final").val();
            	$("#tabla tbody tr").each(function(index) {
               		if (index != 0) {
               			$(this).children("td").each(function(index2) {
                   			if (index2 == 3) {
								$(this).text(fecha);
                   			}                
                		});
                	}
            	});  
		});
    });
</script>

<script type="text/javascript">
	$(function() {
        $("#enviardtdb").click(function() {
            $("#tabla tbody tr").each(function(index) {
      			var campo1, campo2, campo3, campo4, campo5, campo6, campo7, campo8;
				if (index != 0) {
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
                	})
            		$.post("index.php?modulo=edicion&pagina=cprecio_chico", {id_pvd: campo1, vigencia_inicio: campo3, vigencia_final: campo4, unidad: campo7, precio: campo8}
					);
				}
			})
		$("#formMail").show();
		})
	})
</script>

<div>
	<h2>PROVEEDOR CHICO CAMBIAR PRECIO</h2>
	<br />
		<span>Ingresar Fecha :</span>
		<input type="textbox" id="vigencia_inicio" name="vigencia_inicio" value="Vigencia inicio" size="10px" />
		&nbsp;
		<input type="textbox" id="vigencia_final" name="vigencia_final" value="Vigencia final" size="10px" />
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<span>Fecha Cambio de Precio :</span>
		<input id="fecha_fin_mes" name="fecha_fin_mes" value="" size="10px" />
		<br /><br />
		<?php data_to_table_chico($producto_precios_chico, "cambiar"); ?>
		<br />
		<input id="enviardtdb" type="button" name="enviar" value="Modificar Precios" />
		&nbsp; &nbsp;
		<input type="button" name="cancelar" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_chico'" />
		&nbsp; &nbsp;
		<input type="button" id="formMail" name="formMail" value="Enviar Email" />
		<br />
</div>
<div id="modalSelecPopa">
		<span>SELECCIONAR :</span>
		<br />
		<br />
		<a href="index.php?modulo=email&pagina=form_email_pollo">ENVIAR EMAIL POLLO</a>
		<br />
		<br />
		<a href="index.php?modulo=email&pagina=form_email_papa">ENVIAR EMAIL PAPA</a>
		<br />
		<br />
		<input type="button" value="Cancelar" onclick="window.location.href='index.php?modulo=edicion&pagina=cprecio_chico'" />
</div>
<div style=display:none>
	<img src="modulos/edicion/img/x.png" alt="" />
</div>
