<?php
$Id_cabpre="";
$Numeir="";
$Cod_cliente="";
$cc_razo="";
$Cod_producto="";
$in_arti="";
$c_numitm="";
$Serie_producto="";
$Built_year="";
$Refrigerant="";
$PtiDate="";
$Equipment="";
$Ambient="";
$SetPoint="";
$Fecha_ingreso="";
$Moneda="";
$mone="";
$Tipo_cambio="";
$Tip_operacion="";
$Sub_soles="";
$Sub_dolares="";
$Total_soles="";
$Total_Dolares="";
$IgvS="";
$IgvD="";
$CampoA="";
$CampoB="";
$CampoC="";
$CampoD="";
$ObjetoDisable="";
$btnPrincipal="";
$Divocultar="";
$DivImprimir="";
if(isset($_REQUEST['op'])){
	$op=$_REQUEST['op'];
	switch ($op){
		case 1: //agregar
			$Id_cabpre="";
			$Numeir="";
			$Cod_cliente="";
			$cc_razo="";
			$Cod_producto="";
			$in_arti="";
			$c_numitm="";
			$Serie_producto="";
			$Built_year="";
			$Refrigerant="";
			$PtiDate="";
			$Equipment="";
			$Ambient="";
			$SetPoint="";
			$Fecha_ingreso="";
			$Moneda="";
			$mone="";
			$Tipo_cambio="";
			$Tip_operacion="";
			$Sub_soles="";
			$Sub_dolares="";
			$Total_soles="";
			$Total_Dolares="";
			$IgvS="";
			$IgvD="";
			$CampoA="";
			$CampoB="";
			$CampoC="";
			$CampoD="";
			$ObjetoDisable="";
			$btnPrincipal="Grabar";
			$Divocultar="";
			$DivImprimir="style=display:none";
		break;
		case  2 or 3 or 4://editar //consultar
		 //print "<script>alert('$Id_cabpre')</script>";
		 foreach($this->model->PresupuestoSeleccionarxId($_REQUEST['IdCab']) as $PresupuestoCab):
				$Id_cabpre=$PresupuestoCab->Id_cabpre;			
				$Numeir=$PresupuestoCab->Numeir;
				$Cod_cliente=$PresupuestoCab->Cod_cliente;
				$cc_razo=$PresupuestoCab->cc_razo;
				$Cod_producto=$PresupuestoCab->Cod_producto;
				$in_arti=$PresupuestoCab->in_arti;
				$c_numitm=$PresupuestoCab->c_numitm;
				$Serie_producto=$PresupuestoCab->Serie_producto;
				$Built_year=$PresupuestoCab->Built_year;
				$Refrigerant=$PresupuestoCab->Refrigerant;
				$PtiDate=$PresupuestoCab->PtiDate;
				$Equipment=$PresupuestoCab->Equipment;
				$Ambient=$PresupuestoCab->Ambient;
				$SetPoint=$PresupuestoCab->SetPoint;
				$Fecha_ingreso=$PresupuestoCab->Fecha_ingreso;
				$Moneda=$PresupuestoCab->Moneda;
				$mone=$PresupuestoCab->mone;
				$Tipo_cambio=$PresupuestoCab->Tipo_cambio;
				$Tip_operacion=$PresupuestoCab->Tip_operacion;
				$Sub_soles=$PresupuestoCab->Sub_Soles;
				$Sub_dolares=$PresupuestoCab->Sub_Dolares;
				$Total_soles=$PresupuestoCab->Total_soles;
				$Total_Dolares=$PresupuestoCab->Total_Dolares;
				$IgvS=$PresupuestoCab->IgvS;
				$IgvD=$PresupuestoCab->IgvD;
				$CampoA=$PresupuestoCab->CampoA;
				$CampoB=$PresupuestoCab->CampoB;
				$CampoC=$PresupuestoCab->CampoC;
				$CampoD=$PresupuestoCab->CampoD;
				$ObjetoDisable=""; 
				$btnPrincipal="Actualizar"; 
				$DivImprimir="style=display:none";
				$Divocultar="";
				if($op==3){
					$Divocultar="";
					$ObjetoDisable='disabled="disabled"';
					$btnPrincipal="Grabar"; 
					$DivImprimir="style=display:none";
				}
				if($op==4){
					$Divocultar="style=display:none";
					$ObjetoDisable='disabled="disabled"';
					$btnPrincipal="Grabar"; 
					$DivImprimir="";
				}
		 endforeach; 
		break;

	}
	
}

