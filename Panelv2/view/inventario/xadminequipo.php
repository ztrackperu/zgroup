<!--inicia nuevo filter, exportar pdf,csv,excel y copy, paginacion-->
<script src="tables/ga.js" async type="text/javascript"></script><script type="text/javascript" src="tables/site.js">
</script>
<script type="text/javascript" src="tables/dynamic.php" async>
</script>
<!--<script type="text/javascript" language="javascript" src="tables/jquery-1.js">
</script>
<script type="text/javascript" language="javascript" src="tables/jquery.js">
</script>-->
<script type="text/javascript" language="javascript" src="tables/dataTables.js">
</script>
<script type="text/javascript" language="javascript" src="tables/dataTables_002.js">
</script>
<script type="text/javascript" language="javascript" src="tables/buttons_002.js">
</script>
<script type="text/javascript" language="javascript" src="tables/jszip.js">
</script>
<script type="text/javascript" language="javascript" src="tables/pdfmake.js">
</script>
<script type="text/javascript" language="javascript" src="tables/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="tables/buttons_003.js">
</script>
<script type="text/javascript" language="javascript" src="tables/buttons_004.js">
</script>
<script type="text/javascript" language="javascript" src="tables/buttons.js">
</script>
<script type="text/javascript" language="javascript" src="tables/demo.js">
</script>
<link rel="stylesheet" type="text/css" href="tables/dataTables.css"><!--STILO A LA TABLA-->
<link rel="stylesheet" type="text/css" href="tables/buttons.css"> <!--MENSAJE DEL BOTON COPIAR-->
<!--fin nuevo fiter, exportar pdf,csv,excel y copy, paginacion-->

<script type="text/javascript" class="init">
   
	
	
</script> 

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
function Actualiza(){
	if(document.getElementById("cmotivo").value==""){
		alert('Ingrese Motivo');
		return 0;
		
	}else{
	if(confirm("Seguro de Guardar Cambios ?")){
				document.getElementById("frmactualiza").submit();
	 		}
	}
}
</script>
<script>
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
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
      $( "#fechainv" ).datepicker();

 });
</script>
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
	  var res = data_id.split("|");
    }

    $('#idequipo').val(res[0]);


	
  })
});

</script>
<script>
function inventariar(){

	if(confirm("Seguro de Guardar Cambios ?")){
				document.getElementById("frminventariar").submit();
	 		}
	}
</script>
<!--modal de INVENTARIAR-->

 <form id="frminventariar" name="frminventariar" method="post" action="?c=inv01&a=inventariartemp&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
<div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Inventariar</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Equipo</label><input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            <input type="text" class="form-control" id="idequipo" name="idequipo" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Referencia</label>
            <input type="text" class="form-control" id="referencia" name="referencia">
          </div>
           <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
          <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha Inventario</label>
            <input name="fechainv" type="text" class="form-control datepicker input-sm" id="fechainv" value="<?php echo date("d/m/Y"); ?>" readonly="readonly">
          </div>
          
                 
        
      </div>
       Nota: Una vez procesado no podrá reversar el proceso.
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary"  onclick="inventariar()" >Grabar</button>
     
        </div>
      </div>
    </div>
  </div>
   </form>
 <!--fin modal INVENTARIAR-->


 <form id="frmactualiza" name="frmactualiza" method="post" action="?c=inv01&a=ActualizaEstadoEquipo&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Actualizacion Estado Almacen A Disponible</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Producto</label><input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            <input type="text" class="form-control" id="nomprod" name="nomprod" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Codigo</label>
            <input type="text" class="form-control" id="codrod" name="codrod">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Motivo</label>
            <input type="text" class="form-control" id="cmotivo" name="cmotivo">
           
          </div>
        
          <div class="form-group">
            <label for="recipient-name" class="control-label">Estado Anterior</label>
            <input name="estadoanterior" type="text"  class="form-control" id="estadoanterior" value="" readonly="readonly"/>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nuevo Estado</label>
            <input name="estadonew" type="text"  class="form-control" id="estadonew" value="D" readonly="readonly"/>
          </div>
          
        
      </div>
       Nota: Una vez procesado no podrá reversar el proceso.
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="Actualiza()">Cambiar Estado</button>
     
        </div>
      </div>
    </div>
  </div>
   </form>
 <!--fin modal eliminacion-->




 <!--modal de eliminacion de Equipo Temporal-->
 
 
 
 
<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
        
       <form id="frm_eliminarEquipo" class="form-horizontal" method="post" action="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarEquipoTemporal" >
       
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
        
       <form id="frm_motivo" class="form-horizontal" method="post" action="#" >
       
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
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

