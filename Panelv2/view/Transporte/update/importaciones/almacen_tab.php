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
            <select id="c_idalmacen" name="c_idalmacen"  class="form-control input-sm" onChange="cambiaralmacen()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarDepositos=$this->model->ListarDepositos();
                foreach ($ListarDepositos as $dep){
                    ?>
                    <option value="<?php echo $dep->C_NUMITM; ?>" <?php if($enti->Ent_Codi==$ListarDetalleUpd->c_idalmacen){?>selected<?php }?>><?php echo utf8_encode($dep->C_DESITM); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomalmacen" id="c_nomalmacen"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nomalmacen; ?>" placeholder="Nombre" />
        </div>
        <label class="control-label col-xs-2">Agente Maritimo</label>
        <div class="col-xs-4">
            <?php /*?><input type="text" name="c_codagenmari" id="c_codagenmari" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_codagenmari; ?>" placeholder="Codigo"   /> <?php */?>
            <select id="c_codagenmari" name="c_codagenmari"  class="form-control input-sm" onChange="cambiaragentemar()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$ListarDetalleUpd->c_codagenmari){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomagemari" id="c_nomagemari"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nomagemari; ?>" placeholder="Nombre"   />
        </div>

    </div>
    <!--fin fila 9-->
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-3">Fecha Pago Almacen</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagalm"  id="d_fecpagalm" class="form-control input-sm" <?php $d_fecpagalm=$ListarDetalleUpd->d_fecpagalm; if($d_fecpagalm!=""){$d_fecpagalm=vfecha(substr($ListarDetalleUpd->d_fecpagalm,0,10));} ?>  value="<?php echo $d_fecpagalm; ?>" placeholder="Fecha Pago"   />
        </div>
        <label class="control-label col-xs-2">Datos THC</label>
        <div class="col-xs-2">
            <input type="text" name="n_impthc" id="n_impthc"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_impthc; ?>"  placeholder="Importe THC"  />
        </div>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagthc"  id="d_fecpagthc" class="form-control input-sm" <?php $d_fecpagthc=$ListarDetalleUpd->d_fecpagthc; if($d_fecpagthc!=""){$d_fecpagthc=vfecha(substr($ListarDetalleUpd->d_fecpagthc,0,10));} ?> value="<?php echo $d_fecpagthc; ?>" placeholder="Fecha Pago THC"   />
        </div>


    </div>
    <!--fin fila 10-->
    <!--fila11 -->
    <div class="form-group">

        <label class="control-label col-xs-2">Datos VB</label>
        <div class="col-xs-1">
            <input type="text" name="n_impvb" id="n_impvb"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_impvb; ?>" placeholder="Importe VB"  />
        </div>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagvb" id="d_fecpagvb"  class="form-control input-sm" <?php $d_fecpagvb=$ListarDetalleUpd->d_fecpagvb; if($d_fecpagvb!=""){$d_fecpagvb=vfecha(substr($ListarDetalleUpd->d_fecpagvb,0,10));} ?> value="<?php echo $d_fecpagvb; ?>" placeholder="Fecha Pago VB"  />
        </div>

        <label class="control-label col-xs-2">Dias Libres</label>
        <div class="col-xs-2">
            <input type="text" name="n_dlibres"  id="n_dlibres" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_dlibres; ?>" placeholder="Sobreestadia"   />
        </div>
        <div class="col-xs-2">
            <input type="text" name="n_dlibelect" id="n_dlibelect"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_dlibelect; ?>" placeholder="Electricidad"  />
        </div>

    </div>
    <!--fin fila 11-->
    <!--fila12-->
    <div class="form-group">
        <label class="control-label col-xs-3">Fecha Max Dev. vacio</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecmaxdev" id="d_fecmaxdev"  class="form-control input-sm" <?php $d_fecmaxdev=$ListarDetalleUpd->d_fecmaxdev; if($d_fecmaxdev!=""){$d_fecmaxdev=vfecha(substr($ListarDetalleUpd->d_fecmaxdev,0,10));} ?> value="<?php echo $d_fecmaxdev; ?>" placeholder="Fecha Max Dev. vacio"  />
        </div>

    </div>
    <!--fin fila 12-->
</div>