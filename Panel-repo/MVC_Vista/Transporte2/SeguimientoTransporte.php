<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
	<!--<link type="text/css" href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->


<script language="JavaScript" src="../Cotizaciones/jquery.js" type="text/javascript"></script>


<script type="text/javascript">
function showgenero(str)
{
if (str=="")
{
document.getElementById("listado").innerHTML="";
return;
}
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("listado").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","SeguimientoTransporte.php?q="+str,true);
xmlhttp.send();
}
function abreVentanachofer(){
	var codigo=document.getElementById("fecha").value;
	var cod=document.getElementById("hiddenField2").value;
			if (codigo=="") {
				alert ("Debe introducir Fecha");
			} else {
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verchofer&udni=<?php echo $udni;?>&cod="+cod,"miwin",
			"width=1200,height=580,scrollbars=yes");
			miPopup.focus();
			}
}
 
function abreVentanaGuia(){
	
miPopup = window.open("../MVC_Controlador/cajaC.php?acc=vercargaguia&udni=<?php echo $udni;?>","miwin",
			"width=1300,height=580,scrollbars=yes");
			miPopup.focus();
			
} 


 var posicionCampo2=1;
function agregarUsuario2(){
	

	
		nuevaFila = document.getElementById("tablaDiagnostico2").insertRow(-1);
		nuevaFila.id=posicionCampo2;
			     nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='empresa"+posicionCampo2+"' type='text' id='empresa"+posicionCampo2+ "' size='40' readonly='readonly' class='texto'></td> "; 
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='chofer"+posicionCampo2+"' type='text' id='chofer"+posicionCampo2+ "' size='40' readonly='readonly' class='texto'></td>";  
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='brevete"+posicionCampo2+"' type='text' id='brevete"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='placa"+posicionCampo2+"' type='text' id='placa"+posicionCampo2+ "' size='20' class='texto'></td> ";
		 
		 
		 	  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='marca"+posicionCampo2+"' type='text' id='marca"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		
		 //<input type="checkbox" name="checkbox" id="checkbox" />
		 	  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='costo"+posicionCampo2+"' type='text' id='costo"+posicionCampo2+ "' size='5'  class='texto'> <input  name='incigv"+posicionCampo2 +"' type='checkbox' id='incigv"+posicionCampo2+ "'class='texto' /></td> ";
		
		 
		 
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'> </td> "; 

escribirDiagnostico2(posicionCampo2);
		posicionCampo2++;
    }
function eliminarUsuario(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
function escribirDiagnostico2(posicionCampo2)
{
			chofer = document.getElementById("chofer" + posicionCampo2);
			chofer.value = document.formElem.chofer.value;
			
			brevete = document.getElementById("brevete" + posicionCampo2);
			brevete.value = document.formElem.brevete.value;
			
			placa = document.getElementById("placa" + posicionCampo2);
			placa.value = document.formElem.placa.value;
			
			marca = document.getElementById("marca" + posicionCampo2);
			marca.value = document.formElem.marca.value;
			
			empresa = document.getElementById("empresa" + posicionCampo2);
			empresa.value = document.formElem.empresa.value;
		
}
function add2(){
	
	agregarUsuario2();
/*	document.getElementById("chofer").value="";
	document.getElementById("brevete").value="";
	document.getElementById("placa").value="";
	
		document.getElementById("marca").value="";
document.getElementById("empresa").value="";*/
	
	//document.getElementById("chofer").focus();

	}
</script>


<!--otros filtros-->
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

<!-- Ventana modal ShadowBox Balcn-->
<link href="../css/blccbx.css" rel='stylesheet' type='text/css'/>
<script src="../js/bljjShadowbx1.js" type='text/javascript'></script>
<script type="text/javascript" >
Shadowbox.init({
overlayColor: "#000",
overlayOpacity: "0.6",
});
</script>


<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#razon").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		//$cotcli|$codcli|$nomcli|$ruccli|$telcli|$dircli|$nexcli|$emacli|$concli
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#razon").result(function(event, data, formatted) {
		//$("#razon").val(data[2]);
		$("#hc").val(data[1]);
		$("#razon").val(data[2]);
		$("#correo").val(data[7]);
		$("#contacto").val(data[6]);
		$("#direc").val(data[4]);
		$("#rucdni").val(data[3]);
		$("#telefono").val(data[5]);

         
	});
});
</script>
<script language="javascript" type="text/javascript">
//Create a boolean variable to check for a valid Internet Explorer instance.
var xmlhttp = false;
//Check if we are using IE.
try {
//If the Javascript version is greater than 5.
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer.");
} catch (e) {
//If not, then use the older active x object.
try {
//If we are using Internet Explorer.
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//alert ("You are using Microsoft Internet Explorer");
} catch (E) {
//Else we must be using a non-IE browser.
xmlhttp = false;
}
}
//If we are using a non-IE browser, create a javascript instance of the object.
if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
//alert ("You are not using Microsoft Internet Explorer and is necesary");
}

