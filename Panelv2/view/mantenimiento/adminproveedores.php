<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-proveedores-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de Proveedores</div>
        <div class="panel-body">
            <div id="proveedoresListaLoadMSG" style="display:none;text-align:center;">
                <strong>Cargando...</strong>
                <br>
                <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
            </div>
            <div id="proveedoresListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
            <table id="tablaproveedoresLista" class="table table-bordered table-hover table-striped dt-responsive">      
            </table>
        </div>
    </div>
</div>

