<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">

</head>
<script language="javascript">

function pon_prefijo(pref,nombre,dato,dato2,sw) {
	
	if(sw=='1'){
	parent.opener.document.formElem.textfield7.value=pref;
	parent.opener.document.formElem.textfield3.value=nombre;
	parent.opener.document.formElem.hiddenField4.value=dato;
		parent.window.close();
		
		}else{
	parent.opener.document.formElem.hc.value=pref;
	parent.opener.document.formElem.razon.value=nombre;
	parent.opener.document.formElem.rucdni.value=dato;
	parent.opener.document.formElem.direc.value=dato2;
	parent.opener.document.formElem.lugar.value=dato2;
	parent.window.close();
	}
}

</script>
<?php include("dbconex.php"); ?>
<body class="control">
<?php
$descripcion=$_POST["txtbuscarcliente"];
$xsw=$_POST['sw'];
$where="1=1";


if ($descripcion<>"") { $where.=" AND CC_RAZO like '$descripcion%' OR CC_NRUC like '$descripcion%' OR CC_RUC like '$descripcion%'"; }
//if ($descripcion1<>"") { $where.=" AND CC_NRUC='%$descripcion1%'"; }
	$sql="SELECT CC_RUC as CC_COD ,CC_RAZO,CC_NRUC,CC_DIR1  FROM CLIMAE WHERE ".$where." and CC_ESTA='1'";
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
		  <tr>
			<td width="14%"><div align="center"><b>Codigo</b></div></td>
			<td width="56%"><div align="center"><b>Cliente</b></div></td>
			<td width="20%"><div align="center"><b>DNI/RUC</b></div></td>
			<td width="10%"><div align="center"></td>
		  </tr>
		<?php
			//for ($i = 0; $i < $nrs; $i++) {
				while (odbc_fetch_row ($rs_tabla)) {
				$codcliente=odbc_result($rs_tabla,"CC_COD");
				$nombre=odbc_result($rs_tabla,"CC_RAZO");
				$nif=odbc_result($rs_tabla,"CC_NRUC");
				$dir=odbc_result($rs_tabla,"CC_DIR1");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td>
        <?php echo $codcliente;?></td>
					<td>
      <?php echo utf8_encode($nombre);?></td>
					<td align="left"><?php echo $nif;?></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>','<?php echo $xsw ?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
		?>
  </table>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">
</form>
</div>
</div>
</body>
</html>
