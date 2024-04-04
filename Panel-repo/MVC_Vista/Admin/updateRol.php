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


<script type="text/javascript">


</script>





</head>


<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=guardarupdatemenurolM&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $_GET['id'];?>" >


				<?php
					foreach($resultado as $item){
				?>


<table border="0" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" colspan="2" align="center"><strong>Actualizar Rol</strong></td>
  </tr>
  <tr>
    <td height="40">Rol</td>
    <td height="40">
     
     <?php $ven = listarRolC();
	 $idrol=$item[1];
	 
	  ?>
      <select name="IdRol" id="IdRol" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item3){?>
        <option value="<?php echo $item3["IdRol"]?>"<?php if($item3["IdRol"]==$idrol){?>selected<?php }?>><?php echo $item3["Nombre"] ?></option>
        <?php }	?>
      </select>
     
     
     
     </td>
  </tr>
  <tr>
    <td width="62" height="40">Menu</td>
    <td width="171"> 
      <?php 
	  $idmenu=$item[2];
	  $ven = listarMenuC();
	  
	   ?>
      <select name="IdMenu" id="IdMenu" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item2){?>
        <option value="<?php echo  $item2["IdMenu"]?>" <?php if( $item2["IdMenu"]==$idmenu){  ?> selected <?php } ?> ><?php  echo  $item2["Nombre"] ?></option>
        <?php }	?>
        </select>
      
      
    </td>
    </tr>
  <tr>
    <td colspan="2" align="center" height="40">
        <input type="submit" name="button" id="button" value="GUARDAR"   />
        <input type="button" name="volver" id="volver" onclick="history.back()" value="VOLVER"   />
        
    </td>
   

  </tr>
</table>
<?php
					}
				?>

</form>
</body>
</html>