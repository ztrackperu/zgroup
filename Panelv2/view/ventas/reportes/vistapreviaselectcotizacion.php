<head>	
<!--	 <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/css/select.dataTables.min.css"> -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.18/af-2.3.2/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
</head>
<?php 
if(isset($_GET['ncoti']) && $_GET['ncoti']!=''){
    $xc_numped=$_GET['ncoti'];
} else {
    $xc_numped=$c_numped;
}
$cantitems = 1;
$datos_coti = $this->model->ObtenerDataCotizacion($xc_numped);
// var_dump($datos_coti);
foreach($datos_coti as $r):
                               $c_numped=$r->c_numped;
                               $c_codmon=$r->c_codmon;
                               $c_tipped=$r->c_tipped;
                               $c_asunto=$r->c_asunto;
                               $c_codven=$r->c_codven;
                               $c_nomcli=$r->c_nomcli;
                               $cc_nruc=$r->cc_nruc;
                               $c_nomclileasig=$r->c_nomclileasig;
                               //$nextel=$r->c_nextel;
                               $c_email=$r->c_email;
                               $c_contac=$r->c_contac;
                               $c_codcli=$r->c_codcli;
                               $n_tcamb=$r->n_tcamb;
                               $c_telef=$r->c_telef;
                               $c_lugent=$r->c_lugent;
                               $c_tiempo=$r->c_tiempo;
                               $c_validez=$r->c_validez;
                               $c_codpgf=$r->c_codpgf; 
                               $c_precios=$r->c_precios;
                               $c_desgral=$r->c_desgral;
                               $c_obsped=$r->c_obsped;
                               //$c_desgral=$r->c_desgral;
                               $n_idreg=$r->n_idreg;
                               $c_codpga=$r->c_codpga;
                               $n_bruto=$r->n_bruto;
                               $n_dscto=$r->n_dscto;
                               $n_neta=$r->n_neta;
                               $n_neti=$r->n_neti;
                               $c_obsdoc=$r->c_obsdoc;
                               $c_gencro=$r->c_gencrono;
                               $c_swfirma=$r->c_swfirma;
                               $c_gencrono=$r->c_gencrono;
                               $c_meses=$r->c_meses;
                               $d_fecped=$r->d_fecped;
                               $d_fecreg=$r->d_fecreg;
                               $d_fecent=$r->d_fecent;
                               $c_numocref=$r->c_numocref;
                               $d_fecvig=$r->d_fecvig;
                               $c_opcrea=$r->c_opcrea;
                               $c_uaprob=$r->c_uaprob;
                               $cantitems++;
endforeach;
if ($this->model->ObtenerDataUsuario($c_opcrea)!=NULL) {
  foreach($this->model->ObtenerDataUsuario($c_opcrea) as $u):
  $xc_opcrea=$u->c_login;
  endforeach;
}
if ($this->model->ObtenerDataUsuario($c_uaprob)!=NULL) {
  foreach($this->model->ObtenerDataUsuario($c_uaprob) as $a):
    $xc_uaprob=$a->c_login;
  endforeach;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cotizacion N: <?= $c_numped; ?></title>
</head>
<style type="text/css">
  html,
  body {
    margin: 0;
    padding: 0;
    overflow: auto;
  }
  #dina4 {
    width: 285mm;
    min-height: 240mm;
    padding: 20px 30px;
    border: 1px solid #D2D2D2;
    background: #fff;
    margin: 10px auto;
  }
</style>

