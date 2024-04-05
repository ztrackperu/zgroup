<!-- CONTENIDO PANEL CARRETAS/PLATAFORMAS -->
<?php if($tipo=='004' || $tipo=='005' || $tipo=='000' ): ?>
<div role="tabpanel"  id="carretas" class="tab-pane active">
  <div class="form-group">
    <label class="control-label col-xs-2"></label>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Nombre del Producto</label>
    <div class="col-xs-3">
      <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre"
        readonly />
    </div>

    <label class="control-label col-xs-1">Serie</label>
    <div class="col-xs-2">
      <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie"
        readonly />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Año de Fabric.</label>
    <div class="col-xs-2">
      <select name="Cc_anno" id="Cc_anno" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>            		
        <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
        <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Mes de Fabric.</label>
    <div class="col-xs-2">
      <select name="Cc_mes" id="Cc_mes" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option> 
        <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
        <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-1">Fabricante</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_cfabri" id="Cc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm" placeholder="fabricante"
        data-validacion-tipo="requerido" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Color</label>
    <div class="col-xs-2">
      <select name="Cc_codcol" id="Cc_codcol" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
        <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Tamaño</label>
    <div class="col-xs-2">
      <select name="c_tamCarreta" id="c_tamCarreta" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->TamanoCarreta() as $tam):	 ?>                                   
        <option value="<?php echo $tam->C_NUMITM; ?>" <?php echo $equi->c_tamCarreta == $tam->C_NUMITM ? 'selected' : ''; ?> > <?php echo $tam->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-1">Marca.</label>
    <div class="col-xs-2">
      <select name="Cc_codmar" id="Cc_codmar" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListaMarcaCarreta() as $m):	 ?>                                   
        <option value="<?php echo $m->C_NUMITM; ?>" <?php echo $equi->c_codmar == $m->C_NUMITM ? 'selected' : ''; ?> > <?php echo $m->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Procedencia</label>
    <div class="col-xs-2">
      <!--<input type="text" name="Cc_procedencia" id="Cc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
      <select name="Cc_procedencia" id="Cc_procedencia" class="form-control input-sm"> 
    <option value="SELECCIONE">SELECCIONE</option>
      <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
      <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
      <?php  endforeach;	 ?>
    </select>
    </div>

    <label class="control-label col-xs-2">Modelo</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_cmodel" id="Cc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm" placeholder="Modelo"
        data-validacion-tipo="requerido" />
    </div>

    <label class="control-label col-xs-1">Serie VIN</label>
    <div class="col-xs-2">
      <input type="text" name="c_vin" id="c_vin" value="<?php echo $equi->c_vin; ?>" class="form-control input-sm" placeholder="Serie VIN"
        data-validacion-tipo="requerido" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">N° de Ejes</label>
    <div class="col-xs-2">
      <select name="c_nroejes" id="c_nroejes" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->EjesCarreta() as $eje):	 ?>                                   
        <option value="<?php echo $eje->C_NUMITM; ?>" <?php echo $equi->c_nroejes == $eje->C_NUMITM ? 'selected' : ''; ?> > <?php echo $eje->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Tara(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_tara" id="Cc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara"
        data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
    </div>
    <label class="control-label col-xs-1">Peso(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_peso" id="Cc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso"
        data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
    </div>
  </div>
  <hr>
  <input type="hidden" name="Cc_codsit" id="Cc_codsit" value="<?php echo $equi->c_codsit; ?>" class="form-control input-sm" placeholder="peso">
  <input type="hidden" name="Cc_codsitalm" id="Cc_codsitalm" value="<?php echo $equi->c_codsitalm; ?>" class="form-control input-sm" placeholder="peso">
  <div class="form-group" id="oculto">
    <label class="control-label col-xs-2">Estado</label>
    <div class="col-xs-2">
      <select name="Cc_codsitxx" id="Cc_codsitxx" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>

    <label class="control-label col-xs-2">Estado Almacen</label>
    <div class="col-xs-2">
      <select name="Cc_codsitalmxx" id="Cc_codsitalmxx" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
        <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
        <?php  endforeach;	 ?>       
      </select>
    </div>

  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Referencia</label>
    <div class="col-xs-2">
      <select name="Cc_nacional" id="Cc_nacional" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
        <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
      </select>
    </div>
    <label class="control-label col-xs-2">N° Dua</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_refnaci" id="Cc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm dua-format"
        placeholder="000-0000-00-000000-00-0-00" data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">Fecha</label>
    <div class="col-xs-2">
      <input type="text" name="Cc_fecnac" id="Cc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm" placeholder="dia/mes/año"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Proveedor</label>
    <div class="col-xs-2">
      <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
</div>
<?php endif;?>