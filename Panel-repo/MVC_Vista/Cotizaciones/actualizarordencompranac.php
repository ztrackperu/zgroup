<?php
if($valores!=NULL){
foreach ($valores as $item)
	{
		$n_id=$item['n_id'];
		$c_idequipo=$item['c_idequipo'];
		$c_codprd=$item['c_codprd'];
		$c_codest= $item["c_codest"];
$c_codcat= $item["c_codcat"];
$c_mcamaq= $item["c_mcamaq"];
$c_control= $item["c_control"];
$c_codmar= $item["c_codmar"];
$c_condicion= $item["c_condicion"];		
		
		 $cod = $item["oc_serie"];
		 $des= $item["oc_desc"];
		 $oc_ndoc=$item["oc_ndoc"];
		 $oc_precio=$item["oc_prec"];
		
		$ano=$item["c_anno"];
		$cat=$item["c_codcat"];
		$otrocosto=$item["c_nronis"];
		$otrab=$item["c_nroot"];
		$serieant=$item["c_serieant"];
		
		if($item["c_costadu"]==''){$c_costadu='0.00';}else{$c_costadu=$item["c_costadu"];}
		if($item["c_costalm"]==''){$c_costalm='0.00';}else{$c_costalm=$item["c_costalm"];}
		if($item["c_costotr"]==''){$c_costotr='0.00';}else{$c_costotr=$item["c_costotr"];}
		if($item["c_costmar"]==''){$c_costmar='0.00';}else{$c_costmar=$item["c_costmar"];}
		if($item["c_preclist"]==''){$c_preclist='0.00';}else{$c_preclist=$item["c_preclist"];}
		if($item["c_precvent"]==''){$c_precvent='0.00';}else{$c_precvent=$item["c_precvent"];}
		if($item["c_costgute"]==''){$c_costgute='0.00';}else{$c_costgute=$item["c_costgute"];}
		if($item["c_costage"]==''){$c_costage='0.00';}else{$c_costage=$item["c_costage"];}
		//$c_costadu=$item["c_costadu"];
		
		/*$c_costmar=$item["c_costmar"];$c_costalm=$item["c_costalm"];$c_costotr=$item["c_costotr"];$c_costotr=$item["c_costotr"];$c_preclist=$item["c_preclist"];$c_precvent=$item["c_precvent"];$c_costgute=$item["c_costgute"];$c_costage=$item["c_costage"];	*/
		
		

	
}}else{
	
	$c_costadu="0.00";$c_costmar="0.00";$c_costalm="0.00";$c_costotr="0.00";$c_costotr="0.00";$c_preclist="0.00";$c_precvent="0.00";$c_costgute="0.00";$c_costage="0.00"; $oc_precio="0.00";
	
	}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Actualizacion Orden de Compra</title>
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

<script language="javascript" type="text/javascript">

function traerDatos()
{	
valor = document.formElem.hiddenField3.value;	
udni=document.formElem.udni.value
location.href="../MVC_Controlador/cajaC.php?dato="+valor+"&acc=llenardata"+"&udni="+udni;
}
/*function traerDatos(e, tipo)
{	
	valor = null;	
	tecla = (document.all) ? e.keyCode : e.which;
	
	if (tecla == 13)
	{
		if(tipo=="DNI")
		{
			/*if(document.formElem.PAC_DNI.value.length == 8)
			{*/
				//valor = document.getElementById("txtcodigo").value;	
//location.href="../MVC_Controlador/cajaC.php?dato="+valor+"&acc=llenardata";
		/*	}*/
	//	}
//		else
//		{
//			//if(document.formElem.PAC_HISTORIA.value.length == 11)
//			//{
//				valor = document.getElementById("txtcodigo").value;	
//			//}
//		}
//	}

//	if(valor != null)
//	{
//		if (tecla != 8)
//		{
//	location.href="../MVC_Controlador/cajaC.php?dato="+valor+"&acc=llenardata";
//		//location.href="../MVC_Controlador/cajaC.php?dato="+valor+"&acc=preb41"+"&udni="+udni+"&ter="+ter+"&tur="+tur;
//		}
//	}
//}*/
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#textfield2").autocomplete("../MVC_Controlador/cajaC.php?acc=proauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#textfield2").result(function(event, data, formatted) {
		$("#textfield2").val(data[2]);
		$("#codprod").val(data[1]);
		//$("#codigo").val(data[1]);
		/*$("#rucdni").val(data[3]);
		$("#direc").val(data[4]);*/
	document.formElem.precio.focus();
	});
	
});
			
