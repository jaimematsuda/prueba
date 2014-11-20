<?php
	$mensaje = "";

	require "modelo/articulo.php";

	if(!empty($_POST)){
		// Escapando las comillas de las cadenas
		$proveedor = addslashes(trim($_POST["proveedor"]));
		$articulo_sistema = addslashes(trim($_POST["articulo_sistema"]));
		$unidad = addslashes(trim($_POST["unidad"]));
		$articulo_documento = addslashes(trim($_POST["articulo_documento"]));
		$presentacion = addslashes(trim($_POST["presentacion"]));
		if (agregar_articulo($proveedor, $articulo_sistema, $unidad, $articulo_documento, $presentacion, $db)){
			echo "<script>alert('El registro se creo con exito')</script>";
		}else{
			mysql_query("ROLLBACK");
		}
	}

	//*** Array de para Listar de Proveedores ***


	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/agregar_articulo.php";

	// Estilos de la Pagina
	$css_vista = array();	
	$css_vista[] = $dir_css."/agregar_articulo.css";

	$jq_vista = "$(document).ready(function(){
					$(\"#proveedor\").autocomplete({
						source: \"modelo/buscarproveedor.php\",
						minLengh: 2,
					});
					$(\"#articulo_sistema\").autocomplete({
						source: \"modelo/buscararticulosistema.php\",
						minLengh: 2,
					});
					$(\"#articulo_sistema\").focusout(function(){
						$.ajax({
							url: \"modelo/buscarunidad.php\",
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
