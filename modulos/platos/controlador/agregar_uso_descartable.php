<?php
	$mensaje = "";

	require "modelo/plato.php";

	if(!empty($_POST)){
		// Escapando las comillas de las cadenas
		$tienda_tipo = addslashes(trim($_POST["tienda_tipo"]));
		$pedido_tipo = addslashes(trim($_POST["pedido_tipo"]));
		$area = addslashes(trim($_POST["area"]));
		$plato = addslashes(trim($_POST["plato"]));
		$uso_para1 = addslashes(trim($_POST["uso_para1"]));
		$descartable1 = addslashes(trim($_POST["descartable1"]));
		$cantidad1 = addslashes(trim($_POST["cantidad1"]));
		$uso_para2 = addslashes(trim($_POST["uso_para2"]));
		$descartable2 = addslashes(trim($_POST["descartable2"]));
		$cantidad2 = addslashes(trim($_POST["cantidad2"]));
		$uso_para3 = addslashes(trim($_POST["uso_para3"]));
		$descartable3 = addslashes(trim($_POST["descartable3"]));
		$cantidad3 = addslashes(trim($_POST["cantidad3"]));
		$uso_para4 = addslashes(trim($_POST["uso_para4"]));
		$descartable4 = addslashes(trim($_POST["descartable4"]));
		$cantidad4 = addslashes(trim($_POST["cantidad4"]));
		if (agregar_uso_descartable($tienda_tipo, $pedido_tipo, $area, $plato,
			array(array($uso_para1, $descartable1, $cantidad1), 
			array($uso_para2, $descartable2, $cantidad2), 
			array($uso_para3, $descartable3, $cantidad3), 
			array($uso_para4, $descartable4, $cantidad4)), $db)){
			echo "<script>alert('El registro se creo con exito')</script>";
		}else{
			mysql_query("ROLLBACK");
		}
	}

	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/".$pagina.".php";

	// Estilos de la Pagina
	$css_vista = array();	
	$css_vista[] = $dir_css."/".$pagina.".css";

	$js_vista = array();
	$js_vista[] = "lib/jquery/jquery_plugin/jquery.mockjax.js";
	$js_vista[] = "lib/jquery/jquery_plugin/jquery.validate.min.js";

	$jq_vista = "$(document).ready(function(){
					$(\"#proveedor\").autocomplete({
						source: \"lib/php/json/buscarproveedor.php\",
						minLengh: 2,
					});
					$(\"#articulo_sistema\").autocomplete({
						source: \"lib/php/json/buscararticulosistema.php\",
						minLengh: 2,
					});
					$(\"#articulo_sistema\").focusout(function(){
						$.ajax({
							url: \"lib/php/json/buscarunidad.php\",
							type: 'POST',
							dataType: 'json',
							data: {articulosistema: $(\"#articulo_sistema\").val()},
						}).done(function(unidad){
							$(\"#unidad\").val(unidad);
						});
					})
				});";

	require_once "temas/$tema/tema.php"; 
?>
