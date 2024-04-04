<?php 
if($obtenernosotros!=NULL)
{
	foreach ($obtenernosotros as $item)
	{
		//$idc=$IDCAMAS;
     $id=$item["id_nosotros"];
		$titulo = $item["titulo"];
		$descripcion = $item["descripcion"];
		$sw= $item["sw"];
		$estado = $item["estado"];
		$foto=$item["foto"];
	
	}
}

?>
<html><head>
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
<script type="text/javascript">
function valida_envia(){
	document.form1.submit();
	
	}
</script>


<title>Modificar Contenido Nosotros</title>
</head>

<body>
<form name="form1" id="form1" method="post" enctype="multipart/form-data"
 action="../MVC_Controlador/WebC.php?acc=graba">
<table width="687" border="0">
  <tr>
    <td style="color:#039">MODIFICACION DE DATOS PARTE CONTENIDO PAGINA WEB</td>
  </tr>
</table>
<fieldset class="fieldset legend">
  <legend style="color:#C63">INGRESO DE DATOS</legend>
<table width="814" border="0">
  <tr>
    <td width="159">Titulo</td>
    <td width="518"><input type="text" name="textfield" id="textfield" value="<?php $titulo?>">
      <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $id?>">
      <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $_GET['udni'];?>"></td>
  </tr>
  <tr>
    <td width="159">Contenido</td>
    <td><label for="textarea">
      <textarea name="textarea" id="textarea" cols="60" rows="10"><?php $descripcion?></textarea>
    </label></td>
  </tr>
  <tr>
    <td>Flag</td>
    <td><label for="textfield2"></label>
      <input name="textfield2" type="text" disabled id="textfield2" value="<?php $sw?>" size="5" readonly="readonly">
      <input type="text" name="textfield3" id="textfield3"  value="<?php $foto?>"></td>
  </tr>
  <tr>
    <td valign="middle">Imagen Actual</td>
    <td><label for="textfield3"></label>
      <input type="image" name="imageField" id="imageField" src="../../images/imgnosotros/<?php $foto?>"></td>
  </tr>
  <tr>
    <td width="159">Foto</td>
    <td><label for="fileField"></label>
      <input type="file" name="fileField" id="fileField"></td>
  </tr>
  <tr>
    <td width="159">Estado</td>
    <td><label for="select"></label>
      <select name="select" id="select">
        <option value="1">Activo</option>
        <option value="0">No Activo</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2"><table border="0" align="center">
      <tr>
        <td><div class="buttons" align="center">
          <button type="button" class="positive" name="save" onClick="valida_envia()"> <img src="../images/icon_accept.png" alt=""/>Guardar</button>
          <a href="../MVC_Controlador/WebC.php?acc=g1&udni=<?php echo $udni;?>" class="negative"> <img src="../images/icon_delete.png" alt=""/>Cancelar</a> </div></td>
      </tr>
    </table></td>
    </tr>
  
</table>
</fieldset>


</form>
<p>&nbsp;</p>
</body>
</html>