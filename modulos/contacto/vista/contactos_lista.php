<h2>Lista de usuarios</h2><br />
<a href="index.php?modulo=contacto&pagina=contactos&action=insertar">Agregar un Nuevo Contacto</a>
<br />
<br />
<?php
	data_to_table_det($lista,array(),"index.php?modulo=contacto&pagina=contactos_editar&id=","index.php?modulo=contacto&pagina=contactos&action=borrar&id=","id_email");
?>
