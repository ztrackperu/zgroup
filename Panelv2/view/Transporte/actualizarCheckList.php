<?php 
$dataChecklist = $this->model->MostrarCheckList($_GET['id']);
$cantitems = 0;
 foreach($dataChecklist as $r):
		$Id=$r->Id;
		$Id_servicio=$r->Id_servicio;
		$nro_cotizacion=$r->nro_cotizacion;
		$fecha_inicio=$r->fecha_inicio;
		$fecha_fin=$r->fecha_fin;
		$nro_viaje=$r->nro_viaje;
		$cliente=$r->cliente;
		$ruc_cliente=$r->ruc_cliente;
		$contacto_cliente=$r->contacto_cliente;
		$telefono_cliente=$r->telefono_cliente;
		$almacen_cliente=$r->almacen_cliente;
		$conductor=$r->conductor;
		$brevete_conductor=$r->brevete_conductor;
		$transporte=$r->transporte;
		$ruc_transporte=$r->ruc_transporte;
		$placa_vehiculo=$r->placa_vehiculo; 
		$marca_vehiculo=$r->marca_vehiculo;
		$modelo_vehiculo=$r->modelo_vehiculo;
		$salida_almacen_km=$r->salida_almacen_km;
		$llegada_cliente_km=$r->llegada_cliente_km;
		$llegada_almacen_km=$r->llegada_almacen_km;
		$salida_almacen_hr=$r->salida_almacen_hr;
		$llegada_cliente_hr=$r->llegada_cliente_hr;
		$llegada_almacen_hr=$r->llegada_almacen_hr;
		$salida_almacen_fecha=$r->salida_almacen_fecha;
		$llegada_cliente_fecha=$r->llegada_cliente_fecha;
		$llegada_almacen_fecha=$r->llegada_almacen_fecha;
		$peaje_gastos=$r->peaje_gastos;
		$viaticos_gastos=$r->viaticos_gastos;
		$otros_gastos=$r->otros_gastos;
		$antes_seguimiento=$r->antes_seguimiento;
		$durante_seguimiento=$r->durante_seguimiento;
		$despues_seguimiento=$r->despues_seguimiento;
		$NomImagen=$r->NomImagen;
		$cantitems++;
endforeach;   
?>

