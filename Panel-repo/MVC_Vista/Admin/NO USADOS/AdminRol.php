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
	
	var mensaje='Seguro de Eliminar el rol del menu: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/AdminC.php?acc=eliminarmenurol&id="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}

</script>

<!--PARA LA SELECCCION-->
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
 
	//Checkbox ROL
	$("input[name=rol]").change(function(){
		$('input[class=checklote]').each( function() {			
			if($("input[name=rol]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
 
});


$(document).ready(function(){
 
	//Checkbox ELIMINAR
	$("input[name=selelim]").change(function(){
		$('input[class=checkelim]').each( function() {			
			if($("input[name=selelim]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
 
});


$(document).ready(function(){
 
	//Checkbox MENU
	$("input[name=selmenu]").change(function(){
		$('input[class=checkmenu]').each( function() {			
			if($("input[name=selmenu]:checked").length == 1){
				this.checked = true;
			} else {
				this.checked = false;
			}
		});
	});
 
});

</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<div class="onecolumn">
                   <div class="header"><strong>LISTA DE LOS ROLES Y MENUS QUE PUEDEN ACCEDER</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
 &nbsp;&nbsp;&nbsp;
<strong>Nuevo Rol </strong><a href="../MVC_Controlador/AdminC.php?acc=nuevorol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/nuevo.png" width="40" height="40" /></a>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong> Asignar Roles </strong>

<a href="../MVC_Controlador/AdminC.php?acc=asignarRol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/rol.png" width="60" height="48" /></a>  &nbsp;&nbsp;&nbsp;
                    


                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                               <tr>
                                  <th colspan="14" style="width:5%"><input type="radio" name="sw" id="sw" value="1"  /> ROL
                                  
                                 
                                  
                                  <input name="sw" type="radio" id="sw" value="2"  />  MENU</th>
                                </tr>
                                <tr>
                                  <th colspan="10" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                  
                                  <input type="submit" name="button" id="button" value="FILTRAR" formaction="../MVC_Controlador/AdminC.php?acc=verrol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" />
                                  
                                </tr>
                                <tr>
                                  <th width="4%"  >ID</th>
                                  <th width="6%"  >Id del Rol</th>
                                    <th width="13%"  >Nombre del Rol</th>
                                    <th width="10%" >Asignar Menu <input name="selmenu"  id="selmenu" type="checkbox" value=""  /> </th>
                                    <th width="5%" >Id del Menu</th>
                                  <th width="20%"  >Nombre del Menu</th>
                                  <th width="10%"  >Asignar Rol
                                  <input name="rol"  id="rol" type="checkbox" value=""  /> </th>
                                  <th width="12%" align="center" >Actualizar Rol</th>
                                  <th width="20%" align="center" >Eliminar <input name="selelim"  id="selelim" type="checkbox" value="" /> </th>
                                  
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listaos = $resulos;?>
                                <?php 
                    $i = 1;
										if($listaos!=NULL)
					{
                    foreach($listaos as $item1)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                  <td><?php echo $item1["IdMenuRol"];?></td>
                                  <td bgcolor="#E6FFE9"><?php echo utf8_encode($item1[1]);?></td>
                                  <td bgcolor="#E6FFE9"><?php echo utf8_encode($item1[15]);?> </td>
                                  <td  bgcolor="#E6FFE9" align="center"><input class='checkmenu' name="<?php  echo 'me'.$i ?>" type="checkbox"  id="<?php echo 'me'.$i ?>"  value="<?php echo $item1["IdRol"]; ?>"   /></td>
                                  <td  bgcolor="#D9FAFF"><?php echo utf8_encode($item1[2]);?></td>
                                  <td  bgcolor="#D9FAFF"> <?php echo utf8_encode($item1[5]);  ?></td>
                                  <td bgcolor="#D9FAFF" align="center"><input class='checklote' name="<?php  echo 'ro'.$i ?>" type="checkbox"  id="<?php echo 'ro'.$i ?>"  value="<?php echo $item1["IdMenu"]; ?>"  /> </td>
                                  <td bgcolor="#FFFFFF" align="center"><a href="../MVC_Controlador/AdminC.php?acc=updateRol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&id=<?php echo $item1["IdMenuRol"];?>"><img src="../images/rol.png" width="30" height="22" /></a> </td>
                                  <td bgcolor="#FFFFFF" align="center">        
                                    
                                  <a href="#" onclick="eliminaroc('<?php echo $item1["IdMenuRol"];?>','<?php echo $_GET['udni'];?>')"  ><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a> &nbsp;&nbsp;
                                  <input class='checkelim' name="<?php  echo 're'.$i ?>" type="checkbox"  id="<?php echo 're'.$i ?>"  value="<?php echo $item1["IdMenuRol"]; ?>"  /> 
                                   
                                    
  <!--<a href="../MVC_Vista/Compras/Reportes/impoc.php?os="><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Datos" /></a>&nbsp;-->
                                    
                                 
                                    
                                  </td>
                                   
                                </tr>
                                <?php
                        $i += 1;
                    }}
            ?>
                            </tbody>
                            
                             <tr>
                                  <th colspan="6"  align="center" bgcolor="#E6FFE9" ><input type="submit" name="button" id="button" value="Asignar Menu" formaction="../MVC_Controlador/AdminC.php?acc=asignarSelMenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" /></th>
                                  <th bgcolor="#D9FAFF" colspan="2"  >
                                 <input type="submit" name="button" id="button" value="Asignar Rol" formaction="../MVC_Controlador/AdminC.php?acc=asignarSelRol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" />
                                  </th>
                                  
                            
                                  <th width="27%" align="center" > <input type="submit" name="button" id="button" value="Eliminar" formaction="../MVC_Controlador/AdminC.php?acc=eliminarSelMenurol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>" /> </th>
                                  
                                      
                                </tr>
                         
                            
                            
                            
                            
                        </table>
                        <br />
                        <center>
                      
                     
                        </center>
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>

</form>
</body>
</html>