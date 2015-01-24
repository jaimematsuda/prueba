<?php

function dump($var,$exit=false)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	if ($exit)
		exit;
}

	//*** Devuelve un array con los datos de la tabla de un query en mysql ***
function rs_table($query,$db)
{
	$rs = array();
	if(isset($GLOBALS["debug"]) && $GLOBALS["debug"]){
		$fetch = mysql_query($query) or die (mysql_error()."<br />".$query);
	}else{
		$fetch = mysql_query($query) or die ("error en la consulta");
	}

	while($row = mysql_fetch_assoc($fetch)){
		$rs[] = $row;
	}
//	dump($rs, true);
	return $rs;
}

	//*** Devuelve un array con los datos de un registro de un query en mysql ***
function rs_row($query,$db)
{
	$rs = array();
	if(isset($GLOBALS["debug"]) && $GLOBALS["debug"]){
		$fetch = mysql_query($query) or die (mysql_error()."<br />".$query);
	}else{
		$fetch = mysql_query($query) or die ("error en la consulta");
	}

	if(mysql_num_rows($fetch)>0){
		$rs = mysql_fetch_assoc($fetch);
	}
	return $rs;
}

	//*** Devuelve un array con los datos para poblar un combo ***
function rs_combo($query,$db)
{
	$rs = array();
	if(isset($GLOBALS["debug"]) && $GLOBALS["debug"]){
		$fetch = mysql_query($query) or die (mysql_error()."<br />".$query);
	}else{
		$fetch = mysql_query($query) or die ("error en la consulta");
	}
	while($row = mysql_fetch_row($fetch)){
		$rs[$row[0]] = $row[1];
	}
	return $rs;
}

	//*** Ejecuta un INSERT ***
function exec_query($query,$transact=true,$db)
{
	if($transact){
		mysql_query ("BEGIN");
		if(isset($GLOBALS["debug"]) && $GLOBALS["debug"]){
			$fetch = mysql_query($query) or die (mysql_error()."<br />".$query);
		}else{
			$fetch = mysql_query($query) or die ("error en la consulta");
		}
		mysql_query("COMMIT");
	}
	return $fetch;
}

	//*** Agrega los datos de una consulta a una tabla ***
