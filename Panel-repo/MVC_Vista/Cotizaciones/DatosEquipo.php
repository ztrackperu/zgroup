<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="796" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" align="left"><input type="text" name="c_tipoio" id="c_tipoio"  value="<?php echo $tiping; ?>"/>
                  ()</td>
              </tr>
              <tr>
                <td width="124">Descripcion</td>
                <td colspan="3"><input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $des ?>" size="35" />
                  <input type="text" name="c_idequipo" id="c_idequipo"  value="<?php echo $idequipo ?>" class="texto" />
                  <?php $estado = EquipoestadoM();?>
                  <select name="estado" id="estado">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($estado as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest){?>selected  <?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
              </tr>
              <tr>
                <td>Serie</td>
                <td width="268"><input name="c_nserie" type="text" class="texto" id="c_nserie" value="<?php echo $idequipo ?>" size="20" /></td>
                <td>&nbsp;Estado Situacion Almacen</td>
                <td><?php if($_GET['udni']=='41696274' || $_GET['udni']=='43377015') {?>
                  &nbsp;
                  <?php $ven = ListaestadoequipoM();?>
                  <select name="estaequi" id="estaequi" class="Combos texto" >
                    <?php foreach($ven as $item){?>
                    <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select>
                  <?php } ?>
                  &nbsp;</td>
              </tr>
              <tr></tr>
              <tr>
                <td colspan="2" bgcolor="#CCCCCC"><strong>DATOS DE EQUIPO</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Año Fabricacion</td>
                <td><?php $ven = listaannoM();?>
                  <select name="c_anno" id="c_anno" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"<?php if($item["tm_codi"]==$c_anno){?>selected<?php }?>><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td width="185"><input type="text" name="udni" id="udni" value="<?php echo $_GET['udni'] ?>" />&nbsp;</td>
                <td width="219">&nbsp;</td>
              </tr>
              <tr>
                <td>Mes Fabricacion</td>
                <td><?php $ven = listamesM();?>
                  <select name="mfab1" id="mfab1" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><p>Marca </p></td>
                <td><?php $ven = ListaMarcaCajaM();?>
                  <select name="codmar" id="codmar"  class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Fabricante</td>
                <td><label for="c_fabcaja"></label>
                  <input type="text" name="c_fabcaja" id="c_fabcaja" class="texto" value="<?php echo $c_fabcaja ?>"  /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Color</td>
                <td><?php $color = listacolorM();?>
                  <select name="c_codcol" id="c_codcol" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($color as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codcol){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Tipo Material</td>
                <td><?php $ven = listamaterialM();?>
                  <select name="material" id="material" class="combo texto">
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Procedencia</td>
                <td><input type="text" name="c_procedencia" id="c_procedencia" class="texto" value="<?php echo $c_procedencia ?>"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <?php if($codtipo=='003'){?>
              <tr>
                <td>Serie Motor</td>
                <td><input type="text" name="c_seriemotor" id="c_seriemotor" class="texto" value="<?php echo $c_seriemotor ?>" required="required" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Serie Equipo</td>
                <td><input type="text" name="c_serieequipo" id="c_serieequipo" class="texto" value="<?php echo $c_serieequipo ?>" required="required"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <? } ?>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#CCCCCC"><strong>DATOS PESO:</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Tara</td>
                <td><input type="text" name="c_tara" id="c_tara" class="texto" value="<?php echo $c_tara ?>"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Peso Maximo</td>
                <td><input type="text" name="c_peso" id="c_peso"  class="texto" value="<?php echo $c_peso ?>"/></td>
                <td>&nbsp;</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" align="center"></td>
              </tr>
            </table>
</body>
</html>