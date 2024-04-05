<?php

?>

 <!-- Content Wrapper. Contains page content -->
<form  action="?c=Comprobantes&a=GrabarDatosComprobantes&op=<?php echo $op ?>&IdListItem=<?php echo @$_GET['IdListItem'] ?>&token=<?php echo @$_GET['token']; ?>" method="post" id="FrmCotizaciones" name="FrmCotizaciones" onsubmit="return checkSubmit();">
    <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensaje Sistema</h4>
				</div>
				<div class="modal-body">
					<p>Seguro de Grabar Informacion</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
					<input type="submit" class="btn btn-outline"  id="btsubmit" value="Si Guardar"/>
				</div>
            </div>
            <!-- /.modal-content -->
        </div>
          <!-- /.modal-dialog -->
    </div>
        <!-- /.modal -->
		
		<div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensaje Sistema</h4>
              </div>
              <div class="modal-body">
                <div id="mensaje"></div>
              </div>
              <div class="modal-footer">
                <button type="button" id="btn1" class="btn btn-outline" data-dismiss="modal">Aceptar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

		<div class="modal modal-default fade" id="modal-aprobar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mensaje Sistema</h4>
              </div>
              <div class="modal-body">
                Desea <?php echo $btnPermisos; ?> la Cotizacion Seleccionada<br>
				<div id="divMotivo" <?php echo $DivMotivo?>>
					<label for="inputMotivo">Motivo</label>
					<input type="text" class="form-control" id="Motivo" name="Motivo" placeholder=""/>
				</div>
              </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left btn-default" data-dismiss="modal">No</button>
					<button type="button" class="btn btn-outline btn-default" onclick="Acciones()" data-dismiss="modal">Si</button>
				</div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
 <div class="box box-danger">
			                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
									<div class="col-sm-2">
										<button type="button" class="btn btn-block btn-success btn-default" onclick="validar()"></i> Grabar</button> 							
									</div>	

								<div class="col-sm-2">
									<a href="?c=Cotizaciones&a=Cotizaciones&IdListItem=<?php echo @$_GET['IdListItem'] ?>&token=<?php echo @$_GET['token']; ?>">
									<input type="button" class="btn btn-block btn-danger btn-default" value="Cancelar" /> </input> </a>                                       
								</div>
                                </div>
                             </div>       
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Comprobantes <?php echo $Titulo?></h3>

                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#DatosClientes" data-toggle="tab">Cabecera</a></li>
                        <li><a href="#DatosPedido" data-toggle="tab">Exportacion</a></li>
                        <li><a href="#Datosotros" data-toggle="tab">Detalles</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="DatosClientes">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Serie</label>
                                             <input type="text" class="form-control " placeholder=""  id="serie" name="serie" >
                                        </div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
											<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Fecha" id="fecha_comprobante" name="fecha_comprobante"  value="<?php 
											 if($op==2 or $op==3) {
												 echo substr($d_fecped,8,2).'/'.substr($d_fecped,5,2).'/'.substr($d_fecped,0,4);
												//echo $d_fecped;
											 } else {echo $FechaServidor;}?>">
											</div>
													</div>
                                    </div>
									<div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo de Comprobante</label>
                                                  <select id="tipoComprobante" name="tipoComprobante" class="form-control">
													<option value="BE" selected>Boleta para Exportacion</option>
													<option value="B">Boleta Local</option>
													<option value="F">Factura</option>
												  </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo de Moneda</label>
                                            <select class="form-control " style="width: 100%;" id="tipoMoneda" name="tipoMoneda">
                                                <option selected="selected" value="00">[Seleccione]</option>
                                                 <?php foreach($this->comun->ListarTiposMonedasTodos() as $TiposMonedas):?>
													 <option value="<?php echo $TiposMonedas->IdTipoMoneda; ?>"
													<?php if($op==2 or $op==3 or $op==5) {
													echo $TiposMonedas->IdTipoMoneda==$IdTipoMoneda ? 'selected' : '';	
													}?> >
													<?php echo $TiposMonedas->Moneda; ?> </option>
                                                <?php endforeach; ?>
                                                  
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.row -->
                           
                            <!-- /.box-body -->
                                <div class="row">
									<div class="col-md-3">
                                        <!-- /.form-group -->
										 <label>Precios</label>
                                        <div class="form-group">  
                                            <select class="form-control " style="width: 100%;" id="precios" name="precios" >
                                                <option selected="selected" value="00">[Seleccione]</option>
                                                 <?php foreach($this->comun->ListaOperacionAI() as $opAi):?>
													<option value="<?php echo $opAi->IdOperacionAI; ?>"
 													<?php if($op==2 or $op==3 or $op==5) {
													echo $opAi->IdOperacionAI==$c_oper ? 'selected' : '';	
													}?>> <?php echo $opAi->DescripcionOperacionAI; ?> </option>                                                                                              
                                                  <?php endforeach; ?>
                                                  
                                            </select>										
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
									 <div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Formas de  Pago</label>
                                            <select class="form-control " style="width: 100%;" id="forma_pago" name="forma_pago" >
                                                <option selected="selected" value="SE">[Seleccione]</option>
                                                 <?php foreach($this->comun->ListarTiposFormasPagosTodos() as $TiposFormaPago):?>
												<option value="<?php echo $TiposFormaPago->TP_CODI; ?>"
													<?php if($op==2 or $op==3 or $op==5) {
													echo $TiposFormaPago->TP_CODI==$c_codpga ? 'selected' : '';	
													}?>> <?php echo $TiposFormaPago->TP_DESC; ?> 
												</option>                                               
                                                  <?php endforeach; ?>
                                                  
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
									<div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Registrado Por</label>
                                           <input type="text" class="form-control" id="usrReg" name="usrReg"  readonly >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </div>
                            <!-- /.box-body -->
                                                      
                                <div class="row">
								<div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Cliente</label>
                                           <input type="text" class="form-control" id="Ent_Rsoc" name="Ent_Rsoc"  placeholder="Buscar Cliente"  >
										    <input type="hidden" class="form-control" id="Ent_Codi" name="Ent_Codi" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">                                       
                                        <div class="form-group">
                                            <label>NIF/RUC</label>
                                            <input class="form-control " type="text" placeholder="" id="Ent_Ruc"name="Ent_Ruc" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
								
                                    <div class="col-md-6">                                       
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input class="form-control " type="text" placeholder="" id="Ent_Dire"name="Ent_Dire"   >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
								<div class="row">
                                    <div class="col-md-12">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Observaciones</label>
                                            <input class="form-control " type="text" placeholder="" id="observacion_fact" name="observacion_fact"  >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->													
                            <!-- /.box-body -->
							 </div>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="DatosPedido">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
								    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tipo Producto</label>
                                            <select class="form-control " style="width: 100%;" id="TipoClassProducto" name="TipoClassProducto" onchange="ObtenerId()" >
                                                 <?php foreach($this->cotizaciones->ListarTabClasd() as $TipoClass):?>
													 <option value="<?php echo $TipoClass->tc_codi; ?>"
													<?php if($op==2 or $op==3 or $op==5) {
													echo $TipoClass->tc_codi=='000' ? 'selected' : '';	
													}?> >
													<?php echo $TipoClass->tc_desc; ?> </option>
                                                <?php endforeach; ?>
                                                  
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Producto</label>
                                            <input class="form-control " type="text" placeholder="Producto" id="Producto" name="Producto" value="<?php  ?>"  <?php echo $ObjetoDisable?> >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
									<div class="col-md-2">
                                        <div class="form-group">
                                            <label>Unidad</label>
											<select class="form-control " style="width: 100%;" id="Unidad" name="Unidad" <?php echo $ObjetoDisable?>>
                                                <option selected="selected" value="00">[Seleccione]</option>
                                                 <?php foreach($this->comun->ListarUnidadMedida() as $Medida):?>
													 <option value="<?php echo $Medida->DesMedida; ?>"
													<?php if($op==2 or $op==3 or $op==5) {
													echo $Medida->IdMedida==$IdTipoMoneda ? 'selected' : '';	
													}?> >
													<?php echo $Medida->DesMedida; ?> </option>
                                                <?php endforeach; ?>                                                  
                                            </select>
										</div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->                                                               
                                    <input class="form-control " type="hidden" placeholder=".input-sm" id="CodProducto" name="CodProducto" >
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Detalle Adicional</label>
                                            <input class="form-control " type="text" placeholder="Detalle" id="Detalle" name="Detalle" <?php echo $ObjetoDisable?> >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->                                   
									<div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>P. Unitario </label>
                                            <input class="form-control text-right" type="text" placeholder="" id="Punitario" name="Punitario" value="0.00" <?php echo $ObjetoDisable?> >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Dscto</label>
                                            <input class="form-control text-right" type="text" placeholder="" id="dscto" name="dscto"  value="0.00" <?php echo $ObjetoDisable?>/>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input class="form-control text-right" type="text" placeholder="" id="cantidad" name="cantidad" value="0" <?php echo $ObjetoDisable?>>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Agregar</label>
                                            <button type="button" class="btn btn-block btn-primary" id="agregar-cotizacion-btn" <?php echo $ObjetoDisable?>> <i class="glyphicon glyphicon-plus "></i></button>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
								<div class="row">
									<div class="form-group">
										<div class="table-responsive">
											<table id="table-det-cotizacion" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>Producto</th>														
														<th>Unidad</th>
														<th>Detalle Adicional</th>
														<th>P. Unitario</th>
														<th>Descuento</th>
														<th>Cantidad</th>
														<th>Importe</th>
														<th>Acciones</th>
													</tr>
												</thead>																			
												<tbody>											
													<?php  
													if($op==2 or $op==3 or $op==5 )
													{
													foreach($this->cotizaciones->CotizacionesDetalleSeleccionarPorIdCabecera($c_numped) as $DetalleCotizaciones):	 ?>
											    <tr>
														<input type="hidden" class="form-control"  name="c_codcla[]" id="c_codcla<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_codcla?>" readonly />
														<td>
														<input type="hidden" class="form-control"  name="CodProducto[]" id="CodProducto<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_codprd?>" readonly />
														<input type="hidden" class="form-control"  name="n_item[]" id="n_item<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->n_item?>" readonly />
														
														<input type="text" class="form-control"  name="Producto[]" id="Producto<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo  $DetalleCotizaciones->c_desprd?>" readonly />
										
														</td>
														
														<td><input type="text" class="form-control"  name="Unidad[]" id="Unidad<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->IN_UVTA?>" readonly/></td>
														<td><input type="text" class="form-control"  name="Detalle[]" id="Detalle<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_obsdoc?>" readonly/></td>
														<td><input type="text" align="" class="form-control text-right" name="Punitario[]" id="Punitario<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo number_format($DetalleCotizaciones->punitario,2)?>" <?php echo $ObjetoDisable?> /></td>
														<td><input type="text" class="form-control text-right" name="Dscto[]" id="Dscto<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo number_format($DetalleCotizaciones->descuento,2)?>" <?php echo $ObjetoDisable?>/></td>
														<td><input type="text" class="form-control text-right" name="Cantidad[]" id="Cantidad<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo number_format($DetalleCotizaciones->cantidad,2)?>" <?php echo $ObjetoDisable?>/></td>														
														<td><input type="text" class="form-control text-right" name="det_importe[]" id="det_importe<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo number_format($DetalleCotizaciones->total,2)?>"  readonly  />
														<td><button class="btn btn-danger btn-sm btn-borrar-det_cot" type="button" <?php echo $ObjetoDisable?>><i class="glyphicon glyphicon-remove"></i></button></td> 
												</tr>
													<?php endforeach;
													}
													?>	
												</tbody>
											</table>
										</div>
									</div>								
								</div>
                                <!-- /.row -->								
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group ">
											<label class="control-label col-xs-7 text-right">Sub-Total (<?php 
																											 if($op==2 or $op==3 or $op==5) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>)
																											</label>										
												<div class="col-xs-4">
													<input type="text" class="form-control text-right" name="subtotal-cot" id="subtotal-cot" value="<?php echo number_format($subtotal,2); ?>" readonly/>
												</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right">Descuento (<?php 
																											 if($op==2 or $op==3 or $op==5) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>)
																											</label>
												<div class="col-xs-4">
												  <input type="text" class="form-control text-right" name="desc-cot" id="desc-cot" value="<?php echo number_format($descuento,2) ?>" readonly/>
												</div>
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right">IGV (<?php 
																											 if($op==2 or $op==3 or $op==5) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>)
																											</label>
												<div class="col-xs-4">
												  <input type="text" class="form-control text-right" name="igv-cot" id="igv-cot" value="<?php echo number_format($Igv,2) ?>" readonly/>
												</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right" >Total (<?php 
																											 if($op==2 or $op==3 or $op==5) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>)
																											</label>
											<div class="col-xs-4">
											  <input type="text" class="form-control text-right" name="total-cot" id="total-cot" value="<?php echo number_format($total,2) ?>" readonly/>
											</div>
										</div>
									</div>
								</div>																
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="Datosotros">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="box box-info">
												<div class="box-header">
												</div>
												<!-- /.box-header -->
												<div class="box-body pad">												  
													<textarea id="glosa" name="glosa" rows="10" cols="80" >			
													<?php echo $c_obsped?>										 
													</textarea>												 
												</div>
											</div>
                                        </div>                      
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
    </section>    
    <!-- /.content --> 
