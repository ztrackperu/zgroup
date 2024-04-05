<script type="text/javascript">
function VerDetalleRegUpd(){	
	serie=document.getElementById("cadena1").value;
		/* if(serie.length<12){				
			alert('El codigo ingresado debe tener 12 digitos');	
			document.getElementById("cadena1").focus();			
				return 0;
		 }*/
		 if(serie==''){				
			alert('Ingrese la serie del equipo correctamente');	
			document.getElementById("cadena1").focus();			
				return 0;
		 }else{
			//location.href="?c=inv00&a=VerDetalleRegUpd&serie="+serie+"&in_codi="+in_codi+"&cod_tipo="+cod_tipo;	 
		 	document.getElementById("frm-VerDetalleRegUpd").submit();
		 } 	
}
</script>

<body> 

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo $titulo; ?></div>
<div>  
<form class="form-horizontal" id="frm-VerDetalleRegUpd" method="post" action="<?php echo $url; ?>" >
     <table class="table table-striped">
      <tr>
        <td colspan="2">         
            <?php /*?><input id="in_codi" name="in_codi"         class="form-control" type="hidden" value="<?php echo $in_codi; ?>"  /> <?php */?>
            <input id="descripcion" name="descripcion" class="form-control" type="hidden" value="<?php echo $descripcion; ?>"  />
            <input id="cod_tipo" name="cod_tipo"       class="form-control" type="hidden" value="<?php echo $cod_tipo; ?>"  />
            <!--<input id="cadena1" name="cadena1"        class="form-control" type="hidden"  /> -->           
             <div class="form-group" style="margin-left:10px;" >
                <label   style="width:7%;float:left">Ejemplo.:</label>
                <div class="col-xs-2">
                	<?php if($cod_tipo=='001' || $cod_tipo=='015' || $cod_tipo=='016' || $cod_tipo=='002' ){  //contenedores dry,reefer ?>
                     <label>ZGRU123456-1</label> 
                    <?php }elseif($cod_tipo=='003'){  //generadores?>
                     <label>ZGRU1234?5678</label>
                    <?php }elseif($cod_tipo=='004' || $cod_tipo=='005'){ //carretas?>
                     <label>ABC-123</label>
                    <?php }elseif($cod_tipo=='012'){ //transformadores ?>
                  	 <label>ZGGT1234?5</label> 
                    <?php } ?>
               		
                </div>                  	
              </div>
             <div class="form-group" style="margin-left:10px;">
                <input id="paraalinear" name="paraalinear" type="text" maxlength="1" style="width:5%;float:left;visibility:hidden" />
                <div class="col-xs-2">
					<input  id="cadena1" name="cadena1" class="form-control"  type="text" />
                </div>
                <input type="button" value="OK" class="btn btn-default" onClick="VerDetalleRegUpd()"  />
             </div>
        </td>    
      </tr>  	 
    </table>
</form>

</div>
</div>
</div>

</body>

<script>
   jQuery(function($){
      // $("#contenedores").mask("99/99/9999");
	  <?php if($cod_tipo=='001' || $cod_tipo=='015' || $cod_tipo=='016' || $cod_tipo=='002' ){  //contenedores dry,reefer  ?>
	   $("#cadena1").mask("aaaa999999-9"); 
	   <?php }elseif($cod_tipo=='003'){ //generadores ?>
	   $("#cadena1").mask("aaaa9999?9999"); 
	   <?php }elseif($cod_tipo=='004' || $cod_tipo=='005'){ //carretas ?>
	    $("#cadena1").mask("aaa-999"); 
	    <?php }elseif($cod_tipo=='012'){ //transformadores ?>
	    $("#cadena1").mask("aaaa9999?9"); 
	    <?php } ?>
       
	});
</script>