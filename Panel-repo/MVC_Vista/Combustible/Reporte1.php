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
<!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
function valida_envia(){
	nombre();
	document.form1.submit();
	
	}

</script>
<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
	$("#textfield").val(data[3]);
	
	});
		
})
;
</script>
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



function nombre()
{
	var mes=document.form1.select2.options[document.form1.select2.selectedIndex].text;
	hiddenField.value=mes;

}
</script>
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[3]);
	
	});
})
;
</script>   
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/CombustibleC.php?acc=c4">
													
    <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
     
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>GRAFICO CONSUMO DE COMBUSTIBLE</div>
Ingreso de Parametros<br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="57%" height="39" align="right" >Ingresar Unidad</td>
					      <td width="2%" >&nbsp;</td>
					      <td width="20%" ><label for="textfield"></label>
				          <input type="text" name="textfield" id="textfield" /></td>
					      <td width="21%" align="center" ><input  onclick="valida_envia()" type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td align="right" >Seleccione Año </td>
					      <td align="left" >&nbsp;</td>
					      <td align="left" ><label for="select"></label>
					         <select name="select" id="select">
					           <option value="2012">2012</option>
					           <option value="2013">2013</option>
					           <option value="2014">2014</option>
					           <option value="2015">2015</option>
                          </select></td>
					      <td align="center" >&nbsp;</td>
				        </tr>
					    <tr>
					      <td align="right" >Seleccione Mes</td>
					      <td align="left" >&nbsp;</td>
					      <td align="left" ><label for="select2"></label>
					         <select name="select2" id="select2">
					           <option value="1">Enero</option>
					           <option value="2">Febrero</option>
					           <option value="3">Marzo</option>
					           <option value="4">Abril</option>
					           <option value="5">Mayo</option>
					           <option value="6">Junio</option>
					           <option value="7">Julio</option>
					           <option value="8">Agosto</option>
					           <option value="9">Septiembre</option>
					           <option value="10">Octubre</option>
					           <option value="11">Noviembre</option>
					           <option value="12">Diciembre</option>
                          </select></td>
					      <td align="center" ><input type="hidden" name="hiddenField" id="hiddenField" /></td>
				        </tr>
					    <tr>
					      <td colspan="4" align="center" >&nbsp;</td>
				        </tr>
				      </table>
					  
					  
		  </div>
		  </div>
                </center>

                </td>
        </tr>
   
        <tr>
            <td>&nbsp;</td>
        </tr>
       
    </table>
    <p>&nbsp;</p>
</form>
</body>
</html>