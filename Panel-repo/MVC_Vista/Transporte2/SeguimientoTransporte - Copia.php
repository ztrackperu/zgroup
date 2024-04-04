<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />


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
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#razon").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#razon").result(function(event, data, formatted) {
		$("#hc").val(data[1]);
		$("#razon").val(data[2]);
		$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);
		$("#lugar").val(data[4]);
		
		$("#contacto").val(data[6]);
		$("#correo").val(data[7]);
		$("#telefono").val(data[5]);
		document.formElem.asunto.focus();
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
    <li class="TabbedPanelsTab" tabindex="0">Datos de Flete(es)</li>
    <li class="TabbedPanelsTab" tabindex="0">Resultado de Servicio</li>
 <li class="TabbedPanelsTab" tabindex="0">Seguimiento de Servicio</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos del Servicio</strong></legend>
    
    <table width="1030" border="0">
  <tr>
    <td width="142" bgcolor="#99CCFF">N° Servicio      </td>
    <td width="144" bgcolor="#99CCFF"><input name="doc" type="text" class="texto"  disabled="disabled" id="doc" value="AUTOGENERADO"  /></td>
    <td width="139" bgcolor="#99CCFF">Fecha Solicitud</td>
    <td width="143" bgcolor="#99CCFF">
      <input name="fecsolicitus" type="text" id="fecsolicitus" size="12"  class="texto"/><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
              <script type="text/javascript">
					Calendar.setup(
					  {
					 	inputField : "fecsolicitus",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  }
					);
		 </script></td>
    <td width="99" bgcolor="#99CCFF">Cotizacion      </td>
    <td width="337" bgcolor="#99CCFF"><input name="referencia" type="text" id="referencia" size="40"  class="texto" /></td>
    </tr>
  <tr>
    <td bgcolor="#99CCFF">Fecha y Hora Inicio
      </td>
    <td bgcolor="#99CCFF"><input name="fecini" type="text" class="texto" id="fecini" size="20" readonly="readonly" /><img src="../images/calendario.jpg" name="fecinix" id="fecinix" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
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
    <td colspan="4" bgcolor="#99CCFF">Descripcion de Mercaderia.
      <label for="descmer"></label>
      <label for="select4"></label>      <input name="descmer" type="text" class="texto" id="descmer" size="70"/></td>
    </tr>
  <tr>
    <td bgcolor="#99CCFF">Solicitante</td>
    <td bgcolor="#99CCFF"><select name="solicitante" id="solicitante" class="Combos texto">
    <?php $ven = Ver_Estadistica3C();?>
     <?php foreach($ven as $item){ ?>
      <option value="<?php echo $item["udni"]?>"><?php echo $item["usuario"]?></option>
      <?php }	?>
    
      </select></td>
    <td bgcolor="#99CCFF">Tipo Transporte</td>
    <td bgcolor="#99CCFF"><select name="tipotrans" id="tipotrans"  class="Combos texto">
    
      <?php $ttr= ListaTipoTransporteC();?>
     <?php foreach($ttr as $item){ ?>
      <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
      <?php }	?>
      </select></td>
    <td bgcolor="#99CCFF">Tipo de Ruta</td>
    <td bgcolor="#99CCFF"><select name="tiporuta" id="tiporuta"  class="Combos texto">
          <?php $trut= ListaTipoRutaC();?>
     <?php foreach($trut as $item){ ?>
      <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
      <?php }	?>
      </select> 
    Estado del Servicio 
    <label for="Estadoservico"></label>
    <select name="Estadoservico" id="Estadoservico">
    </select></td>
  </tr>
  </table>

  </fieldset></div>
  
  
  
  
  
  
  
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos del Cliente</strong></legend>
    <table width="1035" height="80" border="0">

    <tr>
      <td width="68" height="24" bgcolor="#6699CC"><strong>Cliente</strong></td>
      <td width="247" bgcolor="#6699CC"><!--<button type="button" class="positive" name="save5" onclick="linki2()"> Consultar</button>-->
        <a href="#"> 
          <input name="razon" type="text" id="razon" value="" size="35"  class="texto" onfocus="validacombos()"/>
          <img src="../images/search.png" width="16" height="16" border="0"  title="Buscar cliente"  onClick="abreVentana()" onMouseOver="style.cursor=cursor"/></a></td>
      <td width="53" bgcolor="#6699CC">Ruc </td>
      <td width="90" bgcolor="#6699CC"><input name="rucdni" class="texto" type="text" id="rucdni" size="12" maxlength="12" /></td>
      <td width="96" bgcolor="#6699CC">Codigo</td>
      <td width="177" bgcolor="#6699CC"><input name="hc" type="text" id="hc" size="15" class="texto"/></td>
      <td width="58" bgcolor="#6699CC">Direccion</td>
      <td width="212" bgcolor="#6699CC"><input name="direc" type="text" id="direc" size="35" class="texto" /></td>
      </tr>
    <tr>
      <td height="24" bgcolor="#6699CC">Contacto</td>
      <td bgcolor="#6699CC"><input name="contacto" type="text" class="texto" id="contacto" size="15" /></td>
      <td bgcolor="#6699CC">Correo</td>
      <td bgcolor="#6699CC"><input name="correo" type="text" class="texto" id="correo" size="15"/></td>
      <td bgcolor="#6699CC">Telefono</td>
      <td bgcolor="#6699CC"><input name="telefono" type="text" class="texto" id="telefono" size="8" /></td>
      <td bgcolor="#6699CC">Nextel</td>
      <td bgcolor="#6699CC"><input name="nextel" type="text" class="texto" id="nextel" size="9" /></td>
      </tr>
    <tr>
      <td height="24" bgcolor="#6699CC">Asunto</td>
      <td colspan="7" bgcolor="#6699CC"><input name="asunto" type="text" class="texto" id="asunto" size="80" /></td>
      </tr>
    </table>
  </fieldset></div>
  
  
  
  
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
   
    <legend style="color:#03C"><strong>Datos del Transportista</strong></legend>
    <table width="1040">
  <tr>
    <td width="136" bgcolor="#0099FF">Empresa</td>
    <td bgcolor="#0099FF"><label for="empresa"></label>
      <input name="empresa" type="text" id="empresa" size="35"  class="texto"/>      Ruc
      <label for="ructransporte"></label>
      <input name="ructransporte" type="text" id="ructransporte" size="12" class="texto" /></td>
    <td bgcolor="#0099FF">Placa Vehiculo </td>
    <td bgcolor="#0099FF"><input type="text" name="placa" id="placa" class="texto" /></td>
    <td bgcolor="#0099FF">Mtc</td>
    <td bgcolor="#0099FF"><input type="text" name="mtc" id="mtc" class="texto"/></td>
    </tr>
  <tr>
    <td bgcolor="#0099FF">Chofer</td>
    <td width="333" bgcolor="#0099FF"><input name="chofer" type="text" class="texto" id="chofer" size="30"/></td>
    <td width="109" bgcolor="#0099FF">Licencia</td>
    <td width="144" bgcolor="#0099FF"><input type="text" name="licencia" id="licencia" class="texto"/></td>
    <td width="133" bgcolor="#0099FF">Movil Chofer</td>
    <td width="157" bgcolor="#0099FF"><label for="movilchofer"></label>
      <input type="text" name="movilchofer" id="movilchofer" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">Observaciones</td>
    <td colspan="5" bgcolor="#0099FF"><label for="obst"></label>
      <input name="obst" type="text" id="obst" size="85" class="texto"/>
      Cord. de Transporte
      <input type="text" name="coordinador" id="coordinador" class="texto"/> <a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0"  /></a></td>
  </tr>
  <tr>
    <td height="31" colspan="6"><table width="1022" border="0">
      <tr>
        <td width="180" bgcolor="#999999">Empresa</td>
        <td width="190" bgcolor="#999999">Chofer</td>
        <td width="171" bgcolor="#999999">Licencia</td>
        <td width="253" bgcolor="#999999">Placa Vehiculo</td>
        <td width="170" bgcolor="#999999">Licencia</td>
        <td width="32" bgcolor="#999999">&nbsp;</td>
      </tr>
    </table></td>
    </tr>
    </table>

