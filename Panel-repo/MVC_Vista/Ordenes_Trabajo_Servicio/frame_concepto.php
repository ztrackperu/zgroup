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

function pon_prefijo(nombre,precio) {
	
		parent.opener.document.getElementById('c_subcat').value=nombre;
		parent.opener.document.getElementById('n_pre').value=precio;
		parent.window.close();
}

</script>
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<body class="control">
<?php
//and c_codsit='D'  and in_codi='$codprod' and c_codsitu='D'
$descripcion=$_REQUEST["txtbuscarcliente"];
$codprod=$_REQUEST['codprod'];

$sw=$_REQUEST['sw'];
$where="";
$xsw=$_REQUEST['xsw'];
$val=$_REQUEST['hiddenField'];
$res=!empty($_REQUEST['res'])?'1':'0';
$tiping=$_REQUEST['tiping'];

if($res=='1'){ 
    $rese='1';    
}else{
    $rese='0';    
}

if ($descripcion<>"") { $where.=" and i.c_nserie like '%$descripcion%' "; }
//if($tiping=='2'){
	$sql="select * from sub_concep_ot where cod_cat='A'";
//}else{
//$sql="select c_codprd,c_idequipo,c_nserie,in_arti,c_codsit,c_estaresv from invequipo as i,invmae as m WHERE ".$where."   
//and in_codi=c_codprd and cod_tipo='$codprod' and c_codsit<>'V' and c_codsit<>'T'";	
	//}
	$rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
	$nrs=odbc_num_fields($rs_tabla);
?>
<div id="tituloForm2" class="header">
<div align="center">
<form id="form1" name="form1">
<?php if ($nrs>0) { ?>
<table  width="98%"  class="tablaImprimir" cellpadding="0" cellspacing="0" >
    <tr>
        <td width="7%" bgcolor="#999999"><div align="center"><b>Codigo</b></div></td>
        <td width="40%" bgcolor="#999999"><div align="center"><b>Descripcion</b></div></td>
        <td width="12%" bgcolor="#999999">&nbsp;</td>
        <td width="21%" bgcolor="#999999"><div align="center"><b>Precio</b></div></td>
        <td width="9%" bgcolor="#999999">&nbsp;</td>
    </tr>
    <?php
        $i=1;
        //for ($i = 0; $i < $nrs; $i++) {
        while (odbc_fetch_row ($rs_tabla)) {
            $codcliente=odbc_result($rs_tabla,"codigo");
            $nombre=odbc_result($rs_tabla,"descrip");
            $nif=odbc_result($rs_tabla,"precio");
            $dir=odbc_result($rs_tabla,"cod_cat");
            if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; }?>
        <tr class="<?php echo $fondolinea?>">
            <td><?php echo $codcliente;?></td>
            <td align="center" valign="middle"><?php echo strtoupper(utf8_encode($nombre));?></td>
            <td></td>
            <td><?php echo $nif;?></td>
            <td></td>
            <td align="center"><a href="javascript:pon_prefijo('<?php echo $nombre?>','<?php echo $nif?>')"><img src="../images/valid.png" width="18" height="18"></a></td>
        </tr>
        <tr class="<?php echo $fondolinea?>">
            <td>&nbsp;</td>
            <td align="center" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
        </tr>
        <?php $i++; }?>
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
