<div>
	<h2>Uso de Descartables</h2>
	<p>Buscar Plato:</p>
	<input id="buscar_plato" type="text" />
	<section class="tabs">
		<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		<label for="tab-1" class="tab-label-1">NORKYS</label>

		<input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		<label for="tab-2" class="tab-label-2">PATIO</label>

		<input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		<label for="tab-3" class="tab-label-3">SOLARI</label>

		<div class="clear-shadow"></div>

		<div class="content">
			<div class="content-1">
				<table id="tabla" class="tabla">
					<?php data_to_table_descartable($listaplatonorkys, $listadescanorkys, 
						'NORKYS', 'HORNO', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
					<?php data_to_table_descartable($listaplatonorkys, $listadescanorkys, 'NORKYS', 
						'PARRILLA', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
					<?php data_to_table_descartable($listaplatonorkys, $listadescanorkys, 'NORKYS', 
						'COCINA', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALDADA', 'POSTRE')); ?>
					<?php data_to_table_descartable($listaplatonorkys, $listadescanorkys, 'NORKYS', 
						'BROASTER', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
				</table>
			</div>			
			<div class="content-2">
				<table id="tabla" class="tabla">
					<?php data_to_table_descartable_patio($listaplatopatio, $listadescapatio, 
						'PATIO', 'PRODUCCION', array('PLATO', 'SALON', 'LLEVAR')); ?>
				</table>
			</div>			
			<div class="content-3">
				<table id="tabla" class="tabla">
					<?php data_to_table_descartable($listaplatosolari, $listadescasolari, 
						'SOLARI', 'HORNO', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
					<?php data_to_table_descartable($listaplatosolari, $listadescasolari, 
						'SOLARI', 'PARRILLA', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
					<?php data_to_table_descartable($listaplatosolari, $listadescasolari, 
						'SOLARI', 'COCINA', array('PLATO', 'PRINCIPAL', 'PAPA', 'ENSALADA', 'POSTRE')); ?>
				</table>
			</div>			
		</div>
	</section>
</div>


