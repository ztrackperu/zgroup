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


function eliminarguia(guia){

	var nro=guia;
	var mensaje='Seguro de Anular Guia Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
	if(confirm(mensaje)){
	location.href="../MVC_Controlador/InventarioC.php?acc=eliminarguiaremision&guia="+nro;
	 }else{
		 return false;
		} 
}

function deleteguia(guia,udni){
	var nro=guia;
	var dni=udni
	var mensaje='Seguro de Eliminar Guia Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
	if(confirm(mensaje)){
	location.href="../MVC_Controlador/InventarioC.php?acc=deleteguiaremision&guia="+nro+"&udni="+dni; 
	 }else{
		 return false;
		}
	
}

</script>
<script type="text/javascript">

</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=verguiar&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
    <div class="header"><strong>GUIAS DE REMISION</strong> <strong style="color:#F00">(Nota: Antes de Generar su guia este debera contar con su eir de salida solo en caso de equipos.)</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo</strong><a href="../MVC_Controlador/InventarioC.php?acc=regguia&guia=<?php echo $item["c_numguia"];  ?>&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/nuevo.png" width="35" height="35" /></a><strong> Registrar GGRR Con Cotizacion<a href="../MVC_Controlador/InventarioC.php?acc=gc001&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/icono-sistemas.png" width="35" height="35" /></a> Anular GGRR no Ingresada</strong><a href="../MVC_Controlador/InventarioC.php?acc=veranulguia&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/notice.png" width="35" height="35" /></a>
<strong>Eliminar GGRR </strong><a href="../MVC_Controlador/InventarioC.php?acc=veranulguia&amp;udni=<?php echo $val=$_GET['udni']; ?>&amp;mod=<?php echo $_GET['mod'];?>"><img src="../images/user_logout.png" width="35" height="35" /></a><strong>Imprime Guia Transporte</strong><a href="../MVC_Controlador/InventarioC.php?acc=imprimeguiaT&udni=<?php echo $_GET['udni'] ?>&num=<?php echo $item['c_serdoc'].'-'.$item['c_nume'];  ?>&codi=<?php echo $item['c_numguia']; ?>">
<img src="../images/transporte.png" width="35" height="35" /></a><br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="6" style="width:5%"><input type="radio" name="sw" id="sw" value="1" />
                                    
                                  CLIENTE / 

                                  <input name="sw" type="radio" id="sw" value="3" checked="checked" />
                                  
                                  NRO GUIA (EJM=0020003462) 002=SERIE / 0003462=NRO</th>
                                </tr>
                                <tr>
                                  <th colspan="6" style="width:5%"><input name="des" type="text" id="des" size="30" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/search.png" alt="1" width="19" height="19" title="Ver Orden" />Vizualizar GGRR&nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina GGRR&nbsp;<img src="../images/guia_transporte.png" width="22" height="22" />Genera GGTT <img src="../images/pdf" width="22" height="22" />Imprime GGTT.</th>
                                </tr>
                                <tr>
                                  <th width="4%"  >&nbsp;</th>
                                    <th width="12%">Nro Guia</th>
                                    <th width="37%">Cliente</th>
                                    <th width="13%">Fecha</th>
                                    <th width="17%">Estado</th>
                                  <th width="17%">Administrar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listagr = $resulgr;?>
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
                                    <td bgcolor="#FFFFCC"><?php echo $item["c_numguia"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_nomdes"]);?> </td>
                                  <td><?php echo vfecha(substr($item["d_fecgui"],0,10));  ?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php if($item['c_estado']=='1'){echo 'Activo';}else{
									  
									  echo 'Anulado';
									 					  
									  };
									  
									  ?>
                                       
                                  </td>
                                    
                                  <td bgcolor="#FFFFFF">
                                  
                                  <?php if($item['c_estado']=='1'){?>
                                  
                                  <a href="../MVC_Controlador/InventarioC.php?acc=imprimeguia&guia=<?php echo $item["c_numguia"];  ?>&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/search.png" width="18" height="18" title="Vizualizar Guia Remision" /></a>&nbsp;&nbsp;
                                  
                                   <?php if($item['c_guiatra']=='' ){ ?>
                                  <a href="#" onclick="eliminarguia('<?php echo $item["c_numguia"]?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Anula Guia" /></a>
                                  <?php }?>                                  
                                  
                                  &nbsp;&nbsp;
                                  <?php if($item['c_guiatra']!='1'){ ?>
                                  
                                  <a href="../MVC_Controlador/InventarioC.php?acc=imprimeguiaT&udni=<?php echo $_GET['udni'] ?>&num=<?php echo $item['c_serdoc'].'-'.$item['c_nume'];  ?>&codi=<?php echo $item['c_numguia']; ?>"><img src="../images/guia_transporte.png" width="22" height="22" title="Generar Guia Transporte"/></a>
                              <?php /*?>    <?php }else{?><?php */?>
                                  
                                  <a href="../MVC_Controlador/InventarioC.php?acc=impguiaT&udni=<?php echo $_GET['udni'] ?>&guia=<?php echo $item['c_guiatra'];  ?>"><img src="../images/transporte.png" width="22" height="22" title="Ver Guia Transporte" /></a>
<?php } }?>
                                  
                                 <?php if($item['c_estado']=='4'){ ?>
                                 <a href="../MVC_Controlador/InventarioC.php?acc=imprimeguia&guia=<?php echo $item["c_numguia"];  ?>&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/search.png" width="18" height="18" title="Vizualizar Guia Remision" /></a>
                                  <?php }?> 
                                  
                                  
                                  <?php if($item['c_estado']!='4' ){ ?>
                                  <a href="#" onclick="deleteguia('<?php echo $item["c_numguia"]?>','<?php echo $_GET['udni'];?>')"><img src="../images/user_logout.png" width="18" height="18" title="Elimina Guia" /></a>
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