<div role="tabpanel" id="cabecera" class="tab-pane active">
  <div class="form-group">
    <label class="control-label col-xs-1"></label>
    <!--datos notas-->
    <input type="hidden" name="c_codmon" id="c_codmon" value="<?php echo $ObtenerDatos->c_codmon ?>" class="form-control input-sm" readonly="readonly" />
    <input type="hidden" name="n_preprd" id="n_preprd" value="<?php echo $ObtenerDatos->n_preprd ?>" class="form-control input-sm" readonly="readonly" />
    <input type="hidden" name="n_item" id="n_item" value="<?php echo $ObtenerDatos->n_item ?>" class="form-control input-sm" readonly="readonly" />
    <?php
      $xfecha=$ObtenerDatos->d_fecoc;	
      $fecha=vfecha(substr($xfecha,0,10));
      $tipdia=$this->maestro->ListaTipoCambioDia($fecha);
      $tcambio=$tipdia->TC_VTA;	
      /*if($tipdia==NULL){
        $mes=date('m');						
        $tipmes=$this->maestro->ListaTipoCambioMes($mes);
        $tcambio=$tipmes->TC_VTA;						
      }*/
    ?>
    <input type="hidden" id="NT_TCAMB" name="NT_TCAMB" value="<?php echo $tcambio; ?>" class="form-control input-sm" />
  </div>
  <!--fila 0-->
  <div class="form-group">
    <label class="control-label col-xs-1">Tipo Reg.</label>
    <div class="col-xs-2">
      <input type="text" name="c_motivo" id="c_motivo" value="Con Orden de Compra" class="form-control input-sm" readonly="readonly"/>
    </div>
    <label class="control-label col-xs-2">Orden de Compra </label>
    <div class="col-xs-2">
      <input type="text" name="c_numeoc" id="c_numeoc" value="<?php echo $ObtenerDatos->c_numeoc ?>" class="form-control input-sm" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Fecha O/C</label>
    <div class="col-xs-2">
      <input type="text" name="d_fecoc" id="d_fecoc" value="<?php echo vfecha(substr($ObtenerDatos->d_fecoc,0,10)); ?>" class="form-control input-sm" readonly="readonly" />
    </div>
  </div>
  <!--fila 1-->
  <div class="form-group">
    <label class="control-label col-xs-1">Nro EIR</label>
    <div class="col-xs-2">
      <input type="text" class="form-control input-sm" placeholder="Nro autogenerado" readonly="readonly" />
    </div>
    <label class="control-label col-xs-2">Tipo Doc</label>
    <div class="col-xs-2">
      <select name="c_tipoio" id="c_tipoio" class="form-control input-sm" disabled="disabled">
      <option value="0">SELECCIONE</option>
      <option value="1" selected="selected">ENTRADA</option>
      <option value="2">SALIDA</option>
    </select>
    </div>
    <label class="control-label col-xs-1">Condicion </label>
    <div class="col-xs-2">
      <select name="c_condicion" id="c_condicion" class="form-control input-sm">
      <option value="">SELECCIONE</option>
      <option value="1" selected="selected">VACIO</option>
      <option value="2">LLENO</option>
      <option value="3">FCL</option>
      <option value="4">LCL</option>
    </select>
    </div>
  </div>
  <!--fila 2-->
  <div class="form-group">
    <label class="control-label col-xs-1">Proveedor.</label>
    <div class="col-xs-3">
      <input autocomplete="off" type="text" name="c_nomcli" id="c_nomcli" value="<?php echo $ObtenerDatos->c_nomdes ?>" class="form-control input-sm" placeholder="Cliente" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Codigo</label>
    <div class="col-xs-2">
      <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $ObtenerDatos->c_coddes ?>" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Tipo Mov</label>
    <div class="col-xs-2">
      <select name="c_tipo" id="c_tipo" class="form-control input-sm">
      <option value="0">SELECCIONE</option>
      <option value="1">EMBARQUE</option>
      <option value="2" selected="selected">DESCARGA</option>
    </select>
    </div>
  </div>
</div>