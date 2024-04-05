<?php
$Id_cabpre="";
$Numeir="";
$NumeirCliente="";
$Cod_cliente="";
$cc_razo="";
$Cod_producto="";
$in_arti="";
$c_numitm="";
$Modelo="";
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
$Sub_dolares=0.00;
$Sub_dolaresT=0.00;
$Sub_dolaresR=0.00;
$Total_Dolares=0.00;
$Total_DolaresT=0.00;
$Total_DolaresR=0.00;
$SimboloMoneda="";
$IgvD=0.00;
$IgvDT=0.00;
$IgvDR=0.00;
$CampoA="";
$CampoB="";
$CampoC="";
$CampoD="";
$ObjetoDisable="";
$btnPrincipal="";
$Divocultar="";
if(isset($_REQUEST['op'])){
	$op=$_REQUEST['op'];
	switch ($op){
		case 1: //agregar
			$Id_cabpre="";
			$Numeir="";
			$NumeirCliente="";
			$Cod_cliente="";
			$cc_razo="";
			$Cod_producto="";
			$in_arti="";
			$c_numitm="";
			$Modelo="";
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
			$Sub_dolares=0.00;
			$Sub_dolaresT=0.00;
			$Sub_dolaresR=0.00;
			$Total_Dolares=0.00;
			$Total_DolaresT=0.00;
			$Total_DolaresR=0.00;
			$SimboloMoneda="";
			$IgvD=0.00;
			$IgvDT=0.00;
			$IgvDR=0.00;
			$CampoA="";
			$CampoB="";
			$CampoC="";
			$CampoD="";
			$ObjetoDisable="";
			$btnPrincipal="Grabar";
			$Divocultar="";
		break;
		case  2 or 3 or 4://editar //consultar
		 //print "<script>alert('$Id_cabpre')</script>";
		 foreach($this->model->EstimadosSeleccionarxId($_REQUEST['IdCab']) as $PresupuestoCab):
				$Id_cabpre=$PresupuestoCab->Id_cabpre;			
				$Numeir=$PresupuestoCab->Numeir;
				$NumeirCliente=($PresupuestoCab->Numeir." - ".$PresupuestoCab->cc_razo);
				$Cod_cliente=$PresupuestoCab->Cod_cliente;
				$cc_razo=$PresupuestoCab->cc_razo;
				$Cod_producto=$PresupuestoCab->Cod_producto;
				$in_arti=$PresupuestoCab->in_arti;
				$c_numitm=$PresupuestoCab->c_numitm;
				$Modelo=$PresupuestoCab->Modelo;
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
				$Divocultar="";
				if($op==3){
					$Divocultar="";
					$ObjetoDisable='disabled="disabled"';
					$btnPrincipal="Grabar"; 
				}
				if($op==4){
					$Divocultar="style=display:none";
					$ObjetoDisable='disabled="disabled"';
					$btnPrincipal="Grabar"; 
				}
		 endforeach; 
		break;

	}	
}
?>
<style>
 #mdialTamanio{
      width: 60% !important;
    }
</style>
<div class="modal fade" id="myModalCodigos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" id="mdialTamanio">
        <div class="modal-content">
            <form id="AgregarConcepto" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Ver Codigos Disponibles</h5>
                </div>
                <div class="modal-body">
				<div class="box-body table-responsive no-padding">
					<table  id="detalle-codigos" class="table table-bordered table-striped" >
					  <thead>
						<th bgcolor="#999999"><div align="center"><b>Codigo</b></div></td>
						<th bgcolor="#999999"><div align="center"><b>Descripcion</b></div></td>
						<th bgcolor="#999999">DUA</td>
						<th bgcolor="#999999"><div align="center"><b>Serie</b></div></td>
						<th bgcolor="#999999"><div align="center"><b>Maquina Asignada</b></div></td>
						<th bgcolor="#999999"><strong>Condicion Almacen</strong></td>
						<th bgcolor="#999999"></td>
					  </thead>
					  <tbody>
					  </tbody>

					</table>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

