
<script>
function desabilitar1(){
	if(document.getElementById('desab1').checked==true){
		document.getElementById('forwarder').disabled=true;	
		document.getElementById('forwarder').value='';		
		document.getElementById('c_nrofw').value='';
		document.getElementById('cotizacion').value='';
		document.getElementById('c_numped').value='';
		
		document.getElementById('c_nomcli').value='';
		document.getElementById('c_codcli').value='';
		document.getElementById('c_ruccli').value='';
		document.getElementById('tipmov').value='Local';
		document.getElementById('c_tipmov').value='L';
	}else{
		document.getElementById('forwarder').disabled=false;
		document.getElementById('c_nomcli').value='';
		document.getElementById('c_codcli').value='';
		document.getElementById('c_ruccli').value='';
		document.getElementById('tipmov').value='';
		document.getElementById('c_tipmov').value='';
	}
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
   $( "#d_fectran" ).datepicker();
   //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
 
  function validarguardar(){
	  var forwarder=document.getElementById('forwarder').value;
	   if(document.getElementById('desab1').checked==false){
		   if(forwarder==''){			
				var mensje = "Falta Buscar Forwarder ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("forwarder").focus();
				return 0;
			}
			
		   var c_nrofw=document.getElementById('c_nrofw').value;
		   if(c_nrofw==''){			
				var mensje = "Falta Buscar y Seleccionar Forwarder ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("c_nrofw").focus();
				return 0;
			}
	   }else{		
		   var cotizacion=document.getElementById('cotizacion').value;
		   if(cotizacion==''){			
				var mensje = "Falta Buscar Cotizacion ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("cotizacion").focus();
				return 0;
			}	
		   var c_numped=document.getElementById('c_numped').value;
		   if(c_numped==''){			
				var mensje = "Falta Buscar y Seleccionar Cotizacion ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("c_numped").focus();
				return 0;
			}
	    }
		var d_fectran=document.getElementById('d_fectran').value;
		   if(d_fectran==''){			
				var mensje = "Falta Ingresar la Fecha del Servicio ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("d_fectran").focus();
				return 0;
			}
		if(confirm("Seguro de Registrar la Cabecera del Transporte ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }



</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRO DE VEHICULOS</div>
 <div>   
  
 <!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
    <span id="mensaje" class="label label-default"></span> 
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->   

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarCabTransporte" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div> 
 	
     <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"  class="active" ><a href="#vehi" aria-controls="vehi" role="tab" data-toggle="tab"  >Datos del Vehiculo</a></li>
        <li role="presentation" ><a  href="#pro" aria-controls="pro" role="tab" data-toggle="tab"  >Datos Propietario y Seguro</a></li>
     </ul> 
    
      <!-- Inicia Tab panes -->
	<div class="tab-content">      
	   <div role="tabpanel"  id="vehi" class="tab-pane active" >       
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div>
           <!--fila 1-->
           <div class="form-group">
              <label class="control-label col-xs-2">Matricula</label>
              <div class="col-xs-2">
                <input id="c_matricula" name="c_matricula" class="form-control input-sm"  type="text" placeholder="Matricula"   />        
              </div> 
              <label class="control-label col-xs-1">Marca</label>
              <div class="col-xs-2">
              	  <select name="c_marca" id="c_marca" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->model->ListarMaestrosGeneral('MAR') as $b):	 ?>
                   <option value="<?php echo $b->C_NUMITM; ?>" > <?php echo utf8_encode($b->C_DESITM); ?></option>
                   <?php  endforeach;	 ?>
                 </select>    	 
              </div>              		
                <label class="control-label col-xs-1">Año</label>
                <div class="col-xs-2">
                 <select name="c_anno" id="c_anno" class="form-control input-sm">
                    <option value="SELECCIONE">SELECCIONE</option>            		
                    <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                    <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
                 </select>
                </div>        
                
            </div>
            
            <!--fila 2-->
           <div class="form-group">       		
               <label class="control-label col-xs-2">Modelo</label>
               <div class="col-xs-2">
                 <input id="c_modelo" name="c_modelo" class="form-control input-sm"  type="text" placeholder="Modelo"   /> 
              </div> 
               <label class="control-label col-xs-1">Motor</label>
               <div class="col-xs-1">
                 <input type="text" name="c_nomcli" id="c_nomcli"  class="form-control input-sm" placeholder="Cilindros"  /> 
               </div>  
               <div class="col-xs-1">
                 <input type="text" name="c_nomcli" id="c_nomcli"  class="form-control input-sm" placeholder="Litros"  /> 
               </div>                
               <label class="control-label col-xs-1">Serial/VIN</label>
               <div class="col-xs-2">
                 <input type="text" name="c_nomcli" id="c_nomcli"  class="form-control input-sm" placeholder="Serial/VIN"  /> 
               </div>     
            </div>  
            
             <!--fila 3-->
           <div class="form-group">       		
               <label class="control-label col-xs-2">Color</label>
               <div class="col-xs-2">
                 <select name="c_marca3" id="c_marca3" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->model->ListarMaestrosGeneral('CCA') as $b):	 ?>
                   <option value="<?php echo $b->C_NUMITM; ?>" > <?php echo utf8_encode($b->C_DESITM); ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div> 
               <label class="control-label col-xs-1">Transmision</label>
               <div class="col-xs-2">
                 <select name="c_anno5" id="c_anno5" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->listaanno() as $a):	 ?>
                   <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div>                 
               <label class="control-label col-xs-1">Tipo</label>
               <div class="col-xs-2">
                 <select name="c_anno6" id="c_anno6" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->listaanno() as $a):	 ?>
                   <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div> 
               <div class="col-xs-1">             	 
                 <label>Aire Ac.</label>  <input id="desab1" name="desab1" value="1" type="checkbox" onClick="desabilitar1()"   />            
              </div>     
            </div> 
            
              <!--fila 4-->
           <div class="form-group">       		
               <label class="control-label col-xs-2">Sistema de Combustion</label>
               <div class="col-xs-2">
                 <select name="c_anno7" id="c_anno7" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->listaanno() as $a):	 ?>
                   <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div> 
               <label class="control-label col-xs-1">Combustible</label>
               <div class="col-xs-2">
                 <select name="c_anno8" id="c_anno8" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->listaanno() as $a):	 ?>
                   <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div>                 
               <label class="control-label col-xs-1">Direccion</label>
               <div class="col-xs-2">
                 <select name="c_anno9" id="c_anno9" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->listaanno() as $a):	 ?>
                   <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?></option>
                   <?php  endforeach;	 ?>
                 </select>
               </div>     
            </div> 
           
          </div> <!--fin vehi -->
          
          <div role="tabpanel"  id="pro" class="tab-pane" >       
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div>
           <!--fila 1-->
           <div class="form-group">
              <label class="control-label col-xs-2">Nombre Propietario</label>
              <div class="col-xs-2">
                <select name="c_anno" id="c_anno" class="form-control input-sm">
                    <option value="SELECCIONE">SELECCIONE</option>            		
                    <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                    <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
                 </select>       
              </div> 
              <label class="control-label col-xs-1">Codigo</label>
              <div class="col-xs-2">
               <input  id="forwarder" name="forwarder" class="form-control input-sm"  type="text" placeholder="Codigo Propietario"   />     	 
              </div>              		
                <label class="control-label col-xs-1">DNI</label>
                <div class="col-xs-2">
                 <input  id="forwarder" name="forwarder" class="form-control input-sm"  type="text" placeholder="DNI Propietario"   />   
                </div>                
              </div><!--fila--> 
              
              <!--fila 2-->
           <div class="form-group">
              <label class="control-label col-xs-2">Nombre Seguro</label>
              <div class="col-xs-2">
                <select name="c_anno" id="c_anno" class="form-control input-sm">
                    <option value="SELECCIONE">SELECCIONE</option>            		
                    <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                    <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
                 </select>       
              </div> 
              <label class="control-label col-xs-1">Codigo</label>
              <div class="col-xs-2">
               <input  id="forwarder" name="forwarder" class="form-control input-sm"  type="text" placeholder="Codigo Seguro"   />     	 
              </div>              		
                <label class="control-label col-xs-1">RUC</label>
                <div class="col-xs-2">
                 <input  id="forwarder" name="forwarder" class="form-control input-sm"  type="text" placeholder="RUC Seguro"   />   
                </div>                
              </div><!--fila-->    
           
          </div> <!--fin pro -->
     </div>       
 
</form>   		                

</div>
</div>
</div>
   
<script>
$(document).ready(function(){    
    /* Autocomplete de cotizacion, jquery UI */
    $("#cotizacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.c_numped,
                            value: item.cliente,
							clie: item.c_nomcli,
							ruc: item.CC_NRUC,
							codcli: item.c_codcli
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_numped").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#c_ruccli").val(ui.item.ruc);           
        }
    })
})

$(document).ready(function(){    
    /* Autocomplete de forwarder, jquery UI */
    $("#forwarder").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=BuscarForwarder',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.Fwd_Codi,
                            value: item.Fwd_Codi+' '+item.Fwd_DescripcionClienteFinal,
							clie: item.Fwd_DescripcionClienteFinal,
							ruc: item.Ent_Ruc,
							codcli: item.Fwd_ClienteFinal,
							mov: item.Fwd_Tmov
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_nrofw").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#c_ruccli").val(ui.item.ruc);
			$("#c_tipmov").val(ui.item.mov); 
			if(ui.item.mov=='I'){
			$("#tipmov").val('Importacion');
			}else{
			$("#tipmov").val('Exportacion');
			}
        }
    })
})
</script>



