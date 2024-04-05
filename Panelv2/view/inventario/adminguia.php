
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script type="text/javascript">
 $(document).ready(function(){
	function AnularGuia(c_numguia){
	$('#my_modalanul').modal('show');
		document.getElementById('c_numguia1').value=c_numguia;	
	}//fin AnularGuia	
	
 function AnularGuiaTransporteNoregistrada(){
	$('#my_modalelimguiatnd').modal('show'); 
}

 function EliminarGuiaNoregistrada(){
	$('#my_modalelimguiand').modal('show'); 
}

 function EliminarGuia(c_numguia){
		$('#my_modalelim').modal('show');
		document.getElementById('c_numguia').value=c_numguia;	
	}//fin EliminarGuia
	
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
	
	$("#frm_anularguianoregistrada").submit(function(){
            return $(this).validate();
    });
	
	$("#frm_anularguiatransporte").submit(function(){
            return $(this).validate();
    });
	
})
</script>
<!--modal de eliminacion de Guia transporte no registrada-->
<div class="modal fade" id="my_modalelimguiatnd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <form id="frm_anularguiatransporte" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularGuiaTransporteNoregistrada" >
                <div class="modal-header">      
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"><b> ANULACION DE GUIA TRANSPORTE NO REGISTRADA</b> </h5>
                </div>      
                <div class="modal-body"> 
                    <div class="form-group">      
                        <label class="control-label col-xs-3" style="text-align:center;">Ingrese Serie</label>
                        <div class="col-xs-2">
                            <input type="text" name="serie" id="serie" class="form-control input-sm"  placeholder="Serie" maxlength="3" onblur="ponerCeros(this,3)" onkeypress="return isNumberKey(event)" data-validacion-tipo="requerido"  />               
                        </div>    
                            <label class="control-label col-xs-3" style="text-align:center;">Ingrese Nº Guia</label>
                        <div class="col-xs-3">
                            <input type="text" name="c_numeguia" id="c_numeguia" class="form-control input-sm" placeholder="Numero" onblur="ponerCeros(this,7)" onkeypress="return isNumberKey(event)" data-validacion-tipo="requerido"  />               
                        </div> 
                    </div> 
                    <div class="form-group">      
                        <label class="control-label col-xs-2" style="text-align:center;">Fecha</label>
                        <div class="col-xs-3">
                            <input type="text" name="d_fecguia" id="d_fecguia" class="form-control input-sm" placeholder="Fecha Anulacion" data-validacion-tipo="requerido"   />               
                        </div>    
                            <label class="control-label col-xs-2" style="text-align:center;">Motivo</label>
                        <div class="col-xs-4">
                            <input type="text" name="c_glosa" id="c_glosa" class="form-control input-sm" placeholder="Motivo Anulacion" data-validacion-tipo="requerido" maxlength="50" />               
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-xs-10" >Msje: El sistema validara que la informacion sea correcta.</label>
                        <label class="control-label col-xs-10" style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>	
                    </div>   	
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" >Anular</button>        
                </div>
            </form>
        </div>
    </div>
</div>
 <!--fin modal eliminacion de Guia transporte no registrada-->
<!--modal de eliminacion de Guia no registrada-->
<div class="modal fade" id="my_modalelimguiand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm_anularguianoregistrada" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarGuiaNoregistrada" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"><b> ANULACION DE GUIA NO REGISTRADA</b> </h5>
      </div>      
      <div class="modal-body"> 
      		<div class="form-group">      
                <label class="control-label col-xs-3" style="text-align:center;">Ingrese Serie</label>
                <div class="col-xs-2">
                	<input type="text" name="serie" id="serie" class="form-control input-sm"  placeholder="Serie" maxlength="3" onblur="ponerCeros(this,3)" onkeypress="return isNumberKey(event)" data-validacion-tipo="requerido"  />               
                </div>    
                <label class="control-label col-xs-3" style="text-align:center;">Ingrese Nº Guia</label>
                <div class="col-xs-3">
                	<input type="text" name="c_numeguia" id="c_numeguia" class="form-control input-sm" placeholder="Numero" onblur="ponerCeros(this,7)" onkeypress="return isNumberKey(event)" data-validacion-tipo="requerido"  />               
                </div> 
      	   </div> 
           <div class="form-group">      
                <label class="control-label col-xs-2" style="text-align:center;">Fecha</label>
                <div class="col-xs-3">
                	<input type="text" name="d_fecguia" id="d_fecguia" class="form-control input-sm" placeholder="Fecha Anulacion" data-validacion-tipo="requerido"   />               
                </div>    
                <label class="control-label col-xs-2" style="text-align:center;">Motivo</label>
                <div class="col-xs-4">
                	<input type="text" name="c_osb" id="c_osb" class="form-control input-sm" placeholder="Motivo Anulacion" data-validacion-tipo="requerido" maxlength="50" />               
                </div> 
      	   </div> 
           <div class="form-group">
             <label class="control-label col-xs-10" >Msje: El sistema validara que la informacion sea correcta.</label>
      	   	 <label class="control-label col-xs-10" style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>	
           </div>   	
    </div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        	<button type="submit" class="btn btn-primary" >Anular</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal eliminacion de Guia no registrada-->
