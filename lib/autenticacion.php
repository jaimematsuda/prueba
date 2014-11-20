<?php
function is_session()
{
	if(isset($_SESSION["usuario"]) && isset($_SESSION["perfil"])){
		return true;
	} 
	return false;	
}	

function is_admin()
{
	if(is_session() && $_SESSION["perfil"]=="admin"){
		return true;
	}
	return false;
}

function is_editor(){
	if(is_session() && $_SESSION["perfil"]=="editor"){
		return true;
	}
}

function is_usuario()
{
	if(is_session() && $_SESSION["perfil"]=="usuario"){
		return true;
	}
	return false;
}
?>
