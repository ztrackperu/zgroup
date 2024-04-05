
<script>
function cambiarnom(){	
	var c_idconcepto=document.frmliquidar.c_idconcepto.options[document.frmliquidar.c_idconcepto.selectedIndex].text;	
	document.getElementById('c_nomconcepto').value=c_idconcepto;
	
	if(c_idconcepto=='PEAJE'){
		//Buscar peajes	
		/* Autocomplete de c_nomtranspote, jquery UI */
		$("#c_descripcion").autocomplete({
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					url: '?c=01&a=PeajeBuscar', //en procesosinv.controller.php
					type: "post",
					dataType: "json",
					data: {
						criterio: request.term
					},
					success: function (data) {
						response($.map(data, function (item) {
							return { 
								id: item.descripcion,
								value: item.descripcion,
								c_codpeaje: item.c_codpeaje
							}
						}))
					}
				})
			},<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
			select: function (e, ui) {
				$("#c_coddes").val(ui.item.c_codpeaje);
				$("#c_descripcion").val(ui.item.descripcion);         
			}
		})
		/* Fin Autocomplete de EIR, jquery UI */		
	} else{
		$("#c_descripcion").autocomplete({
			dataType: 'JSON',
			source: function (request, response) {
				jQuery.ajax({
					url: '?c=01&a=xxxxxxxx'
				})
			}
		})
	}//end else
}//end function

function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
}
 
 
function validaMonto(){
	//var maxi=document.getElementById('maxi').value;
	//for(i=1;i<=maxi;i++){
		var monto=document.getElementById('n_impogast').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(monto)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById('n_impogast').value='';
		document.getElementById('n_impogast').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	//}
}

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
   $( "#d_fecdoc").datepicker(); 
    //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });  
 });
 
  function validarguardar(){
	  c_idconcepto=document.getElementById('c_idconcepto').value;
	    if(c_idconcepto!='007'){
			var n_impogast=document.getElementById('n_impogast').value;
		   if(n_impogast==''){			
				var mensje = "Falta Ingresar Monto del Documento ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("n_impogast").focus();
				return 0;
			}
		  var c_tipdoc=document.getElementById('c_tipdoc').value;
		   if(c_tipdoc=='SELECCIONE'){			
				var mensje = "Falta Seleccionar el Tipo del Documento ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("c_tipdoc").focus();
				return 0;
			}
		  var c_seriedoc=document.getElementById('c_seriedoc').value;
		   if(c_seriedoc==''){			
				var mensje = "Falta Ingresar la Serie del Documento ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("c_seriedoc").focus();
				return 0;
			}
		var c_numdoc=document.getElementById('c_numdoc').value;
		   if(c_numdoc==''){			
				var mensje = "Falta Ingresar el Numero del Documento ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("c_numdoc").focus();
				return 0;
			}
		  var d_fecdoc=document.getElementById('d_fecdoc').value;
		   if(d_fecdoc==''){			
				var mensje = "Falta Ingresar fecha de documento ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById("d_fecdoc").focus();
				return 0;
			}		
		}	  	 
		if(confirm("Seguro de Guardar la liquidacion ?")){
		   document.getElementById("frmliquidar").submit();		
		}	
 }

</script>

<body> 

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

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">LIQUIDAR LOS VIATICOS DEL SERV. TRANSP. N° <?php echo $Id_servicio?></div>
</div>