?>
<div class="modal fade" id="my_modalagregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="AgregarConcepto" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Agregar Nuevo Concepto Presupuesto</h5>
                </div>
                <div class="modal-body">
					<div class="form-group">
                        <label class="control-label col-xs-4">Codigo</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="codigo" name="codigo"  placeholder="AUTOGENERADO" readonly/>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="control-label col-xs-4">Descripcion</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Descripcion" required />
                        </div>
                    </div>  
					<div class="form-group">
                        <label class="control-label col-xs-4">Precio</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="precio" name="precio"  placeholder="precio"  required />
                        </div>
                    </div>  
					<div class="form-group">
                        <label class="control-label col-xs-4">Unidad de Medida</label>
                        <div class="col-xs-8">
                           <input type="text" class="form-control" id="medida" name="medida"  placeholder="Unidad de Medida"  required />
                        </div>
                    </div> 					
					<div class="form-group">
                        <label class="control-label col-xs-4">Estado</label>
                        <div class="col-xs-8">
                           <select class="form-control" name="tip_mm" id="tip_mm" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="1">Activo</option>
								<option value="4">Inactivo</option>						
							</select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" >Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<form class="form-horizontal"  action="?c=p07&a=GestionPresupuesto&op=<?php echo $_GET['op']?>" method="post" id="FrmPresupuestos" name="FrmPresupuestos">
<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
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
	<div class="modal modal-danger fade" id="modal-warning">
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
                <button type="button" id="btn1" class="btn btn-outline btn-danger" data-dismiss="modal">Aceptar</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


