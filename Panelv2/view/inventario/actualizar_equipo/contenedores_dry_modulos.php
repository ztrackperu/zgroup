<!-- CONTENIDO PANEL CONTENEDORES DRY/MODULOS-->
<?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ):?>
<div role="tabpanel"  id="home" class="tab-pane active">
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
		<input type="hidden" name="c_nseriex" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie"  />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Año de Fabric.</label>
    <div class="col-xs-2">
      <select name="Dc_anno" id="Dc_anno" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>            		
        <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
        <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Mes de Fabric.</label>
    <div class="col-xs-2">
      <select name="Dc_mes" id="Dc_mes" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option> 
        <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
        <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-1">Fabricante</label>
    <div class="col-xs-2">
      <input type="text" name="Dc_fabcaja" id="Dc_fabcaja" value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm"
        placeholder="fabricante" data-validacion-tipo="requerido" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Color</label>
    <div class="col-xs-2">
      <select name="Dc_codcol" id="Dc_codcol" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
        <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">tipo de Material</label>
    <div class="col-xs-2">
      <select name="Dc_material" id="Dc_material" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
        <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-1">Marca</label>
    <div class="col-xs-2">
      <select name="Dc_codmar" id="Dc_codmar" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListaMarcaDry() as $mcaja):	 ?>                                   
        <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Procedencia</label>
    <div class="col-xs-2">
      <!-- <input type="text" name="Dc_procedencia" id="Dc_procedencia" value="<?php //echo $equi->c_procedencia; ?>" class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />-->
      <select name="Dc_procedencia" id="Dc_procedencia" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
        <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Tara(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Dc_tara" id="Dc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara"
        data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
    </div>

    <label class="control-label col-xs-1">Peso(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Dc_peso" id="Dc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso"
        data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
    </div>
  </div>
  <hr>
  <input type="hidden" name="Dc_codsit" id="Dc_codsit" value="<?php echo $equi->c_codsit; ?>" class="form-control input-sm" placeholder="peso">
  <input type="hidden" name="Dc_codsitalm" id="Dc_codsitalm" value="<?php echo $equi->c_codsitalm; ?>" class="form-control input-sm" placeholder="peso">
  <div class="form-group" id="oculto">
    <label class="control-label col-xs-2">Estado</label>
    <div class="col-xs-2">
      <select name="Dc_codsitxx" id="Dc_codsitxx" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>

    <label class="control-label col-xs-2">Estado Almacen</label>
    <div class="col-xs-2">
      <select name="Dc_codsitalmxx" id="Dc_codsitalmxx" class="form-control input-sm">
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
      <select name="Dc_nacional" id="Dc_nacional" class="form-control input-sm" onchange="desabilitarDatosref()">
        <option value="SELECCIONE">SELECCIONE</option>
        <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
        <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
      </select>
    </div>
    <label class="control-label col-xs-2">N° Dua</label>
    <div class="col-xs-2">
      <input type="text" name="Dc_refnaci" id="Dc_refnaci" value="<?php echo $equi->c_refnaci; ?>" <?php echo $equi->c_nacional == 0 ? 'readonly' : ''; ?> class="form-control input-sm dua-format" placeholder="000-0000-00-000000-00-0-00" />
    </div>

    <label class="control-label col-xs-1">Fecha</label>
    <div class="col-xs-2">
      <input type="text" name="Dc_fecnac" id="Dc_fecnac" value="<?php echo $equi->c_fecnac; ?>" <?php echo $equi->c_nacional == 0 ? 'readonly' : ''; ?> class="form-control input-sm" placeholder="dia/mes/año" />
    </div>
  </div>
<?php echo $equi->IN_CPRV ?>
  <div class="form-group">
    <label class="control-label col-xs-2">Proveedor</label>
    <div class="col-xs-2">
      <select name="DIN_CPRV" id="DIN_CPRV" class="form-control input-sm" >
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $equi->c_codanx == $prov->PR_RUC ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
  <br/>
  <?php
  require_once 'historial_equipo.php';
  ?>
</div>
<?php endif;?>