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

<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">
	function vistaprevia(system = ''){
		if(document.getElementById('fechainicio').value==''){
			jAlert ('Falta fecha de inicio', 'Mensaje del Sistema');
			document.getElementById("fechainicio").focus();
			return 0;		
			}
		if(document.getElementById('fechafinal').value==''){
			jAlert ('Falta fecha final', 'Mensaje del Sistema');
			document.getElementById("fechafinal").focus();
			return 0;
			}
		var fechainicio=document.getElementById('fechainicio').value;
		var fechafinal=document.getElementById('fechafinal').value;
		
		var fecha1=fechainicio.split('/'); //01,02,2014
		var f1=new Date(fecha1[2], fecha1[1]-1 , fecha1[0]);
		
		var fecha2= fechafinal.split('/');
		var f2=new Date(fecha2[2], fecha2[1]-1 , fecha2[0]);	
			
		f=new Date();		
		f0 = new Date(f.getFullYear() , (f.getMonth()) , f.getDate());
		
		if(f1>f2){
			jAlert ('La fecha de inicio no puede ser mayor a la fecha de final', 'Mensaje del Sistema');			
			document.getElementById("fechainicio").focus();
			return 0;			
		}
		if(f1==f2){
			jAlert ('La fecha de inicio no puede ser igual a la fecha de final', 'Mensaje del Sistema');			
			document.getElementById("fechainicio").focus();
			return 0;			
		}		
		if(f2>f0){
			jAlert ('La fecha final no puede ser mayor a la fecha actual', 'Mensaje del Sistema');			
			document.getElementById("fechafinal").focus();
			return 0;			
		}				
		//alert(fechainicio);
			location.href="../MVC_Controlador/ReporteC.php?acc=verreporte&fechainicio="+fechainicio+"&fechafinal="+fechafinal+"&system="+system; 	 	
	}
	
	function graba(system = ''){	
		if(document.getElementById('fechainicio').value==''){
			jAlert ('Falta fecha de inicio', 'Mensaje del Sistema');
			document.getElementById("fechainicio").focus();
			return 0;		
			}
		if(document.getElementById('fechafinal').value==''){
			jAlert ('Falta fecha final', 'Mensaje del Sistema');
			document.getElementById("fechafinal").focus();
			return 0;
			}
		var fechainicio=document.getElementById('fechainicio').value;
		var fechafinal=document.getElementById('fechafinal').value;
		
		var fecha1=fechainicio.split('/'); //01,02,2014
		var f1=new Date(fecha1[2], fecha1[1]-1 , fecha1[0]);
		
		var fecha2=fechafinal.split('/');
		var f2=new Date(fecha2[2], fecha2[1]-1 , fecha2[0]);	
			
		f=new Date();		
		f0 = new Date(f.getFullYear() , (f.getMonth()) , f.getDate());
		
		if(f1>f2){
			jAlert ('La fecha de inicio no puede ser mayor a la fecha de final', 'Mensaje del Sistema');			
			document.getElementById("fechainicio").focus();
			return 0;			
		}
		if(f1==f2){
			jAlert ('La fecha de inicio no puede ser igual a la fecha de final', 'Mensaje del Sistema');			
			document.getElementById("fechainicio").focus();
			return 0;			
		}		
		if(f2>f0){
			jAlert ('La fecha final no puede ser mayor a la fecha actual', 'Mensaje del Sistema');			
			document.getElementById("fechafinal").focus();
			return 0;			
		}				
			
		document.getElementById("form1").submit();
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
<h2>REPORTE DE VENTAS FOODZ</h2>
<?php elseif($system == 'psc') :?>
<h2>REPORTE DE VENTAS PSCARGO</h2>
<?php else:?>
<h2>REPORTE DE VENTAS</h2>
<?php endif;?>

<form id="form1" action="../MVC_Controlador/ReporteC.php?acc=txtleventas&system=<?=$system?>" method="post">
    <table width="400" border="0">
      <tr>
        <td>Fecha Inicio</td>
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
      <tr>
        <td>Fecha Final</td>
        <td><input name="fechafinal"  type="text" class="texto"  id="fechafinal" size="16" maxlength="12" value="" required="required" /> <img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fechafinal",
						ifFormat   : "%d/%m/%Y",
						button     : "Image2"
						  }
						);
			 </script> formato dia/mes/anno</td>
      </tr>
      <tr>
        <td colspan="2"><input name="genera" type="button" value="GENERAR ARCHIVO" onclick="graba('<?= $system?>');" />
        <input name="genera" type="button" value="VISTA PREVIA" onclick="vistaprevia('<?= $system?>');" />
        </td>
      
      </tr>
    </table>
</form>
</body>
</html>
