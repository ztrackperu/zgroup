<!-- Contenido Panel - Datos Cliente -->
<div role="tabpanel" class="tab-pane active" id="home">
    <br/>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-1">Nro</label>
        <div class="col-xs-3">
            <input type="text" name="c_numped" id="c_numped" value="" class="form-control input-sm" placeholder=" Nro autogenerado" data-validacion-tipo="requerido"/>
            <input type="hidden" name="n_swtapr" id="n_swtapr" value="0" />
            <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            <input type="hidden" name="swdupadd" id="swdupadd" value="<?php echo $_GET['swdupadd']; ?>">
        </div>
        <label class="control-label col-xs-1">Moneda</label>
        <div class="col-xs-2">
            <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" disabled>
                <option value="">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>
                    <option value="<?= $moneda->TM_CODI; ?>"<?= $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
            </select>
            <input type="hidden" name="xc_codmon" id="xc_codmon" value="<?= $c_codmon?>" />
        </div>
        <label class="control-label col-xs-1">Tipo</label>
        <div class="col-xs-3">
            <select name="ac_tipped" id="ac_tipped" class="form-control input-sm" onChange="OnchangeTipCotizacion()">
                <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>
                    <option value="<?= $a->tc_codi; ?>"<?= $c_tipped == $a->tc_codi ? 'selected' : ''; ?>> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
            </select>
            <input type="hidden" name="xac_tipped" id="xac_tipped" value="<?php echo $c_tipped?>" />
        </div>
    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-1">Cliente</label>
        <div class="col-xs-3">
            <input type="hidden" name="c_nomcli" id="c_nomcli" value="<?= isset($c_nomcli)?utf8_encode($c_nomcli):""; ?>" class="form-control input-sm" placeholder="Cliente" />
            <select id="xc_nomcli" name="xc_nomcli" class="js-example-basic-single form-control input-sm select2" onchange="cambiacliente()">
                <option value="">SELECCIONE</option>
            <?php
            $ListarLineaMaritima=$this->maestro->listarClientefiltro();
            foreach ($ListarLineaMaritima as $lineamar){
                if(isset($c_codcli) && $c_codcli == $lineamar->CC_RUC):
            ?>
                <option value="<?php echo utf8_encode($lineamar->datos); ?>" selected><?php echo utf8_encode($lineamar->CC_RAZO); ?></option>
            <?php else:?>
                <option value="<?php echo utf8_encode($lineamar->datos); ?>" ><?php echo utf8_encode($lineamar->CC_RAZO); ?></option>
            <?php 
                endif;
            } ?>
            </select>
            <script type="text/javascript">
                $("#xc_nomcli").select2();
            </script>
        </div>
        <label class="control-label col-xs-1">Codigo</label>
        <div class="col-xs-2">
            <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $c_codcli ?>" class="form-control input-sm" placeholder="Nro ruc"
                   data-validacion-tipo="requerido" readonly />

        </div>
        <label class="control-label col-xs-1">C. Via</label>
        <div class="col-xs-3">
            <select name="xc_via" id="xc_via" class="form-control input-sm" onChange="OnchangecVia()">
                <option value="000">.:SELECCIONE:.</option>
                <?php foreach($this->maestro->ListaTipoContacto() as $a):	 ?>
                    <option value="<?php echo $a->c_numitm; ?>"> <?php echo utf8_encode($a->c_desitm); ?> </option>
                <?php  endforeach;	 ?>
            </select>
            <input name="c_via" id="c_via" type="hidden" value="" />
        </div>
    </div>
    <!--fila 3-->
    <div class="form-group">
        <label class="control-label col-xs-1">Contact</label>
        <div class="col-xs-3">
            <input type="text" id="c_contac" name="c_contac" value="<?php echo $c_contac ?>" class="form-control input-sm" placeholder="Contacto" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Telf</label>
        <div class="col-xs-2">
            <input type="text" id="c_telef" name="c_telef" value="<?php echo $c_telef ?>" class="form-control input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Correo</label>
        <div class="col-xs-3">
            <input type="text" id="c_email" name="c_email" value="<?php echo $c_email ?>" class="form-control input-sm" placeholder="Correo" data-validacion-tipo="requerido|email" />
        </div>
    </div>
    <!--fila 4-->
    <div class="form-group">
        <label class="control-label col-xs-1">Asunto</label>
        <div class="col-xs-6">
            <input type="text" id="c_asunto" name="c_asunto" value="<?php echo utf8_encode($c_asunto) ?>" class="form-control input-sm"
                   placeholder="Asunto" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Fecha</label>
        <div class="col-xs-2">
            <input name="datepicker" type="text" class="form-control datepicker input-sm" id="datepicker" placeholder="Fecha Pedido"
                   value="<?php echo date(" d/m/Y ") ?>" readonly data-validacion-tipo="requerido" />
            <input name="valdata" type="hidden" id="valdata" value="0" size="5" /></div>
    </div>
</div>