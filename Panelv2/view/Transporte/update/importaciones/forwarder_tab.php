<!-- Datos Forwarder Tab Content-->
<div role="tabpanel" id="fw" class="tab-pane active" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">Forwarder</label>
        <div class="col-xs-2">
            <input name="c_nrofw" id="c_nrofw" class="form-control input-sm"  type="text" value="<?php echo $ListarDetalleUpd->c_nrofw; ?>" readonly  />
        </div>
        <label class="control-label col-xs-1">Servicio</label>
        <div class="col-xs-2">
            <input type="text" name="Id_servicio" id="Id_servicio"  class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->Id_Servicio; ?>" readonly />
        </div>
        <label class="control-label col-xs-1">Icoterm</label>
        <div class="col-xs-2">
            <input type="text" name="c_icoterm" id="c_icoterm"  class="form-control input-sm"  value="<?php echo $ListarDetalleUpd->c_icoterm; ?>" />
        </div>
    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Consignatario</label>
        <div class="col-xs-3">
            <select id="c_codconsig" name="c_codconsig"  class="form-control input-sm" onChange="cambiarconsig()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>" <?php if($enti->Ent_Codi==$ListarDetalleUpd->c_codconsig){?>selected<?php }?>><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input name="c_nomconsig" id="c_nomconsig" class="form-control input-sm"  type="hidden" value="<?php echo $ListarDetalleUpd->c_nomconsig; ?>"   />
        </div>
        <label class="control-label col-xs-2">N° BL master </label>
        <div class="col-xs-2">
            <input type="text" name="c_nblmaster" id="c_nblmaster"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nblmaster; ?>" placeholder="Numero BL master"  />
        </div>
    </div>
    <!--fila 3-->
    <div class="form-group">
        <label class="control-label col-xs-2">N° BL hijo</label>
        <div class="col-xs-2">
            <input type="text" name="c_nblhijo" id="c_nblhijo"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nblhijo; ?>" placeholder="Numero BL hijo"  />
        </div>
        <label class="control-label col-xs-2">Linea Maritima</label>
        <div class="col-xs-3">
            <?php /*?><input type="text" name="c_idlinemar" id="c_idlinemar" class="form-control input-sm" placeholder="Codigo"   value="<?php echo $ListarDetalleUpd->c_idlinemar; ?>"   /><?php */?>
            <select id="c_idlinemar" name="c_idlinemar"  class="form-control input-sm" onChange="cambiarlineaimpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarLineaMaritima=$this->model->ListarLineaMaritima();
                foreach ($ListarLineaMaritima as $lineamar){
                    ?>
                    <option value="<?php echo $lineamar->Lin_Codi; ?>" <?php if($lineamar->Lin_Codi==$ListarDetalleUpd->c_idlinemar){?>selected<?php }?>><?php echo utf8_encode($lineamar->Lin_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomlineamar"  id="c_nomlineamar" class="form-control input-sm" placeholder="Nombre" value="<?php echo $ListarDetalleUpd->c_nomlineamar; ?>"   />
        </div>
    </div>
    <!--fila 4-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec Pago MBL </label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagblm" id="d_fecpagblm"  class="form-control input-sm" placeholder="Fecha Pago MBL" <?php $d_fecpagblm=$ListarDetalleUpd->d_fecpagblm; if($d_fecpagblm!=""){$d_fecpagblm=vfecha(substr($ListarDetalleUpd->d_fecpagblm,0,10));} ?>  value="<?php echo $d_fecpagblm  ?>"    />
        </div>
        <label class="control-label col-xs-2">Fec Pago HBL</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagblh" id="d_fecpagblh"  class="form-control input-sm" placeholder="Fecha Pago HBL" <?php $d_fecpagblh=$ListarDetalleUpd->d_fecpagblh; if($d_fecpagblh!=""){$d_fecpagblh=vfecha(substr($ListarDetalleUpd->d_fecpagblh,0,10));} ?> value="<?php echo $d_fecpagblh; ?>"   />
        </div>
    </div>
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Nave</label>
        <div class="col-xs-2">
            <select id="c_idnave" name="c_idnave"  class="form-control input-sm" onChange="cambiarnaveimpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarNaves=$this->model->ListarNaves();
                foreach ($ListarNaves as $nave){
                    ?>
                    <option value="<?php echo $nave->Nav_Codi; ?>" <?php if($nave->Nav_Codi==$ListarDetalleUpd->c_idnave){?>selected<?php }?> ><?php echo utf8_encode($nave->Nav_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomnave" id="c_nomnave"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nomnave; ?>" placeholder="Nombre"   />
        </div>
        <label class="control-label col-xs-2">N°viaje</label>
        <div class="col-xs-1">
            <input type="text" name="n_numviaje" id="n_numviaje"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->n_numviaje; ?>" placeholder="N° Viaje"  />
        </div>
        <label class="control-label col-xs-1">Fec ETD Origen </label>
        <div class="col-xs-2">
            <input type="text" name="d_fecetdorig" id="d_fecetdorig"  class="form-control input-sm" <?php $d_fecetdorig=$ListarDetalleUpd->d_fecetdorig; if($d_fecetdorig!=""){$d_fecetdorig=vfecha(substr($ListarDetalleUpd->d_fecetdorig,0,10));} ?>  value="<?php echo $d_fecetdorig; ?>"  />
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec ETA Callao</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecetdodest" id="d_fecetdodest"  class="form-control input-sm" <?php $d_fecetdodest=$ListarDetalleUpd->d_fecetdodest; if($d_fecetdodest!=""){$d_fecetdodest=vfecha(substr($ListarDetalleUpd->d_fecetdodest,0,10));} ?> value="<?php echo $d_fecetdodest; ?>" />
        </div>
        <label class="control-label col-xs-2">N° manifiesto</label>
        <div class="col-xs-1">
            <input type="text" name="c_nummanifiesto"  id="c_nummanifiesto" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_nummanifiesto; ?>"     />
        </div>
        <label class="control-label col-xs-1">Fec HBL</label>
        <div class="col-xs-2">
            <input type="text" name="d_fectransblm" id="d_fectransblm"  class="form-control input-sm" <?php $d_fectransblm=$ListarDetalleUpd->d_fectransblm; if($d_fectransblm!=""){$d_fectransblm=vfecha(substr($ListarDetalleUpd->d_fectransblm,0,10));} ?> value="<?php echo $d_fectransblm; ?>" placeholder="Fecha Transmision" />
        </div>
    </div>
</div>