<?php 
foreach($resul as $item){
	
	//c_idequipo,c_codprd,c_nserie,c_codanx,d_fecing,c_codmar,c_codmod,c_codcol,c_anno,c_control,c_codsit,c_mcamaq,pr_razo
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=regeir&udni=<?php echo $_GET['udni'] ?>">
  <div id="TabbedPanels1" class="TabbedPanels">
    <ul class="TabbedPanelsTabGroup">
     <li class="TabbedPanelsTab" tabindex="0">Datos de
        <?php if($tiping=='1'){ echo 'Ingreso';}else{echo 'Salida';} ?>
      </li>
      <li class="TabbedPanelsTab" tabindex="0">Datos de Equipo</li>
      <li class="TabbedPanelsTab" tabindex="0">Detalle de Ingreso Equipo</li>
</ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="758" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125">Condicion:</td>
            <td width="536"><input type="radio" name="co" id="co" value="1" />
              Vacio
              <input type="radio" name="co" id="co" value="2" />
              Lleno
              <input type="radio" name="co" id="co" value="3" />
              Fcl
              <input type="radio" name="co" id="co" value="4" />
              Lcl</td>
            <td width="47"><input type="hidden" size="3" name="tipoing" id="hiddenField" value="<?php echo $tiping ?>" />&nbsp;</td>
            <td width="50"><input type="hidden" size="3"  name="tipoclase" id="tipoclase" value="<?php echo $tipo ?>"/>&nbsp;</td>
          </tr>
          <tr>
            <td>Estado</td>
            <td> <?php $ven = ListaestadoequipoM();?>
        <select name="estaequi" id="estaequi" class="Combos texto" >
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Tipo</td>
            <td><input type="radio" name="c_tipo" id="c_tipo" value="1" />
              Descarga
              <input type="radio" name="c_tipo" id="c_tipo" value="2" />
              Embarque
              <input type="radio" name="c_tipo" id="c_tipo" value="3" />
              Otros
              <input type="text" name="c_obs" id="c_obs" class="texto"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Estado Equipo</td>
            <td colspan="3"><input type="radio" name="c_tipo2" id="c_tipo2" value="1" />
             	Limpio
                <input type="radio" name="c_tipo2" id="c_tipo2" value="2" />
                Sucio |
                <input type="radio" name="c_tipo3" id="c_tipo3" value="1" />
                Buenas Condiciones
                <input type="radio" name="c_tipo3" id="c_tipo3" value="2" />
                Dañado Necesita Reparaciones
              <input type="radio" name="c_tipo3" id="c_tipo3" value="3" />
              </td>
          </tr>
          <tr>
            <td>Cant.Combustible </td>
            <td><input type="text" name="c_combu" id="c_combu" class="texto"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Precinto Zgroup</td>
            <td><input type="text" name="c_precinto" id="c_precinto" class="texto"/>
            Precinto Cliente
            <label for="c_precintocli"></label>
            <input type="text" name="c_precintocli" id="c_precintocli" class="texto" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Entregado Al Representante del Cliente</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td> Cliente: </td>
            <td colspan="3"><input name="c_nomcli" type="text" id="c_nomcli" size="35" class="texto"/> <input type="hidden"  size="5"name="c_codcli" id="c_codcli" />
              Almacen
              <input name="c_almacen" type="text" id="c_almacen" size="25"  class="texto" /></td>
          </tr>
          <tr>
            <td>Transportista</td>
            <td colspan="3">
            <input name="transportista" type="text" id="transportista" size="35" class="texto" /><a href="#" onClick="abreVentanachofer()">
            <input type="hidden" name="hiddenField2" id="hiddenField2" />
            Busque Chofer</a> </td>
          </tr>
          <tr>
            <td>Placa Camion:</td>
            <td colspan="3"><input name="c_placa1" type="text" class="texto" id="c_placa1" size="15"/>
              Placa Carreta
              <input name="c_placa2" type="text" class="texto" id="c_placa2" size="15" />
              </td>
          </tr>
          <tr>
            <td>Nombre Chofer:</td>
            <td><input name="c_chofer" type="text" id="c_chofer" size="50" class="texto"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Datos de Recepcion</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Tecnico:</td>
            <td><input name="c_nomtec" type="text" id="c_nomtec" size="20" class="texto" />
              Fecha y Hora
              <input name="c_fechora" type="text" id="c_fechora" size="20" class="texto"/><img src="../images/calendario.jpg" name="fecinix" id="fecinix" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">


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
		 </script></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Datos Salida</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"> Punto Salida 
               <?php $dist=ListalugaresM();?>
  <select name="psalida" id="psalida" class="combo texto">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select>
            Punto Llegada
            <?php $dist=ListalugaresM();?>
              <select name="pllegada" id="pllegada" class="combo texto">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    
    </select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">Puerto Salida
           <?php $dist=listapuertosM();?>
  <select name="ptosalida" id="ptosalida" class="combo texto">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select>
            Puerto Llegada
                <?php $dist=listapuertosM();?>
  <select name="ptollegada" id="ptollegada" class="combo texto">
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["c_desitm"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4"><strong>Observaciones:</strong></td>
          </tr>
          <tr>
            <td colspan="4"><label for="c_obseir"></label>
            <textarea name="c_obseir" cols="50" rows="5" id="c_obseir"></textarea></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="796" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="4" align="left"><input type="text" name="c_tipoio" id="c_tipoio"  value="<?php echo $tiping; ?>"/> 
            (EIR)</td>
          </tr>
          <tr>
            <td width="124">Descripcion</td>
            <td colspan="3"><input name="c_codprd" type="text" class="texto" id="c_codprd" value="<?php echo $nombreprod ?>" size="35" />
              <input type="hidden" name="c_idequipo" id="c_idequipo"  value="<?php echo $idequipo ?>" class="texto" /></td>
          </tr>
          <tr>
            <td>Serie</td>
            <td width="268"><input name="c_nserie" type="text" class="texto" id="c_nserie" value="<?php echo $equipo ?>" size="15" />
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#CCCCCC"><strong>DATOS DE EQUIPO</strong></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Año Fabricacion</td>
            <td><?php $ven = listaannoC();?>
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
            <td><?php $ven = listamesC();?>
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
            <td><?php $ven = ListaMarcaCajaC();?>
                  <select name="codmar" id="codmar"  class="combo texto">
                   <option value="0">.::SELECCIONE::.</option>
                    <?php foreach($ven as $item){?>
                    <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
                    <?php }	?>
                  </select>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Serie Motor</td>
            <td>
              <input type="text" name="c_seriemotor" id="c_seriemotor" />
           </td>
            <td><input type="hidden" name="c_fabcaja" id="c_fabcaja" class="texto"  /></td>
            <td><input type="hidden" name="c_cfabri" id="c_cfabri" class="texto"/></td>
          </tr>
          <tr>
            <td>Color</td>
            <td><?php $color = listacolorC();?>
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
            <td>Serie Equipo</td>
            <td><input type="text" name="c_serieequipo" id="c_serieequipo" class="texto"/></td>
            <td><input type="hidden" name="material" id="material" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Procedencia</td>
            <td><label for="c_procedencia"></label>
              <input type="text" name="c_procedencia" id="c_procedencia" class="texto"/></td>
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
            <td><input type="text" name="c_tara" id="c_tara" class="texto"  /></td>
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
            <td><input type="text" name="c_peso" id="c_peso"  class="texto"/></td>
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
            <td colspan="4" align="center"><input type="button" name="button" id="button" value="GUARDAR INFORMACION" onclick="valida()"/></td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">Contenido 3</div>
</div>
  </div>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
