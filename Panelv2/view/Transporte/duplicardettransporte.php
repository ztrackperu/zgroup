<script>
jQuery(function($){
	$.mask.definitions['h'] = "[0-1]";
	$.mask.definitions['i'] = "[0-9]";
	$.mask.definitions['m'] = "[0-5]"; 
	$.mask.definitions['n'] = "[0-9]";
	//$.mask.definitions['x'] = "[AP]";
    //$("#horaretiro").mask("hi:mn xM");
//    $("#horaretiro").mask("hi:mn");
//    $("#horaingreso").mask("hi:mn");
});

function cambiarnaveexpo(){	
	var Ec_idnave=document.Frmregcoti.Ec_idnave.options[document.Frmregcoti.Ec_idnave.selectedIndex].text;
	document.getElementById('Ec_nomnave').value=Ec_idnave;
}

function cambiarnaveimpo(){
	var c_idnave=document.Frmregcoti.c_idnave.options[document.Frmregcoti.c_idnave.selectedIndex].text;
	document.getElementById('c_nomnave').value=c_idnave;
}

function cambiarlineaexpo(){
	var Ec_idlinemar=document.Frmregcoti.Ec_idlinemar.options[document.Frmregcoti.Ec_idlinemar.selectedIndex].text;
	document.getElementById('Ec_nomlineamar').value=Ec_idlinemar;
}

function cambiarlineaimpo(){
	var c_idlinemar=document.Frmregcoti.c_idlinemar.options[document.Frmregcoti.c_idlinemar.selectedIndex].text;
	document.getElementById('c_nomlineamar').value=c_idlinemar;
}

function cambiarconsig(){
	var c_codconsig=document.Frmregcoti.c_codconsig.options[document.Frmregcoti.c_codconsig.selectedIndex].text;
	document.getElementById('c_nomconsig').value=c_codconsig;
}

function cambiarconsolidador(){
	var c_idconsolidador=document.Frmregcoti.c_idconsolidador.options[document.Frmregcoti.c_idconsolidador.selectedIndex].text;
	document.getElementById('c_nomconsolidador').value=c_idconsolidador;
}

function cambiaragentemar(){
	var c_codagenmari=document.Frmregcoti.c_codagenmari.options[document.Frmregcoti.c_codagenmari.selectedIndex].text;
	document.getElementById('c_nomagemari').value=c_codagenmari;
}

function cambiaralmacen(){
	var c_idalmacen=document.Frmregcoti.c_idalmacen.options[document.Frmregcoti.c_idalmacen.selectedIndex].text;
	document.getElementById('c_nomalmacen').value=c_idalmacen;
}

function cambiarterminalvacio(){
	var c_codtermret=document.Frmregcoti.c_codtermret.options[document.Frmregcoti.c_codtermret.selectedIndex].text;
	document.getElementById('c_nomtermret').value=c_codtermret;
}
function cambiarterminaling(){
	var c_codterming=document.Frmregcoti.c_codterming.options[document.Frmregcoti.c_codterming.selectedIndex].text;
	document.getElementById('c_nomterming').value=c_codterming;
}
function cambiarageadu(){
	var Ec_codageaduana=document.Frmregcoti.Ec_codageaduana.options[document.Frmregcoti.Ec_codageaduana.selectedIndex].text;
   document.getElementById('Ec_nomageaduana').value=Ec_codageaduana;	
}
function cambiaragemari(){
	var Ec_codagemari=document.Frmregcoti.Ec_codagemari.options[document.Frmregcoti.Ec_codagemari.selectedIndex].text;
    document.getElementById('Ec_nomagemari').value=Ec_codagemari;
}
function cambiarclientelocal(){
	var  Lc_rucclie=document.getElementById('clientelocal').value
	 document.getElementById('Lc_rucclie').value=Lc_rucclie;
	var Lc_nomclie=document.Frmregcoti.clientelocal.options[document.Frmregcoti.clientelocal.selectedIndex].text;
    document.getElementById('Lc_nomclie').value=Lc_nomclie;
}

