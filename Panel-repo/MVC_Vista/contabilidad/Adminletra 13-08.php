<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<!---->

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
	var mensaje='Seguro de Eliminar Letra Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/ContabilidadC.php?acc=eliminarlet&c_nume="+nro+"&udni="+dni;
 }else{
 return false;
 } 
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ContabilidadC.php?acc=verlet&udni=<?php echo $val=$_GET['udni']; ?>">
<div class="onecolumn">
                    <div class="header"><strong>ADMINISTRAR LETRAS</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
                      <strong>Nuevo</strong> <a href="../MVC_Controlador/ContabilidadC.php?acc=formlet&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a><br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="10" style="width:5%">CLIENTE
                                    <input name="des" type="text" id="des" size="40" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;<img src="../images/impresora.png" alt="1" width="19" height="19" title="Ver Orden" />Imprime&nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />Anula&nbsp; <img src="../images/Coherence.png" alt="3" width="22" height="22" title="Aprobar" />Aprueba <img src="../images/iconos/doc.png" alt="5" width="20" height="20" />Libera</th>
                                </tr>
                                <tr>
                                    <th width="6%"  >Nro Letra</th>
                                    <th width="28%" >Cliente</th>
                                    <th width="9%" >Fecha Letra</th>
                                    <th width="11%" >Fecha Registro</th>
                                    <th width="12%" >Cotizacion</th>
                                  <th width="12%" >Monto</th>
                                  <th width="9%" >Estado</th>
                                  <th width="6%" >Generado </th>
                                  <th width="6%" >Aprueba<br />/Libera</th>
                                  <th width="19%" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listalet = $resulet;?>
                                <?php 
                    $i = 1;
										if($listalet!=NULL)
{
                    foreach($listalet as $item)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                  <td><?php echo $item["c_numlet"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo utf8_encode($item["c_nomcli"]);?> </td>
                                  <td bgcolor="#FFFFCC"><?php echo vfecha(substr($item["d_fecemi"],0,10));  ?>&nbsp;</td>
                                  <td bgcolor="#FFFFCC"><?php echo vfecha(substr($item['d_fcrea'],0,10)) ?>&nbsp;</td>
                                  <td bgcolor="#FFFFCC"><?php echo $item['c_numcoti'] ?>&nbsp;</td>                          
                                    
                                  <td bgcolor="#FFFFCC"><?php echo number_format($item['n_implet'],2); ?></td>
                                  <td bgcolor="#FFFFFF"><?php
								   if($item['c_estado']==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			   }elseif($item['c_estado']==4){ echo '<strong style="color:#F00">Anulado</strong>';
			   }elseif($item['c_estado']==3){ echo '<strong style="color:#060">Cerrado</strong>';}								  
								   /*if($item['n_swtapr']==0 && $item['c_estado']==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			   }elseif($item['n_swtapr']==1 && $item['c_estado']==0){ echo '<strong style="color:#060">Aprobado</strong>';
			 }elseif($item['c_estado']==2 && $item['n_swtapr']==1){ echo '<strong style="color:#FF0000">Cerrado</strong>';} */?>
             					  </td>
                                  <td bgcolor="#FFFFFF"><?php echo $item['c_oper'] ?>&nbsp;</td>
              
                                  <td bgcolor="#FFFFFF">									  
                                     <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0' /*&& $mod=='1'*/){ ?>
                                         <a href="../MVC_Controlador/ContabilidadC.php?acc=veraprobacionlet&amp;ot=<?php echo $item["c_nume"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;mod=<?php echo $_GET['mod'];?>"><img src="../images/Coherence.png" width="22" height="22" title="Aprobar Orden Trabajo" /></a>
                                     <?php } if($item['n_swtapr']=='1' && $item['c_estado']=='3' && $mod=='1'){ ?>            
                                          <a href="../MVC_Controlador/ContabilidadC.php?acc=verliberacionlet&amp;ot=<?php echo $item["c_nume"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;mod=<?php echo $_GET['mod'];?>"><img src="../images/iconos/doc.png" width="22" height="22" title="Liberar Orden Trabajo" /></a>
                                     <?php  }?> 
                                 </td>
                                 <td bgcolor="#FFFFFF">
									 <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0'){ ?>                                    
                                     <a href="../MVC_Controlador/ContabilidadC.php?acc=updateletra&amp;ot=<?php echo $item["c_nume"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;mod=<?php echo $_GET['mod'];?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a> &nbsp; 
                                     <a href="#" onclick="eliminaros('<?php echo $item["c_nume"];?>','<?php echo $_GET['udni'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
                                     <?php /*?><a href="../MVC_Vista/contabilidad/printPDF/letras.php?ot=<?php echo $item["c_nume"]; ?>"><img src="../images/impresora.png" width="18" height="18" title="Imprimir Orden" /></a>&nbsp;<?php */?>
									 
									 <?php }if($item['n_swtapr']=='1' && $item['c_estado']=='3'){?>                                     
                                     <a href="../MVC_Vista/contabilidad/printPDF/letras.php?ot=<?php echo $item["c_nume"]; ?>"><img src="../images/impresora.png" width="20" height="20" title="Imprimir Orden" /></a>&nbsp;
                                     <a href="../MVC_Vista/contabilidad/printPDF/impletra.php?ot=<?php echo $item["c_nume"]; ?>"><img src="../images/excel_icon.png" width="20" height="20" title="Imprimir Orden" /></a>&nbsp; <?php }?>
                                     <a href="../MVC_Controlador/ContabilidadC.php?acc=generarletra&amp;ot=<?php echo $item["c_nume"];?>&amp;udni=<?php echo $_GET['udni'];?>&amp;mod=<?php echo $_GET['mod'];?>"><img src="../images/icono-descargas.jpg" width="20" height="20" title="Generar Letra" /></a>
                                 </td>
  
                              </tr>
                                <?php
                        $i += 1;
                    }}
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