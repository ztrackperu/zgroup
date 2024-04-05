<!-- Datos Terminal de Ingreso Tab Content-->
<div id="ing" class="tab-pane fade" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 9-->
    <div class="form-group">
        <label class="control-label col-xs-2">Terminal de Ingreso</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_codterming" id="c_codterming"  class="form-control input-sm" placeholder="Codigo" /> <?php */?>
            <select id="c_codterming" name="c_codterming"  class="form-control input-sm select2" onChange="cambiarterminaling()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomterming" id="c_nomterming"  class="form-control input-sm" placeholder="Nombre" />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-1">
            <input type="text" name="d_fecingreso" id="d_fecingreso"  class="form-control input-sm" style="width:85px;" placeholder="Fecha Ingreso" />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaingreso"  id="horaingreso" class="form-control input-sm time-format" placeholder="Hora Ingreso" style="width:85px;"  />
        </div>

        <label class="control-label col-xs-1">Puerto</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_nompuerto" id="c_nompuerto"  class="form-control input-sm" placeholder="Puerto de Ingreso" /><?php */?>
            <select id="c_nompuerto" name="c_nompuerto"  class="form-control input-sm select2">
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
            <input autocomplete="off" type="text" name="c_nomtranspoteb" id="c_nomtranspoteb" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransporteb" name="c_ructransporteb" value=""  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferb" id="c_choferb" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransb();" readonly />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferb();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Licencia Chofer</label>
        <div class="col-xs-2">
            <input type="text" name="c_licencib" id="c_licencib" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcab" id="c_marcab" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placab" id="c_placab" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2b" id="c_placa2b" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefonob" id="c_telefonob"  class="form-control datepicker input-sm" placeholder="Telefono" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1b" id="c_generador1b" value="" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2b" id="c_generador2b" value="" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatrab" id="c_serguiatrab"  class="form-control input-sm"  placeholder="Serie"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatrab" id="c_nroguiatrab"  class="form-control input-sm"  placeholder="Numero"  />
        </div>
    </div>
    <!--fin fila 10-->
    <!--fila11 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Guia Cliente</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiaclie" id="c_serguiaclie"  class="form-control input-sm"  placeholder="Serie"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_numguiaclie" id="c_numguiaclie"  class="form-control input-sm"  placeholder="Numero"  />
        </div>
        <label class="control-label col-xs-2">Agente de Aduana</label>
        <div class="col-xs-2">
            <select id="Ec_codageaduana" name="Ec_codageaduana"  class="form-control input-sm select2" onChange="cambiarageadu()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>"><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomageaduana" id="Ec_nomageaduana"  placeholder="Nombre"  value="" />
        </div>
        <label class="control-label col-xs-1">F. Refrendo</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecrefrendo"  id="d_fecrefrendo" class="form-control input-sm" placeholder="Fecha Refrendo"   />
        </div>
    </div>
    <!--fin fila 11-->
    <!--fila12-->
    <div class="form-group">
        <label class="control-label col-xs-2">N° DAM</label>
        <div class="col-xs-2">
            <input type="text" name="c_numdam" id="c_numdam"  class="form-control input-sm" placeholder="N° DAM"  />
        </div>
        <label class="control-label col-xs-1">Tipo Canal</label>
        <div class="col-xs-2">
            <input type="text" name="c_tipcanal" id="c_tipcanal"  class="form-control input-sm" placeholder="Tipo Canal"  />
        </div>

    </div>
    <!--fin fila 12-->
</div>