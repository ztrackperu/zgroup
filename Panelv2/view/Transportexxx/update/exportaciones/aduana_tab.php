<!-- Datos Aduana Tab Content-->
<div role="tabpanel" id="aduexpo" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 15-->
    <div class="form-group">
        <label class="control-label col-xs-2">Agente Maritimo</label>
        <div class="col-xs-2">
            <?php /*?><input type="text" name="Ec_codagemari" id="c_codagemari" class="form-control input-sm" placeholder="Codigo"  value="<?php echo $ListarDetalleUpd->c_codagemari; ?>"  />             <?php */?>
            <select id="Ec_codagemari" name="Ec_codagemari"  class="form-control input-sm" onChange="cambiaragemari()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$ListarDetalleUpd->c_codagemari){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomagemari" id="Ec_nomagemari" class="form-control input-sm" placeholder="Nombre" value="<?php echo $ListarDetalleUpd->c_nomagemari; ?>"   />
        </div>

        <label class="control-label col-xs-1">Fec Pago de VB</label>
        <div class="col-xs-2">
            <input type="text" name="Ed_fecpagvb"  id="Ed_fecpagvb" class="form-control input-sm" <?php $d_fecpagvb=$ListarDetalleUpd->d_fecpagvb; if($d_fecpagvb!=""){$d_fecpagvb=vfecha(substr($ListarDetalleUpd->d_fecpagvb,0,10));} ?> value="<?php echo $d_fecpagvb; ?>" placeholder="Fecha Pago de VB"   />
        </div>
        <label class="control-label col-xs-1">Fec Recepcion</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecrecpfac" id="d_fecrecpfac"  class="form-control input-sm" <?php $d_fecrecpfac=$ListarDetalleUpd->d_fecrecpfac; if($d_fecrecpfac!=""){$d_fecrecpfac=vfecha(substr($ListarDetalleUpd->d_fecrecpfac,0,10));} ?> value="<?php echo $d_fecrecpfac; ?>" placeholder="FR Fact. Comercial"  />
        </div>
    </div>
    <!--fin fila 15-->
    <!--fila16 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec Entrega</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecentread" id="d_fecentread"  class="form-control input-sm" <?php $d_fecentread=$ListarDetalleUpd->d_fecentread; if($d_fecentread!=""){$d_fecentread=vfecha(substr($ListarDetalleUpd->d_fecentread,0,10));} ?> value="<?php echo $d_fecentread; ?>" placeholder="FE Ag. Aduana"  />
        </div>
        <label class="control-label col-xs-1">Observacion</label>
        <div class="col-xs-2">
            <input type="text" name="Ec_observacion" id="Ec_observacion"  class="form-control input-sm" value="<?php echo utf8_encode($ListarDetalleUpd->c_observacion); ?>" placeholder="Observacion"  />
        </div>


    </div>
    <!--fin fila 16-->
</div>