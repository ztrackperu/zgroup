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



<!--PARA LOS ALERTS-->
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>



<style type="text/css">
textarea {
	resize: none;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">


<script type="text/javascript">

function regresar(){
location.href="../MVC_Controlador/AdminC.php?acc=veracceso"; 
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
		
  
function guardar(){	  
 	  
	 
	  if(document.getElementById("local").value==0){		   
	  jAlert('Falta Local', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("pc").value==0){		   
	  jAlert('Falta PC', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("usuario").value==0){		   
	  jAlert('Falta Usuario', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("ippublica").value==0){		   
	  jAlert('Falta IP Publica', 'Mensaje del Sistema');
	  return 0;
	  }
	   if(document.getElementById("iplocal").value==0){		   
	  jAlert('Falta IP Local', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("mac").value==0){		   
	  jAlert('Falta MAC ', 'Mensaje del Sistema');
	  return 0;
	  }	  
	  
	  jConfirm("¿Seguro de Actualizar el Acceso?", "Mensaje Confirmacion", function(r) {
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=guardarupdateacceso&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $_GET['id'];?>" >

<?php foreach ($resultado as $item){ ?>


<table border="1" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="7" align="center"><strong>Actualizar  Acceso</strong></td>
  </tr>
  <tr>
    <td width="" height="40">Local</td>
    <td width=""> <input type="text" name="local" id="local" class="texto" value="<?php echo $item['local'];?>"  required="required"/></td>
    <td width="">PC</td>
    <td width=""><input type="text" name="pc" id="pc" class="texto" value="<?php echo $item['nombrepc'];?>" required="required" /></td>
    <td width="">Usuario</td>
    <td><input type="text" name="usuario" id="usuario" class="texto" value="<?php echo $item['usuario'];?>" required="required"/></td>
    </tr>
  <tr>
    <td height="40">IP Publica</td>
    <td><input type="text" name="ippublica" id="ippublica" class="texto" value="<?php echo $item['ippublica'];?>" required="required"/></td>
    <td>IP Local</td>
    <td><input type="text" name="iplocal" id="iplocal" class="texto" value="<?php echo $item['iplocal'];?>" required="required"/></td>
    <td>MAC</td>
    <td><input type="text" name="mac" id="mac" class="texto" value="<?php echo $item['mac'];?>" required="required"/></td>
  </tr>
  <tr>
    <td colspan="6" align="center">
      <button type="button"  name="guarda" onclick="guardar()"> Guardar  </button>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" name="volver" id="volver" onclick="regresar()" value="VOLVER"   />  
      </td>
    
    
    
  </tr>
</table>
<?php } ?>

</form>
</body>
</html>