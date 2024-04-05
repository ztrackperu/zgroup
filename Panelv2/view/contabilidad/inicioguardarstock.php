 <!--modal de abrir mes-->
<div class="modal fade" id="my_modalanul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="mes" name="mes" class="form-horizontal" method="post" action="?c=cont01&a=Abrirmescerrado&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Abrir el Periodo de <input name="c_mes" id="c_mes" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:28px;" readonly /> /&nbsp;&nbsp; <input name="c_anno" id="c_anno" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:100px;" readonly />
        <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"  />
        <span id="mensaje" class="label label-default"></span>   
      </div>
      
      <div class="modal-body"> 
      		<div class="form-group">      
                <label class="control-label col-xs-3" style="text-align:center;">Motivo</label>
                <div class="col-xs-8">
                	<input type="text" name="c_obsape" id="c_obsape" class="form-control input-sm"  placeholder="Motivo Abrir Periodo cerrado" data-validacion-tipo="requerido"  />               
                </div> 
      	   </div> 
       </div>
       
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Abrir Periodo</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal abrir mes-->
 
  <!--modal de procesar mes-->
<div class="modal fade" id="my_modalprocesar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="procesarmes" name="procesarmes" class="form-horizontal" method="post" action="?c=cont01&a=ProcesarStockMensual&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Procesar el Periodo de <input name="c_mes" id="c_mes" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:28px;" readonly /> /&nbsp;&nbsp; <input name="c_anno" id="c_anno" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:100px;" readonly />
        <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"  />
        <span id="mensaje" class="label label-default"></span>   
      </div>
       
       &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Procesar</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal procesar mes-->

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">CONTROL STOCK MENSUAL INSUMOS <!--(invstktdaInsumos mes anterior,notmov a invstktdaInsumos)--></div>

<table id="tabla" class="table table-hover" style="font-size:12px;">
    <thead>
    	 <tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />
          </td>
        </tr>
        <tr>
        	<th width="50" style="width:50px;">N°</th> 
            <th width="100" style="width:50px;">Mes</th>        
            <th width="200" style="width:50px;">Año</th>
            <th width="63" style="width:90px;">Usuario Proceso</th>
            <th width="55">Fecha Proceso</th> 
            <th width="55">Fecha Registro</th>          
            <th width="34">Estado</th>
            <th width="110">Procesar</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarControlMes() as $r){
			$c_anno=$r->c_anno;
			$c_mes=$r->c_mes;
			$c_estado=$r->c_estado;
			$listas=$this->model->ListarStockProcesados($c_anno,$c_mes);
			if($listas!=NULL){
				foreach($listas as $iteml){
					$IN_OPER=$iteml->IN_OPER;
					$IN_FESTK=vfecha(substr($iteml->IN_FESTK,0,10)); //FECHA FIN DE MES
					$IN_DATE=vfecha(substr($iteml->IN_DATE,0,10)); //FECHA QUE SE SACO EL REPORTE
				}
			}else{
					$IN_OPER='';
					$IN_FESTK=''; //FECHA FIN DE MES
					$IN_DATE=''; //FECHA QUE SE SACO EL REPORTE
			}
			if($c_estado=='1'){
				$estado='<font color="#009900">Procesado</font>';				
			}else if($c_estado=='2'){
				$estado='<font color="#FF0000">Cerrado</font>';				
			}else {
				$estado='<font color="#0000FF">Generado</font>';				
			}
			
			$i++;
	 ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $r->c_mes; ?></td>
          <td><?php echo $r->c_anno; ?></td>
          <td><?php echo $IN_OPER; ?></td>
          <td><?php echo $IN_FESTK; ?></td>
          <td><?php echo $IN_DATE; ?></td>
          <td><?php echo $estado; ?></td>
           
           <td>
		   		<?php  if($c_estado=='0'){ //generado?>
                	 <div class="dropdown">
                          <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                            Accion <span class="caret"></span>
                          </a> 
                          <ul class="dropdown-menu" role="menu">
                          	 <?php /*?><li><a href="?c=cont01&a=ProcesarStockMensual&c_mes=<?php echo $r->c_mes?>&c_anno=<?php echo $r->c_anno?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Procesar</a></li> <?php */?>
                          	  <li><a onclick="ProcesarStockMensual('<?php echo $r->c_mes?>','<?php echo $r->c_anno?>')">Procesar</a></li> 
                          </ul>
                      </div>          
             	<?php } else if($c_estado=='1') { //procesado ?>
                	 <div class="dropdown">
                          <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                            Accion <span class="caret"></span>
                          </a> 
                          <ul class="dropdown-menu" role="menu"> 
                             <li><a href="?c=cont01&a=ProcesarStockMensual&c_mes=<?php echo $r->c_mes?>&c_anno=<?php echo $r->c_anno?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Actualizar Proceso</a></li>
                             <li><a href="?c=cont01&a=VerStockMensual&c_mes=<?php echo $r->c_mes ?>&c_anno=<?php echo $r->c_anno ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Ver Stock Mes</a></li>
                          	 <li><a href="?c=cont01&a=CerrarMes&c_mes=<?php echo $r->c_mes ?>&c_anno=<?php echo $r->c_anno ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cerrar Mes</a></li>
                          </ul>
                      </div>          
             	<?php } else { //cerrado ?>
                	 <div class="dropdown">
                          <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                            Accion <span class="caret"></span>
                          </a> 
                          <ul class="dropdown-menu" role="menu"> 
                             <li><a href="?c=cont01&a=VerStockMensual&c_mes=<?php echo $r->c_mes ?>&c_anno=<?php echo $r->c_anno ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Ver Stock Mes</a></li>
                          	 <?php if($_GET['mod']=='1' && $r->c_obscie!='inicial'){ ?>
                             	<li><a onclick="Abrirmescerrado('<?php echo $r->c_mes ?>','<?php echo $r->c_anno ?>')">Abrir Mes</a></li>
                             <?php } ?>
                          </ul>
                      </div>          
             	<?php } ?>
            </td>
         
        </tr>
    <?php } ?>
    </tbody>
</table>
   		                
</div>

   
 <script>
   function Abrirmescerrado(c_mes,c_anno){
		$('#my_modalanul').modal('show');
		document.mes.c_mes.value=c_mes;	
		document.mes.c_anno.value=c_anno;
   }//fin Abrirmescerrado
   
    function ProcesarStockMensual(c_mes,c_anno){
		$('#my_modalprocesar').modal('show');
		document.procesarmes.c_mes.value=c_mes;	
		document.procesarmes.c_anno.value=c_anno;
  }//fin Procesarmes
  
  
	
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

