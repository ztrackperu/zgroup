<?php require('../php/Configuracion/config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistema Intranet ZGROUP</title>
<meta charset="utf-8">
<!-- Combined stylesheets load -->
<link href="../css/login.css" rel="stylesheet" type="text/css">

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<link rel="icon" type="image/png" href="../favicon-large.png">
<!-- Combined JS load -->
<!-- html5.js has to be loaded before anything else -->
<script type="text/javascript" src="../js/login.js?files=html5,jquery-1.4.2.min,old-browsers,common,standard,jquery.tip.js"></script>
<!--[if lte IE 8]><script type="text/javascript" src="js/standard.ie.js"></script><![endif]-->
<!-- example login script -->
 
<!--
	
	This file is from the demo website of the Constellation Admin Skin
	
	If you like it and wish to use it, please consider buying it on ThemeForest:
	http://themeforest.net/item/constellation-complete-admin-skin/116461
	
	Thanks!
	
	-->
</head>
<!-- the 'special-page' class is only an identifier for scripts -->
<body class="special-page login-bg dark">
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie, .ie7 or .ie6 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
<section id="message">
    <div class="block-border">
        <div class="block-content no-title dark-bg">
            <p >ZGROUP SAC</p>
      </div>
    </div>
</section>
<section id="login-block">
    <div class="block-border">
        <div class="block-content">
            <h1>Sistema Intranet  </h1>
            <div class="block-header"> </div>
            <form class="form with-margin" name="login-form" id="login-form" method="post" action="../MVC_Controlador/UsuarioC.php?acc=validar" >
                <input type="hidden" name="a" id="a" value="send">
                <table width="331" border="1">
                    <tr>
                        <td width="143" height="44"><strong>Nombre de Usuario:</strong></td>
                        <td width="172"><input name="txtUsuario" type="text" id="txtUsuario" value="123" size="20"></td>
                    </tr>
                    <tr>
                        <td height="48"><strong>Contraseña:</strong></td>
                        <td><span class="inline-small-label">
                            <input name="txtClave" type="password" id="txtClave" value="123" size="20">
                            </span></td>
                    </tr>
                    <tr>
                        <td height="48" colspan="2" align="center"><button type="submit"  >Iniciar
                                Sesión</button></td>
                    </tr>
                </table>
            </form>
            <form class="form" id="password-recovery" method="post" action="#">
                <fieldset class="grey-bg no-margin collapse">
                    <legend><a href="#">Olvidó su contraseña?</a></legend>
                    <p class="input-with-button">
                        <label for="recovery-mail">Ingrese su dirección de Correo</label>
                        <input type="text" name="recovery-mail" id="recovery-mail" value="">
                        <button type="button">Enviar </button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</section>
<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
</body>
</html>
