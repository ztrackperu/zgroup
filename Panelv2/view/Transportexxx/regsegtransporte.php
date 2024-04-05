
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
   $( "#d_fecseg" ).datepicker(); 
    //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
 });
 
  function validarguardar(){
	  var c_idtiposeg=document.getElementById('c_idtiposeg').value;
 	   if(c_idtiposeg==''){			
			var mensje = "Falta Seleccion Tipo de Seguimiento ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idtiposeg").focus();
			return 0;
		}
	   var c_idtipocomu=document.getElementById('c_idtipocomu').value;
 	   if(c_idtipocomu==''){			
			var mensje = "Falta Seleccion Tipo de Comunicacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idtipocomu").focus();
			return 0;
		}
		var d_fecseg=document.getElementById('d_fecseg').value;
 	   if(d_fecseg==''){			
			var mensje = "Falta Ingresar Fecha del Seguimiento ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecseg").focus();
			return 0;
		}
		var c_obsviaje=document.getElementById('c_obsviaje').value;
 	   if(c_obsviaje.trim()==''){			
			var mensje = "Falta Ingresar Observacion del Viaje ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_obsviaje").focus();
			return 0;
		}	
	  	 
		if(confirm("Seguro de Registrar el Seguimiento de Transporte ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }

jQuery(function($){
	$.mask.definitions['h'] = "[0-2]";
	$.mask.definitions['i'] = "[0-9]";
	$.mask.definitions['m'] = "[0-5]"; 
	$.mask.definitions['n'] = "[0-9]";
	//$.mask.definitions['x'] = "[AP]";
    //$("#horaretiro").mask("hi:mn xM");
  //  $("#horaseg").mask("hi:mn");
});

function cambiartiposeg(){
	var c_idtiposeg=document.Frmregcoti.c_idtiposeg.options[document.Frmregcoti.c_idtiposeg.selectedIndex].text;
	document.getElementById('c_nomtiposeg').value=c_idtiposeg;
}
function cambiartipocomu(){
	var c_idtipocomu=document.Frmregcoti.c_idtipocomu.options[document.Frmregcoti.c_idtipocomu.selectedIndex].text;
	document.getElementById('c_nomtipocomu').value=c_idtipocomu;
}
</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REGISTRAR SEGUIMIENTO DEL SERV. TRANSP. N°<?php echo $Id_servicio; ?> </div>
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

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarSeguimiento" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminDetTransporte&Id_servicio=<?php echo $Id_servicio; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div> 
 
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-2">Nº Seguimiento</label>
          <div class="col-xs-2">
             <input type="text"   class="form-control input-sm" placeholder="autogenerado" readonly />
          </div>
         	 <label class="control-label col-xs-2">Nº de Servicio</label>
          <div class="col-xs-2">
          	<input type="text" name="Id_servicio" id="Id_servicio"  class="form-control input-sm" value="<?php echo $Id_servicio; ?>" readonly />  
          </div>	
          	 <label class="control-label col-xs-1">Nº Item</label>
          <div class="col-xs-1">
          	<input type="text" name="n_item" id="n_item"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_item; ?>" readonly />  
            <input type="hidden" name="login" id="login"   value="<?php echo $login; ?>" readonly />
          </div> 
          <div class="col-xs-1">
          	<input type="text" name="c_tipmov" id="c_tipmov" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_tipmov; ?>" readonly />  
          </div>       	
         
        </div>
        
         <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-2">Empresa Transporte</label>
          <div class="col-xs-2">
             <input type="text" name="c_nomempresa" id="c_nomempresa"   class="form-control input-sm" placeholder="Empresa Transporte" value="<?php echo $ListarDetalleUpd->c_nomtranspote; ?>" readonly />
          </div>
         	 <label class="control-label col-xs-2">RUC Empresa</label>
          <div class="col-xs-2">
          	<input type="text" name="c_rucempresa" id="c_rucempresa"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_ructransporte; ?>" readonly />  
          </div>	
          	 <label class="control-label col-xs-1">Chofer</label>
          <div class="col-xs-2">
          	<input type="text" name="c_chofersalida" id="c_chofersalida"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_chofer; ?>" readonly />  
          </div>        	
         
        </div>
        
        <!--fila 3-->
       <div class="form-group">
             <label class="control-label col-xs-2">Tipo Seguimiento</label>
             <div class="col-xs-2">
                 <select id="c_idtiposeg" name="c_idtiposeg"  class="form-control input-sm" onChange="cambiartiposeg()">
                  <option value="">SELECCIONE</option>
                  <?php 
                    $ListarEntidades=$this->model->ListarDetTablaTransporte('SEG'); 
                    foreach ($ListarEntidades as $enti){
                  ?>
                  <option value="<?php echo $enti->C_NUMITM; ?>"><?php echo utf8_encode($enti->C_DESITM); ?></option>
                  <?php } ?>
                 </select>
                 <input type="hidden" name="c_nomtiposeg" id="c_nomtiposeg"   />  
             </div>               
             <label class="control-label col-xs-2">Tipo Comunicacion</label>
              <div class="col-xs-2">
               <select id="c_idtipocomu" name="c_idtipocomu"  class="form-control input-sm" onChange="cambiartipocomu()">
                  <option value="">SELECCIONE</option>
                  <?php 
                    $ListarEntidades=$this->model->ListarDetTablaTransporte('CMU'); 
                    foreach ($ListarEntidades as $enti){
                  ?>
                  <option value="<?php echo $enti->C_NUMITM; ?>"><?php echo utf8_encode($enti->C_DESITM); ?></option>
                  <?php } ?>
                 </select>
                 <input type="hidden" name="c_nomtipocomu" id="c_nomtipocomu"   />  
              </div>
           
        </div> 
        
        <!--fila 4-->
       <div class="form-group">             
       		<label class="control-label col-xs-2">Hora y Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecseg"  id="d_fecseg" class="form-control input-sm" value="" placeholder="Fecha Seguimiento"  />            
            </div>   
            <div class="col-xs-1">
             <input type="text" name="horaseg"  id="horaseg" class="form-control input-sm time-format" value="" placeholder="Hora Seg" style="width:85px;"  />            
            </div>   
            <label class="control-label col-xs-1">Observacion</label>
            <textarea cols="70" rows="5"  id="c_obsviaje" name="c_obsviaje">
            </textarea>        
        </div>        
 
</form>   		                

</div>
</div>
</div>

