<?php 
if($resul!=NULL){
	
	foreach($resul as $item){
		
		$ruc=$item['CC_NRUC'];
		$razon=$item['CC_RAZO'];
		$razon2=$item['CC_NCOM'];
		$dir1=$item['CC_DIR1'];
		$dir2=$item['CC_DIR2'];
		$tel=$item['CC_TELE'];
		$correo=strtoupper($item['CC_EMAI']);
		$contacto=$item['CC_RESP'];
		$distrito=$item['CC_CDIS'];
		$tipdoc=$item['CC_TDOC'];
		$tipper=$item['CC_TCLI'];
				
		$materno=$item['CC_AMAT'];
		$paterno=$item['CC_APAT'];
		$nombre1=$item['CC_NOMB'];
		$nombre2=$item['CC_NOMB2'];
		}
	
	}


  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualiza Cliente</title>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=actualizarcli&udni=<?php echo $_GET['udni']; ?>">
<table width="773" border="1" align="left">
  <tr>
    <td colspan="4" align="center"><strong>Actualizar Datos Principales Clientes.</strong></td>
    </tr>
  <tr>
    <td width="129">Tipo Persona</td>
    <td width="148"><?php $tipo=ListaTipPersonaC();?>
      <select name="tipoper" id="tipoper" class="Combos texto" >
        <?php foreach($tipo as $item){?>
        
        
          <option value="<?php echo $item["c_camitm"]?>"<?php if($item["c_camitm"]==$tipper){?>selected<?php }?>><?php echo $item["c_desitm"]?>
        
       </option>
        <?php }	?>
      </select>
   </td>
    <td width="133">&nbsp;</td>
    <td width="335"></td>
  </tr>
  <tr>
    <td>Tipo Dcto</td>
    <td>
      <?php $dcto=lista_tipodocuC();?>
      <select name="select2" id="select2" class="Combos texto">
        <?php foreach($dcto as $item){?>
        
        
          <option value="<?php echo $item["c_coddoc"]?>"<?php if($item["c_coddoc"]==$tipdoc){?>selected<?php }?>><?php echo $item["c_desdoc"]?>
        
       </option>
        <?php }	?>
      </select></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td>DNI</td>
    <td colspan="3"><input name="txtruc" type="text" class="texto" id="txtruc" value="<?php echo $ruc;?>" />
    </td>
  </tr>
  <tr>
    <td>Primer Nombre</td>
    <td colspan="3"><input name="textfield3" type="text" class="texto" id="textfield3" size="25" value="<?php echo $nombre1;?>" />
      Segundo Nombre 
        <label for="nombre2"></label>
      <input name="nombre2" type="text" id="nombre2" size="25" value="<?php echo $nombre2 ?>" /></td>
  </tr>
  <tr>
    <td>Apellido Parterno</td>
    <td colspan="3"><input name="textfield4" type="text" class="texto" id="textfield4" size="25" value="<?php echo $paterno; ?>" />
    Apellido Materno
      <label for="materno"></label>
      <input name="materno" type="text" id="materno" size="25" value="<?php echo $materno ?>" /></td>
  </tr>
  <tr>
    <td>Direccion 1</td>
    <td colspan="3"><input name="textfield5" type="text" id="textfield5" class="texto" size="70" value="<?php echo  $dir1; ?>" /></td>
  </tr>
  <tr>
    <td>Direccion 2</td>
    <td colspan="3"><input name="textfield6" type="text" id="textfield6" class="texto" size="70" value="<?php echo $dir2 ?>"/></td>
  </tr>
  <tr>
    <td>Telf:</td>
    <td><input type="text" name="textfield7" id="textfield7" class="texto" value="<?php echo $tel; ?>" /></td>
    <td colspan="2">Email
      <input name="textfield8" type="text" id="textfield8" class="texto" value="<?php echo $correo ?>" size="40"/></td>
    </tr>
  <tr>
    <td>Contacto</td>
    <td><input type="text" name="textfield9" id="textfield9" class="texto" value="<?php echo $contacto ?>" /></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td>Distrito</td>
    <td>
    
      <?php $dist=lista_distritoC();?>
      <select name="select6" id="select6">
        <?php foreach($dist as $item){?>
            <option value="<?php echo $item["dl_codi"]?>"<?php if($item["dl_codi"]==$distrito){?>selected<?php }?>><?php echo $item["dl_desc"]?>
       </option>
        <?php }	?>
      </select>
    </td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Actualizar" />      <input type="submit" name="Cerrar" id="Cerrar" value="Cerrar" /></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>