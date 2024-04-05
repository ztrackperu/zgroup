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
            <select id="c_codtermingI" name="c_codtermingI"  class="form-control input-sm" onChange="cambiarterminalingI()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>" <?php if($dep->C_NUMITM==$ListarDetalleUpd->c_codterming){?>selected<?php }?> ><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomtermingI" id="c_nomtermingI" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomterming) ?>" class="form-control input-sm" placeholder="Nombre" />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-1">
            <?php
            $d_fecingresox=$ListarDetalleUpd->d_fecingreso;
            if($d_fecingresox!=""){
                //FECHA
                $d_fecingreso=vfecha(substr($d_fecingresox,0,10));
                //HORA
                setlocale(LC_TIME,"es_ES");
                $horaingreso=strftime('%H:%M:%S', strtotime($d_fecingresox));
            }
            ?>
            <input type="text" name="d_fecingresoI" id="d_fecingresoI" value="<?php echo $d_fecingreso ?>"  class="form-control input-sm" style="width:85px;" placeholder="Fecha Ingreso" />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaingresoI"  id="horaingresoI" value="<?php echo $horaingreso ?>" class="form-control input-sm time-format" placeholder="Hora Ingreso" style="width:85px;"  />
        </div>

        <label class="control-label col-xs-1">Puerto</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="c_nompuerto" id="c_nompuerto"  class="form-control input-sm" placeholder="Puerto de Ingreso" /><?php */?>
            <select id="c_nompuertoI" name="c_nompuertoI"  class="form-control input-sm">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarPuertos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_DESITM; ?>" <?php if($dep->C_DESITM==$ListarDetalleUpd->c_nompuerto){?>selected<?php }?> ><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <!--fin fila 9-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-3">
            <input autocomplete="off" type="text" name="c_nomtranspotebI" id="c_nomtranspotebI" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomtranspoteb) ?>" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransportebI" name="c_ructransportebI" value="<?php echo $ListarDetalleUpd->c_ructransporteb ?>"  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferbI" id="c_choferbI" value="<?php echo $ListarDetalleUpd->c_choferb ?>" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransbI();" readonly />
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
            <input type="text" name="c_licencibI" id="c_licencibI" value="<?php echo $ListarDetalleUpd->c_licencib ?>" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcabI" id="c_marcabI" value="<?php echo $ListarDetalleUpd->c_marcab ?>" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placabI" id="c_placabI" class="form-control input-sm"  placeholder="Tracto" value="<?php echo $ListarDetalleUpd->c_placab ?>" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2bI" id="c_placa2bI" class="form-control input-sm"  placeholder="Carreta" value="<?php echo $ListarDetalleUpd->c_placa2b ?>" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefonobI" id="c_telefonobI"  class="form-control datepicker input-sm" placeholder="Telefono" value="<?php echo $ListarDetalleUpd->c_telefonob ?>" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1bI" id="c_generador1bI" value="<?php echo $ListarDetalleUpd->c_generador1b ?>" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2bI" id="c_generador2bI" value="<?php echo $ListarDetalleUpd->c_generador2b ?>" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatrabI" id="c_serguiatrabI"  class="form-control input-sm"  placeholder="Serie" value="<?php echo $ListarDetalleUpd->c_serguiatrab ?>"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatrabI" id="c_nroguiatrabI"  class="form-control input-sm"  placeholder="Numero" value="<?php echo $ListarDetalleUpd->c_nroguiatrab ?>"  />
        </div>
    </div>
    <!--fin fila 10-->

</div>