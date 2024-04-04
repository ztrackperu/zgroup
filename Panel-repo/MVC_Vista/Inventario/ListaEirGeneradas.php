<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista EIR </title>
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

</script>
<script type="text/javascript">
function eliminareir(coti,equipo,situ,xsw){
	var nro=coti;
	var eq=equipo;
	var situ=situ;
	if(xsw=='1'){
		sw='INGRESO';
	}else{
		sw='SALIDA';
	}
	//var mensaje='Seguro de Eliminar EIR Nro: '+nro+' '+eq+' '+situ+' '+sw;
	var mensaje='Seguro de Eliminar EIR Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=eliminaeirv2&nroeir="+nro+"&equipo="+eq+"&sw="+sw+"&situ="+situ;
 }else{
	 return false;
	}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="#<?php echo $val=$_GET['udni']; ?>">
<div class="onecolumn">
                    <div class="header"><strong>LISTA DE EIR GENERADAS</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong><a href="#&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a><br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000" style="font-size:12px">
                            <thead>
                                <tr>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                  <th style="width:5%">&nbsp;</th>
                                </tr>
                                <tr>
                                  <th colspan="8" style="width:5%">
                                  (Para busqueda presione ctrl+F mostrara un cuadro de en la parte inferior izquierda de la pantalla)
                               
                                  
                                  <!--BUSQUE POR NRO EIR Y/O CLIENTE
                  <input name="des" type="text" id="des" size="40" />
                  <input type="submit" name="button" id="button" value="FILTRAR" />
                  &nbsp;&nbsp;&nbsp;&nbsp;-->
                  
                  
                  
                  &nbsp;&nbsp;&nbsp;<img src="../images/search.png" alt="editar" width="18" height="18" class="help" title="Editar" />VER EIR</th>
                                </tr>
                                <tr>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                </tr>
                                <tr>
                                    <th width="6%">Nro EIR</th>
                                    <th width="28%">CLIENTE</th>
                                    <th width="8%">TIPO</th>
                                    <th width="17%">FECHA IN/OUT</th>
                                    <th width="19%">TECNICO REVISION</th>
                                    <th width="3%">&nbsp;</th>
                                    <th width="9%">EQUIPO</th>
                                    <th width="10%">VER EIR</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                <?php 
                    $i = 1;
				if($listaeir!=NULL)
							{
                    foreach($listaeir as $item)
                    			{ 

            ?>
                                <tr>
                                    <td><?php echo $item["c_numeir"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo strtoupper (utf8_decode($item["c_nomcli"]));?> </td>
                                  <td bgcolor="#CCFFCC"><?php  if($item["c_tipoio"]=='2'){echo 'SALIDA';}else{ echo 'ENTRADA';};  ?>&nbsp;</td>
                                    
                                    
                                  <td bgcolor="#FFFFCC"><?php echo $item["c_fechora"];?></td>
                                  <td bgcolor="#FFFFFF"><?php echo mb_strtoupper($item["c_nomtec"]);?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php //if($item["c_est"]=='1'){echo "ACTIVO";}else{echo "ANULADO";}?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php echo $item["c_idequipo"];?></td>
                                  <td bgcolor="#FFFFFF"><a href="../MVC_Controlador/InventarioC.php?acc=imp&eir=<?php echo $item['c_numeir']; ?>&udni=<?php echo $_GET['udni']; ?>&equipo=<?php echo $item["c_idequipo"]; ?>"><img src="../images/search.png" width="15" height="15" title="Ver Eir" /></a>&nbsp;
                                 <a href="../MVC_Controlador/InventarioC.php?acc=impv2&eir=<?php echo $item['c_numeir']; ?>&udni=<?php echo $_GET['udni']; ?>&equipo=<?php echo $item["c_idequipo"]; ?>"> <img src="../images/ticket.png" width="14" height="15" /></a>&nbsp;
                                 
                                 <?php if($item['c_nroeiring']!="0" && $item['c_nroeirsal']!=""){?>
                              <?php }else{
									?>							  
                                                                  <a href="#" onclick="eliminareir('<?php echo $item["c_numeir"];?>','<?php echo $item['c_idequipo']; ?>','<?php echo $item["c_sitalm"]; ?>','<?php echo $item["c_tipoio"] ?>')"><img src="../images/icon_delete.png" width="16" height="16" onclick="" title="Eliminar EIR" /></a> 
<?php
								  
								  }?>
                                  </td>
                    
                              
                              
                                
                                </tr>
                                <?php
                        			$i += 1;
                    			}
							}
            ?>
                            </tbody>
                        </table>
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>

</form>
</body>
</html>