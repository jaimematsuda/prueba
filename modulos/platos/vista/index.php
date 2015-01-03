<h2>USO DE DESCARTABLES</h2>
<a href="index.php?modulo=articulos&pagina=lista_articulos">Lista Uso de Descartables</a><br />
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=articulos&pagina=agregar_articulo">Agregar</a><br />
	<a href="index.php?modulo=articulos&pagina=modificar_articulo">Editar</a><br />
	<a href="index.php?modulo=articulos&pagina=eliminar_articulo">Eliminar</a><br />
<?php } ?>
