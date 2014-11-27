<h2>Lista de usuarios</h2><br />
<a href="index.php?modulo=admin&pagina=usuarios&action=insertar">Agregar un Nuevo Usuario</a>
<br />
<br />
<?php
	data_to_table_det($lista,array(),"index.php?modulo=admin&pagina=usuarios_editar&id=","index.php?modulo=admin&pagina=usuarios&action=borrar&id=","id_usuario");
?>
