<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>Actulización de registros del Dedometro</title><style type="text/css">
    <!--
    td.list { font-size: 14px; text-align: center;}
    td.listn { font-size: 15px;}
   .mayor {font-size: 950%}
   .menor {font-size:150%}
   
/* Border Color / Style */
.tb3 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 190px; text-align: center;
}
.tb7 {
	border: 2px dashed #FF0000;
	width: 350px;
	font-size: 70px; text-align: center;
}

.tb4 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 50px; text-align: center;
}

 

}
 

    -->
  </style>
  
  <style type="text/css">
  .boton{
        font-size:15px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#000066;
        border:0px;
        width:100px;
        height:80px;
       }
.Estilo5 {
	color: #FF0000;
	font-weight: bold;
}
  </style>
  
</head>
<body>

<center>

<?
 

include ("fechas/fecha.php"); 
    include ("conexion.php");
 $codigo=$_REQUEST["codigo"];
 $fecha=$_REQUEST["fecha"];
 $hora=$_REQUEST["hora"];
?>                

<?php

    function registrar ($codigo, $fecha, $hora)
    {
      $consulta = "SELECT h_salida, fecha FROM asistencia WHERE codigo='$codigo' AND fecha='$fecha'";
			$resultado = mysql_query($consulta);
			echo mysql_error();

			if ($codigo == "")
  				return -1;
	
			$res = 0; 
			if (mysql_num_rows($resultado) == 0)
			{
		 		  // Inserta primer turno ... 
					$ins = "INSERT INTO asistencia (codigo,fecha,h_entrada) VALUES ('$codigo','$fecha','$hora')";
					$res = mysql_query($ins);
					echo mysql_error();												
			}
  		else
			{
				 $h_salida="";
		 		 $consulta = "SELECT h_entrada FROM asistencia". 
			               " WHERE fecha='$fecha' AND codigo='$codigo'". 
									   " AND h_salida is null AND h_entrada is not null";
				 
				 $resultado = mysql_query($consulta);
				 echo mysql_error();
				
 				 if (mysql_num_rows($resultado) != 0)
				 {
	      		$h_entrada= mysql_result($resultado,0,'h_entrada');
				
						if ($h_entrada == $hora)
				    		return -1;
  						
  					$h_in = substr($h_entrada,0,strpos($h_entrada,":"));
						$h_out = substr($hora,0,strpos($hora,":"));
						$m_in = substr($h_entrada,strpos($h_entrada,":"));
						$m_out = substr($hora,strpos($hora,":"));
  						
						$n_horas = sumahoras($h_out,$h_in,$m_out,$m_in); 

				 		// Actualiza salida de turno ...
						$upd = "UPDATE asistencia SET h_salida='$hora',n_horas_dia='$n_horas'".
						           " WHERE codigo='$codigo' AND fecha='$fecha' AND h_entrada='$h_entrada'";
											 
						$res = mysql_query($upd);
						echo mysql_error();			
					}
					else  
					{
				  	// Buscar si el registro anterior tiene la misma hora que el que se va a insertar ...
            $consulta= "SELECT h_salida FROM asistencia". 
                       " WHERE fecha='$fecha' AND codigo='$codigo'". 
                       " AND h_salida is not null";
											 
            $resultado = mysql_query($consulta);
						$num_rows = mysql_num_rows($resultado);
            echo mysql_error();
                  
						$repetido = 0;   
						for ($i = 0; $i < $num_rows; $i++)
						{
						    $hora_salida = mysql_result($resultado,$i,"h_salida");
								if ($hora_salida == $hora)
								{
								    $repetido = 1;
										break;
								}  
						}
						
						if ($repetido)
						    return -1; 
						
					 	// Inserta nuevo turno ...
						$ins = "INSERT INTO asistencia (codigo,fecha,h_entrada) VALUES ('$codigo','$fecha','$hora');";
						$res = mysql_query($ins);
						echo mysql_error();
					
					} //end else
			 } // end else  
			 
			 return 0;
    } // end function
	
$Nompaq=NombrePC();

/*    if (!($REMOTE_ADDR == "192.168.0.118" or $REMOTE_ADDR  == "127.0.0.1" or $REMOTE_ADDR  == "192.168.0.198" or $REMOTE_ADDR  == "192.168.80.25" or $REMOTE_ADDR  == "192.168.80.2" or $REMOTE_ADDR  == "192.168.0.140" or  $Nompaq  == "TI025" or $REMOTE_ADDR == "192.168.80.106"))*/
	