$(function() {
    //Array para dar formato en español
     var defaults_es = {
         closeText: 'Cerrar',
         prevText: 'Previo',
         nextText: 'Próximo',
         monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
             'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
         monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
             'Jul','Ago','Sep','Oct','Nov','Dic'],
         monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
         dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
         dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
         dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
         dateFormat: 'dd/mm/yy', firstDay: 0,
         initStatus: 'Selecciona la fecha', isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    //miDate: fecha de comienzo D=días | M=mes | Y=año
    //maxDate: fecha tope D=días | M=mes | Y=año
    //IMPORTACION
    $( "#d_fecpagblm" ).datepicker();
    $( "#d_fecpagblh" ).datepicker();   
    $( "#d_fecetdorig" ).datepicker();
    $( "#d_fecetdodest" ).datepicker();
    $( "#d_fectransblm" ).datepicker();
    $( "#d_fecpagalm" ).datepicker();
    $( "#d_fecpagthc" ).datepicker();
    $( "#d_fecpagvb" ).datepicker();
    $( "#d_fecmaxdev" ).datepicker();
    $( "#d_fecendose" ).datepicker();   
    $( "#d_fecvolante" ).datepicker();
    $( "#d_fecnumdua" ).datepicker();   
    //EXPORTACION 
    $( "#d_feczarpe" ).datepicker();
	$( "#d_fecretiro" ).datepicker();
	$( "#d_fecingreso" ).datepicker();
	$( "#d_fecrefrendo" ).datepicker();
	$( "#d_fecfactura" ).datepicker();
	$( "#Ed_fecpagvb" ).datepicker();
	$( "#d_fecrecpfac" ).datepicker();
	$( "#d_fecentread" ).datepicker();	
	$( "#d_fecfacturapsc" ).datepicker();
	//LOCAL
	$( "#d_fecfac" ).datepicker();
	$( "#d_fecguiatranslle" ).datepicker();
	$( "#d_fecguiatransva" ).datepicker();
});
 
  function validarguardar(){
	  /*var c_icoterm=document.getElementById('c_icoterm').value;
 	   if(c_icoterm==''){			
			var mensje = "Falta Registrar Icoterm ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_icoterm").focus();
			return 0;
		}
		
	   var c_codconsig=document.getElementById('c_codconsig').value;
 	   if(c_codconsig==''){			
			var mensje = "Falta Buscar Consignatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_codconsig").focus();
			return 0;
		}
	   var c_nomconsig=document.getElementById('c_nomconsig').value;
 	   if(c_nomconsig==''){			
			var mensje = "Falta Buscar y Seleccionar Consignatario ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomconsig").focus();
			return 0;
		}
		
	   var c_nblmaster=document.getElementById('c_nblmaster').value;
 	   if(c_nblmaster==''){			
			var mensje = "Falta Ingresar BL Master ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nblmaster").focus();
			return 0;
		}	
		var c_nblhijo=document.getElementById('c_nblhijo').value;
 	   if(c_nblhijo==''){			
			var mensje = "Falta Ingresar BL Hijo ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nblhijo").focus();
			return 0;
		}
		
	   var c_idlinemar=document.getElementById('c_idlinemar').value;
 	   if(c_idlinemar==''){			
			var mensje = "Falta Buscar Linea Maritima ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idlinemar").focus();
			return 0;
		}
		
		var c_nomlineamar=document.getElementById('c_nomlineamar').value;
 	   if(c_nomlineamar==''){			
			var mensje = "Falta Buscar y Seleccionar Linea Maritima ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomlineamar").focus();
			return 0;
		}
		
		var d_fecpagblm=document.getElementById('d_fecpagblm').value;
 	   if(d_fecpagblm==''){			
			var mensje = "Falta Ingresar Fecha de Pago de Flete Maritimo MBL ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecpagblm").focus();
			return 0;
		}
		var d_fecpagblh=document.getElementById('d_fecpagblh').value;
 	   if(d_fecpagblh==''){			
			var mensje = "Falta Ingresar Fecha de Pago de Flete Maritimo HBL ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("d_fecpagblh").focus();
			return 0;
		}
		
		  var c_idnave=document.getElementById('c_idnave').value;
 	   if(c_idnave==''){			
			var mensje = "Falta Buscar Nave ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idnave").focus();
			return 0;
		}
		
		var c_nomnave=document.getElementById('c_nomnave').value;
 	   if(c_nomnave==''){			
			var mensje = "Falta Buscar y Seleccionar Nave ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomnave").focus();
			return 0;
		}*/	
		//
		if(confirm("Seguro de Registrar el Detalle del Transporte ?")){
		   document.getElementById("Frmregcoti").submit();		
	 }	
 }
</script>

 <!--modal de BUSCAR CHOFER-->
<form class="form-horizontal" id="" name="">
    <div class="modal fade" id="my_modalTrans" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">      
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Choferes de la Empresa <input name="empresa" id="empresa" type="text" style="border: 0px solid #A8A8A8;width:300px;" readonly /></h4>
                </div>
                <div class="modal-body">
                    <table id="tablaTrans" class="table table-hover" style="font-size:12px;">
                    <!--Contenido se encuentra en verEquiposDispo.php-->
                    </table> 
                </div>
            </div>
        </div>
    </div>
</form>
 <!--fin modal de BUSCAR CHOFER-->
 
