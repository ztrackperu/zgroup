<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<!--INICIO DE IMPRESION EN A4-->
<style type="text/css">
body {
	 margin: 10 0 10 0px; 
	
}
body,td,th {
	font-size: 12px;
	font-family: Georgia, "Times New Roman", Times, serif;
}

</style>
<style type="text/css">
		@media all {
			div.saltopagina{
				display: none;
			}
		}
			
		@media print{
			div.saltopagina{ 
				display:block; 
				page-break-before:always;
			}
		}	
	</style>

<!--FIN IMPRESION A4-->
 
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">


<style type="text/css" media="print">
.nover {display:none}
#factura table tr td table tr td p {
	font-weight: bold;
}

</style>
<style type="text/css">
#derecha {
	text-align: right;
}


</style>
</head>

<body>



<ul class="pro15 nover">
<li><a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></li>

<li><a href="#=<?php echo $udni ?>" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
 <?php 
       
        if($resulos!=NULL)
        {
        foreach($resulos as $item)
        {						
      ?>
<table width="1040" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="245"> ZGROUP S.A.C.</td>
    <td width="495">&nbsp;</td>
    <td width="61">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="219">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">Pagina</td>
    <td align="center">:</td>
    <td> 1</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong> NOTA DE SALIDA &nbsp;&nbsp; N° &nbsp;&nbsp; <?php echo $item["NT_NDOC"] ?> </strong> </td>
    <td align="right">Fecha</td>
    <td align="center">:</td>
    <td><?php echo date("d/m/Y"); ?></td>
  </tr>
</table>
<br />
	 
<table width="1040" border="0"   cellpadding="0" cellspacing="0"   >

	  <tr>
	    <td width="75">Codigo</td>
		<td width="20" align="center">:</td>
		<td width="395" ><?php echo $item['NT_CCLI'] ?> 
        &nbsp;&nbsp;&nbsp;	R.U.C. &nbsp;:&nbsp;<?php echo $item['CC_NRUC'] ?>
        
        
        </td>
		<td width="99" id="derecha" >Referencia</td>
		<td width="20" align="center" >:</td>
		<td width="431" ><?php echo $item['NT_REMI'] ?></td>
	   
	  </tr>
	  <tr>
	    <td>Razón Social</td>
		<td align="center">:</td>
		<td><?php echo utf8_decode($item['CC_RAZO']);?></td>
		<td id="derecha">Guia</td>
		<td align="center">:</td>
		<td><?php echo $item['NT_GTR'] ?></td>
		
	  </tr>
	  <tr>
	    <td>Direccion</td>
		<td align="center">:</td>
		<td><?php echo  $item['CC_DIR1'] ?></td>
		<td id="derecha">Fecha</td>
		<td align="center">:</td>
		<td><?php echo $item['NT_FDOC'] ?></td>
	   
	  </tr>
	  <tr>
	    <td>T/Transa</td>
		<td align="center">:</td>
		<td><?php echo  "REG SALIDA" ?></td>
		<td id="derecha">Moneda</td>
		<td align="center">:</td>
		<td><?php $moneda=$item['NT_MONE']; if($moneda=='0'){echo "NUEVO SOLES";}else{echo "DOLARES AMERICANOS";}?></td>
	   
	  </tr>
      
       <tr>
	    <td>Observacion</td>
		<td align="center">:</td>
		<td><?php echo  $item['NT_OBS']?></td>
		<td id="derecha">T/Camb</td>
		<td align="center">:</td>
		<td><?php echo $item['NT_TCAMB'] ?></td>
	   
	  </tr>
      
       <tr>
	    <td>Usuario</td>
		<td align="center">:</td>
		<td><?php echo  $item['NT_OPER'] ?></td>
		<td id="derecha">/Compra</td>
		<td align="center">:</td>
		<td><?php echo $item['NT_NOC'] ?></td>
	   
	  </tr>
 <tr>
	    <td>Fecha R.</td>
		<td align="center">:</td>
		<td><?php echo  $item['NT_FREG'] ?></td>
		<td id="derecha">Estado</td>
		<td align="center">:</td>
		<td><?php echo "INVENTARIO" ?></td>
	   
  </tr>
	 
	  
  

</table>
    <?php
					
				}
		}
     ?>
    
    <br />
    
    
     <table class="data" width="800" cellpadding="0" cellspacing="0" bordercolor="#000000">
               
            <tr>
              <td width="5%" height="30" ><strong>Item</strong></td>
              <td width="15%" ><strong>Codigo</strong></td>
              <td width="35%"  ><strong> Descripcion</strong></td>
              <td width="15%"  ><strong>Serie Equipo</strong></td>
              <td width="10%"  ><strong>U. Medida</strong></td>
              <td width="10%"  ><strong>cantidad</strong></td>
              <td width="10%"  ><strong>Costo U.</strong></td>
       </tr>
    
                           
                          
                    <?php 
                    $i = 1;
					if($resulos1!=NULL)
					{
                    foreach($resulos1 as $item1)
                    {             ?>
                                <tr>
                                  <td   bgcolor=""><?php echo $i;?></td>
                                  <td   bgcolor=""><?php echo $item1["NT_CART"]; ?></td>
                                  <td  bgcolor=""><?php echo utf8_decode($item1["IN_ARTI"]);?></td>
                                  <td  bgcolor=""><?php echo $item1["NT_SERIE"];?>
                                  
                                  
                                  </td>
                                  <td bgcolor=""> <?php echo $item1["NT_CUND"];?></td>
                                  <td bgcolor="" ><?php echo $cant=$item1["NT_CANT"];?></td>
                                  <td bgcolor="" ><?php echo $item1["NT_COST"];?></td>
                                </tr>
                                <?php
                        $i += 1;
						$cantprod=$cantprod+$cant;
                    }}
            ?>
                            
                          <tr>
                                  <td colspan="3"   bgcolor="">&nbsp;</td>
                                  <td colspan="1"   bgcolor="" align="right">------</td>
                                  <td colspan="3" bgcolor="">----------------------------------------------------</td>
       </tr>
                          <tr>
                                  <td   bgcolor="">&nbsp;</td>
                                  <td   bgcolor="">&nbsp;</td>
                                  <td  bgcolor="">&nbsp;</td>
                                  <td colspan="2" align="right"  bgcolor=""><strong>Total  Productos : </strong>&nbsp; &nbsp; &nbsp; </td>
                                  <td bgcolor="" ><?php echo $cantprod; ?></td>
                                  <td bgcolor="" >&nbsp;</td>
       </tr>
                                   
                        </table>
<div class="saltopagina">	</div>
</div>
	
            
<p>&nbsp;</p>



</body>
</html>