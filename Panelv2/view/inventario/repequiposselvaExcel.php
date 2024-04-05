<script>
function cerrar(){
self.close();
}

function exportarexcel(url){
     //location.href="?c=liq01&a=ExportarExcelLiquidacion";
     $("#datos_a_enviar").val( $("<div>").append( $("#tablas").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
	// window.close(); 	 
	 var cierre = setTimeout('cerrar()', 2000); 
}

</script>

<style>
#ocultar{
visibility:hidden;	
}
</style>

<body onLoad="exportarexcel();"> 

<div class="container-fluid" id="ocultar"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE LIQUIDACION DE ASIGNACIONES</div>
    <?php 
		if($ListarDatosDetAsig!=NULL){
	?>
    		   <br />
   			 <form action="?c=rep01&a=equiposselvaExportarExcel" method="post" id="FormularioExportacion" >
               <!--<input id="exportar" name="exportar" onClick="exportarexcel();" type="button" value="EXPORTAR A EXCEL" class="btn btn-primary"   />-->
               <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
             </form>	 
     <table id="tablas" class="table table-hover"   >       	  
           <thead>   
           <!--<tr>
          	 <td colspan="15">
           		 <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Cotizacion,Cliente, Equipo y/o nro Guia" />
          	 </td>          
           </tr>-->          
       	   <tr>
       	     <td>Item</td>
       	     <td>Nro Cotizacion</td>
       	     <td>Cliente</td>
       	     <td>Item Coti</td>
       	     <td>Equipos</td>
       	     <td>Condicion</td>
       	     <td bgcolor="#C1FFFF">Nro Asignacion</td>
       	     <td bgcolor="#C1FFFF">Fecha Asignacion</td>
       	     <td bgcolor="#FFE6BF">Nro Guia</td>
       	     <td bgcolor="#FFE6BF">Fecha Guia</td>
       	     <td bgcolor="#FFE6BF">Lugar</td>
       	     <td bgcolor="#ACACE3">Nro EIR Salida</td>
       	     <td bgcolor="#ACACE3">Fecha EIR Salida</td>
       	     <!--<td bgcolor="#FFFFCC">Nro</td>
       	     <td bgcolor="#FFFFCC">Fecha</td>-->
             <td bgcolor="#ACACE3">Dias Transcurridos</td>
        </tr>
        </thead>
        <?php 
			$i=0;
			foreach($ListarDatosDetAsig as $det){
				$i++;
				$c_numped=$det->c_numped;
				$n_item=$det->n_item;
				$c_codcont=$det->c_idequipo;
				$tipo=$det->c_tipcoti;
				//datos eir ingrso por cambio
				$sw_cambio=$det->sw_cambio;
				$c_numeir=$det->c_numeir;
				if($c_numeir!=''){
					$datoseiringrecambio=$this->modeliqui->ListarDatosEirIngresoCambio($c_numeir);
					$c_fechoraingx=$datoseiringrecambio->c_fechora;
					if($c_fechoraingx!=""){
						$c_fechoraingcambio=vfecha(substr($c_fechoraingx,0,10));
					}else{
						$c_fechoraingcambio='';
					}
				}
				//fin datos eir ingrso por cambio
					
				//001=Venta Prod || 017=Serv. Alquiler || 015=Serv. Mantenimiento|| 002=Serv. Flete || 019 Venta Serv. Otro
				  if($tipo=='001'){ $tipocot='VENTA';}
				  else if($tipo=='002'){ $tipocot='FLETE';}
				  else if($tipo=='015'){ $tipocot='MANTENIMIENTO';}
				  else if($tipo=='017'){ $tipocot='ALQUILER';}
				  else if($tipo=='019'){ $tipocot='OTROS';}
				  else $tipocot="";
				 //asignacion 
				  //$n_idasig=$det->n_idasig;//cabecera //funciona si ningun item de la cotizacion es por cambio				  
				  $BuscarAsig=$this->modeliqui->BuscarAsig($c_numped,$c_codcont);
				  $n_idasig=$BuscarAsig->IdAsig;
				  //if($n_idasig!=""){
					//$datosasig=$this->modeliqui->ListarDatosAsignacion($n_idasig);
					$d_fecregx=$BuscarAsig->d_fecreg;
					if($d_fecregx!=""){
						$d_fecreg=vfecha(substr($d_fecregx,0,10));
					}else{
						$d_fecreg='';
						}
				 // }
				  $c_numguiadesp=$BuscarAsig->c_numguiadesp;					  				
				
				//guia		
				//$c_numguiadesp=$det->c_numguiadesp;//detalle
				$datosguia=$this->modeliqui->ListarDatosGuia($c_numguiadesp);
				$d_fecguix=$datosguia->d_fecgui;	
				if($d_fecguix!=""){
					$d_fecgui=vfecha(substr($d_fecguix,0,10));
				}else{
					$d_fecgui='';
				}
				//eir salida
				if($c_numguiadesp!=''){
					$datoseirsal=$this->modeliqui->ListarDatosEirSalida($c_numguiadesp,$c_codcont);
					$c_numeirsal=$datoseirsal->c_numeir;
					$c_fechorax=$datoseirsal->c_fechora;
					if($c_fechorax!=""){
						$c_fechora=vfecha(substr($c_fechorax,0,10));
					}else{
						$c_fechora='';
						}
				}
				
				//eir entrada
				if($c_numguiadesp!=''){
					$datoseiringre=$this->modeliqui->ListarDatosEirEntrada($c_numguiadesp,$c_codcont);
					$c_numeiring=$datoseiringre->c_numeir;
					$c_fechoraingx=$datoseiringre->c_fechora;
					if($c_fechoraingx!=""){
						$c_fechoraing=vfecha(substr($c_fechoraingx,0,10));
					}else{
						$c_fechoraing='';
						}
				}				
				
		?>        
       	   <tr>
       	     <td><?php echo $i; ?></td>
       	     <td><?php echo $c_numped; ?></td>
       	     <td><?php echo utf8_encode($det->c_nomcli); ?></td>
       	       <td><?php echo $n_item; ?></td>
       	       <td><?php echo $c_codcont; ?></td>
       	       <td><?php echo $tipocot; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $n_idasig; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $d_fecreg; ?></td>
               <td bgcolor="#FFE6BF">
                 <?php echo $c_numguiadesp; ?>
               </td>
               <td bgcolor="#FFE6BF"><?php echo $d_fecgui; ?></td>
               <td bgcolor="#FFE6BF"><?php echo $det->c_depentrega; ?></td>
               <td bgcolor="#ACACE3"><?php  echo $c_numeirsal; ?>               
               </td>
               <td bgcolor="#ACACE3"><?php echo $c_fechora; ?></td>
               <?php /*?><td bgcolor="#FFFFCC">
               		<?php if(trim($c_numeiring)!="" && trim($c_numeiring)!="0"){?>
          				 <a  href="?c=inv06&a=VerEir&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&neir=<?php echo $c_numeiring; ?>&eq=<?php echo $c_codcont ?>" ><?php echo $c_numeiring; ?> </a>
			 	    <?php  }else{  echo $c_numeiring;  }?> 
               </td>
               <td bgcolor="#FFFFCC"><?php echo $c_fechoraing; ?></td><?php */?>
               <td bgcolor="#FFFFCC"><?php $ndiast=compararFechas(date('d/m/Y'), $d_fecgui); echo $ndiast.' Dias'; ?></td>
           </tr>
           
         <?php } ?>    
                   
     </table>

 <?php } ?> 
 
</div>
</div>

</body>