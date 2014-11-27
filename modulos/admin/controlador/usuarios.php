<?php
	// incluir funciones de usuario
	require_once "modelo/usuario.php";

	// captura la variable action de GET
	$action = "listar";
	if(isset($_GET["action"])){
		$action = addslashes(trim($_GET["action"]));
	}
	$js_vista = array();
	$js_vista[] = $dir_js."/usuarios_editar.js";
	
	// opciones del controlador
	switch($action){
		case "listar":
			$lista = list_user($db);
			$vista = $dir_vista."/usuarios_lista.php";
			break;
		case "insertar":
			if(!empty($_POST)){
				// insertar los datos de post
				$nombre=addslashes(trim($_POST["nombre"]));
				$usuario=addslashes(trim($_POST["usuario"]));
				$clave=addslashes(trim($_POST["clave"]));
				$perfil=addslashes(trim($_POST["perfil"]));
				user_insert($nombre,$usuario,$clave,$perfil,$db);
				$vista = $dir_vista."/usuarios_lista.php";
			}else{
				$js_vista = array();
				$js_vista[] = $dir_js."/usuarios_editar.js";
				$vista = $dir_vista."/usuarios_insertar.php";
			}
			break;
		case "borrar":
			if(!empty($_GET)){
				$id = addslashes(trim($_GET["id"]));
				user_delete($id,$db);
				$vista = $dir_vista."/usuarios_lista.php";
			}
			break;
		default:
			$lista = list_user($db);
			$vista = $dir_vista."/usuarios_lista.php";
			
	}

	$lista = list_user($db);

	// Aca el controlador llama a la vista 
	require_once "temas/$tema/tema.php"; 
?>
