<script type="text/javascript">
//VALIDAR NUMERO DE GUIA
function ponerCeros(obj) {
    if (obj.value != "" && obj.value != "0") {
		if($("#c_serdoc").val() == 'G07'){
        while (obj.value.length < 8)
            obj.value = '0' + obj.value;
		}else{
			 while (obj.value.length < 7)
            obj.value = '0' + obj.value;
		}
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function compUsuario(Tecla) {
	var serie=$("#c_serdoc").val();
    Tecla = (Tecla) ? Tecla : window.event;
    input = (Tecla.target) ? Tecla.target :
        Tecla.srcElement;
    if (Tecla.type == "keyup") {
        var DivDestino = document.getElementById("DivDestino");
        DivDestino.innerHTML = "<div><div class='alert_info'>	<img src='../images/icon_info.png' alt='delete' class='mid_align'/>Continue</div>	</div>";
        if (input.value) {
            ObtDatos("?c=dev01&a=validarNumGuiaDev&cod=" + input.value + "&serie=" + serie);
        }
    }
}

function createRequestObject() {
    var peticion;
    var browser = navigator.appName;
    if (browser == "Microsoft Internet Explorer") {
        peticion = new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        peticion = new XMLHttpRequest();
    }
    return peticion;
}
var http = new Array();

function ObtDatos(url) {
    var act = new Date();
    http[act] = createRequestObject();
    http[act].open('get', url);
    http[act].onreadystatechange = function () {
        if (http[act].readyState == 4) {
            if (http[act].status == 200 || http[act].status == 304) {
                var texto
                texto = http[act].responseText
                var DivDestino = document.getElementById("DivDestino");
                DivDestino.innerHTML = "<div id='error'>" + texto + "</div>";
                document.getElementById("seguir").value = texto;

            }
        }
    }
    http[act].send(null);
}
//FIN VALIDAR NUMERO DE GUIA

function consultar(udni = '') {
    var serie = document.getElementById('serie').value;
    var c_serdoc = document.getElementById('c_serdoc').value;
    var c_nume = document.getElementById('c_nume').value;
    //validar numero de guia
    var c_nume = document.getElementById('c_nume').value;
    ObtDatos("?c=dev01&a=validarNumGuiaDev&cod=" + c_nume+"&udni="+udni);
    var seguir = document.getElementById('seguir').value;
    //alert(seguir);  
    if (seguir == "<div class='alert_error'>Guia no existe</div>") {
        var mensje = "Guia Ingresada no existe ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("c_nume").focus();
        return 0;
    } else if (seguir == "<div class='alert_error'>Cotizacion Facturada</div>") {
        var mensje = "Cotizacion Facturada ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("c_nume").focus();
        return 0;
    } else if (serie == '') {
        var mensje = "Ingrese Serie del Equipo ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById('serie').focus();
    } else if (c_serdoc == '') {
        var mensje = "Ingrese Serie de la Guia ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById('c_serdoc').focus();
    } else if (c_nume == '') {
        var mensje = "Ingrese Serie de la Guia ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById('c_nume').focus();
    } else {
        if (confirm("Seguro de Generar Eir de Ingreso por Devolucion ?")) {
            document.getElementById("frmbuscacoti").submit();
        }
    }

}

</script>
<script>
$(document).ready(function () {

        /* Autocomplete de producto, jquery UI */
        $("#xc_nomcli").autocomplete({
            dataType: 'JSON',
            source: function (request, response) {
                jQuery.ajax({
                    url: '?c=03&a=ClienteBuscar',
                    type: "post",
                    dataType: "json",
                    data: {
                        criterio: request.term
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return { //
                                //<!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
                                id: item.CC_RUC,
                                value: item.CC_RAZO,
                                contacto: item.CC_RESP,
                                telefono: item.CC_TELE,
                                email: item.CC_EMAI
                                //  precio: item.Precio
                            }
                        }))
                    }
                })
            }, //<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
            select: function (e, ui) {
                $("#c_codcli").val(ui.item.id);
                $("#c_nomcli").val(ui.item.value);

            }
        })
    }) 
    $(document).ready(function () {
        $("#c_desprd").autocomplete({

            dataType: 'JSON',
            source: function (request, response) {
                jQuery.ajax({

                    url: '?c=03&a=ProductoBuscar',
                    type: "post",
                    dataType: "json",
                    data: {
                        criterio: request.term
                    },
                    success: function (data) {
                        response($.map(data, function (item) {
                            return { //
                                id: item.IN_CODI,
                                value: item.IN_ARTI,
                            }
                        }))
                    }
                })
            },
            select: function (e, ui) {
                $("#c_codprd").val(ui.item.id);
                $("#n_preprd").focus();
            }
        })
    })
</script>
<script>
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
     //  $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
     //$( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
     $("#finicio").datepicker();
     $("#ffinal").datepicker();

 });
</script>
<body>
    <!-- Inicio Modal -->
    <div id="alertone" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Mensaje del Sistema</h5>
                </div>
                <div class="alert alert-warning">
                    <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:500px;" readonly />
                    <span id="mensaje" class="label label-default"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">CAMBIO DE EQUIPO</div>
            <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post" action="?c=dev01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=RegEirEntradaGuia">
                <table width="997" class="table table-striped">
                    <tr>
                        <td width="277" align="center" bgcolor="#99CCFF">Ingrese Equipo a Cambiar</td>
                        <td width="10">:</td>
                        <td width="290">
                            <input type="text" name="serie" id="serie" class="form-control input-sm">
                        </td>
                        <td width="373" colspan="2" rowspan="2">
                            <br><input class="btn btn-default" type="button" onclick="consultar('<?=$udni?>')" value="Registrar" />
                        </td>
                    </tr>
                    <tr>
                        <td width="277" align="center" bgcolor="#99CCFF">Ingrese serie y Nº de Guia</td>
                        <td width="10">:</td>
                        <td width="290">
                            <div class="col-xs-5">
                                <select name="c_serdoc" id="c_serdoc" class="form-control input-sm">
                                    <option value="001">001</option>
                                    <option value="002">002</option>
                                    <option value="003">003</option>
                                    <option value="004">004</option>
                                    <option value="005">005</option>
                                    <option value="006">006</option>
                                    <option value="G07"  selected="selected">G07</option>
                                </select>
                            </div>
                            <div class="col-xs-7">
                                <input type="text" name="c_nume" id="c_nume" value="<?= isset($c_nume)?$c_nume:''; ?>" class="form-control input-sm" maxlength="8" onBlur="ponerCeros(this)"
                                    onkeyup="compUsuario(event)" onKeyPress="return isNumberKey(event)" />
                                <div id="DivDestino" style="width:150px">&nbsp;</div>
                                <input type="hidden" name="seguir" id="seguir" />
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
