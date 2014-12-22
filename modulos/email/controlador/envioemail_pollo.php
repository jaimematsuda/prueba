<?php
	if(!empty($_POST)) {
//dump($_POST, true);
		require_once("modelo/email.php");
		$to = para_email_pollo($db);
		$ccopia = addslashes(trim($_POST["cc_email"]));
		$subject = addslashes(trim($_POST["asunto_email"]));
		$cabezera = addslashes(trim($_POST["cabezera_email"]))."\n \n";
		$producto1 = "S/.".addslashes(trim($_POST["incligv1"]))."  INC/IGV  x Kg.     ".addslashes(trim($_POST["producto1"]))."\n \n";
		$producto2 = "S/.".addslashes(trim($_POST["incligv2"]))."  INC/IGV  x Kg.     ".addslashes(trim($_POST["producto2"]))."\n \n";
		$producto3 = "S/.".addslashes(trim($_POST["incligv3"]))."  INC/IGV  B5 x Und. ".addslashes(trim($_POST["producto3"]))."\n \n";
		$producto4 = "S/.".addslashes(trim($_POST["incligv4"]))."  INC/IGV  B6 x Und. ".addslashes(trim($_POST["producto4"]))."\n \n";
		$nota = addslashes(trim($_POST["nota_email"]))."\n \n";
		$pie = addslashes(trim($_POST["pie_email"]));
	}
	$name = "Sachi Kina";
	$mail2 = "skina@gruponorkys.com";
	require_once('lib/php/class.phpmailer.php');
	$mail = new PHPMailer(true);
	$mail -> IsSMTP();
	$mail -> PluginDir = "lib/";
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
	$mail -> Body		.= $producto4;
	$mail -> Body		.= $nota;
	$mail -> Body		.= $pie;
	foreach ($to as $fila) {
		foreach ($fila as $destino) {
			$mail -> AddAddress($destino);
		}
	}
	$exito = $mail -> Send();
	// Si el mensaje no ha podido enviarse se realizaran 4 intentos mas
	// cada intento se hara 5 seg. despues del anterior, para ello se usa la funcion sleep
	$intentos = 1;
	while  ((!$exito) && ($intentos < 5) && ($mail -> ErrorInfo != "SMTP Error: Data not accepted")) {
		sleep(5);
		//echo $mail -> ErrorInfo;
		$exito = $mail -> Send();
		$intentos = $intentos + 1;
	}
	if (!$exito) {
		echo "Correo no enviado";
		echo "<br />".$mail -> ErrorInfo;
	}else{
		echo "Correo enviado Revisar su buzon";
	}
	$mail -> ClearAddresses();
	if (!empty($ccopia)) {
		$rs = explode(",", $ccopia);
		foreach($rs as $fila => $destino) {
			$mail -> AddCC($destino);
		}
	}
	$mail -> Send();
	$mail -> ClearAddresses();
?>
