<?php
	$mensaje = "";
	if(isset($_GET["id"])) {
		$id = addslashes(trim($_GET["id"]));
		if(!is_dir("modulos/$modulo")) {
			die("Modulo no existe");
		}
	}
	require "modelo/producto_precio.php";
	require "modelo/modelo.php";
	if(!empty($_POST)) { 
//		dump($_POST, true);
		$formfecha = addslashes(trim($_POST["fecha"]));
		$dia = strtok($formfecha, "/");
		$mes = strtok("/");
		$anio = strtok("/");
		$fecha = $anio."/".$mes."/".$dia;
		$formvigencia_inicio = addslashes(trim($_POST["vigencia_inicio"]));
		$dia = strtok($formvigencia_inicio, "/");
		$mes = strtok("/");
		$anio = strtok("/");
		$vigencia_inicio = $anio."/".$mes."/".$dia;
		if(isset($_POST["vigencia_final"])) {
			$formvigencia_final = addslashes(trim($_POST["vigencia_final"]));
			$dia = strtok($formvigencia_final, "/");
			$mes = strtok("/");
			$anio = strtok("/");
			$vigencia_final = $anio."/".$mes."/".$dia;
		}else{
			$vigencia_final = "";
		}
		$unidad = addslashes(trim($_POST["unidad"]));
		$valor_venta = addslashes(trim($_POST["valor_venta"]));
		$query = "INSERT INTO precios (id_prov_prod, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta) VALUES ($id, '$fecha', '$vigencia_inicio', '$vigencia_final', '$unidad', $valor_venta)"; 
		insert($query, $db);
		$producto_precios = producto_precios($db);
		$vista = $dir_vista."/cprecio_producto.php";
		$css_vista = array();
		$css_vista[] = $dir_css."/index.css";
	}else{
    	$query ="SELECT d.id_precio, c.id_proveedor, a.proveedor, c.id_producto, b.producto, c.id_prov_prod, d.vigencia_inicio, d.vigencia_final, d.unidad, d.valor_venta ".
    	"FROM ".
    	"(SELECT id_prov_prod, id_precio, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios GROUP BY id_prov_prod DESC) AS d ".
    	"INNER JOIN proveedores as a, productos as b, proveedores_productos as c ".
    	"WHERE c.id_prov_prod = ".$id." AND c.id_proveedor = a.id_proveedor AND c.id_producto = b.id_producto AND c.id_prov_prod = d.id_prov_prod";
		$editar = select_editar_info($id, $query, $db);
		$vista = $dir_vista."/cambiar_precio.php";
		// Validacion del Formulario
		$js_vista = array();
		$js_vista[] = $dir_js."/edicion.js";

		// Estilos de la Pagina
		$css_vista = array();
		$css_vista[] = $dir_css."/agregar_nuevo.css";
	}
	require_once "temas/$tema/tema.php"; 
?>
