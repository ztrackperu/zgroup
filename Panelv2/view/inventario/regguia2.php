
<script type="text/javascript">
function eliminarUsuario(obj){

    var oTr = obj;
    while(oTr.nodeName.toLowerCase()!='tr'){
    oTr=oTr.parentNode;
               }
    var root = oTr.parentNode;
    root.removeChild(oTr);
}

//LISTAR PROVINCIAS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_propartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_deppartida").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_propartida");
		var distritos = $("#c_dispartida");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE PARTIDA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_dispartida").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_propartida").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_dispartida");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

});
///////////////////////////////////////////////////////////

//LISTAR PROVINCIAS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_proentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_depentrega").change(function(){
        // Guardamos el select de provincias
        var provincias = $("#c_proentrega");
		var distritos = $("#c_disentrega");
        // Guardamos el select de departamentos
        var departamentos = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : departamentos.val() },
                url:   '?c=inv04&a=ListaProvincias',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    departamentos.prop('disabled', true);
                },
                success:  function (r) 
                {
                    departamentos.prop('disabled', false);

                    // Limpiamos el select
                    provincias.find('option').remove();					
 					distritos.find('option').remove();
					distritos.val('00');
                    $(r).each(function(i, v){ // indice, valor
                        provincias.append('<option value="' + v.NOMBRE_PROV + '">' + v.NOMBRE_PROV + '</option>');
                    })

                    provincias.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    departamentos.prop('disabled', false);
                }
            });
        }
        else
        {
            provincias.find('option').remove();
            provincias.prop('disabled', true);
        }
    })

});

//LISTAR DISTRITOS DEL LUGAR DE ENTREGA
$(document).ready(function(){
	// Bloqueamos el SELECT de los provincias
    $("#c_disentrega").prop('disabled', true);
	
 // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
    $("#c_proentrega").change(function(){
        // Guardamos el select de provincias
        var distritos = $("#c_disentrega");

        // Guardamos el select de departamentos
		var departamentos = $(this);
        var provincias = $(this);

        if($(this).val() != '')
        {
            $.ajax({
                data: { id : provincias.val() },
                url:   '?c=inv04&a=ListaDistritos',
                type:  'POST',
                dataType: 'json',
                beforeSend: function () 
                {
                    provincias.prop('disabled', true);
                },
                success:  function (r) 
                {
                    provincias.prop('disabled', false);

                    // Limpiamos el select
                    distritos.find('option').remove();

                    $(r).each(function(i, v){ // indice, valor
                        distritos.append('<option value="' + v.NOMBRE_DISTRITO + '">' + v.NOMBRE_DISTRITO + '</option>');
                    })

                    distritos.prop('disabled', false);
                },
                error: function()
                {
                    alert('Ocurrio un error en el servidor ..');
                    provincias.prop('disabled', false);
                }
            });
        }
        else
        {
            distritos.find('option').remove();
            distritos.prop('disabled', true);
        }
    })

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
   $( "#d_fecgui" ).datepicker({ minDate: "-1M", maxDate: "+1M +10D" });
   $( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
 
 function validarguardar(){	
	   var c_ructra=document.getElementById('c_ructra').value;
 	   if(c_ructra==''){			
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0;
		}
			
		var c_chofer=document.getElementById('c_chofer').value;			
		if(c_chofer==''){
			var mensje = "Falta Buscar Chofer ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
			
		var c_placa=document.getElementById('c_placa').value;		 					
		if(c_placa==''){
			var mensje = "Falta Ingresar Placa Tracto ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa").focus();
			return 0;
		}
		
		var c_placa2=document.getElementById('c_placa2').value;	 					
		if(c_placa2=='00'){
			var mensje = "Falta Ingresar Placa Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
		
		//INICIA VALIDAR PARTIDA Y ENTREGA
		var c_deppartida=document.getElementById('c_deppartida').value;	 					
		if(c_deppartida=='00'){
			var mensje = "Falta Seleccionar Departamento de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deppartida").focus();
			return 0;
		}
		var c_propartida=document.getElementById('c_propartida').value;	 					
		if(c_propartida=='[ Provincia ]' || c_propartida=='00'){
			var mensje = "Falta Seleccionar Provincia de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_propartida").focus();
			return 0;
		}
		var c_dispartida=document.getElementById('c_dispartida').value;	 					
		if(c_dispartida=='00'){
			var mensje = "Falta Seleccionar Distrito de Partida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_dispartida").focus();
			return 0;
		}
		
		var c_depentrega=document.getElementById('c_depentrega').value;	 					
		if(c_depentrega=='00'){
			var mensje = "Falta Seleccionar Departamento de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depentrega").focus();
			return 0;
		}
		var c_proentrega=document.getElementById('c_proentrega').value;	 					
		if(c_proentrega=='[ Provincia ]' || c_proentrega=='00'){
			var mensje = "Falta Seleccionar Provincia de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_proentrega").focus();
			return 0;
		}
		var c_disentrega=document.getElementById('c_disentrega').value;	 					
		if(c_disentrega=='00'){
			var mensje = "Falta Seleccionar Distrito de Entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_disentrega").focus();
			return 0;
		}		
		//FIN VALIDAR PARTIDA Y ENTREGA	
				
		var c_llega=document.getElementById('c_llega').value;	 					
		if(c_llega==''){
			var mensje = "Falta Ingresar Lugar de entrega ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_llega").focus();
			return 0;
			 					
		}if(confirm("Seguro de Registrar Guia ?")){
		   document.getElementById("frm-regguia").submit();		
	 }	
 }