<form class="form-horizontal"  action="?c=p11&a=GestionEstimados&op=<?php echo $_GET['op']?>" method="post" id="FrmEstimados" name="FrmEstimados">
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
				</div>
	</div>
    <div class="panel panel-info">
        <div class="panel-heading">Registro de Orden de Compra</div>
        <div class="panel-info panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Num. Registro</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtCod" name="txtCod" placeholder="AUTOGENERADO" value="<?php echo $Id_cabpre?>" readonly >
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
					<label  class="col-lg-4 control-label">Proveedor</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtProveedor" name="txtProveedor" placeholder="Buscar Provedor" value="<?php echo $cc_razo?>" <?php echo $ObjetoDisable?>>
						<input type="hidden" class="form-control" id="txtDecl" name="txtDecl" value="<?php echo $cc_razo?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">RUC</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="CC_NRUCP" name="CC_NRUCP" placeholder="Num RUC"  value="<?php echo $NumeirCliente?>" <?php echo $ObjetoDisable?> readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Telefono:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Num Telefono"  value="<?php echo $NumeirCliente?>" <?php echo $ObjetoDisable?> readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Responsable:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtResponsable" name="txtResponsable" placeholder="Responsable"  value="<?php echo $NumeirCliente?>" <?php echo $ObjetoDisable?> readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Email:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email"  value="<?php echo $NumeirCliente?>" <?php echo $ObjetoDisable?> readonly>
					</div>
				</div>
			
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Pais:</label>
					<div class="col-lg-8">
						<select name="cboMod" id="cboMod" class="select2 form-control" <?php echo $ObjetoDisable?>>
									<option value="SELECCIONE">SELECCIONE</option>  
									<?php foreach($this->maestro->ListarPais() as $modelo):	 ?>                                               
									<option value="<?php echo $modelo->c_codigo; ?>"  <?php echo $modelo->c_codigo == $c_numitm ? 'selected' : ''; ?>  > <?php echo $modelo->c_nombre; ?> </option>
									<?php  endforeach;	 ?>            
								  </select>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Tipo de Producto</label>
					<div class="col-lg-8">
						<select name="cboTP" id="cboTP" class="select2 form-control">
							<option value="000">.:SELECCIONE:.</option>
							<?php foreach($this->maestro->ListaTipoProductoM() as $a):	 ?>
							<option value="<?php echo $a->C_NUMITM; ?>">
							  <?php echo $a->C_DESITM; ?> </option>
							<?php  endforeach;	 ?>
						</select>
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
					<label for="ejemplo_email_3" class="col-lg-4 control-label">Codigo Equipo</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtCodigo" name="txtCodigo" value="<?php echo $in_arti?>" placeholder="Buscar Producto" <?php echo $ObjetoDisable?> onblur="abrirModal()" onkeypress="abrirModal()" onclick="abrirModal()">
						<input type="hidden" class="form-control" id="txtCodigo2" name="txtCodigo2">
					</div>
				</div>	
					
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha</label>
					<div class="col-lg-8">
					  <input type="date" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha"  value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>
											
			</div>
			<div class="col-lg-4">						
				<div class="form-group">
					<label for="ejemplo_email_3" class="col-lg-4 control-label">T.C</label>
					<div class="col-lg-8">
						<?php $fecha=date('d/m/Y');
					  foreach($this->maestro->ListarTipCambio($fecha) as $tipcam):
						 $tcambio=$tipcam->tc_cmp;	
						endforeach;?>
						<input type="text" class="form-control text" id="txtTc" name="txtTc" placeholder="Tipo de Cambio" value="<?php echo $tcambio ?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>
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
			<div class="form-group">
				<label for="ejemplo_email_3" class="col-lg-4 control-label">Lugar de Trabajo</label>
				<div class="col-lg-8">
					<select name="cbolugar" id="cbolugar" class="select2 form-control" <?php echo $ObjetoDisable?>>
						<option value="SELECCIONE">SELECCIONE</option>  
						<option value="ALMACEN ZGROUP">ALMACEN ZGROUP</option>
						<option value="INSTALACION CLIENTE">INSTALACION CLIENTE</option>         
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="ejemplo_email_3" class="col-lg-4 control-label">Tecnico encargado:</label>
				<div class="col-lg-8">
			      <input type="text" class="form-control" id="txtTecnico" name="txtTecnico" placeholder="Tecnico encargado" value="<?php echo $Ambient?>" <?php echo $ObjetoDisable?>>
				  <input type="hidden" class="form-control" id="txtIdTecnico" name="txtIdTecnico" value="<?php echo $Ambient?>" <?php echo $ObjetoDisable?>>
				</div>
			</div>
			<div class="form-group">
				<label for="ejemplo_email_3" class="col-lg-4 control-label">Ref. Cotizacion:</label>
				<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtRefCoti" name="txtRefCoti" placeholder="Ref. Cotizacion" value="<?php echo $Ambient?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>	
						<div class="form-group">
							<label for="ejemplo_email_3" class="col-lg-4 control-label">Observacion</label>
							<div class="col-lg-8">
							  <input type="text" class="form-control" id="txtObservacion" name="txtObservacion" placeholder="Observacion" value="<?php echo $Ambient?>" <?php echo $ObjetoDisable?>>
							</div>
						</div>						
			</div>
		</div>
		</div>
	<div class="panel panel-default">
		<div class="panel-heading">Registrar Detalles de Trabajos</div>
		<div class="panel-body">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#my_modalagregar" <?php echo $ObjetoDisable?>>+ Concepto</button>
		</div>
	</div>		
	<div class="panel panel-warning">
		<div class="panel-heading">Detalle Trabajo</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label  class="col-lg-4 control-label">Detalle de Trabajo</label>
						<div class="col-lg-8">
							<input type="text" class="form-control text" id="txtConceptoT" name="txtConceptoT" placeholder="Buscar Concepto" <?php echo $ObjetoDisable?>>
							<input type="hidden" class="form-control" id="txtIdConceptoT" name="txtIdConceptoT" >
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Descripcion Adicional</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="txtDecripcionAT" name="txtDecripcionAT" placeholder="Descripcion Adicional" >
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Precio</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="txtPrecioDT" name="txtPrecioDT" >
							</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Cantidad Horas</label>
						<div class="col-lg-8">
							 <input type="text" class="form-control" id="txtCantidadT" name="txtCantidadT" <?php echo $ObjetoDisable?>>
						</div>
					</div>								
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label  class="col-lg-4 control-label">.</label>
						<div class="col-lg-8">
						  <input type="hidden" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">.</label>
						<div class="col-lg-8">
							<input type="hidden" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">.</label>
						<div class="col-lg-8">
							<input type="hidden" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">.</label>
						<div class="col-lg-8">
							<button type="button" class="btn btn-danger" id="agregar-detalle-btnT">Añadir Detalle</button>
						</div>
					</div>					
				</div>
			</div>	
			<div class="row">
				<div class="box-body table-responsive no-padding">
					<table id="detalle-conceptosT" class="table table-bordered table-striped">        
						<thead>
							<tr>
								<th>Concepto</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Precio (<?php if($op==2 or $op==3 or $op==4) {
												echo $SimboloMoneda;?>																											
											<?php 
											} else
											{?><label class="SimboloMoneda"></label>
											<?php }?>
											)</th>    
										<th>Importe (<?php  if($op==2 or $op==3 or $op==4) {
														echo $SimboloMoneda;?>																											
													<?php 
													} else
													{?><label class="SimboloMoneda"></label>
													<?php }?>
													)</th>
										<th></th>
									</tr>
								</thead>
								<tbody>	
								<?php
								if($op==2 or $op==3 or $op==4){
									foreach($this->model->PresupuestoSeleccionarxIdDet($Id_cabpre)as $DetallePre):?>
									<tr>
										<td>
											<input type="hidden" class="form-control " name="txtIdConceptoT[]" id="txtIdConceptoT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cod_concepto?>"/>
											<input type="hidden" class="form-control " name="tipoT[]" id="tipoT<?php echo $DetallePre->item-1?>" value="T"/>
											<input type="text" class="form-control text-left" name="txtConceptoT[]" id="txtConceptoT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->descripcion?>" readonly/>				 
										</td>
										<td>
											<input type="text" class="form-control text-right" name="txtDecripcionAT[]" id="txtDecripcionAT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->unidad_Medida?>" readonly/>
										</td>
										<td>
											<input type="text" class="form-control text-right" name="txtCantidadT[]" id="txtCantidadT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cantidad?>"  <?php echo $ObjetoDisable?>/>
										</td>										
										<td>
											<input type="text" class="form-control text-right" name="txtPrecioDT[]" id="txtPrecioDT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Precio_Dolares?>" <?php echo $ObjetoDisable?>/>
										</td>										
										<td>
											<input type="text" class="form-control text-right" name="det_importeDT[]" id="det_importeDT<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->T_dolares?>"  readonly  />
										</td>
										<td>
											<button class="btn btn-danger btn-sm btn-borrar-detT" type="button"><i class="glyphicon glyphicon-remove"></i></button>
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
								<label class="control-label col-xs-8 text-right">Sub-Total (<?php 
																											 if($op==2 or $op==3 or $op==4) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>
																								)</label>										
									<div class="col-xs-3">
										<input type="text" class="form-control text-right" name="sub_importeDT" id="sub_importeDT" value="<?php echo $Sub_dolaresT?>"  readonly/>
									</div>
							</div>
						</div>									
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Igv (<?php 
																											 if($op==2 or $op==3 or $op==4) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>
																								)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="tot_igvDT" id="tot_igvDT" value="<?php echo $IgvDT?>" readonly/>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Total (<?php 
																											 if($op==2 or $op==3 or $op==4) {
																											echo $SimboloMoneda;?>																											
																											<?php 
																											  } else
																											 {?><label class="SimboloMoneda"></label>
																											 <?php }?>
																								)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="total_importeDT" id="total_importeDT" value="<?php echo $Total_DolaresT?>"  readonly/>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>

			<div class="panel panel-success">
				<div class="panel-heading">Detalle Insumos y Repuestos Utilizados</div>
				<div class="panel-body">
					<div class="row">
						<div class="box-body table-responsive no-padding">
							<table id="detalle-conceptosR" class="table table-bordered table-striped">        
								<thead>
									<tr>
										<th>Concepto</th>
										<th>Unidad</th>
										<th>Cantidad</th>
										<th>Precio (<?php if($op==2 or $op==3 or $op==4) {
														echo $SimboloMoneda;?>																											
													<?php 
													} else
													{?><label class="SimboloMoneda"></label>
													<?php }?>
													)</th>    
										<th>Importe (<?php if($op==2 or $op==3 or $op==4) {
														echo $SimboloMoneda;?>																											
													<?php 
													} else
													{?><label class="SimboloMoneda"></label>
													<?php }?>
													)</th>
										<th></th>
									</tr>
								</thead>
								<tbody>	
								<?php
								if($op==2 or $op==3 or $op==4){
									foreach($this->model->PresupuestoSeleccionarxIdDet($Id_cabpre)as $DetallePre):?>
									<tr>
										<td>
											<input type="hidden" class="form-control " name="txtIdConceptoR[]" id="txtIdConceptoR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cod_concepto?>"/>
											<input type="hidden" class="form-control " name="tipoR[]" id="tipoR<?php echo $DetallePre->item-1?>" value="R"/>
											<input type="text" class="form-control text-left" name="txtConceptoR[]" id="txtConceptoR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->descripcion?>" readonly/>				 
										</td>
										<td>
											<input type="text" class="form-control text-right" name="txtUnidadMedidaR[]" id="txtUnidadMedidaR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->unidad_Medida?>" readonly/>
										</td>
										<td>
											<input type="text" class="form-control text-right" name="txtCantidadR[]" id="txtCantidadR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Cantidad?>"  <?php echo $ObjetoDisable?>/>
										</td>										
										<td>
											<input type="text" class="form-control text-right" name="txtPrecioDR[]" id="txtPrecioDR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->Precio_Dolares?>" <?php echo $ObjetoDisable?>/>
										</td>								
										<td>
											<input type="text" class="form-control text-right" name="det_importeDR[]" id="det_importeDR<?php echo $DetallePre->item-1?>" value="<?php echo $DetallePre->T_dolares?>"  readonly  />
										</td>
										<td>
											<button class="btn btn-danger btn-sm btn-borrar-detR" type="button"><i class="glyphicon glyphicon-remove"></i></button>
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
								<label class="control-label col-xs-8 text-right">Sub-Total (<?php if($op==2 or $op==3 or $op==4) {
																									echo $SimboloMoneda;?>																											
																							<?php 
																							} else
																							{?><label class="SimboloMoneda"></label>
																							<?php }?>
																							)</label>										
									<div class="col-xs-3">
										<input type="text" class="form-control text-right" name="sub_importeDR" id="sub_importeDR" value="<?php echo $Sub_dolaresR?>"  readonly/>
									</div>
							</div>
						</div>									
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Igv (<?php if($op==2 or $op==3 or $op==4) {
																								echo $SimboloMoneda;?>																											
																						<?php 
																						  } else
																						 {?><label class="SimboloMoneda"></label>
																						<?php }?>
																						)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="tot_igvDR" id="tot_igvDR" value="<?php echo $IgvDR?>" readonly/>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Total (<?php if($op==2 or $op==3 or $op==4) {
																							echo $SimboloMoneda;?>																											
																						<?php 
																						 } else
																						 {?><label class="SimboloMoneda"></label>
																						<?php }?>
																						)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="total_importeDR" id="total_importeDR" value="<?php echo $Total_DolaresR?>"  readonly/>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-danger">
				<div class="panel-heading">TOTAL GENERAL</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Sub-Total (<?php if($op==2 or $op==3 or $op==4) {
																								echo $SimboloMoneda;?>																											
																							<?php 
																							} else
																							{?><label class="SimboloMoneda"></label>
																							<?php }?>
																							)</label>										
									<div class="col-xs-3">
										<input type="text" class="form-control text-right" name="sub_importeD" id="sub_importeD" value="<?php echo $Sub_dolares?>"  readonly/>
									</div>
							</div>
						</div>									
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Igv (<?php  if($op==2 or $op==3 or $op==4) {
																							echo $SimboloMoneda;?>																											
																						<?php 
																						} else
																						{?><label class="SimboloMoneda"></label>
																						<?php }?>
																						)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="tot_igvD" id="tot_igvD" value="<?php echo $IgvD?>" readonly/>
								</div>
							</div>
						</div>				
					</div>
					<div class="row">
						<div class="col-xs-9 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-8 text-right">Total (<?php if($op==2 or $op==3 or $op==4) {
																							echo $SimboloMoneda;?>																											
																						<?php 
																						} else
																						{?><label class="SimboloMoneda"></label>
																						<?php }?>
																						)</label>										
								<div class="col-xs-3">
									<input type="text" class="form-control text-right" name="total_importeD" id="total_importeD" value="<?php echo $Total_Dolares?>"  readonly/>
								</div>
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
function pon_prefijo(codigo,maquina) {
	$("#txtCodigo").val(codigo);
	$("#txtCodigo2").val(codigo);
	$("#txtMaquina").val(maquina);
	$('#myModalCodigos').modal('toggle');
}
  $(function () {
    $('#Presupuestos').DataTable({
		'ordering'    : false,
	})
	$('#marcas').DataTable({
		'ordering'    : false,
	})
    $('#detalle-codigosx').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
 function abrirModal(){
	 var codigo=$("#IN_CODI").val();
	 var msg="";
	var error=false;
	
	 if(codigo==""){
		 msg += "- Seleccionar un tipo de producto</br>";
		error=true;
	 }
	 if (error == true) {
	$("#mensaje").html(msg);
	$('#modal-warning').modal('show');
	return 0;
	}	 
	 else{
		 $('#myModalCodigos').modal('show');
		mostrarCodigos(codigo);
	 }
	 
 }
   function mostrarCodigos(codigo){
		$("#detalle-codigos").dataTable().fnDestroy();	
		var tabla=$('#detalle-codigos').dataTable( {
		  "ajax": {
			"processing": true,
			"url": "?c=01&a=BuscarCodigos",
			"oLanguage": {
			"sEmptyTable": "The table is really empty now!"
			},
			"dataTables_empty": "vacio",
			"data": function ( d ) {
				return $.extend( {}, d, {
				"codigo": codigo
			  } );
			},
			/* "error": function(){  
            jQuery("#example").append('<tbody class="grid-error"><tr class="text-center"><th colspan="9">No Hay resultados.</th></tr></tbody>');
            //jQuery("#example").css("display","none");
        } */				
		  }
		});	
  
 }
 
 
    $(document).ready(function(){
		 var stack_modal = {"dir1": "down", "dir2": "right", "push": "top", "modal": true, "overlay_close": true};
		$("#FrmEstimados").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
		if (e.which == 13) {
		return false;
		}
		});
		$("#txtTc").numeric('.');
		$("#txtPrecioDT").numeric('.');
		$("#txtPrecioDR").numeric('.');
		$("#txtCantidadT").numeric('.');			
		$("#txtCantidadR").numeric('.');			
		$(".text").keyup(function(){
		//console.log($(this).val());
		//CalcularTotal();				
	});
	$('#cboMoneda').on('change', function() {
		var SimboloMoneda; //guardara el simbolo obtenido
		var Moneda = $(this).val(); //obtiene el valor seleccioanada
	//alert (Moneda);
	  //petición ajax
	  $.ajax({
		type: "POST",
		url: '?c=01&a=MostrarSimboloMoneda', //en procesosinv.controller.php
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
  if(Moneda=="SELECCIONE")
	{
	$('.SimboloMoneda').html('');	
	}
	else 
	$('.SimboloMoneda').html(SimboloMoneda);
})
 $("#AgregarConcepto").submit(function(e){
	//alert();
	e.preventDefault();
	var datos=new FormData(this);
	$.ajax({
	url: '?c=p10&a=AgregarNota',
	data: datos,				
	processData:false,
	contentType:false,
	type: "post",
	beforeSend:function(){
		$("#mensaje2").html('Espere');
	},
	success: function(mensaje){		
		$('#mensaje2').css('display','block');
		$("#mensaje2").html(mensaje);
/* 		 setTimeout(function() {
			$(".mensaje").fadeIn(1500);
			},6000);
			 */
			setTimeout(function() {
				$("#mensaje2").fadeOut(1500);
			},3000);
		$('#descripcion').val('');
		$('#precio').val('');
		$('#medida').val('');
		$('#partNumber').val('');
		$('#replace').val('');
		$('#hh').val('0');	
		}
	});
	
	
}); 	
	$("#txtProducto").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=BuscarProducto', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
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
	$("#txtProveedor").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=Buscar_Proveedor', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_NRUC,
                            value: item.PR_RAZO,
							PR_NRUC: item.PR_NRUC,
							PR_RAZO: item.PR_RAZO,
							PR_DECL: item.PR_DECL,
							PR_TELE: item.PR_TELE,
							PR_RESP: item.PR_RESP,
							PR_EMAI: item.PR_EMAI
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#CC_NRUCP").val(ui.item.PR_NRUC);
			$("#txtProveedor").val(ui.item.PR_RAZO);     
			$("#txtDecl").val(ui.item.PR_DECL);     
			$("#txtTelefono").val(ui.item.PR_TELE);     
			$("#txtResponsable").val(ui.item.PR_RESP);     
			$("#txtEmail").val(ui.item.PR_EMAI);     
        }
    })
	
	$("#txtConceptoT").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=BuscarDetallesT', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.id_detallet,
                            value: item.descripcion,
							id_detallet: item.id_detallet,
							descripcion: item.descripcion,
							precio: item.precio
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtIdConceptoT").val(ui.item.id_detallet);
			$("#descripcionT").val(ui.item.descripcion);
			$("#txtPrecioDT").val(ui.item.precio);

          
        }
    })
	$("#txtRefCoti").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=BuscarCotiA', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.c_numped,
                            value: item.c_nomcli,
							c_numped: item.c_numped,
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtRefCoti").val(ui.item.c_numped);

          
        }
    })


	
	$("#txtTecnico").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=BuscarTecnico', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.C_NUMITM,
                            value: item.C_DESITM,
							C_NUMITM: item.C_NUMITM,
							C_DESITM: item.C_DESITM,
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtIdTecnico").val(ui.item.C_NUMITM);
			$("#txtTecnico").val(ui.item.C_DESITM);

          
        }
    })
	$("#txtConceptoR").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=01&a=BuscarConceptoR', //en procesosinv.controller.php// url: '?c=inv04&a=BuscarCotiAprobadas',
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
							precioD: item.precioD,
							PartNumber: item.PartNumber,
							Replace: item.Replace
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtIdConceptoR").val(ui.item.id_concepto);
			$("#descripcionR").val(ui.item.txtConcepto);
			$("#txtUnidadMedidaR").val(ui.item.unidad_Medida);
			$("#txtPrecioDR").val(ui.item.precioD);
			$("#txtPartNumberR").val(ui.item.PartNumber);
			$("#txtReplaceR").val(ui.item.Replace);

          
        }
    })
	

  $("#agregar-detalle-btnT").click(function(e){
	  //$('#detalle-conceptos tbody').append('<tr class="child"><td>blahblah</td></tr>');
	 //alert($("#txtIdConcepto").val());
	 
    var txtTc = $("#txtTc").val();
    var txtConcepto = $("#txtConceptoT").val();
    var txtIdConcepto = $("#txtIdConceptoT").val();
    var txtCantidad = $("#txtCantidadT").val();
    var txtPrecioD = $("#txtPrecioDT").val();
    var txtUnidadMedida = $("#txtDecripcionAT").val();
  
	var det_importeD=parseFloat(txtCantidad*txtPrecioD).toFixed(2);
	
     var error = false;
    var msg = "";
	if(txtConcepto == '' || txtIdConcepto == ''){
      msg += 'Ingrese un concepto de reparacion valido.<br>';
	  
	  $("#txtConceptoT").val('');
	  $("#txtConceptoT").focus();
      error = true;
    }

	if(txtPrecioD == '' || txtPrecioD == '0.00' ){
      msg += 'Ingrese un precio Valido.<br>';
      error = true;
	  	$("#txtPrecioDT").val('');
		$("#txtPrecioDT").focus();
    }else{
      txtPrecioD = parseFloat(txtPrecioD);
    }
			
	
	if(txtCantidad == '' ||txtCantidad == '0'){
      msg += 'Ingrese Cantidad Valida.<br>';
      error = true;
	  $("#txtCantidadT").val('');
	  $("#txtCantidadT").focus();
    }
	else{
      txtCantidad = parseFloat(txtCantidad);
    }
	if(txtTc == '' ||txtTc == '0'){
      msg += 'Ingrese Tipo de cambio.<br>';
      error = true;
	  $("#txtTc").val('');
	  $("#txtTc").focus();
    }
	else{
      txtTc = parseFloat(txtTc);
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
		agregarParametroTablaT(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioD,det_importeD);

	}
  });
      $("#agregar-detalle-btnR").click(function(e){
	  //$('#detalle-conceptos tbody').append('<tr class="child"><td>blahblah</td></tr>');
	 //alert($("#txtIdConcepto").val());
	 
    var txtTc = $("#txtTc").val();
    var txtConcepto = $("#txtConceptoR").val();
    var txtIdConcepto = $("#txtIdConceptoR").val();
    var txtCantidad = $("#txtCantidadR").val();
    var txtPrecioD = $("#txtPrecioDR").val();
    var txtUnidadMedida = $("#txtUnidadMedidaR").val();
  
	var det_importeD=parseFloat(txtCantidad*txtPrecioD).toFixed(2);
	
     var error = false;
    var msg = "";
	if(txtConcepto == '' || txtIdConcepto == ''){
      msg += 'Ingrese un concepto de reparacion valido.<br>';
	  
	  $("#txtConceptoTR").val('');
	  $("#txtConceptoTR").focus();
      error = true;
    }

	if(txtPrecioD == '' || txtPrecioD == '0.00' ){
      msg += 'Ingrese un precio Valido.<br>';
      error = true;
	  	$("#txtPrecioDR").val('');
		$("#txtPrecioDR").focus();
    }else{
      txtPrecioD = parseFloat(txtPrecioD);
    }
			
	
	if(txtCantidad == '' ||txtCantidad == '0'){
      msg += 'Ingrese Cantidad Valida.<br>';
      error = true;
	  $("#txtCantidadR").val('');
	  $("#txtCantidadR").focus();
    }
	else{
      txtCantidad = parseFloat(txtCantidad);
    }
	if(txtTc == '' ||txtTc == '0'){
      msg += 'Ingrese Tipo de cambio.<br>';
      error = true;
	  $("#txtTc").val('');
	  $("#txtTc").focus();
    }
	else{
      txtTc = parseFloat(txtTc);
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
		agregarParametroTablaR(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioD,det_importeD);

	}
  });
	
	
	$('body').on('click','.btn-borrar-detT', function(e){
    $(this).parent('td').parent('tr').remove();
    reindexarDetalleT();
    calcularTotalesT();
	calcularTotalGeneral();
  });
  	$('body').on('click','.btn-borrar-detR', function(e){
    $(this).parent('td').parent('tr').remove();
    reindexarDetalleR();
    calcularTotalesR();
	calcularTotalGeneral();
	
  });
    function reindexarDetalleT(){
    var rows = $('#detalle-conceptosT>tbody >tr');
    if(rows.length < 1){
      $("#detalleAgregado").removeAttr('value');
    }
    rows.each(function( index, element ) {
      //$(this).find('td:first').text(index+1);
			$(this).find('.txtIdConceptoT').attr('name', 'txtIdConceptoT[' + index + ']');
			$(this).find('.txtConceptoT').attr('name', 'txtConceptoT[' + index + ']');
			$(this).find('.txtDecripcionAT').attr('name', 'txtDecripcionAT[' + index + ']');
			$(this).find('.txtCantidadT').attr('name', 'txtCantidadT[' + index + ']');
			$(this).find('.txtPrecioDT').attr('name', 'txtPrecioDT[' + index + ']');
			$(this).find('.det_importeDT').attr('name', 'det_importeDT[' + index + ']');
    });
  }
  function reindexarDetalleR(){
    var rows = $('#detalle-conceptosR>tbody >tr');
    if(rows.length < 1){
      $("#detalleAgregado").removeAttr('value');
    }
    rows.each(function( index, element ) {
      //$(this).find('td:first').text(index+1);
			$(this).find('.txtIdConceptoR').attr('name', 'txtIdConceptoR[' + index + ']');
			$(this).find('.txtConceptoR').attr('name', 'txtConceptoR[' + index + ']');
			$(this).find('.txtUnidadMedidaR').attr('name', 'txtUnidadMedidaR[' + index + ']');
			$(this).find('.txtCantidadR').attr('name', 'txtCantidadR[' + index + ']');
			$(this).find('.txtPrecioDR').attr('name', 'txtPrecioDR[' + index + ']');
			$(this).find('.det_importeDR').attr('name', 'det_importeDR[' + index + ']');
    });
  }
  
   function calcularTotalesT(){
	//alert(total_t);
	var subtotalD = 0.0;	
	var totalD = 0.0;
							
    $('input[name^="det_importeDT"]').each(function(index, element){
      var dol = parseFloat($(this).val());
      subtotalD += dol;	      
    });	
	var operacion = $("select[name=cboIgv]").val();
    var igvS;
    var igvD;
    //
    if(operacion == '001'){
      igvD = subtotalD *0.18;
    }else{
      igvD = 0;
    }
	
    $("#tot_igvDT").val(igvD.toFixed(2));
    totalD=subtotalD+igvD
		
	$("#sub_importeDT").val(subtotalD.toFixed(2));
	$("#total_importeDT").val(totalD.toFixed(2));
  }  
   function calcularTotalesR(){
	//alert(total_t);
	var subtotalD = 0.0;	
	var totalD = 0.0;
							
    $('input[name^="det_importeDR"]').each(function(index, element){
      var dol = parseFloat($(this).val());
      subtotalD += dol;	      
    });	
	var operacion = $("select[name=cboIgv]").val();
    var igvS;
    var igvD;
    //
    if(operacion == '001'){
      igvD = subtotalD *0.18;
    }else{
      igvD = 0;
    }
	
    $("#tot_igvDR").val(igvD.toFixed(2));
    totalD=subtotalD+igvD
		
	$("#sub_importeDR").val(subtotalD.toFixed(2));
	$("#total_importeDR").val(totalD.toFixed(2));
  }
   function calcularTotalGeneral(){
	//alert(total_t);
	var subtotalT = 0;	
	var subtotalR =0;		
    var igvT=0;
    var igvR=0;
	var totalT =0;	
	var totalR = 0;	
	
	 subtotalT = $("#sub_importeDT").val();		
	 subtotalR = $("#sub_importeDR").val();		
     igvT=$("#tot_igvDT").val();
     igvR=$("#tot_igvDR").val();
	 totalT = $("#total_importeDT").val();	
	 totalR = $("#total_importeDR").val();	
	
	var subtotal=parseFloat(subtotalT)+parseFloat(subtotalR);
	var igv=parseFloat(igvT)+parseFloat(igvR);
	var total=parseFloat(totalT)+parseFloat(totalR);
    //
    $("#sub_importeD").val(subtotal.toFixed(2));
    $("#tot_igvD").val(igv.toFixed(2));
    $("#total_importeD").val(total.toFixed(2));

  
	}; 
  $('#detalle-conceptosT').on('keyup paste', ':input', function() { 
	$("input[name='txtIdConceptoT[]']").each(function(index, value){
	$txtCantidad = $("#txtCantidadT" + index + "").val();
	$txtPrecioD = $("#txtPrecioDT" + index + "").val();
	if($txtCantidad==0){
		//alert("cantidad no puede ser igual a cero");	
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'la cantidad no puede ser igual a cero',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	}
	if($txtPrecioD==0){
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'costo unitario no puede ser igual a cero',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	}
	});
  
	CalcularImporteT();
   	calcularTotalesT(); 
}); 

  $('#detalle-conceptosR').on('keyup paste', ':input', function() { 
  $("input[name='txtIdConceptoR[]']").each(function(index, value){
	$txtCantidad = $("#txtCantidadR" + index + "").val();
	$txtPrecioD = $("#txtPrecioDR" + index + "").val();
	if($txtCantidad==0){
		//alert("cantidad no puede ser igual a cero");	
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'la cantidad no puede ser igual a cero',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	}
	if($txtPrecioD==0){
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'costo unitario no puede ser igual a cero',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	}
	});
  
	CalcularImporteR();
   	calcularTotalesR(); 
}); 

