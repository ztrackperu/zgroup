<?php  
  //include ("session_viaticos.php");
  include ("session_dedometro.php");	
	//$inicia_session = mysql_session_inicia(true);
?>	

<html>
<head>
<title>Ingreso de Personal</title>
<link rel="stylesheet" type="text/css" href=estilos.css>

<script type="text/javascript">
<!--
function limpiar()
{				
    var F = document.forms['personal'];
		
    for (i=0; i<F.elements.length; i++) 
    {
       if (F.elements[i].name.substring(0,3) == "rad")
    	 {
    			 if (F.elements[i].value == "1")
    			 {
    					 submitviatico(F.elements[i]);
    					 F.elements[i].checked = true;
    			 }
    	}
    	else
    	   if (F.elements[i].name.substring(0,3) != "btn" &&
    		     F.elements[i].name.substring(0,3) != "PHP")
    			   F.elements[i].value = "";
     }    
		 
		 F.submit();
}

function vacio(q) 
{
    for ( i = 0; i < q.length; i++ ) {
        if ( q.charAt(i) != " " ) {
                return true;
        }
    }
    return false;
}
/*
include ("session_viaticos.php");
*/
function valida(boton) 
{
   var F = document.forms['personal'];
	
	 F.aplicacion_aux.value=boton.value;
	 
	 if(F.aplicacion_aux.value == "Ingresar")
	 {												 
	 	
				if(F.habilita[0].checked == true )
				{ 
				     //alert("entro en el if de dependencia");
				 		 if(vacio(F.nom_depen.value) == false)
						 {
						 			alert("Falta introducir el nombre de la dependencia");
									F.aplicacion_aux.value="";
									F.nom_depen.focus();
									return false;											 
						 }						
				}
				if(F.habilita[1].checked == true)
				{
				 		 if(vacio(F.nombre.value) == false)
						 {
						 			alert("Falta introducir el nombre del empleado");
									F.aplicacion_aux.value="";
									F.nombre.focus();
									return false;	
						 }
						 if(vacio(F.apellido.value) == false)
						 {
						 			alert("Falta introducir el apellido del empleado");
									F.aplicacion_aux.value="";
									F.apellido.focus();
									return false;	
						 }
						 if(vacio(F.cedula.value) == false)
						 {
						 			alert("Falta introducir la cedula del empleado");
									F.aplicacion_aux.value="";
									F.cedula.focus();
									return false;	
						 }
						 if(vacio(F.cargo.value) == false)
						 {
						 			alert("Falta introducir el cargo del empleado");
									F.aplicacion_aux.value="";
									F.cargo.focus();
									return false;	
						 }		
				}
			/*	
				if(F.habilita[2].checked == true)
				{
				 		 if(vacio(F.nom_prog.value) == false)
						 {
						 			alert("Falta introducir el nombre del programa");
									F.nom_prog.focus();
									F.aplicacion_aux.value="";
									return false;											
						 }
				}
			*/	
														 
	 }
	 if(F.aplicacion_aux.value == "Modificar")
	 {
	 			if(F.habilita[0].checked == true)
				{
				 			if(F.cod_depen.value == "")
							{
							 		alert("Debe seleccionar una dependencia");
									F.aplicacion_aux.value="";
									F.cod_depen.focus();
									return false;								 
							}
							if(vacio(F.nom_depen.value) == false)
							{
							 		 alert("Falta la introducir la dependencia");
									 F.nom_depen.focus();
									 F.aplicacion_aux.value="";
									 return false;
							}							
				} 
				if(F.habilita[1].checked == true)
				{
				 		 if(F.cod_pers.value == "")
						 {
						 			alert("Falta seleccionar una persona");
									F.aplicacion_aux.value="";
									F.cod_pers.focus();
									return false; 							 
						 }
						 if(vacio(F.nombre.value) == false)
						 {
						 			alert("Falta introducir el nombre de la persona");
									F.aplicacion_aux.value="";
									F.nombre.focus();
									return false;
						 } 
						 if(vacio(F.apellido.value) == false)
						 {
						 			alert("Falta introducir el apellido de la persona");
									F.aplicacion_aux.value="";
									F.apellido.focus();
									return false;
						 }
						 if(vacio(F.cedula.value) == false)
						 {
						 			alert("Falta introducir la cedula de la persona");
									F.cedula.focus();
									F.aplicacion_aux.value="";
									return false;
						 }
						 if(vacio(F.cargo.value) == false)
						 {
						 			alert("Falta introducir el cargo de la persona");
									F.aplicacion_aux.value="";
									F.cargo.focus();
									return false;
						 }
				}
			/*	
				if(F.habilita[2].checked == true)
				{
				 		 if(F.cod_prog.value == "")
						 {
						 			alert("Debe seleccionar un programa");
									F.aplicacion_aux.value="";
									F.cod_prog.focus();
									return false;							 
						 }
						 if(vacio(F.nom_prog.value) == false)
						 {
						 			alert("Debe introducir el nombre del programa");
									F.aplicacion_aux.value="";
									F.nom_prog.focus();
									return false;
						 }
				}
			*/	
	 }
	 if(F.aplicacion_aux.value == "Eliminar")
	 {
	 			if(F.habilita[0].checked == true)
				{
				 		 if(F.cod_depen.value == "")
							{
							 		alert("Debe seleccionar una dependencia");
									F.aplicacion_aux.value="";
									F.cod_depen.focus();
									return false;								 
							}										 
				}
				if(	F.habilita[1].checked == true)
				{
				 		if(F.cod_pers.value == "")
						{
						 			alert("Debe seleccionar una persona");
									F.aplicacion_aux.value="";
									F.cod_pers.focus();
									return false;											
						}
				}
			/*	
				if(F.habilita[2].checked == true)	
				{
				 		if(F.cod_prog.value == "")
						{
						 		 alert("Debe seleccionar un programa");
								 F.aplicacion_aux.value="";
								 F.cod_prog.focus();
								 return false;												
						}										 
				}
			*/								 
	 }
	
		 personal.submit();		 
     return true;
}


