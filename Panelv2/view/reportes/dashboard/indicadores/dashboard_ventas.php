  <!-- Morris charts -->
  <link rel="stylesheet" href="assets/morris.js/morris.css">
<div id="indicador_venta2" class="col-md-6" style="display:block;">
  <div class="panel panel-success">
    <div class="panel-heading">Ventas Totales</div>
    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
</div>
<script src="assets/raphael/raphael.min.js"></script>
<script src="assets/morris.js/morris.min.js"></script>
<script>
  $(function () {
    "use strict";
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90},
        {y: '2013', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>