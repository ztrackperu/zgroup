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
location.href="../MVC_Controlador/AdminC.php?acc=verusuario"; 
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
 	  
	 
	  if(document.getElementById("dni").value==0){		   
	  jAlert('Falta DNI', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("usuario").value==0){		   
	  jAlert('Falta Usuario', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("clave").value==0){		   
	  jAlert('Falta Clave', 'Mensaje del Sistema');
	  return 0;
	  }
	   if(document.getElementById("IdRol").value==0){		   
	  jAlert('Seleccione un rol', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("paterno").value==0){		   
	  jAlert('Falta Apellido Paterno ', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("materno").value==0){		   
	  jAlert('Falta Apellido Materno', 'Mensaje del Sistema');
	  return 0;
	  }
	   if(document.getElementById("nombres").value==0){		   
	  jAlert('Falta Nombre', 'Mensaje del Sistema');
	  return 0;
	  }
	  
	  jConfirm("¿Seguro de Grabar el Usuario?", "Mensaje Confirmacion", function(r) {
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=guardarusuario&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" >
<table border="1" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="9" align="center"><strong>Registro de Usuarios</strong></td>
  </tr>
  <tr>
    <td width="">DNI</td>
    <td width=""> <input type="text" name="dni" id="dni" class="texto" value="" onkeypress="return ValidaEntero(event)" required="required"/></td>
    <td width="">Usuario</td>
    <td width=""><input type="text" name="usuario" id="usuario" class="texto" value="" required="required" /></td>
    <td width="">Clave</td>
    <td><input type="text" name="clave" id="clave" class="texto" value="" required="required"/></td>
    <td>Rol</td>
    <td> 
      <?php $ven = listarRolC(); ?>
      <select name="IdRol" id="IdRol" class="Combos texto"   >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["IdRol"]?>"><?php echo $item["Nombre"] ?></option>
        <?php }	?>
        </select>
      
      
      </td>
   
    
  </tr>
  <tr>
    <td>Ape. Paterno</td>
    <td><input type="text" name="paterno" id="paterno" class="texto" value="" required="required"/></td>
    <td>Ape. Materno</td>
    <td><input type="text" name="materno" id="materno" class="texto" value="" required="required"/></td>
     <td>Nombres</td>
    <td><input type="text" name="nombres" id="nombres" class="texto" value="" required="required"/></td>
    <td>Servicio</td>
    <td><input type="text" name="servicio" id="servicio" class="texto" value=""/></td>
  </tr>
  <tr>
    
    <td>Login</td>
    <td><input type="text" name="login" id="login" class="texto" value=""/>  </td>
    
     <td width="">Clave 2</td>
    <td><input type="text" name="clave2" id="clave2" class="texto" value=""/></td>
    <td>Clave 3</td>
    <td><input type="text" name="clave3" id="clave3" class="texto" value=""/></td>
    
    <td colspan="2">&nbsp;    </td>
  </tr>
  
  <tr>
    <td colspan="8" align="center">
		<button type="button"  name="guarda" onclick="guardar()"> Guardar  </button>
		 &nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="volver" id="volver" onclick="regresar()" value="VOLVER"   />  
    </td>
    
    
    
  </tr>
</table>
</form>
</body>
</html>