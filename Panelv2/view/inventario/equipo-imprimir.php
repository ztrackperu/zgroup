 <script type="text/javascript">
 
 function desabilitarDatosref(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	 var c_nacional=document.getElementById(valor+'c_nacional').value;
	 if(c_nacional=='0' || c_nacional=='SELECCIONE'){
		document.getElementById(valor+'c_refnaci').readOnly=true; 
		document.getElementById(valor+'c_fecnac').readOnly=true; 
	 }else{
	    document.getElementById(valor+'c_refnaci').readOnly=false; 
		document.getElementById(valor+'c_fecnac').readOnly=false; 
	 }
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
   //$( "#c_fechora" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
    //$( "#c_fechora" ).datepicker();
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
	//fecha de DUA(NACIONALIZACION)
	$( "#"+valor+"c_fecnac" ).datepicker(); 
 });
 
 //validar numeros
 function validaDecimal(e){	 //solo acepta numeros y punto 
	tecla = (document.all) ? e.keyCode : e.which;//obtenemos el codigo ascii de la tecla
	if (tecla==8) return true;//backspace en ascii es 8
	patron=/[0-9\.]/; 
	te = String.fromCharCode(tecla);//convertimos el codigo ascii a string
	return patron.test(te);
} 
 
function validaTara(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
		var c_tara=document.getElementById(valor+'c_tara').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(c_tara)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById(valor+'c_tara').value='';
		document.getElementById(valor+'c_tara').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	//}
}

function validaPeso(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T,M
		var c_peso=document.getElementById(valor+'c_peso').value;
		var patron=/^\d+(\.\d{1,2})?$/;
		if(!patron.test(c_peso)){		
		//window.alert('monto ingresado incorrecto');
		document.getElementById(valor+'c_peso').value='';
		document.getElementById(valor+'c_peso').focus();
		return false;
		}/*else{
		window.alert('monto correcto');
		}*/
	//}
}
 
 function validarguardar(){
	 /////campos en comun
	/*var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	 //////TODOS MENOS MAQUINA
	 if(valor!='M'){
	
			var c_anno=document.getElementById(valor+'c_anno').value; 
			if(c_anno=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Año ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_anno").focus();
					return 0;			
			}
			var c_mes=document.getElementById(valor+'c_mes').value;
			if(c_mes=='SELECCIONE'){
				//alert('Falta Seleccionar Mes');
				var mensje = "Falta Seleccionar Mes ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_mes").focus();
				return 0;
			}		
			var c_codcol=document.getElementById(valor+'c_codcol').value;
			if(c_codcol=='SELECCIONE'){
				//alert('Falta Seleccionar Color');
				var mensje = "Falta Seleccionar Color ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_codcol").focus();
				return 0;
			}
			var c_codmar=document.getElementById(valor+'c_codmar').value;
			if(c_codmar=='SELECCIONE'){
				//alert('Falta Seleccionar Marca');
				var mensje = "Falta Seleccionar Marca ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
				document.getElementById(valor+"c_codmar").focus();
				return 0;
			}
	   }//FIN TODOS MENOS MAQUINA
	   
		var c_procedencia=document.getElementById(valor+'c_procedencia').value;
		if(c_procedencia=='SELECCIONE'){
			//alert('Falta Seleccionar Procedencia');
			var mensje = "Falta Seleccionar Procedencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_procedencia").focus();
			return 0;
		}	
		var c_tara=document.getElementById(valor+'c_tara').value;
		if(c_tara=='SELECCIONE'){
			//alert('Falta Ingresar Tara');
			var mensje = "Falta Ingresar Tara ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_tara").focus();
			return 0;
		}
		var c_peso=document.getElementById(valor+'c_peso').value;
		if(c_peso=='SELECCIONE'){
			//alert('Falta Ingresar Peso');
			var mensje = "Falta Ingresar Peso ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_peso").focus();
			return 0;
		}	
		var c_codsit=document.getElementById(valor+'c_codsit').value;
		if(c_codsit=='SELECCIONE'){
			//alert('Falta Seleccionar Situacion');
			var mensje = "Falta Seleccionar Situacion ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_codsit").focus();
			return 0;
		}			
		var c_codsitalm=document.getElementById(valor+'c_codsitalm').value;
		if(c_codsitalm=='SELECCIONE'){
			//alert('Falta Seleccionar Situacion Almacen');
			var mensje = "Falta Seleccionar Situacion Almacen ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_codsitalm").focus();
			return 0;
		}
		var c_nacional=document.getElementById(valor+'c_nacional').value;
		if(c_nacional=='SELECCIONE'){ 
			//alert('Falta Indicar si tiene Referencia');
			var mensje = "Falta Indicar si tiene Referencia ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_nacional").focus();
			return 0;
		}else if(c_nacional=='1'){ //SI
			var c_refnaci=document.getElementById(valor+'c_refnaci').value;			
			if(c_refnaci==''){
			//alert('Falta Ingresar N° de Dua');
			var mensje = "Falta Ingresar N° de Dua ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_refnaci").focus();
			return 0;
			}
			var c_fecnac=document.getElementById(valor+'c_fecnac').value;
			if(c_fecnac==''){
			//alert('Falta Ingresar Fecha de Nacionalización');
			var mensje = "Falta Ingresar Fecha de Nacionalización ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_fecnac").focus();
			return 0;
			}
		}
		
	///SOLO DRY Y REEFER
	if(valor=='D' || valor=='R'){	
		var c_fabcaja=document.getElementById(valor+'c_fabcaja').value;
		if(c_fabcaja==''){
			//alert('Falta Ingresar Fabricante');
			var mensje = "Falta Ingresar Fabricante ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_fabcaja").focus();
			return 0;
		}
		var c_material=document.getElementById(valor+'c_material').value;
		if(c_material==''){
			//alert('Falta Seleccionar Material');
			var mensje = "Falta Seleccionar Material ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById(valor+"c_material").focus();
			return 0;
		}
	}
	*/
			
	if(confirm("Seguro de Actualizar el Equipo ?")){
		document.getElementById("frm-updequipo").submit();
	 }
	  
  }
 </script> 
   
