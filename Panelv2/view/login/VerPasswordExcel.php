<script>

function exportarexcel(){
     //location.href="?c=liq01&a=ExportarExcelLiquidacion";
     $("#datos_a_enviar").val( $("<div>").append( $("#tablas").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
}

</script>

<style>
#ocultar{
visibility:hidden;	
}
</style>

<body>  <!--onLoad="exportarexcel()"-->

<div class="container-fluid" id=""> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">DATOS DEL USUARIO QUE OLVIDO SU PASSWORD</div>
    <?php 
		if($ListarDatosUsuario!=NULL){
			$det=$ListarDatosUsuario;
			$idempresa=$det['idempresa'];
			if($idempresa=='1'){
				$empresa='ZGROUP';
			}else if($idempresa=='2'){
				$empresa='PSCARGO';
			}else if($idempresa=='3'){
				$empresa='FOODZ';
			}
	?>
    		   <br />
   			 <form action="?c=log01&a=VerPasswordExportarExcel" method="post" id="FormularioExportacion" name="FormularioExportacion">
               <!--<input id="exportar" name="exportar" onClick="exportarexcel();" type="button" value="EXPORTAR A EXCEL" class="btn btn-primary"   />-->
               <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
             </form>	 
     <table id="tablas" class="table table-hover"   >       	  
           <thead>   
         
       	   <tr>
       	     <td>DNI</td>
       	     <td>Usuario</td>
       	     <td>Nombres</td>
       	     <td>Apellidos</td>
       	     <td>Empresa</td>
       	     <td bgcolor="#C1FFFF">Password</td>
             </tr>
        </thead>
              
       	   <tr>
       	      <td><?php echo $det['udni']; ?></td>
       	       <td><?php echo $det['usuario']; ?></td>
       	       <td><?php echo $det['nombres']; ?></td>
       	       <td><?php echo $det['paterno'].' '.$det['materno']; ?></td>
       	       <td><?php echo $empresa; ?></td>
               <td bgcolor="#9999FF"><?php echo $det['clave']; ?></td>
           </tr>          
           
     </table>

 <?php } ?> 
 
</div>
</div>

</body>