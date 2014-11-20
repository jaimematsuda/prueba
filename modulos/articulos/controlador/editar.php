<?php
	$mensaje = "";
	if(isset($_GET["id"])) {
		$id = addslashes(trim($_GET["id"]));
		if(!is_dir("modulos/$modulo")) {
			die("Modulo no existe");
		}
	}
	$js_vista = array();
	$js_vista[] = "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js";
	$js_vista[] = $dir_js."/edicion.js";

	$css_vista = array();
	$css_vista[] = $dir_css."/edicion.css";
	$css_vista[] = "css/jquery-ui.css";

	require_once "modelo/modelo.php";
	$idprovprod = buscar_id("id_prov_prod", "precios", "id_precio=$id");
	$id_prov_prod = $idprovprod["id_prov_prod"];
	$idprovee = buscar_id("id_proveedor", "proveedores_productos", "id_prov_prod=$id_prov_prod");
	$id_proveedor = $idprovee["id_proveedor"];
	$idprodu = buscar_id("id_producto", "proveedores_productos", "id_prov_prod=$id_prov_prod");
	$id_producto = $idprodu["id_producto"];
	if(!empty($_POST)) {
		$setregvalor = "";
		if(isset($_POST["proveedorck"])) {
			$proveedor = addslashes(trim($_POST["proveedor"]));
			$proveedorck = addslashes(trim($_POST["proveedorck"]));
			$setregvalor = substr($proveedorck, 0, strlen($proveedorck) -2)."='".$proveedor."'";
			if(!empty($setregvalor)) {
				$query = "UPDATE IGNORE proveedores SET ".$setregvalor." WHERE id_proveedor=$id_proveedor";
				reg_modify($query, $db);
				$mensaje = "El registro se Modifico";
			}
		}

		$setregvalor = "";
		if(isset($_POST["productock"])) {
			$producto = addslashes(trim($_POST["producto"]));
			$productock = addslashes(trim($_POST["productock"]));
			$setregvalor = substr($productock, 0, strlen($productock) -2)."='".$producto."'";
			if(!empty($setregvalor)) {
				$query = "UPDATE IGNORE productos SET ".$setregvalor." WHERE id_producto=$id_producto";
				reg_modify($query, $db);
				$mensaje = "El registro se Modifico";
			}
		}

		$setregvalor = "";
		if(isset($_POST["vigencia_iniciock"])) {
			$vigencia_inicio = cform_fecha(addslashes(trim($_POST["vigencia_inicio"])));
			$vigencia_iniciock = addslashes(trim($_POST["vigencia_iniciock"]));
			$setregvalor = $setregvalor.substr($vigencia_iniciock, 0, strlen($vigencia_iniciock) -2)."='".$vigencia_inicio."', ";
		}
		if(isset($_POST["vigencia_finalck"])) {
			$vigencia_final = cform_fecha(addslashes(trim($_POST["vigencia_final"])));
			$vigencia_finalck = addslashes(trim($_POST["vigencia_finalck"]));
			$setregvalor = $setregvalor.substr($vigencia_finalck, 0, strlen($vigencia_finalck) -2)."='".$vigencia_final."', ";
		}
		if(isset($_POST["unidadck"])) {
			$unidad = addslashes(trim($_POST["unidad"]));
			$unidadck = addslashes(trim($_POST["unidadck"]));
			$setregvalor = $setregvalor.substr($unidadck, 0, strlen($unidadck) -2)."='".$unidad."', ";
		}
		if(isset($_POST["valor_ventack"])) {
			$valor_venta = addslashes(trim($_POST["valor_venta"]));
			$valor_ventack = addslashes(trim($_POST["valor_ventack"]));
			$setregvalor = $setregvalor.substr($valor_ventack, 0, strlen($valor_ventack) -2)."=".$valor_venta.", ";
		}
		$setregvalor = substr($setregvalor, 0, strlen($setregvalor) -2);
		if(!empty($setregvalor)) {
			$query = "UPDATE precios SET ".$setregvalor." WHERE id_precio=$id";
			reg_modify($query, $db);
			$mensaje = "El registro se Modifico";
		}
		header("location:index.php?modulo=edicion&pagina=seleccionar&id=$id_prov_prod");		
	}else{
		$query = "SELECT vigencia_inicio, vigencia_final, proveedor, producto, unidad, valor_venta FROM ".
		"(SELECT id_prov_prod, vigencia_inicio, vigencia_final, unidad,valor_venta FROM precios WHERE id_precio=$id) AS d ".
		"INNER JOIN proveedores_productos AS c ON c.id_prov_prod=d.id_prov_prod ".
		"INNER JOIN proveedores AS a ON c.id_proveedor=a.id_proveedor ".
		"INNER JOIN productos AS b ON c.id_producto=b.id_producto";
		$chdato = select_editar_info($id, $query, $db);
		$vigencia_inicio = addslashes(trim($chdato["vigencia_inicio"]));
		$vigencia_final = addslashes(trim($chdato["vigencia_final"]));
		$proveedor = addslashes(trim($chdato["proveedor"]));
		$producto = addslashes(trim($chdato["producto"]));
		$unidad = addslashes(trim($chdato["unidad"]));
		$valor_venta = addslashes(trim($chdato["valor_venta"]));
		$vista = $dir_vista."/editar.php";
	}
	require_once "temas/$tema/tema.php";
?>
