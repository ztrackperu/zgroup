
<script>
function llamardesab1() {
    if (document.getElementById('c_tipmov').value == 'L') {
        document.getElementById('desab1').checked = true;
        document.getElementById('forwarder').readOnly = true;
        document.getElementById('c_nrofw').readOnly = true;
    } else {
        document.getElementById('desab1').checked = false;
    }
}
</script>

<body onLoad="llamardesab1()">
<!--fin cabecera-->

<script>
function desabilitar1() {
    if (document.getElementById('desab1').checked == true) {
        document.getElementById('forwarder').disabled = true;
        document.getElementById('forwarder').value = '';
        document.getElementById('c_nrofw').value = '';
        document.getElementById('cotizacion').value = '';
        document.getElementById('c_numped').value = '';

        document.getElementById('c_nomcli').value = '';
        document.getElementById('c_codcli').value = '';
        document.getElementById('c_ruccli').value = '';
        document.getElementById('tipmov').value = 'Local';
        document.getElementById('c_tipmov').value = 'L';
    } else {
        document.getElementById('forwarder').disabled = false;
        document.getElementById('c_nomcli').value = '';
        document.getElementById('c_codcli').value = '';
        document.getElementById('c_ruccli').value = '';
        document.getElementById('tipmov').value = '';
        document.getElementById('c_tipmov').value = '';
    }
}
$(function () {

    //Array para dar formato en español
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: 'Previo',
        nextText: 'Próximo',

        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
        ],
        monthStatus: 'Ver otro mes',
        yearStatus: 'Ver otro año',
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        initStatus: 'Selecciona la fecha',
        isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

    //miDate: fecha de comienzo D=días | M=mes | Y=año
    //maxDate: fecha tope D=días | M=mes | Y=año
    $("#d_fectran").datepicker();
    //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
});

function validarguardar() {
    var forwarder = document.getElementById('forwarder').value;
    if (document.getElementById('desab1').checked == false) {
        if (forwarder == '') {
            var mensje = "Falta Buscar Forwarder ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("forwarder").focus();
            return 0;
        }

        var c_nrofw = document.getElementById('c_nrofw').value;
        if (c_nrofw == '') {
            var mensje = "Falta Buscar y Seleccionar Forwarder ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("c_nrofw").focus();
            return 0;
        }
    } else {
        var cotizacion = document.getElementById('cotizacion').value;
        if (cotizacion == '') {
            var mensje = "Falta Buscar Cotizacion ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("cotizacion").focus();
            return 0;
        }
        var c_numped = document.getElementById('c_numped').value;
        if (c_numped == '') {
            var mensje = "Falta Buscar y Seleccionar Cotizacion ...!!!";
            $('#alertone').modal('show');
            $('#mensaje').val(mensje);
            document.getElementById("c_numped").focus();
            return 0;
        }
    }
    var d_fectran = document.getElementById('d_fectran').value;
    if (d_fectran == '') {
        var mensje = "Falta Ingresar la Fecha del Servicio ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("d_fectran").focus();
        return 0;
    }
    if (confirm("Seguro de Actualizar la Cabecera del Transporte ?")) {
        document.getElementById("Frmregcoti").submit();
    }
}
</script>

