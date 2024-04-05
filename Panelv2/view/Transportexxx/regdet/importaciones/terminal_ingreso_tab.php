<!-- Datos Terminal de Ingreso Tab Content-->
<div role="tabpanel" id="ingreso" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 9-->
    <div class="form-group">
        <label class="control-label col-xs-2">Terminal de Ingreso</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_codterming" id="c_codterming"  class="form-control input-sm" placeholder="Codigo" /> <?php */?>
            <select id="c_codtermingI" name="c_codtermingI"  class="form-control input-sm select2" onChange="cambiarterminalingI()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomtermingI" id="c_nomtermingI"  class="form-control input-sm" placeholder="Nombre" />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-1">
            <input type="text" name="d_fecingresoI" id="d_fecingresoI"  class="form-control input-sm" style="width:85px;" placeholder="Fecha Ingreso" />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaingresoI"  id="horaingresoI" class="form-control input-sm time-format" placeholder="Hora Ingreso" style="width:85px;"  />
        </div>

        <label class="control-label col-xs-1">Puerto</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_nompuerto" id="c_nompuerto"  class="form-control input-sm" placeholder="Puerto de Ingreso" /><?php */?>
            <select id="c_nompuertoI" name="c_nompuertoI"  class="form-control input-sm select2">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarPuertos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_DESITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!--fin fila 9-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-3">
            <input autocomplete="off" type="text" name="c_nomtranspotebI" id="c_nomtranspotebI" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransportebI" name="c_ructransportebI" value=""  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferbI" id="c_choferbI" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransbI();" readonly />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferbI();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Licencia Chofer</label>
        <div class="col-xs-2">
            <input type="text" name="c_licencibI" id="c_licencibI" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcabI" id="c_marcabI" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placabI" id="c_placabI" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2bI" id="c_placa2bI" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefonobI" id="c_telefonobI"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1bI" id="c_generador1bI" value="" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2bI" id="c_generador2bI" value="" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatrabI" id="c_serguiatrabI"  class="form-control input-sm"  placeholder="Serie"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatrabI" id="c_nroguiatrabI"  class="form-control input-sm"  placeholder="Numero"  />
        </div>
    </div>
    <!--fin fila 10-->

</div>