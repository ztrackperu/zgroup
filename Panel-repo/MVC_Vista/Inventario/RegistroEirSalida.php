<?php 
if($carga_guia_genEIR!=NULL){
	foreach($carga_guia_genEIR as $itemC){
		//c.c_numguia,d_fecgui,c.d_fecreg,c_numeir,c_nomdes,c_rucdes,c_parti,c_llega,c_ructra,c_chofer
//,c_placa,c_marca,c_licenci,n_item,c_codprd,c_codequipo,c_desprd,c_obsprd,cod_tipo
		$c_numguia=$itemC['c_numguia'];
		$c_nomdes=$itemC['c_nomdes'];
		$c_coddes=$itemC['c_coddes'];
		$c_ructra=$itemC['c_ructra'];
		$c_nomtra=$itemC['c_nomtra'];
		$c_chofer=$itemC['c_chofer'];
		$c_placa=$itemC['c_placa'];
		$c_marca=$itemC['c_marca'];												
		$c_licenci=$itemC['c_licenci'];	
		$c_codprd=$itemC['c_codprd'];	
		$c_codequipo=$itemC['c_codequipo'];	
		$c_desprd=$itemC['c_desprd'];		
		$c_codest=$itemC['c_estaequipo'];
		$cod_tipo=$itemC['cod_tipo'];
		}
	
	}
?>
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
var co=document.form1.co.options[document.form1.co.selectedIndex].text;
if(co=='.:[Seleccione]:.'){
	jAlert('Ingrese Condicion', 'Mensaje del Sistema');
   return 0;
  }
var c_tipo=document.form1.c_tipo.options[document.form1.c_tipo.selectedIndex].text;  
if(c_tipo=='.:[Seleccione]:.'){
	jAlert('Ingrese Tipo Embarque', 'Mensaje del Sistema');
   return 0;
  }	
if(document.form1.c_nomcli.value==""){
	jAlert('Ingrese nombre cliente','Mensaje del Sistema');
	  return 0;
	}

if(document.form1.c_codprd.value==""){
	jAlert('Ingrese Equipo a Despachar','Mensaje del Sistema');
	  return 0;
	}
if(document.form1.c_nserie.value==""){
	jAlert('Ingrese Codigo de Equipo','Mensaje del Sistema');
	  return 0;
	}
var c_tipo2=document.form1.c_tipo2.options[document.form1.c_tipo2.selectedIndex].text;  
if(c_tipo2=='.:[Seleccione]:.'){
	jAlert('Ingrese Condicion Equipo', 'Mensaje del Sistema');
   return 0;
  }	
if(document.form1.transportista.value==""){
	jAlert('Ingrese Datos de Transporte','Mensaje del Sistema');
	  return 0;
	}
if(document.form1.c_chofer.value==""){
	jAlert('Ingrese Nombre de Chofer','Mensaje del Sistema');
	  return 0;
	}
if(document.form1.c_licencia.value==""){
	jAlert('Ingrese Licencia de Chofer','Mensaje del Sistema');
	  return 0;
	}
if(document.form1.c_placa1.value==""){
	jAlert('Ingrese Placa Tracto','Mensaje del Sistema');
	  return 0;
	}	

if(document.form1.c_placa2.value==""){
	jAlert('Ingrese Placa Carreta','Mensaje del Sistema');
	  return 0;
	}
var pllegada=document.form1.pllegada.options[document.form1.pllegada.selectedIndex].text;	
if(pllegada=='.:[Seleccione]:.'){
	jAlert('Ingrese Punto Llegada', 'Mensaje del Sistema');
   return 0;
  }
 var psalida=document.form1.psalida.options[document.form1.psalida.selectedIndex].text;	
if(psalida=='.:[Seleccione]:.'){
	jAlert('Ingrese Punto Salida', 'Mensaje del Sistema');
   return 0;
  }

}
</script>
<script>
function abreVentanachofer(){
	var codigo=document.getElementById("transportista").value;
	var cod=document.getElementById("hiddenField2").value;
			if (codigo=="") {
				alert ("Debe introducir Transportista");
				document.getElementById("transportista").focus();
				return 0;
			} else {
	
			miPopup = window.open("../MVC_Controlador/InventarioC.php?acc=verchoferes&udni=<?php echo $_GET['udni'];?>&cod="+cod,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}
function abreVentana(){
	
var codigo=document.form1.hiddenField5.value;
var tiping=document.form1.tiping.value;
	var cod=codigo
	var sw='1';
	var xsw='2';
	var res='1';
	var valor='unidad'

			if (codigo=="") {
				alert ("Debe Ingresar Codigo Equipo");
} else {
miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosEIR&udni=<?php echo $udni;?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&res="+res+"&tip="+tiping,"miwin","width=700,height=380,scrollbars=yes");
miPopup.focus();
			}
		}			
</script>
<script>
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
 $().ready(function() {

	$("#c_nomcli").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomcli").result(function(event, data, formatted) {
		$("#c_nomcli").val(data[2]);
		$("#c_codcli").val(data[1]);
	});
});
</script>
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/blccbx.css" rel='stylesheet' type='text/css'/>
<script src="../js/bljjShadowbx2.js" type='text/javascript'></script>


