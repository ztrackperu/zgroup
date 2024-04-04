<?php 
if($resultados!=NULL)
{
	foreach ($resultados as $item)
	{
		$udnix=$item['login'];
	}
}
if($cargaletra!=NULL)
{
	foreach ($cargaletra as $iteml)
	{
		$c_numlet=$iteml['c_numlet'];
		$c_numfac=$iteml['c_numfac'];
		$c_numcont=$iteml['c_numcont'];
		$c_numcoti=$iteml['c_numcoti'];
		$c_lugarg=utf8_encode($iteml['c_lugarg']);
		$d_fecemi=$iteml['d_fecemi'];
		$d_fecven=$iteml['d_fecven'];
		$c_codmon=$iteml['c_codmon'];
		$n_implet=$iteml['n_implet'];
		$c_codcli=$iteml['c_codcli'];
		$c_nomcli=utf8_encode($iteml['c_nomcli']);
		$c_dircli=utf8_encode($iteml['c_dircli']);
		$c_doccli=$iteml['c_doccli'];
		$c_nume=$iteml['c_nume'];
		$c_numeO=str_pad($iteml['c_nume'], 7, "0", STR_PAD_LEFT);
		
		$c_nomava=utf8_encode($iteml['c_nomava']);
		$c_docava=$iteml['c_docava'];
		$c_telava=$iteml['c_telava'];
		$c_dirava=utf8_encode($iteml['c_dirava']);		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Letra</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<!--<link href="../css/estilos.css" type="text/css" rel="stylesheet">-->
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
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">

<script type="text/javascript">

	function ValidaEntero(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}

function ValidarMonto(){
	var valor = document.getElementById("monto").value;
    if( isNaN(valor) ) {    //var val= false;				
				
			jAlert('El numero ingresado no es valido', 'Mensaje del Sistema');
			
		     document.getElementById("monto").value="";
			 document.getElementById("monto").focus();			
    }	
	
}
</script>


<script type="text/javascript">
$().ready(function() {
	$("#cliente").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#cliente").result(function(event, data, formatted) {
		$("#codcli").val(data[1]);
		$("#cliente").val(data[2]);
		$("#ruc").val(data[3]);
		$("#dire").val(data[4]);
		$("#c_telcli").val(data[5]);
		
		
	});
	
});

function loadinicio(){
	document.getElementById('num').focus()
	}

function ponerCeros(obj) {
  while (obj.value.length<6)
    obj.value = '0'+obj.value;
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

function compUsuario(Tecla) {
     Tecla = (Tecla) ? Tecla: window.event;
     input = (Tecla.target) ? Tecla.target : 
     Tecla.srcElement;
     if (Tecla.type == "keyup") {
          var DivDestino = document.getElementById("DivDestino");
          DivDestino.innerHTML = "<div><div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>	</div>";
          if (input.value) {
               ObtDatos("../MVC_Controlador/ValidaletraC.php?&cod=" + input.value);
          } 
     }
}
function createRequestObject(){
      var peticion;
      var browser = navigator.appName;
            if(browser == "Microsoft Internet Explorer"){
                  peticion = new ActiveXObject("Microsoft.XMLHTTP");
            }else{
                  peticion = new XMLHttpRequest();
}
return peticion;
}
var http = new Array();
	function ObtDatos(url){
      var act = new Date();
      http[act] = createRequestObject();
      http[act].open('get', url);
      http[act].onreadystatechange = function() {
      if (http[act].readyState == 4) {
            if (http[act].status == 200 || http[act].status == 304) {
  		var texto
		texto = http[act].responseText
                    var DivDestino = document.getElementById("DivDestino");
                    DivDestino.innerHTML = "<div id='error'>"+texto+"</div>";                
}
}
}
http[act].send(null);
}

</script>
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script>
function graba(){
		
	jConfirm("¿Seguro de Aprobar Letra?", "Mensaje Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("form1").submit();
			} else {
				return 0;
			}
		});
	
	
	}
	function regresar(){
		location.href="../MVC_Controlador/ContabilidadC.php?acc=verlet&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>"; 		
	}
	
	function enviar(){
		document.getElementById("form1").submit();
		}
</script>

</head>

<body >
<form id="form1" name="form1" method="post" action="../MVC_Controlador/ContabilidadC.php?acc=apruebalet&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">

<fieldset class="fieldset legend">
  <legend style="color:#03C"><strong>Aprobacion  Letra Clientes</strong></legend>

  <table width="838" border="0" widtd="908">
    <tr>
      <td widtd="83" >&nbsp;</td>
      <td widtd="83" >&nbsp;</td>
      <td colspan="5" widtd="83" >
      </td>
    </tr>
    <tr>
      <td width="120" widtd="83" ><strong>Nro Letra</strong></td>
      <td width="5" widtd="30" >:</td>
      <td width="180" widtd="504" >
        <input name="num" type="text" disabled="disabled"  class="texto" id="num" tabindex="1" autocomplete="off" onblur="ponerCeros(this)" 
onkeyup = "compUsuario(event)" value="<?php echo $c_numeO ?>"/> 
 
