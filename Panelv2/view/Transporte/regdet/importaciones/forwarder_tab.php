<!-- Datos Forwarder Tab Content-->
<div id="fw" class="tab-pane fade in active" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
        <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">FW / Routing</label>
        <div class="col-xs-2">
            <input name="c_nrofw" id="c_nrofw" class="form-control input-sm"  type="text" value="<?php echo $c_nrofw; ?>" readonly  />
        </div>
        <label class="control-label col-xs-1">Servicio</label>
        <div class="col-xs-2">
            <input type="text" name="Id_servicio" id="Id_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />
        </div>
        <label class="control-label col-xs-1">Icoterm</label>
        <div class="col-xs-2">
            <input type="text" name="c_icoterm" id="c_icoterm"  class="form-control input-sm"  value="" />
        </div>
    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Consignatario</label>
        <div class="col-xs-3">
            <select id="c_codconsig" name="c_codconsig"  class="form-control input-sm select2" onChange="cambiarconsig()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>" ><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input name="c_nomconsig" id="c_nomconsig" class="form-control input-sm"  type="hidden" value=""   />
        </div>
        <label class="control-label col-xs-2">N° BL master </label>
        <div class="col-xs-2">
            <input type="text" name="c_nblmaster" id="c_nblmaster"  class="form-control input-sm" value="" placeholder="Numero BL master"  />
        </div>
    </div>
    <!--fila 3-->
    <div class="form-group">
        <label class="control-label col-xs-2">N° BL hijo</label>
        <div class="col-xs-2">
            <input type="text" name="c_nblhijo" id="c_nblhijo"  class="form-control input-sm" value="" placeholder="Numero BL hijo"  />
        </div>
        <label class="control-label col-xs-2">Linea Maritima</label>
        <div class="col-xs-3">
            <select id="c_idlinemar" name="c_idlinemar" class="form-control input-sm select2" onChange="cambiarlineaimpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarLineaMaritima=$this->model->ListarLineaMaritima();
                foreach ($ListarLineaMaritima as $lineamar){
                    ?>
                    <option value="<?php echo $lineamar->Lin_Codi; ?>"><?php echo utf8_encode($lineamar->Lin_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomlineamar"  id="c_nomlineamar" class="form-control input-sm" placeholder="Nombre" value=""/>
        </div>
    </div>
    <!--fila 4-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec Pago MBL </label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagblm" id="d_fecpagblm"  class="form-control input-sm" placeholder="Fecha Pago MBL"   />
        </div>
        <label class="control-label col-xs-2">Fec Pago HBL</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecpagblh" id="d_fecpagblh"  class="form-control input-sm" placeholder="Fecha Pago HBL"  />
        </div>
    </div>
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Nave</label>
        <div class="col-xs-2">
            
            <select id="c_idnave" name="c_idnave"  class="form-control input-sm select2" onChange="cambiarnaveimpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarNaves=$this->model->ListarNaves();
                foreach ($ListarNaves as $nave){
                    ?>
                    <option value="<?php echo $nave->Nav_Codi; ?>"><?php echo utf8_encode($nave->Nav_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="c_nomnave" id="c_nomnave"  class="form-control input-sm" value="" placeholder="Nombre"   />
        </div>
        <label class="control-label col-xs-2">N°viaje</label>
        <div class="col-xs-1">
            <input type="text" name="n_numviaje" id="n_numviaje"  class="form-control input-sm" value="" placeholder="N° Viaje" onkeypress="return validaEntero(event)"   />
        </div>
        <label class="control-label col-xs-1">Fec ETD Origen </label>
        <div class="col-xs-2">
            <input type="text" name="d_fecetdorig" id="d_fecetdorig"  class="form-control input-sm" value=""  />
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec ETA Callao</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecetdodest" id="d_fecetdodest"  class="form-control input-sm" value="" />
        </div>

        <label class="control-label col-xs-2">N° manifiesto</label>
        <div class="col-xs-1">
            <input type="text" name="c_nummanifiesto"  id="c_nummanifiesto" class="form-control input-sm" value=""/>
        </div>
        <label class="control-label col-xs-1">Fec HBL</label>
        <div class="col-xs-2">
            <input type="text" name="d_fectransblm" id="d_fectransblm"  class="form-control input-sm" placeholder="Fecha Transmision" />
        </div>
    </div>
    <!--fin fila 6-->
</div>