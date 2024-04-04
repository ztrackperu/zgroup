<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Fancy Sliding Form with jQuery" />
<meta name="keywords" content="jquery, form, sliding, usability, css3, validation, javascript"/>
<meta name="description" content="">
<meta name="keywords" content="">
<!--[if IE]>
	<link href="../css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="../js/excanvas.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript">
function valida_envia(){
	document.form1.submit();
	
	}

</script>
<script type="text/javascript">
$(document).ready(function(){
	var myajax_Listar=new classAjax_Listar();
/*** LISTAS NACIMIENTO ***/
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdepa'},'cmbDep');
	$("#cmbDep").change(function(){
		var dep=$("#cmbDep").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showprov',depa:dep},'cmbPro');
	});
	$("#cmbPro").change(function(){
		var dep=$("#cmbDep").val();
		var pro=$("#cmbPro").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/listas_funciones.php',{op:'showdist',depa:dep,prov:pro},'cmbDist');
	});

});
</script>
</head>

<body>
<form name="form1" method="post" action="../MVC_Controlador/LogisticaC.php?acc=m4&udni=<?php echo $_GET['udni']; ?>">
  <table width="870" border="0">
    <tr>
      <td width="860">REGISTRAR CLIENTES</td>
    </tr>
  </table>
  <fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
  <table width="630" border="0">
    <tr>
      <td width="164">Razon Social</td>
      <td width="456"><label for="textfield"></label>
        <input name="textfield" type="text" id="textfield" size="55" class="texto">
        <input type="hidden" name="hiddenField" id="hiddenField" value="<? echo $id ?>">
        <input type="hidden" name="hiddenField2" id="hiddenField2" value="<? echo $_GET['udni']?>">
        <input type="hidden" name="hiddenField3" id="hiddenField3"value="<? echo $empresa ?>"></td>
    </tr>
    <tr>
      <td>Telefono</td>
      <td><input name="textfield2" type="text" id="textfield2" size="45" class="texto"></td>
    </tr>
    <tr>
      <td>RUC</td>
      <td><label for="textfield2">
        <input type="text" name="textfield3" id="textfield3" class="texto">
      </label></td>
    </tr>
    <tr>
      <td>Correo</td>
      <td><label for="textfield3">
        <input type="text" name="textfield4" id="textfield4" class="texto">
      </label></td>
    </tr>
    <tr>
      <td>Contacto</td>
      <td><label for="textfield5"></label>
        <input type="text" name="textfield5" id="textfield5" class="texto">        <label for="textfield4"></label></td>
    </tr>
    <tr>
      <td>Departamento</td>
                            <td><select class="Combos texto" name="cmbDep"   id="cmbDep" >
                                    <option  selected value="00">[ Departamento ]</option>
</select></td>
                        </tr>
                        <tr>
                            <td>Provincia</td>
                            <td><select class="Combos texto" name="cmbPro" id="cmbPro">
                                    <option  selected value="00">[ Provincia ]</option>
                          </select></td>
                        </tr>
                        <tr>
                            <td>Distrito: </td>
                            <td><select class="Combos texto" name="cmbDist" id="cmbDist">
                                    <option  selected value="00">[ Distrito ]</option>
                          </select></td>
    </tr>
    <tr>
      <td>Direccion</td>
      <td><label for="textfield8"></label>
        <input name="textfield8" type="text" id="textfield8" size="55" class="texto"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><label for="select"></label>
        <select name="select" id="select">
          <option value="1">Activo</option>
          <option value="0">Dar Baja</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="2"><table border="0" align="center">
        <tr>
          <td><div class="buttons" align="center">
            <button type="button" class="positive" name="save" onClick="valida_envia()"> <img src="../images/icon_accept.png" alt=""/>Guardar</button>
            <a href="../MVC_Controlador/WebC.php?acc=g1&udni=<?php echo $udni;?>" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a></div></td>
          </tr>
        </table></td>
    </tr>
  </table>
  </fieldset>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>