<body>
  <form action="?c=03&a=ActualizaContabilidad&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>" method="post" name="frmupdate" id="frmupdate">
    <div class="form-control" align="right">
      <?php 
      $letras=array('&quot','\\',';','255','"=',';\" ',';\\','(',')','<span style=\"');
      $cad= base64_encode(str_replace($letras,'',$c_desgral));
      $pepepe = base64_decode($cad);
      ?>
      <a class="btn btn-info" href="indexa.php?c=02&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Salir</a>&nbsp;
    </div>
    <div >
      <table style="width:100%" border="0" class="table table">
        <tr>
          <td colspan="6" bgcolor="#CCCCCC"><strong>COTIZACION NRO</strong> :
            <?= $c_numped; ?>&nbsp;
            <input type="hidden" name="c_numped" id="c_numped" value="<?= $c_numped; ?>" />&nbsp;DOCUMENTO REFERENCIA
            CLIENTE:
            <?= $c_numocref;?>
          </td>
        </tr>
        <tr>
          <td width="54"><strong>Cliente</strong></td>
          <td width="6">:</td>
          <td width="368">
            <?= utf8_encode(utf8_decode($c_nomcli)); ?>
			<input type="hidden" name="txtCliente" id="txtCliente" value="<?= $c_nomcli; ?>" />			
          </td>
          <td width="131"><strong>Codigo Cliente</strong></td>
          <td width="13">:</td>
          <td width="338">
            <?= $c_codcli ?>
          </td>
        </tr>
        <tr>
          <td><strong>Fecha</strong></td>
          <td>:</td>
          <td>
            <?= vfecha(substr($d_fecped,0,10)) ?>
			<input type="hidden" name="txtFecha" id="txtFecha" value="<?= $d_fecped; ?>" />	
          </td>
          <td><strong>Correo</strong></td>
          <td>:</td>
          <td>
            <?= $c_email?>
          </td>
        </tr>
        <tr>
          <td><strong>Telf</strong></td>
          <td>:</td>
          <td>
            <?= $c_telef  ?>
          </td>
          <td><strong>Contacto</strong></td>
          <td>:</td>
          <td>
            <?= utf8_encode(mb_strtoupper($c_contac)); ?>
          </td>
        </tr>
        <tr>
          <td><strong>Leasing</strong></td>
          <td>:</td>
          <td>
            <?= $c_nomclileasig  ?>
          </td>
          <td><strong>T.c</strong></td>
          <td>:</td>
          <td>
            <?= $n_tcamb  ?>
          </td>
        </tr>
        <tr>
          <td><strong>Asunto</strong></td>
          <td>:</td>
          <td colspan="4">
            <?= utf8_encode(utf8_decode($c_asunto)); ?>
			<input type="hidden" name="txtAsunto" id="txtAsunto" value="<?= $c_asunto; ?>" />	
          </td>
        </tr>
      </table>
      <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
			  <th>Nro</th>
			  <th>Descripcion</th>
			  <th>Glosa</th>
			  <th>Equipo</th>
			  <th>Aprobado</th>
			  <th>Facturado</th>
			  <th>Alquiler</th>
			  <th>Precio</th>
			  <th>Dscto</th>
			  <th>Cant.</th>
			  <th>Importe</th>
			</tr>
        </thead>
        <tbody>
		        <?php 
              $i=0;$twenty=0;$fourty=0;$newReefer = 0;
              $total = 0; $dscto = 0;
              $DataCotizacion = $this->model->ObtenerDataCotizacion($xc_numped);      
              foreach($DataCotizacion as $itemD):
                    $Itemsfacturados=$this->model->ObtenerItemsFacturadoM($xc_numped,$itemD->c_codprd,$itemD->n_item);
                    if($Itemsfacturados!=NULL){
                       foreach($Itemsfacturados as $itemsFac):
                       $NroFactura=$itemsFac->PE_NDOC;
                      //$this->model->UpdateItemCotiFacM($itemD->n_canprd,$xc_numped,$itemD->c_codprd,$itemD->n_item,$NroFactura);
                       endforeach;
                       }
                    $i=$i+1;
                if(($itemD->c_codprd == 'CRND0010' && utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED') OR ($itemD->c_codprd == 'CRN20F0006' && utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED')){
                    $twenty = $twenty + 1;
                } else if (($itemD->c_codprd == 'CRND0009' && (utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT B - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT C - USED')) OR ($itemD->c_codprd == 'CRN40H0005' && (utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT B - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT C - USED'))) {
                    $fourty=$fourty + 1;
                } else if(($itemD->c_codprd == 'CRND0010' OR $itemD->c_codprd == 'CRND0009' OR $itemD->c_codprd == 'CRN20F0006' OR $itemD->c_codprd == 'CRN40H0005') && (utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'NUEVO')){
                    $newReefer = $newReefer + 1;
                }
                            ?>
            <tr>
				<td><?= $i ?></td>
                <td><?= $itemD->c_desprd ?>
					<?php  
						  if($itemD->clase=='017'){
							echo $x='SERV. ALQUILER';
						  }elseif ($itemD->clase=='002') {
							echo $x='';
						  }
						  ?>
				  </td>
                <td>
					<?= utf8_encode(utf8_decode($itemD->c_obsdoc)); ?>
				</td>
                <td> 
					<?= $itemD->c_codcont ?>
				</td>
                <td>
					<?php  if($itemD->n_apbpre=='1'){echo 'Si';}else{ echo 'No';}  ?>
				</td>
                <td>
					<?php  if($itemD->n_canfac!='0'){echo 'Si';}else{ echo 'No';}  ?>
					<?php echo $itemD->FactuCoti; ?>
				</td>               
                <td><?= $itemD->c_fecini;  ?>
					//
					<?= $itemD->c_fecfin;  ?>
				</td>
                <td>
					<?= number_format($itemD->n_preprd, 2, '.', ','); ?>
				</td>
                <td>
					<?= number_format($itemD->n_dscto, 2, '.', ','); ?>
				</td>
                <td>
					<?= $itemD->n_canprd; ?>
				</td>
                <td>
				<?php 
                  $ntotal_importe = ($itemD->n_preprd - $itemD->n_dscto) * $itemD->n_canprd;;
                  echo number_format($ntotal_importe, 2, '.', ','); 
                  $total+=$itemD->n_preprd*$itemD->n_canprd;
                  $dscto+=$itemD->n_dscto*$itemD->n_canprd;
                  $totaln=$total-$dscto;
                ?></td>
            </tr>
			 <?php  endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
			  <th>Nro</th>
			  <th>Descripcion</th>
			  <th>Glosa</th>
			  <th>Equipo</th>
			  <th>Aprobado</th>
			  <th>Facturado</th>
			  <th>Alquiler</th>
			  <th>Precio</th>
			  <th>Dscto</th>
			  <th>Cant.</th>
			  <th>Importe</th>
			</tr>
        </tfoot>
    </table>
    </div>
</form>

<!--
<script src="assets/vendor/js/jquery-3.3.1.js"></script>
<script src="assets/vendor/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/js/buttons.flash.min.js"></script>
	<script src="assets/vendor/js/jszip.min.js"></script>
	<script src="assets/vendor/js/pdfmake.min.js"></script>
	<script src="assets/vendor/js/vfs_fonts.js"></script>	
	<script src="assets/vendor/js/buttons.html5.min.js"></script>
	 <script src="assets/vendor/js/buttons.print.min.js"></script>
	 <script src="assets/vendor/js/dataTables.select.min.js"></script>
    
 -->   

<script>
$(document).ready(function() {
	var mensaje="Cliente:"+$("#txtCliente").val()+"           Fecha:"+$("#txtFecha").val()+"               Asunto:"+$("#txtAsunto").val();
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            {
                extend: 'excel',
                messageTop: mensaje
            },
            'pdf',
            {
                extend: 'print',
                text: 'Print all (not just selected)',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true
    } );
} );
</script>
</body>
</html>