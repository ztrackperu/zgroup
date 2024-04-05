<input type="hidden" name="udni" id="udni" value="<?=$_REQUEST['udni']?>">
<input type="hidden" name="mod" id="mod" value="<?=$_REQUEST['mod']?>">

<div class="container-fluid listado-eir-entrada-oc-container">
    <div class="panel panel-primary">
        <div class="panel-heading">Listado de EIR Entrada Pendientes por Orden de Compra</div>
        <div class="panel-body">
            <a class="btn btn-primary" href="?c=inv03&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=ListaEirEntrada">VOLVER</a>
            <br/><br/>
            <div id="eirEntradaOCListaLoadMSG" style="display:none;text-align:center;">
                <strong>Cargando informacion ...</strong>
                <br>
                <img src="assets/vendor/images/spinner.gif" style="height: 85px;width: 85px;">
            </div>
            <div id="eirEntradaOCListaMSGEmpty" style="display:none;text-align:center;color:#ff0000;"></div>
            <table id="tablaeirEntradaOCLista" class="table table-bordered table-hover table-striped dt-responsive">      
            </table>
        </div>
    </div>
</div>