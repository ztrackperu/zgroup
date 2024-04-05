<form id="frminventariar" name="frminventariar" method="post" action="indexinv.php?c=inv01&a=inventariartemp2&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
    <div class="modal fade" id="open_my_modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="panel-heading">INVENTARIAR EQUIPOS.</div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Equipo</label><input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
                        <input type="text" class="form-control" id="idequipo" name="idequipo" readonly="readonly" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Referencia</label>
                        <input type="text" class="form-control" id="referencia" name="referencia" value="<?php if($_GET['c_fisico2']=="null"){echo "";}else{echo $_GET['c_fisico2'];}?>"/>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label"><B>PTI</B></label>

                        <select class="form-control" id="pti" name="pti">
                            <option value=""><B>SELECCIONAR</B></option>
                            <option <?php if($_GET['pti']=='OPERATIVO'){echo "selected";}?> value="OPERATIVO" >OPERATIVO</option>
                            <option <?php if($_GET['pti']=='DAMAGE'){echo "selected";}?> value="DAMAGE">DAMAGE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label"><B>Ubicacion</B></label>
                            <select class="form-control" id="c_codalm" name="c_codalm">
                                <option value=""><B>SELECCIONAR</B></option>
                                <option <?php if($_GET['c_codalm']=='000001'){echo "selected";}?> value="000001">PRINCIPAL</option>
                                <option <?php if($_GET['c_codalm']=='000003'){echo "selected";}?> value="000003">GAMBETA</option>
                                <option <?php if($_GET['c_codalm']=='000004'){echo "selected";}?> value="000004">ALQUILADO</option>
                                <option <?php if($_GET['c_codalm']=='000005'){echo "selected";}?> value="000005">VENDIDO</option>
								 <option <?php if($_GET['c_codalm']=='000006'){echo "selected";}?> value="000006">SULLANA</option>

                            </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Tipo</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value=""><B>SELECCIONAR</B></option>
                            <option <?php if($_GET['tipo']=='CATEGORIA-A'){echo "selected";}?> value="CATEGORIA-A">CATEGORIA-A</option>
                            <option <?php if($_GET['tipo']=='CATEGORIA-B'){echo "selected";}?> value="CATEGORIA-B">CATEGORIA-B</option>
                            <option <?php if($_GET['tipo']=='CATEGORIA-C'){echo "selected";}?> value="CATEGORIA-C">CATEGORIA-C</option>
                            <option <?php if($_GET['tipo']=='CATEGORIA-D'){echo "selected";}?> value="CATEGORIA-D">CATEGORIA-D</option>
                            <option <?php if($_GET['tipo']=='CATEGORIA NUEVO'){echo "selected";}?> value="CATEGORIA-NUEVO">CATEGORIA-NUEVO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Marca</label>
                        <select name="c_codmar" id="c_codmar" class="form-control input-sm"> 
                            <option value="SELECCIONE">SELECCIONE</option>
                            <?php foreach($this->maestro->ListaMarcaCaja() as $mcaja):	 ?>                                   
                            <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $mcaja->C_NUMITM == $_GET['c_codmar']? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
                            <?php  endforeach;	 ?>
                        </select>