<div class="container-fluid listado-facturas-container">
	<div class="panel panel-default">
			<div class="panel-heading">Accion</div>
				<div class="panel-body">
					<div class="row" <?php echo $Divocultar ?> >
						<div class="col-sm-2">
							<button type="button" class="btn btn-block btn-success" onclick="validar()" <?php echo $ObjetoDisable?>></i> <?php echo $btnPrincipal?></button> 
						</div>
						<div class="col-sm-2">
							<a href="?c=p01&udni=<?php echo @$_GET['udni'] ?>&mod=1">
							<button type="button" class="btn btn-block btn-danger"></i> Regresar</button> 
							</a>
						</div>
					</div>
					<div class="row" <?php echo $DivImprimir ?> >
						<div class="col-sm-2">
							<button type="button" class="btn btn-block btn-default" onclick="window.print();"></i> Imprimir</button> 
						</div>
					</div>					
				</div>
	</div>
    <div class="panel panel-primary">
        <div class="panel-heading">Registro de Presupuesto</div>
        <div class="panel-body">
			<div class="col-lg-4">
						<div class="form-group">
							<label  class="col-lg-4 control-label">Codigo</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtCod" name="txtCod" placeholder="AUTOGENERADO" value="<?php echo $Id_cabpre?>" readonly >
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-4 control-label">EIR</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtEir" name="txtEir" placeholder="Num Eir"  value="<?php echo $Numeir?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-4 control-label">Cliente</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Buscar Cliente" value="<?php echo $cc_razo?>" <?php echo $ObjetoDisable?>>
							  <input type="hidden" class="form-control" id="CC_NRUC" name="CC_NRUC" value="<?php echo $Cod_cliente?>" >
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Producto</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtProducto" name="txtProducto" value="<?php echo $in_arti?>" placeholder="Buscar Producto" <?php echo $ObjetoDisable?>>
							  <input type="hidden" class="form-control" id="IN_CODI" name="IN_CODI" value="<?php echo $Cod_producto?>">
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Modelo</label>
							<div class="col-lg-8">
								<select name="cboMod" id="cboMod" class="select2 form-control" <?php echo $ObjetoDisable?>>
									<option value="SELECCIONE">SELECCIONE</option>  
									<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
									<option value="<?php echo $modelo->C_NUMITM; ?>"  <?php echo $modelo->C_NUMITM == $c_numitm ? 'selected' : ''; ?>  > <?php echo $modelo->C_DESITM; ?> </option>
									<?php  endforeach;	 ?>            
								  </select>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-4 control-label">Unit Serial N°</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtUnitSerial" name="txtUnitSerial" value="<?php echo $Serie_producto?>" placeholder="Unit Serial" <?php echo $ObjetoDisable?>>
							</div>
						</div>
					
			</div>
			<div class="col-lg-4">
						
						<div class="form-group">
							<label  class="col-lg-4 control-label">Built Yeard</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtBuilt" name="txtBuilt" value="<?php echo $Built_year?>" placeholder="Built Yeard" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Refrigerant</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtRefri" name="txtRefri" value="<?php echo $Refrigerant?>" placeholder="Refrigerant" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Pti-Date</label>
							<div class="col-lg-8">
							  <input type="date" class="form-control" id="txtPti_date" name="txtPti_date" value="<?php echo date_format(new DateTime($PtiDate),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Equipment brand</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtEquip" name="txtEquip" placeholder="Equipment brand" value="<?php echo $Equipment?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Ambient temp(Deg C°)</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtAmb" name="txtAmb" placeholder="Ambient temp(Deg C°)" value="<?php echo $Ambient?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>

					
			</div>
			<div class="col-lg-4">
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Set Point</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtSetpoint" name="txtSetpoint" placeholder="Set Point" value="<?php echo $SetPoint?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-lg-4 control-label">Fecha</label>
							<div class="col-lg-8">
							  <input type="date" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha"  value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Moneda</label>
							<div class="col-lg-8">
								<select name="cboMoneda" id="cboMoneda" class="select2 form-control" <?php echo $ObjetoDisable?>>
									<option value="SELECCIONE">SELECCIONE</option>  
									<?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                               
									<option value="<?php echo $moneda->TM_CODI; ?>"  <?php echo $moneda->TM_CODI == $Moneda ? 'selected' : ''; ?>  > <?php echo $moneda->TM_DESC; ?> </option>
									<?php  endforeach;	 ?>            
								  </select>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">T.C</label>
							<div class="col-lg-8">
								<input type="text" class="form-control text" id="txtTc" name="txtTc" placeholder="Tipo de Cambio" value="<?php echo $Tipo_cambio?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<input type="hidden" class="form-control" id="txtCampoA" name="txtCampoA" value="<?php echo $CampoA?>">
						<input type="hidden" class="form-control" id="txtCampoB" name="txtCampoB" value="<?php echo $CampoB?>">
						<input type="hidden" class="form-control" id="txtCampoC" name="txtCampoC" value="<?php echo $CampoC?>">
						<input type="hidden" class="form-control" id="txtCampoD" name="txtCampoD" value="<?php echo $CampoD?>">
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Igv</label>
							<div class="col-lg-8">
								<select name="cboIgv" id="cboIgv" class="select2 form-control" <?php echo $ObjetoDisable?>>
									<option value="SELECCIONE">SELECCIONE</option>  
									<?php foreach($this->maestro->ListarTipOperacion() as $tipop):	 ?>                                               
									<option value="<?php echo $tipop->c_codope; ?>"  <?php echo $tipop->c_codope == $Tip_operacion ? 'selected' : ''; ?>  > <?php echo $tipop->c_desope; ?> </option>
									<?php  endforeach;	 ?>            
								  </select>
							</div>
						</div>				
			</div>
		</div>
		</div>
	<div class="panel panel-danger">
        <div class="panel-heading">Detalle</div>
        <div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
						<div class="form-group">
							<label  class="col-lg-4 control-label">Concepto de Reparacion</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control text" id="txtConcepto" name="txtConcepto" placeholder="Buscar Concepto" <?php echo $ObjetoDisable?>>
							  <input type="hidden" class="form-control" id="txtIdConcepto" name="txtIdConcepto" >
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Unidad de Medida</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtUnidadMedida" name="txtUnidadMedida" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Precio Soles</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control text" id="txtPrecioS" name="txtPrecioS" <?php echo $ObjetoDisable?>>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Cantidad</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtCantidad" name="txtCantidad" <?php echo $ObjetoDisable?>>
							</div>
						</div>
					
			</div>
			<div class="col-lg-6">
						<div class="form-group">
							<div class="col-lg-8">
							  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my_modalagregar" <?php echo $ObjetoDisable?>>+ Concepto</button>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">.</label>
							<div class="col-lg-8">
							  <input type="hidden" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Precio Dolar</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="txtPrecioD" name="txtPrecioD" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">.</label>
							<div class="col-lg-8">
								<button type="button" class="btn btn-danger" id="agregar-detalle-btn">Añadir Detalle</button>
							</div>
						</div>					
			</div>
		</div>	
				<div class="row">
				 <div class="box-body table-responsive no-padding">
                    <table id="detalle-conceptos" class="table table-bordered table-striped">        
                        <thead>
                            <tr>
                                <th>Concepto</th>
                                <th>Unidad</th>
                                <th>Cantidad</th>
                                <th>Precio (S/.)</th>
                                <th>Precio ($)</th>    
                                <th>Importe (S/.)</th>
								<th>Importe ($)</th>
                                <th></th>
                            </tr>
                        </thead>
						<tbody>	
							<?php
								if($op==2 or $op==3 or $op==4){
									foreach($this->model->PresupuestoSeleccionarxIdDet($Id_cabpre)as $DetallePre):?>
									<tr>
								<td>
									<input type="hidden" class="form-control " name="txtIdConcepto[]" id="txtIdConcepto<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cod_concepto?>"/>
									<input type="text" class="form-control text-left" name="txtConcepto[]" id="txtConcepto<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->descripcion?>" readonly/>				 
								</td>
								<td>
									<input type="text" class="form-control text-right" name="txtUnidadMedida[]" id="txtUnidadMedida<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->unidad_Medida?>" readonly/>
								</td>
								<td>
									<input type="text" class="form-control text-right" name="txtCantidad[]" id="txtCantidad<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cantidad?>"  <?php echo $ObjetoDisable?>/>
								</td>
								<td>
									<input type="text" class="form-control text-right" name="txtPrecioS[]" id="txtPrecioS<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Precio_soles?>"  <?php echo $ObjetoDisable?>/>
								</td>
								<td>
									<input type="text" class="form-control text-right" name="txtPrecioD[]" id="txtPrecioD<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Precio_Dolares?>" <?php echo $ObjetoDisable?>/>
								</td>
								<td>
									<input type="text" class="form-control text-right" name="det_importeS[]" id="det_importeS<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->T_soles?>" readonly />
								</td>
								<td>
									<input type="text" class="form-control text-right" name="det_importeD[]" id="det_importeD<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->T_dolares?>"  readonly  />
								</td>
								<td>
									<button class="btn btn-danger btn-sm btn-borrar-det" type="button"><i class="glyphicon glyphicon-remove"></i></button>
									</td>
							</tr>
							<?php	
								endforeach;	}
							?>
						</tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div><!--box-body --> 
                </div><!--box-body --> 
				<div class="row">
					<div class="col-xs-9 pull-right">
					    <div class="form-group ">
							<label class="control-label col-xs-7 text-right">Sub-Total (S/.)</label>										
								<div class="col-xs-2">
									<input type="text" class="form-control text-right" name="sub_importeS" id="sub_importeS"  value="<?php echo $Sub_soles?>" readonly/>
								</div>
							<div class="col-xs-1">
								<label class="control-label col-xs-5 text-right">($)</label>
							</div>
							<div class="col-xs-2">
								<input type="text" class="form-control text-right" name="sub_importeD" id="sub_importeD" value="<?php echo $Sub_dolares?>"  readonly/>
							</div>
						</div>
				    </div>									
				</div>
				<div class="row">
									<div class="col-xs-9 pull-right">
										<div class="form-group ">
											<label class="control-label col-xs-7 text-right">Igv (S/.)</label>										
												<div class="col-xs-2">
													<input type="text" class="form-control text-right" name="tot_igvS" id="tot_igvS"  value="<?php echo $IgvS?>" readonly/>
												</div>
												<div class="col-xs-1">
													<label class="control-label col-xs-5 text-right">($)</label>
												</div>
												<div class="col-xs-2">
													<input type="text" class="form-control text-right" name="tot_igvD" id="tot_igvD" value="<?php echo $IgvD?>" readonly/>
												</div>
										</div>
									</div>

									
				</div>
				<div class="row">
									<div class="col-xs-9 pull-right">
										<div class="form-group ">
											<label class="control-label col-xs-7 text-right">Total (S/.)</label>										
												<div class="col-xs-2">
													<input type="text" class="form-control text-right" name="total_importeS" id="total_importeS" value="<?php echo $Total_soles?>" readonly/>
												</div>
												<div class="col-xs-1">
													<label class="control-label col-xs-5 text-right">($)</label>
												</div>
												<div class="col-xs-2">
													<input type="text" class="form-control text-right" name="total_importeD" id="total_importeD" value="<?php echo $Total_Dolares?>"  readonly/>
												</div>
										</div>
									</div>

									
				</div>
		</div>
		</div>
	
