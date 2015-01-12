<h2>ARTÍCULOS</h2>
<a href="index.php?modulo=articulos&pagina=lista_articulos">Lista de Artículos</a><br />
<?php if(is_session() && (is_admin() || is_editor())) { ?>
	<a href="index.php?modulo=articulos&pagina=actualizar_articulo_sistema">Actualizar Artículo de Sistema</a><br />
	<a href="index.php?modulo=articulos&pagina=agregar_articulo">Agregrar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_articulo">Editar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_articulo">Eliminar Artículo</a><br />
<?php } ?>
<?php if(is_session() && (is_admin() || is_editor())) { ?>
	<h2>TIPOLOGÍA DE EGRESOS</h2>
	<a href="index.php?modulo=articulos&pagina=lista_tipo_egreso">Lista Tipología de Egresos</a><br />
	<a href="index.php?modulo=articulos&pagina=agregar_tipo_egreso">Agregrar Tipología de Egresos</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_tipo_egreso">Editar Tipología de Egresos</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_tipo_egreso">Elimina Tipología de Egresos</a><br />
<?php } ?>
<!--<h2>PRECIO FUERA DE RANGO</h2>
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=articulos&pagina=lista_prango">Lista Precio Fuera de Rango</a><br />
<?php } ?>
<a href="index.php?modulo=articulos&pagina=precio_frango">Agregar Precio Fuera de Rango</a><br /> -->
