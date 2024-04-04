<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

 <script language="javascript">
   function validaenvio(){
	   sw=document.form1.anno.options[document.form1.solisperido.selectedIndex].text;
	   if(sw=='[Seleccione]'){
		   alert('Seleccione Año ')
		   return 0;
		   }
		  
		   tip=document.form1.mes.options[document.form1.mes.selectedIndex].text;
	   if(tip=='[Seleccione]'){
		   alert('Seleccione Tipo')
		   return 0;
		   }
		
		 sw=document.form1.empresa.options[document.form1.empresa.selectedIndex].text;
	   if(sw=='[Seleccione]'){
		   alert('Seleccione Año ')
		   return 0;
		   }
	
		document.getElementById("form1").submit();
	
		
	   }
	   function activar(){
		   		val=document.form1.textfield.value;
				//alert(val);
				if(val=='0'){
					document.importa.excel.disabled=false;
					document.importa.enviar.disabled=false;
					}else{
						
				document.importa.excel.disabled=true;
					document.importa.enviar.disabled=true;
						
						}
		   
		   }
   </script>

</head>

<body  onload="activar()">
<form id="form1" name="form1" method="post" action="">
<table width="468" border="0">
  <tr>
    <td colspan="4">Importar a excel</td>
  </tr>
  <tr>
    <td width="72">&nbsp;</td>
    <td width="376">
   </td>
    <td width="1">&nbsp;</td>
    <td width="1">&nbsp;</td>
  </tr>
  <tr>
    <td>Año</td>
    <td>
    <select name="anno" id="anno">
	    <option selected value="0">[Seleccione]</option>
        <option value="2013">2013</option>
        <option value="2014" selected="selected">2014</option>
    </select>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mes</td>
    <td>
    <select name="mes" id="mes">
	    <option selected value="0">[Seleccione]</option>
        <option value="01">Enero</option>
        <option value="02">Febrero</option>
        <option value="03">Marzo</option>
        <option value="04">Abril</option>
        <option value="05">Mayo</option>
        <option value="06">Junio</option>
        <option value="07" selected="selected">Julio</option>
        <option value="08">Agosto</option>
        <option value="09">Septiembe</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Empresa</td>
    <td>
    <select name="empresa" id="empresa">
     <option selected value="0">[Seleccione]</option> 
      <option value="1" selected="selected">Zgroup</option>
      <option value="2">PsCargo</option>
    </select>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input type="button" name="button2" id="button2" value="Validar Periodo" onclick="validaenvio()"/><input type="hidden" name="hiddenField" id="hiddenField" />
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <a href="../../MVC_Controlador/Archivos/Archivos_C.php?acc=listaimpo&udni=<?php echo $_GET['udni'] ?>">CLICK AQUI PARA ELIMINAR IMPORTACION</a>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $mensaje; ?><input name="textfield" type="hidden" class=".bc-tenant-form-field-label" id="textfield" size="90" onblur="activar()" readonly="readonly" value="<?php echo $sw; ?>" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  
    
  </tr>
</table>
</form>
   <form name="importa" method="post" action="../../MVC_Controlador/Archivos/Archivos_C.php?acc=ImpoExcelPLH" enctype="multipart/form-data" >
  <input type="file" name="excel" disabled="disabled" />
<input type='submit' name='enviar'  value="Importar" disabled="disabled" />
<input type="hidden" value="upload" name="action" />
</form>
</body>
</html>
