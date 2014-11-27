<?php
	$mensaje = "";

	require "modelo/producto_precio.php";

	if(!empty($_POST)){
		// Escapando las comillas de las cadenas
		$vfecha = addslashes(trim($_POST["fecha"]));
		$dia = strtok($vfecha, "/");
		$mes = strtok("/");
		$anio = Strtok("/");
		$fecha = $anio."/".$mes."/".$dia;
		$val_vig_ini = addslashes(trim($_POST["vigencia_inicio"]));
		$idia = strtok($val_vig_ini, "/");
		$imes = strtok("/");
		$ianio = Strtok("/");
		$vigencia_inicio = $ianio."/".$imes."/".$idia;
		if(isset($_POST["vigencia_final"])) {
			$val_vig_fin = addslashes(trim($_POST["vigencia_final"]));
			$fdia = strtok($val_vig_fin, "/");
			$fmes = strtok("/");
			$fanio = Strtok("/");
			$vigencia_final = $fanio."/".$fmes."/".$fdia;
		}else{
			$vigencia_final = "0";
		}
		$proveedor = addslashes(trim($_POST["proveedor"]));
		$producto = addslashes(trim($_POST["producto"]));
		$unidad = addslashes(trim($_POST["unidad"]));
		$valor_venta = addslashes(trim($_POST["valor_venta"]));
		if (agregar_nuevo($fecha,$vigencia_inicio, $vigencia_final, $proveedor,$producto,$unidad,$valor_venta,$db)){
			echo "<script>alert('El registro se creo con exito')</script>";
		}
	}

		// Aca el controlador llama a la vista 
	$vista = $dir_vista."/agregar_nuevo.php";

		// Estilos de la Pagina
	$css_vista = array();	
	$css_vista[] = $dir_css."/agregar_nuevo.css";

		// Validacion del Formulario
	$js_vista = array();	
	$js_vista[] = $dir_js."/edicion.js";

	require_once "temas/$tema/tema.php"; 
?>
