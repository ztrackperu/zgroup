<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control de Permanencia</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script language="JavaScript" type="text/JavaScript" >
 

    var Hoy = new Date("<?php date_default_timezone_set('America/Lima'); echo date("d M Y G:i:s");?>");
	 // Recogemos la fecha del servidor.

  // Pasamos la fecha a javascript
  //var Hoy = new Date(fecha);
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
	 document.getElementById('hora').value = Script 
    Hoy.setSeconds(Hoy.getSeconds()+1)
    setTimeout("Reloj()",1000) 
} 



</script>
<style type="text/css">
#form1 table tr td #Fecha_Reloj {
	font-size: 24px;
	color: #036;
}
</style>
 <style type="text/css">
    <!--
    td.list { font-size: 14px; text-align: center;}
    td.listn { font-size: 15px;}
   .mayor {font-size: 190%}
   .menor {font-size:190%}
   
/* Border Color / Style */
.tb3 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 100px; text-align: center;
}
.tb7 {
	border: 2px dashed #FF0000;
	width: 350px;
	font-size: 100px; text-align: center;
}

.tb4 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 100px; text-align: center;
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

<body  onLoad="Reloj()">
<form id="form1" name="form1"method="post" 
action="../MVC_Controlador/PersonalC.php?acc=g1&udni=<?php echo $_GET['udni'];?>">
  <table width="870" border="0" align="center">
    <tr>
      <td colspan="2" align="center" style="font-size:24px">CONTROL DE PERMANENCIA ENTRADA Y SALIDA</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><hr /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" style="font-size:24px" >Hoy Es: <?php
// Obtenemos y traducimos el nombre del día
$dia=date("l");
if ($dia=="Monday") $dia="Lunes";
if ($dia=="Tuesday") $dia="Martes";
if ($dia=="Wednesday") $dia="Miércoles";
if ($dia=="Thursday") $dia="Jueves";
if ($dia=="Friday") $dia="Viernes";
if ($dia=="Saturday") $dia="Sabado";
if ($dia=="Sunday") $dia="Domingo";

// Obtenemos el número del día
$dia2=date("d");

// Obtenemos y traducimos el nombre del mes
$mes=date("F");
if ($mes=="January") $mes="Enero";
if ($mes=="February") $mes="Febrero";
if ($mes=="March") $mes="Marzo";
if ($mes=="April") $mes="Abril";
if ($mes=="May") $mes="Mayo";
if ($mes=="June") $mes="Junio";
if ($mes=="July") $mes="Julio";
if ($mes=="August") $mes="Agosto";
if ($mes=="September") $mes="Setiembre";
if ($mes=="October") $mes="Octubre";
if ($mes=="November") $mes="Noviembre";
if ($mes=="December") $mes="Diciembre";

// Obtenemos el año
$ano=date("Y");

// Imprimimos la fecha completa
echo "$dia $dia2 de $mes del $ano";
?>
      <input type="hidden" name="fecha" id="fecha" value="<?php echo date("Y-m-d"); ?>" />
      <input type="hidden" name="hora" id="hora" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center" >
      <div id="Fecha_Reloj" ></div></td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
    <tr>
      <td width="422" align="right" bgcolor="#666666" style="color:#FFF;font-size:16px">Turno a Registrar</td>
      <td width="438" bgcolor="#FFFFFF"><label for="select"></label>
        <select name="select" id="select">
          <option value="1">Hora Ingreso</option>
          <option value="2">Inicio Refrigerio</option>
          <option value="3">Fin Refrigerio</option>
          <option value="4">Hora Salida</option>
      </select></td>
    </tr>
    <tr>
     <!-- <td align="right" bgcolor="#666666" style="color:#FFF">Codigo Autorizacion</td>
      <td bgcolor="#FFFFFF"><label for="codigo"></label>
      <input type="password" name="codigo" id="codigo" /></td> -->
    </tr>
    <tr>
      <td colspan="2" align="center"><hr />        <input type="submit" name="Registrar" id="Registrar" value="Registrar" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#003399" style="color:#FFF;font-size:18px">Zgroup sac</td>
    </tr>
    <tr>
      <td colspan="2" align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>