<script>
  function abrirmodal(Id_viatico, Id_detviatico, i) {
    $('#my_modalelim').modal('show');
    $('#mensaje').val(Id_viatico);
    $('#n_item').val(i);
    $('#Id_detviatico').val(Id_detviatico);
  }
</script>

<body>

  <!--modal de eliminacion de viaticos-->
  <div class="modal fade" id="my_modalelim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarDetViaticos">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="modal-body" id="exampleModalLabel">
            <h4 class="modal-title" id="exampleModalLabel">
              ¿Seguro de Eliminar el Item
              <input name="n_item" id="n_item" type="text" style="border: 0px solid #A8A8A8;width:20px;text-align:center;"
                readonly /> del Viatico
              <input name="mensaje" id="mensaje" type="text" style="border: 0px solid #A8A8A8;width:95px;" readonly />?
              <input name="Id_detviatico" id="Id_detviatico" type="hidden" />
              <!--para volver-->
              <input name="Id_servicio" id="Id_servicio" type="hidden" value="<?php echo $Id_servicio ?>" />
              <input name="Id_viatico" id="Id_viatico" type="hidden" value="<?php echo $Id_viatico ?>" />
            </h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--fin modal eliminacion-->

  <div class="container-fluid">
    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">ADMINISTRACION DE VIATICOS DEL SERV. TRANSP. N°
        <?php echo $Id_servicio?>
      </div>
    </div>
    &nbsp;&nbsp;
    <a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=RegDetViaticos&Id_viatico=<?php echo $Id_viatico?>">NUEVO DETALLE VIATICO</a>
    &nbsp;&nbsp;
    <?php /*?>
    <a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>">LIQUIDAR</a>
    <?php */?> &nbsp;&nbsp;
    <a class="btn btn-primary" href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=AdminDetTransporte&Id_servicio=<?php echo $Id_servicio?>">VOLVER</a>
    <br>
    <br>
	<form class="form-horizontal" method="post" id="frmpedidet">
      <table id="tablas" class="table table-hover" style="font-size:12px;">
        <?php if($listardetviatico != NULL) {?>
        <thead>
          <tr>
            <th style="width:220px;">NºSERVICIO / NºVIATICO</th>
            <th style="width:70px;">Nº ITEM</th>
            <th>PERSONAL</th>
            <th>DESCRIPCION DEL DEPOSITO</th>
            <th>PLACA UNIDAD</th>
            <th style="width:150px;">IMPORTE</th>
            <th style="width:150px;">DOC. REF.</th>
            <th style="width:150px;">FECHA DEP.</th>
            <th style="width:100px;">IMP.GASTADO</th>
            <th style="width:100px;">SALDO</th>
            <th style="width:150px;">FECHA SOLICITUD</th>
            <th style="width:110px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=0;$totimporte=0;
          // var_dump($listardetviatico);
          $totimpogast = 0;
          $totsaldo = 0;
          foreach($listardetviatico as $r):
          $Id_servicio=$r->Id_servicio;
          $Id_viatico=$r->Id_viatico;	
          $c_personal=utf8_encode($r->c_personal);
          //$c_nomconcepto=utf8_encode($r->c_nomconcepto);
          $c_descripcion=utf8_encode($r->c_descripcion);	
          $c_moneda=$r->c_moneda;
          $c_placa=$r->c_placa;
          if($c_moneda=='0'){	
            $mon='S/. ';		
          }else{
            $mon='US$. ';
          }
          if($r->c_tipo=='1'){
            $n_importe=$r->n_importe;
            $n_saldo=$r->n_saldo;
          }
          $d_fecsol=$r->d_fecsol;	
          $liquidacion=$this->model->ListarLiquidar($r->Id_detviatico);	
          $totimporte=$totimporte+$n_importe;	
          $totimpogast=$totimpogast+$r->n_impogastot;	
          $totsaldo=$totsaldo+$n_saldo;	
          $i=$i+1;
        ?>
          <tr>
            <td>
              <?php echo $Id_servicio.' / '.$Id_viatico;?> 
			</td>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $c_personal;?>
            </td>
            <td>
              <?php echo $c_descripcion //.' REF CONTA  '.$montorefconta;?> 
			</td>
			<td>
              <?php echo $c_placa //.' REF CONTA  '.$montorefconta;?> 
			</td>
            <td>
              <?php echo $mon.$n_importe;?> 
            </td>
            <td>
              <?php echo $mon.$n_importe;?> 
            </td>
            <td>
              <?php echo $mon.$n_importe;?> 
            </td>
            <td>
              <?php echo $mon.$r->n_impogastot;?>
            </td>
            <td>
              <?php  if($r->c_tipo=='1'){echo $mon.$r->n_saldo; }else{ echo '0.00';}?>
            </td>
            <td>
              <?php echo vfecha(substr($d_fecsol,0,10)); ?>
            </td>

            <td>

              <div class="dropdown">
                <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                  Accion
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarUpdViaticos&Id_detviatico=<?php echo $r->Id_detviatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Editar</a>
                  </li>
                  <li>
                    <a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=DuplicarUpdViaticos&Id_detviatico=<?php echo $r->Id_detviatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Duplicar</a>
                  </li>
                  <li>
                    <a href="#">Imprimir</a>
                  </li>
                  <?php if($liquidacion==NULL){?>
                  <li>
                    <a onClick="abrirmodal('<?php echo $Id_viatico ?>','<?php echo $r->Id_detviatico ?>','<?php echo $i ?>')">Eliminar</a>
                  </li>
                  <li>
                    <a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>&Id_viatico=<?php echo $Id_viatico; ?>&Id_detviatico=<?php echo $r->Id_detviatico; ?>&n_item=<?php echo $n_item; ?>">Liquidar</a>
                  </li>
                  <?php }else{ ?>
                  <li>
                    <a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=ListarLiquidar&Id_servicio=<?php echo $Id_servicio; ?>&Id_viatico=<?php echo $Id_viatico; ?>&Id_detviatico=<?php echo $r->Id_detviatico; ?>&n_item=<?php echo $n_item; ?>">Ver Liquid.</a>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>

          <tr>
		   <td bgcolor="#FFFFFF">&nbsp;</td>
            <td bgcolor="#FFFFFF"> </td>
            <td bgcolor="#FFFFFF" align="right">
              <b>DEPOSITO CONTABLE REF.</b>
            </td>
            <td bgcolor="#FFFFFF" align="right">
              <?php 
                $depanti=$this->model->ListarSumaDepoAnticipado($Id_servicio,$n_item);
                $depref=$depanti->totdepant;
                echo '<font color="#0000FF">'.$depanti->totdepant.'</font>';	  
              ?>
            </td>
            <td bgcolor="#FFFFFF" align="right">
              <b>SALDO REF.</b>
            </td>
            <td bgcolor="#FFFFFF">
              <?php
              $saldoref=$depref-$totimporte;
              echo '<font color="#0000FF">'.$saldoref.'</font>';
		          ?>
            </td>
            <td bgcolor="#FFFFFF">
              <?php echo $mon.$totimporte;?> </td>
            <td bgcolor="#FFFFFF">
              <?php echo $mon.$totimpogast;?>
            </td>
            <td bgcolor="#FFFFFF">
              <?php echo $mon.$totsaldo;?>
            </td>
           
            <td  bgcolor="#FFFFFF"> </td>
            <td  bgcolor="#FFFFFF"> </td>
            <td  bgcolor="#FFFFFF"> </td>
          </tr>
        </tbody>
        <?php }else{} ?>
      </table>
    </form>
    <?php
      // var_dump($depositos);
      if(!empty($depositos)):
      ?>
      <hr/>
      <h4>Depositos Realizados</h4>
      <table id="tabla2" class="table table-hover" style="font-size:12px;">
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>Personal</th>
            <th>Monto</th>
            <th>Doc. Ref.</th>
            <th>Fecha Reg.</th>
          </tr>
        </thead>
        <tbody>
      <?php 
        foreach ($depositos as $dp) {
          $c_moneda=$dp->c_moneda;
          if($c_moneda=='0'){	
            $mon='S/. ';		
          }else{
            $mon='US$. ';
          }
      ?>
        <tr>
          <td><?= $dp->c_descripcion?></td>
          <td><?= $dp->c_personal?></td>
          <td><?= $mon.$dp->n_importe?></td>
          <td><?= $dp->c_refdeposito?></td>
          <td><?= date('d/m/Y',strtotime($dp->d_fecdeposito));?></td>
        </tr>
      <?php
        }
      ?>
        </tbody>
      </table>
      <?php
      endif; 
      ?>
  </div>

 
  <script>
  $(function () {
    $('#tablas').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false, 	  	  
	    dom			: 'Bfrtip',
	 // title			:'ListaPersonal'
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
        },

        ]
    })
	
	$('#tabla2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false, 	  	  
	    dom			: 'Bfrtip',
	 // title			:'ListaPersonal'
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
        },

        ]
    })
  })
</script>