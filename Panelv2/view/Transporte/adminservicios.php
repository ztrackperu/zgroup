<script>	
function abrirmodal(Id_servicio, c_tipmov) {
  $('#my_modalelim').modal('show');
  $('#mensaje').val(Id_servicio);
  $('#c_tipmov').val(c_tipmov);
  //var idequi=document.getElementById('c_codprd').value;
  //document.frmequipo.codpro.value=idequi;				
  //document.write("IdAsig = " + IdAsig);
  //$('#tablaelim').load("?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=VerEliminarDetAsig",{Id_servicio:Id_servicio});	
}

function abrirmodalcerrar(Id_servicio) {
  $('#my_modalcerrar').modal('show');
  $('#mensaje3').val(Id_servicio);
}
</script>
<body>

  <!--modal de eliminacion de servicio de transporte-->
  <div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarTransporte">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="modal-body" id="exampleModalLabel">
            <h4 class="modal-title" id="exampleModalLabel">
              ¿Seguro de Eliminar el Servicio de Transporte N°
              <input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
              <input name="c_tipmov" id="c_tipmov" type="hidden" />
            </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--fin modal eliminacion de servicio de transporte-->

  <!--modal de cerrar servicio de transporte-->
  <div class="modal fade" id="my_modalcerrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=CerrarCabTransporte">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="modal-body" id="exampleModalLabel">
            <h4 class="modal-title" id="exampleModalLabel">
              ¿Seguro de Cerrar el Servicio de Transporte N°
              <input name="mensaje3" id="mensaje3" type="text" style="border: 0px solid #A8A8A8;width:90px;" readonly />?
              <input type="hidden" name="login" id="login" value="<?php echo $login ?>">
            </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--fin modal cerrar servicio de transporte-->
  <input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
  <input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">
  <div id="mainAdminServicioTecnico" class="container-fluid">
    <div class="panel panel-danger">
      <!-- Default panel contents -->
      <div class="panel-heading">ADMINISTRACION SERVICIO TECNICO</div>
      <div class="panel-body">
        <br/>
        <a class="btn btn-danger" href="?c=03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegServTecnicos">NUEVO SERVICIO TECNICO</a>
        <a class="btn btn-danger" href="?c=03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ReporteDetallado" target="_black">VER REPORTE DETALLADO</a>
        <br/>
        <div id="adminServTSummaryMSG" style="display:none;text-align:center;">
            Cargando...
            <br>
            <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
        </div>
        <div id="adminServTSummaryMSGEmpty" style="display:none;text-align:center;color:#ff0000;">
            <strong>Sin Resultados</strong>
        </div>
        <table id="adminServTSummaryTable" class="table table-bordered table-hover table-striped" style="font-size: 0.8em; text-align:center;">
        </table>       
      </div>
    </div>
    
  </div>
  