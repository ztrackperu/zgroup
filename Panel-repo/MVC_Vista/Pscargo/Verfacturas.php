<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
		$udni=$item['login'];
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte Guias Remision</title>

<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	
	
	$("#proveedor").autocomplete("../MVC_Controlador/PscargoC.php?acc=entauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#proveedor").result(function(event, data, formatted) {
		$("#proveedor").val(data[1]);
		$("#codprov").val(data[3]);


	});
});

function zzzhabilita(){
document.form1.proveedor.value=='111';
document.form1.codprov.value=='111';	
	}

function habilita(){
	
	if(document.getElementById('chkprov').checked ==true){
	
		document.form1.proveedor.value=='';
		document.form1.codprov.value=='';
		document.getElementById('proveedor').disabled=true
		}else{
		
		document.form1.proveedor.value=='';
		document.form1.codprov.value=='';
	document.getElementById('proveedor').disabled=false	
			}
	
	}
function abrirventana(obj){
	//alert('hola');
			var codigo=obj;
			var tipo='1';
	
				miPopup = window.open("../MVC_Controlador/PscargoC.php?acc=verdetafac&udni=<?php echo $udni;?>&cod="+codigo+"&tip="+tipo,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			
		}
		
function regresar(){
location.href="../MVC_Controlador/PscargoC.php?acc=verfacs&udni=<?php echo $_GET['udni'] ?>"; 
}	
		
		

		
</script>
<!--<img src="../../images/word.gif" width="30" height="30" />-->
<style type="text/css">
    #elSel {
		font-size: 20px;
        font-family: Arial, Helvetica, sans-serif; 
        padding-left: 45px;
        background-repeat: no-repeat;
        background-position: 3px 50&#37;;
    }
    #elSel option {
        padding-left: 35px;
        background-repeat: no-repeat;
        background-position: 3px 50%;
    }
    #opcion1 {
        background-image: url(../images/excel.gif);
    }
    #opcion2 {
        background-image: url(../images/word.gif);
    }
    #opcion3 {
        background-image: url(../images/pdf.gif);
    }
    #opcion4 {
        background-image: url(../images/icono-explorer.gif);
    }
     
    </style>
    
</head>
<body style="height: 100%; font-weight: bold;" > 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=guardarCoti&udni=<?php echo $udni;?>&fw=<?php echo $fw;?>">

<table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center">
       
        </td>
    </tr>
  
    <tr>
      <td height="113"><table width="70%" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
        <table width="97%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" >
          <thead>
            <tr align="center">
              <td colspan="9"><H3>Facturas SISPAC para pasar a sistema contable.&nbsp;&nbsp;&nbsp; ROUTING:<?php echo $fw;?></H3></td>
            </tr>
            <tr align="center">
              <td colspan="9"><p>&nbsp;</p></td>
            </tr>
            <tr align="center">
              <td width="80" align="center" bgcolor="#CCCCCC">Factura </td>
              <td width="150" align="center" bgcolor="#CCCCCC">Cliente</td>
              <td width="80" align="center" bgcolor="#CCCCCC">Fecha</td>
              <td width="222" align="center" bgcolor="#CCCCCC">Glosa</td>
              <td width="50" align="center" bgcolor="#CCCCCC">Moneda</td>
              <td width="50" align="center" bgcolor="#CCCCCC">T.total</td>
              <td width="50" align="center" bgcolor="#CCCCCC">Igv</td>
              <td width="50" align="center" bgcolor="#CCCCCC">T.Neta</td>
              <td width="60" align="left" bgcolor="#CCCCCC">Ver detalle</td>
              <td width="70" align="left" bgcolor="#CCCCCC">Ver Datos Registrados</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    

					
					$i = 1;	
					if($reporte!= ""){	
                    foreach($reporte as $item)
                    { 
					//$Cxc_Ndoc=$item["Cxc_Ndoc"];
					//if($c_numped!=$Cxc_Ndoc){
					$n_fw=$item["Cxc_KAna"];
					 $facx=$item["Cxc_Kdoc"]
					   
					   
					
	
            ?>
            <tr  onMouseOver="this.style.backgroundColor='#99FFFF';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo $item["Cxc_Ndoc"];?> <input name="c_numped<?php echo $i;?>" id="c_numped<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Ndoc"];?>"/></td>
              <td align="center" ><?php echo utf8_encode($item["Ent_Rsoc"]);?><input name="c_nomcli<?php echo $i;?>" id="c_nomcli<?php echo $i;?>" type="hidden" value="<?php echo $item["Ent_Rsoc"];?>"/></td>
              
              <td align="center"><?php echo date("d/m/Y", strtotime($item["Cxc_Femi"])); ?> <input name="fecha<?php echo $i;?>" id="fecha<?php echo $i;?>" type="hidden" value="<?php echo date("d/m/Y", strtotime($item["Cxc_Femi"])); ?>"/></td>
              <td align="center" ><?php echo $item["Cxc_Glos"];?><input name="c_asunto<?php echo $i;?>" id="c_asunto<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Glos"];?>"/></td>
              <td align="center"><?php echo $item["Cxc_Mone"];?><input name="moneda<?php echo $i;?>" id="moneda<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Mone"];?>"/></td>
              <td align="center"><?php echo $item["Cxc_Tota"];?><input name="n_neta<?php echo $i;?>" id="n_neta<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Tota"];?>"/></td>
              <td align="center"><?php echo $item["Cxc_Igv"];?><input name="n_totigv<?php echo $i;?>" id="n_totigv<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Igv"];?>"/></td>
              <td align="center"><?php echo $item["Cxc_Tnet"];?><input name="n_totped<?php echo $i;?>" id="n_totped<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Tnet"];?>"/></td>             
              <td align="center"><a href="#" onclick="abrirventana('<?php echo $item["Cxc_Kdoc"]; ?>')"> <img src="../images/buscar.png" alt="" width="9" height="13" /></a></td>
              <td align="center"> 
 			  <?php 
			   
			  
			  if($item["guia_remis"]=='1') {
				  
				  ?>
              <strong style="color:#060">
              Procesado..</strong>
			  <?php 
			 }else{
				  ?>
                            <strong style="color:#F00">    
              Sin Procesar.</strong>
			  <?php 
			  }
			  ?>
              
			  
			  </td>
              
              <!-- aqui vizualizar cotizacion -->
                          
              <td align="center"><input name="n_tcamb<?php echo $i;?>" id="n_tcamb<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Tica"];?>"/></td>
              <td align="center"><input name="n_tasigv<?php echo $i;?>" id="n_tasigv<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Pigv"];?>"/></td>
              <td align="center"><input name="n_dscto<?php echo $i;?>" id="n_dscto<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Tdsc"];?>"/></td>  
              <td align="center"><input name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_Kdoc"];?>"/></td>  
              <td align="center"><input name="ruc<?php echo $i;?>" id="ruc<?php echo $i;?>" type="hidden" value="<?php echo $item["Ent_Ruc"];?>"/></td>  
              <td align="center"><input name="Cxc_swcot<?php echo $i;?>" id="Cxc_swcot<?php echo $i;?>" type="hidden" value="<?php echo $item["Cxc_swcot"];?>"/></td>  
              
              
              <!--<td align="center"><input type="submit" name="button" id="button" value="Procesar" /></td>  -->
              
            </tr>
            <?php
                     $i += 1;
                    }
					}
            ?>
          </tbody>
        </table></td>
    </tr>

   
  </table>
  
  <br /><center> <input type="submit" name="button" id="button" value="PROCESAR" /><input type="button" onclick="regresar();" name="button" id="button" value="VOLVER" /> </center>
</form>
</body>
</html>