function exportarexcel(){
     //location.href="?c=liq01&a=ExportarExcelLiquidacion";
     $("#datos_a_enviar").val( $("<div>").append( $("#testTable").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
}
</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">MANTENIMIENTO EQUIPOS</div>
			   <br />
               <form action="?c=inv01&a=ExportarExcelEquipos" method="post" id="FormularioExportacion" name="FormularioExportacion">
                	<input id="exportar" name="exportar" onclick="exportarexcel();" type="button" value="EXPORTAR A EXCEL" class="btn btn-primary"   />
               		<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                </form>	 
  <input id="buscar" type="text" class="form-control" placeholder="Ingrese Codigo y/o Descripcion" />  
  <!--class="table table-hover display" id="testTable" -->
  <table class="table table-hover"  id="testTable"   style="font-size:12px"  cellspacing="0" width="100%">
    <thead>
   	    <tr>
   	        <th >Nro</th>
            <th>Id Equipo</th>        
            <th>Descripcion</th>
            <th>Nota Ingreso</th> 
            <th>Orden Compra</th>          
            <th>Fecha Ingreso</th>
            <th>N° Dua</th>
            <th>Fec. Inventario</th>
            <th>Obs Inventario</th> 
            <th width="10">Estado</th>
            <th width="100">Estado Alm</th>           
            <th width="110">Accion</th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php
		$j=0; 
		foreach($this->model->ListarEquipos() as $r):
		$j++;
			//$r->c_nacional;
			//if($r->c_nacional=='0' || $r->c_nacional==''){$nac='NO';}else{$nac='SI';}
			
			$c_numeoc=$r->c_numeoc;
			$c_nronis=$r->c_nronis;	
			
		    if($r->c_codsit!=''){							
				if($r->c_codsit=='TE'){
					$ListarOcEquipo=$this->model->ListarOcEquipo($r->c_nserie);	//EQUIPOS QUE TIENEN O/C
					if($ListarOcEquipo!=NULL){
						$docing='<font color="#FF0000">Regularizar EIR por O/C</font>';
						$evalua='0';
					}else{
						$docing='<font color="#FF0000">Registro Temporal</font>';
						$evalua='1';
					}
				}else{
					$docing=$c_numeoc;
				} 
			}else{
				$docing='<font color="#FF0000">-</font>';				
			}
				
				$d_fecingx=$r->d_fecing;
				if($d_fecingx!=""){
					$d_fecing=vfecha(substr($d_fecingx,0,10));
				}else{
					$d_fecing='';
				}
			
	 ?>
        <tr>
          <td><?php echo $j; ?></td>
          <td><?php echo $r->c_idequipo; ?></td>
          <td><?php echo utf8_encode($r->IN_ARTI); ?></td>
          <td><?php echo $r->c_nronis; ?></td>
          <td><?php echo $docing; ?></td>
          <td><?php echo $d_fecing; ?></td>
          <td><?php echo $r->c_refnaci; ?></td>
          <td><?php echo $r->c_fisico; ?></td>
          <td><?php echo $r->c_fisico2; ?></td>            
          <td><?php echo $r->c_codsit; ?></td>
          <td><?php echo $r->c_codsitalm; ?></td>           
            <td>    
            	<?php 
					 if($r->c_codsit!=''){
				?>            
                <div class="dropdown">
                  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">
                    Accion <span class="caret"></span>
                  </a>                    
                      <ul class="dropdown-menu" role="menu">                     
                             <li> <a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=Editar&id=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>">Editar</a></li>                             
                             <li><a href="#my_modal2" data-toggle="modal" data-id="<?php echo $r->c_idequipo ?>">Inventariar</a></li> 
                             
 <li> <a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InvEq&id=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>">xxx</a></li>                              

                             
                                                         
                             <li> <a href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=tomarfoto&c_nserie=<?php echo $r->c_nserie; ?>&amp;reg=inv01">Tomar Foto</a></li>  
                             <li><a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ImprimirEquipo&id=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>" >Imprimir</a></li>  
                             <li><a href="?c=inv01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerDetalle&cod=<?php echo $r->c_idequipo; ?>&cod_tipo=<?php echo $r->COD_TIPO; ?>" >Ver Detalle</a></li>       
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
                             
                                                    
                        <?php if($r->c_codsitalm!='V' && $r->c_codsit!='V' 
						
						& $r->c_codsitalm!='C' && $r->c_codsit!='C'
						
						& $_GET['udni']=='43377015' || $_GET['udni']=='41696274'){   ?>
                      <li><a href="#my_modal" data-toggle="modal" 
      data-id="<?php echo $r->c_idequipo.'|'.$r->IN_ARTI.'|'.$r->c_codsitalm; ?>">Reg. Estado</a></li>        <?php }?>
                                       
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
        $TableFilter("#testTable", this.value);
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

