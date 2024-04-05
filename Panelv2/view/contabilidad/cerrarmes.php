<script>
/*$(document).ready(function(){ 
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
});*/


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
   $( "#d_fecciecont" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });
   
 });
 
  function validarguardar(){  
		
	   var c_mes=document.getElementById('c_mes').value;
	   if(c_mes==''){			
			var mensje = "Falta Seleccionar mes a Aperturar ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_mes").focus();
			return 0;
		}
		
		var d_fecciecont=document.getElementById('d_fecciecont').value;
	   if(d_fecciecont==''){			
			var mensje = "Falta Ingresar Fecha de Cierre ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecciecont").focus();
			return 0;
		}
	
		if(confirm("Seguro de Cerrar el Mes seleccionado ?")){
		   document.getElementById("Frmregcoti").submit();		
		}	
 }

//ver series
function abrirmodalEqp(){
	if(document.Frmregcoti.c_desprd.value=="" ){	
		var mensje = "Falta Seleccionar un Producto ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
	}else if(document.Frmregcoti.c_producto.value!="1"){	
		var mensje = "El Producto Seleccionado no es Detallado ...!!!";
		$('#alertone').modal('show');
		$('#mensaje').val(mensje);
		return 0; 
	}else{	
		$('#my_modal').modal('show');				
		var c_codprd=document.getElementById('c_codprd').value;
		//document.frmequipo.codpro.value=idequi;				
		//document.write("c_codprd = " + c_codprd);
		 $('#tabla').load("?c=not01&a=VerEquiposDispo",{c_codprd:c_codprd});	
	}
}

function abrirmodalProd(){
	document.frmproducto.criterio.value="";
	almacen=document.Frmregcoti.almacen.value;
	   if(almacen==''){			
			var mensje = "Falta seleccionar Almacen en Datos Destinatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("almacen").focus();
			return 0;
		}	
	$('#my_modalProd').modal('show');				
	var alm=document.Frmregcoti.c_codalm.value;
	//var buscar=document.frmproducto.buscar.value;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tablaProd').load("?c=not01&a=VerProductosDispo",{alm:alm});	
}

function abrirmodalProd2(){
	$('#my_modalProd').modal('show');				
	var alm=document.Frmregcoti.c_codalm.value;
	var criterio=document.frmproducto.criterio.value;				
	//document.write("c_codprd = " + c_codprd);
	 $('#tablaProd').load("?c=not01&a=VerProductosDispo",{alm:alm,criterio:criterio});	
}

</script>
<div class="container-fluid"> 

