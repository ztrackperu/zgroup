<?php
  include ("session_dedometro.php");
	//$inicia_session = mysql_session_inicia(true);
?>	

<html>
<head>
<title>Untitled</title>

<script type="text/javascript">
<!--

function fboton()
{
   F = document.forms["nota"];
   F.pres_boton.value = 1; 
} 

function valida()
{
	 F = document.forms["nota"];
	 
	 if (F.pres_boton.value == 1)
	 {
			F.pres_boton.value = 0;
	 
	 if (F.tipo.selectedIndex == 0)
	 {
	    alert ("Debe ingresar el tipo de la Nota");
			F.tipo.focus();
			return false;
	 }
	 
   if (F.clave.value == ""/* && F.pres_boton.value == 1*/)
	 {
	    alert ("Debe ingresar la Clave del Dedometro. \nSi desea salir presione el botón CANCELAR.");
			F.clave.focus();
			return false;
	 }
	 }
 
	 return true;
}

// -->
</script>

</head>
<body bgcolor="#FFFFFF">

<?php
//valida_session($inicia_session);

include("fechas/fecha.php");

include("conexion.php");
$conexion= conectarBD();

$sql = "select * from personal where md5(codigo) = '$mcodigo'";
$cursor = mysql_query($sql);
echo mysql_error();

if (mysql_num_rows($cursor))
{
    $persona = mysql_result($cursor,0,"apellido") . ", " . mysql_result($cursor,0,"nombre");;
    $codigo = mysql_result($cursor,0,"codigo");
}

$sql = "select * from asist_nota where codigo = '$codigo' and fecha = '$fecha'";
$cursor = mysql_query($sql);
echo mysql_error();

if (mysql_num_rows($cursor))
{
   $nota = mysql_result($cursor,0,"observacion");
	 $tipo = mysql_result($cursor,0,"tipo");
} 

?>

<form action="asistencia.php" method="post" name="nota" onsubmit="return valida()">
<input type="hidden" name="btn_consultar" value="Consultar">

<input type="hidden" name="codigo" value="<?php echo $codigo ?>">
<input type="hidden" name="fecha" value="<?php echo $fecha ?>">

<input type="hidden" name="fecha_ini" value="<?php echo $fecha_ini ?>">
<input type="hidden" name="fecha_fin" value="<?php echo $fecha_fin ?>">

<input type="hidden" name="pres_boton" value = 0>

<?php
   echo "<center><b>$persona</b></center><br>";
?> 

<table align="center" border = 1 width = "80%">
<tr>
  <td>  
    <table align="center">
		  <tr>  
        <td>Fecha:</td>
    		<td>
      		<b><?php echo $fecha ." (". DiaSemana($fecha) .")"?></b>
    		</td>
    	</tr>
      <tr>  
        <td valign = "top">Nota:</td>
    		<td>
      		<textarea rows="5" cols="45" name="nota" ><?php echo $nota ?></textarea>
    		</td>
    	</tr>
			
			<tr>
    	  <td>Tipo:</td>
    		<td>
    		  <select name = "tipo" style = "width:200">
					<option value = "" >-- Seleccione --</option>
					<option value = "Laboral" <?php if ($tipo == "Laboral") echo "selected"  ?>>Motivo Laboral</option>
					<option value = "Personal" <?php if ($tipo == "Personal") echo "selected"  ?>>Motivo Personal</option>
					<option value = "Otro" <?php if ($tipo == "Otro") echo "selected"  ?>>Otro</option>
    		</td>
    	</tr>
			
    	<tr>
    	  <td>Clave:</td>
    		<td>
    		  <input type = "password" name = "clave">
    		</td>
    	</tr>
			
    	<tr>
    	  <td colspan = 2 align = center>
				  <br>
          <input type="submit" name = "boton" value = "Aceptar" onclick="fboton()">
    			<input type="submit" name = "boton2" value = "Cancelar">
    	  </td>
    	<tr>
    </table>
	</td>
</tr>
</table>

<center>
<font size = "2">
<br>
NOTA: No utilice el el boton <b>Atrás</b> del navegador,<br> para salir de esta página utilice los botones Aceptar y Cancelar.
</center> 
</font>

</form>

</body>
</html>
