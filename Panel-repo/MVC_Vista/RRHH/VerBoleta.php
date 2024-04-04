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
		//alert('hola');
	}
function enviar2(){
			des=document.getElementById("des").value;
		udni=document.getElementById("dni").value;
	 	//location.href="../MVC_Controlador/cajaC.php?acc=verprov2&des="+des+"+&"udni="+udni;
		//alert('hola');
	}
	
	

</script>

<script type="text/javascript">
function marcar(source)
{
checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
{
if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
{
checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
}
}
}
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=verselbole&an=<? echo  $_GET['an']?>&me=<? echo $_GET['me']?>&em=<? echo $_GET['em']?>"     >

<div class="onecolumn"  >
<div class="header">LISTAR</div>
<br class="clear"/>
                    <div class="content">
                      <table class="data" width="764" cellpadding="0" cellspacing="0" bordercolor="#000000">
                            <thead>
                                <tr>
                                  <th colspan="5" style="width:5%">NOMBRE
<label for="textfield"></label>
                                  <input name="des" type="text" id="des"  size="50" />
                                  <input type="submit" name="buscar" id="buscar" value="FILTRAR" onclick="enviar2()" />
                                  
                                  
                                  
                                  </th>
                                </tr>
                                <tr>
                                    <th width="17%">DNI</th>
                                    <th width="61%"><p>NOMBRE COMPLETO</p></th>
                                  <th width="5%" align="center" >Seleccionar<input name="todo"  id="todo" type="checkbox" value="" onclick="marcar(this);" /></th>
                                  <th width="8%" >Imprimir</th>
                                  <th width="9%" >Ver Ficha</th>
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
                                    <td><?php echo $item["Dni"];?></td>
                                  <td bgcolor="#E5E5E5"><?php echo $item["nombre"];?> &nbsp;</td>
                                  <td align="center" bgcolor="#FFFFCC">
                                  
                                
                                   <input name="<?php  echo 're'.$i ?>" type="checkbox"  id="<?php echo 're'.$i ?>"  value="<?php echo $item["userid"]; ?>" />
                                   
                                   </td>
                                  <td align="center" bgcolor="#FFFFCC">&nbsp;</td><?php  $a=$item["anno"];$m=$item["mes"];$e=$item["empresa"];$u=$item["userid"];$est=$item['estado'];?>
                                  <td align="center" bgcolor="#FFFFCC"><a href="../MVC_Controlador/rrhhC.php?acc=bole&an=<? echo  $a?>&me=<? echo $m?>&em=<? echo $e?>&us=<? echo $u?>&es=<? echo $est?>"><img src="../images/search.png" alt="" width="20" height="20" title="Ver Ficha" /></a></td>
                                </tr>
                                <?php
                        $i += 1;
                    }}
            ?>
                            </tbody>
                        </table>
            <br /> 
            
            <center>
              <p><!--VER TODAS LAS FICHAS --><a href="../MVC_Controlador/rrhhC.php?acc=todobole&an=<? echo  $a?>&me=<? echo $m?>&em=<? echo $e?>&es=<? echo $est?>"><!--<img src="../images/search.png" alt="" width="20" height="20" title="Ver Ficha" />--></a>               
                </p>
               
                <input  type="submit" name="button" id="button" value="Enviar" />
              
      
                
       </center>         
                      
    <div id="chart_wrapper" class="chart_wrapper"></div>
                        <div class="pagination"> <a href="#">«</a> <a href="#" class="active">1</a> <a href="#">»</a></div>
  </div>
</div>
</form>
</body>
</html>