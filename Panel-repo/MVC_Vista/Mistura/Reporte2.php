<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeAdmin | Dashboard</title>
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
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield2").autocomplete("../MVC_Controlador/MisturaC.php?acc=at1", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield2").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[4]);
	document.formElem.descripcion.focus();
	});
})
;
</script>   
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

</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/MisturaC.php?acc=m29">
													
    <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reporte == null){
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>HISTORIAL DE REGISTROS DE PAQUETE X CLIENTE</div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="50%" height="39" align="right" >Buscar Usuario </td>
					      <td width="25%" ><label for="textfield"></label>
				            <label for="textfield2"></label>
				            <input type="text" name="textfield2" id="textfield2" />
			              <input type="hidden" name="textfield" id="textfield" /></td>
					      <td width="25%" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><strong>Formato a Exportar</strong></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><select name="tipoexporta" id="elSel">
					        <option value="WEB" id="opcion4"> WEB </option>
  <option value="EXCEL" id="opcion1">EXCEL </option>
  <option value="WORD" id="opcion2">WORD </option>
  <option value="PDF" id="opcion3">PDF </option>
				          </select></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" >&nbsp;</td>
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

                      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data">
                          <thead>
                              <tr align="center">
                                <td colspan="8"><a href="../MVC_Controlador/MisturaC.php?acc=m28">Retornar</a>&nbsp;</td>
                              </tr>
                              <tr align="center">
                                <td width="27" bgcolor="#CCCCCC">Nro</td>
      <td width="54" bgcolor="#CCCCCC">Id paquete</td>
      <td width="116" bgcolor="#CCCCCC">Cliente</td>
      <td width="85" bgcolor="#CCCCCC">Medida </td>
      <td width="93" bgcolor="#CCCCCC">Detalle</td>
      <td width="85" bgcolor="#CCCCCC">Ubicacion</td>
      <td width="79" bgcolor="#CCCCCC">Ingreso</td>
      <td width="70" bgcolor="#CCCCCC">Egreso</td>
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
      <td align="center"><?php echo $item["id_paquete"];?></td>
      <td align="center"><?php echo $item["nombre_usuario"];?></td>
      <td align="center"><?php echo $item["nombre_medida"];?></td>
      <td align="center"><?php echo $item["detalle_paquete"];?></td>
      <td align="center"><?php echo $item["ubicacion"];?></td>
      <td align="center"><?php echo $item["check_ingreso"];?></td>
      <td align="center"><?php echo $item["check_egreso"];?></td>
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
    <p>&nbsp;</p>
</form>
</body>
</html>