</fieldset></div>
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Entrega</strong></legend>
    <table  width="1036" border="0">
      <tr>
        <td width="116" height="24" bgcolor="#9999CC">Tipo Contenedor          </td>
        <td width="272" height="24" bgcolor="#9999CC"> <a href="#"> 
          <input name="descripcion" type="text" id="descripcion" size="35" class="texto"  />
        <img src="../images/search.png" alt="2" width="16" height="16" border="0"  title="Buscar Articulo"  onclick="ventanaArticulos()" onmouseover="style.cursor=cursor"/></a><input name="codigo" type="hidden"  id="codigo" size="15" readonly="readonly" class="texto" /></td>
        <td width="131" height="24" bgcolor="#9999CC">Codigo Contenedor
          <label for="codigocontenedor2"></label>
        <label for="select2"></label></td>
        <td width="120" height="24" bgcolor="#9999CC"><input name="codigocontenedor" type="text" class="texto" id="codigocontenedor" size="20"/></td>
        <td width="375" height="24" colspan="2" bgcolor="#9999CC">Generador
          <select name="select" id="select">
            <option value="000">Ninguno</option>
            <option value="001">Clip-on</option>
            <option value="002">Undermound</option>
        </select>
          Combustible
          <label for="combustible"></label>
          <input name="combustible" type="text" id="combustible" size="10" class="texto" /></td>
      </tr>
      <tr>
        <td height="24" colspan="6" bgcolor="#9999CC">Codigo Generador 
          <label for="codgenerador"></label>
          <input type="text" name="codgenerador" id="codgenerador" class="texto"/>
          Punto Partida