//BUSCAR CHOFER
function abrirmodalTrans(){	
	 var c_nomtra=document.getElementById('c_nomtra').value;
	 var c_ructra=document.getElementById('c_ructra').value;
	 if(c_nomtra==''||c_ructra==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtra").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtra;
	 	$('#tablaTrans').load("?c=inv04&a=VerChoferes",{c_nomtra:c_nomtra,c_ructra:c_ructra});	
	 }
}

function abrirmodalForwarder(){	
		$('#my_modalForwarder').modal('show');	 	
	 	$('#tablaForwarder').load("?c=inv04&a=VerForwarder");		 
}

</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $titulo; ?></div>
 <div> 
 
 <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR CHOFER-->
 
  <!--modal de BUSCAR Forwarder-->
<form class="form-horizontal" id="" name="">
<div class="modal fade" id="my_modalForwarder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Listado de Forwarder <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
      </div>
      	<div class="modal-body">
            <table id="tablaForwarder" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal de BUSCAR Forwarder-->
 
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

 <form class="form-horizontal" id="frm-regguia" method="post" action="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegGuia" >
 	<div class="form-control-static" align="right">
   	 <a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>&nbsp;<a class="btn btn-danger" href="?c=inv04&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=InicioRegGuia">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    
 <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Destinatario</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
  </ul> 
  
  <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
          <label class="control-label col-xs-1">Nº Cotiz-.</label>
          <div class="col-xs-2">
             <input type="text" name="c_numped" id="c_numped" value="<?php echo $c_numped; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
          <label class="control-label col-xs-2">Nº Asign.</label>
          <div class="col-xs-2">
             <input type="text" name="n_idasig" id="n_idasig" value="<?php echo $n_idasig; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
          <label class="control-label col-xs-1">Motivo</label>
          <div class="col-xs-2">
             <input type="text" name="c_motivo" id="c_motivo" value="<?php echo $c_motivo; ?>" class="form-control input-sm" readonly="readonly" />  
          </div>
            
        </div>
        
        <!--fila 2-->
       <div class="form-group">
       		<label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-2">
             <input type="text" name="d_fecgui" id="d_fecgui" value="<?php echo date('d/m/Y'); ?>" class="form-control datepicker input-sm" placeholder="Fecha y Hora" data-validacion-tipo="requerido" />
        	</div>           
            <label class="control-label col-xs-2">Serie </label>
            <div class="col-xs-2">
           	  <select name="c_serdoc" id="c_serdoc" class="form-control input-sm">
                <option value="001">001</option>
                <option value="002" selected="selected">002</option>
                <option value="003">003</option>
                <option value="004">004</option>
                <option value="005">005</option>
                <option value="006">006</option>
              </select>	
               
            </div>                   
            <label class="control-label col-xs-1">N° Guia </label>
            <div class="col-xs-2">
            	<input type="text" name="c_nume" id="c_nume" value="<?php echo $c_nume; ?>" class="form-control input-sm"  />  
        	</div>   
        </div>
   <!--fila 3-->
   		<div class="form-group">         	 
           <label class="control-label col-xs-1">Transaccion </label>
            <div class="col-xs-2">
               <select name="c_codtra" id="c_codtra" class="form-control input-sm"> 
                <option value="7">TRANSFERENCIA SALIDA</option>
                <option value="8">TRANSFERENCIA INGRESO</option>
               </select>          	
            </div>   
            <label class="control-label col-xs-2">Dcto Ref.</label>
            <div class="col-xs-2">
             <input type="text" id="c_docref" name="c_docref" class="form-control input-sm"    />  
            </div>   
            <label class="control-label col-xs-1">Forwarder</label>
            <div class="col-xs-2">
             <input type="text" id="n_forwarder" name="n_forwarder" class="form-control input-sm" onFocus="abrirmodalForwarder();"     />  
            </div>              	
              
        </div> 
            
       <hr />
       <!--fila 3-->
       <div class="form-group">
           <label class="control-label col-xs-1">Cliente</label>
            <div class="col-xs-3">
             <input type="text" name="c_nomdes" id="c_nomdes" value="<?php echo $c_nomdes; ?>" class="form-control input-sm" placeholder="Cliente" <?php if($c_nomdes!=''){ ?>  readonly="readonly" <?php } ?> />  
        	</div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="c_coddes" name="c_coddes" value="<?php echo $c_coddes; ?>" class="form-control input-sm" placeholder="Nro ruc" <?php if($c_coddes!=''){ ?>  readonly="readonly" <?php } ?>  />  
             
         </div>
         
         <label class="control-label col-xs-1">RUC</label>
            <div class="col-xs-2">
             <input type="text" id="c_rucdes" name="c_rucdes" value="<?php echo $c_rucdes; ?>" class="form-control input-sm" placeholder="Nro ruc" <?php if($c_rucdes!=''){ ?>  readonly="readonly" <?php } ?>  />  
             
        	</div>            
      </div>       
      
       
        </div>
        
        <div role="tabpanel" id="transporte"  class="tab-pane"   >  
        
           <div class="form-group">
           <label class="control-label col-xs-1"></label>
           </div> 
         <!--fila 5--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Transportista </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomtra" id="c_nomtra" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>  
        	 <input type="hidden" id="c_ructra" name="c_ructra" value=""  /> 		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <input type="text" name="c_chofer" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />  
            
             </div>
         	<label class="control-label col-xs-1">Licencia</label>
            <div class="col-xs-2">
            <input type="text" name="c_licenci" id="c_licenci" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido|email" /> 
        	</div>   
        </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Marca </label>
            <div class="col-xs-2">
             <input type="text" name="c_marca" id="c_marca" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-2">Placa </label>
            <div class="col-xs-1">
             <input name="c_placa" id="c_placa" type="text" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />  
            </div> 
            <div class="col-xs-1">
             <input name="c_placa2" id="c_placa2" type="text" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />  
            </div> 
            <label class="control-label col-xs-1">F. Traslado </label>
            <div class="col-xs-2">
             <input type="text" name="d_fecref" id="d_fecref" value="<?php echo date('d/m/Y'); ?>" class="form-control datepicker input-sm" placeholder="Fecha Traslado" data-validacion-tipo="requerido" />
        	</div>        	  
        </div>
        <hr />         
        <!--fila 7--> 
         <div class="form-group"> 
           <label class="control-label col-xs-2">Lugar de Partida</label>
            <div class="col-xs-3">
             <!--<textarea name="c_partida" id="c_partida" class="form-control input-sm" rows="2" placeholder="Lugar de Partida" >AV NESTOR GAMBETTA KM 7, CALLAO</textarea>-->
             <input name="c_parti" id="c_parti" type="text" class="form-control input-sm"   value="AV NESTOR GAMBETTA KM 7.5, CALLAO"  />
        	</div>               
            <div class="col-xs-2">
              <select id="c_deppartida" name="c_deppartida"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>" <?php echo $depa->NOMBRE_DEPTO == 'CALLAO' ? 'selected' : ''; ?>  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
               </select>
           </div>           
           <div class="col-xs-2">
              <select id="c_propartida" name="c_propartida"  class="form-control input-sm" >
                   <option selected value="00">[ Provincia ]</option>     
                   <option value="<?php echo 'CALLAO' ?>" selected="selected"  > <?php echo 'CALLAO' ?> </option>                  
               </select>
           </div>
           <div class="col-xs-2">
              <select id="c_dispartida" name="c_dispartida"  class="form-control input-sm" >
                   <option selected value="00">[ Distrito ]</option>  
                   <option value="<?php echo 'CALLAO' ?>" selected="selected"  > <?php echo 'CALLAO' ?> </option>                       
               </select>
           </div>        	   
        </div> 
        
        <!--fila 8--> 
         <div class="form-group">  
            <label class="control-label col-xs-2">Lugar de Entrega</label>          
            <div class="col-xs-3">
            <!-- <textarea name="c_llega" id="c_llega" class="form-control input-sm" rows="1" placeholder="Lugar de Entrega" ></textarea>-->
             <input type="text" name="c_llega" id="c_llega" value="" class="form-control input-sm" placeholder="Lugar de Entrega"  />  
          	 </div> 
             <div class="col-xs-2">
               <select id="c_depentrega" name="c_depentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Departamento ]</option>                    
                   <?php foreach($this->maestro->ListaDepartamentos() as $depa):	 ?>                                   
                   <option value="<?php echo $depa->NOMBRE_DEPTO; ?>"  > <?php echo $depa->NOMBRE_DEPTO; ?> </option>
                   <?php  endforeach;	 ?>                         
                </select>            
               </div>  
               <div class="col-xs-2">
              <select id="c_proentrega" name="c_proentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Provincia ]</option>                       
               </select>
           </div>
           <div class="col-xs-2">
              <select id="c_disentrega" name="c_disentrega"  class="form-control input-sm" >
                   <option selected value="00">[ Distrito ]</option>                         
               </select>
           </div>               	   
        </div> 
         <!--fila 8--> 
         <div class="form-group">     
            <label class="control-label col-xs-2">Observacion </label>
            <div class="col-xs-5">
            <!-- <textarea name="c_glosa" id="c_glosa" class="form-control input-sm" rows="2" placeholder="Observacion" ></textarea>-->
             <input type="text" name="c_glosa" id="c_glosa" value="" class="form-control input-sm" placeholder="Observacion"  />  
        	</div>
            <label class="control-label col-xs-1">Selva </label>
            <div class="col-xs-1">
            <input type="checkbox" name="sw_selva" id="sw_selva" value="1" class="input-sm" />  
        	</div>         	   
        </div>                       
        
    </div> <!--end div  role="tabpanel" id="cabecera"-->
	
	<div  role="tabpanel"  id="detalle" class="tab-pane"  > 
       
       <?php if($this->model->ListarDetCoti($c_numped)!=NULL) { ?> 
        <table id="tablas" class="table table-hover" style="font-size:12px;">
    <thead>        	 
        <tr>
            <th height="51" style="width:100px;">Item</th>        
            <th>Descripcion</th>            
            <th>Cod. Equipo</th>
            <th>Observacion</th>
            <th style="width:100px;">Estado</th>
            <th style="width:100px;">Eliminar</th>
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarDetCoti($c_numped) as $r):
		$c_codprd=$r->c_codprd;			
		$n_item=$r->n_item;	 
		$c_tipped=$r->c_tipped;	
		$i=$i+1;
	?>
        <tr>
          <td>
            <input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>"  readonly="readonly" />	
			<?php echo $n_item; ?>
            <input type="hidden" name="<?php echo 'c_codund'.$i; ?>" id="<?php echo 'c_codund'.$i; ?>" value="<?php echo $r->c_codund; ?>" /> 
          	<input type="hidden" name="<?php echo 'n_canprd'.$i; ?>" id="<?php echo 'n_canprd'.$i; ?>" value="<?php echo $r->n_canprd; ?>" /> 
            <input type="hidden" name="<?php echo 'n_preprd'.$i; ?>" id="<?php echo 'n_preprd'.$i; ?>" value="<?php echo $r->n_preprd; ?>" /> 
          </td>
          
          <td>
            <input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->c_codprd; ?>"  readonly="readonly" />	
            <input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->c_desprd; ?>"  readonly="readonly" />	
            <?php echo $r->c_desprd; ?>
          </td>          
          <td>     
            <input type="hidden" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?php echo $r->c_codcont; ?>"  /> <?php echo $r->c_codcont; ?>
          </td>   
          <td>
          	
          	  <input type="text" class="form-control input-sm" name="<?php echo 'c_obsprd'.$i; ?>" id="<?php echo 'c_obsprd'.$i; ?>" value=""   />	
             	         
          </td>       
       	  <td>                 
          	  <?php /*?><select name="<?php echo 'c_estaequipo'.$i; ?>" id="<?php echo 'c_estaequipo'.$i; ?>" style="width:130px;"   class="form-control input-sm" >
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select><?php */?> 
               <?php 
			   		if($c_tipped=='001'){
						$c_estaequipo='V';	
					}else if($c_tipped=='017'){
						$c_estaequipo='A';
					}else if($c_tipped=='015'){
						$c_estaequipo='M';
					}else if($c_tipped=='002'){
						$c_estaequipo='R';
					}
			   ?>
               <input type="text" name="<?php echo 'c_estaequipo'.$i; ?>" id="<?php echo 'c_estaequipo'.$i; ?>" value="<?php echo $c_estaequipo; ?>" class="form-control input-sm" readonly="readonly"  />
                
           </td>
           <td><input type="button" name="button3" id="button3" value="delete"  class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)" /></td>
        </tr>
    <?php endforeach; ?>  	
   		  <input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>"  readonly="readonly" />	
          	
    </tbody>
