<!--require_once 'view/principal/header.php';-->
<?php 
$fecha=date('d/m/Y');
  foreach($this->maestro->ListarTipCambio($fecha) as $tc):
$tcambio=$tc->tc_cmp;
$tfec=$tc->tc_fecha;
endforeach
?>
<div class="container-fluid">
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
	  var res = data_id.split("|");
    }

    $('#cliente').val(res[0]);
	$('#bookId').val(res[1]);
	
	$('#xcliente').val(res[0]);
	$('#xbookId').val(res[1]);
	var moneda=res[2];
	if(moneda=='1'){
		var m='DOLARES'
		}else if(moneda=='0'){
			m='SOLES'
			}
	$('#moneda').val(m);
	$('#codmoneda').val(res[2]);		
	
	
  })
});

</script>
<script>
//document.frmelimina.submit();
function elimina(){
document.getElementById("frmelimina").submit();
}
function CambioMoneda(){
	var xmon=document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
	if(xmon=='000'){
		alert('Seleccione Moneda');
		return 0;					
	}else if(document.frmcambiomone.codmoneda.value==document.frmcambiomone.xc_codmon.value){
		alert('Las Monedas no puede ser iguales');
		return 0;							
		}else if (document.frmcambiomone.tc.value==''){
		alert('Tipo cambio incorrecto');
		return 0;							
			
			}else{
			document.getElementById("frmcambiomone").submit();	
		}
}
function OnchangeTipMoneda(){
var c_codmon=document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
	document.frmcambiomone.xc_codmon.value=c_codmon
	//document.Frmregcoti.c_desprd.focus();
	}	
</script>
<body>
<!--modal CAMBIO DE MONEDA-->
 <form id="frmcambiomone" name="frmcambiomone" method="post" action="?c=03&a=UpdTipMoneCotizacion">
<div class="modal fade" id="my_modaltc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Cambio de Moneda Cotizacion</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente</label>
            <input name="bookId" type="text" class="form-control input-sm" id="bookId" value="" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion</label>
            <input name="cliente" type="text" class="form-control input-sm" id="cliente" readonly>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Moneda Actual</label>
            <input name="moneda" type="text" class="form-control input-sm" id="moneda" readonly>
            <input name="codmoneda"  id="codmoneda" type="hidden" value="">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Moneda Destino</label>
           <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" > 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>
              <input type="hidden" name="xc_codmon" id="xc_codmon" />
          </div>
              <div class="form-group">
            <label for="recipient-name" class="control-label">Tipo Cambio Actual :<?php echo vfecha(substr($tfec,0,10)) ?></label>
            <input type="text" class="form-control input-sm" id="tc" name="tc" value="<?php echo $tcambio ?>">
          </div>
        Nota: Una vez procesado no podrá reversar el proceso.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="CambioMoneda()">Procesar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</form>
 <!--fin modal CAMBIO DE MONEDA-->



<!--modal de eliminacion de cotizacion-->
 <form id="frmelimina" name="frmelimina" method="post" action="?c=03&a=EliminaCotizacion">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminacion Cotizacion</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente</label>
            <input type="text" class="form-control" id="xbookId" name="xbookId" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion</label>
            <input type="text" class="form-control" id="xcliente" name="xcliente">
          </div>
        
      </div>
       Nota: Una vez procesado no podrá reversar el proceso.
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="elimina()">Eliminar</button>
     
        </div>
      </div>
    </div>
  </div>
   </form>
 <!--fin modal eliminacion-->
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
	  var res = data_id.split("|");
    }

    $('#cli').val(res[0]);
	$('#ncoti').val(res[1]);//
	$('#cro').val(res[2]);
	$('#cpad').val(res[3]);
	$('#gdes').val(res[4]);



  })
});
</script> 
<!--modal ver mas datos-->
<div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Cotizacion Datos Adicionales</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente</label>
            <input type="text" class="form-control" id="ncoti" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion</label>
            <input type="text" class="form-control" id="cli">
          </div>
                  <div class="form-group">
            <label for="recipient-name" class="control-label">Cronograma</label>
            <input type="text" class="form-control" id="cro">
          </div>
                 <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion Padre</label>
            <input type="text" class="form-control" id="cpad">
          </div>
                    <div class="form-group">
            <label for="recipient-name" class="control-label">Guia Despacho</label>
            <input type="text" class="form-control" id="gdes">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       
        </form>
        </div>
      </div>
    </div>
  </div>

 <!--fin modal ver mas datos-->
