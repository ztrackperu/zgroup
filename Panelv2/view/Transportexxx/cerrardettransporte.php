<script>

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});

function abrirmodalcerrarDetalle(Id_servicio,c_tipmov,n_item){
	$('#my_modalcerrarDetServicio').modal('show');	
	$('#mensaje3').val(Id_servicio);	
	$('#c_tipmov3').val(c_tipmov);	
	$('#n_item3').val(n_item); 
}
	
</script>

<body> 
 
  <!--modal de cerrar detalle servicio-->
<div class="modal fade" id="my_modalcerrarDetServicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-cerrarDetServicio" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=CerrarDetTransporteVarios" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Cerrar el Item <input name="n_item3" id="n_item3" type="text" style="border: 0px solid #A8A8A8;width:20px;" readonly />  del Serv. de Transporte
        	<input name="mensaje3" id="mensaje3" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
            <input name="c_tipmov3" id="c_tipmov3" type="hidden"  />
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>" >
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

 <!--fin modal cerrar detalle servicio-->
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE DETALLES DE SERVICIO QUE SE PUEDEN CERRAR</div>
</div>
 &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>">VOLVER</a>
 <form class="form-horizontal" method="post" id="frmpedidet" >

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($ListarDetServicio != NULL) {?>
    <thead>   
		<tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Servicio y/o nombre del Cliente" />
          </td>
          
        </tr>
        <tr>
        	<th>Servicio & Nº FW & Coti</th>    
            <th style="width:100px;">Nº ITEM</th>
            <th style="width:300px;">CLIENTE</th>               
            <th>EQUIPO</th>
            <th style="width:150px;">ESTADO</th>  
            <th style="width:150px;">FECHA SERVICIO</th>  
            <th style="width:110px;">Cerrar</th>       
            <th style="width:110px;">Ver</th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($ListarDetServicio as $r):
		$n_item=$r->n_item;	
		$c_nomcli=utf8_encode($r->c_nomcli);
		$doc=$r->c_nrofw;
		if($doc==''){
		 $doc=$r->c_numped;	
		}
		$c_numequipo=$r->c_numequipo;
		$d_fectran=$r->d_fectran;	
		//////ver si tiene cabecera de viaticos, si no la tiene para registrarla
		$Id_servicio=$r->Id_servicio;	
		$viatico=$this->model->ValidarViaticos($Id_servicio,$n_item);// no necesita foreach
		$Id_viatico=$viatico->Id_viatico;
		/////fin  ver si tiene cabecera de viaticos		
		///estado 
			//saber si hay item sin liquidar
			$detviatico=$this->model->ListarDetViaticos($Id_servicio,$n_item);//necesita forech
			if($detviatico!=NULL){
				$cant=1;
				foreach($detviatico as $itemdetviatico){
					$n_impogastot=$itemdetviatico->n_impogastot;
					if($n_impogastot==0){
						$cant=0;	
					}					
					//$cant=$cant+$n_impogastot;					
				}
				if($cant==1){
				$estado='<font color="#FF0000">Viaticos liquidados</font>';	//viaticos con liquidacion
				$cerrar='si';//se puede cerrar detalle					
				}else{
				$estado='<font color="#0000FF">Viaticos Pendientes</font>';
				$cerrar='no';
				}
			}else{
				$estado='<font color="#009900">Generado</font>'; //sin viaticos
				$cerrar='si';//se puede cerrar detalle
			}
			//fin
				
		//fin estado 						
		$i=$i+1;
		if($cerrar=='si'){
	?>
        <tr>
          <td><?php echo $Id_servicio.' & '.$doc;?> </td>	
          <td><?php echo $n_item; ?></td>          
          <td><?php echo $c_nomcli;?></td>         
          <td><?php echo $c_numequipo;?> </td>
          <td><?php echo $estado;?> </td>
          <td><?php echo vfecha(substr($d_fectran,0,10)); ?></td>
          <td><input type="checkbox" id="chkcerrar" name="chkcerrar" value="<?php $Id_servicio; ?>" onClick="abrirmodalcerrarDetalle('<?php echo $Id_servicio ?>','<?php echo $r->c_tipmov ?>','<?php echo $n_item ?>')"></td>         
       	  <td> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">   
               	   <?php /*?><li><a onClick="abrirmodalcerrarDetalle('<?php echo $Id_servicio ?>','<?php echo $r->c_tipmov ?>','<?php echo $n_item ?>')">Cerrar Servicio <?php echo $n_item; ?> </a></li> <?php */?>
                   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ImprimirDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Imprimir Detalle</a></li> 
                   <li><a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ImprimirDetViatico&Id_viatico=<?php echo $Id_viatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $r->n_item; ?>">Imprimir Viaticos</a></li>              
              </ul>
            </div>          
           </td>
        </tr>
    <?php } endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>

   		               
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

