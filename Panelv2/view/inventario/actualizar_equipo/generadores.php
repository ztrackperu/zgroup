<!-- CONTENIDO PANEL GENERADORES-->
<?php if($tipo=='003' ): ?>
<div role="tabpanel" id="generadores" class="tab-pane active">
  <div class="form-group">
    <label class="control-label col-xs-2"></label>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Nombre del Producto</label>
    <div class="col-xs-3">
      <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
    </div>
    <label class="control-label col-xs-1">Serie</label>
    <div class="col-xs-2">
      <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie" readonly />
	  <input type="hidden" name="c_nseriex" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie"  />
	</div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Año de Fabric.</label>
    <div class="col-xs-2">
      <select name="Gc_anno" id="Gc_anno" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>            		
        <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
        <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Mes de Fabric.</label>
    <div class="col-xs-2">
      <select name="Gc_mes" id="Gc_mes" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option> 
        <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
        <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-1">Fabricante</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_cfabri" id="Gc_cfabri" value="<?php echo $equi->c_cfabri; ?>" class="form-control input-sm" placeholder="fabricante"
        data-validacion-tipo="requerido" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Color</label>
    <div class="col-xs-2">
      <select name="Gc_codcol" id="Gc_codcol" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
        <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Serie Motor</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_seriemotor" id="Gc_seriemotor" value="<?php echo $equi->c_seriemotor; ?>" class="form-control input-sm"
        placeholder="Serie motor" data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">Marca</label>
    <div class="col-xs-2">
      <select name="Gc_codmar" id="Gc_codmar" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
        <option value="<?php echo $m->c_numitm; ?>" <?php echo $equi->c_codmar == $m->c_numitm ? 'selected' : ''; ?> > <?php echo $m->c_desitm; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Procedencia</label>
    <div class="col-xs-2">
      <?php /*?><input type="text" name="Gc_procedencia" id="Gc_procedencia" value="<?php echo $equi->c_procedencia; ?>"
        class="form-control input-sm" placeholder="Procedencia" data-validacion-tipo="requerido" />
      <?php */?>
      <select name="Gc_procedencia" id="Gc_procedencia" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
        <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Modelo</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_cmodel" id="Gc_cmodel" value="<?php echo $equi->c_cmodel; ?>" class="form-control input-sm" placeholder="Modelo"
        data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">N° Serial</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_serieequipo" id="Gc_serieequipo" value="<?php echo $equi->c_serieequipo; ?>" class="form-control input-sm"
        placeholder="Nro Serial" data-validacion-tipo="requerido" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Tara(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_tara" id="Gc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara"
        data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
    </div>
    <label class="control-label col-xs-2">Peso(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_peso" id="Gc_peso" value="<?php echo $equi->c_peso; ?>" class="form-control input-sm" placeholder="peso"
        data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
    </div>
  </div>
  
  
   <div class="form-group"><strong></strong>
    <label class="control-label col-xs-2">Serie Alternador</label>
    <div class="col-xs-2">
      <input type="text" name="Galternadorgenserie" id="Galternadorgenserie" value="<?php echo $equi->alternadorgenserie; ?>" class="form-control input-sm" placeholder="Serie Alternador"
        data-validacion-tipo="requerido"   />
    </div>
    <!--<label class="control-label col-xs-2">Serie Motor</label>
    <div class="col-xs-2">
    -->  <input type="hidden" name="Gmotorgenserie" id="Gmotorgenserie" value="<?php echo $equi->motorgenserie; ?>" class="form-control input-sm" placeholder="Serie Motor"
        data-validacion-tipo="requerido"  />
   <!-- </div>
    -->
     <label class="control-label col-xs-2">Serie Controlador</label>
    <div class="col-xs-2">
      <input type="text" name="Gcontroladorgenserie" id="Gcontroladorgenserie" value="<?php echo $equi->controladorgenserie; ?>" class="form-control input-sm" placeholder="Serie Controlador"
        data-validacion-tipo="requerido"  />
    </div>
    
    
  </div>
  <input type="hidden" name="Gc_codsit" id="Gc_codsit" value="<?php echo $equi->c_codsit; ?>" class="form-control input-sm" placeholder="peso">
  <input type="hidden" name="Gc_codsitalm" id="Gc_codsitalm" value="<?php echo $equi->c_codsitalm; ?>" class="form-control input-sm" placeholder="peso">
  
  <hr>
  <div class="form-group" id="oculto">
    <label class="control-label col-xs-2">Estado</label>
    <div class="col-xs-2">
      <select name="Gc_codsitxx" id="Gc_codsitxx" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
      </select>
    </div>
    <label class="control-label col-xs-2">Estado Almacen</label>
    <div class="col-xs-2">
      <select name="Gc_codsitalmxx" id="Gc_codsitalmxx" class="form-control input-sm">
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
      <select name="Gc_nacional" id="Gc_nacional" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
        <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
      </select>
    </div>
    <label class="control-label col-xs-2">N° Dua</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_refnaci" id="Gc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm dua-format" placeholder="000-0000-00-000000-00-0-00" data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">Fecha</label>
    <div class="col-xs-2">
      <input type="text" name="Gc_fecnac" id="Gc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm" placeholder="dia/mes/año"/>
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
  <br/>
  <?php
  require_once 'historial_equipo.php';
  ?>
</div>
<?php endif;?>