</script>


<script type="text/javascript">
$().ready(function() {
	$("#txtcodigo").autocomplete("../MVC_Controlador/cajaC.php?acc=serieauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#txtcodigo").result(function(event, data, formatted) {
		$("#txtcodigo").val(data[1]);
		//$("#txtdoc").val(data[3]);
		//$("#textfield").val(data[1]);
		$("#hiddenField3").val(data[1]);
		/*$("#textfield2").val(data[2]);
		$("#textfield3").val(data[4]);		
		$("#textfield11").val(data[8]);
		$("#textfield12").val(data[6]);
		$("#textfield13").val(data[5]);
		$("#textfield8").val(data[9]);
		$("#hiddenField").val(data[10]);
		$("#textfield15").val(data[1]);
		
$("#textfield4").val(data[12]);
$("#textfield5").val(data[13]);
$("#textfield6").val(data[14]);
$("#textfield7").val(data[15]);

$("#textfield10").val(data[16]);
$("#textfield9").val(data[17]);
$("#textfield16").val(data[18]);*/
		

		document.getElementById('textfield3').focus();
	});
	
});

function calcular(){
	var suma=parseFloat(document.formElem.textfield3.value)+parseFloat(document.formElem.textfield4.value)+parseFloat(document.formElem.textfield5.value)+parseFloat(document.formElem.textfield6.value)+parseFloat(document.formElem.textfield7.value)+parseFloat(document.formElem.textfield8.value)+parseFloat(document.formElem.textfield16.value)
	
	//document.formElem.textfield8.value=suma;
	
	document.getElementById("textfield9").value=suma;
	
	}
function porcentaje(){
	var dif=parseFloat(document.formElem.textfield10.value)-parseFloat(document.formElem.textfield9.value);
	var resul=dif/parseFloat(document.formElem.textfield10.value);
	var fin=resul*100;
	
	document.getElementById("textfield12").value=Math.round(fin*10)/10;
	
	
	}
function VentanaOrdenCompra(){
			var codigo=document.getElementById("hiddenField").value;
			//var ot=
			if (codigo=="") {
				alert ("Debe introducir el codigo de serie");
			} else {
				miPopup = window.open("../MVC_Controlador/cajaC.php?acc=ventot&item="+codigo+"&udni=<?php echo $udni;?>","miwin","width=900,height=900,scrollbars=yes");
				miPopup.focus();
			}
		}
function validagraba(){
	if((document.getElementById("textfield").value)==""){
	alert("Faltan Nro Serie");
document.getElementById("txtcodigo").focus();
}else{
	linkgraba();
}
}
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Grabar Registros ?")){
	document.getElementById("formElem").submit();
			 }
	}
function solo(evt){ 
  
if(window.event){// IE 
keynum = evt.keyCode; 
}else{ 
keynum = evt.which; 
} 
if((keynum>45 && keynum<58) || keynum == 8){ 
//if(keynum>47 && keynum<58){ 
return true; 
}else{ 
return false; 
} 
} 
</script>
</head>

<body>