</div>

<script>
    $(document).ready(function(){
		$("#txtTc").numeric('.');
		$("#txtPrecioS").numeric('.');
		$("#txtCantidad").numeric('.');
			
			
		$(".text").keyup(function(){
		//console.log($(this).val());
		CalcularTotal();				
	});
 
	function CalcularTotal() {
		$("#txtPrecioD").val('');
		$TotalDolares=0;
	    $txtPrecioS = parseFloat($("#txtPrecioS").val());
	    $txtTc = parseFloat($("#txtTc").val());
		
		$TotalDolares =(parseFloat($txtPrecioS*$txtTc).toFixed(2));
		$('#txtPrecioD').val(!isNaN($TotalDolares) ? $TotalDolares : '');
	}
	//action="?c=p06&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=AgregarConcepto"
 $("#AgregarConcepto").submit(function(e){
	//alert();
	e.preventDefault();
	var datos=new FormData(this);
	$.ajax({
	url: '?c=p06&a=AgregarConcepto',
	data: datos,				
	processData:false,
	contentType:false,
	type: "post",
	success: function(str){		
		$('#my_modalagregar').modal('hide');
		$('#descripcion').val('');
		$('#precio').val('');
		$('#medida').val('');

		//alert(rowCount);
		//alert(totalregitros-1);
		//rs=jQuery.parseJSON(str);2<1
	
		}
	});
	
	
}); 
	
	
		//*var term=("#txtCliente").val();
	   $("#txtCliente").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=p03&a=BuscarCliente', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.CC_NRUC,
                            value: item.CC_RAZO,
							CC_RAZO: item.PR_NRUC,
							CC_NRUC: item.CC_NRUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#CC_NRUC").val(ui.item.CC_NRUC);
			$("#txtcliente").val(ui.item.CC_RAZO);

          
        }
    })
	 $("#txtProducto").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=p04&a=BuscarProducto', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.IN_CODI,
                            value: item.IN_ARTI,
							IN_CODI: item.IN_CODI,
							IN_ARTI: item.IN_ARTI
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#IN_CODI").val(ui.item.IN_CODI);
			$("#txtProducto").val(ui.item.IN_ARTI);

          
        }
    })
	
	 $("#txtConcepto").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=p05&a=BuscarConcepto', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.id_concepto,
                            value: item.descripcion,
							id_concepto: item.id_concepto,
							descripcion: item.descripcion,
							unidad_Medida: item.unidad_Medida,
							precioS: item.precioS
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtIdConcepto").val(ui.item.id_concepto);
			$("#descripcion").val(ui.item.txtConcepto);
			$("#txtUnidadMedida").val(ui.item.unidad_Medida);
			$("#txtPrecioS").val(ui.item.precioS);

          
        }
    })

  $("#agregar-detalle-btn").click(function(e){
	  //$('#detalle-conceptos tbody').append('<tr class="child"><td>blahblah</td></tr>');
	 //alert($("#txtIdConcepto").val());
	 
    var txtConcepto = $("#txtConcepto").val();
    var txtIdConcepto = $("#txtIdConcepto").val();
    var txtCantidad = $("#txtCantidad").val();
    var txtPrecioS = $("#txtPrecioS").val();
    var txtUnidadMedida = $("#txtUnidadMedida").val();
    var txtPrecioD = $("#txtPrecioD").val();
  
	var det_importeS=(txtCantidad*txtPrecioS);
	var det_importeD=(txtCantidad*txtPrecioD);
	
     var error = false;
    var msg = "";
	if(txtConcepto == '' || txtIdConcepto == ''){
      msg += 'Ingrese un concepto de reparacion valido.<br>';
	  
	  $("#txtConcepto").val('');
	  $("#txtConcepto").focus();
      error = true;
    }

	if(txtPrecioS == '' || txtPrecioS == '0.00' ){
      msg += 'Ingrese un precio Valido.<br>';
      error = true;
	  	$("#txtPrecioS").val('');
		$("#txtPrecioS").focus();
    }else{
      txtPrecioS = parseFloat(txtPrecioS);
    }
			
	
	if(txtCantidad == '' ||txtCantidad == '0'){
      msg += 'Ingrese Cantidad Valida.<br>';
      error = true;
	  $("#txtCantidad").val('');
	  $("#txtCantidad").focus();
    }
	else{
      txtCantidad = parseFloat(txtCantidad);
    }
	
	if($("#cboIgv option:selected").val()=="SELECCIONE"){	
      msg += 'Seleccione tipo de Operacion <br>';
      error = true;
    }
	
	
	if (error == true) {
	$("#mensaje").html(msg);
	$('#modal-warning').modal('show');
			
	return 0;

	}else{ 
		agregarParametroTabla(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioS,txtPrecioD,det_importeS,det_importeD);

	}
  });
    $('body').on('click','.btn-borrar-det', function(e){
    $(this).parent('td').parent('tr').remove();
    reindexarDetalle();
    calcularTotales();
  });
      function reindexarDetalle(){
    var rows = $('#detalle-conceptos>tbody >tr');
    if(rows.length < 1){
      $("#detalleAgregado").removeAttr('value');
    }
    rows.each(function( index, element ) {
      //$(this).find('td:first').text(index+1);
			$(this).find('.txtIdConcepto').attr('name', 'txtIdConcepto[' + index + ']');
			$(this).find('.txtConcepto').attr('name', 'txtConcepto[' + index + ']');
			$(this).find('.txtUnidadMedida').attr('name', 'txtUnidadMedida[' + index + ']');
			$(this).find('.txtCantidad').attr('name', 'txtCantidad[' + index + ']');
			$(this).find('.txtPrecioS').attr('name', 'txtPrecioS[' + index + ']');
			$(this).find('.txtPrecioD').attr('name', 'Cantidad[' + index + ']');
			$(this).find('.det_importeS').attr('name', 'det_importeS[' + index + ']');
			$(this).find('.det_importeD').attr('name', 'det_importeD[' + index + ']');
    });
  }
  
   function calcularTotales(){
	//alert(total_t);
    var subtotalS = 0.0;
	var subtotalD = 0.0;
	
	var totalS = 0.0;
	var totalD = 0.0;
			
	$('input[name^="det_importeS"]').each(function(index, element){
      var sol = parseFloat($(this).val());
      subtotalS += sol;	  
    });		
		
    $('input[name^="det_importeD"]').each(function(index, element){
      var dol = parseFloat($(this).val());
      subtotalD += dol;	      
    });
	
	 var operacion = $("select[name=cboIgv]").val();
    var igvS;
    var igvD;
    //
    if(operacion == '001'){
      igvS = subtotalS *0.18;
      igvD = subtotalD *0.18;
    }else{
      igvS = 0;
      igvD = 0;
    }
    $("#tot_igvS").val(igvS.toFixed(2));
	totalS=subtotalS+igvS
	
    $("#tot_igvD").val(igvD.toFixed(2));
    totalD=subtotalD+igvD
	
	
	$("#sub_importeS").val(subtotalS.toFixed(2));
	$("#sub_importeD").val(subtotalD.toFixed(2));
	
	$("#total_importeS").val(totalS.toFixed(2));
	$("#total_importeD").val(totalD.toFixed(2));

  }  
  $('#detalle-conceptos>').on('keyup paste', ':input', function() { 

	CalcularImporte();
   	calcularTotales(); 
}); 
 
