<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-eir-entrada-oc-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de EIR Entrada Pendientes por Orden de Compra...</div>
        <div class="panel-body">
            <a class="btn btn-primary" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListaEirEntrada">VOLVER</a>
            <a target="_blank" class="btn btn-primary" href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerDetalleRegUpd&cod_tipo=021&descripcion=MAQUINA+REEFER">REGISTRAR MAQUINA</a>
            <br/><br/>
           <table id="example" class="table table-bordered table-hover table-striped dt-responsive">   
				<thead>
                    <tr>
                        <th>Item</th>
                        <th>Orden de Compra</th>
                        <th>Proveedor</th>
                        <th>Cod. Equipo</th>
                        <th>Equipo</th>
                        <th>Fecha de Oc</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
						<tbody>
						<?php $i=0;
								foreach($this->model->consultarEirEntradaOC2() as $Eir):?>
						<tr>
                                
								<?php $serie=$Eir->c_codequipo?>
                                <td><?php $i++; echo $i ?></td>
                                <td><?php echo $Eir->c_numeoc ?></td>
                                <td><?php echo $Eir->c_nomdes ?></td>
                                <td><?php echo $Eir->c_desprd ?></td>    
                                <td><?php echo substr($Eir->c_desprd,0,1)."-".$Eir->c_codequipo ?></td>    
								<td><?php echo date("d-m-Y", strtotime($Eir->d_fecoc)) ?></td>  
								<td><a href="?c=inv03&a=RegEirEntradaOc&serie=<?php echo $serie?>&mod=<?php echo $_REQUEST['mod']?>&udni=<?php echo $_REQUEST['udni']?>" class="btn btn-success btn-xs" title="Editar" target="_blank"><span class="glyphicon glyphicon-ok" aria-hidden="true"> Generar</span></a></td>  
                            </tr>
									<?php 
								endforeach;
								?>
						</tbody>
                        <tfoot>
                        </tfoot>	
            </table>
        </div>
    </div>
</div>
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>-->
<script>
  $(function () {
    $('#example2').DataTable({
		'ordering'    : false,
	})
    $('#example').DataTable({
		
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	    dom: 'Bfrtip',
	  'buttons': [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
  })
</script>