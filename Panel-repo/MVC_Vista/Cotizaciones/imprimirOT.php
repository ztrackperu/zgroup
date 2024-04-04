   <?php 
 
	if($imprimeotcab!=NULL){
foreach ($imprimeotcab as $itemT) 
{
	$ot_nro=$itemT['ot_nro'];$ot_descr=$itemT['ot_descr'];$ot_equipo=$itemT['ot_equipo'];$ot_mar=$itemT['ot_mar'];$ot_mod=$itemT['ot_mod'];$ot_serie=$itemT['ot_serie'];$ot_soli=$itemT['ot_soli'];
$ot_res=$itemT['ot_res'];$ot_fecejc=$itemT['ot_fecejc'];$ot_aut=$itemT['ot_aut'];$ot_sup=$itemT['ot_sup'];$ot_personal=$itemT['ot_personal'];$ot_h1=$itemT['ot_h1'];$ot_h2=$itemT['ot_h2'];$ot_h3=$itemT['ot_h3'];$ot_med=$itemT['ot_med'];
$ot_obs=$itemT['ot_obs'];$ot_costo=$itemT['ot_costo'];$ot_est=$itemT['ot_est'];$ot_usuario=$itemT['ot_usuario'];$otfecreg=$itemT['otfecreg'];
	
	}
		}else{
			
			$mensaje="No Tiene Orden de Trabajo";
  print "<script>alert('$mensaje')</script>";
			
			}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
 
<style type="text/css" media="print">
.nover {display:none}
</style>
</head>
<body class="control">

<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>
<?php /*?><li><a href="#nogo"><em class="calendar"></em><b>Exporta a Word </b></a></li>
<li><a href="#nogo"><em class="camera"></em><b>Exportar a Excel</b></a></li>
<?php */?>
<li><a href="cajaC.php?acc=cn00" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>