//funcion que se trae la informacion
function makerequest(serverPage, objID) {
var obj = document.getElementById(objID);
xmlhttp.open("GET", serverPage);

    xmlhttp.onreadystatechange = function() 
    {       
        if (xmlhttp.readyState == 4 )
              obj.innerHTML = xmlhttp.responseText;        
        else 
            obj.innerHTML = "Cargando...";    
}
xmlhttp.send(null);
}

//-->
function abreVentanachofer(){
	
	
			miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verchofer&udni=<?php echo $udni;?>&cod=","miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			//add2();
			//}
		}
</script>

</head>

<body>

<strong style="color:#039">SEGUIMIENTO DE SERVICIO DE TRANSPORTE</strong>
<form action="" method="get" name="formElem" id="formElem">


  <div id="TabbedPanels1" class="TabbedPanels" style="width:1080px">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Datos Servicio</li>
    <li class="TabbedPanelsTab" tabindex="0">Datos Cliente</li>
<li class="TabbedPanelsTab" tabindex="0">Transportista(as)</li>
    <li class="TabbedPanelsTab" tabindex="0">Datos de Entrega(as)</li>
    <li class="TabbedPanelsTab" tabindex="0">Datos  Documentarios</li>
<li class="TabbedPanelsTab" tabindex="0">Seguimiento de Servicio</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
      <fieldset class="fieldset legend">
        <legend style="color:#03C"><strong>Datos del Servicio</strong></legend>
        <table width="1030" border="0">
          <tr>
            <td width="142" bgcolor="#E0E0E0">N° Servicio </td>
            <td width="144" bgcolor="#E0E0E0"><input name="doc" type="text" class="texto"  disabled="disabled" id="doc" value="AUTOGENERADO"  /></td>
            <td width="139" bgcolor="#E0E0E0">Fecha Solicitud</td>
            <td width="143" bgcolor="#E0E0E0"><input name="fecsolicitus" type="text" id="fecsolicitus" size="12"  class="texto" value="<?php echo date('d/m/Y') ?>"/>
              <img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					 	inputField : "fecsolicitus",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
            <td width="99" bgcolor="#E0E0E0">Cotizacion </td>
            <td width="337" bgcolor="#E0E0E0"><input name="referencia" type="text" id="referencia" size="40"  class="texto" /></td>
          </tr>
          <tr>
            <td bgcolor="#E0E0E0">Fecha y Hora Inicio </td>
            <td bgcolor="#E0E0E0"><input name="fecini" type="text" class="texto" id="fecini" size="20" readonly="readonly" />
              <img src="../images/calendario.jpg" name="fecinix" id="fecinix" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'" />
              <script type="text/javascript">
					Calendar.setup(
					  {
					 inputField     :    "fecini",      // id of the input field
        ifFormat       :    "%d/%m/%Y %I:%M %p",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "fecinix",   // trigger for the calendar (button ID)
        singleClick    :    false,           // double-click mode
        step           :    1  
					  }
					);
		 </script></td>
            <td colspan="4" bgcolor="#E0E0E0">Punto Partida
              <input type="text" name="partida" id="partida2" class="texto"/>
              Escala
             
              <input type="text" name="escala" id="escala" class="texto"/>
              Punto Llegada
              <input type="text" name="llegada" id="llegada2" class="texto"/></td>
          </tr>
          <tr>
            <td bgcolor="#E0E0E0">Solicitante</td>
            <td bgcolor="#E0E0E0"><select name="solicitante" id="solicitante" class="Combos texto">
              <?php $ven = Ver_Estadistica3C();?>
              <?php foreach($ven as $item){ ?>
              <option value="<?php echo $item["udni"]?>"><?php echo $item["usuario"]?></option>
              <?php }	?>
            </select></td>
            <td bgcolor="#E0E0E0">Tipo Transporte</td>
            <td bgcolor="#E0E0E0"><select name="tipotrans" id="tipotrans"  class="Combos texto">
              <?php $ttr= ListaTipoTransporteC();?>
              <?php foreach($ttr as $item){ ?>
              <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
              <?php }	?>
            </select></td>
            <td bgcolor="#E0E0E0">Tipo de Ruta</td>
            <td bgcolor="#E0E0E0"><select name="tiporuta" id="tiporuta"  class="Combos texto">
              <?php $trut= ListaTipoRutaC();?>
              <?php foreach($trut as $item){ ?>
              <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
              <?php }	?>
            </select></td>
          </tr>
          <tr>
            <td bgcolor="#99CCFF">Descp. Mercaderia:
             </td>
            <td colspan="5" bgcolor="#99CCFF"><input name="descmer" type="text" class="texto" id="descmer2" size="70"/></td>
            </tr>
          <tr>
            <td bgcolor="#99CCFF">Direccion Entrega:</td>
            <td colspan="5" bgcolor="#99CCFF"><input type="text" name="c_dirent" id="c_dirent" size="70" class="texto"/></td>
          </tr>
          <tr>
            <td bgcolor="#99CCFF">Almacen Retiro</td>
            <td bgcolor="#99CCFF">
              <input type="text" name="c_almret" id="c_almret" class="texto"/></td>
            <td bgcolor="#99CCFF">Almacen Retorno</td>
            <td colspan="3" bgcolor="#99CCFF">
              <input type="text" name="c_almreti" id="c_almreti" class="texto"/></td>
            </tr>
        </table>
      </fieldset>
    </div>
    <div class="TabbedPanelsContent">
      <fieldset class="fieldset legend">
        <legend style="color:#03C"><strong>Datos del Cliente</strong></legend>
        <table width="1035" height="80" border="0">
          <tr>
            <td width="68" height="24" bgcolor="#E0E0E0"><strong>Cliente</strong></td>
            <td colspan="7" bgcolor="#E0E0E0"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
              <input name="razon" type="text" id="razon" value="" size="45"  class="texto"/>
              Ruc
              <input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" />
              Codigo
              <input name="hc" type="text" id="hc" size="15" class="texto"/>
              Direccion
              <input name="direc" type="text" id="direc" size="40" class="texto" /></td>
          </tr>
          <tr>
            <td height="24" bgcolor="#E0E0E0">Contacto</td>
            <td width="247" bgcolor="#E0E0E0"><input name="contacto" type="text" class="texto" id="contacto" size="40" /></td>
            <td width="53" bgcolor="#E0E0E0">Correo</td>
            <td colspan="5" bgcolor="#E0E0E0"><input name="correo" type="text" class="texto" id="correo" size="30"/>
              Telefono
              <input name="telefono" type="text" class="texto" id="telefono" size="8" />
              Nextel
              <input name="nextel" type="text" class="texto" id="nextel" size="9" /></td>
          </tr>
          <tr>
            <td height="24" bgcolor="#E0E0E0">Observ.</td>
            <td colspan="7" bgcolor="#E0E0E0"><input name="asunto" type="text" class="texto" id="asunto" size="80" /></td>
          </tr>
        </table>
      </fieldset>
    </div>
