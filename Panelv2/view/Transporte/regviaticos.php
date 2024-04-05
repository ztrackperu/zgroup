
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
   $( "#d_fecsol" ).datepicker(); 
    //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
 });
 
  function validarguardar(){
	  var d_fecsol=document.getElementById('d_fecsol').value;
 	   if(d_fecsol==''){			
			var mensje = "Falta Ingresar la Fecha de Solicitud ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecsol").focus();
			return 0;
		}
	  	 
		if(confirm("Seguro de Registrar la Cabecera de Viaticos ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }



</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">CABECERA DE VIATICOS DEL SERV. TRANSP. N°<?php echo $Id_servicio; ?> </div>
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

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarCabViaticos" >
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
       	  <!--<div class="col-xs-1">             	 
           <input id="desab1" value="1" type="checkbox" onClick="desabilitar1()"  />            
          </div>-->
           <label class="control-label col-xs-2">NºSolicitud</label>
          <div class="col-xs-2">
             <input type="text"   class="form-control input-sm" placeholder="autogenerado" readonly />
          </div>
         	 <label class="control-label col-xs-1">NºServicio</label>
          <div class="col-xs-2">
          	<input type="text" name="Id_servicio" id="Id_servicio"  class="form-control input-sm" value="<?php echo $Id_servicio; ?>" readonly />  
          </div>	
          	 <label class="control-label col-xs-1">NºItem</label>
          <div class="col-xs-1">
          	<input type="text" name="n_item" id="n_item"  class="form-control input-sm" value="<?php echo $n_item; ?>" readonly />  
            <input type="hidden" name="c_tipmov" id="c_tipmov"  class="form-control input-sm" value="<?php echo $c_tipmov; ?>" readonly />  
          </div>        	
         
        </div>
        
        <!--fila 2-->
       <div class="form-group">
       		 <!-- <div class="col-xs-1">             	 
              <input id="desab2" value="1" type="checkbox" onClick="desabilitar2()"   />            
             </div>-->
             <label class="control-label col-xs-2">NºForwarder</label>
             <div class="col-xs-2">
             <input id="c_nrofw" name="c_nrofw" class="form-control input-sm"  type="text" value="<?php echo $c_nrofw; ?>" readonly  />   	 
             </div>               
             <label class="control-label col-xs-1">Cotizacion</label>
              <div class="col-xs-2">
               <input id="c_numped" name="c_numped"  class="form-control input-sm"  type="text" value="<?php echo $c_numped; ?>" readonly    />
          	  </div>
       		<label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecsol" id="d_fecsol" value="" class="form-control datepicker input-sm" placeholder="Fecha de Solicitud" data-validacion-tipo="requerido" />
        	</div> 
           
        </div>      
 
</form>   		                

</div>
</div>
</div>

