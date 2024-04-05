<!-- Datos Factura Tab Content-->
<div role="tabpanel" id="prov" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 13-->
    <div class="form-group">
        <label class="control-label col-xs-2">Factura Proveedor</label>
        <div class="col-xs-1" >
            <input type="text" name="c_serfacprov" id="c_serfacprov"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_serfacprov; ?>" placeholder="Serie" />
        </div>
        <div class="col-xs-2">
            <input type="text" name="c_numfacprov" id="c_numfacprov" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_numfacprov; ?>" placeholder="Numero" />
        </div>

        <label class="control-label col-xs-1">Traduccion Factura</label>
        <div class="col-xs-2">
            <input type="text" name="c_tradfac"  id="c_tradfac" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_tradfac; ?>" placeholder="Traduccion Factura"    />
        </div>
        <label class="control-label col-xs-1">Poliza de seguro</label>
        <div class="col-xs-1">
            <input type="text" name="c_nropolizaseg" id="c_nropolizaseg"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nropolizaseg; ?>" placeholder="Polisa"  />
        </div>
    </div>
    <!--fin fila 13-->
    <!--fila14 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Fecha BL Endosado</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecendose" id="d_fecendose"  class="form-control input-sm" <?php $d_fecendose=$ListarDetalleUpd->d_fecendose; if($d_fecendose!=""){$d_fecendose=vfecha(substr($ListarDetalleUpd->d_fecendose,0,10));} ?> value="<?php echo $d_fecendose; ?>" placeholder="Fecha BL Endosado"  />
        </div>

    </div>
    <!--fin fila 14-->
</div>