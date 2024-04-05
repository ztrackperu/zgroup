<script type="text/javascript">
function habilitarcoti() {
    //var sw=document.getElementById('sw').value;
    //alert(sw);//1	
    document.getElementById('xc_nomcli').readOnly = false;
    document.getElementById('xc_nomcli').focus();
    document.getElementById('valorcambio').value = 1;

    document.getElementById('c_desprd').value = '';
    document.getElementById('c_desprd').readOnly = true;
    document.getElementById('numcoti').value = '';
    document.getElementById('nasig').value = '';
    document.getElementById('numcoti').readOnly = true;

    document.getElementById('forwarder').value = '';
    document.getElementById('forwarder').readOnly = true;
}

function habilitarasig() {
    //var sw=document.getElementById('sw').value;
    //alert(sw);//1	
    document.getElementById('numcoti').readOnly = false;
    document.getElementById('numcoti').focus();
    document.getElementById('valorcambio').value = 2;

    document.getElementById('xc_nomcli').value = '';
    document.getElementById('ncoti').value = '';
    document.getElementById('xc_nomcli').readOnly = true;
    document.getElementById('c_desprd').value = '';
    document.getElementById('c_desprd').readOnly = true;

    document.getElementById('forwarder').value = '';
    document.getElementById('forwarder').readOnly = true;
}

function habilitarmoti() {
    //var sw=document.getElementById('sw').value;
    //alert(sw);//1	
    document.getElementById('c_desprd').readOnly = false;
    document.getElementById('c_desprd').focus();
    document.getElementById('valorcambio').value = 3;

    document.getElementById('xc_nomcli').value = '';
    document.getElementById('ncoti').value = '';
    document.getElementById('xc_nomcli').readOnly = true;
    document.getElementById('numcoti').value = '';
    document.getElementById('nasig').value = '';
    document.getElementById('numcoti').readOnly = true;

    document.getElementById('forwarder').value = '';
    document.getElementById('forwarder').readOnly = true;
}

function habilitarFw() {
    document.getElementById('forwarder').readOnly = false;
    document.getElementById('forwarder').focus();
    document.getElementById('valorcambio').value = 4;

    document.getElementById('xc_nomcli').value = '';
    document.getElementById('ncoti').value = '';
    document.getElementById('xc_nomcli').readOnly = true;
    document.getElementById('numcoti').value = '';
    document.getElementById('nasig').value = '';
    document.getElementById('numcoti').readOnly = true;

    document.getElementById('c_desprd').value = '';
    document.getElementById('c_desprd').readOnly = true;
}

function focusc_nomcli() {
    document.getElementById('xc_nomcli').focus();
    document.getElementById('valorcambio').value = 1;
}

function validar() {
    var valorcambio = document.getElementById('valorcambio').value;

    c_codcli = document.getElementById('c_codcli').value;
    //c_nomcli=document.frmbuscacoti.xc_nomcli.value
    ncoti = document.getElementById('ncoti').value;
    if (valorcambio == '1' && c_codcli == '') {
        //alert('Falta Ingresar Nro de c_nomcli');
        var mensje = "Falta Nombre de cliente ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("xc_nomcli").focus();
        return 0;
    }
    /*	if(valorcambio=='1' && ncoti==''){
    		//alert('Falta Ingresar Nro de c_nomcli');
    		var mensje = "Falta Buscar y Seleccionar Nro de c_nomcli ...!!!";
    				$('#alertone').modal('show');
    				$('#mensaje').val(mensje);
    			document.getElementById("c_nomcli").focus();
    			return 0;		
    	}*/

    numcoti = document.getElementById('numcoti').value;
    nasig = document.getElementById('nasig').value;
    if (valorcambio == '2' && numcoti == '') {
        //alert('Falta Ingresar Nro de c_nomcli');
        var mensje = "Falta Ingresar Nro de Cotizacion ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("numcoti").focus();
        return 0;
    }
    c_desprd = document.getElementById('c_desprd').value;
    if (valorcambio == '3' && c_desprd == '') {
        //alert('Falta Ingresar el c_desprd');
        var mensje = "Falta Ingresar Nombre Producto ...!!!";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);
        document.getElementById("c_desprd").focus();
        return 0;
    }

    //if(confirm("Seguro de Generar guia ?")){
    document.getElementById("frmbuscacoti").submit();
    // }



}

