<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista Ordenes Trabajo</title>
</head>

<body>

<div class="panel panel-primary ">
  <!--  -->
  <div class="panel-heading">ADMINISTRACION ORDENES TRABAJO</div>
</div>
<form class="form-horizontal" method="post" id="frmot" name="frmot" action="?c=02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListarOT">
<table width="640" class="table table-hover" id="tabla" style="font-size:12px">
    <?php if($verFiltroOT != NULL) {?>
    <thead>
		<tr>
          <td colspan="4">
            <input id="buscar" name="buscar" size="45" type="text" class="form-control" placeholder="Ingrese Numero Orden y/o Proveedor" value="<?php echo $buscar; ?>" />
          </td>
          <td><button type="submit" class="btn btn-primary" >Buscar</button>
          &nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php /*?><a class="btn btn-info" href="indexa.php?c=02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a><?php */?></td>
          
        </tr>
        <tr>
            <th width="99" style="width:100px;">Nro</th>
            <th width="93" style="width:400px;">Trabajo</th>
            <th width="50"style="width:200px;">Equipo</th>
            <th width="50"style="width:200px;">Proveedor</th>
            <th width="50" style="width:200px;">Encargado</th>
            <th width="49" style="width:20px;">Fecha</th>
            <th width="59" style="width:10px;">Estado</th>
            <th width="138" style="width:160px;">Accion</th>
        </tr>
    </thead>
    <tbody>
    
    <?php  	
	$user=$login; 
	//$descrip=NULL;
	//foreach($this->model->ListarOTM($descrip) as $r): 
	$i=0;
		foreach($verFiltroOT as $r): //cabguia as c,detguia
	?>
        <tr>
            <td><?php echo $r->c_numot?></td>
            <td><?php echo utf8_encode($r->c_treal); ?></td>
            <td><?php echo $r->unidad?></td>
            <td><?php echo utf8_encode($r->c_nomprov); ?></td>
            <td><?php echo mb_strtoupper($r->c_tecnico); ?><!--</a>--></td>
            <td><?php  echo vfecha(substr(($r->d_fecdcto),0,10)); ?></td>
            <td>
           
            
            
            </td>
            
            <td>
<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Accion <span class="caret"></span>
  </a> 
	 <ul class="dropdown-menu" role="menu">
              	  <li> 
                  
                  <a href="?c=02&ot=<?php echo $r->c_numot ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerUpdateOT" >Actualizar</a>
                  
                  <a href="?c=02&ot=<?php echo $r->c_numot ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerUpdateOT" >Aprobar</a>
                  
                  <a href="?c=02&ot=<?php echo $r->c_numot ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerUpdateOT" >Orden de Pago</a>
                  
                  
                  	<a href="?c=02&ot=<?php echo $r->c_numot ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ImprimeOrdenTrabajo" >Imprimir</a>
                  </li>
                  	
                  </ul>
</div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
        <?php } else{ ?>
    <center>
        <div class="alert alert-danger">
          <strong>ERROR!</strong> NO SE ENCONTRO INFORMACION INGRESADA      
        </div>
        <button type="submit" class="btn btn-primary" >NUEVA BUSQUEDA</button> 
	</center>
    <?php } ?>
</table>
</form>
</div>
</body>
</html>