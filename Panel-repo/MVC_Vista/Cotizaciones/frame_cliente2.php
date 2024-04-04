<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(pref,nombre,dato,dato2) {

}

</script>
<?php include("dbconex.php"); ?>
<body>
<?php
$descripcion=$_POST["txtbuscarcliente"];

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
			<td width="10%"><div align="center"><b>Codigo</b></div></td>
			<td width="60%"><div align="center"><b>Cliente</b></div></td>
			<td width="20%"><div align="center"><b>DNI/RUC</b></div></td>
			<td width="10%"><div align="center">
		    <strong>Editar</strong></td>
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
        <div align="center"><?php echo $codcliente;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><div align="center"><?php echo $nif;?></div></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>')"><img src="../images/icon_edit.png" border="0" title="Seleccionar"></a></div></td>					
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
