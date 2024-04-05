<!--modal de actualizar estado almacen-->
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
	  var res = data_id.split("|");
    }

    $('#codrod').val(res[0]);
	$('#nomprod').val(res[1]);//
	$('#estadoanterior').val(res[2]);//



  })
});

</script>


<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm_eliminarEquipo" name="frm_eliminarEquipo" class="form-horizontal" method="post" action="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarEquipoTemporal" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>
      
      <!--<div class="alert alert-warning">
        Seguro de Eliminar el Equipo Temporal <input name="serie" id="serie" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <span id="mensaje" class="label label-default"></span> c_motivoelim    
      </div>-->
      <div class="modal-body"> 
      		<div class="form-group"> 
            	<input name="serie" id="serie" type="hidden"  />       
                <label class="control-label col-xs-3" style="text-align:center;">Motivo de Eliminacion del Equipo</label>
                <div class="col-xs-4">
                 	<textarea name="c_motivoelim" id="c_motivoelim" rows="3" cols="20" data-validacion-tipo="requerido" ></textarea>               
                </div>    
             <label class="control-label col-xs-3"></label>
      	   </div>   	
      </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Eliminar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal eliminacion de Equipo Temporal-->
 
 <!--modal de ver motivo eliminacion de Equipo Temporal-->
<div class="modal fade" id="my_motielim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
  
    <div class="modal-content">  
        
       <form id="frm_motivo" name="frm_motivo" class="form-horizontal" method="post" action="#" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>
      <div class="modal-body"> 
      		<div class="form-group">       
                <label class="control-label col-xs-3" style="text-align:center;">Motivo de Eliminacion del Equipo</label>
                <div class="col-xs-4">
                 	<textarea name="c_motivo" id="c_motivo" rows="3" cols="30" ></textarea>               
                </div>  
      	   </div>   	
      </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>       
        </div>
        </form>
      </div>
    </div>
  </div>

 <!--fin modal motivo eliminacion-->

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">MANTENIMIENTO EQUIPOS TEMPORALES</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=BuscarRegEquipo">BUSCAR EQUIPO A REGISTRAR ó ACTUALIZAR</a>

<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>
    	 <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
          </td>
        </tr>
        <tr>
            <th style="width:100px;">Id Equipo</th>        
            <th style="width:300px;">Descripcion</th> 
            <th>Dcto Ingreso</th>          
            <th>Fecha Ingreso</th>
            <th style="width:120px;">N° Dua</th> 
            <th style="width:100px;">Estado</th>
            <th style="width:150px;">Estado Almacen</th>           
            <th style="width:110px;"></th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		foreach($this->maestroinv->ListarEquiposTemporal() as $r):
			//$r->c_nacional;
			//if($r->c_nacional=='0' || $r->c_nacional==''){$nac='NO';}else{$nac='SI';}
			
			$c_numeoc=$r->c_numeoc;
			$c_nronis=$r->c_nronis;	
			
		    if($r->c_codsit!=''){							
				if($r->c_codsit=='TE'){
					$ListarOcEquipo=$this->maestroinv->ListarOcEquipo($r->c_nserie);	//EQUIPOS QUE TIENEN O/C
					if($ListarOcEquipo!=NULL){
						$docing='<font color="#FF0000">Regularizar EIR por O/C</font>';
						$evalua='0';
					}else{
						$docing='<font color="#FF0000">Registro Temporal</font>';
						$evalua='1';
					}
				}else if($c_numeoc==''){
					$docing=$c_nronis;
				}else if($c_nronis==''){
					$docing=$c_numeoc;
				} 
			}else{
				$docing='<font color="#FF0000">-</font>';				
			}
				
				$d_fecingx=$r->d_fecing;
				if($d_fecingx!=""){
					$d_fecing=vfecha(substr($d_fecingx,0,10));
				}
			
	 ?>
        <tr>
          <td><?php echo $r->c_idequipo; ?></td>
          <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php echo $docing; ?></td>
          <td><?php echo $d_fecing; ?></td>
          <td><?php echo $r->c_refnaci; ?></td>            
          <td><?php echo $r->c_codsit; ?></td>
          <td><?php echo $r->c_codsitalm; ?></td>           
            <td>    
            	<?php 
					 if($r->c_codsit=='TE'){
						 
				?>            
                <div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    Accion <span class="caret"></span>
                  </a>                    
                      <ul class="dropdown-menu" role="menu">                     
                             <li> <a href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerDetalleRegUpd&cadena1=<?php echo $r->c_nserie; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>">Editar</a></li> 
                             <li> <a href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=tomarfoto&c_nserie=<?php echo $r->c_nserie; ?>&amp;reg=inv01">Tomar Foto</a></li>   
                             <?php 
                                if($evalua=='0'){
                              ?> 
                              <li> <a href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegEirEntradaReguOc&serie=<?php echo $r->c_nserie; ?>">Regularizar O/C</a></li> <!--funcion se encuentra en procesoseir.controller.php-->
                              <?php 
                                }else if($evalua=='1'){
                              ?>
                              <li> <a  onClick="EliminarEquipoTemporal('<?php echo $r->c_nserie; ?>')">Eliminar Equipo</a></li> 
                              <?php 
                                }
                              ?>         
                             <li><a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ImprimirEquipo&id=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>" >Imprimir</a></li>    
                      </ul>  
                                        
                </div>  
                <?php }else{ ?>
						<a  onClick="modalmotielim('<?php echo $r->c_motivoelim ?>')"><font color="#FF0000">Eliminado</font></a>						
				<?php } ?>   
                       
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
   		                
</div>

   
  <script> 
  function modalmotielim(c_motivo){
	$('#my_motielim').modal('show'); 
	frm_motivo.c_motivo.value=c_motivo;	 
  }//fin modalmotielim
  
  function EliminarEquipoTemporal(serie){
		$('#my_modalelim').modal('show');
		document.getElementById('serie').value=serie;	
	}//fin EliminarEquipoTemporal	
	
  $(document).ready(function(){
        $("#frm_eliminarEquipo").submit(function(){
            return $(this).validate();
        });
    })
	
	

    document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tabla", this.value);
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

