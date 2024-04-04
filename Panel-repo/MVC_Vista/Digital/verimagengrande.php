
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GUARDAR FOTOS EN EL SERVIDOR</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/iconos/icon.jpg" />	

<script type="text/javascript">
	function eliminarimg(id){
				
		var nro=id;	
		var mensaje='Seguro de Eliminar la imagen : '+nro;
	//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
		if(confirm(mensaje)){
		location.href="../MVC_Controlador/DigitalC.php?acc=eliminarimagen&id="+nro;
		}else{
			 return false;
		}
	}
	
	
</script>



</head>

<body>

<h2>Equipo <?php echo $buscar; ?> </h2>

<form action="#" method="POST">
	<div class="listadoImagenes">

   
    	
	<?php
        if($resultado!="")
		{
		foreach($resultado as $row){
			 $nom=$row['nombre'];
			 $can=strlen($nom);
			 $nombre=substr($nom,0,$can-6);
			 $nvista= substr($nom,$can-5,1);
			 if($nvista=='1'){$vista="VISTA LATERAL";}else if($nvista=='2'){$vista="VISTA FRONTAL";}else{$vista="VISTA TRASERA";}
			 echo $nombre."  ". $vista;
			?>  
                                
		  <br />		
          <img src="<?php echo $row["ubicacion"];?>"  > 
		  <br /> <br />           
	<?php } }?>
    <br /><br /> 
	<a onclick="history.back()">Volver</a><br /><br />

	</div>
</form>
</body>
</html>
