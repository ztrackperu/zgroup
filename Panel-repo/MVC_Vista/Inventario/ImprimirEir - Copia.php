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
$c_condicion=$item['c_condicion'];
$c_tipois=$item['c_tipois'];
$c_tipo=$item['c_tipo'];
$c_tipo2=$item['c_tipo2'];
$c_tipo3=$item['c_tipo3'];
$c_obs=$item['c_obs'];
$c_combu=$item['c_combu'];
$c_usuario=$_GET['udni'];
$c_precinto=$item['c_precinto'];
$c_almacen=$item['c_almacen'];
		
$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];$codmar=$item['codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
		
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
 /* background-color:#345485; */
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
<li><a href="#nogo" onclick="window.print();"><b>Imprimir</b></a></li>
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
      <td width="165" rowspan="2">Entrada 
        <input type="checkbox" name="checkbox" id="checkbox">
        <label for="checkbox">Salida
          <input type="checkbox" name="checkbox2" id="checkbox2">
        </label></td>
      <td width="300" align="center">&nbsp;Número de Equipo</td>
      <td width="157"><input type="checkbox" name="checkbox3" id="checkbox3">
        <label for="checkbox3"></label>
        Vacio 
        <input type="checkbox" name="checkbox4" id="checkbox4">
        <label for="checkbox4"></label>
        Lleno</td>
    </tr>
    <tr>
      <td align="center"><?php echo $c_nserie; ?></td>
      <td><input type="checkbox" name="checkbox5" id="checkbox5">
        FCL 
          <input type="checkbox" name="checkbox6" id="checkbox6">
        <label for="checkbox6">LCL</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox7" id="checkbox7">
        <label for="checkbox7">Descarga</label></td>
      <td rowspan="2">&nbsp;</td>
      <td>Para Genset Cant.</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="checkbox8" id="checkbox8">
        <label for="checkbox8">Embarque</label></td>
      <td> Combustible <?php echo $c_combu.' '; ?> Gln</td>
    </tr>
    <tr>
      <td colspan="3"><hr></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Descripcion del Equipo</td>
      </tr>
    <tr>
      <td><input type="checkbox" name="checkbox9" id="checkbox9">
        <label for="checkbox9">Acero 
          <input type="checkbox" name="checkbox10" id="checkbox10">
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
          <td colspan="2" rowspan="2">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="2" align="center"><img src="../images/3.jpg" width="139" height="75"></td>
        </tr>
        </table></td>
      </tr>
    <tr>
      <td>Limpio Clean 
        <input type="checkbox" name="checkbox11" id="checkbox11">
        <label for="checkbox11"></label></td>
      <td colspan="2" rowspan="2"><table width="467" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="134">Buenas Condiciones</td>
          <td width="31" rowspan="2" align="center"><input type="checkbox" name="checkbox13" id="checkbox13">
            <label for="checkbox13"></label></td>
          <td width="181">Dañado Necesita Reparacion</td>
          <td width="26" rowspan="2" align="center"><input type="checkbox" name="checkbox14" id="checkbox14">
            <label for="checkbox14"></label></td>
          <td width="54" rowspan="2">OTROS</td>
          <td width="41" rowspan="2"><input type="checkbox" name="checkbox15" id="checkbox15">
            <label for="checkbox15"></label></td>
        </tr>
        <tr>
          <td>Good Condition</td>
          <td>DAMAGED</td>
          </tr>
      </table></td>
      </tr>
    <tr>
      <td>Sucio Dirty...   
        <input type="checkbox" name="checkbox12" id="checkbox12">
        <label for="checkbox12"></label></td>
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
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="6"><hr></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>NºCamion</td>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Fecha y Hora</td>
          <td colspan="3">&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>Chofer</td>
          <td width="135">&nbsp;</td>
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
</form>
<!--  -->
</div>
</body>
</html>
  