<div class="container-fluid">
    <div class="panel panel-primary">
        <!-- Default panel contents -->
      <div class="panel-heading">VER EQUIPO <strong><?php echo $equi->c_idequipo?></strong></div>
    <div>	  
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
  
<form class="form-horizontal" id="frm-updequipo" action="?c=<?php echo $c; ?>&a=GuardarUpdEquipo&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" method="post" >
       <input type="hidden" name="c_idequipo" value="<?php echo $equi->c_idequipo; ?>" />  
      
	<div class="form-control-static" align="right">
     &nbsp;<a class="btn btn-danger" href="?c=<?php echo $c; ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>
     &nbsp;<a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
    </div>
    <!--<div class="form-control-static"> 
	</div> -->
	 <!-- Nav tabs -->
     <?php  $tipo=$cod_tipo; ?>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if( $tipo=='015' || $tipo=='016'){?> class="active"<?php } ?> ><a <?php if( $tipo=='015' || $tipo=='016'){?> href="#home" aria-controls="home" role="tab" data-toggle="tab" <?php }?> >Contenedores Dry/Modulos</a></li>
    <li role="presentation" <?php if($tipo=='001' || $tipo=='002' ){?> class="active"<?php } ?> ><a <?php if($tipo=='002' ){?> href="#profile" aria-controls="profile" role="tab" data-toggle="tab" <?php }?> >Contenedores Reefer</a></li>
    <li role="presentation" <?php if($tipo=='003' ){?> class="active"<?php } ?>><a <?php if($tipo=='003' ){?> href="#generadores" aria-controls="generadores" role="tab" data-toggle="tab" <?php }?> >Generadores</a></li>
    <li role="presentation" <?php if($tipo=='004' || $tipo=='005'){?> class="active"<?php } ?>><a <?php if($tipo=='004' || $tipo=='005'){?>  href="#carretas" aria-controls="carretas" role="tab" data-toggle="tab" <?php }?> >Carretas/Plataformas</a></li>
  	<li role="presentation" <?php if($tipo=='012' ){?> class="active"<?php } ?>><a <?php if($tipo=='012'){?>  href="#transformadores" aria-controls="transformadores" role="tab" data-toggle="tab" <?php }?> >Transformadores</a></li>
  	<li role="presentation" <?php if($tipo=='001' || $tipo=='021' ){?> class="active"<?php } ?>><a <?php if($tipo=='021'){?>  href="#maquina" aria-controls="maquina" role="tab" data-toggle="tab" <?php }?> >Maquina Reefer</a></li>
  </ul> 
	<!-- Tab panes -->
	<div class="tab-content">    
    
	<div role="tabpanel"  <?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ){ $valor='D';?> id="home"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
    
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text"  name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select  disabled="disabled" name="Dc_anno" id="Dc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select  disabled="disabled" name="Dc_mes" id="Dc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" readonly name="Dc_fabcaja" id="Dc_fabcaja"  value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">      
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select  disabled="disabled" name="Dc_codcol" id="Dc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">tipo de Material</label>
            <div class="col-xs-2"> 
             <select  disabled="disabled" name="Dc_material" id="Dc_material" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>	
          </div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select  disabled="disabled" name="Dc_codmar" id="Dc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaDry() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <!-- <input type="text" readonly name="Dc_procedencia" id="Dc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	<select  disabled="disabled" name="Dc_procedencia" id="Dc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Dc_tara" id="Dc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>                    
         
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Dc_peso" id="Dc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select  disabled="disabled" name="Dc_codsit" id="Dc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select  disabled="disabled" name="Dc_codsitalm" id="Dc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select  disabled="disabled" name="Dc_nacional" id="Dc_nacional" class="form-control input-sm" onchange="desabilitarDatosref()">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" readonly name="Dc_refnaci" id="Dc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm"   />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" readonly name="Dc_fecnac" id="Dc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0  ? 'readonly' : ''; ?> class="form-control input-sm"  />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select  disabled="disabled" name="DIN_CPRV" id="DIN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
      </div>
          
    </div>
	
     
	<div  role="tabpanel"  <?php   if($tipo=='001' || $tipo=='002'){ $valor='R';?> id="profile" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
           <label class="control-label col-xs-2">Nombre del Producto</label>
           <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
       	  </div>
                         
          <label class="control-label col-xs-2">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>
        <hr>
        
       <div class="form-group">
         <label class="control-label col-xs-4">DATOS CAJA</label> 
         <label class="control-label col-xs-4">DATOS MAQUINA REEFER</label>     	
       </div>
        
        <div class="form-group">     
            <label class="control-label col-xs-2">Año Fabricacion</label> 
            <div class="col-xs-3">       
            <select  disabled="disabled" name="Rc_anno" id="Rc_anno" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
          </div>                   
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-3"> 
             <select  disabled="disabled" name="c_canofab" id="c_canofab" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_canofab == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
          </div> 
              
  </div>      
          
           <div class="form-group">     
            <label class="control-label col-xs-2">Mes Fabricacion</label> 
            <div class="col-xs-3">       
            <select  disabled="disabled" name="Rc_mes" id="Rc_mes" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
              <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-3"> 
             <select  disabled="disabled" name="c_cmesfab" id="c_cmesfab" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_cmesfab == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div> 
              
          </div>    
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Marca Caja</label> 
            <div class="col-xs-3">       
            <select  disabled="disabled" name="Rc_codmar" id="Rc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaCaja() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Marca Maquina</label>
            <div class="col-xs-3"> 
            <select  disabled="disabled" name="c_mcamaq" id="c_mcamaq" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>" <?php echo $equi->c_mcamaq == $mmaq->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Fabricante</label> 
            <div class="col-xs-3">       
            <input type="text" readonly name="Rc_fabcaja" id="Rc_fabcaja" value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm"   />	     
            </div>                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-3"> 
            <select  disabled="disabled" name="Rc_cmodel" id="Rc_cmodel" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>"  <?php echo $modelo->C_NUMITM==$equi->c_cmodel ? 'selected' : ''; ?> > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
                       
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-3">       
            <select  disabled="disabled" name="Rc_codcol" id="Rc_codcol" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->ListarColorReefer() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-3"> 
               <input type="text" readonly name="Rc_serieequipo" id="Rc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm"   /> 
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Tipo Material</label> 
            <div class="col-xs-3">       
             <select  disabled="disabled" name="Rc_material" id="Rc_material" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
			   <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>		     
            </div>                   
         
            <label class="control-label col-xs-2">Controlador</label>
            <div class="col-xs-3"> 
             <input type="text" readonly name="c_ccontrola" id="c_ccontrola" value="<?php echo $equi->c_ccontrola; ?>" class="form-control input-sm"   />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-3">       
            <?php /*?><input type="text" readonly name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select  disabled="disabled" name="Rc_procedencia" id="Rc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-3"> 
             <input type="text" readonly name="c_tipgas" id="c_tipgas" value="<?php echo $equi->c_tipgas; ?>" class="form-control input-sm"   />	   
            </div> 
              
          </div> 
                   
          <hr>
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-3">       
              <input type="text" readonly name="Rc_tara" id="Rc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-3"> 
              <input type="text" readonly name="Rc_peso" id="Rc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div>
          
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-3">
               <select  disabled="disabled" name="Rc_codsit" id="Rc_codsit" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-3">
              <select  disabled="disabled" name="Rc_codsitalm" id="Rc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-3">
              <select  disabled="disabled" name="Rc_nacional" id="Rc_nacional" class="form-control input-sm">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-3">
              <input type="text" readonly name="Rc_refnaci" id="Rc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div>      
                              
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Fecha</label> 
            <div class="col-xs-3">             
                 <input type="text" readonly name="Rc_fecnac" id="Rc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm"  />
            </div> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-3">
               <select  name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                  <option value="SELECCIONE">SELECCIONE</option>
            	  <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                  <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                  <?php  endforeach;	 ?>       
               </select>
             </div> 
    </div>
          
    </div> 
    <div  role="tabpanel"  <?php   if($tipo=='003'){ $valor='G'; ?> id="generadores" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select  disabled="disabled" name="Gc_anno" id="Gc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select  disabled="disabled" name="Gc_mes" id="Gc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" readonly name="Gc_cfabri" id="Gc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select  disabled="disabled" name="Gc_codcol" id="Gc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" readonly name="Gc_seriemotor" id="Gc_seriemotor" value="<?php echo $equi->c_seriemotor; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select  disabled="disabled" name="Gc_codmar" id="Gc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>" <?php echo $equi->c_codmar == $m->c_numitm ? 'selected' : ''; ?> > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" readonly name="Gc_procedencia" id="Gc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select  disabled="disabled" name="Gc_procedencia" id="Gc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Gc_cmodel" id="Gc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Gc_serieequipo" id="Gc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Gc_tara" id="Gc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Gc_peso" id="Gc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select  disabled="disabled" name="Gc_codsit" id="Gc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select  disabled="disabled" name="Gc_codsitalm" id="Gc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select  disabled="disabled" name="Gc_nacional" id="Gc_nacional" class="form-control input-sm">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" readonly name="Gc_refnaci" id="Gc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" readonly name="Gc_fecnac" id="Gc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm"  />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select  name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
    </div>
    
    <div  role="tabpanel"  <?php   if($tipo=='004' || $tipo=='005'){ $valor='C'; ?> id="carretas" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select  disabled="disabled" name="Cc_anno" id="Cc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select  disabled="disabled" name="Cc_mes" id="Cc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" readonly name="Cc_cfabri" id="Cc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select  disabled="disabled" name="Cc_codcol" id="Cc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Tamaño</label>
            <div class="col-xs-2"> 
                 <select  disabled="disabled" name="c_tamCarreta" id="c_tamCarreta" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->TamanoCarreta() as $tam):	 ?>                                   
                <option value="<?php echo $tam->C_NUMITM; ?>" <?php echo $equi->c_tamCarreta == $tam->C_NUMITM ? 'selected' : ''; ?> > <?php echo $tam->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>            
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select  disabled="disabled" name="Cc_codmar" id="Cc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaCarreta() as $m):	 ?>                                   
                <option value="<?php echo $m->C_NUMITM; ?>"  > <?php echo $m->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
             <!--<input type="text" readonly name="Cc_procedencia" id="Cc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	 <select  disabled="disabled" name="Cc_procedencia" id="Cc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>	
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Cc_cmodel" id="Cc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">Serie VIN</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="c_vin" id="c_vin" value="<?php echo $equi->c_vin; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">N° de Ejes</label> 
            <div class="col-xs-2">       
              <select  disabled="disabled" name="c_nroejes" id="c_nroejes" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->EjesCarreta() as $eje):	 ?>                                   
                <option value="<?php echo $eje->C_NUMITM; ?>" <?php echo $equi->c_nroejes == $eje->C_NUMITM ? 'selected' : ''; ?> > <?php echo $eje->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
           </div>
                      
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Cc_tara" id="Cc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Cc_peso" id="Cc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select  disabled="disabled" name="Cc_codsit" id="Cc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select  disabled="disabled" name="Cc_codsitalm" id="Cc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select  disabled="disabled" name="Cc_nacional" id="Cc_nacional" class="form-control input-sm">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" readonly name="Cc_refnaci" id="Cc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" readonly name="Cc_fecnac" id="Cc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm"  />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select  name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
    </div> 
    
     <div  role="tabpanel"  <?php   if($tipo=='012'){ $valor='T'; ?> id="transformadores" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
         <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select  disabled="disabled" name="Tc_anno" id="Tc_anno" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select  disabled="disabled" name="Tc_mes" id="Tc_mes" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" readonly name="Tc_cfabri" id="Tc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select  disabled="disabled" name="Tc_codcol" id="Tc_codcol" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" readonly name="Tc_seriemotor" id="Tc_seriemotor" value="<?php echo $equi->c_seriemotor; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select  disabled="disabled" name="Tc_codmar" id="Tc_codmar" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>" <?php echo $equi->c_codmar == $m->c_numitm ? 'selected' : ''; ?> > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <?php /*?> <input type="text" readonly name="Tc_procedencia" id="Tc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select  disabled="disabled" name="Tc_procedencia" id="Tc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Tc_cmodel" id="Tc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Tc_serieequipo" id="Tc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Tc_tara" id="Tc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg) max.</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Tc_peso" id="Tc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select  disabled="disabled" name="Tc_codsit" id="Tc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select  disabled="disabled" name="Tc_codsitalm" id="Tc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select  disabled="disabled" name="Tc_nacional" id="Tc_nacional" class="form-control input-sm">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" readonly name="Tc_refnaci" id="Tc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" readonly name="Tc_fecnac" id="Tc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm"  />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select  name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
		</div>
		
       <div  role="tabpanel"  <?php   if($tipo=='021'){ $valor='M'; ?> id="maquina" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
         <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm"  readonly />
        	</div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm"  readonly />
        	</div>               
        </div>             
       <div class="form-group">                  
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-2"> 
             <select  disabled="disabled" name="Mc_canofab" id="Mc_canofab" class="form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" <?php echo $a->tm_codi == $equi->c_canofab ? 'selected' : ''; ?>  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
           </div>                  
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-2"> 
             <select  disabled="disabled" name="Mc_cmesfab" id="Mc_cmesfab" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>" <?php echo $mes->tm_codi == $equi->c_cmesfab ? 'selected' : ''; ?>  > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div>                  
         
            <label class="control-label col-xs-1">Marca</label>
            <div class="col-xs-2"> 
            <select  disabled="disabled" name="Mc_mcamaq" id="Mc_mcamaq" class="form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>" <?php echo $mmaq->C_NUMITM == $equi->c_mcamaq ? 'selected' : ''; ?>  > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-2"> 
            <select  disabled="disabled" name="Mc_cmodel" id="Mc_cmodel" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>"  <?php echo $modelo->C_NUMITM == $equi->c_cmodel ? 'selected' : ''; ?>  > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-2"> 
               <input type="text" readonly name="Mc_serieequipo" id="Mc_serieequipo" value="<?php echo $equi->c_serieequipo ?>"  class="form-control input-sm"   /> 
            </div>                               
         
            <label class="control-label col-xs-1">Controlador</label>
            <div class="col-xs-2"> 
             <input type="text" readonly name="Mc_ccontrola" id="Mc_ccontrola" value="<?php echo $equi->c_ccontrola ?>"  class="form-control input-sm"   />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-2">       
            <?php /*?><input type="text" readonly name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select  disabled="disabled" name="Mc_procedencia" id="Mc_procedencia" class="form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>" <?php echo $pais->c_codigo == $equi->c_procedencia ? 'selected' : ''; ?>  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-2"> 
             <input type="text" readonly name="Mc_tipgas" id="Mc_tipgas" value="<?php echo $equi->c_tipgas ?>"  class="form-control input-sm"   />	   
            </div> 
              
          </div>                  
         
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" readonly name="Mc_tara" id="Mc_tara" value="<?php echo $equi->c_tara ?>"  class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"   />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" readonly name="Mc_peso" id="Mc_peso" value="<?php echo $equi->c_peso ?>"  class="form-control input-sm"  data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div>
          <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select  disabled="disabled" name="Mc_codsit" id="Mc_codsit" class="form-control input-sm">
                   <option value="SELECCIONE">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select  disabled="disabled" name="Mc_codsitalm" id="Mc_codsitalm" class="form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select  disabled="disabled" name="Mc_nacional" id="Mc_nacional" class="form-control input-sm">
           		 <option value="SELECCIONE">SELECCIONE</option>
                 <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
            	 <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" readonly name="Mc_refnaci" id="Mc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm"  data-validacion-tipo="requerido" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" readonly name="Mc_fecnac" id="Mc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm"  />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div>
    </div> 
     <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>"  />
            
    
	</div>
   
<script>
    $(document).ready(function(){
        $("#frm-updequipo").submit(function(){
            return $(this).validate();
        });
    })
	

    $(document).ready(function(){
        // Bloqueamos el SELECT de los cursos
        $("#Rc_cmodel").prop('disabled', true);
        
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#c_mcamaq").change(function(){
            // Guardamos el select de cursos
            var cursos = $("#Rc_cmodel");
            
            // Guardamos el select de alumnos
            var alumnos = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : alumnos.val() },
                    url:   '?c=inv01&a=ModeloPorMarca',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                        alumnos.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
                        alumnos.prop('disabled', false);
                        
                        // Limpiamos el select
                        cursos.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            cursos.append('<option value="' + v.C_NUMITM + '">' + v.C_DESITM + '</option>');
                        })
                        
                        cursos.prop('disabled', false);
                    },
                    error: function()
                    {
                        alert('Ocurrio un error en el servidor ..');
                        alumnos.prop('disabled', false);
                    }
                });
            }
            else
            {
                cursos.find('option').remove();
                cursos.prop('disabled', true);
            }
        })
    })


	
	/*$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
	$('#myTabs a:first').tab('show') // Select first tab
	$('#myTabs a:last').tab('show') // Select last tab
	$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)*/
	
</script>
</form>  		               
</div>
</div> 
</div>   
