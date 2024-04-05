<div role="tabpanel" id="cabecera" class="tab-pane active">
  <div class="form-group">
    <label class="control-label col-xs-1"></label>
  </div>
  <!--fila 1-->
  <div class="form-group">
    <label class="control-label col-xs-1">Tipo Reg.</label>
    <div class="col-xs-2">
      <input type="text" name="c_motivo" id="c_motivo" value="CON Nº GUIA" class="form-control input-sm" readonly="readonly" />
      <input type="hidden" name="c_numeoc" id="c_numeoc" value="0" />
      <input type="hidden" name="udni" id="udni" value="<?php echo $_REQUEST["udni"]?>" />
    </div>
    <input type="hidden" name="item" id="item" value="<?php echo $_GET['item'] ?>" />
    <label class="control-label col-xs-2">Nº de Guia</label>
    <div class="col-xs-2">
      <input type="text" name="c_numguia" id="c_numguia" value="<?php echo $listaEirSalGuia->c_numguia; ?>" class="form-control input-sm"
        readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Motivo </label>
    <div class="col-xs-2">
      <input type="text" name="c_motivo" id="c_motivo" value="Con Guia Remision" class="form-control input-sm" placeholder="Motivo"readonly="readonly" />
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
      <select name="xzc_tipoio" id="xzc_tipoio" class="form-control input-sm" disabled="disabled">
      <option value="0">SELECCIONE</option>
      <option value="1" >ENTRADA</option>
      <option value="2" selected="selected">SALIDA</option>
    </select>

    </div>
    <input name="c_tipoio" id="c_tipoio" type="hidden" value="2" />
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
      <input autocomplete="off" type="text" name="c_nomcli" id="c_nomcli" value="<?php echo $listaEirSalGuia->c_nomdes ?>" class="form-control input-sm" placeholder="Cliente" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Cod Cliente</label>
    <div class="col-xs-2">
      <input type="text" id="c_codcli" name="c_codcli" value="<?php echo $listaEirSalGuia->c_coddes ?>" class="form-control input-sm" placeholder="Codigo" readonly="readonly" />
    </div>
    <label class="control-label col-xs-1">Tipo Mov</label>
    <div class="col-xs-2">
      <select name="c_tipo" id="c_tipo" class="form-control input-sm">
      <option value="0">SELECCIONE</option>
      <option value="1" selected="selected">EMBARQUE</option>
      <option value="2" >DESCARGA</option>
    </select>
    </div>
  </div>
</div>