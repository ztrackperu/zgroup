<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">REPORTE DE EIR</div>

 <form class="form-horizontal" id="frm-reportes" method="post" action="?c=liq01&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>&a=Reportes" >
 <table width="540" class="table"> 
  	 <tr>
  	   <td width="143">Seleccione Cliente</td>
  	   <td width="183">
  	     <input name="c_numped" id="c_numped" class="form-control" type="text" value="<?php echo $c_numped; ?>" placeholder="Busqueda de Cotizacion"  />
  	   </td>
  	   <td width="198"><a class="btn btn-default" onClick="consultar()" >Consultar</a> </td>  		
	   </tr>
  	 <tr>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
      </tr>
  	 <tr>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
  	   <td>&nbsp;</td>
      </tr> 
       
       <!--<tr>
           <td width="64">Cliente es:</td>
           <td width="148"><input  class="form-control" type="text"  /></td>		
	   </tr>--> 
     </table>
    </form> 

<form action="?c=liq01&a=ExportarExcelLiquidacion" method="post" id="FormularioExportacion">
                	<input id="exportar" name="exportar" onclick="exportarexcel();" type="button" value="EXPORTAR A EXCEL" class="btn btn-primary"   />
               		<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                </form>
 <table width="943" class="table table-hover" id="tablas"   >  
  <tr>
    <td>Numero Eir</td>
    <td>Cliente</td>
    <td>Tipo EIR</td>
    <td>Fecha EIR</td>
    <td>Dcto Referencia</td>
    <td>Descripcion</td>
    <td>Serie Equipo</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
    
 </div>   

</body>
</html>