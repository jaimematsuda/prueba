<?php

//*** Devuelve array de datos relacionados de proveedor producto precios SIN PROVEEDOR VERDURAS***

function lista($db)
{
	$fechasist = date("d/m/Y");
	$query = "SELECT CURDATE(), d.fecha, d.vigencia_inicio, a.id_proveedor, a.proveedor, b.producto, d.unidad, d.valor_venta AS pre_sin_igv ".
	"FROM ".
	"(SELECT id_precio, fecha, vigencia_inicio, id_prov_prod, unidad, valor_venta FROM precios WHERE vigencia_inicio <= CURDATE() ORDER BY id_precio DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_prov_prod ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor AND (c.id_proveedor <> 17 AND c.id_proveedor <> 19 AND c.id_proveedor <> 2) ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
	"GROUP BY d.id_prov_prod ORDER BY producto, proveedor";
	$data = rs_table($query,$db);
	return $data;
}

//*** Devuelve array de datos relacionados de proveedor producto precios SOLO PROVEEDOR VERDURAS***

function lista_verdura($db)
{
	$fechasist = date("d/m/Y");
	$query = "SELECT CURDATE(), d.fecha, d.vigencia_inicio, a.id_proveedor, a.proveedor, b.producto, d.unidad, d.valor_venta AS pre_sin_igv ".
	"FROM ".
	"(SELECT id_precio, fecha, vigencia_inicio, id_prov_prod, unidad, valor_venta FROM precios WHERE vigencia_inicio <= CURDATE() ORDER BY id_precio DESC) AS d ".
	"INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_prov_prod ".
	"INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor AND (c.id_proveedor = 17 OR c.id_proveedor = 19) ".
	"INNER JOIN productos AS b ON c.id_producto = b.id_producto ".
	"GROUP BY d.id_prov_prod ORDER BY producto, proveedor";
	$data = rs_table($query,$db);
	return $data;
}

//*** Devuelve un array con la lista de articulos del documento y como se ingresa al sistema ***

function lista_articulos($db)
{
	$query = "SELECT p.razon_social, d.descripcion AS 'en_documento', d.presentacion, s.detallado AS 'en_sistema', u.detallado AS unidad ".
	"FROM ".
	"rel_provs_arts_docs_sists AS r ".
	"INNER JOIN articulos_documentos AS d ON r.id_articulo_documento = d.id_articulo_documento ".
	"INNER JOIN articulos_sistemas AS s ON r.id_articulo_sistema = s.id_articulo_sistema ".
	"INNER JOIN unidades AS u ON u.id_unidad = s.id_unidad ".
	"INNER JOIN proveedores_sistemas AS p ON p.id_proveedor_sistema = r.id_proveedor_sistema ".
	"ORDER BY p.razon_social, d.descripcion";
	$data = rs_table($query,$db);
//	dump($data, true);
	return $data;
}

//*** Devuelve el tipo de cambio ***

function tcambio_sunat()
{
	$fid = mysql_query("SELECT cambio_compra, cambio_venta FROM tcambio_sunat WHERE id_tcambio_sunat=1");
	$rs = mysql_fetch_assoc($fid);
	$compra = $rs["cambio_compra"];
	$venta = $rs["cambio_venta"];
	return $rs;
}
?>
