<!-- CONTENIDO PANEL CONTENEDORES REEFER -->
<?php if($tipo=='002' || $tipo=='026' || $tipo=='022' ):?>
<div role="tabpanel" id="profile" class="tab-pane active">
  <div class="form-group">
    <input type="hidden" id="IN_CPRV" name="IN_CPRV" value="<?=$equi->IN_CPRV;?>"/>
    <input type="hidden" id="Rc_refnaci" name="Rc_refnaci" value="<?=$equi->c_refnaci;?>"/>
    <input type="hidden" id="c_tipgas" name="c_tipgas" value="<?=$equi->c_tipgas;?>"/>
    <input type="hidden" id="c_ccontrola" name="c_ccontrola" value="<?=$equi->c_ccontrola;?>"/>
    <input type="hidden" id="Rc_serieequipo" name="Rc_serieequipo" value="<?=$equi->c_serieequipo;?>"/>
    <input type="hidden" id="Rc_cmodel" name="Rc_cmodel" value="<?=$equi->c_cmodel;?>"/>
    <input type="hidden" id="Rc_nacional" name="Rc_nacional" value="<?=$equi->c_nacional;?>"/>
    <input type="hidden" id="c_mcamaq" name="c_mcamaq" value="<?=$equi->c_mcamaq;?>"/>
    <input type="hidden" id="c_cmesfab" name="c_cmesfab" value="<?=$equi->c_cmesfab;?>"/>
    <input type="hidden" id="c_canofab" name="c_canofab" value="<?=$equi->c_canofab;?>"/>
    <label class="control-label col-xs-2"></label>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Nombre del Producto.</label>
    <div class="col-xs-3">
      <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
    </div>
    <label class="control-label col-xs-2">Serie</label>
    <div class="col-xs-2">
      <input type="text" name="c_nserie" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie"  />
	   <input type="hidden" name="c_nseriex" value="<?php echo $equi->c_nserie; ?>" class="form-control input-sm" placeholder="Serie"  />
    </div>
  </div>
  <hr/>
  <div style="text-align:center;"><strong>DATOS DE CAJA</strong></div>
  <hr/>
  <div class="form-group">
    <label class="control-label col-xs-2">Año Fabricacion</label>
    <div class="col-xs-3">
      <select name="Rc_anno" id="Rc_anno" class="form-control input-sm">            		
        <option value="">SELECCIONE</option>
        <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
        <option value="<?php echo $a->tm_codi; ?>" <?php echo $equi->c_anno == $a->tm_codi ? 'selected' : ''; ?> > <?php echo $a->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Mes Fabricacion</label>
    <div class="col-xs-3">
      <select name="Rc_mes" id="Rc_mes" class="form-control input-sm"> 
        <option value="">SELECCIONE</option>
        <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
        <option value="<?php echo $mes->tm_codi; ?>" <?php echo $equi->c_mes == $mes->tm_codi ? 'selected' : ''; ?> > <?php echo $mes->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Marca Caja</label>
    <div class="col-xs-3">
      <select name="Rc_codmar" id="Rc_codmar" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListaMarcaCaja() as $mcaja):	 ?>                                   
        <option value="<?php echo $mcaja->C_NUMITM; ?>" <?php echo $equi->c_codmar == $mcaja->C_NUMITM ? 'selected' : ''; ?> > <?php echo $mcaja->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Fabricante</label>
    <div class="col-xs-3">
      <input type="text" name="Rc_fabcaja" id="Rc_fabcaja" value="<?php echo $equi->c_fabcaja; ?>" class="form-control input-sm"
        placeholder="fabricante" />
    </div>

  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Color</label>
    <div class="col-xs-3">
      <select name="Rc_codcol" id="Rc_codcol" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option> 
        <?php foreach($this->maestro->ListarColorReefer() as $c):	 ?>                                   
        <option value="<?php echo $c->C_NUMITM; ?>" <?php echo $equi->c_codcol == $c->C_NUMITM ? 'selected' : ''; ?> > <?php echo $c->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Tipo Material</label>
    <div class="col-xs-3">
      <select name="Rc_material" id="Rc_material" class="form-control input-sm"> 
        <option value="">SELECCIONE</option>
        <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
        <option value="<?php echo $mat->tm_codi; ?>" <?php echo $equi->c_material == $mat->tm_codi ? 'selected' : ''; ?> > <?php echo $mat->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Procedencia</label>
    <div class="col-xs-3">
      <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>"
        class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />
      <?php */?>
      <select name="Rc_procedencia" id="Rc_procedencia" class="form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
        <option value="<?php echo $pais->c_codigo; ?>" <?php echo $equi->c_procedencia == $pais->c_codigo ? 'selected' : ''; ?> > <?php echo strtoupper($pais->c_nombre); ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>
    <label class="control-label col-xs-2">Proveedor</label>
    <div class="col-xs-3">
      <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled >
        <option value="">SELECCIONE</option>
        <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
        <option value="<?= $prov->PR_RUC; ?>" <?= $equi->IN_CPRV == $prov->PR_RUC ? 'selected' : ''; ?> > <?= $prov->PR_RAZO; ?> </option>
        <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
  <hr>
   <input type="hidden" name="Rc_codsit" id="Rc_codsit" value="<?php echo $equi->c_codsit; ?>" class="form-control input-sm" placeholder="peso">
  <input type="hidden" name="Rc_codsitalm" id="Rc_codsitalm" value="<?php echo $equi->c_codsitalm; ?>" class="form-control input-sm" placeholder="peso">
  <div class="form-group" id="oculto">
    <label class="control-label col-xs-2">Estado</label>
    <div class="col-xs-3">
      <select name="Rc_codsitxx" id="Rc_codsitxx" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
        <option value="<?php echo $est->c_numitm; ?>" <?php echo $equi->c_codsit== $est->c_numitm ? 'selected' : ''; ?> > <?php echo $est->c_desitm; ?> </option>
        <?php  endforeach;	 ?>       
      </select>
    </div>
    <label class="control-label col-xs-2">Estado Almacen</label>
    <div class="col-xs-3">
      <select name="Rc_codsitalmxx" id="Rc_codsitalmxx" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
        <option value="<?php echo $estalm->c_numitm; ?>" <?php echo $equi->c_codsitalm == $estalm->c_numitm ? 'selected' : ''; ?> > <?php echo $estalm->c_desitm; ?> </option>
        <?php  endforeach;	 ?>       
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Tara(Kg)</label>
    <div class="col-xs-3">
      <input type="text" name="Rc_tara" id="Rc_tara" value="<?php echo $equi->c_tara; ?>" class="form-control input-sm" placeholder="tara"
        data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
    </div>
    <label class="control-label col-xs-2">Peso(Kg)</label>
    <div class="col-xs-3"> 
      <input name="Rc_peso" id="Rc_peso" value="<?=$equi->c_peso;?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onblur="validaPeso();" onkeypress="return validaDecimal(event)" type="text">
    </div>
  </div>
  <div class="form-group">
      <label class="control-label col-xs-2">Altura de Piso</label>
      <div class="col-xs-3">
        <input type="text" name="alt_piso" id="alt_piso" value="<?php echo $equi->alt_piso; ?>" class="form-control input-sm" placeholder="alt piso"  />
      </div>
	  	  	 <label class="control-label col-xs-2">Categoria</label>
      <div class="col-xs-3">
         <input type="text" name="categoria" id="categoria" value="<?php echo $equi->categoria; ?>" class="form-control input-sm" placeholder="categoria A/B/C/D"  />
      </div>
    </div>
  <div class="form-group">
  <?php
  if($equi->c_nacional == 1): $url = "?c=inv01&a=Editar&mod=".$_GET['mod']."&udni=".$udni."&id=";
  ?>
    <label href="<?PHP echo $url;?>" class="control-label col-xs-2 text-info"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Compra Internacional</label>
    <label class="control-label col-xs-2">N° Dua</label>
    <div class="col-xs-3">
      <input name="Rc_refnaci" id="Rc_refnaci" value="<?= $equi->c_refnaci; ?>" class="form-control input-sm dua-format" placeholder="xxx-xxxx-xx-xxxxxx-xx-x-xx" data-validacion-tipo="requerido" type="text">
    </div>
    <label class="control-label col-xs-2">Fecha de Naci.</label>
    <div class="col-xs-2">
      <input type="text" name="Rc_fecnac" id="Rc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm" placeholder="Dia/Mes/Año"/>
    </div>
  <?php
  else:
  ?>
    <label class="control-label col-xs-2 text-success"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Compra Local</label>
  <?php
  endif;
  ?>
  </div>
  <?php if($equi->c_fisico2 && $equi->c_fisico2 !=''):?>
  <div class="form-group">
    <label class="control-label col-xs-2">Observación de Inventario</label>
    <div class="col-xs-2">
      <p><?= $equi->c_fisico2;?></p>
    </div>
  </div>
  <?php endif;?>
  <br/>
  <?php
  require_once 'asignar_maquina.php';
  require_once 'liberar_maquina.php';
  require_once 'maquinas_asignadas.php';
  require_once 'historial_maquinas_asignadas.php';
  require_once 'historial_equipo.php';
  ?>
</div>
<?php endif;?>