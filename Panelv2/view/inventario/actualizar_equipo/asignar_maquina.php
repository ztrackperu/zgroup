<hr/>
<!-- Boton Open Modal Asignar Maquina -->
<div class="container asignar-maquina-container">
  <button type="button" class="btn btn-success asignar-maquina-button">Asignar Máquina</button>
  <!-- Modal para la asignacion de maquina a equipo -->
  <div id="asignar-maquina-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Máquinas Disponibles..</h4>
		   <a target="_blank" class="btn btn-primary" href="?c=inv00&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerDetalleRegUpd&cod_tipo=021&descripcion=MAQUINA+REEFER">REGISTRAR MAQUINA</a>
        </div>
        <div class="modal-body">
          <div id="equiposDisponiblesLoadMSG" style="display:none;text-align:center;">
            <strong>Cargando...</strong>
          </div>
          <div id="equiposDisponiblesMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
          <table id="tablaEquiposDisponibles" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%" style="font-size: 0.8em; text-align:center;"></table>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal de mensaje de error de asignacion-->
  <div id="error-asignar-maquina-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error de Asignación de Maquina</h4>
        </div>
        <div class="modal-body">
          <div class="bg-danger text-danger" id="body-error-asignar-maquina-modal"></div>
        </div>
      </div>
    </div>
  </div>
</div>