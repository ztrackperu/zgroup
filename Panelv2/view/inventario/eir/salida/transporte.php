<div role="tabpanel" id="transporte" class="tab-pane">
  <div class="form-group">
    <label class="control-label col-xs-1"></label>
  </div>
  <!--fila 6-->
  <div class="form-group">
    <label class="control-label col-xs-1">Empresa </label>
    <div class="col-xs-3">
      <input autocomplete="off" type="text" name="transportista" id="transportista" value="<?php echo $listaEirSalGuia->c_nomtra ?>" class="form-control input-sm" placeholder="Empresa" />
      <input type="hidden" id="c_ructra" name="c_ructra" value="<?php echo $listaEirSalGuia->c_ructra ?>" />
    </div>
    <label class="control-label col-xs-1">Chofer </label>
    <div class="col-xs-2">
      <!--<input type="text" id="c_chofer" value="" class="form-control input-sm" placeholder="Chofer" data-validacion-tipo="requerido" />-->
      <input type="text" name="c_chofer" id="c_chofer" value="<?php echo utf8_encode($listaEirSalGuia->c_chofer) ?>" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTrans();" readonly />
    </div>
    <label class="control-label col-xs-1">Licencia</label>
    <div class="col-xs-2">
      <input type="text" id="c_licenci" name="c_licenci" value="<?php echo $listaEirSalGuia->c_licenci ?>" class="form-control input-sm" placeholder="Licencia" />
    </div>
  </div>
  <!--fila 7-->
  <div class="form-group">
    <label class="control-label col-xs-1">Fecha</label>
    <div class="col-xs-2">
      <input type="text" id="c_fechora" name="c_fechora" value="" class="form-control datepicker input-sm" placeholder="Fecha EIR"/>
    </div>
    <div class="col-xs-1">
      <input type="text" id="hora" name="hora" value="" class="form-control input-sm time-format" placeholder="Hora EIR" />
    </div>
    <label class="control-label col-xs-1">Placa Carreta </label>
    <div class="col-xs-2">
      <input type="text" id="c_placa2" name="c_placa2" value="<?php echo $listaEirSalGuia->c_placa2 ?>" class="form-control input-sm"
        placeholder="Placa Carreta" data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">Placa Tracto </label>
    <div class="col-xs-2">
      <input type="text" id="c_placa" name="c_placa" value="<?php echo $listaEirSalGuia->c_placa ?>" class="form-control input-sm" placeholder="Placa Tracto" data-validacion-tipo="requerido" />
      <input type="hidden" id="c_marca" name="c_marca" value="" />
      <!--Para evitar error en verChoferes.php (el mismo para regguia)-->
    </div>

  </div>
  <hr />
  <!--fila 8-->
  <div class="form-group">
    <label class="control-label col-xs-1">Tecnico</label>
    <div class="col-xs-3">
      <input type="text" id="c_nomtec" name="c_nomtec" value="" class="form-control input-sm" placeholder="Tecnico" />
    </div>
    <label class="control-label col-xs-1">Punto</label>
    <div class="col-xs-2">
      <select id="psalida" name="psalida" class="form-control input-sm">
          <option value="">[SALIDA]</option>
          <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
    <label class="control-label col-xs-1">Punto</label>
    <div class="col-xs-2">
      <select id="pllegada" name="pllegada" class="form-control input-sm">
          <option value="">[LLEGADA]</option>
          <?php foreach($this->maestro->ListaLugares() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>

    </div>
  </div>
  <!--fila 9-->
  <div class="form-group">
    <label class="control-label col-xs-1">Obs.EIR (*)</label>
    <div class="col-xs-3">
      <input type="text" id="c_obseir" name="c_obseir" value="" class="form-control input-sm" placeholder="Observacion EIR" />
    </div>
    <label class="control-label col-xs-1">Deposito</label>
    <div class="col-xs-2">
      <select name="c_depsal" id="c_depsal" class="form-control input-sm">
          <option value="">[SALIDA]</option>
          <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
    <label class="control-label col-xs-1">Deposito</label>
    <div class="col-xs-2">
      <select name="c_deping" id="c_deping" class="form-control input-sm">
          <option value="">[LLEGADA]</option>
          <?php foreach($this->model->ListaDepositos() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
  <!--fila 10-->
  <div class="form-group">
    <label class="control-label col-xs-1">Obs.Equipo</label>
    <div class="col-xs-3">
      <input type="text" id="c_obs" name="c_obs" value="" class="form-control input-sm" placeholder="Observacion Equipo" />
    </div>

    <label class="control-label col-xs-1">Puerto</label>
    <div class="col-xs-2">
      <select name="ptosalida" id="ptosalida" class="form-control input-sm">
          <option value="">[SALIDA]</option>
          <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
    <label class="control-label col-xs-1">Puerto</label>
    <div class="col-xs-2">
      <select name="ptollegada" id="ptollegada" class="form-control input-sm">
          <option value="">[LLEGADA]</option>
          <?php foreach($this->maestro->ListaPuertos() as $estaequi):	 ?>                                   
          <option value="<?php echo $estaequi->C_NUMITM; ?>"  > <?php echo utf8_encode($estaequi->C_DESITM); ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
</div>