<?php
		if(!empty($_POST)) {
//dump($_POST,true);
			require "modelo/modelo.php";
			$id_pvd = $_POST["id_pvd"];
			$vigencia_inicio = cform_fecha(addslashes(trim($_POST["vigencia_inicio"])));
			$vigencia_final = cform_fecha(addslashes(trim($_POST["vigencia_final"])));
			$unidad = $_POST["unidad"];
			$precio = $_POST["precio"];
			$query = "INSERT INTO precios (id_prov_prod, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta) VALUES ($id_pvd, CURDATE(), \"$vigencia_inicio\", \"$vigencia_final\", \"$unidad\", $precio)";
			insert($query, $db);
		}else{
			// Aca el controlador llama a la vista 
			$vista = $dir_vista."/cprecio_chico.php";
			// Aca el controlador llama al css
			$css_vista = array();
			$css_vista[] = $dir_css."/cprecio_chico.css";
			$css_vista[] = $dir_css."/basic.css";
			$js_vista = array();
			$js_vista[] = $dir_js."/edicion.js";
			$js_vista[] = "js/jquery.simplemodal.js";
			$js_vista[] = $dir_js."/basic.js";
			require_once "modelo/producto_precio.php";
			$producto_precios_chico = producto_precios_chico($db);
			require_once "temas/$tema/tema.php"; 
		}	
?>
