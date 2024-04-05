<div class="modal fade" id="agregarModuloModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Modulo</h4>
      </div>
      <div class="modal-body">
        <form id="agregarModuloForm" class="form-horizontal">
          <div class="form-group">
            <label for="nombre" class="col-sm-4 control-label">Nombre de Modulo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nombre" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label for="controlador" class="col-sm-4 control-label">Controlador</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="controlador" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="funcion" class="col-sm-4 control-label">Función</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="funcion" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="url" class="col-sm-4 control-label">URL</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="url" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="tab" class="col-sm-4 control-label">Abrir en nueva pestaña</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="tab" name="tab">
                <option value="1">Sí</option>
                <option value="0" selected>No</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="padre" class="col-sm-4 control-label">Modulo Padre</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="padre" name="padre">
                <option>Seleccione</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="mostrar" class="col-sm-4 control-label">Visible en Menu</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="mostrar" name="mostrar">
                <option value="1" selected>Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <!-- <input type="checkbox" name="my-checkbox" class="checkbox-switch" data-size="mini"> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" id="save-agregar-modulo">Crear</button>
      </div>
    </div>
  </div>
</div>