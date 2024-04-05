<div class="panel-group">
  <div class="panel panel-info ">
    <div class="panel-heading">Indicadores de Gestión</div>
    <div class="panel-body">
      <div class="row">
      <?php
        require_once('indicadores/ventas_totales.php');
        require_once('indicadores/cantidad_clientes.php');
        require_once('indicadores/mejor_cliente.php');
        require_once('indicadores/mejor_vendedor.php');
        require_once('indicadores/detalle_indicadores_mejores.php');
      ?>
      </div>
	  <br>
	<div class="row">
      <?php
		require_once('indicadores/dashboard_ventas.php');
	  ?>
    </div>      
    </div>
  </div>
</div>