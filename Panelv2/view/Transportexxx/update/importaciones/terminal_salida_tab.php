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
            <select id="c_codtermretI" name="c_codtermretI"  class="form-control input-sm" onChange="cambiarterminalvacioI()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>" <?php if($dep->C_NUMITM==$ListarDetalleUpd->c_codtermret){?>selected<?php }?>><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomtermretI"  id="c_nomtermretI" class="form-control input-sm" placeholder="Nombre" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomtermret); ?>"   />
        </div>

        <label class="control-label col-xs-2">Fecha y Hora</label>
        <div class="col-xs-2">
            <?php
            $d_fecretirox=$ListarDetalleUpd->d_fecretiro;
            if($d_fecretirox!=""){
                //FECHA
                $d_fecretiro=vfecha(substr($d_fecretirox,0,10));
                //HORA
                setlocale(LC_TIME,"es_ES");
                $horaretiro=strftime('%H:%M:%S', strtotime($d_fecretirox));
            }
            ?>
            <input type="text" name="d_fecretiroI"  id="d_fecretiroI" class="form-control input-sm" value="<?php echo $d_fecretiro; ?>" placeholder="Fecha Retiro"  />
        </div>
        <div class="col-xs-1">
            <input type="text" name="horaretiroI"  id="horaretiroI" class="form-control input-sm time-format" value="<?php echo $horaretiro; ?>" placeholder="Hora Retiro" style="width:85px;"  />
        </div>

    </div>
    <!--fin fila 7-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-3">
            <input autocomplete="off" type="text" name="c_nomtranspoteI" id="c_nomtranspoteI" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomtranspote) ?>" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransporteI" name="c_ructransporteI" value="<?php echo $ListarDetalleUpd->c_ructransporte ?>"  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferI" id="c_choferI" value="<?php echo $ListarDetalleUpd->c_chofer ?>" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransI();" readonly  />
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
            <input type="text" name="c_licenciI" id="c_licenciI" value="<?php echo $ListarDetalleUpd->c_licenci ?>" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcaI" id="c_marcaI" value="<?php echo $ListarDetalleUpd->c_marca ?>" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placaI" id="c_placaI" class="form-control input-sm"  placeholder="Tracto" value="<?php echo $ListarDetalleUpd->c_placa ?>" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2I" id="c_placa2I" class="form-control input-sm"  placeholder="Carreta" value="<?php echo $ListarDetalleUpd->c_placa2 ?>" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila8 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Telefono</label>
        <div class="col-xs-2">
            <input type="text" name="c_telefonoI" id="c_telefonoI"  class="form-control datepicker input-sm" placeholder="Telefono" value="<?php echo $ListarDetalleUpd->c_telefono ?>" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Generadores</label>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador1I" id="c_generador1I" value="<?php echo $ListarDetalleUpd->c_generador1 ?>" class="form-control input-sm" placeholder="Principal" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:90px;" name="c_generador2I" id="c_generador2I" value="<?php echo $ListarDetalleUpd->c_generador2 ?>" class="form-control input-sm" placeholder="Reserva" />
        </div>
        <label class="control-label col-xs-2">Guia Transporte</label>
        <div class="col-xs-1">
            <input type="text" name="c_serguiatraI" id="c_serguiatraI"  class="form-control input-sm" placeholder="Serie" value="<?php echo $ListarDetalleUpd->c_serguiatra ?>"  />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_nroguiatraI"  id="c_nroguiatraI" class="form-control input-sm" placeholder="Numero" value="<?php echo $ListarDetalleUpd->c_nroguiatra ?>"    />
        </div>
    </div>
    <!--fin fila 8-->


</div>