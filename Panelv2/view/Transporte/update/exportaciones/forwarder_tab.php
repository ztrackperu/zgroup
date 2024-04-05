<!-- Datos Forwarder Tab Content-->
<div role="tabpanel" id="fwexpo" class="tab-pane active" >

    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">Servicio</label>
        <div class="col-xs-1">
            <input type="text" style="width:80px;" name="EId_servicio" id="EId_servicio"  class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->Id_Servicio; ?>" readonly />
        </div>
        <label class="control-label col-xs-1">Forwarder</label>
        <div class="col-xs-1">
            <input type="text" name="Ec_nrofw" id="Ec_nrofw" class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->c_nrofw; ?>" readonly  />
        </div>
        <label class="control-label col-xs-1">Booking</label>
        <div class="col-xs-2">
            <input type="text" name="c_nrobooking" id="c_nrobooking" class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->c_nrobooking; ?>" readonly  />
        </div>

        <label class="control-label col-xs-1">Embarcadero</label>
        <input type="hidden" name="c_idembar" id="c_idembar"  class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->c_idembar; ?>" placeholder="Codigo" />
        <div class="col-xs-2">
            <input type="text" name="c_nomembar" id="c_nomembar"  class="form-control input-sm"  value="<?php echo utf8_encode($ListarDetalleUpd->c_nomembar); ?>" placeholder="Nombre" />
        </div>

    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Cliente</label>
        <div class="col-xs-1">
            <input name="c_codclie" id="c_codclie" class="form-control input-sm"  type="text" value="<?php echo utf8_encode($ListarDetalleUpd->c_codclie); ?>"   />
        </div>
        <div class="col-xs-3">
            <input name="c_nomclie" id="c_nomclie" class="form-control input-sm"  type="text" value="<?php echo utf8_encode($ListarDetalleUpd->c_nomclie); ?>"   />
        </div>
        <label class="control-label col-xs-2">Linea Maritima </label>
        <div class="col-xs-3">
            <?php /*?><input type="text" name="Ec_idlinemar" id="Ec_idlinemar"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_idlinemar; ?>" placeholder="Codigo"  />  <?php */?>
            <select id="Ec_idlinemar" name="Ec_idlinemar"  class="form-control input-sm" onChange="cambiarlineaexpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarLineaMaritima=$this->model->ListarLineaMaritima();
                foreach ($ListarLineaMaritima as $lineamar){
                    ?>
                    <option value="<?php echo $lineamar->Lin_Codi; ?>" <?php if($lineamar->Lin_Codi==$ListarDetalleUpd->c_idlinemar){?>selected<?php }?>><?php echo utf8_encode($lineamar->Lin_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomlineamar" id="Ec_nomlineamar"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nomlineamar; ?>"  placeholder="Nombre"  />

        </div>

    </div>

    <!--fila 3-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fecha de Zarpe</label>
        <div class="col-xs-2">
            <input type="text" name="d_feczarpe" id="d_feczarpe"  class="form-control input-sm" <?php $d_feczarpe=$ListarDetalleUpd->d_feczarpe; if($d_feczarpe!=""){$d_feczarpe=vfecha(substr($ListarDetalleUpd->d_feczarpe,0,10));} ?> value="<?php echo $d_feczarpe; ?>" placeholder="Fecha de Zarpe"  />
        </div>
        <label class="control-label col-xs-2">Nave</label>
        <div class="col-xs-2">
            <?php /*?> <input type="text" name="Ec_idnave" id="Ec_idnave" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_idnave; ?>" placeholder="Codigo"  /> <?php */?>
            <select id="Ec_idnave" name="Ec_idnave"  class="form-control input-sm" onChange="cambiarnaveexpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarNaves=$this->model->ListarNaves();
                foreach ($ListarNaves as $nave){
                    ?>
                    <option value="<?php echo $nave->Nav_Codi; ?>" <?php if($nave->Nav_Codi==$ListarDetalleUpd->c_idnave){?>selected<?php }?>><?php echo utf8_encode($nave->Nav_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomnave" id="Ec_nomnave"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nomnave; ?>" placeholder="Nombre"   />
        </div>
        <label class="control-label col-xs-1">N° Viaje</label>
        <div class="col-xs-1">
            <input type="text" name="En_numviaje" id="En_numviaje"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_numviaje; ?>" placeholder="N° Viaje"  />
        </div>
    </div>

</div>