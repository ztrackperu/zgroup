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
	 	location.href="../MVC_Controlador/cajaC.php?acc=regprov"+"&udni="+udni;
	}
function enviar2(){
		des=document.getElementById("des").value;
		udni=document.getElementById("dni").value;
	}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=admin&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">
<div class="onecolumn">
<div class="header">LISTA EMPLEADO</div>
Agregar Empleado <a href="../MVC_Controlador/rrhhC.php?acc=Insertar" onclick="enviar()"><img src="../images/empleado.png" width="48" height="48" /></a>
    <input type="hidden" name="dni" id="dni" value="<?php echo $val ?>" />
<br class="clear"/>
<div class="content">
<table class="cabecerax" width="844" cellpadding="0" cellspacing="0" bordercolor="#000000">
                   
                    <tr>
                      <th align="left">Filtrar Por:</th>
                      <th align="right">&nbsp;</th>
                      <th align="right">&nbsp;</th>
                      <th align="center">&nbsp;</th>
        </tr>
                    <tr>
                    <th width="235" align="right"> EMPRESA &nbsp;
                     <select name="IdEmpresa" id="IdEmpresa"  class="texto"    >           
              <option value=""  >TODOS</option>                          
            <option value="1" <?php if($_REQUEST['IdEmpresa']==1){ ?> selected  <?php }?>>ZGROUP</option> 
            <option value="2" <?php if($_REQUEST['IdEmpresa']==2){ ?> selected  <?php }?> >PCCARGO</option>
          </select>
                     </th>
 <th width="235" align="right">ESTADO 
<select name="estado" id="estado" class="texto"  > 
              <option value=""  >TODOS</option>         
            <option value="1" <?php if($_REQUEST['estado']==1){ ?> selected  <?php }?> >ACTIVOS</option> 
            <option value="2" <?php if($_REQUEST['estado']==2){ ?> selected  <?php }?> >CESADOS</option>
          </select>        
                      </th>
                                  <th width="182" align="right">TIPO 
                                   <select name="tipo" id="tipo" class="texto"  > 
              <option value=""  >TODOS</option>         
            <option value="1" <?php if($_REQUEST['tipo']==1){ ?> selected  <?php }?> >PLANILLA</option> 
            <option value="2" <?php if($_REQUEST['tipo']==2){ ?> selected  <?php }?> >RECIBO</option>
          </select></th>
                      <th width="182" align="center">
          <input type="submit" name="buscar" id="buscar" value="FILTRAR" onclick="enviar2()" /></th>
                                </tr>
                   </table>             
       <br />             
                      <table class="data" width="764" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                               
                                <tr>
                                  <th width="6%">N°</th>
                                  <th width="11%" align="center">Dni</th>
                                  <th width="59%" align="center">Apellido y Nombres</th>
                                  <th width="7%" >Editar</th>
                                  <th width="7%" >Eliminar</th>
                                  <th width="10%" >Ver Ficha</th>
                                </tr>
                        </thead>
                            <tbody>
                            <?php 
							$listacliente = $resulta;
                    $i = 1;
					if($listacliente!=NULL){
                    foreach($listacliente as $item){
            ?>
                                <tr>
                                  <td><?php echo $i;?></td>
                                    <td><?php echo $item["Dni"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo ($item["ApePat"].' '.$item["ApeMat"].' '.$item["NomC"].' '.$item["NomC2"]);?> &nbsp;</td>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=actualiza&cod=<?php echo $item["Cod_person"];?>"><img src="../images/icon_edit.png" width="20" height="20" title="Actualiza Empleado" /></a>&nbsp;
  &nbsp;</td>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=eliminar&amp;cod=<?php echo $item["Cod_person"];?>"><img src="../images/icon_delete.png" alt="" width="20" height="20" title="Eliminar Empleado" /></a></td>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=actualiza&amp;cod=<?php echo $item["Cod_person"];?>"><img src="../images/search.png" alt="" width="20" height="20" title="Ver Ficha" /></a></td>
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