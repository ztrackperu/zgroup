<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script type="text/javascript">
<!--

function onvalida()
{
   F = document.form_act;
	 
	 if (F.email.value == "")
	 {
	    alert ("Debe ingresar su direccion de correo");
			F.email.focus();
			return false;
	 }

	 if (F.usuario.value == "")
	 {
	    alert ("Debe ingresar el nombre del usuario");
			F.usuario.focus();
			return false;
	 }
	 
	 if (F.clave.value == "")
	 {
	    alert ("Debe ingresar su clave de ingreso");
			F.clave.focus();
			return false;
	 }
	 
	 if (F.clave.value != F.rep_clave.value)
	 {
	    alert ("Las claves no son iguales, por favor intente nuevamente ...!");
			F.clave.value = F.rep_clave.value = "";
			F.clave.focus();
			return false;
	 }
	 
	 return true;
}

// -->
</script>

</head>

<body bgcolor="#FFFFFF" text="#000000">

<?php

include ("conexion.php");

if (!isset($Enviar))
{
  conectarBD();
	
  $sql = "select * from personal where cedula = '$cedula'";
  $cursor = mysql_query($sql);
  
  $num = mysql_num_rows($cursor);
  
  if ($num)
  {
      $cedula = mysql_result ($cursor,$i,"cedula");
  		$apellido = mysql_result ($cursor,$i,"apellido");
  		$nombre = mysql_result ($cursor,$i,"nombre");
			$email = mysql_result ($cursor,$i,"email");
			$cargo = mysql_result ($cursor,$i,"cargo");
			$cod_dependencia = mysql_result ($cursor,$i,"cod_dependencia");
			$tipo_pers = mysql_result ($cursor,$i,"tipo_pers");
			
			$cod_dedo = mysql_result ($cursor,$i,"codigo");
			
			if ($cedula == $cod_dedo)
			   $cedula = ""; 
				 
  		// revisa los datos de usuario en la intranet
			mysql_select_db("intranet");
  		echo mysql_error();
			
			$sql = "select * from login where codigo = '$cod_dedo'";
			$cursor = mysql_query($sql);
			if (mysql_num_rows($cursor) == 1)
			{
			   $usuario = mysql_result($cursor,0,"login"); 
				 $clave_enc = mysql_result($cursor,0,"password");
				 
				 if ($clave_enc)
				 {
				    echo "<br><center>Ud. no esta autorizado para actualizar sus datos</center>";
				    return;
				 }
			}
  }
?>

<form name="form_act" method="post" action="act_personal.php" onsubmit="return onvalida()">
<input type = "hidden" name = "cod_dedo" value = "<?php echo $cod_dedo ?>">

  <p align="center"><font size="5">Actualizaci&oacute;n de Datos</font></p>
  <table border="0" align="center">
    <tr> 
      <td>Nombre:</td>
      <td> 
        <input type="text" name="nombre" size="60" value="<?php echo $nombre ?>">
      </td>
    </tr>
    <tr> 
      <td>Apellido:</td>
      <td> 
        <input type="text" name="apellido" size="60" value="<?php echo $apellido ?>">
      </td>
    </tr>
    <tr> 
      <td>C&eacute;dula:</td>
      <td> 
        <input type="text" name="cedula" size="50" value="<?php echo $cedula ?>">
      </td>
    </tr>
    <tr> 
      <td>Email:</td>
      <td> 
        <input type="text" name="email" size="50" value="<?php echo $email ?>">
      </td>
    </tr>
    <tr> 
      <td>Departamento:</td>
      <td> 
        <select name="cod_dependencia" style = "width:400">
          <option>--- Seleccione ---</option>
          <?php
					  mysql_select_db("viatico");
					
					 	$sql = "select * from dependencia order by nombre";
						$cursor = mysql_query($sql);
						
						$num = mysql_num_rows($cursor);
						
						for ($i = 0; $i < $num; $i++)
						{
						    $cod = mysql_result ($cursor,$i,"cod_dependencia");
								$val = mysql_result ($cursor,$i,"nombre");
								
								$selected = "";
								if ($cod == $cod_dependencia)
								   $selected = "selected";
								
								echo "<option value = \"$cod\" $selected>$val</option>";
						}
					?>
        </select>
      </td>
    </tr>
    <tr> 
      <td>Cargo:</td>
      <td> 
        <input type="text" name="cargo" size="50" value="<?php echo $cargo ?>">
      </td>
    </tr>
    <tr> 
      <td> 
        <div align="center"></div>
      </td>
      <td> 
        <input type="radio" name="tipo_pers" value="P" <?php if ($tipo_pers == "P") echo "checked"; ?>> Personal 
        <input type="radio" name="tipo_pers" value="B" <?php if ($tipo_pers == "B") echo "checked"; ?>> Beca</td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr>
      </td>
    </tr>
		<tr> 
      <td colspan="2" align = center> 
        <font color = blue size = 2>Debe ingresar un nombre de USUARIO y una CLAVE de acceso con los que podrá ingresar en el<br> 
				Sistema de Control de Asistencia.</font> 
      </td>
    </tr>
    <tr> 
      <td>Usuario:</td>
      <td> 
        <input type="text" name="usuario" value="<?php echo $usuario ?>">
      </td>
    </tr>
    <tr> 
      <td>Clave:</td>
      <td> 
        <input type="password" name="clave">
      </td>
    </tr>
    <tr> 
      <td>Repita su Clave:</td>
      <td> 
        <input type="password" name="rep_clave">
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <hr>
      </td>
    </tr>
    <tr> 
      <td>Clave Dedometro:</td>
      <td> 
        <input type="password" name="clave_dedo">
      </td>
    </tr>
    <tr> 
      <td colspan="2" height="24"> 
        <hr>
      </td>
    </tr>
    <tr> 
      <td colspan="2"> 
        <div align="center"> 
          <input type="submit" name="Enviar" value="Enviar">
          <input type="reset" name="Limpiar" value="Limpiar">
        </div>
      </td>
    </tr>
  </table>
</form>

<?php
}
else
{
   if ($cod_dedo != $clave_dedo)
	 {
	    echo "<center>";
	    echo "El código del dedometro no es válido !!!";
			echo "<br><br>";
			echo "<a href=\"comprobacion.php\">Iniciar Sesión</a>";  
	    return;
	 }
	 
	 $conex = conectarBD();
	 
	 $fecha_act = date("Y-m-d");
	 $hora_act = date("h:i:s");
	 
	 $sql = "update personal set apellido = '$apellido', nombre = '$nombre', cedula = '$cedula', cargo = '$cargo',".
	        " cod_dependencia = '$cod_dependencia', tipo_pers = '$tipo_pers', email = '$email', fecha_act = '$fecha_act' ".
					" where codigo = '$cod_dedo'";
					  
   $res = mysql_query($sql,$conex);
	 //echo $sql;
	 echo mysql_error();
	 
	 mysql_close($conex);
	 
	 // Aactualizando datos del USUARIO de Coneccion en tabla INTRANET
	 include ("../modulos/usuario_intranet/usuarios.php");
	 $conex_intra = conexion_login_intranet();
	 
   // Ingresa Usuario
	 $sql = "select * from login where codigo = '$cod_dedo'"; 
	 $cursor = mysql_query($sql,conex_intra);
	 
	 if (mysql_num_rows($cursor) == 0)
	 {
    	 $clave = md5($clave);
    	 $sql = "insert into login (codigo, login, password) values ('$cod_dedo', '$usuario', '$clave')";
    	 $res = mysql_query($sql);
    	 echo mysql_error();
    	 
    	 
    	 // ingresa IP de conexion
    	 $ip = $REMOTE_ADDR;
    	 $sql = "insert into ip_codigo (codigo, ip, visitas, fecha_ult, hora_ult) ".
    	        "values ('$cod_dedo', '$ip', '1', '$fecha_act', '$hora_act')";
    	 
    	 $res = mysql_query($sql);
    	 echo mysql_error();
	 }
	 else // se actualizan los datos
	 {
	 		 $clave = md5($clave);
    	 $sql = "update login set login = '$usuario', password = '$clave' where codigo = '$cod_dedo'";
    	 $res = mysql_query($sql);
    	 echo mysql_error();
	 }
	 
	 // include ("comprobacion.php");
	 
	 if ($res)
	 {
	     echo "<center>";
    	 echo "Sus datos se han ingresado correctamente !!! <br><br>";
    	 echo "Ahora puede <a href=\"comprobacion.php\">Iniciar Sesión</a> con su nombre de usuario y clave de acceso";
			 echo "</center>";
	 }  
}

?>

</body>
</html>
