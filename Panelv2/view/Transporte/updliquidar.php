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
    <!-- fila 1  --> 
<div class="form-group">
    <label class="control-label col-xs-2">Concepto</label>
    <div class="col-xs-3">
        <select id="c_idconceptoU" name="c_idconceptoU" class="form-control input-sm" onChange="cambiarnom2();">
            <option value="SELECCIONE">SELECCIONE</option>
            <?php 
            $conceptoviaticos=$this->model->ListarConceptoViaticos(); 
            foreach ($conceptoviaticos as $convia){
            ?>
            <option value="<?php echo $convia->C_NUMITM; ?>" <?php if($convia->C_NUMITM==$ListaLiquidetviaticos->c_idconcepto){?>selected
            <?php }?> >
            <?php echo $convia->C_DESITM; ?>
            </option>
            <?php } ?>
        </select>
        <input type="hidden" id="c_nomconceptoU" name="c_nomconceptoU" value="<?php echo $ListaLiquidetviaticos->c_nomconcepto ?>"/>
    </div>
    <label class="control-label col-xs-2">Descripcion</label>
    <!--RECUPERAR PARA VOLVER -->
    <input type="hidden" id="Id_servicio" name="Id_servicio" value="<?php echo $Id_servicio; ?>" />
    <input type="hidden" id="n_item" name="n_item" value="<?php echo $n_item; ?>" />
    <!--FIN RECUPERAR PARA VOLVER -->
    <!--RECUPERAR PARA GUARDAR -->
    <input type="hidden" id="Id_viatico" name="Id_viatico" value="<?php echo $Id_viatico; ?>" />
    <input type="hidden" id="Id_detviatico" name="Id_detviatico" value="<?php echo $Id_detviatico; ?>" />
    <input type="hidden" id="Id_liquidetviatico" name="Id_liquidetviatico" value="<?php echo $ListaLiquidetviaticos->Id_liquidetviatico; ?>"/>
    <!--FIN RECUPERAR PARA GUARDAR -->
    <input type="hidden" id="n_impogastant" name="n_impogastant" value="<?php echo $ListaLiquidetviaticos->n_impogast ?>" readonly="readonly"/>

    <div class="col-xs-4">
        <input type="text" name="c_descripcionU" id="c_descripcionU" class="form-control input-sm" placeholder="Descripcion" value="<?php echo utf8_encode($ListaLiquidetviaticos->c_descripcion); ?>"/>
        <!--onBlur="cambiarpeajeUpd()" onChange="cambiarpeajeUpd()"-->
        <select name="c_coddesU" id="c_coddesU" class="form-control">
            <option value="">SELECCIONE</option>
            <?php 
            $BuscarPeaje=$this->model->BuscarPeaje(); 
            foreach ($BuscarPeaje as $peaje){
                $pj_desc = utf8_encode($peaje->descripcion);
            ?>
            <option value="<?= $peaje->c_codpeaje;?>" <?= ($peaje->c_codpeaje==$ListaLiquidetviaticos->c_coddes)?'selected':''?>><?= $pj_desc;?></option>            
            <?php } ?>
        </select>
    </div>
</div>
<!-- fila 2  -->
<div class="form-group">
    <label class="control-label col-xs-2">Monto en <?php echo $mon ?></label>
    <div class="col-xs-3">
        <input type="text" id="n_impogast" name="n_impogast" class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->n_impogast ?>"
            onBlur="validaMonto();" onkeypress="return validaDecimal(event)" />
    </div>
    <label class="control-label col-xs-2">Tipo Dcto</label>
    <div class="col-xs-4">
        <select id="c_tipdoc" name="c_tipdoc" class="form-control input-sm">
            <option value="SINDOC">SIN DOC</option>
            <?php 
            $listartipodoc=$this->model->ListarTipoDocumentoCont(); 
            foreach ($listartipodoc as $tipdoc){
            ?>
            <option value="<?php echo $tipdoc->C_NUMITM; ?>" <?php if($tipdoc->C_NUMITM==$ListaLiquidetviaticos->c_tipdoc){?>selected
            <?php }?>>
            <?php echo ltrim(utf8_encode($tipdoc->C_DESITM)); ?>
            </option>
            <?php } ?>
        </select>
    </div>
</div>
<!-- fila 3  -->
<div class="form-group">
    <label class="control-label col-xs-2">Serie y N° Dcto</label>
    <div class="col-xs-2">
        <input type="text" id="c_seriedoc" name="c_seriedoc" class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->c_seriedoc; ?>" maxlength="3" />
    </div>
    <div class="col-xs-2">
        <input type="text" id="c_numdoc" name="c_numdoc" class="form-control input-sm" value="<?php echo $ListaLiquidetviaticos->c_numdoc; ?>"/>
    </div>
    <label class="control-label col-xs-2">Fecha Dcto</label>
    <div class="col-xs-3">
        <input type="text" id="d_fecdocU" name="d_fecdocU" class="form-control datepicker input-sm" value="<?php echo vfecha(substr($ListaLiquidetviaticos->d_fecdoc,0,10)); ?>"/>
    </div>
</div>    	
<script> 
	//PARA ACTUALIZAR
	$(document).ready(function () {
	    // Bloqueamos el SELECT de los cursos		
	    if (document.getElementById('c_coddesU').value == '') {
	        //$("#c_coddesU").prop('disabled', true);   //desahilitado
	        $("#c_coddesU").css("display", "none");
	        $("#c_descripcionU").css("display", "block");
	    } else {
	        //$("#c_coddesU").prop('disabled', false); //habilitado
	        $("#c_coddesU").css("display", "block");
	        $("#c_descripcionU").css("display", "none");
	    }
	    // Hacemos la lógica que cuando nuestro SELECT cambia de valor haga algo
	    $("#c_idconceptoU").change(function () {
	        var selector = $(this);
            var c_descripcionU = $("#c_descripcionU");
            var c_coddesU = $("#c_coddesU");
            if(selector.val() == 'SELECCIONE'){
                c_descripcionU.css("display", "block").prop('disabled', true).val('');
                c_coddesU.css("display", "none").prop('disabled', true);
            }else{
                if(selector.val() == '001'){//PEAJES
                    c_descripcionU.css("display", "none");
                    c_coddesU.css("display", "block").prop('disabled', false);
                }else{
                    c_descripcionU.css("display", "block").prop('disabled', false).val('');
                    c_coddesU.css("display", "none").prop('disabled', true);
                }
            }
	    });
        $("#c_coddes").change(function(){
            var selector = $(this);
            var c_descripcionU = $("#c_descripcionU");
            var text = selector.children(':selected').text();
            if(text != ''){
                c_descripcionU.prop('disabled', false).val(text);
            }
        });
	})
	$("#d_fecdocU").datepicker();
</script>
