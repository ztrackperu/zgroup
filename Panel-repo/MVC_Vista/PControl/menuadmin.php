<?php
 
  /*include ("session_dedometro.php");
	if (isset($usuario) && isset($clave)){
	   $inicia_session = mysql_session_inicia();
	   }
	else{
	   $inicia_session = mysql_session_inicia(true);
 }*/
?>
<html>
<head>
  <title>Untitled</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css">
     a { text-decoration: none; }
  .Estilo1 {color: #004A6F}
    .Estilo3 {color: #004A6F; font-weight: bold; }
    </style>
	
</head>

<body bgcolor = "#CCFFFF" text="#ffffff" vlink="#ffffff" alink="#ffffff" link="#ffffff">

<center class="Estilo1">
  <strong>  <b><span class="Estilo1">CONTROL DE ASISTENCIA</span><b>  </strong>
</center>

<br>

<Center>
<font size = 2 color="#004A6F">
<?php
 /*
  include ("../modulos/usuario_intranet/usuarios.php");

  $mensaje = "";
  if (isset($btn_sesion) && $btn_sesion == "Salir sesi�")
	{
	    $mensaje = "Gracias por utilizar el Sistema.";
			mysql_session_destruir(session_id());
			$inicia_session = false;
	}
	
	if ($inicia_session)
	{
    	if (isset($usuario))
    	{
    			if (valida_login($usuario,$clave) == false)
          {
        			// Session no valida
    					$mensaje = "Nombre de usuario o clave incorrecto !!"; 
    					mysql_session_destruir(session_id());
        			$inicia_session = false;
        	}
					else
					{
					  mysql_session_inserta_data("usuario",$usuario);
						$mensaje = "Sr(a). $usuario,<br><br> BIENVENIDO AL SISTEMA !!";
					}

    	}
    	else 
    	{
    	    $usuario = mysql_session_lee_data("usuario");
    			
    			if ($usuario == "")
    			{
    			    mysql_session_destruir(session_id());
        			$inicia_session = false;
    			}
					else
					   $mensaje = "Sr(a). $usuario,<br><br> BIENVENIDO AL SISTEMA !!";
    	}
	}  
			
	echo "Actualizado el:<br>". ultima_actualizacion_asistencia();
	
	if ($mensaje)
	{
    	?>
    	<script type="text/javascript">
    	   parent.mainframe.location = "portada.php?mensaje=<?php echo $mensaje ?>";
    	</script>
    	<?php
	}
*/
?>
</font>
<br><br>
<table width="150" border="0">
  <tr>
    <td><img src="iconos/estadistica.gif" alt="" width="15" height="15"></td>
    <td><a href="buscar.php" target="mainframe" class="Estilo1">Prog. Hoario</a></td>
  </tr>
   <tr>
    <td><img src="iconos/estadistica.gif" alt="" width="15" height="15"></td>
    <td><a href="VerHorario.php" target="mainframe" class="Estilo1">Ver Programción</a></td>
  </tr>
  <tr>
    <td><img src="iconos/estadistica.gif" alt="" width="15" height="15"></td>
    <td><a href="reportemarca.php" target="mainframe" class="Estilo1">Control de <br>Asistencia</a></td>
  </tr>
 
  <tr>
    <td width="10"><img src="img/flecha.gif" width="8" height="13"></td>
    <td width="130"><span class="Estilo1"><a href="asistencia.php<?php echo $param ?>" target="mainframe" class="Estilo1"> Consultar</a> 
    </span></td>
  </tr>
  <tr>
    <td><img src="img/flecha.gif" alt="" width="8" height="13"></td>
    <td><span class="Estilo1"><a href="sel_listado.php<?php echo $param ?>" target="mainframe" class="Estilo1">Asistencia</a><br>
    </span></td>
  </tr>
  <tr>
    <td><img src="img/flecha.gif" alt="" width="8" height="13"></td>
    <td><span class="Estilo1"><a href="registro.php" target="mainframe" class="Estilo1">Registrar</a><br>
    </span></td>
  </tr>
  <tr>
    <td><img src="img/flecha.gif" alt="" width="8" height="13"></td>
    <td><span class="Estilo1"><a href="ingreso_personal.php" target="mainframe" class="Estilo1">Personal</a><br>
    </span></td>
  </tr>
  
  <tr>
    <td><img src="img/flecha.gif" alt="" width="8" height="13"></td>
    <td> <a href="pws/pws_personal.php" target="mainframe" class="Estilo1">Cambiar <br>Contrase&ntilde;a</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="Estilo1"></span></td>
  </tr>
</table>

 
<?php
  //echo "<a href=\"ingreso_personal.php\" target=\"mainframe\">Dependencias</a>";
?> 
  <br>
</center>

<br><br>

<Center>
<font size = 2>
<?php
	/*
	include ("../comun/contador.php");

  $num_visitas = cont_visitas($REMOTE_ADDR,"DEDOMETRO",0);
  echo "<u>Visitas</u><br>" . $num_visitas;
	*/
?>
</font>
<center>

<?php
   /*
    if ($inicia_session == true)
		{
        ?>
          <form action="menu.php" target="menu">
          <center>
					  <input type="submit" name="btn_sesion" value="Salir sesi�" style = "width:100" onclick="alert('Ud. ha salido del Sistema')">
					</center>
          </form>				
        <?php
    }
		else 
		{
        ?> 
          <form action="comprobacion.php" target="mainframe">
          <center>
					  <input type="submit" name="btn_sesion" value="Iniciar sesi�" style = "width:100">
					</center>
          </form>						
        <?php
    }
    */
?> 

<span class="Estilo3">Unidad de Informatica</span> 
</body>
</html>



