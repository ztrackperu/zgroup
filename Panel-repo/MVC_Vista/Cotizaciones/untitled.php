<?php 
if($resultados!=NULL)
{
	foreach ($resultados as $item)
	{
		$udnis=$item['login'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Proveedores</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
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


<script type="text/javascript">
var  posicionCampo2=1;
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
		 nuevaCelda.innerHTML="<td bgcolor='#CCCCCC'> <input  name='mtc"+posicionCampo2+"' type='text' id='mtc"+posicionCampo2+ "' size='15' readonly='readonly' class='texto'><a href='#'> <img src='../images/user_logout.png' value='Eliminar'  onclick='eliminarUsuario2(this)'></a> </td> "; 
		 

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
	agregarUsuario2();
	document.getElementById("chofer").value="";
	document.getElementById("brevete").value="";
	document.getElementById("placa").value="";
	document.getElementById("marca").value="";
	document.getElementById("mtc").value="";
	document.getElementById("chofer").focus();
	//}

	}
function eliminarUsuario2(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
function eliminarUsuario(obj){
    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
    }
    var root = oTr.parentNode;
    root.removeChild(oTr);
    }
</script>
    
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <p>Registro Proveedores</p>
  <div id="TabbedPanels1" class="TabbedPanels">	
    <ul class="TabbedPanelsTabGroup">
      <li class="TabbedPanelsTab" tabindex="0">Datos Proveedor</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Contacto</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Bancarios</li>
      <li class="TabbedPanelsTab" tabindex="0">Datos Choferes</li>
    </ul>
    <div class="TabbedPanelsContentGroup">
      <div class="TabbedPanelsContent">
        <table width="836" border="0">
          <tr>
            <td align="right" bgcolor="#CCFFCC"><strong>Nro de Ruc:</strong></td>
            <td width="486" bgcolor="#CCFFCC"><input type="text" name="ruc" id="ruc" onkeypress="return isNumberKey(event);" value="" maxlength="11" onmousemove="selection.empty()" onmouseup="selection.empty()" onkeyup="selection.empty()" oncontextmenu="return false;" class='texto'/></td>
            <td width="205"><strong>Usuario</strong><strong style="color:#F00">
              <input name="user" class='texto' type="text" id="user" readonly="readonly" value="<?php echo $udnis ?>"/>
            </strong></td>
            <td width="3">&nbsp;</td>
          </tr>
          <tr>
            <td width="124" align="right"><strong>Razon Social:</strong></td>
            <td><input name="textfield3" type="text" class='texto' id="textfield3" size="50" value="<?php echo trim($razonsocial);?>" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Direccion: </strong></td>
            <td><input name="textfield5" type="text" class='texto' id="textfield5" size="70" value="<?php echo  trim($Direcciondomicilia); ?>" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Telf Proveedor:</strong></td>
            <td><input type="text" name="textfield7" class='texto' id="textfield7" value="<?php echo  trim($telf); ?>" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Email:</strong></td>
            <td><input name="textfield8" type="text" class='texto' id="textfield8" size="50" /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Certificado:</strong></td>
            <td><?php $dist=ListaCertificadoM();?>
  <select name="certi" id="certi" class='combo texto'>
    <?php foreach($dist as $item){?>
    <option value="<?php echo $item["C_NUMITM"]?>"><?php echo utf8_encode($item["c_desitm"])?></option>
    <?php }	?>
    </select>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Referencia:</strong></td>
            <td colspan="2"><input type="text" class='texto' name="nrocerti" id="nrocerti" />
            <em><strong>(En caso proveedor sea Basc ejemplo  PERLIM500)</strong></em><strong></strong></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="894" border="0">
          <tr>
            <td width="124" align="right"><strong>Nombre Contacto</strong></td>
            <td colspan="2">
            <input type="text" name="c_nomcontacto" class='texto' id="c_nomcontacto" /></td>
            <td width="499">&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Cargo Empresa</strong></td>
            <td colspan="2">
              <select name="c_cargocontacto" class='combo texto' id="c_cargocontacto">
            </select></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Email Contacto</strong></td>
            <td colspan="2">
            <input type="text" name="c_mailcontacto" class='texto' id="c_mailcontacto" /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td align="right"><strong>Telefono Fijo</strong></td>
            <td width="187">
            <input type="text" class='texto' name="c_fijocontacto" id="c_fijocontacto" /></td>
            <td width="66" align="right"><strong>Anexo</strong></td>
            <td>
            <input type="text" class='texto' name="c_anxcontacto" id="c_anxcontacto" /></td>
          </tr>
          <tr>
            <td align="right"><strong>Celular 1</strong></td>
            <td>
            <input type="text" class='texto' name="c_celcontacto" id="c_celcontacto" /></td>
            <td align="right"><strong>Celular 2</strong></td>
            <td>
            <input type="text" class='texto' name="c_movilcontacto" id="c_movilcontacto" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
        <table width="864" border="1">
          <tr>
            <td width="85">Banco</td>
            <td width="166">Tipo Cuenta</td>
            <td width="170">Moneda</td>
            <td width="154">Nro Cuenta</td>
            <td width="137">Nro CCI</td>
            <td width="112">Agregar Cuenta</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
      <div class="TabbedPanelsContent">
      <table width="1013" border="0" id="tablaDiagnostico2">
        <tr>
          <td width="180" align="center"><strong>Chofer
           
            <input name="chofer" type="text" id="chofer" size="30" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Brevete
           
            <input name="brevete" type="text" id="brevete" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Placa
           
            <input name="placa" type="text" id="placa" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Marca
        
            <input name="marca" type="text" id="marca" size="20" class='texto'/>
          </strong></td>
          <td width="120" align="center"><strong>Mtc
            
            <input name="mtc" type="text" id="mtc" size="20" class='texto'/>
          </strong></td>
          <td width="203" valign="bottom"><a href="#" onclick="add2();"><img src="../images/agregar.png" width="20" height="20" border="0"  />&nbsp;Agregar Chofer<span style="color:#FFF">
       
          </span></a></td>
        </tr>
        <tr>
          <td colspan="6"><hr /></td>
          </tr>
        <tr>
          <td align="center" bgcolor="#000000" style="color:#FFF"><strong>Chofer</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Brevete</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Placa</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Marca</strong></td>
          <td align="center" bgcolor="#000000"style="color:#FFF"><strong>Mtc</strong></td>
          <td bgcolor="#000000"style="color:#FFF">&nbsp;</td>
          </tr>
        <tr>
          <td bgcolor="#FFFFFF" style="color:#FFF"><label for="chofer1"></label></td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
          <td bgcolor="#FFFFFF"style="color:#FFF">&nbsp;</td>
        </tr>
      </table></div>
    </div>
  </div>
  <p>&nbsp;</p>
</form>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
</body>
</html>
