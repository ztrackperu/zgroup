<?php
  include ("session_dedometro.php");
  include ("variables.php");
   include ("conexion.php");
    include("Funcion/configuracion.php");
	//$inicia_session = mysql_session_inicia(true);
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="es-ve">
<head>
  <?php 
 // include ("session_dedometro.php"); 
 //	$inicia_session = mysql_session_inicia(true); 
  ?>
  
  <title>
	   Visualizaci&oacute;n en linea de registros del dedometro
  </title>
  
  <script language="JavaScript" type="text/JavaScript">
  
    var Hoy = new Date();
function Reloj(){ 
    Hora = Hoy.getHours() 
    Minutos = Hoy.getMinutes() 
    Segundos = Hoy.getSeconds() 
    if (Hora<=9) Hora = "0" + Hora 
    if (Minutos<=9) Minutos = "0" + Minutos 
    if (Segundos<=9) Segundos = "0" + Segundos 
    var Dia = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"); 
    var Mes = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
    var Anio = Hoy.getFullYear(); 
    var Fecha = Dia[Hoy.getDay()] + ", " + Hoy.getDate() + " de " + Mes[Hoy.getMonth()] + " de " + Anio + ", a las "; 
    var Inicio, Script, Final, Total 
    Inicio = "<font size=3 color=black class=mayor >" 
 //   Script = Fecha + Hora + ":" + Minutos + ":" + Segundos 
	Script = Hora + ":" + Minutos + ":" + Segundos 
    Final = "</font>" 
    Total = Inicio + Script + Final 
    document.getElementById('Fecha_Reloj').innerHTML = Total 
    Hoy.setSeconds(Hoy.getSeconds()+1)
    setTimeout("Reloj()",1000) 
} 



