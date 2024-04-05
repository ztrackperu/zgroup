<!--require_once 'view/principal/header.php';-->

<div class="container">
<script>
$(document).ready(function() {
 $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

    var data_id = '';

    if (typeof $(this).data('id') !== 'undefined') {

      data_id = $(this).data('id');
    }

    $('#bookId').val(data_id);
  })
});
</script>
<div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Eliminacion Cliente</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Seguro de Eliminar al Cliente</label>
            <input type="text" class="form-control" id="bookId" value="">
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
 

<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">MANTENIMIENTO CLIENTES</div>

 <table width="200" class="table">
  <tr>
    <td><input name="textfield" type="text" class="form-control" id="textfield" placeholder="Ingrese su Ruc y/o Nombre Cliente"  /></td>
    <td><a class="btn btn-default" href="?c=Alumno&a=Crud">Buscar</a></td>

    <td align="right"><a class="btn btn-success" href="?c=Alumno&a=Crud">Nuevo cliente</a></td>
  </tr>
</table>
<table class="table table-striped" style="font-size:12px">
    <thead>
        <tr>
            <!--<th style="width:100px;">Codigo</th>-->
            <th width:"100px";>Nro Dcto</th>
            <th>Razon Social</th>
            <th>Contacto</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Email</th>
            <th style="width:10px;"></th>
            <th style="width:110px;"></th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarClientes() as $r):
	 ?>
        <tr>
             <td><?php echo $r->CC_NRUC; ?></td>
            <td><?php echo $r->CC_RAZO; ?></td>
           <td><?php echo $r->CC_RESP; ?></td>
            <td><?php echo $r->CC_TELE ?></td>
            <td><?php echo $r->CC_EMAI; ?></td>
             <td></td>
            <td>
   <div class="dropdown">
  <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
    Accion <span class="caret"></span>
  </a> 
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Editar</a></li>
    <li><a href="#">Duplicar</a></li>
   
    <li><a href="#my_modal" data-toggle="modal" data-id="<?php echo $r->CC_RUC; ?>">Eliminar</a></li>
     <li><a href="#">Imprimir</a></li>
    <li class="divider"></li>
    <li><a href="#">Aprobar</a></li>
    <li><a href="#">Liberar</a></li>    
  </ul>
</div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<ul class="pagination">
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
          </ul>
   		 </nav>               
    	</div>
   <!-- </div>		--> 

<!--require_once 'view/principal/footer.php';-->