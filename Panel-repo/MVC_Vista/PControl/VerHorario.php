<?php include("cn/cn.php"); ?>
<?php include("funciones.php"); ?>
<? $udni=$_REQUEST["udni"]?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>


<script type="text/javascript">
function Habilitar(){
document.form1.Idia.disabled=true;
document.form1.Imes.disabled=true;
document.form1.Iyear.disabled=true;
document.form1.Fdia.disabled=true;
document.form1.Fmes.disabled=true;
document.form1.Fyear.disabled=true;
document.form1.Pmes.disabled=false;
document.form1.Pyear.disabled=false;
}
function DesHabilitar(){
document.form1.Idia.disabled=false;
document.form1.Imes.disabled=false;
document.form1.Iyear.disabled=false;
document.form1.Fdia.disabled=false;
document.form1.Fmes.disabled=false;
document.form1.Fyear.disabled=false;
document.form1.Pmes.disabled=true;
document.form1.Pyear.disabled=true;
}
</script>
 
<style type="text/css">
.nmPage { margin: 0; padding:0; background: #92abbc; font-family: Arial, Helvetica, sans-serif; font-size: 12px; }

html, body, #id_main_table, #id_login_table {
	height:100%;
}
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="ListaHorario.php">
  <table width="397" border="1" align="center">
    <tr class="nmPage">
      <td colspan="2"> 
      
     <label>
     <strong>Por Periodo:
     <input type="radio" name="radio" id="radio" value="Pxperi" onchange="DesHabilitar();" />
          </strong></label>
     <strong>
     <label>
   Por Mes: </label>
     </strong>
     <label>
     <input type="radio" name="radio" id="radio2" value="Pxmes" onChange="Habilitar();">
    </label>      </td>
    </tr>
    <tr>
      <td width="106" height="34">Fecha de Inicio:</td>
      <td width="275"><label>
      <select name="Idia" id="Idia" disabled="disabled">
       <?php 
 $query  = "SELECT distinct  SUBSTR(diapro, 9,2) as Tyear FROM horario order by Tyear asc;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><? echo $row['Tyear']; ?></option>
        <?php }?>
      </select>
      </label><label>
      /
      <select name="Imes" id="Imes" disabled="disabled">
      <?php 
 $query  = "SELECT distinct  SUBSTR(diapro, 6,2) as Tyear FROM horario order by Tyear asc ;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><?  $mes=$row['Tyear']; echo obtieneMes($mes); ?></option>
        <?php }?>
      </select>
      /
      </label><label>
      <select name="Iyear" id="Iyear" disabled="disabled">
         
<?php 
 $query  = "SELECT distinct  LEFT(diapro, 4) as Tyear FROM horario;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><? echo $row['Tyear']; ?></option>
        <?php }?>
      </select>
      
      
      
      
      <input name="udni" type="hidden" id="udni" value="<?php echo $udni; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>Fecha  Final:</td>
      <td><label><select name="Fdia" id="Fdia" disabled="disabled">
      <?php 
 $query  = "SELECT distinct  SUBSTR(diapro, 9,2) as Tyear FROM horario order by Tyear asc ;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><? echo $row['Tyear']; ?></option>
        <?php }?>
            </select>
        /</label><label>
        <select name="Fmes" id="Fmes" disabled="disabled">
         <?php 
 $query  = "SELECT distinct  SUBSTR(diapro, 6,2) as Tyear FROM horario order by Tyear asc ;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><?  $mes=$row['Tyear']; echo obtieneMes($mes); ?></option>
        <?php }?>
        </select>
        /</label><label>
        <select name="Fyear" id="Fyear" disabled="disabled">
        <?php 
 $query  = "SELECT distinct  LEFT(diapro, 4) as Tyear FROM horario;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><? echo $row['Tyear']; ?></option>
        <?php }?>
      </select></label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td> Por Mes : </td>
      <td><label>
        <select name="Pmes" id="Pmes" disabled="disabled">
         <?php 
 $query  = "SELECT distinct  SUBSTR(diapro, 6,2) as Tyear FROM horario order by Tyear asc;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><?  $mes=$row['Tyear']; echo obtieneMes($mes); ?></option>
        <?php }?>
        </select>
        /</label>
        <label>
        <select name="Pyear" id="Pyear" disabled="disabled">
        <?php 
 $query  = "SELECT distinct  LEFT(diapro, 4) as Tyear FROM horario order by Tyear asc;";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
?>

        <option value="<? echo $row['Tyear']; ?>"><? echo $row['Tyear']; ?></option>
        <?php }?>
        </select>
      </label></td>
    </tr>
    <tr>
      <td colspan="2">Dependencia:
        <label for="centrocosto"></label>
        <select name="centrocosto" id="centrocosto">
          <?php 
 $querydep  = "SELECT * FROM dependencia;";
$resultdp = mysql_query($querydep);
while($rowdp = mysql_fetch_assoc($resultdp)){
?>

        <option value="<? echo $rowdp['cod_dependencia']; ?>"><? echo $rowdp['nombre']; ?></option>
        <?php }?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        
        <div align="center">
          <input type="submit" name="button" id="button" value="Generar Reporte" />
        </div>
      </label></td>
    </tr>
  </table>
</form>
 
</body>
</html>
