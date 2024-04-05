<div id="alertequipregularizar" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
      <div class="modal-body">
        <p class="alert alert-warning">
          Existen <?= $equipos_x_regularizar;?> contenedores o equipos por regularizar. <a href="indexinv.php?c=equi01&mod=<?=$_REQUEST['mod']?>&udni=<?=$_REQUEST['udni']?>&a=VerListadoEquiposPorNacionalizar" target="_blank">(Ver detalle)</a>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {
    //$('#alertequipregularizar').modal('show');
  });
</script>