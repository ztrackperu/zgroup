<script>
 
 //validar numeros
 function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
} 
 
 function validarguardar(){	
   //VALIDAR DATOS DOCUMENTO
		var c_condicion=document.getElementById('c_condicion').value;
 	 if(c_condicion==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de embarque ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_condicion").focus();
			return 0;
		}
	var transportista=document.getElementById('transportista').value;
 	 if(transportista==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_ructra=document.getElementById('c_ructra').value;
 	 if(c_ructra==''){
			var mensje = "Falta Buscar y Seleccionar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0;
		}
	var c_chofer=document.getElementById('c_chofer').value;
 	 if(c_chofer==''){
			var mensje = "Falta Buscar Chofer del Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_chofer").focus();
			return 0;
		}
	var c_placa2=document.getElementById('c_placa2').value;
 	 if(c_placa2==''){
			var mensje = "Falta Ingresar Placa de Carreta ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_placa2").focus();
			return 0;
		}
	var c_fechora=document.getElementById('c_fechora').value;
 	 if(c_fechora==''){
			var mensje = "Falta Ingresar Fecha de EIR ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_fechora").focus();
			return 0;
		}
	var c_nomtec=document.getElementById('c_nomtec').value;
 	 if(c_nomtec==''){
			var mensje = "Falta Ingresar Nombre del Técnico ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtec").focus();
			return 0;
		}
	var psalida=document.getElementById('psalida').value;
 	 if(psalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("psalida").focus();
			return 0;
		}
	var pllegada=document.getElementById('pllegada').value;
 	 if(pllegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Punto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("pllegada").focus();
			return 0;
		}
	var c_depsal=document.getElementById('c_depsal').value;
 	 if(c_depsal==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_depsal").focus();
			return 0;
		}
	var c_deping=document.getElementById('c_deping').value;
 	 if(c_deping==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Deposito de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_deping").focus();
			return 0;
		}
	var ptosalida=document.getElementById('ptosalida').value;
 	 if(ptosalida==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Salida ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptosalida").focus();
			return 0;
		}
	var ptollegada=document.getElementById('ptollegada').value;
 	 if(ptollegada==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Puerto de Llegada ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("ptollegada").focus();
			return 0;
		}
	var c_tipo2=document.getElementById('c_tipo2').value;


 	 if(c_tipo2==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Seleccionar Condicion de Equipo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_tipo2").focus();
			return 0;
		}
	var c_precinto=document.getElementById('c_precinto').value;
 	 if(c_precinto==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto Zgroup ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precinto").focus();
			return 0;
		}	
	var c_precintocli=document.getElementById('c_precintocli').value;
 	 if(c_precintocli==''){
			//alert('Falta Seleccionar Condicion de embarque');
			var mensje = "Falta Ingresar Precinto del Cliente ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_precintocli").focus();
			return 0;
		}		
	//FIN VALIDAR DATOS DOCUMENTO
	 if(confirm("Seguro de Registrar EIR ?")){
			document.getElementById("frm-EirEntrada").submit();
	 }
}


