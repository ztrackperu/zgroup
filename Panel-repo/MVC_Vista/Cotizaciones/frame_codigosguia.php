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

function pon_prefijo(pref,nombre,dato,dato2,valor,xsw,maquina,equipo) {
	var val=valor;
	var unidad='unidad'+valor;
	//xws ya viene 1 por defecto 
	if(xsw=='1'){
/*
	parent.opener.document.getElementById('unidad'+val).value=dato;
	parent.opener.document.getElementById('codigoequipo'+val).value=pref;
	parent.opener.document.getElementById('codigomaquina'+val).value=maquina;
	parent.opener.document.getElementById('cod_des'+val).value=equipo;
	parent.opener.document.getElementById('c_desequipo'+val).value=nombre;
*/

	parent.opener.document.getElementById('unidad'+val).value="campo unidad";
	parent.opener.document.getElementById('codigoequipo'+val).value="campo codigoequipo";
	parent.opener.document.getElementById('codigomaquina'+val).value="campo codigomaquina";
	parent.opener.document.getElementById('cod_des'+val).value="campo cod_des";
	parent.opener.document.getElementById('c_desequipo'+val).value="campo c_desequipo";

	}else{
	parent.opener.document.getElementById('codcont'+val).value=dato;
	parent.opener.document.getElementById('codequipo'+val).value=pref;
	parent.opener.document.getElementById('codigomaquina'+val).value=maquina;
	parent.opener.document.getElementById('cod_des'+val).value=equipo;
	parent.opener.document.getElementById('c_desequipo'+val).value=nombre; 
		}
	parent.window.close();
}

</script>
<?php include("dbconex.php"); ?>
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

// $xsw es 1 desde el inicio de froma estatica cuando se crea una OT
// $sw es 1 desde el inicio de froma estatica cuando se crea una OT
if($res=='1'){ $rese='1';}else{$rese='0';}
// se activa cuando se pone un texto en el input de busqueda 
if ($descripcion<>"") { $where.=" and c_nserie like '%$descripcion%' "; }
if($sw=='0'){
	$sql="select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv,c_codsitalm,c_refnaci,id_equipo_asignado from 
			((invequipo
			 INNER JOIN invmae ON INVMAE.IN_CODI=INVEQUIPO.C_CODPRD)
			LEFT JOIN INVEQUIPO_ASIGNADOS ON INVEQUIPO_ASIGNADOS.ID_EQUIPO=INVEQUIPO.C_IDEQUIPO) where ".$where." and c_codsit<>'T'";
}else{
$sql="select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv,c_codsitalm,c_refnaci,id_equipo_asignado from 
			((invequipo
			 INNER JOIN invmae ON INVMAE.IN_CODI=INVEQUIPO.C_CODPRD)
			LEFT JOIN INVEQUIPO_ASIGNADOS ON INVEQUIPO_ASIGNADOS.ID_EQUIPO=INVEQUIPO.C_IDEQUIPO)  where ".$where." and c_codsit<>'T'";	
	}
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec".$sql));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>Leyenda: A=Alquilado | D=Disponible | V=Vendido
		<table  width="98%"  class="tablaImprimir" cellpadding="0" cellspacing="0" >
		  <tr>
			<td width="7%" bgcolor="#999999"><div align="center"><b>Codigo luis</b></div></td> 
			<td width="40%" bgcolor="#999999"><div align="center"><b>Descripcion</b></div></td>
			<td width="12%" bgcolor="#999999">DUA</td>
			<td width="21%" bgcolor="#999999"><div align="center"><b>Serie</b></div></td>
			<td width="21%" bgcolor="#999999"><div align="center"><b>Maquina Asignada</b></div></td>
			<td width="9%" bgcolor="#999999"><strong>Condicion Almacen</strong></td>
			<td width="11%" bgcolor="#999999"><div align="center"></td>
		  </tr>
		<?php
			//for ($i = 0; $i < $nrs; $i++) {
				while (odbc_fetch_row ($rs_tabla)) {
				$codcliente=odbc_result($rs_tabla,"c_idequipo");
				$nombre=odbc_result($rs_tabla,"in_arti");
				$nif=odbc_result($rs_tabla,"c_nserie");
				$dir=odbc_result($rs_tabla,"c_codsitalm");
				$maquina=odbc_result($rs_tabla,"id_equipo_asignado");
				$Reserva=odbc_result($rs_tabla,"c_refnaci");
				$equipo=odbc_result($rs_tabla,"c_codprd");
                                $i=0;
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr class="<?php echo $fondolinea?>">
					<td>
        <div align="center"><?php echo $codcliente;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><?php echo $Reserva;?></td>
					<td><div align="center"><?php echo $nif;?></div></td>
					<td align="center"><?php echo rtrim($maquina);?></td>
					<td align="center"><?php echo rtrim($dir)."jeje";?></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>','<?php echo $val ?>','<?php echo $xsw ?>','<?php echo $maquina ?>','<?php echo $equipo ?>')">
					<?php 
					
					if(rtrim($dir)=='D' || rtrim($dir)=='C' || rtrim($dir)=='U'&& $Reserva!=1){?><img src="../images/icon_accept.png" border="0" title="Seleccionar" height="20" width="20"></a><?php }?></div></td>					
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