<script language="javascript">
function exportarexcel(){
     //location.href="?c=05&a=ExportarExcelProd";
     $("#datos_a_enviar").val( $("<div>").append( $("#tabla").eq(0).clone()).html());
     $("#FormularioExportacion").submit();
}
</script>

<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE GUIA GENERAL</div>
</div>
<form action="?c=inv07&a=ReporteGuiadetalladoexcel" method="post" id="FormularioExportacion">
    <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
</form> 

<?php $xsw=$_REQUEST['valorcambio'];
			 $zsw=$_REQUEST['xvalorcambio'];
			 $cli=$_REQUEST['c_codcli'];
			 $xfi=$_REQUEST['finicio'];
			 $xff=$_REQUEST['ffinal'];?>
<table width="570" class="table table-hover" id="tabla" style="font-size:12px">
    <thead>
		<tr>
          <td colspan="6">
            <input id="buscar" size="45" type="text" class="form-control" placeholder="Filtre aqui ingrese nro Guia y/o Cliente" />
          </td>
          <td>
          		<a class="btn btn-info" href="?c=inv07&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=VerReporteGuiaGeneral">Retornar</a>&nbsp;
          		<a href="#" onClick="exportarexcel()" class="botonExcel" ><img src="assets/images/excel.png"  class="img-thumbnail" width="35" height="35"></a>
          </td>
        </tr>
        <tr>
            <th width="99" style="width:100px;">Nro</th>
            <th width="93" style="width:100px;">Documento</th>
            <th width="50"style="width:250px;">Cliente</th>
            <th width="50" style="width:50px;">Fecha Guia</th>
            <th width="49" style="width:250px;">Trasportista</th>
            <th width="59" style="width:10px;">Estado</th>
            <th width="138" style="width:160px;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php $i=0; foreach($this->model->ListaReporteGuiaGeneral($xsw,$zsw,$cli,$fi,$ff) as $r):  $i++; ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r->c_numguia; ?></td>
            <td><?php echo utf8_encode($r->c_nomdes); ?></td>
            <td>
			<?php  echo vfecha(substr(($r->d_fecgui),0,10)); ?><!--</a>--></td>
            <td><?php  echo $r->c_nomtra; ?></td>
            <td>
            <?php if($r->c_estado==1){ echo '<strong style="color:#0D1FC6">Activo</strong>'; 
			  }elseif($r->c_estado==4){ echo '<strong style="color:#FF0000">Anulado</strong>';
			  }  ?>
            
            
            </td>
            
            <td>
<a href="view/inventario/guiaa4/test.php?c_numguia=<?php echo $r->c_numguia?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" target="_blank" class="btn btn-primary">Imprimir</a>
                  
      
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

</div> 
<script>
document.querySelector("#buscar").onkeyup = function(){
        $TableFilter("#tabla", this.value);
    }
    
    $TableFilter = function(id, value){
        var rows = document.querySelectorAll(id + ' tbody tr');
        
        for(var i = 0; i < rows.length; i++){
            var showRow = false;
            
            var row = rows[i];
            row.style.display = 'none';
            
            for(var x = 0; x < row.childElementCount; x++){
                if(row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1){
                    showRow = true;
                    break;
                }
            }
            
            if(showRow){
                row.style.display = null;
            }
        }
    }
</script>
<!--<ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>-->
   		             
    
   <!-- </div>		--> 
 
 <!--require_once 'view/principal/footer.php';-->
 </body>