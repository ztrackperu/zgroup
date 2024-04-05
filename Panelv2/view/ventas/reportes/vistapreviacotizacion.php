<script>
$(function () {
  //Array para dar formato en español
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: 'Previo',
    nextText: 'Próximo',

    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
      'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
      'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
    ],
    monthStatus: 'Ver otro mes',
    yearStatus: 'Ver otro año',
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
    dateFormat: 'dd/mm/yy',
    firstDay: 0,
    initStatus: 'Selecciona la fecha',
    isRTL: false
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
  $("#d_fecvig").datepicker();
  var val5 = "";
  $(".reefer").on('click', function () {
    var val1 = $("#ncoti").val();
    var val2 = $("#mod").val();
    var val3 = $("#udni").val();
    var val4 = $("#cad").val();
    var newURL = "";
    val5 = $("input[type=radio]:checked").val();
    if ($(".activeSubtotal").prop("checked")) {
      newURL = "view/ventas/reportes/verpdf.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=1&reefer=" + val5;
      newURL2 = "view/ventas/reportes/verpdf2.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=1&reefer=" + val5;
    } else {
      newURL = "view/ventas/reportes/verpdf.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=0&reefer=" + val5;
      newURL2 = "view/ventas/reportes/verpdf2.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=0&reefer=" + val5;
    }
    $(".exportPDF").attr("href", newURL);
    $(".exportPDF2").attr("href", newURL2);
  });
  $(".activeSubtotal").click(function () {
    var newURL = "";
    var val1 = $("#ncoti").val();
    var val2 = $("#mod").val();
    var val3 = $("#udni").val();
    var val4 = $("#cad").val();
    var showcambiomoneda = false;
    if ($("#showcambiomoneda").is(":checked")){
      showcambiomoneda = true;
    }
    if ($(this).prop("checked")) {
      newURL = "view/ventas/reportes/verpdf.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=1"+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
      newURL2 = "view/ventas/reportes/verpdf2.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=1"+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
    } else {
      newURL = "view/ventas/reportes/verpdf.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=0"+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
      newURL2 = "view/ventas/reportes/verpdf2.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt=0"+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
    }
    $(".exportPDF").attr("href", newURL);
    $(".exportPDF2").attr("href", newURL2);
  });
  $("#showcambiomoneda").click(function(){
    var newURL = "";
    var val1 = $("#ncoti").val();
    var val2 = $("#mod").val();
    var val3 = $("#udni").val();
    var val4 = $("#cad").val();
    var showcambiomoneda = false;
    var subt = '0';
    if ($(this).is(":checked")){
      showcambiomoneda = true;
    }
    if ($(".activeSubtotal").is(":checked")){
      subt = '1';
    }
    newURL = "view/ventas/reportes/verpdf.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt="+subt+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
    newURL2 = "view/ventas/reportes/verpdf2.php?ncoti=" + val1 + "&mod=" + val2 + "&udni=" + val3 + "&cad=" + val4 + "&subt="+subt+"&showcambiomoneda="+showcambiomoneda+"&reefer=" + val5;
    $(".exportPDF").attr("href", newURL);
    $(".exportPDF2").attr("href", newURL2);
  });
  $(".exportPDF").click(function (e) {
    e.preventDefault();
    var val1 = $("#ncoti").val();
    var val2 = $("#mod").val();
    var val3 = $("#udni").val();
    var val4 = $("#cad").val();
    var newURL = "";
    var val5 = $("input[type=radio]:checked").val();
    var val6;
    var showcambiomoneda = $("#showcambiomoneda").is(":checked");
    if ($(".activeSubtotal").prop("checked")) {
      val6 = '1';
    } else {
      val6 = '0';
    }
    $.redirect("view/ventas/reportes/verpdf.php", {
      ncoti: val1,
      mod: val2,
      udni: val3,
      cad: val4,
      subt: val6,
      reefer: val5,
      showcambiomoneda: showcambiomoneda
    }, "POST", "_blank");
  });
    $(".exportPDF2").click(function (e) {
    e.preventDefault();
    var val1 = $("#ncoti").val();
    var val2 = $("#mod").val();
    var val3 = $("#udni").val();
    var val4 = $("#cad").val();
    var newURL = "";
    var val5 = $("input[type=radio]:checked").val();
    var val6;
    var showcambiomoneda = $("#showcambiomoneda").is(":checked");
    if ($(".activeSubtotal").prop("checked")) {
      val6 = '1';
    } else {
      val6 = '0';
    }
    $.redirect("view/ventas/reportes/verpdf2.php", {
      ncoti: val1,
      mod: val2,
      udni: val3,
      cad: val4,
      subt: val6,
      reefer: val5,
      showcambiomoneda: showcambiomoneda
    }, "POST", "_blank");
  });
});
</script>
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vista Previa Cotizacion</title>
  <script>
    function guarda() {
      if (confirm("Seguro de Actualizar Cotizacion ?")) {
        document.getElementById("frmupdate").submit();
      }
    }
    function cambio() {
      var tipocoti = document.frmupdate.ac_tipped.options[document.frmupdate.ac_tipped.selectedIndex].value;
      document.getElementById("c_tipped").value = tipocoti;
    }
  </script>
  <script>
  $(document).ready(function(){
	 // alert("ttttt");
    $('#caja').bind("copy",function(e) {
      e.preventDefault();
	 // alert("ffff");
    });
  });
