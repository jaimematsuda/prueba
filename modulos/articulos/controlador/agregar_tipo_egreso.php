<?php
	$mensaje = "";

	require "modelo/articulo.php";

	if(!empty($_POST)){
		// Escapando las comillas de las cadenas
		$tipo_egreso = addslashes(trim($_POST["tipo_egreso"]));
		$descripcion = addslashes(trim($_POST["descripcion"]));
		if (agregar_tipologia($tipo_egreso, $descripcion, $db)){
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
