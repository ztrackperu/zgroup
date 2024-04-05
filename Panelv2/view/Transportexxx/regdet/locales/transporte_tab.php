<!-- Datos Transporte Tab Content-->
<div role="tabpanel" id="translocal" class="tab-pane" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila 9-->
    <div class="form-group">
        <label class="control-label col-xs-2">Nº Transportation</label>
        <div class="col-xs-2">
            <input type="text" name="c_nrotransp" id="c_nrotransp"  class="form-control input-sm" placeholder="Nº Transportation" />
        </div>
        <label class="control-label col-xs-2">Guia Transp. lleno</label>
        <div class="col-xs-2">
            <input type="text" name="c_guiatranslleno" id="c_guiatranslleno"  class="form-control input-sm" placeholder="Guia Transportista lleno"   />
        </div>
        <label class="control-label col-xs-1">Fecha</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecguiatranslle"  id="d_fecguiatranslle" class="form-control input-sm"  placeholder="Fecha Guia T. lleno"   />
        </div>
    </div>
    <!--fin fila 9-->
    <!--fila 10-->
    <div class="form-group">
        <label class="control-label col-xs-2">Guia Transp. vacio</label>
        <div class="col-xs-2">
            <input type="text" name="c_guiatransvacio" id="c_guiatransvacio"  class="form-control input-sm" placeholder="Guia Transportista vacio"   />
        </div>
        <label class="control-label col-xs-2">Fecha</label>
        <div class="col-xs-2">
            <input type="text" name="d_fecguiatransva"  id="d_fecguiatransva" class="form-control input-sm"  placeholder="Fecha Guia T. vacio"   />
        </div>
    </div>
    <!--fin fila 10-->
    <!--fila 5-->
    <div class="form-group">
        <label class="control-label col-xs-2">Empresa Transporte </label>
        <div class="col-xs-2">
            <input autocomplete="off" type="text" name="c_nomtranspotel" id="c_nomtranspotel" value="" class="form-control input-sm" placeholder="Nombre o RUC"/>
            <input type="hidden" id="c_ructransportel" name="c_ructransportel" value=""  />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarEmpTrans();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Chofer </label>
        <div class="col-xs-2">
            <input type="text" name="c_choferl" id="c_choferl" value="" class="form-control input-sm" placeholder="Chofer" onFocus="abrirmodalTransl();" readonly />
        </div>
        <div class="col-xs-1">
            <button class="btn btn-success btn-sm" id="btn-agregar" type="button" onclick="agregarChoferl();">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
        <label class="control-label col-xs-1">Telefono </label>
        <div class="col-xs-2">
            <input type="text" style="width:100px;" name="c_telefonol" id="c_telefonol" value="" class="form-control input-sm" placeholder="Telefono"  />
        </div>
    </div>
    <!--fila 6-->
    <div class="form-group">
        <label class="control-label col-xs-2">Licencia Chofer</label>
        <div class="col-xs-2">
            <input type="text" name="c_licencil" id="c_licencil" value="" class="form-control input-sm" placeholder="Licencia" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Marca </label>
        <div class="col-xs-2">
            <input type="text" name="c_marcal" id="c_marcal" value="" class="form-control input-sm" placeholder="Marca" data-validacion-tipo="requerido" />
        </div>
        <label class="control-label col-xs-1">Placas</label>
        <div class="col-xs-2">
            <input type="text" name="c_placal" id="c_placal" class="form-control input-sm"  placeholder="Tracto" value="" data-validacion-tipo="requerido" />
        </div>
        <div class="col-xs-1">
            <input type="text" style="width:100px;" name="c_placa2l" id="c_placa2l" class="form-control input-sm"  placeholder="Carreta" value="" data-validacion-tipo="requerido" />
        </div>

    </div>
    <!--fila 10-->
    <!--fila 11-->
    <div class="form-group">
        <label class="control-label col-xs-2">Direccion Salida</label>
        <div class="col-xs-3">
            <input type="text" name="c_diresal" id="c_diresal"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->c_parti); ?>" placeholder="Direccion Salida"  />
        </div>
        <label class="control-label col-xs-2">Direccion Llegada</label>
        <div class="col-xs-3">
            <input type="text" name="c_direlle" id="c_direlle"  class="form-control input-sm" value="<?php echo utf8_encode($listarDetCoti->c_llega); ?>" placeholder="Direccion Llegada"  />
        </div>
    </div>
    <!--fila 12-->
    <div class="form-group">
        <label class="control-label col-xs-2">Observacion</label>
        <div class="col-xs-6">
            <input type="text" name="Lc_observacion" id="Lc_observacion"  class="form-control input-sm"  placeholder="Observacion"  />
        </div>
    </div>

</div>