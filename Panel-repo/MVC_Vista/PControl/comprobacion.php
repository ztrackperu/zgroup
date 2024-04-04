<?php 
 session_start();
 include("conexion.php");
 if($Enviar)
 {
   
   conectarBD();
   $sql = "select * from personal p,login l where l.login = '$usuario' and password=md5('$clave')";
   
   $cursor = mysql_query($sql);
   echo mysql_error();
   $num = mysql_num_rows($cursor);
   if($num)
   {
     //Aqui nos damos cuenta de que el usuario existe
     $_SESSION['activar_session'] = 1;
echo "entro";
?>     
    <script>
      window.location = "portada.php";
    </script>
<?php  
   }
 }

?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<script type="text/javascript">
<!--

function onActualizar(valor)
{
   param = "?cedula=" + valor.value; 
	 top.mainframe.location = "act_personal.php" + param;
}

// -->
</script>

<body bgcolor="#FFFFFF" text="#000000">

<br>
<?php
	 /*
	 if ($REMOTE_ADDR != "150.187.25.180")
	 { 
      echo "<center> Sistema en Mantenimiento<br>Disculpe las molestias !!</center>";
	    exit;Enviar
	 }
	 */ 
function option_nuevos_usuarios()
{       
      $conex = conectarBD();		
		$sql = "select * from personal where fecha_act is null and codigo is not null order by apellido, nombre";
		echo $sql;
		$cursor = mysql_query($sql,$conex);
		
		$num = mysql_num_rows($cursor);
		
		for ($i = 0; $i < $num; $i++)
		{
		    $cedula = mysql_result ($cursor,$i,"cedula");
				$apellido = mysql_result ($cursor,$i,"apellido");
				$nombre = mysql_result ($cursor,$i,"nombre");
				
				echo "<option value = \"$cedula\">$apellido, $nombre</option>";
		}
}

?>

<form name="comprobacion" method="post" action="comprobacion.php">

  <p align="center"><b><font size="5">Acceso al Sistema</font></b></p>
	<table border="1" width="300" align="center">
    <tr>
      <td>
        <table border="0" align="center">
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td> 
              <div align="right">Usuario:</div>
            </td>
            <td> 
              <input type="text" name="usuario" value="invitado">
            </td>
          </tr>
          <tr> 
            <td> 
              <div align="right">Clave:</div>
            </td>
            <td> 
              <input type="password" name="clave" value="invitado">
            </td>
          </tr>
          <tr>
            <td colspan="2"> 
              <hr>
            </td>
          </tr>
          <tr> 
            <td colspan="2"> 
              <div align="center"><font size="2">Si ud. aun no posse un nombre 
                de usuario y clave, seleccione su nombre de la siguiente lista:</font></div>
            </td>
          </tr>
         <!--
          <tr> 
            <td> 
              <div align="right">Personal: </div>
            </td>
            <td> <!--
              <select name="cedula" onchange="onActualizar(this)">
							<option value = "">--- Seleccione --</option>
							<?php
							  
							  //include ("../modulos/usuario_intranet/usuarios.php");
							 //option_nuevos_usuarios();
							  /*
							  include("conexion.php");
							  conectarBD();
							  $sql = "select * from personal order by apellido";
							  $cursor = mysql_query($sql);
							  echo mysql_error();
							  $num = mysql_num_rows($cursor);
							  if($num)
							  {
							    for($i=0;$i<$num;$i++)
							    {
							      $codigo = mysql_result($cursor,$i,"codigo");
							      $nombre = mysql_result($cursor,$i,"nombre");
							      $apellido = mysql_result($cursor,$i,"apellido");
							      echo "<option value = '$codigo'>$apellido $nombre</option>";
							    }
							  }
							  */
							?>
              </select>
            </td>
          </tr>
         -->
          <tr> 
            <td colspan="2">
              <hr>
            </td>
          </tr>
          <tr> 
            <td colspan="2"> 
              <div align="center"> 
                <input type="submit" name="Enviar" value="Enviar">
                <input type="reset" name="Limpiar" value="Limpiar">
              </div>
            </td></script>     
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <!--
  <p align="center"><a href="envio_clave.php">Olvid&oacute; su nombre de usuario 
    o su clave ?</a></p>-->
</form>
	
</body>
</html>
