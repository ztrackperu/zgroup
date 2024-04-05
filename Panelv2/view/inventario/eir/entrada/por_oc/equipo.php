<div role="tabpanel" id="equipo" class="tab-pane">
  <?php $tipo=$cod_tipo; ?>
  <div>
    <?php if($tipo=='001' || $tipo=='015' || $tipo=='016' ){ $valor='D';?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Año de Fabric.</label>
      <div class="col-xs-2">
        <select name="Dc_anno" id="Dc_anno" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>            		         		
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>" > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>

      <label class="control-label col-xs-2">Mes de Fabric.</label>
      <div class="col-xs-2">
        <select name="Dc_mes" id="Dc_mes" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Fabricante</label>
      <div class="col-xs-2">
        <input type="text" name="Dc_fabcaja" id="Dc_fabcaja" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-2">
        <select name="Dc_codcol" id="Dc_codcol" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>

      <label class="control-label col-xs-2">tipo de Material</label>
      <div class="col-xs-2">
        <select name="Dc_material" id="Dc_material" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
          <option value="<?php echo $mat->tm_codi; ?>"  > <?php echo $mat->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Dc_codmar" id="Dc_codmar" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaMarcaDry() as $mcaja):	 ?>                                   
          <option value="<?php echo $mcaja->C_NUMITM; ?>"  > <?php echo $mcaja->C_DESITM; ?> </option>
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
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Dc_tara" id="Dc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido"
          onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-1">Peso(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Dc_peso" id="Dc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido"
          onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Dc_codsit" id="Dc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>

      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Dc_codsitalm" id="Dc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Dc_nacional" id="Dc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Dc_refnaci" id="Dc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Dc_fecnac" id="Dc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor..</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>"  <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?>  > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

  </div>
  <!-- CONTENEDOR REFER  -->
  <div>
    <?php }else if($tipo=='002' || $tipo=='026'){ $valor='R';?>
    <div class="form-group">
      <label class="control-label col-xs-2"></label>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Nombre del Producto</label>
      <div class="col-xs-3">
        <input type="text" name="IN_ARTI" value="<?php echo $equi->IN_ARTI; ?>" class="form-control input-sm" placeholder="Nombre" readonly />
      </div>
      <label class="control-label col-xs-2">Serie</label>
      <div class="col-xs-2">
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>
    <hr>

    <div style="text-align:center;"><strong>DATOS DE CAJA</strong></div>
    <div class="form-group">
      <label class="control-label col-xs-2">Año Fabricacion</label>
      <div class="col-xs-3">
        <select name="Rc_anno" id="Rc_anno" class="form-control input-sm">            		
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <input type="hidden" name="c_canofab" id="c_canofab" value="">
      <input type="hidden" name="c_cmesfab" id="c_cmesfab" value="">
      <input type="hidden" name="c_mcamaq" id="c_mcamaq" value="">
      <input type="hidden" name="Rc_cmodel" id="Rc_cmodel" value="">      
      <input type="hidden" name="Rc_serieequipo" id="Rc_serieequipo" value="">
      <input type="hidden" name="c_ccontrola" id="c_ccontrola" value="">
      <input type="hidden" name="c_tipgas" id="c_tipgas" value="">
      <label class="control-label col-xs-2">Mes Fabricacion</label>
      <div class="col-xs-3">
        <select name="Rc_mes" id="Rc_mes" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
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
          <option value="<?php echo $mcaja->C_NUMITM; ?>"  > <?php echo $mcaja->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Fabricante</label>
      <div class="col-xs-3">
        <input type="text" name="Rc_fabcaja" id="Rc_fabcaja" class="form-control input-sm" placeholder="fabricante" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-3">
        <select name="Rc_codcol" id="Rc_codcol" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->ListarColorReefer() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Tipo Material</label>
      <div class="col-xs-3">
        <select name="Rc_material" id="Rc_material" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listamaterial() as $mat):	 ?>                                   
          <option value="<?php echo $mat->tm_codi; ?>"  > <?php echo $mat->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Procedencia</label>
      <div class="col-xs-3">                  
        <select name="Rc_procedencia" id="Rc_procedencia" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
    </div>
    <hr>

    <div class="form-group">
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-3">
        <input type="text" name="Rc_tara" id="Rc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido"
          onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-2">Peso(Kg)</label>
      <div class="col-xs-3">
        <input type="text" name="Rc_peso" id="Rc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido"
          onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-3">
        <select name="Rc_codsit" id="Rc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>

      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-3">
        <select name="Rc_codsitalm" id="Rc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-3">
        <select name="Rc_nacional" id="Rc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-3">
        <input type="text" name="Rc_refnaci" id="Rc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Fecha</label>
      <div class="col-xs-3">
        <input type="text" name="Rc_fecnac" id="Rc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-3">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>"  <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-xs-2">Altura de Piso</label>
      <div class="col-xs-3">
         <input type="text" name="alt_piso" id="alt_piso" class="form-control input-sm" placeholder="alt piso"  />
      </div>
	 <label class="control-label col-xs-2">Categoria</label>
      <div class="col-xs-3">
         <input type="text" name="categoria" id="categoria" class="form-control input-sm" placeholder="categoria A/B/C/D"  />
      </div>
    </div>
    <?php
    /*
    Vistas de asignacion de maquinas e historial de equipos
    */
    require_once realpath('./view/inventario/actualizar_equipo/asignar_maquina.php');
    require_once realpath('./view/inventario/actualizar_equipo/liberar_maquina.php');
    require_once realpath('./view/inventario/actualizar_equipo/maquinas_asignadas.php');
    require_once realpath('./view/inventario/actualizar_equipo/historial_maquinas_asignadas.php');
    require_once realpath('./view/inventario/actualizar_equipo/historial_equipo.php');
    ?>
  </div>
  <div>
    <?php  }else if($tipo=='003'){ $valor='G'; ?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-2">Año de Fabric.</label>
      <div class="col-xs-2">
        <select name="Gc_anno" id="Gc_anno" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>            		
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Mes de Fabric.</label>
      <div class="col-xs-2">
        <select name="Gc_mes" id="Gc_mes" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Fabricante</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_cfabri" id="Gc_cfabri" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-2">
        <select name="Gc_codcol" id="Gc_codcol" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Serie Motor</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_seriemotor" id="Gc_seriemotor" class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Gc_codmar" id="Gc_codmar" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
          <option value="<?php echo $m->c_numitm; ?>"  > <?php echo $m->c_desitm; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Procedencia</label>
      <div class="col-xs-2">                  
        <select name="Gc_procedencia" id="Gc_procedencia" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Modelo</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_cmodel" id="Gc_cmodel" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">N° Serial</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_serieequipo" id="Gc_serieequipo" class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_tara" id="Gc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-2">Peso(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_peso" id="Gc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
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

    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Gc_codsit" id="Gc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Gc_codsitalm" id="Gc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Gc_nacional" id="Gc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_refnaci" id="Gc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Gc_fecnac" id="Gc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?>  > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
  </div>

  <div>
    <?php }else  if($tipo=='004' || $tipo=='005'){ $valor='C'; ?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Año de Fabric.</label>
      <div class="col-xs-2">
        <select name="Cc_anno" id="Cc_anno" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>            		
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Mes de Fabric.</label>
      <div class="col-xs-2">
        <select name="Cc_mes" id="Cc_mes" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Fabricante</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_cfabri" id="Cc_cfabri" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-2">
        <select name="Cc_codcol" id="Cc_codcol" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Tamaño</label>
      <div class="col-xs-2">
        <select name="c_tamCarreta" id="c_tamCarreta" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->TamanoCarreta() as $tam):	 ?>                                   
          <option value="<?php echo $tam->C_NUMITM; ?>"  > <?php echo $tam->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Cc_codmar" id="Cc_codmar" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaMarcaCarreta() as $m):	 ?>                                   
          <option value="<?php echo $m->C_NUMITM; ?>"  > <?php echo $m->C_DESITM; ?> </option>
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
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>

      <label class="control-label col-xs-2">Modelo</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_cmodel" id="Cc_cmodel" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">Serie VIN</label>
      <div class="col-xs-2">
        <input type="text" name="c_vin" id="c_vin" class="form-control input-sm" placeholder="Serie VIN" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">N° de Ejes</label>
      <div class="col-xs-2">
        <select name="c_nroejes" id="c_nroejes" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->EjesCarreta() as $eje):	 ?>                                   
          <option value="<?php echo $eje->C_NUMITM; ?>"  > <?php echo $eje->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_tara" id="Cc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-1">Peso(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_peso" id="Cc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Cc_codsit" id="Cc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>

      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Cc_codsitalm" id="Cc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Cc_nacional" id="Cc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_refnaci" id="Cc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Cc_fecnac" id="Cc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?>  > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
  </div>
    <div>
    <?php  }else if($tipo=='030'){ $valor='K'; ?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Año de Fabric.</label>
      <div class="col-xs-2">
        <select name="Kc_anno" id="Kc_anno" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>            		
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Mes de Fabric.</label>
      <div class="col-xs-2">
        <select name="Kc_mes" id="Kc_mes" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Fabricante</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_cfabri" id="Kc_cfabri" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-2">
        <select name="Kc_codcol" id="Kc_codcol" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Nº IMEI </label>
      <div class="col-xs-2">
        <input type="text" name="Kc_seriemotor" id="Kc_seriemotor" class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Kc_codmar" id="Kc_codmar" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
            <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
            <option value="<?php echo $m->c_numitm; ?>"  > <?php echo $m->c_desitm; ?> </option>
            <?php  endforeach;	 ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Procedencia</label>
      <div class="col-xs-2">                  
        <select name="Kc_procedencia" id="Kc_procedencia" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Modelo</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_cmodel" id="Kc_cmodel" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">N° Serial</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_serieequipo" id="Kc_serieequipo" class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_tara" id="Kc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-2">Peso(Kg) max.</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_peso" id="Kc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Kc_codsit" id="Kc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Kc_codsitalm" id="Kc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Kc_nacional" id="Kc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_refnaci" id="Kc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Kc_fecnac" id="Kc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?>  > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
  </div>
  <!-- TRANSFORMADORES -->
  <div>
    <?php  }else if($tipo=='012'){ $valor='T'; ?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Año de Fabric.</label>
      <div class="col-xs-2">
        <select name="Tc_anno" id="Tc_anno" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>            		
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Mes de Fabric.</label>
      <div class="col-xs-2">
        <select name="Tc_mes" id="Tc_mes" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option> 
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>" > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Fabricante</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_cfabri" id="Tc_cfabri" class="form-control input-sm" placeholder="fabricante" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Color</label>
      <div class="col-xs-2">
        <select name="Tc_codcol" id="Tc_codcol" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarColor() as $c):	 ?>                                   
          <option value="<?php echo $c->C_NUMITM; ?>"  > <?php echo $c->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Serie Motor</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_seriemotor" id="Tc_seriemotor" class="form-control input-sm" placeholder="Serie motor" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Tc_codmar" id="Tc_codmar" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
            <?php foreach($this->maestro->Listamarcarefer() as $m):	 ?>                                   
            <option value="<?php echo $m->c_numitm; ?>"  > <?php echo $m->c_desitm; ?> </option>
            <?php  endforeach;	 ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Procedencia</label>
      <div class="col-xs-2">                  
        <select name="Tc_procedencia" id="Tc_procedencia" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Modelo</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_cmodel" id="Tc_cmodel" class="form-control input-sm" placeholder="Modelo" data-validacion-tipo="requerido"/>
      </div>
      <label class="control-label col-xs-1">N° Serial</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_serieequipo" id="Tc_serieequipo" class="form-control input-sm" placeholder="Nro Serial" data-validacion-tipo="requerido"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_tara" id="Tc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>
      <label class="control-label col-xs-2">Peso(Kg) max.</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_peso" id="Tc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Tc_codsit" id="Tc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Tc_codsitalm" id="Tc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Tc_nacional" id="Tc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_refnaci" id="Tc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Tc_fecnac" id="Tc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>" <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?>  > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
  </div>
  <!-- MAQUINA -->
  <div>
    <?php } else if($tipo=='021'){ $valor='M';?>
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
        <input type="text" name="c_nserie" id="c_nserie" value="<?php echo $serie; ?>" class="form-control input-sm" placeholder="Serie"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Año Fabricacion</label>
      <div class="col-xs-2">
        <select name="Mc_canofab" id="Mc_canofab" class="form-control input-sm">            		
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listaanno() as $a):	 ?>                                               
          <option value="<?php echo $a->tm_codi; ?>"  > <?php echo $a->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Mes Fabricacion</label>
      <div class="col-xs-2">
        <select name="Mc_cmesfab" id="Mc_cmesfab" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->listames() as $mes):	 ?>                                   
          <option value="<?php echo $mes->tm_codi; ?>"  > <?php echo $mes->tm_desc; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-1">Marca</label>
      <div class="col-xs-2">
        <select name="Mc_mcamaq" id="Mc_mcamaq" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaMarcaMaq() as $mmaq):	 ?>                                   
          <option value="<?php echo $mmaq->C_NUMITM; ?>"  > <?php echo $mmaq->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Modelo</label>
      <div class="col-xs-2">
        <select name="Mc_cmodel" id="Mc_cmodel" class="form-control input-sm">
          <option value="SELECCIONE">SELECCIONE</option>  
          <?php foreach($this->maestro->ListarModelo() as $modelo):	 ?>                                               
          <option value="<?php echo $modelo->C_NUMITM; ?>"   > <?php echo $modelo->C_DESITM; ?> </option>
          <?php  endforeach;	 ?>            
        </select>
      </div>
      <label class="control-label col-xs-2">N° Serial</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_serieequipo" id="Mc_serieequipo" class="form-control input-sm" placeholder="Nro Serial" />
      </div>
      <label class="control-label col-xs-1">Controlador</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_ccontrola" id="Mc_ccontrola" class="form-control input-sm" placeholder="Controlador" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-2">Procedencia</label>
      <div class="col-xs-2">
        <select name="Mc_procedencia" id="Mc_procedencia" class="form-control input-sm"> 
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListarPais() as $pais):	 ?>                                   
          <option value="<?php echo $pais->c_codigo; ?>"  > <?php echo strtoupper($pais->c_nombre); ?> </option>
          <?php  endforeach;	 ?>
        </select>
      </div>
      <label class="control-label col-xs-2">Tipo Gas Refrig.</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_tipgas" id="Mc_tipgas" class="form-control input-sm" placeholder="Tipo gas" />
      </div>
	  <label class="control-label col-xs-1">Serie AFAM</label>
      <div class="col-xs-2">
        <input type="text" name="Mafam" id="Mafam" class="form-control input-sm" placeholder="Serie Afam" />
      </div>
    </div>
	 <div class="form-group">
    <label class="control-label col-xs-2">Serie Compresor</label>
    <div class="col-xs-2">
      <input type="text" name="Mc_compresormaq" id="Mc_compresormaq"  class="form-control input-sm" placeholder="Serie Compresor"  />
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
				<option <?php echo $equi->tipocompresor == 2 ? 'selected' : ''; ?> value="0">RECIPROCANTE</option>
				
				
			</select>
    
		</div>
	
	
    
  </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Tara(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_tara" id="Mc_tara" class="form-control input-sm" placeholder="tara" data-validacion-tipo="requerido" onBlur="validaTara();" onkeypress="return validaDecimal(event)" />
      </div>

      <label class="control-label col-xs-2">Peso(Kg)</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_peso" id="Mc_peso" class="form-control input-sm" placeholder="peso" data-validacion-tipo="requerido" onBlur="validaPeso();" onkeypress="return validaDecimal(event)" />
      </div>
    </div>
    <hr>
    <div class="form-group">
      <label class="control-label col-xs-2">Estado</label>
      <div class="col-xs-2">
        <select name="Mc_codsit" id="Mc_codsit" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $est):	 ?>                                   
          <option value="<?php echo $est->c_numitm; ?>" <?php echo 'D' == $est->c_numitm ? 'selected' : ''; ?>  > <?php echo $est->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
      <label class="control-label col-xs-2">Estado Almacen</label>
      <div class="col-xs-2">
        <select name="Mc_codsitalm" id="Mc_codsitalm" class="form-control input-sm">
          <option value="">SELECCIONE</option>
          <?php foreach($this->maestro->Listaestadoequipo() as $estalm):	 ?>                                   
          <option value="<?php echo $estalm->c_numitm; ?>" <?php echo 'D' == $estalm->c_numitm ? 'selected' : ''; ?>  > <?php echo $estalm->c_desitm; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Referencia</label>
      <div class="col-xs-2">
        <select name="Mc_nacional" id="Mc_nacional" class="form-control input-sm" onChange="desabilitarDatosref()">
          <option value="">SELECCIONE</option>
          <option  value="1">Si</option>
          <option  value="0">No</option>
        </select>
      </div>
      <label class="control-label col-xs-2">N° Dua</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_refnaci" id="Mc_refnaci" class="form-control input-sm" placeholder="N° de dua" readonly="readonly"/>
      </div>
      <label class="control-label col-xs-1">Fecha</label>
      <div class="col-xs-2">
        <input type="text" name="Mc_fecnac" id="Mc_fecnac" class="form-control input-sm" placeholder="dia/mes/año" readonly="readonly"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-xs-2">Proveedor</label>
      <div class="col-xs-2">
        <select name="IN_CPRV" id="IN_CPRV" class="form-control input-sm" disabled>
          <option value="SELECCIONE">SELECCIONE</option>
          <?php foreach($this->maestro->ListaProveedor() as $prov):	 ?>                                   
          <option value="<?php echo $prov->PR_RUC; ?>"  <?php echo $prov->PR_RUC == $ObtenerDatos->c_coddes ? 'selected' : ''; ?> > <?php echo $prov->PR_RAZO; ?> </option>
          <?php  endforeach;	 ?>       
        </select>
      </div>
    </div>
    <?php  } ?> </div>
  <input type="hidden" name="valor" id="valor" value="<?php echo $valor; ?>" />
</div>