function combocli() {
    var cod = document.frmbuscacoti.xc_nomcli.options[document.frmbuscacoti.xc_nomcli.selectedIndex].value;
    //var cod=document.frmbuscacoti.xc_nomcli.options[document.frmbuscacoti.xc_nomcli.selectedIndex].text;
    document.getElementById('c_codcli').value = cod;
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
                            <!--CC_RUC,CC_RAZO,CC_TELE,CC_EMAI,CC_RESP-->
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
        },
        select: function (e, ui) {
            $("#c_codcli").val(ui.item.id);
            $("#c_nomcli").val(ui.item.value);

        }
    })
})
</script>
<script>
$(document).ready(function () {
    $("#c_desprd").autocomplete({

        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({

                url: '?c=03&a=ProductomaestroBuscar',
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
                            c_codprd: item.IN_CODI
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#c_codprd").val(ui.item.c_codprd);
            $("#n_preprd").focus();
        }
    })
})
</script>
<body onLoad="focusc_nomcli()"> 
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

<div class="container-fluid">

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">
			BÚSQUEDA DE COTIZACIONES.
		</div>
		<div class="panel-body">
        <form class="form-horizontal" id="frmbuscacoti" name="frmbuscacoti" method="post" action="?c=03&a=ListarCotizaciones&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
            <table width="836" class="table table-striped">
                <tr>
                    <td width="140"><input name="sw" type="radio" id="sw" onClick="habilitarcoti()" value="1" checked="CHECKED"> Filtro x
                        Cliente</td>
                    <td width="120">Ejm: San Fernando</td>
                    <td width="263">
                        <?php /*?><input id="xc_nomcli" name="xc_nomcli" class="form-control input-sm" type="text" placeholder="Ingrese Nombre Cliente"
                        />
                        <?php */?>


                        <select id="xc_nomcli" name="xc_nomcli" class="select2 form-control input-sm" onChange="combocli()">
              <option value="">SELECCIONE</option>
              <?php 
                $ListarLineaMaritima=$this->maestro->ListarClientes(); 
                foreach ($ListarLineaMaritima as $lineamar){
                ?>
              <option value="<?php echo $lineamar->CC_RUC; ?>" ><?php echo utf8_encode($lineamar->CC_RAZO); ?></option>
              <?php } ?>
              </select>
                        
                        <input id="ncoti" name="ncoti" type="hidden" />
                        <input id="c_nomcli" name="c_nomcli" type="hidden" />
                        <input id="c_codcli" name="c_codcli" type="hidden" />
                        <input id="ruc" name="ruc" type="hidden" />
                        <input id="valorcambio" name="valorcambio" type="hidden" />
                    </td>
                    <td width="293"> </td>
                </tr>

                <tr>
                    <td><input name="sw" type="radio" id="sw" onClick="habilitarasig()" value="2">
                        <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " /> Filtro x Nro Cotizacion</td>
                    <td>Ejm: 10020162525</td>
                    <td>
                        <input autocomplete="off" id="numcoti" name="numcoti" class="form-control input-sm" type="text" placeholder="Ingrese Numero Cotización"
                            readonly />
                        <input id="nasig" name="nasig" type="hidden" />
                    </td>
                    <td width="293"><a class="btn btn-default" onClick="validar()">Consultar</a></td>
                </tr>

                <tr>
                    <td width="140"> <input name="sw" id="sw" type="radio" value="3" onClick="habilitarmoti()"> Filtro x Producto</td>
                    <td width="120">Ejm: Contenedor </td>
                    <td width="263">
                        <input id="c_desprd" name="c_desprd" class="form-control input-sm" type="text" placeholder="Ingrese Nombre Producto" readOnly
                        />
                        <input type="hidden" name="c_codprd" id="c_codprd">
                    </td>
                    <td width="293"> </td>
                </tr>
                <tr>
                    <td width="140"> <input name="sw" id="sw" type="radio" value="4" onClick="habilitarFw()"> Filtro x Forwarder</td>
                    <td width="120">Ejm: 47 </td>
                    <td width="263">
                        <input id="forwarder" name="forwarder" class="form-control input-sm" type="text" placeholder="Ingrese Numero de Forwarder"
                            readOnly />

                    </td>
                    <td width="293"> </td>
                </tr>
            </table>

        </form>
		</div>
    </div>
</div>


</body>

<input type="hidden" name="dni" id="dni" value="<?php echo $_GET["udni"]?>"/>
<input type="hidden" name="login" id="login" value="<?php echo $login?>"/>
<script>
 $(document).ready(function() {
	 var dni=$("#dni").val();
	 var login=$("#login").val();
	 if(dni<>'40294243'){
		 init_PNotifyxUsuario();
		 setInterval(init_PNotifyxUsuario, 500000) 
		 
	 }
		
	    			
	//setInterval(init_PNotifyxUsuario, 300000);//cada 30 minutos (3000=3segundos)
}); 
   function init_PNotifyxUsuario() {
	 var login=$("#login").val();
$.ajax({
    type: "POST",
    url: 'index.php?c=log04&a=CotPreAprobadasxUsuario', //en procesosinv.controller.php
    dataType: "json",
    data: {anio:"2019",login:login},
    async : false, //espera la respuesta antes de continuar
    success: function(data) {
		var datos=$.parseJSON(data);
		console.log(datos);
		console.log(datos.length);
		item=0;
		 for(var i=0;i<datos.length;i++){
			new PNotify({
				title: "Asignacion Pendiente",
				type: "info",
				text: "Num. Cotizacion:"+datos[i].c_numped+"  \nCliente:"+datos[i].c_nomcli+" \nAsunto:"+datos[i].c_asunto+"\nFecha PreAprobacion:"+(datos[i].d_fecapr).substr(0,10)+"\nUsusario:"+datos[i].c_oper,
				nonblock: {
						  nonblock: false
					},
				addclass: 'dark',
				styling: 'bootstrap3',
				hide: true,
				before_close: function(PNotify) {
				PNotify.update({
				title: PNotify.options.title + " - Enjoy your Stay",
				before_close: null
				});

				PNotify.queueRemove();

				return false;
					  }
			});	
		 } 
    },
  });
};    

 </script> 