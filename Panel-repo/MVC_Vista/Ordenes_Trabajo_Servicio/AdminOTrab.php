<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Zgroup </title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<!-- <link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all" />
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/formulario.css" type="text/css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<!---->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script> -->
<!-- <script type="text/javascript" src="../Admision/js/jquery.js"></script>
<script type="text/javascript" src="../Admision/js/jquery-ui.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.img.preload.js"></script>
<script type="text/javascript" src="../Admision/js/hint.js"></script>
<script type="text/javascript" src="../Admision/js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="../Admision/js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="../Admision/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="../Admision/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="../Admision/js/custom_blue.js"></script> -->

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src=""></script>


<script type="text/javascript">
function eliminarot(ot,udni,id){
	var nro=ot;
	var xudni=udni;
	var xid=id
	var mensaje='Seguro de Eliminar Orden Trabajo Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
	if(confirm(mensaje)){
	location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminaotrab&ot="+nro+"&udni="+xudni+"&id="+xid;
	 }else{
	 return false;
	}
}

function filtro(){
	document.getElementById('form1').submit();	
	}
	
function eliminaros(os,udni){
	
	var nro=os;
	var dni=udni
	
	var mensaje='Seguro de Eliminar Orden Trabajo Nro: '+nro;
	//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
	if(confirm(mensaje)){
	location.href="../MVC_Controlador/OrdenTrabajoC.php?acc=eliminarot&os="+nro+"&udni="+dni;
	 }else{
		 return false;
		}
 
}
</script>

