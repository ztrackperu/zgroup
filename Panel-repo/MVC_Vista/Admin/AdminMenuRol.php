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
function eliminaroc(os,udni,IdRol){
	
	var nro=os;
		var dni=udni
		var IdRol=IdRol
	
	var mensaje='Seguro de Eliminar el rol del menu: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/AdminC.php?acc=eliminarmenurol&id="+nro+"&udni="+dni+"&IdRol="+IdRol;
 }else{
	 return false;
	}
 
 
 
}

/*function datosmenu(){
document.getElementById('des').value=document.form1.IdRol.options[document.form1.IdRol.selectedIndex].value;
}*/

function obtenerIdMenu(){

var idMenu=document.getElementById('des').value;
return idMenu;	
	
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/AdminC.php?acc=verrol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&IdRol=<?php echo $_REQUEST["IdRol"];?>">
<div class="onecolumn">
                   <div class="header"><strong>LISTA DE LOS ROLES Y MENUS QUE PUEDEN ACCEDER</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
 &nbsp;&nbsp;&nbsp;
<strong>Nuevo Rol </strong><a href="../MVC_Controlador/AdminC.php?acc=nuevorol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/nuevo.png" width="40" height="40" /></a>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong> Asignar Menu </strong>

<a href="../MVC_Controlador/AdminC.php?acc=asignarMenu&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&IdRol=<?php echo $_REQUEST["IdRol"];?>"><img src="../images/rol.png" width="60" height="48" /></a>  &nbsp;&nbsp;&nbsp;
                    


                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                               
                                <tr align="center">
                                  <th  align="center" >&nbsp;</th>
                                
                                  <th colspan="1"  align="center" >SELECCIONE UN ROL</th>
                                  <th colspan="2"  align="center" >
 
			<?php $ven = listarRolC(); ?>
      <!--<select name="IdRol" id="IdRol" class="Combos texto"  >-->
      <select name="IdRol" id="IdRol" class="Combos texto" onchange="submit()"  >
      
        <option value="">.::TODOS::.</option>
        <?php foreach($ven as $item){
			$idr=$_REQUEST['IdRol'];
			$nombre= strtoupper($item["Nombre"]);
			
		?>
        <option value="<?php echo $item["IdRol"]?>" <?php if($item["IdRol"]==$idr){?> selected <?php } ?> ><?php echo $nombre; ?> </option>
        
        
		<?php		
		
		 }	
		 
		 ?>
      </select>
      
    <input name="des"  id="des" type="text" value="<?php echo $idr; ?> " />        
                                  
                                </tr>
                                <tr>
                                  <th width="15%" >Nº</th>
                                  <th width="15%" >Id del Menu</th>
                                  <th width="43%"  >Nombre del Menu</th>
                                  <th width="42%"  >Eliminar <input name="selelim"  id="selelim" type="checkbox" value="" /> </th>
                                  
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
							$listaos = $resulos;?>
                                <?php 
                    $i = 1;
										if($listaos!=NULL)
					{
                    foreach($listaos as $item1)
                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from

            ?>
                                <tr>
                                  <td   bgcolor=""><?php echo $item1["IdMenuRol"];?></td>
                                  <td   bgcolor=""><?php echo utf8_encode($item1[2]);?></td>
                                  <td  bgcolor=""> 
                                  <?php echo utf8_encode($item1[5]);?>
                                  
                                 <!-- <input name="nombremenu" type="text" id="nombremenu" size="40" value=<?php /*?>"<?php echo utf8_encode($item1[5]);  ?><?php */?>"  />-->
                                  
                                  
                                   </td>
                                  <td bgcolor="" >        
                                    
                                  <a href="#" onclick="eliminaroc('<?php echo $item1["IdMenuRol"];?>','<?php echo $_GET['udni'];?>','<?php echo $_REQUEST["IdRol"];?>')"  ><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a> &nbsp;&nbsp;
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
                                  
                                  <th width="27%" align="center" colspan="3" >  </th>
                            
                                  <th width="27%" >  <input type="submit" name="button" id="button" value="Eliminar" formaction="../MVC_Controlador/AdminC.php?acc=eliminarSelMenurol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&IdRol=<?php echo $_REQUEST["IdRol"];?>" /> </th>
                                  
                                      
                                </tr>
                        </table>
                          
<br /> 
                       <div class="pagination">
                  
                       	<?php
						
							$totxlet=$totxlet1;
							$pagxlet=ceil($totxlet/10);							
	
	
		if ($pagxlet > 1) {
			
			for ($i=0;$i<$pagxlet;$i++) {
         	if ($i==$pag) {
					//echo $sel= ($i+1);
                                            $sqe = 1;
                        echo "<a class='active' href='../MVC_Controlador/AdminC.php?acc=verrol?pag=$i'>".($i+1)."</a>";}
            else{
			   $sqe = !empty($_REQUEST['IdRol'])?$_REQUEST['IdRol']:1;
                           $sqr = !empty($_GET['udni'])?$_GET['udni']:"";
                           $sqt = !empty($_GET['mod'])?$_GET['mod']:"";
			echo "<a onclick='obtenerIdMenu()'  href='../MVC_Controlador/AdminC.php?acc=verrol&udni=".$_GET['udni']."&mod=".$_GET['mod']."&des=".$sqe."&pag=".$i."'>".($i+1).'</a>';			
			
			}
			
                }}                         
                       
           ?>             
              
                         
            </div>         
                    
            <br />            
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                      <!--  <div class="pagination"> <a href="">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>-->
  
</div>

</form>
</body>
</html>