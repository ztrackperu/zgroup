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
function pon_prefijo(codfamilia,pref,nombre,precio,glosa) {
	parent.opener.document.formElem.codigofamilia.value=codfamilia;
	parent.opener.document.formElem.codigo.value=pref;
	parent.opener.document.formElem.descripcion.value=nombre;
	parent.opener.document.formElem.precio.value=precio;
	parent.opener.document.formElem.imp.value=precio;
	parent.opener.document.formElem.glosa.value=glosa;
	parent.opener.document.formElem.cantidad.focus;
	//parent.opener.actualizar_importe();
	parent.window.close();
}
</script>
<body>
<?php include("dbconex.php"); ?>
<?php 
$descripcion=$_POST["descripcion"];
$clase=$_POST['tipo2'];
$where="1=1";
//select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
//where c_codprd=in_codi and IN_ARTI&'  '&c_desc like '%GENERADOR%'  

 //	$sql="select distinct IN_CODI,IN_ARTI,IN_UVTA FROM INVMAE 
	// WHERE ".$where.""; $sql="SELECT *  FROM transportista WHERE  ".$where." and c_estado='1' ";
	 
/*	 $Xsql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
where ".$where." and c_codprd=in_codi ";*/

$csql='select IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE
where ".$where." ';


$XXsql="select tp_codi,c_codprd as IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio as IN_PLIST,c_desc FROM INVMAE as i ,lpreciod as d
where c_codprd=in_codi and IN_ARTI&' '&c_desc like '%$descripcion%' ORDER BY IN_ARTI DESC ";


/*if ($descripcion<>"") { 

$sql="select IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE";

} else{*/


$sql="select IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,IN_PLIST,KILOLIT FROM INVMAE WHERE IN_ARTI like '%$descripcion%'";
//}
	 
/*	 	$sql="select tp_codi,IN_CODI,IN_ARTI,IN_STOK,IN_UVTA,n_precio FROM INVMAE ,lpreciod WHERE ".$where."and in_codi=c_codprd";*/
	//$sql="SELECT CC_RUC as CC_COD ,CC_RAZO,CC_NRUC,CC_DIR1  FROM CLIMAE WHERE ".$where." and CC_ESTA='1'";
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
 <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong></strong></legend>
		<table class="fuente8" width="98%" cellspacing=1 cellpadding=1 border=1>
		  <tr>
			<td width="15%" bgcolor="#0099FF"><div align="center"><b>Codigo</b></div></td>
			<td width="15%" bgcolor="#0099FF"><div align="center"><b>Unidad</b></div></td>
			<td width="40%" bgcolor="#0099FF"><div align="center"><b>Descripci&oacute;n</b></div></td>
			<td width="20%" bgcolor="#0099FF"><div align="center"><b>Precio</b></div></td>
			<td width="10%" bgcolor="#0099FF"><strong>
		    <div align="center">
		    Select</strong></td>
		  </tr>
		<?php
			while (odbc_fetch_row($rs_tabla)) {
				$codfamilia=odbc_result($rs_tabla,"IN_CODI");
				$codigobarras=odbc_result($rs_tabla,"IN_CODI");
				$nombrefamilia=odbc_result($rs_tabla,"IN_CODI");
				$referencia=odbc_result($rs_tabla,"IN_UVTA");
				$codarticulo=odbc_result($rs_tabla,"IN_CODI");				
				$descripcion=odbc_result($rs_tabla,"IN_ARTI");
				//$xdescripcion=odbc_result($rs_tabla,"c_desc");
				$x=substr($xdescripcion,4,20);
				$y=ltrim($x);
			$precio=odbc_result($rs_tabla,"IN_PLIST");
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td bgcolor="#99FFCC">
        <div align="center"><?php echo $nombrefamilia;?></div></td>
					<td bgcolor="#99FFCC">
          <div align="left"><?php echo $referencia;?></div></td>
					<td bgcolor="#99FFCC"><div align="center"><?php echo $descripcion.' '.$xdescripcion;?></div></td>
					<td bgcolor="#99FFCC"><div align="center"><?php echo $configmoneda;?> <?php echo $precio;?></div></td>
					<td align="center" bgcolor="#99FFCC"><div align="center"><a href="javascript:pon_prefijo('<?php echo $nombrefamilia?>','<?php echo $codigobarras?>','<?php echo str_replace('"','',$descripcion)?>','<?php echo $precio?>','<?php echo $y?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
		?>
  </table>
  </fieldset>
		<?php 
		}  ?>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">

</form>
</div>
</body>
</html>
