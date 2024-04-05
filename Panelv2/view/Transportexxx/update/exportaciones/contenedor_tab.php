<!-- Datos Contenedor Tab Content-->
<div role="tabpanel" id="contenedor" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="Ec_numequipo" id="Ec_numequipo"  class="form-control input-sm" placeholder="N° Equipo" value="<?php echo $ListarDetalleUpd->c_numequipo; ?>"   />
        </div>
        <label class="control-label col-xs-2">Tipo de Contenedor</label>
        <div class="col-xs-2">
            <select id="Ec_codtiprod" name="Ec_codtiprod"  class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <?php
                $codigoprd="";
                $ListarTipoProducto=$this->model->ListarTipoProducto($codigoprd);
                foreach ($ListarTipoProducto as $tipprod){
                    ?>
                    <option value="<?php echo $tipprod->C_NUMITM; ?>" <?php if($tipprod->C_NUMITM==$ListarDetalleUpd->c_codtiprod){?>selected<?php }?>  ><?php echo utf8_encode($tipprod->C_DESITM); ?></option>
                <?php } ?>
            </select>
        </div>
        <label class="control-label col-xs-1">Tamaño</label>
        <div class="col-xs-2">
            <select id="Ec_tamequipo" name="Ec_tamequipo"  class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <?php
                $ListarTamanoEquipo=$this->model->ListarTamanoEquipo();
                foreach ($ListarTamanoEquipo as $tam){
                    ?>
                    <option value="<?php echo $tam->C_DESITM; ?>" <?php if($tam->C_DESITM==$ListarDetalleUpd->c_tamequipo){?>selected<?php }?> ><?php echo $tam->C_DESITM; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-2">Peso Carga</label>
        <div class="col-xs-2">
            <input type="text" name="En_peso"  id="En_peso" class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->n_peso; ?>"   />
        </div>
        <div class="col-xs-1">
            <?php /*?><input type="text" name="um_peso"  id="um_peso" class="form-control input-sm"  value="<?php echo $listarDetForwarder->Fdc_Upes; ?>"   /> <?php */?>
            <select name="Eum_peso" id="Eum_peso" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_peso) == 'kgs' ? 'selected' : ''; ?> >kgs</option>
                <option value="qm"  <?php echo trim($ListarDetalleUpd->um_peso) == 'qm' ? 'selected' : ''; ?> >qm</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_peso) == 'ton' ? 'selected' : ''; ?> >ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Volumen</label>
        <div class="col-xs-1">
            <input type="text" name="En_volumen" id="En_volumen"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_volumen; ?>"  />
        </div>
        <div class="col-xs-1">
            <?php /*?><input type="text" name="um_volumen" id="um_volumen"  class="form-control input-sm" value="<?php echo $listarDetForwarder->Fdc_Uvol; ?>"  /> <?php */?>
            <select name="Eum_volumen" id="Eum_volumen" class="form-control input-sm">
                <option value=""></option>
                <option value="m3"     <?php echo trim($ListarDetalleUpd->um_volumen) == 'm3' ? 'selected' : ''; ?> >m3</option>
                <option value="kg/vol" <?php echo trim($ListarDetalleUpd->um_volumen) == 'kg/vol' ? 'selected' : ''; ?> >kg/vol</option>
            </select>
        </div>
    </div>
    <!--fin fila 8-->
    <!--fila9 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Peso Bruto</label>
        <div class="col-xs-1">
            <input type="text" name="En_pesobru"  id="En_pesobru" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_pesobru; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_pesobru" id="Eum_pesobru" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs"  <?php echo trim($ListarDetalleUpd->um_pesobru) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="qm"   <?php echo trim($ListarDetalleUpd->um_pesobru) == 'qm' ? 'selected' : ''; ?>>qm</option>
                <option value="ton"  <?php echo trim($ListarDetalleUpd->um_pesobru) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Tara</label>
        <div class="col-xs-2">
            <input type="text" name="En_tara"  id="En_tara" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_tara; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_tara" id="Eum_tara" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_tara) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="lbs" <?php echo trim($ListarDetalleUpd->um_tara) == 'lbs' ? 'selected' : ''; ?>>lbs</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_tara) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Payload</label>
        <div class="col-xs-1">
            <input type="text" name="En_payload"  id="En_payload" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_payload; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_payload" id="Eum_payload" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_payload) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="lbs" <?php echo trim($ListarDetalleUpd->um_payload) == 'lbs' ? 'selected' : ''; ?>>lbs</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_payload) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
    </div>
    <!--fin fila 9-->
</div>