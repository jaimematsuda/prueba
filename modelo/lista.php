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

function lista_tipo_egreso($db)
{
	$query = "SELECT tipo_egreso, descripcion FROM ".
	"tipologias_egresos AS e ".
	"INNER JOIN tipologias_descripciones AS d ON e.id_tipo_egreso = d.id_tipo_egreso ".
	"ORDER BY tipo_egreso";
	$data = rs_table($query,$db);
//	dump($data, true);
	return $data;
}


function lista_platos($tienda_tipo, $db)
{
	$query = "SELECT pl.plato, tt.tienda_tipo, tp.id_pedido_tipo, pt.pedido_tipo, a.area, pl.id_plato ".
	"FROM ".
	"rel_tiendas_platos AS tp ".
	"INNER JOIN platos AS pl ON pl.id_plato = tp.id_plato ".
	"INNER JOIN areas AS a ON a.id_area = pl.id_area ".
	"INNER JOIN tiendas_tipos AS tt ON tt.id_tienda_tipo = tp.id_tienda_tipo ".
	"INNER JOIN pedidos_tipos AS pt ON tp.id_pedido_tipo = pt.id_pedido_tipo ".
	"WHERE tt.tienda_tipo = '$tienda_tipo' ".
	"GROUP BY pl.plato ".
	"ORDER BY a.area, pl.plato";
	$dataplato = rs_table($query,$db);
//	dump($dataplato, true);
	return $dataplato;
}

function lista_descartables($tienda_tipo, $db)
{
	$query = "SELECT tp.id_pedido_tipo, tp.id_plato, ud.uso_para, ay.detallado, pd.cantidad ".
	"FROM ".
	"rel_platos_descartables AS pd ".
	"INNER JOIN rel_tiendas_platos AS tp ON tp.id_rel_tienda_plato = pd.id_rel_tienda_plato ".
	"INNER JOIN usos_descartables AS ud ON ud.id_uso_descartable = pd.id_uso_descartable ".
	"INNER JOIN articulos_sistemas AS ay ON ay.id_articulo_sistema = ud.id_articulo_sistema ".
	"WHERE tp.id_tienda_tipo = (SELECT id_tienda_tipo FROM tiendas_tipos WHERE tienda_tipo = '$tienda_tipo') ".
	"ORDER BY tp.id_plato";
	$datadesca = rs_table($query,$db);
//	dump($datadesca, true);
	return $datadesca;
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