<!--                        <input type="text" class="form-control" id="c_codmar" name="c_codmar" value="<?php //if($_GET['c_codmar']=="null"){echo "";}else{echo $_GET['c_codmar'];}?>"/>-->
                    </div>
                        <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Fecha Inventario</label>
                        <input name="fechainv" type="text" class="form-control datepicker input-sm" readonly="readonly" id="fechainv" value="<?php echo date("d/m/Y"); ?>">
                    </div>
                </div>
                Nota: Una vez procesado no podrá reversar el proceso.
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success btn-inventariar-equipo" onclick="inventariar()">Grabar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-danger">
        <div class="panel-heading">Buscar Codigo de Equipo.</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Seleccione tipo de Equipo</label>
						<div class="col-lg-4">
						  <select class="form-control input-sm" name="c_codmar2" id="c_codmar2" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="001">DRY</option>
								<option value="002">REEFER</option>
								<option value="026">ISOTERMICO</option>
								<option value="003">GENERADORES</option>
								<option value="030">GPS</option>
								<option value="012">TRANSFORMADOR</option>
								<option value="004">CARRETA</option>
								<option value="015">MODULOS</option>
								<option value="021">MAQUINAS</option>
								<option value="022">MADURADOR</option>
								<option value="005">EQUIPO AIRE ACONDICIONADO</option>
								<option value="000">OTROS PRODUCTOS</option>
								<option value="012">POWER PACK</option>								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Codigo de Equipo</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtCodigo" name="txtCodigo" placeholder="Ejemplo: ZGRU123456-1 y/o 12345 (colocando solo algunos numeros del equipo..)">					
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <div class="panel panel-success">
        <div class="panel-heading"> Datos del Equipo Buscado</div>
		<div id="FacturasListaLoadMSG">           
        </div>
		<form class="form-horizontal" role="form">
        <div class="panel-body" id="MostrarInformacion" style="display:none">			
			</br>
			<div class="row">
				<div class="col-lg-12">			
					<div class="box-body table-responsive no-padding">
						<table id="example" class="table table-bordered table-striped">              
							<thead>
								<th>Id Equipo</th>
								<th>Descripcion</th>
								<th>Categoria</th>
								<th>Codigo Anterior</th>
								<th>Nota Ingreso</th>
								<th>Orden Compra</th>
								<th>Fecha Compra</th>
								<th>Nro Dua</th>
								<th>Fec Inventario</th>
								<th>Obs Inventario</th>
								<th>PTI</th>
								<th>Ubicacion</th>
								<th>Tipo</th>
								<th>Marca</th>
								<th>Marca Maquina</th>
								<th>Año</th>
								<th>Año Maquina</th>
								<th>Estado</th>
								<th>Estado Almacen</th>
								<th>Precio de Venta</th>
								<th>Ver Detalle</th>
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
  $(document).ready(function(){
		 $("#MostrarInformacion").hide();	
			$("#btnMostrar").click(function(){
				$("#example").dataTable().fnDestroy();
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 
			  var codigo=$("#txtCodigo").val();			 	
			  var tipo=$("#c_codmar2").val();			 	
			  var udni=$("#udni").val();			 	
					var tabla=$('#example').dataTable( {
					  "ajax": {
						"url": "indexa.php?c=14&a=CodigoBuscar",
						"data": function ( d ) {
							return $.extend( {}, d, {
							"tipo": tipo,
							"codigo": codigo,
							"dni": udni
						  } );
						}	
					  },
					"language": idioma_espanol,  	  
	  
	  
	    dom			: 'Bfrtip',
	  ordering: true,
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
		});	
	var idioma_espanol = {    
       "sProcessing":      "Procesando...",
           "sLengthMenu":      "Mostrar _MENU_ registros",
           "sZeroRecords":     "No se encontraron resultados",
           "sEmptyTable":      "Ningún dato disponible en esta tabla",
           "sInfo":            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
           "sInfoEmpty":       "Mostrando registros del 0 al 0 de un total de 0 registros",
           "sInfoFiltered":    "(filtrado de un total de _MAX_ registros)",
           "sInfoPostFix":     "",
           "sSearch":          "Buscar:",
           "sUrl":             "",
           "sInfoThousands":   ",",
           "sLoadingRecords": "Cargando...",
           "oPaginate": {        
           "sFirst":     "Primero",
                   "sLast":      "Último",
                   "sNext":      "Siguiente",
                   "sPrevious": "Anterior"    
       },
           "oAria": {        
           "sSortAscending":   ": Activar para ordenar la columna de manera ascendente",
                   "sSortDescending": ": Activar para ordenar la columna de manera descendente"    
       }
   }	
//$link2 = 'indexinv.php?c=inv01&a=Editar&mod=1&udni='.$udni.'&data-id='.$data[$i]->c_idequipo.'&data-ref='.$data[$i]->c_fisico2.'&data-pti='.$data[$i]->pti.'&data-c_codalm='.$data[$i]->c_codalm.'&data-tipo='.$data[$i]->tipo.'&data-c_codmar='.$data[$i]->c_codmar.'&data-c_anno='.$data[$i]->c_anno;
	
$('#open_my_modal4').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id'); // Extract info from data-* attributes
  var ref = button.data('ref'); // Extract info from data-* attributes
  var pti = button.data('pti'); // Extract info from data-* attributes
  var c_codalm = button.data('c_codalm'); // Extract info from data-* attributes
  var tipo = button.data('tipo'); // Extract info from data-* attributes
  var c_codmar = button.data('c_codmar'); // Extract info from data-* attributes
  var c_anno = button.data('c_anno'); // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body #idequipo').val(id);
  modal.find('.modal-body #referencia').val(ref);
  modal.find('.modal-body #pti').val(pti);
  modal.find('.modal-body #c_codalm').val(c_codalm);
  modal.find('.modal-body #tipo').val(tipo);
  modal.find('.modal-body #c_codmar').val(c_codmar);
})
	
    });			

    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
</script>
