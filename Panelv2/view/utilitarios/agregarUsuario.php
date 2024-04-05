<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Modulo</h4>
      </div>
      <div class="modal-body">
        <form id="agregarModuloForm" class="form-horizontal">
          <div class="form-group">
            <label for="nombre" class="col-sm-4 control-label">D.N.I.</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nombre" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label for="controlador" class="col-sm-4 control-label">USUARIO/Login</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="controlador" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="mostrar" class="col-sm-4 control-label">Contraseña</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="mostrar" name="mostrar">
                <option value="1" selected>Sí</option>
                <option value="0">No</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="funcion" class="col-sm-4 control-label">Apellido Paterno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="funcion" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="url" class="col-sm-4 control-label">Apellido Materno</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="url" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="padre" class="col-sm-4 control-label">Nombres</label>
            <div class="col-sm-8">
              <select class="select2 form-control" id="padre" name="padre">
                <option>Seleccione</option>
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