-->
</SCRIPT>			

</head>


<body bgcolor=#ffffff leftmargin="0" topmargin="0" link="#006633" vlink="#006666"
      alink="#003399"  style="color:#003366">
			
<?php

//valida_session($inicia_session);
//include ("session_viaticos.php");
include("conexion.php");

//$conexion=conectarViatico();
$conexion= conectarBD();

//echo "<h1>habilita:$habilita</h1>";
$mensaje="";
if ($aplicacion_aux)
{

    if ($aplicacion_aux == "Ingresar")
    {	 
		
			  if ($habilita == "dependencia")
				{
				 		$consulta="SELECT nombre,cod_dependencia FROM dependencia WHERE nombre='$nom_depen' OR cod_dependencia='$nom_cod';";
						$resultado=mysql_query($consulta,$conexion);
						echo mysql_error();
						
						$mensaje="<h1>No hubo ingreso</h1>";
						
						if(mysql_num_rows($resultado) == 0)
						{
						 			$consulta= "INSERT INTO dependencia (nombre,cod_dependencia) VALUES ('$nom_depen','$nom_cod');";
									$resultado= mysql_query($consulta,$conexion);
									echo mysql_error();		
									$mensaje= "<h1>Ingreso con exito</h1>";										
						}				 
				}
				
				else if ($habilita == "personal")
				{
            $consulta= "SELECT cedula FROM personal WHERE cedula='$cedula'";
            $resultado= mysql_query($consulta,$conexion);
            echo mysql_error();
    				//echo $consulta;
						
        		$mensaje="<h1>No hubo ingreso</h1>";
           
					  if (mysql_num_rows($resultado)==0)
    				{
               // $consulta= "INSERT INTO personal (apellido,nombre,cedula,cargo,cod_dependencia,codigo)".
                 //          " VALUES ('$apellido','$nombre','$cedula','$cargo','$cod_depen','$codigo_personal')";
						   
						   
					   $consulta= "INSERT INTO personal (row_id ,apellido ,nombre ,cedula,cargo,cod_dependencia,codigo,tipo_pers,activo,email,fecha_act,autorizado)".
					   "VALUES (NULL , '$apellido', '$nombre', '$cedula', '$cargo', '$cod_depen', '$codigo_personal', '$tipo_pers', '1', '$email', '$fecha_act', '1')";
						   
                $resultado= mysql_query($consulta,$conexion);
                echo mysql_error();
				
				if (is_uploaded_file($HTTP_POST_FILES['im']['tmp_name'])  )
									{
									$imagen = $HTTP_POST_FILES['im']['name'];
									$imagen1 = explode(".",$imagen);
									//$imagen2 = rand(0,9).rand(100,9999).rand(100,9999).".".$imagen1[1];
									$imagen2 = $cedula.".".$imagen1[1];
									//Coloco la iamgen del usuario en la carpeta correspondiente con el nuevo nombre
									move_uploaded_file($HTTP_POST_FILES['im']['tmp_name'], "files/photo/".$imagen2);
									$ruta="files/photo/".$imagen2;
									chmod($ruta,0777); 
									//echo "Tu nueva imagen ha sido subida.";
									}
								$mensaje= "<h1>Ingreso con exito</h1>";
								
    				}
				}
				else if($habilita == "programa")
				{
				 		$consulta= "SELECT programa FROM programa WHERE programa='$nom_prog' 
											 AND cod_dependencia='$cod_depen';";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						
						$mensaje="<h1>No hubo ingreso</h1>";
						
						if(mysql_num_rows($resultado) == 0)
						{
						 		 $consulta= "INSERT INTO programa (programa,cod_dependencia) VALUES ('$nom_prog','$cod_depen');";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();				
								 $mensaje= "<h1>Ingreso con exito</h1>";									
						}					  
				}		
		}
		
    if ($aplicacion_aux == "Eliminar")
    {	 									
				if($habilita == "dependencia")
				{
				
				
				 	  $consulta= "SELECT cod_dependencia FROM dependencia WHERE cod_dependencia='$cod_depen';";                                                      
            $resultado= mysql_query($consulta,$conexion);
            echo mysql_error();
						$num= mysql_num_rows($resultado);
						
						$consulta= "SELECT cedula FROM personal WHERE cod_dependencia='$cod_depen' AND (activo = '1' or activo is null)";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						$num2= mysql_num_rows($resultado);
						
										
						$consulta= "SELECT programa FROM programa WHERE cod_dependencia='$cod_depen'";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						$num3= mysql_num_rows($resultado);
						
						$consulta= "SELECT cod_viatico FROM viaje WHERE cod_dependencia='$cod_depen'";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						$num4= mysql_num_rows($resultado);
						
						$mensaje="<h1>No hubo eliminacion</h1>";
						
						if($num != 0 && $num2 == 0 && $num3 == 0 && $num4 == 0)
						{				
						 			$consulta="DELETE FROM dependencia WHERE cod_dependencia='$cod_depen';";
									$resultado= mysql_query($consulta,$conexion);
									echo mysql_error();	
									$mensaje= "<h1>Eliminaci� con exito</h1>";
									
						} 				 
				}
				
				else if($habilita == "personal")
				{							
    		    $consulta= "SELECT cedula FROM personal WHERE cedula='$cedula'";
            $resultado= mysql_query($consulta,$conexion);
            echo mysql_error();
    				$num = mysql_num_rows($resultado);
				
						$consulta= "SELECT cod_viatico FROM viaje WHERE cedula='$cedula'";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						$num2= mysql_num_rows($resultado);
				
						$mensaje="<h1>No hubo eliminacion</h1>";
				
    				if ($num != 0 && $cedula == $cod_pers && $num2 == 0)
    				{
                $consulta= "DELETE FROM personal WHERE cedula='$cedula'";
                $resultado= mysql_query($consulta,$conexion);
                echo mysql_error();
								
								$mensaje= "<h1>Eliminaci� con exito</h1>";
    				}
				}
				else if($habilita == "programa")
				{
				 		// Verifica si el programa existe ...
				 		$consulta= "SELECT programa FROM programa WHERE cod_prog='$cod_prog'";
            $resultado= mysql_query($consulta,$conexion);
            echo mysql_error();
    				$num = mysql_num_rows($resultado);
						
						$consulta= "SELECT cod_viatico FROM viaje WHERE cod_dependencia='$cod_depen'".
						           " and cod_prog = '$cod_prog'";
						//echo $consulta; 
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						$num2= mysql_num_rows($resultado);
						

						$mensaje="<h1>No hubo eliminacion</h1>";
						
						if ($num != 0 && $num2 == 0)
    				{
                $consulta= "DELETE FROM programa WHERE cod_prog='$cod_prog'";
                $resultado= mysql_query($consulta,$conexion);
                echo mysql_error();
								$mensaje= "<h1>Eliminado con exito</h1>";
    				}
				}
		}

    if ($aplicacion_aux == "Modificar")
    {
		 	 	if($habilita == "dependencia")
				{
				 		$consulta= "SELECT cod_dependencia FROM dependencia WHERE cod_dependencia='$cod_depen';";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						
						$mensaje="<h1>No hubo modificaci�</h1>";
						
						if(mysql_num_rows($resultado) != 0)
						{
						 		 $consulta= "UPDATE dependencia SET nombre='$nom_depen',cod_dependencia='$nom_cod' WHERE cod_dependencia='$cod_depen';";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();			
								 
								 $consulta= "UPDATE programa SET cod_dependencia='$nom_cod' WHERE cod_dependencia='$cod_depen';";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();			
								 
								 $consulta= "UPDATE personal SET cod_dependencia='$nom_cod' WHERE cod_dependencia='$cod_depen';";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();			
								 
								 $consulta= "UPDATE viaje SET cod_dependencia='$nom_cod' WHERE cod_dependencia='$cod_depen';";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();									
								 
								 $mensaje="<h1>Modificado con exito</h1>";				
						}				 
				}
				else if($habilita == "personal")
				{								
    		    $consulta= "SELECT cedula FROM personal WHERE cedula='$cedula'";
            $resultado= mysql_query($consulta,$conexion);
            echo mysql_error();
    				$num = mysql_num_rows($resultado);
						
						$mensaje="<h1>No hubo modificaci�</h1>";
    				
    				if ($num != 0 || $cedula != $cod_pers)
    				{
                $consulta= "UPDATE personal SET nombre = '$nombre', apellido = '$apellido',".
    						           "cedula='$cedula',cargo='$cargo',codigo='$codigo_personal',tipo_pers='$tipo_pers',email='$email' WHERE cedula='$cod_pers'";
									   
									   
                $resultado= mysql_query($consulta,$conexion);
                echo mysql_error();
    						
							if (is_uploaded_file($HTTP_POST_FILES['im']['tmp_name'])  )
									{
									$imagen = $HTTP_POST_FILES['im']['name'];
									$imagen1 = explode(".",$imagen);
									//$imagen2 = rand(0,9).rand(100,9999).rand(100,9999).".".$imagen1[1];
									$imagen2 = $cedula.".".$imagen1[1];
									//Coloco la iamgen del usuario en la carpeta correspondiente con el nuevo nombre
									move_uploaded_file($HTTP_POST_FILES['im']['tmp_name'], "files/photo/".$imagen2);
									$ruta="files/photo/".$imagen2;
									chmod($ruta,0777); 
									//echo "Tu nueva imagen ha sido subida.";
									}
									
    						$cod_pers = $cedula;
							
								
								$mensaje="<h1>Modificaci� con exito</h1>";			
    				}
				}
				else if($habilita == "programa")
				{
				 		$consulta= "SELECT programa FROM programa WHERE cod_prog='$cod_prog';";
						$resultado= mysql_query($consulta,$conexion);
						echo mysql_error();
						
						$mensaje="<h1>No hubo modificación</h1>";
						
						if(mysql_num_rows($resultado) != 0)
						{
						 		 $consulta= "UPDATE programa SET programa='$nom_prog' WHERE cod_prog='$cod_prog';";
								 $resultado= mysql_query($consulta,$conexion);
								 echo mysql_error();		
								 
								 	$mensaje="<h1>Modificaci� con exito</h1>";												
						}
				}		
		}
	
} 

