 <script type="text/javascript">
	function cambiarnombreprod(){
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	 //var c_codprod=valor+'c_codprod';
	 var combo = document.getElementById(valor+'c_codprod');
	 var c_desprd = combo.options[combo.selectedIndex].text;
	 //var c_desprd=document.frmregequipo.valor+c_codprod.options[document.frmregequipo.valor+c_codprod.selectedIndex].text;
	document.getElementById('c_desprd').value=c_desprd;	
	}
 function desabilitarDatosref(){
	 var  valor=document.getElementById('valor').value; ////D,R,G,C,T
	 var c_nacional=document.getElementById(valor+'c_nacional').value;
	 if(c_nacional=='0' || c_nacional==''){
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
	
	var  valor=document.getElementById('valor').value; ////D,R,G,C,T		
			var c_codprod=document.getElementById(valor+'c_codprod').value; 
			if(c_codprod=='SELECCIONE'){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Seleccionar Producto ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_codprod").focus();
					return 0;			
			}
			var c_nserie=document.getElementById(valor+'c_nserie').value; 
			if(c_nserie==''){
				//alert('Falta Seleccionar Ano');
				var mensje = "Falta Ingresar Serie ...!!!";
					$('#alertone').modal('show');
					$('#mensaje').val(mensje);
					document.getElementById(valor+"c_nserie").focus();
					return 0;			
			}
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
		/*var c_codsit=document.getElementById(valor+'c_codsit').value;
		if(c_codsit==''){
			alert('Falta Seleccionar Situacion');
			document.getElementById(valor+"c_codsit").focus();
			return 0;
		}			
		var c_codsitalm=document.getElementById(valor+'c_codsitalm').value;
		if(c_codsitalm==''){
			alert('Falta Seleccionar Situacion Almacen');
			document.getElementById(valor+"c_codsitalm").focus();
			return 0;
		}
		var c_nacional=document.getElementById(valor+'c_nacional').value;
		if(c_nacional==''){ 
			alert('Falta Indicar si tiene Referencia');
			document.getElementById(valor+"c_nacional").focus();
			return 0;
		}else if(c_nacional=='1'){ //SI
			var c_refnaci=document.getElementById(valor+'c_refnaci').value;			
			if(c_refnaci==''){
			alert('Falta Ingresar N° de Dua');
			document.getElementById(valor+"c_refnaci").focus();
			return 0;
			}
			var c_fecnac=document.getElementById(valor+'c_fecnac').value;
			if(c_fecnac==''){
			alert('Falta Ingresar Fecha de Nacionalización');
			document.getElementById(valor+"c_fecnac").focus();
			return 0;
			}
		}*/
		
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
	
			
	if(confirm("Seguro de Registrar el Equipo ?")){
		document.getElementById("frmregequipo").submit();
	 }
	  
  }
 </script>
 
 
<div class="container-fluid">
  <div class="panel panel-primary">
	<!-- Default panel contents -->
  	<div class="panel-heading">REGISTRAR EQUIPO <?php echo $serie; ?></div>

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
  
   
  
<form class="form-horizontal" id="frmregequipo" name="frmregequipo" action="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=GuardarRegEquipo" method="post" enctype="multipart/form-data">
       <?php /*?><input type="text" name="c_codprod" id="c_codprod" value="<?php echo $in_codi; ?>" /> <?php */?>
      
	<div class="form-control-static" align="right">
   	 <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
     <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
     &nbsp;<a class="btn btn-danger" href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cancelar</a>&nbsp;<a class="btn btn-warning" href="#" onClick="location.reload();">Refrescar</a>&nbsp;
    </div>
    <!--<div class="form-control-static"> 
	</div> -->
	 <!-- Nav tabs -->
     <?php $tipo=$cod_tipo; ?>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" <?php if($tipo=='001' || $tipo=='015' || $tipo=='016'){?> class="active"<?php } ?> ><a <?php if($tipo=='001' || $tipo=='015' || $tipo=='016'){?> href="#home" aria-controls="home" role="tab" data-toggle="tab" <?php }?> >Contenedores Dry/Modulos</a></li>
    <li role="presentation" <?php if($tipo=='002' ){?> class="active"<?php } ?> ><a <?php if($tipo=='002' ){?> href="#profile" aria-controls="profile" role="tab" data-toggle="tab" <?php }?> >Contenedores Reefer</a></li>
    <li role="presentation" <?php if($tipo=='003' ){?> class="active"<?php } ?>><a <?php if($tipo=='003' ){?> href="#generadores" aria-controls="generadores" role="tab" data-toggle="tab" <?php }?> >Generadores</a></li>
    <li role="presentation" <?php if($tipo=='004' || $tipo=='005'){?> class="active"<?php } ?>><a <?php if($tipo=='004' || $tipo=='005'){?>  href="#carretas" aria-controls="carretas" role="tab" data-toggle="tab" <?php }?> >Carretas/Plataformas</a></li>
  	<li role="presentation" <?php if($tipo=='012' ){?> class="active"<?php } ?>><a <?php if($tipo=='012'){?>  href="#transformadores" aria-controls="transformadores" role="tab" data-toggle="tab" <?php }?> >Transformadores</a></li>
  	<li role="presentation" <?php if($tipo=='021' ){?> class="active"<?php } ?>><a <?php if($tipo=='021'){?>  href="#maquina" aria-controls="maquina" role="tab" data-toggle="tab" <?php }?> >Maquina Reefer</a></li>  	
  </ul> 
	<!-- Tab panes -->
	<div class="tab-content">    
    <input type="hidden" name="c_desprd" id="c_desprd" class="form-control input-sm"  />
    <!--<input type="hidden" name="udni" id="udni"  value="<?php //echo $udni; ?>" />-->
	<div role="tabpanel"  <?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ){ $valor='D';?> id="home"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
    
       <div class="form-group">
        <label class="control-label col-xs-2"></label>        
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /> <?php */?>
             <select name="Dc_codprod" id="Dc_codprod" class="select2 form-control input-sm" style="width:64%;" onchange="cambiarnombreprod()">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Dc_nserie" id="Dc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Dc_anno" id="Dc_anno" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Dc_mes" id="Dc_mes" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Dc_fabcaja" id="Dc_fabcaja"   class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">      
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Dc_codcol" id="Dc_codcol" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">tipo de Material</label>
            <div class="col-xs-2"> 
             <select name="Dc_material" id="Dc_material" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>"  > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>	
          </div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Dc_codmar" id="Dc_codmar" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaDry() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>"  > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <!-- <input type="text" name="Dc_procedencia" id="Dc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	<select name="Dc_procedencia" id="Dc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Dc_tara" id="Dc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>                    
         
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Dc_peso" id="Dc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
         <?php /*?> <hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Dc_codsit" id="Dc_codsit" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Dc_codsitalm" id="Dc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>"  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Dc_nacional" id="Dc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Dc_refnaci" id="Dc_refnaci"   class="form-control input-sm" placeholder="N° de dua" readonly="readonly" />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Dc_fecnac" id="Dc_fecnac"   class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="DIN_CPRV" id="DIN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>"  > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
      </div><?php */?>
          
    </div>
	
     
	<div  role="tabpanel"  <?php   if($tipo=='002'){ $valor='R';?> id="profile" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
           <label class="control-label col-xs-2">Nombre del Producto</label>
           <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /><?php */?>
       	  	 <select name="Rc_codprod" id="Rc_codprod" class="select2 form-control input-sm" onchange="cambiarnombreprod()">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
          </div>
                         
          <label class="control-label col-xs-2">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Rc_nserie" id="Rc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
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
            <select name="Rc_anno" id="Rc_anno" class="select2 form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
          </div>                   
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-3"> 
             <select name="c_canofab" id="c_canofab" class="select2 form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
          </div> 
              
  </div>      
          
           <div class="form-group">     
            <label class="control-label col-xs-2">Mes Fabricacion</label> 
            <div class="col-xs-3">       
            <select name="Rc_mes" id="Rc_mes" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
              <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-3"> 
             <select name="c_cmesfab" id="c_cmesfab" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div> 
              
          </div>    
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Marca Caja</label> 
            <div class="col-xs-3">       
            <select name="Rc_codmar" id="Rc_codmar" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaCaja() as $mcaja):	 ?>                                   
                <option value="<?php echo $mcaja->C_NUMITM; ?>"  > <?php echo $mcaja->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
             </div>                   
         
            <label class="control-label col-xs-2">Marca Maquina</label>
            <div class="col-xs-3"> 
            <select name="c_mcamaq" id="c_mcamaq" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>"  > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Fabricante</label> 
            <div class="col-xs-3">       
            <input type="text" name="Rc_fabcaja" id="Rc_fabcaja"  class="form-control input-sm" placeholder="fabricante"  />	     
            </div>                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-3"> 
            <select name="Rc_cmodel" id="Rc_cmodel" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>"   > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-3">       
            <select name="Rc_codcol" id="Rc_codcol" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->ListarColorReefer() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	     
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-3"> 
               <input type="text" name="Rc_serieequipo" id="Rc_serieequipo"  class="form-control input-sm" placeholder="Nro Serial"  /> 
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Tipo Material</label> 
            <div class="col-xs-3">       
             <select name="Rc_material" id="Rc_material" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
			   <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
                <option value="<?php echo $mat->tm_codi; ?>"  > <?php echo $mat->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
              </select>		     
            </div>                   
         
            <label class="control-label col-xs-2">Controlador</label>
            <div class="col-xs-3"> 
             <input type="text" name="c_ccontrola" id="c_ccontrola"  class="form-control input-sm" placeholder="Controlador"  />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-3">       
            <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select name="Rc_procedencia" id="Rc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-3"> 
             <input type="text" name="c_tipgas" id="c_tipgas"  class="select2 form-control input-sm" placeholder="Tipo gas"  />	   
            </div> 
              
          </div> 
                   
          <hr>
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-3">       
              <input type="text" name="Rc_tara" id="Rc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-3"> 
              <input type="text" name="Rc_peso" id="Rc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div>
          
           <?php /*?><div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-3">
               <select name="Rc_codsit" id="Rc_codsit" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-3">
              <select name="Rc_codsitalm" id="Rc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>"  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-3">
              <select name="Rc_nacional" id="Rc_nacional" class="form-control input-sm">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-3">
              <input type="text" name="Rc_refnaci" id="Rc_refnaci"  class="form-control input-sm" placeholder="N° de dua"   readonly="readonly" />
            </div>      
                              
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Fecha</label> 
            <div class="col-xs-3">             
                 <input type="text" name="Rc_fecnac" id="Rc_fecnac"  class="form-control input-sm" placeholder="dia/mes/año"  readonly="readonly" />
            </div> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-3">
               <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                  <option value="SELECCIONE">SELECCIONE</option>
            	  <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                  <option value="<?php echo $prov->PR_RUC; ?>"  > <?php echo $prov->PR_RAZO; ?> </option>
                  <?php  endforeach;	 ?>       
               </select>
             </div> 
    </div><?php */?>
          
    </div> 
    <div  role="tabpanel"  <?php   if($tipo=='003'){ $valor='G'; ?> id="generadores" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /><?php */?>
          	 <select name="Gc_codprod" id="Gc_codprod" class="select2 form-control input-sm" style="width:64%;" onchange="cambiarnombreprod()">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Gc_nserie" id="Gc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Gc_anno" id="Gc_anno" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Gc_mes" id="Gc_mes" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Gc_cfabri" id="Gc_cfabri"  class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Gc_codcol" id="Gc_codcol" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" name="Gc_seriemotor" id="Gc_seriemotor"  class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Gc_codmar" id="Gc_codmar" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>"  > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
             <?php /*?><input type="text" name="Gc_procedencia" id="Gc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select name="Gc_procedencia" id="Gc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Gc_cmodel" id="Gc_cmodel"  class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" name="Gc_serieequipo" id="Gc_serieequipo"  class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Gc_tara" id="Gc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Gc_peso" id="Gc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <?php /*?><hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Gc_codsit" id="Gc_codsit" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Gc_codsitalm" id="Gc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>"  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Gc_nacional" id="Gc_nacional" class="form-control input-sm">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Gc_refnaci" id="Gc_refnaci"  class="form-control input-sm" placeholder="N° de dua" readonly="readonly"  />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Gc_fecnac" id="Gc_fecnac"  class="form-control input-sm" placeholder="dia/mes/año"  readonly="readonly" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>"  > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div><?php */?>
    </div>
    
    <div  role="tabpanel"  <?php   if($tipo=='004' || $tipo=='005'){ $valor='C'; ?> id="carretas" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
       <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>
       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /><?php */?>
          	 <select name="Cc_codprod" id="Cc_codprod" class="select2 form-control input-sm" style="width:64%;" onchange="cambiarnombreprod()">
             	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Cc_nserie" id="Cc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>
        
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Cc_anno" id="Cc_anno" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Cc_mes" id="Cc_mes" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Cc_cfabri" id="Cc_cfabri"  class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Cc_codcol" id="Cc_codcol" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Tamaño</label>
            <div class="col-xs-2"> 
                 <select name="c_tamCarreta" id="c_tamCarreta" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->TamanoCarreta() as $tam):	 ?>                                   
                <option value="<?php echo $tam->C_NUMITM; ?>"  > <?php echo $tam->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>            
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Cc_codmar" id="Cc_codmar" class="select2 form-control input-sm"> 
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
             <!--<input type="text" name="Cc_procedencia" id="Cc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
        	 <select name="Cc_procedencia" id="Cc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>	
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Cc_cmodel" id="Cc_cmodel"  class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">Serie VIN</label>
            <div class="col-xs-2"> 
              <input type="text" name="c_vin" id="c_vin"  class="form-control input-sm" placeholder="Serie VIN" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">N° de Ejes</label> 
            <div class="col-xs-2">       
              <select name="c_nroejes" id="c_nroejes" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->EjesCarreta() as $eje):	 ?>                                   
                <option value="<?php echo $eje->C_NUMITM; ?>"  > <?php echo $eje->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
           </div>
                      
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Cc_tara" id="Cc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-1">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Cc_peso" id="Cc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <?php /*?><hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Cc_codsit" id="Cc_codsit" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Cc_codsitalm" id="Cc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>"  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Cc_nacional" id="Cc_nacional" class="form-control input-sm">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Cc_refnaci" id="Cc_refnaci"  class="form-control input-sm" placeholder="N° de dua"  readonly="readonly"  />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Cc_fecnac" id="Cc_fecnac"  class="form-control input-sm" placeholder="dia/mes/año"  readonly="readonly" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>"  > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div><?php */?>
    </div> 
    
     <div  role="tabpanel"  <?php   if($tipo=='012'){ $valor='T'; ?> id="transformadores" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
         <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /><?php */?>
           	<select name="Tc_codprod" id="Tc_codprod" class="select2 form-control input-sm" style="width:64%;" onchange="cambiarnombreprod()">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Tc_nserie" id="Tc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>                
       <div class="form-group">
           <label class="control-label col-xs-2">Año de Fabric.</label>
           <div class="col-xs-2">
            <select name="Tc_anno" id="Tc_anno" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>            		
                <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	      
       	 </div>
                         
            <label class="control-label col-xs-2">Mes de Fabric.</label> 
            <div class="col-xs-2">    
            <select name="Tc_mes" id="Tc_mes" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
                <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	
         </div>
         	<label class="control-label col-xs-1">Fabricante</label>
            <div class="col-xs-2">
             <input type="text" name="Tc_cfabri" id="Tc_cfabri"  class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido" />
        	</div>
                 
      </div>
        
        <div class="form-group">     
            
        
            <label class="control-label col-xs-2">Color</label> 
            <div class="col-xs-2">       
            <select name="Tc_codcol" id="Tc_codcol" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
                <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>  
          </div>                    
         
            <label class="control-label col-xs-2">Serie Motor</label>
            <div class="col-xs-2"> 
            	 <input type="text" name="Tc_seriemotor" id="Tc_seriemotor"  class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido" />
        	</div> 
              <label class="control-label col-xs-1">Marca</label>   
           <div class="col-xs-2">      
            <select name="Tc_codmar" id="Tc_codmar" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
                <option value="<?php echo $m->c_numitm; ?>"  > <?php echo $m->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
             </select> 
          </div>
      </div>      
          
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label>
            <div class="col-xs-2">
            <?php /*?> <input type="text" name="Tc_procedencia" id="Tc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" /><?php */?>
        	<select name="Tc_procedencia" id="Tc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>
        
            <label class="control-label col-xs-2">Modelo</label> 
            <div class="col-xs-2">       
              <input type="text" name="Tc_cmodel" id="Tc_cmodel"  class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido" />
        	</div>                    
         
            <label class="control-label col-xs-1">N° Serial</label>
            <div class="col-xs-2"> 
              <input type="text" name="Tc_serieequipo" id="Tc_serieequipo"  class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido" />
            </div> 
          </div> 
          
          <div class="form-group">           
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Tc_tara" id="Tc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"  />
        	</div>            
            <label class="control-label col-xs-2">Peso(Kg) max.</label>
            <div class="col-xs-2"> 
              <input type="text" name="Tc_peso" id="Tc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div> 
          
          <?php /*?><hr>
           <div class="form-group">     
            <label class="control-label col-xs-2">Estado</label>
            <div class="col-xs-2">
               <select name="Tc_codsit" id="Tc_codsit" class="form-control input-sm">
                   <option value="">SELECCIONE</option>
                   <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
                   <option value="<?php echo $est->c_numitm; ?>"  > <?php echo $est->c_desitm; ?> </option>
                   <?php  endforeach;	 ?>       
               </select>
            </div>
        
            <label class="control-label col-xs-2">Estado Almacen</label> 
            <div class="col-xs-2">
              <select name="Tc_codsitalm" id="Tc_codsitalm" class="form-control input-sm">
            	<option value="">SELECCIONE</option>
				<?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
                <option value="<?php echo $estalm->c_numitm; ?>"  > <?php echo $estalm->c_desitm; ?> </option>
                <?php  endforeach;	 ?>       
              </select>
             </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Referencia</label>
            <div class="col-xs-2">
              <select name="Tc_nacional" id="Tc_nacional" class="form-control input-sm">
           		 <option value="">SELECCIONE</option>
                 <option  value="1">Si</option>
            	 <option  value="0">No</option>
        	  </select>
            </div>    
            <label class="control-label col-xs-2">N° Dua</label>
            <div class="col-xs-2">
              <input type="text" name="Tc_refnaci" id="Tc_refnaci"  class="form-control input-sm" placeholder="N° de dua"  readonly="readonly"  />
            </div>
        
            <label class="control-label col-xs-1">Fecha</label> 
            <div class="col-xs-2">             
              <input type="text" name="Tc_fecnac" id="Tc_fecnac"  class="form-control input-sm" placeholder="dia/mes/año"  readonly="readonly" />
            </div>                    
         
          </div> 
          
          <div class="form-group"> 
          	<label class="control-label col-xs-2">Proveedor</label>
             <div class="col-xs-2">
                <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
                    <option value="SELECCIONE">SELECCIONE</option>
                    <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
                    <option value="<?php echo $prov->PR_RUC; ?>"  > <?php echo $prov->PR_RAZO; ?> </option>
                    <?php  endforeach;	 ?>       
                </select>
             </div> 
          </div><?php */?>
    </div> 
    
    <div  role="tabpanel"  <?php   if($tipo=='021'){ $valor='M'; ?> id="maquina" class="active"  <?php }else{ ?> class="tab-pane" <?php } ?> > 
         <div class="form-group">
        <label class="control-label col-xs-2"></label>
       </div>       
        <div class="form-group">
          <label class="control-label col-xs-2">Nombre del Producto</label>
          <div class="col-xs-3">
             <?php /*?><input type="text" name="IN_ARTI" value="<?php echo $descripcion; ?>" class="form-control input-sm" placeholder="Nombre" readonly /><?php */?>
           	<select name="Mc_codprod" id="Mc_codprod" class="select2 form-control input-sm" style="width:64%;" onchange="cambiarnombreprod()">
            	<option value="SELECCIONE">SELECCIONE</option> 
                <?php foreach($this->maestroinv->BuscarProductoDetRegistrar($descripcion) as $prod):	 ?>                                   
                <option value="<?php echo $prod->IN_CODI; ?>"  > <?php echo $prod->IN_ARTI; ?> </option>
                <?php  endforeach;	 ?>
             </select>
          </div>
                         
          <label class="control-label col-xs-1">Serie</label> 
            <div class="col-xs-2">    
             <input type="text" name="Mc_nserie" id="Mc_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie" />
        	</div>               
        </div>                
       <div class="form-group">                  
         
            <label class="control-label col-xs-2">Año Fabricacion</label>
            <div class="col-xs-2"> 
             <select name="Mc_canofab" id="Mc_canofab" class="select2 form-control input-sm">            		
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
                <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
           </div>                  
         
            <label class="control-label col-xs-2">Mes Fabricacion</label>
            <div class="col-xs-2"> 
             <select name="Mc_cmesfab" id="Mc_cmesfab" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
				<?php foreach($this->maestro->listames() as $mes):	 ?>                                   
               <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
             </div>                  
         
            <label class="control-label col-xs-1">Marca</label>
            <div class="col-xs-2"> 
            <select name="Mc_mcamaq" id="Mc_mcamaq" class="select2 form-control input-sm"> 
                <option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
                <option value="<?php echo $mmaq->C_NUMITM; ?>"  > <?php echo $mmaq->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>
             </select>	   
              </div> 
              
          </div> 
          
          <div class="form-group">                   
         
            <label class="control-label col-xs-2">Modelo</label>
            <div class="col-xs-2"> 
            <select name="Mc_cmodel" id="Mc_cmodel" class="select2 form-control input-sm">
            	<option value="SELECCIONE">SELECCIONE</option>  
            	<?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
                <option value="<?php echo $modelo->C_NUMITM; ?>"   > <?php echo $modelo->C_DESITM; ?> </option>
                <?php  endforeach;	 ?>            
            </select>
                       
            </div>                   
         
            <label class="control-label col-xs-2">N° Serial</label>
            <div class="col-xs-2"> 
               <input type="text" name="Mc_serieequipo" id="Mc_serieequipo"  class="form-control input-sm" placeholder="Nro Serial"  /> 
            </div>                               
         
            <label class="control-label col-xs-1">Controlador</label>
            <div class="col-xs-2"> 
             <input type="text" name="Mc_ccontrola" id="Mc_ccontrola"  class="form-control input-sm" placeholder="Controlador"  />	   
            </div> 
              
          </div> 
          <div class="form-group">     
            <label class="control-label col-xs-2">Procedencia</label> 
            <div class="col-xs-2">       
            <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />	<?php */?>     
            <select name="Mc_procedencia" id="Mc_procedencia" class="select2 form-control input-sm"> 
            	<option value="SELECCIONE">SELECCIONE</option>
                <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
                <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
                <?php  endforeach;	 ?>
             </select>
            </div>                   
         
            <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
            <div class="col-xs-2"> 
             <input type="text" name="Mc_tipgas" id="Mc_tipgas"  class="form-control input-sm" placeholder="Tipo gas"  />	   
            </div> 
              
          </div>                  
         
          
          <div class="form-group">    
            
            <label class="control-label col-xs-2">Tara(Kg)</label> 
            <div class="col-xs-2">       
              <input type="text" name="Mc_tara" id="Mc_tara"  class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)"   />
        	</div>                    
         
            <label class="control-label col-xs-2">Peso(Kg)</label>
            <div class="col-xs-2"> 
              <input type="text" name="Mc_peso" id="Mc_peso"  class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
            </div> 
          </div>
    </div> 
     <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>"  />
            
    
	</div>

     <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>"  />
            
    
	</div>
   
<script>
    $(document).ready(function(){
        $("#frmregequipo").submit(function(){
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

<script>
   jQuery(function($){     
	  <?php if($cod_tipo=='001' || $cod_tipo=='015' || $cod_tipo=='002' ){  //contenedores dry,reefer  ?>
	   $("#Dc_nserie").mask("aaaa999999-9"); 
	   $("#Rc_nserie").mask("aaaa999999-9"); 
	   <?php }elseif($cod_tipo=='003'){ //generadores ?>
	   $("#Gc_nserie").mask("aaaa9999?9999"); 
	   <?php }elseif($cod_tipo=='004' || $cod_tipo=='005'){ //carretas ?>
	    $("#Cc_nserie").mask("aaa-999"); 
	    <?php }elseif($cod_tipo=='012'){ //transformadores ?>
	    $("#Tc_nserie").mask("aaaa9999?9"); 
	    <?php } ?>       
	});
</script>    