<!--modal de eliminacion de Guia-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">  
            <form id="eliminar" name="eliminar" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarGuia" >
                <div class="modal-header">      
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
                </div>      
                <div class="alert alert-warning"> Seguro de Eliminar la Guia 
                    <input name="c_numguia" id="c_numguia" type="text" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:200px;" readonly />
                    <input type="hidden" name="login" id="login" value="<?php echo $login; ?>" />
                    <span id="mensaje" class="label label-default"></span>   
                </div> &nbsp;&nbsp;&nbsp;
                    <label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" >Eliminar</button>        
                </div>
            </form>
        </div>
    </div>
</div>
 <!--fin modal eliminacion de Guia-->
 <!--modal de eliminacion de Guia-->
<div class="modal fade" id="my_modalanul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="anular" name="anular" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularGuia" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Anular la Guia <input name="c_numguia1" id="c_numguia1" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input type="hidden" name="login1" id="login1" value="<?php echo $login; ?>" />
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
        	<button type="submit" class="btn btn-primary" >Anular</button>        
        </div>
        </form>
      </div>
    </div>
  </div>
 <!--fin modal anulacion de Guia-->
 
<div class="container-fluid"> 
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION GUIA.</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegGuia">NUEVA GUIA</a>
  &nbsp;&nbsp;<a class="btn btn-danger" onclick="EliminarGuiaNoregistrada()">ANULAR GUIA NO INGRESADA</a>
  &nbsp;&nbsp;<a class="btn btn-danger" onclick="AnularGuiaTransporteNoregistrada()">ANULAR GUIA T. NO INGRESADA</a> 
  
  &nbsp;&nbsp;<!--<a href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=prueba" class="btn btn-danger" target="_blank">prueba</a> -->
  &nbsp;&nbsp;
  &nbsp;&nbsp;
  &nbsp;&nbsp;
        <!-- <input id="BuscarNew" name="BuscarNew" type="text" placeholder="Ingrese NUMERO de Guia y/o NOMBRE del cliente" /> -->
        <a href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ConsultarGuiaEspecifica" class="btn btn-warning" target="_blank">BUSCAR OTRA GUIA</a>
  <form class="form-horizontal" method="post" action="#" id="frmpedidet" name="frmpedidet">