<div class="TabbedPanelsContent"><fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Transportista</strong></legend>
    <div class="portfolioimage"><!--<input type="button" value="Refrescar página" onClick="location.reload();" style="width: 200px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>--></div>
    <table width="1040">
  <tr>
    <td width="285" height="31"><a href="#" onclick="abreVentanachofer()"><img src="../images/nuevo.png" width="25" height="25" /></a>&nbsp;</td>
    <td width="642"><input name="sw" type="text" id="sw" onfocus="add2()" size="1" readonly="readonly"/></td>
    <td width="239">&nbsp;</td>
  </tr>
  <tr>
    <td height="31" colspan="3"><table width="1174" border="0" id="tablaDiagnostico2">
      <tr>
        <td width="232" align="center" bgcolor="#999999">Empresa
          
            <input type="hidden" name="empresa" id="empresa" />
          </td>
        <td width="237" align="center" bgcolor="#999999">Chofer
          <input type="hidden" name="chofer" id="chofer" /></td>
        <td width="108" align="center" bgcolor="#999999">Marca
          <input type="hidden" name="marca" id="marca" /></td>
        <td width="119" align="center" bgcolor="#999999">Placa Vehiculo
          <input type="hidden" name="placa" id="placa" /></td>
        <td width="95" align="center" bgcolor="#999999">Licencia
          <input type="hidden" name="brevete" id="brevete" /></td>
        <td width="115" align="center" bgcolor="#999999">Costo / Inc.igv</td>
        <td width="238" bgcolor="#999999">Delete</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="31" colspan="3">&nbsp;  </td>
  </tr>
    </table>

