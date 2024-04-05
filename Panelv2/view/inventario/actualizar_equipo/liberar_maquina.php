<!-- Modal para liberacion de maquina de equipo -->
<div id="liberar-maquina-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Liberar Maquina <div id="liberar-maquina-idequipo-asignado"></div></h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="liberar-maquina-id-equipo" value="">
            <input type="hidden" name="liberar-maquina-id-equipo-asignado" value="">
            <input type="hidden" name="liberar-maquina-fecha-registro" value="">
            <label for="liberar-maquina-observacion-liberar" class="col-xs-8">Observaciones</label>
            <input type="text" class="form-control" name="liberar-maquina-observacion-liberar" class="col-xs-8"/>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger liberar-maquina-confirmar">Confirmar</button>
      </div>
    </div>
  </div>
</div>