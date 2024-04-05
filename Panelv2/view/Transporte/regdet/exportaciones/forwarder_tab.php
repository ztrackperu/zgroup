<!-- Datos Forwarder Tab Content-->
<div id="fwexpo" class="tab-pane fade in active" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-2">Servicio</label>
        <div class="col-xs-1">
            <input type="text" style="width:80px;" name="EId_servicio" id="EId_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />
        </div>
        <label class="control-label col-xs-1">FW / Routing</label>
        <div class="col-xs-1">
            <input type="text" name="Ec_nrofw" id="Ec_nrofw" class="form-control input-sm"  value="<?php echo $c_nrofw; ?>" readonly  />
        </div>
        <label class="control-label col-xs-1">Booking</label>
        <div class="col-xs-2">
            <input type="text" name="c_nrobooking" id="c_nrobooking" class="form-control input-sm"  value=""/>
        </div>
        <label class="control-label col-xs-1">Embarcadero</label>
        <input type="hidden" name="c_idembar" id="c_idembar"  class="form-control input-sm"  value="" placeholder="Codigo" />
        <div class="col-xs-2">
            <input type="text" name="c_nomembar" id="c_nomembar"  class="form-control input-sm"  value="" placeholder="Nombre" />
        </div>

    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Cliente</label>
        <div class="col-xs-1">
            <input name="c_codclie" id="c_codclie" class="form-control input-sm"  type="text" value=""   />
        </div>
        <div class="col-xs-3">
            <input name="c_nomclie" id="c_nomclie" class="form-control input-sm"  type="text" value=""   />
        </div>
        <label class="control-label col-xs-2">Linea Maritima </label>
        <div class="col-xs-3">
            <select id="Ec_idlinemar" name="Ec_idlinemar"  class="js-example-basic-single select2 form-control input-sm" onChange="cambiarlineaexpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarLineaMaritima=$this->model->ListarLineaMaritima();
                foreach ($ListarLineaMaritima as $lineamar){
                    ?>
                    <option value="<?= $lineamar->Lin_Codi; ?>"><?= utf8_encode($lineamar->Lin_Desc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomlineamar" id="Ec_nomlineamar"  class="form-control input-sm" value=""  placeholder="Nombre"  />
        </div>
    </div>

    <!--fila 3-->
    <div class="form-group">
        <label class="control-label col-xs-2">Fecha de Zarpe</label>
        <div class="col-xs-2">
            <input type="text" name="d_feczarpe" id="d_feczarpe"  class="form-control input-sm" value="" placeholder="Fecha de Zarpe"  />
        </div>
        <label class="control-label col-xs-2">Nave</label>
        <div class="col-xs-2">
            <select id="Ec_idnave" name="Ec_idnave"  class="form-control input-sm select2" onChange="cambiarnaveexpo()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarNaves=$this->model->ListarNaves();
                foreach ($ListarNaves as $nave){?>
                    <option value="<?php echo $nave->Nav_Codi; ?>"><?php echo $nave->Nav_Desc; ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomnave" id="Ec_nomnave"  class="form-control input-sm" value="" placeholder="Nombre"/>
        </div>
        <label class="control-label col-xs-1">N° Viaje</label>
        <div class="col-xs-1">
            <input type="text" name="En_numviaje" id="En_numviaje"  class="form-control input-sm" value="" placeholder="N° Viaje"  />
        </div>
    </div>

</div>