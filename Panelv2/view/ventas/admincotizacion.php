<!--require_once 'view/principal/header.php';-->
<?php 
foreach($this->maestro->ListarTipCambio(date("d/m/Y")) as $tc):
$tcambio=$tc->tc_cmp;
$tfec=$tc->tc_fecha;
endforeach
?>
<div class="container-fluid">
  <script>
    $(document).ready(function () {

    });
  </script>
  <script>
    //document.frmelimina.submit();
    function elimina() {
      document.getElementById("frmelimina").submit();
    }

    function CambioMoneda() {
      var xmon = document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
      if (xmon == '000') {
        alert('Seleccione Moneda');
        return 0;
      } else if (document.frmcambiomone.codmoneda.value == document.frmcambiomone.xc_codmon.value) {
        alert('Las Monedas no puede ser iguales');
        return 0;
      } else if (document.frmcambiomone.tc.value == '') {
        alert('Tipo cambio incorrecto');
        return 0;
      } else {
        document.getElementById("frmcambiomone").submit();
      }
    }

    function OnchangeTipMoneda() {
      var c_codmon = document.frmcambiomone.c_codmon.options[document.frmcambiomone.c_codmon.selectedIndex].value;
      document.frmcambiomone.xc_codmon.value = c_codmon
      //document.Frmregcoti.c_desprd.focus();
    }
  </script>

  <body>
    <!--modal CAMBIO DE MONEDA-->
    <form id="frmcambiomone" name="frmcambiomone" method="post" action="?c=03&a=UpdTipMoneCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
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
                  <label for="recipient-name" class="control-label">Cliente.</label>
                  <input name="bookId" type="text" class="form-control input-sm" id="bookId"  readonly>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Cotizacion.</label>
                  <input name="cliente" type="text" class="form-control input-sm" id="cliente" readonly>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Moneda Actual.</label>
                  <input name="moneda" type="text" class="form-control input-sm" id="moneda" readonly>
                  <input name="codmoneda" id="codmoneda" type="hidden" >
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Moneda Destino.</label>
                  <select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()"> 
              <option value="000">.:SELECCIONE:.</option> 
              <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
                <option value="<?php echo $moneda->TM_CODI; ?>"><?php echo $moneda->TM_DESC; ?></option>
                <?php  endforeach;	 ?>
             </select>
                  <input type="hidden" name="xc_codmon" id="xc_codmon" />
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Tipo Cambio Actual. :<?php echo vfecha(substr($tfec,0,10)) ?></label>
                  <input type="text" class="form-control input-sm" id="tc" name="tc" value="<?php echo $tcambio ?>">
                  <input type="hidden" class="form-control input-sm" id="n_bruto" name="n_bruto" value="">
                  <input type="hidden" class="form-control input-sm" id="n_dscto" name="n_dscto" value="">
                  <input type="hidden" class="form-control input-sm" id="n_neta" name="n_neta" value="">
                  <input type="hidden" class="form-control input-sm" id="n_neti" name="n_neti" value="">
                  <input type="hidden" class="form-control input-sm" id="n_totped" name="n_totped" value="">
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
    <form id="frmelimina" name="frmelimina" method="post" action="?c=03&a=EliminaCotizacion&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
      <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Eliminacion Cotizacion</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente</label><input type="hidden" name="login" id="login"
                  value="<?php echo $login ?>  " />
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
      $(document).ready(function () {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

          var data_id = '';

          if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
            var res = data_id.split("|");
          }

          $('#cli').val(res[0]);
          $('#ncoti').val(res[1]); //
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

    <script>
      $(document).ready(function () {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {

          var data_id = '';

          if (typeof $(this).data('id') !== 'undefined') {

            data_id = $(this).data('id');
            var res = data_id.split("|");
          }

          $('#a_cli').val(res[0]);
          $('#a_coti').val(res[1]); //

        })
      });
    </script>
    <!--modal Actualizar Datos -->
    <div class="modal fade" id="my_modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Ingrese Datos Adicionales</h4>
          </div>
          <div class="modal-body">
            <form id="frmupdate" name="frmupdate" method="post" action="?c=03&a=ActOtrosDato&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cotizacion</label>
                <input type="text" class="form-control" id="a_coti" name="a_coti" value="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Cliente</label>
                <input type="text" class="form-control" id="a_cli" name="a_cli">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Documento</label>
                <input type="text" class="form-control" id="a_dctoReg" name="a_dctoReg">
              </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="button" id="button" class="btn btn-primary" value="Actualizar">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--fin modal ver mas datos-->
    <div class="panel panel-primary ">
      <!-- Default panel contents -->
      <div class="panel-heading">ADMINISTRACION COTIZACIONES
	  <!--<p> Nota: Las cotizaciones con estado pre aprobado ya no se podrán editar</p>-->
	  </div>
    </div>
	<div class="table-responsive">
	 <table data-page-length='100' id="tabla" class="table table-bordered table-hover table-striped dt-responsive" style="width:100%"> 

      <thead>
        <tr>
          <th>Nro</th>
          <th>Cliente</th>
          <th>Asunto</th>
          <th>Cot P.</th>
          <th>Cronograma</th>
          <th>Dcto Cliente</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Ver/Editar/Eliminar/Imprimir</th>
          <th>Preaprueba/Aprueba/Liberar</th>
          <th>Archivo</th>
          <th>Fecha Despacho</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
		<input type="hidden" name="valor" id="valor" value="<?php echo $valor?>">
		<input type="hidden" name="sw" id="sw" value="<?php echo $sw?>">
        <?php 
		echo $valor."/".$sw;	
		foreach($this->model->ListarCotizaciones($valor,$sw,$mod,$user) as $r): 
		$archivo=$r->archivo;
		$fecha_despacho=vfecha(substr($r->fecha_despacho,0,10));
		if($fecha_despacho==""){
			$fecha_despacho="-";
		}else{
			$fecha_despacho=vfecha(substr($r->fecha_despacho,0,10));
		}
		$usuario_despacho=$r->usuario_despacho;
		?>
        <tr>
          <td>
            <?php echo $r->c_numped?>
          </td>
          <td>
            <?php echo utf8_encode($r->c_nomcli); ?>
          </td>
          <td>
            <?php echo utf8_encode($r->c_asunto); ?>
          </td>
          <td><?php echo $r->c_cotipadre?>&nbsp;</td>
          <td><?php if($r->c_gencrono=='1'){echo 'SI'.'-CantMeses '.$r->c_meses;}else{ echo 'NO';} ?>&nbsp;</td>
          <td>
            <?php /*?>
            <a href="?c=Alumno&a=Crud&id=<?php echo $r->c_numguia; ?>">
              <?php */?>
              <?php echo $r->c_numocref; ?>
              <!--</a>-->
          </td>
          <td>
            <?php  echo vfecha(substr(($r->d_fecped),0,10)); ?>
          </td>
          <td>
          <?php 
            if($r->n_swtapr==0 && $r->c_estado==0 && $r->n_preapb!=2){ 
              echo '<strong style="color:#0D1FC6">Generado</strong>'; 			
            }elseif($r->n_preapb==2 && $r->c_estado==0 && $r->n_swtapr==0){ 
              echo '<strong style="color:#FF9900">Pre-Aprobado</strong>';
            }elseif($r->n_swtapr==1 && $r->c_estado==0){ 
              echo '<strong style="color:#060">Aprobado</strong>';  
            }elseif($r->c_estado==1 || $r->c_estado==2 && $r->n_swtapr==1){ 
              echo '<strong style="color:#FF0000">Facturado</strong>';
            }elseif($r->c_estado==5){ 
              echo '<strong style="color:#9900FF">Fusionado</strong>';
            }
			
          ?>
          </td>
		  <td>
			<a class='btn btn-xs btn-info' title="Ver mas datos" href="#my_modal2" data-toggle="modal" data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli.'|'.$r->c_gencrono.'|'.$r->c_cotipadre.'|'.$r->c_numguia; ?>"><span class='glyphicon glyphicon-search'></span></a><!--Ver mas datos-->
			<?php if(($r->n_preapb==0 || $r->n_preapb==2) && $r->n_swtapr==0){ //($r->n_preapb==0 || $r->n_preapb==2) && $r->n_swtapr==0)?>
			<a class='btn btn-xs btn-primary' title="Editar" href="?c=03&a=UpdCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&valor=<?php echo $valor?>&sw=<?php echo $sw?>"><span class='glyphicon glyphicon-pencil'></span></a><!--Editar-->
			 <?php }?>
			<?php if($r->n_swtapr==0 && $r->c_estado==0){?>
            <a class='btn btn-xs btn-danger' title="Eliminar" href="#my_modal" data-toggle="modal" data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli; ?>"><span class='glyphicon glyphicon-remove'></span></a><!--Eliminar-->
                <?php }?>
			<a class='btn btn-xs btn-default' title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&valor=<?php echo $valor?>&sw=<?php echo $sw?>"><span class='glyphicon glyphicon glyphicon-print'></span></a><!--Imprimir-->
		  </td>
		  <td>
				<?php if($r->n_preapb==0 && $r->c_estado==0 && $r->n_swtapr==0){?>
					<a class='btn btn-xs btn-warning' title="PreAprobar" href="?c=03&a=AprCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&valor=<?php echo $valor?>&sw=<?php echo $sw?>"><span class='glyphicon glyphicon-level-up'></span></a><!--Pre-Aprobar-->
                <?php }?>
                <?php if($r->n_preapb==2 && $r->c_estado==0 && $_GET['mod']=='1'){?>
					<a class='btn btn-xs btn-success' title="Aprobar" href="?c=03&a=AprFactCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&valor=<?php echo $valor?>&sw=<?php echo $sw?>"><span class='glyphicon glyphicon-open-file'></span></a><!--Aprobar-->
                <?php }?>
                <?php if($r->n_swtapr==1 && $r->c_estado==0 && $_GET['mod']=='1'){?>
					<a class='btn btn-xs btn-danger' title="Liberar" href="?c=03&a=LibCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&valor=<?php echo $valor?>&sw=<?php echo $sw?>"><span class='glyphicon glyphicon-save-file'></span></a><!--Liberar-->
                <?php }?>
		  </td>
		  <td>
			<?php
								if($archivo!=""){
									?>
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#verdocumento" data-documento="<?php echo ($archivo)?>"
																				><i class="fa fa-search"></i></button>	
								<?php
								}
								else{
									?>
								no se cargo imagen	
								<?php	
								}
								?>
		  </td>
		  <td>
			<?php
								if($usuario_despacho==""){
								echo '<strong style="color:#FF9900">'.$fecha_despacho.'</strong>';
								}
								else{
									
								echo '<strong style="color:#060">'.$fecha_despacho.'</strong>';	
									
								}
								?>
		  </td>
		  <div class="modal fade" id="verdocumento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					    <h4 class="modal-title">Visualizar Documento</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-2">																											
								</div>
								<div class="col-md-8 text-center">													
								<img id="imagen">
									<embed  width="600" height="800">
								<!--<embed src="ARCHIVOS_FOODZ\CERTIFICADO_SENASA/10000002-2.pdf" width="600" height="500">-->
								</div>
								<div class="col-md-2">																											
								</div>
			      			</div>
						</div>
					</div>
				</div>
			</div>
          <td>
		  
            <div class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">Accion <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
			  <?php /*
                <li><a href="#my_modal2" data-toggle="modal" data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli.'|'.$r->c_gencrono.'|'.$r->c_cotipadre.'|'.$r->c_numguia; ?>">Ver mas datos</a></li>
                <?php if($r->c_estado==0 && $r->n_preapb==0 && $r->n_swtapr==0){?>
                <li><a href="?c=03&a=UpdCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Editar</a></li>
                <?php }?>

                <?php /*?>
                <?php if($r->c_estado==0 && $r->n_preapb==0 && $r->n_swtapr==0){?>
                <li><a href="?c=03&a=UpdCotizaciones01&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">prueba</a></li>
                <?php }?>
                <?php */?>


                <li><a href="?c=03&a=DuplicarCotizacion&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&swdupadd=0">Duplicar</a></li>

                <li><a href="?c=03&a=DuplicarCotizacion&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&swdupadd=1">Duplicar Adicionales</a></li>

				<?php /*
                <?php if($r->n_swtapr==0 && $r->c_estado==0){?>
                <li><a href="#my_modal" data-toggle="modal" data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli; ?>">Eliminar</a></li>
                <?php }?>
                <li><a href="?c=03&a=ImpCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Imprimir</a></li>
				*/?>
                <li><a target="_black" href="?c=03&a=ImpSeleccionCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Imprimir Seleccion</a></li>
                <li class="divider"></li>
				<?php /*
                <?php if($r->n_preapb==0 && $r->c_estado==0 && $r->n_swtapr==0){?>
                <li><a href="?c=03&a=AprCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Pre-Aprobar</a></li>
                <?php }?>
                <?php if($r->n_preapb==2 && $r->c_estado==0 && $_GET['mod']=='1'){?>
                <li><a href="?c=03&a=AprFactCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Aprobar</a></li>
                <?php }?>
				*/?>
                <?php if($r->n_swtapr==1 && $r->c_estado==0 && $_GET['mod']=='1'){?>
                <li><a href="?c=03&a=LibCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Liberar</a>
 <li><a href="?c=03&a=FacturarSoles&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Facturar A Soles</a>

                  <a href="#my_modal3" data-toggle="modal" data-id="<?php echo $r->c_numped.'|'.$r->c_nomcli ?>">Adiciona Datos</a>
                </li>
                <?php }?>

                <?php if($r->n_preapb==2 && $r->c_estado==0){?>
                <li><a href="?c=03&a=LibCotizaciones&ncoti=<?php echo $r->c_numped?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Liberar Pre-Aprob</a></li>
                <?php }?>
				<li>
                  <?php if($r->c_estado==0    ){?>
                  <a href="#my_modaltc" data-toggle="modal" 
				  data-numped="<?php echo $r->c_numped?>"
				  data-nomcli="<?php echo  utf8_encode($r->c_nomcli)?>" 
				  data-codmon="<?php echo $r->c_codmon?>"
				  data-bruto="<?php echo $r->n_bruto?>" 
				  data-dscto="<?php echo $r->n_dscto?>"
				  data-neta="<?php echo $r->n_neta ?>"
				  data-neti="<?php echo  $r->n_net ?>"
				  data-totped="<?php echo $r->n_totped ?>"
				  >Cambio Tipo Moneda-v2</a></li>
				  <?php }?>
              </ul>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>
