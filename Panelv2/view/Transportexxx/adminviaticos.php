<script>
  function abrirmodal(Id_viatico, Id_detviatico, i) {
    $('#my_modalelim').modal('show');
    $('#mensaje').val(Id_viatico);
    $('#n_item').val(i);
    $('#Id_detviatico').val(Id_detviatico);
  }
    function abrirmodaldep(Id_viatico, Id_detviatico, i) {
    $('#my_modalelim').modal('show');
    $('#mensaje').val(Id_viatico);
   
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
              <input name="mensaje" id="mensaje" type="hidden" style="border: 0px solid #A8A8A8;width:95px;" readonly />?
              <input name="Id_detviatico" id="Id_detviatico" type="text" style="border: 0px solid #A8A8A8;width:95px;" readonly />
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



  <!--modal de eliminacion de DEPOSITOS-->
  <div class="modal fade" id="my_modalelimdep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="frm-eliminarAsig" class="form-horizontal" method="post" action="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarDetViaticosDEP">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
            <h5 class="modal-title">Mensaje del Sistema</h5>
          </div>
          <div class="modal-body" id="exampleModalLabel">
            <h4 class="modal-title" id="exampleModalLabel">
              
              <input name="n_item" id="n_item" type="hidden" style="border: 0px solid #A8A8A8;width:20px;text-align:center;"
                readonly /> 
                ¿Seguro de Eliminar deposito
              <input name="mensaje" id="mensaje" type="hidden" style="border: 0px solid #A8A8A8;width:95px;" readonly />?
              <input name="Id_detviatico" id="Id_detviatico" type="text" style="border: 0px solid #A8A8A8;width:95px;" readonly />
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
    <form class="form-horizontal" method="post" id="frmpedidet">
      <table id="tablas" class="table table-hover" style="font-size:12px;">
        <?php if($listardetviatico != NULL) {?>
        <thead>
          <tr>
            <td colspan="9">
              <input id="buscar" type="text" class="form-control" placeholder="Filtre aqui ingrese N° de Viatico y/o nombre del Cliente"/>
            </td>
          </tr>
          <tr>
            <th style="width:220px;">NºSERVICIO / NºVIATICO</th>
            <th style="width:70px;">Nº ITEM</th>
            <th>PERSONAL</th>
            <th>DESCRIPCION DEL DEPOSITO</th>
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
              <?php echo $Id_servicio.' / '.$Id_viatico;?> </td>
            <td>
              <?php echo $i; ?>
            </td>
            <td>
              <?php echo $c_personal;?>
            </td>
            <td>
              <?php echo $c_descripcion //.' REF CONTA  '.$montorefconta;?> </td>
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

            <td colspan="2">

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
                    <a  onClick="abrirmodal('<?php echo $Id_viatico ?>','<?php echo $r->Id_detviatico ?>','<?php echo $i ?>')">Eliminar</a>
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
            <td bgcolor="#FFFFFF">&nbsp;</td>
            <td colspan="2" bgcolor="#FFFFFF"> </td>
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
      <table class="table table-hover" style="font-size:12px;">
        <thead>
          <tr>
            <th width="62"><span style="width:220px;">Item Deposito</span></th>
            <th width="62">Descripcion</th>
            <th width="46">Personal</th>
            <th width="34">Monto</th>
            <th width="47">Doc. Ref.</th>
            <th width="57">Fecha Reg.</th>
            <th width="153">&nbsp;</th>
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
          <td><?= $dp->Id_detviatico?></td>
          <td><?= $dp->c_descripcion?></td>
          <td><?= $dp->c_personal?></td>
          <td><?= $mon.$dp->n_importe?></td>
          <td><?= $dp->c_refdeposito?></td>
          <td><?= date('d/m/Y',strtotime($dp->d_fecdeposito));?></td>



<td colspan="2">

              <div class="dropdown">
                <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
                  Accion
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                   <?php /*?> <a href="?c=01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $_GET['udni']?>&a=EliminarViatico&Id_detviatico=<?php echo $r->Id_detviatico; ?>&Id_servicio=<?php echo $Id_servicio; ?>&n_item=<?php echo $n_item; ?>">Eliminar Deposito</a><?php */?>
                   <a  onClick="abrirmodaldep('<?php echo $dp->Id_viatico ?>','<?php echo $dp->Id_detviatico ?>','<?php echo $i ?>')">Eliminar</a>
                   
                  </li>
                 
                
              
                </ul>
              </div>
            </td>




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
    document.querySelector("#buscar").onkeyup = function () {
      $TableFilter("#tablas", this.value);
    }

    $TableFilter = function (id, value) {
      var rows = document.querySelectorAll(id + ' tbody tr');

      for (var i = 0; i < rows.length; i++) {
        var showRow = false;

        var row = rows[i];
        row.style.display = 'none';

        for (var x = 0; x < row.childElementCount; x++) {
          if (row.children[x].textContent.toLowerCase().indexOf(value.toLowerCase().trim()) > -1) {
            showRow = true;
            break;
          }
        }

        if (showRow) {
          row.style.display = null;
        }
      }
    }
  </script>