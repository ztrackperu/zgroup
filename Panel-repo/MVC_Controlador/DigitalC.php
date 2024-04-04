<?php
require("../MVC_Modelo/DigitalM.php"); 
require('../php/Funciones/Funciones.php');


if($_GET["acc"] == "frmfoto") 
{
	$nombre=$_GET['buscar'];
	include('../MVC_Vista/Digital/index.php');	
}
if($_GET["acc"] == "verimagenes") 
{	
	$buscar=$_POST['buscar'];//usado para buscar en verimagenes.php
	$nombreimagen=$_GET['nombreimagen']; //usado para llevar el nombre cuando vas a verimagenes.php
	$resultado=VerImagenesM($buscar);
	include('../MVC_Vista/Digital/verimagenes.php');	
}


if($_GET["acc"] == "verimagen") 
{	
	$buscar=$_GET['buscar'];
	$resultado=VerImagenesM($buscar);
	include('../MVC_Vista/Digital/verimagen.php');	
}

if($_GET["acc"] == "verimagengrande") 
{	
	$buscar=$_GET['buscar'];
	$resultado=VerImagenesM($buscar);
	include('../MVC_Vista/Digital/verimagengrande.php');	
}

if($_GET["acc"] == "eliminarimagenes") 
{	
	$id=$_GET['id'];
	eliminarimgM($id);	
	
	$buscar=$_POST['buscar'];
	$resultado=VerImagenesM($buscar);
	include('../MVC_Vista/Digital/verimagenes.php');
	
}

if($_GET["acc"] == "eliminarimagen") 
{	
	$id=$_GET['id'];
	eliminarimgM($id);	
	$buscar=$_POST['buscar'];
	$resultado=VerImagenesM($buscar);
	include('../MVC_Vista/Digital/verimagen.php');
	
}

if($_GET["acc"] == "guardarfoto") 
{	
	$nombre=$_REQUEST['nombrex'];
  

# Comprovamos que se haya subido un fichero

if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);
        //echo "<BR>".$info[0]; //anchura
        //echo "<BR>".$info[1]; //altura     
 
			// obtenemos los datos del archivo
				$tmpName = $_FILES['userfile']["tmp_name"];
				$tipo = $_FILES["userfile"]["type"];
				$archivo = $_FILES["userfile"]["name"];
					
			// guardamos el archivo a la carpeta images
				
				$nombreimg=strtoupper($_REQUEST['nombrex']).'-'.$_REQUEST['vista'].'.jpg';	
				$descripcion=$_REQUEST['descripcion'];	
				$fechaReg=date("Y-m-d H:i:s");	
				//$destino = "images/".$archivo;
				$destino = "../MVC_Vista/Digital/images/".$nombreimg;					
			    //move_uploaded_file($_FILES['userfile']['tmp_name'],$destino);
			# Agregamos la imagen a la base de datos	
			//$sql="INSERT INTO imagephp (anchura,altura,tipo,ubicacion,nombre) VALUES (".$info[0].",".$info[1].",'".$tipo."','".$destino."','".$archivo."')";
			  
			     $result1=BuscarImagenM($nombreimg);
						
				if($result1==''){
					copy($_FILES['userfile']['tmp_name'],$destino);	
					guardaimgM($info[0],$info[1],$tipo,$destino,$nombreimg,$descripcion,$fechaReg);			
				
					//echo "<div class='mensaje'>Foto publicada correctamente</div>";
					$mensaje="Foto publicada correctamente";			
		    		print "<script>alert('$mensaje')</script>";	
					include('../MVC_Vista/Digital/index.php');		
				}else{					
			     
				?>
                
                <script type="text/javascript">
										
					ventana=confirm("¿Imagen ya existe desea reemplazarla?"); 
					if (ventana==true) 
					{ 
						location.href="DigitalC.php?acc=reemplaza&nombre=<? echo $_REQUEST['nombrex']; ?>&vista=<? echo $_REQUEST['vista']; ?>&destino=<? echo $destino; ?>";
					   
					} 
					else 
					{ 
					 //return 0;
					 alert('IMAGEN NO REEMPLAZADA');
					 location.href="../MVC_Controlador/DigitalC.php?acc=frmfoto&nombre=<? echo $_REQUEST['nombrex']; ?>&vista=<? echo $_REQUEST['vista']; ?>";
					 
					} 
					
                 </script>
					
				<?php						
					
					
				}
			
	
	 }else{
     echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
	 }

}else{
     echo "<div class='error'>Atención: Tome una foto.</div>";
	 }

}

if($_GET["acc"] == "reemplaza") 
{		
	include('../MVC_Vista/Digital/reemplaza.php');	
}

if($_GET["acc"] == "reemplazarfoto") 
{		
	# Comprovamos que se haya subido un fichero
if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
{
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
	{
        # Cogemos la anchura y altura de la imagen
        $info=getimagesize($_FILES["userfile"]["tmp_name"]);
        //echo "<BR>".$info[0]; //anchura
        //echo "<BR>".$info[1]; //altura     
 
			// obtenemos los datos del archivo
				$tmpName = $_FILES['userfile']["tmp_name"];
				$tipo = $_FILES["userfile"]["type"];
				$archivo = $_FILES["userfile"]["name"];
					
			// guardamos el archivo a la carpeta images
				 $nvista=$_REQUEST['vista'];
				 $nombre=$_REQUEST['nombrex'];
				 
				 $nombreimg=$nombre.'-'.$nvista.'.jpg';	
				 $destino = $_REQUEST['destino'];					
			    //move_uploaded_file($_FILES['userfile']['tmp_name'],$destino);			
				copy($_FILES['userfile']['tmp_name'],$destino);						
				$mensaje="IMAGEN REEMPLAZADA";			
		    	print "<script>alert('$mensaje')</script>";					
				include("../MVC_Vista/Digital/index.php");	
			
	
	 }else{
     echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
	 }

}else{
     echo "<div class='error'>Error: Falta cargar una foto.</div>";
	 }	
}

?>