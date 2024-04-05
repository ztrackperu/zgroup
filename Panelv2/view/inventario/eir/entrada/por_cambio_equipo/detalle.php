<div role="tabpanel" id="detalle" class="tab-pane">

  <div class="form-group">
    <label class="control-label col-xs-1"></label>
  </div>
  <!--fila 4-->
  <div class="form-group">
    <label class="control-label col-xs-1">Descripcion </label>
    <div class="col-xs-3">
      <!--<input autocomplete="off" type="text" name="c_codprd" id="c_codprd" value="" class="form-control input-sm" placeholder="Descripcion"/>  -->
      <input type="text" name="c_codprd" id="c_codprd" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" readonly
      />
      <input type="hidden" id="c_codprod" name="c_codprod" value="<?php echo $equi->IN_CODI; ?>" />
    </div>
    <label class="control-label col-xs-1">Codigo Equipo</label>
    <div class="col-xs-2">
      <input type="text" id="c_idequipo" name="c_idequipo" class="form-control input-sm" value="<?php echo $equi->c_idequipo; ?>"
        readonly="readonly" />

    </div>
    <label class="control-label col-xs-1">Estado Equipo</label>
    <div class="col-xs-2">
      <select name="c_sitalm" id="c_sitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo $est->c_numitm == 'M' ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
  <!--fila 5-->
  <div class="form-group">
    <label class="control-label col-xs-1">Condicion Equipo </label>
    <div class="col-xs-3">
      <select name="c_tipo2" id="c_tipo2" class="form-control input-sm">
    <option value="0">SELECCIONE</option>
    <option value="1">LIMPIO</option>
    <option value="2">SUCIO</option>
  </select>
    </div>
    <label class="control-label col-xs-1">Precinto Zgroup </label>
    <div class="col-xs-2">
      <input type="text" name="c_precinto" id="c_precinto" value="" class="form-control input-sm" placeholder="Precinto Zgroup"
      />
    </div>
    <label class="control-label col-xs-1">Precinto Cliente</label>
    <div class="col-xs-2">
      <input type="text" name="c_precintocli" id="c_precintocli" value="" class="form-control input-sm" placeholder="Precinto Cliente"
      />
    </div>
  </div>

</div>