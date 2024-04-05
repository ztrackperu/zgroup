<script>
function ponerCeros2(obj) {
  while (obj.value.length<7)
    obj.value = '0'+obj.value;
}
function valida(){
	
	var serie=document.getElementById("serie").value;
	var numero=document.getElementById("numero").value;
	var coti=document.getElementById("txtnrocotizacion").value;
/*	alert(tipoOpt);
	if(document.getElementById("optproceso").value==""){
		alert("Falta Seleccionar Un Tipo Proceso");
		return 0;
	}*/
/*	if(tipoOpt=='0' && (serie=="" || numero=="")){
		alert("Ingrese Serie y Numero Factura");
		return 0;
		}
		
	if(tipoOpt=='1' && coti=="" && serie=="" &&  numero=="" ){
		alert("Completedatos de Factura y Cotizacion");
		return 0;
		}*/	
		
		
		
	document.getElementById("form1").submit();
	}
</script>

<form name="form1" method="post" action="?c=02&a=FacturacionProcesarTipos&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
  <table width="761" border="0" align="center">
    <tr>
      <th colspan="3" scope="col">Seleccione Tipo Proceso</th>
    </tr>
    <tr>
      <th colspan="3" scope="col"><p>
        <label>
          <input type="radio" name="optproceso" value="0" id="optproceso">
          Liberar Factura (Nota Credito)</label>
        <br>
        <label>
          <input type="radio" name="optproceso" value="1" id="optproceso">
          Referencia Factura - Cotización</label>
        <br>
      </p></th>
    </tr>
    <tr>
      <td width="177" height="39"><strong>Nro Factura</strong></td>
      <td width="27"><strong>:</strong></td>
      <td width="543"><label for="numero"></label>
        <label for="serie"></label>
        <input name="serie" type="text" id="serie" size="10">
      -
      <input type="text" name="numero" id="numero" onblur="ponerCeros2(this)"></td>
    </tr>
    <tr>
      <td><strong>Nro Cotizacion</strong></td>
      <td><strong>:</strong></td>
      <td><label for="txtnrocotizacion"></label>
      <input type="text" name="txtnrocotizacion" id="txtnrocotizacion"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="cmdprocesar" id="cmdprocesar" value="PROCESAR"  /></td>
    </tr>
    <tr>
      <td><strong>Usuario Responsable</strong></td>
      <td><strong>:</strong></td>
      <td><?php echo $user ?><input name="user" id="user" type="hidden" value="<?php echo $user ?>" />&nbsp;</td>
    </tr>
  </table>
</form>