<label for="partida"></label>
          <label for="llegada"></label>
        <label for="textfield"></label>
        <input type="text" name="partida" id="partida" class="texto"/>          
        Punto Llegada
          <input type="text" name="llegada" id="llegada" class="texto"/>          Precinto Nro 
        <input type="text" name="preciento" id="precinto" class="texto" /></td>
      </tr>
      <tr>
        <td height="24" colspan="6" bgcolor="#9999CC">
          Observaciones
<label for="obse"></label>
        <input name="obse" type="text" id="obse" size="100" class="texto"/>
        Fecha y Hora de Entrega
   
        <input name="fecentrega" type="text"  class="texto" id="fecentrega" size="20"/><img src="../images/calendario.jpg" name="fecentregaz" id="fecentregaz" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					 inputField     :    "fecentrega",      // id of the input field
        ifFormat       :    "%d/%m/%Y %I:%M %p",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "fecentregaz",   // trigger for the calendar (button ID)
        singleClick    :    false,           // double-click mode
        step           :    1  
					  }
					);
		 </script></td>
      </tr>
      <tr>
        <td colspan="6" ><table width="1005" border="0">
          <tr>
            <td width="110" align="center" bgcolor="#999999">Unidad</td>
            <td width="212" align="center" bgcolor="#999999">Contenedor</td>
            <td width="190" align="center" bgcolor="#999999">Serie Contenedor</td>
            <td width="138" align="center" bgcolor="#999999">Genset</td>
            <td width="139" align="center" bgcolor="#999999">Serie Genset </td>
            <td width="87" align="center" bgcolor="#999999">Combustible</td>
            <td width="99" align="center" bgcolor="#999999">Precinto</td>
          </tr>
        </table></td>
      </tr>
    </table>
