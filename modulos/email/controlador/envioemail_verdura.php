<?php
	if(!empty($_POST)) {
//dump($_POST, true);
		require_once("modelo/email.php");
		$to = para_email_verdura($db);
		$ccopia = addslashes(trim($_POST["cc_email"]));
		$subject = addslashes(trim($_POST["asunto_email"]));
		$cabezera = addslashes(trim($_POST["cabezera_email"]))."\r";
		$nota = addslashes(trim($_POST["nota_email"]))."\r";
		$pie = addslashes(trim($_POST["pie_email"]));
	}
	$array = array();
	$array = $_POST;
	$i = 1;
	$name = "Sachi Kina";
	$mail2 = "skina@gruponorkys.com";
	$columna = "<table>";
	while ($a = current($array)) {
		if (key($array) == 'proveedor'.$i) {
			$proveedor = addslashes(trim($array["proveedor".$i]));
			$producto = addslashes(trim($array["producto".$i]));
			$unidad = addslashes(trim($array["unidad".$i]));
			$valor_v = addslashes(trim($array["valor_venta".$i]));
			$columna .= "<tr><td>$proveedor</td><td>$producto</td><td>$unidad</td><td>S/. $valor_v</td></tr>\r";
			$i = $i + 1;
		}
		next($array);
	}
	$columna .= "</table> \r";
	require_once('lib/php/class.phpmailer.php');
	$mail = new PHPMailer(true);
	$mail -> IsSMTP();
	
	try {
		
	$mail -> Host		= "smtp.gmail.com";
	$mail -> SMTPDebug	= 2;
	$mail -> SMTPAuth	= true;
	$mail -> SMTPSecure	= "tls";
	$mail -> Port		= 587;
//	$mail -> Username	= "skina@macroscem.com";
//	$mail -> Password	= "sk147963";
	$mail -> Username	= "inforestnorkys@gmail.com";
	$mail -> Password	= "spetre4a";
	$mail -> From		= "skina@macroscem.com";
	$mail -> FromName	= "Sachi Kina";
	$mail -> Subject = $subject;
	$mail -> AddReplyTo($mail2, $name);
	$mail -> Body	.= $columna;
	$mail -> IsHtml(true);
	foreach ($to as $fila) {
		foreach($fila as $destino) {
			$mail -> AddAddress($destino);
			$mail -> Send();
			$mail -> ClearAddresses();
		}
	}
	$rs = explode(",", $ccopia);
	foreach($rs as $fila => $destino) {
		$mail -> AddCC($destino);
		$mail -> Send();
		$mail -> ClearAddresses();
	}
			echo "Mensaje Enviado<p></p>\n";
			} catch (phpmailerException $e) {
			echo $e->errorMessage();
			} catch(Exception $e) {
			echo $e->getMessage();
	}
?>
