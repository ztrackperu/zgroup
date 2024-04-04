<!--inicio cabecera-->
<!DOCTYPE html>
<html lang="es">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema Zgroup 2.0</title> 
       
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" /> 
       
	   <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script> 
       <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->  
       <script type="text/javascript" src="assets/js/jquery.min.js"></script> 
	   <script type="text/javascript" src="assets/js/mascara/jquery.maskedinput.js"></script>
		<!--Mascara extraida de http://digitalbush.com/projects/masked-input-plugin-->
</head>
<body>
<!--fin cabecera-->



<script>

 $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
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
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#d_fectran" ).datepicker();
   //$( "#d_fecref" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
 });
 
  
     function regresar(){
         location.href="../MVC_Controlador/cajaC.php?acc=lguia01"; 
      }

    function validarguardar(){
		var c_idequipo=document.getElementById('c_idequipo').value;
 	   if(c_idequipo==''){			
			var mensje = "Falta Ingresar Serie ...!!!";
				$('#alertone').modal('show');
				$('#mensaje').val(mensje);
			document.getElementById("c_idequipo").focus();
			return 0;
		}		
		   document.getElementById("form1").submit();		
	}


</script>
<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">VER DETALLE DEL ULTIMO EIR SALIDA DE ALQUILER/VENTA</div>
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

 <form class="form-horizontal" id="form1" name="form1" method="post" action="../MVC_Controlador/InventarioC.php?acc=detallesituequipo&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>" >
 	<div class="form-control-static" align="right">
   	 <a class="btn btn-success" onClick="validarguardar();" href="#">Buscar</a>&nbsp;<a class="btn btn-danger" onClick="regresar();" >Cancelar</a>&nbsp;<a class="btn btn-warning" onClick="location.reload();" >Refrescar</a>&nbsp;
    </div>     
       <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>
       <!--fila 1-->
       <div class="form-group">       	  
          <label class="control-label col-xs-2">Buscar Equipo</label>
          <div class="col-xs-3">
           <input name="c_idequipo" id="c_idequipo" class="form-control input-sm"  type="text" placeholder="Serie o Codigo de Equipo"   />     	 
          </div>            
       </div>  
       <!--fila 2-->
        <div class="form-group">
       <label class="control-label col-xs-1"></label>
       </div>      
            
 
</form>   		                

</div>
</div>
</div>


<!--inicio footer-->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/ini.js"></script>
        <script src="assets/js/jquery.anexsoft-validator.js"></script>
        <script src="assets/js/js-render.js"></script>
        <script src="assets/js/jquery.anexgrid.min.js"></script>
    </body>
</html>
<!--fin footer-->