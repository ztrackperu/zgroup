<!--inicia nuevo filter, exportar pdf,csv,excel y copy, paginacion-->
    <script src="tables/ga.js" async type="text/javascript"></script><script type="text/javascript" src="tables/site.js">
	</script>
	<script type="text/javascript" src="tables/dynamic.php" async>
	</script>
	<!--<script type="text/javascript" language="javascript" src="tables/jquery-1.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/jquery.js">
	</script>-->
	<script type="text/javascript" language="javascript" src="tables/dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/dataTables_002.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/buttons_002.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/jszip.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/pdfmake.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/buttons_003.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/buttons_004.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="tables/demo.js">
	</script>
    <link rel="stylesheet" type="text/css" href="tables/dataTables.css"><!--STILO A LA TABLA-->
    <link rel="stylesheet" type="text/css" href="tables/buttons.css"> <!--MENSAJE DEL BOTON COPIAR-->
  <!--fin nuevo fiter, exportar pdf,csv,excel y copy, paginacion-->
  
<script type="text/javascript" class="init">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script> 

<script>
function consultar(){
	
	//if(confirm("Seguro de Generar asignacion ?")){		
			document.getElementById("frm-reportes").submit();		
	// }
}

function abrirmodaldetcambio(c_numeir,c_fechoraingcambio){
	$('#my_modal').modal('show');
	document.getElementById('eir').value=c_numeir;
	document.getElementById('c_fechoraingcambio').value=c_fechoraingcambio;
	 $('#tabla').load("?c=liq01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=verHistorialLiqui",{c_numeir:c_numeir});	
}


</script>

<!--modal de ver equipos-->
<form class="form-horizontal" id="frmequipo" name="frmequipo">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
       <div class="modal-header">      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Historial de cambio de Equipo </h4>	<br />
        <b>EIR Ingreso por cambio:</b> <input name="eir" id="eir" type="text" style="border: 0px;width:55px;" readonly /><br />
        <b>Fecha de EIR por cambio:</b> <input name="c_fechoraingcambio" id="c_fechoraingcambio" type="text" style="border: 0px;width:120px;" readonly />
       </div>
       
       <div class="modal-body">
            <table id="tabla" class="table table-hover" style="font-size:12px;">
        		<!--Contenido se encuentra en verEquiposDispo.php-->
            </table> 
        </div>
        
      </div>
    </div>
  </div>
</form>
 <!--fin modal de ver equipos-->
 
 <!-- Inicio Modal -->
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

