<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgroup </title>
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

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="../Admision/js/jquery.js"></script>
<script type="text/javascript" src="../Admision/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../Admision/js/hint.js"></script>
<script type="text/javascript" src="../Admision/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../Admision/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../Admision/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../Admision/js/custom_blue.js"></script>

<script type="text/javascript">
	
	<!--Buscar parametro-->
function enviar2(){
		des=document.getElementById("des").value;
		udni=document.getElementById("dni").value;
	 	//location.href="../MVC_Controlador/cajaC.php?acc=verprov2&des="+des+"+&"udni="+udni;
		//alert('hola');
	}

</script>


</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=parametros&udni=<?php echo $val=$_GET['udni']; ?>">

<div class="onecolumn">
<div class="header">LISTA PARAMETROS</div>
                      Agregar <a href="../MVC_Controlador/rrhhC.php?acc=RegParam&udni=<?php echo $val=$_GET['udni']; ?>"><img src="../images/nuevo.png" width="48" height="48" /></a>
                      <input type="hidden" name="dni" id="dni" value="<?php echo $val ?>" />
<br class="clear"/>
                    <div class="content">
                        <table class="data" width="750" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="7" style="width:20%" align="center">DESCRIPCION &nbsp;&nbsp;&nbsp; <input name="des" type="text" id="des"  size="50" />
                                  <input type="submit" name="buscar" id="buscar" value="FILTRAR" onclick="enviar2()" />
                                </tr>
                                <tr>
                                  <th width="10%">ID</th>
                                  <th width="30%">DESCRIPCION</th>
                                  <th width="15%"><p>PERIODO</p></th>
                                  <th width="10%"><p>VALOR</p></th>
                                  <th width="15%"><p>USUARIO</p></th>
                                  <th width="10%" >Editar</th>
                                  <th width="10%" >Eliminar</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                            <?php $listacliente = $resulta;
                    $i = 1;
					if($listacliente!=NULL)
{
                    foreach($listacliente as $item)
                    {
            ?>
                                <tr>
                                	<td><?php echo $item["id_param"];?></td>
                                    <td><?php echo utf8_encode( $item["des_param"]);?></td>
                                  <td><?php echo  vfecha(substr($item["periodo"],0,10));?> </td>
                                   <td><?php echo $item["val1_param"];?></td>

                                    <td><?php echo $item["usuario"];?></td>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=actualizap&cod=<?php echo $item["id_param"];?>&udni=<?php echo $val=$_GET['udni']; ?>"><img src="../images/icon_edit.png" width="20" height="20" title="Actualiza Parametro" /></a>&nbsp;
  &nbsp;</td>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=eliminarp&amp;cod=<?php echo $item["id_param"];?>"><img src="../images/icon_delete.png" alt="" width="20" height="20" title="Eliminar Parametro" /></a></td>
                                  
                                </tr>
                                <?php
                        $i += 1;
                    }}
            ?>
                            </tbody>
                        </table>
                      
    <div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>
</form>
</body>
</html>