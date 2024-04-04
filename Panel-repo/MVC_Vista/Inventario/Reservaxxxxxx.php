<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INGRESO DE CODIGO </title>
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
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
$().ready(function() {
	$("#textfield").autocomplete("../MVC_Controlador/InventarioC.php?acc=serieequipoauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield").result(function(event, data, formatted) {
		$("#textfield").val(data[1]);
		$("#hiddenField").val(data[2]);
		$("#textfield2").val(data[3]);
		$("#hiddenField2").val(data[4]);
	});
	
});
</script>

<script type="text/javascript">

		
$().ready(function() {
	$("#material").autocomplete("../MVC_Controlador/cajaC.php?acc=proautoguia", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#material").result(function(event, data, formatted) {
		$("#material").val(data[2]);
		$("#codigorepuesto").val(data[1]);
		$("#hiddenField3").val(data[1]);
		//$("#unidad").val(data[1]);
		$("#hiddenField5").val(data[1]);

		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});

function copiarcodigo(){
	document.formElem.unidad.value=document.formElem.hiddenField3.value;
	}		
</script>
<script type="text/javascript">
function cursor(){
	document.getElementById('textfield').focus();	
	}
function abreVentana(obj){
var codigo=document.getElementById("hiddenField5").value;
	var cod=codigo
	var sw='1';
	var xsw='1';
	var res='1';
	var valor=obj
			if (codigo=="") {
				alert ("Debe Codigo Equipo");
			} else {
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosR&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&res="+res,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}	


function linkgraba(){
		// sumarcolumnatabla();
		
		if(document.getElementById('material').value==""){
			alert('Ingrese Descripcion equipo');
			return 0;
			}
			if(document.getElementById('unidad').value==""){
			alert('Ingrese serie de equipo ');
			return 0;
			}
			
			if(document.getElementById('descripcion').value==""){
			alert('Ingrese Cliente ');
			return 0;
			}
			if(document.formElem.tipo.options[document.formElem.tipo.selectedIndex].value=='0'){
				alert('Seleccione el tipo de reserva');
				return 0;
				}
			
		
		 	 if(confirm("Seguro Realizar la Reserva ?")){
	document.getElementById("formElem").submit();
			 }
	}
</script>
<script type="text/javascript">
$().ready(function() {
	
	
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		$("#codcli").val(data[1]);
		//$("#lentrega").val(data[4]);
		//$("#xlentrega").val(data[4]);
		//$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>
 <script type="application/javascript">


/*continuar = setInterval(function(){
   inicio();
},5000);*/

//window.onload = inicio();
 </script>
<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/InventarioC.php?acc=guareserv&udni=<?php echo $_GET['udni'] ?>">
  <div class="column_left">
    <div class="header"><strong>RESERVACION DE EQUIPOS</strong></div>
  <table width="527" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="3" align="center" valign="middle">Nota: Se Sugiere empezar digitando los numeros del equipo
        <input type="hidden" name="textfield3" id="textfield3" value="<?php echo $equipo; ?>"/></td>
      </tr>
    <tr>
      <td align="right" valign="middle">Ingrese Producto</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        <input name="material" type="text"  class="texto" id="material" size="40" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Busque Codigo</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle"><label for="textfield"></label>
       <input name="unidad" type="text" class="texto"  id="unidad" onclick="abreVentana(this.name)" size="25" readonly="readonly"/>
      <?php /*?>   <?php $ven = ListarSerieC();?>
        <select name="unidad" id="unidad" class="Combos texto" >
          <?php foreach($ven as $item){?>
          <option value="<?php echo $item["c_nserie"]?>"><?php echo $item["c_nserie"]?></option>
  
          <?php }	?>
        </select><?php */?>
    <input type="hidden" name="hiddenField5" id="hiddenField5" size="5" />
    <input name="codigoequipo" type="hidden" id="codigoequipo" size="25" readonly="readonly" class="texto" />
      <input type="hidden" name="hiddenField" id="hiddenField" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" />
      <input type="hidden" name="tiping" id="tiping" value="<?php echo $tiping; ?>" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Ingrese Cliente</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        
        <input name="descripcion" type="text" id="descripcion" size="35" class="texto"/>
        <input type="hidden" name="codcli" id="codcli" /></td>
    </tr>
    <tr>
      <td align="right" valign="middle">Tipo Reserva</td>
      <td align="center" valign="middle">:</td>
      <td valign="middle">
        <select name="tipo" id="tipo">
<option value="0">Seleccione</option>
<option value="Venta">Venta</option>
<option value="Alquiler">Alquiler</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><a href="../MVC_Controlador/InventarioC.php?acc=newcode&udni=<?php echo $_GET['udni'] ?>&tip=<?php echo $tiping;?>&eq=<?php echo $equipo; ?>">        
        <input type="hidden" name="alert" id="alert" value="<?php echo $_GET['sw']; ?>" />
  <input name="textfield2" type="hidden" id="textfield2" size="45" style="border:hidden;text-align:center" />
      </a></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle"><input type="button" name="VALIDAR" id="VALIDAR" value="Reservar Equipo" onclick="linkgraba(),inicio()"/></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">
        <input name="checkbox" type="checkbox" id="checkbox" checked="checked" />
      Activar Alerta</td>
    </tr>
    <tr>
      <td colspan="3" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="middle"><a href="../MVC_Controlador/InventarioC.php?acc=lisResv&udni=<?php echo $_GET['udni'] ?>">Clik Aqui Para Ver Equipos Reservados</a></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="middle"><a href="../MVC_Controlador/InventarioC.php?acc=lisResv&udni=<?php echo $_GET['udni'] ?>">Clik Aqui Para Anular Reserva</a></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" valign="middle">(Recuerde que solo puede anular aquellos equipos que no han sido Facturados)</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>