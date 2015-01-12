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
$dbuser = "guiaprecios";
$dpass  = "prat38";
$dbname = "guiaprecios";

	//*** Creando la conexión y guardandolo en la variable $db ***
$db = mysql_connect($dbhost,$dbuser,$dpass) or die ("Error en la conexion");
mysql_select_db($dbname,$db); // Abre la base de datos

function conectar_mssql($conn)
{
	$serverName = "192.168.13.2";
	$uid = "sa";
	$pwd = "sistemas";
	
	$conn = mssql_connect ($serverName, $uid, $pwd);
	if (!$conn || !mssql_select_db ('ALMACEN', $conn))
	{
		echo "No es posible conectarse al servidor";
		echo "<br />";
		die (print_r (mssql_get_last_message()));
	} 
	else 
	{
		return $conn;
	}
}

require_once "lib/php/funciones.php";
require_once "lib/php/autenticacion.php";

?>
