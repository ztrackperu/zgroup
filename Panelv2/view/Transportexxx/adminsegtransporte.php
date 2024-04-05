<script>

$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});	

function abrirmodal(n_segui){
	$('#my_modalelim').modal('show');	
	$('#n_segui').val(n_segui);		
	/*$('#Id_servicio').val(Id_servicio);	
	$('#n_item').val(n_item);
	$('#c_tipmov').val(c_tipmov);*/
}
	
</script>

<body> 

 <!--modal de eliminacion de viaticos-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarSeguimiento" >
       
       <div class="modal-header">      
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
       <h5 class="modal-title">Mensaje del Sistema</h5>             
      </div>
      
        <div class="modal-body" id="exampleModalLabel"> 
        	 <h4 class="modal-title" id="exampleModalLabel">        
			¿Seguro de Eliminar el Seguim. <input name="n_segui" id="n_segui" type="text" style="border: 0px solid #A8A8A8;width:20px;text-align:center;" readonly />  del Serv. Transporte
        	<input name="Id_servicio" id="Id_servicio" type="text" style="border: 0px solid #A8A8A8;width:95px;" value="<?php echo $Id_servicio ?>" readonly />?
            <input name="n_item" id="n_item" type="hidden" value="<?php echo $n_item ?>"  /> 
            <input name="login" id="login" type="hidden" value="<?php echo $login ?>"  />
            <!--para volver-->
            <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"  />
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

 <!--fin modal eliminacion-->
 
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION DE SEGUIMIENTO DEL SERV. TRANSP. N° <?php echo $Id_servicio?></div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegSegDetTransporte&c_tipmov=<?php echo $c_tipmov; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">NUEVO SEGUIMIENTO</a>
  &nbsp;&nbsp;<?php /*?><a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>">LIQUIDAR</a><?php */?>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminDetTransporte&Id_servicio=<?php echo $Id_servicio?>">VOLVER</a>
 <form class="form-horizontal" method="post" id="frmpedidet" >

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($ListarSegDetTransporte != NULL) {?>
    <thead>   
		<tr>
          <td colspan="6">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Viatico y/o nombre del Cliente" />
          </td>
          
        </tr>
        <tr>
        	<th>NºSERVICIO/N° ITEM</th>    
            <th>Nº SEG.</th>
            <th>CHOFER</th> 
            <th>FECHA</th>   
            <th>OBSERVACION SEGUIMIENTO</th>         
            <th colspan="2" style="width:110px;"></th>            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($ListarSegDetTransporte as $r):
		$i++;
		$n_item=$r->n_item;	
		$c_chofersalida=utf8_encode($r->c_chofersalida);
		$n_segui=$r->n_segui;	
		$c_rucempresa=$r->c_rucempresa;
		$d_fecseg=$r->d_fecseg;
	?>
        <tr>
          <td><?php echo $Id_servicio.' / '.$n_item;?> </td>	
          <td><?php echo $n_segui; ?></td>          
          <td><?php echo $c_chofersalida;?> </td>
          <td><?php echo vfecha(substr($d_fecseg,0,10)); ?></td>
          <td><?php echo utf8_encode($r->c_obsviaje); ?></td>         
       	  <td colspan="2"> 
             	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
                <ul class="dropdown-menu" role="menu">	          	               	   
                  <!--<li><a href="#">Imprimir</a></li>-->
                 <?php /*?> <li><a onClick="abrirmodal('<?php echo $Id_servicio ?>','<?php echo $n_item ?>','<?php echo $c_tipmov ?>','<?php echo $n_segui ?>')" >Eliminar</a></li><?php */?>  
               	  <li><a onClick="abrirmodal('<?php echo $n_segui ?>')" >Eliminar</a></li>
               </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{
		echo "<br>ESTE DETALLE DE SERVICIO TRANSPORTE NO TIENE SEGUIMIENTOS DE VIAJE.";
	} ?>
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

