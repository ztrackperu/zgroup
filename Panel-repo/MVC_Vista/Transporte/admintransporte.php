<!--inicio cabecera-->
<!DOCTYPE html>
<html lang="es">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema Zgroup 2.0</title> 
       
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" /> 
       
	   <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script> 
       <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->  
       <script type="text/javascript" src="assets/js/jquery.min.js"></script> 
	   <script type="text/javascript" src="assets/js/mascara/jquery.maskedinput.js"></script>
		<!--Mascara extraida de http://digitalbush.com/projects/masked-input-plugin-->
</head>
<body>
<!--fin cabecera-->

<script>	
function abrirmodal(Id_servicio,c_tipmov){
	$('#my_modalelim').modal('show');	
	$('#mensaje').val(Id_servicio);	
	$('#c_tipmov').val(c_tipmov);			
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 //$('#tablaelim').load("?c=01&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=VerEliminarDetAsig",{Id_servicio:Id_servicio});	
}
function abrirmodalcerrar(Id_servicio){
	$('#my_modalcerrar').modal('show');	
	$('#mensaje3').val(Id_servicio);
}


</script>

<body> 

 <!--modal de eliminacion de servicio de transporte-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form  class="form-horizontal" method="post" action="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=EliminarTransporte" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Eliminar el Servicio de Transporte N°
        	<input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
       		<input name="c_tipmov" id="c_tipmov" type="hidden"  />
            </h4> 
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-primary" >Eliminar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal eliminacion de servicio de transporte-->  
 
 <!--modal de cerrar servicio de transporte-->
<div class="modal fade" id="my_modalcerrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form  class="form-horizontal" method="post" action="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=CerrarCabTransporte" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Cerrar el Servicio de Transporte N°
        	<input name="mensaje3" id="mensaje3" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
       		 </h4> 
        </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        	<button type="submit" class="btn btn-primary" >Cerrar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal cerrar servicio de transporte-->  
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION SERVICIO DE TRANSPORTE</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=RegTransporte">NUEVO SERVICIO DE TRANSPORTE</a>
 <form class="form-horizontal" method="post" id="frmpedidet" >

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($this->model->ListarServiciosTransporte() != NULL) {?>
    <thead>   
		<tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Servicio y/o nombre del Cliente" />
          </td>
          
        </tr>
        <tr>
            <th style="width:160px;">Nº SERVICIO / FW</th>
            <th style="width:300px;">CLIENTE</th>                    
            <th>TIPO</th>           
            <th>Nº COTIZACION</th>
            <th style="width:120px;">ESTADO</th>  
            <th style="width:120px;">FECHA SERVICIO</th>         
            <th style="width:110px;"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarServiciosTransporte() as $r):
		$Id_servicio=$r->Id_servicio;	
		$c_nomcli=utf8_encode($r->c_nomcli);
		$c_nrofw=$r->c_nrofw;	
		$c_numped=$r->c_numped;
		$d_fectran=$r->d_fectran;
		$c_tipmov=$r->c_tipmov;	
		if($c_tipmov=='I'){
			$tipmov='<font color="#1C91F0">Importacion</font>';
			$doc=$Id_servicio.' / '.$c_nrofw;
		}else if($c_tipmov=='E'){
			$tipmov='<font color="#009900">Exportacion</font>';
			$doc=$Id_servicio.' / '.$c_nrofw;
		}else if($c_tipmov=='L'){
			$tipmov='<font color="#330066">Local</font>';
			$doc=$Id_servicio.' / '.'S/F';			
		}	
		//ver si tiene DETALLE
		$ListarDetServicio=$this->model->ListarDetServicioImpoExpoLoc($Id_servicio,$c_tipmov); //NECESITA FOREACH PARA CAPTURAR DATOS	
		if($ListarDetServicio!=NULL){
				$estado=1;
				foreach($ListarDetServicio as $itemdetservicio){
					$c_estadotot=$itemdetservicio->c_estado;
					if($c_estadotot!=2){
						$estado=0;	
					}					
					//$cant=$cant+$n_impogastot;					
				}
				if($estado==1){
				$cerrar='si';//se puede cerrar detalle					
				}else{
				$cerrar='no';	
				}
			}
		
		//fin ver si tiene DETALLE
		$c_estado=$r->c_estado;	
		if($ListarDetServicio==NULL){
			$estado='<font color="#009900">Generado</font>';
		}else if($c_estado=='1'){
			$estado='<font color="#0000FF">En Proceso</font>';
		}else if($c_estado=='2'){ //otro estado menos 0 que es eliminado
			$estado='<font color="#FF0000">Cerrado</font>';
		}		
							
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $doc; ?></td>          
          <td><?php echo $c_nomcli;?></td>
          <td><?php echo $tipmov;?> </td>
          <td><?php echo $c_numped;?> </td>
          <td><?php echo $estado;?> </td>
          <td><?php echo vfecha(substr($d_fectran,0,10)); ?></td>
                   
       	  <td colspan="2"> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">    
				   <?php if($c_estado!='2'){ //si no esta cerrado ?>              	   
                         <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=UpdCabeceraTransporte&Id_servicio=<?php echo $Id_servicio; ?>">Editar</a></li>    
                         <?php if($ListarDetServicio==NULL){ ?>                
                            <li><a onClick="abrirmodal('<?php echo $Id_servicio ?>','<?php echo $r->c_tipmov ?>')" >Eliminar</a></li> 
                            <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=RegDetTransporte&Id_servicio=<?php echo $Id_servicio?>" >Registrar Detalle</a></li> 
                          <br>
                          <?php }else{ ?>
                            <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=AdminDetTransporte&Id_servicio=<?php echo $Id_servicio; ?>&c_tipmov=<?php echo $r->c_tipmov; ?>">Ver Detalle</a></li> 
                          <br>             
                        <?php } if($cerrar=='si'){ ?> 
                            <li><a onClick="abrirmodalcerrar('<?php echo $Id_servicio ?>')">Cerrar Servicio <?php echo $Id_servicio; ?> </a></li> 
                        <?php } ?> 
                 <?php }else{//fin //si no esta cerrado ?> 
                	 <li><a href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=AdminDetTransporte&Id_servicio=<?php echo $Id_servicio; ?>&c_tipmov=<?php echo $r->c_tipmov; ?>">Ver Detalle</a></li> 
                 <?php } ?> 
                 <!--<li><a href="#">Imprimir</a></li>-->                                                
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>

<ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
    </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
  </ul>
   		 </nav>               
    	</div>

<script>

document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tablas", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    }
</script>

<!--inicio footer-->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/ini.js"></script>
        <script src="assets/js/jquery.anexsoft-validator.js"></script>
        <script src="assets/js/js-render.js"></script>
        <script src="assets/js/jquery.anexgrid.min.js"></script>
    </body>
</html>
<!--fin footer-->