</script>
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
  
    <div id="caja" align="right">
		<div class="form-control-static" >
		  <?php 
		  $letras=array('&quot','\\',';','255','"=',';\" ',';\\','(',')','<span style=\"');
		  $cad= base64_encode($c_desgral);
		  $pepepe = base64_decode($cad);
		  ?>
		  <?php if($_GET['udni']=='43377015' || $_GET['udni']=='70498492' || $_GET['udni']=='41753251' || $_GET['udni']=='45359577' || $_GET['udni']=='45847891' || $_GET['udni']=='46865470' || $_GET['udni']=='44577763'){?> &nbsp;
		  <a class="btn btn-primary" onClick="guarda()">Actualizar</a>&nbsp;
		  <?php }?>
		  <a class="btn btn-warning" href="indexinv.php?c=liq01&ncoti=<?= $c_numped; ?>&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Ver Liquidación.</a>&nbsp;
		 <!-- <a class="btn btn-success exportPDF" href="#">Exportar PDF</a>&nbsp;-->
		 <a class="btn btn-danger exportPDF2" href="#" >Exportar PDF</a>&nbsp;
		  <a class="btn btn-info" href="indexa.php?c=02&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>">Salir</a>&nbsp;
		</div>
    </div>
    <div id="dina4">
      <table width="936" border="0" class="table table">
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
            <?= utf8_encode($c_nomcli); ?>
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
            <?= utf8_encode($c_contac); ?>
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
            <?= utf8_encode($c_asunto); ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td class="text-right" colspan="4">Mostrar subtotal al imprimir: Si <input class="activeSubtotal" type="checkbox" name="subtotal" value="1" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td class="text-right" colspan="4">Mostrar cambio de moneda: Si <input id="showcambiomoneda" class="showcambiomoneda" type="checkbox" name="showcambiomoneda"/></td>
        </tr>
        <tr>
          <td height="27" colspan="6">
            <table width="1009" border="0" style="font-size:11px">
              <tr>
                <td width="27" align="center" bgcolor="#fff"><strong>Nro</strong></td>
                <td width="175" align="center" bgcolor="#fff"><strong>Descripcion</strong></td>
                <td width="96" align="center" bgcolor="#fff"><strong>Glosa</strong></td>
                <td width="72" align="center" bgcolor="#fff"><strong>Equipo</strong></td>
                <td width="56" align="center" bgcolor="#fff"><strong>Clase</strong></td>
                <td width="81" align="center" bgcolor="#fff"><strong>Aprobado</strong></td>
                <td width="81" align="center" bgcolor="#fff"><strong>Facturado</strong></td>
                <td width="109" align="center" bgcolor="#fff"><strong>Alquiler</strong></td>
                <td width="65" align="center" bgcolor="#fff"><strong>Precio</strong></td>
                <td width="61" align="center" bgcolor="#fff"><strong>Dscto</strong></td>
                <td width="46" align="center" bgcolor="#fff"><strong>Cant.</strong></td>
                <td width="90" align="center" bgcolor="#fff"><strong>Importe</strong></td>
              </tr>
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
                if(($itemD->c_codprd == 'CRND0010' && utf8_encode($itemD->c_obsdoc) == 'CAT A - USED') OR ($itemD->c_codprd == 'CRN20F0006' && utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED')){
                    $twenty = $twenty + 1;
                } else if (($itemD->c_codprd == 'CRND0009' && (utf8_encode($itemD->c_obsdoc) == 'CAT A - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT B - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT C - USED')) OR ($itemD->c_codprd == 'CRN40H0005' && (utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT A - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT B - USED' OR utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'CAT C - USED'))) {
                    $fourty=$fourty + 1;
                } else if(($itemD->c_codprd == 'CRND0010' OR $itemD->c_codprd == 'CRND0009' OR $itemD->c_codprd == 'CRN20F0006' OR $itemD->c_codprd == 'CRN40H0005') && (utf8_encode(utf8_decode($itemD->c_obsdoc)) == 'NUEVO')){
                    $newReefer = $newReefer + 1;
                }
	            ?>
              <tr>
                <td class="text-center" bgcolor="#CCCCCC">
                  <?= $i ?>
                </td>
                <td bgcolor="#CCCCCC">
                  <?= $itemD->c_desprd ?>
                  <?php  
                  if($itemD->clase=='017'){
                    echo $x='SERV. ALQUILER';
                  }elseif ($itemD->clase=='002') {
                    echo $x='';
                  }
                  ?>
                </td>
                <td bgcolor="#CCCCCC">
                  <?= utf8_encode($itemD->c_obsdoc); ?>
                </td>
                <td bgcolor="#CCCCCC">
                  <a href="indexinv.php?c=inv01&mod=<?= $_GET['mod']; ?>&udni=<?= $udni; ?>&a=ImprimirEquipo&id=<?= $itemD->c_codcont ?>&cod_tipo=<?= $itemD->c_codcla ?>"><?= $itemD->c_codcont ?></a></td>
                <td bgcolor="#CCCCCC">
                  <?php  $clase=$itemD->clase; ?>
                  <select name="<?= 'ac_tipped'.$i ?>" id="<?= 'ac_tipped'.$i ?>">	
                  <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                    <option value="<?= $a->tc_codi; ?>"<?=  $a->tc_codi  == $clase ? 'selected' : ''; ?>> <?= $a->tc_desc; ?> </option>
                  <?php  endforeach;	 ?>
                  </select>
                  <input name="<?= 'n_item'.$i ?>" id="<?= 'n_item'.$i ?>" type="hidden" value="<?= $itemD->n_id ?>" />
                </td>
                <td align="center" bgcolor="#CCCCCC">
                  <?php  if($itemD->n_apbpre=='1'){echo 'Si';}else{ echo 'No';}  ?>
                </td>
                <td align="center" bgcolor="#CCCCCC">
                  <?php  if($itemD->n_canfac!='0'){echo 'Si';}else{ echo 'No';}  ?>
				  <?php echo $itemD->FactuCoti; ?>
                </td>
                <td bgcolor="#CCCCCC">
                  <?= $itemD->c_fecini;  ?>//
                  <?= $itemD->c_fecfin;  ?>
                </td>
                <td align="right" bgcolor="#CCCCCC">
                  <?= number_format($itemD->n_preprd, 2, '.', ','); ?>
                </td>
                <td align="right" bgcolor="#CCCCCC">
                  <?= number_format($itemD->n_dscto, 2, '.', ','); ?>
                </td>
                <td align="center" bgcolor="#CCCCCC">
                  <?= $itemD->n_canprd; ?>
                </td>
                <td align="right" bgcolor="#CCCCCC">
                <?php 
                  $ntotal_importe = ($itemD->n_preprd - $itemD->n_dscto) * $itemD->n_canprd;;
                  echo number_format($ntotal_importe, 2, '.', ','); 
                  $total+=$itemD->n_preprd*$itemD->n_canprd;
                  $dscto+=$itemD->n_dscto*$itemD->n_canprd;
                  $totaln=$total-$dscto;
                ?>
                </td>
              </tr>
              <?php  endforeach; ?>
              <tr style="color: #FFF;">
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td align="right" bgcolor="#3b87c8">&nbsp;</td>
                <td colspan="2" align="right" bgcolor="#3b87c8">Sub Total(sin dscto):</td>
                <td align="right" bgcolor="#3b87c8">
                  <?= number_format($total, 2, '.', ','); ?>
                </td>
              </tr>
              <tr style="color: #FFF;">
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td bgcolor="#3b87c8">&nbsp;</td>
                <td align="right" bgcolor="#3b87c8">&nbsp;</td>
                <td colspan="2" align="right" bgcolor="#3b87c8">Dscto</td>
                <td align="right" bgcolor="#3b87c8">
                  <?= number_format($dscto,2, '.', ','); ?>
                </td>
              </tr>
              <tr style="color: #FFF;">
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td bgcolor="#2f506b">&nbsp;</td>
                <td align="right" bgcolor="#2f506b">&nbsp;</td>
                <td colspan="2" align="right" bgcolor="#2f506b">Total Pagar</td>
                <td align="right" bgcolor="#2f506b">
                  <?= number_format($totaln,2, '.', ','); ?>
                </td>
              </tr>

            </table>
          </td>
        </tr>
        <tr>
          <td height="27" colspan="6">&nbsp;</td>
        </tr>
        <tr>
          <td height="27" colspan="6">
            <table width="1008" border="0" class="table table">
              <tr>
                <td width="174" class="tablaImprimir" style="font-size:14px"><strong>Forma de Pago</strong></td>
                <td width="15">:</td>
                <td width="298"><select name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
          <option value="000">.:SELECCIONE:.</option> 
          <?php foreach($this->maestro->ListarFpago() as $a): ?>
          <option value="<?= $a->TP_CODI; ?>"<?= $c_codpga == $a->TP_CODI ? 'selected' : ''; ?>> <?= $a->TP_DESC; ?> 
            </option>
          <?php  endforeach;	 ?>
          </select>


                </td>
                <td width="102"><strong>F. vigencia</strong></td>
                <td width="13">:</td>
                <td width="332"><input name="d_fecvig" id="d_fecvig" class="form-control input-sm" type="text" value="<?= vfecha(substr($d_fecvig,0,10)) ?>"
                  /></td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>Precios</strong></td>
                <td>:</td>
                <td>
                  <?php 
                  if($c_precios=='001'){ 
                    echo 'NO INCLUYE IGV'; 
                  }else{
                    if($c_precios=='002'){ 
                      echo 'INCLUYE IGV';
                    }else{
                      echo 'INAFECTO IGV';
                    }                    
                  } 
                  ?>&nbsp;
                </td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>Tipo Moneda</strong></td>
                <td>:</td>
                <td><select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" disabled> 
          <option value="">.:SELECCIONE:.</option> 
          <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
          <option value="<?= $moneda->TM_CODI; ?>"<?= $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?= $moneda->TM_DESC; ?></option>
          <?php  endforeach;	 ?>
          </select></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>Tiempo de Entrega</strong></td>
                <td>:</td>
                <td>
                  <?= utf8_encode($c_tiempo) ?>
                </td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>Validez de la Oferta</strong></td>
                <td>:</td>
                <td>
                  <?= utf8_encode($c_validez)?>
                </td>
                <td><input type="hidden" name="login" id="login" value="<?= $login ?>" />
                  <input name="item" id="item" type="hidden" value="<?= $i ?>" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>USUARIOS</strong></td>
                <td>:</td>
                <td colspan="4">Genera&nbsp;

                  <?= $xc_opcrea ?>&nbsp;Aprueba&nbsp;
                  <?= isset($xc_uaprob)?$xc_uaprob:""; ?>
                </td>
              </tr>
              <tr>
                <td class="tablaImprimir" style="font-size:14px"><strong>Facturas Asociadas</strong></td>
                <td>:</td>
                <td colspan="4"><span class="tablaImprimir" style="font-size:14px">
          <?php 
	foreach($this->model->ListaCotiConFacturas($xc_numped) as $fac): 
	echo $fac->PE_NDOC.'|';
	
	endforeach;?></td>
      </tr>
        <?php if(!empty($twenty) && !empty($fourty)){?>
        <tr>
            <td class="tablaImprimir" style="font-size:14px"><strong>Condición de Garantía</strong></td>
            <td>:</td>
            <td colspan="4">                
                CAT A -> Un año por toda la máquina reefer<br/>
                CAT B -> Un año por el compresor y controlador<br/>
                CAT C -> No tiene garantía<br/>
            </td>            
        </tr>
        <?php } else if(!empty($twenty)){?>
        <tr>
            <td class="tablaImprimir" style="font-size:14px"><strong>Condición de Garantía</strong></td>
            <td>:</td>
            <td colspan="4">                
                CAT A -> Un año por toda la máquina reefer<br/>
            </td>
        </tr> 
        <?php }else if(!empty($fourty)){ ?>
        <tr>
            <td class="tablaImprimir" style="font-size:14px"><strong>Condición de Garantía</strong></td>
            <td>:</td>
            <td colspan="4">                
                CAT A -> Un año por toda la máquina reefer<br/>
                CAT B -> Un año por el compresor y controlador<br/>
                CAT C -> No tiene garantía<br/>
            </td>
        </tr>
        <?php } else if(!empty($newReefer)) {?>
        <tr>
            <td class="tablaImprimir" style="font-size:14px"><strong>Condición de Garantía</strong></td>
            <td>:</td>
            <td colspan="4">                
                <label>Nuevo Reefer 40 - 20</label>
                <input type="radio" class="reefer" name="reefer" value="1" />
                <label>Máquina Reefer Nueva y caja USED</label>
                <input type="radio" class="reefer" name="reefer" value="2" />
            </td>           
        </tr>
        <?php } ?>
      <tr>
        <td class="tablaImprimir" style="font-size:14px">&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px">Opciones Impresion</td>
        <td>&nbsp;</td>
        <td colspan="4"><!--<input name="chktotales" type="checkbox" id="chktotales" value="1" />
          
          Mostrar Totales PDF--></td>
      </tr>
      </table></td>
  </tr>
  </table>
    <input type="hidden" name="ncoti" id="ncoti" value="<?= $c_numped; ?>" />
    <input type="hidden" name="mod" id="mod" value="<?= $_GET['mod']; ?>" />
    <input type="hidden" name="udni" id="udni" value="<?= $udni; ?>" />
    <input type="hidden" name="cad" id="cad" value="<?= $cad; ?>" />  

</div>
</form>

</body>

</html>




