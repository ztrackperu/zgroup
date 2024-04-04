<?php 
if($reporte!=NULL)
{
$cantDiagnosticos = 0;
$sw='1';
foreach($reporte as $itemD)
{
	$cantDiagnosticos += 1;
	$guia=$itemD['c_numguia'];
	$nom=$itemD['c_nomdes'];
}

}else{
$cantDiagnosticos=1;	
$sw='0';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title></title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
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
$().ready(function() {
	$("#buscarguia").autocomplete("../MVC_Controlador/cajaC.php?acc=guiaauto", {
		width: 400, 
		matchContains: true,
		selectFirst: false
	});	
	$("#buscarguia").result(function(event, data, formatted) {
	
		$("#buscarguia").val(data[1]);
		$("#nombreguia").val(data[2]);
		//$("#hiddenField2").val(data[3]);
		//document.getElementById('textfield3').focus();nombreguia
	});
	
});


function linki2(){
	 //reppre1
	 	udni=document.formElem.uid.value;
		ter=document.formElem.buscarguia.value;
	//	tur=document.formElem.tur.value;
	 location.href="../MVC_Controlador/cajaC.php?acc=verdataguia"+"&udni="+udni+"&ter="+ter;
	 	
}


</script>
<script type="text/javascript">
 var valor=<?php echo $cantDiagnosticos; ?>;
 var posicionCampo2=valor+1;
function agregarUsuario2(){
	
		nuevaFila = document.getElementById("tablaDiagnostico2").insertRow(-1);
		nuevaFila.id=posicionCampo2;
		nuevaCelda=nuevaFila.insertCell(-1);
		nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input name='chofer"+posicionCampo2+"' type='text' id='chofer"+posicionCampo2+ "' size='30' readonly='readonly' class='texto'></td>";  
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='brevete"+posicionCampo2+"' type='text' id='brevete"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='placa"+posicionCampo2+"' type='text' id='placa"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		 
		 
		 	  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='marca"+posicionCampo2+"' type='text' id='marca"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> ";
		
		
		 nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='mtc"+posicionCampo2+"' type='text' id='mtc"+posicionCampo2+ "' size='20' readonly='readonly' class='texto'></td> "; 
		 
		 
		 
		  nuevaCelda=nuevaFila.insertCell(-1); 
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input value='Delete' type='button' onclick='eliminarUsuario(this)'> </td> "; 

escribirDiagnostico2(posicionCampo2);
		posicionCampo2++;
    }
function escribirDiagnostico2(posicionCampo2)
{
			chofer = document.getElementById("chofer" + posicionCampo2);
			chofer.value = document.form1.chofer.value;
			
			brevete = document.getElementById("brevete" + posicionCampo2);
			brevete.value = document.form1.brevete.value;
			
			placa = document.getElementById("placa" + posicionCampo2);
			placa.value = document.form1.placa.value;
			
			marca = document.getElementById("marca" + posicionCampo2);
			marca.value = document.form1.marca.value;
			
			mtc = document.getElementById("mtc" + posicionCampo2);
			mtc.value = document.form1.mtc.value;
			
		//	chofer1 = document.getElementById("chofer1");
//			chofer1.value = document.form1.chofer1.value;

			
			//estaequi = document.getElementById("estaequi" + posicionCampo2);
			//estaequi.value = document.formElem.estaequi.value;
		
}
function eliminarDiagnosticos2()
{
	if (posicionCampo > 1)
	{
		document.getElementById("tablaDiagnostico").deleteRow(posicionCampo2 + 1);
		posicionCampo2 = posicionCampo2 - 1;
	}
	else
	{
		alert("No hay filas para eliminar");
		document.getElementById("tarea").value="";
		document.getElementById("time1").value="";
		document.getElementById("time2").value="";
	}       
}
function add2(){
	
/*	if(document.formElem.estaequi.options[document.formElem.estaequi.selectedIndex].text=='DISPONIBLE'	){
		alert('Seleccione estado Venta, alquiler o Reparacion')
	}else{*/
	if(document.getElementById("chofer").value=="" || document.getElementById("brevete").value==""){
		alert ('Ingrese Datos del Chofer');
			}else{
		
	agregarUsuario2();
	document.getElementById("chofer").value="";
	document.getElementById("brevete").value="";
	document.getElementById("placa").value="";
	
		document.getElementById("marca").value="";
document.getElementById("mtc").value="";
	
	document.getElementById("chofer").focus();
	//}
	}
	}
function eliminarUsuario2(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }

	</script>
<body>
<form action="../MVC_Controlador/cajaC.php?acc=#"  method="post"  name="formElem" id="formElem">
<fieldset class="fieldset legend" style="width:100%">
  <legend style="color:#03C"><strong>DATOS DE GUIA</strong></legend>
  <table width="883" border="0">
    <tr>
      <td width="95">Ingrese Guia</td>
      <td width="150"><label for="buscarguia"></label>
        <input type="text" name="buscarguia" id="buscarguia" class="texto" value="<?php echo $guia ?>" /></td>
      <td width="91"><input type="button" name="Cargar Datos" id="Cargar Datos" value="Cargar Datos" onclick="linki2()" /></td>
      <td width="529"><label for="nombreguia"></label>
        <input name="nombreguia" type="text" id="nombreguia" class="texto" size="60" readonly="readonly" value="<?php echo $nom ?>" />
        <input type="hidden" name="uid" id="udi" value="<?php echo $_GET['udni']; ?>" /></td>
    </tr>
  </table>
 
  </fieldset>
<fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>DESCRIPCION GUIA</strong></legend>
  <table width="1005" border="0">
    <tr>
      <td width="81" align="center" bgcolor="#999999">Unidad</td>
      <td width="132" align="center" bgcolor="#999999">Descripcion</td>
      <td width="72" align="center" bgcolor="#999999">Serie</td>
      <td width="78" align="center" bgcolor="#999999">Marca</td>
      <td width="78" align="center" bgcolor="#999999">Modelo</td>
      <td width="67" align="center" bgcolor="#999999">N°Eir</td>
      <td width="72" align="center" bgcolor="#999999">N°Guia</td>
      <td width="97" align="center" bgcolor="#999999">Temperatura</td>
      <td width="67" align="center" bgcolor="#999999">Peso </td>
      <td width="76" align="center" bgcolor="#999999">Precinto</td>
      <td width="139" bgcolor="#999999">Delete</td>
      </tr>
             <?php 
							if($reporte != NULL)
							{		
								$i = 1;
								foreach($reporte as $itemD)
								{
							?>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><label for="unidad"></label>
        <input name="<?php echo "unidad".$i; ?>" type="text" id="<?php echo "unidad".$i; ?>" size="15" value="<?php echo $itemD["c_placa"]; ?>" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="descrip"></label>
        <input type="text" name="<?php echo "descrip".$i; ?>" id="<?php echo "descrip".$i; ?>" value="<?php echo $itemD["c_desprd"]; ?>" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="serie"></label>
        <input name="<?php echo "serie".$i; ?>" type="text" id="<?php echo "serie".$i; ?>" size="20"  value="<?php echo $itemD["c_codprd"]; ?>"/></td>
      <td align="center" bgcolor="#FFFFFF"><label for="marca"></label>
        <input name="<?php echo "marca".$i; ?>" type="text" id="<?php echo "marca".$i; ?>" size="20" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="modelo"></label>
        <input name="<?php echo "modelo".$i; ?>" type="text" id="<?php echo "modelo".$i; ?>" size="20" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="eir"></label>
        <input name="<?php echo "eir".$i; ?>" type="text" id="<?php echo "eir".$i; ?>" size="15" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="guia"></label>
        <input name="<?php echo "guia".$i; ?>" type="text" id="<?php echo "guia".$i; ?>" size="15"  value="<?php echo $itemD["c_nume"]; ?>"/></td>
      <td align="center" bgcolor="#FFFFFF"><label for="temp"></label>
        <input name="<?php echo "temp".$i; ?>" type="text" id="<?php echo "temp".$i; ?>" size="10" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="peso"></label>
        <input name="<?php echo "peso".$i; ?>" type="text" id="<?php echo "peso".$i; ?>" size="10" /></td>
      <td align="center" bgcolor="#FFFFFF"><label for="precinto"></label>
        <input name="<?php echo "precinto".$i; ?>" type="text" id="<?php echo "precinto".$i; ?>" size="10" /></td>
      <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
       <?php 	
								$i++;
								}			
							}
						?>
  </table>
  <p style="color:#03C">&nbsp;</p>

<p>
  <input type="button" name="Grabar" id="Grabar" value="GRABAR DETALLE" onclick="validagraba()" />
  <input type="reset" name="button" id="button" value="CANCELAR" />
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</form>
</body>
</html>
