<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="../js/jquery.js"></script>   
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>




 <link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="../css/formulario.css">




<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<style type="text/css">
textarea {
	resize: none;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<!--PARA LOS ALERTS-->
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">

function regresar(){
location.href="../MVC_Controlador/AdminC.php?acc=versubmenu"; 
}

function guardar(){	  
 	  
	 
	  if(document.getElementById("Nombre").value==0){		   
	  jAlert('Falta Nombre del Menu', 'Mensaje del Sistema');
	  return 0;
	  }  
	  
	  
	  if(document.getElementById("URL").value==0){		   
	  jAlert('Falta Nombre del Sub-menu', 'Mensaje del Sistema');
	  return 0;
	  }
	 
jConfirm("¿Seguro de Grabar el 	Sub-menu?", "Mensaje Confirmacion", function(r) {
		if(r) {
			//document.form1.submit();
			document.getElementById("form1").submit();
		} else {
			return 0;
		}
	  }); 	  
}
</script>




</head>


<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="../MVC_Controlador/AdminC.php?acc=guardasubmenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $_GET['id'];?>" >
<table border="0" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0" width="600">
  <tr>
    <td height="45" colspan="4" align="center"><strong>Registro de Sub-Menu</strong></td>
  </tr>
  <tr>
    <td width="69" height="40">Nombre</td>
    <td width="186"> <input type="text" name="Nombre" id="Nombre" class="texto" value=""/></td>
    <td width="65">Icono</td>
    <td width="270"> <!--<input type="text" name="Icono" id="Icono" class="texto" value=""/>-->
    <input name="userfile" id="userfile" type="file"></td>
    </tr>
  <tr>
    
    <td height="45"> Padre</td>
    <td><input type="text" name="IdPadre" id="IdPadre" class="texto" value="<?php echo $_GET['id']; ?>" readonly="readonly"/> 
    
    
    </td>
    <td >URL</td>
    <td><input type="text" name="URL" id="URL" class="texto" value="../MVC_Controlador/AdminC.php?acc=vermenu" size="45" /></td>
    </tr>
  
 
  <tr>
    <td colspan="2" align="center" height="45"><button type="button"  name="guarda" onclick="guardar()"> Guardar  </button>
		 &nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td colspan="2" align="center" height="45"><input type="button" name="volver" id="volver" onclick="history.back()" value="VOLVER"   /></td>
   

  </tr>
</table>
</form>
</body>
</html>