<?php if($this->model->ListarGuia() != NULL) {?>
<table id="tablas" class="table table-hover" style="font-size:12px;">
    <thead>   
	<tr>
            <td colspan="8">
                <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Guia y/o nombre del cliente" />
            </td>
        </tr>
        <tr>
            <th style="width:50px;">Nro</th>
            <th style="width:100px;">Nº DE GUIA</th>
            <th style="width:100px;">Nº DE PLACA</th> 
            <th style="width:400px;">CLIENTE</th> <!--style="width:250px;"-->
            <th>TRANSPORTISTA Y ULTIMA GUIA T.</th>            
            <th style="width:150px;">COTIZACION Y ASIG.</th> 
            <th style="width:100px;">ESTADO</th>         
            <th style="width:100px;">FECHA GUIA</th>           	
            <th style="width:170px;">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarGuia() as $r):
		$c_numguia=$r->c_numguia;		
		$c_nomcli=strtoupper(utf8_encode($r->c_nomdes)); 
		$c_nomtra=strtoupper(utf8_encode($r->c_nomtra)); 
		$c_guiatra=$r->c_guiatra;		
		$c_placaCG=$r->c_placa;
                
		if($r->c_estado!="4"){
			if($c_guiatra==""){
				$guiatra='<font color="#FF0000"> S/GT</font>';
				$verguiatra='2';
			}else{
				$guiatra=' <font color="#0000FF">GT.'.$c_guiatra.'</font>';
				$verguiatra='1';
			}
			///OBTENER COTIZACION Y ASGNACION
					//A nivel cabecera			
					$c_numped=$r->c_numped;
					if($c_numped==""){
						$c_numped='<font color="#FF0000">S/C</font>';
					}
					$n_idasig=$r->n_idasig;		
					if($n_idasig=="" || $n_idasig=="0"){
						$Asig='<font color="#FF0000"> S/A</font>';
					}else{
						$Asig=' ASIG.'.$n_idasig;
					}
					//Fin a nivel cabecera				
			///FIN OBTENER COTIZACION Y ASGNACION
		}else{
			$guiatra='';
			$c_numped='';
			$Asig='';
		}
		$c_estado=$r->c_estado;
		$d_fecgui=$r->d_fecgui;			
		$validarEir=$this->model->obtenerEirguia($r->c_numguia);
			//if($validarEir==NULL){
				if($c_estado=='4'){
					$estado='<font color="#FF0000">Anulado</font>';
					$modificar='1';
				}else{
					if($validarEir==NULL){
						$estado='<font color="#0000FF">Activo</font>';
						$modificar='1';
					}else{
						//$estado='<font color="#009900">Cerrado</font>';
						$estado='<font color="#0000FF">Activo</font>';
						$modificar='0';
					}
				}				
			/*}else{
				$estado='<font color="#009900">Cerrado</font>';
				$modificar='0';
			}*/
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $c_numguia; ?> </td>
          <td><b><?php echo $c_placaCG; ?></b></td>
          <td><?php echo $c_nomcli ?> </td>
          <td><?php echo $c_nomtra.$guiatra ?> </td>          
          <td><?php echo $c_numped.$Asig?> </td>         
          <td><?php echo $estado ?> </td>
          <td><?php echo vfecha(substr($d_fecgui,0,10));   ?></td>        
       	  <td colspan="2"> 
            <?php if($c_estado!='4'){ ?>	             
               <?php if($modificar=='1'){ ?> 
				<a onClick="AnularGuia('<?php echo $c_numguia; ?>')" type="button" class="btn btn-warning btn-sm" title="Anular" type="button" >
				  <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> 
				</a>
			   <a onClick="EliminarGuia('<?php echo $c_numguia; ?>')" type="button" class="btn btn-danger btn-sm" title="Eliminar" type="button" >
				  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
               <?php } ?> 
			   <a target="_blank" href="?c=inv04&a=ImprimirGuia&c_numguia=<?php echo $r->c_numguia?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" type="button" class="btn btn-primary btn-sm" title="Imprimir">
				  <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
				</a>  
				<a target="_blank" href="?c=inv04&a=imprimeguiaT&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni'] ?>&num=<?php echo $r->c_serdoc.'-'.$r->c_nume;  ?>&codi=<?php echo $r->c_numguia; ?>" type="button" class="btn btn-info btn-sm" title="Generar Guia Transporte">
				  <span class="glyphicon glyphicon-bed" aria-hidden="true"></span>
				</a>		
                 <?php if($verguiatra=='1'){ //si tiene guia de transporte ?>
				<a target="_blank" href="?c=inv04&a=VerGuiasTransporte&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni'] ?>&c_numguia=<?php echo $r->c_numguia;  ?>" type="button" class="btn btn-default btn-sm" title="Ver Guias de Transporte">
				  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 
				</a>                    	
              	 <?php } ?>            
            <?php }else{ ?> 
				<a target="_blank" href="?c=inv04&a=ImprimirGuia&c_numguia=<?php echo $r->c_numguia?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" type="button" class="btn btn-primary btn-sm" title="Imprimir">
				  <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
				</a>
            <?php } ?> 	         
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
</table> 
      <?php }else{ } ?>
</form>	              
 </div>  
