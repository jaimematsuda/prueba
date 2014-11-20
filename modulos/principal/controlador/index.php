<?php
$mensaje="";
$mensajeprecio="";
//dump($_POST);
if(!empty($_POST)){
	//dump($_POST,true);
	if(empty($_POST["usuario"]) || empty($_POST["clave"])){
		$mensaje = "No deje vacio su usuario o contraseña";
	}else{
		// saneamos las variables que vienen del usuario
		$usuario = addslashes(trim($_POST["usuario"]));
		$clave = addslashes(trim($_POST["clave"]));
		require "modelo/usuario.php";
		$userdata = login_user($usuario,$clave,$db);
		if(!empty($userdata)){
			// registro las variables de sesion del usuario
			// Guardamos las variables de sesion para luego acceder a la zona restringida
			$_SESSION["id_usuario"] = $userdata["id_usuario"];
			$_SESSION["usuario"] = $userdata["usuario"];
			$_SESSION["perfil"] = $userdata["perfil"];
			//echo "<b>Bienvenido, puede acceder al </b><a href=\"index.php?pagina=admin\">ADMIN</a>";	
			if(is_admin()){			
				header("Location:index.php?modulo=admin");
			}elseif(is_editor()){
				header("Location:index.php?modulo=edicion");
			}else{
				header("Location:index.php?modulo=lista");
			}
		}else{
			$mensaje = "Usuario o Contraseña incorrecta";
		}
	}
}

// Aca el controlador llama a la vista
require_once "modelo/principal.php";
$precionuevo = busca_precionuevo($db);
//dump($precionuevo,true);
if(busca_precionuevo($db)) {
	$mensajeprecio = "HAY PRECIOS NUEVOS";
}
$vista  = $dir_vista."/".$pagina.".php";
$css_vista = array();
$css_vista[] = $dir_css."/".$pagina.".css";

$js_vista = array();
$js_vista[] = $dir_js."/form_entrar.js";

require_once "temas/$tema/tema.php"; 
?>
