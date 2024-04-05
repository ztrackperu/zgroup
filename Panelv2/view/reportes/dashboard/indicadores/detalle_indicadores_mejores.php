<!-- Modal -->
<div class="modal fade" id="indicador-mejores-modal" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="indicador-mejores-modal-title"></h4>
      </div>
      <div class="modal-body indicador-mejores-modal-body">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#indicador-mejores-modal-tab1" class="indicador-mejores-modal-label1"></a></li>
          <li><a data-toggle="tab" href="#indicador-mejores-modal-tab2" class="indicador-mejores-modal-label2"></a></li>
          <li><a data-toggle="tab" href="#indicador-mejores-modal-tab3" class="indicador-mejores-modal-label3">Estadistica por Periodos</a></li>
        </ul>
        <div class="tab-content">
          <div id="indicador-mejores-modal-tab1" class="tab-pane fade in active">
            <table id="indicador-mejores-modal-table-cantidad" class="table table-bordered table-hover table-striped table-responsive" style="text-align:center;">
            </table>
          </div>
          <div id="indicador-mejores-modal-tab2" class="tab-pane fade">
            <table id="indicador-mejores-modal-table-monto" class="table table-bordered table-hover table-striped table-responsive" style="text-align:center;">
            </table>
          </div>
          <div id="indicador-mejores-modal-tab3" class="tab-pane fade">
            <canvas id="mejoresChart" width="600" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>