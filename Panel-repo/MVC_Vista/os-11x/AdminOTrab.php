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
function eliminarot(ot,udni,id){
	
	var nro=ot;
		var xudni=udni;
	var xid=id
	var mensaje='Seguro de Eliminar Orden Trabajo Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminaotrab&ot="+nro+"&udni="+xudni+"&id="+xid;
 }else{
	 return false;
	}
 
 
 
}
function filtro(){
	document.getElementById('form1').submit();
	
	}
function eliminaros(os,udni){
	
	var nro=os;
	var dni=udni
	
	var mensaje='Seguro de Eliminar Orden Trabajo Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminarot&os="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=verotra&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
                    <div class="header"><strong>ORDENES DE TRABAJO</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
                    <strong>Generar Orden Trabajo </strong> <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=regotra&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a><br class="clear"/>
                    <div class="content">
<table class="data" width="883" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="11" style="width:5%"><input name="sw" type="radio" id="sw" value="3" checked="checked" />
                                  
                                  NRO ORDEN TRABAJO(EJM=45)&nbsp; <input type="radio" name="sw" id="sw" value="2" />
                                  POR PROVEEDOR</th>
                                </tr>
                                <tr>
                                  <th colspan="11" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;<img src="../images/search.png" alt="1" width="19" height="19" title="Ver Orden" />Ver &nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />Elimina &nbsp; <img src="../images/icon_posts.png" alt="3" width="22" height="22" title="Aprobar" />Cierra OT <img src="../images/Coherence.png" alt="5" width="22" height="22" />Genera OS</th>
                                </tr>
                                <tr>
                                  <th width="5%" height="41"  >Nro Orden</th>
                                  <th width="18%" >Trabajo</th>
                                  <th width="14%" >Glosa&nbsp;</th>
                                  <th width="14%" >Realizado Por</th>
                                  <th width="14%" >Equipo</th>
                                  <th width="8%" >Dcto Ref.</th>
                                  <th width="9%" >Fecha</th>
                                  <th width="8%" >Generado Por:</th>
                                  <th width="8%" >Estado</th>
                                  <th width="6%" align="center" >Cerrar OT</th>
                                  <th width="24%" align="center" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listaos = $resulos;?>
                                <?php 
                    $i = 1;
										if($listaot!=NULL)
{
                    foreach($listaot as $item)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                    <td>OT<?php echo $item["c_numot"];?></td>
                                  <td bgcolor="#CCCCCC"><?php echo $item["c_treal"];?></td>
                                  <td bgcolor="#FFFFCC"><?php echo $item["c_asunto"] ?>&nbsp;</td>
                                  <td bgcolor="#FFFFCC"><?php echo $item['c_ejecuta'] ?>&nbsp;</td>
                                    
                                    
                                  <td bgcolor="#FFFFCC"><?php echo $item["unidad"];?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $item["c_refcot"];?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php echo vfecha(substr($item["d_fecdcto"],0,10));?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $item["c_usrcrea"];?></td>
                                  <td bgcolor="#FFFFFF"><?php if($item['n_swtapr']==0 && $item['c_estado']==1){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			  }elseif($item['n_swtapr']==1 && $item['c_estado']==2){ echo '<strong style="color:#060">Cerrado</strong>';
			  }elseif($item['c_estado']==4 && $item['n_swtapr']==0){ echo '<strong style="color:#FF0000">Anulado</strong>';} ?>&nbsp;</td>
                                  <td align="center" bgcolor="#FFFFFF">
                                  <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0' && $mod=='1'){ ?>
                                      <?php 			  
				  }?>
               <?php if($item['c_estado']=='1' ){ ?>
                                 <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VercerrarOTrab&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/icon_posts.png" width="22" height="22" title="Cerrar Orden Trabajo" /></a></td>
                      <?php }?>
                       <?php if($item['n_swtapr']=='1' && $item['c_estado']=='0' && $mod=='1'){ ?>            
                                  <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verliberacionot&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/iconos/doc.png" width="22" height="22" title="Liberar Orden Trabajo" /></a>
                                   <?php 			    
				  }?> 
                                    <td align="center" bgcolor="#FFFFFF">
 <?php if($item['c_estado']=='1'){ ?>

 <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VERupdateOT&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>"> <img src="../images/icon_edit.png" alt="Editar Ord. Serv." width="18" height="18" class="help" title="Editar Ord. Serv." /></a>
 &nbsp;
 
  <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VerGenOS&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/Coherence.png" width="22" height="22" title="Genera Orden Serv." /></a>
 
 &nbsp;<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra&ot=<?php echo $item["c_numot"]; ?>"><img src="../images/search.png" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
 
 <a href="#" onclick="eliminarot('<?php echo $item["c_numot"];?>','<?php echo $_GET['udni'];?>','<?php echo $item["unidad"];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
 <?php }else{?>
 
 &nbsp;<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra&ot=<?php echo $item["c_numot"]; ?>"><img src="../images/search.png" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
 
 <?php }?>
 
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