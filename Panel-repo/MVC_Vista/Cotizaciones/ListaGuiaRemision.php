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
function gestionar() {
		 
		
		 
		if (document.getElementById("op").checked==true){
			document.getElementById("txtfin").value='1'
			
			
			
		}if (document.getElementById("op").checked==false){
		
			document.getElementById("txtfin").value='0'
			
			
									}
		
		
		 
		
		} 
		
function validaBusqueda()
{
	if(document.form1.txtinicio.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.txtfin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}


function anadir(obj) {
  if (obj.checked)
    obj.form1.txtfin.value += obj.value;
  else {
    texto = obj.form1.txtfin.value;
    texto = texto.split(obj.value).join('');
    obj.form1.txtfin.value = texto;
  }  
}

function eliminarguia(guia){

	var nro=guia;
	var mensaje='Seguro de Eliminar Guia Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/cajaC.php?acc=eliminarguiaremision&guia="+nro;
 }else{
	 return false;
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
    
    <script type="text/javascript">

function getReglas() {
    return document.styleSheets[0].cssRules;
}

function getRegla(selector) {
    var reglas = getReglas();
    for(var i=0, l=reglas.length; i<l; i++) {
        if( (reglas[i].selectorText) && (reglas[i].selectorText==selector) ) {
            return reglas[i];
        }
    }
    return false;
}


var elSel = document.getElementById("elSel");
function actualizaImgSelect() {
    var i = elSel.selectedIndex + 1;
    var laRegla = getRegla("#opcion"+i);    
    if( laRegla ) {
        elSel.style.backgroundImage = laRegla.style.backgroundImage;
    }
}

window.onload = actualizaImgSelect;
elSel.onchange = actualizaImgSelect;



function validaBusqueda()
{
	if(document.form1.txtinicio.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.txtfin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}
</script>
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/MisturaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[1]);
	document.formElem.descripcion.focus();
	});
})
;
</script> 

<script type="text/javascript">
$().ready(function() {
	$("#cli").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#cli").result(function(event, data, formatted) {
		$("#cli").val(data[2]);
		$("#codcli").val(data[1]);		
	});	
});
</script> 
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=verrepguia01">
													
  <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reporte == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>Reporte de Guias Remision</div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="100%" colspan="3" align="center" ><input name="sw" type="radio" id="sw" value="2" checked="checked" />
					      Por Fechas:
					        <label for="sw"></label>
					        desde 
					        <label for="textfield"></label>
				          <input name="textfield" type="text" id="textfield" size="12" value="<?php 
						   echo date("d/m/Y");
/*						  $dt_Ayer= date('d/m/Y', strtotime('-1 day')) ; // resta 1 día
$dt_laSemanaPasada = date('d/m/Y', strtotime('-1 week')) ; // resta 1 semana
$dt_elMesPasado = date('d/m/Y', strtotime('-1 month')) ; // resta 1 mes
$dt_ElAnioPasado = date('d/m/Y', strtotime('-1 year')) ; // resta 1 año
echo $dt_laSemanaPasada;*/

