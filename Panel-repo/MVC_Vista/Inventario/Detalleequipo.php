<?php 
foreach($resul as $item){
	
	//c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo
	$c_idequipo=$item['c_idequipo'];//clave maestro
	$c_codprd=$item['c_codprd'];
	$c_nserie=$item['c_nserie'];
	$d_fecing=$item['d_fecing'];
	$c_codmar=$item['c_codmar'];
	$c_codmod=$item['c_codmod'];
	$c_codcol=$item['c_codcol'];
	$c_anno=$item['c_anno'];
	$c_control=$item['c_control'];
	$c_mcamaq=$item['c_mcamaq'];
	$pr_razo=$item['pr_razo'];
	$d_fecing=$item['d_fecing'];
	$d_fcrea=$item['d_fcrea'];
	$c_nronis=$item['c_nronis'];
	$c_codest=$item['c_codest'];
	$cod_prov=$item['c_codanx'];
	}


  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detalle Equipo</title>
<style type="text/css">
body {
	background-color: #FFF;
	margin-top: 0px;
}
</style>
</head>

<body>
<table width="832" height="127" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="184" height="23" align="right" bgcolor="#FFFFCC">Equipo</td>
    <td width="13" align="center">:</td>
    <td width="635"><?php echo $c_nserie?>&nbsp;-<?php echo $des?></td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Fecha Ingreso Almacen</td>
    <td align="center">:</td>
    <td><label for="textfield5"></label>
    <input name="textfield5" type="text" id="textfield5" value="<?php echo substr($d_fecing,0,10); ?>" readonly="readonly"/>
    Fecha Registro en Sistema
    <label for="textfield6"></label>
    <input name="textfield6" type="text" id="textfield6" value="<?php echo $d_fcrea ?>" readonly="readonly" />
    Nota Ingreso:<?php echo $c_nronis; ?></td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Proveedor</td>
    <td align="center">:</td>
    <td><?php $promae = ListaProveedorIC();?>
      
          <select name="estado" id="estado">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($promae as $item){?>
           
     <option value="<?php echo $item["pr_ruc"]?>"<?php if($item["pr_ruc"]==$cod_prov){?>selected<?php }?>><?php echo $item["pr_razo"]?></option>
            <?php }	?>
          </select></td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Estado Equipo</td>
    <td align="center">:</td>
    <td><?php $estado = EquipoestadoC();?>
      
          <select name="estado" id="estado">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($estado as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select></td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Marca Maquina Reefer</td>
    <td align="center">:</td>
    <td><?php $marca = listamarcaXC();?>
      
          <select name="marca" id="marca">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($marca as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Modelo</td>
    <td align="center">:</td>
    <td><?php $modelo = listamodeloC();?>
      
          <select name="modelo" id="modelo">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($modelo as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmod){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
  </tr>
  <tr>
    <td height="23" align="right" bgcolor="#FFFFCC">Color</td>
    <td align="center">:</td>
    <td><?php $color = listacolorC();?>
      
          <select name="color" id="color">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($color as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codcol){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Año</td>
    <td align="center">:</td>
    <td><label for="textfield"></label>
    <input type="text" name="textfield" id="textfield" value="<?php echo $c_anno ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Marca Cajar</td>
    <td align="center">:</td>
    <td><?php $maqui = listamquinaC();?>
      
          <select name="maqui" id="maqui">
          
          
            <?php foreach($maqui as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_mcamaql){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Modelo Controlador</td>
    <td align="center">:</td>
    <td><label for="textfield2"></label>
    <input type="text" name="textfield2" id="textfield2" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Tara</td>
    <td align="center">:</td>
    <td><label for="textfield3"></label>
    <input type="text" name="textfield3" id="textfield3" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Peso Maximo</td>
    <td align="center">:</td>
    <td><label for="textfield4"></label>
    <input type="text" name="textfield4" id="textfield4" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Voltaje Requerido</td>
    <td align="center">:</td>
    <td><label for="textfield8"></label>
    <input type="text" name="textfield8" id="textfield8" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Pais Procedencia</td>
    <td align="center">:</td>
    <td><label for="select"></label>
      <select name="select" id="select">
    </select></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Nacionalizado</td>
    <td align="center">:</td>
    <td>Si
      <input type="radio" name="radio2" id="radio" value="1" /> 
      No
      <input type="radio" name="radio2" id="radio2" value="0" />
      <label for="radio2">Referencia</label>
      <label for="textfield7"></label>
      <input type="text" name="textfield7" id="textfield7" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><strong style="color:#F00">Nota:Todos los campos son importantes y obligatorios</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="button" name="button" id="button" value="Actualizar Informacion" /></td>
  </tr>
</table>
</body>
</html>