
<!--require_once 'view/principal/header.php';-->

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
    });
});

</script>
<script>
function ampliacion(){
    var val1=document.getElementById('nrocoti').value;
    var val2=document.getElementById('cli').value;
    var val3=document.getElementById('c_meses').value;
    var sw=document.getElementById('contcrono').value;
    //var mod=document.getElementById('contcrono').value;
    if(sw=='0'){
        location.href="?c=05&a=AmpliaCronoCoti&coti="+val1+"&cli="+val2+"&cuota="+val3+"&mod="+<?php echo $_GET['mod']; ?>+"&udni="+<?php echo $udni; ?>
    }else{
        mensje = "Cliente Tiene Pendiente Cuotas por Pagar";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);	
    }
    // 

}

function CierreEquipos(){
    //alert ('hola');
    var contador = document.getElementById("contador").value;
    var cont = 0; 
// alert (contador);
    for (var x=1; x<contador; x++) {
        //alert (x);
        //alert(document.getElementById('sel'+x).value);
        if (document.getElementById('sel'+x).checked==true) {			
            cont=cont+1;
            //alert(cont);
        }
    }

    if(cont==0){
        mensje = "No Hay Cuotas Seleccionadas";
        $('#alertone').modal('show');
        $('#mensaje').val(mensje);			
    }else{
        if(confirm("Seguro de Cerrar Equipos  Seleccionadas ?")){
            document.getElementById("Frmregcoti").submit();
        }			
    }
	
}
function elimina(){
    document.getElementById("frmelimina").submit();
}

$(document).ready(function(){
    $("#frmelimina").submit(function(){
        return $(this).validate();
    });
});

</script>
<?php foreach($this->model->ObtenerDataCronograma($_GET['ncoti']) as $r): 
	$cliente=$r->c_nomcli;
	$cot=$r->c_numped;
	$fecap=$r->d_fecapr;
	$codcli=$r->c_codcli;
	$meses=$r->c_meses;
endforeach;

?>
<body>

<form id="frmelimina" name="frmelimina" method="post" action="?c=05&a=CerrarCronograma&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Cerrar Cronograma</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente</label><input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
            <input type="text" class="form-control" id="xbookId" name="xbookId" 
            value="<?php echo $cliente ?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion</label>
            <input type="text" class="form-control" id="cotipadre" name="cotipadre" 
            value="<?php echo $cot ?>">
          </div>
                    <div class="form-group">
            <label for="recipient-name" class="control-label">Motivo</label>
            <input type="text" class="form-control" id="motivo" name="motivo" 
            value="" data-validacion-tipo="requerido"><input name="xlogin" id="xlogin" type="hidden" value="<?php echo $udni; ?>">
          </div>
        
      </div>
       Nota: Una vez procesado no podrá reversar el proceso.
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary" >Cerrar Cronograma</button>
     
        </div>
      </div>
    </div>
  </div>
   </form>
 <!--fin modal eliminacion-->


<!-- Modal -->
<div id="alertone" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">Mensaje del Sistema</h5>
      </div>
    <div class="alert alert-warning">
    <input name="mensaje" id="mensaje" type="text" size="35" disabled="disabled" 
    style="background-color: #FAF3D1;border: 0px solid #A8A8A8;" />

 
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--fin modal alertas info-->

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
    });
});
function guardar(){
    if(confirm("Seguro de Realizar Renovación Cotizacion ?")){
        document.getElementById("Frmregcoti").submit();
    }	
}
</script> 


<!--modal ver mas datos-->
<div class="modal fade" id="my_modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Datos Adicionales Cuota</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">cuota.</label>
            <input type="text" class="form-control" id="ncoti">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nro Cotización</label>
            <input type="text" class="form-control" id="cli">
          </div>
                  <div class="form-group">
            <label for="recipient-name" class="control-label">Equipo</label>
            <input type="text" class="form-control" id="cro">
          </div>
                 <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha Inicio</label>
            <input type="text" class="form-control" id="cpad">
          </div>
                    <div class="form-group">
            <label for="recipient-name" class="control-label">Fecha Fin</label>
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


