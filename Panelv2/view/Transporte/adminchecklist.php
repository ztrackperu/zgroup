<div class="container-fluid"> 
<div class="panel panel-success" id="MostrarLista">
  <!-- Default panel contents -->
  <div class="panel-heading">LISTA DE CHECKLIST <button type="button" class="btn btn-default" id="btnRegistrar">REGISTRAR</button></div>
	<div id="FacturasListaLoadMSG">           
    </div>
    <div class="panel-body" >			
		</br>
			<div class="row">
				<div class="col-lg-12">
					<div class="box-body table-responsive no-padding">
						 <table id="example2" class="table table-bordered table-striped" style="width: 100%;">
							<thead>
								<tr>
									<th>N°</th> 
									<th>Servicio</th>        
									<th>Cliente</th>
									<th>Cotizacion</th> 
									<th>Conductor</th> 
									<th>Vehiculo</th> 
									<th>Fecha</th>          
									<th>Ver</th>          
								</tr>									
							</thead>
								<tbody>
									
							<?php	
							$i=1;
							foreach($this->model->ListarCheckList() as $r): 
							
								$archivo=$r->NomImagen;
								$fecha_inicio=vfecha(substr($r->fecha_inicio,0,10));
							?>
								<tr>
									<td>
										<?php echo $i?>
									</td>
									<td>
										<?php echo $r->Id_servicio?>
									</td>
									<td>
										<?php echo $r->cliente?>
									</td>
									<td>
										<?php echo $r->nro_cotizacion?>
									</td>
									<td>
										<?php echo $r->conductor?>
									</td>
									<td>
										<?php echo $r->placa_vehiculo?>
									</td>
									<td>
										<?php echo $fecha_inicio?>
									</td>
									 <td>
									<a class='btn btn-xs btn-info' title="Editar" href="?c=04&a=ActualizarCheckList&id=<?php echo $r->Id?>&udni=<?php echo $_GET['udni']; ?>&mod=1" ><span class='glyphicon glyphicon-pencil'></span></a><!--Editar-->
									<?php
										if($archivo!=""){
										?>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#verdocumento" data-documento="<?php echo ($archivo)?>"
										><i class="fa fa-search"></i></button>	
									<?php
										}
										else{
										?>
										no se cargo imagen	
										<?php	
										}
									?>
									</td>						
								</tr>								
								 <?php
								 $i++;
								 endforeach; ?>
								</tbody>
								<tfoot>
								</tfoot>									   								   
						 </table>
					</div>
				</div>
			</div>
	</div>
</div>
<div class="modal fade" id="verdocumento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					    <h4 class="modal-title">Visualizar Documento</h4>
						</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2">																											
					</div>
					<div class="col-md-8 text-center">													
						<img id="imagen">
						<embed  width="600" height="800">
						<!--<embed src="ARCHIVOS_FOODZ\CERTIFICADO_SENASA/10000002-2.pdf" width="600" height="500">-->
					</div>
					<div class="col-md-2">																											
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

 <div class="panel panel-danger" id="MostrarNuevo" style="display:none">
    <div class="panel-heading">REGISTRAR NUEVO CHECKLIST</div>
    <div class="panel-body">
		<div class="row">
			<form class="form-horizontal" role="form">
				<div class="form-group">
					<label for="ejemplo_email_3" class="col-lg-2 control-label">Ingrese Numero de Servicio</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" id="txtNumServicio"  name="txtNumServicio" required placeholder="Buscar Servicio">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-offset-2 col-lg-10">
						<button type="button" class="btn btn-default" id="btnBuscar">Buscar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="DatosChecklist" style="display:none">
