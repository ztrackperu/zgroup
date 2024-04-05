<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
<div class="container-fluid listado-facturas-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Actualizacion Tipo de Cambio Facturas..</div>
        <div class="panel-body">
			<div class="row">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label  class="col-lg-2 control-label">Tipo de Documento</label>
						<div class="col-lg-4">
						 <select class="form-control input-sm" name="cboTipDoc" id="cboTipDoc" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="B">Boleta</option>
								<option value="F">Factura</option>											
							</select>
						</div>
					</div><div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-2 control-label">Numero de Serie</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtSerie" name="txtSerie" placeholder="Serie">
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-2 control-label">Numero de Factura</label>
						<div class="col-lg-4">
						  <input type="text" class="form-control" id="txtNumero" name="txtNumero" placeholder="Numero">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnMostrar">Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	 <div class="panel panel-success">
        <div class="panel-heading"> Datos de Factura Ingresada</div>
		<div id="FacturasListaLoadMSG">           
        </div>
		<form class="form-horizontal" role="form">
        <div class="panel-body" id="MostrarInformacion" style="display:none">			
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Cliente:</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtCliente" name="txtCliente" readonly>
						  <input type="hidden" class="form-control" id="txtNumDocu" name="txtNumDocu" readonly>
						</div>
					</div>	
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Tipo de Moneda:</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtMonedaA" name="txtMonedaA" readonly>
						  <input type="hidden" class="form-control" id="txtIdMonedaA" name="txtIdMonedaA" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Tipo de Cambio Actual</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtTcA" name="txtTcA" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">SubTotal</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtSubtA" name="txtSubtA" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Igv.</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtIgvA" name="txtIgvA" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Total</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtTotalA" name="txtTotalA" readonly>
						</div>
					</div>		
			</div>
			<div class="col-lg-6">
				
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Cliente:</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtClienteN" name="txtCliente" >
						</div>
					</div>	
					<div class="form-group">
						<label for="ejemplo_email_3" class="col-lg-4 control-label">Tipo de Moneda:</label>
						<div class="col-lg-8">
						 <select class="form-control" name="cboMoneda" id="cboMoneda" > 
								<option value="SELECCIONE">SELECCIONE</option>
								<option value="0">SOLES</option>
								<option value="1">DOLARES</option>											
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Tipo de Cambio Nuevo</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control text" id="txtTcN" name="txtTcN" >
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">SubTotal</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtSubtN" name="txtSubtN" >
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Igv.</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtIgvN" name="txtIgvN" >
						</div>
					</div>
					<div class="form-group">
						<label for="ejemplo_password_3" class="col-lg-4 control-label">Total</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="txtTotalN" name="txtTotalN" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
						  <button type="button" class="btn btn-default" id="btnActualizar" name="btnActualizar">Actualizar</button>
						</div>
					</div>
							
			</div>
			</div>
		</div>
	</form>		
	</div>
</div>

