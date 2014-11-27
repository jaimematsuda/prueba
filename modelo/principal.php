<?php 

	//*** Busca precios nuevos comparando la fecha de vigencia inicio con la fecha actual ***
function busca_precionuevo($db)
{	
	$dias = bknp_dias();
	$query = "SELECT CURDATE()";
	$fetch = mysql_query($query);
	$fecha = mysql_fetch_assoc($fetch);
	$fecha_actual = $fecha["CURDATE()"];
	$dia_semana = date("w", strtotime($fecha["CURDATE()"]));
	$dias_resal = sumres_fecha($fecha_actual, $dias); 
//dump($dias_resal,true);
    $query = "SELECT d.vigencia_inicio, c.id_proveedor ".
    "FROM ".
    "(SELECT id_precio, id_prov_prod AS id_pvd, vigencia_inicio FROM precios WHERE vigencia_inicio BETWEEN CURDATE() AND '$dias_resal' ORDER BY id_precio DESC) AS d ".
    "INNER JOIN proveedores_productos AS c ON c.id_prov_prod = d.id_pvd ".
    "INNER JOIN proveedores AS a ON c.id_proveedor = a.id_proveedor ".
	"WHERE c.id_proveedor <> 15 GROUP BY id_prov_prod";
    $fetch = mysql_query($query);
	$data = mysql_fetch_assoc($fetch);
	if(!empty($data)) {
		return true;
	}
	if($dia_semana == '4') {
		return true;
	}
	return false;
}

    //*** Devuelve el numero de dias que permanecera como nuevo un precio ***
function bknp_dias()
{
    $fid = mysql_query("SELECT valor FROM config WHERE variable='bknp_dias'");
    $rs = mysql_fetch_assoc($fid);
    $dia = $rs["valor"];
    return $dia;
}

?>
