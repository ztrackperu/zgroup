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
	
	
	function regresar(){
	location.href="../MVC_Controlador/PscargoC.php?acc=verfacsis&udni=<?php echo $_GET['udni'] ?>&fw=<?php echo $_REQUEST['fw'];?>"; 
	}
</script>
<!--<img src="../../images/word.gif" width="30" height="30" />-->
<style type="text/css">
    #elSel {
		font-size: 20px;
        font-family: Arial, Helvetica, sans-serif; 
        /*padding-left: 45px;
        background-repeat: no-repeat;
        background-position: 3px 50&#37;*/
    }
    #elSel option {
        /*padding-left: 35px;*/
        background-repeat: no-repeat;
       /* background-position: 3px 50%;*/
    }
   
     
    </style>
    
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=eliminarcoti&udni=<?php echo $udni;?>&fac=<?php echo $fac;?>&fw=<?php echo $_REQUEST['fw'];?>">

<table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td>
       
      </td>
    </tr>
  
    <tr>
      <td height="113"><table width="200" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
        <table width="61%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:12px" >
          <thead>
            <tr align="center">
              <td colspan="8"> factura N° &nbsp; &nbsp;<?php echo $fac;?></td>
            </tr>
            <tr align="center">
              <td colspan="8"><p>&nbsp;</p></td>
            </tr>
            <tr align="center">
              <td width="50" align="center" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="99" align="center" bgcolor="#CCCCCC">N° Item</td>
              <td width="99" align="center" bgcolor="#CCCCCC">Descripcion</td>
              <td width="52" align="center" bgcolor="#CCCCCC">Cantidad</td>
              <td width="56" align="center" bgcolor="#CCCCCC">Moneda</td>
              <td width="48" align="center" bgcolor="#CCCCCC">T.unitario</td>
              <td width="48" align="center" bgcolor="#CCCCCC">Total</td>
              <td width="287" align="center" bgcolor="#CCCCCC">&nbsp;</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
					$sum=0;
					if($reporte!= ""){
						foreach($reporte as $item)
						{ 
					
	
            ?>
            <tr  onMouseOver="this.style.backgroundColor='#99FFFF';" onMouseOut="this.style.backgroundColor='#ffffff';">
          
              <td align="center"></td>
              <td align="center" ><?php echo $item["n_item"];?></td>
              <td align="center" ><?php echo utf8_encode($item["c_desprd"]);?>&nbsp;</td>
              <td align="center" ><?php echo $item["n_canprd"];?></td>
              <td align="center"><?php $idmoneda=$item["c_codmon"];if($idmoneda=='0'){$moneda='NUEVOS SOLES';}else{$moneda='DOLARES AMERICANOS';} echo $moneda;?></td>
              <td align="right"><?php echo $item["n_preprd"];?></td>
              <td align="right"><?php echo $item["n_prelis"];?></td>
              <td align="center"><input name="fw" id="fw" type="hidden" value="<?php echo $fw=$item["fw"];?>" /></td>
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
			$sum=$sum+$item["n_prelis"];
                     $i += 1;
                    }
				}
            ?>
          </tbody>
        </table>
        <table width="349" border="0">
          <tr>
            <td width="343" align="right" valign="baseline">Total= <?php echo $sum ?>&nbsp;</td>
          </tr>
          <tr>
            <td align="right" valign="baseline">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="baseline">
            <input type="submit" name="button" id="button" value="ELIMINAR" /><input type="button" name="volver" id="volver" onclick="regresar();" value="VOLVER"  /></td>
          </tr>
        </table>
        <p>&nbsp;</p></td>
    </tr>



  </table>
</form>
</body>
</html>