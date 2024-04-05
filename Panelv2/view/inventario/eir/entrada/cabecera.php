<div role="tabpanel" id="cabecera" class="tab-pane active">
  <div class="form-group">
    <label class="control-label col-xs-1"></label>
    <input type="hidden" name="c_sitalmAntes" id="c_sitalmAntes" value="<?php echo $_GET['c_sitalm']; ?>" />
  </div>
  <!--fila 1-->
  <div class="form-group">
    <label class="control-label col-xs-1">Tipo Reg.</label>
    <div class="col-xs-2">
      <input type="text" name="c_motivo" id="c_motivo" value="Con EIR Salida" class="form-control input-sm" readonly="readonly"/>
    </div>
    <label class="control-label col-xs-2">EIR Salida </label>
    <div class="col-xs-2">
      <input type="text" name="c_numeir" id="c_numeir" value="<?php echo $ObtenerDatos->c_numeir ?>" class="form-control input-sm"readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Nº de Guia</label>
    <div class="col-xs-2">
      <input type="text" name="c_numguia" id="c_numguia" value="<?php echo $ObtenerDatos->c_numguia ?>" class="form-control input-sm"readonly="readonly" />
    </div>
  </div>
  <!--fila 2-->
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
        <option value="1">VACIO</option>
        <option value="2">LLENO</option>
        <option value="3">FCL</option>
        <option value="4">LCL</option>
      </select>
    </div>
  </div>
  <!--fila 3-->
  <div class="form-group">
    <label class="control-label col-xs-1">Cliente</label>
    <div class="col-xs-3">
      <input autocomplete="off" type="text" name="c_nomcli" id="c_nomcli" value="<?php echo $ObtenerDatos->c_nomcli ?>" class="form-control input-sm" placeholder="Cliente" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Codigo</label>
    <div class="col-xs-2">
      <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $ObtenerDatos->c_codcli ?>" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />
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