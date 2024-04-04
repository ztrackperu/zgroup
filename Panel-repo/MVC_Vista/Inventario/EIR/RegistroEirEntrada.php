<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro de Salida EIR</title>
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

<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script>
function validar(){
var co=document.formElem.co.options[document.formElem.co.selectedIndex].text;
if(co=='.:[Seleccione]:.'){
	jAlert('Ingrese Condicion', 'Mensaje del Sistema');
   return 0;
  }
var c_tipo=document.formElem.c_tipo.options[document.formElem.c_tipo.selectedIndex].text;  
if(c_tipo=='.:[Seleccione]:.'){
	jAlert('Ingrese Tipo Embarque', 'Mensaje del Sistema');
   return 0;
  }	
if(document.formElem.c_nomcli.value==""){
	jAlert('Ingrese nombre cliente','Mensaje del Sistema');
	  return 0;
	}

if(document.formElem.c_codprd.value==""){
	jAlert('Ingrese Equipo a Despachar','Mensaje del Sistema');
	  return 0;
	}
if(document.formElem.c_nserie.value==""){
	jAlert('Ingrese Codigo de Equipo','Mensaje del Sistema');
	  return 0;
	}
var c_tipo2=document.formElem.c_tipo2.options[document.formElem.c_tipo2.selectedIndex].text;  
if(c_tipo2=='.:[Seleccione]:.'){
	jAlert('Ingrese Condicion Equipo', 'Mensaje del Sistema');
   return 0;
  }	
if(document.formElem.transportista.value==""){
	jAlert('Ingrese Datos de Transporte','Mensaje del Sistema');
	  return 0;
	}
if(document.formElem.c_chofer.value==""){
	jAlert('Ingrese Nombre de Chofer','Mensaje del Sistema');
	  return 0;
	}
if(document.formElem.c_licencia.value==""){
	jAlert('Ingrese Licencia de Chofer','Mensaje del Sistema');
	  return 0;
	}
if(document.formElem.c_placa1.value==""){
	jAlert('Ingrese Placa Tracto','Mensaje del Sistema');
	  return 0;
	}	

if(document.formElem.c_placa2.value==""){
	jAlert('Ingrese Placa Carreta','Mensaje del Sistema');
	  return 0;
	}
var pllegada=document.formElem.pllegada.options[document.formElem.pllegada.selectedIndex].text;	
if(pllegada=='.:[Seleccione]:.'){
	jAlert('Ingrese Punto Llegada', 'Mensaje del Sistema');
   return 0;
  }
 var psalida=document.formElem.psalida.options[document.formElem.psalida.selectedIndex].text;	
if(psalida=='.:[Seleccione]:.'){
	jAlert('Ingrese Punto Salida', 'Mensaje del Sistema');
   return 0;
  }
  //auto completado de llenar cliente
}
</script>
<script>
 $().ready(function() {

	$("#c_nomcli").autocomplete("../../../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomcli").result(function(event, data, formatted) {
		$("#c_nomcli").val(data[2]);
		$("#c_codcli").val(data[1]);
		//$("#lentrega").val(data[4]);
		//$("#xlentrega").val(data[4]);
		//$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});
</script>

<body>
<form id="formElem" name="formElem" method="post" action="">
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado </strong></legend>
    <table width="757" border="0">
  <tr>
    <td width="128">Condicion</td>
    <td width="12">:</td>
    <td width="213">
      <select name="co" id="co" class="Combos texto">
        <option value="0">.:[Seleccione]:.</option>
        <option value="1">VACIO</option>
        <option value="2">LLENO</option>
        <option value="3">FCL</option>
        <option value="4">LCL</option>
      </select></td>
    <td width="122">Tipo</td>
    <td width="15">:</td>
    <td width="203">
      <select name="c_tipo" id="c_tipo" class="Combos texto">
        <option value="0">.:[Seleccione]:.</option>
        <option value="1">EMBARQUE</option>
        <option value="2">DESCARGA</option>
      </select></td>
    </tr>
  <tr>
    <td>Cliente</td>
    <td>:</td>
    <td>
      <input type="text" name="c_nomcli" id="c_nomcli" class="texto" /></td>
    <td>Codigo Cliente</td>
    <td>:</td>
    <td>
      <input type="text" name="c_codcli" id="c_codcli" class="texto"/></td>
    </tr>
  </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Datos de Equipo </strong></legend>
  <table width="759" border="0">
  <tr>
    <td width="124">Descripcion</td>
    <td width="12">:</td>
    <td width="215">
      <input type="text" name="c_codprd" id="c_codprd" class="texto"/></td>
    <td width="128">Codigo Equipo</td>
    <td width="13">:</td>
    <td width="200">
      <input type="text" name="c_nserie" id="c_nserie" class="texto" />
      <input type="hidden" name="c_idequipo" id="c_idequipo" /></td>
    </tr>
  <tr>
    <td>Estado Equipo</td>
    <td>:</td>
    <td><?php $ven = ListaestadoequipoM();?>
        <select name="estaequi" id="estaequi" class="Combos texto" >
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
      </select>&nbsp;</td>
    <td>Condicion</td>
    <td>:</td>
    <td>
      <select name="c_tipo2" id="c_tipo2" class="Combos texto">
        <option value="0">.:[Seleccione]:.</option>
        <option value="1">LIMPIO</option>
        <option value="2">SUCIO</option>
      </select></td>
    </tr>
  <tr>
    <td>Precinto Zgroup</td>
    <td>:</td>
    <td>
      <input type="text" name="c_precinto" id="c_precinto" class="texto"/></td>
    <td>Precinto Cliente</td>
    <td>:</td>
    <td>
      <input type="text" name="c_precintocli" id="c_precintocli" class="texto"/></td>
    </tr>
  </table>

</fieldset>
<fieldset class="fieldset legend">
<legend style="color:#03C"><strong>Datos de Transportista </strong></legend>
    <table width="762" border="0">
  <tr>
    <td width="129">Empresa</td>
    <td width="11">:</td>
    <td width="232">
      <input type="text" name="transportista" id="transportista"  class="texto"/>
      <input type="hidden" name="c_ructra" id="c_ructra" /></td>
    <td width="135"><a href="#" onclick="abreVentanachofer()">Chofer</a></td>
    <td width="14">:</td>
    <td width="215">
      <input type="text" name="c_chofer" id="c_chofer" class="texto" /></td>
    </tr>
  <tr>
    <td>Placa Carreta</td>
    <td>:</td>
    <td>
      <input name="c_placa2" type="text" id="c_placa2" size="5" class="texto" />
      Placa Tracto
      
      <input name="c_placa1" type="text" id="c_placa1" size="5" class="texto" /></td>
    <td>Licencia</td>
    <td>:</td>
    <td>
      <input type="text" name="c_licencia" id="c_licencia" class="texto"/></td>
    </tr>
</table>
</fieldset>
<fieldset class="fieldset legend">
<legend style="color:#03C"><strong>Datos de Adicionales </strong></legend>
<table width="762" border="0">
  <tr>
    <td width="125">Tecnico</td>
    <td width="8">:</td>
    <td>
      <input type="text" name="c_nomtec" id="c_nomtec" class="texto"/></td>
    <td width="135">Fecha y Hora</td>
    <td width="13">:</td>
    <td width="212"> <input name="c_fechora" type="text" id="c_fechora" size="20" class="texto"/><img src="../images/calendario.jpg" name="fecinix" id="fecinix" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">


      <script type="text/javascript">
					Calendar.setup(
					  {
					 inputField     :    "c_fechora",      // id of the input field
        ifFormat       :    "%d/%m/%Y %I:%M %p",       // format of the input field
        showsTime      :    true,            // will display a time selector
        button         :    "fecinix",   // trigger for the calendar (button ID)
        singleClick    :    false,           // double-click mode
        step           :    1  
					  }
					);
		 </script>&nbsp;</td>
  </tr>
  <tr>
    <td>Punto Salida</td>
    <td>:</td>
    <td><?php $dist=ListalugaresM();?>
      <select name="psalida" id="psalida" class="combo texto">
        <option value="0">.:[Seleccione]:.</option>
        <?php foreach($dist as $item){?>
        <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
        <?php }	?>
      </select>&nbsp;</td>
    <td>Punto Llegada</td>
    <td>:</td>
    <td><?php $dist=ListalugaresM();?>
              <select name="pllegada" id="pllegada" class="combo texto">
              <option value="0">.:[Seleccione]:.</option>
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    
    </select>&nbsp;</td>
  </tr>
  <tr>
    <td>Observaciones</td>
    <td>:</td>
    <td colspan="4">
      <input name="c_obseir" type="text" id="c_obseir" size="50" class="texto"/></td>
    </tr>
</table>
</fieldset>
<input type="button" name="button" id="button" value="Registrar" onclick="validar()"/>
<input type="reset" name="Cancelar" id="Cancelar" value="Cancelar" />
</form>
</body>
</html>