<?php
	//*** Activa el nivel de errores maximo para programar bien ***
error_reporting(E_ALL); 	//*** En produccion puede ser E_ALL && ! E_NOTICE ***

	//*** Nivel de debug para los querys de base de datos ***
$debug = true; 

	//*** Definiendo mis rutas de inclusion de mis librerias ***
	//*** PATH_SEPARATOR devuelve : en Linux y ; en windows ***
$root_dir = dirname(dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.$root_dir.PATH_SEPARATOR.$root_dir."/lib");

	//*** Parametros para la site ***
$site_name = "Precios de Proveedores con Guias";
$tema     = "menuizquierda";

	//*** Parametros de conexion de la base de datos ***
$dbhost = "localhost";
$dbuser = "prueba";
$dpass  = "prueba";
$dbname = "guiaprecios";

	//*** Creando la conexión y guardandolo en la variable $db ***
$db = mysql_connect($dbhost,$dbuser,$dpass) or die ("Error en la conexion");
mysql_select_db($dbname,$db); // Abre la base de datos
require_once "lib/funciones.php";
require_once "lib/autenticacion.php";

?>