function data_to_table($data,$headers=array())
{
	if(!empty($data)){
		echo "<table id='tabla' class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($data[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".utf8_decode($header)."</th>\n";
			} 
		}
		echo "</tr>\n";

		/* Imprimiendo Datos */
		foreach($data as $fila){
			echo "<tr class='fila'>\n";
			foreach($fila as $id=>$dato){
				echo "<td class='celda' id='".$id."'>".utf8_encode($dato)."</td>\n";
			} 
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Agrega a una tabla un campo modificar en los datos de una consulta ***
function data_to_table_mod($data,$headers=array(),$urle,$id, $link) 
{
	for($i=0;$i<count($data);$i++){
		$data[$i]["$link"]="<a href='$urle".$data[$i][$id]."'>$link</a>";
	}    
	if(!empty($data)){
		echo "<table class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($data[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		foreach($data as $fila) {
			echo "<tr class='fila'>\n";
			foreach($fila as $dato){
				if (validafecha($dato)) {
					echo "<td class='celda'>".cform_fecha($dato)."</td>\n";
				}else{
					echo "<td class='celda'>".$dato."</td>\n";
				}
			} 
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Agrega a una tabla con editar y borrar los datos de una consulta ***
function data_to_table_det($data,$headers=array(),$urle,$ida,$idb)
{
	for($i=0;$i<count($data);$i++){
		$data[$i]["editar"]="<a href='$urle".$data[$i][$idb]."'>editar</a>";
	}    
	if(!empty($data)){
		echo "<table class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($data[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		foreach($data as $fila){
			echo "<tr class='fila'>\n";
			foreach($fila as $dato){
				echo "<td class='celda'>".$dato."</td>\n";
			} 
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Crea la tabla para listar con campos adicionales para multiplicar ***
function data_to_table_sum($data,$headers=array(), $tabla, $cantidad, $total, $multiplicar)
{
	require_once "modelo/principal.php";
	for($i=0;$i<count($data);$i++){
		$e = $i + 1;
		$data[$i]["cantidad"]="<input type='text' id='$cantidad".$e."' size='6' value=''  onChange='$multiplicar(".$e.");' />";
		$data[$i]["total"]="<input type='text' id='$total".$e."' size='7'/>";
		$data[$i]["observacion"]="<input type='text' id='observacion".$e."' size='13' />";
	}    
	if(!empty($data)){
		echo "<table class='tabla' id='$tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr id='fila_cabecera' class='fila_cabecera'>\n";
		
		if(!empty($headers)){
			$num = 1;
			foreach($headers as $header){
				if ($num > 4) {
					echo "<th class='celda_cabecera'.$num>".$header."</th>\n";
				}
				$num = $num + 1;
			} 
		}else{
			$cc = 1;
			foreach($data[0] as $header=>$dato){
				if ($cc > 4) {
					echo "<th class='celda_cabecera".$cc."'>".$header."</th>\n";
				}
				$cc = $cc + 1;
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		$f = 1;
		$c = 1;
		foreach($data as $fila) {
			$dia_semana = date("w", strtotime($fila["CURDATE()"]));
			$fecha_actual = date("Y-m-d", strtotime($fila["CURDATE()"]));
			$fecha = date("Y-m-d", strtotime($fila["fecha"]));
			$fecha_inicio = date("Y-m-d", strtotime($fila["vigencia_inicio"]));
			$id_proveedor = $fila["id_proveedor"];
			$dias = + bknp_dias();
//			$dias = $diasr["valor"];
			$dias_resal = sumres_fecha($fecha_inicio, $dias);
			switch (true) {
				case ($dia_semana == '4') && ($id_proveedor == '15') && ($fecha == $fecha_actual):
					echo "<tr class='verde' id='fila'>\n";
					echo "<form id='multiplicar'>\n";
					$f = $f + 1;
					break;
				case ($dia_semana == '4') && ($id_proveedor == '15'):
					echo "<tr class='naranja' id='fila'>\n";
					echo "<form id='multiplicar'>\n";
					$f = $f + 1;
					break;
				case (!($id_proveedor == '15')) && ($dias_resal > $fecha_actual):
					echo "<tr class='verde' id='fila'>\n";
					echo "<form id='multiplicar'>\n";
					$f = $f + 1;
					break;
				default:
					echo "<tr class='fila' id='fila'>\n";
					echo "<form id='multiplicar'>\n";
					$f = $f + 1;
			}
			$c = 1;
			foreach($fila as $dato) {
				if ($c > 4) {
					echo "<td class='celda".$c."' id='celda'>".$dato."</td>\n";
				}
				$c = $c + 1;
			} 
			echo "</form>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Crea una tabla para modificar precios de PROVEEDORES CHICOS ***
//function data_to_table_chico($data,$headers=array(),$urle,$id, $link) 
function data_to_table_chico($data, $nomcol) 
{
	for($i=0;$i<count($data);$i++){
		$e = $i + 1;
		$valor_v = $data[$i]['valor_venta'];
		$data[$i]["valor_venta"]="<input type='text' id='precio".$e."' name='precio".$e."' size='6' readonly value=$valor_v />";
		$data[$i][$nomcol]="<input type='checkbox' id='precio".$e."ck' value='precio".$e."ck' size='7' onclick='cambiareadonly(this)' />";
	}
	if(!empty($data)) {
		echo "<table id='tabla' class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($data[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		foreach($data as $fila) {
			echo "<tr class='fila'>\n";
			foreach($fila as $dato){
				if (validafecha($dato)) {
					echo "<td class='celda'>".cform_fecha($dato)."</td>\n";
				}else{
					echo "<td class='celda'>".$dato."</td>\n";
				}
			} 
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Crea una tabla PARA ENVIAR EMAIL ***
function data_to_table_mail($data, $nomcol) 
{
	for($i=0;$i<count($data);$i++){
		$e = $i + 1;
		$id_pvd = $data[$i]['id_pvd'];
		$producto = $data[$i]['producto'];
		$valor_v = $data[$i]['valor_venta'];
		switch ($id_pvd) {
			case 15:
				$incligv = number_format(round(($valor_v * 1.6 * 1.18), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
				break;
			case 16:
				$incligv = number_format(round(($valor_v * 1.5 * 1.18), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
				break;
			case 19:
				$incligv = number_format(round(($valor_v * 20), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
				break;
			case 20:
				$incligv = number_format(round(($valor_v * 20), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
				break;
			case 21:
				$incligv = number_format(round(($valor_v * 20), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
				break;
			default:
				$incligv = number_format(round(($valor_v *1.18), 2, PHP_ROUND_HALF_UP), 2, '.', ',');
		}
		$data[$i]["producto"]="<input type='text' id='producto".$e."' name='producto".$e."' size='11' readonly value='$producto' />";
		$data[$i]["valor_venta"]="<input type='text' id='precio".$e."' name='precio".$e."' size='6' readonly value=$valor_v />";
		$data[$i][$nomcol]="<input type='text' id='incligv".$e."' name='incligv".$e."' size='7' readonly value=$incligv />";
	}
	if(!empty($data)) {
		echo "<table id='tabla' class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			$col = 1;
			foreach($headers as $header){
				if ($col <> 7) {
					echo "<th class='celda_cabecera'>".$header."</th>\n";
				}
				$col = $col + 1;
			} 
		}else{
			$col = 1;
			foreach($data[0] as $header=>$dato){
				if ($col <> 7) {
					echo "<th class='celda_cabecera'>".$header."</th>\n";
				}
				$col = $col + 1;
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		foreach($data as $fila) {
			echo "<tr class='fila'>\n";
			$col = 1;
			foreach($fila as $dato){
//dump($fila,true);
				if ($col <> 7) {
					if (validafecha($dato)) {
						echo "<td class='celda'>".cform_fecha($dato)."</td>\n";
					}else{
						echo "<td class='celda'>".$dato."</td>\n";
					}
				}
				$col = $col + 1;
			} 
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

	//*** Crea una tabla PARA ENVIAR EMAIL DE VERDURAS***
function data_to_table_mail_verd($data) 
{
	for($i=0;$i<count($data);$i++){
		$e = $i + 1;
//		$id_pvd = $data[$i]['id_pvd'];
		$proveedor = $data[$i]['proveedor'];
		$producto = $data[$i]['producto'];
		$unidad = $data[$i]['unidad'];
		$valor_v = $data[$i]['valor_venta'];
		$data[$i]["proveedor"]="<input type='text' id='proveedor".$e."' name='proveedor".$e."' size='16' readonly value='$proveedor' />";
		$data[$i]["producto"]="<input type='text' id='producto".$e."' name='producto".$e."' size='16' readonly value='$producto' />";
		$data[$i]["unidad"]="<input type='text' id='unidad".$e."' name='unidad".$e."' size='6' readonly value=$unidad />";
		$data[$i]["valor_venta"]="<input type='text' id='valor_venta".$e."' name='valor_venta".$e."' size='7' readonly value=$valor_v />";
	}
	if(!empty($data)) {
		echo "<table id='tabla' class='tabla'>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			$col = 1;
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
				$col = $col + 1;
			} 
		}else{
			$col = 1;
			foreach($data[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
				$col = $col + 1;
			} 
		}
		echo "</tr>\n";
		/* Imprimiendo Datos */
		foreach($data as $fila) {
			echo "<tr class='fila'>\n";
			$col = 1;
			foreach($fila as $dato){
//dump($fila,true);
				if (validafecha($dato)) {
					echo "<td class='celda'>".cform_fecha($dato)."</td>\n";
				}else{
					echo "<td class='celda'>".$dato."</td>\n";
				}
			}
			$col = $col + 1;
		} 
		echo "</tr>\n";
	}
	echo "</table>\n";
}


	//*** Agrega los datos de una consulta a una tabla de uso de descartable *** 
function data_to_table_descartable($dataplato, $datadesca, $tienda_tipo, $area, $headers=array())
{
	if(!empty($dataplato)){
		echo "<tr class='fila'>\n";
			echo "<th colspan='5'>\n";
				echo $area;
			echo "</th>\n";
		echo "<tr>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($dataplato[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".utf8_decode($header)."</th>\n";
			} 
		}
		echo "</tr>\n";

		/* Imprimiendo Datos */
		foreach($dataplato as $filaplato){
			if ($filaplato['tienda_tipo'] == $tienda_tipo && $filaplato['area'] == $area) {
				echo "<tr class='fila'>\n";
				echo "<td class='celda' id='plato'>".utf8_encode($filaplato['plato'])."</td>\n";
			}
			$principal = "";
			$papa = "";
			$ensalada = "";
			$postre = "";
			foreach($datadesca as $filadesca) {
				if ($filadesca['id_plato'] == $filaplato['id_plato'] && $filaplato['tienda_tipo'] == $tienda_tipo && $filaplato['area'] == $area) {
					$filaswitch = $filadesca['uso_para'];
					switch  ($filaswitch) {
						case "PRINCIPAL":
							$principal = $filadesca['detallado'];
							break;
						case (preg_match('/PAPA*/', $filaswitch) ? true : false):
							$papa = $filadesca['detallado'];
							break;
						case (preg_match('/ENSALADA*/', $filaswitch) ? true : false):
							$ensalada = $filadesca['detallado'];
							break;
						case "POSTRE":
							$postre = $filadesca['detallado'];
							break;
						
					}
				}
			}
			if ($filaplato['tienda_tipo'] == $tienda_tipo && $filaplato['area'] == $area) {
				echo "<td class='celda' id='principal'>".utf8_encode($principal)."</td>\n";
				echo "<td class='celda' id='papa'>".utf8_encode($papa)."</td>\n";
				echo "<td class='celda' id='ensalada'>".utf8_encode($ensalada)."</td>\n";
				echo "<td class='celda' id='postre'>".utf8_encode($postre)."</td>\n"; 
				echo "</tr>\n";
			}
		}
	}
}


	//*** Agrega los datos de una consulta a una tabla de uso de descartable para patio*** 
function data_to_table_descartable_patio($dataplato, $datadesca, $tienda_tipo, $area, $headers=array())
{
	if(!empty($dataplato)){
		echo "<tr class='fila'>\n";
			echo "<th colspan='5'>\n";
				echo $area;
			echo "</th>\n";
		echo "<tr>\n";
		/* Imprimiendo Cabeceras */
		echo "<tr class='fila_cabecera'>\n";
		if(!empty($headers)){
			foreach($headers as $header){
				echo "<th class='celda_cabecera'>".$header."</th>\n";
			} 
		}else{
			foreach($dataplato[0] as $header=>$dato){
				echo "<th class='celda_cabecera'>".utf8_decode($header)."</th>\n";
			} 
		}
		echo "</tr>\n";

		/* Imprimiendo Datos */
		foreach($dataplato as $filaplato){
			if ($filaplato['tienda_tipo'] == $tienda_tipo && $filaplato['pedido_tipo'] == 'SALON') {
				echo "<tr class='fila'>\n";
				echo "<td class='celda' id='plato'>".utf8_encode($filaplato['plato'])."</td>\n";
				$pedido_tipo = $filaplato['pedido_tipo'];
			}
			foreach($datadesca as $filadesca) {
				if ($filadesca['id_plato'] == $filaplato['id_plato'] && $filaplato['tienda_tipo'] == $tienda_tipo) {
					$filaswitch = $filadesca['detallado'];
					switch  ($filaswitch) {
						case "PRINCIPAL":
							$principal = $filadesca['detallado'];
							break;
						case (preg_match('/PAPA*/', $filaswitch) ? true : false):
							$papa = $filadesca['detallado'];
							break;
						case (preg_match('/ENSALADA*/', $filaswitch) ? true : false):
							$ensalada = $filadesca['detallado'];
							break;
						case "POSTRE":
							$postre = $filadesca['detallado'];
							break;
						
					}
				}
			}
			if ($filaplato['tienda_tipo'] == $tienda_tipo && $filaplato['area'] == $area) {
				echo "<td class='celda' id='salon'>".utf8_encode($salon)."</td>\n";
				echo "<td class='celda' id='llevar'>".utf8_encode($llevar)."</td>\n";
				echo "</tr>\n";
			}
		}
	}
}

	//*** Convierte el formato de fecha de MYSQL al formato pe y viceversa ***
function cform_fecha($form_fecha)
{
	$cua = substr($form_fecha,0,4);
	if(preg_match('/\//',$cua)) {
		$nffecha=substr($form_fecha,6,4)."/".substr($form_fecha,3,2)."/".substr($form_fecha,0,2);
	}else{
		$nffecha=substr($form_fecha,8,2)."/".substr($form_fecha,5,2)."/".substr($form_fecha,0,4);
	}
	return $nffecha;
}

	//*** Validar Fechas ***
function validafecha($fecha)
{
	if (preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha)) {
    	return true;
	}
}

	//*** Sumar Restar Fechas ***
function sumres_fecha($fecha, $dias)
{
	$calculo = strtotime("$fecha  $dias days");
	return date("Y-m-d", $calculo);
}

?>
