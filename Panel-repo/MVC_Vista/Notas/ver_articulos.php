<html>
<head>
<title>Buscador de Articulos</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
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

function inicio() {

	var combo_familia=document.getElementById("cmbfamilia").value;
	if (combo_familia==0) {
		buscar();
	} else {
		document.getElementById("tabla_resultado").style.display="none";
	}
			
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
<form name="form1" id="form1" method="post" action="../MVC_Controlador/NotaC.php?acc=framearti" target="frame_resultado" onSubmit="buscar()">
 <div id="frmBusqueda2">
 <div align="center">	
	<table class="fuente8" align="center" width="560">
     <tr>
	    <!--<td width="36%">Familia:</td>
	    <td width="64%">
		  <select id="cmbfamilia" name="cmbfamilia" class="comboGrande">
		  <?php
		    $consultafamilia="select * from familias where borrado=0 order by nombre ASC";
			$queryfamilia=mysql_query($consultafamilia);
			?><option value=0>Todos los articulos</option><?php
			while ($rowfamilia=mysql_fetch_row($queryfamilia))
			  { 
			  	if ($anterior==$rowfamilia[0]) { ?>
					<option value="<?php echo $rowfamilia[0]?>" selected><?php echo utf8_encode($rowfamilia[1])?></option>
			<?php	} else { ?>
					<option value="<?php echo $rowfamilia[0]?>"><?php echo utf8_encode($rowfamilia[1])?></option>
			<?php	   
			}};
		  ?>
	    </select>		</td></tr>
		<tr>
		<td width="36%" class="busqueda">Referencia:</td>
	    <td width="64%"><input name="referencia" type="text" id="referencia" size="20" class="cajaMedia"></td>--></tr>
		<tr>
		 
         <?php /*$idalmacen=$_GET['almacen']; 
		 	if($idalmacen=="000001"){
				$almacen="ALMACEN NESTOR GAMBETA";
			}else if($idalmacen=="000002"){
				$almacen="NUEVO ALMACEN NESTOR GAMBETA";
			}else{
			$almacen="ALMACEN LOS OLIVOS";	
			}
		 */
		 
		 
		 ?> 
          
          
          
		  <td bgcolor="#CCCCCC"><input name="almacen" type="hidden" id="almacen" size="50" readonly
         value="<?php echo $almacen; ?>">
          
         <input name="idalmacen" type="hidden" id="idalmacen" size="50" readonly
         value="<?php echo $idalmacen; ?>">
         </td>
         
	  </tr>
      
      
		<tr><td width="36%" bgcolor="#CCCCCC" class="busqueda"><b>Descripci&oacute;n:</b></td>
    <td width="64%" bgcolor="#CCCCCC"><input name="descripcion" type="text" id="descripcion" size="50" class="cajaGrande" onKeyPress="enviar()"></td></tr>
		<tr>
		  <!--<td class="busqueda">&nbsp;</td>
		  <td><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="enviar()" onMouseOver="style.cursor=cursor"></td>-->
	  </tr>
</table>
</div>
  <table width="700" id="tabla_resultado" name="tabla_resultado" style="display:none" align="center">
	<tr>
  		<td>
			<iframe width="100%" height="400" id="frame_resultado" name="frame_resultado">
				<ilayer width="100%" height="300" id="frame_resultado" name="frame_resultado"></ilayer>
			</iframe>
		</td>
	</tr>
</table>
<input type="hidden" id="iniciopagina" name="iniciopagina">
<table width="100%" border="0" align="center">
  <tr>
    <td><div align="center" >
      <img src="../images/button.png" width="63" height="21" onClick="window.close()" border="1" onMouseOver="style.cursor=cursor">
    </div></td>
  </tr>
</table>
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
</div>
</form>

</body>
</html>