<form class="form-horizontal" id="Frmregcoti" name="Frmregcoti" method="post" action="?c=05&a=CierreEquiposTemporal&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">


 

<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">CIERRE DE CRONOGRAMA DE PAGO.</div>
</div>
<div class="form-control-static" align="right">
<!--          <a class="btn btn-success" onClick="renovar()" >Renovar</a>&nbsp;
  <a class="btn btn-warning" onClick="ampliacion()">Ampliar</a>&nbsp;
  -->
    <input class="btn btn-success" type="button" onClick="CierreEquipos()" value="Cierre Equipos"/>

  
  
  
 <!-- <a class="btn btn-danger" href="?c=03&a=RegCotizaciones">Anular Cuota</a>&nbsp;-->

  <a class="btn btn-info" href="indexa.php?c=05&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>
          </div>
     
          <div class="form-group">
          <label class="control-label col-xs-3">Cotizacion Principal: <?php echo $cot ?></label>
          <label class="control-label col-xs-3">Fecha Aprobacion: <?php echo vfecha(substr($fecap,0,10)); ?></label>
          <label class="control-label col-xs-4">Cliente: <?php echo $cliente; ?></label>
          <input type="hidden" name="nrocoti" id="nrocoti"  value="<?php echo $cot ?>" />
          <input type="hidden" name="cli" id="cli" value="<?php echo $codcli ?>" />
          <input type="hidden" name="login" id="login" value="<?php echo $login ?>  " />
           </div>
         
