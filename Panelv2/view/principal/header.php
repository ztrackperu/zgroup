<!DOCTYPE html>
<html lang="es">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Pragma" CONTENT="no-cache"> 
<head>
    <title>Sistema Zgroup 2.0</title>   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <!--Styles-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link href="assets/vendor/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" /> 
    <link href="assets/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="assets/vendor/css/select2.css" />    
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/bootstrap-switch.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css/parsley.css">    
    <link rel="stylesheet" type="text/css" href="assets/datatable/resources/syntax/shCore.css">
    <link rel="stylesheet" type="text/css" href="assets/css/imprimir.css"/>
    <link href="assets/notificaciones/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- PNotify -->
    <link href="assets/vendor/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="assets/vendor/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="assets/vendor/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Libraries  -->
    <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script> 
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/notificaciones/bower_components/morrisjs/morris.min.js"></script>
    <script type="text/javascript" src="assets/js/mascara/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="assets/js/jquery.redirect.js"></script>
    <script type="text/javascript" src="assets/vendor/js/select2.full.js"></script>
    <script type="text/javascript" src="assets/vendor/js/select2.es.js"></script>
	<!--<script type="text/javascript" src="assets/vendor/js/bootstrap-datetimepicker.es.js"></script>-->
    <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/vendor/js/es-ES.js"></script>
    <!--<script type="text/javascript" src="assets/vendor/js/bootstrap-datetimepicker.js"></script>-->
    <script type="text/javascript" src="assets/vendor/js/moment.js"></script>
    <script type="text/javascript" src="assets/vendor/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/vendor/js/underscore-min.js"></script>
    <script type="text/javascript" src="assets/vendor/js/calendar.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/vendor/js/dataTables.responsive.min.js"></script>
    <script src="assets/vendor/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/js/dataTables.select.min.js"></script>
    <script src="assets/vendor/js/buttons.flash.min.js"></script>
    <script src="assets/vendor/js/buttons.bootstrap.min.js"></script>
    <script src="assets/vendor/js/bootstrap-switch.js"></script>
    <script src="assets/vendor/js/bootstrap-submenu.js"></script>
    <script src="assets/vendor/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/vendor/js/jszip.min.js"></script>
    <script src="assets/vendor/js/pdfmake.min.js"></script>
    <script src="assets/vendor/js/vfs_fonts.js"></script>
    <script src="assets/vendor/js/buttons.html5.min.js"></script>
    <script src="assets/vendor/js/buttons.print.min.js"></script>
    <script src="assets/vendor/js/buttons.colVis.min.js"></script>
    <script src="assets/vendor/js/responsive.bootstrap.min.js"></script>
    <script src="assets/vendor/js/moment-lang-es.js"></script>
    <script src="assets/vendor/js/parsley.min.js"></script>
    <script src="assets/vendor/js/parsley.es.js"></script>
    <script src="assets/vendor/js/jquery.mask.min.js"></script>
    <script src="assets/vendor/js/Chart.js"></script>
<!-- PNotify -->
    <script src="assets/vendor/pnotify/dist/pnotify.js"></script>
    <script src="assets/vendor/pnotify/dist/pnotify.buttons.js"></script>
    <script src="assets/vendor/pnotify/dist/pnotify.nonblock.js"></script>
</head>
<input type="hidden" name="dni" id="dni" value="<?php echo $_GET["udni"]?>"/>
<script>
 //$(document).ready(function() {
	// var dni=$("#dni").val();
	 //if(dni=="72439917" || dni=="47623322" || dni=="41696274"){
		// init_PNotify();
		 //setInterval(init_PNotify, 500000)
	 //}		    			
	//setInterval(init_PNotify, 300000);//cada 30 minutos (3000=3segundos)
//}); 
 function init_PNotify() {
	 
$.ajax({
    type: "POST",
    url: 'index.php?c=log04&a=CotPreAprobadas', //en LOGIN.CONTROLLER
    dataType: "json",
    data: {anio:"2019"},
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
				text: "Num. Cotizacion:"+datos[i].c_numped+"  \nCliente:"+datos[i].c_nomcli+" /Asunto:"+datos[i].c_asunto+"\nFecha PreAprobacion:"+(datos[i].d_fecapr).substr(0,10)+"\nUsusario:"+datos[i].c_oper,
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