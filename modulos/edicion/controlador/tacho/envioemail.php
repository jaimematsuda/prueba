<?php
	if(!empty($_POST)) {
//dump($_POST, true);
		$to = addslashes(trim($_POST["para_email"]));
		$subject = addslashes(trim($_POST["asunto_email"]));
		$cabezera = addslashes(trim($_POST["cabezera_email"]))."\n \n";
		$producto1 = addslashes(trim($_POST["producto1"]))." x Kg.\t \tS/.".addslashes(trim($_POST["incligv1"]))." INCL. IGV\n \n";
		$producto2 = addslashes(trim($_POST["producto2"]))." x Kg.\t \t \tS/.".addslashes(trim($_POST["incligv2"]))." INCL. IGV.\n \n";
		$producto3 = addslashes(trim($_POST["producto3"]))." B5 x Und.\tS/.".addslashes(trim($_POST["incligv3"]))." INCL. IGV.\n \n";
		$producto4 = addslashes(trim($_POST["producto4"]))." B6 x Und.\tS/.".addslashes(trim($_POST["incligv4"]))." INCL. IGV.\n \n";
		$nota = addslashes(trim($_POST["nota_email"]))."\n \n";
		$pie = addslashes(trim($_POST["pie_email"]));
	}
	$name = "Sachi Kina";
	$mail2 = "skina@gruponorkys.com";
	require_once('lib/php/class.phpmailer.php');
	$mail = new PHPMailer(true);
	$mail -> IsSMTP();
	
	$query = "SELECT email FROM emails_users_grupos as a INNER JOIN emails as b INNER JOIN emails_grupos as c ON a.id_email=b.id_email AND a.id_grupo=c.id_grupo WHERE a.id_grupo=1";
	$row = rs_table($query, $db);
//	try {
		
	$mail -> Host		= "smtp.gmail.com";
	$mail -> SMTPDebug	= 2;
	$mail -> SMTPAuth	= true;
	$mail -> SMTPSecure	= "tls";
	$mail -> Port		= 587;
	$mail -> Username	= "skina@macroscem.com";
	$mail -> Password	= "sk147963";
	$mail -> From		= "skina@macroscem.com";
	$mail -> FromName	= "Sachi Kina";
//	$mail -> AddAddress($to);
	$mail -> Subject = $subject;
	$mail -> AddReplyTo($mail2, $name);
	$mail -> Body		.= $cabezera;
	$mail -> Body		.= $producto1;
	$mail -> Body		.= $producto2;
	$mail -> Body		.= $producto3;
	$mail -> Body		.= $producto4;
	$mail -> Body		.= $nota;
	$mail -> Body		.= $pie;
	foreach ($row as $fila) {
		foreach ($fila as $destino){
//dump($destino, true);
			$mail -> AddAddress($destino);
			$mail -> Send();
			$mail -> ClearAddresses();
		}
	}
	//		echo "Mensaje Enviado<p></p>\n";
		//	} catch (phpmailerException $e) {
		//	echo $e->errorMessage();
		//	} catch(Exception $e) {
		//	echo $e->getMessage();
//	}
?>
