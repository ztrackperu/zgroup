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
	parent.opener.document.formElem.codigo.value=codfamilia;
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

if ($descripcion<>"") { $where.="AND IN_ARTI like '%$descripcion%'  "; } 
	 
	 $sql="select i.tp_codi,IN_CODI,IN_ARTI,i.IN_STOK,i.IN_UVTA,p.n_preprd,p.c_catprd,p.c_conprd,p.c_codmon,p.n_preprd 
from invmae as i ,precio as p  
where ".$where." and c_codprd=in_codi and p.c_activo='1' and p.c_estado='1'  ";

	
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
			<td width="20%" bgcolor="#0099FF"><b>Moneda</b></td>
			<td width="20%" bgcolor="#0099FF"><div align="center"><b>Precio</b></div></td>
			<td width="10%" bgcolor="#0099FF"><strong>
		    <div align="center">
		    Select</div></strong></td>
		  </tr>
		<?php
			while (odbc_fetch_row($rs_tabla)) {
			
				$codprd=odbc_result($rs_tabla,"IN_CODI");
				//$codprd=odbc_result($rs_tabla,"c_codprd");
				$referencia=odbc_result($rs_tabla,"IN_UVTA");								
				$descripcion=odbc_result($rs_tabla,"IN_ARTI");
				$xdescripcion=odbc_result($rs_tabla,"c_conprd")." ".odbc_result($rs_tabla,"c_catprd");
				//if($xdescripcion==""){$xdescripcion=odbc_result($rs_tabla,"c_desc");}	
				$idmoneda=odbc_result($rs_tabla,"c_codmon");
				if($idmoneda==0){$desmoneda="NUEVOS SOLES";}else{$desmoneda="DOLARES AMERICANOS";}
			    $precio=odbc_result($rs_tabla,"n_preprd");
				//if($precio==""){$precio=odbc_result($rs_tabla,"n_precio");}	
				
				
				$moneda=$_GET['moneda'];
		        $cambio=$_GET['cambio'];
				 if($moneda==''){
				  $pre1=0; 		
			   }else if($moneda=='0' && $idmoneda=='1'){ //nuevos soles
					$pre1  =  $precio*$cambio;	
					//$pre1=round($prex, 3);		
				}elseif($moneda=='1' && $idmoneda=='0'){
					 $pre1  = $precio/$cambio;
				}else{
					 $pre1  = $precio;
					}
				
								
				//$xdescripcion=odbc_result($rs_tabla,"c_desc");
				//$x=substr($xdescripcion,4,20);
				//$y=ltrim($x);
			    
				 if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
						<tr class="<?php echo $fondolinea?>">
					<td bgcolor="#99FFCC">
        <div align="center"><?php echo $codprd;?></div></td>
					<td bgcolor="#99FFCC">
          <div align="left"><?php echo $referencia;?></div></td>
					<td bgcolor="#99FFCC"><div align="center"><?php echo $descripcion.' '.$xdescripcion;?></div></td>
					<td bgcolor="#99FFCC"><?php echo $desmoneda;?></td>
					<td bgcolor="#99FFCC"><div align="center"><?php echo $configmoneda;?> <?php echo $precio;?></div></td>
					<td align="center" bgcolor="#99FFCC"><div align="center"><a href="javascript:pon_prefijo('<?php echo $codprd?>','<?php echo $codigobarras?>','<?php echo str_replace('"','',$descripcion)?>','<?php echo $pre1?>','<?php echo $xdescripcion?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
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
