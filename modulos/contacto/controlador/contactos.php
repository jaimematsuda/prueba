<?php
	// incluir funciones de usuario
	require_once "modelo/contacto.php";

	// captura la variable action de GET
	$action = "listar";
	if(isset($_GET["action"])){
		$action = addslashes(trim($_GET["action"]));
	}
	$js_vista = array();
	$js_vista[] = $dir_js."/contactos_editar.js";
	
	// opciones del controlador
	switch($action){
		case "listar":
			$lista = list_contacto($db);
			$vista = $dir_vista."/contactos_lista.php";
			break;
		case "insertar":
			if(!empty($_POST)){
//dump($_POST, true);
				// insertar los datos de post
				$nombre = addslashes(trim($_POST["nombre"]));
				$email = addslashes(trim($_POST["email"]));
				$query = "INSERT INTO emails(nombre, email) VALUES('$nombre', '$email')";
				mysql_query("BEGIN");
				$id_email = contacto_insert($query,$db);
				$estado = addslashes(trim($_POST["estado"]));
				$query = "SELECT id_estado FROM estados WHERE estado='$estado'";
				$id_estado = select_id($query, $db);
				$query = "INSERT INTO rel_estados_emails(id_email, id_estado) VALUES($id_email, $id_estado)";
				contacto_insert($query, $db);
				if (isset($_POST["g_pollo"])) {
					$g_pollo = addslashes(trim($_POST["g_pollo"]));
					$query = "SELECT id_grupo FROM emails_grupos WHERE grupo='$g_pollo'";
					$id_grupo = select_id($query, $db);
					$query = "INSERT INTO emails_users_grupos(id_email, id_grupo) VALUES($id_email, $id_grupo)";
					$id_email_grupo = contacto_insert($query,$db);
					$query = "INSERT INTO rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_email_grupo, 1)"; 
					contacto_insert($query,$db);
				}
				if (isset($_POST["g_papa"])) {
					$g_papa = addslashes(trim($_POST["g_papa"]));
					$query = "SELECT id_grupo FROM emails_grupos WHERE grupo='$g_papa'";
					$id_grupo = select_id($query, $db);
					$query = "INSERT INTO emails_users_grupos(id_email, id_grupo) VALUES($id_email, $id_grupo)";
					$id_email_grupo = contacto_insert($query,$db);
					$query = "INSERT INTO rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_email_grupo, 1)"; 
					contacto_insert($query,$db);
				}
				if (isset($_POST["g_verdura"])) {
					$g_verdura = addslashes(trim($_POST["g_verdura"]));
					$query = "SELECT id_grupo FROM emails_grupos WHERE grupo='$g_verdura'";
					$id_grupo = select_id($query, $db);
					$query = "INSERT INTO emails_users_grupos(id_email, id_grupo) VALUES($id_email, $id_grupo)";
					$id_email_grupo = contacto_insert($query,$db);
					$query = "INSERT INTO rel_estados_email_use_grps(id_email_use_grp, id_estado) VALUES($id_email_grupo, 1)"; 
					contacto_insert($query,$db);
				}
				mysql_query("COMMIT");
				$vista = $dir_vista."/contactos_lista.php";
			}else{
				$js_vista = array();
				$js_vista[] = $dir_js."/contactos_editar.js";
				$vista = $dir_vista."/contactos_insertar.php";
			}
			break;
		case "borrar":
			if(!empty($_GET)){
				$id = addslashes(trim($_GET["id"]));
				user_delete($id,$db);
				$vista = $dir_vista."/contactos_lista.php";
			}
			break;
		default:
			$lista = list_contacto($db);
			$vista = $dir_vista."/contactos_lista.php";
			
	}

	$lista = list_contacto($db);

	// Aca el controlador llama a la vista 
	require_once "temas/$tema/tema.php"; 
?>
