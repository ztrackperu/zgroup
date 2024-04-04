<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control de Permanencia</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script language="JavaScript" type="text/JavaScript" >
// function validagraba(){
//if((document.getElementById("textfield3").value)!=(document.getElementById("textfield4").value) || 
//(document.getElementById("textfield3").value)!="" ){
//	alert("Contraseña Nueva no Coinciden");
//	document.getElementById("textfield3").value="";
//	document.getElementById("textfield4").value="";
//document.getElementById("textfield3").focus();
//}else{
//	document.getElementById("form1").submit();
//}
//}


function limpiarfom(formElem) {
	frm = document.getElementById("formElem");
	if (!frm) return;
	for(i=0; i<frm.elements.length; i++){
		if (frm.elements[i].type == 'text')
			frm.elements[i].value = '';
	}
	document.getElementById("textfield").focus();
}

</script>
<style type="text/css">
#form1 table tr td #Fecha_Reloj {
	font-size: 24px;
	color: #036;
}
</style>
 <style type="text/css">
    <!--
    td.list { font-size: 14px; text-align: center;}
    td.listn { font-size: 15px;}
   .mayor {font-size: 190%}
   .menor {font-size:190%}
   
/* Border Color / Style */
.tb3 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 100px; text-align: center;
}
.tb7 {
	border: 2px dashed #FF0000;
	width: 350px;
	font-size: 100px; text-align: center;
}

.tb4 {
	border: 0px ;
	text-align: center;
	width: 950px;
	font-size: 100px; text-align: center;
}

 

}
 

    -->
  </style>
  
  <style type="text/css">
  .boton{
        font-size:15px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#000066;
        border:0px;
        width:100px;
        height:80px;
       }
.Estilo2 {color: #000066}
  .Estilo3 {
	color: #0000CC;
	font-weight: bold;
}
  .Estilo4 {
	font-size: 12px;
	color: #000099;
}
  .Estilo5 {
	font-size: 24px
}
  .Estilo6 {
	color: #FF0000;
	font-weight: bold;
}
  .Estilo7 {color: #FF0000}
  </style>
</head>

<body  >
<form id="form1" name="form1"method="post" 
action="../MVC_Controlador/PersonalC.php?acc=actpass&udni=<?php echo $_GET['udni'];?>">
  <table width="421" border="0" align="center">
    <tr>
      <td colspan="2" align="center">CAMBIO DE CONTRASEÑA      </td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
    <tr>
      <td width="228">Ingrese su DNI</td>
      <td width="183"><label for="textfield"></label>
      <input type="text" name="textfield" id="textfield" /></td>
    </tr>
    <tr>
      <td height="25">Ingrese contraseña anterior</td>
      <td><label for="textfield2"></label>
      <input type="password" name="textfield2" id="textfield2" /></td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
    <tr>
      <td>Ingrese cueva contaseña</td>
      <td><label for="textfield3"></label>
      <input type="password" name="textfield3" id="textfield3" /></td>
    </tr>
    <tr>
      <td>Vuelva a escribir nueva contraseña</td>
      <td><label for="textfield4"></label>
      <input type="password" name="textfield4" id="textfield4" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit"  onclick="validagraba();" name="button" id="button" value="Cambiar Contraseña" /></td>
    </tr>
  </table>
</form>
</body>
</html>