</script>
  
   
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  
  <style type="text/css">
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
.Estilo2 {color: #000066}
  .Estilo3 {
	color: #0000CC;
	font-weight: bold;
}
  .Estilo4 {
	font-size: 12px;
	color: #000099;
}
  .Estilo5 {
	font-size: 24px
}
  .Estilo6 {
	color: #FF0000;
	font-weight: bold;
}
  .Estilo7 {color: #FF0000}
  </style>
  
  
</head>

<body style="background-color: rgb(255, 255, 255); font-weight: bold;" onLoad="Reloj()">

<script>
function tabular(e,obj) {
  tecla=(document.all) ? e.keyCode : e.which;
  if(tecla!=13) return;
  frm=obj.form;
  for(i=0;i<frm.elements.length;i++) 
    if(frm.elements[i]==obj) { 
      if (i==frm.elements.length-1) i=-1;
      break }
  frm.elements[i+1].focus();
  return false;
}
</script>
    
<?php 
   //valida_session($inicia_session);
   
   if (!isset($btn_registrar))
   {
?>

<h2>
<center spry:hover="Estilo3" class="Estilo4 Estilo5">  Control De Permanecía - Entrada/Salida  
  
</center>
</h2>

<?php 

echo $Nompaq='ZGROUP-SAC';

/*if (!($REMOTE_ADDR == "192.168.0.118" or $REMOTE_ADDR  == "127.0.0.1" or $REMOTE_ADDR  == "192.168.0.120" or $REMOTE_ADDR  == "192.168.80.2" or $REMOTE_ADDR  == "192.168.0.198" or $REMOTE_ADDR  == "192.168.80.25" or $REMOTE_ADDR  == "192.168.0.140" or $Nompaq == "TI025" or $REMOTE_ADDR == "192.168.80.106" or $Nompaq == "TI028"))
*/ 
if ($Nompaq==NULL)

		{ ?>
		  <div>
           <span class='tb4 Estilo7'>
           <center>
           <b>
           <p>
		    ESTA TERMINAL NO ESTÁ REGISTRADO PARA REALIZAR MARCACIONES </p> CONTÁCTESE CON EL SERVICIO DE INFORMÁTICA 
          </span>
          </br>
          </center>
          </p>
Contacto: <?PHP echo constant("CORREO_SOPORTE");?> <?php echo NombrePC();?>
</div>

	

 <?php }else{?>
<form method="post" name="formulario" action="registro.php" >
  <table align="center">
    <tbody>
      <tr>
        <td><div  id="Fecha_Reloj"></div></td>
      </tr>
      <tr>
        <td><div align="center"><strong>Ingrese Clave:</strong> </div>          <div align="center">
            <input name="codigo" type="password" class="tb7" onKeyPress="return tabular(event,this)">
          </div></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td>
        <center> 
  				<input name="btn_registrar" type="submit" class="boton" value="Registrar" >
  				<input name="Reset" type="reset" class="boton" value="Limpiar">
				</center>        </td>
      </tr>
      <tr>
        <td><div align="center"><br> 
        </div>
          <div align="center" class="Estilo6">Registre su Turno Laboral y Turno de Refrigerio<br>Ingreso<br>Refrigerio(Inicio-Fin)<br>Salida</div></td>
      </tr>
    </tbody>
  </table>
  <p>
  <div align="center"></div>
 

</form>


<?php }?>
<?php
   }
   else
   {
           
     conectarBD();
     $sql = "select * from personal where codigo = '$codigo'";
     $cursor = mysql_query($sql);
	 
	 if(mysql_error()){
       echo mysql_error();
       return;
     }
     $num = mysql_num_rows($cursor);
     if(!$num)
     {
       echo "<center><span class='tb4 Estilo2'>PERSONAL NO REGISTRADO<p> 
CONTÁCTESE CON EL OFICINA DE PERSONAL 
</samp></center>";
	       echo "<meta http-equiv='refresh' content='4; URL=registro.php'>"; 
       return;
     }else{
	 $codigox = mysql_result($cursor,0,"cedula");
	 //return;
	 }
     
     $sql = "select * from asistencia where codigo = '$codigox' order by contador desc limit 0,1";
     $cursor = mysql_query($sql);
     
     $num = mysql_num_rows($cursor);
     if ($num > 0)
     {
        $h_entrada = mysql_result ($cursor,0,"h_entrada");
        $h_salida = mysql_result ($cursor,0,"h_salida");
        $fecha = date("Y-m-d");// mysql_result ($cursor,0,"fecha");
     }
     else
     {
        echo "El usuario no tiene registros";
        // exit();
     }
     
     
?>
<center>
  <table width="542" border="1" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle" class="list">
    <td colspan="2"><strong>Control de Entrada/Salida</strong></td>
    </tr>
  <tr>
    <td width="234" align="center" valign="middle">
      <?php             
	  
	  					 conectarBD();
						  $vernombre= "select * from personal  where  codigo='$codigo' limit 1";
						$resulconper= mysql_query($vernombre);
						echo mysql_error();
						while($nompers = mysql_fetch_array($resulconper))
						{
						 echo "<b>";
						echo  $nompers["apellido"].", ".$nompers["nombre"];
						 echo "</b><br>";
						echo "<img src='files/photo/".$nompers["cedula"].".jpg' width='142' height='170'  >";                        
							}
						
						
						?>
   
    <p>&nbsp;</p></td>
    <td width="292" align="center"><span class="Estilo3">Su &uacute;ltimo registro es el siguiente:</span>
      <table align = center border = 1 cellpadding=5 cellspacing=0>
  <tr>
    <td><b>Fecha</b></td>
    <td><b>Hora Entrada</b></td>
    <td><b>Hora Salida</b></td>
  </tr>
  <?php /*conectarBD();
						
	$vercedula= "select * from asistencia where codigo = '$codigo' order by contador desc limit 0,1";
	$resultadoc= mysql_query($vercedula);
	echo mysql_error();
	while($cedular = mysql_fetch_array($resultadoc))
		{echo  $cedular["cedula"];	}*/
?>
  <tr>
  
    <td align = center><?php echo $fecha; ?></td>
    <td align = center><?php echo $h_entrada; ?></td>
    <td align = center><?php echo (isset($h_salida)) ? $h_salida : "&nbsp";  ?></td>
  </tr>
</table>
      &nbsp;El nuevo registro ingresar&aacute; la siguiente informaci&oacute;n:</td>
  </tr>
  <tr align="center" valign="middle">
    <td colspan="2"><?php

 
  
  echo "<b>Fecha</b> : $fecha <br>";
  echo "<b>Hora :</b> $hora";
?></td>
    </tr>
  </table>
<br>
<br>
<form action="actualizar.php" method="post" name="formulario1">
  <table align="center">
    <tbody>
      <tr>
        <td colspan="2">
        <center> 
          <input type = "hidden" name = "codigo" value = "<?php conectarBD();
						$vercedula= "SELECT cedula FROM personal where codigo='$codigo' limit 1";
						$resultadoc= mysql_query($vercedula);
						echo mysql_error();
						while($cedular = mysql_fetch_array($resultadoc))
						{echo  $cedular["cedula"];	}?>">
          <input type = "hidden" name = "fecha" value = "<?php echo $fecha ?>">
          <input type = "hidden" name = "hora" value = "<?php echo $hora ?>">
  				<input name="btn_registrar" type="submit" class="boton" value="Registrar" id="btn_registrar">
  				<input name="Reset" type="reset" class="boton" value="&lt;&lt;&lt;&lt;" onClick="history.back();">
                 
			</center>        </td>
      </tr>
    </tbody>
  </table>
</form>
</center>
<?php
}
?>
<center>

</center>
</body>
</html>
<script language="JavaScript">
	document.formulario.codigo.focus();
	
	
	 
	  
</script>