<div class="container-fluid"> 
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">DETALLE DE SERVICIO DE TRANSPORTE <?php echo $Id_servicio ?></div>
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
                            <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;border: 0px solid #A8A8A8;width:500px;" readonly />
                            <span id="mensaje" class="label label-default"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin modal alertas info-->
            <form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=GuardarDetTransporte" >
                <div class="form-control-static" align="right">
                    <!--<a class="btn btn-success" onClick="validarguardar();" href="#">Registrar</a>-->
                    <input class="btn btn-success" type="button" onclick="validarguardar()" value="Registrar"/>
                    <a class="btn btn-danger" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte">Cancelar</a>
                    <a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>
                </div>      
                <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />
                <input name="n_item"   id="n_item" type="hidden" value="<?php echo $n_item; ?>"  />      	 
                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    switch ($c_tipmov){
                        case 'I':
                            $tab_id = 'impo';
                            $tab_label = 'Importacion';
                            break;
                        case 'E':
                            $tab_id = 'expo';
                            $tab_label = 'Exportacion';
                            break;
                        default:
                            $tab_id = 'local';
                            $tab_label = 'Local';
                            break;
                    }
                    ?>
                    <li role="presentation" class="active">
                        <a href="#<?= $tab_id;?>" aria-controls="<?= $tab_id;?>" role="tab" data-toggle="tab"><?= $tab_label;?></a>
                    </li>
                    <li role="presentation">
                        <a  href="#otros" aria-controls="otros" role="tab" data-toggle="tab" >Otros Datos</a>
                    </li>
                </ul> 
                <!-- Inicia Tab panes -->
                <div class="tab-content">
                    <?php if($c_tipmov=='I'){ ?>
                    <div role="tabpanel" id="impo"  class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>       
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"> <a href="#fw" aria-controls="fw" role="tab" data-toggle="tab"  >Datos Forwarder</a></li>
                            <li role="presentation"  ><a  href="#conten" aria-controls="conten" role="tab" data-toggle="tab"  >Datos Contenedor</a></li>
                            <li role="presentation"  ><a  href="#alm" aria-controls="alm" role="tab" data-toggle="tab"  >Datos Almacen</a></li>
                            <li role="presentation"  ><a  href="#prov" aria-controls="prov" role="tab" data-toggle="tab"  >Datos Factura</a></li>
                            <li role="presentation"  ><a  href="#adu" aria-controls="adu" role="tab" data-toggle="tab"  >Datos Aduana</a></li>
                        </ul> 
                        <!-- Inicia Tab panes importacion -->
                        <div class="tab-content">
                            <?php
                                require_once 'update/importaciones/forwarder_tab.php';
                                require_once 'update/importaciones/contenedor_tab.php';
                                require_once 'update/importaciones/almacen_tab.php';
                                require_once 'update/importaciones/factura_tab.php';
                                require_once 'update/importaciones/aduana_tab.php';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($c_tipmov=='E'){ ?>
                    <div role="tabpanel"  <?php if($c_tipmov=='E'){ ?> id="expo"  class="tab-pane active"  <?php }else{ ?> class="tab-pane"<?php } ?>  >
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"> <a href="#fwexpo" aria-controls="fwexpo" role="tab" data-toggle="tab"  >Datos Forwarder</a></li>
                            <li role="presentation"  ><a  href="#contenedor" aria-controls="contenedor" role="tab" data-toggle="tab"  >Datos Contenedor</a></li>
                            <li role="presentation"  ><a  href="#retiro" aria-controls="retiro" role="tab" data-toggle="tab"  >Datos Terminal Salida</a></li>
                            <li role="presentation"  ><a  href="#ing" aria-controls="ing" role="tab" data-toggle="tab"  >Datos Terminal Ingreso</a></li>
                            <li role="presentation"  ><a  href="#fac" aria-controls="fac" role="tab" data-toggle="tab"  >Datos Factura</a></li>
                            <li role="presentation"  ><a  href="#aduexpo" aria-controls="aduexpo" role="tab" data-toggle="tab"  >Datos Aduana</a></li>
                        </ul> 
                        <!-- Inicia Tab panes exportacion -->
                        <div class="tab-content">
                            <?php
                                require_once 'update/exportaciones/forwarder_tab.php';
                                require_once 'update/exportaciones/contenedor_tab.php';
                                require_once 'update/exportaciones/terminal_salida_tab.php';
                                require_once 'update/exportaciones/terminal_ingreso_tab.php';
                                require_once 'update/exportaciones/factura_tab.php';
                                require_once 'update/exportaciones/aduana_tab.php';
                            ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($c_tipmov=='L'){ ?>
                    <div role="tabpanel"   id="local"  class="tab-pane active">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>       
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"> <a href="#doc" aria-controls="doc" role="tab" data-toggle="tab"  >Datos Documentos</a></li>
                            <li role="presentation"  ><a  href="#contenlocal" aria-controls="contenlocal" role="tab" data-toggle="tab"  >Datos Equipo</a></li>
                            <li role="presentation"  ><a  href="#translocal" aria-controls="translocal" role="tab" data-toggle="tab"  >Datos Transporte</a></li>
                        </ul> 
                        <!-- Inicia Tab panes local -->
                        <div class="tab-content">      
                            <?php
                                require_once 'regdet/locales/documentos_tab.php';
                                require_once 'regdet/locales/equipo_tab.php';
                                require_once 'regdet/locales/transporte_tab.php';
                            ?>               
                        </div>
                    </div>
                    <?php } ?>  
                    <div role="tabpanel"  id="otros"  class="tab-pane">
                        <div class="form-group">
                            <label class="control-label col-xs-1"></label>
                        </div>
                        <?php
                            require_once 'regdet/otros/otros_datos_tab.php';
                            ?>
                    </div>	 
                </div> <!-- fin Tab panes -->
            </form>
        </div>
    </div>
</div>

<script>
//Buscar Transportista Salida
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_nomtranspote").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspote").val(ui.item.id);
			$("#c_ructransporte").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Ingreso
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_nomtranspoteb").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspoteb").val(ui.item.id);
			$("#c_ructransporteb").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar Transportista Local
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_nomtranspotel").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=ProveedorBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.PR_RAZO,
                            value: item.PR_RAZO,
							ruc: item.PR_NRUC
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_nomtranspotel").val(ui.item.id);
			$("#c_ructransportel").val(ui.item.ruc);
          
        }
    })
	/* Fin Autocomplete de producto, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_eirconten").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=EirBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.c_numeir,
                            value: item.c_numeir,
							c_nserie: item.c_nserie,
							c_codprd: item.c_codprd
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_desconten").val(ui.item.c_codprd);
			$("#Lc_numequipo").val(ui.item.c_nserie);
          
        }
    })
	/* Fin Autocomplete de EIR, jquery UI */
})

