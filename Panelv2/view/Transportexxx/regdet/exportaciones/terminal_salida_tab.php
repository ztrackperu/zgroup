<!-- Datos Terminal Salida Tab Content-->
<div id="retiro" class="tab-pane fade" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 7-->
    <div class="form-group">
        <label class="control-label col-xs-2">Terminal Retiro Vacio</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_codtermret" id="c_codtermret"  class="form-control input-sm" placeholder="Codigo"  /><?php */?>
            <select id="c_codtermret" name="c_codtermret" class="form-control input-sm select2" onChange="cambiarterminalvacio()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomtermret"  id="c_nomtermret" class="form-control input-sm" placeholder="Nombre"   />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecretiro"  id="d_fecretiro" class="form-control input-sm" placeholder="Fecha Retiro"  />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaretiro"  id="horaretiro" class="form-control input-sm time-format" placeholder="Hora Retiro" style="width:85px;"  />
        </div>
        <label class="control-label col-xs-1">Nº EIR</label>
        <div class="col-xs-1">
            <input type="text" name="c_numeir" id="c_numeir"  class="form-control input-sm" placeholder="EIR"  />
        </div>

    </div>
    <!--fin fila 7-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-3">
            <input autocomplete="off" type="text" name="c_nomtranspote" id="c_nomtranspote" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransporte" name="c_ructransporte" value=""  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_chofer" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChofer();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Licencia Chofer</label>
        <div class="col-xs-2">
            <input type="text" name="c_licenci" id="c_licenci" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marca" id="c_marca" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placa" id="c_placa" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2" id="c_placa2" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefono" id="c_telefono"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1" id="c_generador1" value="" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2" id="c_generador2" value="" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatra" id="c_serguiatra"  class="form-control input-sm" placeholder="Serie"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatra"  id="c_nroguiatra" class="form-control input-sm" placeholder="Numero"    />
        </div>
    </div>
    <!--fin fila 8-->


</div>