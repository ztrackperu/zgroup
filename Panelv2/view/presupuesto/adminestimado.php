<?php if (isset($_GET['CG'])) {
	if($_GET['CG']==true){
 ?>
<script>
$(document).ready(function()
{
  // id de nuestro modal
  $("#modal-info").modal("show");
});
</script>
<div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensaje Sistema</h4>
            </div>
            <div class="modal-body">
                <p>El registro fue grabado correctamente, desea visualizarla ahora?</p>
            </div>
            <div class="modal-footer">         
                 <a id="enlace" class="btn btn-outline" target="_blank" href="?c=Cotizaciones&a=ImprimeCotizacion&op=1&IdListItem=<?php echo @$_GET['IdListItem'] ?>&IdCabecera=<?php echo @$_GET["IdCabecera"] ?>&token=<?php echo @$_GET['token']; ?>">
                              <i class="fa fa-clone "></i> Si</a>
				<a class="btn btn-outline" href="indexpr.php?c=p08&udni=<?php echo @$_REQUEST['udni'] ?>&mod=1">
                    <i class="fa fa-clone "></i> No</a>			  		  
            </div>
        </div>
   <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
        <!-- /.modal -->
<?php 
	}}
?>

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid">
	<div class="panel panel-default">
			<div class="panel-heading">Accion</div>
				<div class="panel-body">
					<a type="button" class="btn btn-primary"  href="?c=p09&a=RegEstimado&op=1&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Agregar Nuevo Estimado</a>
				</div>
	</div>
    <div class="panel panel-success">
        <div class="panel-heading">Listado de Estimaciones Realizadas</div>
			<div class="panel-body">
					 <div class="box-body table-responsive no-padding">
                    <table id="Presupuestos" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ruc Cliente</th>
                                <th>Cliente</th>
                                <th>Cod Producto</th>
                                <th>Desc Producto</th>
                                <th>Modelo Producto</th>
                                <th>Serie Producto</th>
                                <th>Fecha Ingreso</th>
                                <th>Moneda</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
						<tbody>
						 <?php  foreach($this->model->ListarEstimaciones() as $Estimados):?>
						<tr>                           
                                <td><?php echo $Estimados->Id_cabpre ?></td>
                                <td><?php echo $Estimados->Cod_cliente ?></td> 
                                <td><?php echo $Estimados->cc_razo ?></td> 
                                <td><?php echo $Estimados->Cod_producto ?></td> 
                                <td><?php echo $Estimados->in_arti ?></td> 
                                <td><?php echo $Estimados->Modelo ?></td> 
                                <td><?php echo $Estimados->Serie_producto ?></td> 
                                <td><?php echo $Estimados->Fecha_ingreso ?></td> 
                                <td><?php echo $Estimados->moneda ?></td> 
                                <td><?php echo $Estimados->TotalG ?></td> 
                                <td>
									<div class="dropdown">
                                            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">Accion <span class="caret"></span></a>
                                                <ul class="dropdown-menu" role="menu">                                           
                                                <li><a href="?c=p02&a=RegEstimado&op=<?php echo '2'; ?>&IdCab=<?php echo $Estimados->Id_cabpre?>&udni=<?php echo $_GET["udni"]?>&mod=1">Editar</a></li>
                                                <li><a href="?c=p02&a=RegEstimado&op=<?php echo '3'; ?>&IdCab=<?php echo $Estimados->Id_cabpre?>&udni=<?php echo $_GET["udni"]?>&mod=1">Consultar</a></li>
                                                <li><a href="?c=p02&a=RegEstimado&op=<?php echo '4'; ?>&IdCab=<?php echo $Estimados->Id_cabpre?>&udni=<?php echo $_GET["udni"]?>&mod=1" target="_blank">Imprimir</a></li>                      
                                                </ul>
                                    </div>
								</td> 
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
	
</div>
<script>
  $(function () {
    $('#Presupuestos').DataTable({
		'ordering'    : false,
	})
	$('#marcas').DataTable({
		'ordering'    : false,
	})
    $('#example').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
