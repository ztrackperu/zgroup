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
function eliminardoc(c_numcd,udni){
	
	var nro=c_numcd;
	var dni=udni
	
	var mensaje='Seguro de Eliminar el Registro de Documento Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/ControlDocC.php?acc=eliminardoc&c_numcd="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
 
}
</script>

<style type="text/css">
.alinear{float: left;margin-left:10px;}
</style>





</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ControlDocC.php?acc=AdminDoc&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
                    <div class="header"><strong>LISTADO DE DOCUMENTOS</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
<strong>Nuevo</strong>

<a href="../MVC_Controlador/ControlDocC.php?acc=regDoc&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a>

<br class="clear"/>

                    <div class="content alinear">
                        <table class="data" width="701" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="9" style="width:5%"><input type="radio" name="sw" id="sw" value="1" checked="checked" /> 
                                  NUMERO DE ENVIO/                                                          
                                    <input name="sw" type="radio" id="sw" value="2"  /> USUARIO</th>
       
                                </tr>
                                <tr>
                                  <th colspan="9" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                  <input type="submit" name="button" id="button" value="FILTRAR" />
                                  &nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/detallecerrado.png" alt="editar" width="22" height="19" class="help" title="Validar Documentos" />Validar documentos&nbsp;&nbsp;&nbsp;<img src="../images/pdf.gif" alt="1" width="19" height="19" title="Ver Orden" />imprime &nbsp;&nbsp; <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />elimina</th>
                                </tr>
                                <tr>
                                  <th width="3%"  >Nro</th>
                                  <th width="6%" >Envio</th>
                                  <!--<th width="7%" >Item</th>
                                  <th width="7%" >Tipo Doc.</th>-->
                                  <th width="8%" >Fecha Reg.</th>
                                  <th width="9%" >Usuario Reg.</th>
                                  <th width="9%" >Estado</th>
                                  <th width="10%" >Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listaos = $ListaDocumentos;?>
                            <?php 
							    $i = 1;
						
								if($listaos!=NULL){
								foreach($listaos as $item)
								{ 
				
							?>
                    <tr>
                      <td><?php echo $i; ?>&nbsp;</td>
                      <td><?php echo $item["c_numcd"];  ?></td>
                      
                   <!--   <td><?php //echo $item["n_item"];  ?></td>-->
                     <!-- <td><?php //echo $item["C_DESITM"];?></td>-->
                      <td bgcolor="#E5E5E5"><?php echo  vfecha(substr($item["d_fecreg"],0,10)); ?></td>
                      <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_opereg"]);?></td>
                      <td bgcolor="#E5E5E5">
					  
                      <?php if($item["estado"]!=0) {
						    
					   echo '<strong style="color:#00F;">PARCIAL</strong>';	

					  }else{
						  
					   echo '<strong style="color:#F00;">COMPLETO</strong>';					 					  
						  }
					  ?>
                     
                      
                      </td>
                      <td bgcolor="#FFFFFF">
						<?php  if($item["estado"]!=0){ ?>	
						<a href="../MVC_Controlador/ControlDocC.php?acc=validar&mod=<?php echo $_GET['mod'] ?>&amp;c_numcd=<?php echo $item["c_numcd"];?>&amp;udni=<?php echo $val;?>"> <img src="../images/detallecerrado.png" alt="editar" width="22" height="19" class="help" title="Validar Documentos" /></a>									
						<?php
					  }
					  
					  ?>	
							<a href="../MVC_Vista/ControlDoc/print/print1.php?c_numcd=<?php echo $item["c_numcd"]; ?>&amp;udni=<?php echo $_GET['udni']; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Documento" /></a>&nbsp;
							<a href="../MVC_Controlador/ControlDocC.php?acc=verdocumentos&c_numcd=<?php echo $item["c_numcd"]; ?>&amp;udni=<?php echo $_GET['udni']; ?>"><img src="../images/search.gif" width="19" height="19" title="Ver Documento" /></a>&nbsp;
                            
                        <!--<a href="../MVC_Vista/ControlDoc/Reportedoc.php?c_numcd=<?php //echo $item["c_numcd"]; ?>&amp;udni=<?php //echo $_GET['udni']; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Documento" /></a>&nbsp;-->                            
							<a href="#" onclick="eliminardoc('<?php echo $item["c_numcd"];?>','<?php echo $_GET['udni'];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
							 
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