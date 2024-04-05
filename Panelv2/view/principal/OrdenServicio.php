<?php
/* $IdPediCab="";
$c_numped="";
$IdTipoMoneda="";
$Moneda="";
$n_tcamb="";
$d_fecped="";
$d_fecvig="";
$c_codcli="";
$c_nomcli="";
$CC_NRUC="";
$c_contac="";
$c_telef="";
$c_email="";
$c_via="";
$Via="";
$c_codpga="";
$TP_DESC="";
$c_asunto="";
$c_codven="";
$c_oper="";
$DescripcionOperacionAI="";
$subtotal="";
$descuento="";
$Igv="";
$total="";
$c_obsped="";

$ObjetoDisable="";
$btnGrabar="";
$btnCancelar="";
$DivBtnAprobar="";
$DivMotivo="";
$btnPermisos="";
$Permisos="";
$ControlGrabado =false;

if (isset($_REQUEST['op'])) {
	$op=$_REQUEST['op'];
	switch ($op) {
		case 1://Agregar
			$IdPediCab="";
			$c_numped="";
			$IdTipoMoneda="";
			$Moneda="";
			$n_tcamb="";
			$d_fecped="";
			$d_fecvig="";
			$c_codcli="";
			$c_nomcli="";
			$CC_NRUC="";
			$c_contac="";
			$c_telef="";
			$c_email="";
			$c_via="";
			$Via="";
			$c_codpga="";
			$TP_DESC="";
			$c_asunto="";
			$c_codven="";
			$c_oper="";
			$DescripcionOperacionAI="";
			$subtotal="0.00";
			$descuento="0.00";
			$Igv="0.00";
			$total="0.00";
			$c_obsped="";
			$ObjetoDisable2="";
			$ObjetoDisable="";
			$ObjetoDisableAgregar='disabled="disabled"';
			$btnCancelar='value="Cancelar"'; 
			$DivBtnAprobar="style='display: none;'";
			$DivMotivo="style='display: none;'";
		break;
		case 2 or 3 or 5://Modificar /consultar
 		 foreach($this->model->OrdenTDet($_REQUEST['IdCabecera']) as $CotizacionCab):
			$IdPediCab=$CotizacionCab->IdPediCab;
			$c_numped=$CotizacionCab->c_numped;
			$IdTipoMoneda=$CotizacionCab->IdTipoMoneda;
			$SimboloMoneda=$CotizacionCab->Simbolo;
			$Moneda=$CotizacionCab->Moneda;
			$n_tcamb=$CotizacionCab->n_tcamb;
			$d_fecped=$CotizacionCab->d_fecped;
			$d_fecvig=$CotizacionCab->d_fecvig;
			$c_codcli=$CotizacionCab->c_codcli;
			$c_nomcli=$CotizacionCab->c_nomcli;
			$CC_NRUC=$CotizacionCab->CC_NRUC;
			$c_contac=$CotizacionCab->c_contac;
			$c_telef=$CotizacionCab->c_telef;
			$c_email=$CotizacionCab->c_email;
			$c_via=$CotizacionCab->c_via;
			$Via=$CotizacionCab->Via;
			$c_codpga=$CotizacionCab->c_codpga;
			$TP_DESC=$CotizacionCab->TP_DESC;
			$c_asunto=$CotizacionCab->c_asunto;
			$c_codven=$CotizacionCab->c_codven;
			$c_oper=$CotizacionCab->c_oper;
			$DescripcionOperacionAI=$CotizacionCab->DescripcionOperacionAI;
			$c_obsped=$CotizacionCab->c_obsped;
			$subtotal=$CotizacionCab->subtotal;
			$descuento=$CotizacionCab->descuento;
			$Igv=$CotizacionCab->Igv;
			$total=$CotizacionCab->total;
			
			if($op==2){ //Modificar Objetos
			$ObjetoDisable="";
			$ObjetoDisable2='readonly';
			$btnCancelar='value="Cancelar"';
			$DivBtnAprobar="style='display: none;'";
			$DivMotivo="style='display: none;'";
			}else if($op==3){ //Consultar Objetos
				$ObjetoDisable2='disabled="disabled"';
				$ObjetoDisable='disabled="disabled"';
				$btnCancelar='value="Regresar"';
				$DivBtnAprobar="style='display: none;'";
				$DivMotivo="style='display: none;'";
			}if($op==5){
				if($_REQUEST['permiso']==100)
				{
					$ObjetoDisable='disabled="disabled"';
					$btnCancelar='value="Regresar"';
					$btnPermisos="Aprobar";
					$DivMotivo="style='display: none;'";
				}
				if($_REQUEST['permiso']==101)
				{
					$ObjetoDisable='disabled="disabled"';
					$btnCancelar='value="Regresar"';
					$btnPermisos="Anular";
					$DivMotivo="style='display: none;'";
				}
				if($_REQUEST['permiso']==102)
				{
					$ObjetoDisable='disabled="disabled"';
					$btnCancelar='value="Regresar"';
					$btnPermisos="Liberar";
					$DivMotivo="style='display: hide;'";
				}
			$DivBtnAprobar="style='display: hide;'";
			$ObjetoDisable2='disabled="disabled"';
			}
		endforeach; 
		break;		
		case 4://Eliminar
		
	}
} */



