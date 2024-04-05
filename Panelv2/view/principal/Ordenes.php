<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Buscar Ordenes de Trabajo por Proveedor</div>
        <div class="panel-body">
			<div class="row">
	<form class="form-horizontal" method="post" action="?c=ot01&a=GestionOrdenServicio&op=2&mod=<?php echo $_GET['mod']?>&udni=<?php echo $_GET['udni']?>" id="ordenes" name="ordenes">
					<div class="form-group">
						<label  class="col-lg-2 control-label">Nombre de Proveedor</label>
						<div class="col-lg-4">
						 <input type="text" class="form-control text" id="txtProveedor" name="txtProveedor" >
						 <input type="hidden" class="form-control text" id="txtRucProveedor" name="txtRucProveedor" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar</button>
						</div>
					</div>							
			</div>
		</div>
	</div>
	 <div class="panel panel-success">
        <div class="panel-heading"> Datos de las Ordenes de Trabajo asociadas al Proveedor Seleccionado</div>
		<div id="FacturasListaLoadMSG">           
        </div>	
        <div class="panel-body" id="MostrarInformacion" style="display:none">	
			</br>
			<div class="row">
				<div class="col-lg-12">			
					<div class="box-body table-responsive no-padding">
						<table id="example" class="table table-bordered table-striped">              
							<thead>
								<th class="active info">Item</th>
								<th class="active info">Num Orden Trabajo</th>
								<th class="active info">Fecha de Documento</th>
								<th class="active info">Descripcion Trabajo</th>
								<th class="active info">Equipo</th>
								<th class="active info">Codigo de Equipo</th>
								<th class="active info">Monto</th>
								<th class="active info">Moneda</th>
								<th class="active info">Ref Cotizacion</th>
								<th class="active info">Ejecuta</th>
								<th class="active info">Estado</th>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
							</tfoot>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</form>		
	</div>
</div>

<script>
	
  $(function () {
    $('#example2').DataTable({
		'ordering'    : false,
	})
	$('#marcas').DataTable({
		'ordering'    : false,
	})
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,

   
	   
	  
	  
    })
  })
$(document).ready(function(){
$("#ordenes").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});	
	
	 $("#txtProveedor").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				 url: '?c=ot01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
					console.log(data);
                    response($.map(data, function (item) {
                        return {							
                            id: item.PR_NRUC,
                            value: item.PR_RAZO,
							PR_RAZO: item.PR_RAZO,
							PR_NRUC: item.PR_NRUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtProveedor").val(ui.item.id);
            $("#txtRucProveedor").val(ui.item.PR_NRUC);

          
        }
    })
	})


    $(document).ready(function(){
		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			 var txtRucProveedor=$("#txtRucProveedor").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "?c=ot01&a=BuscarOrdenesT",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"busqueda": txtRucProveedor
						  } );
						}	
					  },
					  	  
	  
	  
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
					});	
				$('#FacturasListaLoadMSG').fadeIn(1000).html('');		
				$("#MostrarInformacion").show();
			 
 			/* $.ajax({
			type: "POST",
			url: '?c=ot01&a=BuscarOrdenesT',
			  data: {
				busqueda: txtRucProveedor,
			  },
			dataType: "json",
			async : false, //espera la respuesta antes de continuar
			success: function(data) {
			$('#FacturasListaLoadMSG').fadeIn(1000).html(data);	
			$('#example>tbody').html('');
				var fila="";
				//console.log(data);
				item=0;				
					if(data[0].c_numot!=null){
					 for(var i=0;i<data.length;i++){
						  fila=fila.concat("<tr>",
								"<td><input type='hidden' name='txt_guia' class='cantidad' value='"+item+"'>"+(i+1)+"</td>",
								"<td><input type='hidden' name='txt_recepcion' class='cantidad' value='"+data[i].c_numot+"'>"+data[i].c_numot+"</td>",
								"<td><input type='hidden' name='DesVariedad' value='"+data[i].c_numot+"'>"+data[i].c_numot+"</td>",								
								"<td><input type='hidden' name='CalibreFruto' value='"+data[i].c_numot+"'>"+data[i].c_numot+"</td>",								
								"<td>4.5</td>",
								"<td>"+data[i].c_numot+"</td>",
								"<td><input type='hidden' name='CodTrazabilidad' value='"+data[i].c_numot+"'>"+data[i].c_numot+"</td>",
								"<td><input type='checkbox' "+data[i].c_numot+" value='"+data[i].c_numot+"' name='palett[]' id='palett"+data[i].c_numot+"' onclick='marcar(this);'></td>",
								"<td>"+data[i].estado+"</td></tr>"
								);		
					 }
					 $("#MostrarInformacion").show();
					 $('#example').append(fila);
					}else{
						$("#MostrarInformacion").hide("");
					}	
				},
			
		  });  */
		});	
	
    });

        $("#btnActualizar").click(function(){			
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Actualizandio Datos,Un momento, por favor...</div>');
			var numDocumento=$("#txtNumDocu").val();
			var idMoneda=$("#cboMoneda").val();
			var tipoCambio=$("#txtTcN").val();
			var subtotal=$("#txtSubtN").val();
			var igv=$("#txtIgvN").val();
			var total=$("#txtTotalN").val();
			//alert();
 			$.ajax({
			type: "POST",
			url: 'indexm.php',
			  data: {
				c: 'fac02',
				a: 'ActualizarFactura',
				numDocumento: numDocumento,
				idMoneda: idMoneda,
				tipoCambio: tipoCambio,
				subtotal: subtotal,
				igv: igv,
				total: total,
				returnAjax: true,
			  },
			dataType: "json",
			//data: {cotizacion:cotizacion},
			async : false, //espera la respuesta antes de continuar
			success: function(data) {
				//console.log(data);
				var datos=data;
			   console.log(datos);	
				$('#FacturasListaLoadMSG').fadeIn(1000).html(datos);
				limpiarCampos();
				 $("#MostrarInformacion").hide("");
			},
		  }); 
			//$("#MostrarInformacion").show();
		});		
	
/* 	function validarBusqueda(){
		if($("#cboTipDoc").val()=="SELECCIONE"){
			alert("seleccione un tipo de documento");
		}else{
			
		}
		
	} */
	function limpiarCampos(){
		$('#cboTipDoc').val("SELECCIONE");
		$('#txtSerie').val("");
		$('#txtNumero').val("");
		$('#txtClienteN').val("");
		$('#txtClienteN').val("");
		$('#cboMoneda').val("SELECCIONE");
		$('#txtTcN').val("");
		$('#txtSubtN').val("");
		$('#txtIgvN').val("");
		$('#txtTotalN').val("");
		$('#txtTotalN').val("");
	}
	
</script>