    <form class="form-horizontal" id="frmequipo" name="frmequipo">
        <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Equipos Disponibles</h4>
                    </div>
                    <div class="modal-body">
                        <table id="tabla" class="table table-hover" style="font-size:12px;">
                            <!--Contenido se encuentra en verEquiposDispoCoti.php-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>

<!-- Datos Equipo Tab Content-->
<div role="tabpanel" id="contenlocal" class="tab-pane active" >
    <div class="form-group">
        <label class="control-label col-xs-1"></label>
    </div>
    <!--fila7 -->
    <div class="form-group">
        <label class="control-label col-xs-2">Producto</label>
        <div class="col-xs-2">
             <select id="Lc_codtiprod" name="Lc_codtiprod"  class="form-control input-sm select2">
                <option value="">SELECCIONE</option>
                <?php
                $ListarTipoProducto=$this->model->ListarProd();
                foreach ($ListarTipoProducto as $tipprod){
                    ?>
                    <option value="<?php echo $tipprod->IN_CODI; ?>" ><?php echo utf8_encode($tipprod->IN_ARTI); ?></option>
                <?php } ?>
            </select>
        </div>
        <label class="control-label col-xs-3">Codigo de Equipo</label>
        <div class="col-xs-3">
            <input type="text" name="c_codequipo" id="c_codequipo"  class="form-control input-sm" onFocus="abrirmodalEqp()"/>
            <input type="hidden" name="c_codequipo2" id="c_codequipo2"  class="form-control input-sm" />
        </div>
    </div>
    <!--fin fila 8-->
    <div class="form-group">
        <label class="control-label col-xs-2">N° EIR Generador</label>
        <div class="col-xs-2">
            <input type="text" name="c_eirgen" id="c_eirgen"  class="form-control input-sm" value="" placeholder="N° EIR" disabled/>
        </div>
        <label class="control-label col-xs-2">Descripcion Gen.</label>
        <div class="col-xs-2">
            <input type="text" name="c_desgen" id="c_desgen"  class="form-control input-sm" value="" placeholder="Escriba el Codigo del Equipo" disabled/>
        </div>
        <label class="control-label col-xs-1">Generador</label>
        <div class="col-xs-2">
            <input type="text" name="c_numgen" id="c_numgen"  class="form-control input-sm" value="" placeholder="N° Generador"  disabled/>
        </div>
    </div>
    <!--fila9 -->

</div>
<script>
$(document).ready(function () {
$("#Lc_codtiprod").change(function(){
            //alert($('select[id=c_codmar2]').val());
			var combo=$('select[id=Lc_codtiprod]').val();
			alert(combo);
/* 	  if($(".listado-todos-equipos-container").length > 0){
    consultarTodosEquiposAJAX('consultarTodosEquipos',combo);
} */

})
function abrirmodalEqp() {
        $('#my_modal').modal('show');
        $('#tabla').load("?c=c03&a=verEquipos", {
            tipo: $('select[id=Lc_codtiprod]').val()
        });
    }


	
})
</script>