?>

<form action="ingreso_personal.php" name = "personal" method="post" enctype="multipart/form-data">
<input type="hidden" name="aplicacion_aux"> 	

<center>		
<br>
<h1>Actualizaci&oacute;n de Dependencias</h1>

    <table width="672"  border="1">
      <tr>
		<td width="610" colspan = 3 align="center">
			 <b>Dependencia</b>
		</td>
	</tr>
  <tr>
    <td colspan="3" align="center"> 
     	<select name="cod_depen" onChange="personal.submit()">
        <option value="">---- Seleccione ----</option>
        <?php 
          $consulta= "SELECT cod_dependencia,nombre FROM dependencia order by nombre";
          $resultado= mysql_query($consulta,$conexion);
          echo mysql_error(); 
          
          while($arr_asoc = mysql_fetch_array($resultado))
          { 							
            $nombre_depen= substr($arr_asoc['nombre'],0,100);
            $codigo= $arr_asoc['cod_dependencia'];
            $selected="";
            
            if($cod_depen == $codigo)
              $selected="selected";			
            
            echo "<option value=\"$codigo\" $selected>$nombre_depen</option>";	
          }							
        ?>
      </select>
    </td>
  </tr>
	</table>
<br>
		
		<?php 
					$consulta= "SELECT nombre,cod_dependencia FROM dependencia WHERE cod_dependencia='$cod_depen';";
					$resultado= mysql_query($consulta,$conexion);
					echo mysql_error();
					$num_de_resultados = mysql_num_rows($resultado);
					if($num_de_resultados)
					{
					 $nom_depen= mysql_result($resultado,0,'nombre');
					 $nom_cod= mysql_result($resultado,0,'cod_dependencia');
		         }
		 ?>
  
	  <table width="682"  border="1">
      <tr>
		<td width="20" rowspan="2">
				<input type="radio" name="habilita" value="dependencia" onClick="personal.submit()" 
				<?php if($habilita == "" || $habilita== "dependencia"){ echo "checked"; $habilita="dependencia";} ?>>
		</td>
	  <td align="center" colspan=2>
					 <b>Datos de la Dependencia</b>
		</td>
	</tr>
	<tr>
		<td colspan=2>
				  <table width="100%">
            <tr>
					    <td> C&oacute;digo: </td>
					  <td>
                <input type="text" name="nom_cod" size="10" value="<?php echo $nom_cod; ?>" <?php if($habilita != "dependencia") echo "disabled"; ?>>
              </td>	
					</tr>
					<tr>
					    <td>Nombre:</td>
              <td>
                <input type="text" size="72" name="nom_depen" value="<?php echo $nom_depen; ?>" <?php if($habilita != "dependencia") echo "disabled"; ?>>
              </td>	
					</tr>
				</table>
				</td> 
     </tr>

     <tr>
			  <td rowspan="2">
					<input type="radio" name="habilita" value="personal" onClick="personal.submit()"
					<?php if($habilita == "personal") echo "checked"; ?>>
				</td>
        <td colspan = 3 align="center"> <b>Datos del Personal</b> </td>
    </tr>

    <tr> 
      <td width="214" align="center">
    	  <select name = "cod_pers" size = 5 style="width: 200px" onChange="personal.submit()" 
				   <?php if($habilita!="personal") echo "disabled"; ?>>
    			 <?php 
              $consulta= "SELECT * FROM personal where cod_dependencia = '$cod_depen' and (activo = '1' or activo is null) order by apellido,nombre";
              $resultado = mysql_query($consulta,$conexion);
              echo mysql_error(); 
              
              while($arr_asoc = mysql_fetch_array($resultado))
              { 							
                $pers = $arr_asoc['apellido'] ;//. ", ".  $arr_asoc['nombre'];
      					$ced = $arr_asoc['cedula'];
  
                $selected="";
                if ($cod_pers == $ced)
                   $selected="selected";			
                
                echo "<option value=\"$ced\" $selected>$pers</option>";	
              }							
          	?>
    		</select>	
      </td>
  	
  	<?php
    	$consulta= "SELECT * FROM personal where cod_dependencia = '$cod_depen'".
                 " and cedula = '$cod_pers' and (activo = 1 or activo is null)";
      $resultado= mysql_query($consulta,$conexion);
      echo mysql_error();
  		$num_de_resultados = mysql_num_rows($resultado);
  		if($num_de_resultados)
		{
  		  $nombre = mysql_result($resultado,0,"nombre");
  		  $apellido = mysql_result($resultado,0,"apellido");
  		  $cedula = mysql_result($resultado,0,"cedula");
  		  $cargo = mysql_result($resultado,0,"cargo");
          $codigo_personal = mysql_result($resultado,0,"codigo");
		  $tipo_pers = mysql_result($resultado,0,"tipo_pers");	
		  $activo = mysql_result($resultado,0,"activo"); 	
		  $email = mysql_result($resultado,0,"email"); 	
		  $fecha_act = mysql_result($resultado,0,"fecha_act"); 	
		  
		  
      }
    ?> 
  	
    <td width="426">
  	      <table width="100%">
            <tr> 
              <td width="124">Nombre</td>
          <td width="290"> 
              <input type="text" name="nombre" size="20" value="<?php echo $nombre; ?>" <?php if($habilita!="personal") echo "disabled"; ?>>
          </td>
        </tr>
        <tr> 
              <td width="124">Apellidos: </td>
          <td> 
              <input type="text" name="apellido" size="20" value="<?php echo $apellido; ?>" <?php if($habilita!="personal") echo "disabled"; ?>>
          </td>
        </tr>
        <tr> 
              <td width="124">DNI: </td>
          <td colspan="3"> 
              <input type="text" name="cedula" size="10" value="<?php echo $cedula; ?>" <?php if($habilita!="personal") echo "disabled"; ?>>
          </td>
        </tr>
        <tr> 
              <td width="124">Cargo: </td>
          <td colspan="3"> 
            <input type="text" name="cargo" size="25" value="<?php echo $cargo; ?>" <?php if($habilita!="personal") echo "disabled"; ?>>
          </td>
        </tr>
	<tr> 
              <td width="124">Contrae&ntilde;a: </td>
          <td colspan="3"> 
            <input type="text" name="codigo_personal" size="20" value="<?php echo $codigo_personal; ?>" <?php if($habilita!="personal") echo "disabled"; ?>>
          </td>
        </tr>
	<tr>
	  <td>Tipo Contrato :</td>
	  <td colspan="3"><label for="tipo_pers"></label>
	    <select name="tipo_pers" id="tipo_pers" <?php if($habilita!="personal") echo "disabled"; ?>>
	      <?php if($tipo_pers){?><? }else{?> <? }; ?>
          <option value="B">Contratado</option>
	      <option value="P">Nombrado</option>
        </select></td>
	  </tr>
	<tr>
	  <td>Fecha de Ingreso:</td>
	  <td colspan="3"><input name="fecha_act" type="text" id="fecha_act" value="<?php  echo date("Y-m-d");?>" size="10" <?php if($habilita!="personal") echo "disabled"; ?> ></td>
	  </tr>
	<tr>
	  <td>Correo:</td>
	  <td colspan="3"><input name="email" type="text" id="email" value="<?php echo $email; ?>" size="30" <?php if($habilita!="personal") echo "disabled"; ?>></td>
	  </tr>
	<tr>
	  <td>Foto:</td>
	  <td colspan="3"><input name='im' type='file' /></td>
	  </tr>
  		  </table>
    </td>
  </tr>
	
	<tr>
	  <!--
	  <td rowspan="1">***
				<input type="radio" name="habilita" value="programa" onclick="personal.submit()"
				<?php //if($habilita == "programa") echo "checked"; ?>>
		</td>
	  -->
	  <!--
	  <td colspan=2 align="center">
    	  <b>Datos de los Programas</b>
    </td>-->
  </tr>
  <!--
	<tr> 
		<td align="center">
    	  <select name = "cod_prog" size = 5 style="width: 200px" onchange="personal.submit()"
				<?php //if($habilita!="programa") echo "disabled"; ?>>	
	      <?php 
              /*
	      $consulta= "SELECT * FROM programa where cod_dependencia = '$cod_depen' ";
              $resultado = mysql_query($consulta,$conexion);
              echo mysql_error(); 
              
              while($arr_asoc = mysql_fetch_array($resultado))
              { 							
                $prog = $arr_asoc['programa'];
      					$cod = $arr_asoc['cod_prog'];
  
                $selected="";
                if ($cod_prog == $cod)
                   $selected="selected";			
                
                echo "<option value=\"$cod\" $selected>$prog</option>";	
              }							
        */
	?>
		    </select>
		</td>
		<td>
		      <table width="100%">
            <?php
    	  /*
	  $consulta= "SELECT * FROM programa where cod_dependencia = '$cod_depen'".
                   " and cod_prog = '$cod_prog'";
        $resultado= mysql_query($consulta,$conexion);
        echo mysql_error();
  	if(mysql_error())
	{
	   echo "Error de query en linea 667 de ingreso_personal.php";
	   return;
	}	
  	$num_programa = mysql_num_rows($resultado); 
	if($num_programa)	
	  $nombre = mysql_result($resultado,0,"programa");
      */
      ?>
            -->
	    <!--
	    <tr>
			        <td width="60">Nombre:</td>
			  <td>
				   <input type="text" name="nom_prog" size="20" value="<?php echo $nombre; ?>"
					 <?php if($habilita!="programa") echo "disabled"; ?>>
				</td>
			</tr>
			</table>
	   </td>
	 </tr>
	 -->
   <tr>
    <td colspan = 3 align="center">
    	<input type="button" name="btn_aplicacion1" value="Ingresar" onClick="valida(btn_aplicacion1)">
    	<input type="button" name="btn_aplicacion3" value="Modificar" onClick="valida(btn_aplicacion3)">
      <input type="button" name="btn_aplicacion2" value="Eliminar" onClick="valida(btn_aplicacion2)">
    	<input type="button" name="btn_reset" value="Limpiar" onClick="limpiar()">
  	</td>
  </tr>
	
 </table>

</center>
</form>

<?php 
echo $mensaje;
 //liberaci� de recursos y cierre de conexion
 mysql_free_result($resultado);
 mysql_close($conexion);
 
  ?>
		 
</body>
</html>