<form class="form-horizontal" id="frmliquidar" name="frmliquidar" method="post"  action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarLiquidacion" >
    <div class="form-control-static" align="right">
     &nbsp;<!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a> -->
     	<input class="btn btn-success" type="button" onClick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarViaticos&Id_servicio=<?php echo $_GET['Id_servicio']?>">Cancelar</a>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    <table>
    	 <tr>
        	<?php
				$c_moneda=$listarliquidartot->c_moneda;
				if($c_moneda=='0'){	
				  $mon='S/. ';		
				}else{
				  $mon='US$. ';
				}
				if($c_nrofw!=NULL){
			?>
        	<td style="width:150px;"><strong>N° FORDWARDER</strong></td> 
            <td style="width:150px;"> <?php echo $c_nrofw;?></td>    
            <?php
				}
			?>  
            <?php
				if($c_numped!=NULL){
			?>
        	<td style="width:150px;"><strong>N° COTIZACION</strong></td> 
            <td style="width:150px;"> <?php echo $c_numped;?></td>    
            <?php
				}
			?>                     
        </tr>
   		<tr>
        	<td style="width:150px;"><strong>IMPORTE TOTAL</strong></td>             
            <td style="width:150px;"> <?php echo $mon. ' '.$listarliquidartot->n_importe;?></td>            
            <td style="width:150px;"><strong>IMPORTE GASTADO</strong></td>
            <td style="width:150px;"><?php echo $mon. ' '.$listarliquidartot->n_impogastot;?></td>
            <td style="width:70px;"><strong>SALDO</strong></td>
            <td style="width:150px;"><?php echo $mon. ' '.$listarliquidartot->n_saldo;?></td>           
        </tr>     
           
    </table> 
    <div class="form-group">
    	<label class="control-label col-xs-1"></label>
    </div>
        <table id="tablaRegLiquidar" class="table table-hover" style="font-size:12px;">     	
    	<thead>	
        <tr>            
            <th width="80" style="width:150px;">CONCEPTO</th> 
            <th width="80" style="width:150px;">DESCRIPCION</th>            
            <th width="198" style="width:200px;">MONTO EN <?php echo $mon ?></th>               
            <th width="198" style="width:200px;">TIPO DCTO</th>
            <th  style="width:200px;">SERIE Y N° DCTO</th>                  
            <th width="156" style="width:150px;">FECHA DCTO</th>           
                      
        </tr>
        
    </thead>
    <tbody>  
         <tr>
          <td><?php echo $Id_viatico.' / '.$n_item;?> </td>         
          <td>
           <!--RECUPERAR PARA VOLVER -->
            <input  type="hidden" id="Id_servicio" name="Id_servicio"  value="<?php echo $Id_servicio; ?>" />
            <input  type="hidden" id="n_item" name="n_item"  value="<?php echo $n_item; ?>" />
         <!--FIN RECUPERAR PARA VOLVER -->
          <!--RECUPERAR PARA GUARDAR -->
            <input  type="hidden" id="Id_viatico" name="Id_viatico"  value="<?php echo $Id_viatico; ?>" />
            <input  type="hidden" id="Id_detviatico" name="Id_detviatico"  value="<?php echo $Id_detviatico; ?>" />
            <input  type="hidden" id="c_moneda" name="c_moneda"  value="<?php echo $listarliquidartot->c_moneda; ?>" /> 
           <!--FIN RECUPERAR PARA GUARDAR -->          
            <select id="c_idconcepto" name="c_idconcepto"  class="form-control input-sm" onChange="cambiarnom();">
              <option value="SELECCIONE">SELECCIONE</option>
              <?php 
			  	$conceptoviaticos=$this->model->ListarConceptoViaticos(); 
			    foreach ($conceptoviaticos as $convia){
			  ?>
              <option value="<?php echo $convia->C_NUMITM; ?>"><?php echo $convia->C_DESITM; ?></option>
              <?php } ?>
              </select>
              <input type="hidden"  id="c_nomconcepto" name="c_nomconcepto"  /></td>
              
             <td><input type="hidden" name="c_coddes" id="c_coddes"  />
             <input type="text" name="c_descripcion" id="c_descripcion"  class="form-control input-sm" placeholder="Descripcion" />
        	 </td>
             
              <td>
              	<input  type="text" style="width:100px;" id="n_impogast" name="n_impogast"  class="form-control input-sm" value="" onBlur="validaMonto();" onKeyPress="return validaDecimal(event)"  /> 
              </td>         
         
          <td>         	 
             <select id="c_tipdoc" name="c_tipdoc"  class="form-control input-sm" >
              <option value="SINDOC">SIN DOC</option>
              <?php 
			  	$listartipodoc=$this->model->ListarTipoDocumentoCont(); 
			    foreach ($listartipodoc as $tipdoc){
			  ?>
              <option value="<?php echo $tipdoc->C_NUMITM; ?>"><?php echo $tipdoc->C_DESITM; ?></option>
              <?php } ?>
              </select>
          </td>
          <td width="71"><input  type="text" id="c_seriedoc" name="c_seriedoc"  class="form-control input-sm" value="" maxlength="3" style="width:45px;" /></td>
          <td width="123"><input  type="text" id="c_numdoc" name="c_numdoc"  class="form-control input-sm" value="" style="width:80px;" /> </td>
          <td><input  type="text" id="d_fecdoc" name="d_fecdoc"  class="form-control datepicker input-sm" value="" /> </td>         
       	  <td></td> 
        </tr>

    </tbody>
    
</table> 
        	
</form>

</div>


