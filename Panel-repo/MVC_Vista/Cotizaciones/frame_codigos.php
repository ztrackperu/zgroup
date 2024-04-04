<?php include("dbconex.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>
<script language="javascript">

function pon_prefijo(pref,nombre,dato,dato2,valor,xsw,equipo) {
	var val=valor;
	var unidad='unidad'+valor;
	if(xsw=='1'){
	parent.opener.document.getElementById('unidad'+val).value=dato;
	parent.opener.document.getElementById('codigoequipo'+val).value=pref;
	parent.opener.document.getElementById('cod_des'+val).value=equipo;
	parent.opener.document.getElementById('c_desequipo'+val).value=nombre;
	}else{
	parent.opener.document.getElementById('codcont'+val).value=dato;
	parent.opener.document.getElementById('codequipo'+val).value=pref;
	parent.opener.document.getElementById('cod_des'+val).value=equipo;
	parent.opener.document.getElementById('c_desequipo'+val).value=nombre;
		}
	//
	parent.window.close();
}

</script>

<body class="control">
<?php
//and c_codsit='D'  and in_codi='$codprod' and c_codsitu='D'
$descripcion=$_POST["txtbuscarcliente"];
$codprod=$_POST['codprod'];
$sw=$_POST['sw'];
$where="1=1";
$xsw=$_POST['xsw'];
$val=$_REQUEST['hiddenField'];
$res=$_POST['res'];

if($res=='1'){ $rese='1';}else{$rese='0';}

if ($descripcion<>"") { $where.=" and invequipo.c_nserie like '%$descripcion%' "; }
 if($sw=='0'){ 
	$sql="select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv,c_codsitalm,c_refnaci,id_equipo_asignado from 
			((invequipo
			 INNER JOIN invmae ON INVMAE.IN_CODI=INVEQUIPO.C_CODPRD)
			LEFT JOIN INVEQUIPO_ASIGNADOS ON INVEQUIPO_ASIGNADOS.ID_EQUIPO=INVEQUIPO.C_IDEQUIPO) where ".$where." and c_codsit<>'T'";
}else{
$sql="select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv,c_codsitalm,c_refnaci,id_equipo_asignado from 
			((invequipo
			 INNER JOIN invmae ON INVMAE.IN_CODI=INVEQUIPO.C_CODPRD)
			LEFT JOIN INVEQUIPO_ASIGNADOS ON INVEQUIPO_ASIGNADOS.ID_EQUIPO=INVEQUIPO.C_IDEQUIPO) where ".$where." and c_codsit<>'T'";	
	} 
	//echo $sql;
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>Leyenda: A=Alquilado | D=Disponible 
		<table  width="98%"  class="tablaImprimir" cellpadding="0" cellspacing="0" >
		  <tr>
			<td width="7%" bgcolor="#999999"><div align="center"><b>Codigo</b></div></td>
			<td width="40%" bgcolor="#999999"><div align="center"><b>Descripcion</b></div></td>
			<td width="12%" bgcolor="#999999">Reservado?</td>
			<td width="21%" bgcolor="#999999"><div align="center"><b>Serie</b></div></td>
			<td width="21%" bgcolor="#999999"><div align="center"><b>Maquina Asignada</b></div></td>
			<td width="9%" align="center" bgcolor="#999999"><strong>EstadoX</strong></td>
			<td width="11%" bgcolor="#999999"><div align="center"></td>
		  </tr>
		<?php
			//for ($i = 0; $i < $nrs; $i++) {
				while (odbc_fetch_row ($rs_tabla)) {
				$codcliente=odbc_result($rs_tabla,"c_idequipo");
				$nombre=odbc_result($rs_tabla,"in_arti");
				$nif=odbc_result($rs_tabla,"c_nserie");
				$dir=odbc_result($rs_tabla,"c_codsit");
				$Reserva=odbc_result($rs_tabla,"c_estaresv");
				$maquina=odbc_result($rs_tabla,"id_equipo_asignado");
				$equipo=odbc_result($rs_tabla,"c_codprd");
                                $i="";
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $codcliente;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><?php echo $Reserva;?></td>
					<td><div align="center"><?php echo $nif;?></div></td>
					<td align="center"><?php echo rtrim($dir);?></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>','<?php echo $val ?>','<?php echo $xsw ?>','<?php echo $equipo ?>')">
					<?php 
					
					if(rtrim($dir)=='D' || rtrim($dir)=='A' || rtrim($dir)=='C' || rtrim($dir)=='V' && $Reserva!=1 ){?><img src="../images/icon_accept.png" border="0" title="Seleccionar" height="20" width="20"></a><?php }?></div></td>					
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
