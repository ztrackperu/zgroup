<!-- Datos Aduana Tab Content-->
<div role="tabpanel" id="adu" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">Agente Aduana</label>
        <div class="col-xs-1">
            <input type="text" name="c_codageaduana" id="c_codageaduana" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_codageaduana; ?>" placeholder="Codigo"   />
        </div>
        <div class="col-xs-2">
            <input type="text" name="c_nomageaduana" id="c_nomageaduana" class="form-control input-sm" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomageaduana); ?>" placeholder="Nombre"  />
        </div>

        <label class="control-label col-xs-1">Valor Aduana</label>
        <div class="col-xs-1">
            <input type="text" name="c_valaduana"  id="c_valaduana" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_valaduana; ?>" placeholder="Valor"   />
        </div>
        <label class="control-label col-xs-1">Fecha Volante</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecvolante" id="d_fecvolante"  class="form-control input-sm" <?php $d_fecvolante=$ListarDetalleUpd->d_fecvolante; if($d_fecvolante!=""){$d_fecvolante=vfecha(substr($ListarDetalleUpd->d_fecvolante,0,10));} ?> value="<?php echo $d_fecvolante; ?>" placeholder="Fecha Volante"  />
        </div>
    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fecha Num. DUA</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecnumdua" id="d_fecnumdua"  class="form-control input-sm" <?php $d_fecnumdua=$ListarDetalleUpd->d_fecnumdua; if($d_fecnumdua!=""){$d_fecnumdua=vfecha(substr($ListarDetalleUpd->d_fecnumdua,0,10));} ?> value="<?php echo $d_fecnumdua; ?>" placeholder="Fecha Num. DUA"  />
        </div>
        <label class="control-label col-xs-1">Canal</label>
        <div class="col-xs-2">
            <input type="text" name="c_canal" id="c_canal"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_canal; ?>" placeholder="Canal"  />
        </div>
        <label class="control-label col-xs-1">Observacion</label>
        <div class="col-xs-2">
            <input type="text" name="c_observacion" id="c_observacion"  class="form-control input-sm" value="<?php echo utf8_encode($ListarDetalleUpd->c_observacion); ?>" placeholder="Observacion" />
        </div>
    </div>
</div>