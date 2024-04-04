<?php
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); 
?>
<html>

<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--[if IE]>
	<link href="../css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="../js/excanvas.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>

<!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
function valida_envia(){
	document.formElem.submit();
	
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
	$("#textfield13").val(data[3]);
	document.formElem.textfield13.focus();
	});
		
})
;
</script>


<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield5").autocomplete("../MVC_Controlador/CombustibleC.php?acc=at1", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield5").result(function(event, data, formatted) {
	$("#textfield5").val(data[1]);
	document.formElem.textfield6.focus();
	});
		
})
;
</script>

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield4").autocomplete("../MVC_Controlador/CombustibleC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield4").result(function(event, data, formatted) {
	$("#textfield4").val(data[1]);
	document.formElem.textfield5.focus();
	});
		
})
;
</script>


<script type="text/javascript">
function validagraba(){
	if(((document.getElementById("textfield3").value)=="") || ((document.getElementById("textfield4").value)=="") ){
	alert("Falta Ingresar Unidad");
document.getElementById("textfield").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Registro  ?")){
	document.getElementById("formElem").submit();
			 }
	}
function limpiarfom(formElem) {
	frm = document.getElementById("formElem");
	if (!frm) return;
	for(i=0; i<frm.elements.length; i++){
		if (frm.elements[i].type == 'text')
			frm.elements[i].value = '';
	}
	document.getElementById("textfield").focus();
}


function nombre()
{
	document.formElem.textfield9.value=document.formElem.SER_CODIGO2.options[document.formElem.SER_CODIGO2.selectedIndex].value;
	//textfield9.value=mes;

}
</script>
<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield13").autocomplete("../MVC_Controlador/CombustibleC.php?acc=at3", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield13").result(function(event, data, formatted) {
	$("#textfield11").val(data[1]);
	$("#textfield9").val(data[2]);
	//document.formElem.textfield2.focus();
	});
		
})
;
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	var myajax_Listar=new classAjax_Listar();
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo2.php',{op:'showdepa'},'SER_CODIGO');
	$("#SER_CODIGO").change(function(){
		var dep=$("#SER_CODIGO").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo2.php',{op:'showprov',depa:dep},'SER_CODIGO2');	
	});	
	});
</script>
<script type="text/javascript">
function valida_envia(){
	document.form1.submit();
	
	}
function copia(){
	var kilant=parseFloat(document.getElementById('textfield9').value);
	var kilact=parseFloat(document.getElementById('textfield6').value);
	var galo=parseFloat(document.getElementById('textfield7').value);
	var recorrido=parseFloat(kilact-kilant);
	var promedio=parseFloat(recorrido/galo);
document.getElementById('promedio').value = promedio;
//document.getElementById('promedio').value = document.getElementById('textfield7').value;
}
</script>
</head>

<body>
<form name="formElem" id="formElem" method="post" action="../MVC_Controlador/CombustibleC.php?acc=c2&udni=<?php echo $_GET['udni']; ?>">
  <table width="667" border="0">
    <tr>
      <td width="860">REGISTRAR CONSUMO DE COMBUSTIBLE (el registro debe tener un orden en la fecha de abastecimiento de fecha menor a fecha mayor)</td>
    </tr>
  </table>
  <fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
  <table width="667" border="0">
    <tr>
      <td width="177">Unidad</td>
      <td><label for="textfield"></label>
        <select name="SER_CODIGO" id="SER_CODIGO">
          <option  selected value="1" <?php if (!(strcmp(1, 1))) {echo "selected=\"selected\"";} ?>>[ Seleccione ]</option>
        </select>
        <input name="textfield" type="hidden" id="textfield" size="20" class="texto">
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $id ?>">        <label for="textfield13"></label></td>
      <td><input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $_GET['udni']?>">
        <input type="hidden" name="hiddenField3" id="hiddenField3"value="<?php echo $empresa ?>">
        Placa</td>
      <td><input type="text" name="textfield13" id="textfield13" class="texto"></td>
    </tr>
    <tr>
      <td>Seleccione fecha </td>
      <td><label for="SER_CODIGO2"></label>
       Fecha Kilometraje Prom
        <select name="SER_CODIGO2" size="5" id="SER_CODIGO2" onChange="nombre()" onBlur="nombre()">
          <option  selected value="1" <?php if (!(strcmp(1, 1))) {echo "selected=\"selected\"";} ?>>[ Seleccione ]</option>
        </select></td>
      <td>Kilometraje Anterior</td>
      <td><input type="text" name="textfield9" id="textfield9" onBlur="nombre()"></td>
    </tr>
    <tr>
      <td>Fecha Abastecimiento</td>
      <td><input name="textfield2" type="text" class="texto" id="textfield2" size="12" readonly="readonly"><img src="../images/icon_calendar.png" alt="" name="lanzador" width="16" height="16" border="0" id="lanzador" title="Fecha de Emoci&oacute;n"  />
        <script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "textfield2",     // id del campo de texto 
     ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del bot&oacute;n que lanzar&aacute; el calendario 
}); 
//document.getElementById("hc").focus();
            </script></td>
      <td>&nbsp;</td>
      <td><label for="textfield11"></label></td>
    </tr>
    <tr>
      <td>Nro Comprobante</td>
      <td width="153"><input type="text" name="textfield3" id="textfield3" class="texto">  </td>
      <td width="135">Promedio Actual</td>
      <td width="147"><label for="promedio"></label>
        <input type="text" name="promedio"  disabled id="promedio"></label></td>
    </tr>
    <tr>
      <td>Responsable</td>
      <td><input type="text" name="textfield4" id="textfield4" class="texto"></td>
      <td><input type="hidden" name="hiddenField4" id="hiddenField4"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Ubicacion Grifo</td>
      <td colspan="2"><label for="textfield5"></label>
        <input name="textfield5" type="text" class="texto" id="textfield5" size="40"></td>
      <td><input type="hidden" name="hiddenField5" id="hiddenField5"></td>
    </tr>
    <tr>
      <td>Kilometraje</td>
      <td><label for="textfield6"></label>
        <input type="text" name="textfield6" id="textfield6" class="texto"></td>
      <!--<td>Recorrido        </td>
      <td><input type="text" name="textfield10" id="textfield10" class="texto"></td>-->
    </tr>
    <tr>
      <td>Cantidad Galones </td>
      <td><label for="textfield7"></label>
        <input type="text" name="textfield7" id="textfield7"  onKeyUp="copia();" class="texto"></td>
      <!--<td>Promedio</td>
      <td><label for="textfield12"></label>
        <input type="text" name="textfield12" id="textfield12" class="texto"></td>-->
    </tr>
    <tr>
      <td>Precio Galon</td>
      <td><label for="textfield8"></label>
        <input type="text" name="textfield8" id="textfield8" class="texto"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><table border="0" align="center">
        <tr>
          <td><div class="buttons" align="center">
            <button type="button" class="positive" name="save" onClick="validagraba()"> <img src="../images/icon_accept.png" alt=""/>Guardar</button>
            <a href="../MVC_Controlador/WebC.php?acc=g1&udni=<?php echo $udni;?>" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </fieldset>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>