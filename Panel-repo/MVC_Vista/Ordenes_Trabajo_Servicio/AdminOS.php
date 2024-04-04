<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
		$udni=$item['login'];
	}
}
?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
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
function eliminaros(os,udni){
	
	var nro=os;
		var dni=udni
	
	var mensaje='Seguro de Eliminar Orden Servicio Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminaros&os="+nro+"&udni="+dni;
 }else{
	 return false;
	}
 
 
 
}
</script>
<style>
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=veros&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
    <div class="onecolumn">
        <div class="header"><strong>ORDENES DE SERVICIO.</strong></div>
            <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
            <strong>Nuevo</strong><a href="../MVC_Controlador/OrdenTrabajoC.php?acc=formos&udni=<?php echo $val;?>"><img src="../images/nuevo.png" width="48" height="48" /></a><strong>Plantilla Trans. Fluvial</strong><a href="../MVC_Controlador/OrdenTrabajoC.php?acc=formosplantilla&udni=<?php echo $val;?>"><img src="../images/icono-sistemas.png" width="48" height="48" /></a><br class="clear"/>
                &nbsp;&nbsp;&nbsp;<a class="button btn-default" id="export-btn">Export</a>
				<div class="content">
                    <table style="font-size:11px" class="data" cellpadding="0" cellspacing="0" bordercolor="#000000">
                        <thead>
                            <tr>
                                <th colspan="11" style="width:5%">
								 Proveedor / <input type="radio" name="sw" id="sw" value="1" />
                                   Cotizacion Referencia(*)/<input type="radio" name="sw" id="sw" value="2" />
                                    Nro Orden Servicio/<input name="sw" type="radio" id="sw" value="3" checked="checked" />
                                    Nro Placa Vehiculo/<input name="sw" type="radio" id="sw" value="4"  />
                                    Nro Orden de Compra/<input name="sw" type="radio" id="sw" value="5"  />
                                </th>
                            </tr>
                            <tr>
                                <th colspan="11" align="left" style="width:5%">(*)Filtra si solo al momento del registro ingreso el nro de Cotizacion</th>
                            </tr>
                            <tr>
                                <th colspan="11" style="width:5%"><input name="des" type="text" id="des" size="40" />
                                    <input type="submit" name="button" id="button" value="FILTRAR" />
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                            <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" />Editar&nbsp;
                                            <img src="../images/pdf.gif" alt="1" width="19" height="19" title="Ver Orden" />imprime&nbsp; 
                                            <img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar" />Elimina/Anula&nbsp; 
                                            <img src="../images/Coherence.png" alt="3" width="22" height="22" title="Aprobar" />Aprueba 
                                            <img src="../images/iconos/doc.png" alt="5" width="20" height="20" />Libera
                                </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
					<DIV >
                    <table style="font-size:11px" class="data"  cellpadding="0" cellspacing="0" bordercolor="#000000" id="resultsTable">
                        <thead>
                            <tr>
                                <th width="1%" >&nbsp;</th>
                                <th width="9%" >Nro Orden</th>
                                <th width="15%">Proveedor</th>
                                <th width="9%" >Fecha</th>
                                <th width="11%">Asunto</th>
                                <th width="9%" >Cotizacion Referencia</th>
                                <th width="9%" >Documento Referencia 1</th>
                                <th width="9%" >Documento Referencia 2</th>
                                <th width="12%" >Observaciones</th>
                                <th width="12%" >Nro Placa Vehiculo</th>
                                <th width="12%" >Nro Orden de COmpra</th>
                                <th width="7%" >Total</th>
                                <th width="7%" >Estado</th>
                                <th width="7%" >Duplicar</th>
                                <th width="7%" >Aprueba<br/>/Libera</th>
                                <th width="10%">Administrar</th>      
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php   $listaos = $resulos;
                                        $i = 1;
                                            if($listaos!=NULL){
                                foreach($listaos as $item)
                                { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from
                                ?>
                                <td><?php echo $i; ?>&nbsp;</td>
                                <td>OS<?php echo $item["c_numos"];?></td>
                                <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["c_nomprov"]);?> </td>
                                <td bgcolor="#FFFFCC"><?php echo vfecha(substr($item["d_fecos"],0,10));?>&nbsp;</td>
                                <td bgcolor="#FFFFCC"><?php echo $item["c_asunto"];?></td>
                                <td bgcolor="#FFFFFF"><?php echo $item["c_refcoti"];?></td>
                                <td bgcolor="#FFFFFF"><?php if($item["c_tipdoc"]=='001'){$d='F';}elseif($item["c_tipdoc"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc'].$item['c_nrodoc']  ?>&nbsp;</td>
								<td bgcolor="#FFFFFF"><?php if($item["c_tipdoc2"]=='001'){$d='F';}elseif($item["c_tipdoc2"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc2'].$item['c_nrodoc2']  ?>&nbsp;</td>							
                                <td bgcolor="#FFFFFF"><?php echo $item["c_obs"];?></td>
								<td bgcolor="#FFFFFF"><?php echo $item["c_unidad"];?></td>
								<td bgcolor="#FFFFFF"><?php echo $item["c_ocompra"];?></td>
                                <td bgcolor="#FFFFFF"><?php echo $item["n_totos"];?></td>
                                <td bgcolor="#FFFFFF">
                                    <?php if($item['n_swtapr']==0 && $item['c_estado']==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
                                     }elseif($item['n_swtapr']==1 && $item['c_estado']==0){ echo '<strong style="color:#060">Aprobado</strong>';
                                     }elseif($item['c_estado']==2 && $item['n_swtapr']==1){ echo '<strong style="color:#CC9900">Cerrado</strong>';
                                     }elseif($item['c_estado']==4){ echo '<strong style="color:#FF0000">ANULADO</strong>';} ?>&nbsp;</td>
                                <td align="center" bgcolor="#FFFFFF"><a href="../MVC_Controlador/OrdenTrabajoC.php?acc=duplicaos&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>"><img src="../images/icono-descargas.jpg" alt="" width="23" height="22" title="Duplicar Orden Servicio" /></a></td>
                                <td bgcolor="#FFFFFF">
                                    <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0' && $mod=='1'){ ?>
                                    <?php } ?>
                                    <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0' && $mod=='1' && $_GET['udni']!='42541054'){ ?>
                                        <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veraprobacion&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/Coherence.png" width="32" height="32" title="Aprobar Orden Servicio" /></a>
                                </td>
                                    <?php }?>
                                    <?php if($item['n_swtapr']=='1' && $item['c_estado']=='0' && $mod=='1' && $_GET['udni']!='42541054'){ ?>            
                                        <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verliberacionos&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/download.png" width="32" height="32" title="Liberar Orden Servicio" /></a>
                                    <?php } ?> 
                                <td bgcolor="#FFFFFF">
                                        <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verupdaterefcot&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>">  <img src="../images/contact.gif" width="18" height="18" title="Update Referencia" /></a>
                                    <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0'){ ?>
                                            <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=updateos&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>"> <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar" /></a>&nbsp;
                                            <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verimpresionpdf&os=<?php echo $item["c_numos"]; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
                                            <a href="#" onclick="eliminaros(<?php echo $item["c_numos"];?>,<?php echo $_GET['udni'];?>)"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
                                    <?php }else{?>
                                      &nbsp;<a href="../MVC_Controlador/PDF.php?acc=imprimiros&os=<?php echo $item["c_numos"]; ?>"><img src="../images/pdf.gif" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
                                    <?php }?> <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verfrmref&os=<?php echo $item["c_numos"]; ?>&udni=<?php echo $udni;?>&fact=1" title="ref factura 1">
                                                <img src="../images/search.png" width="16" height="16" /></a>
												<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verfrmref&os=<?php echo $item["c_numos"]; ?>&udni=<?php echo $udni;?>&fact=2" title="ref factura 2">
                                                <img src="../images/icon_pages.png" width="16" height="16" /></a>
                                </td>
                            </tr>
                                <?php $i += 1; } } ?>
                        </tbody>
                    </table>
				</DIV>	
                <div id="chart_wrapper" class="chart_wrapper"></div>
                <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
                </div>
    </div>
</form>
</body>
<script>
jQuery(document).ready(function() {
    
    $('#export-btn').on('click', function(e){
        e.preventDefault();
        ResultsToTable();
    });
    
    function ResultsToTable(){    
        $("#resultsTable").table2excel({
           exclude: ".noExl",
					name: "Excel Document Name",
					filename:"ORDENES-SERVICIO.xls",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
        });
    }
	
	$("export-btn22").click(function(){
  $("#resultsTable").table2excel({
    // exclude CSS class
    //exclude: ".noExl",
    name: "Worksheet Name",
    //filename: "SomeFile" //do not include extension
  });
});

});
</script>
</html>