<!-- CONTENIDO PANEL MAQUINA REEFER -->
<?php if($tipo=='021' || $tipo=='022'): ?>
<div role="tabpanel" id="maquina" class="tab-pane active">
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

    <label class="control-label col-xs-2">Año Fabricacion</label>
    <div class="col-xs-2">
      <select name="Mc_canofab" id="Mc_canofab" class="select2 form-control input-sm">            		
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
        <option value="<?php echo $a->tm_codi; ?>" <?php echo $a->tm_codi == $equi->c_canofab ? 'selected' : ''; ?>  > <?php echo $a->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Mes Fabricacion</label>
    <div class="col-xs-2">
      <select name="Mc_cmesfab" id="Mc_cmesfab" class="select2 form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
        <option value="<?php echo $mes->tm_codi; ?>" <?php echo $mes->tm_codi == $equi->c_cmesfab ? 'selected' : ''; ?>  > <?php echo $mes->tm_desc; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-1">Marca</label>
    <div class="col-xs-2">
      <select name="Mc_mcamaq" id="Mc_mcamaq" class="select2 form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
        <option value="<?php echo $mmaq->C_NUMITM; ?>" <?php echo $mmaq->C_NUMITM == $equi->c_mcamaq ? 'selected' : ''; ?>  > <?php echo $mmaq->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Modelo..</label>
    <div class="col-xs-2">
      <select name="Mc_cmodel" id="Mc_cmodel" class="select2 form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>  
        <?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
        <option value="<?php echo $modelo->C_NUMITM; ?>"  <?php echo $modelo->C_NUMITM == $equi->c_cmodel ? 'selected' : ''; ?>  > <?php echo $modelo->C_DESITM; ?> </option>
        <?php  endforeach;	 ?>            
      </select>
    </div>

    <label class="control-label col-xs-2">N° Serial</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_serieequipo" id="Mc_serieequipo" value="<?php echo $equi->c_serieequipo ?>" class="form-control input-sm" placeholder="Nro Serial" />
    </div>

    <label class="control-label col-xs-1">Serie Controlador</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_ccontrola" id="Mc_ccontrola" value="<?php echo $equi->c_ccontrola ?>" class="form-control input-sm" placeholder="Controlador" />
    </div>

  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Procedencia</label>
    <div class="col-xs-2">
      <?php /*?><input type="text" name="Rc_procedencia" id="Rc_procedencia" value="<?php echo $equi->c_procedencia; ?>"
        class="form-control input-sm" placeholder="procedencia" data-validacion-tipo="requerido" />
      <?php */?>
      <select name="Mc_procedencia" id="Mc_procedencia" class="select2 form-control input-sm"> 
        <option value="SELECCIONE">SELECCIONE</option>
        <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
        <option value="<?php echo $pais->c_codigo; ?>" <?php echo $pais->c_codigo == $equi->c_procedencia ? 'selected' : ''; ?>  > <?php echo strtoupper($pais->c_nombre); ?> </option>
        <?php  endforeach;	 ?>
      </select>
    </div>

    <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_tipgas" id="Mc_tipgas" value="<?php echo $equi->c_tipgas ?>" class="form-control input-sm" placeholder="Tipo gas"/>
    </div>
	<label class="control-label col-xs-1">Serie Afam</label>
    <div class="col-xs-2">
      <input type="text" name="Mafam" id="Mafam" value="<?php echo $equi->afam ?>" class="form-control input-sm" placeholder="Serie Afam"/>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Tara(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_tara" id="Mc_tara" value="<?php echo $equi->c_tara ?>" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
    </div>

    <label class="control-label col-xs-2">Peso(Kg)</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_peso" id="Mc_peso" value="<?php echo $equi->c_peso ?>" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
    </div>
  </div>
  
  
  
  
  
     <div class="form-group">
    <label class="control-label col-xs-2">Serie Compresor</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_compresormaq" id="Mc_compresormaq" value="<?php echo $equi->c_compresormaq; ?>" class="form-control input-sm" placeholder="Serie Compresor"
        data-validacion-tipo="requerido"   />
    </div>

    
     <label class="control-label col-xs-2">Serie relay</label>
    <div class="col-xs-2">
      <input type="text" name="Mrelay" id="Mrelay" value="<?php echo $equi->relay; ?>" class="form-control input-sm" placeholder="Serie relay"
        data-validacion-tipo="requerido"  />
    </div>
		 <label class="control-label col-xs-1">Tipo Compresor</label>
		<div class="col-xs-2">
			<select name="Mtipocompresor" id="Mtipocompresor" class="form-control input-sm">
				<option <?php echo $equi->tipocompresor == ''? 'selected' : ''; ?> value="0">SELECCIONE</option>
				<option <?php echo $equi->tipocompresor == 1  ? 'selected' : ''; ?> value="1">SCROLL</option>
				<option <?php echo $equi->tipocompresor == 2 ? 'selected' : ''; ?> value="2">RECIPROCANTE</option>
				
				
			</select>
    
		</div>
	
	
    
  </div>
  
  
  
  <hr>
  <div class="form-group" id="oculto">
    <input type="hidden" id="Mc_codsit" name="Mc_codsit" value="<?= $equi->c_codsit;?>">
    <input type="hidden" id="Mc_codsitalm" name="Mc_codsitalm" value="<?= $equi->c_codsitalm;?>">
  </div>

  <div class="form-group">
    <label class="control-label col-xs-2">Referencia</label>
    <div class="col-xs-2">
      <select name="Mc_nacional" id="Mc_nacional" class="form-control input-sm">
        <option value="SELECCIONE">SELECCIONE</option>
        <option <?php echo $equi->c_nacional == 1  ? 'selected' : ''; ?> value="1">Si</option>
        <option <?php echo $equi->c_nacional == 0 ||$equi->c_nacional == ''? 'selected' : ''; ?> value="0">No</option>
      </select>
    </div>
    <label class="control-label col-xs-2">N° Dua</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_refnaci" id="Mc_refnaci" value="<?php echo $equi->c_refnaci; ?>" class="form-control input-sm dua-format" placeholder="000-0000-00-000000-00-0-00" data-validacion-tipo="requerido" />
    </div>
    <label class="control-label col-xs-1">Fecha</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_fecnac" id="Mc_fecnac" value="<?php echo $equi->c_fecnac; ?>" class="form-control input-sm" placeholder="dia/mes/año"/>
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
    <label class="control-label col-xs-2">Contenedor Asignado</label>
    <div class="col-xs-2">
    <?php 
      $contenedor_asignado = $this->maestroinv->getDatosMaquinasAsignadas(['id_equipo_asignado'=>$equi->c_idequipo]);
      $cod_contenedor_asignado = 'Sin contenedor asignado';
      if(!$contenedor_asignado['error']){
        $contenedor_asignado = $contenedor_asignado['data'];
        if(!empty($contenedor_asignado)){
          $cod_contenedor_asignado = $contenedor_asignado[0]['id_equipo'];
          $cod_contenedor_asignado = '<a href="indexinv.php?c=inv01&a=Editar&id='.$cod_contenedor_asignado.'&cod_tipo=002&udni='.$udni.'&mod='.$_GET['mod'].'" target="_blank">'.$cod_contenedor_asignado.'</a>';
        }
      }
    ?>
      <p><?=$cod_contenedor_asignado;?></p>
    </div>
  </div>
  <?php
  require_once 'inspection_maquina.php';
  require_once 'historial_equipo.php';
  require_once 'historial_contenedor_asignado.php';
  ?>
</div>
<?php endif;?>