<div class="panel panel-primary" style="width:700px;text-align:center;margin-left:20%;">
  <!-- Default panel contents -->
  <div class="panel-heading">CERRAR MES</div>
 <div>    
 
 <!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
    <span id="mensaje" class="label label-default"></span>
 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->   

 <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=cont01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarCerrarMes" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Cerrar"/>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
     <!--&nbsp;<a class="btn btn-info" onClick="salir();">Salir</a>&nbsp;-->
    </div>  
        
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-3">Año</label>
            <div class="col-xs-2">
            	<?php /*?><input type="text" id="c_anno" name="c_anno" value="<?php echo date('Y'); ?>" class="form-control input-sm" readonly="readonly"  /> 
            	<?php */?>
				<select name="c_anno" id="c_anno" class="form-control input-sm">
                    <option value=""></option>            		
                    <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                    <option value="<?php echo $a->tm_codi; ?>" <?php echo date('Y') == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
            	 </select>          	
            </div>                     
            <label class="control-label col-xs-2">Mes</label>
            <div class="col-xs-3">
            	<?php /*?><input type="text" id="c_mes" name="c_mes" value="<?php echo date('m'); ?>" class="form-control input-sm" readonly="readonly"  /> 
            	<?php */?>
				<select name="c_mes" id="c_mes" class="form-control input-sm">
                    <option value=""></option> 
                    <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                    <option value="<?php echo $mes->tm_codi; ?>" <?php echo $_REQUEST['c_mes'] == $mes->tm_codi ? 'selected' : ''; ?>  > <?php echo $mes->tm_desc; ?> </option>
                    <?php  endforeach;	 ?>
            	 </select>
         </div>   
      </div>        
   <!--fila 2-->
   <div class="form-group">                     
            <label class="control-label col-xs-3">Usuario</label>
            <div class="col-xs-2">
                 <input type="text" id="c_usercie" name="c_usercie" value="<?php echo $login; ?>" class="form-control input-sm" readonly="readonly"  />          
       	     </div>  
          
           <label class="control-label col-xs-2">Fecha Cierre</label>
            <div class="col-xs-3">
               <input type="text" id="d_fecciecont" name="d_fecciecont" class="form-control datepicker input-sm" placeholder="Fecha"  />              
       	    </div>         
      </div>  
      <!--FILA 3-->
       <div class="form-group">                           
            <label class="control-label col-xs-3">Observacion</label>
            <div class="col-xs-7">
             <input type="text" id="c_obscie" name="c_obscie"  class="form-control input-sm" placeholder="Observacion"  />  
             </div> 
      </div>     
       
       
         
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Transportista
$(document).ready(function(){       
    // Autocomplete de c_nomtra, jquery UI 
    $("#c_nomtra").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=not01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_nomtra").val(ui.item.id);
			$("#NT_CTR").val(ui.item.ruc);
          
        }
    })
	// Fin Autocomplete de producto, jquery UI 
})



</script>


<script>
<!--autocomplete producto-->
/*$(document).ready(function(){   
    $("#descripcion").autocomplete({
		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=not01&a=ProductoBuscar&alm='+document.Frmregcoti.c_codalm.value,
				//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.IN_CODI,
                            value: item.descripcion,
							c_equipo: item.c_equipo,
							IN_STOK: item.IN_STOK,
							IN_COST: item.IN_COST,
							c_desprd: item.IN_ARTI,
							IN_UVTA: item.IN_UVTA
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			$("#c_codprd").val(ui.item.id);
			$("#c_producto").val(ui.item.c_equipo);
			$("#IN_STOK").val(ui.item.IN_STOK);
			$("#NT_PREC").val(ui.item.IN_COST);
			$("#c_desprd").val(ui.item.c_desprd);
			$("#NT_CUND").val(ui.item.IN_UVTA);
			$("#c_codcont").val('');
            //$("#c_codcont").focus();
        }
    })
})*/
//Responsables de la empresa del cliente
$(document).ready(function(){   
    $("#NT_RESPO").autocomplete({		
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
				
                url: '?c=not01&a=ResponsableBuscar&c_ruccli='+document.Frmregcoti.c_ruccli.value,
				//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
                            id: item.c_respo,
                            value: item.c_respo
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
			//$("#c_codprd").val(ui.item.id);
            //$("#c_codcont").focus();
        }
    })
})

function validarot(){
	if(document.Frmregcoti.NT_DOCR.value==""){	
		var mensje = "Falta Ingresar Nro de Orden de Trabajo ...!!!";
			$('#alertone').modal('show');
			$('#mensaje').val(mensje);
			return 0; 
	}
}

//empresas de la orden de trabajo
	$(document).ready(function(){ 	 
		$("#NT_NOC").autocomplete({		
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					
					url: '?c=not02&a=OrdenCompraBuscar&NT_CCLI='+document.Frmregcoti.NT_CCLI.value,
					//url: '?c=not01&a=ProductoBuscar&tp='+document.Frmregcoti.NT_PREC.value,
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return { //
								id: item.c_numeoc,
								value: item.c_numeoc
								//c_rucprov: item.c_rucprov,
								//fecha: item.fecha
							}
						}))
					}
				})
			},
			select: function (e, ui) {
				$("#NT_NOC").val(ui.item.id);
				//$("#NT_CTR").val(ui.item.c_rucprov);
				//$("#NT_FGUI").val(ui.item.fecha);
				
			}
		})
	})


</script>