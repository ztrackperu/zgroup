<!-- Datos Contenedor Tab Content-->
<div role="tabpanel" id="conten" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">Cond. Embarque</label>
        <div class="col-xs-1">
            <input type="text" name="c_condemb" id="c_condemb"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_condemb; ?>" />
        </div>

        <label class="control-label col-xs-2">Consolidador</label>
        <div class="col-xs-3" >
            <?php /*?> <input type="text" name="c_idconsolidador"  id="c_idconsolidador" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_idconsolidador; ?>"  /><?php */?><!-- solo en importacion-->
            <select id="c_idconsolidador" name="c_idconsolidador"  class="form-control input-sm" onChange="cambiarconsolidador()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$ListarDetalleUpd->c_idconsolidador){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomconsolidador"  id="c_nomconsolidador" class="form-control input-sm" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomconsolidador); ?>"  /><!-- solo en importacion-->
        </div>
        <label class="control-label col-xs-2">Tipo Servicio</label>
        <div class="col-xs-1">
            <input type="text" name="c_tipserv" id="c_tipserv"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_tipserv; ?>" />
        </div>

    </div>
    <!--fin fila 7-->
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="c_numequipo" id="c_numequipo"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_numequipo; ?>" placeholder="N° Equipo" />
        </div>
        <label class="control-label col-xs-2">Tipo de Contenedor</label>
        <div class="col-xs-2">
            <select id="c_codtiprod" name="c_codtiprod"  class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <?php
                $codigoprd="";
                $ListarTipoProducto=$this->model->ListarTipoProducto($codigoprd);
                foreach ($ListarTipoProducto as $tipprod){
                    ?>
                    <option value="<?php echo $tipprod->C_NUMITM; ?>" <?php if($tipprod->C_NUMITM==$ListarDetalleUpd->c_codtiprod){?>selected<?php }?> ><?php echo utf8_encode($tipprod->C_DESITM); ?></option>
                <?php } ?>
            </select>
        </div>
        <label class="control-label col-xs-1">Tamaño</label>
        <div class="col-xs-2">
            <select id="c_tamequipo" name="c_tamequipo"  class="form-control input-sm">
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
        <div class="col-xs-1" >
            <input type="text" name="n_peso"  id="n_peso" class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->n_peso; ?>"   />
        </div>
        <div class="col-xs-1">
            <?php /*?><input type="text" name="um_peso"  id="um_peso" class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->Fdc_Upes; ?>"   /> <?php */?>
            <select name="um_peso" id="um_peso" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_peso) == 'kgs' ? 'selected' : ''; ?> >kgs</option>
                <option value="qm"  <?php echo trim($ListarDetalleUpd->um_peso) == 'qm' ? 'selected' : ''; ?> >qm</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_peso) == 'ton' ? 'selected' : ''; ?> >ton</option>
            </select>
        </div>
        <label class="control-label col-xs-2">Volumen</label>
        <div class="col-xs-1">
            <input type="text" name="n_volumen" id="n_volumen"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_volumen; ?>"  />
        </div>
        <div class="col-xs-1">
            <?php /*?><input type="text" name="um_volumen" id="um_volumen"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->Fdc_Uvol; ?>"  /> <?php */?>
            <select name="um_volumen" id="um_volumen" class="form-control input-sm">
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
            <input type="text" name="n_pesobru"  id="n_pesobru" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_pesobru; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="um_pesobru" id="um_pesobru" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs"  <?php echo trim($ListarDetalleUpd->um_pesobru) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="qm"   <?php echo trim($ListarDetalleUpd->um_pesobru) == 'qm' ? 'selected' : ''; ?>>qm</option>
                <option value="ton"  <?php echo trim($ListarDetalleUpd->um_pesobru) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Tara</label>
        <div class="col-xs-2">
            <input type="text" name="n_tara"  id="n_tara" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_tara; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="um_tara" id="um_tara" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_tara) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="lbs" <?php echo trim($ListarDetalleUpd->um_tara) == 'lbs' ? 'selected' : ''; ?>>lbs</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_tara) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Payload</label>
        <div class="col-xs-1">
            <input type="text" name="n_payload"  id="n_payload" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_payload; ?>" />
        </div>
        <div class="col-xs-1">
            <select name="um_payload" id="um_payload" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" <?php echo trim($ListarDetalleUpd->um_payload) == 'kgs' ? 'selected' : ''; ?>>kgs</option>
                <option value="lbs" <?php echo trim($ListarDetalleUpd->um_payload) == 'lbs' ? 'selected' : ''; ?>>lbs</option>
                <option value="ton" <?php echo trim($ListarDetalleUpd->um_payload) == 'ton' ? 'selected' : ''; ?>>ton</option>
            </select>
        </div>
    </div>
    <!--fin fila 9-->

</div>