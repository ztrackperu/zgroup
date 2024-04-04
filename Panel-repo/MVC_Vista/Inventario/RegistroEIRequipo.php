<?php 
if(!empty($resu)){
foreach($resul as $item){
	
//c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo
$c_fecnac=$item['c_fecnac'];
$c_idequipo=$item['c_idequipo'];//clave maestro
$c_codprd=$item['c_codprd'];
$c_nserie=$item['c_nserie'];
$d_fecing=$item['d_fecing'];
$c_codmar=$item['c_codmar'];
$c_codmod=$item['c_codmod'];
$c_codcol=$item['c_codcol'];
$c_anno=$item['c_anno'];
$c_control=$item['c_control'];
$c_mcamaq=$item['c_mcamaq'];
$pr_razo=$item['pr_razo'];
$d_fecing=$item['d_fecing'];
$d_fcrea=$item['d_fcrea'];
$c_nronis=$item['c_nronis'];
$c_codest=$item['c_codest'];
$cod_prov=$item['c_codanx'];
$c_anno=$item['c_anno'];
$proveedor=$item['pr_razo'];
$c_refnaci=$item['c_refnaci'];
$c_nacional=$item['c_nacional'];
	
$c_tipoio=$item['c_tipoio']; 
$c_codcli=$item['c_codcli'];
$c_nomcli=$item['c_nomcli'];
$c_nomcli2=$item['c_nomcli2'];
$c_nomtec=$item['c_nomtec'];
$c_fecdoc=$item['c_fecdoc'];
$c_placa1=$item['c_placa1'];
$c_placa2=$item['c_placa2'];
$c_chofer=$item['c_chofer'];
$c_fechora=$item['c_fechora'];
$c_condicion=$item['condi'];
$c_tipois=$item['c_tipois'];
$c_tipo=$item['c_tipo'];
$c_tipo2=$item['c_tipo2'];
$c_tipo3=$item['c_tipo3'];
$c_obs=$item['c_obs'];
$c_combu=$item['c_combu'];
$c_usuario=$_GET['udni'];
$c_precinto=$item['c_precinto'];
$c_almacen=$item['c_almacen'];
$c_material=$item['c_material'];	
$c_numeir=$item['c_numeir'];
$c_tara=$item['c_tara'];
$c_peso=$item['c_peso'];
$c_cfabri=$item['c_cfabri'];
$c_cmodel=$item['c_cmodel'];
$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
$codmar=$item['c_codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
$procedencia=$item['c_procedencia'];
	
	
	}
}else{
	if(!empty($resu)){
	foreach($resulv2 as $item){
	
	//c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo
	$c_fecnac=$item['c_fecnac'];
	$c_idequipo=$item['c_idequipo'];//clave maestro
	$c_codprd=$item['c_codprd'];
	$c_nserie=$item['c_nserie'];
	$d_fecing=$item['d_fecing'];
	$c_codmar=$item['c_codmar'];
	$c_codmod=$item['c_codmod'];
	$c_codcol=$item['c_codcol'];
	$c_anno=$item['c_anno'];
	$c_control=$item['c_control'];
	$c_mcamaq=$item['c_mcamaq'];
	$pr_razo=$item['pr_razo'];
	$d_fecing=$item['d_fecing'];
	$d_fcrea=$item['d_fcrea'];
	$c_nronis=$item['c_nronis'];
	$c_codest=$item['c_codest'];
	$cod_prov=$item['c_codanx'];
	$c_anno=$item['c_anno'];
	$proveedor=$item['pr_razo'];
	$c_refnaci=$item['c_refnaci'];
	$c_nacional=$item['c_nacional'];
	
	$c_tipoio=$item['c_tipoio']; 
	$c_codcli=$item['c_codcli'];
	$c_nomcli=$item['c_nomcli'];
	$c_nomcli2=$item['c_nomcli2'];
	$c_nomtec=$item['c_nomtec'];
	$c_fecdoc=$item['c_fecdoc'];
	$c_placa1=$item['c_placa1'];
	$c_placa2=$item['c_placa2'];
	$c_chofer=$item['c_chofer'];
	$c_fechora=$item['c_fechora'];
	$c_condicion=$item['condi'];
	$c_tipois=$item['c_tipois'];
	$c_tipo=$item['c_tipo'];
	$c_tipo2=$item['c_tipo2'];
	$c_tipo3=$item['c_tipo3'];
	$c_obs=$item['c_obs'];
	$c_combu=$item['c_combu'];
	$c_usuario=$_GET['udni'];
	$c_precinto=$item['c_precinto'];
	$c_almacen=$item['c_almacen'];
	$c_material=$item['c_material'];	
	$c_numeir=$item['c_numeir'];
	$c_tara=$item['c_tara'];
	$c_peso=$item['c_peso'];
	$c_cfabri=$item['c_cfabri'];
	$c_cmodel=$item['c_cmodel'];
$c_idequipo=$item['c_idequipo'];$c_codprd=$item['c_codprd'];$c_nserie=$item['c_nserie'];
$codmar=$item['c_codmar'];$c_codmod=$item['c_codmod'];$c_codcol=$item['c_codcol'];$c_anno=$item['c_anno'];$c_control=$item['c_control'];$c_codcat=$item['c_codcat'];$c_tiprop=$item['c_tiprop'];$c_mcamaq=$item['c_mcamaq'];$c_procedencia=$item['c_procedencia'];$c_nroejes=$item['c_nroejes'];$c_tamCarreta=$item['c_tamCarreta'];$c_serieequipo=$item['c_serieequipo'];$c_peso=$item['c_peso'];$c_tara=$item['c_tara'];
$c_seriemotor=$item['c_seriemotor'];$c_canofab=$item['c_canofab'];$c_cmesfab=$item['c_cmesfab'];$c_cfabri=$item['c_cfabri'];$c_cmodel=$item['c_cmodel'];$c_ccontrola=$item['c_ccontrola'];$c_tipgas=$item['c_tipgas'];
$procedencia=$item['c_procedencia'];
	
	}
	}
}
  
$i_swequipo = !empty($_GET['swequipo'])?$_GET['swequipo']:"";
echo $i_swequipo;

if($i_swequipo=='1'){
    $c_desprd=$_GET['nom'];
    $xc_cod=$_GET['coprod'];
    $c_codequipo=$_GET['c_codequipo'];
    //$c_codequipo=substr($c_desprd,0,1).'-'.$_GET['c_codequipo'];
}

if(!empty($carga_guia_genEIR)){
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
		$xc_cod=$itemC['c_cod'];
		/////////
		$c_nserie=!empty($itemC['c_nserie'])?$itemC['c_nserie']:"";
		}
            
        }else{
            $c_numguia="";
            $c_nomdes="";
            $c_coddes="";
            $c_ructra="";
            $c_nomtra="";
            $c_chofer="";
            $c_placa="";
            $c_marca="";											
            $c_licenci="";	
            $c_codprd="";	
            $c_codequipo="";
            $c_desprd="";		
            $c_codest="";
            $cod_tipo="";
            $xc_cod="";
            /////////
            $c_nserie="";
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
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
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
if(document.form1.c_fechora.value==""){
	jAlert('Ingrese Fecha EIR','Mensaje del Sistema');
	  return 0;
	}
	/*var myString = '  foo    ';
myString = $.trim( myString );
console.log( myString );  // foo*/
	var tecnico= document.form1.c_nomtec.value
	var tec=$.trim(tecnico);
if(tec==""){
	jAlert('Ingrese Nombre Tecnico','Mensaje del Sistema');
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
  var transporte=document.form1.transportista.value;
  var tra=$.trim(transporte);
  var lonjt=document.form1.transportista.value.length;	
if(tra=="" || lonjt<=10){
	jAlert('Ingrese Datos Validos de Transportista','Mensaje del Sistema');
	  return 0;
	}
	chofer=document.form1.c_chofer.value;
	cho=$.trim(chofer);
	var loncho=document.form1.c_chofer.value.length;
if(cho=="" || loncho<=10){
	jAlert('Ingrese Nombre valido de Chofer','Mensaje del Sistema');
	  return 0;
	}
	  var lonlic=document.form1.c_licencia.value.length;
if(document.form1.c_licencia.value=="" || lonlic<=8){
	jAlert('Ingrese Licencia Valida de Chofer','Mensaje del Sistema');
	  return 0;
	}
	var lonpla=document.form1.c_placa1.value.length;
if(document.form1.c_placa1.value=="" || lonpla<=4){
	jAlert('Ingrese Placa Valida Tracto','Mensaje del Sistema');
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
 var fecha=document.form1.c_fechora.value;
if(fecha==''){
	jAlert('Ingrese Fecha Eir', 'Mensaje del Sistema');
	document.form1.c_fechora.focus();
   return 0;
  }
jConfirm("Seguro de Grabar EIR <?php echo !empty($sw)?$sw:""; ?> ?", "Mensaje Confirmacion", function(r) {
			if(r) {
				document.getElementById("form1").submit();
			} else {
				return 0;
			}
		});
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
miPopup = window.open("../MVC_Controlador/cajaC.php?acc=verccodigosEIR&udni=<?php echo $_GET['udni'];?>&cod="+cod+"&val="+valor+"&sw="+sw+"&xsw="+xsw+"&res="+res+"&tip="+tiping,"miwin","width=700,height=380,scrollbars=yes");
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
<script type="text/javascript">	
$().ready(function() {

	$("#c_codprd").autocomplete("../MVC_Controlador/cajaC.php?acc=proautocoti", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_codprd").result(function(event, data, formatted) {
		$("#c_codprd").val(data[2]);
		$("#c_codprod").val(data[1]);
		$("#hiddenField5").val(data[5]);
		var valor=document.getElementById('hiddenField5').value

		//document.formElem.precio.focus();
	});
});			
</script>
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/blccbx.css" rel='stylesheet' type='text/css'/>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
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
<strong style="color:#99C">GENERACION DE EIR <?php echo $_GET['sw']; ?></strong>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=regeirv2&udni=<?php echo $_GET['udni'] ?>">
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Datos Eir</li>
    <li class="TabbedPanelsTab" tabindex="0">Datos Equipos</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent"><?php  if(empty($c_numguia)){echo '<strong style="color:#0000FF">El siguiente EIR se esta realizando sin guia remision</strong>';}else{echo '<strong style="color:#0000FF">El siguiente EIR se esta realizando con referencia al Nro de Guia '.$c_numguia.'</strong>';} ?>
  <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong>Encabezado </strong></legend>
    <table width="757" border="0">
  <tr>
    <td>Fecha de Sistema</td>
    <td>:</td>
    <td>
      <input type="text" name="fecsistema" id="fecsistema" class="texto" value="<?php echo date("d/m/Y") ?>" /></td>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
      </select>
      <input type="hidden" name="c_tipoio" id="c_tipoio" value="<?php if($sw=='SALIDA'){echo '2';}else{echo '1';} ?>" />
      <input type="hidden" name="c_tipois" id="c_tipois" />
      <input type="hidden" name="c_numguia" id="c_numguia" 
      value="<?php if(empty($c_numguia)){echo $oc;}else{echo $c_numguia;} ?>" />
      <input type="hidden" name="eirsal" id="eirsal" value="<?php echo $guia; ?>" /></td>
    <td width="122" align="right">Tipo Movimiento</td>
    <td width="15">:</td>
    <td width="203">
      <select name="c_tipo" id="c_tipo" class="Combos texto">
        <option value="0">.:[Seleccione]:.</option>
        <option value="1">EMBARQUE</option>
        <option value="2">DESCARGA</option>
      </select>
      <input type="hidden" name="ingdirec" id="ingdirec" value="<?php echo $_REQUEST['ingdirec'] ?>" /></td>
    </tr>
  <tr>
    <td>Cliente</td>
    <td>:</td>
    <td>
      <input name="c_nomcli" type="text" class="texto" id="c_nomcli" value="<?php echo $c_nomdes ?>" size="35" /></td>
    <td align="right">Codigo Cliente</td>
    <td>:</td>
    <td>
      <input type="text" name="c_codcli" id="c_codcli" class="texto" 
      value="<?php echo $c_coddes ?>"/></td>
    </tr>
  </table>
</fieldset>
<fieldset class="fieldset legend">
    <legend style="color:#C96"><strong>Datos de Equipo </strong></legend>
  <table width="844" border="0">
  <tr>
    <td width="125">Descripcion
      <input name="tiping" type="hidden" id="tiping" value="<?php echo !empty($_GET['tipoing'])?$_GET['tipoing']:""; ?>" />
      <input type="hidden" size="3" name="hiddenField5" id="hiddenField5" value="<?php echo $cod_tipo ?>" /></td>
    <td width="12">:</td>
    <td width="222">
      <input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $c_desprd ?>" size="35"/></td>
    <td width="138" align="right"><a href="#" onclick="abreVentana()">Codigo Equipo</a></td>
    <td width="20">:</td>
    <td width="179"><input name="c_nserie" type="text" class="texto" id="c_nserie" 
    value="<?php if(!empty($_GET['flag']) AND $_GET['flag']=='1'){echo substr(ltrim($c_codequipo),2,30);}else{echo substr(ltrim($c_codequipo),2,30);} //$c_codprd ?>" readonly="readonly" />
    
    <input type="text" name="c_idequipo" id="c_idequipo" value="<?php echo ltrim($c_codequipo) ?>"/>
    
    </td>
    <td width="70" rowspan="3"><a rel="shadowbox;width=1500;height=760" href="../MVC_Controlador/cajaC.php?acc=datosmanufactura&cod=<?php echo $c_codequipo;?>&situ=<?php echo ""?>&udni=<?php echo $_GET['udni'];?>&codclase=<?php echo $cod_tipo;?>&swequipo=1&c_codequipo=<?php echo $c_codequipo; ?>&nom=<?php echo $nom; ?>&coprod=<?php echo $coprod; ?>"><img src="../images/analitico.jpg" alt="" width="70" height="71" /></a></td>
    <td width="44">&nbsp;</td>
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
      </select>&nbsp;
      <input type="hidden" name="c_codprod" id="c_codprod" size="5" value="<?php echo $coprod; ?>" />
      <input type="hidden" name="item" id="item" value="<?php echo $itemG; ?>" /></td>
    <td align="right">Condicion Equipo</td>
    <td>:</td>
    <td><select name="c_tipo2" id="c_tipo2" class="Combos texto">
      <option value="0">.:[Seleccione]:.</option>
      <option value="1">LIMPIO</option>
      <option value="2">SUCIO</option>
    </select></td>
    <td width="44"><input type="checkbox" name="swequipo" id="swequipo" />
      <label for="swequipo"></label></td>
    </tr>
  <tr>
    <td height="24">Precinto Zgroup</td>
    <td>:</td>
    <td>
      <input type="text" name="c_precinto" id="c_precinto" class="texto"/></td>
    <td align="right">Precinto Cliente</td>
    <td>:</td>
    <td><input type="text" name="c_precintocli" id="c_precintocli" class="texto"/></td>
    <td width="44">&nbsp;</td>
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
    <td width="219">
      <input name="transportista" type="text"  class="texto" id="transportista" value="<?php echo $c_nomtra ?>" size="35"/></td>
    <td width="141" align="right"><a href="#" onclick="abreVentanachofer()">Chofer</a></td>
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
    <td align="right">Licencia</td>
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
    <td width="219">
      <input type="text" name="c_nomtec" id="c_nomtec" class="texto"/></td>
    <td width="141" align="right">Fecha y Hora <?php echo strtolower($_GET['sw']) ?></td>
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
    <td align="right">Punto Llegada</td>
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
</fieldset></div>
    <div class="TabbedPanelsContent">
	
	<?php /*?><?php if($codtipo=='001' || $codtipo=='015' || $codtipo=='003'){?>
    <table width="796" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="4" align="left"><input type="hidden" name="c_tipoio" id="c_tipoio"  value="<?php echo $tiping; ?>"/>
                  ()</td>
              </tr>
              <tr>
                <td width="124">Descripcion</td>
                <td colspan="3"><input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $des ?>" size="35" />
                  <input type="text" name="c_idequipo" id="c_idequipo"  value="<?php echo $idequipo ?>" class="texto" />
                  <?php $estado = EquipoestadoM();?>
                  <select name="estado" id="estado">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($estado as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest){?>selected  <?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
              </tr>
              <tr>
                <td>Serie</td>
                <td width="268"><input name="c_nserie" type="text" class="texto" id="c_nserie" value="<?php echo $idequipo ?>" size="20" /></td>
                <td>&nbsp;Estado Situacion Almacen</td>
                <td><?php if($_GET['udni']=='41696274' || $_GET['udni']=='43377015') {?>
                  &nbsp;
                  <?php $ven = ListaestadoequipoM();?>
                  <select name="estaequi" id="estaequi" class="Combos texto" >
                    <?php foreach($ven as $item){?>

                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select>
                  <?php } ?>
                  &nbsp;</td>
              </tr>
              <tr></tr>
              <tr>
                <td colspan="2" bgcolor="#CCCCCC"><strong>DATOS DE EQUIPO</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Año Fabricacion</td>
                <td><?php $ven = listaannoM();?>
                  <select name="c_anno" id="c_anno" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"<?php if($item["tm_codi"]==$c_anno){?>selected<?php }?>><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td width="185"><input type="text" name="udni" id="udni" value="<?php echo $_GET['udni'] ?>" />&nbsp;</td>
                <td width="219">&nbsp;</td>
              </tr>
              <tr>
                <td>Mes Fabricacion</td>
                <td><?php $ven = listamesM();?>
                  <select name="mfab1" id="mfab1" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><p>Marca </p></td>
                <td><?php $ven = ListaMarcaCajaM();?>
                  <select name="codmar" id="codmar"  class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Fabricante</td>
                <td><label for="c_fabcaja"></label>
                  <input type="text" name="c_fabcaja" id="c_fabcaja" class="texto" value="<?php echo $c_fabcaja ?>"  /></td>
                <td>&nbsp;</td>
                <td><input type="hidden" name="c_cfabri" id="c_cfabri" class="texto"/></td>
              </tr>
              <tr>
                <td>Color</td>
                <td><?php $color = listacolorM();?>
                  <select name="c_codcol" id="c_codcol" class="combo texto">
                    <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($color as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codcol){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td><input type="hidden" name="c_cmodel" id="c_cmodel" class="texto"/></td>
              </tr>
              <tr>
                <td>Tipo Material</td>
                <td><?php $ven = listamaterialM();?>
                  <select name="material" id="material" class="combo texto">
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["tm_codi"]?>"><?php echo $item["tm_desc"]?></option>
                    <?php }	?>
                  </select></td>
                <td>&nbsp;</td>
                <td><input type="hidden" name="c_serieequipo" id="c_serieequipo" class="texto"/></td>
              </tr>
              <tr>
                <td>Procedencia</td>
                <td><label for="c_procedencia"></label>
                  <input type="text" name="c_procedencia" id="c_procedencia" class="texto" value="<?php echo $c_procedencia ?>"/></td>
                <td>&nbsp;</td>
                <td><input type="hidden" name="c_ccontrola" id="c_ccontrola" class="texto"/></td>
              </tr>
              <tr>
                <td colspan="2" bgcolor="#CCCCCC"><strong>DATOS PESO:</strong></td>
                <td>&nbsp;</td>
                <td><input type="hidden" name="c_tipgas" id="c_tipgas"class="texto" /></td>
              </tr>
              <tr>
                <td>Tara</td>
                <td><input type="text" name="c_tara" id="c_tara" class="texto" value="<?php echo $c_tara ?>"/></td>
                <td><input type="hidden" name="c_nroejes" id="c_nroejes" />
                  <input type="hidden" name="c_tamCarreta" id="c_tamCarreta" />
                  <input type="hidden" name="c_seriemotor" id="c_seriemotor" />
                  <input type="hidden" name="c_codmod" id="c_codmod" />
                  <input type="hidden" name="c_control" id="c_control" />
                  <input name="c_nacional" type="hidden" id="c_nacional" value="0" />
                  <input type="hidden" name="c_refnaci" id="c_refnaci" /></td>
                <td><input type="hidden" name="c_canofab" id="c_canofab" />
                  <input type="hidden" name="c_cmesfab" id="c_cmesfab" />
                  <input type="hidden" name="c_mcamaq" id="c_mcamaq" /></td>
              </tr>
              <tr>
                <td>Peso Maximo</td>
                <td><input type="text" name="c_peso" id="c_peso"  class="texto" value="<?php echo $c_peso ?>"/></td>
                <td><input type="hidden" name="c_codcat" id="c_codcat" />
                  <input type="hidden" name="c_tiprop" id="c_tiprop" /></td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" align="center"></td>
              </tr>
            </table>
    <? }?><?php */?>
    </div>
  </div>
</div>

<br />
<table width="200" border="0" align="center">
  <tr>
    <td align="center"><input type="button" name="button" id="button" value="Registrar" onclick="validar()"/></td>
    <td align="center"><input type="reset" name="Cancelar" id="Cancelar" value="Cancelar" /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>