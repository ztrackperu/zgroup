<script type="text/javascript">
function volver(){
	location.href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']; ?>";	
}
 $(document).ready(function(){
        $("#frm_anularguianoregistrada").submit(function(){
            return $(this).validate();
        });
    })
function ponerCeros(obj,val) {
	
	var i=val;
	
  while (obj.value.length<i)
    obj.value = '0'+obj.value;
}

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
 
return true;
}

 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   //$( "#c_fechora" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
    $( "#d_fecguia" ).datepicker(); 
 });
</script>
<!--modal de eliminacion de Guia transporte no registrada-->
<div class="modal fade" id="my_modalelimguiatnd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm_anularguianoregistrada" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularGuiaTransporteNoregistrada" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"><b> ANULACION DE GUIA TRANSPORTE NO REGISTRADA</b> </h5>
      </div>      
      <!--<div class="alert alert-warning">
        Seguro de Eliminar la Guia <input name="c_numguia" id="c_numguia" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <span id="mensaje" class="label label-default"></span>   
      </div>-->
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
 
<!--modal de eliminacion de Guia-->
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarGuiaTransporte" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Eliminar la Guia <input name="c_numguia" id="c_numguia" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input name="c_numgr" id="c_numgr" type="hidden" />
        <span id="mensaje" class="label label-default"></span>          
      </div>
      &nbsp;&nbsp;&nbsp;<label style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>
      <!--<div class="modal-body"> 
      		<div class="form-group">
             <label class="control-label col-xs-10" >Msje: El sistema validara que la informacion sea correcta.</label>
      	   	 <label class="control-label col-xs-10" style="color:#F00">Nota: Una vez procesado no podrá reversar el proceso.</label>	
           </div> 	
      </div>-->
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
        
       <form id="" class="form-horizontal" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AnularGuiaTransporte" >
       
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="exampleModalLabel"> Mensaje del Sistema </h5>
      </div>      
      <div class="alert alert-warning">
        Seguro de Anular la Guia <input name="c_numguia1" id="c_numguia1" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:200px;" readonly />
        <input name="c_numgr1" id="c_numgr1" type="hidden" />
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
  <div class="panel-heading">ADMINISTRACION GUIA DE TRANSPORTE</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" onclick="volver()">VOLVER</a>
  <!--&nbsp;&nbsp;<a class="btn btn-danger" onclick="AnularGuiaTransporteNoregistrada()">ANULAR GUIA T. NO INGRESADA</a> --> 
 <form class="form-horizontal" method="post" action="#" id="frmpedidet" name="frmpedidet">

<table id="tablas" class="table table-hover" style="font-size:12px;">
    <?php if($verguiastransporte != NULL) {?>
    <thead>   
		<tr>
          <td colspan="7">
            <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Guia y/o nombre del cliente" />
          </td>
          
        </tr>
        <tr>
            <th style="width:100px;">Nº DE GUIA</th>        
            <th style="width:130px;">REMITENTE</th> <!--style="width:250px;"-->
            <th style="width:150px;">DESTINATARIO</th>            
            <th style="width:200px;">PTO PARTIDA</th>
            <th style="width:200px;">PTO LLEGADA</th> 
            <th style="width:70px;">ESTADO</th>         
            <th style="width:100px;">FECHA GUIA</th>           	
            <th style="width:100px;"></th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($verguiastransporte as $r):
		$c_numguia=$r->c_numguia;
		$c_desrem=$r->c_desrem;
		$c_nomdes=$r->c_nomdes;		
		$d_fecgui=$r->d_fecgui;
		$c_parti=$r->c_parti;
		$c_llega=$r->c_llega;
		$c_estado=$r->c_estado;
			if($c_estado=='4'){
				$estado='<font color="#FF0000">Anulado</font>';			
			}else{
				$estado='<font color="#0000FF">Activo</font>';
			}	
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $c_numguia; ?> </td>
          <td><?php echo utf8_encode($c_desrem) ?> </td>
          <td><?php echo utf8_encode($c_nomdes) ?> </td>          
          <td><?php echo utf8_encode($c_parti) ?> </td>         
          <td><?php echo utf8_encode($c_llega) ?> </td>
          <td><?php echo $estado;   ?></td>   
          <td><?php echo $d_fecgui;  //vfecha(substr($d_fecgui,0,10));   ?></td>        
       	  <td> 
            <?php //if($c_estado!='4'){ ?>	             
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu"> 
               <?php if($c_estado!='4'){ ?> 
                 <li><a onClick="AnularGuia('<?php echo $c_numguia; ?>','<?php echo $r->c_numgr; ?>')">Anular</a></li>       
                 <li><a href="?c=inv04&a=impguiaT&guia=<?php echo $r->c_numguia?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Imprimir</a></li> 
               <?php }else{ ?> 
               	 <li><a onClick="EliminarGuia('<?php echo $c_numguia; ?>','<?php echo $r->c_numgr; ?>')">Eliminar</a></li>
               <?php } ?>   
              </ul>              
            </div> 
            <?php //} ?>  	         
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
/* function AnularGuiaTransporteNoregistrada(){
	$('#my_modalelimguiatnd').modal('show'); 
}*/
 function AnularGuia(c_numguia,c_numgr){
		$('#my_modalanul').modal('show');
		document.getElementById('c_numguia1').value=c_numguia;
		document.getElementById('c_numgr1').value=c_numgr;	
	}//fin AnularGuia
	
 function EliminarGuia(c_numguia,c_numgr){
		$('#my_modalelim').modal('show');
		document.getElementById('c_numguia').value=c_numguia;
		document.getElementById('c_numgr').value=c_numgr;	
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
</script>
