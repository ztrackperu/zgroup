<!-- Datos Aduana Tab Content-->
<div id="aduexpo" class="tab-pane fade" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 15-->
    <div class="form-group">
        <label class="control-label col-xs-2">Agente Maritimo</label>
        <div class="col-xs-2">
            <select id="Ec_codagemari" name="Ec_codagemari"  class="form-control input-sm select2" onChange="cambiaragemari()">
                <option value="">SELECCIONE</option>
                <?php
                $ListarEntidades=$this->model->ListarEntidades();
                foreach ($ListarEntidades as $enti){
                    ?>
                    <option value="<?php echo $enti->Ent_Codi; ?>"><?php echo utf8_encode($enti->Ent_Rsoc); ?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="Ec_nomagemari" id="Ec_nomagemari" placeholder="Nombre" value=""   />
        </div>

        <label class="control-label col-xs-1">Fec Pago de VB</label>
        <div class="col-xs-2">
            <input type="text" name="Ed_fecpagvb"  id="Ed_fecpagvb" class="form-control input-sm" placeholder="Fecha Pago de VB"   />
        </div>
        <label class="control-label col-xs-1">Fec Recepcion</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecrecpfac" id="d_fecrecpfac"  class="form-control input-sm" placeholder="FR Fact. Comercial"  />
        </div>
    </div>
    <!--fin fila 15-->
    <!--fila16 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Fec Entrega</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecentread" id="d_fecentread"  class="form-control input-sm" placeholder="FE Ag. Aduana"  />
        </div>
        <label class="control-label col-xs-1">Observacion</label>
        <div class="col-xs-2">
            <input type="text" name="Ec_observacion" id="Ec_observacion"  class="form-control input-sm" placeholder="Observacion"  />
        </div>


    </div>
    <!--fin fila 16-->
</div>