function show_stack_modal(type) {
    var opts = {
        title: "Over Here",
        text: "Check me out. I'm in a different stack.",
        addclass: "stack-modal",
        stack: stack_modal,
		styling: 'bootstrap3',
    };
    switch (type) {
    case 'error':
        opts.title = "Oh No";
        opts.text = "Watch out for that water tower!";
        opts.type = "error";
        break;
    case 'info':
        opts.title = "Breaking News";
        opts.text = "Have you met Ted?";
        opts.type = "info";
        break;
    case 'success':
        opts.title = "Good News Everyone";
        opts.text = "I've invented a device that bites shiny metal asses.";
        opts.type = "success";
        break;
    }
    new PNotify(opts);
}


 
function CalcularImporteT() {
	$("input[name='txtIdConceptoT[]']").each(function(index, value){
	$txtCantidad = $("#txtCantidadT" + index + "").val();
	$txtPrecioD = $("#txtPrecioDT" + index + "").val();
	$ImporteD = ($txtCantidad * $txtPrecioD);
	$("#det_importeDT" + index + "").val($ImporteD);
	});
}
function CalcularImporteR() {
	$("input[name='txtIdConceptoR[]']").each(function(index, value){
	$txtCantidad = $("#txtCantidadR" + index + "").val();
	$txtPrecioD = $("#txtPrecioDR" + index + "").val();
	$ImporteD = ($txtCantidad * $txtPrecioD);
	        	    $("#det_importeDR" + index + "").val($ImporteD);
	});
	}
   function agregarParametroTablaR(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioD,det_importeD) {
		var rowCount = $('#detalle-conceptosR>tbody >tr').length;
		var index = rowCount;
		//var importe=(Cantidad*Punitario)-Dscto
		
		var fila = `<tr>
			<td>
				<input type="hidden" class="form-control " name="txtIdConceptoR[]" id="txtIdConceptoR${index}" value="${txtIdConcepto}"/>
				<input type="hidden" class="form-control " name="tipoR[]" id="tipoR${index}" value="R"/>
				<input type="text" class="form-control text-left" name="txtConcepto[]" id="txtConceptoR${index}" value="${txtConcepto}" readonly/>				 
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtUnidadMedidaR[]" id="txtUnidadMedidaR${index}" value="${txtUnidadMedida}" readonly/>
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtCantidadR[]" id="txtCantidadR${index}" value="${txtCantidad}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtPrecioDR[]" id="txtPrecioDR${index}" value="${txtPrecioD}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="det_importeDR[]" id="det_importeDR${index}" value="${det_importeD}"  readonly  />
			</td>
			<td>
				<button class="btn btn-danger btn-sm btn-borrar-detR" type="button"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
		</tr>`;
		//$('#table-det-cotizacion > tbody:last-child').append(fila); 
		$('#detalle-conceptosR tbody').append(fila); 
		 calcularTotalesR();
		calcularTotalGeneral();
		$("#txtConceptoR").val('');
		$("#txtIdConceptoR").val('');
		$("#txtUnidadMedidaR").val('');
		$("#txtCantidadR").val('');
		$("#txtPartNumberR").val('');
		$("#txtPrecioDR").val('');

	} 		
  function agregarParametroTablaT(txtConcepto,txtIdConcepto,txtUnidadMedida,txtCantidad,txtPrecioD,det_importeD) {
		var rowCount = $('#detalle-conceptosT>tbody >tr').length;
		var index = rowCount;
		//var importe=(Cantidad*Punitario)-Dscto
		
		var fila = `<tr>
			<td>
				<input type="hidden" class="form-control " name="txtIdConceptoT[]" id="txtIdConceptoT${index}" value="${txtIdConcepto}"/>
				<input type="hidden" class="form-control " name="tipoT[]" id="tipoT${index}" value="T"/>
				<input type="text" class="form-control text-left" name="txtConceptoT[]" id="txtConceptoT${index}" value="${txtConcepto}" readonly/>				 
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtDecripcionAT[]" id="txtDecripcionAT${index}" value="${txtUnidadMedida}" readonly/>
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtCantidadT[]" id="txtCantidadT${index}" value="${txtCantidad}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="txtPrecioDT[]" id="txtPrecioDT${index}" value="${txtPrecioD}" />
			</td>
			<td>
				<input type="text" class="form-control text-right" name="det_importeDT[]" id="det_importeDT${index}" value="${det_importeD}"  readonly  />
			</td>
			<td>
				<button class="btn btn-danger btn-sm btn-borrar-detT" type="button"><i class="glyphicon glyphicon-remove"></i></button>
				</td>
		</tr>`;
		//$('#table-det-cotizacion > tbody:last-child').append(fila); 
		$('#detalle-conceptosT tbody').append(fila); 
		 calcularTotalesT();
		calcularTotalGeneral();
		$("#txtConceptoT").val('');
		$("#txtIdConceptoT").val('');
		$("#txtDecripcionAT").val('');
		$("#txtCantidadT").val('');
		$("#txtPrecioDT").val('');
	} 			
    })
	
