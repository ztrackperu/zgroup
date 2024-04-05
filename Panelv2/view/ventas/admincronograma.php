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
	
  })
});

</script>

<body>
<!--modal de eliminacion de cotizacion-->
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminacion Cotizacion</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cliente</label>
            <input type="text" class="form-control" id="bookId" value="">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Cotizacion</label>
            <input type="text" class="form-control" id="cliente">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Eliminar</button>
        </form>
        </div>
      </div>
    </div>
  </div>

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
 

<div class="panel panel-primary ">
  <!-- Default panel contents -->
  <div class="panel-heading">ADMINISTRACION CRONOGRAMA</div>
</div>
<table width="570" class="table table-hover" id="tabla" style="font-size:12px">
    <thead>
		<tr>
          <td colspan="6">
            <input id="buscar" size="45" type="text" class="form-control" placeholder="Filtre aqui ingrese nro cotizacion y/o asunto" />
          </td>
          <td><a class="btn btn-info" href="indexa.php?c=05">Retornar</a></td>
          
        </tr>
        <tr>
            <th width="99" style="width:100px;">Nro </th>
            <th width="93" style="width:300px;">Cliente</th>
            <th width="50"style="width:400px;">Asunto</th>
            <th width="50" style="width:50px;">Meses</th>
            <th width="49" style="width:50px;">Fecha</th>
            <th width="59" style="width:10px;">Estado</th>
            <th width="138" style="width:160px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarCronograma($valor,$sw) as $r): ?>
        <tr>
            <td><?php echo $r->c_numped; ?></td>
            <td><?php echo $r->c_nomcli; ?></td>
            <td><?php echo utf8_encode($r->c_asunto); ?></td>
            <td><?php /*?><a href="?c=Alumno&a=Crud&id=<?php echo $r->c_numguia; ?>"><?php */?>
			<?php echo $r->c_meses; ?><!--</a>--></td>
            <td><?php  echo $r->c_fecreg; ?></td>
            <td>
            <?php if( $r->c_estado==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			 
			  }elseif($r->c_estado==2 ){ echo '<strong style="color:#FF0000">Cerrado</strong>';}elseif($r->c_estado==4 ){ echo '<strong style="color:#FF0000">ANULADO</strong>';} ?> 
            
            
            </td>
            
            <td>
<div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Accion <span class="caret"></span>
  </a> 
  <ul class="dropdown-menu" role="menu">

      <?php if($r->c_estado==0){?>
    <li><a href="?c=05&a=ListCuotasCronograma&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Ver detalle</a></li>
    
    
      <li><a href="?c=05&a=ListCuotasCronogramaEquipos&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Cierre Parcial</a></li>
    
    <?php }?>
    
     <li><a href="?c=05&a=ImpCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Imprimir</a></li>

   
  </ul>
</div>
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