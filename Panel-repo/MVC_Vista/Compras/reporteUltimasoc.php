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
	
	var mensaje='Seguro de Eliminar Orden de Compra Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/ComprasC.php?acc=eliminaroc&os="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}

function CambiaProducto(){
document.getElementById('idprod').value=document.form1.c_codprd.options[document.form1.c_codprd.selectedIndex].value;
	//alert('hola');

	}

</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ComprasC.php?acc=reporte03&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>&c_codprd=<?php echo $_REQUEST['c_codprd'];?>">
<div class="onecolumn">
                    <div class="header"><strong>ULTIMAS ORDENES DE COMPRA DE CADA PRODUCTO</strong></div>
                    <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>



<br class="clear"/>
</div>
                    <div class="content">
                            
              <?php $ven = reporteocC();  
			  ?>
			
              
                        <table width="521" border="0">
                          <tr>
                            <td width="186">SELECCIONE PRODUCTO:</td>
                            <td width="177"><select name="c_codprd" id="c_codprd" class="Combos texto" onchange="submit()">
           <option value=".::SELECCIONE::.">.::SELECCIONE::.</option>
            <?php foreach($ven as $item){
				$idprod=$_REQUEST['c_codprd'];
			    $nombreprod= utf8_encode(strtoupper($item["c_desprd"]));
				
			?>
            
            
 <option value="<?php echo $item["c_codprd"]?>" <?php if($item["c_codprd"]==$idprod){?> selected <?php } ?> ><?php echo $nombreprod; ?> </option>
    
            <?php }	?>
          </select></td>
                            <td width="144"><input name="idprod" id="idprod" type="hidden" value="<?php echo $idprod; ?>" /></td>
                          </tr>
                        </table>
  
                 
           
                    
                    
                        <table class="data" width="894" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                
                                <tr>
                                  <th width="8%"  >Nro</th>
                                    <th width="16%"  >Nro Orden  de Compra</th>
                                    <th width="15%" >Producto</th>
                                    <th width="17%" >Proveedor</th>
                                    <th width="11%" >Moneda</th>
                                    <th width="11%" >Precio</th>
                                    <th width="11%" >Cantidad</th>
                                    <th width="11%" >Fecha</th>                                 
                                </tr>
                            </thead>
                            <tbody>
                    
                     <?php 
					 
					    $lista = $reporte2;									
						$i = 1;
						if($lista!=NULL){
														
							foreach($lista as $itemx)
							{ 

            		?>   
                    <tr>
                      <td bgcolor="#FFFFCC"><?php echo $i;?></td>
                      <td bgcolor="#FFFFCC"><?php echo $itemx["c_numeoc"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo $itemx["c_desprd"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo utf8_decode($itemx["c_nomprv"]);?></td>
                      <td bgcolor="#FFFFCC"><?php if($itemx["c_codmon"]=='0'){$moneda='NUEVOS SOLES';}else{$moneda='DOLARES AMERICANOS';} echo $moneda;?></td>
                      <td bgcolor="#FFFFCC"><?php echo $itemx["n_preprd"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo $itemx["n_canprd"];?></td>
                      <td bgcolor="#FFFFCC"><?php echo vfecha(substr($itemx["d_fecreg"],0,10));?></td>
                    </tr>
                               
					 <?php
                            $i += 1;
                          }}
                    ?>
                            </tbody>
                        </table>
                      
  <br /> 
                               
                 
                      
<div id="chart_wrapper" class="chart_wrapper"></div>
                      <!--  <div class="pagination"> <a href="">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>-->
  
</div>




</form>
</body>
</html>