//Buscar EIR contenedor
$(document).ready(function(){     
    /* Autocomplete de c_nomtranspote, jquery UI */
    $("#c_eirgen").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=01&a=EirBuscar', //en procesosinv.controller.php
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return { 
                            id: item.c_numeir,
                            value: item.c_numeir,
							c_nserie: item.c_nserie,
							c_codprd: item.c_codprd
                        }
                    }))
                }
            })
        },<!--c_nomcli,c_codcli,c_contac,c_telef,c_email--> 
        select: function (e, ui) {
            $("#c_desgen").val(ui.item.c_codprd);
			$("#c_numgen").val(ui.item.c_nserie);
          
        }
    })
	/* Fin Autocomplete de EIR, jquery UI */
})

function agregarEmpTrans(){
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=regprov","miwin",
		"width=800,height=400,scrollbars=yes");
}

//CHOFER SALIDA
function abrirmodalTrans(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspote').value;
	 var c_ructransporte=document.getElementById('c_ructransporte').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspote").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'salida'});	
	 }
}
function agregarChofer(){
	c_ructransporte=document.getElementById('c_ructransporte').value;
	c_nomtranspote=document.getElementById('c_nomtranspote').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspote").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporte+"&nom="+c_nomtranspote,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}

//CHOFER INGRESO
function agregarChoferb(){
	c_ructransporteb=document.getElementById('c_ructransporteb').value;
	c_nomtranspoteb=document.getElementById('c_nomtranspoteb').value;
	 if(c_nomtranspoteb==''||c_ructransporteb==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteb").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransporteb+"&nom="+c_nomtranspoteb,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}
function abrirmodalTransb(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspoteb').value;
	 var c_ructransporte=document.getElementById('c_ructransporteb').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspoteb").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'ingreso'});	
	 }
}

//CHOFER LOCAL
function agregarChoferl(){
	c_ructransportel=document.getElementById('c_ructransportel').value;
	c_nomtranspotel=document.getElementById('c_nomtranspotel').value;
	 if(c_nomtranspotel==''||c_ructransportel==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotel").focus();
			return 0; 
	 }else{
		miPopup = window.open("../../MVC_Controlador/cajaC.php?acc=adicionatransportista&cod="+c_ructransportel+"&nom="+c_nomtranspotel,"miwin",
		"width=800,height=400,scrollbars=yes");
	 }
}
function abrirmodalTransl(){	
	 var c_nomtranspote=document.getElementById('c_nomtranspotel').value;
	 var c_ructransporte=document.getElementById('c_ructransportel').value;
	 if(c_nomtranspote==''||c_ructransporte==''){
			var mensje = "Falta Buscar Transportista ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_nomtranspotel").focus();
			return 0; 
	 }else{
		$('#my_modalTrans').modal('show');
	 	document.getElementById('empresa').value=c_nomtranspote;
	 	$('#tablaTrans').load("?c=01&a=VerChoferes",{c_nomtranspote:c_nomtranspote,c_ructransporte:c_ructransporte,tipo:'local'});	
	 }
}
</script>

