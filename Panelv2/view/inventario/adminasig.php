<script>
//window.onunload=despedida();
//desbloquea los equipos disponibles bloqueados otros dias que no sean hoy
function desbloquearEquipos() { 
	jQuery.ajax({
		url: '?c=inv02&a=desbloEquiDiaspas',
		type: "post",
		dataType: "json"
	});
}	
	
function abrirmodal(IdAsig,c_numped){
	$('#my_modalelim').modal('show');				
	//var idequi=document.getElementById('c_codprd').value;
	//document.frmequipo.codpro.value=idequi;				
	//document.write("IdAsig = " + IdAsig);
	 $('#tablaelim').load("?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerEliminarDetAsig",{IdAsig:IdAsig,c_numped:c_numped});	
}

function eliminarAsig(){
	if(document.getElementById('todoc_motielim').disabled==false){
		var todoc_motielim=document.getElementById('todoc_motielim').value;
		if(todoc_motielim==''){
			alert('Falta Ingresar motivo de Eliminar toda la Asignacion');
			document.getElementById("todoc_motielim").focus();
			return 0;
		}
		if(confirm("Seguro de Eliminar toda la Asignacion ?")){
			document.getElementById("frm-eliminarAsig").submit();
		}
	}else{
		//alert('desabilitado');
		var n_itemmax=document.getElementById('n_itemmax').value;
		var count=0;		
		for(i=1;i<=n_itemmax;i++){		
			if(document.getElementById('re'+i).checked==true){							
				count=count+1;
			}
		}
		if(count==0){							
			alert('Falta Seleccionar asignaciones a eliminar');			
			return 0;
		}					
		if(confirm("Seguro de Eliminar las asignaciones seleccionadas ?")){
			document.getElementById("frm-eliminarAsig").submit();
		}
	}
}	
</script>

<body onLoad="desbloquearEquipos()" > 
	<!--modal de eliminacion de asignacion-->
	<div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">          
				<form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=EliminarDetAsignacion" >       
					<div class="modal-header">      
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Eliminacion de Asignacion (Solo detalles sin guia)</h4>
						<!--<input name="todoc_motielim"  id="todoc_motielim" type="text" class="form-control"  disabled />-->
					</div>      
					<div class="modal-body">           
						<table id="tablaelim" class="table table-hover" style="font-size:12px;">   			
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" onClick="eliminarAsig()">Eliminar</button>        
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--fin modal eliminacion--> 
<div class="container-fluid"> 

<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document" id="mdialTamanio">
        <div class="modal-content">
            <form id="ActualizarAvance" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel"> Ver OT asociadas a la cotizacion</h5>
                </div>
                <div class="modal-body">
					<div class="alert alert-primary" role="alert" id="mensaje2" style="display:none">
					</div>
						<div class="box-body table-responsive no-padding">
						<input type="hidden" class="form-control text-right" name="txtCoti" id="txtCoti"/>
							<table  id="detalle-ordenes" class="table table-bordered table-striped" >
							  <thead>
								<th>Num Ot </td>
								<th>Programado</td>
								<th>Ejecutado </td>
							  </thead>
							  <tbody>
							  </tbody>
							</table>						
						</div>
						
					<div class="row">
						<div class="col-xs-12 pull-right">
							<div class="form-group ">
								<label class="control-label col-xs-2 text-right">Total</label>										
									<div class="col-xs-5">
										<input type="text" class="form-control text-right" name="txtTProgramado" id="txtTProgramado" value="<?php echo "total";?>"  readonly/>
									</div>
									<div class="col-xs-5">
										<input type="text" class="form-control text-right" name="txtTEjecutado" id="txtTEjecutado" value="<?php echo "total";?>"  readonly/>
									</div>
							</div>
						</div>									
					</div>
                </div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION ASIGNACIONES..</div>
</div>
  &nbsp;&nbsp;<a class="btn btn-primary" href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegAsig">NUEVA ASIGNACION</a>
 <form class="form-horizontal" method="post" action="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarAsignacion&ncoti=<?php echo $_GET['ncoti']; ?>&c_nomcli=<?php echo $_GET['c_nomcli']; ?>" id="frmpedidet" name="frmpedidet">

