<!-- Datos Contenedor Tab Content-->
<div id="contenedor" class="tab-pane fade" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="Ec_numequipo" id="Ec_numequipo"  class="form-control input-sm" placeholder="N° Equipo" value=""  />
        </div>
        <label class="control-label col-xs-2">Tipo de Contenedor</label>
        <div class="col-xs-2">
            <select id="Ec_codtiprod" name="Ec_codtiprod"  class="form-control input-sm select2">
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
            <select id="Ec_tamequipo" name="Ec_tamequipo"  class="form-control input-sm select2">
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
        <div class="col-xs-2">
            <input type="text" name="En_peso"  id="En_peso" class="form-control input-sm"  value="" onBlur="validaPesoE();" onkeypress="return validaDecimal(event)"   />
        </div>
        <div class="col-xs-1">
            <select name="Eum_peso" id="Eum_peso" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="qm">qm</option>
                <option value="ton">ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Volumen</label>
        <div class="col-xs-1">
            <input type="text" name="En_volumen" id="En_volumen"  class="form-control input-sm" value=""  onBlur="validaVolumenE();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-1">
            <select name="Eum_volumen" id="Eum_volumen" class="form-control input-sm">
                <option value="">SELECCIONE</option>
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
            <input type="text" name="En_pesobru"  id="En_pesobru" class="form-control input-sm"  onBlur="validaPesobruE();" onkeypress="return validaDecimal(event)" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_pesobru" id="Eum_pesobru" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="qm">qm</option>
                <option value="ton">ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Tara</label>
        <div class="col-xs-2">
            <input type="text" name="En_tara"  id="En_tara" class="form-control input-sm"  onBlur="validaTaraE();" onkeypress="return validaDecimal(event)" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_tara" id="Eum_tara" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
            </select>
        </div>
        <label class="control-label col-xs-1">Payload</label>
        <div class="col-xs-1">
            <input type="text" name="En_payload"  id="En_payload" class="form-control input-sm"  onBlur="validaPayloadE();" onkeypress="return validaDecimal(event)" />
        </div>
        <div class="col-xs-1">
            <select name="Eum_payload" id="Eum_payload" class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <option value="kgs">kgs</option>
                <option value="lbs">lbs</option>
                <option value="ton">ton</option>
            </select>
        </div>
    </div>
    <!--fin fila 9-->

</div>