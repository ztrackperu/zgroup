<!-- Datos Equipo Tab Content-->
<div role="tabpanel" id="contenlocal" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila7 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° EIR Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="c_eirconten" id="c_eirconten"  class="form-control input-sm" value="" placeholder="N° EIR" />
        </div>
        <label class="control-label col-xs-3">Descripcion Contenedor</label>
        <div class="col-xs-3">
            <input type="text" name="c_desconten" id="c_desconten"  class="form-control input-sm" value="" placeholder="Descripcion Contenedor" />
        </div>
    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° Conten.</label>
        <div class="col-xs-2">
            <input type="text" name="Lc_numequipo" id="Lc_numequipo"  class="form-control input-sm"  placeholder="N° Equipo" />
        </div>
        <label class="control-label col-xs-2">Tipo de Contenedor</label>
        <div class="col-xs-2">
            <select id="Lc_codtiprod" name="Lc_codtiprod"  class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <?php
                $ListarTipoProducto=$this->model->ListarTipoProducto();
                foreach ($ListarTipoProducto as $tipprod){
                    ?>
                    <option value="<?php echo $tipprod->C_NUMITM; ?>" ><?php echo utf8_encode($tipprod->C_DESITM); ?></option>
                <?php } ?>
            </select>
        </div>
        <label class="control-label col-xs-1">Tamaño</label>
        <div class="col-xs-2">
            <select id="Lc_tamequipo" name="Lc_tamequipo"  class="form-control input-sm">
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
    <!--fin fila 8-->
    <!--fila9 -->
    <div class="form-group">
        <label class="control-label col-xs-2">N° EIR Generador</label>
        <div class="col-xs-2">
            <input type="text" name="c_eirgen" id="c_eirgen"  class="form-control input-sm" value="" placeholder="N° EIR" />
        </div>
        <label class="control-label col-xs-2">Descripcion Gen.</label>
        <div class="col-xs-2">
            <input type="text" name="c_desgen" id="c_desgen"  class="form-control input-sm" value="" placeholder="Descripcion Generador" />
        </div>
        <label class="control-label col-xs-1">Generador</label>
        <div class="col-xs-2">
            <input type="text" name="c_numgen" id="c_numgen"  class="form-control input-sm" value="" placeholder="N° Generador" />
        </div>
    </div>
    <!--fin fila 9-->

</div>