<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Cotizaciones | ZGROUP</title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->


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
<script language='javascript'>
<!-- //
function setReadOnly()
{
	var obj=document.getElementById("sw").value;
if(obj.value == "1")
{
document.getElementById("textfiel").disabled=false;
document.getElementById("textfiel2").disabled=false;
} else {
document.getElementById("textfiel").disabled=true;
document.getElementById("textfiel2").disabled=true;
}
}
// -->


</script>
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=repcoti01">
													
  <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reporte == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>Reporte de Cotizaciones Realizada</div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="100%" colspan="3" align="center" ><input type="radio" name="sw" id="sw" value="2" onclick="setReadOnly()" />
					      Por Fechas:
					        <label for="sw"></label>
					        desde 
					        <label for="textfield"></label>
				          <input name="textfield" type="text" id="textfield" size="12" value="<?php echo date('d/m/Y');?>"/><img src="../images/calendario.jpg" name="Image" id="Image" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
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
				          <input name="textfield2" type="text" id="textfield2" size="12" value="<?php echo date('d/m/Y');?>"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'">
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
					      <td colspan="3" align="center" ><input name="sw" type="radio" id="sw" onclick="setReadOnly()" value="1" checked="checked" />
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

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
                          <thead>
                              <tr align="center">
                                <td colspan="8"><a href="../MVC_Controlador/cajaC.php?acc=r01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
                              </tr>
                              <tr align="center">
                                <td width="35" bgcolor="#C0C0C0">Nro</td>
      <td width="94" bgcolor="#C0C0C0">Nro Pedido</td>
      <td width="128" bgcolor="#C0C0C0">Cliente</td>
      <td width="171" bgcolor="#C0C0C0">Descripcion</td>
      <td width="138" bgcolor="#C0C0C0">Contacto</td>
      <td width="100" bgcolor="#C0C0C0">Telefono</td>
      <td width="83" bgcolor="#C0C0C0">Fecha</td>
      <td width="69" bgcolor="#C0C0C0"></td>
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
      <td align="center"><?php echo $item["c_numped"];?></td>
      <td align="center"><?php echo $item["c_nomcli"];?></td>
      <td align="center"><?php echo $item["c_asunto"];?></td>
      <td align="center"><?php echo $item["c_contac"];?></td>
      <td align="center"><?php echo $item["c_telef"].'//.'.$item["c_nextel"];?></td>
      <td align="center"><?php echo $item["d_fecped"];?></td>
      <td align="center"><?php /*?><a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/search.png" width="16" height="16" /></a>&nbsp;&nbsp;<a href="../MVC_Controlador/cajaC.php?acc=vercoti&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral']))) ?>&udni=<?php echo $_GET['udni'];?>"><img src="../images/icon_edit.png" width="16" height="16" /></a>&nbsp;<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/pdf.gif" width="16" height="16" /></a>&nbsp;<a href="#"><img src="../images/icon_delete.png" width="16" height="16" onclick="eliminar()" /></a><?php */?></td>
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