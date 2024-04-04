<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">

<script language="javascript">

function pon_prefijo(pref,nombre,dato,dato2) {
	var val=document.getElementById('hiddenField').value;
	
/*	parent.opener.document.form1.licencia.value=pref;
	parent.opener.document.form1.c_chofer.value=nombre;
	parent.opener.document.form1.marca.value=dato;
	parent.opener.document.form1.c_placa1.value=dato2;*/
	if(val=='1'){
	parent.opener.document.formElem.licencia.value=pref;
	parent.opener.document.formElem.chofer.value=nombre;
	parent.opener.document.formElem.marca.value=dato;
	parent.opener.document.formElem.placa.value=dato2;
	}else if(val=='2'){
	parent.opener.document.form1.c_licencia.value=pref;
	parent.opener.document.form1.c_chofer.value=nombre;
	//parent.opener.document.form1.marca.value=dato;
	parent.opener.document.form1.c_placa1.value=dato2;
		
		
		}
	//parent.opener.document.formElem.lugar.value=dato2;
	parent.window.close();
}

</script>
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<body class="control">
<?php
$descripcion=$_POST["txtbuscarcliente"];
$zval=$_POST["hiddenField"];

if($zval!=NULL){
	$val='1';
	}else{
	$val='2';	
		
		}


$where="1=1";


if ($descripcion<>"") { $where.=" AND c_ructra='$descripcion'"; }
//if ($descripcion1<>"") { $where.=" AND CC_NRUC='%$descripcion1%'"; }
	$sql="SELECT *  FROM transportista WHERE  ".$where." and c_estado='1' ";
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
		<table class="fuente8" width="98%" cellspacing=1 cellpadding=3 border=1>
		  <tr>
			<td width="8%" bgcolor="#CCCCCC"><div align="center"><b>Brevete</b></div></td>
			<td width="50%" bgcolor="#CCCCCC"><div align="center"><b>Chofer</b></div></td>
			<td width="19%" bgcolor="#CCCCCC"><strong>Marca</strong></td>
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
				 if (!empty($i) AND $i%2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
					<tr style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF66';" onMouseOut="this.style.backgroundColor='#ffffff';">
					<td>
        <div align="center"><?php echo $codcliente;?></div></td>
					<td>
        <div align="left"><?php echo utf8_encode($nombre);?></div></td>
					<td><?php echo utf8_encode($nif);?></td>
					<td><?php echo utf8_encode($dir);?></td>
					<td align="center"><div align="center">
                    <a href="javascript:pon_prefijo('<?php echo $codcliente?>','<?php echo $nombre?>','<?php echo $nif?>','<?php echo $dir?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></div></td>					
				</tr>
			<?php }
		?>
  </table>
		<input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $val?>">
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