<style>
th { font-size: 11px; }
td { font-size: 11px; }
</style>
</head>
<body>
<div class="container-fluid">
<form id="form1" name="form1" method="post" action="../MVC_Controlador/OrdenTrabajoC.php?acc=buscarOtra&udni=<?php echo $val=$_GET['udni']; ?>&mod=<?php echo $_GET['mod'];?>">  
            <strong style="color:#FFF"><?php echo $mod=$_GET['mod']; ?></strong>
				<div class="card border-success mb-12" style="max-width: 218rem;">
				  <div class="card-header bg-transparent border-success">
					<h4>ORDENES DE TRABAJO</h4>
				  </div>
				  <div class="card-body text-success">
					<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=regotra&udni=<?php echo $val;?>" type="button" class="btn btn-success">Generar Orden Trabajo +</a></br>					
						<input name="sw" type="radio" id="sw" value="3" checked="checked" />
										NRO ORDEN TRABAJO(EJM=45)&nbsp; &nbsp; 
									<input type="radio" name="sw" id="sw" value="2" />
										POR PROVEEDOR &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="4" />
										POR CÓDIGO DE EQUIPO &nbsp; &nbsp; 
									<input type="radio" name="sw" id="sw" value="5" />
										POR DESCRIPCION DE EQUIPO &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="6" />
										POR TRABAJO REALIZADO &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="7" />
										REALIZADO POR&nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="8" />
										POR FECHA &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="9" />
										POR NRO DE GUIA &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="10" />
										POR NRO DE TICKET &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="11" />
										POR NRO DE COTIZACION &nbsp; &nbsp;
									<input type="radio" name="sw" id="sw" value="12" />
										POR UNIDAD&nbsp; &nbsp;
				  </div>
				  <div class="card-footer bg-transparent border-success">									
						<input name="des" type="text" id="des" size="40" />
                                <input type="submit" name="button" id="button" value="FILTRAR" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="../images/icon_edit.png" alt="editar" width="18" height="18" class="help" title="Editar"/>Editar
                                &nbsp;<img src="../images/search.png" alt="1" width="19" height="19" title="Ver Orden"/>Ver 
                                &nbsp;<img src="../images/icon_delete.png" alt="2" width="18" height="18" title="Eliminar"/>Elimina 
                                &nbsp;<img src="../images/icon_posts.png" alt="3" width="22" height="22" title="Aprobar"/>Cierra OT 
                                      <img src="../images/Coherence.png" alt="5" width="22" height="22"/>Genera OS				
				  </div>
				</div>
				<div class="table-responsive-xl">
				<table class="table" id="tabla">		
                        <thead class="thead-dark">
                            <th scope="col">Nro Orden</th>
                            <th scope="col">Trabajo</th>
                            <th scope="col">Glosa</th>
                            <th scope="col">Realizado Por</th>
                            <th scope="col" >Equipo</th>
                            <th scope="col">Equipo2</th>
                            <th scope="col" >Descrip. Equipo</th>
                            <th scope="col">Nro Report</th>
                            <th scope="col">Nro Guia</th>
                            <th scope="col" >Nro Ticket</th>
                            <th scope="col" >Unidad</th>
                            <th scope="col" >Fecha</th>
                            <th scope="col" >Generado Por:</th>
                            <th scope="col" >Observ.:</th>
                            <th scope="col" >Ref. Cot.:</th>
                            <th scope="col" >Doc.ref. 1:</th>
                            <th scope="col" >Doc. ref. 2:</th>
                            <th scope="col" >Estado</th>
                            <th scope="col" >Fecha de Cierre</th>
                            <th scope="col" >Cerrar OT</th>
                            <th scope="col">Admin.</th>
                            <th scope="col">Subir /Ver Archivos</th>
                        </thead>
                    </thead>
                    <tbody>
                        <?php $listaos = $resulos;?>
                            <?php $i = 1;
                                if($listaot!=NULL)
                                {
                                    foreach($listaot as $item)
                                    { //select c_numos,c_asunto,c_nonprov,d_fecos,c_estado,c_refcoti from
                            ?>
                        <tr>
                            <td>OT<?php echo $item["c_numot"];?></td>
                            <td bgcolor="#CCCCCC"><?php echo $item["c_treal"];?></td>
                            <td bgcolor="#FFFFCC"><?php echo $item["c_asunto"] ?>&nbsp;</td>
                            <td bgcolor="#FFFFCC"><?php echo $item['c_ejecuta'] ?>&nbsp;</td>
                            <td bgcolor="#FFFFCC"><?php echo $item["unidad"];?></td>
                            <td bgcolor="#FFFFCC"><?php echo $item["c_serieequipo"];?></td>
                            <td bgcolor="#FFFFCC"><?php echo $item["c_desequipo"];?></td>
                            <td bgcolor="#FFFFFF"><?php echo $item["c_nroreporte"];?>&nbsp;</td>
                            <td bgcolor="#FFFFFF"><?php echo $item["nro_guia"];?>&nbsp;</td>
                            <td bgcolor="#FFFFFF"><?php echo $item["nro_ticket"];?>&nbsp;</td>
                            <td bgcolor="#FFFFFF"><?php echo $item["c_cliente"];?>&nbsp;</td>
                            <td bgcolor="#FFFFFF"><?php echo vfecha(substr($item["d_fecdcto"],0,10));?></td>
                            <td bgcolor="#FFFFFF"><?php echo $item["c_usrcrea"];?></td>
                            <td bgcolor="#FFFFFF"><?php echo $item["c_osb"];?></td>
                            <td bgcolor="#FFFFFF"><?php echo $item["c_refcot"];?></td>
                            <td bgcolor="#FFFFFF"><?php if($item["c_tipdoc"]=='001'){$d='F';}elseif($item["c_tipdoc"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc'].$item['c_nrodoc']  ?>&nbsp;</td>
							<td bgcolor="#FFFFFF"><?php if($item["c_tipdoc2"]=='001'){$d='F';}elseif($item["c_tipdoc2"]=='002'){$d='B';}else{$d="";} 
                                                            echo $d.$item['c_serdoc2'].$item['c_nrodoc2']  ?>&nbsp;</td>
                            <td bgcolor="#FFFFFF"><?php    if($item['n_swtapr']==0 && $item['c_estado']==1){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
                                                      }elseif($item['n_swtapr']==1 && $item['c_estado']==2){ echo '<strong style="color:#060">Cerrado</strong>';
                                                      }elseif($item['c_estado']==4 && $item['n_swtapr']==0){ echo '<strong style="color:#FF0000">Anulado</strong>';} ?>&nbsp;</td>
							<td bgcolor="#FFFFFF"><?php echo $item["d_feccierra"];?></td>						  
                            <td align="center" bgcolor="#FFFFFF">
                                <?php if($item['n_swtapr']=='0' && $item['c_estado']=='0' && $mod=='1'){ ?>
                                  <?php } ?>
                                <?php if($item['c_estado']=='1' && $_GET['udni']!='42541054'){ ?>
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VercerrarOTrab&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/icon_posts.png" width="22" height="22" title="Cerrar Orden Trabajo" /></a>
                            </td>
                                <?php }?>
                                <?php if($item['n_swtapr']=='1' && $item['c_estado']=='0' && $mod=='1'){ ?>            
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verliberacionot&amp;os=<?php echo $item["c_numos"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/iconos/doc.png" width="22" height="22" title="Liberar Orden Trabajo" /></a>
									&nbsp;
								   <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra2&ot=<?php echo $item["c_numot"]; ?>"> OS</a>&nbsp;
                                <?php } ?> 
                            <td align="center" bgcolor="#FFFFFF">
                                <?php if($item['c_estado']=='1'){ ?>
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VERupdateOT&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>"> <img src="../images/icon_edit.png" alt="Editar Ord. Serv." width="18" height="18" class="help" title="Editar Ord. Serv." /></a>
                                    &nbsp;
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=VerGenOS&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>"><img src="../images/Coherence.png" width="22" height="22" title="Genera Orden Serv." /></a>
                                    &nbsp;
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra&ot=<?php echo $item["c_numot"]; ?>"><img src="../images/search.png" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
                                   &nbsp;
								   <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra2&ot=<?php echo $item["c_numot"]; ?>"> OS</a>&nbsp;
                                    &nbsp;
                                    <a href="#" onclick="eliminarot('<?php echo $item["c_numot"];?>','<?php echo $_GET['udni'];?>','<?php echo $item["unidad"];?>')"><img src="../images/icon_delete.png" width="18" height="18" title="Eliminar" /></a>&nbsp;
                                <?php }else{?>
                                    &nbsp;
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra&ot=<?php echo $item["c_numot"]; ?>"><img src="../images/search.png" width="19" height="19" title="Imprimir Orden" /></a>&nbsp;
									 <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=veroTra2&ot=<?php echo $item["c_numot"]; ?>"> OS</a>&nbsp;
								<?php }?>
                                <?php if($_GET['udni']=='70498492'){ ?>
                                    <a href="../MVC_Controlador/OrdenTrabajoC.php?acc=duplicaot&amp;ot=<?php echo $item["c_numot"];?>&amp;udni=<?php echo $_GET['udni'];?>&tipo=<?php echo $item['CC_TCLI']; ?>&doc=<?php echo $item['CC_TDOC'];  ?>">
                                        <img src="../images/icono-descargas.jpg" alt="" width="23" height="22" title="Duplicar Orden Compra" />
                                    </a>
                                <?php } ?>
								<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verfrmrefot&ot=<?php echo $item["c_numot"]; ?>&udni=<?php echo $_GET['udni'];?>&fact=1" title="ref factura 1">
                                                <img src="../images/search.png" width="16" height="16" /></a>
												<a href="../MVC_Controlador/OrdenTrabajoC.php?acc=verfrmrefot&ot=<?php echo $item["c_numot"]; ?>&udni=<?php echo $_GET['udni'];?>&fact=2" title="ref factura 2">
                                                <img src="../images/icon_pages.png" width="16" height="16" /></a>
                            </td>
							<td bgcolor="#FFFFFF">
									<input type="hidden" id="cod_ot" />
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-codigoot="<?php echo $item["c_numot"]; ?>">
										Subir
									</button>
									<?php 									
									if($item["Id"] && $item["archivo"] == ""){
										$disabled="disabled";
									}else{
										$disabled="";
									}?>
									<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#verdocumento" <?php echo $disabled?> data-archivoot="<?php echo $item["archivo"]; ?>">
										Ver
									</button>
							</td>
							
                        </tr>
                                <?php $i += 1; }} ?>
                    </tbody>
                </table>
                </div>      
   
    </form>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <form action="#"  method="post" id="FrmAgregarDocumentos" name="FrmAgregarDocumentos"  enctype="multipart/form-data">
						  <div class="modal-body">						
							  <div class="form-group">
								<label for="recipient-name" class="col-form-label">Seleccionar archivo:</label></br>
								<input type="hidden"   name="cod_ot" id="cod_ot"/>
								<input type="hidden"   name="udni" id="udni" value="<?php echo $_GET['udni']?>"/>
								<input type="file"   name="AddArchivos" id="AddArchivos"  readonly/>
							  </div>					
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" id="subir" class="btn btn-primary" disabled>Subir archivo</button>
						  </div>
					  </form>
					</div>
				</div>
			</div>
	
		<div class="modal fade" id="verdocumento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Visualizar archivo</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 text-center">													
									<img id="imagen">
										<embed  width="600" height="800">
									<!--<embed src="ARCHIVOS_FOODZ\CERTIFICADO_SENASA/10000002-2.pdf" width="600" height="500">-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	

 </div>		
</body>
<script>
$(document).ready(function (){
$("#AddArchivos").change(function(){
$("#subir").prop("disabled",this.files.lenght == 0);
})
	$("#FrmAgregarDocumentos").submit(function(e){
		e.preventDefault();
		var datos=new FormData(this);
		$.ajax({
		url: '../MVC_Controlador/OrdenTrabajoC.php?acc=AgregarDocumentos',
		data: datos,				
		processData:false,
		contentType:false,
		type: "post",
		success: function(str){				
			$('#exampleModal').modal('hide');
			$('#AddArchivos').val('');
			$('#cod_ot').val('');

			}
		}); 
	});   
});


jQuery(document).ready(function() {
$("#tabla").dataTable().fnDestroy();
    var table = $('#tabla').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		paging: true,
		order: [[ 0, "desc" ]],
		dom			: 'Bfrtip',
		ordering: true,
		buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            //'pdfHtml5',
			        {//valores por defecto orientation:'portrait' and pageSize:'A4',
            extend: 'pdfHtml5',
		//	title: 'ListaPersonal'
            orientation: 'landscape',
            pageSize: 'A4'
        }
	  ]
    } );
    
});

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('codigoot') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  
  var modal = $(this)
   
  modal.find('.modal-title').text('Subir Archivo para la OT ' + recipient)
  modal.find('.modal-body #cod_ot').val(recipient)
  //modal.find('.modal-body input').val(recipient)
})

$('#verdocumento').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('archivoot') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  //modal.find('.modal-title').text('New message to ' + recipient)
  var res=recipient.split(".")[1];
  console.log(res);
  if(res=='jpg'|| res=='png'||res=='jpeg'){
	  modal.find('.modal-body img').attr('style','display:show') 
	modal.find('.modal-body img').attr('src',recipient) 
	modal.find('.modal-body img').attr('width',500)  
	modal.find('.modal-body img').attr('height',650)  
	modal.find('.modal-body embed').attr('style','display:none')  
  }
if(res=='pdf'){
	modal.find('.modal-body embed').attr('style','display:show')  
	modal.find('.modal-body img').attr('style','display:none') 
  modal.find('.modal-body embed').attr('src',recipient)
  modal.find('.modal-body img').attr('src','')
}
/* $("#verdocumento").on('hidden.bs.modal', function () {
    modal.find('.modal-body embed').attr('src','') 
	modal.find('.modal-body img').attr('src','')	
    }); */


});

</script>
</html>