</div>
<script>
$(document).ready(function() {
	$("#tabla").dataTable().fnDestroy();
	
	$('#my_modaltc').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var numped = button.data('numped') // Extract info from data-* attributes
  var cliente = button.data('nomcli') // Extract info from data-* attributes
  var codmon = button.data('codmon') // Extract info from data-* attributes
  var bruto = button.data('bruto') // Extract info from data-* attributes
  var dscto = button.data('dscto') // Extract info from data-* attributes
  var neta = button.data('neta') // Extract info from data-* attributes
  var neti = button.data('neti') // Extract info from data-* attributes
  var totped = button.data('totped') // Extract info from data-* attributes
  
  var modal = $(this)

        if (codmon == '1') {
          var m = 'DOLARES'
        } else if (codmon == '0') {
          m = 'SOLES'
        }
  //modal.find('.modal-title').text('New message to ' + cliente)
  modal.find('.modal-body  #cliente').val(numped)
  modal.find('.modal-body  #bookId').val(cliente)
  modal.find('.modal-body  #moneda').val(m)
  modal.find('.modal-body  #codmoneda').val(codmon)
  modal.find('.modal-body  #n_bruto').val(bruto)
  modal.find('.modal-body  #n_dscto').val(dscto)
  modal.find('.modal-body  #n_neta').val(neta)
  modal.find('.modal-body  #n_neti').val(neta)
  modal.find('.modal-body  #n_totped').val(totped)
})
	
	
/* 	$('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var cliente = button.data('nomcli')
		var modal = $(this)
	modal.find('.modal-title').text('New message to ' + cliente)
      modal.find('.modal-body #bookId').val(cliente)
		
        var data_id = '';
		//var recipient = button.data('whatever')

        if (typeof $(this).data('id') !== 'undefined') {

          data_id = $(this).data('id');
          var res = data_id.split("|");
        }

        $('#cliente').val(res[0]);
        $('#bookId').val(res[1]);

        $('#xcliente').val(res[0]);
        $('#xbookId').val(res[1]);
        var moneda = res[2];
        if (moneda == '1') {
          var m = 'DOLARES'
        } else if (moneda == '0') {
          m = 'SOLES'
        }
        $('#moneda').val(m);
        $('#codmoneda').val(res[2]);

        $('#n_bruto').val(res[3]);
        $('#n_dscto').val(res[4]);
        $('#n_neta').val(res[5]);
        $('#n_neti').val(res[6]);
        $('#n_totped').val(res[7]);

      }) */
    // Setup - add a text input to each footer cell
/*     $('#tabla thead tr').clone(true).appendTo( '#tabla thead' );
    $('#tabla thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" size="10px" placeholder="'+title+'" /> ' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } ); */
 
    var table = $('#tabla').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
		paging: false,
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
} );

$('#verdocumento').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('documento') // Extract info from data-* attributes
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


})
</script>






</body>