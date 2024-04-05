<form id="report_user_vendor_form" class="form-horizontal">
  <div class="row">
    <div class="col-md-4">
      <label for="vendedor">Vendedor</label>
      <select name="vendedor" id="vendedor" class="form-control select2">
        <option value="">-- Seleccione --</option>
        <?php
        if(isset($vendedores)) :
            foreach($vendedores as $vendedor):
        ?>
          <option value="<?= $vendedor->c_login; ?>"><?= $vendedor->c_nombre; ?></option>
        <?php
            endforeach;
        endif;
        ?>
      </select>
    </div>
    <div class="col-md-4">
      <label for="estado">Estado</label>
      <select name="estado" id="estado" class="form-control select2">
        <option value="">-- Seleccione --</option>
        <option value="0">Generado</option>
        <option value="1">Aprobado</option>
        <option value="2">Pre-Aprobado</option>
        <option value="3" selected>Facturado</option>
      </select>
    </div>
    <div class="col-md-4">
      <label for="tipo">Tipo de Cotización</label>
      <select name="tipo" id="tipo" class="form-control select2">
        <option value="">-- Seleccione --</option>
        <option value="001">Venta de Productos</option>
        <option value="002">Venta de Servicios-Flete</option>
        <option value="015">Venta de Servicios-MTTO.</option>
        <option value="017">Venta de Servicios-Alquiler</option>
        <option value="019">Venta de Servicios-Otros</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <label for="finicio">F. Inicio</label>
      <input id="finicio" name="finicio" value="01/01/<?= date('Y')?>" type="text" class="form-control">
      </select>
    </div>
    <div class="col-md-4">
      <label for="ffin">F. Fin</label>
      <input id="ffin" name="ffin" type="text" value="<?= date('d/m/Y')?>" class="form-control">
    </div>
    <div class="col-md-4">
      <label for="tmoneda">Tipo Moneda</label>
      <select id="tmoneda" name="tmoneda" class="form-control select2">
        <option value="">-- SELECCIONE --</option>
        <option value="0">Soles</option>
        <option value="1">Dolares</option>
      </select>
    </div>
  </div>
  <div class="row" style="margin-top:15px;text-align: center;">
    <div class="col-md-12">
      <button class="btn btn-primary" id="searchVentasBtn">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        Buscar
      </button>
    </div>
  </div>
</form>