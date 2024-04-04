
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>GUARDAR FOTOS EN EL SERVIDOR</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/iconos/icon.jpg" />	
    <link rel="stylesheet" type="text/css" href="../css/style_intranet.css" />     
    <script type="text/javascript">
	function regresar(){
		location.href="../MVC_Controlador/DigitalC.php?acc=frmfoto"; 
	}
</script>
</head>

<body>
<?php $nvista=$_GET['vista']; if($nvista=='1'){$vista="VISTA LATERAL";}else if($nvista=='2'){$vista="VISTA FRONTAL";}else{$vista="VISTA TRASERA";} ?>

 <form name="form1" enctype="multipart/form-data" action="../MVC_Controlador/DigitalC.php?acc=reemplazarfoto" method="POST">
 
	 <input name="nombrex" id="nombrex" type="hidden" value="<?php echo $_GET['nombre'];?>" readonly="readonly">	 
	 <input name="vista" id="vista" type="hidden" value="<?php echo $_GET['vista']; ?> " readonly="readonly" >
     <input name="destino" id="destino" type="hidden" value="<?php echo $_GET['destino']; ?> " readonly="readonly" >
	 
<br /><table  border="1" cellpadding="0" cellspacing="0" bordercolor="#0000CC" >
    
    <tr align="center">
            <td width="50%" height="70" align="center">Reemplazar foto </td>
            <td width="50%" align="center"><input class="myButton" type="submit" value="Publicar"></td>
          </tr>
    
    	  <tr align="center">
            <td height="40"><strong>Codigo Equipo</strong></td>
            <td><?php echo $_GET['nombre'];?></td>
          </tr>
          
          <tr align="center">
            <td height="40"><strong>Vista</strong></td>
            <td><?php $nvista=$_GET['vista']; 
			 	if($nvista=='1'){$vista="VISTA LATERAL";}else if($nvista=='2'){$vista="VISTA FRONTAL";}else{$vista="VISTA TRASERA";}?>
             	 <?php echo $vista;?>
             </td>
          </tr>
          
          <tr align="center">
              <td height="40"> Tomar nueva foto</td>           
              <td ><div class="fileinputs">
                        <input name="userfile" value="Foto" type="file" class="file" />
                        <div class="fakefile">
                            <!--<input />-->
                            <img src="../images/iconos/camera.png" />
                        </div>
                    </div></td>
          </tr>
          <tr>
            <td height="60" colspan="2" align="center"><input class="myButton" type="button" onclick="regresar();" value="Cancelar"></td>
          </tr>
            
       </table>     
	 <br>   
  <br>
    
 </form>
</body>
</html>