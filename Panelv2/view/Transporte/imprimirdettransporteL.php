<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SERVICIO <?php echo $ListarDetalleUpd->c_numped ?></title>
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
    <td colspan="4" align="center"><img src="assets/img/logo.png" alt="" /></td>
  </tr>
  <tr>
    <td colspan="4"><b>REPORTE  LOCAL COTIZACION NRO:</b><?php echo $ListarDetalleUpd->c_numped ?></td>
  </tr>
  <tr>
    <td width="134">RUC Cliente</td>
    <td width="202"><?php echo $ListarDetalleUpd->c_rucclie; ?></td>
    <td width="115">Nombre Cliente</td>
    <td width="281"><?php echo $ListarDetalleUpd->c_nomclie; ?></td>
  </tr>
  <tr>
    <td>Nro Factura</td>
    <td><?php echo $ListarDetalleUpd->c_seriefac.' '.$ListarDetalleUpd->c_numerofac ?></td>
    <td>Fecha Factura</td>
    <td><?php 
            $d_fecfacx=$ListarDetalleUpd->d_fecfac; 
            if($d_fecfacx!=""){
                //FECHA
                $d_fecfac=vfecha(substr($d_fecfacx,0,10));
				echo $d_fecfac;
            }			
        ?></td>
  </tr>
  <tr>
    <td>EIR Contenedor</td>
    <td><?php echo $ListarDetalleUpd->c_eirconten ?></td>
    <td>Descripcion</td>
    <td><?php echo $ListarDetalleUpd->c_desconten ?></td>
  </tr>
  <tr>
    <td>Numero Contenedor</td>
    <td><?php echo $ListarDetalleUpd->c_numequipo ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>EIR Generador</td>
    <td><?php echo $ListarDetalleUpd->c_eirgen ?></td>
    <td>Descripcion</td>
    <td><?php echo $ListarDetalleUpd->c_desgen ?></td>
  </tr>
   <tr>
     <td colspan="4"><hr /></td>
   </tr>
  <tr>
    <td>Nro Transportacion</td>
    <td><?php echo $ListarDetalleUpd->c_nrotransp ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Guia Transp. lleno</td>
    <td><?php echo $ListarDetalleUpd->c_guiatranslleno ?></td>
    <td>Fecha </td>
    <td><?php 
            $d_fecguiatransllex=$ListarDetalleUpd->d_fecguiatranslle; 
            if($d_fecguiatransllex!=""){
                //FECHA
                $d_fecguiatranslle=vfecha(substr($d_fecguiatransllex,0,10));
                echo $d_fecguiatranslle;
			} 			
        ?></td>
    </tr>
  <tr>
    <td>Guia Transp. vacio</td>
    <td><?php echo $ListarDetalleUpd->c_guiatransvacio ?></td>
    <td>Fecha</td>
    <td><?php 
            $d_fecguiatransvax=$ListarDetalleUpd->d_fecguiatransva; 
            if($d_fecguiatransvax!=""){
                //FECHA
                $d_fecguiatransva=vfecha(substr($d_fecguiatransvax,0,10));
                echo $d_fecguiatransva;
			} 			
        ?></td>
  </tr>
  <tr>
    <td>Transportista.</td>
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
    <td>Direccion Salida</td>
    <td><?php echo utf8_encode($ListarDetalleUpd->c_diresal); ?></td>
    <td>Direccion Llegada</td>
    <td><?php echo utf8_encode($ListarDetalleUpd->c_direlle); ?></td>
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
     <td colspan="4"><hr /></td>
   </tr>
   <tr>
     <td>OBSERVACION:</td>
     <td colspan="3"><?php echo $ListarDetalleUpd->c_observacion ?></td>
   </tr>
</table>


</div>
</body>

</html>
