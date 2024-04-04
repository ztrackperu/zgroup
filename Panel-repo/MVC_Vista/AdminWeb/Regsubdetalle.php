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
<script type="text/javascript" src="../js/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function(){
	var myajax_Listar=new classAjax_Listar();

	
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo.php',{op:'showdepa'},'cmbDep');
	$("#cmbDep").change(function(){
		var dep=$("#cmbDep").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo.php',{op:'showprov',depa:dep},'cmbPro');
	});
	$("#cmbPro").change(function(){
		var dep=$("#cmbDep").val();
		var pro=$("#cmbPro").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo.php',{op:'showdist',depa:dep,prov:pro},'cmbDist');
	});
	
	});
</script>
<script type="text/javascript">
function valida_envia(){
	document.formu1.submit();
	
	}
</script>
</head>
<body>
<form action="../MVC_Controlador/WebC.php?acc=w14" method="post"  name="formu1" enctype="multipart/form-data">
  <table width="870" border="0">
    <tr>
      <td width="860">REGISTRO DE PRODUCTOS Y SERVICIOS</td>
    </tr>
  </table>
  <fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
  <table width="630" border="0">
    <tr>
      <td width="164">Categoria</td>
      <td width="456"><label for="cmbDep"></label>
        <select name="cmbDep" id="cmbDep">
        </select></td>
    </tr>
    <tr>
      <td>Sub Categoria</td>
      <td><label for="cmbPro"></label>
        <select name="cmbPro" id="cmbPro">
        </select>
        <input type="hidden" name="hiddenField" id="hiddenField" value="<?php $_GET['udni'];?>"></td>
    </tr>
    <tr>
      <td>Sub SubCategoria</td>
      <td><label for="cmbDist"></label>
        <select name="cmbDist" id="cmbDist">
        </select></td>
    </tr>
    <tr>
      <td>Titulo</td>
      <td><label for="textfield"></label>
        <textarea name="textfield" cols="45" id="textfield"></textarea></td>
    </tr>
    <tr>
      <td>Descripcion</td>
      <td><label for="textarea"></label>
        <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Foto </td>
      <td><label for="fileField"></label>
        <input type="file" name="fileField" id="fileField"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><label for="select3"></label>
        <select name="select3" id="select3">
          <option value="1">Activo</option>
        </select>
        <input type="submit" name="button" id="button" value="Enviar"></td>
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