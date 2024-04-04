<?php 
 session_start();
 include("Funcion/configuracion.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled</title>
</head>
<body link = "#003366" vlink = "#003366" alink  = "#003366">
<center>
<br><br>
<br><a href=
<img src="img/logochico.jpg" width="115" height="135"><br>
<h1><?php echo  constant("ORGANIZACION");?></h1>
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
		}else{
			
			
?>
  

<script language="JavaScript">
<!--
 
<!-- Cargar la página según el explorador -->
function cargar(){
    
    window.location.href="registro.php";
     
}
cargar()
//-->
</script>


<?php
		}
?>

</div>
</center>
</body>
</html>
