<?php
	$mensaje = "";
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/refrigerio.php";
	$css_vista = array();
	$css_vista[] = $dir_css."/refrigerio.css";
	$js_vista = array();
	$js_vista[] = $dir_js."/refrigerio.js";
	$jq_vista = "$(function(){
					$('#calcular').click(function(){
						var total = parseFloat($('#totalfact').val());
						if(!(/^([0-9])*[.]?[0-9]*$/.test(total) && total > 0)){
							alert('Ingrese un numero valido');
							$('#totalfact').focus();
							return;
						} 
						var igv = parseFloat($('#igvafec').val());
						if(!(/^([0-9])*[.]?[0-9]*$/.test(igv) && igv > 0)){
							alert('Ingrese un numero valido');
							$('#igvafec').focus();
							return;
						}
						if(igv > (total - (total / 1.18))){
							alert('Ingreso mal el IGV o el TOTAL');
							$('#igvafec').focus();
							return;
						} 
						var calafecto = (igv * 100 / 18);
						var calinafecto = (total - (calafecto + igv));
						var afecto = parseFloat(calafecto).toFixed(3);
						var inafecto = parseFloat(calinafecto).toFixed(3);
						$('#afecto').text(afecto);
						$('#inafecto').text(inafecto);
					});
					$('#borrar').click(function(){
						$('#totalfact').val('');
						$('#igvafec').val('');
						$('#afecto').text('');
						$('#inafecto').text('');
					});
				});";
		
	// Aca el controlador llama al css
	require_once "temas/$tema/tema.php"; 
?>