<div class="container-fluid">

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">ACTUALIZAR CABECERA DE SERVICIO DE TRANSPORTE
            <?php echo $Id_servicio ?>
        </div>
        <div>

            <!-- Inicio Modal alerts -->
            <div id="alertone" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Mensaje del Sistema</h5>
                        </div>
                        <div class="alert alert-warning">
                            <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
	border: 0px solid #A8A8A8;width:500px;" readonly />
                            <span id="mensaje" class="label label-default"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <!--fin modal alertas info-->

            <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarUpdCabTransporte">
                <div class="form-control-static" align="right">
                    <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Actualizar</a>-->
                    <input class="btn btn-success" type="button" onclick="validarguardar()" value="Actualizar" /> &nbsp;
                    <a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>&nbsp;
                    <a class="btn btn-warning" onClick="location.reload();">Refrescar</a>&nbsp;
                </div>


                <div class="form-group">
                    <label class="control-label col-xs-1"></label>
                    <input id="Id_servicio" name="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>" />
                </div>
                <!--fila 1-->
                <div class="form-group">
                    <label class="control-label col-xs-2">Cotizacion</label>
                    <div class="col-xs-2">
                        <input autocomplete="off" id="cotizacion" class="form-control input-sm" type="text" placeholder="Nº Cotizacion" value="<?php echo $DatosCabServ->c_numped ?>"
                        />
                        <input id="c_numped" name="c_numped" type="hidden" value="<?php echo $DatosCabServ->c_numped ?>" />
                    </div>
                    <label class="control-label col-xs-1">Routing</label>
                    <div class="col-xs-2">
                        <input autocomplete="off" id="forwarder" class="form-control input-sm" type="text" placeholder="Nº de Routing" value="<?php echo $DatosCabServ->c_nrofw ?>" readonly />
                        <input id="c_nrofw" name="c_nrofw" type="hidden" value="<?php echo $DatosCabServ->c_nrofw ?>" />
                    </div>
                    <div class="col-xs-1">
                        <label>S/R</label>
                        <input id="desab1" name="desab1" type="checkbox" onClick="desabilitar1()" disabled />
                    </div>

                    <label class="control-label col-xs-1">Tipo</label>
                    <div class="col-xs-2">
                        <input type="text" name="tipmov" id="tipmov" class="form-control input-sm" placeholder="Tipo Movimiento" value="<?php echo $tipmov ?>"
                            readonly />
                        <input type="hidden" name="c_tipmov" id="c_tipmov" value="<?php echo $DatosCabServ->c_tipmov ?>" />
                    </div>

                </div>

                <!--fila 2-->
                <div class="form-group">
                    <label class="control-label col-xs-2">RUC</label>
                    <div class="col-xs-2">
                        <input type="text" name="c_ruccli" id="c_ruccli" class="form-control input-sm" value="<?php echo $DatosCabServ->c_ruccli ?>"
                            readonly />
                    </div>
                    <label class="control-label col-xs-1">Cliente</label>
                    <div class="col-xs-3">
                        <input type="text" name="c_nomcli" id="c_nomcli" class="form-control input-sm" value="<?php echo utf8_encode($DatosCabServ->c_nomcli) ?>"
                            readonly />
                        <input id="c_codcli" name="c_codcli" type="hidden" value="<?php echo $DatosCabServ->c_codcli ?>" />
                    </div>
                    <label class="control-label col-xs-1">Fecha</label>
                    <div class="col-xs-2">
                        <input type="text" name="d_fectran" id="d_fectran" <?php $d_fectran=$DatosCabServ->d_fectran; if($d_fectran!=""){$d_fectran=vfecha(substr($DatosCabServ->d_fectran,0,10));} ?> value="
                        <?php echo $d_fectran  ?>" class="form-control datepicker input-sm" placeholder="Fecha de Servicio" />
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>
   
<script>
$(document).ready(function () {
    /* Autocomplete de cotizacion, jquery UI */
    $("#cotizacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.c_numped,
                            value: item.cliente,
                            clie: item.c_nomcli,
                            ruc: item.CC_NRUC,
                            codcli: item.c_codcli
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_numped").val(ui.item.id);
            //$("#c_nomcli").val(ui.item.clie);
            //$("#c_codcli").val(ui.item.codcli); 
            //$("#c_ruccli").val(ui.item.ruc);           
        }
    })
})

$(document).ready(function () {
    /* Autocomplete de forwarder, jquery UI */
    $("#forwarder").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=BuscarForwarder',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.Fwd_Codi,
                            value: item.Fwd_Codi + ' ' + item.Fwd_DescripcionClienteFinal,
                            clie: item.Fwd_DescripcionClienteFinal,
                            ruc: item.Ent_Ruc,
                            codcli: item.Fwd_ClienteFinal,
                            mov: item.Fwd_Tmov
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_nrofw").val(ui.item.id);
            $("#c_nomcli").val(ui.item.clie);
            $("#c_codcli").val(ui.item.codcli);
            $("#c_ruccli").val(ui.item.ruc);
            $("#c_tipmov").val(ui.item.mov);
            if (ui.item.mov == 'I') {
                $("#tipmov").val('Importacion');
            } else {
                $("#tipmov").val('Exportacion');
            }
        }
    })
})
</script>



