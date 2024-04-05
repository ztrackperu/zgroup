<div role="tabpanel" id="permiso" class="tab-pane">
  <div class="form-group">
    <label class="control-label col-xs-2"></label>
  </div>
  <div class="form-group">
    <label class="control-label col-xs-2">Ingrese Clave</label>
    <div class="col-xs-2">
      <input type="text" name="clave" id="clave" value="" placeholder="Ingrese Clave" class="form-control input-sm" />
      <?php 
      $listaClaves=$this->maestro->ListaClavesMaestras();
      $c_clavemaes=$listaClaves->c_clavemaes;
      $c_clavesecu=$listaClaves->c_clavesecu;
      ?>
      <input type="hidden" name="c_clavemaes" id="c_clavemaes" value="<?php echo $c_clavemaes;?>" />
      <input type="hidden" name="c_clavesecu" id="c_clavesecu" value="<?php echo $c_clavesecu;?>" />
    </div>
  </div>
</div>