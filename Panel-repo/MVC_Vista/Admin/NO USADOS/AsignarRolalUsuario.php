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
location.href="../MVC_Controlador/AdminC.php?acc=verusuario"; 
}

function guardar(){	 	  
	 
	  
	  if(document.getElementById("IdRol").value==0){		   
	  jAlert('Seleccione un Rol', 'Mensaje del Sistema');
	  return 0;
	  }
	 if(document.getElementById("IdMenu").value==0){		   
	  jAlert('Seleccione un Menu', 'Mensaje del Sistema');
	  return 0;
	  }
jConfirm("¿Seguro de Asignar el Rol?", "Mensaje Confirmacion", function(r) {
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=guardarmenurol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" >

<?php foreach($resulos as $item){?>





<table border="0" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" colspan="2" align="center"><strong>Asignacion permisos de ver el menu al Rol </strong></td>
  </tr>
  <tr>
    <td height="40">Rol</td>
    <td height="40">
    <input name="IdRol" id="IdRol" value="<?php echo $item['IdRol']; ?>" type="hidden" readonly="readonly" />   
    <input name="Rol" id="Rol" value="<?php echo $item['Nombre']; ?>" type="text" readonly="readonly" />
    
    </td>
  </tr>
  <tr>
    <td width="62" height="40">Menu</td>
    <td width="171"> 
      <?php $ven = listarMenuC(); ?>
      <select name="IdMenu" id="IdMenu" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo  $item["IdMenu"]?>"><?php  echo $item["IdPadre"]." ". $item["Nombre"] ?></option>
        <?php }	?>
        </select>
      
      
    </td>
    </tr>
  <tr>
    <td colspan="2" align="center" height="40">
       <button type="button"  name="guarda" onclick="guardar()"> Guardar  </button>
        <input type="button" name="volver" id="volver" onclick="history.back()" value="VOLVER"   />
        
    </td>
   

  </tr>
</table>

<?php } ?>
</form>
</body>
</html>