<form class="form-horizontal" role="form" id="FrmChecklist" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-heading">Accion</div>
		<div class="panel-body">
			<div class="row" <?php echo $Divocultar ?> >
				<div class="col-sm-2">
				<input type="hidden" class="form-control" id="Id_servicio"  name="Id_servicio">
				<input type="hidden" class="form-control" id="login"  name="login" value="<?php echo $login ?>  ">
						<button type="submit" class="btn btn-block btn-success"  <?php echo $ObjetoDisable?>></i> Registrar</button> 
				</div>
				<div class="col-sm-2">
					<a href="?c=04&udni=<?php echo @$_GET['udni'] ?>&mod=1">
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
						<input type="text" class="form-control" id="txtCotizacion" name="txtCotizacion" placeholder="Nro. Cotizacion" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha Inicio:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFechaInicio" name="txtFechaInicio" placeholder="Fecha Inicio"  value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Nro de Viaje:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtViaje" name="txtViaje" placeholder="Nro Viaje" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha Fin:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFechaFin" name="txtFechaFin" placeholder="Fecha Fin"  value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
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
						<input type="text" class="form-control" id="txtCliente" name="txtCliente" placeholder="Cliente" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Contacto del Cliente:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtContacto" name="txtContacto" placeholder="Contacto" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">RUC:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtRuc" name="txtRuc" placeholder="RUC" value="<?php echo $Id_cabpre?>" readonly readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Telefono:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>																			
			</div>
			<div class="col-lg-12">	
				<div class="form-group">
					<label  class="col-lg-2 control-label">Direccion de Almacen:</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Direccion" value="<?php echo $Id_cabpre?>" >
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
						<input type="text" class="form-control" id="txtConductor" name="txtConductor" placeholder="Conductor" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Empresa de Transporte:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txTransporte" name="txTransporte" placeholder="Empresa de Transporte" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>				
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Brevete:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtBrevete" name="txtBrevete" placeholder="Brevete" value="<?php echo $Id_cabpre?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">RUC:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtRucTransporte" name="txtRucTransporte" placeholder="RUC transporte" value="<?php echo $Id_cabpre?>" readonly>
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
						<input type="text" class="form-control" id="txtPlaca" name="txtPlaca" placeholder="Placa" value="<?php echo $Id_cabpre?>" readonly>
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Marca:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtMarca" name="txtMarca" placeholder="Marca" value="<?php echo $Id_cabpre?>" readonly >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Modelo:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtModelo" name="txtModelo" placeholder="Modelo" value="<?php echo $Id_cabpre?>" >
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
						<input type="text" class="form-control" id="txtSalmacenZgroup" name="txtSalmacenZgroup" placeholder="KM salida Z" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">KM.Llegada de Almacen Cliente:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtLalmacenCliente" name="txtLalmacenCliente" placeholder="KM llegada A" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">KM.Llegada al Almacen ZGROUP:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtLalmacenZgroup" name="txtLalmacenZgroup" placeholder="KM llegada AZ" value="<?php echo $Id_cabpre?>" >
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
						<input type="time" class="form-control" id="txtHsalmacen" name="txtHsalmacen" max="23:59:59" min="00:01:01" step="1" value="<?php echo $Built_year?>" placeholder="Hora inicio" <?php echo $ObjetoDisable?>>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Hora de llegada al Cliente:</label>
					<div class="col-lg-8">
						<input type="time" class="form-control" id="txtHlcliente" name="txtHlcliente" max="23:59:59" min="00:01:01" step="1" value="<?php echo $Built_year?>" placeholder="Hora inicio" <?php echo $ObjetoDisable?>>
					</div>
				</div>	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Hora de llegada - Almacen</label>
					<div class="col-lg-8">
						<input type="time" class="form-control" id="txtHlalmacen" name="txtHlalmacen" max="23:59:59" min="00:01:01" step="1" value="<?php echo $Built_year?>" placeholder="Hora inicio" <?php echo $ObjetoDisable?>>
					</div>
				</div>	
			</div>
			<div class="col-lg-6">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Salida - Almacen:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFsalmacen" name="txtFsalmacen" value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Llegada al Cliente:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFlcliente" name="txtFlcliente" value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
					</div>
				</div>	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Fecha de Llegada - Almacen:</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" id="txtFlalmacen" name="txtFlalmacen" value="<?php echo date_format(new DateTime($Fecha_ingreso),"Y-m-d")?>" <?php echo $ObjetoDisable?>>
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
						<input type="text" class="form-control" id="txtPeajes" name="txtPeajes" placeholder="Costo Peaje" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>
			</div>
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Costos Viaticos:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtViaticos" name="txtViaticos" placeholder="Costo Viaticos" value="<?php echo $Id_cabpre?>" >
					</div>
				</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Otros Gastos:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtOgastos" name="txtOgastos" placeholder="Otros Gastos" value="<?php echo $Id_cabpre?>" >
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
							<input type="text" class="form-control" id="txtSantes" name="txtSantes" placeholder="Antes" value="<?php echo $Id_cabpre?>" >
						</div>
					</div>
			</div>
			<div class="col-lg-4">	
					<div class="form-group">
						<label  class="col-lg-4 control-label">Durante:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="txtSdurante" name="txtSdurante" placeholder="Durante" value="<?php echo $Id_cabpre?>" >
						</div>
					</div>				
			</div>	
			<div class="col-lg-4">	
				<div class="form-group">
					<label  class="col-lg-4 control-label">Despues:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="txtSdespues" name="txtSdespues" placeholder="Despues" value="<?php echo $Id_cabpre?>" >
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
							<input type="file"   name="AddArchivos" id="AddArchivos"  readonly />
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
  $(document).ready(function(){
	$("#MostrarNuevo").hide();	
	$("#btnRegistrar").click(function(){
		//$('#FacturasListaLoadMSG').fadeIn(1000).html('');		
		$("#MostrarNuevo").show();
		$("#MostrarLista").hide();
	});	
		
	$("#btnBuscar").click(function(){
		//$('#FacturasListaLoadMSG').fadeIn(1000).html('');		
		if($("#txtCotizacion").val() ==''){
			alert("Debe colocar un numero de servicio que sea valido");
		}else{
			$("#DatosChecklist").show();
		}
		
	});	
				$("#example2").dataTable().fnDestroy();
			 //$('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');			 		 		 			 		 	
					var tabla=$('#example2').dataTable( {
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
		
	
    });		
</script>
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
 
 	$("#txtNumServicio").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				url: '?c=04&a=BuscarServicio', 
                type: "post",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.Id_servicio,
                            value: item.servicio,
							Id_servicio: item.Id_servicio,
							c_nomcli: item.c_nomcli,
							c_ruccli: item.c_ruccli,
							c_numped: item.c_numped,
							c_contactocli: item.c_contactocli,
							chofer: item.chofer,
							c_ructransporte: item.c_ructransporte,
							c_nomtranspote: item.c_nomtranspote,
							c_licenci: item.c_licenci,
							c_placa: item.c_placa,
							c_marca: item.c_marca
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#txtNumServicio").val(ui.item.c_nomcli);
            $("#Id_servicio").val(ui.item.Id_servicio);
            $("#txtCotizacion").val(ui.item.c_numped);
            $("#txtCliente").val(ui.item.c_nomcli);
            $("#txtContacto").val(ui.item.c_contactocli);
            $("#txtRuc").val(ui.item.c_ruccli);
            $("#txtConductor").val(ui.item.chofer);
            $("#txTransporte").val(ui.item.c_nomtranspote);
            $("#txtRucTransporte").val(ui.item.c_ructransporte);
            $("#txtBrevete").val(ui.item.c_licenci);
            $("#txtMarca").val(ui.item.c_marca);
            $("#txtPlaca").val(ui.item.c_placa);
          
        }
    })
	
	$("#FrmChecklist").submit(function(e){
		e.preventDefault();
		var datos=new FormData(this);
		$.ajax({
			url: '?c=04&a=GuardarChecklist',
			data: datos,				
			processData:false,
			contentType:false,
			type: "post",
			success: function(str){		
				alert("Se registró correctamente");
				$('#FrmChecklist').hide();
				$('#MostrarNuevo').hide();				
				location.reload();
				}
		}); 
	});	
	
$('#verdocumento').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('documento') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  var res=recipient.split(".")[1];
  console.log(res);
  if(res=='jpg'|| res=='png'||res=='jpeg'){
	  modal.find('.modal-body img').attr('style','display:show') 
	modal.find('.modal-body img').attr('src',recipient) 
	modal.find('.modal-body img').attr('width',500)  
	modal.find('.modal-body img').attr('height',650)  
	modal.find('.modal-body embed').attr('style','display:none')  
  }
if(res=='pdf'){
	modal.find('.modal-body embed').attr('style','display:show')  
	modal.find('.modal-body img').attr('style','display:none') 
  modal.find('.modal-body embed').attr('src',recipient)
  modal.find('.modal-body img').attr('src','')
}
/* $("#verdocumento").on('hidden.bs.modal', function () {
    modal.find('.modal-body embed').attr('src','') 
	modal.find('.modal-body img').attr('src','')	
    }); */


});

</script>