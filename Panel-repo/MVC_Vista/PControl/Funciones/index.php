<?php include("../conexion.php"); ?>
<?php include("FuncionPC.php"); ?>
<?php include("Fncion_fechas.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="857" border="1">
    <tr>
      <td colspan="2"><div align="center">Registrar Terminal </div></td>
    </tr>
    <tr>
      <td>Servico:</td>
      <td><label>
      
      
      
        <select name="select" id="select">
        
        <?php conectarBD();
						$vercedula= "SELECT * FROM dependencia order by nombre";
						$resultadoc= mysql_query($vercedula);
						echo mysql_error();
						while($cedular = mysql_fetch_array($resultadoc))
						{	?>
                        
                        
          <option value="<?php echo  $cedular["cod_dependencia"]; ?>"><?php echo  $cedular["nombre"]; ?></option>
          
          <? }?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td width="156">Nombre  de la Maquina:</td>
      <td width="685"><label>
        <input type="text" name="textfield" id="textfield" value="<? echo NombrePC();?>" />
      </label></td>
    </tr>
    <tr>
      <td>Dirección IP:</td>
      <td>
        <label>
        <input type="text" name="textfield2" id="textfield2"  value="<? echo $ipx=IPPC();?>"/>
      </label></td>
    </tr>
    <tr>
      <td>Dirección MAC :</td>
      <td><label>
        <input type="text" name="textfield3" id="textfield3"  value="<? echo DireccionMAC($ipx);?>"/>
      </label></td>
    </tr>
    <tr>
      <td>Fecha de Sistema:</td>
      <td><label>
        <input type="text" name="textfield4" id="textfield4" value="<? echo fecha_escrita();?>" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="button" id="button" value="Rgistrar Terminal" />
          </div>
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>
