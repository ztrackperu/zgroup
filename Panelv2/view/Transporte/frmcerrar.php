
<script type="text/javascript">

function abrirmensaje(){	
	var mensje = "¿TIENE MAS DE 10 SERVICIOS DE TRANSPORTE POR CERRAR?";	
	$('#alertone').modal('show');
	$('#mensaje').val(mensje);
}

function aceptar(){
	document.getElementById("Frmpregunta").submit();	
	//location.href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php //echo $_GET['udni']?>&mod=<?php //echo $_GET['mod']?>&a=RegDetTransporte";
}

function cancelar(){
	location.href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminTransporte";
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
      <form id="Frmpregunta"  method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=VerCerrarDetTransp">
         <div class="alert alert-warning">
            <input name="mensaje" id="mensaje" type="text" style="background-color: #FAF3D1;
            border: 0px solid #A8A8A8;width:500px;" value="<?php echo $mensaje; ?>" readonly /> 
            <div class="form-group">      
                <label class="control-label col-xs-5" style="text-align:center;">Seleccione Tipo Movimiento</label>
                <div class="col-xs-3">
                	<select name="c_tipmov" id="c_tipmov" class="form-control input-sm">
                    	<option value="I">Importacion</option>
                        <option value="E">Exportacion</option>
                        <option value="L">Local</option>
                    </select>                	        
                </div> 
      	   </div>  
         </div>              
      <!--<div class="modal-body"> 
      		<div class="form-group">      
                <label class="control-label col-xs-3" style="text-align:center;">Seleccione Tipo</label>
                <div class="col-xs-4">
                	<select name="c_tipmov" id="c_tipmov" class="form-control input-sm">
                    	<option value="I">Importacion</option>
                        <option value="E">Exportacion</option>
                        <option value="L">Local</option>
                    </select>                	        
                </div> 
      	   </div> 
      </div>-->
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onClick="aceptar()" >Aceptar</button>
        <button type="button" class="btn btn-default" onClick="cancelar()" >Cancelar</button>
      </div>
      </form>
      
    </div>

  </div>
</div>
<!--fin modal alertas info-->   
  		                




