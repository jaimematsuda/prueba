<a href="index.php?modulo=articulos&pagina=lista_articulos">Lista de Artículos</a><br />
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=articulos&pagina=agregar_articulo">Agregrar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_articulo">Editar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_articulo">Eliminar Artículo</a><br />
<?php } ?>

