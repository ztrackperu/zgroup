<?php // if($reporteot!=NULL){
	
foreach($this->model->ImprimirOTM($c_numot) as $r):			
			$c_numot=$r->ot;
			$c_codmon=$r->c_codmon;
			$c_desequipo=$r->c_desequipo;
			$unidad=$r->unidad;
			$c_treal=$r->c_asunto;
			 $xc_codsupervisa=$r->c_codsupervisa;
			 $xc_codsolicita=$r->c_codsolicita;
			$c_lugartab=$r->c_lugartab;
			$d_fecdcto=$r->d_fecdcto;
			$c_usrcrea=$r->c_usrcrea;
			$c_uaprobx=$r->c_usrcierra;
				if($r->c_codmon=='0'){$moneda='SOLES';}else{$moneda='DOLARES';}
				
endforeach;

					//}// fin foreach
						/*$resultados=Obtener_UserOTM($c_uaprobx);
						foreach($resultados as $user){
							$c_uaprob=$user['Usuario'];*/
						//}// fin foreach?>
                        <?php 
               //$listasolicitante=$this->maestro->ListaUsuariosOT(); 
			   $listasolicitante=$this->maestro->ListaUsuarioOT($xc_codsolicita);

								
				 $c_solicita=$listasolicitante->c_nombre;	
				
				$listasupervisa=$this->maestro->ListaUsuarioOT($xc_codsolicita);

								
				 $c_supervisa=$listasupervisa->c_nombre;	
          
/*					if( $lissol->Id == $xc_codsupervisa){
								echo $c_supervisa=$lissol->c_login;
	
               		 } */
			
			   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro Orden Trabajo</title>
<style type="text/css">
html, body {
                margin: 0; 
                padding: 0; 
                overflow: auto;
}
body { 
     
  
    line-height: 1.6; 
    color: #444; 
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
</style>
</head>

<body>
<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="#" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
<div id="dina4">
<table width="756" border="0" align="left" cellpadding="0" cellspacing="0" style="font-family: Calibri;font-size:12px">
  <tr>
    <td colspan="4"><table width="730" border="0" cellpadding="0" cellspacing="0" style="font-family: Calibri;font-size:12px">
      <tr>
        <td width="249" rowspan="3"><img src="assets/img/logo.png" width="139" height="36" /></td>
        <td width="357" align="right"><strong>Fecha de Impresión</strong></td>
        <td width="10"><strong>:</strong></td>
        <td width="119" align="left"><?php echo date("d/m/y")." ".date("H:i:s");?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Nro Orden Trabajo</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $c_numot ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><strong>Generado Por</strong></td>
        <td><strong>:</strong></td>
        <td align="left"><?php echo $c_usrcrea ?>&nbsp;</td>
      </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4" align="center"  class="t_titulo"><strong>ORDEN DE TRABAJO</strong></td>
    </tr>
  <tr>
    <td colspan="4"><hr /></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="754" border="0" cellpadding="0" cellspacing="0" style="font-family: Calibri;font-size:12px">
      <tr>
        <td width="123"><strong>Trabajo A Realizar</strong></td>
        <td><strong>:</strong></td>
        <td colspan="7"><?php echo $c_treal ?>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Fecha Orden</strong></td>
        <td width="3"><strong>:</strong></td>
        <td width="147"><?php echo vfecha(substr($d_fecdcto,0,10)) ?>&nbsp;</td>
        <td width="65"><strong>Moneda </strong></td>
        <td width="3"><strong>:</strong></td>
        <td width="201"><?php echo $moneda ?>&nbsp;</td>
        <td width="81">&nbsp;</td>
        <td width="4">&nbsp;</td>
        <td width="127">&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Solicitado Por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_solicita ?>&nbsp;</td>
        <td><strong>Superv. por</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_supervisa ?>&nbsp;</td>
        <td><strong>Lugar Trabajo</strong></td>
        <td><strong>:</strong></td>
        <td><?php echo $c_lugartab ?>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Equipo</strong></td>
        <td><strong>:</strong></td>
        <td colspan="7"><?php echo $c_desequipo ?>&nbsp;&nbsp;<?php echo $unidad ?>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  <tr>
    <td colspan="4"><hr /></td>
    </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="734" border="1" cellpadding="0" cellspacing="0" style="font-family: Calibri;font-size:12px">
      <tr>
        <td width="89" align="center" bgcolor="#CCCCCC"><strong>Ruc</strong></td>
        <td width="197" align="center" bgcolor="#CCCCCC"><strong>Proveedor</strong></td>
        <td width="217" align="center" bgcolor="#CCCCCC"><strong>Trabajo Realizado</strong></td>
        <td width="217" align="center" bgcolor="#CCCCCC"><strong>Tecnico Encargado</strong></td>
        </tr>
      <?php 
									
								$i = 1;
								foreach($this->model->ImprimirOTM($c_numot) as $r):	
								$i++;
							
							?>
      <tr>
        <td align="center"><?php echo $r->c_rucprov; ?></td>
        <td align="center"><?php echo strtoupper($r->c_nomprov); ?></td>
        <td align="center"><?php echo strtoupper($r->concepto.'-'.$r->c_subconcepto); ?></td>
        <td align="center"><?php echo strtoupper($r->c_tecnico); ?></td>
        </tr>
      <?php endforeach; ?>
      </table></td>
  </tr>
  <tr>
    <td width="106">&nbsp;</td>
    <td width="148">&nbsp;</td>
    <td width="324">&nbsp;</td>
    <td width="253">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><hr /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="731" border="0" style="font-family: Calibri;font-size:12px" >
      <tr>
        <td colspan="3"><strong>Insumos Utilizados Para este Trabajo</strong></td>
        </tr>
      <tr>
        <td width="177" align="center" bgcolor="#CCCCCC"><strong>Nota Salida</strong></td>
        <td width="426" align="center" bgcolor="#CCCCCC"><strong>Descripcion</strong></td>
        <td width="83" align="center" bgcolor="#CCCCCC"><strong>Cantidad</strong></td>
        </tr>
           <?php 
							if($reportens != NULL)
							{		
								$i = 1;
								foreach($reportens as $item)
								{
							
							?>
      <tr>
        <td><?php  echo $item['NT_NDOC']; ?></td>
        <td><?php echo $item['IN_ARTI']; ?></td>
        <td align="center"><?php   echo $item['NT_CANT']; ?></td>
        </tr>
        <?php }
		
		}?>
    </table></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><hr /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>NOMBRE Y FIRMA </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>SUPERVISOR</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>


</div>
</body>

</html>
