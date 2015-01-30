<span class="rojo"><?php echo $mensaje;?></span><br />

<form class="formusodescartable" id="agregarusodescartable" method="post" action="" enctype="multipart/form-data" accept-charset="utf-8">
	<fieldset>
		<legend>Agregar Nuevo Uso</legend>
		<label>Tipo de Tienda :</label>
		<?php data_combo_box($data_tts); ?>
		<label>Tipo de Pedido :</label>
		<?php data_combo_box($data_tp); ?>
		<label>Área :</label>
		<?php data_combo_box($data_areas); ?>
		<br />
		<label>Plato :</label>
		<input type="text" id="plato" name="plato" required/><br />
		<br />
		<label>Uso Para 1 :</label>
		<input type="text" id="uso_para1" name="uso_para1" value="" required/><br />
		<label>Descartable 1 :</label>
		<input type="text" id="descartable1" name="descartable1" value="" required/><br />
		<label>Cantidad 1 :</label>
		<input type="text" id="cantidad1" name="cantidad1" value="" required/><br />
		<br />
		<label>Uso Para 2 :</label>
		<input type="text" id="uso_para2" name="uso_para2" value="" /><br />
		<label>Descartable 2 :</label>
		<input type="text" id="descartable2" name="descartable2" value="" /><br />
		<label>Cantidad 2 :</label>
		<input type="text" id="cantidad2" name="cantidad2" value="" /><br />
		<br />
		<label>Uso Para 3 :</label>
		<input type="text" id="uso_para3" name="uso_para3" value="" /><br />
		<label>Descartable 3 :</label>
		<input type="text" id="descartable3" name="descartable3" value="" /><br />
		<label>Cantidad 3 :</label>
		<input type="text" id="cantidad3" name="cantidad3" value="" /><br />
		<br />
		<label>Uso Para 4 :</label>
		<input type="text" id="uso_para4" name="uso_para4" value="" /><br />
		<label>Descartable 4 :</label>
		<input type="text" id="descartable4" name="descartable4" value="" /><br />
		<label>Cantidad 4 :</label>
		<input type="text" id="cantidad4" name="cantidad4" value="" /><br />
		<br />&nbsp;
		<input type="submit" name="enviar" value="Grabar" />
		&nbsp; &nbsp;
		<input type="reset" name="cancelar" value="Cancelar" />
	</fieldset>
</form>

