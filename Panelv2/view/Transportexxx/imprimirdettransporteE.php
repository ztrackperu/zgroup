<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FW <?php echo $ListarDetalleUpd->c_nrofw ?></title>
<style type="text/css">
html, body {
                margin: 0; 
                padding: 0; 
                overflow: auto;
}

#dina4 {
    width: 200mm;
    height: 250mm;
    padding: 10px 10px; 
    border: 1px solid #D2D2D2; 
    background: #fff;
    margin: 5px auto;
}
</style>
<style type="text/css" media="print">
.nover {display:none}
#factura table tr td table tr td p {
	font-weight: bold;
}
#factura table tr td table tr td p {
	font-weight: bold;
}
</style>
</head>

<body>

<ul class="pro15 nover">
	<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
</ul>

<div id="dina4">
<table width="750" border="0">
  <tr>
    <td colspan="2"><img src="assets/img/logo.png" alt="" width="150" height="40" /></td>
    <td colspan="2" align="center"></td>
  </tr>
  <tr>
    <td colspan="4"><b>REPORTE EXPORTACION FW-ROUTING NRO:</b> <?php echo $ListarDetalleUpd->c_nrofw ?></td>
  </tr>
  <tr>
    <td width="135">Embarcador</td>
    <td width="200"><?php echo $ListarDetalleUpd->c_nomembar; ?></td>
    <td width="138">Cliente Final</td>
    <td width="259"><?php echo $ListarDetalleUpd->c_nomclie; ?></td>
  </tr>
  <tr>
    <td>Nro Booking</td>
    <td><?php echo $ListarDetalleUpd->c_nrobooking; ?></td>
    <td>Nro Cotizacion</td>
    <td><?php echo $ListarDetalleUpd->c_numped ?></td>
  </tr>
  <tr>
    <td>Linea Maritima</td>
    <td><?php echo $ListarDetalleUpd->c_nomlineamar; ?></td>
    <td>Nave</td>
    <td><?php echo $ListarDetalleUpd->c_nomnave ?></td>
  </tr>
  <tr>
    <td>Nro Viaje</td>
    <td><?php echo $ListarDetalleUpd->n_numviaje; ?></td>
    <td>F. Zarpe</td>
    <td><?php 
            $d_feczarpex=$ListarDetalleUpd->d_feczarpe; 
            if($d_feczarpex!=""){
                //FECHA
                $d_feczarpe=vfecha(substr($d_feczarpex,0,10));
				echo $d_feczarpe;
            }			
        ?></td>
  </tr>
   <tr>
    <td colspan="4"><hr /></td>
   </tr>
   <tr>
   		<td>Numero Contenedor</td>
    <td><?php echo $ListarDetalleUpd->c_numequipo; ?></td>
    <td>Tipo</td>
    <td>
	   <?php 
	      $c_codtiprod=$ListarDetalleUpd->c_codtiprod;
           if($c_codtiprod!=''){
			  $TipoProducto=$this->model->ListarTipoProducto($c_codtiprod);
			  echo $TipoProducto->C_DESITM;
		   }
        ?>
    </td>
  </tr>
  <tr>
    <td>Tamaño</td>
    <td><?php echo $ListarDetalleUpd->c_tamequipo ?></td>
    <td>Peso Carga / Bruto</td>
    <td>
		<?php $peso=$ListarDetalleUpd->n_peso.' '.$ListarDetalleUpd->um_peso; if($peso==' '){$peso='-';}?>
        <?php echo $peso.' / '; ?> <?php echo $ListarDetalleUpd->n_pesobru.' '.$ListarDetalleUpd->um_pesobru ?>
     </td>
  </tr>
    <tr>
      <td>Volumen</td>
      <td>
	  	<?php $volumen=$ListarDetalleUpd->n_volumen.' '.$ListarDetalleUpd->um_volumen; if($volumen==' '){$volumen='-';}?>
        <?php echo $volumen; ?>
      </td>
      <td>Tara / Payload</td>
      <td>	
	  	<?php $tara=$ListarDetalleUpd->n_tara.' '.$ListarDetalleUpd->um_tara; if($tara==' '){$tara='-';}?>
        <?php echo $tara.' / '; ?> <?php echo $ListarDetalleUpd->n_payload.' '.$ListarDetalleUpd->um_payload ?>
      </td>
   </tr>
   <tr>
    <td colspan="4"><hr /></td>
   </tr>
  <tr>
    <td>Cod. Terminal Salida</td>
    <td><?php echo $ListarDetalleUpd->c_codtermret; ?></td>
    <td>Nombre Terminal Salida</td>
    <td><?php echo $ListarDetalleUpd->c_nomtermret ?></td>
  </tr>
  <tr>
    <td>Fecha Retiro</td>
    <td> <?php 
            $d_fecretirox=$ListarDetalleUpd->d_fecretiro; 
            if($d_fecretirox!=""){
                //FECHA
                $d_fecretiro=vfecha(substr($d_fecretirox,0,10));
                //HORA
                setlocale(LC_TIME,"es_ES"); 
                $horaretiro=strftime('%H:%M:%S', strtotime($d_fecretirox));
                echo $d_fecretiro.' '.$horaretiro;
			} 			
        ?></td>
    <td>Nro EIR</td>
    <td><?php echo $ListarDetalleUpd->c_numeir ?></td>
  </tr>
  <tr>
    <td>Transportista</td>
    <td><?php echo $ListarDetalleUpd->c_nomtranspote; ?></td>
    <td>Chofer</td>
    <td><?php echo $ListarDetalleUpd->c_chofer ?></td>
  </tr>
  <tr>
    <td>Placas</td>
    <td><?php echo $ListarDetalleUpd->c_placa.' '. $ListarDetalleUpd->c_placa2 ?></td>
    <td>Telefono</td>
    <td><?php echo $ListarDetalleUpd->c_telefono ?></td>
  </tr>
  <tr>
    <td>Generadores</td>
    <td><?php echo $ListarDetalleUpd->c_generador1.' '. $ListarDetalleUpd->c_generador2 ?></td>
    <td>Nro Guia Transporte</td>
    <td><?php echo $ListarDetalleUpd->c_serguiatra.' '.$ListarDetalleUpd->c_nroguiatra; ?></td>
  </tr>  
    <tr>
    <td colspan="4"><hr /></td>
    </tr>
    <tr>
      <td>Cod. Terminal Ingreso</td>
      <td><?php echo $ListarDetalleUpd->c_nomterming ?></td>
      <td>Nombre Terminal Ing.</td>
      <td><?php echo $ListarDetalleUpd->c_nomterming ?></td>
    </tr>
    <tr>
    <td>F. Ingreso Terminal</td>
    <td><?php 
            $d_fecingresox=$ListarDetalleUpd->d_fecingreso; 
            if($d_fecingresox!=""){
                //FECHA
                $d_fecingreso=vfecha(substr($d_fecingresox,0,10));
                //HORA
                setlocale(LC_TIME,"es_ES"); 
                $horaingreso=strftime('%H:%M:%S', strtotime($d_fecingresox));
				echo $d_fecingreso.' '.$horaingreso;
            }			
        ?></td>
    <td>Puerto</td>
    <td><?php echo $ListarDetalleUpd->c_nompuerto ?></td>
  </tr>
    <tr>
      	<td>Transportista</td>
    <td><?php echo $ListarDetalleUpd->c_nomtranspoteb; ?></td>
    <td>Chofer</td>
    <td><?php echo $ListarDetalleUpd->c_choferb ?></td>
  </tr>
  <tr>
    <td>Placas</td>
    <td><?php echo $ListarDetalleUpd->c_placab.' '. $ListarDetalleUpd->c_placa2b ?></td>
    <td>Telefono</td>
    <td><?php echo $ListarDetalleUpd->c_telefonob ?></td>
  </tr>
  <tr>
    <td>Generadores</td>
    <td><?php echo $ListarDetalleUpd->c_generador1b.' '. $ListarDetalleUpd->c_generador2b ?></td>
    <td>Nro Guia Transporte</td>
    <td><?php echo $ListarDetalleUpd->c_serguiatrab.' '.$ListarDetalleUpd->c_nroguiatrab; ?></td>
  </tr>
    <tr>
      <td>Nro Guia Cliente</td>
      <td><?php echo $ListarDetalleUpd->c_serguiaclie.'  '.$ListarDetalleUpd->c_numguiaclie ?></td>
      <td>Ag. Aduana</td>
      <td><?php echo $ListarDetalleUpd->c_nomageaduana ?></td>
    </tr>
  <tr>
    <td>F. Refrendo</td>
    <td><?php 
            $d_fecrefrendox=$ListarDetalleUpd->d_fecrefrendo; 
            if($d_fecrefrendox!=""){
                //FECHA
                $d_fecrefrendo=vfecha(substr($d_fecrefrendox,0,10));
				echo $d_fecrefrendo;
            }			
        ?></td>
    <td>Nro DAM</td>
    <td><?php echo $ListarDetalleUpd->c_numdam ?></td>
  </tr>
  <tr>
    <td>Tipo Canal</td>
    <td><?php echo $ListarDetalleUpd->c_tipcanal ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
      <td colspan="4"><hr /></td>
    </tr>
  <tr>
    <td>Nro Factura PSCARGO</td>
    <td><?php echo $ListarDetalleUpd->c_serfacfwpsc.' '.$ListarDetalleUpd->c_serfacfwpsc; ?></td>
    <td>Fecha Factura</td>
    <td><?php 
            $d_fecfacturapscx=$ListarDetalleUpd->d_fecfacturapsc; 
            if($d_fecfacturapscx!=""){
                //FECHA
                $d_fecfacturapsc=vfecha(substr($d_fecfacturapscx,0,10));
				echo $d_fecfacturapsc;
            }			
        ?></td>
  </tr>
  <tr>
   <td>Nro Factura ZGROUP</td>
   <td><?php echo $ListarDetalleUpd->c_serfacfw.' '.$ListarDetalleUpd->c_serfacfw; ?></td>
   <td>Fecha Factura</td>
    <td><?php 
            $d_fecfacturax=$ListarDetalleUpd->d_fecfactura; 
            if($d_fecfacturax!=""){
                //FECHA
                $d_fecfactura=vfecha(substr($d_fecfacturax,0,10));
				echo $d_fecfactura;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Ag. Maritimo</td>
    <td><?php echo $ListarDetalleUpd->c_nomagemari ?></td>
    <td>Fecha Pago VB</td>
    <td><?php 
            $d_fecpagvbx=$ListarDetalleUpd->d_fecpagvb; 
            if($d_fecpagvbx!=""){
                //FECHA
                $d_fecpagvb=vfecha(substr($d_fecpagvbx,0,10));
				echo $d_fecpagvb;
            }			
        ?></td>
  </tr>
  <tr>
    <td>F. Recepcion Fac. Comercial</td>
    <td><?php 
            $d_fecrecpfacx=$ListarDetalleUpd->d_fecrecpfac; 
            if($d_fecrecpfacx!=""){
                //FECHA
                $d_fecrecpfac=vfecha(substr($d_fecrecpfacx,0,10));
				echo $d_fecrecpfac;
            }			
        ?></td>
    <td>Fecha Entrega Ag. Aduana</td>
    <td><?php 
            $d_fecentreadx=$ListarDetalleUpd->d_fecentread; 
            if($d_fecentreadx!=""){
                //FECHA
                $d_fecentread=vfecha(substr($d_fecentreadx,0,10));
				echo $d_fecentread;
            }			
        ?></td>
  </tr>
  <tr>
    <td colspan="4"><hr /></td>
   </tr>  
    <tr>
    <td>Km Inicial</td>
    <td><?php echo $ListarDetalleUpd->c_kminicio; ?>&nbsp;</td>
    <td>Km Final</td>
    <td><?php echo $ListarDetalleUpd->c_kmfin; ?>&nbsp;</td>
  </tr>
  <tr>
    <td>Precinto Vacio</td>
    <td><?php echo $ListarDetalleUpd->c_precivacio ?></td>
    <td>Precinto Aduana</td>
    <td><?php echo $ListarDetalleUpd->c_preciaduana ?></td>
  </tr>
  <tr>
    <td>Precinto Zgroup</td>
    <td><?php echo $ListarDetalleUpd->c_precizgroup ?></td>
    <td>Precinto Linea 1</td>
    <td><?php echo $ListarDetalleUpd->c_precilinea ?></td>
  </tr>
  <tr>
    <td>Precinto Linea 2</td>
    <td><?php echo $ListarDetalleUpd->c_precilinea2 ?></td>
    <td>Precinto Linea 3</td>
    <td><?php echo $ListarDetalleUpd->c_precilinea3 ?></td>
  </tr>
  <tr>
    <td>Cod. Termoreg.1</td>
    <td><?php echo $ListarDetalleUpd->c_codterm1 ?></td>
    <td>Cod. Termoreg.2</td>
    <td><?php echo $ListarDetalleUpd->c_codterm2 ?></td>
  </tr>
  <tr>
    <td>Temperatura</td>
    <td><?php echo $ListarDetalleUpd->c_temp ?></td>
    <td>Ventilacion</td>
    <td><?php echo $ListarDetalleUpd->c_venti ?></td>
  </tr>
  <tr>
    <td>Humedad</td>
    <td><?php echo $ListarDetalleUpd->c_humedad ?></td>
    <td>%Oxigeno(O2)</td>
    <td><?php echo $ListarDetalleUpd->c_oxigeno ?></td>
  </tr>
  <tr>
    <td>%Diox.Carb.(CO2)</td>
    <td><?php echo $ListarDetalleUpd->c_dioxido ?></td>
    <td>Codigo Purfresh</td>
    <td><?php echo $ListarDetalleUpd->c_codpurfresh ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</div>
</body>

</html>