<table id="tablas" class="table table-bordered table-striped">
    <?php if($this->model->ListarAsignacion() != NULL) {?>
    <thead>   
		<tr>
            <th style="width:180px;">N? DE ASIG.</th>
            <th style="width:300px;">CLIENTE</th>                    
            <th>COTIZACION</th>           
            <th>ESTADO DESPACHO</th>
            <th>ESTADO FACTURA</th>
            <th style="width:150px;">ESTADO ASIG</th>  
            <th style="width:150px;">FECHA ASIG.</th>         
            <th style="width:150px;">FECHA DESPACHO</th>         
            <!--<th style="width:150px;"> AVANCE</th>         
            <th style="width:150px;"> EJECUCION</th>-->         
            <th style="width:110px;"></th>            
        </tr>       
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarAsignacion() as $r):
		$IdAsig=$r->IdAsig;	
		$c_nomcli=$r->c_nomcli;	
		$c_numped=$r->c_numped;	
			if($c_numped!=""){
				$ValidarCoti=$this->model->ValidarCoti($c_numped); //ver estado de asignacion de la cotiacion
				$c_estasig=$ValidarCoti->c_estasig;
				if($c_estasig=='0'){
					$estado='<font color="#009900">Asignacion Parcial</font>';
				}else if($c_estasig=='1'){
					$estado='<font color="#0000FF">Completado</font>';
				}
			}else{
				$estado='<font color="#FF0000">Cotiz. Pendiente</font>';
			}		
		//$c_numguia=$r->c_numguia;		
		$c_usureg=$r->c_usureg;	
		//estado
		//$c_estado=$r->c_estado;		
		$c_estguia=$r->c_estguia;	
		
		$ValidarDetguiaAsig=$this->model->ValidarDetguiaAsig($IdAsig);
		$ValidarDetguiaCoti=$this->model->ValidarDetguiaCoti($c_numped);
		if($c_estguia=='1'){
			$estadodesp='<font color="#0000FF">Entregado</font>';
		}else if($ValidarDetguiaAsig!=NULL){
			$estadodesp='<font color="#009900">Despacho Parcial</font>';
		}/* else if($ValidarDetguiaAsig!=NULL){
			$estadodesp='<font color="#009900">Despacho Parcial</font>';
		} */else{
			$estadodesp='<font color="#FF0000">Por entregar</font>';
		}
		$d_fecreg=$r->d_fecreg;	
		//validar coti facturada
		$validaestado=$this->model->ValidarCotiEstado($c_numped);
		$c_estadocoti=$validaestado->c_estado;
		$fecha_despacho=$validaestado->fecha_despacho;
		if($fecha_despacho==""){
			$fecha_despacho="-";
		}else{
			$fecha_despacho=vfecha(substr($validaestado->fecha_despacho,0,10));
		}
		$usuario_despacho=$validaestado->usuario_despacho;
			if($validaestado->c_estado=='1' || $validaestado->c_estado=='2'){
				$estadocoti='<font color="#0000FF">Facturado</font>';
			}else if($c_numped==""){
				$estadocoti='<font color="#FF0000">Cotiz. Pendiente</font>';
			}else{
				$estadocoti='<font color="#FF0000">Pendiente</font>';
			}
			
		if($usuario_despacho==""){
			$fecha_despacho2= '<strong style="color:#FF9900">'.$fecha_despacho.'</strong>';
			 //<a class="btn btn-xs btn-info" title="Fecha de Despacho - almacen" href="#my_modal" data-toggle="modal" data-coti="'.$c_numped.'" data-fecha="'.$fecha_despacho.'"><span class="glyphicon glyphicon-pencil"></span></a>';
			}
			else{
			$fecha_despacho2= '<strong style="color:#060">'.$fecha_despacho.'</strong>';							
			} 	
		$i=$i+1;
	?>
        <tr>
          <td><?php echo $IdAsig; ?></td>          
          <td><?php echo utf8_encode($c_nomcli);?></td>
          <td>
          	<?php 
				if($c_numped!=""){
					echo $c_numped;
				}else{
					echo 'S/C';
				}  
			?>            
          </td>
          <td><?php echo $estadodesp;?></td>
          <td><?php echo $estadocoti;?></td>
          <td><?php echo $estado;?></td>
          <td><?php echo vfecha(substr($d_fecreg,0,10)); ?></td>
          <td><?php echo $fecha_despacho2; ?></td>
			<!--  <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#my_modal" data-coti="<?php //echo $c_numped ?>" >
					<span class="glyphicon glyphicon-search"></span>
				</button>
			  </td>
			  <td>
			  <div class="progress progress-striped active">
				  <div class="progress-bar" role="progressbar"
					   aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
					   style="width: 45%">
					<span class="sr-only">45% completado</span>
				  </div>
				</div>
			  
			  </td>-->
       	  <td colspan="2"> 
             	   
               <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                Accion <span class="caret"></span>
              </a> 
              <ul class="dropdown-menu" role="menu">
              	  <?php if($c_estguia!='1' && $c_estadocoti!='2'){ ?>	              	   
                  <li><a href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=UpdAsig&IdAsig=<?php echo $r->IdAsig; ?>">Editar</a></li>            
                  <li><a onClick="abrirmodal('<?php echo $IdAsig ?>','<?php echo $c_numped ?>')" >Eliminar</a></li>
                  <?php } ?>
                 <li><a href="?c=inv02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ImprimirAsig&IdAsig=<?php echo $r->IdAsig; ?>">Imprimir</a></li>                  
              </ul>
            </div>            
           </td>
        </tr>
    <?php endforeach; ?>  	
   
    </tbody>
    <?php }else{} ?>
