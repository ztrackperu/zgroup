
<script type="text/javascript">

function abrirmensaje(){	
	//var mensje = "¿Desea agregar Detalle al Servicio de Transporte?";	
	$('#alertone').modal('show');
	//$('#mensaje').val(mensje);
}

function aceptar(){
	document.getElementById("Frmpregunta").submit();
}

function cancelar(){
	var Id_servicio=document.getElementById('Id_servicio').value;
	location.href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminDetTransporte&Id_servicio="+Id_servicio;
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
        <!--Para url=?c=01&a=RegSegDetTransporte-->
         <input name="Id_servicio" id="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>"   /> 
         <input name="c_tipmov" id="c_tipmov" type="hidden" value="<?php echo $c_tipmov ?>"   />         
         <input name="n_item" id="n_item" type="hidden"  value="<?php echo $n_item ?>"  />          
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
  		                