//BUSCAR CHOFER
function abrirmodalTrans(){	
	 var c_nomtra=document.getElementById('transportista').value;
	 var c_ructra=document.getElementById('c_ructra').value;
	 if(c_nomtra==''||c_ructra==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("transportista").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtra;
	 	$('#tablaTrans').load("?c=inv03&a=VerChoferes",{c_nomtra:c_nomtra,c_ructra:c_ructra});	
	 }
}
</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">ACTUALIZAR EIR DE <?php echo $tipo; ?> N° <?php echo $ListarEirUpd->c_numeir ?> </div>
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
 
 <!-- Inicio Modal -->
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

 <form class="form-horizontal" id="frm-EirEntrada" method="post" action="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegEirEntrada" >
 	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>
    
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"> <a  href="#cabecera" aria-controls="cabecera" role="tab" data-toggle="tab"  >Datos Cabecera</a></li>
    <li role="presentation"> <a  href="#transporte" aria-controls="transporte" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
    <li role="presentation"><a  href="#detalle" aria-controls="detalle" role="tab" data-toggle="tab"  >Datos Detalle</a></li>
    <!--<li role="presentation"><a  href="#complemento" aria-controls="complemento" role="tab" data-toggle="tab"  >Datos de Complemento</a></li> DATOS LANCHA-->
    <!--<li role="presentation"><a  href="#equipo" aria-controls="equipo" role="tab" data-toggle="tab"  >Datos Actualizar Equipo</a></li>-->
    <li role="presentation"><a  href="#permiso" aria-controls="permiso" role="tab" data-toggle="tab"  >Datos Permisos</a></li>
  </ul> 
  
   <div class="tab-content">     
	<div role="tabpanel" id="cabecera"  class="tab-pane active"   >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">
           <label class="control-label col-xs-1">Tipo Reg.</label>	             
            <div class="col-xs-2">
             <input type="text" name="c_motivo" id="c_motivo"  class="form-control input-sm" value="<?php echo $ListarEirUpd->c_motivo ?>" readonly="readonly" />
        	</div> 
            <label class="control-label col-xs-2">Tipo Doc</label>
            <div class="col-xs-2">
              <input type="text" name="c_tipoio" id="c_tipoio" value="<?php echo $tipo ?>" class="form-control input-sm"  readonly="readonly" />  
            </div>                   
            <label class="control-label col-xs-1">Condicion </label>
            <div class="col-xs-2">
             <select name="c_condicion" id="c_condicion" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="1" <?php if($ListarEirUpd->c_condicion=='1'){ ?> selected="selected" <?php } ?>>VACIO</option>
                <option value="2" <?php if($ListarEirUpd->c_condicion=='2'){ ?> selected="selected" <?php } ?>>LLENO</option>
                <option value="3" <?php if($ListarEirUpd->c_condicion=='3'){ ?> selected="selected" <?php } ?>>FCL</option>
                <option value="4" <?php if($ListarEirUpd->c_condicion=='4'){ ?> selected="selected" <?php } ?>>LCL</option>
              </select>	
        	</div>   
        </div>
   <!--fila 2-->
       <div class="form-group">
           <label class="control-label col-xs-1">Cliente</label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="c_nomcli" id="c_nomcli" value="<?php echo $ListarEirUpd->c_nomcli ?>" class="form-control input-sm" placeholder="Cliente" readonly="readonly"/>  
        	</div>                     
            <label class="control-label col-xs-1">Codigo</label>
            <div class="col-xs-2">
             <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $ListarEirUpd->c_codcli ?>" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />  
             
         </div>
         
         <label class="control-label col-xs-1">Tipo Mov</label>
            <div class="col-xs-2">
             <select name="c_tipo" id="c_tipo" class="form-control input-sm">
                <option value="0">SELECCIONE</option>
                <option value="1" <?php if($ListarEirUpd->c_tipo=='1'){ ?> selected="selected" <?php } ?>>EMBARQUE</option>
                <option value="2" <?php if($ListarEirUpd->c_tipo=='2'){ ?> selected="selected" <?php } ?>>DESCARGA</option>
              </select>	
        	</div>            
      </div>       
    </div>  <!--end div  role="tabpanel" id="cabecera"-->
	
    <div role="tabpanel" id="transporte"  class="tab-pane"   >
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
         <!--fila 6--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Empresa </label>
            <div class="col-xs-3">
             <input autocomplete="off" type="text" name="transportista" id="transportista" value="<?php echo $ListarEirUpd->transportista ?>" class="form-control input-sm" placeholder="Empresa"/>  
        	 <input type="hidden" id="c_ructra" name="c_ructra" value="<?php echo $ListarEirUpd->c_ructra ?>"  /> 		
            </div>                       
            <label class="control-label col-xs-1">Chofer </label>
            <div class="col-xs-2">
             <!--<input type="text" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" data-validacion-tipo="requerido" />-->  
             <input type="text" name="c_chofer" id="c_chofer" value="<?php echo $ListarEirUpd->c_chofer ?>" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />
             </div>
         	<label class="control-label col-xs-1">Licencia</label>
            <div class="col-xs-2">
            <input type="text" id="c_licenci" name="c_licenci" value="<?php echo $ListarEirUpd->c_licencia ?>" class="form-control input-sm" placeholder="Licencia"  /> 
        	</div>   
        </div>
         <!--fila 7--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Fecha</label>
            <div class="col-xs-3">
             <input type="text" id="c_fechora" name="c_fechora" value="" class="form-control datepicker input-sm" placeholder="Fecha y Hora de EIR"  />
        	</div>
           <label class="control-label col-xs-1">Placa Carreta </label>
            <div class="col-xs-2">
             <input type="text" id="c_placa2" name="c_placa2" value="" class="form-control input-sm" placeholder="Placa Carreta" data-validacion-tipo="requerido" />  
        	</div>                       
            <label class="control-label col-xs-1">Placa Tracto </label>
            <div class="col-xs-2">
             <input type="text" id="c_placa" name="c_placa" value="" class="form-control input-sm" placeholder="Placa Tracto" data-validacion-tipo="requerido" />  
             <input type="hidden" id="c_marca" name="c_marca" value=""  /> <!--Para evitar error en verChoferes.php (el mismo para regguia)-->	
            </div>
         	  
        </div>
        <hr />
         <!--fila 8--> 
         <div class="form-group"> 
           <label class="control-label col-xs-1">Tecnico</label>
            <div class="col-xs-3">
             <input type="text" id="c_nomtec" name="c_nomtec" value="" class="form-control input-sm" placeholder="Tecnico"  />  
        	</div>                       
            <label class="control-label col-xs-1">Punto</label>
            <div class="col-xs-2">             
             <select id="psalida" name="psalida"  class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>
         	<label class="control-label col-xs-1">Punto</label>
           <div class="col-xs-2">
           		<select id="pllegada" name="pllegada"  class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
         
           </div>   
        </div>
         <!--fila 9--> 
         <div class="form-group">                                  
            <label class="control-label col-xs-1">Obs.EIR</label>
            <div class="col-xs-3">
             <input type="text" id="c_obseir" name="c_obseir" value="" class="form-control input-sm" placeholder="Observacion EIR" />  
             </div> 
            <label class="control-label col-xs-1">Deposito</label>
            <div class="col-xs-2">             
             <select name="c_depsal" id="c_depsal" class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>
         	<label class="control-label col-xs-1">Deposito</label>
           <div class="col-xs-2">
           		<select name="c_deping" id="c_deping" class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>         
           </div>         	   
        </div>  
         <!--fila 10--> 
         <div class="form-group">   
         	<label class="control-label col-xs-1">Obs.Equipo</label>
            <div class="col-xs-3">
             <input type="text" id="c_obs" name="c_obs" value="" class="form-control input-sm" placeholder="Observacion Equipo" />  
             </div>                                
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">
               <select name="ptosalida" id="ptosalida" class="form-control input-sm" >
                   <option value="">[SALIDA]</option>
                   <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>  
             </div> 
            <label class="control-label col-xs-1">Puerto</label>
            <div class="col-xs-2">             
             <select name="ptollegada" id="ptollegada" class="form-control input-sm" >
                   <option value="">[LLEGADA]</option>
                   <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
                   <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
                   <?php  endforeach;	 ?>       
               </select>	
           </div>       	   
        </div>
        
       </div><!--end div  role="tabpanel" id="transporte"-->
         
	<div role="tabpanel" id="detalle"  class="tab-pane"   >
    
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
         <!--fila 4-->    
       <div class="form-group"> 
           <label class="control-label col-xs-1">Descripcion </label>
            <div class="col-xs-3">
            <!--<input autocomplete="off" type="text" name="c_codprd" id="c_codprd" value="" class="form-control input-sm" placeholder="Descripcion"/>  -->
        	<input type="text" name="c_codprd" id="c_codprd" value="<?php echo $ListarEirUpd->c_codprd; ?>" class="form-control input-sm" readonly />
            <input type="hidden" id="c_codprod" name="c_codprod" value="<?php echo $ListarEirUpd->c_codprod; ?>" />
            </div>                       
            <label class="control-label col-xs-1">Codigo Equipo</label>
            <div class="col-xs-2">
             <input type="text" id="c_idequipo" name="c_idequipo" class="form-control input-sm" value="<?php echo $ListarEirUpd->c_idequipo; ?>" readonly="readonly" />  
            
             </div>
         	<label class="control-label col-xs-1">Estado Equipo</label>
            <div class="col-xs-2">
            	<select name="c_sitalm" id="c_sitalm" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $est->c_numitm == 'D' ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
             </div>   
        </div>
        <!--fila 5-->    
       <div class="form-group"> 
           <label class="control-label col-xs-1">Condicion Equipo </label>
            <div class="col-xs-3">                                 
            <select name="c_tipo2" id="c_tipo2" class="form-control input-sm">
              <option value="0">SELECCIONE</option>
              <option value="1">LIMPIO</option>
              <option value="2">SUCIO</option>
            </select>
            </div>
             <label class="control-label col-xs-1">Precinto Zgroup </label>
            <div class="col-xs-2">
             <input type="text" name="c_precinto" id="c_precinto" value="" class="form-control input-sm" placeholder="Precinto Zgroup"  />  
            </div>
         	<label class="control-label col-xs-1">Precinto Cliente</label>
            <div class="col-xs-2">
            <input type="text" name="c_precintocli" id="c_precintocli" value="" class="form-control input-sm" placeholder="Precinto Cliente"  /> 
        	</div>   
        </div>
        
       </div> <!--end div  role="tabpanel" id="detalle"-->
	   
	   <!--<div role="tabpanel" id="complemento"  class="tab-pane" >
		DATOS LANCHA
	   </div>--> <!--end div  role="tabpanel" id="complemento"-->       
       
       <div role="tabpanel" id="permiso"  class="tab-pane"   >
       		<div class="form-group">    
                <label class="control-label col-xs-2"></label>         
            </div> 
       		<div class="form-group">    
                <label class="control-label col-xs-2">Ingrese Clave</label>
                <div class="col-xs-2">
                  <input type="text" name="clave" id="clave" value="" placeholder="Ingrese Clave" class="form-control input-sm"  />	
                  <?php 
				  	$listaClaves=$this->maestro->ListaClavesMaestras();
					$c_clavemaes=$listaClaves->c_clavemaes;
					$c_clavesecu=$listaClaves->c_clavesecu;
				  
				   ?>
                  <input type="hidden" name="c_clavemaes" id="c_clavemaes" value="<?php echo $c_clavemaes;?>"   />
                  <input type="hidden" name="c_clavesecu" id="c_clavesecu" value="<?php echo $c_clavesecu;?>"   />
                </div>    
         
            </div> 
          
       </div> <!--fin permiso-->
       
  </div><!--end div class="tab-content"-->        
</form>   		                

</div>
</div>
</div>
   
<script>

//Buscar Cliente
$(document).ready(function(){      
    /* Autocomplete de cliente, jquery UI */
    $("#c_nomcli").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ClienteBuscar',
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
                          //  precio: item.Precio
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_codcli").val(ui.item.id);
            //$("#c_ruccli").val(ui.item.ruc);
        }
    })
})

//Buscar Transportista

$(document).ready(function(){    
    /* Autocomplete de c_nomtra, jquery UI */
    $("#transportista").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv01&a=ProveedorBuscar',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { //
						<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#transportista").val(ui.item.id);
			$("#c_ructra").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})




</script>

