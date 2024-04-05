<script>
$(function() {   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'dd/mm/yy', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);
   $( "#d_fecvig" ).datepicker();   
 });
</script>
<?php 
if($_GET['ncoti']!=''){
$xc_numped=$_GET['ncoti'];
}else{
$xc_numped=$c_numped;
	}
foreach($this->model->ObtenerDataCotizacion($xc_numped) as $r):
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
if($this->model->ObtenerDataUsuario($c_opcrea)!=NULL){
foreach($this->model->ObtenerDataUsuario($c_opcrea) as $u):

$xc_opcrea=$u->c_login;

endforeach;
}
if($this->model->ObtenerDataUsuario($c_uaprob)!=NULL){
foreach($this->model->ObtenerDataUsuario($c_uaprob) as $a):

$xc_uaprob=$a->c_login;

endforeach;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vista Previa Cotizacion</title>
<script>
function guarda(){
if(confirm("Seguro de Actualizar Cotizacion ?")){
				document.getElementById("frmupdate").submit();
	 		}
}
function cambio(){
	var tipocoti=document.frmupdate.ac_tipped.options[document.frmupdate.ac_tipped.selectedIndex].value;
document.getElementById("c_tipped").value=tipocoti;
	}
</script>

</head>
<style type="text/css">
html, body {
                margin: 0; 
                padding: 0; 
                overflow: auto;
}
body { 
  /*  background: #f2f2f2; 
font-family: Arial; 
font-size: 13px; 
    line-height: 1.6; 
    color: #444;*/ 
} 
#dina4 {
    width: 285mm;
    height: 420mm;
    padding: 20px 30px; 
    border: 1px solid #D2D2D2; 
    background: #fff;
    margin: 10px auto;
}
</style>
<body>
<form  action="?c=03&a=ActualizaContabilidad&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" method="post"  name="frmupdate" id="frmupdate">
<div class="form-control-static" align="right">
<!--<a class="btn btn-default" onClick="recorregrid()" >ActualizaContabilidad Validar</a>&nbsp;-->


<?php 

$letras=array('&quot','\\',';','255','"=',';\" ',';\\','(',')','<span style=\"');
$cad= str_replace($letas,'',$c_desgral);

?>


<?php if($_GET['udni']=='43377015' || $_GET['udni']=='41753251' || $_GET['udni']=='45359577'){?>
&nbsp;
<a class="btn btn-primary" onClick="guarda()">Atualizar</a>&nbsp;
<?php }?>


<a class="btn btn-warning" href="indexinv.php?c=liq01&ncoti=<?php echo $c_numped; ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>" >Ver Liquidación</a>&nbsp;