function CalcularImporte() {
				$("input[name='txtIdConcepto[]']").each(function(index, value){
	        	    $txtCantidad = $("#txtCantidad" + index + "").val();
	        	    $txtPrecioS = $("#txtPrecioS" + index + "").val();
	        	    $txtPrecioD = $("#txtPrecioD" + index + "").val();
	        	    $ImporteS = ($txtCantidad * $txtPrecioS);
	        	    $ImporteD = ($txtCantidad * $txtPrecioD);
	        	    $("#det_importeS" + index + "").val($ImporteS);
	        	    $("#det_importeD" + index + "").val($ImporteD);
	        	});
			}

  

  function agregarParametroTabla(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioS,txtPrecioD,det_importeS,det_importeD) {
		var rowCount = $('#detalle-conceptos>tbody >tr').length;
		var index = rowCount;
		//var importe=(Cantidad*Punitario)-Dscto
		
		var fila = `<tr>
			<td>
				<input type="hidden" class="form-control " name="txtIdConcepto[]" id="txtIdConcepto${index}" value="${txtIdConcepto}"/>
				<input type="text" class="form-control text-left" name="txtConcepto[]" id="txtConcepto${index}" value="${txtConcepto}" readonly/>				 
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtUnidadMedida[]" id="txtUnidadMedida${index}" value="${txtUnidadMedida}" readonly/>
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtCantidad[]" id="txtCantidad${index}" value="${txtCantidad}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtPrecioS[]" id="txtPrecioS${index}" value="${txtPrecioS}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtPrecioD[]" id="txtPrecioD${index}" value="${txtPrecioD}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="det_importeS[]" id="det_importeS${index}" value="${det_importeS}" readonly />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="det_importeD[]" id="det_importeD${index}" value="${det_importeD}"  readonly  />
			</td>
			<td>
				<button class="btn btn-danger btn-sm btn-borrar-det" type="button"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
		</tr>`;
		//$('#table-det-cotizacion > tbody:last-child').append(fila); 
		$('#detalle-conceptos tbody').append(fila); 
		 calcularTotales();
		
		$("#txtConcepto").val('');
		$("#txtIdConcepto").val('');
		$("#txtUnidadMedida").val('');
		$("#txtCantidad").val('');
		$("#txtPrecioS").val('');
		$("#txtPrecioD").val('');

	} 
	
	
	
    })
	
