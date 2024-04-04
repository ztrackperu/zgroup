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

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="../Admision/js/jquery.js"></script>
<script type="text/javascript" src="../Admision/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../Admision/js/hint.js"></script>
<script type="text/javascript" src="../Admision/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../Admision/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../Admision/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../Admision/js/custom_blue.js"></script>
<script type="text/javascript">
function filtro(){
	document.getElementById('form1').submit();
	
	}
function eliminaros(os,udni){
	
	var nro=os;
		var dni=udni
	
	var mensaje='Seguro de Eliminar Orden Servicio Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminaros&os="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}

function eliminarguia(guia){

	var nro=guia;
	var mensaje='Seguro de Eliminar Guia Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=eliminarguiaremision&guia="+nro;
 }else{
	 return false;
	}
 
 
 
}
</script>
<script type="text/javascript">
function eliminareir(coti,equipo,situ){
	var nro=coti;
	var eq=equipo;
	var situ=situ;
	var mensaje='Seguro de Eliminar EIR Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=eliminaeir&nroeir="+nro+"&equipo="+eq+"&sw=INGRESO"+"&situ="+situ;
 }else{
	 return false;
	}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=listaguiaeirSAL&sw=0&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
    <div class="header"><strong>GENERACION DE EIR</strong>(INGRESO) *implementado desde el 08/07/2015</div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<a href="../MVC_Controlador/InventarioC.php?acc=regeisinguia&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&sw=ENTRADA&tipoing=1&ingdirec=0"><strong>Nuevo</strong><img src="../images/nuevo.png" width="35" height="35" /></a> 

 &nbsp;&nbsp;&nbsp;&nbsp;
<a href="../MVC_Controlador/InventarioC.php?acc=regingxoc&sw=0&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<strong>Ingreso x Orden de Compra</strong> <img src="../images/inventario.png" width="35" height="35" /></a>
<br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000"><thead><tr>
                                  <th colspan="10" bgcolor="#FF0000" style="width:5%"><input type="radio" name="sw" id="sw" value="1" />
                                    
                                  CLIENTE / 

                                  <input name="sw" type="radio" id="sw" value="3" checked="checked" />
                                  
                                  NRO EIR (EJM=100) </th>
                                </tr>
                                <tr>
                                  <th colspan="10" style="width:5%"><input name="des" type="text" id="des" size="30" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leyenda Condicion -&gt;<strong style="color:#06F">A=Alquilado,R=Ruta</strong></th>
                                </tr>
                                <tr>
                                  <th width="2%"  >&nbsp;</th>
                                  <th width="8%" align="center" valign="middle">Nro Eir Salida</th>
                                    <th width="9%" align="center" valign="middle">Nro Guia Remison</th>
                                    <th width="27%" align="center" valign="middle">Cliente</th>
                                    <th width="9%" align="center" valign="middle">Equipo</th>
                                    <th width="10%" align="center" valign="middle">Codigo Equipo</th>
                                    <th width="8%" align="center" valign="middle">Condicion</th>
                                    <th width="8%" align="center" valign="middle">Fecha Eir Salida</th>
                                    <th width="12%" align="center" valign="middle">Estado</th>
                                  <th width="15%">Administrar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listagr = $carga_sal_genEIR;?>
                                <?php 
                    $i = 1;
										if($listagr!=NULL)
{
                    foreach($listagr as $item)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from
					///c_numguia,d_fecgui,c_nomdes,c_estado

            ?>
                                <tr>
                                  <td><?php echo $i; ?>&nbsp;</td>
                                  <td bgcolor="#FFFFCC"><?php echo $item['c_numeir'] ?>&nbsp;</td>
                                    <td bgcolor="#CCCCFF"><?php if($item["c_numguia"]==""){echo 'Generado Sin Guia';}else{echo $item["c_numguia"];};?></td>
                                  <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_nomdes"]);?> </td>
                                  <td><?php echo $item["c_desprd"];?></td>
                                  <td><?php echo $item["c_codequipo"];?></td>
                                  <td><?php echo $item["c_sitalm"]; ?>&nbsp;</td>
                                  <td><?php echo (substr($item["c_fechora"],0,10));  ?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF">
								  <?php 
								 if($item['c_nroeiring']==''){echo '<strong style="color:#FF0000">Sin 		Ingreso</strong>';}else{
									  echo '<strong style="color:#060">Generado</strong>';
									 					  
									  };
									  
									  ?>
                                       
                                  </td>
                                    
                                  <td bgcolor="#FFFFFF">
                                  
                                  <?php if($item['c_numeiring']==''){?>
 
                                  <a href="../MVC_Controlador/InventarioC.php?acc=regeirent&guia=<?php echo $item["c_numeir"]; ?>&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&sw=ENTRADA&coprod=<?php echo $item['c_codprod']; ?>"><img src="../images/transporte.png" width="18" height="18" title="Generar Eir Ingreso" /></a>&nbsp;&nbsp;
              <?php }?>                    
                                   
                                 
                                  
                                 
                                  
                                  </td>
                                </tr>
                <?php $i++;}}?>
                            </tbody>
                        </table>
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#"></a></div>
  </div>
</div>

</form>
</body>
</html>