<!--modal de eliminacion de Equipo Temporal-->
<div class="modal fade" id="my_modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="agregarModMarc" class="form-horizontal" method="post" action="?c=mm02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AgregarModMar">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Nuevo Modelo / Marca</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input name="serie" id="serie" type="hidden" />
                        <label class="control-label col-xs-4">Seleccione Equipo</label>
                        <div class="col-xs-8">
                           <select class="form-control input-sm" name="tip_equipo" id="tip_equipo" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="001">DRY</option>
								<option value="002">REEFER</option>
								<option value="003">GENERADORES</option>
								<option value="012">TRANSFORMADOR</option>
								<option value="004">CARRETA</option>
								<option value="015">MODULOS</option>
								<option value="021">MAQUINAS</option>
								<option value="005">EQUIPO AIRE ACONDICIONADO</option>
								<option value="000">OTROS PRODUCTOS</option>
								<option value="012">POWER PACK</option>								
							</select>
                        </div>
                    </div>
					<div class="form-group">
                        <input name="serie" id="serie" type="hidden" />
                        <label class="control-label col-xs-4">Seleccione Tipo</label>
                        <div class="col-xs-8">
                           <select class="form-control input-sm" name="tip_mm" id="tip_mm" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="001">MARCA</option>
								<option value="002">MODELO</option>						
							</select>
                        </div>
                    </div>
					<div class="form-group">
                        <input name="serie" id="serie" type="hidden" />
                        <label class="control-label col-xs-4">Descripcion</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="descripcion"/>
                        </div>
                    </div>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--fin modal eliminacion de Equipo Temporal-->

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-todos-equipos-container">


<div class="row">
	<div class="panel panel-default">
			<div class="panel-heading">Accion</div>
				<div class="panel-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my_modalagregar">Agregar Nuevo - Modelo / Marca</button>
				</div>
	</div>
</div>
</div>
<div class="row">
 <div class="col-xs-6">
    <div class="panel panel-success">
        <div class="panel-heading">Listado de Modelos</div>
			<div class="panel-body" id='divmodelos'>
					 <div class="box-body table-responsive no-padding">
                    <table id="modelos" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripcion</th>
                            </tr>
                        </thead>
						<tbody>
						<tr>
                                <?php  foreach($this->model->ListarModelosTodos() as $Modelos):?>
                                <td><?php echo $Modelos->C_NUMITM ?></td>
                                <td><?php echo $Modelos->C_DESITM ?></td> 
                        </tr>
                                <?php endforeach;?>
						</tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div><!--box-body --> 			
			</div>
    </div>
</div>
 <div class="col-xs-6">
    <div class="panel panel-warning">
        <div class="panel-heading">Listado de Marcas</div>
			<div class="panel-body">
				<div class="box-body table-responsive no-padding">
                    <table id="marcas" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripcion</th>
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
<script>
  $(function () {
     $('#modelos').DataTable({
		'ordering'    : false,
	}) 
	/* $('#marcas').DataTable({
		'ordering'    : false,
	}) */
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	  
    })
  })
$("#marcas").dataTable().fnDestroy();
var table = $('#marcas').DataTable( {
    //ajax: "data.json"
	 "ajax": {
			"url": "indexm.php?c=mm01&a=ListarMarcasTodos",
			"data": function ( d ) {
/* 			return $.extend( {}, d, {
				"tipo": tipo,
				"codigo": codigo,
				"dni": udni
			 } ); */
			}	
			  },
	
	
} );
 
setInterval( function () {
    table.ajax.reload();
}, 30000 );

</script>