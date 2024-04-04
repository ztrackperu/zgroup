<?php 
if($obtener!=NULL)
{
	foreach ($obtener as $item)
	{
		$grupo=$item['grupo'];
		$titulo=$item['titulo'];
		$des=$item['descripcion'];
		$cod=$item['id'];
		
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script language="javascript">
 function linki(){
	 	codigo=document.formElem.variodescrip.options[document.formElem.variodescrip.selectedIndex].value;
	 	location.href="../MVC_Controlador/cajaC.php?acc=glosa2"+"&cod="+codigo;
	}
</script>

<script language="javascript">

function pon_prefijo(glosa) {
	parent.opener.document.formElem.ppp.value=pref;
	
	
	parent.window.close();
}
function graba2(){
document.getElementById("formElem").submit();
	
	}
</script>

</head>
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
<body >
<form id="formElem" name="formElem" method="post" action="../MVC_Controlador/cajaC.php?acc=prueba"> <tr>
      <!--<form action="" method="get" name="glosa">-->
    <table>
      <td height="26" bgcolor="#FFFFFF">Condiciones</td>
      <td colspan="2" bgcolor="#FFFFFF"> <?php $ven = ListaCotiVariosCoti3C();?>
        <select name="variodescrip" id="variodescrip" onchange="linki()">
          <?php foreach($ven as $item){?>
          <option value="<?php echo $descrip=$item["id"]?>"><?php echo $item["titulo"]?></option>
          <?php }	?>
        </select></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF"><?php echo $titulo ?></td>
    </tr>
    <tr>
      <td height="26" colspan="3" bgcolor="#FFFFFF">
        
        <textarea name="area2" id="area2" cols="70" rows="15"><?php echo $des ?></textarea>
        <input type="submit" name="button" id="button" value="ok" /></td>
      
   <!--   </form>-->
      </tr>
    </table>
</form>
</body>
</html>