<div class="container-fluid"> 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE LIQUIDACION</div>

 <form class="form-horizontal" id="frm-reportes" method="post" action="?c=liq01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=Reportes" >
 <table class="table"> 
  	 <tr>
  	   <td width="64">Ingrese N° de Cotizacion</td>
  	   <td width="148">
  	     <input name="c_numped" id="c_numped" class="form-control" type="text" value="<?php echo $c_numped; ?>" placeholder="Busqueda de Cotizacion"  />
  	   </td>
  	   <td width="218"><a class="btn btn-default" onClick="consultar()" >Consultar</a> </td>  		
	   </tr> 
       
       <!--<tr>
           <td width="64">Cliente es:</td>
           <td width="148"><input  class="form-control" type="text"  /></td>		
	   </tr>--> 
     </table>
    </form> 
    <?php 
		if($ListarDatosDetCoti!=NULL){
			foreach($ListarDatosDetCoti as $cab){
				$c_nomcli=utf8_encode($cab->c_nomcli);
			}
	?> 
    <table id="example" class="display table table-hover" cellspacing="0" width="100%" style="font-size:12px">
    	 <thead> 
      	   <tr>
          	  <td colspan="5">Cliente es:</td>
              <td colspan="7"><?php echo $c_nomcli; ?></td>		
	       </tr>  
       	   <tr>
       	     <td colspan="12">LIQUIDACION</td>
       	   </tr>
       	   <tr>
       	     <td>Item Coti</td>
       	     <td>Equipos</td>
       	     <td width="10">Cambio Equipo</td>
       	     <td>Condicion</td>
       	     <td bgcolor="#C1FFFF">Nro</td>
       	     <td bgcolor="#C1FFFF">Fecha</td>
       	     <td bgcolor="#FFE6BF">Nro</td>
       	     <td bgcolor="#FFE6BF">Fecha</td>
       	     <td bgcolor="#ACACE3">Nro</td>
       	     <td bgcolor="#ACACE3">Fecha</td>
       	     <td bgcolor="#FFFFCC">Nro</td>
       	     <td bgcolor="#FFFFCC">Fecha</td>
        </tr>
     </thead>
   	 <tbody>
        <?php 
			foreach($ListarDatosDetCoti as $det){
				$c_numped=$det->c_numped;
				$n_item=$det->n_item;
				$c_codcont=$det->c_codcont;
				$tipo=$det->c_tipped;
				//datos eir ingrso por cambio
				$sw_cambio=$det->sw_cambio;
				$c_numeir=$det->c_numeir;
				if($c_numeir!=''){
					$datoseiringrecambio=$this->model->ListarDatosEirIngresoCambio($c_numeir);
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
				  $BuscarAsig=$this->model->BuscarAsig($c_numped,$c_codcont);
				  $n_idasig=$BuscarAsig->IdAsig;
				  //if($n_idasig!=""){
					//$datosasig=$this->model->ListarDatosAsignacion($n_idasig);
					$d_fecregx=$BuscarAsig->d_fecreg;
					if($d_fecregx!=""){
						$d_fecreg=vfecha(substr($d_fecregx,0,10));
					}
				 // }
				  $c_numguiadesp=$BuscarAsig->c_numguiadesp;					  				
				
				//guia		
				//$c_numguiadesp=$det->c_numguiadesp;//detalle
				$datosguia=$this->model->ListarDatosGuia($c_numguiadesp);
				$d_fecguix=$datosguia->d_fecgui;	
				if($d_fecguix!=""){
					$d_fecgui=vfecha(substr($d_fecguix,0,10));
				}else{
					$d_fecgui='';
				}
				//eir salida
				if($c_numguiadesp!=''){
					$datoseirsal=$this->model->ListarDatosEirSalida($c_numguiadesp,$c_codcont);
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
					$datoseiringre=$this->model->ListarDatosEirEntrada($c_numguiadesp,$c_codcont);
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
       	       <td><?php echo $n_item; ?></td>
       	       <td><?php echo $c_codcont; ?></td>
       	       <td>
			   		<?php if($sw_cambio!='0'){ ?>
                        <a onclick="abrirmodaldetcambio('<?php echo $c_numeir; ?>','<?php echo $c_fechoraingcambio; ?>')" >
                            <?php echo '<font color="#FF0000">SI</font>'; ?>
                        </a>
                    <?php }else{ echo '<font color="#0000FF">NO</font>';} ?>
               </td>
               <td><?php echo $tipocot; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $n_idasig; ?></td>
               <td bgcolor="#C1FFFF"><?php echo $d_fecreg; ?></td>
               <td bgcolor="#FFE6BF"><?php echo $c_numguiadesp; ?></td>
               <td bgcolor="#FFE6BF"><?php echo $d_fecgui; ?></td>
               <td bgcolor="#ACACE3"><?php echo $c_numeirsal; ?></td>
               <td bgcolor="#ACACE3"><?php echo $c_fechora; ?></td>
               <td bgcolor="#FFFFCC"><?php echo $c_numeiring; ?></td>
               <td bgcolor="#FFFFCC"><?php echo $c_fechoraing; ?></td>
           </tr>
           
         <?php } ?>    
     </tbody>             
     </table>

 <?php } ?> 
 
</div>
</div>
   
<script>

/*$(document).ready(function(){    
    // Autocomplete de cotizacion, jquery UI 
    $("#cotizacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv04&a=BuscarCotiAprobadas',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.c_numped,
                            value: item.cliente,
							clie: item.c_nomcli,
							ruc: item.CC_NRUC,
							codcli: item.c_codcli,
							idasig: item.n_idasig
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#ncoti").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#ruc").val(ui.item.ruc);
			$("#nasig").val(ui.item.idasig);           
        }
    })
})*/

/*$(document).ready(function(){    
    // Autocomplete de cotizacion, jquery UI 
    $("#asignacion").autocomplete({
        dataType: 'JSON',
        source: function (request, response) {
            jQuery.ajax({
                url: '?c=inv04&a=BuscarAsignacion',
                type: "post",
                dataType: "json",
                data: {
                    criterio: request.term
                },
                success: function (data) {
                    response($.map(data, function (item) {
                        return {
                            id: item.IdAsig,
                            value: item.cliente,
							clie: item.c_nomcli,
							ruc: item.c_ruccli,
							codcli: item.c_codcli,
							numped: item.c_numped
                        }
                    }))
                }
            })
        },
        select: function (e, ui) {
            $("#nasig").val(ui.item.id);
			$("#c_nomcli").val(ui.item.clie);
			$("#c_codcli").val(ui.item.codcli); 
			$("#ruc").val(ui.item.ruc); 
			$("#ncoti").val(ui.item.numped);           
        }
    })
})*/

   
</script>

</body>