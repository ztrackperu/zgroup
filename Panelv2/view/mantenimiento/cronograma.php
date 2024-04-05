<div class="container-fluid">

<br>
<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-danger">
				<div class="panel-heading">LISTA DE CRONOGRAMAS VENCIDOS</div>
					<div class="panel-body">
						<div class="col-xs-6">
							<h4>Usted Cuenta con los siguientes vencimientos Favor de verificar: </h4>
							<h4>Para Actualizar el reporte favor de ingresar a
							comercial/cotizaciones/cronograma alquiler</h4>
							<h4>Buscar el cronograma por numero de cotizacion y en la opcion accion selecciona ver detalle</h4>
						</div>
						<div class="col-xs-6">
							<h4 style="color:green">Color verde: Cronogramas con dias por vencer mayores o iguales a 3 </h4>
							<h4 style="color:blue">Color Azul: Cronogramas con dias por vencer mayores que cero y menor o igual que 2 </h4>
							<h4 style="color:red">Color Rojo: Cronogramas con dias vencidos menores que cero</h4>
						</div>
					</div>
		</div>
	</div>
</div>
<div class="row">
 <div class="col-xs-7">
    <div class="panel panel-success">
        <div class="panel-heading">LISTA DE CRONOGRAMAS</div>
			<div class="panel-body" id='divmodelos'>
					 <div class="box-body table-responsive no-padding">
                    <table id="vencimientos" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cot.Madre</th>
                                <th>Cliente</th>
                                <th>Cuota</th>
                                <th>Vencimiento</th>
                                <th>Dias</th>
                                <th>Link</th>
                            </tr>
                        </thead>
						<tbody>
						</tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div><!--box-body --> 			
			</div>
    </div>
</div>
 <div class="col-xs-5">
    <div class="panel panel-warning">
        <div class="panel-heading">CRONOGRAMAS ABIERTOS SIN ITEMS POR FACTURAR</div>
			<div class="panel-body">
				<div class="box-body table-responsive no-padding">
                    <table id="no_pendientes" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cotizacion</th>
                                <th>Cliente</th>
                                <th>Est.Cuotas</th>
                                <th>Est.Cronograma</th>
                            </tr>
                        </thead>
						<tbody>
						</tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div><!--box-body --> 
		

			</div>
    </div>
</div>
</div>
	
</div>
</div>
<script>
var udni=$("#udni").val();
var mod=$("#mod").val();
$("#vencimientos").dataTable().fnDestroy();
var table = $('#vencimientos').DataTable( {
    //ajax: "data.json"
	 "ajax": {
			"url": "indexm.php?c=mm01&a=ListarVencimientosCronograma",
			"data": function ( d ) {
 			return $.extend( {}, d, {
				"udni": udni,
				"mod": mod
			 } ); 
			}	
			  },
	//"dom": 'rtip',
	"paging": false

} );
 
setInterval( function () {
    table.ajax.reload();
}, 90000 );

$("#no_pendientes").dataTable().fnDestroy();
var table2 = $('#no_pendientes').DataTable( {
    //ajax: "data.json"
	 "ajax": {
			"url": "indexm.php?c=mm01&a=ListarVencimientosNopendientes",
			"data": function ( d ) {
 			return $.extend( {}, d, {
				"udni": udni,
				"mod": mod
			 } ); 
			}	
			  },
	//"dom": 'rtip',
	"paging": false

} );
 
setInterval( function () {
    table2.ajax.reload();
}, 90000 );


</script>