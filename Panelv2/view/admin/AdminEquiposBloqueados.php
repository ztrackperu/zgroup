 <script>
 function abrirmodalElim(c_idequipo){
	document.getElementById('c_idequipo').value=c_idequipo; 
	$('#my_modalelim').modal('show');	
 }
 </script>
 
<!--modal de desbloquear equipo-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="" class="form-horizontal" method="post" action="?c=adm01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=DesbloEqui" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Desbloquear el Equipo <input name="c_idequipo" id="c_idequipo" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <span id="mensaje" class="label label-default"></span>   
      </div>
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      <!--<div class="modal-body"> 
      		<div class="form-group"> 
            	<input name="serie" id="serie" type="hidden"  />       
                <label class="control-label col-xs-3" style="text-align:center;">Motivo de Eliminacion del Equipo</label>
                <div class="col-xs-4">
                 	<textarea name="c_motivoelim" id="c_motivoelim" rows="3" cols="20" data-validacion-tipo="requerido" ></textarea>               
                </div>    
             <label class="control-label col-xs-3"></label>
      	   </div>   	
      </div>-->
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Desbloquear</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal desbloquear equipo--> 

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">VER EQUIPOS BLOQUEADOS (EN ASIGNACION - GUIAS) </div>
</div>

 <form class="form-horizontal" method="post" action="#" id="frmEir" name="frmEir">

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($this->model->Listarequibloque() != NULL) {?>
    <thead>   
		<tr>
          <td colspan="8">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese SERIE" />
          </td>
          
        </tr>
        <tr>
            <th style="width:90px;">Nº </th>
          <th style="width:150px;">ID EQUIPO</th>        
          <th style="width:150px;">SERIE EQUIPO</th>
            <th>CODSIT </th>            
            <th>CODSITALM</th>     
          	<th style="width:150px;">COTI TEMPORAL</th>
            <th style="width:150px;">FECHA BLOQUEO</th>
            <th style="width:110px;"></th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->Listarequibloque() as $r):
		$c_idequipo=$r->c_idequipo;		
		$c_nserie=$r->c_nserie; 
		$c_codsit=$r->c_codsit;
		if($c_codsit=='1'){
			$tipo='<font color="#006600">INGRESO</font>';
		}else{
			$tipo='<font color="#FF0000"> SALIDA</font>';
		}
		$c_codsitalm=$r->c_codsitalm;		
		$c_temcot=$r->c_temcot;
		$c_temfec=$r->c_temfec;	
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $i; ?> </td>
          <td><?php echo $c_idequipo; ?></td>
          <td><?php echo $c_nserie; ?> </td>
          <td><?php echo $c_codsit; ?> </td>          
          <td><?php echo $c_codsitalm;  ?></td>
          <td><?php echo $c_temcot;  ?></td> 
          <td><?php echo vfecha(substr($c_temfec,0,10)); ?></td>       
       	  <td>              	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">              	   
                 <li> <a onClick="abrirmodalElim('<?php echo $r->c_idequipo; ?>')">Desbloquear</a></li>            
                 <?php /*?><li><a onClick="abrirmodal('<?php echo $IdAsig ?>','<?php echo $c_numped ?>')" >Eliminar</a></li>
                 <li><a href="#">Imprimir</a></li> <?php */?>                 
              </ul>
            </div>          
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>
<!--
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
  </ul>-->
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
