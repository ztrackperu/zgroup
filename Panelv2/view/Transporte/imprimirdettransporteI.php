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
</head>

<body>
<div id="dina4">
<table width="750" border="0">
   <tr>
    <td colspan="2">
        <img src="assets/img/logo.png" width="150" height="40" /> 
    </td>
    <td colspan="2" align="center">        
        
    </td>
  </tr>
  <tr>
    <td colspan="4"><b>REPORTE IMPORTACION FW-ROUTING NRO:</b> <?php echo $ListarDetalleUpd->c_nrofw ?></td>
    </tr>
  <tr>
    <td width="148">Consignatario</td>
    <td width="212"><?php echo $ListarDetalleUpd->c_nomconsig ?></td>
    <td width="141">Icoterm</td>
    <td width="231"><?php echo $ListarDetalleUpd->c_icoterm ?></td>
  </tr>
  <tr>
    <td>Nro Bl Master</td>
    <td><?php echo $ListarDetalleUpd->c_nblmaster ?></td>
    <td>Nro Bl Hijo</td>
    <td><?php echo $ListarDetalleUpd->c_nblhijo ?></td>
  </tr>
  <tr>
    <td>Linea Maritma</td>
    <td><?php echo $ListarDetalleUpd->c_nomlineamar ?></td>
    <td>F. Pago Flete Marit. MBL</td>
    <td><?php 
            $d_fecpagblmx=$ListarDetalleUpd->d_fecpagblm; 
            if($d_fecpagblmx!=""){
                //FECHA
                $d_fecpagblm=vfecha(substr($d_fecpagblmx,0,10));
				echo $d_fecpagblm;
            }			
        ?></td>
  </tr>
  <tr>
    <td>F. Pago Flete Marit. HBL</td>
    <td><?php 
            $d_fecpagblhx=$ListarDetalleUpd->d_fecpagblh; 
            if($d_fecpagblhx!=""){
                //FECHA
                $d_fecpagblh=vfecha(substr($d_fecpagblhx,0,10));
				echo $d_fecpagblh;
            }			
        ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Nave</td>
    <td><?php echo $ListarDetalleUpd->c_nomnave ?></td>
    <td>Nro Viaje</td>
    <td><?php echo $ListarDetalleUpd->n_numviaje ?></td>
  </tr>
  <tr>
    <td>F. ETD Origen</td>
    <td><?php 
            $d_fecetdorigx=$ListarDetalleUpd->d_fecetdorig; 
            if($d_fecetdorigx!=""){
                //FECHA
                $d_fecetdorig=vfecha(substr($d_fecetdorigx,0,10));
				echo $d_fecetdorig;
            }			
        ?></td>
    <td>F. ETD Callao</td>
    <td><?php 
            $d_fecetdodestx=$ListarDetalleUpd->d_fecetdodest; 
            if($d_fecetdodestx!=""){
                //FECHA
                $d_fecetdodest=vfecha(substr($d_fecetdodestx,0,10));
				echo $d_fecetdodest;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Nro Manifiesto</td>
    <td><?php echo $ListarDetalleUpd->c_nummanifiesto ?></td>
    <td>F. Transmision HBL</td>
    <td><?php 
            $d_fectransblmx=$ListarDetalleUpd->d_fectransblm; 
            if($d_fectransblmx!=""){
                //FECHA
                $d_fectransblm=vfecha(substr($d_fectransblmx,0,10));
				echo $d_fectransblm;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Condion Embarque</td>
    <td><?php echo $ListarDetalleUpd->c_condemb ?></td>
    <td>Consolidador</td>
    <td><?php echo $ListarDetalleUpd->c_nomconsolidador ?></td>
  </tr>
  <tr>
    <td>Tipo Servicio</td>
    <td><?php echo $ListarDetalleUpd->c_tipserv ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>Almacen</td>
    <td><?php echo $ListarDetalleUpd->c_nomalmacen ?></td>
    <td>F. Pago Almacen</td>
    <td><?php 
            $d_fecpagalmx=$ListarDetalleUpd->d_fecpagalm; 
            if($d_fecpagalmx!=""){
                //FECHA
                $d_fecpagalm=vfecha(substr($d_fecpagalmx,0,10));
				echo $d_fecpagalm;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Cod. Ag. Maritimo</td>
    <td><?php echo $ListarDetalleUpd->c_codagenmari ?></td>
    <td>Nombre Ag. Maritimo</td>
    <td><?php echo $ListarDetalleUpd->c_nomagemari ?></td>
  </tr>
  <tr>
    <td>Importe THC</td>
    <td><?php echo $ListarDetalleUpd->n_impthc ?></td>
    <td>F. Pago THC</td>
    <td><?php 
            $d_fecpagthcx=$ListarDetalleUpd->d_fecpagthc; 
            if($d_fecpagthcx!=""){
                //FECHA
                $d_fecpagthc=vfecha(substr($d_fecpagthcx,0,10));
				echo $d_fecpagthc;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Importe VB</td>
    <td><?php echo $ListarDetalleUpd->n_impvb ?></td>
    <td>F. Pago VB</td>
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
    <td>Dias Libre Sobrestadia</td>
    <td><?php echo $ListarDetalleUpd->n_dlibres ?></td>
    <td>F. Max Dev. Vacio</td>
    <td><?php 
            $d_fecmaxdevx=$ListarDetalleUpd->d_fecmaxdev; 
            if($d_fecmaxdevx!=""){
                //FECHA
                $d_fecmaxdev=vfecha(substr($d_fecmaxdevx,0,10));
				echo $d_fecmaxdev;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Dias Libre Electricidad</td>
    <td><?php echo $ListarDetalleUpd->n_dlibelect ?></td>
    <td>Factura Proveedor</td>
    <td><?php echo $ListarDetalleUpd->c_serfacprov.' '.$ListarDetalleUpd->c_numfacprov; ?></td>
  </tr>
  <tr>
    <td>Traduccion Factura</td>
    <td><?php echo $ListarDetalleUpd->c_tradfac ?></td>
    <td>Poliza Seguro</td>
    <td><?php echo $ListarDetalleUpd->c_nropolizaseg ?></td>
  </tr>
  <tr>
    <td>F. BL Endosado</td>
    <td><?php 
            $d_fecendosex=$ListarDetalleUpd->d_fecendose; 
            if($d_fecendosex!=""){
                //FECHA
                $d_fecendose=vfecha(substr($d_fecendosex,0,10));
				echo $d_fecendose;
            }			
        ?></td>
    <td>Cod. Ag. Aduana</td>
    <td><?php echo $ListarDetalleUpd->c_codageaduana ?></td>
  </tr>
  <tr>
    <td>Nombre Ag. Aduana</td>
    <td><?php echo $ListarDetalleUpd->c_nomageaduana ?></td>
    <td>Valor Aduana</td>
    <td><?php echo $ListarDetalleUpd->c_valaduana ?></td>
  </tr>
  <tr>
    <td>F. Volante</td>
    <td><?php 
            $d_fecvolantex=$ListarDetalleUpd->d_fecvolante; 
            if($d_fecvolantex!=""){
                //FECHA
                $d_fecvolante=vfecha(substr($d_fecvolantex,0,10));
				echo $d_fecvolante;
            }			
        ?></td>
    <td>F.Numeracion DUA</td>
    <td><?php 
            $d_fecnumduax=$ListarDetalleUpd->d_fecnumdua; 
            if($d_fecnumduax!=""){
                //FECHA
                $d_fecnumdua=vfecha(substr($d_fecnumduax,0,10));
				echo $d_fecnumdua;
            }			
        ?></td>
  </tr>
  <tr>
    <td>Canal</td>
    <td><?php echo $ListarDetalleUpd->c_canal ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td colspan="4"><hr /></td>
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