?>"/><img src="../images/calendario.jpg" name="Image" id="Image" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield",
					ifFormat   : "%d/%m/%Y",
					button     : "Image"
					  }
					);
		 </script>
				          hasta
				          <label for="textfield2"></label>
				          <input name="textfield2" type="text" id="textfield2" size="12" value="<?php 
						  echo date("d/m/Y");
						  
						  /*$dt_Ayer= date('d/m/Y', strtotime('+1 day')) ; // resta 1 día
$dt_laSemanaPasada = date('d/m/Y', strtotime('+1 week')) ; // resta 1 semana
$dt_elMesPasado = date('d/m/Y', strtotime('+1 month')) ; // resta 1 mes
$dt_ElAnioPasado = date('d/m/Y', strtotime('+1 year')) ; // resta 1 año
echo $dt_laSemanaPasada;*/?>"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield2",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="checkbox" name="det" id="det" />
				          <label for="det">Detallado Por Cliente</label></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" >Ingrese Cliente 
					       
				          <input type="text" name="cli" id="cli" />
				          <input type="text" name="codcli" id="codcli" /></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="radio" name="sw" id="sw" value="1" />
				          <label for="sw">Ver todo</label></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><strong>Formato a Exportar</strong></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" /><?php echo"<img src=../images/excel.gif alt= name=avatar>"; ?>
				          <label for="radio"></label>					        <!-- <select name="tipoexporta" id="elSel">
					        <option value="EXCEL" id="opcion1" style="background-image:url(../../images/excel.gif)"> EXCEL </option>
					        <option value="" id=""> WORD </option>
					        <option value="PDF" id="opcion3"> PDF </option>
					        <option value="WEB" id="opcion4"> WEB </option>
				          </select>-->
				          <input name="tipoexporta" type="radio" id="tipoexporta" value="WEB" checked="checked" /><?php echo"<img src=../images/icono-explorer.gif alt= name=avatar>"; ?>
				          <label for="radio2">
				            <input type="radio" name="tipoexporta" id="tipoexporta" value="WORD" /><?php echo"<img src=../images/word.gif alt= name=avatar>"; ?>
				          </label></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td colspan="3" >&nbsp;</td>
				        </tr>
				      </table>
					  
					  
		  </div>
		  </div>
              </center>
    <?php }?>
          </td>
        </tr>
        <?php
        if($reporte != null  )
        {
    ?>
        <tr>
          <td> <table width="200" border="1">
  <tr>
    <td><?php $nombreempresa;?></td>
    <td><?php echo date("d/m/Y H:m");?></td>
  </tr>
  <tr>
    <td><?php $rucempresa;?></td>
    <td><?php $usuario;?></td>
  </tr>
            </table>

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:10px">
                            <thead>
                                <tr align="center">
                                  <td colspan="12"><?php echo 'Reporte del '.$_POST['textfield'].' al '.$_POST['textfield2']; ?><br />
                                    <a href="#">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
                                </tr>
                                <tr align="center">
                                  <td width="45" bgcolor="#CCCCCC">Nro</td>
      <td width="119" bgcolor="#CCCCCC">Documento</td>
      <td width="308" bgcolor="#CCCCCC">Cliente</td>
      <td width="125" bgcolor="#CCCCCC">Fecha Guia</td>
      <td width="92" bgcolor="#CCCCCC">Transp.</td>
      <td width="92" bgcolor="#CCCCCC">Chofer</td>
      <td width="92" bgcolor="#CCCCCC">Placa</td>
      <td width="92" bgcolor="#CCCCCC">Partida</td>
      <td width="92" bgcolor="#CCCCCC">LLegada</td>
      <td width="92" bgcolor="#CCCCCC">Estado</td>
      <td width="92" bgcolor="#CCCCCC">Ver Detalle</td>
      <td width="91" bgcolor="#CCCCCC">Eliminar</td>
      </tr>
                            </thead>
                            <tbody>
                                <?php 
                    $i = 1;
                    foreach($reporte as $item)
                    { 
					
            ?>
                                <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="center"><?php echo $item["c_numguia"];?></td>
      <td align="center"><?php echo $item["c_nomdes"];?></td>
      
      <td align="center"><?php echo vfecha(substr($item["d_fecgui"],0,10));?></td>
      <td align="center"><?php echo strtoupper($item["c_nomtra"]);?></td>
      <td align="center"><?php echo strtoupper($item["c_chofer"]);?></td>
      <td align="center"><?php echo strtoupper($item["c_placa"]);?></td>
      <td align="center"><?php echo strtoupper($item["c_parti"]);?>&nbsp;</td>
      <td align="center"><?php echo strtoupper($item["c_llega"]);?>&nbsp;</td>
      <td align="center"><?php if($item["c_estado"]=='1'){echo 'Activo';}else{ echo 'Anulado';} ?>
      &nbsp;</td>
      <td align="center">
      <?php if($item["c_estado"]!='0'){?>
      <a href="../MVC_Controlador/cajaC.php?acc=verdetalleguia&cod=<?php echo $item["c_numguia"];?>"><img src="../images/search.png" width="16" height="16" title="Ver Guia Remision" /></a>&nbsp;
      <?php }?>
      </td>
      <td align="center">
        <?php if($item["c_estado"]!='0'){?>
	       <a href="#" onclick="eliminarguia('<?php echo $item["c_numguia"]?>')"><img src="../images/icon_delete.png" width="16" height="16" onclick="" title="Eliminar Guia" /></a>
            <?php }?>
           </td>
      </tr>
                          
                                <?php
                        $i += 1;
                    }
            ?>
                            </tbody>
                        </table>
          </td>
        </tr>
        <?php } ?>
    </table>
</form>
</body>
</html>