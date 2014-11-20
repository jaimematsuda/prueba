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
			$vista = $dir_vista."/cprecio_verdura.php";
			// Aca el controlador llama al css
			$css_vista = array();
			$css_vista[] = "css/jquery-ui.css";
			$css_vista[] = $dir_css."/cprecio_chico.css";
			$js_vista = array();
			$js_vista[] = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js";
			$js_vista[] = $dir_js."/edicion.js";
			$js_vista[] = $dir_js."/cprecio_verdura.js";
			require_once "modelo/producto_precio.php";
			$producto_precios_verdura = producto_precios_verd($db);
			require_once "temas/$tema/tema.php"; 
		}	
?>
