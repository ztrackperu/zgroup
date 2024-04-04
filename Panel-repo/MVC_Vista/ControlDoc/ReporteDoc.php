<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgroup </title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/formulario.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="../Admision/js/jquery.js"></script>
<script type="text/javascript" src="../Admision/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../Admision/js/hint.js"></script>
<script type="text/javascript" src="../Admision/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../Admision/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../Admision/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../Admision/js/custom_blue.js"></script>






<style type="text/css">
body{width:284px;}

.alinear{float: left;margin-left:10px;}
.data{font-family:serif, sans-serif; font-size:8px;width:180px;}
.nover{font-family:serif, sans-serif; font-size:12px;text-decoration:none;list-style:none;}

</style>
<style type="text/css" media="print">
.nover {display:none; }

</style>
</head>
<body>
<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<li><a onclick="history.back()" href="#=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b>Retornar </b></a></li>
</ul>
<h6>INGRESO DE DOCUMENTOS</h6>

<?php
include('dbconex.php');
include("../../php/Funciones/Funciones.php");
$c_numcd=$_GET['c_numcd'];
$sql="select c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' 
and d.C_NUMITM=c.c_tipodoc and c_numcd='$c_numcd' and c.c_estado<>'3'";

$rs_tabla1 = odbc_exec($cid,$sql);
//$lista = odbc_fetch_array($strConsulta);


 ?>

<table class="data"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="48">N° Envio:</td>
    <td width="232"><?php echo odbc_result($rs_tabla1,"c_numcd");  ?></td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td><?php echo odbc_result($rs_tabla1,"d_fecreg");  ?></td>
  </tr>
  <tr>
    <td>Usuario:</td>
    <td><?php echo odbc_result($rs_tabla1,"c_opereg");  ?></td>
  </tr>
</table>

<br />

  <table class="data"  cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr align="center">
                                  <th width="10%" >Item</th>
                                  <th width="10%" >Tipo</th>
                                  <th width="35%" >Serie/Num</th>
                                  <th width="25%" >Fecha</th>
                                  <th width="20%" >Destin.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 	
							
							$c_numcd=$_GET['c_numcd'];
$sql="select c.*,C_DESITM  from ctrdoc c,Dettabla d where d.C_CODTAB='TDC' and d.C_ESTADO='1' 
and d.C_NUMITM=c.c_tipodoc and c_numcd='$c_numcd' and c.c_estado<>'3'";

$rs_tabla = odbc_exec($cid,$sql);
//$lista = odbc_fetch_array($strConsulta);						
					while (odbc_fetch_row($rs_tabla)) {								
							 ?>
                         
                      <tr align="center">
                          <td><?php echo odbc_result($rs_tabla,"n_item");  ?></td>
                          <td>
                              <?php 
                                   $nombretipo=odbc_result($rs_tabla,"c_desitm"); 							  
                                    $variable = explode (' ',substr($nombretipo,0,50));
                                    $descripcion = $variable [0][0].$variable [1][0].$variable[2][0];
                                    echo $descripcion;
                              
                              ?>
                          </td>
                          <td><?php echo  odbc_result($rs_tabla,"c_serdoc").' '.odbc_result($rs_tabla,"c_numdoc"); ?></td>
                          <td><?php $fecha=odbc_result($rs_tabla,"d_fecdoc");  echo  vfecha(substr($fecha,0,10)); ?></td>
                          <td>
						  
						       <?php 							   
								   $desti=odbc_result($rs_tabla,"c_destidoc");
								   $variable = substr($desti,0,6);
								    echo strtoupper($variable)
							   ?>
                          </td>
                    </tr>
				<?php }?>   
         </tbody>
      </table>
                      
 <br />
   <table class="data"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%">----------------------</td>
    <td width="50%">----------------------</td>
  </tr>
  <tr>
    <td height="19">Recibi conforme</td>
    <td>Entrega</td>
  </tr>
  <tr>
    <td>Nom:</td>
    <td>Nom:  <?php echo odbc_result($rs_tabla,"c_opereg");  ?></td>
  </tr>
  <tr>
    <td>DNI:</td>
    <td>&nbsp;</td>
  </tr>
</table>






</body>
</html>