if (!($REMOTE_ADDR  == "127.0.0.1" or  $Nompaq  == "TI028" or  $Nompaq  == "TI002"))
	
		{
		    echo "<span class='tb4 Estilo5'><center><b><p>";
		    echo "ESTA TERMINAL NO ESTÁ REGISTRADO PARA REALIZAR MARCACIONES <p> 
CONTÁCTESE CON EL SERVICIO DE INFORMÁTICA 
</span><br>";


			echo "<p><img src='img/logochico.jpg'>";
			 echo "<meta http-equiv='refresh' content='4; URL=registro.php'>";
		    echo "<center><b>";
			 return;
	}

    
    
    if (!conectarBD())
        return;
        
    if (isset($codigo) && isset($fecha) && isset($hora))    
    {
        echo "<center>";
				echo "<p><span class='tb4 Estilo2'>Su registro se realizó exitosamente<br>";
        
        echo "<br>";
				echo "<b>Fecha</b> : $fecha <br>";
        echo "<b>Hora :</b> $hora <br>";
        echo "</span><br>";
        
        registrar ($codigo,$fecha,$hora);
        
        echo "<meta http-equiv='refresh' content='4; URL=registro.php'>";
		
//		echo "<a href = \"registro.php\">Realizar un nuevo registro</a>";
        
        echo "</center>";        
        
        exit();
    }
    
    $consulta= "SELECT * FROM control_dedo";
    $resultado= mysql_query($consulta);
    echo mysql_error();
    
    if (mysql_num_rows($resultado) != 0)
    {
        $fecha_act = mysql_result($resultado,'0','fecha_act');
        $linea_final = rtrim(mysql_result($resultado,'0','registro'));
        $pos_inicio= mysql_result($resultado,'0','pos_final_arch');//linea a partir de la cual debe 
        																							             //hacerse la actualización
    }
    else
    {
        $ins = "insert into control_dedo values ()";
        mysql_query($ins);
        echo mysql_error();
    }
		
		list($fechault,$horault) = explode(" ",$fecha_act);
		list($fechahoy,$horahoy) = explode(" ",date("Y-m-d h:i:s"));
		
		if ($fechahoy == $fechault)
		{
		    list($hu,$mu,$su) = explode(":",$horault);
				list($hh,$mh,$sh) = explode(":",$horahoy);
				
				if (($hu == $hh) and (($mh-$mu) < 3))
				{
				   echo "<br>La última actualización se realizó el <b>$fecha_act</b><br><br>";
					 echo "Por favor intente dentro de 2 ó 3 de minutos ... <br>($horahoy)" ;
				   return;
				}
		}
    
    $pos_inicio = ($pos_inicio > 1)? $pos_inicio:0;
    $registro="";
    $cont_linea=0;
    
    //$n = 0;
    //$pos_inicio = ($n)*37;
    //echo $pos_inicio ."-";
		 
		define ('NOMBRE_FICHERO',"C:\FINGLAN3\VERIFY.DAT");

		$fichero= fopen(NOMBRE_FICHERO, 'r');
		 
		if (!$fichero)
		{
		    echo "No pudo abrir archivo ...";
				return;
		}
		
		fseek($fichero,$pos_inicio);
		$final_cursor = $pos_inicio;
    
		while(!feof($fichero))
    {
		 			$linea= rtrim(fgets($fichero,4096));
					// echo $pos_inicio ."=>". $linea . ";" . $linea_final . "<br>";
					
												
     			$registro=$linea;

					if ($cont_linea == 0)
					{
					    echo "Actualizando !!!, <br>Espere por favor ....<br>";
					    
							if ($linea != $linea_final && $linea != "")
							{
							   echo "Alerta !!!";   // analizar que hacer !!!...
								 return;
							}

              $cont_linea = 1;
							$final_cursor = ftell($fichero);								 
							continue;
					}
					
					// exit;
    			
    			if ($pos_inicio > 0) // No es primera vez
    			{
							$ano=""; $mes="";$ $dia="";
							if(strstr($linea,"-") == false)
							{
			 	  	 			$ano= substr($linea,6,4);  
        					$mes= substr($linea,3,2);
        					$dia= substr($linea,0,2);								
					    }
							else
							{
    							$ano= substr($linea,0,4);  
        					$mes= substr($linea,5,2);
        					$dia= substr($linea,8,2);
    					}
							
    					$fecha = $ano."-".$mes."-".$dia;
    					$hora = substr($linea,11,5);   
    					$codigo = substr($linea,31,4);  		
    					
    					$accion = registrar ($codigo,$fecha,$hora);
    					if ($accion == -1)
    					    continue;
    					
					    if ($final_cursor < $pos_inicio)
					    {
							    echo "<br>Error en actualización,<br>Consulte al Administrador de Sistema<br>";
									break;   						
					    }
					
							$fechahoy = date("Y-m-d h:i:s");
						  
							$upd = "UPDATE control_dedo set n_lineas_leidas = '$cont_linea',fecha_act = '$fechahoy',".
								 		 " pos_final_arch = '$final_cursor', registro = '$registro'";
           		$res = mysql_query($upd);
           		echo mysql_error();
    			}
    			
					//$pos_inicio = ftell($fichero);
					$final_cursor = ftell($fichero);
					$cont_linea++;
					
    } //end while

		if ($cont_linea-1 > 0)
 		    echo "<br>".($cont_linea-1)." Registros Actualizados con exito<br>";
		else
	      echo "<br>No se han registrados cambios desde la última actualización...<br>";
				  	
?>
</center>
</body>
</html>
