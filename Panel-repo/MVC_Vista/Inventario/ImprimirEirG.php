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

$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
$codmar=$item['c_codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
$procedencia=$item['c_procedencia'];
		
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
      <td width="300" align="center">&nbsp;Número de Equipo</td>
      <td width="157"><input type="checkbox" name="checkbox3" id="checkbox3" <?php if($c_condicion=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox3"></label>
        Vacio 
        <input type="checkbox" name="checkbox4" id="checkbox4" <?php if($c_condicion=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox4"></label>
        Lleno</td>
    </tr>
    <tr>
      <td align="center"><?php echo $c_nserie; ?></td>
      <td><input type="checkbox" name="checkbox5" id="checkbox5" <?php if($c_condicion=='3'){?> checked=checked <?php }?> disabled=disabled>
        FCL 
          <input type="checkbox" name="checkbox6" id="checkbox6" <?php if($c_condicion=='4'){?> checked=checked <?php }?> disabled=disabled> 
        <label for="checkbox6">LCL</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox7" id="checkbox7" <?php if($c_tipo=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox7">Descarga</label></td>
      <td rowspan="2">&nbsp;</td>
      <td>Para Genset Cant.</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox8" id="checkbox8"<?php if($c_tipo=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox8">Embarque 
          <input type="checkbox" name="checkbox31" id="checkbox31" <?php if($c_tipo=='3'){?> checked=checked <?php }?> disabled=disabled>
        Otro</label></td>
      <td> Combustible <?php echo $c_combu.' '; ?> Gln</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Descripcion del Equipo</td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox9" id="checkbox9" <?php if($c_material=='01'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox9">Acero 
          <input type="checkbox" name="checkbox10" id="checkbox10" <?php if($c_material=='02'){?> checked=checked <?php }?> disabled=disabled>
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
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="160"><img src="../images/1.jpg" width="148" height="95"></td>
          <td width="79"><img src="../images/2.jpg" width="78" height="91"></td>
          <td width="53" rowspan="2" valign="top">&nbsp;</td>
          <td width="328" colspan="2" rowspan="2" valign="top">
		    <?php if($c_nserie!=NULL){echo 'Serial...........................'.$c_nserie.'<br>';}?>
            <?php if($c_tara!=""){echo 'Fabricante...................'.$c_tara.'<br>';}?>
            <?php if($procedencia!=""){echo 'Procedencia.................'.$procedencia.'<br>';}?>
            <?php if($codmar!=""){echo 'Marca..........................'.$codmar.'<br>';}?>
            <?php if($c_codcol!=""){echo 'Color............................'.$c_codcol.'<br>';}?>
            <?php if($c_anno!=""){echo 'Año Fabricacion..........'.$c_anno.'<br>';}?>
            <?php if($c_material!=""){echo 'Tipo Material...............'.$c_material.'<br>';}?>
            <?php if($c_peso!=""){echo 'Peso.............................'.$c_peso.'<br>';}?>
            <?php if($c_tara!=""){echo 'Tara.............................'.$c_tara.'<br>';}?>
            
           <!--para la maquina reffer Fab. Maquina-->         
           <?php if($c_mcamaq!=""){echo 'Marca Maq..................'.$c_mcamaq.'<br>';}?>
           <?php if($c_cfabri!=""){echo 'Fabricante Maq...........'.$c_cfabri.'<br>';}?>
           <?php if($c_canofab!=""){echo 'Año Fab. Maq.............'.$c_cmesfab.'/'.$c_canofab.'<br>';}?>
           <?php if($c_cmodel!=""){echo 'Modelo........................'.$c_cmodel.'<br>';}?>
           <?php if($c_ccontrola!=""){echo 'Controlador.................'.$c_ccontrola.'<br>';}?>
           <?php if($c_tipgas!=""){echo 'Tipo Gas Ref...............'.$c_tipgas.'<br>';}?>
           <!--para la carreta-->
           <?php if($c_tamCarreta!=""){echo 'Tamaño........................'.$c_tamCarreta.'<br>';}?>
           <?php if($c_nroejes!=""){echo 'Nro Ejes.......................'.$c_tara.'<br>';}?>
           <?php if($c_vin!=""){echo 'Nro Vin........................'.$c_vin.'<br>';}?>
           <!--para la Generador-->
           <?php if($c_seriemotor!=""){echo 'Serie Motor..................'.$c_seriemotor.'<br>';}?>
            
            
            </td>
          </tr>
        <tr>
          <td colspan="2" align="center"><img src="../images/3.jpg" width="139" height="75"></td>
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
          <td width="210">Nombre: <?php echo $c_nomtec; ?></td>
          <td width="88">Nº <br>Autorizacion</td>
          <td colspan="3" align="center">Entregado Al Representante del Cliente</td>
          </tr>
        <tr>
          <td rowspan="2">Firma:</td>
          <td rowspan="2">&nbsp;</td>
          <td colspan="3" align="center"><?php echo $c_nomcli ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><?php echo $c_nomcli2 ?></td>
          </tr>
        <tr>
          <td colspan="6"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>NºCamion</td>
          <td colspan="3"><?php echo $c_placa1.' '.$c_placa2 ?>&nbsp;</td>
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
          <td width="135"><?php echo $c_chofer ?>&nbsp;</td>
          <td width="42">Firma</td>
          <td width="88">&nbsp;</td>
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
      <td width="165" rowspan="2"><input type="checkbox" name="checkbox20" id="checkbox16" <?php if($c_tipoio=='1'){?> checked=checked <?php }?> disabled=disabled>
        Entrada 
        
        <label for="checkbox">
          <input type="checkbox" name="checkbox17" id="checkbox17" <?php if($c_tipoio=='0'){?> checked=checked <?php }?> disabled=disabled >
        Salida      </label></td>
      <td width="300" align="center">&nbsp;Número de Equipo</td>
      <td width="157"><input type="checkbox" name="checkbox16" id="checkbox18"<?php if($c_condicion=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox18"></label>
        Vacio
        <input type="checkbox" name="checkbox16" id="checkbox19" <?php if($c_condicion=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox19"></label>
        Lleno</td>
    </tr>
    <tr>
      <td align="center"><?php echo $c_nserie; ?></td>
      <td><input type="checkbox" name="checkbox16" id="checkbox20" <?php if($c_condicion=='3'){?> checked=checked <?php }?> disabled=disabled>
        FCL
        <input type="checkbox" name="checkbox16" id="checkbox21" <?php if($c_condicion=='4'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox21">LCL</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox16" id="checkbox22" <?php if($c_tipo=='1'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox22">Descarga</label></td>
      <td rowspan="2">&nbsp;</td>
      <td>Para Genset Cant.</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox16" id="checkbox23" <?php if($c_tipo=='2'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox23">Embarque 
          <input type="checkbox" name="checkbox32" id="checkbox32" <?php if($c_tipo=='3'){?> checked=checked <?php }?> disabled=disabled>
        Otro</label></td>
      <td> Combustible <?php echo $c_combu.' '; ?> Gln</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3" align="center">Descripcion del Equipo</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox16" id="checkbox24" <?php if($c_material=='01'){?> checked=checked <?php }?> disabled=disabled>
        <label for="checkbox24">Acero
          <input type="checkbox" name="checkbox16" id="checkbox25" <?php if($c_material=='02'){?> checked=checked <?php }?> disabled=disabled>
          Aluminio</label></td>
      <td colspan="2"><?php echo $c_codprd; ?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3" align="center">Observaciones </td>
    </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="160"><img src="../images/1.jpg" alt="1" width="148" height="95"></td>
          <td width="79"><img src="../images/2.jpg" alt="2" width="78" height="91"></td>
          <td width="51" rowspan="2" valign="top"></td>
          <td width="330" colspan="2" rowspan="2" valign="top">
    <?php if($c_nserie!=NULL){echo 'Serial...........................'.$c_nserie.'<br>';}?>
            <?php if($c_tara!=""){echo 'Fabricante...................'.$c_tara.'<br>';}?>
            <?php if($procedencia!=""){echo 'Procedencia.................'.$procedencia.'<br>';}?>
            <?php if($codmar!=""){echo 'Marca..........................'.$codmar.'<br>';}?>
            <?php if($c_codcol!=""){echo 'Color............................'.$c_codcol.'<br>';}?>
            <?php if($c_anno!=""){echo 'Año Fabricacion..........'.$c_anno.'<br>';}?>
            <?php if($c_material!=""){echo 'Tipo Material...............'.$c_material.'<br>';}?>
            <?php if($c_peso!=""){echo 'Peso.............................'.$c_peso.'<br>';}?>
            <?php if($c_tara!=""){echo 'Tara.............................'.$c_tara.'<br>';}?>
            
           <!--para la maquina reffer Fab. Maquina-->         
           <?php if($c_mcamaq!=""){echo 'Marca Maq..................'.$c_mcamaq.'<br>';}?>
           <?php if($c_cfabri!=""){echo 'Fabricante Maq...........'.$c_cfabri.'<br>';}?>
           <?php if($c_canofab!=""){echo 'Año Fab. Maq.............'.$c_cmesfab.'/'.$c_canofab.'<br>';}?>
           <?php if($c_cmodel!=""){echo 'Modelo........................'.$c_cmodel.'<br>';}?>
           <?php if($c_ccontrola!=""){echo 'Controlador.................'.$c_ccontrola.'<br>';}?>
           <?php if($c_tipgas!=""){echo 'Tipo Gas Ref...............'.$c_tipgas.'<br>';}?>
           <!--para la carreta-->
           <?php if($c_tamCarreta!=""){echo 'Tamaño........................'.$c_tamCarreta.'<br>';}?>
           <?php if($c_nroejes!=""){echo 'Nro Ejes.......................'.$c_tara.'<br>';}?>
           <?php if($c_vin!=""){echo 'Nro Vin........................'.$c_vin.'<br>';}?>
           <!--para la Generador-->
           <?php if($c_seriemotor!=""){echo 'Serie Motor..................'.$c_seriemotor.'<br>';}?>
            
          
          
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"><img src="../images/3.jpg" alt="3" width="139" height="75"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox23" id="checkbox26"  <?php if($c_tipo2=='1'){?> checked=checked <?php }?> disabled=disabled>
        Limpio Clean
        
        <label for="checkbox26">
          <input type="checkbox" name="checkbox18" id="checkbox30"  <?php if($c_tipo2=='2'){?> checked=checked <?php }?> disabled=disabled>
        Sucio Dirty      </label></td>
      <td colspan="2"><table width="467" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><input type="checkbox" name="checkbox21" id="checkbox27"  <?php if($c_tipo3=='1'){?> checked=checked <?php }?> disabled=disabled>
            Buenas Condiciones / Good Condition
            <label for="checkbox27"></label></td>
          <td><input type="checkbox" name="checkbox22" id="checkbox28" <?php if($c_tipo3=='2'){?> checked=checked <?php }?> disabled=disabled>
            Dañado Necesita Reparacion / DAMAGED
            <label for="checkbox28"></label></td>
          <td><input type="checkbox" name="checkbox19" id="checkbox29" <?php if($c_tipo3=='3'){?> checked=checked <?php }?> disabled=disabled>
            Otros
            <label for="checkbox29"></label></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
    </tr>
    <tr>
      <td colspan="3"><table width="620" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="57" rowspan="3" align="center" valign="middle">Recibe<br>
            /Entrega</td>
          <td width="210">Nombre: <?php echo $c_nomtec; ?></td>
          <td width="88">Nº <br>
            Autorizacion</td>
          <td colspan="3" align="center">Entregado Al Representante del Cliente</td>
        </tr>
        <tr>
          <td rowspan="2">Firma:</td>
          <td rowspan="2">&nbsp;</td>
          <td colspan="3" align="center"><?php echo $c_nomcli ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><?php echo $c_nomcli2 ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="6"><hr></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>NºCamion</td>
          <td colspan="3"><?php echo $c_placa1.' '.$c_placa2 ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Fecha y Hora</td>
          <td colspan="3"><?php echo $c_fechora ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Chofer</td>
          <td width="135"><?php echo $c_chofer ?>&nbsp;</td>
          <td width="42">Firma</td>
          <td width="88">&nbsp;</td>
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
  