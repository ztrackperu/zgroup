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
<!--fin cabecera-->

<script type="text/javascript">

function abrirmensaje(){	
	//var mensje = "¿Desea agregar Detalle al Servicio de Transporte?";	
	$('#alertone').modal('show');
	//$('#mensaje').val(mensje);
}

function aceptar(){
	document.getElementById("Frmpregunta").submit();	
	//location.href="?c=01&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=RegDetTransporte";
}

function cancelar(){
	location.href="?c=01&udni=<?php echo $_GET['udni']?>&mod=<?php echo $_GET['mod']?>&a=AdminTransporte";
}

</script>



<body onLoad="abrirmensaje();"> 
  
 <!-- Inicio Modal alerts -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
      <form id="Frmpregunta"  method="post" action="<?php echo $url; ?>">
     <div class="alert alert-warning">
        <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
        border: 0px solid #A8A8A8;width:500px;" value="<?php echo $mensaje; ?>" readonly />
        <!--Para url=?c=01&a=RegDetTransporte-->
         <input name="c_nrofw" id="c_nrofw" type="hidden"  value="<?php echo $c_nrofw ?>"  />
         <input name="Id_servicio" id="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>"   /> 
         <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />  
         <input name="c_numped" id="c_numped" type="hidden" value="<?php echo $c_numped ?>"   />
         <!--Para url=?c=01&a=GuardarDetViaticos-->
         <input name="Id_viatico" id="Id_viatico" type="hidden"  value="<?php echo $Id_viatico ?>"  />          
        <span id="mensaje" class="label label-default"></span>     
	 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="aceptar()" >Aceptar</button>
        <button type="button" class="btn btn-default" onClick="cancelar()" >Cancelar</button>
      </div>
      </form>
      
    </div>

  </div>
</div>
<!--fin modal alertas info-->   
  		                




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