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
	font-size: 10px;
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

<li><a href="?c=not02&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni'] ?>&a=AdminNotasInsumos" class="nover" ><em class="find nover"></em><b><< Retornar </b></a></li>
</ul>
 <?php 
       
        if($resulos!=NULL)
        {
        foreach($resulos as $item)
        {						
      ?>
<table width="300" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"> ZGROUP S.A.C.</td>
  </tr>
  <tr>
    <td width="245">Fecha:</td>
    <td width="495"><?php  echo date("d/m/Y"); ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><u><strong>TICKET</strong></u></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong> NOTA DE SALIDA &nbsp; N° &nbsp; <?php echo $item["NT_NDOC"] ?> </strong> </td>
  </tr>
</table>
<br />
	 
<table width="300" border="0"   cellpadding="0" cellspacing="0"   >

	  <tr>
	    <td width="73">Codigo</td>
		<td width="16" align="center">:</td>
		<td width="211" ><?php echo $item['NT_CCLI'] ?> 
        &nbsp;&nbsp;&nbsp;</td>
	  </tr>
	  <tr>
	    <td>Razón Social</td>
		<td align="center">:</td>
		<td><?php echo utf8_decode($item['CC_RAZO']);?></td>
	  </tr>
	  <tr>
	    <td>T/Transa</td>
		<td align="center">:</td>
		<td><?php echo  "REG SALIDA" ?></td>
	  </tr>
      
       <tr>
	    <td>Observacion</td>
		<td align="center">:</td>
		<td><?php echo  $item['NT_OBS']?></td>
	  </tr>
      
       <tr>
	    <td>Usuario</td>
		<td align="center">:</td>
		<td><?php echo  $item['NT_OPER'] ?></td>
	  </tr>
 <tr>
	    <td>Fecha R.</td>
		<td align="center">:</td>
		<td><?php echo vfecha(substr($item["NT_FREG"],0,10));  ?></td>
  </tr>
	 
	  
  

</table>
    <?php
					
				}
		}
     ?>
    
    <br />
    
    
     <table class="data" width="252" cellpadding="0" cellspacing="0" bordercolor="#000000">
               
            <tr>
              <td width="44%" height="30"  > Descripcion</td>
              <td width="28%" align="center"  >U. Med.</td>
              <td width="28%" align="right"  >Cant.</td>
       </tr>
    
                           
                          
                    <?php 
                    $i = 1;
					if($resulos1!=NULL)
					{
                    foreach($resulos1 as $item1)
                    {             ?>
                                <tr>
                                  <td  bgcolor=""><?php echo utf8_decode($item1["IN_ARTI"]);?></td>
                                  <td bgcolor="" align="right"> <?php echo $item1["NT_CUND"];?></td>
                                  <td bgcolor="" align="right" ><?php echo $cant=$item1["NT_CANT"];?></td>
                                </tr>
                                <?php
                        $i += 1;
						$cantprod=$cantprod+$cant;
                    }}
            ?>
                            
                        <tr>
                                  <td colspan="3"  bgcolor="">--------------------------------------------------------------------------</td>
       </tr>
                        <tr>
                                  <td colspan="2"  bgcolor="">Total  Productos:</td>
                                  <td bgcolor="" align="right" ><?php echo $cantprod;?></td>
       </tr>    
                        </table>
<div class="saltopagina">	</div>
</div>
	
            
<p>&nbsp;</p>



</body>
</html>