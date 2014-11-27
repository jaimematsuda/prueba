<?php
	$mensaje = ""; 
	session_destroy(); // Destruye la session actual
	// tiene que pasar otra vez para que pinte con la sesion destruida
	if(isset($_GET["despedida"])){
		$vista = $dir_vista."/".$pagina.".php";
		$js_vista = array();
		$js_vista[] = $dir_js."/form_entrar.js";
		require_once "temas/$tema/tema.php";
	}else{
		header("location:index.php?pagina=logout&despedida=1");
	}
	
?>
