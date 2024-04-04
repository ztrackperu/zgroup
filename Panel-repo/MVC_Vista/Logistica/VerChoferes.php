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
<script type="text/javascript"></script>
</head>
<body>
<div class="onecolumn">
                    <div class="header">CHOFERES</div>
                    <br class="clear"/>
                    <div class="content">
                        <table class="data" width="764" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                    <th width="6%" style="width:5%">Item</th>
                                    <th width="35%" style="width:30%"><p>Chofer<BR>
                                    </p></th>
                                  <th width="13%" style="width:15%">Brevete</th>
                                  <th width="8%" style="width:10%">Administrar</th>
                                      
                                </tr>
                            </thead>
                            <tbody>
                            <?php $verListaNosotros = ListachoferC();?>
                                <?php 
                    $i = 1;
                    foreach($verListaNosotros as $item)
                    {
            ?>
                                <tr>
                                    <td><?php echo $item["id_chofer"];?></td>
                                  <td bgcolor="#E5E5E5"> <B><?php echo $item["nombre_chofer"];?> </td>
                                    
                                  <td bgcolor="#FFFFCC"><?php echo $item["brevete"]; ?></td>
                                    <td bgcolor="#FFFFFF"><a href="../MVC_Controlador/LogisticaC.php?acc=m7&amp;dato=<?php echo $item["id_chofer"];?>&amp;udni=<? echo $udni;?>"> <img src="../images/icon_edit.png" alt="editar" width="20" height="20" class="help" title="Editar" /></a>&nbsp;</td>
                                   <?php  if($tbu!="c1"){?> <?php }?>
                                </tr>
                                <?php
                        $i += 1;
                    }
            ?>
                            </tbody>
                        </table>
                        Agregar <a href="../MVC_Controlador/LogisticaC.php?acc=m8&amp;udni=<? echo $_GET['udni'];?>"><img src="../images/nuevo.png" width="48" height="48" /></a>
              <div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>

</body>
</html>