</script>
<script>
  function validar(){
	// alert("error");
 	var msg="";
	var error=false;
	var rowCount = $('#detalle-conceptos>tbody >tr').length;
	var index = rowCount;
	
	if($("#CC_NRUC").val()==""){		
		msg += "- Ingresar un cliente valido</br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.		
		
	}
	if($("#IN_CODI").val()==""){		
		msg += "- Ingresar un producto correcto</br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.cboMoneda		
		
	}
	if($("#cboMoneda option:selected").val()=="SELECCIONE"){		
		msg += "- Ingresar el tipo de Moneda</br>";
		error=true;
		//return 0;
		//document.FrmPresupuestos.submit();		
	}
	if($("#txtFecha").val()==""){			
		msg += "- Ingresar una fecha</br>";
		error=true;
		//return 0;
		//document.FrmPresupuestos.submit();		
	}	
	if($("#txtTc").val()==""){			
		msg += "- Ingresar el tipo de cambio</br>";
		error=true;
		//return 0;
		//document.FrmPresupuestos.submit();$("#TipoClassProducto option:selected").val();		
	}
	if($("#cboIgv option:selected").val()=="SELECCIONE"){			
		msg += "- Seleccione el tipo de operacion</br>";
		error=true;
		//return 0;
		//document.FrmPresupuestos.submit();		
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
<script src=".\assets\js\jquery.numeric.js"></script>
</form>