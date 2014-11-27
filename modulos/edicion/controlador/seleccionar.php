<?php
	$mensaje = "";
	if(isset($_GET["id"])) {
		$id = addslashes(trim($_GET["id"]));
	}

	$id_usuario = $_SESSION["id_usuario"];

	if((is_editor()) || (is_admin())) {
		require_once "modelo/producto_precio.php";
		require_once "modelo/modelo.php";
		$query = "SELECT id_precio, fecha, proveedor, producto, vigencia_inicio, vigencia_final, unidad, valor_venta FROM ".
		"(SELECT id_precio, id_prov_prod, fecha, vigencia_inicio, vigencia_final, unidad, valor_venta FROM precios WHERE id_prov_prod=$id) AS d ".
	    "INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_prov_prod ".
    	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor ".
    	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
    	"ORDER BY id_precio DESC LIMIT 10";
		$producto_precios = select_list_edit($query, $db);

		$vista = $dir_vista."/seleccionar.php";
	}
	
	require_once "temas/$tema/tema.php"; 
?>
