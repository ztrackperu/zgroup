<script>
//window.onunload=despedida();
//desbloquea los equipos disponibles bloqueados otros dias que no sean hoy
function desbloquearEquipos() { 
	jQuery.ajax({
		url: '?c=inv02&a=desbloEquiDiaspas',
		type: "post",
		dataType: "json"
	});
}	
	
function abrirmodal(IdAsig,c_numped){
	$('#my_modalelim').modal('show');				
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 $('#tablaelim').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEliminarDetAsig",{IdAsig:IdAsig,c_numped:c_numped});	
}

function eliminarAsig(){
	if(document.getElementById('todoc_motielim').disabled==false){
		var todoc_motielim=document.getElementById('todoc_motielim').value;
		if(todoc_motielim==''){
			alert('Falta Ingresar motivo de Eliminar toda la Asignacion');
			document.getElementById("todoc_motielim").focus();
			return 0;
		}
		if(confirm("Seguro de Eliminar toda la Asignacion ?")){
			document.getElementById("frm-eliminarAsig").submit();
		}
	}else{
		//alert('desabilitado');
		var n_itemmax=document.getElementById('n_itemmax').value;
		var count=0;		
		for(i=1;i<=n_itemmax;i++){		
			if(document.getElementById('re'+i).checked==true){							
				count=count+1;
			}
		}
		if(count==0){							
			alert('Falta Seleccionar asignaciones a eliminar');			
			return 0;
		}					
		if(confirm("Seguro de Eliminar las asignaciones seleccionadas ?")){
			document.getElementById("frm-eliminarAsig").submit();
		}
	}
}	
</script>

<body onLoad="desbloquearEquipos()" > 

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">COTIZACIONES PENDIENTES PARA ASIGNAR</div>
</div>
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" id="mdialTamanio">
        <div class="modal-content">
			<form id="ActualizarFecha" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Actualizar fecha de despacho</h5>
                </div>
                <div class="modal-body">
					<div class="alert alert-primary" role="alert" id="mensaje2" style="display:none">
						</div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Fecha Comercial:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="txtFcomercial" name="txtFcomercial"  placeholder="Fecha" readonly/>
                           <input type="hidden" class="form-control" id="txtCotizacion" name="txtCotizacion" />
                           <input type="hidden" class="form-control" id="txtDni" name="txtDni"  value="<?php echo $_GET["udni"]?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Fecha Almacen:</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control datepicker" id="txtFalmacen" name="txtFalmacen"  placeholder="Fecha Almacen" required />
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" >Actualizar</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<table id="tablas" class="table table-bordered table-striped">
    <?php if($this->model->ListarAsignacion() != NULL) {?>
    <thead>   
		<tr>
            <th style="width:180px;">N COTIZACION.</th>
            <th style="width:300px;">CLIENTE</th>                    
            <th>ASUNTO</th>           
            <th>FECHA APROBACION</th>
            <th>FECHA DESPACHO-COMERCIAL</th>
            <th>USUARIO</th>                  
        </tr>       
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarPendienteAsignacion() as $r):
		$c_numped=$r->c_numped;	
		$c_nomcli=$r->c_nomcli;	
		$c_asunto=$r->c_asunto;	
		$d_fecapr=$r->d_fecapr;	
		$fecha_despacho=$r->fecha_despacho;	
		if($fecha_despacho==""){
			$fecha_despacho="-";
		}else{
			$fecha_despacho=vfecha(substr($r->fecha_despacho,0,10));
		}
		$usuario_despacho=$r->usuario_despacho;	
		$c_oper=$r->c_oper;	
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $c_numped; ?></td>          
          <td><?php echo utf8_encode($c_nomcli);?></td>
          <td><?php echo utf8_encode($c_asunto);?></td>
		  <td><?php echo vfecha(substr($d_fecapr,0,10)); ?></td>
		  <td>
		  <?php
								if($usuario_despacho==""){
								echo '<strong style="color:#FF9900">'.$fecha_despacho.'</strong>
								 <a class="btn btn-xs btn-info" title="Fecha de Despacho - almacen" href="#my_modal" data-toggle="modal" data-coti="'.$c_numped.'" data-fecha="'.$fecha_despacho.'"><span class="glyphicon glyphicon-pencil"></span></a>';
								}
								else{
									
								echo '<strong style="color:#060">'.$fecha_despacho.'</strong>';	
									
								}
								?>
		  </td>
          <td><?php echo $c_oper;?></td>
                   
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>
   		               
</div>

	<script>
	
	
	
	$(document).ready(function() {
    $('#tablas').DataTable( {

      
	  dom			: 'Bfrtip',
	  ordering: false,
	 // title			:'ListaPersonal'
	   buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            //'pdfHtml5',
			        {//valores por defecto orientation:'portrait' and pageSize:'A4',
            extend: 'pdfHtml5',
		//	title: 'ListaPersonal'
            orientation: 'landscape',
            pageSize: 'A4'
        },

        ]
   
	   
	   
    } );
   $('#my_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var coti = button.data('coti') // Extract info from data-* attributes
  var fecha = button.data('fecha') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
    modal.find('.modal-title').text('Actualizar Fecha de despacho de la cotizacion:  ' + coti)
	modal.find('.modal-body  #txtCotizacion').val(coti) 
	modal.find('.modal-body  #txtFcomercial').val(fecha) 

})
	
	
	
	 $("#ActualizarFecha").submit(function(e){
	//alert();
	e.preventDefault();
	var datos=new FormData(this);
	$.ajax({
	url: '?c=inv02&a=ActualizarFechaDespacho',
	data: datos,				
	processData:false,
	contentType:false,
	type: "post",
	beforeSend:function(){
		$("#mensaje2").html('Espere');
	},
	success: function(mensaje){		
		$('#mensaje2').css('display','block');
		$("#mensaje2").html(mensaje);
/* 		 setTimeout(function() {
			$(".mensaje").fadeIn(1500);
			},6000);
			 */
			setTimeout(function() {
				$("#mensaje2").fadeOut(1500);
			},3000);
		$('#txtCotizacion').val('');
		$('#txtFcomercial').val('');
		$('#txtFalmacen').val('');
		location.reload();
		}
	});
	
	
});
 //$('#my_modal').on('hidden.bs.modal', function () { location.reload(); }) 
	
	
} );


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
//   $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
    $( "#txtFalmacen" ).datepicker();
   
 });	
	



	
 

	
	
	</script>
</body>