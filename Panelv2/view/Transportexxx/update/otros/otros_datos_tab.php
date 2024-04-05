

<!--fila 1-->
<div class="form-group">
    <label class="control-label col-xs-2">Kilometraje Inicial</label>
    <div class="col-xs-2">
        <input type="text" name="c_kminicio" id="c_kminicio" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kminicio; ?>" placeholder="Kilometraje Inicial"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Kilometraje Final</label>
    <div class="col-xs-2">
        <input type="text" name="c_kmfin"  id="c_kmfin" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kmfin; ?>" placeholder="Kilometraje Final"  onBlur="calculokm()"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Kilometros Recorridos</label>
    <div class="col-xs-2">
        <input type="text" name="c_kmtotal" id="c_kmtotal"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_kmtotal; ?>" placeholder="Kilometros Recorridos" disabled  />
    </div>
</div>
<!--fila 1-->
<div class="form-group">
    <label class="control-label col-xs-2">Precinto Vacio</label>
    <div class="col-xs-2">
        <input type="text" name="c_precivacio" id="c_precivacio" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_precivacio; ?>" placeholder="Precinto Vacio"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Precinto Aduana</label>
    <div class="col-xs-2">
        <input type="text" name="c_preciaduana"  id="c_preciaduana" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_preciaduana; ?>" placeholder="Precinto Aduana"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Precinto Zgroup</label>
    <div class="col-xs-2">
        <input type="text" name="c_precizgroup" id="c_precizgroup"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_precizgroup; ?>" placeholder="Precinto Zgroup"  />
    </div>
</div>
<!--fila 2-->
<div class="form-group">
    <label class="control-label col-xs-2">Precinto Linea 1</label>
    <div class="col-xs-2">
        <input type="text" name="c_precilinea" id="c_precilinea"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_precilinea; ?>" placeholder="Precinto Linea 1"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Precinto Linea 2</label>
    <div class="col-xs-2">
        <input type="text" name="c_precilinea2"  id="c_precilinea2" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_precilinea2; ?>" placeholder="Precinto Linea 2"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Precinto Linea 3</label>
    <div class="col-xs-2">
        <input type="text" name="c_precilinea3" id="c_precilinea3"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_precilinea3; ?>" placeholder="Precinto Linea 3"  />
    </div>
</div>
<!--fila 3-->
<div class="form-group">
    <label class="control-label col-xs-2" >Cod. Termoreg.1</label>
    <div class="col-xs-2">
        <input type="text" name="c_codterm1"  id="c_codterm1" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_codterm1; ?>" placeholder="Cod. Termoregistrador 1"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Cod. Termoreg.2</label>
    <div class="col-xs-2">
        <input type="text" name="c_codterm2" id="c_codterm2"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_codterm2; ?>" placeholder="Cod. Termoregistrador 2"  />
    </div>
</div>
<!--fila 4-->
<div class="form-group">
    <label class="control-label col-xs-2">Temperatura</label>
    <div class="col-xs-2">
        <input type="text" name="c_temp" id="c_temp" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_temp; ?>" placeholder="Temperatura"  />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Ventilacion</label>
    <div class="col-xs-2">
        <input type="text" name="c_venti"  id="c_venti" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_venti; ?>" placeholder="Ventilacion"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Humedad</label>
    <div class="col-xs-2">
        <input type="text" name="c_humedad" id="c_humedad"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_humedad; ?>" placeholder="Humedad"  />
    </div>
</div>
<!--fila 5-->
<div class="form-group">
    <label class="control-label col-xs-2">%Oxigeno(O2)</label>
    <div class="col-xs-2">
        <input type="text" name="c_oxigeno" id="c_oxigeno" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_oxigeno; ?>" placeholder="%Oxigeno"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">%Diox.Carb.(CO2)</label>
    <div class="col-xs-2">
        <input type="text" name="c_dioxido"  id="c_dioxido" class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_dioxido; ?>" placeholder="%Dioxido de Carbono"   />
    </div>
    <label class="control-label col-xs-1" style="width:150px;">Codigo Purfresh</label>
    <div class="col-xs-2">
        <input type="text" name="c_codpurfresh" id="c_codpurfresh"  class="form-control input-sm" value="<?php echo $ListarDetalleUpd->c_codpurfresh; ?>" placeholder="Codigo Purfresh"  />
    </div>
</div>