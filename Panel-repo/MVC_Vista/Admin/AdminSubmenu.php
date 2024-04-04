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
	
	function regresar(){
location.href="../MVC_Controlador/AdminC.php?acc=vermenu"; 
}

function eliminaroc(os,udni,id){
	
	var nro=os;
	var dni=udni;
	var idmenu=id;
	
	var mensaje='Seguro de Eliminar el menu: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/AdminC.php?acc=eliminarsubmenu&id="+nro+"&udni="+dni+"&idmenu="+idmenu;
 }else{
	 return false;
	}
 
 
 
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=versubmenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $_GET['id'];?>">
<div class="onecolumn">
                    <div class="header"><strong>LISTA DE SUBMENUS DEL MENU  &nbsp; <?php echo $id=$_GET['id']; ?></strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo Sub-menu</strong>
<a href="../MVC_Controlador/AdminC.php?acc=nuevosubmenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $val=$_GET['id']; ?>"><img src="../images/nuevo.png" width="40" height="40" /></a> 



<br class="clear"/>
                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="6" style="width:5%"><input type="radio" name="sw" id="sw" value="1" /> NOMBRE
                                  
                                 
                                  
                                  <input name="sw" type="radio" id="sw" value="2"  />  URL</th>
                                </tr>
                                <tr>
                                  <th colspan="6" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;&nbsp;
<img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina&nbsp; &nbsp;
<!--<img src="../images/pdf.gif" alt="1" width="19" height="19" title="Ver Orden" />imprime&nbsp; -->
                                </tr>
                                <tr>
                                  <th width="4%"  >ID</th>
                                    <th width="20%"  >Nombre del Submenu</th>
                                    <th width="10%" >Padre</th>
                                  <th width="15%" >Icono</th>
                                  <th width="21%" align="center" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listaos = $resulos;?>
                                <?php 
                    $i = 1;
										if($listaos!=NULL)
{
                    foreach($listaos as $item2)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                  <td><?php echo $item2["IdMenu"];?></td>
                                  <td bgcolor=""><?php echo utf8_encode($item2["Nombre"]);?> </td>
                                  <td bgcolor=""><?php echo $item2["IdPadre"];  ?></td>
                                  <td bgcolor="#FFFFFF"><?php echo $item2["Icono"]?></td>
                                  <td bgcolor="#FFFFFF" align="center">
                                    
                                    
                                    <a href="../MVC_Controlador/AdminC.php?acc=updatesubmenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $item2["IdMenu"];?>&idmenu=<?php echo $_GET["id"];?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a>&nbsp; &nbsp; 
                                    
                                    
                                    <a href="#" onclick="eliminaroc('<?php echo $item2["IdMenu"];?>','<?php echo $_GET['udni'];?>','<?php echo $_GET['id'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a> &nbsp;&nbsp; 
                                    
  <!--<a href="../MVC_Vista/Compras/Reportes/impoc.php?os="><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Datos" /></a>&nbsp;-->
                                    
                                    <?php }?>
                                    
                                  </td>
                                   
                                </tr>
                                <?php
                        $i += 1;
                    }
            ?>
                            </tbody>
                        </table>
                        <br />
                        <center>
                      <input type="button" name="volver" id="volver" onclick="regresar()" value="VOLVER"   />   </center>
<div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>

</form>
</body>
</html>