<input name="c_nume" type="hidden"  class="texto" id="c_nume"  value="<?php echo $c_numeO ?>"/> 
   
      <input name="c_nume" type="hidden" value="<?php echo $c_nume ?>" disabled="disabled" />

  </td>
      <td colspan="4" widtd="504" ><div id="DivDestino" style="width:150px">&nbsp;</div></td>
    </tr>
    <tr>
      <td ><strong>Moneda</strong><?php $venMO = ListaMonedaM();?></td>
      <td >:</td>
      <td ><select name="moneda" id="moneda" class="Combos texto" disabled="disabled" >
          
           <option value="0">.::SELECCIONE::.</option>
            <?php foreach($venMO as $item){?>
           
     <option value="<?php echo $item["c_numitm"]?>"<?php if($item["c_numitm"]==$c_codmon){?>selected<?php }?>><?php echo $item["c_desitm"]?></option>
            <?php }	?>
          </select></td>
       <td width="103" ><strong>Monto</strong></td>
      <td width="3" >&nbsp;</td>
      <td width="389" >
        <input name="monto" type="text" id="monto" size="10" class="texto"  value="<?php echo $n_implet ?>"  onkeypress="return ValidarMonto(event)" onclick="return ValidarMonto(event)" disabled="disabled" /></td>
      <td width="8" >&nbsp;</td>
    </tr>
    
    <tr>
      <td ><strong>Ref. Girador</strong></td>
      <td >:</td>
      <td ><input type="text" name="ref" id="ref"  class="texto" value="<?php echo $c_numfac ?>" disabled="disabled" /></td>
      <td ><strong>Nro Contrato</strong></td>
      <td >&nbsp;</td>
      <td >
        <input type="text" name="contrato" id="contrato" class="texto" value="<?php echo $c_numcont ?>" disabled="disabled" /></td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td ><strong>Lugar Giro</strong></td>
      <td >:</td>
      <td >
        <input type="text" name="lugar" id="lugar"  class="texto" value="<?php echo $c_lugarg ?>" disabled="disabled" /></td>
      <td ><strong>Nro Cotizacion</strong></td>
      <td >:</td>
      <td ><input type="text" name="coti" id="coti"  class="texto" value="<?php echo $c_numcoti ?>" disabled="disabled" /></td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td height="27" ><strong>Fecha Giro</strong></td>
      <td >:</td>
      <td ><input name="fgiro" type="text" class="texto" id="fgiro" size="12" disabled="disabled" value="<?php echo vfecha(substr($d_fecemi,0,10)) ?>"  /><img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'" >
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fgiro",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script></td>
      <td ><strong>Fecha Vcto</strong></td>
      <td >:</td>
      <td ><input name="fvcto" type="text" class="texto" id="fvcto" size="12" disabled="disabled" value="<?php if($d_fecven==""){$fecha="";}else{ $fecha=vfecha(substr($d_fecven,0,10));} echo $fecha; ?>"  /><img src="../images/calendario.jpg" name="Image2" id="Image2" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
        <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fvcto",
					ifFormat   : "%d/%m/%Y",
					button     : "Image2"
					  });
		 </script></td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td ><strong>Cliente</strong></td>
      <td >:</td>
      <td >
        <input name="cliente" type="text" disabled="disabled"  class="texto" id="cliente" placeholder="Ingrese Nombre Cliente" value="<?php echo $c_nomcli ?>" />
        <input type="hidden" name="codcli" id="codcli" value="<?php echo $c_codcli ?>" /></td>
      <td ><strong>Nro Doc Cliente</strong></td>
      <td >:</td>
      <td ><input name="ruc" type="text" disabled="disabled" class="texto" id="ruc" value="<?php echo $c_doccli ?>" /></td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td ><strong>Direccion Clie</strong></td>
      <td >:</td>
      <td colspan="5" >
        <input name="dire" type="text" disabled="disabled" class="texto" id="dire" value="<?php echo $c_dircli ?>" size="62"  />
        <input name="c_telcli" id="c_telcli" type="hidden" />
      </td>
    </tr>
     <tr>
      <td ><strong>Aval</strong></td>
      <td >:</td>
      <td >
        <input name="c_nomava" type="text" disabled="disabled"  class="texto" id="c_nomava" placeholder="Ingrese Nombre Aval" value="<?php echo $c_nomava ?>" />
      </td>
      <td ><strong>Nro Doc Aval</strong></td>
      <td >:</td>
      <td ><input name="c_docava" type="text" disabled="disabled" class="texto" id="c_docava" onkeypress="return ValidaEntero(event)" value="<?php echo $c_docava ?>"  /></td>
      <td >&nbsp;</td>
    </tr>
     <tr>
      <td ><strong>Telefono Aval</strong></td>
      <td >:</td>
      <td >
        <input name="c_telava" type="text" disabled="disabled"  class="texto" id="c_telava" onkeypress="return ValidaEntero(event)" value="<?php echo $c_telava ?>" />
      </td>
      <td ><strong>Direccion Aval</strong></td>
      <td >:</td>
      <td ><input name="c_dirava" type="text" class="texto" id="c_dirava" value="<?php echo $c_dirava ?>" readonly="readonly"  /></td>
      <td >&nbsp;</td>
    </tr>
    <tr>
    
    <tr>
      <td ><strong style="color:#03F">Usuario Aprueba</strong>
</td>
      <td >:</td>
      <td colspan="5" >
<input name="c_operapr" type="text"  class="texto" id="c_operapr" value="<?php echo $udnix ?>" readonly="readonly" />&nbsp;</td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7"></td>
    </tr>
  </table>
  <p><input type="button" name="button" id="button" value="Aprobar" onclick="graba()"/>
    <input type="button" name="button2" id="button2" value="Cancelar" onclick="regresar()" />&nbsp;</p>
</fieldset>
</form>
</body>
</html>
