<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 

<link rel="stylesheet" type="text/css" href="css/style.css" />

<?php 
include("cn/cn.php");
include("funciones.php");

?>

<?php 
 $usuario=$_REQUEST["usuario"];

 $centro=$_REQUEST["centro"];
 $centrocosto=$_REQUEST["centrocosto"];
 $dni=$_REQUEST["dni"];
 $nivel=$_REQUEST["nivel"];
 $idusuario=$_REQUEST["idusuario"];
 $fecprofin=$_REQUEST["fecprofin"];
 $fecha=date('Y-m-d'); 

  
   // header ("Location: ?idusuario=$idusuario&centro=$centro&dni=$dni");
 
    
 
?>
<form id="form1" name="form1" method="post" action="hora.php">
 
    <input name="centro" type="hidden" id="centro" value="<?php echo $centro;?>" />
    <input name="dni" type="hidden" id="dni" value="<?php echo $dni;?>" />
  
  <table width="577" border="1" align="center" cellpadding="0" cellspacing="0" class="testgrid">
    <tr align="center" valign="middle" class="blue">
      <td height="50" colspan="2" bgcolor="#F7F7F7"><strong>Programar Horario del Personal  <?php echo ExistDni($dni); ?> </strong></td>
    </tr>
    <tr>
      <td width="230" height="53"> <span class="b"><strong>Seleccione Periodo a Programar : </strong></span></td>
      <td width="331" class="b">
        <label>
          <select name="Pyear" id="Pyear" >
            <option value="<?php echo date("Y");?>"><?php echo date("Y");?></option>
             <option value="<?php echo date("Y")+1;?>"><?php echo date("Y")+1;?></option>
                          <option value="<?php echo date("Y")-1;?>"><?php echo date("Y")-1;?></option>
          </select>
        </label>
        /
        <label>
          <select name="Pmes" id="Pmes" >
            <option value="01">Enero</option>
            <option value="02">Febrero</option>
            <option value="03">Marzo</option>
            <option value="04">Abril</option>
            <option value="05">Mayo</option>
            <option value="06">Junio</option>
            <option value="07">Julio</option>
            <option value="08">Agosto</option>
            <option value="09">Setiembre</option>
            <option value="10">Ocutbre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
          </select>
        </label>
       
      <input type="submit" name="button" id="button" value="Enviar" />
      </td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#F7F7F7">&nbsp;</td>
    </tr>
    <tr>
      <td><p class="b"><strong>Registrar Justificación </strong></p></td>
      <td class="b"><a href="boleta.php?dni=<?php echo $dni;?>"><img src="iconos/rderivar.gif" width="72" height="72" border="0" /></a></td>
    </tr>
  </table>
</form>
