<!-- Datos Contenedor Tab Content-->
<div id="conten" class="tab-pane fade" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 7-->
    <div class="form-group">
        <label class="control-label col-xs-2">Cond. Embarque</label>
        <div class="col-xs-1">
            <input type="text" name="c_condemb" id="c_condemb"  class="form-control input-sm" value="" />
        </div>

        <label class="control-label col-xs-2">Consolidador</label>
        <div class="col-xs-3" >
            <select id="c_idconsolidador" name="c_idconsolidador"  class="form-control input-sm select2" onChange="cambiarconsolidador()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>"><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomconsolidador"  id="c_nomconsolidador" class="form-control input-sm" value=""/>
        </div>

        <label class="control-label col-xs-2">Tipo Servicio</label>
        <div class="col-xs-1">
            <input type="text" name="c_tipserv" id="c_tipserv"  class="form-control input-sm" value="" />
        </div>

    </div>
    <!--fin fila 7-->
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="c_numequipo" id="c_numequipo"  class="form-control input-sm" placeholder="N° Equipo" value="" />
        </div>
        <label class="control-label col-xs-2">Tipo de Contenedor</label>
        <div class="col-xs-2">
            <select id="c_codtiprod" name="c_codtiprod"  class="form-control input-sm select2">
                <option value="">SELECCIONE</option>
                <?php
                $ListarTipoProducto=$this->model->ListarTipoProducto();
                foreach ($ListarTipoProducto as $tipprod){
                    ?>
                    <option value="<?php echo $tipprod->C_NUMITM; ?>" ><?php echo $tipprod->C_DESITM; ?></option>
                <?php } ?>
            </select>
        </div>
        <label class="control-label col-xs-1">Tamaño</label>
        <div class="col-xs-2">
            <select id="c_tamequipo" name="c_tamequipo"  class="form-control input-sm select2">
                <option value="">SELECCIONE</option>
                <?php
                $ListarTamanoEquipo=$this->model->ListarTamanoEquipo();
                foreach ($ListarTamanoEquipo as $tam){
                    ?>
                    <option value="<?php echo $tam->C_DESITM; ?>" ><?php echo $tam->C_DESITM; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-2">Peso Carga</label>
        <div class="col-xs-1">
            <input type="text" name="n_peso"  id="n_peso" class="form-control input-sm"  value="" onBlur="validaPeso();" onkeypress="return validaDecimal(event)"   />
        </div>
        <div class="col-xs-1">
            <select name="um_peso" id="um_peso" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs">kgs</option>
                <option value="qm">qm</option>
                <option value="ton">ton</option>
            </select>
        </div>
        <label class="control-label col-xs-2">Volumen</label>
        <div class="col-xs-1">
            <input type="text" name="n_volumen" id="n_volumen"  class="form-control input-sm" value="" onBlur="validaVolumen();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-1">
            <select name="um_volumen" id="um_volumen" class="form-control input-sm">
                <option value=""></option>
                <option value="m3">m3</option>
                <option value="kg/vol">kg/vol</option>
            </select>
        </div>
    </div>
    <!--fin fila 8-->

    <!--fila9 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Peso Bruto</label>
        <div class="col-xs-1">
            <input type="text" name="n_pesobru"  id="n_pesobru" class="form-control input-sm" onBlur="validaPesobru();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-1">
            <select name="um_pesobru" id="um_pesobru" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" >kgs</option>
                <option value="qm" >qm</option>
                <option value="ton" >ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Tara</label>
        <div class="col-xs-2">
            <input type="text" name="n_tara"  id="n_tara" class="form-control input-sm" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
        </div>
        <div class="col-xs-1">
            <select name="um_tara" id="um_tara" class="form-control input-sm" >
                <option value=""></option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Payload</label>
        <div class="col-xs-1">
            <input type="text" name="n_payload"  id="n_payload" class="form-control input-sm" onBlur="validaPayload();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-1">
            <select name="um_payload" id="um_payload" class="form-control input-sm">
                <option value=""></option>
                <option value="kgs" >kgs</option>
                <option value="lbs" >lbs</option>
                <option value="ton" >ton</option>
            </select>
        </div>
    </div>
    <!--fin fila 9-->

</div>