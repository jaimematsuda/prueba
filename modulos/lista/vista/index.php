<div>
	<h2>Lista Productos</h2>
	<br />
	<?php $ltver = data_to_table_sum($lista, array(), "tablaprod", "cantprod", "totalprod", "multiplicarprod"); ?>
</div>
<div>
	<h2>Lista Verduras</h2>
	<br />
	<?php data_to_table_sum($lista_verdura, array(), "tablaverd", "cantverd", "totalverd", "multiplicarverd"); ?>
</div>
