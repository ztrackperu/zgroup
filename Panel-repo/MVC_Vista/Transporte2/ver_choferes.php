<html>
<head>
<title>Buscador de Clientes</title>
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
<?php include("dbconex.php"); ?>

<body onLoad="buscar()">
<form name="form1" id="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=framechof" target="frame_resultado" onSubmit="buscar()">
 <table class="fuente8" align="center" width="100%">
     <tr>
<td width="40%" bgcolor="#CCCCCC" class="busqueda"><?php echo 'Ingrese Ruc o Nombre Transporte';?></td>
<td width="60%" bgcolor="#CCCCCC"><input name="txtbuscarcliente" type="text" id="txtbuscarcliente" size="50" class="cajaGrande" onBlur="enviar()" onKeyPress="enviar()" value="<?php echo $_GET['cod']; ?>"></td>
     </tr>
     <tr>
	  <!-- <td colspan="2" class="busqueda"><div id="botonBusqueda">		    <div align="center"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="enviar()" onMouseOver="style.cursor=cursor"></div></td>-->
	  </tr>
</table>
  <table width="100%" id="tabla_resultado" name="tabla_resultado" style="display:none" align="center">
<tr>
  		<td>
			<iframe width="100%" height="300" id="frame_resultado" name="frame_resultado">
				<ilayer width="100%" height="400" id="frame_resultado" name="frame_resultado"></ilayer>
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
