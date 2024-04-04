<?php 
if($resultado != NULL){
	foreach ($resultado as $item) {
$c_tipoio=$item['c_tipoio']; 
$c_codcli=$item['c_codcli'];
$c_nomcli=$item['c_nomcli'];
$c_nomcli2=$item['c_nomcli2'];
$c_nomtec=$item['c_nomtec'];
$c_fecdoc=$item['c_fecdoc'];
$c_placa1=$item['c_placa1'];
$c_placa2=$item['c_placa2'];
$c_chofer=$item['c_chofer'];
$c_fechora=$item['c_fechora'];
$c_condicion=$item['condi'];
$c_tipois=$item['c_tipois'];
$c_tipo=$item['c_tipo'];
$c_tipo2=$item['c_tipo2'];
$c_tipo3=$item['c_tipo3'];
$c_obs=$item['c_obs'];
$c_combu=$item['c_combu'];
$c_usuario=$_GET['udni'];
$c_precinto=$item['c_precinto'];
$c_almacen=$item['c_almacen'];
	$c_material=$item['c_material'];	
$c_numeir=$item['c_numeir'];
$observacion=utf8_decode(strtoupper($item['c_obseir']));
$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
$codmar=$item['c_codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
$procedencia=$item['c_procedencia'];
$c_fabcaja=$item['c_fabcaja'];
$tipoclase=$item['tipoclase'];


	}
}
$ven = listamaterialC();
            
                 foreach($ven as $item){
					 if($item["tm_codi"]==$c_material){
						 $mate=$item["tm_desc"];
						 }
                }	
$mar=ListaMarcaCajaC();
                 foreach($mar as $itemx){
					 if($itemx["c_numitm"]==$codmar){
						 $marcacaja=$itemx["c_desitm"];
					 }
                }	
$col=listacolorC();

foreach($col as $itemz){
					 if($itemz["c_numitm"]==$c_codcol){
						 $color = $itemz["c_desitm"];
					 }
                }	
$mq = ListaMarcaMaqC();

foreach($mq as $itemz){
					 if($itemz["c_numitm"]==$c_mcamaq){
						 $maquinas = $itemz["c_desitm"];
					 }
                }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title></title>
<!--<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--<link rel="stylesheet" type="text/css" href="../css/imprimir.css">-->
 
<style type="text/css" media="print">
.nover {display:none}
</style>
<style>
body {
 /* background-color:#345485;*/
}
h1 {
  color:orange;
  font-family:'Times New Roman';
  text-align:center;
}
p {
  color:#E9EBAB;
  font-family:Arial,Helvetica,sans-serif;
  font-size:8px;
  text-align:center;
}
</style>

</head>
<body class="control">
<li><a href="#nogo" onclick="window.print();"><b><?php echo 'EIR NRO: '.$c_numeir ?></b></a></li>
<!--<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="cajaC.php?acc=Rep1&amp;ter=<?php echo $ter ?>&amp;tur=<?php echo $tur?>&amp;udni=<?php echo $cajero ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>

</ul>-->

<div class="cuerpo1"> 
<form id="frmImpresion" name="formElem" method="post" >
  <table width="622" border="0" cellspacing="0" cellpadding="0" style="font-size:9px">
    <tr>
      <td width="165" rowspan="2"><input type="checkbox" name="checkbox" id="checkbox" <?php if($c_tipoio=='1'){?> checked=checked <?php }?> disabled=disabled >
        Entrada 
        
        <label for="checkbox">
          <input type="checkbox" name="checkbox2" id="checkbox2" <?php if($c_tipoio=='2'){?> checked=checked <?php }?> disabled=disabled >
        Salida      </label></td>
      <td width="300" rowspan="2" align="center"><img src="../images/imgeir.png" width="115" height="29"></td>
      <td width="157"><input type="checkbox" name="checkbox3" id="checkbox3" <?php if($c_condicion=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox3"></label>
        Vacio 
        <input type="checkbox" name="checkbox4" id="checkbox4" <?php if($c_condicion=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox4"></label>
        Lleno</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox5" id="checkbox5" <?php if($c_condicion=='3'){?> checked=checked <?php }?> disabled=disabled>
        FCL 
        <input type="checkbox" name="checkbox6" id="checkbox6" <?php if($c_condicion=='4'){?> checked=checked <?php }?> disabled=disabled> 
        <label for="checkbox6">LCL</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox7" id="checkbox7" <?php if($c_tipo=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox7">Descarga</label></td>
      <td align="center">&nbsp;Número de Equipo</td>
      <td>Para Genset Cant.</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox8" id="checkbox8"<?php if($c_tipo=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox8">Embarque 
          <input type="checkbox" name="checkbox31" id="checkbox31" <?php if($c_tipo=='3'){?> checked=checked <?php }?> disabled=disabled>
        Otro</label></td>
      <td align="center"><?php echo $c_nserie; ?></td>
      <td> Combustible <?php echo $c_combu.' '; ?> Gln</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Descripcion del Equipo</td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox9" id="checkbox9" <?php if($c_material=='02'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox9">Acero 
          <input type="checkbox" name="checkbox10" id="checkbox10" <?php if($c_material=='01'){?> checked=checked <?php }?> disabled=disabled>
        Aluminio</label></td>
      <td colspan="2" align="center"><?php echo $c_codprd; ?>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Observaciones </td>
      </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="239" colspan="2" align="center"><table width="100" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              <td><?php if($tipoclase!='003'){?><img src="../images/1.jpg" width="148" height="95"><?php }else {?><img src="../images/clipon.jpg" width="148" height="95"><?php }?></td>
              <td><?php if($tipoclase!='003'){?><img src="../images/2.jpg" width="78" height="91"><?php }else{?><img src="../images/blanco.jpg" width="78" height="91"><?php }?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2" align="center"><?php if($tipoclase!='003'){?><img src="../images/3.jpg" width="139" height="75"><?php }else{?><img src="../images/underland.jpg" width="139" height="75"><?php }?></td>
              </tr>
            </table></td>
          <td width="53" valign="top">&nbsp;</td>
          <td width="328" colspan="2" valign="top">
            <?php if($c_nserie!=NULL){echo 'Serial...........................'.$c_nserie.'<br>';}?>
            <?php if($c_fabcaja!=""){echo 'Fabricante...................'.$c_fabcaja.'<br>';}?>
            <?php if($procedencia!=""){echo 'Procedencia.................'.$procedencia.'<br>';}?>
            <?php if($marcacaja!=""){echo 'Marca..........................'.$marcacaja.'<br>';}?>
            <?php if($color!=""){echo 'Color............................'.$color.'<br>';}?>
            <?php if($c_anno!=""){echo 'Año Fabricacion..........'.$c_anno.'<br>';}?>
            <?php if($mate!="" ){echo 'Tipo Material...............'.$mate.'<br>';}?>
            <?php if($c_peso!=""){echo 'Peso.............................'.$c_peso.'<br>';}?>
            <?php if($c_tara!=""){echo 'Tara.............................'.$c_tara.'<br>';}?>
            
            <!--para la maquina reffer Fab. Maquina-->         
            <?php if($maquinas!=""){echo 'Marca Maq..................'.$maquinas.'<br>';}?>
            <?php if($c_cfabri!=""){echo 'Fabricante Maq...........'.strtoupper($c_cfabri).'<br>';}?>
            <?php if($c_canofab!=""){echo 'Año Fab. Maq.............'.$c_cmesfab.'/'.$c_canofab.'<br>';}?>
            <?php if($c_cmodel!=""){echo 'Modelo........................'.strtoupper($c_cmodel).'<br>';}?>
            <?php if($c_ccontrola!=""){echo 'Controlador.................'.strtoupper($c_ccontrola).'<br>';}?>
            <?php if($c_tipgas!=""){echo 'Tipo Gas Ref...............'.$c_tipgas.'<br>';}?>
            <!--para la carreta-->
            <?php if($c_tamCarreta!=""){echo 'Tamaño........................'.$c_tamCarreta.'<br>';}?>
            <?php if($c_nroejes!=""){echo 'Nro Ejes.......................'.$c_tara.'<br>';}?>
            <?php if($c_vin!=""){echo 'Nro Vin........................'.$c_vin.'<br>';}?>
            <!--para la Generador-->
            <?php if($c_seriemotor!=""){echo 'Serie Motor..................'.$c_seriemotor.'<br>';}?>
            <br>
            <?php echo 'Nota: '.$observacion; ?>
          </td>
        </tr>
        </table></td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox11" id="checkbox11" <?php if($c_tipo2=='1'){?> checked=checked <?php }?> disabled=disabled>
        Limpio Clean 
        
        <label for="checkbox11">
          <input type="checkbox" name="checkbox12" id="checkbox12"  <?php if($c_tipo2=='2'){?> checked=checked <?php }?> disabled=disabled>
        Sucio Dirty      </label></td>
      <td colspan="2"><table width="467" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><input type="checkbox" name="checkbox13" id="checkbox13" <?php if($c_tipo3=='1'){?> checked=checked <?php }?> disabled=disabled>
            Buenas Condiciones / Good Condition
            <label for="checkbox13"></label></td>
          <td><input type="checkbox" name="checkbox14" id="checkbox14"<?php if($c_tipo3=='2'){?> checked=checked <?php }?> disabled=disabled>
            Dañado Necesita Reparacion / DAMAGED
            <label for="checkbox14"></label></td>
          <td><input type="checkbox" name="checkbox15" id="checkbox15"<?php if($c_tipo3=='3'){?> checked=checked <?php }?> disabled=disabled>
            Otros
            <label for="checkbox15"></label></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="57" rowspan="3" align="center" valign="middle">Recibe<br>/Entrega</td>
          <td width="210">Nombre: <?php echo strtoupper($c_nomtec); ?></td>
          <td width="88">Nº <br>Autorizacion</td>
          <td colspan="3" align="center">Entregado Al Representante del Cliente</td>
          </tr>
        <tr>
          <td rowspan="2">Firma:_________________</td>
          <td rowspan="2">&nbsp;</td>
          <td colspan="3" align="center"><?php echo strtoupper($c_nomcli) ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><?php echo strtoupper($c_nomcli2) ?></td>
          </tr>
        <tr>
          <td colspan="6"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>NºCamion</td>
          <td colspan="3"><?php echo strtoupper($c_placa1).' '.strtoupper($c_placa2) ?>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Fecha y Hora</td>
          <td colspan="3"><?php echo $c_fechora ?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Chofer</td>
          <td width="135"><?php echo strtoupper($c_chofer) ?>&nbsp;</td>
          <td width="42" align="right">Firma:</td>
          <td width="88">_________________</td>
          </tr>
      </table></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  ----------------------------------------------------------------------------------------------------------------------
  <li><a href="#nogo" onclick="window.print();"><b><?php echo 'EIR NRO: '.$c_numeir ?></b></a></li>
  <table width="622" border="0" cellspacing="0" cellpadding="0" style="font-size:9px">
    <tr>
      <td width="165" rowspan="2"><input type="checkbox" name="checkbox" id="checkbox" <?php if($c_tipoio=='1'){?> checked=checked <?php }?> disabled=disabled >
        Entrada 
        
        <label for="checkbox">
          <input type="checkbox" name="checkbox2" id="checkbox2" <?php if($c_tipoio=='2'){?> checked=checked <?php }?> disabled=disabled >
        Salida      </label></td>
      <td width="300" rowspan="2" align="center"><img src="../images/imgeir.png" alt="" width="115" height="29">&nbsp;</td>
      <td width="157"><input type="checkbox" name="checkbox3" id="checkbox3" <?php if($c_condicion=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox3"></label>
        Vacio 
        <input type="checkbox" name="checkbox4" id="checkbox4" <?php if($c_condicion=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox4"></label>
        Lleno</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox5" id="checkbox5" <?php if($c_condicion=='3'){?> checked=checked <?php }?> disabled=disabled>
        FCL 
        <input type="checkbox" name="checkbox6" id="checkbox6" <?php if($c_condicion=='4'){?> checked=checked <?php }?> disabled=disabled> 
        <label for="checkbox6">LCL</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox7" id="checkbox7" <?php if($c_tipo=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox7">Descarga</label></td>
      <td align="center">Número de Equipo</td>
      <td>Para Genset Cant.</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox8" id="checkbox8"<?php if($c_tipo=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox8">Embarque 
          <input type="checkbox" name="checkbox31" id="checkbox31" <?php if($c_tipo=='3'){?> checked=checked <?php }?> disabled=disabled>
        Otro</label></td>
      <td align="center"><?php echo $c_nserie; ?></td>
      <td> Combustible <?php echo $c_combu.' '; ?> Gln</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Descripcion del Equipo</td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox9" id="checkbox9" <?php if($c_material=='02'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox9">Acero 
          <input type="checkbox" name="checkbox10" id="checkbox10" <?php if($c_material=='01'){?> checked=checked <?php }?> disabled=disabled>
        Aluminio</label></td>
      <td colspan="2" align="center"><?php echo $c_codprd; ?>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Observaciones </td>
      </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0" >
        <tr>
          <td width="292" valign="top"><table width="100" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              <td><?php if($tipoclase!='003'){?><img src="../images/1.jpg" width="148" height="95"><?php }else {?><img src="../images/clipon.jpg" width="148" height="95"><?php }?></td>
              <td><?php if($tipoclase!='003'){?><img src="../images/2.jpg" width="78" height="91"><?php }else{?><img src="../images/blanco.jpg" width="78" height="91"><?php }?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="2" align="center"><?php if($tipoclase!='003'){?><img src="../images/3.jpg" width="139" height="75"><?php }else{?><img src="../images/underland.jpg" width="139" height="75"><?php }?></td>
              </tr>
            </table>&nbsp;</td>
          <td width="328" colspan="2" valign="top">
		    <?php if($c_nserie!=NULL){echo 'Serial...........................'.$c_nserie.'<br>';}?>
            <?php if($c_fabcaja!=""){echo 'Fabricante...................'.$c_fabcaja.'<br>';}?>
            <?php if($procedencia!=""){echo 'Procedencia.................'.$procedencia.'<br>';}?>
            <?php if($marcacaja!=""){echo 'Marca..........................'.$marcacaja.'<br>';}?>
            <?php if($color!=""){echo 'Color............................'.$color.'<br>';}?>
            <?php if($c_anno!=""){echo 'Año Fabricacion..........'.$c_anno.'<br>';}?>
            <?php if($mate!="" ){echo 'Tipo Material...............'.$mate.'<br>';}?>
            <?php if($c_peso!=""){echo 'Peso.............................'.$c_peso.'<br>';}?>
            <?php if($c_tara!=""){echo 'Tara.............................'.$c_tara.'<br>';}?>
            
           <!--para la maquina reffer Fab. Maquina-->         
           <?php if($maquinas!=""){echo 'Marca Maq..................'.$maquinas.'<br>';}?>
           <?php if($c_cfabri!=""){echo 'Fabricante Maq...........'.strtoupper($c_cfabri).'<br>';}?>
           <?php if($c_canofab!=""){echo 'Año Fab. Maq.............'.$c_cmesfab.'/'.$c_canofab.'<br>';}?>
           <?php if($c_cmodel!=""){echo 'Modelo........................'.strtoupper($c_cmodel).'<br>';}?>
           <?php if($c_ccontrola!=""){echo 'Controlador.................'.strtoupper($c_ccontrola).'<br>';}?>
           <?php if($c_tipgas!=""){echo 'Tipo Gas Ref...............'.$c_tipgas.'<br>';}?>
           <!--para la carreta-->
           <?php if($c_tamCarreta!=""){echo 'Tamaño........................'.$c_tamCarreta.'<br>';}?>
           <?php if($c_nroejes!=""){echo 'Nro Ejes.......................'.$c_tara.'<br>';}?>
           <?php if($c_vin!=""){echo 'Nro Vin........................'.$c_vin.'<br>';}?>
           <!--para la Generador-->
           <?php if($c_seriemotor!=""){echo 'Serie Motor..................'.$c_seriemotor.'<br>';}?>
            
            <br>
            <?php echo 'Nota: '.$observacion; ?>
            </td>
          </tr>
        </table></td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox11" id="checkbox11" <?php if($c_tipo2=='1'){?> checked=checked <?php }?> disabled=disabled>
        Limpio Clean 
        
        <label for="checkbox11">
          <input type="checkbox" name="checkbox12" id="checkbox12"  <?php if($c_tipo2=='2'){?> checked=checked <?php }?> disabled=disabled>
        Sucio Dirty      </label></td>
      <td colspan="2"><table width="467" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><input type="checkbox" name="checkbox13" id="checkbox13" <?php if($c_tipo3=='1'){?> checked=checked <?php }?> disabled=disabled>
            Buenas Condiciones / Good Condition
            <label for="checkbox13"></label></td>
          <td><input type="checkbox" name="checkbox14" id="checkbox14"<?php if($c_tipo3=='2'){?> checked=checked <?php }?> disabled=disabled>
            Dañado Necesita Reparacion / DAMAGED
            <label for="checkbox14"></label></td>
          <td><input type="checkbox" name="checkbox15" id="checkbox15"<?php if($c_tipo3=='3'){?> checked=checked <?php }?> disabled=disabled>
            Otros
            <label for="checkbox15"></label></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="57" rowspan="3" align="center" valign="middle">Recibe<br>/Entrega</td>
          <td width="210">Nombre: <?php echo strtoupper($c_nomtec); ?></td>
          <td width="88">Nº <br>Autorizacion</td>
          <td colspan="3" align="center">Entregado Al Representante del Cliente</td>
          </tr>
        <tr>
          <td rowspan="2">Firma:_________________</td>
          <td rowspan="2">&nbsp;</td>
          <td colspan="3" align="center"><?php echo strtoupper($c_nomcli) ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><?php echo strtoupper($c_nomcli2) ?></td>
          </tr>
        <tr>
          <td colspan="6"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>NºCamion</td>
          <td colspan="3"><?php echo strtoupper($c_placa1).' '.strtoupper($c_placa2) ?>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Fecha y Hora</td>
          <td colspan="3"><?php echo $c_fechora ?></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Chofer</td>
          <td width="135"><?php echo strtoupper($c_chofer) ?>&nbsp;</td>
          <td width="42" align="right">Firma:</td>
          <td width="88">_________________</td>
          </tr>
      </table></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
</html>
  