<body onLoad="focuscotizacion()"> 

<div class="container-fluid"> 
<div class="col-xs-10 pull-right">
  <!-- Default panel contents -->

 <form class="form-horizontal" id="frm-inicioguia" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegGuia" >
 <div class="col-lg-7">	
			<div class="panel panel-success">
				<div class="panel-heading">RESUMEN DE GUIAS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label  class="col-lg-4 control-label">Fecha Apertura</label>
								<div class="col-lg-6">
									<input type="text" class="form-control text" id="txtFechaA" name="txtFechaA" value="<?php echo date('d/m/Y')?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="ejemplo_email_3" class="col-lg-4 control-label">Tipo de Documento</label>
								<div class="col-lg-6">
									<input type="hidden" class="form-control" id="txtTipDoc" name="txtTipDoc" value="G" readonly>
									<input type="text" class="form-control" id="txtTipDoc" name="txtTipDoc" value="Guia de Remision" readonly>
								</div>
							</div>
							<?php 
							//max numero guia del dia anterior
							foreach($this->model->MaxGuiaxDia() as $ultimo):
							$NumGuiaU=$ultimo->ultimo;
							endforeach;	
							//guia completa g0000222
							foreach($this->model->NumeroGuiaxDia($NumGuiaU) as $NumeroU):
							$guiaU=$NumeroU->c_numguia;
							endforeach;	
							//min numero guia del dia anterior
							foreach($this->model->MinGuiaxDia() as $primero):
							$NumGuiaP=$primero->primero;
							endforeach;	
							//cant guia del dia anterior
							foreach($this->model->CantGuiaxDia() as $cantidad):
							$cantG=$cantidad->cant;
							endforeach;	
							$total =$cantG-(($NumGuiaU*1)-($NumGuiaP*1)+1)
							?>
							
							<div class="form-group">
								<label for="ejemplo_email_3" class="col-lg-4 control-label">Ultimo Doc. Generado</label>
								<div class="col-lg-6">
									<input type="text" class="form-control" id="txtUltimo" name="txtUltimo" value="<?php echo $guiaU?>" readonly>
									<input type="hidden" class="form-control" id="txtNumU" name="txtNumU" value="<?php echo $NumGuiaU*1?>" readonly>
									<input type="hidden" class="form-control" id="txtNumP" name="txtNumP" value="<?php echo $NumGuiaP*1?>" readonly>
									<input type="hidden" class="form-control" id="txtCant" name="txtCant" value="<?php echo $cantG?>" readonly>
									<input type="hidden" class="form-control" id="txtTotal" name="txtTotal" value="<?php echo $total?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-8 pull-right">
									<?php if($total==0){
									?>
									<a type="button" class="btn btn-primary"  href="?c=inv04&a=InicioRegGuia2&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>">Registrar Guia</a>
									<?php
									}else{
										?>
									<a type="button" class="btn btn-primary"  href="?c=inv04&a=InicioRegGuia2&udni=<?php echo $udni; ?>&mod=<?php echo $_GET['mod']; ?>" disabled>No puede registrar Guia porque tiene guias pendientes por registrar</a>	
										<?php
									}?>
									
								</div>
							</div>							
						</div>							
						</div>
					</div>	
				</div>
			</div>
		</div>

</form>
</div>

</body>