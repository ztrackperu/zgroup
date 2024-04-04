<?php 
 session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>
</head>
<body link = "#003366" vlink = "#003366" alink  = "#003366">
<center>
<br><br>
<br>
<img src="../img/central.jpg" width="550" height="200"><br>
<h1>&nbsp; </h1>
<h2>Sistema de Control del Asistencia</h2>
<br>
<div align="center" >

<?php
    echo "<p><b>". $mensaje ."</b></p>";
		
		if (!$_SESSION['activar_session'])
		{
				echo "Para ingresar al Sistema<br>debe presionar el boton ";
				?> 
             <a href="comprobacion.php" style="text-decoration: none; ">
						    <b>Iniciar sesión</b>
						 </a>
				<?php
		}
?>


</div>
</center>
</body>
</html>
