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

switch($pagina){
	case "index":
		$controlador = $pagina.".php";
		break;
	case "lista_uso_descartables":
		$controlador = $pagina.".php";
		break;
	case "agregar_uso_descartable":
		if((!is_editor()) && (!is_admin())) {
			die ("Esta zona esta restringida a los editores y administaradores del sistema");
		}
		$controlador = $pagina.".php";
		break;
	case "editar_uso_descartable":
		if((!is_editor()) && (!is_admin())) {
			die ("Esta zona esta restringida a los editores y administaradores del sistema");
		}
		$controlador = $pagina.".php";
		break;
	case "eliminar_uso_descartable":
		if((!is_editor()) && (!is_admin())) {
			die ("Esta zona esta restringida a los editores y administaradores del sistema");
		}
		$controlador = $pagina.".php";
		break;
	default:
		$controlador = "index.php";
		$pagina = "index";
}

// incluyo el controlador de la pagina solitada
require_once "controlador/$controlador";
?>
