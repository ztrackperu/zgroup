<script type="text/javascript">
function llenardescripcion(){
	document.getElementById('descripcion').value=document.getElementById('in_codi').options[document.getElementById('in_codi').selectedIndex].text;
}
function VerBusquedaEquipo(){
	//serie=document.getElementById('serie').value;
	in_codi=document.getElementById('in_codi').value;
	descripcion=document.getElementById('in_codi').options[document.getElementById('in_codi').selectedIndex].text;
	if(in_codi!="SELECCIONE"){		
		//location.href="?c=inv00&a=VerBusquedaEquipo&in_codi="+in_codi+"&descripcion="+descripcion+"";		
		document.getElementById("frmVerDetalleReg").submit();
	}else{
		alert('Seleccione un Tipo de Producto');
	}
	//alert('hola'+ncoti);          
	
}
</script>
<div class="container-fluid">
<div class="panel panel-primary">
	<!-- Default panel contents -->
<div class="panel-heading"> <?php  echo $titulo;?> </strong></div>
  
<form class="form-horizontal" id="frmVerDetalleReg" method="post" action="<?php  echo $url;?>" >
 <table class="table table-striped">
  <tr>
    <td colspan="2">
    	<select name="in_codi" id="in_codi" class="form-control"  onchange="llenardescripcion()" >
            <option value="SELECCIONE">SELECCIONE PRODUCTO.</option>            		
            <?php foreach($this->maestroinv->ListarProductoDetRegistrar() as $a):	 ?>                                               
            <option value="<?php echo $a->	c_nomgen; ?>" > <?php echo $a->c_nomgen; ?> </option>
            <?php  endforeach;	 ?>
         </select>	
         <input id="descripcion" name="descripcion"   type="hidden"  />
    </td>
     <td width="242"><input class="btn btn-default" type="button" onclick="VerBusquedaEquipo()" value="Aceptar"/> <!--<a class="btn btn-default" onClick="VerBusquedaEquipo()" >Aceptar</a>--></td>   
  	 <td width="183">
     	<?php /*?><input id="serie" name="serie" value="<?php echo $serie?>"    type="hidden"  /><?php */?>     	
     </td>        
  </tr>
  	    
 </table>
</form> 
  
</div> 
</div>       