<!-- Ventana modal ShadowBox Balcn-->
<script type="text/javascript" >
Shadowbox.init({
overlayColor: "#000",
overlayOpacity: "0.6",
});
</script>
</script>
<body>
<strong style="color:#99C">GENERACION DE EIR SALIDA</strong>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=regeirv2&udni=<?php echo $_GET['udni'] ?>">
<?php  if($c_numguia==""){echo '<strong style="color:#0000FF">El siguiente EIR se esta realizando sin guia remision</strong>';}else{echo '<strong style="color:#0000FF">El siguiente EIR se esta realizando con referencia al Nro de Guia '.$c_numguia.'</strong>';} ?>
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
      <input name="c_nomcli" type="text" class="texto" id="c_nomcli" value="<?php echo $c_nomdes ?>" size="35" /></td>
    <td>Codigo Cliente</td>
    <td>:</td>
    <td>
      <input type="text" name="c_codcli" id="c_codcli" class="texto" 
      value="<?php echo $c_coddes ?>"/></td>
    </tr>
  </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#C96"><strong>Datos de Equipo </strong></legend>
  <table width="794" border="0">
  <tr>
    <td width="132">Descripcion
      <input name="tiping" type="hidden" id="tiping" value="2" />
      <input type="hidden" name="hiddenField5" id="hiddenField5" value="<?php echo $cod_tipo ?>" /></td>
    <td width="14">:</td>
    <td width="224">
      <input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $c_desprd ?>" size="35"/></td>
    <td width="126"><a href="#" onclick="abreVentana()">Codigo Equipo</a></td>
    <td width="15">:</td>
    <td width="178"><input type="text" name="c_nserie" id="c_nserie" class="texto" 
    value="<?php echo $c_codprd ?>" /><input type="hidden" name="c_idequipo" id="c_idequipo" value="<?php echo $c_codequipo ?>"/></td>
    <td width="75" rowspan="3">
    
    <a rel="shadowbox;width=1500;height=760" href="../MVC_Controlador/cajaC.php?acc=datosmanufactura&amp;cod=<?php echo $c_codequipo;?>&amp;situ=<?php echo ""?>&amp;udni=<?php echo $_GET['udni'];?>&amp;codclase=<?php echo $cod_tipo;?>">
    
    
    
    <img src="../Updateequipo.png" alt="" width="70" height="70" /></a></td>
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
    <td><select name="c_tipo2" id="c_tipo2" class="Combos texto">
      <option value="0">.:[Seleccione]:.</option>
      <option value="1">LIMPIO</option>
      <option value="2">SUCIO</option>
    </select></td>
    </tr>
  <tr>
    <td height="24">Precinto Zgroup</td>
    <td>:</td>
    <td>
      <input type="text" name="c_precinto" id="c_precinto" class="texto"/></td>
    <td>Precinto Cliente</td>
    <td>:</td>
    <td><input type="text" name="c_precintocli" id="c_precintocli" class="texto"/></td>
  </tr>
  </table>

</fieldset>
<fieldset class="fieldset legend">
<legend style="color:#09C"><strong>Datos de Transportista </strong></legend>
    <table width="762" border="0">
  <tr>
    <td width="129">Empresa
      <input type="hidden" name="c_ructra" id="c_ructra" value="<?php echo $c_ructra ?>" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $c_ructra ?>"/></td>
    <td width="11">:</td>
    <td width="232">
      <input name="transportista" type="text"  class="texto" id="transportista" value="<?php echo $c_nomtra ?>" size="35"/></td>
    <td width="128"><a href="#" onclick="abreVentanachofer()">Chofer</a></td>
    <td width="13">:</td>
    <td width="223">
      <input name="c_chofer" type="text" class="texto" id="c_chofer" size="30" value="<?php echo $c_chofer ?>" /></td>
    </tr>
  <tr>
    <td>Placa Carreta</td>
    <td>:</td>
    <td>
      <input name="c_placa2" type="text" id="c_placa2" size="7" class="texto" />
      Placa Tracto
      
      <input name="c_placa1" type="text" id="c_placa1" size="7" class="texto" <?php echo $c_placa ?> /></td>
    <td>Licencia</td>
    <td>:</td>
    <td>
      <input type="text" name="c_licencia" id="c_licencia" class="texto" value="<?php echo $c_licenci ?>"/></td>
    </tr>
</table>
</fieldset>
<fieldset class="fieldset legend">
<legend style="color:#96F"><strong>Datos de Adicionales </strong></legend>
<table width="762" border="0">
  <tr>
    <td width="129">Tecnico</td>
    <td width="11">:</td>
    <td width="236">
      <input type="text" name="c_nomtec" id="c_nomtec" class="texto"/></td>
    <td width="124">Fecha y Hora</td>
    <td width="13">:</td>
    <td width="223"> <input name="c_fechora" type="text" id="c_fechora" size="20" class="texto"/><img src="../images/calendario.jpg" name="fecinix" id="fecinix" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">


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