<?php 
foreach($resul as $item){
	
	//c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo
	$c_idequipo=$item['c_idequipo'];//clave maestro
	$c_codprd=$item['c_codprd'];
	$c_nserie=$item['c_nserie'];
	$d_fecing=$item['d_fecing'];
	$c_codmar=$item['c_codmar'];
	$c_mcamaq=$item['c_mcamaq'];
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
	$c_nacional=$item['c_nacional'];
	$c_refnaci=$item['c_refnaci'];
	$c_serieequipo=$item['c_serieequipo'];
	$c_ccontrola=$item['c_ccontrola'];
	$c_compresormaq=$item['c_compresormaq'];
	$c_codest=$item['c_codsitalm'];
	$c_tara=$item['c_tara'];
		$c_peso=$item['c_peso'];
	}


  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body {
	background-color: #FFF;
	margin-top: 0px;
}
</style>
<script>

function cambia(){//jquery-1.4.2.min.js
	document.getElementById('estado').value=document.form1.estaequi.options[document.form1.estaequi.selectedIndex].value;
	//document.getElementById("c_codmod").disabled = true; cod_concepto
	
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=actudatainveqalm&udni=<?php echo ($_GET['udni'])?>">
<table width="832" height="127" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="184" height="23" align="right" bgcolor="#FFFFCC">Equipo</td>
    <td width="13" align="center">:</td>
    <td width="635"><?php echo $c_nserie?>&nbsp;<?php echo $des?>
      <input type="text" name="hiddenField" id="hiddenField" value="<?php echo $c_idequipo ?>" /></td>
  </tr>
  <tr>
    <?php /*?><td height="23" align="right" bgcolor="#FFFFCC">Fecha Ingreso Almacen</td>
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
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest){?>selected  <?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>
  </td>
  </tr>
  <tr>
  <td height="23" align="right" bgcolor="#FFFFCC">Marca Maquina Reefer</td>
  <td align="center">:</td>
  <td><?php $marca = listamarcaXC();?>
      
          <select name="marca" id="marca">
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($marca as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_mcamaq){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
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
          </select>
          &nbsp;Año Caja 
          <label for="acaja"></label>
          <input name="acaja" type="text" id="acaja" size="8" />
        Procedencia
        <label for="proc"></label>
        <input type="text" name="proc" id="proc" /> 
        Fabricante
        <label for="textfield8"></label>
        <input type="text" name="textfield8" id="textfield8" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Modelo Controlador</td>
    <td align="center">:</td>
    <td><label for="textfield2"></label>
    <input type="text" name="textfield2" id="textfield2" value="<?php echo $c_ccontrola ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Tara</td>
    <td align="center">:</td>
    <td><label for="textfield3"></label>
    <input type="text" name="textfield3" id="textfield3" value="<?php echo $c_tara ?>"/>
    KG</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Peso Maximo</td>
    <td align="center">:</td>
    <td><label for="textfield4"></label>
    <input type="text" name="textfield4" id="textfield4" value="<?php echo $c_peso ?>" />
    KG</td>
  </tr>
  <tr>
    <!--<td align="right" bgcolor="#FFFFCC">Pais Procedencia</td>
    <td align="center">:</td>
    <td><label for="select"></label>
      <select name="select" id="select">
    </select></td>-->
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Serie Maq Reefer</td>
    <td align="center">:</td>
    <td><label for="c_serieequipo"></label>
      <input type="text" name="c_serieequipo" id="c_serieequipo" value="<?php echo $c_serieequipo ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Compresor Maq Reefer</td>
    <td align="center">:</td>
    <td><label for="c_compresormaq"></label>
      <input type="text" name="c_compresormaq" id="c_compresormaq" value="<?php echo $c_compresormaq ?>" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Tamano Carreta</td>
    <td align="center">:</td>
    <td><?php $ven = TamanoCarretaM();?>
            <select name="c_tamCarreta" id="c_tamCarreta">
              <option value="0">.::SELECCIONE::.</option>
              <?php foreach($ven as $item){?>
              <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
              <?php }	?>
      </select>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Vin</td>
    <td align="center">:</td>
    <td><label for="c_vin"></label>
      <input type="text" name="c_vin" id="c_vin" /></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Nro Ejes</td>
    <td align="center">&nbsp;</td>
    <td><?php $ven = EjesCarretaM();?>
            <select name="c_nroejes" id="c_nroejes">
              <?php foreach($ven as $item){?>
              <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
              <?php }	?>
      </select>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFCC">Nacionalizado</td>
    <td align="center">:</td>
    <td>Si
      <input type="radio" name="radio2" id="radio2" value="1" <?php if($c_nacional=='1'){ ?> checked="checked" <?php }?> /> 
      No
      <input type="radio" name="radio2" id="radio2" value="0" <?php if($c_nacional=='0'){ ?> checked="checked" <?php }?> />
      <label for="radio2">Referencia</label>
      <label for="textfield7"></label>
      <input type="text" name="textfield7" id="textfield7"  value="<?php echo $c_refnaci ?>"/></td><?php */?>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="text" name="udni" id="udni" value="<?php echo $_GET['udni']; ?>" />
      <input type="text" name="hiddenField2" id="hiddenField2" value="<?php echo $_GET['est']; ?>" />
      <input name="estado" type="text" id="estado"  /></td>
  </tr>
  <tr>
    <td align="right">Estado Almacen</td>
    <td>:</td>
    <td><?php if($_GET['udni']=='41696274' || $_GET['udni']=='43377015' || $_GET['udni']=='41753251')  {?>&nbsp;
    
      <?php $ven = ListaestadoequipoC();?>
        <select name="estaequi" id="estaequi" class="Combos texto" onchange="cambia();">
        <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select>
      <?php } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><strong style="color:#F00">Nota:Todos los campos son importantes y obligatorios</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Actualizar Informacion" /></td>
  </tr>
</table>

</form>
</body>
</html>