</div>

<script>

$(document).ready(function() {
$("#FrmCotizaciones").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
if (e.which == 13) {
return false;
}
});
}); 
$(document).ready(function(){   
    $("#txtcliente").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=maestros&a=BuscarCliente&token=<?php echo @$_GET['token']; ?>', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.IdCliente,
                            value: item.CC_RAZO,
							CC_RAZO: item.PR_NRUC,
							CC_NRUC: item.CC_NRUC,
							CC_RESP: item.CC_RESP,
							CC_TELE: item.CC_TELE,
							CC_EMAI: item.CC_EMAI,
							CC_DIR1: item.CC_DIR1,
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtIdCliente").val(ui.item.id);
            $("#CC_NRUC").val(ui.item.CC_NRUC);
			$("#txtcliente").val(ui.item.CC_RAZO);
			$("#c_contac").val(ui.item.CC_RESP);
			$("#c_telef").val(ui.item.CC_TELE);
			$("#c_email").val(ui.item.CC_EMAI);
          
        }
    })

})
/**BUSCA PRODUCTO**/

function ObtenerId(){
			//var Tipoclass = $(this).val();
			var tipoclass=$("#TipoClassProducto").val();
			//alert(tipoclass);
			$("#Producto").autocomplete({	
				//var tipoclass=$("#TipoClassProducto").val();
				//alert(tipoclass);
		        dataType: 'JSON',
		source: function (request, response) 
		{
			jQuery.ajax
			({
				url: '?c=maestros&a=BuscarProductoCot&token=<?php echo @$_GET['token']; ?>', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    term: request.term,
					tabla: tipoclass
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.IdProducto,
                            value: item.Descripcion,
							IdProducto: item.IdProducto,
							Descripcion: item.Descripcion,
							Unidad: item.Unidad
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#CodProducto").val(ui.item.IdProducto);
            $("#Producto").val(ui.item.Descripcion);
			//$("#Unidad").val(ui.item.Unidad);						

		}
		
/* 				$("#Producto").blur(function(){
				var producto=$(this).val
					if(producto==$("#Producto").val(ui.item.Descripcion)){
						$("#agregar-cotizacion-btn").removeAttr('disabled');
				
						} 
				
			} */		
	
        
    })
} 

$('#IdTipoMoneda').on('change', function() {
	var SimboloMoneda; //guardara el simbolo obtenido
	var Moneda = $(this).val(); //obtiene el valor seleccioanada
//alert (Moneda);
  //petición ajax
  $.ajax({
    type: "POST",
    url: '?c=maestros&a=MostrarSimboloMoneda&token=<?php echo @$_GET['token']; ?>', //en procesosinv.controller.php
    dataType: "html",
    data: {Moneda:Moneda},
    async : false, //espera la respuesta antes de continuar
    success: function(respuesta) {
      SimboloMoneda =  respuesta; //repuesta
    },
  });

  //limpia el input
  $('#SimboloMoneda').html('');
  //agrega la direccion
  if(Moneda=="00")
	{
	$('.SimboloMoneda').html('');	
	}
	else 
	$('.SimboloMoneda').html(SimboloMoneda);
})


  function validar(){
	// alert("error");
 	var msg="";
	var error=false;
	var rowCount = $('#table-det-cotizacion>tbody >tr').length;
	var index = rowCount;
	
	if(document.FrmCotizaciones.IdTipoMoneda.options[document.FrmCotizaciones.IdTipoMoneda.selectedIndex].value=="00"){			
		msg += "- Ingresar el tipo de Moneda</br>";
		error=true;
		//return 0;
		//document.FrmCotizaciones.submit();		
	}
	if(document.FrmCotizaciones.TipoCambio.value==""){		
		msg += "- Ingresar El Tipo de Cambio</br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.		
		
	}
	if(document.FrmCotizaciones.txtcliente.value==""){		
		msg += "- Ingresar Datos del Cliente</br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.		
		
	}
	if(document.FrmCotizaciones.IdTipoVia.options[document.FrmCotizaciones.IdTipoVia.selectedIndex].value=="00"){			
		msg += "- Ingresar el tipo de Envio</br>";
		error=true;
		//return 0;
		//document.FrmCotizaciones.submit();		
	}
	if(document.FrmCotizaciones.c_codpga.options[document.FrmCotizaciones.c_codpga.selectedIndex].value=="SE"){			
		msg += "- Ingresar la forma de Pago</br>";
		error=true;
		//return 0;
		//document.FrmCotizaciones.submit();		
	}
	if(document.FrmCotizaciones.cod_oper.options[document.FrmCotizaciones.cod_oper.selectedIndex].value=="00"){			
		msg += "- Ingresar el tipo de operacion</br>";
		error=true;
		//return 0;
		//document.FrmCotizaciones.submit();		
	}
	if(document.FrmCotizaciones.txtIdCliente.value==""){			
		msg += "- Ingresar nombre del cliente valido</br>";
		error=true;
		//return 0;
		//document.FrmCotizaciones.submit();		
	}	
	if(index==0){		
		msg += "- Ingresar por lo menos un detalle </br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.		
		
	}
	if (error == true) {
	$("#mensaje").html(msg);
	$('#modal-warning').modal('show');

	return 0;

	}else 
	{
	$('#modal-success').modal('show'); 
	} 	  
  }






</script>
<script>
  $(function () {
	  
	   $('#FechaCoti').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	   $('#Fechavig').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	   //$('#Punitario').inputmask('0.00', { 'placeholder': '0.00' })
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('glosa')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  
  
  $(document).ready(function () {
    $('#FrmCotizaciones').validate({
        rules: {
            c_asunto: { c_asunto: true }
           /* pass: {
                required: true,
                minlength: 5
            },
            passConfir: {
                required: true,
                minlength: 5,
                equalTo: "#pass"
            },
            email: {
                required: true,
                email: true
            }*/
        },
        messages: {
            c_asunto: {
                required: "Ingrese Asunto...",
            }/*,
            pass: {
                required: "Please write a password...",
                minlength: "Password must have at least 5 characters...",
            },
            passConfir: {
                required: "Please write a password...",
                minlength: "Password must have at least 5 characters...",
                equalTo: "Password must match...",
            },
            email: {
                required: "Please write an email...",
                email: "Format must be: example@domain.com",
            }*/
        },
        submitHandler: function (form) {
            alert('oka')
        }
    });
});
</script>
<script>
function Acciones(){
	//alert($("#motivo").val());
	var permisos=<?php echo @$_GET['permiso']?>;
	var motivo=$("#Motivo").val();
 	if(permisos=='100')
	{
            $.ajax({
            type : 'post',
            cache: false,
            url : '?c=cotizaciones&a=AprobarCotizacion&token=<?php echo @$_GET['token']; ?>&IdListItem= <?php echo @$_GET['IdListItem']?>',
            data : {id_cotizacion:<?php echo $IdPediCab?>}, //Pass $id
            success : function(data){			
            //$('#modal-success').modal('show'); 
            window.location.href ='index.php?c=Cotizaciones&a=Cotizaciones&IdListItem=<?php echo @$_GET['IdListItem']?>&token=<?php echo@$_GET['token']?>';

        }
    });
	} 
	if(permisos=='101')
	{
            $.ajax({
            type : 'post',
            cache: false,
            url : '?c=cotizaciones&a=AnularCotizacion&token=<?php echo @$_GET['token']; ?>&IdListItem= <?php echo @$_GET['IdListItem']?>',
            data : {id_cotizacion:<?php echo $IdPediCab?>}, //Pass $id
            success : function(data){			
            //$('#modal-success').modal('show'); 
            window.location.href ='index.php?c=Cotizaciones&a=Cotizaciones&IdListItem=<?php echo @$_GET['IdListItem']?>&token=<?php echo@$_GET['token']?>';

        }
    });
	}
	if(permisos=='102')
	{
		var parametros = {
                "id_cotizacion" :<?php echo $IdPediCab?>,
                "motivo" :motivo
			};
            $.ajax({
            type : 'post',
            cache: false,
            url : '?c=cotizaciones&a=LiberarCotizacion&token=<?php echo @$_GET['token']; ?>&IdListItem= <?php echo @$_GET['IdListItem']?>',
            data : parametros, //Pass $id
            success : function(data){			
            //$('#modal-success').modal('show'); 
            window.location.href ='index.php?c=Cotizaciones&a=Cotizaciones&IdListItem=<?php echo @$_GET['IdListItem']?>&token=<?php echo@$_GET['token']?>';

        }
    });
	} 	
	
}

</script>
<script>




$(document).ready(function (){
	$("#Punitario").numeric('.');
	$("#dscto").numeric('.');
	$("#cantidad").numeric();
	$("#TipoCambio").numeric('.');
  $("#agregar-cotizacion-btn").click(function(e){
	 //alert($("#Producto").val());
	 
    var cod_oper = $("#cod_oper").val();
    var Producto = $("#Producto").val();
    var c_codcla = $("#TipoClassProducto option:selected").val();
    //var tc_desc = $("#tc_desc").val();
    var CodProducto = $("#CodProducto").val();
    var Unidad = $("#Unidad").val();
    var Detalle = $("#Detalle").val();
    var Punitario = $("#Punitario").val();
    var Dscto = $("#dscto").val();
    var Cantidad = $("#cantidad").val();
	var det_importe=(Cantidad*Punitario)-Dscto;
	
    var error = false;
    var msg = "";
	if(Producto == '' || CodProducto == ''){
      msg += 'Ingrese un producto valido.<br>';
	  
	  $("#Producto").val('');
	  $("#Producto").focus();
      error = true;
    }
	if(Unidad == '00'){
      msg += 'Ingrese Tipo de unidad.<br>';
      error = true;
    }

	if(Punitario == '' || Punitario == '0.00' ){
      msg += 'Ingrese Costo Unitario Valido.<br>';
      error = true;
	  	$("#Punitario").val('');
		$("#Punitario").focus();
    }else{
      Punitario = parseFloat(Punitario);
    }
	
	if(validar_descuento(Punitario, Dscto)){
      msg += 'El descuento no debe ser mayor al precio.<br>';
      error = true;
    }			
	
	if(Cantidad == '' ||Cantidad == '0'){
      msg += 'Ingrese Cantidad Valida.<br>';
      error = true;
	  $("#cantidad").val('');
	  $("#cantidad").focus();
    }
	else{
      Cantidad = parseFloat(Cantidad);
    }
	
	if(cod_oper == '00'){
      msg += 'Seleccione tipo de Operacion en La pestaña Datos de Cliente.<br>';
      error = true;
    }
	
	
	if (error == true) {
	$("#mensaje").html(msg);
	$('#modal-warning').modal('show');
	
		
/* 	$("#btn1").click(function(){
        $("#myModal").modal("hide");
		$("#Producto").val('');
		$("#Producto").focus();
    });
	 $("#modal-warning").on('hidden.bs.modal', function () {
            $("#Producto").val('');
            $("#Producto").focus();
    });
	
	$("#Producto").val(''); */
	return 0;

	}else{

		agregarParametroTabla(c_codcla,Producto,CodProducto,Unidad,Detalle,Punitario,Dscto,Cantidad,det_importe);

	}
  });
  
    $('body').on('click','.btn-borrar-det_cot', function(e){
    $(this).parent('td').parent('tr').remove();
    reindexarDetalle();
    calcularTotales();
  });
    function reindexarDetalle(){
    var rows = $('#table-det-cotizacion>tbody >tr');
    if(rows.length < 1){
      $("#detalleAgregado").removeAttr('value');
    }
    rows.each(function( index, element ) {
      //$(this).find('td:first').text(index+1);
			$(this).find('.Producto').attr('name', 'Producto[' + index + ']');
			$(this).find('.Unidad').attr('name', 'Unidad[' + index + ']');
			$(this).find('.Detalle').attr('name', 'Detalle[' + index + ']');
			$(this).find('.Punitario').attr('name', 'Punitario[' + index + ']');
			$(this).find('.Dscto').attr('name', 'Dscto[' + index + ']');
			$(this).find('.Cantidad').attr('name', 'Cantidad[' + index + ']');
			$(this).find('.det_importe').attr('name', 'det_importe[' + index + ']');
    });
  }
   function validar_descuento(precio, descuento){
    return (descuento > precio);
  }
 
 
 
   function calcularTotales(){
	//alert(total_t);
    var subtotal = 0.0;
	var descuento = 0.0;
			
	$('input[name^="Dscto"]').each(function(index, element){
      var desc = parseFloat($(this).val());
      descuento += desc;	  
    });
	 $("#desc-cot").val(descuento);
		
		
    $('input[name^="det_importe"]').each(function(index, element){
      var importe = parseFloat($(this).val());
      subtotal += importe;	      
    });
	$("#subtotal-cot").val(subtotal);
	
  // 
    var operacion = $("select[name=cod_oper]").val();
    var igv;
    //
    if(operacion == '1'){
      igv = subtotal * <?php echo $IgvServidor; ?>;
    }else{
      igv = 0;
    }
    $("#igv-cot").val(igv.toFixed(2));
    total = subtotal + igv;
    $("#total-cot").val(total.toFixed(2));
  }
  
  function checkSubmit() {
		//alert();
        document.getElementById("btsubmit").value = "Enviando...";
        document.getElementById("btsubmit").disabled = true;
        return true;
    }
	
$('#table-det-cotizacion').on('keyup paste', ':input', function() { 
	/* var value = $(this).val(); //obtiene el valor actual del input.
	var name = $(this).prop('name');
   
	 var total_t = 0.0;//*****
	var cantidad_t = 0.0;//*****
	var punitario_t = 0.0;//*****
	var descuento_t = 0.0;//*****
	// $("#desc-cot").val(0);
	
	cantidad_t=$('input[name^="Cantidad"]').val();//****
	punitario_t=$('input[name^="Punitario"]').val();//****
	descuento_t=$('input[name^="Dscto"]').val();//*****
	total_t = (cantidad_t*punitario_t)-descuento_t;//*****
	
   	$("#det_importe").val(total_t);//*****
   
    if (value.length > 0){ //si el campo no esta vacio
    console.log(name+": "+value);
   } */
   	//alert("sssss");
	console.log($(this).val());
	CalcularImporte();
   	calcularTotales(); 
}); 
 
function CalcularImporte() {
				//alert("sss");
				//$GranTotal=0;
				$("input[name='Producto[]']").each(function(index, value){
	        	    $PUnitario = $("#Punitario" + index + "").val();
	        	    $Cantidad = $("#Cantidad" + index + "").val();
	        	    $Descuento = $("#Dscto" + index + "").val();
	        	    $Importe = ($PUnitario * $Cantidad) - $Descuento;
	        	    $("#det_importe" + index + "").val($Importe);
	        	    //$GranTotal += $Importe;
	        		//$("#total").val($GranTotal);
	        	});
			}

   
 function agregarParametroTabla(c_codcla,Producto,CodProducto,Unidad,Detalle,Punitario,Dscto,Cantidad,det_importe) {
		var rowCount = $('#table-det-cotizacion>tbody >tr').length;
		var index = rowCount;
		//var importe=(Cantidad*Punitario)-Dscto
		//alert(index);
		var fila = `<tr>
			<td>
				<input type="hidden" class="form-control " name="CodProducto[]" id="CodProducto${index}" value="${CodProducto}"/>
				<input type="hidden" class="form-control text-left"  name="c_codcla[]" id="c_codcla${index}" value="${c_codcla}" readonly/>
				<input type="text" class="form-control text-left" name="Producto[]" id="Producto${index}" value="${Producto}" readonly/>
				 
			</td>
			<td>
				<input type="text" class="form-control text-left"  name="Unidad[]" id="Unidad${index}" value="${Unidad}" readonly/>
			</td>
			<td>
				<input type="text" class="form-control text-left"  name="Detalle[]" id="Detalle${index}" value="${Detalle}" readonly/>
			</td>
			<td>
				<input type="text" class="form-control text-right" name="Punitario[]" id="Punitario${index}" value="${Punitario}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="Dscto[]" id="Dscto${index}" value="${Dscto}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="Cantidad[]" id="Cantidad${index}" value="${Cantidad}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="det_importe[]" id="det_importe${index}" value="${det_importe}"  readonly  />
			</td>
			<td>
				<button class="btn btn-danger btn-sm btn-borrar-det_cot" type="button"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
		</tr>`;
		$('#table-det-cotizacion > tbody:last-child').append(fila); 
		 calcularTotales();
		
		$("#TipoClassProducto").val('000');
		$("#Producto").val('');
		$("#CodProducto").val('');
		$("#Unidad").val('00');
		$("#Detalle").val('');
		$("#Punitario").val('0.00');
		$("#dscto").val('0.00');
		$("#cantidad").val('0');
	}
	
	


})
</script>
<script src=".\assets\js\jquery.numeric.js"></script>
</form>



