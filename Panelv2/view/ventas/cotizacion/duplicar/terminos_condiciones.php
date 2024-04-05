<!-- Contenido Panel - Terminos y Condiciones -->
<div role="tabpanel" class="tab-pane" id="messages">
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-1">L.Entrega</label>
        <div class="col-xs-2">
            <input type="text" name="c_lugent" id="c_lugent" value="<?php echo utf8_encode($c_lugent) ?>" class="form-control input-sm"
                   placeholder="Lugar de Entrega" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">T.Entrega</label>
        <div class="col-xs-2">
            <input type="text" name="c_tiempo" id="c_tiempo" value="<?php echo utf8_encode($c_tiempo) ?>" class="form-control input-sm"
                   placeholder="Tiempo de  Entrega" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">F.Pago</label>
        <div class="col-xs-2">
            <select name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
                <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->ListarFpago() as $a): ?>
                    <option value="<?php echo $a->TP_CODI; ?>"<?php echo $c_codpga == $a->TP_CODI ? 'selected' : ''; ?>> <?php echo $a->TP_DESC; ?>
                    </option>
                <?php  endforeach;	 ?>
            </select>
            <input name="xc_codpga" id="xc_codpga" type="hidden" value="<?php echo $c_codpga ?>" />
        </div>


    </div>
    <div class="form-group">
        <label class="control-label col-xs-1">Precios</label>
        <div class="col-xs-2">
            <select name="c_precios" id="c_precios" class="form-control input-sm" onChange="OnchangeTipprecio()">
                <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->ListarTipPrecio() as $a):	 ?>
                    <option value="<?php echo $a->c_numitm; ?>"<?php echo $c_precios == $a->c_numitm ? 'selected' : ''; ?>> <?php echo $a->c_desitm; ?> </option>
                <?php  endforeach;	 ?>
            </select>
            <input name="xc_precios" id="xc_precios" type="hidden" value="<?php echo $c_precios ?>" />
        </div>
        <label class="control-label col-xs-1">V. Oferta</label>
        <div class="col-xs-2">
            <input type="text" name="c_validez" id="c_validez" value="<?php echo utf8_encode($c_validez) ?>" class="form-control input-sm"
                   placeholder="Validez de Oferta" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Ref Dcto</label>
        <div class="col-xs-2">
            <input type="text" name="c_numocref" id="c_numocref" class="form-control input-sm" placeholder="Referencia Nro Dcto Cliente"
                   data-validacion-tipo="requerido" value="<?php echo $c_numocref ?>" />
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-1">Cronograma</label>
        <div class="col-xs-2">
            <input type="checkbox" value="1" id="c_gencrono" name="c_gencrono" onClick="valcheckcrono()" <?php if($c_gencrono=='1' ){
                ?> checked="checked"
            <?php }?>>
            <input name="xc_gencrono" id="xc_gencrono" type="hidden" value="<?php echo $c_gencrono ?>" />
        </div>
        <label class="control-label col-xs-1">Nro Meses</label>
        <div class="col-xs-2">
            <select name="xc_meses" id="xc_meses" class="form-control input-sm" onChange="Onchangedias()">
                <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->Listardias() as $a):	 ?>
                    <option value="<?php echo $a->tm_codi; ?>"<?php echo $c_meses == $a->tm_codi ? 'selected' : ''; ?>> <?php echo $a->tm_desc; ?> </option>
                <?php  endforeach;	 ?>
            </select>
            <input name="c_meses" id="c_meses" type="hidden" value="<?php echo $c_meses ?>" />
        </div>
        <label class="control-label col-xs-1">F. Entrega</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecent" id="d_fecent" value="<?php
            if($d_fecent!=" "){
                echo vfecha(substr($d_fecent,0,10)) ;
            }
            ?>" class="form-control input-sm" placeholder="Fecha Entrega" />
        </div>
    </div>

</div>