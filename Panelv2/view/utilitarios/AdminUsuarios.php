<div id="admin-usuarios-container" class="container-fuild">
  <?php
  require 'asignarModulosUsuario.php';
  require 'agregarUsuario.php';
  ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        Listado de Usuarios.
        <button type="button" class="btn btn-success agregar-modulo">Agregar</button>
      </div>
      <div class="panel-body">
        <div id="usuariosListaLoadMSG" style="display:none;text-align:center;">
            <strong>Cargando...</strong>
            <br>
            <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
        </div>
        <div id="usuariosListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
        <table id="tablausuariosLista" class="table table-bordered table-hover table-striped">      
        </table>
      </div>
    </div>
</div>

<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div hidden="true" id="admin-modulos-container" class="container-fuild">
  <?php
    require 'agregarModulo.php';
    require 'editarModulo.php';
  ?>
    <div class="panel panel-primary" hidden="true">
      <div class="panel-heading">
        Listado de Modulos
        <button hidden="true" type="button" class="btn btn-success agregar-modulo">Agregar</button>
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