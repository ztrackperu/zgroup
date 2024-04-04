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
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>
<script type="text/javascript">



function filtro(){
	document.getElementById('form1').submit();
	
	}

function eliminareir(coti,equipo){
	var nro=coti;
	var eq=equipo
	var mensaje='Seguro de Eliminar EIR Nro: '+eq;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/InventarioC.php?acc=eliminaeir&nroeir="+nro+"&equipo="+eq+"&sw=SALIDA";
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
    <div class="header"><strong>Lista Guia de Transportista</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo</strong><a href="../MVC_Controlador/InventarioC.php?acc=regeisinguia&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&sw=SALIDA&tipoing=2&ingdirec=0"><img src="../images/nuevo.png" width="35" height="35" /></a><br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="8" bgcolor="#FF0000" style="width:5%"><input type="radio" name="sw" id="sw" value="1" />
                                    
                                  CLIENTE / 

                                  <input name="sw" type="radio" id="sw" value="3" checked="checked" />
                                  
                                  NRO GUIA (EJM=1615) </th>
                                </tr>
                                <tr>
                                  <th colspan="8" style="width:5%"><input name="des" type="text" id="des" size="30" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                </tr>
                                <tr>
                                  <th width="3%"  >&nbsp;</th>
                                    <th width="12%">Nro Guia</th>
                                    <th width="44%">Cliente</th>
                                    <th width="2%">&nbsp;</th>
                                    <th width="2%">&nbsp;</th>
                                    <th width="12%">Fecha Registro</th>
                                    <th width="9%">Estado</th>
                                  <th width="16%">Administrar</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listagrt = $lista_guia_transporte;?>
                                <?php 
                    $i = 1;
										if($listagrt!=NULL)
{
                    foreach($listagrt as $item)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from
					///c_numguia,d_fecgui,c_nomdes,c_estado

            ?>
                                <tr>
                                  <td><?php echo $i; ?>&nbsp;</td>
                                    <td bgcolor="#FFFFCC"><?php echo $item["c_numguia"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_nomdes"]);?> </td>
                                  <td><?php echo $item["c_desprd"];?></td>
                                  <td><?php echo $item["c_codprd"];?></td>
                                  <td><?php echo $item["d_fecgui"];  ?>&nbsp;</td>
                                  <td bgcolor="#FFFFFF"><?php if($item['c_numeir']=='0'){echo '<strong style="color:#FF0000">Pendiente</strong>';}else{
									  
									  echo '<strong style="color:#060">Generado</strong>';
									 					  
									  };
									  
									  ?>
                                       
                                  </td>
                                    
                                  <td bgcolor="#FFFFFF">
                                  
                                  <a href="../MVC_Controlador/InventarioC.php?acc=impguiaT&udni=<?php echo $_GET['udni'] ?>&guia=<?php echo $item['c_numguia'];?>"><img src="../images/transporte.png" width="22" height="22" title="Ver Guia Transporte" /></a>                   
                                   
                                
                                  
                                 
                                  
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