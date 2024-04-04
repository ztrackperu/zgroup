<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Reporte Cotizaciones</title>

<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">-->
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/custom_blue.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript">
	
	if(document.form1.zsw.value=='1'){
		var val="clicauto";
		}else{
		var val="proautocoti";
		}
			
$().ready(function() {
	$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc="+val+"", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#descripcion").result(function(event, data, formatted) {
		$("#descripcion").val(data[2]);
		//$("#codcli").val(data[1]);		
	});	
});

</script>


<script type="text/javascript">
//$().ready(function() {
//	$("#asunto").autocomplete("../MVC_Controlador/cajaC.php?acc=cliasunto", {
//		width: 260, 
//		matchContains: true,
//		selectFirst: false
//	});	
//	$("#asunto").result(function(event, data, formatted) {
//		$("#asunto").val(data[0]);
//		//$("#asunto").val(data[1]);		
//	});	
//});
</script>
<script type="text/javascript">

$().ready(function() {
	$("#asunto").autocomplete("../MVC_Controlador/cajaC.php?acc=proautocoti", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#asunto").result(function(event, data, formatted) {
		$("#asunto").val(data[2]);
			});
	
});
			


</script>
<script type="text/javascript">
function limpiatxt(){
	document.getElementById("descripcion").value='';
	document.getElementById('descripcion').focus();
	if(document.getElementById("zsw").value=='1'){

	document.form1.xsw.value='proautocoti';
	
	}else if(document.getElementById("zsw").value=='2'){
		
	document.form1.xsw.value='clicauto';		
	
		}else if(document.getElementById("zsw").value=='3'){
		//document.getElementById("descripcion").value='proautocoti';
		}	
	}
function gestionar() {
		if (document.getElementById("op").checked==true){
			document.getElementById("txtfin").value='1'

		}if (document.getElementById("op").checked==false){
		
			document.getElementById("txtfin").value='0'
									}
		} 		
