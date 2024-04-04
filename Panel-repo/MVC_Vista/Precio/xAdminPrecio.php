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
<script type="text/javascript">



function filtro(){
	document.getElementById('form1').submit();
	
	}
function eliminarprecio(c_numpre,udni){
	
	var nro=c_numpre;
	var dni=udni
	
	var mensaje='Seguro de Eliminar el Registro de Precio Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/PrecioC.php?acc=EliminarPrecio&c_numpre="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PrecioC.php?acc=AdminPrecio&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
                    <div class="header"><strong>PRECIOS</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo</strong>

<a href="../MVC_Controlador/PrecioC.php?acc=regPrecio&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a>

<br class="clear"/>
                    <div class="content">
                        <table class="data" width="701" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="14" style="width:5%"><input type="radio" name="sw" id="sw" value="1" checked="checked" /> NOMBRE DEL PRODUCTO /                                                          
                                  <input name="sw" type="radio" id="sw" value="2"  /> CODIGO DEL PRODUCTO</th>
       
                                </tr>
                                <tr>
                                  <th colspan="14" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;&nbsp;&nbsp;&nbsp;<img src='../images/detallecerrado.png' name='avatar' title="Ver historial de precios" width="19" height="20">Historial de Precios&nbsp;&nbsp;&nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina</th>
                                </tr>
                                <tr>
                                  <th colspan="4" align="center">Datos de Registro</th>
                                  <th colspan="5" align="center">Datos del Producto</th>
                                  <th colspan="3" align="center">Datos del Precio</th>
                                  <th >&nbsp;</th>
                                </tr>
                                <tr>
                                  <th width="3%"  >&nbsp;</th>
                                  <th width="6%" align="center"  >Nro</th>
                                  <th width="6%" >Fecha</th>
                                  <th width="7%" >Usuario</th>
                                  <th width="8%" >Codigo</th>
                                  <th width="9%" >Nombre</th>
                                  <th width="4%" >Part Number</th>
                                  <th width="5%" >Categ.</th>
                                  <th width="6%" >Cond.</th>
                                  <th width="8%" >Moneda</th>
                                  <th width="8%" >Precio</th>
                                  <th width="5%" >Desc.</th>
                                  <th width="25%" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listaos = $resulos;?>
                            <?php 
							    $i = 1;
								if($listaos!=NULL){
								foreach($listaos as $item)
								{ 

							?>
                    <tr>
                      <td><?php echo $i; ?>&nbsp;</td>
                      <td>P-<?php echo $item["c_numpre"];?></td>
                      <td><?php echo vfecha(substr($item["d_fecreg"],0,10));  ?>&nbsp;</td>
                      <td><?php echo $item["c_oper"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo $item["c_codprd"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_desprd"]);?></td>
                      <td bgcolor="#E5E5E5"><?php echo $item["c_partnum"];?></td>
                      <td bgcolor="#E5E5E5" align="center"><?php echo $item["c_catprd"];?></td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_conprd"]);?> </td>
                      <td bgcolor="#FFFFCC"><?php if($item["c_codmon"]==0){$moneda="NUEVOS SOLES";}else{$moneda="DOLARES AMERICANOS";}echo $moneda;?></td>
                      <td bgcolor="#FFFFCC"><?php echo $item["n_preprd"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo $item["n_dscto"];?></td>
                      <td bgcolor="#FFFFFF">
							
							<a href="../MVC_Controlador/PrecioC.php?acc=updatePrecio&mod=<?php echo $_GET['mod'] ?>&amp;c_numpre=<?php echo $item["c_numpre"];?>&amp;udni=<?php echo $val;?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a>
															
							<!--<a href="../MVC_Controlador/PrecioC.php?acc=listaactualizarPrecio&mod=<?php //echo $_GET['mod'] ?>&amp;c_codprd=<?php //echo $item["c_codprd"];?>&amp;c_catprd=<?php //echo $item["c_catprd"]; ?>&amp;c_conprd=<?php //echo $item["c_conprd"]; ?>&amp;udni=<?php //echo $val;?>"> <img src="../images/icon_edit.png" alt="Actualizar Precio" width="18" height="18" class="help" title="Actualizar Precio" /></a>-->
														
				&nbsp;<a href="../MVC_Controlador/PrecioC.php?acc=reporte&mod=<?php  echo $_GET['mod'] ?>&amp;c_codprd=<?php echo $item["c_codprd"]; ?>&amp;c_catprd=<?php echo $item["c_catprd"]; ?>&amp;c_conprd=<?php echo $item["c_conprd"]; ?>&amp;udni=<?php echo $val;?>"><img src='../images/detallecerrado.png' name='avatar' title="Ver historial de precios por categoria y condicion" width="18" height="20"></a>&nbsp;
                        
                   &nbsp;<a href="../MVC_Controlador/PrecioC.php?acc=reporte2&mod=<?php echo $_GET['mod'] ?>&amp;c_codprd=<?php echo $item["c_codprd"]; ?>&amp;udni=<?php echo $val;?>"><img src='../images/search.png' name='avatar' title="Ver historial de precios por producto" width="28" height="20"></a>&nbsp;     	
							
							<a href="#" onclick="eliminarprecio('<?php echo $item["c_numpre"];?>','<?php echo $_GET['udni'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
							 
					    </td>
                       
                    </tr>
								<?php $i += 1;}}?>   
         </tbody>
      </table>
                      
  <br /> 
                               
                 
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                      <!--  <div class="pagination"> <a href="">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>-->
  
</div>

</div>


</form>
</body>
</html>