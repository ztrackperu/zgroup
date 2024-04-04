<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script>
function cambia(){
	
	var serie=document.form2.xvendedor.options[document.form2.xvendedor.selectedIndex].text;
	var xserie=serie.substr(1,3);
	var zserie=serie.substr(4,7);
	document.getElementById("textfield").value=xserie+'-'+zserie;
	}

</script>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=imprimeguia">
  seleccione guia:
  <label for="vendedor"></label><?php $ven = listaguiaremisionC();?>
        <select name="vendedor" id="vendedor" class="Combos texto">
        <option value="Seleccione">Seleccione</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numguia"]?>"><?php echo $item["c_numguia"].'-'.$item['c_nomdes']?></option>
          <?php }	?>
        </select>
  <input type="submit" name="button" id="button" value="IR IMPRIMIR GUIA" />
</form>
<hr />
PROCESO PARA GUIA DE TRANSPORTE
<form id="form2" name="form2" method="post" action="../MVC_Controlador/InventarioC.php?acc=imprimeguiaT&udni=<?php echo $_GET['udni'] ?>">
  <p>seleccione guia:
    <label for="xvendedor"></label>
    <?php $ven = listaguiaremisionC();?>
        <select name="xvendedor" id="xvendedor" class="Combos texto" onchange="cambia()">
                <option value="Seleccione">Seleccione</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numguia"]?>"><?php echo $item["c_numguia"].'-'.$item['c_nomdes']?></option>
          <?php }	?>
        </select>
  <input type="submit" name="button" id="button" value="GENERAR GUIA TRANSPORTE" />

  <input name="textfield" type="text" id="textfield" readonly="readonly" />
  </p>
  <p><a href="../MVC_Controlador/InventarioC.php?acc=imprimeguiaT2&udni=<?php echo $_GET['udni'] ?>">Generar Guia Transporte Sin Guia Remision</a></p>
</form>

<form id="form3" name="form3" method="post" action="../MVC_Controlador/InventarioC.php?acc=imprimeguiatransporte">
  Seleccione guia Transportista 
<?php $ven = listaguiaremisiontransportistaC();?>
        <select name="zvendedor" id="zvendedor" class="Combos texto">
        <option value="Seleccione">Seleccione</option>
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_numguia"]?>"><?php echo $item["c_numguia"].'-'.$item['c_nomdes']?></option>
          <?php }	?>
        </select>
  <input type="submit" name="button2" id="button2" value="Imprimir Guia Transporte" />
</form>
</body>
</html>