<a class="btn btn-success" href="view/ventas/reportes/verpdf.php?ncoti=<?php echo $c_numped; ?>&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&cad=<?php echo utf8_encode($cad)  ?>" target="_blank" >Exportar PDF</a>&nbsp;
<a class="btn btn-info" href="indexa.php?c=02&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">Salir</a>&nbsp;
</div>
<div id="dina4">
<table width="936" border="0" class="table table" >
  <tr>
    <td colspan="6" bgcolor="#CCCCCC"><strong>COTIZACION NRO</strong> :<?php echo $c_numped; ?>&nbsp;
      <input type="hidden" name="c_numped" id="c_numped"  value="<?php echo $c_numped; ?>"/>      &nbsp;DOCUMENTO REFERENCIA CLIENTE :<?php echo $c_numocref;?></td>
    </tr>
  <tr>
    <td width="54"><strong>Cliente</strong></td>
    <td width="6">:</td>
    <td width="368"><?php echo utf8_encode($c_nomcli) ?>&nbsp;</td>
    <td width="131"><strong>Codigo Cliente</strong></td>
    <td width="13">:</td>
    <td width="338"><?php echo $c_codcli ?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Fecha</strong></td>
    <td>:</td>
    <td><?php echo vfecha(substr($d_fecped,0,10)) ?>&nbsp;</td>
    <td><strong>Correo</strong></td>
    <td>:</td>
    <td><?php echo $c_email?>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Telf</strong></td>
    <td>:</td>
    <td><?php echo $c_telef  ?></td>
    <td><strong>Contacto</strong></td>
    <td>:</td>
    <td><?php echo utf8_encode(mb_strtoupper($c_contac)); ?></td>
  </tr>
  <tr>
    <td><strong>Leasing</strong></td>
    <td>:</td>
    <td><?php echo $c_nomclileasig  ?>&nbsp;</td>
    <td><strong>T.c</strong></td>
    <td>:</td>
    <td><?php echo $n_tcamb  ?></td>
  </tr>
  <tr>
    <td><strong>Asunto</strong></td>
    <td>:</td>
    <td colspan="4"><?php echo $c_asunto ?>&nbsp;</td>
    </tr>
  <tr>
    <td height="27" colspan="6" ><table width="1009" border="0" style="font-size:11px" >
      <tr>
        <td width="27" align="center" bgcolor="#FFFFCC"><strong>Nro</strong></td>
        <td width="175" align="center" bgcolor="#FFFFCC"><strong>Descripcion</strong></td>
        <td width="96" align="center" bgcolor="#FFFFCC"><strong>Glosa</strong></td>
        <td width="72" align="center" bgcolor="#FFFFCC"><strong>Equipo</strong></td>
        <td width="56" align="center" bgcolor="#FFFFCC"><strong>Clase</strong></td>
        <td width="81" align="center" bgcolor="#FFFFCC"><strong>Aprobado</strong></td>
        <td width="81" align="center" bgcolor="#FFFFCC"><strong>Facturado</strong></td>
        <td width="109" align="center" bgcolor="#FFFFCC"><strong>Alquiler</strong></td>
        <td width="65" align="center" bgcolor="#FFFFCC"><strong>Precio</strong></td>
        <td width="61" align="center" bgcolor="#FFFFCC"><strong>Dscto</strong></td>
        <td width="46" align="center" bgcolor="#FFFFCC"><strong>Cant.</strong></td>
        <td width="90" align="center" bgcolor="#FFFFCC"><strong>Importe</strong></td>
      </tr>
             <?php 
		$i=0;
	//	echo 'aqui nrocot'.$_GET['ncoti'];
		foreach($this->model->ObtenerDataCotizacion($xc_numped) as $itemD):
		/*$c_codprd=$r->c_codprd;	
		$ncoti=$c_numped;
		$n_item=$r->n_item;	 
		$tipo=$r->c_tipped;	*/
		$i=$i+1;
	?>
      <tr>
        <td bgcolor="#CCCCCC"><?php echo $i ?>&nbsp;</td>
        <td bgcolor="#CCCCCC"><?php  if($itemD->clase=='017'){echo $x='SERV. ALQUILER ';}
		elseif($itemD->clase=='002'){echo $x='';}?>&nbsp;<?php echo $itemD->c_desprd ?></td>
        <td bgcolor="#CCCCCC"><?php echo utf8_encode($itemD->c_obsdoc); ?></td>
        <td bgcolor="#CCCCCC"><?php echo $itemD->c_codcont ?></td>
        <td bgcolor="#CCCCCC"><?php  $clase=$itemD->clase; ?>
       
        <select name="<?php echo 'ac_tipped'.$i ?>" id="<?php echo 'ac_tipped'.$i ?>" >	
              <?php foreach($this->maestro->ListarTipCot() as $a):	 ?>                                 
                <option value="<?php echo $a->tc_codi; ?>"<?php echo  $a->tc_codi  == $clase ? 'selected' : ''; ?>> <?php echo $a->tc_desc; ?> </option>
                <?php  endforeach;	 ?>
             </select>
             <input name="<?php echo 'n_item'.$i ?>" id="<?php echo 'n_item'.$i ?>" type="hidden" value="<?php echo $itemD->n_id ?>" />
             
             </td>
        <td align="center" bgcolor="#CCCCCC"><?php  if($itemD->n_apbpre=='1'){echo 'Si';}else{ echo 'No';}  ?></td>
        <td align="center" bgcolor="#CCCCCC"><?php  if($itemD->n_canfac!='0'){echo 'Si';}else{ echo 'No';}  ?></td>
        <td bgcolor="#CCCCCC">&nbsp;<?php echo $itemD->c_fecini;  ?>&nbsp;//&nbsp;<?php echo $itemD->c_fecfin;  ?>&nbsp;</td>
        <td align="right" bgcolor="#CCCCCC"><?php echo number_format($itemD->n_preprd,2); ?></td>
        <td align="right" bgcolor="#CCCCCC"><?php echo number_format($itemD->n_dscto,2); ?></td>
        <td align="center" bgcolor="#CCCCCC"><?php echo $itemD->n_canprd; ?></td>
        <td align="right" bgcolor="#CCCCCC"><?php echo number_format($itemD->n_totimp,2); 
		$total+=$itemD->n_preprd*$itemD->n_canprd;
		$dscto+=$itemD->n_dscto;
		$totaln=$total-$dscto;
		
		 ?></td>
        
      </tr>
       <?php  endforeach; ?>
      <tr>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td align="right" bgcolor="#CCFFFF">&nbsp;</td>
        <td colspan="2" align="right" bgcolor="#CCFFFF">Sub Total(sin dscto):</td>
        <td align="right" bgcolor="#CCFFFF"><?php echo number_format($total,2); ?></td>
      </tr>
      <tr>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td bgcolor="#CCFFFF">&nbsp;</td>
        <td align="right" bgcolor="#CCFFFF">&nbsp;</td>
        <td colspan="2" align="right" bgcolor="#CCFFFF">Dscto</td>
        <td align="right" bgcolor="#CCFFFF"><?php echo number_format($dscto,2); ?></td>
      </tr>
      <tr>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td bgcolor="#00CCFF">&nbsp;</td>
        <td align="right" bgcolor="#00CCFF">&nbsp;</td>
        <td colspan="2" align="right" bgcolor="#00CCFF">Total Pagar</td>
        <td align="right" bgcolor="#00CCFF"><?php echo number_format($totaln,2); ?></td>
      </tr>
     
    </table></td>
    </tr>
  <tr>
    <td height="27" colspan="6" >&nbsp;</td>
  </tr>
  <tr>
    <td height="27" colspan="6" ><table width="1008" border="0" class="table table">
      <tr>
        <td width="174" class="tablaImprimir" style="font-size:14px"><strong>Forma de Pago</strong></td>
        <td width="15">:</td>
        <td width="298"><select name="c_codpga" id="c_codpga" class="form-control input-sm" onChange="OnchangeTipfpago()">
          <option value="000">.:SELECCIONE:.</option> 
          <?php foreach($this->maestro->ListarFpago() as $a): ?>
          <option value="<?php echo $a->TP_CODI; ?>"<?php echo $c_codpga == $a->TP_CODI ? 'selected' : ''; ?>> <?php echo $a->TP_DESC; ?> 
            </option>
          <?php  endforeach;	 ?>
          </select>
          
          
          </td>
        <td width="102"><strong>F. vigencia</strong></td>
        <td width="13">:</td>
        <td width="332"><input name="d_fecvig" id="d_fecvig" class="form-control input-sm" type="text" value="<?php echo vfecha(substr($d_fecvig,0,10)) ?>" /></td>
        </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px"><strong>Precios</strong></td>
        <td>:</td>
        <td><?php if($c_precios=='001'){ echo 'NO INCLUYE IGV'; }else{echo 'INCLUYE IGV';} ?>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px"><strong>Tipo Moneda</strong></td>
        <td>:</td>
        <td><select name="c_codmon" id="c_codmon" class="form-control input-sm" onChange="OnchangeTipMoneda()" disabled > 
          <option value="">.:SELECCIONE:.</option> 
          <?php foreach($this->maestro->ListarMoneda() as $moneda):	 ?>                                 
          <option value="<?php echo $moneda->TM_CODI; ?>"<?php echo $c_codmon == $moneda->TM_CODI ? 'selected' : ''; ?>><?php echo $moneda->TM_DESC; ?></option>
          <?php  endforeach;	 ?>
          </select></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px"><strong>Tiempo de Entrega</strong></td>
        <td>:</td>
        <td><?php echo utf8_encode($c_tiempo) ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px"><strong>Validez de la Oferta</strong></td>
        <td>:</td>
        <td><?php echo utf8_encode($c_validez)?></td>
        <td><input type="hidden" name="login" id="login" value="<?php echo $login ?>" />
          <input name="item" id="item" type="hidden" value="<?php echo $i ?>" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px">USUARIOS</td>
        <td>:</td>
        <td colspan="4">Genera&nbsp;
        
         <?php echo $xc_opcrea ?>&nbsp;Aprueba&nbsp; <?php echo $xc_uaprob ?></td>
      </tr>
      <tr>
        <td class="tablaImprimir" style="font-size:14px"><strong>Facturas Asociadas:</strong></td>
        <td>&nbsp;</td>
        <td colspan="4"><span class="tablaImprimir" style="font-size:14px">
          <?php 
	foreach($this->model->ListaCotiConFacturas($xc_numped) as $fac): 
	echo $fac->PE_NDOC.'|';
	
	endforeach;?></td>
      </tr>
      </table></td>
  </tr>
  </table>

</div>
</form>

</body>

</html>