</table>
<?php }else if($this->model->ListarDetAsig($n_idasig)!=NULL) { ?> 
        <table id="tablas" class="table table-hover" style="font-size:12px;">
    <thead>        	 
        <tr>
            <th height="51" style="width:100px;">Item</th>        
            <th>Descripcion</th>            
            <th>Cod. Equipo</th>
            <th>Observacion</th>
            <th style="width:100px;">Estado</th>
            <th>Eliminar</th>
            
        </tr>
        
    </thead>
    <tbody>
    <?php 
		$i=0;
		foreach($this->model->ListarDetAsig($n_idasig) as $r):
		$c_codprd=$r->c_codprd;		
		$n_item=$r->n_item;	 
		$c_tipped=$r->c_tipcoti;	
		$i=$i+1;
	?>
        <tr>
          <td>
            <input type="hidden" name="<?php echo 'n_item'.$i; ?>" id="<?php echo 'n_item'.$i; ?>" value="<?php echo $n_item; ?>"  readonly="readonly" />	
			<?php echo $n_item; ?>
            <input type="hidden" name="<?php echo 'c_codund'.$i; ?>" id="<?php echo 'c_codund'.$i; ?>" value="<?php echo $r->c_codund; ?>" /> 
          	<input type="hidden" name="<?php echo 'n_canprd'.$i; ?>" id="<?php echo 'n_canprd'.$i; ?>" value="<?php echo $r->n_canprd; ?>" /> 
            <input type="hidden" name="<?php echo 'n_preprd'.$i; ?>" id="<?php echo 'n_preprd'.$i; ?>" value="<?php echo $r->n_preprd; ?>" /> 
          </td>
          
          <td>
            <input type="hidden" name="<?php echo 'c_codprd'.$i; ?>" id="<?php echo 'c_codprd'.$i; ?>" value="<?php echo $r->c_codprd; ?>"  readonly="readonly" />	
            <input type="hidden" name="<?php echo 'c_desprd'.$i; ?>" id="<?php echo 'c_desprd'.$i; ?>" value="<?php echo $r->c_desprd; ?>"  readonly="readonly" />	
            <?php echo $r->c_desprd; ?>
          </td>          
          <td>     
            <input type="hidden" name="<?php echo 'c_codcont'.$i; ?>" id="<?php echo 'c_codcont'.$i; ?>" value="<?php echo $r->c_idequipo; ?>"  /> <?php echo $r->c_idequipo; ?>
          </td>   
          <td>
          	
          	  <input type="text" class="form-control input-sm" name="<?php echo 'c_obsprd'.$i; ?>" id="<?php echo 'c_obsprd'.$i; ?>" value=""   />	
             	         
          </td>       
       	  <td>          
          	  <?php /*?><select name="<?php echo 'c_estaequipo'.$i; ?>" id="<?php echo 'c_estaequipo'.$i; ?>" style="width:130px;"   class="form-control input-sm" >
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select><?php */?> 
                <?php 
			   		if($c_tipped=='001'){
						$c_estaequipo='V';	
					}else if($c_tipped=='017'){
						$c_estaequipo='A';
					}else if($c_tipped=='015'){
						$c_estaequipo='M';
					}else if($c_tipped=='002'){
						$c_estaequipo='R';
					}
			   ?>
               <input type="text" name="<?php echo 'c_estaequipo'.$i; ?>" id="<?php echo 'c_estaequipo'.$i; ?>" value="<?php echo $c_estaequipo; ?>" class="form-control input-sm" readonly="readonly"  />
           </td>
           <td><input type="button" name="button3" id="button3" value="delete"  class="btn btn-danger btn-sm" onClick="eliminarUsuario(this)" /></td>
        </tr>
    <?php endforeach; ?>  	
   		  <input type="hidden" name="maxitem" id="maxitem" value="<?php echo $i; ?>"  readonly="readonly" />	
          	
    </tbody>
</table>
<?php }else{ echo 'hola';} ?>
	</div><!--end div  role="tabpanel" id="detalle"-->
</div><!--end div class="tab-content"-->  
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Transportista

$(document).ready(function(){   
    
    /* Autocomplete de c_nomtra, jquery UI */
    $("#c_nomtra").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ProveedorBuscar', //en procesosinv.controller.php
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
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtra").val(ui.item.id);
			$("#c_ructra").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Cliente
$(document).ready(function(){     
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomdes").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.CC_RUC,
                            value: item.CC_RAZO,
							ruc:item.CC_NRUC                          
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {			
            $("#c_coddes").val(ui.item.id);
			$("#c_rucdes").val(ui.item.ruc);
           
        }
    })
})

</script>

