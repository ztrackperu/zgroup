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

function cambiatransaccion(){
document.getElementById('des').value=document.form1.transaccion.options[document.form1.transaccion.selectedIndex].value;	

	}
	
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



</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/NotaC.php?acc=adminns&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&idtransac=<?php echo $_REQUEST["transaccion"];?>">
<div class="onecolumn">
                   <div class="header"><strong>LISTA DE  NOTAS DE SALIDA</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
 &nbsp;&nbsp;&nbsp;
<strong>Nuevo Nota de Salida</strong><a href="../MVC_Controlador/NotaC.php?acc=registrarNotaSalida&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>"><img src="../images/nuevo.png" width="40" height="40" /></a>


                    


                    <div class="content">
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                               
                                <tr align="center">
                                  <th  align="center" >&nbsp;</th>
                                
                                  <th colspan="1"  align="center" >SELECCIONE UNA TRANSACCION</th>
                                  <th colspan="4"  align="center" >
  <?php $ven1 = transacSalidaC();  
			  ?>
			<select name="transaccion" id="transaccion" class="Combos texto" onchange="submit()"  style="width:174px"  >
					  <option value="">.::SELECCIONE::.</option>
              <?php foreach($ven1 as $item1){
				 $tt_codi=$item1["TT_CODI"];
			     $tt_desc=$item1["TT_DESC"];	
				?>
              <option value="<?php echo $tt_codi?>"><?php echo $tt_desc?></option>
              <?php }	?>
             
			</select>
             <input type="text" name="des" id="des"   />
             </th>        
                                  
                                </tr>
                                <tr>
                                  <th width="6%" >Item</th>
                                  <th width="13%" >Nº DOC</th>
                                  <th width="20%"  > Cliente/Proveedor</th>
                                  <th width="15%"  >Usuario</th>
                                  <th width="19%"  >Reportes</th>
                                  <th width="27%"  >Mantenimiento  </th>
                                  
                                      
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
                                  <td   bgcolor=""><?php echo $i;?></td>
                                  <td   bgcolor=""><?php echo $item1["NT_NDOC"]; ?></td>
                                  <td  bgcolor=""><?php echo $item1["NT_CCLI"];?></td>
                                  <td  bgcolor=""><?php echo $item1["NT_OPER"];?>
                                  
                                  
                                   </td>
                                  <td bgcolor="" >
                                  
                                  <a href="../MVC_Controlador/NotaC.php?acc=imprimirticket&os=<?php echo $item1["NT_NDOC"]; ?>"><img src="../images/ticket.png" width="19" height="19" title="Formato Ticket" /></a>&nbsp; &nbsp;
                                  
                                  <a href="../MVC_Controlador/NotaC.php?acc=imprimirNotaSalida&os=<?php echo $item1["NT_NDOC"]; ?>"><img src="../images/estandar.png" width="19" height="19" title="Formato Standar" /></a>&nbsp;
                                  
                                  </td>
                                  <td bgcolor="" >        
                                    
                                  <a href="#" onclick="eliminaroc('<?php echo $item1["IdMenuRol"];?>','<?php echo $_GET['udni'];?>','<?php echo $_REQUEST["IdRol"];?>')"  ><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a> &nbsp;&nbsp;
                               
                                   
                                    
  <!--<a href="../MVC_Vista/Compras/Reportes/impoc.php?os="><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Datos" /></a>&nbsp;-->
                                    
                                 
                                    
                                  </td>
                                   
                                </tr>
                                <?php
                        $i += 1;
                    }}
            ?>
                            </tbody>
                             <tr>
                                  
                                  <th align="center" colspan="4" >  </th>
                                  <th width="19%" >&nbsp;</th>
                            
                                  <th width="27%" >  <input type="submit" name="button" id="button" value="Eliminar" formaction="../MVC_Controlador/AdminC.php?acc=eliminarSelMenurol&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&IdRol=<?php echo $_REQUEST["IdRol"];?>" /> </th>
                                  
                                      
                                </tr>
                        </table>
                          
<br />   
                    
                  
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                      <!--  <div class="pagination"> <a href="">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>-->
  
</div>

</form>
</body>
</html>