<table width="825" class="table table-hover" id="tabla" style="font-size:12px">
    <thead>
		<tr>
            <th width="99" bgcolor="#CCCCFF" style="width:40px;">Cuota </th>
            <th width="93" bgcolor="#CCCCFF" style="width:120px;">Cotizacion Renovacion</th>
            <th width="50" bgcolor="#CCCCFF"style="width:10px;"></th>
            <th width="50" bgcolor="#CCCCFF"style="width:250px;">Descripcion</th>
            <th width="50" bgcolor="#CCCCFF" style="width:50px;">Equipo</th>
            <th width="49" bgcolor="#CCCCFF" style="width:50px;">Monto</th>
            <th width="49" bgcolor="#CCCCFF" style="width:50px;">Fecha Vcto</th>
            <th width="59" bgcolor="#CCCCFF" style="width:10px;">Factura</th>
            <th width="59" bgcolor="#CCCCFF" style="width:10px;">Estado Cuota</th>
            <th width="138" bgcolor="#CCCCFF" style="width:160px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php $i=0; $cont=0; foreach($this->model->ObtenerDataCronograma($_GET['ncoti']) as $r): 
            
		
		if($r->c_nrofac==NULL && $r->estcuota=="0"){
		$cont++;
		}
		
		
			$fven=vfecha(substr($r->d_fecven,0,10));
	 list($day,$mon,$year) = explode('/',$fven);
   	 $ffin= date('d/m/Y',mktime(0,0,0,$mon,$day+29,$year));
			
	
	?>
        <tr>
            <td><?php echo number_format($r->n_cuota,0); ?>
                <input name="xidcuota" id="xidcuota" type="hidden" value="<?php echo number_format($r->n_cuota,0); ?>">
            </td>
            <td>
                <?php echo $r->c_nroped; ?><input type="hidden" name="<?php echo'coti'.$i?>" id="<?php echo'coti'.$i?>" value="<?php echo $r->c_nroped;?>" />
            </td>
            <td><?php // $fecpago=vfecha(substr($item['d_fecven'],0,10));  $fp=substr($fecpago,3,8);  $factu; ?>       
                <input name="sel[]" type="checkbox" id="<?php echo'sel'.$i?>" value="<?php echo $r->n_idreg; //$factu!=$fp ||  ?>"
                <?php if(!empty($r->c_nrofac)){ /*||$r->c_nroped!=NULL*/ ?>   disabled="disabled"  onclick="javascript: return false;"  <?php } ?>>
            </td>
            <td>
                <input name="<?php echo 'c_codprd'.$i ?>"  id="<?php echo 'c_codprd'.$i ?>" type="hidden" 
            value="<?php echo $r->c_codprd?>" />
	  
      <input name="<?php echo 'c_desprd'.$i ?>"  id="<?php echo 'c_desprd'.$i ?>" type="hidden" 
      value="<?php echo $r->c_desprd?>" />
			
			<?php echo utf8_encode($r->c_desprd); ?></td>
            <td><?php /*?><a href="?c=Alumno&a=Crud&id=<?php echo $r->c_numguia; ?>"><?php */?>
			
			<input name="<?php echo 'c_codequipo'.$i ?>"  id="<?php echo 'c_codequipo'.$i ?>" type="hidden" value="<?php echo $r->c_codequipo ?>" />
			<?php echo $r->c_codequipo; ?><!--</a>--></td>
            <td>
			<input name="<?php echo 'n_importe'.$i ?>"  id="<?php echo 'n_importe'.$i ?>" type="hidden" value="<?php echo $r->n_importe?>"/>
			<?php echo number_format($r->n_importe,2) ?>&nbsp;
            
            
            <input name="<?php echo 'n_dscto'.$i ?>"  id="<?php echo 'n_dscto'.$i ?>" type="hidden" value="<?php echo $r->n_dscto?>"/>
			<?php // echo number_format($r->n_dscto,2) ?>&nbsp;
            </td>
            <td><?php  echo vfecha(substr($r->d_fecven,0,10)); ?></td>
            <td><?php echo $r->c_nrofac ?>&nbsp;
            
            <input type="hidden" name="finicio[]" id="<?php echo 'finicio'.$i ?>" value="<?php echo $fven ?>" />
            
             <input type="hidden" name="ffin[]" id="<?php echo 'ffin'.$i ?>" value="<?php echo $ffin ?>"/>
            
            
            </td>
            <td>
            <?php if( $r->c_nrofac==NULL){ echo '<strong style="color:#0D1FC6">Pendiente</strong>'; 
			 
			  }elseif($r->c_nrofac!=NULL ){ echo '<strong style="color:#FF0000">Facturado</strong>';} ?>
            
            
            </td>
            
            <td>
<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Accion <span class="caret"></span>
  </a> 
  <ul class="dropdown-menu" role="menu">

    <?php /*?>  <?php if($r->c_estado==0){?>
    <li><a href="?c=05&a=ListaCuotasCronograma&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Ver detalle</a></li>
    <?php }?><?php */?>
    
     <li><a href="?c=05&a=ImpCotizaciones&ncoti=<?php echo $r->c_nroped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Imprimir</a></li>
      <li><a href="#my_modal2" data-toggle="modal" 
      data-id="<?php echo $r->c_nroped.'|'.number_format($r->n_cuota,0).'|'.$r->c_codequipo.'|'.$fven.'|'.$ffin; ?>">Ver Datos</a></li>

   
  </ul>
</div>
            </td>
        </tr>
    <?php $i++; endforeach; ?>
    </tbody>
</table> 
</div> 

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
<?php /*?> <?php if($_GET['udni']=='45847891' || $_GET['udni']=='43377015'){ ?><?php */?>
  <input name="contcrono" type="text" id="contcrono" value="<?php echo $cont ?>" size="2" />
<?php /*?>  <?php }?><?php */?>
   <input name="c_meses" type="hidden" id="c_meses" value="<?php echo $meses ?>" size="2" readonly/>
  <input name="contador" id="contador" type="hidden" value="<?php echo $i ?>" ></form>
 </body>
