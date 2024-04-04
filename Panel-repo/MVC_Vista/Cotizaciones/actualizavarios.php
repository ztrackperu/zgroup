<?php 
if($obtener!=NULL)
{
	foreach ($obtener as $item)
	{
		$grupo=$item['grupo'];
		$titulo=$item['titulo'];
		$des=$item['descripcion'];
		$cod=$item['id'];
		
	}
}

?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function limita(elEvento, maximoCaracteres) {
  var elemento = document.getElementById("descripcion");

  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  // Permitir utilizar las teclas con flecha horizontal
  if(codigoCaracter == 37 || codigoCaracter == 39) {
    return true;
  }

  // Permitir borrar con la tecla Backspace y con la tecla Supr.
  if(codigoCaracter == 8 || codigoCaracter == 46) {
    return true;
  }
  else if(elemento.value.length >= maximoCaracteres ) {
    return false;
  }
  else {
    return true;
  }
}

function actualizaInfo(maximoCaracteres) {
  var elemento = document.getElementById("descripcion");
  var info = document.getElementById("info");

  if(elemento.value.length >= maximoCaracteres ) {
    info.innerHTML = "Maximo "+maximoCaracteres+" caracteres";
  }
  else {
    info.innerHTML = "Puedes escribir hasta "+(maximoCaracteres-elemento.value.length)+" caracteres adicionales";
  }
}

</script>
</head>

<body>
<form action="../MVC_Controlador/cajaC.php?acc=actuvarios" method="post"  name="form1">
  <table width="704" border="1" cellpadding="1" cellspacing="1" bordercolor="#3D4670">
    <tr>
      <td width="110">Grupo</td>
      <td width="750">
    
         <?php $ven = ListaVariosCotiC();?>
          <select name="grupo" id="grupo" >
            <?php foreach($ven as $item){?>
            <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$grupo){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
        </select>
        <input type="text" name="hiddenField" id="hiddenField" value="<?php echo $cod; ?>"></td>
    </tr>
    <tr>
      <td>Titulo</td>
      <td>
      <input name="titulo" type="text" id="titulo" size="90" value="<?php echo $titulo; ?>"></td>
    </tr>
    <tr>
      <td>Descripcion</td>
      <td><label for="textarea"></label>
<!--<textarea name="descripcion" id="descipcion" cols="120" rows="5"></textarea>-->
 <!--<textarea name="descripcion" id="descipcion" cols="120" rows="10"></textarea>-->
 <div id="info"></div>
<textarea id="des2" name="des2"  rows="10" cols="120"><?php echo strip_tags($des)?></textarea></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td>
        <select name="estado" id="estado">
          <option value="1">Activo</option>
          <option value="2">Dar Baja</option>
      </select></td>
    </tr>
    <tr>
      <td><input type="submit" name="submit" id="submit" value="ACTUALIZAR"></td>
      <td><input type="reset" name="button" id="button" value="CANCELAR"></td>
    </tr>
  </table>
  
</form>
<table width="704" border="1" bordercolor="#3D4670">
  <tr>
    <td width="158" align="center" bgcolor="#3D4670" style="color:#FFF">Grupo</td>
    <td width="157" align="center" bgcolor="#3D4670" style="color:#FFF">Titulo</td>
    <td width="126" align="center" bgcolor="#3D4670" style="color:#FFF">Administrar</td>
  </tr>
   <?php $rutalista = ListaCotiVariosCotiC();
   foreach($rutalista as $item){
   ?>
  <tr>
    <td align="center"><?php echo $item["grupo"]?></td>
    <td align="center"><?php echo $item["titulo"]?></td>
    <td align="center"><a href="../MVC_Controlador/cajaC.php?acc=avarios&cod=<?php echo $item["id"]?>">
<img src="../images/icon_edit.png" width="16" height="16" border="0" />
</a>
</a><a href="#"><img src="../images/icon_delete.png" width="16" height="16" border="0" /></a></td>
  </tr>
  <?php
  }
  ?>
</table>
</body>
</html>

