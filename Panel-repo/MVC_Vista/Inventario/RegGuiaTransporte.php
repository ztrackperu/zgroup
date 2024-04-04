<?php 
if($cabecera != NULL)
{

foreach ($cabecera as $item) 
{
$nomtra=$item['pr_razo'];
$c_nume=$item['c_nume'];
$c_serdoc=$item['c_serdoc'];
$d_fecgui=$item['d_fecgui'];
$c_coddes=$item['c_coddes'];
$c_nomdes=$item['c_nomdes'];
$c_rucdes=$item['c_rucdes'];
$c_parti=$item['c_parti'];
$c_llega=$item['c_llega'];
$c_docref=$item['c_docref'];
$d_fecref=$item['d_fecref'];
$c_codtra=$item['c_codtra'];
$c_ructra=$item['c_ructra'];
$c_chofer=$item['c_chofer'];
$c_placa=$item['c_placa'];
$c_licenci=$item['c_licenci'];
$c_estado=$item['c_estado'];
$c_glosa=$item['c_glosa'];
$c_marca=$item['c_marca'];
$c_glosa=$item['c_glosa'];
$c_nomtra=$item['c_nomtra'];
}
	$rem='ZGROUP SAC';
	$ruc='20521180774';
	$glosa='SEGUN GUIA REMISION NRO :'.$c_serdoc.'-'.$c_nume;


	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />



<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->

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

<link rel="stylesheet" href="../js/AutoComplete.css" media="screen" type="text/css">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
<script type="text/javascript">
var tramo1="1ER TRAMO PTO PARTIDA";
var tramo11="1ER TRAMO PTO LLEGADA JR 2 DE MAYO NRO 150 CALLERIA CORONEL PORTILLO UCAYALI ";
var tramo2="2DO TRAMO PTO LLEGADA JR 2 DE MAYO NRO 150 CALLERIA CORONEL PORTILLO UCAYALI ";
var tramo22="2DO TRAMO PTO LLEGADA PUERTO ENAPU PUNCHANA-MAYNAS-LORETO";
var tramo3="3ER TRAMO PTO PARTIDA PUERTO ENAPU PUNCHANA-MAYNAS-LORETO";
var tramo33="3ER TRAMO PTO LLEGADA  CALLE RAMON CASTILLA 226- MAYNAS-IQUITOS-LORETO";
var obs="OBS: FLETE PAGO B Y V COMERCIALIZADORA SRL RUC 2048625107";
var des="SERVICIO DE TRANSPORTE DE PRODUCTOS REFRIGERADOS";

function llenargrid(){
	var gr=document.formElem.guiaremison.value;
	if(document.getElementById("checkbox").checked==true){
		document.getElementById("des1").value=des;
		document.getElementById("des2").value=tramo1;
		document.getElementById("des3").value=tramo11;
		document.getElementById("des4").value=tramo2;
		document.getElementById("des5").value=tramo22;
		document.getElementById("des6").value=tramo3;
		document.getElementById("des7").value=tramo33;	
		document.getElementById("c_glosa").value=obs;						
		}else{
		document.getElementById("des1").value="SEGUN GUIA REMISION NRO :"+gr;
		document.getElementById("des2").value="";			
		document.getElementById("des3").value="";
		document.getElementById("des4").value="";
		document.getElementById("des5").value="";
		document.getElementById("des6").value="";
		document.getElementById("des7").value="";
		document.getElementById("c_glosa").value="";
			
		}
	//042382-2
	
	}
function abreVentanachofer(){
	var codigo=document.getElementById("transportista").value;
	var cod=document.getElementById("hiddenField2").value;
			if (codigo=="") {
				alert ("Debe introducir Transportista");
				document.getElementById("transportista").focus();
				return 0;
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verchoferes&udni=<?php echo $udni;?>&cod="+cod,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}

function validagraba(){
	var nroguia=document.formElem.c_nume.value;
	dep1=document.formElem.xcmbDep.options[document.formElem.xcmbDep.selectedIndex].text;
	dep2=document.formElem.cmbDep.options[document.formElem.cmbDep.selectedIndex].text;
	if(nroguia==""){
		alert('Ingrese Nro de Guia Transporte');
		return 0;
		}
	if(dep1=='[ Departamento ]'){
		alert('Ingrese Departamento Destinatario');
		return 0;
		}
	if(dep2=='[ Departamento ]'){
		alert('Ingrese Departamento Remitente');
		return 0;
		}	
	
	
		 if(confirm("Seguro de Grabar Guia de Transportista ?")){
	document.getElementById("formElem").submit();
			 }
	}
</script>
<script type="text/javascript">
$().ready(function() {
	
	
	$("#transportista").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#transportista").result(function(event, data, formatted) {
		$("#transportista").val(data[2]);
		$("#hiddenField2").val(data[1]);
	});
});
</script>
<script type="text/javascript">
$().ready(function() {
	
	
	$("#c_nomdes").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomdes").result(function(event, data, formatted) {
		$("#c_nomdes").val(data[2]);
		$("#c_rucdes").val(data[3]);
		//$("#lentrega").val(data[4]);
		//$("#xlentrega").val(data[4]);
		//$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>

<script type="text/javascript">
$().ready(function() {
	
	
	$("#c_desrem").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_desrem").result(function(event, data, formatted) {
		$("#c_desrem").val(data[2]);
		$("#c_rucrem").val(data[3]);
		//$("#lentrega").val(data[4]);
		//$("#xlentrega").val(data[4]);
		//$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	var myajax_Listar=new classAjax_Listar();
/*** LISTAS NACIMIENTO ***/
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdepa'},'cmbDep');
	$("#cmbDep").change(function(){
		var dep=$("#cmbDep").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showprov',depa:dep},'cmbPro');
	});
	$("#cmbPro").change(function(){
		var dep=$("#cmbDep").val();
		var pro=$("#cmbPro").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdist',depa:dep,prov:pro},'cmbDist');
	});

});
</script>
<script type="text/javascript">
$(document).ready(function(){
var myajax_Listar=new classAjax_Listar();
	
/*** LISTAS NACIMIENTO ***/

	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdepa'},'xcmbDep');
	$("#xcmbDep").change(function(){
	var dep=$("#xcmbDep").val();
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showprov',depa:dep},'xcmbPro');
	});
	$("#xcmbPro").change(function(){
	var dep=$("#xcmbDep").val();
	var pro=$("#xcmbPro").val();
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdist',depa:dep,prov:pro},'xcmbDist');
	});

});
</script>
</head>

<body>
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/InventarioC.php?acc=guardaguiat&udni=<?php echo $_GET['udni']; ?>">

<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0"><strong>Datos Cabecera Guia Transporte</strong></li>
    <li class="TabbedPanelsTab" tabindex="0"><strong>Detalle</strong></li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <table width="828" border="0">
        <tr>
          <td width="209">Fecha Dcto</td>
          <td width="145">
          <input name="d_fecgui" type="text" class="texto" id="d_fecgui" size="10" readonly="readonly" 
          value="<?php echo date('d/m/Y');?>"/><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "d_fecgui",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
          <td width="94">Serie Guia</td>
          <td width="123">
            <select name="c_serdoc" id="c_serdoc" class="Combos texto">
              <option value="005">005</option>
<option value="004">004</option>
<option value="003">003</option>
<option value="002">002</option>
<option value="001">001</option>
            </select></td>
          <td width="116">Nro de Guia</td>
          <td width="115">
            <input name="c_nume" type="text" class="texto" id="c_nume" size="10" maxlength="8"/></td>
        </tr>
        <tr>
          <td bgcolor="#99FFCC">Nombre Remitente</td>
          <td colspan="2">
            <input name="c_desrem" type="text" class="texto" id="c_desrem" size="40" value="<?php echo $rem ?>"/></td>
          <td colspan="3">Ruc 
            <input type="text" name="c_rucrem" id="c_rucrem" class="texto" value="<?php echo $ruc ?>"/> 
            GGRR
          
            <input name="guiaremison" type="text" id="guiaremison" size="12" class="texto" value="<?php echo $c_serdoc.'-'.$c_nume ?>"/>
            <input type="hidden" name="ggrr" id="ggrr" value="<?php echo $c_serdoc.$c_nume ?>" /></td>
          </tr>
        <tr>
          <td bgcolor="#99FFCC">Direccion Pto Partida</td>
          <td colspan="5">
            <input name="c_parti" type="text" id="c_parti" size="45" class="texto" value="<?php echo $c_parti ?>"/></td>
          </tr>
        <tr>
          <td bgcolor="#99FFCC">Departamento</td>
          <td><select class="Combos texto" name="cmbDep"   id="cmbDep" >
                                    <option  selected value="00">[ Departamento ]</option>
</select></td>
          <td>Provincia</td>
          <td><select class="Combos texto" name="cmbPro" id="cmbPro">
                                    <option  selected value="00">[ Provincia ]</option>
                          </select></td>
          <td>Distrito</td>
          <td><select class="Combos texto" name="cmbDist" id="cmbDist">
                                    <option  selected value="00">[ Distrito ]</option>
                          </select></td>
        </tr>
        <tr>
          <td colspan="6"><hr /></td>
          </tr>
        <tr>
          <td bgcolor="#FFCCCC">Nombre Destinatario</td>
          <td colspan="2">
            <input name="c_nomdes" type="text" class="texto" id="c_nomdes" size="40" value="<?php echo $c_nomdes ?>"/></td>
          <td colspan="3">Ruc 
            <input type="text" name="c_rucdes" id="c_rucdes" class="texto" value="<?php echo $c_rucdes ?>"/></td>
          </tr>
        <tr>
          <td bgcolor="#FFCCCC">Direccion Pto Partida</td>
          <td colspan="5">
            <input name="c_llega" type="text" id="c_llega" size="45" class="texto" value="<?php echo $c_llega ?>"/></td>
          </tr>
        <tr>
          <td bgcolor="#FFCCCC">Departamento</td>
          <td><select class="Combos texto" name="xcmbDep"   id="xcmbDep" >
            <option  selected value="00">[ Departamento ]</option>
  </select></td>
          <td>Provincia</td>
          <td><select class="Combos texto" name="xcmbPro" id="xcmbPro">
            <option  selected value="00">[ Provincia ]</option>
            </select></td>
          <td>Distrito</td>
          <td><select class="Combos texto" name="xcmbDist" id="xcmbDist">
            <option  selected value="00">[ Distrito ]</option>
            </select></td>
        </tr>
        <tr>
          <td>Transportista</td>
          <td colspan="5">
            <input name="transportista" class="texto" type="text" id="transportista" size="30" value="<?php echo $c_nomtra ?>" />
      <input type="hidden" name="hiddenField2" size="5" id="hiddenField2" value="<?php echo $c_ructra ?>" />Chofer
            <input name="chofer" type="text" id="chofer" size="30" class="texto" value="<?php echo $c_chofer ?>"/><a href="#" onClick="abreVentanachofer()">Busque Chofer</a></td>
          </tr>
        <tr>
          <td>Marca</td>
          <td>
            <input type="text" name="marca" id="marca" class="texto" value="<?php echo $c_marca ?>"/></td>
          <td colspan="4">placa
            <input name="placa" type="text" id="placa" size="12" class="texto" value="<?php echo $c_placa ?>"/>            Conf. Vehicular
            <input name="c_confveh" type="text" id="c_confveh" size="12" class="texto"/></td>
          </tr>
        <tr>
          <td colspan="6">Nro Certificado Circulacion
            
            <input type="text" name="c_certcir" id="c_certcir" class="texto" />
            Licencia Conducir
            <input name="licencia" type="text" id="licencia" size="12" class="texto" value="<?php echo $c_licenci ?>"/></td>
          </tr>
        <tr>
          <td colspan="6" bgcolor="#FFFFCC">Datos Empresa Sub Contratada</td>
          </tr>
        <tr>
          <td>Nombre</td>
          <td colspan="5">
            <input type="text" name="c_empsub" id="c_empsub" class="texto"/>            Ruc
            <input type="text" name="c_rucempsub" id="c_rucempsub" class="texto"/>
            <input type="hidden" name="oper" id="oper" value="<?php echo $_GET['udni']; ?>"/></td>
          </tr>
      </table>
      <p>
        <input type="button" name="Guardar" id="Guardar" value="Guardar" onclick="validagraba()"/>
      </p>
    </div>
    <div class="TabbedPanelsContent">
      <p>
      <label>
        <input type="checkbox" name="checkbox" id="checkbox" onclick="llenargrid()"/>
        <strong>Carga Para Guia Especial Pucallpa</strong></label>
      <table width="828" border="0">
        <tr>
          <td width="1">&nbsp;</td>
          <td width="811">
            <textarea name="des1" cols="117" rows="5" class="texto" id="des1"><?php echo $glosa ?></textarea></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="des2" type="text" id="des2" size="120" class="texto"/>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="des3" type="text" id="des3" size="120" class="texto"/>
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="des4" type="text" id="des4" size="120" class="texto"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="des5" type="text" class="texto" id="des5" size="120"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="des6" type="text" class="texto" id="des6" size="120"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="des7" type="text" class="texto" id="des7" size="120"/></td>
        </tr>
        <tr>
          <td colspan="2">Observacion:</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input name="c_glosa" type="text" id="c_glosa" size="120" class="texto"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</form>
</body>
</html>