<form method="post" enctype="multipart/form-data" name="formElem" id="formElem" action="../MVC_Controlador/cajaC.php?acc=actuinv&udni=<?php echo $_GET['udni']; ?>">
  <table width="856" border="1" bordercolor="#003366">
    <tr>
      <td colspan="3" bgcolor="#FF0000" style="color:#FFF">Busque la serie del contenedor y seguidamente presione el boton cargar datos =>CODIGO USUARIO RESPONSABLE:<?php echo $_GET['udni']; ?></td>
    </tr>
    <tr>
      <td width="270">BUSQUE SERIE </td>
      <td width="570" colspan="2"><label for="txtcodigo"></label>
      <input name="txtcodigo" type="text"  class="texto" id="txtcodigo" size="50" value="<?php echo $cod; ?>"/>
      <input type="button" name="button" id="button" value="Cargar Datos" onclick="traerDatos();" />
      <input type="hidden" name="hiddenField2" id="hiddenField2" /></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#00FF00">Nota el codigo es ejmp zgruxxxxx crluxxxx trndxxxxx etc el cual figura en la factura de compra 
      <input type="hidden" name="udni" id="udni" value="<?php echo $_GET['udni'] ?>" /></td>
    </tr>
  </table>
  <table width="856" border="1"  bordercolor="#003366">
    <tr>
      <td bgcolor="#00FF00">ESTADO DEL CONTENEDOR</td>
      <td colspan="2" bgcolor="#00FF00">
        <?php $ven = ListaestadoequipoC();?>
        <select name="estaequi" id="estaequi" class="Combos texto" disabled="disabled">
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codest ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select>
        <label for="textfield2"></label>
        <?php /*?><input type="text" name="textfield13" id="textfield2" value="<?php echo $c_idequipo.'  '.$n_idreg ?>" /><?php */?>
        <input type="hidden" name="hiddenField4" id="hiddenField4" value="<?php echo $c_idequipo ?>" />
        <input type="hidden" name="hiddenField5" id="hiddenField5" value="<?php echo $n_id ?>"/>
        <label for="c_idequipo"></label>
        <input type="hidden" name="c_idequipo"  class="texto" id="c_idequipo" value="<?php echo $c_idequipo ?>" /></td>
    </tr>
    <tr>
      <td>DCTO COMPRA</td>
      <td><input name="txtdoc" type="text" class="texto"  id="txtdoc" size="30" readonly="readonly"  value="<?php echo $oc_ndoc?>"/></td>
      <td width="298"><label for="txtdoc"></label>
      <p>
        <label for="select2"></label>
        Ref. Tipo Cambio:
       <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			echo $tipocambio;
			?></p></td>
    </tr>
    <tr>
      <td width="269"><label for="textfield">SERIE (*modificable)</label></td>
      <td width="267"><input name="textfield"  class="texto" type="text" id="textfield" size="40" value="<?php echo $cod?>" />
      <input type="hidden" name="hiddenField3" id="hiddenField3" /></td>
      <td width="298">SERIE Anterior
        
      <input name="c_serieant" type="text"  id="c_serieant"  value="<?php echo $serieant ?>" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>PRODUCTO(*cambio x Nota de salida)      </td>
      <td><input name="textfield2" type="text" class="texto"  id="textfield2" value="<?php echo $des?>" size="40" readonly="readonly"/>
      <label for="textfield3"></label></td>
      <td width="298">
        <input name="codprod" type="text" id="codprod" value="<?php echo $c_codprd ?>" size="30" readonly="readonly" />
        <label for="con"></label>
        <input type="text" name="con2" id="con" size="30" value="<?php echo $c_control ?>"/></td>
    </tr>
    <tr>
      <td>COSTO COMPRA</td>
      <td><input name="textfield3" type="text"  class="texto" id="textfield3" value="<?php echo $oc_precio ?>" size="10" readonly="readonly" />
      segun dcto de compra</td>
      <td width="298" rowspan="9"><p>FORMATO DE COMO INGRESAR MONTOS:</p>
        <p>SI ES &gt; CIEN SOLES ASI 100.00</p>
        <p>SI ES &gt; MIL SOLES ASI 1000.00</p>
      <p>SI ES &gt; DIEZ MIL SOLES 10000.00</p></td>
    </tr>
    <tr>
      <td>COSTO AG. ADUANA</td>
      <td><input name="textfield4" type="text"  class="texto" id="textfield4" value="<?php echo $c_costadu ?>" size="10" />
       </td>
    </tr>
    <tr>
      <td>COSTO MARITIMO</td>
      <td><input name="textfield5" type="text"  class="texto" id="textfield5" value="<?php echo $c_costmar ?>" size="10" /></td>
    </tr>
    <tr>
      <td>COSTO AG. CARGA</td>
      <td><input name="textfield6" type="text"  class="texto" id="textfield6" value="<?php echo $c_costage ?>" size="10" /></td>
    </tr>
    <tr>
      <td>COSTO FLETE LOCAL</td>
      <td><input name="textfield7" type="text"  class="texto" id="textfield7" value="<?php echo $c_costalm ?>" size="10" /></td>
    </tr>
    <tr>
      <td>COSTO GUTE IN</td>
      <td><label for="textfield16"></label>
      <input name="textfield16" type="text" class="texto" id="textfield16" value="<?php echo $c_costgute ?>" size="10" /></td>
    </tr>
    <tr>
      <td>OTROS GASTOS</td>
      <td><input name="textfield8" type="text"  class="texto" id="textfield8" value="<?php echo $c_costotr ?>" size="10" />
        <a href="#" title="Ver detalle" onclick="VentanaOrdenCompra()">Ver detalle Orden Trabajo
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $otrab ?>" />
      </a></td>
    </tr>
    <tr>
      <td>PRECIO LISTA</td>
      <td><input name="textfield9" type="text"  class="texto" id="textfield9" onfocus="calcular();" onblur="calcular();" value="<?php echo $c_preclist ?>" size="10" /></td>
    </tr>
    <tr>
      <td>PRECIO VENTA</td>
      <td><input name="textfield10" type="text"  class="texto" id="textfield10" value="<?php echo $c_precvent ?>" size="10" onblur="porcentaje()" onkeyup="porcentaje()"/>
        <label for="textfield12"></label>
      <input name="textfield12" type="text" disabled="disabled" class="texto" id="textfield12" size="10" readonly="readonly" />
      %</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#00CC00">DATOS ADICIONALES
        
      <label for="checkbox"></label></td>
      <td width="298">&nbsp;</td>
    </tr>
    <tr>
      <td>CONDICION</td>
      <td><label for="estaequi">
        <input type="radio" name="con" id="con" value="2" <?php if ($c_condicion == '2') { echo 'checked="checked"'; } ?>>
      USADO 
      <input type="radio" name="con" id="con" value="1" <?php if ($c_condicion == '1') { echo 'checked="checked"'; } ?>  />
      NUEVO</label></td>
      <td width="298">&nbsp;</td>
    </tr>
    <tr>
      <td>CATEGORIA</td>
      <td>
        <input type="hidden" name="textfield11"   id="textfield11" class="texto"/>
        <label for="select3"></label>
       <?php $ven = ListaCategoriaC();?>
        <select name="select3" id="select3" class="Combos texto">
          <?php foreach($ven as $item){?>      
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codcat ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select></td>
      <td width="298">&nbsp;</td>
    </tr>
    <tr>
      <td>MARCA MAQ. REEFER</td>
      <td> <label for="textfield13"></label>
      <!--<input type="text" name="textfield13"  class="texto" id="textfield13"  />-->        <label for="marca1"></label><?php $ven = ListamarcaC();?>
        <select name="marca1" id="marca1" class="Combos texto">
          <?php foreach($ven as $item){?>
          <?php /*?><option value="<?php echo $item["c_numitm"]?>"><?php echo $item["c_desitm"]?></option>
<?php */?>          
          
           <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmar ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          
          
          <?php }	?>
        </select></td>
      <td width="298">&nbsp;</td>
    </tr>
    <tr>
      <td>MARCA CAJA </td>
      <td><label for="textfield14"></label>
      <!--<input type="text" name="textfield14"  class="texto" id="textfield14" />-->        <label for="select4"></label>
        <label for="marca"></label><?php $ven = ListamarcareferC();?>
        <select name="marca" id="marca" class="Combos texto">
          <?php foreach($ven as $item){?>
        <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_mcamaq ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php }	?>
        </select></td>
      <td width="298">&nbsp;</td>
    </tr>
    <tr>
      <td>MODELO CONTROLADOR</td>
      <td> <?php $ven = ListacontroladoC();?>
        <select name="control" id="control" class="Combos texto">
          <?php foreach($ven as $item){?>
         <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_control ){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
          <?php }	?>
        </select></td>
      <td width="298">&nbsp;</td>
    </tr>
  </table>
  
  <p>
    <input type="button" name="button3" id="button3" value="GRABAR"  onclick="validagraba();"/>
    <input type="reset" name="button2" id="button2" value="CANCELAR" />
  </p>
</form>
</body>
</html>