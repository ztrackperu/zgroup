<?php
	
		/*if($obtenerNombresMenu !=0){
	 foreach ($obtenerNombresMenu as $item2){ 
     $IdMenusel=$item2["IdMenu"];
     $NombreMenusel=$item2["Nombre"];	 
   
	}}else{
		echo "Seleccione un Rol";
	}*/
	
	
?>











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
location.href="../MVC_Controlador/AdminC.php?acc=verrol"; 
}

function guardar(){	 	  
	 
	  
	  if(document.getElementById("IdRol").value==0){		   
	  jAlert('Seleccione un Rol', 'Mensaje del Sistema');
	  return 0;
	  }
	  if(document.getElementById("idmenu2").value==""  ){		   
	  jAlert('Seleccione un Menu Valido', 'Mensaje del Sistema');
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




function validar(){
	
	
	
	
document.getElementById('idmenu2').value=document.form1.IdMenu.options[document.form1.IdMenu.selectedIndex].value;	 	 
idmenu1=document.getElementById("idmenu2").value;
	
	<?php
	
		if($obtenerNombresMenu !=0){
	 foreach ($obtenerNombresMenu as $item2){ 
     $IdMenusel=$item2["IdMenu"];
     $NombreMenusel=$item2["Nombre"];   
	
	
	
?>	 	  
	 
	 
	  
	  idmenu2=<?php echo  $IdMenusel; ?>	  
	  
	  
	  if( idmenu1==idmenu2){		   
	  jAlert('Menu ya asignado', 'Mensaje del Sistema');
	 document.getElementById("idmenu2").value="";	  
	  
	  }	 
 
	
<?php  
}}else{
		echo "Seleccione un Rol";
	}
	
	
?>	




}





</script>






</head>


<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=guardarmenurol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" >







<table border="0" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" colspan="2" align="center"><strong>Asignar Menu </strong></td>
  </tr>
  
  <tr>
    <td height="40">Rol</td>
    <td height="40">
    

   
    <input name="IdRol" id="IdRol" value="<?php echo $IdRol; ?>" type="hidden" readonly="readonly" />
    <?php
	
		if($Nombre !=0){
	 foreach ($Nombre as $itemr){ ?>
     <input name="Nombre" id="Nombre" value="<?php echo strtoupper($itemr["Nombre"]); ?>" type="text" readonly="readonly" />
    <?php 
	}}else{
		echo "Seleccione un Rol";
	}
	
	
	 ?>
  
    </td>
    
     
    
    
  </tr>
  
  <tr>
    <td width="62" height="40">Menu</td>
    <td width="171"> 
      <?php $ven = listarMenuC();	  
	   ?>
      <select name="IdMenu" id="IdMenu" class="Combos texto" onchange="validar()"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo  $item["IdMenu"]?>"><?php  echo $item["IdMenu"]." ". $item["Nombre"] ?></option>
        <?php }	?>
        </select>
      
      <input type="hidden" name="idmenu2" id="idmenu2"  value="M"   />
    </td>
    
    
    
    
    </tr>
    
  
  
  <tr>
    <td colspan="2" align="center" height="40">
       <button type="button"  name="guarda" onclick="guardar()"> Guardar  </button>
        <input type="button" name="volver" id="volver" onclick="history.back()" value="VOLVER"   />
        
    </td>
   

  </tr>
</table>


</form>
</body>
</html>