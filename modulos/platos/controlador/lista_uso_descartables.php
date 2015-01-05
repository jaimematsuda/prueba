<?php
	// Aca el controlador llama a la vista 
	$vista = $dir_vista."/".$pagina.".php";

	$css_vista = array();
	$css_vista[] = "css/normalize.css";
	$css_vista[] = $dir_css."/style3.css";
	$css_vista[] = $dir_css."/".$pagina.".css";

	$jq_vista = "//<![CDATA[
				$(window).load(function(){
					$.expr[':'].Contains = function(x, y, z){
						return jQuery(x).text().toLowerCase().indexOf(z[3].toLowerCase())>=0;
					};
					$(\"#buscar_articulo\").keyup(function(){
						var buscar = $(\"#buscar_articulo\").val();
						$(\"#tabla tr\").show();
						if(buscar.length>0){
							$(\"#tabla tr td#en_documento\").not(\":Contains('\"+buscar+\"')\").parent().hide();
						}
					});
				});
				//]]>";
	
	require_once "modelo/lista.php";
	$listaplato = lista_platos($db);
	$listadesca = lista_descartables($db);

	require_once "temas/$tema/tema.php"; 
?>
