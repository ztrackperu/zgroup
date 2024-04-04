<?php 
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
	$c_refnaci=$item['c_refnaci'];
	$c_nacional=$item['c_nacional'];
	
	$proveedor=$item['pr_razo'];
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


  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

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
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="../js/autocomplete_LUI.js"></script>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
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
//		$("#hiddenField2").val(data[1]);
			//$("#c_chofer").val(data[4]);
			//	$("#c_placa1").val(data[3]);
				//$("#licencia").val(data[5]);
								//$("#marca").val(data[6]);
		
		//document.getElementById('textfield3').focus();
	});
});
function abreVentanachofer(){
	var codigo=document.getElementById("transportista").value;
	var cod=document.getElementById("hiddenField2").value;
			if (codigo=="") {
				alert ("Debe introducir Transportista");
				document.getElementById("transportista").focus();
				return 0;
			} else {
	
			miPopup = window.open("../MVC_Controlador/InventarioC.php?acc=verchoferes&udni=<?php echo $udni;?>&cod="+cod,"miwin",
			"width=700,height=380,scrollbars=yes");
			miPopup.focus();
			}
		}

$().ready(function() {
	
	
	$("#c_nomcli").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#c_nomcli").result(function(event, data, formatted) {
		$("#c_nomcli").val(data[2]);
		$("#c_codcli").val(data[1]);
		//$("#textfield7").val(data[3]);
		//$("#lentrega").val(data[4]);
		$("#xlentrega").val(data[4]);
		$("#hiddenField4").val(data[1]);
		//document.getElementById('textfield3').focus();
	});
});

</script>
<script>
function valida(){
	var fechora=document.getElementById("c_fechora").value;
	var nomcli=document.getElementById("c_nomcli").value;
	var trans=document.getElementById("transportista").value;
	var placa=document.getElementById("c_placa1").value;
	
	if(fechora==""){
		alert("Ingrese Fecha Y Hora");
		document.getElementById("c_fechora").focus();
		return 0;
		}
	if(nomcli==""){
		alert("Ingrese Nombre Cliente");
		document.getElementById("c_nomcli").focus();
		return 0;
		}
	if(trans==""){
		alert("Ingrese Nombre Transportista");
		document.getElementById("transportista").focus();
		return 0;
		}	
	if(confirm("Seguro de Grabar EIR ?")){
	document.getElementById("form1").submit();
	 }
	}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=actudatainveq&udni=<?php echo $_GET['udni'] ?>">
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Datos de Equipo</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Nacionalizacion</li>
      <li class="TabbedPanelsTab" tabindex="0">Informacion Proveedor</li>
</ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="796" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="4" align="left">
            <input type="text" name="c_tipoio" id="c_tipoio"  value="<?php echo $tiping; ?>"/></td>
          </tr>
          <tr>
            <td width="124">Descripcion</td>
            <td colspan="3"><input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $des ?>" size="35" />
              <input type="hidden" name="c_idequipo" id="c_idequipo"  value="<?php echo $idequipo ?>" class="texto" /></td>
          </tr>
          <tr>
            <td>Serie</td>
            <td width="268"><input name="c_nserie" type="text" class="texto" id="c_nserie" value="<?php echo $idequipo ?>" size="20" /></td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td>Estado Almacen</td>
            <td><?php if($_GET['udni']=='41696274' || $_GET['udni']=='43377015' ) {?>
              &nbsp;
              <?php $ven = ListaestadoequipoC();?>
              <select name="estaequi" id="estaequi" class="Combos texto" <?php if($c_codest=='V'){ ?> disabled="disabled" <?php }?> >
                <?php foreach($ven as $item){?>
                <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>
                <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                <?php 
				

				
				}	?>
              </select>
              <?php } ?>
              &nbsp;</td>
            <td colspan="2">&nbsp;</td>
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
            <td width="144">&nbsp;</td>
            <td width="260">&nbsp;</td>
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
            <td>Marca</td>
            <td><?php $ven = ListaMarcaCajaM();?>
              <select name="codmar" id="codmar"  class="combo texto">
                <option value="0">.::SELECCIONE::.</option>
                <?php foreach($ven as $item){?>
                <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                <?php }	?>
              </select>
              &nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Serie Motor</td>
            <td><input type="text" name="c_seriemotor" id="c_seriemotor" class="texto" value="<?php echo $c_seriemotor ?>" required="required" /></td>
            <td><input type="hidden" name="c_fabcaja" id="c_fabcaja" class="texto"  /></td>
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
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Modelo</td>
            <td><input type="text" name="c_cmodel" id="c_cmodel" class="texto" value="<?php echo $c_cmodel ?>"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Serie Equipo</td>
            <td><input type="text" name="c_serieequipo" id="c_serieequipo" class="texto" value="<?php echo $c_serieequipo ?>" required="required"/></td>
            <td><input type="hidden" name="material" id="material" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Procedencia</td>
            <td><label for="c_procedencia"></label>
              <input type="text" name="c_procedencia" id="c_procedencia" class="texto" value="<?php echo $c_procedencia ?>" required="required"/></td>
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
            <td><input type="text" name="c_tara" id="c_tara" class="texto"  value="<?php echo $c_tara ?>" required="required"/></td>
            <td><input type="hidden" name="c_nroejes" id="c_nroejes" />
              <input type="hidden" name="c_tamCarreta" id="c_tamCarreta" />
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
            <td><input type="text" name="c_peso" id="c_peso"  class="texto"  value="<?php echo $c_peso ?>" required="required"/></td>
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
            <td colspan="4" align="center"><input type="submit" name="button" id="button" value="GUARDAR INFORMACION"/></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="594" border="0">
          <tr>
            <td width="177">Si
              <input type="radio" name="radio2" id="radio2" value="1" <?php if($c_nacional=='1'){ ?> checked="checked" <?php }?> />
              No
              <input type="radio" name="radio2" id="radio2" value="0" <?php if($c_nacional=='0'){ ?> checked="checked" <?php }?> />
              <label for="radio2">Referencia</label>
              <label for="textfield7"></label>
              &nbsp;</td>
            <td width="407"><input name="textfield7" type="text" id="textfield7"  value="<?php echo $c_refnaci ?>" size="40" class="texto"/></td>
          </tr>
          <tr>
            <td>fecha Nacionalizacion            </td>
            <td><input name="c_fecnac" type="text" class="texto" id="c_fecnac" size="12" readonly="readonly" value="<?php echo $c_fecnac ?>"/><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
    <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "c_fecnac",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">Proveedor:<?php echo $proveedor ?></div>
</div>
  </div>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
