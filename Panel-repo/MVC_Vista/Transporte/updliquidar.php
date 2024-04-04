     <?php 		
		$c_moneda=$ListaLiquidetviaticos->c_moneda;
		if($c_moneda=='0'){	
		  $mon='S/. ';		
		}else{
		  $mon='US$. ';
		}	
		$Id_viatico=$ListaLiquidetviaticos->Id_viatico;	
		$Id_detviatico=$ListaLiquidetviaticos->Id_detviatico;					
		
	?> 
     <?php /*?><?php echo $Id_viatico.' / '.$n_item;?><?php */?> 
    <!-- fila 1  --> 
            <div class="form-group"	>
            	<label class="control-label col-xs-2">Concepto</label>
                <div class="col-xs-3">
               		 <select id="c_idconceptoU" name="c_idconceptoU"  class="form-control input-sm" onChange="cambiarnom2();">
                          <option value="SELECCIONE">SELECCIONE</option>
                          <?php 
                            $conceptoviaticos=$this->model->ListarConceptoViaticos(); 
                            foreach ($conceptoviaticos as $convia){
                          ?>
                          <option value="<?php echo $convia->C_NUMITM; ?>" <?php if($convia->C_NUMITM==$ListaLiquidetviaticos->c_idconcepto){?>selected<?php }?> ><?php echo $convia->C_DESITM; ?></option>
                          <?php } ?>
                      </select>
                      <input type="hidden"  id="c_nomconceptoU" name="c_nomconceptoU" value="<?php echo $ListaLiquidetviaticos->c_nomconcepto ?>"  />
                    
                </div>   
                <label class="control-label col-xs-2">Descripcion</label>
                   <!--RECUPERAR PARA VOLVER -->
                    <input  type="hidden" id="Id_servicio" name="Id_servicio"  value="<?php echo $Id_servicio; ?>" />
                    <input  type="hidden" id="n_item" name="n_item"  value="<?php echo $n_item; ?>" />
                  <!--FIN RECUPERAR PARA VOLVER -->
                  <!--RECUPERAR PARA GUARDAR -->
                    <input  type="hidden" id="Id_viatico" name="Id_viatico"  value="<?php echo $Id_viatico; ?>" />
                    <input  type="hidden" id="Id_detviatico" name="Id_detviatico"  value="<?php echo $Id_detviatico; ?>" />
                    <input  type="hidden" id="Id_liquidetviatico" name="Id_liquidetviatico"  value="<?php echo $ListaLiquidetviaticos->Id_liquidetviatico; ?>" /> 
                   <!--FIN RECUPERAR PARA GUARDAR -->          
                    <input  type="hidden"  id="n_impogastant" name="n_impogastant"   value="<?php echo $ListaLiquidetviaticos->n_impogast ?>" readonly="readonly" />          
                                    
                <div class="col-xs-4">
                    <input type="text" name="c_descripcionU" id="c_descripcionU" class="form-control input-sm" placeholder="Descripcion" value="<?php echo utf8_encode($ListaLiquidetviaticos->c_descripcion); ?>" />
                    <select name="c_coddesU" id="c_coddesU" class="form-control" onBlur="cambiarpeajeUpd()" onChange="cambiarpeajeUpd()">
                         <option value="">SELECCIONE</option>
                          <?php 
                            $BuscarPeaje=$this->model->BuscarPeaje(); 
                            foreach ($BuscarPeaje as $peaje){
                          ?>
                          <option value="<?php echo $peaje->c_codpeaje; ?>" <?php if($peaje->c_codpeaje==$ListaLiquidetviaticos->c_coddes){?>selected<?php }?> ><?php echo utf8_encode($peaje->descripcion); ?></option>
                          <?php } ?>
                    </select>
                </div>  
                             
            </div>
            <!-- fin fila 1  --> 
            
             <!-- fila 2  --> 
            <div class="form-group"	>
            	<label class="control-label col-xs-2">Monto en <?php echo $mon ?></label>
                <div class="col-xs-3">
                     <input  type="text" id="n_impogast" name="n_impogast"  class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->n_impogast ?>" onBlur="validaMonto();" onkeypress="return validaDecimal(event)" /> 
                </div> 
            	<label class="control-label col-xs-2">Tipo Dcto</label>
                <div class="col-xs-4">
               		<select id="c_tipdoc" name="c_tipdoc"  class="form-control input-sm" >
                      <option value="SELECCIONE">SELECCIONE</option>
                      <?php 
                        $listartipodoc=$this->model->ListarTipoDocumentoCont(); 
                        foreach ($listartipodoc as $tipdoc){
                      ?>
                      <option value="<?php echo $tipdoc->C_NUMITM; ?>" <?php if($tipdoc->C_NUMITM==$ListaLiquidetviaticos->c_tipdoc){?>selected<?php }?>><?php echo ltrim(utf8_encode($tipdoc->C_DESITM)); ?></option>
                      <?php } ?>
                    </select>
                </div>   
                             
            </div>
            <!-- fin fila 2 --> 
            
            <!-- fila 3  --> 
            <div class="form-group"	>            
            	<label class="control-label col-xs-2">Serie y N° Dcto</label>
                <div class="col-xs-2">
                    <input  type="text" id="c_seriedoc" name="c_seriedoc"  class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->c_seriedoc; ?>" maxlength="3" /> 
                </div> 
                <div class="col-xs-2">
                   <input  type="text" id="c_numdoc" name="c_numdoc"  class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->c_numdoc; ?>" /> 
                </div> 
            	<label class="control-label col-xs-2">Fecha Dcto</label>
                <div class="col-xs-3">
               		<input  type="text" id="d_fecdocU" name="d_fecdocU"  class="form-control datepicker input-sm" value="<?php echo vfecha(substr($ListaLiquidetviaticos->d_fecdoc,0,10)); ?>" /> 
                </div>             
            </div>
            <!-- fin fila 3--> 
    	
    <script> 
	//PARA ACTUALIZAR
