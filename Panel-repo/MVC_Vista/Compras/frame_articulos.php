<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../../css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/imprimir.css">
  </head>
  <script language="javascript">
    function pon_prefijo(codfamilia, pref, nombre, precio, glosa) {
      parent.opener.document.form1.codigo.value = codfamilia;
      parent.opener.document.form1.tipo.value = pref;
      parent.opener.document.form1.descripcion.value = nombre;
      parent.opener.document.form1.medida.value = precio;
      //parent.opener.document.form1.serie.value = "-";
      //parent.opener.actualizar_importe();
      parent.window.close();
    }
  </script>

<body>
<?php 
  include("../MVC_Modelo/cn/dbconex.php"); 
  $COD_CLASE=$_GET['COD_CLASE'];
  $descripcion=$_POST["descripcion"];
  $clase=$_POST['tipo2'];
  $sql1 = "SELECT i.IN_CODI, i.IN_ARTI, i.IN_UVTA, i.tp_codi, i.COD_CLASE, d.C_TIPITM, d.C_CODTAB
          FROM (Dettabla AS d 
          INNER JOIN INVMAE AS i
          ON i.COD_CLASE = d.C_NUMITM)
          WHERE 1=1
          AND d.C_CODTAB = 'CLP' 
          AND i.COD_CLASE='010' AND i.COD_CLASE <> '000' ";
  $sql = "SELECT IN_CODI, IN_ARTI, IN_UVTA, tp_codi, COD_CLASE
          FROM  INVMAE AS i
          WHERE COD_CLASE='010' AND COD_CLASE <> '000' ";
  if ($descripcion<>"") { 
    $sql .= " AND i.IN_CODI LIKE '%$descripcion%' OR i.IN_ARTI LIKE '%$descripcion%' ";
  } 
  if($COD_CLASE=='010'){     
    $sql .=" AND i.IN_ESTA<>0 ";
  }
  $rs_tabla=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
  $nrs=odbc_num_fields($rs_tabla);
  echo $rs_tabla;
?>
  <div id="tituloForm2" class="header">
    <form id="form1" name="form1">
      <?php if ($nrs>0) { ?>
      <fieldset class="fieldset legend">
        <legend style="color:#03C"><strong></strong></legend>
        <table class="fuente8" width="98%" cellspacing=1 cellpadding=1 border=1>
          <tr onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
            <td width="15%" bgcolor="#0099FF">
              <div align="center"><b>Codigo.</b></div>
            </td>
            <td width="15%" bgcolor="#0099FF">
              <div align="center"><b>Unidad </b></div>
            </td>
            <td width="40%" bgcolor="#0099FF">
              <div align="center"><b>Descripci&oacute;n</b></div>
            </td>
            <td width="20%" align="center" bgcolor="#0099FF"><strong>Detallado</strong></td>
            <td width="20%" bgcolor="#0099FF">
              <div align="center"><b> Medida</b></div>
            </td>
            <td width="10%" bgcolor="#0099FF">
              <strong> <div align="center"> Select</div></strong>
            </td>
          </tr>
      <?php
        $all_data = array();
        $aux = '';
        while ($rows = odbc_fetch_array($rs_tabla)) {
			$auxiliar ="CLP";
			//$rows['C_CODTAB']
          if($auxiliar == 'CLP'){
            $detallado=$rows['IN_UVTA'];
			$um = "ok";
            //$um=$rows['C_TIPITM']; // BLOQUEAR
            $codfamilia=$rows['IN_CODI'];
            $codigobarras=$rows['IN_CODI'];
            $nombrefamilia=$rows['IN_CODI'];
            $referencia=$rows['IN_UVTA'];
            $codarticulo=$rows['IN_CODI'];        
            $descripcion=$rows['IN_ARTI'];
            $xdescripcion=$rows['IN_ARTI'];
            $x=substr($xdescripcion,4,20);
            $y=ltrim($x);
        ?>
            <tr style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF66';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td>
                <div align="center">
                  <?php echo $nombrefamilia;?>
                </div>
              </td>
              <td>
                <div align="left">
                  <?php echo $referencia;?>
                </div>
              </td>
              <td>
                <div align="center">
                  <?php echo utf8_encode($descripcion);?>
                </div>
              </td>
              <td>
                <?php echo $um ?>&nbsp;</td>
              <td>
                <div align="center">
                  <?php echo $detallado;?>
                </div>
              </td>
              <td align="center">
                <div align="center">
                  <a href="javascript:pon_prefijo('<?php echo $nombrefamilia?>','<?php echo $um?>','<?php echo str_replace('" ','
                    ',$descripcion)?>', '<?php echo $detallado?>') "><img src="../images/icon_accept.png " border="0 " title="Seleccionar "></a>
                </div>
              </td>
            </tr>
      <?php
        } 
      }
    ?>
  </table>
  </fieldset>
    <?php 
    }  ?>
<iframe id="frame_datos " name="frame_datos " width="0% " height="0 " frameborder="0 ">
  <ilayer width="0 " height="0 " id="frame_datos " name="frame_datos "></ilayer>
</iframe>
<input type="hidden " id="accion " name="accion ">
</form>
</div>
</body>
</html>