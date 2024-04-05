<div class="modal fade" id="editarModuloModal" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Modulo</h4>
      </div>
      <div class="modal-body">
        <form id="editarModuloForm" class="form-horizontal">
          <input type="hidden" name="edit_id" value="">
          <div class="form-group">
            <label for="edit_nombre" class="col-sm-4 control-label">Nombre de Modulo</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="edit_nombre" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_controlador" class="col-sm-4 control-label">Controlador</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="edit_controlador" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_funcion" class="col-sm-4 control-label">Función</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="edit_funcion" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="edit_url" class="col-sm-4 control-label">URL</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="edit_url" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="tab" class="col-sm-4 control-label">Abrir en nueva pestaña</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="tab" name="tab">
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_padre" class="col-sm-4 control-label">Modulo Padre</label>
            <div class="col-sm-8">
              <select class="select2 form-control" name="edit_padre">
                <option>Seleccione</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_mostrar" class="col-sm-4 control-label">Visible en Menu</label>
            <div class="col-sm-8">
              <select class="select2 form-control" name="edit_mostrar">
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="edit_activo" class="col-sm-4 control-label">Modulo Activo</label>
            <div class="col-sm-8">
              <select class="select2 form-control" name="edit_activo">
                <option value="1">Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="save-editar-modulo">Guardar Edición</button>
      </div>
    </div>
  </div>
</div>