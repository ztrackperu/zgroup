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
function eliminaroc(os,udni){
	
	var nro=os;
		var dni=udni
	
	var mensaje='Seguro de Eliminar Orden de Compra Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/ComprasC.php?acc=eliminaroc&os="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}
</script>
</head>
<body>
    <div class="">
        <form id="form1" name="form1" method="post" action="../MVC_Controlador/ComprasC.php?acc=veroc&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
            <div class="onecolumn">
                <div class="header"><strong>ORDENES DE COMPRA.</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
                    <strong>Nuevo</strong>
                        <a href="../MVC_Controlador/ComprasC.php?acc=formos&udni=<?php echo $val;?>&mod=<?php echo $_GET['mod']; ?>&sw=<?php echo $_GET['sw']; ?>"><img src="../images/nuevo.png" width="48" height="48" /></a>
                        <br class="clear"/>

                    <table class="data" width="100%" cellpadding="0" cellspacing="0" bordercolor="#000000">
                        <thead>
                            <tr>
                                <th colspan="17" style="width:5%"><input type="radio" name="sw" id="sw" value="1" checked="checked" /> PROVEEDOR /										  
                                    <input name="sw" type="radio" id="sw" value="2"/> NRO ORDERN COMPRA (EJM=45)
                                </th>
                            </tr>
                            <tr>
                                <th colspan="17" style="width:5%">Si estado es atencion parcial revise las notas ingresos en el SISTEMA SICOZ</th>
                            </tr>
                            <tr>
                                <th colspan="17" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                    <input type="submit" name="button" id="button" value="FILTRAR" />
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;<img src="../images/pdf.gif" alt="1" width="19" height="19" title="Ver Orden" />imprime&nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina&nbsp; <img src="../images/Coherence.png" alt="3" width="22" height="22" title="Aprobar" />aprueba <img src="../images/iconos/doc.png" alt="5" width="20" height="20" />Libera</th>
                            </tr>
                            <tr>
                                <th width="1%">&nbsp;</th>
                                <th width="3%">Nro Orden</th>
                                <th width="5%">Proveedor</th>
                                <th width="2%">Fecha</th>                                 
                                <th width="2%">Usuario Crea</th>                                 
                                <th width="2%">Moneda</th>                                 
                                <th width="2%">Total</th>                                 
                                <th width="3%">Observacion</th>   
                                <th width="2%">Ref Cotizacion</th>   
                                <th width="2%">Documento de Referencia</th>   
                                <th width="2%">Moneda Ref</th>   
                                <th width="3%">Importe Ref</th> 
								<th width="2%">Documento de Referencia 2</th>   
                                <th width="2%">Moneda Ref 2</th>   
                                <th width="3%">Importe Ref 2</th> 		
                                <th width="2%">Estado</th>
                                <th width="2%">Duplicar</th>
                                <th width="2%">Aprueba<br/>/ Libera</th>
                                <th width="3%">Administrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $listaos = $resulos;?>
                                <?php $i = 1;
                                    if($listaos!=NULL)
                                        {   foreach($listaos as $item) { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from
                                ?>
                            <tr>
                                <td><?php echo $i; ?>&nbsp;</td>
                                <td>OC-<?php echo $item["c_numeoc"];?></td>
                                <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_nomprv"]);?> </td>
                                <td bgcolor="#FFFFCC"><?php echo vfecha(substr($item["d_fecoc"],0,10));  ?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php echo $item["c_oper"];  ?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php if($item["c_codmon"]=='0'){$d='SOLES';}elseif($item["c_codmon"]=='1'){$d='DOLARES';}else{$d="";} 
                                                            echo $d  ?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php echo $item["n_totoc"];  ?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php echo $item["c_obsoc"];  ?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php echo $item["c_refcoti"];  ?>&nbsp;</td>
								<td bgcolor="#FFFFDD"><?php if($item["c_tipdoc"]=='001'){$d='F';}elseif($item["c_tipdoc"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc'].$item['c_nrodoc']  ?>&nbsp;</td>
								<td bgcolor="#FFFFDD"><?php if($item["c_tipmon"]=='0'){$d='SOLES';}elseif($item["c_tipmon"]=='1'){$d='DOLARES';}else{$d="";} 
                                                            echo $d  ?>&nbsp;</td>					
								<td bgcolor="#FFFFDD"><?php echo $item["c_importe"];  ?>&nbsp;</td>	
								<td bgcolor="#FFFFDD"><?php if($item["c_tipdoc2"]=='001'){$d='F';}elseif($item["c_tipdoc2"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc2'].$item['c_nrodoc2']  ?>&nbsp;</td>
								<td bgcolor="#FFFFDD"><?php if($item["c_tipmon2"]=='0'){$d='SOLES';}elseif($item["c_tipmon2"]=='1'){$d='DOLARES';}else{$d="";} 
                                                            echo $d  ?>&nbsp;</td>					
								<td bgcolor="#FFFFDD"><?php echo $item["c_importe2"];  ?>&nbsp;</td>			
                                <td bgcolor="#FFFFFF"><?php  if($item['n_swaprb']=='0'  && $item['c_estado']=='0'){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
                                                        }elseif($item['n_swaprb']=='2'   && $item['c_estado']=='0' && $item['b_swtfac']=='0')  { echo '<strong style="color:#060">Aprobado</strong>';
														}elseif($item['n_swaprb']=='2'   && $item['c_estado']=='2' &&  $item['b_swtfac']=='0'){ echo '<strong style="color:#060">Aprobado</strong>';
                                                        }elseif($item['n_swaprb']=='2'   && $item['c_estado']=='1' &&  $item['b_swtfac']=='0'){ echo '<strong style="color:#060">Aprobado</strong>';
														}
                                                        ?>&nbsp; 
                                                      <?php 
                                                             if($item['n_swaprb']=='2'  && $item['c_estado']=='2' &&  $item['b_swtfac']=='1'){ echo '<strong style="color:#FF0000">Cerrado</strong>';} 
                                                             if($item['n_swaprb']=='2' &&   $item['b_swtfac']=='1' && $item['c_estado']=='1'  ){ echo '<strong style="color:#FF0000">Cerrado</strong>';} 
                                                             if($item['n_swaprb']=='2' &&   $item['b_swtfac']=='1' && $item['c_estado']=='0'  ){ echo '<strong style="color:#FF0000">Cerrado</strong>';} 
                                                      ?>&nbsp;
                                </td>
                                    <?php //if($_GET['udni']=='70498492'){ ?>
                                <td align="center" bgcolor="#FFFFFF">
                                    <a href="../MVC_Controlador/ComprasC.php?acc=duplicaoc&amp;os=<?php echo $item["c_numeoc"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>">
                                    <img src="../images/icono-descargas.jpg" alt="" width="23" height="22" title="Duplicar Orden Compra" />
                                    </a>
                                </td>
                                    <?php //} ?>
                                <td bgcolor="#FFFFFF">
                                    <?php   if($item['n_swaprb']=='0'  && $mod=='1'){ ?>
                                        <?php } ?>
                                    <?php   if($item['n_swaprb']=='0' && $item['b_swtfac']=='0'  && ($mod=='1' || $mod=='123456') && ($_GET['udni']!='74457802' && $_GET['udni']!='73454378' ) ){ ?>
                                                <a href="../MVC_Controlador/ComprasC.php?acc=veraprobacion&mod=<?php echo $_GET['mod'] ?>&amp;os=<?php echo $item["c_numeoc"];?>&amp;udni=<?php echo $val;?>"><img src="../images/Coherence.png" width="32" height="32" title="Aprobar Orden Compra" /></a>
                                </td>
                                        <?php }?>
                                    <?php   if($item['n_swaprb']=='2' && $item['b_swtfac']=='0' && $mod=='1' && $_GET['udni']!='42541054'){ ?>             
                                                <a href="../MVC_Controlador/ComprasC.php?acc=verliberacionos&mod=<?php echo $_GET['mod'] ?>&amp;os=<?php echo $item["c_numeoc"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/download.png" width="32" height="32" title="Liberar Orden Servicio" /></a>
                                        <?php } ?> 
                                <td bgcolor="#FFFFFF">
                                    <?php   if($item['n_swaprb']=='0' && $item['c_estado']=='0'){ ?>
                                                <a href="../MVC_Controlador/ComprasC.php?acc=updateoc&mod=<?php echo $_GET['mod'] ?>&amp;os=<?php echo $item["c_numeoc"];?>&amp;udni=<?php echo $val;?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a>
                                          &nbsp;<a href="../MVC_Vista/Compras/Reportes/impoc.php?os=<?php echo $item["c_numeoc"]; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
                                                <a href="#" onclick="eliminaroc('<?php echo $item["c_numeoc"];?>','<?php echo $_GET['udni'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
                                    <?php   }else{?>
                                          &nbsp;<a href="../MVC_Vista/Compras/Reportes/impoc.php?os=<?php echo $item["c_numeoc"]; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
                                        <?php }?>
                                          &nbsp;<a href="../MVC_Controlador/ComprasC.php?acc=verexcel&oc=<?php echo $item["c_numeoc"]; ?>"><img src="../images/excel_icon.png" width="19" height="19" title="Imprimir Orden" /></a>
										  <a href="../MVC_Controlador/ComprasC.php?acc=verfrmref&oc=<?php echo $item["c_numeoc"]; ?>&udni=<?php echo $_GET['udni'];?>">
                                                <img src="../images/search.png" width="16" height="16" title="Referenciar 1era factura"/></a>
											<a href="../MVC_Controlador/ComprasC.php?acc=verfrmref2&oc=<?php echo $item["c_numeoc"]; ?>&udni=<?php echo $_GET['udni'];?>">
                                                <img src="../images/search.png" width="16" height="16" title="Referenciar 2da factura"/></a>		
                                </td>
								
                            </tr>
                                <?php $i += 1; }} ?>
                        </tbody>
                    </table>
                    <div id="chart_wrapper" class="chart_wrapper"></div>
                    <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>

            </div>
        </form>
    </div>	
	
</body>
</html>
