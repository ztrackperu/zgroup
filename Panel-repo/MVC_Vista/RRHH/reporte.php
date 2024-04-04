<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin RRHH </title>

<meta name="Description" content="" />

<meta name="Keywords" content="" />

<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />

<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />

<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />

<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />

<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />

<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />

<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" type="text/css" href="../css/formulario.css">

<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<link href="../css/formulario.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript" src="../js/funciones.js"></script>

<script type="text/javascript" src="../js/funciones2.js"></script>

<script src="../js/calendar.js" type="text/javascript"></script>

<script src="../js/calendar-es.js" type="text/javascript"></script>

<script src="../js/calendar-setup.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/FechaMasck.js"></script>

<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>

<script type="text/javascript" src="../js/classAjax_Listar.js"></script>

<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>

<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>

<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

 

<body>

<div class="column_left">

  <div class="header"><strong>Recursos Humanos</strong></div>

<table width="565" border="1">

  <tr>

    <td colspan="2" bgcolor="#CCCCCC">I.-Registro y Actualizacion de Datos Personal</td>

  </tr>

  <tr>

    <td>1.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=admin&udni=<?php echo $_GET['udni'] ?>">Administrar Personal</a></td>

  </tr>

  <tr>

    <td colspan="2" bgcolor="#CCCCCC">II.-Registro de Planilla</td>

  </tr>

  <tr>

    <td>1.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=aperturar&udni=<?php echo $_GET['udni']; ?>">Generar Planilla</a></td>

  </tr>

  <tr>

    <td>2.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=valBoleta&udni=<?php echo $_GET['udni']; ?>">Boleta de pago</a></td>

  </tr>

 <!-- <tr>

    <td>3.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=justificaciones">Boleta de pago</a></td>

  </tr>-->

  <tr>

    <td colspan="2" bgcolor="#CCCCCC">III.-Reportes</td>

    </tr>

  <tr>

    <td width="13">1.-</td>

    <td width="640"><a href="../MVC_Controlador/rrhhC.php?acc=verasis2&udni=<?php echo $_GET['udni']; ?>">Reporte1</a></td>

  </tr>

  <tr>

    <td>2.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=verasis3&udni=<?php echo $_GET['udni']; ?>">Reporte2</a></td>

  </tr>

  <tr>
    <td>3.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=Rep_Dctos_Personal&udni=<?php echo $_GET['udni']; ?>">Reporte Personal Dctos</a></td>
  </tr>
  <tr>

    <td colspan="2" bgcolor="#CCCCCC">IV.-Sistema</td>

  </tr>

  <tr>

    <td>1.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=importar&udni=<?php echo $_GET['udni']; ?>">Importar Datos</a></td>

  </tr>
  
    <tr>

    <td colspan="2" bgcolor="#CCCCCC">V.-Ingresos   Descuentos y Justificaciones</td>

  </tr>

  <tr>

    <td>1.-</td>

    <td><a href="../MVC_Controlador/rrhhC.php?acc=ingresos&udni=<?php echo $_GET['udni']; ?>">Registro de Ingresos</a></td>

  </tr>
  <tr>
    <td>2.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=descuentos&udni=<?php echo $_GET['udni']; ?>">Registro de Descuentos</a></td>
  </tr>
  <tr>
    <td>3.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=justi&udni=<?php echo $_GET['udni']; ?>">Registro de Justificaciones</a></td>
  </tr>
  <tr>
   <td colspan="2" bgcolor="#CCCCCC">VI.-Importar Excel</td>
  </tr>
  <tr>
    <td>1.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=imp&udni=<?php echo $_GET['udni']; ?>">Importar descuentos AFP</a></td>
  </tr>
  <tr>
    <td>2.-</td>
       <td><a href="../MVC_Controlador/rrhhC.php?acc=exp&udni=<?php echo $_GET['udni']; ?>">Exportar empleados AFP</a></td>
  </tr>




 <tr>
   <td colspan="2" bgcolor="#CCCCCC">VII.-Parametros y Vacaciones</td>
  </tr>
  <tr>
    <td>1.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=parametros&udni=<?php echo $_GET['udni']; ?>">Ver parametros</a></td>
  </tr>
  
   <tr>
    <td>2.-</td>
    <td><a href="../MVC_Controlador/rrhhC.php?acc=vacacion&udni=<?php echo $_GET['udni']; ?>">Asignar vacaciones</a></td>
  </tr>
  
</table>

</div>

 

</body>

</html>