<div class="cuerpo1">

    <form id="frmImpresion" name="formElem" method="post" >

             
  <table width="634" border="0" align="left" cellpadding="0" cellspacing="0" class="tablaImprimir">
            <tr>
	          <td><table width="635" border="0" align="left" cellpadding="0" cellspacing="0">
	            <tr>
	              <td width="411" rowspan="2"><img src="logochiquito.jpg" width="144" height="44"></td>
	              <td width="124"><strong>Fecha de Impresión:</strong></td>
	              <td width="130"><?php date_default_timezone_set('America/Lima');  echo date("d/m/y")." ".date("H:i:s");?></td>
                </tr>
	            <tr>
	              <td style="size:15px"><strong>Orden Trabajo Nro</strong></td>
	              <td style="size:15px"><?php echo '0000'.$ot_nro;?></td>
                </tr>
              </table></td>
          </tr>
	        <tr>
	          <td class="" style="font-size:14px;" align="center" ><strong>ORDEN DE TRABAJO</strong></td>
          </tr>
	        <tr>
	          <td><hr></td>
          </tr>
	        <tr>
	          <td width="634">DESCRIPCION DEL TRABAJO :<?php echo $ot_descr;?></td>
          </tr>
	        <tr>
	          <td><hr></td>
      </tr>
	        <tr>
	          <td><strong>1.-INFORMACION</strong></td>
          </tr>
	        <tr>
	          <td><hr></td>
          </tr>
	        <tr>
	          <td>
              
                     
                   
                <table width="632" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="1%"><strong>EQUIPO</strong></td>
                    <td width="1%">:</td>
                    <td width="31%"><?php echo $ot_equipo;?></td>
                    <td width="9%"><strong>MARCA</strong></td>
                    <td width="2%">:</td>
                    <td width="27%"><?php echo $ot_mar?></td>
                    <td width="7%"><strong>MODELO</strong>:</td>
                    <td><?php echo $ot_mod;?></td>
                  </tr>
                  <tr>
                    <td><strong>SERIE</strong></td>
                    <td>:</td>
                    <td><?php echo $ot_serie;?></td>
                    <td><strong>UBICACION</strong></td>
                    <td>:</td>
                    <td><?php echo 'Almacen';?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
            <tr>
              <td colspan="4" align="center" bgcolor="#CCCCCC"><strong>SOLICITADA</strong></td>
              <td rowspan="5" align="center">|</td>
              <td colspan="3" align="center" bgcolor="#CCCCCC"><strong>AUTORIZADA</strong></td>
              </tr>
            <tr>
              <td colspan="4" align="center"><?php echo $ot_soli;?></td>
              <td colspan="3" align="center"><?php echo $ot_aut;?></td>
              </tr>
            <tr>
              <td colspan="4" align="center"><hr></td>
              <td colspan="3" align="center"><hr></td>
            </tr>
            <tr>
              <td colspan="3" align="center" bgcolor="#CCCCCC"><strong>RESPÓNSABLE DE EJECUCION</strong></td>
              <td align="center" bgcolor="#CCCCCC"><strong>FECHA</strong></td>
              <td colspan="3" align="center" bgcolor="#CCCCCC"><strong>SUPERVISOR DE EJECUCION</strong></td>
              </tr>
            <tr>
              <td colspan="3" align="center"><?php echo $ot_res;?></td>
              <td align="center"><?php echo substr($ot_fecejc,0,10);?></td>
              <td colspan="3" align="center"><?php echo $ot_sup;?></td>
              </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
            <tr>
              <td colspan="8"><strong>II TAREAS A EJECUTAR</strong></td>
              </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
            <tr>
              <td colspan="8"><table width="630" border="1" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="323" align="center" bgcolor="#CCCCCC"><strong>DESCRIPCION DE LA TAREA</strong></td>
                  <td width="110" align="center" bgcolor="#CCCCCC"><strong>TIEMPO ESTIMADO</strong></td>
                  <td width="183" align="center" bgcolor="#CCCCCC"><strong>TIEMPO REAL</strong></td>
                </tr>
                 <?php 
							if($imprimeotde1 != NULL)
							{		
								$i = 1;
								foreach($imprimeotde1 as $itemE)
								{
									
							?>
                <tr>
                  <td><?php echo $itemE['ot_tarea'];?></td>
                  <td><?php echo $itemE['ot_h1'];?></td>
                  <td><?php echo $itemE['ot_h2'];?></td>
                </tr>
                <?php }}?>
              </table></td>
              </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
                
            <tr>
              <td colspan="4"><strong>III REPUESTOS REQUERIDO</strong></td>
              <td colspan="3">&nbsp;</td>
              <td width="16%"></td>
              </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
           
            <tr>
              <td colspan="8"><table width="630" border="1" cellpadding="1" cellspacing="1">
                <tr>
                  <td width="72" align="center" bgcolor="#CCCCCC"><strong>CODIGO</strong></td>
                  <td width="307" align="center" bgcolor="#CCCCCC"><strong>DESCRIPCION DEL REPUESTO</strong></td>
                  <td width="119" align="center" bgcolor="#CCCCCC"><strong>CANTIDA PLANEADA</strong></td>
                  <td width="113" align="center" bgcolor="#CCCCCC"><strong>CANTIDAD UTILIZADA</strong></td>
                </tr>
                 <?php 
							if($imprimeotde2 != NULL)
							{		
								$i = 1;
								foreach($imprimeotde2 as $itemR)
								{
									
							?>
                <tr>
                  <td><?php echo '';?></td>
                  <td><?php echo $itemR['ot_material'];?></td>
                  <td><?php echo $itemR['ot_cant1'];?></td>
                  <td><?php echo $itemR['ot_cant2'];?></td>
                </tr>
                <?php }}?>
              </table></td>
              </tr>
        
            <tr>
              <td colspan="8"></td>
              </tr>
            <tr>
              <td colspan="8"><strong>V PERSONAL NECESARIO PARA LA EJECUCION DEL TRABAJO</strong></td>
              </tr>
            <tr>
              <td colspan="8"><hr></td>
            </tr>
          
           
                <tr>
                  <td colspan="8"><table width="630" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                      <td width="310" align="center" bgcolor="#CCCCCC"><strong>CATEGORIA</strong></td>
                      <td width="118" align="center" bgcolor="#CCCCCC"><strong>HRS. REQUERIDA</strong></td>
                      <td width="89" align="center" bgcolor="#CCCCCC"><strong>HRS. NORMAL </strong></td>
                      <td width="92" align="center" bgcolor="#CCCCCC"><strong>HORAS FESTIVAS</strong></td>
                    </tr>
                    <tr>
                      <td><?php echo $ot_personal;?></td>
                      <td><?php echo $ot_h1;?></td>
                      <td><?php echo $ot_h2;?></td>
                      <td><?php echo $ot_h3;?></td>
                    </tr>
                  </table></td>
                  </tr>
                
                <tr>
                  <td colspan="8"><hr></td>
                  </tr>
                <tr>
                  <td height="7" colspan="8" ><strong>VI MEDIDAS DE SEGURIDAD</strong></td>
                  </tr>
                <tr>
                  <td colspan="8"><hr></td>
                  </tr>
                <tr>
                  <td colspan="8"><?php echo $ot_med;?></td>
                  </tr>
                <tr>
                  <td colspan="8"><hr></td>
                </tr>
                <tr>
                  <td colspan="8"><strong>VII OBSERVACIONES</strong></td>
                  </tr>
        
             <tr>
               <td colspan="8"><hr></td>
             </tr>
             <tr>
               <td colspan="8"><?php echo $ot_obs;?></td>
             </tr>
             <tr>
               <td colspan="8"></td>
             </tr>
             <tr>
               <td colspan="8"></td>
             </tr>
             <tr>
               <td colspan="8"><hr></td>
             </tr>
             <tr>
               <td colspan="8"><strong>VII FINALIZACION DE TRABAJO</strong></td>
             </tr>
             <tr>
               <td colspan="8"><hr></td>
             </tr>
             <tr>
               <td colspan="8"><table width="630" height="79" border="1" cellpadding="1" cellspacing="1">
                 <tr>
                   <td width="173" height="16" align="center" bgcolor="#CCCCCC"><strong>REVISADO POR:</strong></td>
                   <td width="82" align="center" bgcolor="#CCCCCC"><strong>FECHA</strong></td>
                   <td width="99" align="center" bgcolor="#CCCCCC"><strong>FIRMA</strong></td>
                   <td width="156" align="center" bgcolor="#CCCCCC"><strong>APROBADO POR:</strong></td>
                   <td width="92" align="center" bgcolor="#CCCCCC"><strong>FIRMA</strong></td>
                 </tr>
                 <tr>
                   <td height="57"><label for="textfield"></label></td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
               </table></td>
             </tr>
              </table></td>
          </tr>
	       
            <tr>
              <td></td>
            </tr>
            <tr>
              <td>Datos del Usuario: Nombre: <?php echo $item['usuario'] ?> &nbsp;-  <?php echo $item['udni'] ?></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
         
</form>
</div>
</div>
</body>
</html>