<div class="container-fluid"> 
<div id="DatosChecklist">
<form class="form-horizontal" role="form" id="FrmChecklist" method="post" enctype="multipart/form-data" action="?c=04&a=UpdateCheckList&udni=<?= $_GET['udni']; ?>&mod=1">
	<div class="panel panel-default">
		<div class="panel-heading">Accion</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-2">
				<input type="hidden" class="form-control" id="Id"  name="Id" value="<?php echo $Id?>">
				<input type="hidden" class="form-control" id="Id_servicio"  name="Id_servicio" value="<?php echo $Id_servicio?>">
				<input type="hidden" class="form-control" id="login"  name="login" value="<?php echo $login ?>  ">
				<input type="hidden" class="form-control" id="dni"  name="dni" value="<?php echo $udni ?>  ">
				<button type="submit" class="btn btn-block btn-success"></i> Actualizar</button> 
				</div>
				<div class="col-sm-2">
					<a href="?c=04&udni=<?php echo $_GET['udni'] ?>&mod=1">
						<button type="button" class="btn btn-block btn-danger"></i> Regresar</button> 
					</a>
				</div>
			</div>					
		</div>
	</div>
		<div class="panel panel-info">
		<div class="panel-heading">INFO CHECKLIST</div>
		<div class="panel-info panel-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Nro Cotizacion:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtCotizacion" name="txtCotizacion" placeholder="Nro. Cotizacion" value="<?php echo $nro_cotizacion?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha Inicio:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFechaInicio" name="txtFechaInicio" placeholder="Fecha Inicio"  value="<?php echo date_format(new DateTime($fecha_inicio),"Y-m-d")?>">
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Nro de Viaje:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtViaje" name="txtViaje" placeholder="Nro Viaje" value="<?php echo $nro_viaje ?>" >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha Fin:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFechaFin" name="txtFechaFin" placeholder="Fecha Fin"  value="<?php echo date_format(new DateTime($fecha_fin),"Y-m-d")?>">
					</div>
				</div>																			
			</div>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">DATOS DEL CLIENTE</div>
		<div class="panel-info panel-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Cliente:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Cliente" value="<?php echo $cliente?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Contacto del Cliente:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtContacto" name="txtContacto" placeholder="Contacto" value="<?php echo $contacto_cliente?>" readonly >
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">RUC:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtRuc" name="txtRuc" placeholder="RUC" value="<?php echo $ruc_cliente?>" readonly readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Telefono:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" value="<?php echo $telefono_cliente?>" >
					</div>
				</div>																			
			</div>
			<div class="col-lg-12">	
				<div class="form-group">
					<label  class="col-lg-2 control-label">Direccion de Almacen:</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" value="<?php echo $almacen_cliente?>" >
					</div>
				</div>																		
			</div>
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">DATOS DEL CONDUCTOR</div>
        <div class="panel-info panel-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Nombres y Apellidos:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtConductor" name="txtConductor" placeholder="Conductor" value="<?php echo $conductor?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Empresa de Transporte:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txTransporte" name="txTransporte" placeholder="Empresa de Transporte" value="<?php echo $transporte?>" readonly >
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Brevete:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtBrevete" name="txtBrevete" placeholder="Brevete" value="<?php echo $brevete_conductor?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">RUC:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtRucTransporte" name="txtRucTransporte" placeholder="RUC transporte" value="<?php echo $ruc_transporte?>" readonly>
					</div>
				</div>																			
			</div>
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">DATOS DEL VEHICULO</div>
                <div class="panel-info panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Placa:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtPlaca" name="txtPlaca" placeholder="Placa" value="<?php echo $placa_vehiculo ?>" readonly>
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Marca:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtMarca" name="txtMarca" placeholder="Marca" value="<?php echo $marca_vehiculo ?>" readonly >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Modelo:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtModelo" name="txtModelo" placeholder="Modelo" value="<?php echo $modelo_vehiculo ?>" >
					</div>
				</div>				
			</div>			
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">KM. EN ALMACEN</div>
                <div class="panel-info panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label  class="col-lg-4 control-label">KM.Salida de Almacen ZGROUP:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtSalmacenZgroup" name="txtSalmacenZgroup" placeholder="KM salida Z" value="<?php echo $salida_almacen_km ?>" >
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">KM.Llegada de Almacen Cliente:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtLalmacenCliente" name="txtLalmacenCliente" placeholder="KM llegada A" value="<?php echo $llegada_cliente_km ?>" >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">KM.Llegada al Almacen ZGROUP:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtLalmacenZgroup" name="txtLalmacenZgroup" placeholder="KM llegada AZ" value="<?php echo $llegada_almacen_km ?>" >
					</div>
				</div>				
			</div>			
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">CONTROL DE HORAS</div>
        <div class="panel-info panel-body">
			<div class="col-lg-6">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Hora de Salida - Almacen:</label>
					<div class="col-lg-8">
						<input type="time" class="form-control" id="txtHsalmacen" name="txtHsalmacen" max="23:59:59" min="00:01:01" step="1" value="<?php echo $salida_almacen_hr?>" placeholder="Hora inicio">
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Hora de llegada al Cliente:</label>
					<div class="col-lg-8">
						<input type="time" class="form-control" id="txtHlcliente" name="txtHlcliente" max="23:59:59" min="00:01:01" step="1" value="<?php echo $llegada_cliente_hr?>" placeholder="Hora inicio">
					</div>
				</div>	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Hora de llegada - Almacen</label>
					<div class="col-lg-8">
						<input type="time" class="form-control" id="txtHlalmacen" name="txtHlalmacen" max="23:59:59" min="00:01:01" step="1" value="<?php echo $llegada_almacen_hr ?>" placeholder="Hora inicio">
					</div>
				</div>	
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Salida - Almacen:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFsalmacen" name="txtFsalmacen" value="<?php echo date_format(new DateTime($salida_almacen_fecha),"Y-m-d")?>" >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Llegada al Cliente:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFlcliente" name="txtFlcliente" value="<?php echo date_format(new DateTime($llegada_cliente_fecha),"Y-m-d")?>" >
					</div>
				</div>	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Llegada - Almacen:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFlalmacen" name="txtFlalmacen" value="<?php echo date_format(new DateTime($llegada_almacen_fecha),"Y-m-d")?>" >
					</div>
				</div>					
			</div>				
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">GASTOS</div>
        <div class="panel-info panel-body">
			<div class="col-lg-4">
				<div class="form-group">
					<label  class="col-lg-4 control-label">Costo Peajes:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtPeajes" name="txtPeajes" placeholder="Costo Peaje" value="<?php echo $peaje_gastos ?>" >
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Costos Viaticos:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtViaticos" name="txtViaticos" placeholder="Costo Viaticos" value="<?php echo $viaticos_gastos ?>" >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Otros Gastos:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtOgastos" name="txtOgastos" placeholder="Otros Gastos" value="<?php echo $otros_gastos ?>" >
					</div>
				</div>				
			</div>			
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">SEGUIMIENTO DE VIAJE</div>
        <div class="panel-info panel-body">
			<div class="col-lg-4">
					<div class="form-group">
						<label  class="col-lg-4 control-label">Antes:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="txtSantes" name="txtSantes" placeholder="Antes" value="<?php echo $antes_seguimiento ?>" >
						</div>
					</div>
			</div>
			<div class="col-lg-4">	
					<div class="form-group">
						<label  class="col-lg-4 control-label">Durante:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="txtSdurante" name="txtSdurante" placeholder="Durante" value="<?php echo $durante_seguimiento ?>" >
						</div>
					</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Despues:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtSdespues" name="txtSdespues" placeholder="Despues" value="<?php echo $despues_seguimiento?>" >
					</div>
				</div>				
			</div>	
		</div>
	</div>
	<div class="panel panel-info">
        <div class="panel-heading">ADJUNTAR ARCHIVO</div>
        <div class="panel-info panel-body">
			<div class="col-lg-4">	
					<div class="form-group">
						<label  class="col-lg-4 control-label">Seleccione Archivo:</label>
						<div class="col-lg-8">
						<input type="hidden" value="<?php echo $NomImagen?>" id="txtValidar" name="txtValidar"/>
						<?php
							if($NomImagen==""){ ?>
								<input type="file"   name="AddArchivos" id="AddArchivos" readonly />
						<?php		
							} else{	
						?>
							<label  class="col-lg-8 control-label"><?php echo "El archivo ya fue cargado  " .$NomImagen?>"</label>
						<?php
						}
						?>
						</div>
					</div>				
			</div>
		</div>
	</div>
</form>	
</div>

	</div>	
</div>
</body>
<script>
 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
//  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
   //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
     // $( "#txtFechaF" ).datepicker();
   	 // $( "#txtFechaI" ).datepicker();

 });
 	
</script>