?>

 <!-- Content Wrapper. Contains page content -->
<form  action="?c=Cotizaciones&a=GrabarDatosCotizaciones" method="post" id="FrmCotizaciones" name="FrmCotizaciones" onsubmit="return checkSubmit();">

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

<div class="container-fluid ">
    <!-- Main content -->
    <section class="content">
 <div class="box box-danger">
			                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
									<div class="col-sm-2">
										<button type="button" class="btn btn-block btn-success btn-default" onclick="validar()" ></i> Grabar</button> 							
									</div>	

								<div class="col-sm-2">
									<a href="?c=Cotizaciones&a=Cotizaciones&IdListItem">
									<input type="button" class="btn btn-block btn-danger btn-default" /> </input> </a>                                       
								</div>
                                </div>
                             </div>       
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Orden de Servicio </h3>
                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#DatosClientes" data-toggle="tab">Datos Proveedor</a></li>
                        <li><a href="#DatosPedido" data-toggle="tab">Datos del Servicio</a></li>
                        <li><a href="#Datosotros" data-toggle="tab">Otros Datos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="DatosClientes">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Moneda</label>
                                            <select name="c_codmon" id="c_codmon" class="form-control input-sm" onchange="OnchangeTipMoneda()">
                                                                                                                                                                                                                                                                                                        </select>
                                        </div>

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo Cambio</label>
                                             <input type="text" class="form-control " placeholder="" value="" id="TipoCambio" name="TipoCambio" >
                                             <input type="hidden" class="form-control " placeholder="" value="" id="c_numped" name="c_numped" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha Cotizacion</label>
                                            <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Fecha" id="FechaCoti" name="FechaCoti"  value="">
                        </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha Vigencia</label>
                                           <div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask placeholder="Fecha Vigencia" id="Fechavig" name="Fechavig" value="">
											</div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                            <!-- /.box-header -->
                            <div class="box-body" id="DatosPersonaNatural"  >
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Cliente</label>
                                           <input type="text" class="form-control" id="txtcliente" name="txtcliente"  placeholder="Buscar Cliente"  value="">
										    <input type="hidden" class="form-control" id="txtIdCliente" name="txtIdCliente"  placeholder="Buscar Cliente" value="" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">                                       
                                        <div class="form-group">
                                            <label>NIF/RUC</label>
                                            <input class="form-control " type="text" placeholder="" id="CC_NRUC"name="CC_NRUC" value="" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Contacto</label>
                                            <input class="form-control " type="text" placeholder="" id="c_contac" name="c_contac" >
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-2">    	
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input class="form-control " type="text" placeholder="" id="c_telef" name="c_telef">
                                            
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="text" placeholder="" id="c_email" name="c_email" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
									
									
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                            
                            
                            <!-- /.box-header  -->
                            <div class="box-body" id="DatosPersonaJuridica" >
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Envio Por Vía</label>
                                            <select class="form-control " style="width: 100%;" id="IdTipoVia" name="IdTipoVia" >
                                               
                                                  
                                            </select>

											<input type="hidden" class="form-control" id="IdPediCab" name="IdPediCab"  value=""/>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Forma Pago</label>
                                            <select class="form-control " style="width: 100%;" id="c_codpga" name="c_codpga">
                                                  
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Asunto</label>
                                            <input class="form-control " type="text" placeholder="" id="c_asunto" name="c_asunto" value="" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
									<div class="col-md-3">
                                        <!-- /.form-group -->
										 <label>Operacion</label>
                                        <div class="form-group">  
                                            <select class="form-control " style="width: 100%;" id="cod_oper" name="cod_oper" >                                                 
                                            </select>										
                                        </div>
                                        <!-- /.form-group -->
                                    </div> 
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="DatosPedido">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
								    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tipo Producto</label>
                                            <select class="form-control " style="width: 100%;" id="TipoClassProducto" name="TipoClassProducto" onchange="ObtenerId()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Producto</label>
                                            <input class="form-control " type="text" placeholder="Producto" id="Producto" name="Producto" value="<?php  ?>"   >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
									<div class="col-md-2">
                                        <div class="form-group">
                                            <label>Unidad</label>
											<select class="form-control " style="width: 100%;" id="Unidad" name="Unidad" >
                                                <option selected="selected" value="00">[Seleccione]</option>                                                 
                                            </select>
										</div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->                                                               
                                    <input class="form-control " type="hidden" placeholder=".input-sm" id="CodProducto" name="CodProducto" >
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Detalle Adicional</label>
                                            <input class="form-control " type="text" placeholder="Detalle" id="Detalle" name="Detalle" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->                                   
									<div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>P. Unitario </label>
                                            <input class="form-control text-right" type="text" placeholder="" id="Punitario" name="Punitario" value="0.00" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Dscto</label>
                                            <input class="form-control text-right" type="text" placeholder="" id="dscto" name="dscto"  value="0.00" />
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input class="form-control text-right" type="text" placeholder="" id="cantidad" name="cantidad" value="0" >
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-1">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Agregar</label>
                                            <button type="button" class="btn btn-block btn-primary" id="agregar-cotizacion-btn" > <i class="glyphicon glyphicon-plus "></i></button>
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
													if($op==2  )
													{
													foreach($this->cotizaciones->CotizacionesDetalleSeleccionarPorIdCabecera($c_numped) as $DetalleCotizaciones):	 ?>
											    <tr>
														<input type="hidden" class="form-control"  name="c_codcla[]" id="c_codcla<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_codcla?>" readonly />
														<td>
														<input type="hidden" class="form-control"  name="CodProducto[]" id="CodProducto<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_codprd?>" readonly />
														<input type="hidden" class="form-control"  name="n_item[]" id="n_item<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->n_item?>" readonly />
														
														<input type="text" class="form-control"  name="Producto[]" id="Producto<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo  $DetalleCotizaciones->c_desprd?>" readonly />
										
														</td>
														
														<td><input type="text" class="form-control"  name="Unidad[]" id="Unidad<?php echo $DetalleCotizaciones->n_item-1?>" value="<?php echo $DetalleCotizaciones->c_codund?>" readonly/></td>
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
											<label class="control-label col-xs-7 text-right">Sub-Total ()
																											</label>										
												<div class="col-xs-4">
													<input type="text" class="form-control text-right" name="subtotal-cot" id="subtotal-cot" value="" readonly/>
												</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right">Descuento ()
																											</label>
												<div class="col-xs-4">
												  <input type="text" class="form-control text-right" name="desc-cot" id="desc-cot" value="" readonly/>
												</div>
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right">IGV ()
																											</label>
												<div class="col-xs-4">
												  <input type="text" class="form-control text-right" name="igv-cot" id="igv-cot" value="" readonly/>
												</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pull-right">
										<div class="form-group">
											<label class="control-label col-xs-7 text-right" >Total ()
																											</label>
											<div class="col-xs-4">
											  <input type="text" class="form-control text-right" name="total-cot" id="total-cot" value="" readonly/>
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
													<textarea id="glosa" name="glosa" rows="10" cols="80"  >			
																						 
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
	$('#cod_oper').on('change', function() {
		//alert();
		calcularTotales();
	})
 
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



