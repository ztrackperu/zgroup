<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">CAJA CHICA </div>
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
<div class="panel-body">
 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=cont01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=guardaApertura" >
 	<div class="row">
		<div class="form-control-static" align="right">
		 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
		 <input class="btn btn-success" type="button" onclick="mostrarReporte()" value="Mostrar Reporte"/>
		 &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
		 <!--&nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;-->
		</div>          
    </div>          
       <!--fila 1-->
	   <div class="row">
			<div class="col-xs-6">
				<label class="control-label col-xs-3">Fecha de Inicio</label>
				<div class="col-xs-6">
					<input type="date" id="txtFechaInicio" name="txtFechaInicio"  class="form-control input-sm"  />            	
				</div> 				
			</div>                      
			<div class="col-xs-6">				
				<label class="control-label col-xs-3">Fecha de Fin</label>
				<div class="col-xs-6">
					<input type="date" id="txtFechaFin" name="txtFechaFin"  class="form-control input-sm"  /> 
				</div>   
			</div>                              
		</div>
<br>		
		<div class="row">
			<div class="col-xs-12">
				<table id="example" class="table table-bordered table-hover table-striped dt-responsive">         
					<thead>
						<tr>                               	 
							<th>Numero de RUC</th>
							<th>Proveedor</th>
							<th>N° de Documento</th>
							<th>Fecha de Documento</th>
							<th>Detalle</th>
							<th>Moneda</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
					<tfoot>
					</tfoot> 
				</table>                       
			</div>		
		</div>		
</div>                
</form>   		                

</div>
</div>
</div>

<script>
function mostrarReporte() {
	   $("#example").dataTable().fnDestroy();
	var FechaInicio = $("#txtFechaInicio").val();
	var FechaFin = $("#txtFechaFin").val();
	if(FechaInicio>FechaFin || FechaInicio=='' || FechaFin==''){
		alert("Ingrese datos correctos y validos");
	}
else{
	//$("#example>tbody >tr").html('');
	//var d2 ='';
/*   $.ajax({
     type: "POST",
     url: '?c=04&a=detalle_CajaChica', //en procesosinv.controller.php
	 dataType: "json",
     data: {FechaInicio:FechaInicio,FechaFin:FechaFin},
     async : false, //espera la respuesta antes de continuar
     success: function(data2) {
		console.log(data2);
		 for (var i = 0; i < data2.length; i++) {
				  d2+= '<tr>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '<th class="text-center">'+data2[i].c_numped	+'</th>'+
				 '</tr>';
				 }
				 $("#example").append(d2);				 
     },	 
   });  */

   
   var tabla=$('#example').dataTable( {
		  "ajax": {
			"processing": true,
			"url": "?c=04&a=detalle_CajaChica",
			"oLanguage": {
			"sEmptyTable": "The table is really empty now!"
			},
			"dataTables_empty": "vacio",
			"data": function ( d ) {
				return $.extend( {}, d, {
				"FechaInicio": FechaInicio,
				"FechaFin": FechaFin
			  } );
			},			
		  },
		  'paging'      : true,
		  'lengthChange': false,
		  'searching'   : true,
		  'ordering'    : false,
		  'info'        : true,
		  'autoWidth'   : false,
		  dom: 'Bfrtip',
		  'buttons': [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
			});	
   
}
  $(function () {
    $('#example2').DataTable()
    $('#example44').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
	  dom: 'Bfrtip',
	  'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
  })

}	

</script>