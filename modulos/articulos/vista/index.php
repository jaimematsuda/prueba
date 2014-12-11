<h2>ARTÍCULOS</h2>
<a href="index.php?modulo=articulos&pagina=lista_articulos">Lista de Artículos</a><br />
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=articulos&pagina=agregar_articulo">Agregrar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_articulo">Editar Artículo</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_articulo">Eliminar Artículo</a><br />
<?php } ?>
<h2>PRECIO FUERA DE RANGO</h2>
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=articulos&pagina=lista_prango">Lista Precio Fuera de Rango</a><br />
<?php } ?>
<a href="index.php?modulo=articulos&pagina=precio_frango">Agregar Precio Fuera de Rango</a><br />
