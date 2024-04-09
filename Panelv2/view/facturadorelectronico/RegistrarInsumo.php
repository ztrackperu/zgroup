<?php 


$url1 = "http://161.132.206.104/apiaccess/dettabla/ListaTipoProductoM.php";

$datos = [
    "sql" => "oli",
];
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/json\r\n",
        "method" => "POST",
        "content" => json_encode($datos), # Agregar el contenido definido antes
    ),
);
# Preparar petición
$contexto = stream_context_create($opciones);
$resultadoEX1 = file_get_contents($url1, false, $contexto);
//$data1 = json_decode($data);
$data2 = json_decode($resultadoEX1);
echo $resultadoEX1;
//echo $data2->data->token ;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php 
echo "aqui estamos zgroup";
?>
<form id="form1" name="form1" method="post" action="?c=05&a=RegistroInsumos&mod=<?php echo $_GET['mod']; ?>&udni=<?php echo $udni; ?>">
  <table width="756" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>
    <tr>
      <td width="126">&nbsp;</td>
      <td width="408">&nbsp;</td>
      <td width="50">&nbsp;</td>
      <td width="50">&nbsp;</td>
      <td width="50">&nbsp;</td>
      <td width="53">&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo Producto</td>
      <td><label for="select"></label>
        <select name="unidad" id="unidad" class="form-control input-sm">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php 
                    foreach($this->model->ListaTipoProductoM() as $a):	 
                    ?>
                    <option value="<?php echo $a->C_NUMITM; ?>">
                      <?php echo $a->C_DESITM; ?> </option>
                    <?php  endforeach;	 ?>
                  </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Codigo</td>
      <td><label for="codigo"></label>
      <input name="codigo" type="text" id="codigo" value="AUTOGENRADO" readonly="readonly" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Descripcion</td>
      <td><label for="nombre"></label>
      <input name="nombre" type="text" id="nombre" size="30" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Unidad</td>
      <td><label for="unidad"></label>
        <select name="unidad" id="unidad" class="form-control input-sm">
                    <option value="000">.:SELECCIONE:.</option>
                    <?php foreach($this->model->ListaUnidadM() as $a):	 ?>
                    <option value="<?php echo $a->TU_CODI; ?>">
                      <?php echo $a->TU_DESC; ?> </option>
                    <?php  endforeach;	 ?>
                  </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" align="center"><input type="submit" name="Grabar" id="Grabar" value="Grabar" /></td>
    </tr>
  </table>
</form>
</body>
</html>