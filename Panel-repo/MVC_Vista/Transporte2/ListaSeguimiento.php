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
function enviar(){
		udni=document.getElementById("dni").value;
		des=document.getElementById("dni").value;
	 	location.href="../MVC_Controlador/TransporteC.php?acc=v01"+"&udni="+udni;
		//alert('hola');
	}
function enviar2(){
			des=document.getElementById("des").value;
		udni=document.getElementById("dni").value;
	 	//location.href="../MVC_Controlador/cajaC.php?acc=verprov2&des="+des+"+&"udni="+udni;
		//alert('hola');
	}

</script>


</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=verprov2&udni=<?php echo $val=$_GET['udni']; ?>">

<div class="onecolumn">
<div class="header">LISTA SEGUIMIENTOS <?php echo $val=$_GET['udni']; ?></div>
NUEVO
<a href="#" onclick="enviar()"><img src="../images/nuevo.png" width="48" height="48" /></a>
                      <input type="hidden" name="dni" id="dni" value="<?php echo $val ?>" />
<br class="clear"/>
                    <div class="content">
                        <table class="data" width="764" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="4" style="width:5%">RUC/NOMBRE
<label for="textfield"></label>
                                  <input name="des" type="text" id="des"  value="" size="50" />
                                  <input type="submit" name="buscar" id="buscar" value="FILTRAR" onclick="enviar2()" /></th>
                                </tr>
                                <tr>
                                    <th width="20%" style="width:5%">CLIENTE</th>
                                    <th width="52%" style="width:30%"><p>SERVICIO</p></th>
                                    <th width="3%" style="width:15%">ESTADO</th>
                                  <th width="3%" style="width:15%">EDITAR</th>
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
                                    <td><?php echo $item["pr_nruc"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo utf8_decode($item["pr_razo"]);?> </td>
                                  <td bgcolor="#FFFFCC">&nbsp;</td>
                                    
                                    
                                  <td bgcolor="#FFFFCC"><a href="../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod=<?php echo $item["pr_nruc"];?>&nom=<?php echo utf8_decode($item["pr_razo"]);?>"><img src="../images/icon_edit.png" width="16" height="16" title="Editar Proveedor" /></a>&nbsp;
&nbsp;</td>
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