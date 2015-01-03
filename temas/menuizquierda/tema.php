<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $site_name;?></title>
		<link href="temas/menuizquierda/css/menuizquierda.css" rel="stylesheet" type="text/css" />
		<link href="lib/jquery/jquery-ui/themes/lightness/1.11.1/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="lib/jquery/jquery-min/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="lib/jquery/jquery-ui/1.10.2/jquery-ui.min.js"></script>

		<!-- Inclusion dinamica de los css de las vistas -->
		<?php if(isset($css_vista)){ ?>
			<?php foreach($css_vista as $css){ ?>
				<link href="<?php echo $css ?>" rel="stylesheet" type="text/css" />
			<?php } ?>
		<?php } ?>

		<!-- Inclusion dinamica de las LIBRERIAS javascripts de las vistas -->
		<?php if(isset($js_vista)){ ?>
			<?php foreach($js_vista as $js){ ?>
				<script type="text/javascript" src="<?php echo $js ?>"></script>
			<?php } ?>
		<?php } ?>

		<!-- Inclusion dinamica de FUNCIONES Jquery de las vistas -->		
		<?php if(isset($jq_vista)){ ?>
			<script type="text/javascript"><?php echo $jq_vista ?></script>
		<?php } ?>

</head>
<body>
	<div id="header_container">
		<div class="container" id="container">	
			<div id="header">
				<img src="temas/menuizquierda/imagenes/logo.gif" border="0" />
			</div>
			<div id="header_tcambio">
				<?php require_once "temas/menuizquierda/controlador/tcambio_sunat.php"; ?>
			</div>
		</div>
	</div>
	<div class="body_container">
		<div class="container" id="container">	
			<div id="menu">
				<ul>
					<?php if(is_session()) { ?>
						<li><a href="index.php?pagina=logout">Salir</a></li>
					<?php }else{ ?>
						<li><a href="index.php">Principal</a></li>
					<?php } ?>
					<?php if(is_session() && is_admin()) { ?>
						<li><a href="index.php?modulo=admin">Inicio</a></li>
						<li><a href="index.php?modulo=edicion">Camb Precio</a></li>
						<li><a href="index.php?modulo=email&pagina=index">Enviar Email</a></li>
						<li><a href="index.php?modulo=edicion&pagina=agregar_nuevo">Nuevo product</a></li>
						<li><a href="index.php?modulo=edicion&pagina=lista_edit">Editar producto</a></li>
						<li><a href="index.php?modulo=admin&pagina=usuarios">Usuarios</a></li>
						<li><a href="index.php?modulo=contacto&pagina=contactos">Contactos</a></li>
						<li><a href="index.php?modulo=admin&pagina=admin_config">Configuraci&oacute;n</a></li>
						<li><a href="index.php?modulo=lista">Lista Precios</a></li>
						<li><a href="index.php?modulo=articulos">Artículos</a></li>
						<li><a href="index.php?modulo=platos">Platos de Venta</a></li>
						<li><a href="index.php?modulo=checklist">Checklist</a></li>
						<li><a href="index.php?modulo=calculadora">Calculadora</a></li>
					<?php } ?>
					<?php if(is_session() && is_editor()) { ?>
						<li><a href="index.php?modulo=edicion">Camb Precio</a></li>
						<li><a href="index.php?modulo=email&pagina=index">Enviar Email</a></li>
						<li><a href="index.php?modulo=edicion&pagina=agregar_nuevo">Nuevo</a></li>
						<li><a href="index.php?modulo=edicion&pagina=lista_edit">Editar</a></li>
						<li><a href="index.php?modulo=lista">Lista Precios</a></li>
						<li><a href="index.php?modulo=articulos">Artículos</a></li>
						<li><a href="index.php?modulo=platos">Platos de Venta</a></li>
						<li><a href="index.php?modulo=checklist">Checklist</a></li>
						<li><a href="index.php?modulo=calculadora">Calculadora</a></li>
					<?php } ?>
					<?php if(is_session() && (!is_admin() && !is_editor())) { ?>
						<li><a href="index.php?modulo=lista">Lista Precios</a></li>
						<li><a href="index.php?modulo=articulos">Artículos</a></li>
						<li><a href="index.php?modulo=checklist">Checklist</a></li>
						<li><a href="index.php?modulo=articulos&pagina=lista_tipo_egreso">Tipología de Egresos</a></li>
						<li><a href="index.php?modulo=platos&pagina=lista_uso_descartables">Uso de Descartables</a></li>
						<li><a href="index.php?modulo=calculadora">Calculadora</a></li>
					<?php } ?>
				</ul>
			</div>
			<div id="body">
				<?php require $vista; ?>
			</div>
		</div>
	</div>
	<div id="footer">
		<?php if(is_session()) { ?>
			<?php require "temas/menuizquierda/vista/form_salir.php"; ?>
		<?php }else{ ?>
			<?php require "temas/menuizquierda/vista/form_entrar.php"; ?>
		<?php } ?>
	</div>
</body>
</html>
