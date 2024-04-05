<!-- Datos Almacen Tab Content-->
<div role="tabpanel" id="alm" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 9-->
    <div class="form-group">
        <label class="control-label col-xs-3">Almacen</label>
        <div class="col-xs-2">
            <!-- <input type="text" name="c_idalmacen" id="c_idalmacen"  class="form-control input-sm" placeholder="Codigo" />   -->
            <select id="c_idalmacen" name="c_idalmacen"  class="form-control input-sm select2" onChange="cambiaralmacen()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>"><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomalmacen" id="c_nomalmacen"  class="form-control input-sm" placeholder="Nombre" />
        </div>

        <label class="control-label col-xs-2">Agente Maritimo</label>
        <div class="col-xs-4">
            <select id="c_codagenmari" name="c_codagenmari"  class="form-control input-sm select2" onChange="cambiaragentemar()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>"><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomagemari" id="c_nomagemari"  class="form-control input-sm" value="" placeholder="Nombre"   />
        </div>


    </div>
    <!--fin fila 9-->
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-3">Fecha Pago Almacen</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagalm"  id="d_fecpagalm" class="form-control input-sm" placeholder="Fecha Pago"   />
        </div>
        <label class="control-label col-xs-2">Datos THC</label>
        <div class="col-xs-2">
            <input type="text" name="n_impthc" id="n_impthc"  class="form-control input-sm"  placeholder="Importe THC" onBlur="validaImporteThc();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagthc"  id="d_fecpagthc" class="form-control input-sm" placeholder="Fecha Pago THC"   />
        </div>


    </div>
    <!--fin fila 10-->
    <!--fila11 -->
    <div class="form-group">

        <label class="control-label col-xs-2">Datos VB</label>
        <div class="col-xs-1">
            <input type="text" name="n_impvb" id="n_impvb"  class="form-control input-sm" placeholder="Importe VB" onBlur="validaImporteVb();" onkeypress="return validaDecimal(event)"  />
        </div>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagvb" id="d_fecpagvb"  class="form-control input-sm" placeholder="Fecha Pago VB"  />
        </div>

        <label class="control-label col-xs-2">Dias Libres</label>
        <div class="col-xs-2">
            <input type="text" name="n_dlibres"  id="n_dlibres" class="form-control input-sm" placeholder="Sobreestadia" onkeypress="return validaEntero(event)"   />
        </div>
        <div class="col-xs-2">
            <input type="text" name="n_dlibelect" id="n_dlibelect"  class="form-control input-sm" placeholder="Electricidad" onkeypress="return validaEntero(event)"   />
        </div>

    </div>
    <!--fin fila 11-->
    <!--fila12-->
    <div class="form-group">
        <label class="control-label col-xs-3">Fecha Max Dev. vacio</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecmaxdev" id="d_fecmaxdev"  class="form-control input-sm" placeholder="Fecha Max Dev. vacio"  />
        </div>

    </div>
    <!--fin fila 12-->
</div>