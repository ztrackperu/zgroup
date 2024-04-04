<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>

<script type="text/javascript">
	function vistaprevia(system = ''){
			location.href="../MVC_Controlador/ReporteC.php?acc=verreporteCompras"+"&system="+system; 	
	}
	function comprasnd(system = ''){
		var fechainicio = document.getElementById('fechainicio').value; 
    console.log(fechainicio); 
    location.href="../MVC_Controlador/ReporteC.php?acc=txtlecomprasnd"+"&system="+system+"&fechainicio="+fechainicio;
	}

</script>
</head>

<body>
<?php
	if(isset($_GET['system']) && $_GET['system'] != ''){
		$system = $_GET['system'];
	}else{
		$system = '';
	}
?>
<?php if($system == 'foodz') :?>
<h2>REPORTE DE COMPRAS FOODZ</h2>
<?php elseif($system == 'psc') :?>
<h2>REPORTE DE COMPRAS PSCARGO</h2>
<?php else:?>
<h2>REPORTE DE COMPRAS</h2>
<?php endif;?>

<form action="../MVC_Controlador/ReporteC.php?acc=txtlecompras&system=<?=$system?>" method="post">

    <table width="400" border="0">
      
      <tr>
				<td>Fecha a incluir a nombre de archivo:</td> 
					<td><input name="fechainicio"  type="text" class="texto"  id="fechainicio" size="16" maxlength="12" value="" required="required" /> <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'"> 
				<script type="text/javascript"> 
							Calendar.setup( 
								{ 
							inputField : "fechainicio", 
							ifFormat   : "%d/%m/%Y", 
							button     : "Image1" 
								} 
							); 
				</script> formato dia/mes/anno 
							</td> 
				</tr> 
        <td><input name="genera" type="submit" value="GENERAR ARCHIVO COMPRAS" /></td>
        <td><input name="genera" type="button" value="GENERAR ARCHIVO COMPRAS NO DOM." onclick="comprasnd('<?= $system?>');" /> </td>
        <td><input name="genera" type="button" value="VISTA PREVIA" onclick="vistaprevia('<?= $system?>');" /></td>
      
      </tr>
    </table>



</form>








</body>
</html>