function validaBusqueda()
{
	if(document.form1.txtinicio.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.txtfin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}
function habilita(){
		document.getElementById('cli').value='';
		//document.getElementById('producto').style.display='block';
		document.getElementById('Image1').style.display='block';
		document.getElementById('Image2').style.display='block';	
		document.getElementById('ff').style.display='block';
		document.getElementById('fi').style.display='block';	
		document.getElementById('textfield').style.display='block';
		document.getElementById('textfield2').style.display='block';
		
	}
function habilita1(){
		//document.getElementById('producto').style.display='none'
		document.getElementById('Image1').style.display='none';
		document.getElementById('Image2').style.display='none'
		document.getElementById('ff').style.display='none';
		document.getElementById('fi').style.display='none';	
		document.getElementById('textfield').style.display='none';
		document.getElementById('textfield2').style.display='none';
	}
function juego(){
	if(document.getElementById('checkbox').checked==true){
		
		document.getElementById('cli').value='';
		//document.getElementById('producto').style.display='block';
		document.getElementById('Image1').style.display='block';
		document.getElementById('Image2').style.display='block';	
		document.getElementById('ff').style.display='block';
		document.getElementById('fi').style.display='block';	
		document.getElementById('textfield').style.display='block';
		document.getElementById('textfield2').style.display='block';
		}else{
			//document.getElementById('producto').style.display='none'
		document.getElementById('Image1').style.display='none';
		document.getElementById('Image2').style.display='none'
		document.getElementById('ff').style.display='none';
		document.getElementById('fi').style.display='none';	
		document.getElementById('textfield').style.display='none';
		document.getElementById('textfield2').style.display='none';
			
			}
	
	}
function eliminarcoti(coti){
	
	var nro=coti;
		
	
	var mensaje='Seguro de Eliminar Cotizacion Nro: '+nro;
//alert('Seguro de Eliminar Cotizacion Nro: '+nro);
if(confirm(mensaje)){
location.href="../MVC_Controlador/cajaC.php?acc=eliminacoti&coti="+nro;
 }else{
	 return false;
	}
 
 
 
}

function cerrarcoti(coti,clie){
	
	var nro=coti;
	var cli=clie
	var mensaje='Seguro de Facturar Cotizacion Nro: '+nro;
		 if(confirm(mensaje)){
location.href="../MVC_Controlador/cajaC.php?acc=cerrarcoti&cod="+cli+"&coti="+nro;
 }else{
	 return false;
 }
 
 
 
	}
</script>


    <script type="text/javascript">
function validaBusqueda()
{
	if(document.form1.txtinicio.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.txtfin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}


function hab1(){
	document.form1.textfield3.value=2;
	}
function hab2(){
	document.form1.textfield3.value=1;
	}
function hab3(){
	document.form1.textfield3.value=3;
	}

function activa1()
 {
	// var t=document.formElem.tipo.options[document.formElem.tipo.selectedIndex].text
	 var t=document.form1.textfield3.value;
	 
	 
	 if(t=='2'){
	// document.getElementById("textfield3").value="CLIENTE";
	document.getElementById("cli").disabled=true;
	document.getElementById("cli").value='';
	document.getElementById("asunto").disabled=false;
	document.getElementById("asunto").focus();
	 
	document.getElementById("cotiz").disabled=true;
	document.getElementById("cotiz").value='';

	 
	 }
 if(t=='1'){
	 document.getElementById("cli").disabled=false;
	  document.getElementById("cli").value='';
	 document.getElementById("asunto").disabled=true;
	 document.getElementById("asunto").value='';
	 document.getElementById("cli").focus();
	 document.getElementById("cotiz").disabled=true;
	 document.getElementById("cotiz").value='';
	 
	// document.getElementById("prov").value="PROVE";

//	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }
	 
 if(t=='3'){
	document.getElementById("cli").disabled=true;
	document.getElementById("cli").value='';
	document.getElementById("asunto").disabled=true;
	 document.getElementById("asunto").value='';
	 document.getElementById("cotiz").disabled=false;
	 document.getElementById("cotiz").value='';
	  document.getElementById("cotiz").focus();
	 
	// document.getElementById("prov").value="PROVE";

//	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }
	 
}
	 
function activas(){
	document.getElementById("cli").focus();
	}
</script>



 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body topmargin="0" marginheight="0" class="control" style="height: 100%; font-weight: bold;" onload="activas()" >

<form id="form1"  name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=veradmv2&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center">
      </td>
    </tr>
    <tr>
      <td height="113">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="12">LISTADO DE COTIZACIONES <BR /></td>
            </tr>
            <tr align="center">
              <td colspan="12"><table width="655" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="180" align="center"><input type="radio" name="sw" id="sw" value="1" onclick="limpiatxt()" />
                    Filtro Por Producto</td>
                  <td width="251" align="center"><input name="sw" type="radio" id="sw" value="2" checked="checked" onclick="limpiatxt()"/>
                    Filtro Por Cliente</td>
                  <td width="224" align="center"><input type="radio" name="sw" id="sw" value="3" onclick="limpiatxt()"/>
                    Filtro x Nro Cotizacion</td>
                </tr>
                <tr>
                  <td colspan="3" align="center">
                    <input name="descripcion" type="text" id="descripcion" size="40" value="<?php echo $descripcion; ?>" /> <input type="submit" name="button2" id="button2" value="FILTRAR" />
                    <input type="text" name="xsw" id="xsw" value="<?php echo $valor; ?>" />
                    <input type="text" size="5" name="zsw" id="zsw" /></td>
                </tr>
              </table></td>
            </tr>
            <tr align="center">
              <td width="25" bgcolor="#CCCCCC">Nro</td>
              <td width="88" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="101" bgcolor="#CCCCCC">Cliente</td>
              <td width="154" bgcolor="#CCCCCC">Descripcion</td>
              <td width="72" bgcolor="#CCCCCC">Contacto</td>
              <td width="82" bgcolor="#CCCCCC">Fecha</td>
              <td width="76" bgcolor="#FFFFCC">Cronograma ?</td>
              <td width="76" bgcolor="#CCCCCC">Cot. Principal</td>
              <td width="76" bgcolor="#CCCCCC">Estado</td>
              <td width="61" bgcolor="#CCCCCC">Aprobar-Liberar</td>
              <td width="58" bgcolor="#CCCCCC">Generar</td>
              <td width="186" align="left" bgcolor="#CCCCCC">Administrar</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
					
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr style="font-size:11px" onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo $i;?></td>
              <td align="center" ><?php echo $item["c_numped"];?></td>
              <td align="center" ><?php echo $item["c_nomcli"];?></td>
              <td align="center" ><?php echo $item["c_asunto"];?></td>
              <td align="center"><?php echo $item["c_contac"];?></td>
              <td align="center"><?php  $fecha=substr($item["d_fecped"],0,10);
			  echo vfecha($fecha)?></td>
              <td align="center" bgcolor="#FFFFCC"><?php if($item["c_gencrono"]=='1' and $item['n_swtapr']==1){echo 'SI';}else{echo 'NO';} ;?></td>
              <td align="center"><?php echo $item['c_cotipadre']; ?>&nbsp;</td>
              
              <td align="center">  <?php if($item['n_swtapr']==0 && $item['c_estado']==0){ echo '<strong style="color:#0D1FC6">Generado</strong>'; 
			  }elseif($item['n_swtapr']==1 && $item['c_estado']==0){ echo '<strong style="color:#060">Aprobado</strong>';
			  }elseif($item['c_estado']==2 && $item['n_swtapr']==1){ echo '<strong style="color:#FF0000">Facturado</strong>';} ?></td>
              <td align="center">
                
                <?php if($item['n_swtapr']==0 && $item['c_estado']==0 && $mod=='1'){ ?>
                <a href="../MVC_Controlador/cajaC.php?acc=adiciona&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&udni=<?php echo $_GET['udni'];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>"><img src="../images/Coherence.png" width="25" height="25" title="Aprobar Cotizacion" /></a>     
                <?php 			  
				  }?>
              <?php if($item['n_swtapr']==1 && $item['c_estado']==0 && $mod=='1'){ ?>
                <a href="../MVC_Controlador/cajaC.php?acc=rdet02&mod=<?php echo $_GET['mod']; ?>&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&udni=<?php echo $_GET['udni'];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>"><img src="../images/iconos/doc.png" width="30" height="26" title="Liberar Cotizacion" /></a>     
                <?php 			    
				  }?>       
              </td>
              <td align="center"><a href="../MVC_Controlador/cajaC.php?acc=vercoti2&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&udni=<?php echo $_GET['udni'];?>&obs=<?php echo (utf8_encode($item['c_obsped'])); ?>&gral=<?php echo (utf8_encode($item['c_desgral']))?>"><img src="../images/icono-descargas.jpg" width="25" height="25" title="Generar Cotizacion" /></a></td>
              <!-- aqui vizualizar cotizacion -->
              <td align="left">
              
               <?php if($item['n_swtapr']==0 && $item['c_estado']==0){ ?>
          <?php 
		  ?>  
          <?php /*?> <a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/doc.png" width="16" height="16" title="Ver Cotizacion en Pantalla" /></a><?php ?><?php */?>&nbsp;&nbsp;
                <!-- fin vizualizar cotizacion -->
                <!-- aqui editar cotizacion -->
                
                <a href="../MVC_Controlador/cajaC.php?acc=vercoti&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&udni=<?php echo $_GET['udni'];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>"><img src="../images/icon_edit.png" width="16" height="16" title="Editar Cotizacion" /></a>&nbsp;
                <!-- fin editar cotizacion -->
                
                <!-- ver cotizacion en PDF -->
                <a href="../MVC_Controlador/PDF.php?acc=imprimirpdf&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/pdf.gif" width="16" height="16" title="Imprimir PDF" /></a>&nbsp;
                <!-- fin ver cotizacion en PDF -->
                <!-- ELIMINAR COTIZACION -->
                <a href="#" onclick="eliminarcoti(<?php echo $item["c_numped"];?>)"><img src="../images/icon_delete.png" width="16" height="16" onclick="" title="Eliminar Cotizacion" /></a>
                <!--FIN ELIMINAR COTIZACION -->
                <!--ver cotizacion en PDF CON CAMPO DESCUENTO -->
                
                &nbsp;<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf2&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/Adobe_reader.gif" width="16" height="16" title="Ver Cotizacion Dscto" /></a>
                   <?php 
				   }
				  ?>
                  
<a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&udni=<?php echo $_GET['udni']?>&coti=<?php echo $item["c_numped"];?>
&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/search.png" width="16" height="16" title="Ver Cotizacion en Pantalla" /></a>&nbsp;&nbsp;
 &nbsp;<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf2&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/Adobe_reader.gif" width="16" height="16" title="Ver Cotizacion Dscto" /></a>
 &nbsp;&nbsp;
<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf3&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/pdf.gif" width="16" height="16" title="Imprimir PDF" />
</a>


&nbsp;&nbsp;
<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf4&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/icon_media.png" width="16" height="16" title="Imprimir PDF" />
</a>
                <!-- fin ver cotizacion en PDF CON CAMPO DESCUENTO --></td>
            </tr>
            <?php
                     $i += 1;
                    }
            ?>
          </tbody>
      </table></td>
    </tr>

    <?php // } ?>
  </table>
  <p>&nbsp;</p>
</form>
<div id="apDiv1"></div>
</body>
</html>