<?php
	if(!empty($_POST)) {
//dump($_POST, true);
		require_once("modelo/email.php");
		$to = para_email_papa($db);
		$ccopia = addslashes(trim($_POST["cc_email"]));
		$subject = addslashes(trim($_POST["asunto_email"]));
		$cabezera = addslashes(trim($_POST["cabezera_email"]))."\n \n";
		$producto1 = "S/.".addslashes(trim($_POST["incligv1"]))."  SIN/IGV  Bolsa x 20 Kg.   ".addslashes(trim($_POST["producto1"]))."\n \n";
		$producto2 = "S/.".addslashes(trim($_POST["incligv2"]))."  SIN/IGV  Bolsa x 20 Kg.   ".addslashes(trim($_POST["producto2"]))."\n \n";
		$producto3 = "S/.".addslashes(trim($_POST["incligv3"]))."  SIN/IGV  Bolsa x 20 Kg.   ".addslashes(trim($_POST["producto3"]))."\n \n";
		$nota = addslashes(trim($_POST["nota_email"]))."\n \n";
		$pie = addslashes(trim($_POST["pie_email"]));
	}
	$name = "Sachi Kina";
	$mail2 = "skina@gruponorkys.com";
	require_once('lib/class.phpmailer.php');
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
	$mail -> Body		.= $cabezera;
	$mail -> Body		.= $producto1;
	$mail -> Body		.= $producto2;
	$mail -> Body		.= $producto3;
	$mail -> Body		.= $nota;
	$mail -> Body		.= $pie;
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
