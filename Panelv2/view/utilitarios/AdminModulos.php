<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div id="admin-modulos-container" class="container-fuild">
  <?php
    require 'agregarModulo.php';
    require 'editarModulo.php';
  ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        Listado de Modulos.
        <button type="button" class="btn btn-success agregar-modulo">Agregar</button>
      </div>
      <div class="panel-body">
        <div id="modulosListaLoadMSG" style="display:none;text-align:center;">
            <strong>Cargando...</strong>
            <br>
            <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
        </div>
        <div id="modulosListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
        <table id="tablamodulosLista" class="table table-bordered table-hover table-striped">      
        </table>
      </div>
    </div>
</div>