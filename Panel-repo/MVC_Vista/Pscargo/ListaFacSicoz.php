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
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PscargoC.php?acc=verfacsis&udni=<?php echo $_GET['udni'] ?>&fw=<?php echo $_REQUEST['fw'];?>">

<table width="105%" border="1" cellpadding="0" cellspacing="0" >
    <tr>
      <td><?php
      // if($reporte == null)        {
    ?>
       
          <div class="column_left" >
            <div class="header"><h3>INTERFAZ SISPAC - SISTEMA CONTABLE</h3></div>
            <span>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="66%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td colspan="2" align="left" >&nbsp;</td>
				        </tr>
					    <tr>
					      <td width="28%" ><p>Digite nro de ROUTING</p></td>
					      <td width="72%" >
				          <input type="text" name="fw" id="fw" /> 
				          (ejemplo 170000248)</td>
				        </tr>
					    <tr>
					      <td colspan="2" align="center" >&nbsp;</td>
				        </tr>
					    <tr>
					      <td colspan="2" align="center" ><input type="submit" name="button" id="button" value="Siguiente"  /></td>
				        </tr>
					    <tr>
					      <td >&nbsp;</td>
					      <td >&nbsp;</td>
				        </tr>
				      </table>
              </div>
            </span></div>
        </center>
        <span>        </span>
        <div id="apDiv3"></div>
        <span>
        <?php //}?>
        </span></td>
    </tr>
    <?php
        if($reporte != null  )
        {
    ?>
    <?php } ?>
  </table>
</form>
</body>
</html>