</table> 
</form>
   		               
</div>

<script>
   $('#my_modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var coti = button.data('coti') // Extract info from data-* attributes
 // var fecha = button.data('fecha') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
    modal.find('.modal-title').text('Ver OT asociadas a la cotizacion:  ' + coti)
	mostrarCodigos(coti)
	modal.find('.modal-body  #txtCoti').val(coti) 
	//modal.find('.modal-body  #txtFcomercial').val(fecha) 
})
   function mostrarCodigos(coti){
		$("#detalle-ordenes").dataTable().fnDestroy();	
		var tabla=$('#detalle-ordenes').dataTable( {
		  "ajax": {
			"processing": true,
			"url": "?c=inv02&a=BuscarOrdenes",
			"oLanguage": {
			"sEmptyTable": "The table is really empty now!"
			},
			"dataTables_empty": "vacio",
			"data": function ( d ) {
				return $.extend( {}, d, {
				"coti": coti
			  } );
			},
			/* "error": function(){  
            jQuery("#example").append('<tbody class="grid-error"><tr class="text-center"><th colspan="9">No Hay resultados.</th></tr></tbody>');
            //jQuery("#example").css("display","none");
        } */				
		  }
		});	  
 }
  $('#detalle-ordenes').on('keyup paste', ':input', function() { 
  $("input[name='txtProgramado[]']").each(function(index, value){
	$txtProgramado = $("#txtProgramado" + index + "").val();
	$txtEjecutado = $("#txtEjecutado" + index + "").val();
	/* if($txtProgramado==0 || $txtProgramado>100){
		//alert("cantidad no puede ser igual a cero");	
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'El porcentaje no debe ser cero o mayor  que el 100%',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	} */
/* 	if($txtEjecutado==0 || $txtEjecutado>100){
		new PNotify({
			title: 'Error',
			type: "error",
			text: 'El Avance no debe ser cero o mayor  que el 100%',
			nonblock: {
				nonblock: true
			},
			addclass: 'dark',
				styling: 'bootstrap3',

		});	
	} */
	});
  
	//CalcularImporteR();
   	calcularTotalesR(); 
}); 
/* function CalcularImporteR() {
	$("input[name='txtProgramado[]']").each(function(index, value){
	$txtProgramado = $("#txtProgramado" + index + "").val();
	$txtEjecutado = $("#txtEjecutado" + index + "").val();
	$Total = ($txtProgramado + $txtEjecutado);
	        	    $("#txtTProgramado").val($Total);
	});
	} */
	
  function calcularTotalesR(){
	//alert(total_t);
	var subtotalA = 0.0;
	var subtotalP = 0.0;
							
    $('input[name^="txtProgramado"]').each(function(index, element){
      var dol = parseFloat($(this).val());
      subtotalP += dol;	      
    });	
	$('input[name^="txtEjecutado"]').each(function(index, element){
      var dol = parseFloat($(this).val());
      subtotalA += dol;	      
    });
	
   $("#txtTProgramado").val(subtotalP.toFixed(2));
   $("#txtTEjecutado").val(subtotalA.toFixed(2));
    //totalD=subtotalD+igvD
		
	//$("#total_importeDR").val(totalD.toFixed(2));
  }	
  
  $("#ActualizarAvance").submit(function(e){
	//alert();
	e.preventDefault();
	var datos=new FormData(this);
	$.ajax({
	url: '?c=inv02&a=ActualizarDiasAvance',
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
  
</script>
	<script>		
	$(document).ready(function() {
    $('#tablas').DataTable( {      
	  dom			: 'Bfrtip',
	  ordering: false,
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
    } );
} );
	</script>
</body>