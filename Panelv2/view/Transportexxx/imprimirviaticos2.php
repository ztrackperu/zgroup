<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tamaño DIN A4</title>
<style type="text/css">
html, body {
                margin: 0; 
                padding: 0; 
                overflow: auto;
}
body { 
    background: #f2f2f2; 
    font-family: Arial; 
    font-size: 13px; 
    line-height: 1.6; 
    color: #444; 
} 
#dina4 {
    /*width: 200mm;
    height: 250mm;
    padding: 20px 60px; 
    border: 1px solid #D2D2D2; 
    background: #fff;
    margin: 10px auto;*/
	width: 200mm;   
    height: auto;
    padding: 10px 25px; 
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
	<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir.</b></a></li>
</ul>

<div id="dina4">
<table width="730" border="0">
  <tr>
    <td colspan="4"><b>REPORTE DE VIATICOS</b></td>
    </tr>
  <tr>
    <td width="182">Solicitud Viatico Nro</td>
    <td width="182"><?php echo $ListarCabViaticos->Id_viatico ?></td>
    <td width="182">Servicio Nro</td>
    <td width="162"><?php echo $ListarCabViaticos->Id_servicio ?></td>
  </tr>
  <tr>
    <td>Nro FW</td>
    <td><?php echo $ListarCabViaticos->c_nrofw ?></td>
    <td>Nro Cotizacion</td>
    <td><?php echo $ListarCabViaticos->c_numped ?></td>
  </tr>
  <tr>
    <td>Fecha Servicio</td>
    <td><?php 
            $d_fectranx=$ListarCabViaticos->d_fectran; 
            if($d_fectranx!=""){
                //FECHA
                $d_fectran=vfecha(substr($d_fectranx,0,10));
				echo $d_fectran;
            }			
        ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><hr /></td>
  </tr>  
  <tr>
    <td colspan="4"><table width="700" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="35" bgcolor="#66FFFF">Nro</td>
        <td width="142" bgcolor="#66FFFF">Concepto</td>
        <td width="99" bgcolor="#66FFFF">Glosa</td>
        <td width="77" bgcolor="#66FFFF">F. Solicitud</td>
        <td width="85" bgcolor="#66FFFF">Importe</td>
        <td width="116" bgcolor="#66FFFF">Ref. Documento</td>
        <td width="84" bgcolor="#66FFFF">F. Entrega Viatico</td>
        <td width="66" bgcolor="#66FFFF">Autorizado Por</td>
        </tr>
      <?php 
	  	if($ListarDetViaticos!=NULL){
			$i=1;
			foreach($ListarDetViaticos as $item){
				$Id_detviatico=$item->Id_detviatico;
				$c_moneda=$item->c_moneda;
					if($c_moneda=='0'){	
					  $mon='S/. ';		
					}else{
					  $mon='US$. ';
					}					
	  ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo utf8_encode($item->c_nomconcepto) ?></td>
        <td><?php echo utf8_encode($item->c_descripcion) ?></td>
        <td><?php $d_fecsolx=$ListarCabViaticos->d_fecsol; 
            if($d_fecsolx!=""){
                //FECHA
                $d_fecsol=vfecha(substr($d_fecsolx,0,10));
				echo $d_fecsol;
            } ?></td>
        <td><?php echo $mon.$item->n_importe;?></td>
        <td><?php echo $item->c_refdeposito ?></td>
        <td><?php $d_fecdepositox=$item->d_fecdeposito; 
            if($d_fecdepositox!=""){
                //FECHA
                $d_fecdeposito=vfecha(substr($d_fecdepositox,0,10));
				echo $d_fecdeposito;
            } ?></td>
        <td><?php echo utf8_encode($item->c_usuaut) ?></td>
        </tr>
      <tr>
      	 <?php 
	  	$ListarLiquidar=$this->model->ListarLiquidar($Id_detviatico);
	  	if($ListarLiquidar!=NULL){
		?>
        <td colspan="8"><table width="605" border="0" align="center">
        
      <tr>
                <td width="31"><strong>Nro</strong></td>
                <td width="79"><strong>Importe</strong></td>
                <td width="100"><strong>Tipo Dcto</strong></td>
                <td width="77"><strong>Serie Dcto</strong></td>
                <td width="88"><strong>N° Dcto</strong></td>
                <td width="99"><strong>F.  Dcto</strong></td>
                <td width="101"><strong>Usuario Liquidó</strong></td>
                </tr>
              <?php 
                    $j=1;
                    foreach($ListarLiquidar as $itemliq){
                        $c_moneda=$itemliq->c_moneda;
                            if($c_moneda=='0'){	
                              $mon='S/. ';		
                            }else{
                              $mon='US$. ';
                            }					
              ?>
              <tr>
                <td><?php echo $j; ?></td>
                <td><?php echo $mon.$itemliq->n_impogast?></td>
                <td>
					<?php 
						$c_tipdoc=$itemliq->c_tipdoc;
						if($c_tipdoc!=NULL){
							$listartipodoc=$this->model->ListarTipoDocumentoCont($c_tipdoc);
							echo $listartipodoc->C_DESITM;
						}
					?>
                
                </td>
                <td><?php echo $itemliq->c_seriedoc?></td>
                <td><?php echo $itemliq->c_numdoc?></td>
                <td><?php $d_fecdocx=$itemliq->d_fecdoc; 
                    if($d_fecdocx!=""){
                        //FECHA
                        $d_fecdoc=vfecha(substr($d_fecdocx,0,10));
                        echo $d_fecdoc;
                    } ?></td>
                <td><?php $UsLiq = $itemliq->c_usuliq; 
                           if($UsLiq == '40046531'){echo "WZABARBURU";}
                       elseif($UsLiq == '41696274'){echo "MARISOL";}
                       elseif($UsLiq == '43377015'){echo "SISTEMAS";}
                       elseif($UsLiq == '47102252'){echo "MHUAMAN";}
                       elseif($UsLiq == '44177106'){echo "TRANSPORTE";}
                       elseif($UsLiq == '70210612'){echo "JLINARES";}
                       elseif($UsLiq == '73445645'){echo "LMORI";}
                       elseif($UsLiq == '76918261'){echo "KESPIRITU";}
                       elseif($UsLiq == '70498492'){echo "SOPORTE";}
                       else {echo $itemliq->c_usuliq;}
                    ?></td>
                </tr> 
      <?php
	  		$j=$j+1;
			}
		//}
	  ?>
      </table></td>
      <?php } ?>
      </tr>
      <tr>
          <td colspan="2" bgcolor="#66FFFF">Gasto Total</td>
          <td colspan="2"><?php echo $mon.$item->n_impogastot; ?></td>
          <td bgcolor="#66FFFF">Saldo</td>
          <td colspan="2">
		  	<?php 
				$saldo=$item->n_saldo;
				if(trim($saldo=='') || trim($saldo)==NULL){
					$saldo=($item->n_importe-$item->n_impogastot);
				}
				echo $mon.$saldo; 
			?>
          </td>
          <td>&nbsp;</td>
      <tr>
      <?php
	  		$i=$i+1;
			}
		}
	  ?>
      </table></td>
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
