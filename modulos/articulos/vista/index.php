<h2>INGRESO DE ARTÍCULOS AL SISTEMA INFOREST</h2>
<a href="index.php?modulo=articulos&pagina=lista_articulos">Lista de Artículos</a><br />
<?php if(is_session() && (is_admin() || is_editor())) { ?>
	<a href="index.php?modulo=articulos&pagina=agregar_articulo">Agregrar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=editar_lista_articulo">Editar Lista de Artículos</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_articulo">Cambiar de Estado al Artículo en la Lista</a><br />
	<a href="index.php?modulo=articulos&pagina=actualizar_articulo_sistema">Actualizar Artículo de Inforest</a><br />
<?php } ?>
<?php if(is_session() && (is_admin() || is_editor())) { ?>
	<h2>TIPOLOGÍA DE EGRESOS</h2>
	<a href="index.php?modulo=articulos&pagina=lista_tipo_egreso">Lista Tipología de Egresos</a><br />
	<a href="index.php?modulo=articulos&pagina=agregar_tipo_egreso">Agregrar Tipología de Egresos</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_tipo_egreso">Editar Tipología de Egresos</a><br />
<?php } ?>
