<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<script>
function enviar(){
	document.form1.submit();
	
	}
</script>

<body onload="enviar();">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=verimpresion">
  <p>
    <input name="c_numos" type="hidden" id="c_numos" value="<?php echo $c_numos; ?>" size="100"/>
  </p>
  <p>
    
    <input type="hidden" name="codigo" id="codigo" value="<?php echo $c_numos; ?>" />
  </p>
</form>    
    <?php
        header('Location: ../MVC_Controlador/OrdenTrabajoC.php?acc=veros');
    ?>
</body>
</html>