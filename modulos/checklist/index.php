<?php
// Este index es el controlador del Modulo lo que se 
// haga aca afecta a todas las paginas del modulo
$dir_js = 	"modulos/$modulo/js";
$dir_css = 	"modulos/$modulo/css";
$dir_vista = "modulos/$modulo/vista";
$dir_controlador = "modulos/$modulo/controlador";

if(!is_session()){
	// Lo redirigimos al login	
	header("location:index.php?pagina=login");
}

switch($pagina){
	case "index":
		$controlador = $pagina.".php";
		break;
	case "check_admin_rest":
		$controlador = $pagina.".php";
		break;
	case "check_admin_patio":
		$controlador = $pagina.".php";
		break;
	case "check_cajero":
		$controlador = $pagina.".php";
		break;
	default:
	$controlador = "index.php";
}

// incluyo el controlador de la pagina solitada
require_once "controlador/$controlador";
?>
