<!-- Datos Documentos Tab Content-->
<div role="tabpanel" id="doc" class="tab-pane active" >

    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 1-->
    <div class="form-group">
        <label class="control-label col-xs-1">Cotizacion</label>
        <div class="col-xs-2">
            <input name="c_numped" id="c_numped" class="form-control input-sm"  type="text" value="<?php echo $c_numped; ?>" readonly  />
        </div>
        <label class="control-label col-xs-1">Servicio</label>
        <div class="col-xs-2">
            <input type="text" name="LId_servicio" id="LId_servicio"  class="form-control input-sm"  value="<?php echo $Id_servicio; ?>" readonly />
        </div>
        <label class="control-label col-xs-1">Guia Remision</label>
        <div class="col-xs-2">
            <input type="text" name="c_numguia" id="c_numguia"  class="form-control input-sm"  value="<?php echo $listarDetCoti->c_numguia; ?>" />
        </div>
		<label class="control-label col-xs-1">Fecha</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecguia"  id="d_fecguia" class="form-control input-sm"  placeholder="Fecha Guia"   />
        </div>

    </div>
    <!--fila 2-->
    <div class="form-group">
        <label class="control-label col-xs-2">Cliente</label>
        <div class="col-xs-3">
            <select id="clientelocal" name="clientelocal"  class="form-control input-sm select2" onChange="cambiarclientelocal();" >
                <option value="">SELECCIONE</option>
                <?php
                $ListarCliente=$this->model->ListarCliente();
                foreach ($ListarCliente as $cli){
                    ?>
                    <option value="<?php echo $cli->CC_NRUC; ?>" <?php if($cli->CC_NRUC==$listarDetCoti->CC_NRUC){?>selected<?php }?>><?php echo utf8_encode($cli->CC_RAZO); ?></option>
                <?php } ?>
            </select>
            <input name="Lc_nomclie" id="Lc_nomclie" class="form-control input-sm"  type="hidden" value="<?php echo utf8_encode($listarDetCoti->CC_RAZO); ?>"   />
        </div>
        <label class="control-label col-xs-1">RUC </label>
        <div class="col-xs-2">
            <input type="text" name="Lc_rucclie" id="Lc_rucclie"  class="form-control input-sm" value="<?php echo $listarDetCoti->CC_NRUC; ?>" placeholder="Numero de RUC"  />
        </div>
        <label class="control-label col-xs-1">Contacto </label>
        <div class="col-xs-2">
            <input type="text" name="Lc_contactocli" id="Lc_contactocli"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->CC_RESP); ?>" placeholder="Contacto"  />
        </div>

    </div>
    <hr>
    <!--fila3 -->
    <div class="form-group">

        <label class="control-label col-xs-2">Factura</label>
        <div class="col-xs-1">
            <input type="text" name="c_seriefac" id="c_seriefac"  class="form-control input-sm"  placeholder="Serie"  />
        </div>
        <div class="col-xs-2">
            <input type="text" name="c_numerofac" id="c_numerofac"  class="form-control input-sm"  placeholder="Numero"  />
        </div>
        <label class="control-label col-xs-1">Fecha</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecfac"  id="d_fecfac" class="form-control input-sm"  placeholder="Fecha Factura"   />
        </div>
    </div>
    <!--fin fila 3-->

</div>