<?php
// Este index es el controlador del Modulo lo que se 
// haga aca afecta a todas las paginas del modulo
$dir_js = 	"modulos/$modulo/js";
$dir_css = 	"modulos/$modulo/css";
$dir_vista = "modulos/$modulo/vista";
$dir_controlador = "modulos/$modulo/controlador";

if(!is_session()) {
	// Lo redirigimos al login	
	header("location:index.php?modulo=principal&pagina=index");
}

if((!is_editor()) && (!is_admin())) {
	die ("Esta zona esta restringida a los editores y administaradores del sistema");
}

switch($pagina){
	case "index":
		$controlador = $pagina.".php";
		break;
	case "form_email_pollo":
		$controlador = $pagina.".php";
		break;
	case "form_email_papa":
		$controlador = $pagina.".php";
		break;
	case "form_email_verdura":
		$controlador = $pagina.".php";
		break;
	case "envioemail_pollo":
		$controlador = $pagina.".php";
		break;
	case "envioemail_papa":
		$controlador = $pagina.".php";
		break;
	case "envioemail_verdura":
		$controlador = $pagina.".php";
		break;
	default:
		$controlador = "index.php";
}

// incluyo el controlador de la pagina solitada
require_once "controlador/$controlador";
?>
