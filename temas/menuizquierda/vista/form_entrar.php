<form action="index.php?pagina=index" method="post" >
      <label>Inicio de Sesion:</label>
      <input type="text" name="usuario" id="usuario" value="Ingrese Usuario" tabindex="1" onfocus="clearField(this);" />
      <input type="text" name="password" id="password" value="Contrase&ntilde;a" tabindex="2" onfocus="pwdFocus();" />
      <input style="display: none" type="password" name="clave" id="clave" value="" tabindex="2" onblur="pwdBlur();" />
      <input type="submit" class="botton" value="ENTRAR" />
</form>