$(document).ready(function(){
        // Bloqueamos el SELECT de los cursos		
		if(document.getElementById('c_coddesU').value==''){
        	//$("#c_coddesU").prop('disabled', true);   //desahilitado
			$("#c_coddesU").css("display", "none");
			$("#c_descripcionU").css("display", "block");
		}else{
			//$("#c_coddesU").prop('disabled', false); //habilitado
			$("#c_coddesU").css("display", "block");
			$("#c_descripcionU").css("display", "none");
		}
        // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
        $("#c_idconceptoU").change(function(){
			$("#c_descripcionU").css("display", "none");
			$("#c_descripcionU").val('');
			$("#c_coddesU").css("display", "block");
            // Guardamos el select de cursos
            var cursos = $("#c_coddesU");
            var c_descripcionU = $("#c_descripcionU");
            // Guardamos el select de alumnos
            var alumnos = $(this);
            
            if($(this).val() != '')
            {
                $.ajax({
                    data: { id : alumnos.val() },
                    url:   '?c=01&a=PeajeBuscar',
                    type:  'POST',
                    dataType: 'json',
                    beforeSend: function () 
                    {
                       //alumnos.prop('disabled', true);
                    },
                    success:  function (r) 
                    {
						alumnos.css("display", "block");
                        alumnos.prop('disabled', false);
                        
                        // Limpiamos el select
                        cursos.find('option').remove();
                        
                        $(r).each(function(i, v){ // indice, valor
                            cursos.append('<option value="' + v.c_codpeaje + '">' + v.descripcion + '</option>');
                        })
                        
                        cursos.prop('disabled', false);
                    },
                    error: function()
                    {
						 cursos.css("display", "none");
						 //habilitamos c_descripcionU
				 		 c_descripcionU.prop('disabled', false);
				  		 c_descripcionU.css("display", "block");
                    }
                });
            }
            else
            {
				  //habilitamos c_descripcionU
				  c_descripcionU.prop('disabled', false);
				  c_descripcionU.prop('hidden', false);
				
            }
        })
    })
	

	  $( "#d_fecdocU").datepicker();

</script>
