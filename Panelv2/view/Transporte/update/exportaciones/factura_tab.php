<!-- Datos Factura Tab Content-->
<div role="tabpanel" id="fac" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 13-->
    <div class="form-group">
        <label class="control-label col-xs-2">Factura ZGROUP</label>
        <div class="col-xs-1" >
            <input type="text" name="c_serfacfw" id="c_serfacfw"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_serfacfw; ?>" placeholder="Serie" />
        </div>
        <div class="col-xs-2">
            <input type="text" name="c_numfacfw" id="c_numfacfw" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_numfacfw; ?>" placeholder="Numero" />
        </div>

        <label class="control-label col-xs-2">Fecha Factura</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecfactura"  id="d_fecfactura" class="form-control input-sm" <?php $d_fecfactura=$ListarDetalleUpd->d_fecfactura; if($d_fecfactura!=""){$d_fecfactura=vfecha(substr($ListarDetalleUpd->d_fecfactura,0,10));} ?> value="<?php echo $d_fecfactura; ?>" placeholder="Fecha Factura"    />
        </div>

    </div>
    <!--fin fila 13-->
    <!--fila 14-->
    <div class="form-group">
        <label class="control-label col-xs-2">Factura PSCARGO</label>
        <div class="col-xs-1" >
            <input type="text" name="c_serfacfwpsc" id="c_serfacfwpsc"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_serfacfwpsc; ?>" placeholder="Serie" />
        </div>
        <div class="col-xs-2">
            <input type="text" name="c_numfacfwpsc" id="c_numfacfwpsc" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_numfacfwpsc; ?>" placeholder="Numero" />
        </div>

        <label class="control-label col-xs-2">Fecha Factura</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecfacturapsc"  id="d_fecfacturapsc" class="form-control input-sm" <?php $d_fecfacturapsc=$ListarDetalleUpd->d_fecfacturapsc; if($d_fecfacturapsc!=""){$d_fecfacturapsc=vfecha(substr($ListarDetalleUpd->d_fecfacturapsc,0,10));} ?> value="<?php echo $d_fecfacturapsc; ?>" placeholder="Fecha Factura"    />
        </div>

    </div>
    <!--fin fila 14-->

</div>