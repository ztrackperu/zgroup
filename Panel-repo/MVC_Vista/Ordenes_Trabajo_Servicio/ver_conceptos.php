<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<title>Buscador de Concepto</title>
<script>
var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}

function buscar() {
	//txtbuscarcliente
	document.getElementById('txtbuscarcliente').focus();
	if (document.getElementById("iniciopagina").value=="") {
		document.getElementById("iniciopagina").value=1;
	} else {
		document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	}
	document.getElementById("form1").submit();
	document.getElementById("tabla_resultado").style.display="";
}
function paginar() {
	document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
	document.getElementById("form1").submit();
}

function enviar() {
	document.getElementById("form1").submit();
}
</script>
<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<?php include("../MVC_Modelo/cn/dbconex.php"); ?>
<body onLoad="buscar()">

<form name="form1" id="form1" method="post" 
action="../MVC_Controlador/InventarioC.php?acc=frameconcepto" target="frame_resultado" onSubmit="buscar()">
 <table align="center" width="95%" class="tablaImprimir">
     <tr>
  <td width="40%" bgcolor="#CCCCCC" class="busqueda"><?php echo 'INGRESE DESCRIPCION:';?>
    <label for="codproducto"></label>
    <input type="hidden" name="codproducto" id="codproducto" value="<?php echo $_GET['cod']; ?>">
    <label for="codprod"></label>
    <input type="text" name="codprod" id="codprod" value="<?php echo $_GET['cat']; ?>">
    </td>
  <td width="60%" bgcolor="#CCCCCC"><input name="txtbuscarcliente" type="text" id="txtbuscarcliente" size="50" class="cajaGrande" onBlur="enviar()" onKeyPress="enviar()">
    <input type="hidden" name="hiddenField" id="hiddenField" 
       value="">
    <input type="hidden" name="sw" id="sw" value="">
    <input type="hidden" name="xsw" id="xsw" value="">
    <input type="hidden" name="res" id="res" value=""><input type="text" name="tiping" id="tiping" value=""></td>
     </tr>
     <tr>
     </tr>
</table>
  <table width="95%" id="tabla_resultado" name="tabla_resultado" style="display:none" align="center">
<tr>
  		<td>
			<iframe width="100%" height="300" id="frame_resultado" name="frame_resultado">
				<ilayer width="100%" height="300" id="frame_resultado" name="frame_resultado"></ilayer>
			</iframe>
		</td>
	</tr>
</table>
<input type="hidden" id="iniciopagina" name="iniciopagina">
<table width="100%" border="0">
  <tr>
    <td><div align="center">
      <img src="../images/button.png" width="63" height="21" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">
    </div></td>
  </tr>
</table>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
</form>
</body>
</html>