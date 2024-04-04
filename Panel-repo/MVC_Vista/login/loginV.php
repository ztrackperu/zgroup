<?php // IP del visitante 
//$ip = $_SERVER['REMOTE_ADDR'];
//// IP's que vamos a bloquear 
//$blocked = array("190.187.3.124"); 
//if(in_array($ip,$blocked)){
//echo "Usted No Tiene Acceso Comuniquese con el Administrador del Sistema"; // 
//exit;
//}
 
/* Aqui el resto de la pagina */
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sistema Intranet | Zgroup</title>
	<link rel="shortcut icon" href="../images/favicon.ico" /> 
	<link rel="bookmark icon" href="../images/favicon.ico" /> 
	<!-- Stylesheets -->
<!--	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>-->
	<link rel="stylesheet" href="../login/css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    
<script type="text/javascript">
function aviso(){
alert('Envie un correo a lcruzado@zgroup.com.pe')
}
</script> 
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
<a href="#" class="round button dark ic-left-arrow image-left ">Acceso solo a usuarios autorizados</a>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->

	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Intranet - Zgroup</h1>
				<h5>Sistema Integrado</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="../login/images/company-logo.png" alt="
            " /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form action="../MVC_Controlador/UsuarioC.php?acc=validar" method="POST" id="login-form" title="Intranet Zgroup">
		
			<fieldset>

				<p>
					<label for="login-username">Usuario</label>
					<input name="txtUsuario" type="text" autofocus class="round full-width-input" id="txtUsuario" />
				</p>

				<p>
					<label for="login-password">Contraseña</label>
					<input name="txtClave" type="password" class="round full-width-input" id="txtClave" />
				</p>
				
				<p>Ha <a href="#" onClick="aviso()">Olvidado Su Contraseña</a>.</p>
				
				<!--<a href="../MVC_Controlador/UsuarioC.php?acc=validar" class="button round blue image-right ic-right-arrow">INGRESAR</a>-->
                <button type="submit" class="button round blue image-right ic-right-arrow">
Iniciar
                                Sesión</button>
			</fieldset>

			<br/><div class="information-box round">haga clic en el botón "Iniciar sesión" para continuar, no hay información de inicio de sesión que requiere.</div>
		</form>
	</div> <!-- end content -->
	<!-- FOOTER -->
	<div id="footer">
		<p>&copy; Copyright 2016. Derechos Reservados |<strong></strong> Desarrollado por <a href="#">Dpto Sistemas</a> Ver. 2.0</p>
	
	</div> <!-- end footer -->

</body>
</html>