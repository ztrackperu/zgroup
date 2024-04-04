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
	
	var mensaje='Seguro de Eliminar al usuario: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/AdminC.php?acc=eliminarusu&id="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=verusuario&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
                    <div class="header"><strong>LISTA DE USUARIOS</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo usuario</strong>

<a href="../MVC_Controlador/AdminC.php?acc=nuevousuario&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/nuevousuario.png" width="48" height="48" /></a> 

<!--<select name="cantidad" id="cantidad" >

<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>


</select>-->

                    <div class="content">
                        <table id="data" class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="9" style="width:5%"><input type="radio" name="sw" id="sw" value="1" checked="checked"  /> DNI
                                  
                                 
                                  
                                  <input name="sw" type="radio" id="sw" value="2"  />  USUARIO</th>
                                </tr>
                                <tr>
                                  <th colspan="9" style="width:5%"><input name="des" type="text" id="des" size="40" value="<?php echo !empty($_REQUEST['des'])?$_REQUEST['des']:""; ?>" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;&nbsp;
<img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina&nbsp; &nbsp;
<!--<img src="../images/pdf.gif" alt="1" width="19" height="19" title="Ver Orden" />imprime&nbsp; -->
                                </tr>
                                <tr>
                                  <th width="4%"  >ID</th>
                                    <th width="10%"  >DNI</th>
                                    <th width="10%" >Usuario</th>
                                    <!--<th width="10%" >Clave</th>-->                                 
                                  <th width="20%" >Apellidos</th>
                                  <th width="15%" > Nombres</th>
                                  <th width="10%" >Rol</th>
                                  <th width="21%" align="center" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php	
												
							 $listaos = $resulos;
							
							 
							 
							 
							 ?>
                                <?php 
                    $i = 1;
										if($listaos!=NULL)
{
                    foreach($listaos as $item)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                  <td><?php echo $item["idUsuario"];?></td>
                                    <td><?php echo $item["udni"];?></td>
                                  <td bgcolor="#FFFFCC"><?php echo $item["usuario"];?> </td>
                                  <!--<td bgcolor="#FFFFCC"><?php /*?><?php echo $item["clave"];  ?><?php */?></td>-->
                                    
                                    
                                 
                                  <td bgcolor="#CFFBFE"><?php echo utf8_encode($item["paterno"])." ". utf8_encode($item["materno"]) ;  ?></td>
                                  <td  bgcolor="#CFFBFE"> <?php echo utf8_encode($item["nombres"]);  ?></td>
                                  <td ><?php echo utf8_encode($item["Nombre"]);  ?></td>
                                  
                       
                                    <td bgcolor="#FFFFFF" align="center">


 <a href="../MVC_Controlador/AdminC.php?acc=updateusu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $item["idUsuario"];?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a>&nbsp; &nbsp; 

 
 <a href="#" onclick="eliminaroc('<?php echo $item["idUsuario"];?>','<?php echo $_GET['udni'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a> &nbsp;&nbsp; 
 
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
                       <div class="pagination">
                      	
                       	<?php
						
							$totxlet=$totxlet1;
							$pagxlet=ceil($totxlet/10);							
	
	
		if ($pagxlet > 1) {
			
			for ($i=0;$i<$pagxlet;$i++) {
				
         	if ($i==$pag){
				//echo $sel= ($i+1);
                    $zaq=!empty($_REQUEST['des'])?$_REQUEST['des']:"";
				echo "<a class='active' href='../MVC_Controlador/AdminC.php?acc=verusuario&udni=".$_GET['udni']."&mod=".$_GET['mod']."&des=".$zaq."&sw=".$_REQUEST['sw']."&pag=".$i."'>".($i+1).'</a>';
			}else{
                    $zeq=!empty($_REQUEST['des'])?$_REQUEST['des']:"";
			echo "<a href='../MVC_Controlador/AdminC.php?acc=verusuario&udni=".$_GET['udni']."&mod=".$_GET['mod']."&des=".$zeq."&sw=".$_REQUEST['sw']."&pag=".$i."'>".($i+1).'</a>';
			}
			                    
				
/*<a  href="../MVC_Controlador/AdminC.php?acc=verusuario&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&pag=<?php echo $i?>" ><?php echo ($i+1)?>		
</a>*/   				
					
				//if ($i!=($pagxlet-1)) echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			}
			
		}                         
                       
           ?>             
              
                         
                   
              </div>          
            <br />            
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                      <!--  <div class="pagination"> <a href="">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>-->
  
</div>


</form>
</body>
</html>