</fieldset></div>
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Entrega</strong></legend>
    <table  width="1036" border="0">
      <tr>
        <td height="24" bgcolor="#E0E0E0">Tipo Equipo          
          <input name="descripcion" type="text" id="descripcion" size="35" class="texto"  />
         <input name="codigo" type="hidden"  id="codigo" size="15" readonly="readonly" class="texto" />
          Codigo Equipo
          
          <label for="select2"></label>          <input name="codigocontenedor" type="text" class="texto" id="codigocontenedor" size="20"/>          <!--Generador
          <select name="select" id="select">
            <option value="000">Ninguno</option>
            <option value="001">Clip-on</option>
            <option value="002">Undermound</option>
        </select>-->
          Marca
          
          <input name="marca" type="text" id="marca" size="15" />
          Modelo
          
          <input name="modelo" type="text" id="modelo" size="15" />
          Combustible
       
          <input name="combustible" type="text" id="combustible" size="10" class="texto" /></td>
        </tr>
      <tr>
        <td height="24" bgcolor="#E0E0E0">Codigo Generador 
         
          <input type="text" name="codgenerador" id="codgenerador" class="texto"/>
          Precinto Nro 
          <input type="text" name="preciento" id="precinto" class="texto" /></td>
      </tr>
      <tr>
        <td height="24" bgcolor="#E0E0E0"><a href="#" onclick="abreVentanaGuia();">Agregar Datos desde Guia</a></td>
      </tr>
      <tr>
        <td ><input type="button" value="Adicionar"  style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>&nbsp;&nbsp;<input type="button" value="Refrescar" onClick="location.reload();" style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>&nbsp;</td>
      </tr>
      <tr>
        <td ><table width="1005" border="0">
          <tr>
            <td width="110" align="center" bgcolor="#999999">Unidad</td>
            <td width="212" align="center" bgcolor="#999999">Descripcion</td>
            <td width="190" align="center" bgcolor="#999999">Serie</td>
            <td width="68" align="center" bgcolor="#999999">Marca</td>
            <td width="68" align="center" bgcolor="#999999">Modelo</td>
            <td width="138" align="center" bgcolor="#999999">N°Eir</td>
            <td width="138" align="center" bgcolor="#999999">N°Guia</td>
            <td width="138" align="center" bgcolor="#999999">Temperatura</td>
            <td width="138" align="center" bgcolor="#999999">Peso </td>
            <td width="138" align="center" bgcolor="#999999">Precinto</td>
            <td width="138" align="center" bgcolor="#999999">&nbsp;</td>
            <td width="139" align="center" bgcolor="#999999">&nbsp;</td>
            <td width="87" align="center" bgcolor="#999999">&nbsp;</td>
            <td width="99" align="center" bgcolor="#999999">Delete</td>
          </tr>
      </table></td>
      </tr>
      <tr>
        <td bgcolor="#99CCFF" >Observaciones
      
          <input name="obse" type="text" id="obse2" size="80" class="texto"/></td>
      </tr>
    </table>
</fieldset></div>




    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Documentos Asociados</strong></legend>
    <table width="1035" border="0">
  <tr>
    <td width="140" bgcolor="#E0E0E0">Nro Guia Remision</td>
    <td width="156" bgcolor="#E0E0E0">
      <input type="text" name="c_numguia" id="c_numguia" class="texto"/>
     </td>
    <td width="115" bgcolor="#E0E0E0">Precinto Linea</td>
    <td width="153" bgcolor="#E0E0E0">
      <input type="text" name="c_plinea" id="c_plinea" class="texto"/>
      </td>
    <td width="135" bgcolor="#E0E0E0">Nro.Termografo</td>
    <td width="310" bgcolor="#E0E0E0">
      <input type="text" name="c_termogra" id="c_termogra" class="texto"/>
      </td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0">Nro Guia Transporte</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_guitra" id="c_guitra" class="texto" /></td>
    <td bgcolor="#E0E0E0">Precinto Aduana</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_paduana" id="c_paduana" class="texto"/></td>
    <td bgcolor="#E0E0E0">Horometro Inicio</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_hini" id="c_hini" class="texto" /></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0">Nro Booking</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_numbooking" id="c_numbooking" class="texto" /></td>
    <td bgcolor="#E0E0E0">Precinto Zgroup</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_ppropio" id="c_ppropio" class="texto"/></td>
    <td bgcolor="#E0E0E0">Horometro Fin</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_hfin" id="c_hfin" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0">Nro Dua</td>
    <td bgcolor="#E0E0E0">
      <input type="text" name="c_numdua" id="c_numdua" class="texto"/></td>
    <td bgcolor="#99CCFF">Precinto Otro</td>
    <td bgcolor="#99CCFF">
      <input type="text" name="c_potro" id="c_potro" class="texto" /></td>
    <td bgcolor="#99CCFF">Especificar</td>
    <td bgcolor="#99CCFF">
      <input type="text" name="c_pespecif" id="c_pespecif"class="texto" /></td>
  </tr>
  <tr>
    <td colspan="6" bgcolor="#E0E0E0">&nbsp;    </td>
    </tr>
  <tr>
    <td bgcolor="#E0E0E0">Observaciones</td>
    <td colspan="5" bgcolor="#E0E0E0">
      </td>
    </tr>
  <tr>
    <td colspan="6" bgcolor="#FFFFFF"><table width="1016" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr>
    </table>

  </fieldset>