<script>
    $(document).ready(function(){
		 $('#txtSerie').mask('0000');
		 $('#txtNumero').mask('0000000');
		 $("#MostrarInformacion").hide();	
		 var n = 123 
		 var numero2=String('0000000' + n).slice(-8); // returns 00123 ('00000' + n).slice(-5); // returns 00123 
		 console.log(numero2);
        $("#btnMostrar").click(function(){
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Un momento, por favor...</div>');
			 var serie=$("#cboTipDoc").val()+String('0000000'+$("#txtSerie").val()).slice(-3);
			 var numero=String('0000000'+$("#txtNumero").val()).slice(-7);
			 //console.log(serie+numero);
			//alert();
 			$.ajax({
			type: "POST",
			url: 'indexm.php',
			  data: {
				c: 'fac01',
				a: 'BuscarFactura',
				busqueda: serie+numero,
				returnAjax: true,
			  },
			dataType: "json",
			//data: {cotizacion:cotizacion},
			async : false, //espera la respuesta antes de continuar
			success: function(data) {
				//console.log(data);
				var datos=data;
			   console.log(datos);
			   $('#FacturasListaLoadMSG').fadeIn(1000).html(datos);
			   if(datos[0].moneda!=null){				  
				   $('#txtMonedaA').val(datos[0].moneda);
				   $('#txtIdMonedaA').val(datos[0].idmoneda);
				   $('#txtTcA').val(datos[0].tcambio);
				   $('#txtSubtA').val(datos[0].tbruto);
				   $('#txtIgvA').val(datos[0].igv);
				   $('#txtTotalA').val(datos[0].total);
				   $('#txtCliente').val(datos[0].cliente);
				   $('#txtClienteN').val(datos[0].cliente);
				   $('#txtNumDocu').val(datos[0].documento);
				    $("#MostrarInformacion").show();
			   }else{
				    $("#MostrarInformacion").hide("");
			   }
			   
			   
			},
		  }); 
			//$("#MostrarInformacion").show();
		});		
    });
	
	$(".text").keyup(function(){
		//console.log($(this).val());
		CalcularTotal();				
	});
	
	function CalcularTotal() {
		$SubtotalN=0;
		$IgvN=0;
		$TotalN=0;
	    $Tcambio= parseFloat($("#txtTcN").val());
	    $Subtotal = parseFloat($("#txtSubtA").val());
	    $Igv = parseFloat($("#txtIgvA").val());
		$Total = parseFloat($("#txtTotalA").val());

		$SubtotalN =($Subtotal*$Tcambio).toFixed(2);
		$IgvN=($Igv*$Tcambio).toFixed(2);
		$TotalN=($Total*$Tcambio).toFixed(2);
	    $("#txtSubtN").val($SubtotalN);
	    $("#txtIgvN").val($IgvN);
	    $("#txtTotalN").val($TotalN);
	   // $GranTotal += $Importe;
	    //$("#total").val($GranTotal);
	}

        $("#btnActualizar").click(function(){			
			 $('#FacturasListaLoadMSG').html('<div class="loading" style="text-align:center;"><img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;" alt="loading" /><br/>Actualizandio Datos,Un momento, por favor...</div>');
			var numDocumento=$("#txtNumDocu").val();
			var idMoneda=$("#cboMoneda").val();
			var tipoCambio=$("#txtTcN").val();
			var subtotal=$("#txtSubtN").val();
			var igv=$("#txtIgvN").val();
			var total=$("#txtTotalN").val();
			//alert();
 			$.ajax({
			type: "POST",
			url: 'indexm.php',
			  data: {
				c: 'fac02',
				a: 'ActualizarFactura',
				numDocumento: numDocumento,
				idMoneda: idMoneda,
				tipoCambio: tipoCambio,
				subtotal: subtotal,
				igv: igv,
				total: total,
				returnAjax: true,
			  },
			dataType: "json",
			//data: {cotizacion:cotizacion},
			async : false, //espera la respuesta antes de continuar
			success: function(data) {
				//console.log(data);
				var datos=data;
			   console.log(datos);	
				$('#FacturasListaLoadMSG').fadeIn(1000).html(datos);
				limpiarCampos();
				 $("#MostrarInformacion").hide("");
			},
		  }); 
			//$("#MostrarInformacion").show();
		});		
	
/* 	function validarBusqueda(){
		if($("#cboTipDoc").val()=="SELECCIONE"){
			alert("seleccione un tipo de documento");
		}else{
			
		}
		
	} */
	function limpiarCampos(){
		$('#cboTipDoc').val("SELECCIONE");
		$('#txtSerie').val("");
		$('#txtNumero').val("");
		$('#txtClienteN').val("");
		$('#txtClienteN').val("");
		$('#cboMoneda').val("SELECCIONE");
		$('#txtTcN').val("");
		$('#txtSubtN').val("");
		$('#txtIgvN').val("");
		$('#txtTotalN').val("");
		$('#txtTotalN').val("");
	}
	
</script>