</fieldset></div>




    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Costo</strong></legend>
    <table width="1035" border="0">
  <tr>
    <td width="93" bgcolor="#99CC99">Tarifa Pactada</td>
    <td width="234" bgcolor="#99CC99"><label for="tarifapactada"></label>
      <input type="text" name="tarifapactada" id="tarifapactada" class="texto"/></td>
    <td width="113" bgcolor="#99CC99">Adelanto</td>
    <td width="183" bgcolor="#99CC99"><label for="adelanto"></label>
      <input type="text" name="adelanto" id="adelanto"class="texto"/></td>
    <td width="79" bgcolor="#99CC99">Restante</td>
    <td width="208" bgcolor="#99CC99"><label for="restante"></label>
      <input type="text" name="restante" id="restante" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#99CC99">Banco</td>
    <td bgcolor="#99CC99"><label for="banco"></label>
      <select name="banco" id="banco" class="combo texto">
            <?php $bco= ListaBancoC();?>
     <?php foreach($bco as $item){ ?>
      <option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
      <?php }	?>
      </select></td>
    <td bgcolor="#99CC99">Cta Cte</td>
    <td bgcolor="#99CC99"><label for="ctapago"></label>
      <input type="text" name="ctapago" id="ctapago" class="texto"/></td>
    <td bgcolor="#99CC99">Titular</td>
    <td bgcolor="#99CC99"><label for="titular"></label>
      <input type="text" name="titular" id="titular" class="texto"/></td>
  </tr>
  <tr>
    <td bgcolor="#99CC99">Observaciones</td>
    <td colspan="5" bgcolor="#99CC99"><label for="obspago"></label>
      <input name="obspago" type="text" id="obspago" size="100" class="texto"/></td>
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
     <div class="TabbedPanelsContent">
     
    
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Resultado de Servicio</strong></legend>
    <table width="1031" border="0">
  <tr>
    <td width="164" bgcolor="#CC99FF">Nro de Guia Remision</td>
    <td bgcolor="#CC99FF"><label for="guiaremision"></label>
      <input type="text" name="guiaremision" id="guiaremision" class="texto" />
      Fecha GR
      <label for="fecrm"></label>
      <input name="fecrm" type="text" id="fecrm" size="10" class="texto" /><img src="../images/calendario.jpg" name="Imagefg" id="Imagefg" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecrm",
					ifFormat   : "%d/%m/%Y",
					button     : "Imagefg"
					  }
					);
		 </script>Nro Guia Transportista
      <label for="guiatransporte"></label>
      <input type="text" name="guiatransporte" id="guiatransporte" class="texto"/>
      Fecha GT
      <label for="fecgt"></label>
      <input name="fecgt" type="text" id="fecgt" size="10" class="texto" /><img src="../images/calendario.jpg" name="fecgt2" id="fecgt2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fecgt",
					ifFormat   : "%d/%m/%Y",
					button     : "fecgt2"
					  }
					);
		 </script></td>
    </tr>
  <tr>
    <td bgcolor="#CC99FF">Resultado De Servicio</td>
    <td bgcolor="#CC99FF"><label for="select3"></label>
      <select name="select2" id="select3" class="combo texto">
      </select></td>
    </tr>
  <tr>
    <td bgcolor="#CC99FF">Observaciones</td>
    <td bgcolor="#CC99FF"><label for="obsresultado"></label>
      <input name="obsresultado" type="text" id="obsresultado" size="100" /></td>
    </tr>
</table>

  </fieldset>
    </div>    
    
    
    
    <div class="TabbedPanelsContent"><fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Seguimiento</strong></legend>
    <table width="1060" height="60" border="0" id="tablaDiagnostico">
      <tr>
        <td height="31" colspan="6">Tipo
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
  <label for="ubiseg"></label>
  <input name="ubiseg" type="text"class="texto" id="ubiseg" size="85"/>
  <label for="desseg"></label>
  <label for="desinci"></label>  <a href="#" onclick="add();"><img src="../images/agregar.png" width="20" height="20" border="0"  /></a>&nbsp;</td>
        </tr>
      <tr>
        <td height="21" colspan="2" >Descrip.Seguimiento</td>
        <td colspan="2" ><input name="desseg" type="text"class="texto" id="desseg" size="65" /></td>
        <td colspan="2" >Descrip Incidencia
        <input name="desinci" type="text"class="texto" id="desinci" size="65"/></td>
      </tr>
      <tr>
        <td width="41" height="21" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Item</strong></td>
        <td width="117" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Tipo</strong></td>
        <td width="190" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Fecha y Hora Seguimiento</strong></td>
        <td width="186" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Ubicacion</strong></td>
        <td width="237" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion Seguimiento</strong></td>
        <td width="283" align="center"  bgcolor="#000000" style="color:#FFF"><strong>Descripcion de Incidencia </strong></td>

      </tr>
  </table>
</fieldset></div>
    
    
    
  </div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
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