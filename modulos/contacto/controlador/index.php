<?php
// Aca el controlador llama a la vista 
$vista = $dir_vista."/index.php";
// Aca el controlador llama al css
$css_vista = array();
$css_vista[] = $dir_css."/index.css";

$id_usuario = $_SESSION["id_usuario"];

require_once "temas/$tema/tema.php"; 
?>
