<h2>USO DE DESCARTABLES</h2>
<a href="index.php?modulo=platos&pagina=lista_uso_descartables">Lista Uso de Descartables</a><br />
<?php if(is_session() && is_admin()) { ?>
	<a href="index.php?modulo=platos&pagina=agregar_uso_descartable">Agregar</a><br />
	<a href="index.php?modulo=platos&pagina=modificar_uso_descartable">Editar</a><br />
	<a href="index.php?modulo=platos&pagina=eliminar_uso_descartable">Eliminar</a><br />
<?php } ?>
