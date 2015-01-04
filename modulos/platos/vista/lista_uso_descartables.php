<div>
	<h2>Uso de Descartables</h2>
	<br />
	<section class="tabs">
		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		<label for="tab-1" class="tab-label-1">NORKYS</label>

		<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		<label for="tab-2" class="tab-label-2">SOLARI</label>

		<div class="clear-shadow"></div>

		<div class="content">
			<div class="content-1">
				<p>Buscar Plato:</p>
				<input id="buscar_plato" type="text" />
				<br />
				<br />
				<table id="tabla" class="tabla">
					<?php data_to_table_descartable($lista, 'NORKYS', 'HORNO', array()); ?>
					<?php data_to_table_descartable($lista, 'NORKYS', 'PARRILLA', array()); ?>
					<?php data_to_table_descartable($lista, 'NORKYS', 'COCINA', array()); ?>
					<?php data_to_table_descartable($lista, 'NORKYS', 'BROASTER', array()); ?>
				</table>
			</div>			
			<div class="content-2">
				<p>Buscar Plato Solari:</p>
				<input id="buscar_plato" type="text" />
				<br />
				<br />
				<table id="tabla" class="tabla">
					<?php data_to_table_descartable($lista, 'SOLARI', 'HORNO', array()); ?>
					<?php data_to_table_descartable($lista, 'SOLARI', 'PARRILLA', array()); ?>
					<?php data_to_table_descartable($lista, "SOLARI", 'COCINA', array()); ?>
				</table>
			</div>			
		</div>
	</section>
</div>


