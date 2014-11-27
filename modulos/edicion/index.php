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
	case "cprecio_pollo":
		$controlador = $pagina.".php";
		break;
	case "cprecio_papa":
		$controlador = $pagina.".php";
		break;
	case "cprecio_verdura":
		$controlador = $pagina.".php";
		break;
	case "cprecio_producto":
		$controlador = $pagina.".php";
		break;
	case "agregar_nuevo":
		$controlador = $pagina.".php";
		break;
	case "seleccionar":
		$controlador = $pagina.".php";
		break;
	case "lista_edit":
		$controlador = $pagina.".php";
		break;
	case "editar":
		$controlador = $pagina.".php";
		break;
	case "cambiar_precio":
		$controlador = $pagina.".php";
		break;
	case "form_email_pollo":
		$controlador = $pagina.".php";
		break;
	case "form_email_papa":
		$controlador = $pagina.".php";
		break;
	case "envioemail":
		$controlador = $pagina.".php";
		break;
	default:
		$controlador = "index.php";
}

// incluyo el controlador de la pagina solitada
require_once "controlador/$controlador";
?>
