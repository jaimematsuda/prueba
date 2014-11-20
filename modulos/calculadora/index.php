<?php
// Este index es el controlador del Modulo lo que se 
// haga aca afecta a todas las paginas del modulo
$dir_js = 	"modulos/$modulo/js";
$dir_css = 	"modulos/$modulo/css";
$dir_vista = "modulos/$modulo/vista";
$dir_controlador = "modulos/$modulo/controlador";

switch($pagina){
	case "index":
		$controlador = $pagina.".php";
		break;
	case "refrigerio":
		$controlador = $pagina.".php";
		break;
	default:
		$controlador = "index.php";
}

// incluyo el controlador de la pagina solitada
require_once $dir_controlador."/".$controlador;
?>