</div>
<div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Seguimiento</strong></legend>
    <table width="1201" height="60" border="0" id="tablaDiagnostico">
      <tr>
        <td height="31" colspan="7">Usuario
          <label for="usersegui"></label>
          <select name="usersegui" id="usersegui" class="combos texto">
           <?php $tseg= ListaTipoUsuarioC();?>
            <?php foreach($tseg as $item){ ?>
            <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select>
          Tipo
<label for="tipseg"></label>
          <select name="tipseg" id="tipseg"class="combos texto">
            <?php $tseg= ListaTipoSeguimientoC();?>
            <?php foreach($tseg as $item){ ?>
            <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
            <?php }	?>
            </select>
          Fecha / Hora
          
  <input name="date" type="text" class="texto" id="date" size="20" />
  <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
  <label for="horaseg"></label>
  <script type="text/javascript">
					Calendar.setup(
					  {
					inputField     :    "date",      // id of the input field
        ifFormat       :    "%d/%m/%Y %I:%M %p",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "Image1",   // trigger for the calendar (button ID)
        singleClick    :    false,           // double-click mode
        step           :    1  
					  }
					);
		 </script>
          Ubicacion
 
  <input name="ubiseg" type="text"class="texto" id="ubiseg" size="60"/>

  <label for="desinci"></label>  &nbsp;</td>
        </tr>
      <tr>
        <td height="21" colspan="7" >Descrip.Seguimiento
          <input name="desseg" type="text"class="texto" id="desseg" size="60" />
          Descrip Incidencia
          <input name="desinci" type="text"class="texto" id="desinci" size="60"/> <input type="button" value="Adicionar"  style="width: 100px; height: 20px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/></td>
        </tr>
      <tr>
        <td width="40" height="21" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Item</strong></td>
        <td width="92" align="center"  bgcolor="#000000" style="color:#FFF"><strong>User</strong></td>
        <td width="136" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Tipo</strong></td>
        <td width="196" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Fecha y Hora Seguimiento</strong></td>
        <td width="190" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Ubicacion</strong></td>
        <td width="234" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion Seguimiento</strong></td>
        <td width="283" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion de Incidencia </strong></td>

      </tr>
  </table>
</fieldset></div>
    
    
    
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1", {defaultTab:1});
</script>


<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Transacción</strong></legend>
    <table width="1020" border="0" align="">
  <tr>
    <td align="center" bgcolor="#CCCCCC" style="color:#930"><span class="buttons">
       <input type="reset" name="button4" id="button4" value="NUEVO" class="button" />
      <input type="submit" name="GUARDAR" id="GUARDAR" value="GUARDAR" class="button" onclick="grabaform()" />
      <input type="button" name="button5" id="button5" value="CERRAR DOCUMENTO" class="button" />
    </span></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><!--<div class="buttons" align="center"><button type="button" class="positive" name="save" onclick="validagraba()" onKeyPress="return tabular(event,this)"/> <img src="../images/icon_accept.png" alt=""/>Guardar</button>

      <a href="#" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a>
      <button type="button" class="negative" name="save" onclick="linkianul()"> <img src="../images/icon_delete.png" alt=""/>Ver Documento</button> <button type="button" class="positive" name="update" onclick="linki()"> <img src="../images/icon_accept.png" alt=""/>Generar Factura con Pre-Factura</button></div>--></td>
  </tr>
  <tr>
    <td><div class="buttons" align="center"></div></td>
  </tr>
</table>
</fieldset>
</form>
</body>
</html>