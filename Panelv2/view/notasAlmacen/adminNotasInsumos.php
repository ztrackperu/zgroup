 <!--modal de anulacion de NOTA INGRESO-->
<div class="modal fade" id="my_modalanul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="anulnotaingreso" name="anulnotaingreso" class="form-horizontal" method="post" action="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularNotaIngreso" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Anular la nota de Ingreso <input name="NT_NDOC" id="NT_NDOC" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input type="hidden" name="NT_NOC" id="NT_NOC"  />
        <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"  />
        <span id="mensaje" class="label label-default"></span>   
      </div>
      
      <div class="modal-body"> 
      		<div class="form-group">      
                <label class="control-label col-xs-3" style="text-align:center;">Motivo</label>
                <div class="col-xs-8">
                	<input type="text" name="motivo" id="motivo" class="form-control input-sm"  placeholder="Motivo Eliminacion" data-validacion-tipo="requerido"  />               
                </div> 
      	   </div> 
       </div>
       
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Anular</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal anulacion de NOTA INGRESO-->
 
  <!--modal de anulacion de NOTA SALIDA-->
<div class="modal fade" id="my_modalanulNS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="anulnotasalida" name="anulnotasalida" class="form-horizontal" method="post" action="?c=not02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularNotaSalida" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Anular la nota de Salida <input name="NT_NDOC2" id="NT_NDOC2" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input type="hidden" name="NT_NOC2" id="NT_NOC2"  />
        <input type="hidden" name="login2" id="login2" value="<?php echo $login; ?>"  />
        <span id="mensaje" class="label label-default"></span>   
      </div>
      
      <div class="modal-body"> 
      		<div class="form-group">      
                <label class="control-label col-xs-3" style="text-align:center;">Motivo</label>
                <div class="col-xs-8">
                	<input type="text" name="motivo2" id="motivo2" class="form-control input-sm"  placeholder="Motivo Eliminacion" data-validacion-tipo="requerido"  />               
                </div> 
      	   </div> 
       </div>
      
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Anular</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal anulacion de NOTA SALIDA-->

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTADO DE NOTAS DE SALIDA/INGRESO DEL AÑO <?php echo date('Y') ?> </div>

<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>
    	 <tr>
          <td colspan="10">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
          </td>
        </tr>
        <tr>
        	<th style="width:50px;">N°</th> 
            <th style="width:100px;">Fecha</th>
            <th style="width:25px;">T/M</th> 
            <th style="width:25px;">T/D</th>
            <th style="width:50px;">Numero</th>           
            <th style="width:50px;">Remision</th>
            <th style="width:50px;">O/Compra</th>
            <th style="width:50px;">Cod/Rem</th>
            <th style="width:50px;">Usuario</th>
            <th style="width:80px;">Eliminar</th>
            <th style="width:80px;">Imprimir</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarNotasInsumos() as $r){
			$d_fecregx=$r->NT_FDOC;
			$d_fecreg=vfecha(substr($d_fecregx,0,10));
			
			$c_mes=date("m", strtotime($d_fecregx)); //mes
			$c_anno=date("Y", strtotime($d_fecregx)); //anno			
			$i++;
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $d_fecreg; ?></td>
          <td><?php echo $r->NT_TRAN; ?></td>            
          <td><?php echo $r->NT_TDOC; ?></td>
          <td><?php echo utf8_encode($r->NT_NDOC); ?></td> 
          <td><?php echo utf8_encode($r->NT_REMI); ?></td>
          <td><?php echo $r->NT_NOC; ?></td>
          <td><?php echo $r->NT_CCLI; ?></td>          
          <td><?php echo $r->NT_OPER; ?></td>
          <td style="width:50px;">          
          	<?php
			$ValidarMesnoCerrado=$this->model->ValidarControlMesCerrado($c_anno,$c_mes); //c_estado<>'2'
			//$ValidarMesnoCerrado!=NULL &&
				if( ($r->NT_TDOC=='I' && utf8_encode($r->NT_TREM)!='@' || $r->NT_TDOC=='S') ){			
			?> 
                <div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    Accion <span class="caret"></span>
                  </a> 
                  <ul class="dropdown-menu" role="menu"> 
                     <?php if($r->NT_TDOC=='I' && (utf8_encode($r->NT_TREM)!='@')){ ?>                  
                    <?php /*?> <li><a  href="?c=not02&a=An4ularNotaIngreso&IN_CODI=<?php echo $r->IN_CODI?>&NT_NDOC=<?php echo $r->NT_NOC?>&NT_NOC=<?php echo $r->NT_NOC?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Anular Nota Ingreso</a></li><?php */?>
                    <li><a onClick="AnularNotaIngreso('<?php echo $r->NT_NDOC?>','<?php echo $r->NT_NOC?>')" >Anular Nota Ing.</a></li>
                     <?php } ?> 
                     <?php if($r->NT_TDOC=='S'){ ?> 
                     <li><a onClick="AnularNotaSalida('<?php echo $r->NT_NDOC?>','<?php echo $r->NT_NOC?>')" >Anular Nota Sal.</a></li>
                     <?php } ?>
                  </ul>
                </div>
            <?php } ?>             
          </td>          
          <td>
          		<div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    Imprimir <span class="caret"></span>
                  </a> 
                  <ul class="dropdown-menu" role="menu">
                  	 <li><a  href="?c=not02&a=imprimirticket&NT_NDOC=<?php echo $r->NT_NDOC?>&NT_TDOC=<?php echo $r->NT_TDOC?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Ticket</a></li>
                     <li><a  href="?c=not02&a=imprimirNotaSalida&NT_NDOC=<?php echo $r->NT_NDOC?>&NT_TDOC=<?php echo $r->NT_TDOC?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Estandar</a></li>
                  </ul>
                </div>
           </td>
          
        </tr>
    <?php } ?>
    </tbody>
</table>
   		                
</div>

   
  <script>
   function AnularNotaIngreso(NT_NDOC,NT_NOC){
		$('#my_modalanul').modal('show');
		document.getElementById('NT_NOC').value=NT_NOC;	
		document.getElementById('NT_NDOC').value=NT_NDOC;
  }//fin AnularNotaIngreso
   
   function AnularNotaSalida(NT_NDOC,NT_NOC){
		$('#my_modalanulNS').modal('show');
		document.getElementById('NT_NOC2').value=NT_NOC;	
		document.getElementById('NT_NDOC2').value=NT_NDOC;
  }//fin AnularNotaSalida
   	
	
  $(document).ready(function(){
        $("#anulnotaingreso").submit(function(){
            return $(this).validate();
        });
    })
	
	$(document).ready(function(){
        $("#anulnotasalida").submit(function(){
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

