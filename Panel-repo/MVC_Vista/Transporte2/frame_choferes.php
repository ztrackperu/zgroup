<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
</head>
<script language="javascript">

function pon_prefijo(emp,pref,nombre,dato,dato2) {
	parent.opener.document.formElem.empresa.value=emp;
	parent.opener.document.formElem.brevete.value=pref;
	parent.opener.document.formElem.chofer.value=nombre;
	parent.opener.document.formElem.marca.value=dato;
	parent.opener.document.formElem.placa.value=dato2;
	//parent.opener.document.formElem.lugar.value=dato2;
	parent.opener.document.formElem.sw.focus();
	//document.getElementById("chofer").focus();
	parent.window.close();
}

</script>
<?php include("dbconex.php"); ?>
<body>
<?php
$descripcion=$_POST["txtbuscarcliente"];

$where="1=1";


if ($descripcion<>"") { $where.=" AND c_ructra like '%$descripcion%' or c_nontra like '%$descripcion%'"; }
//if ($descripcion1<>"") { $where.=" AND CC_NRUC='%$descripcion1%'"; }
	$sql="SELECT *  FROM transportista WHERE  ".$where." and c_estado='1' ";
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table style="font-size:12px" width="100%" cellspacing=1 cellpadding=3 border=1>
		  <tr>
			<td width="8%" bgcolor="#CCCCCC"><div align="center"><b>Brevete</b></div></td>
			<td width="55%" align="center" bgcolor="#CCCCCC"><p><strong>Empresa</strong></p></td>
			<td width="55%" bgcolor="#CCCCCC"><div align="center"><b>Chofer</b></div></td>
			<td width="14%" bgcolor="#CCCCCC"><strong>Marca</strong></td>
			<td width="13%" bgcolor="#CCCCCC"><strong>Placa</strong></td>
			<td width="10%" bgcolor="#CCCCCC"><strong>Select</strong>			  <div align="center"></td>
		  </tr>
		<?php
			//for ($i = 0; $i < $nrs; $i++) {
				while (odbc_fetch_row ($rs_tabla)) {
				$codcliente=odbc_result($rs_tabla,"c_brevete");
				$nombre=odbc_result($rs_tabla,"c_chofer");
				$nif=odbc_result($rs_tabla,"c_marca");
				$dir=odbc_result($rs_tabla,"c_placa");
				$nom=odbc_result($rs_tabla,"c_nontra");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td bgcolor="#99CCCC">
        <div align="center"><?php echo $codcliente;?></div></td>
					<td bgcolor="#9999FF"><?php echo $nom;?></td>
					<td bgcolor="#9999FF">
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td bgcolor="#00CC00"><?php echo utf8_encode($nif);?></td>
					<td bgcolor="#FFCC33"><?php echo utf8_encode($dir);?></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $nom?>','<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
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
