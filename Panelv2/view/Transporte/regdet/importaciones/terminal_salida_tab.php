<!-- Datos Terminal Salida Tab Content-->
<div role="tabpanel" id="sal" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 7-->
    <div class="form-group">
        <label class="control-label col-xs-2">Terminal Retiro Vacio</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_codtermret" id="c_codtermret"  class="form-control input-sm" placeholder="Codigo"  /><?php */?>
            <select id="c_codtermretI" name="c_codtermretI"  class="form-control input-sm select2" onChange="cambiarterminalvacioI()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomtermretI"  id="c_nomtermretI" class="form-control input-sm" placeholder="Nombre"   />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecretiroI"  id="d_fecretiroI" class="form-control input-sm" placeholder="Fecha Retiro"  />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaretiroI"  id="horaretiroI" class="form-control input-sm time-format" placeholder="Hora Retiro" style="width:85px;"  />
        </div>

    </div>
    <!--fin fila 7-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-3">
            <input autocomplete="off" type="text" name="c_nomtranspoteI" id="c_nomtranspoteI" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransporteI" name="c_ructransporteI" value=""  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferI" id="c_choferI" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransI();" readonly />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferI();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Licencia Chofer</label>
        <div class="col-xs-2">
            <input type="text" name="c_licenciI" id="c_licenciI" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcaI" id="c_marcaI" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placaI" id="c_placaI" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2I" id="c_placa2I" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefonoI" id="c_telefonoI"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1I" id="c_generador1I" value="" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2I" id="c_generador2I" value="" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatraI" id="c_serguiatraI"  class="form-control input-sm" placeholder="Serie"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatraI"  id="c_nroguiatraI" class="form-control input-sm" placeholder="Numero"    />
        </div>
    </div>
    <!--fin fila 8-->


</div>