</script>
<script>
  function validar(){
	// alert("error");
 	var msg="";
	var error=false;
	var rowCountT = $('#detalle-conceptosT>tbody >tr').length;
	var rowCountR = $('#detalle-conceptosR>tbody >tr').length;
	var indexT = rowCountT;
	var indexR = rowCountR;
	
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
	if($("#sub_importeD").val()==0){		
		msg += "- Ingresar por lo menos un detalle </br>";
		error=true;
	//return 0; //evita que el formulario sea enviado.		
		
	}
	$("input[name='txtIdConceptoT[]']").each(function(index, value){
		$txtCantidad = $("#txtCantidadT" + index + "").val();
		$txtPrecioD = $("#txtPrecioDT" + index + "").val();
		if($txtCantidad==0){
			msg += "- la cantidad no puede ser igual a cero(Detalle Trabajo) </br>";
			error=true;
		}
		if($txtPrecioD==0){
			msg += "- el costo no puede ser igual a cero(Detalle Trabajo) </br>";
			error=true;
		}
	});
	$("input[name='txtIdConceptoR[]']").each(function(index, value){
		$txtCantidad = $("#txtCantidadR" + index + "").val();
		$txtPrecioD = $("#txtPrecioDR" + index + "").val();
		if($txtCantidad==0){
			msg += "- la cantidad no puede ser igual a cero (Detalle Repuestos) </br>";
			error=true;
		}
		if($txtPrecioD==0){
			msg += "- el costo no puede ser igual a cero (Detalle Repuestos) </br>";
			error=true;
		}
	});
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