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
		if(system != ''){
			location.href="../MVC_Controlador/ReporteC.php?acc=vermayordet&system="+system;
		}else{
			location.href="../MVC_Controlador/ReporteC.php?acc=vermayordet"; 
		}
		//var mes=document.getElementById('mes').value;
		//var ano=document.getElementById('ano').value;
		//alert(mes);

	
	}
	
	function ValidaEntero(e){
			tecla = (document.all) ? e.keyCode : e.which;
		
			//Tecla de retroceso para borrar, siempre la permite
			if (tecla==8){
				return true;
			}
				
			// Patron de entrada, en este caso solo acepta numeros
			patron =/[0-9]/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}
	
	/*function vercuentas(){	//alert('holaaaaa');	
			location.href="../MVC_Controlador/ReporteC.php?acc=sdwf"; 
	
	}*/

</script>
</head>
<?php
	if(isset($_GET['system']) && $_GET['system'] != ''){
		$system = $_GET['system'];
	}else{
		$system = '';
	}
?>
<body>
<?php if($system == 'foodz') :?>
<h2>REPORTE DE LIBRO MAYOR DETALLADO FOODZ</h2>
<?php elseif($system == 'psc') :?>
<h2>REPORTE DE LIBRO MAYOR DETALLADO PSCARGO</h2>
<?php else:?>
<h2>REPORTE DE LIBRO MAYOR DETALLADO</h2>
<?php endif;?>

<form action="../MVC_Controlador/ReporteC.php?acc=txtlemayordet&system=<?=$system?>" method="post">
    <table width="400" border="0">      
      <tr>
				<td colspan="2">
					<input name="genera" type="submit" value="GENERAR ARCHIVO" />
        	<input name="genera" type="button" value="VISTA PREVIA" onclick="vistaprevia('<?= $system?>');" />
				</td>
      </tr>      
      <tr>
        <td colspan="2" > 
        <!--<input name="cuentas" type="button" value="CUENTAS" onclick="vercuentas();" />-->
        </td>      
      </tr>
      
    </table>



</form>








</body>
</html>
