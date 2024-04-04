<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
$().ready(function() {
	$("#cli").autocomplete("../MVC_Controlador/cajaC.php?acc=clicauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#cli").result(function(event, data, formatted) {
		$("#cli").val(data[2]);
		$("#codcli").val(data[1]);		
	});	
});
</script>


<script type="text/javascript">
$().ready(function() {
	$("#asunto").autocomplete("../MVC_Controlador/cajaC.php?acc=cliasunto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#asunto").result(function(event, data, formatted) {
		$("#asunto").val(data[0]);
		//$("#asunto").val(data[1]);		
	});	
});
</script>

<script type="text/javascript">
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

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=rep05&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header">LISTADO DE COTIZACIONES GENERAL</div>
            <span> <br class="clear"/>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="115%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" ><p>
                     
                      <label for="textfield3"></label>
                      <input type="hidden" name="textfield3" id="textfield3" />
                  </p></td>
                </tr>
                <tr>
                  <td width="26%"  height="24" align="right" > <input name="radio2" type="radio" id="radio2" value="2" onclick="hab1();activa1()" />
                     
                      Por rango de fechas&nbsp;</td>
                  <td colspan="2" ><label for="textfield"></label>
                    /
                    <label for="sw"></label>
desde
<label for="textfield"></label>
<input name="textfield" type="text" id="textfield" value="<?php echo date('d/m/Y');?>" size="12" readonly="readonly"/>
<img src="../images/calendario.jpg" id="Image" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
<script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "textfield",
					ifFormat   : "%d/%m/%Y",
					button     : "Image"
					  }
					);
		 </script>
hasta
<label for="textfield2"></label>
<input name="textfield2" type="text" id="textfield2" value="<?php echo date('d/m/Y');?>" size="12" readonly="readonly"/>
<img src="../images/calendario.jpg" id="Image2" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" /></td>
                </tr>
                <tr>
                  <td height="21" align="right" >&nbsp;</td>
                  <td height="21" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="39" align="right" >Tipo de Estado</td>
                  <td height="39" colspan="2" ><label for="estado"></label>
                    <select name="estado" id="estado">
<option value="1">Aprobados</option>
                      <option value="2">Facturados</option>
                      <option value="0">Generados</option>
                  </select></td>
                </tr>
                <tr>
                  <td height="24" colspan="3" align="center" ><!--<input type="radio" name="radio2" id="radio" value="1"  />
				          Por Producto (
				          <input type="checkbox" name="checkbox" id="checkbox" onclick="juego()" />
				          <label for="checkbox"></label>
				          Rango de Fechas) (
				          <input type="checkbox" name="checkbox2" id="checkbox2" />
				          <label for="checkbox2"></label>
				          Ver Todos Los Registros)-->
                    <input name="radio2" type="radio" id="radio2" onclick="hab2();activa1()" value="1" checked="checked" />
                    Ver Todo
                  &nbsp;</td>
                </tr>
                <tr>
                  <td height="21" align="right" >&nbsp;</td>
                  <td height="21" >&nbsp;</td>
                  <td height="21" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" colspan="3" align="center" >Formato Exportar 
                    <input type="radio" name="tipoexporta" id="tipoexporta" value="EXCEL" />
                    <?php echo"<img src=../images/excel.gif alt= name=avatar>"; ?>
                    <label for="radio"></label>
                    <!-- <select name="tipoexporta" id="elSel">
					        <option value="EXCEL" id="opcion1" style="background-image:url(../../images/excel.gif)"> EXCEL </option>
					        <option value="" id=""> WORD </option>
					        <option value="PDF" id="opcion3"> PDF </option>
					        <option value="WEB" id="opcion4"> WEB </option>
				          </select>-->
                    <input name="tipoexporta" type="radio" id="tipoexporta" value="WEB" checked="checked" />
                    <?php echo"<img src=../images/icono-explorer.gif alt= name=avatar>"; ?>
                    <label for="radio2">
                      <input type="radio" name="tipoexporta" id="tipoexporta" value="WORD" />
                  <?php echo"<img src=../images/word.gif alt= name=avatar>"; ?> </label></td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="28%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;<?php echo $mod=$_GET['mod']; ?>
                  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['mod']; ?>" /></td>
                  <td width="46%" height="24" >&nbsp;
                  </td>
                </tr>
                <tr>
                  <td height="21" colspan="3" align="right" >
                    <?php /*?><a href="#" onclick="cerrarcoti(<?php echo $item["c_numped"];  ?>,<?php echo $item["c_codcli"];?>)"><img src="../images/download.png" width="25" height="25" title="Cerrar Cotizacion Facturar" /></a><?php */?>
                  <input type="hidden" name="codcli" id="codcli" /></td>
                </tr>
                <tr>
                  <td height="39" colspan="3" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
                </tr>
                <tr>
                  <td colspan="3" align="center" ></td>
                </tr>
              </table>
            </div>
            </span></div>
        </center>
        <span>        </span>
        <div id="apDiv3"></div>
        <span>
        <?php }?>
        </span></td>
    </tr>
    <?php
        if($reporte != null  )
        {
    ?>
    <tr>
      <td height="113"><table width="200" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="10">LISTADO DE COTIZACIONES GENERAL<BR />
              <a href="../MVC_Controlador/cajaC.php?acc=r01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="25" bgcolor="#CCCCCC">Nro</td>
              <td width="94" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="104" bgcolor="#CCCCCC">Cliente</td>
              <td width="120" bgcolor="#CCCCCC">Descripcion</td>
              <td width="92" bgcolor="#CCCCCC">Contacto</td>
              <td width="70" bgcolor="#CCCCCC">Fecha</td>
              <td width="69" bgcolor="#CCCCCC">Estado</td>
              <td width="116" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="73" bgcolor="#CCCCCC">Generar</td>
              <td width="215" align="left" bgcolor="#CCCCCC">Vizualizar</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr >
              <td align="center"><?php echo $i;?></td>
              <td align="center" bgcolor="#FFFFCC"><?php echo $item["c_numped"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["c_nomcli"];?></td>
              <td align="center" bgcolor="#FFCCFF"><?php echo $item["c_asunto"];?></td>
              <td align="center"><?php echo $item["c_contac"];?></td>
              <td align="center"><?php echo substr($item["d_fecped"],0,10);?></td>
              
              <td align="center">  <?php if($item['n_swtapr']==0 && $item['c_estado']==0){ echo '<strong style="color:#F00">Generado</strong>'; 
			  }elseif($item['n_swtapr']==1 && $item['c_estado']==0){ echo '<strong style="color:#060">Aprobado</strong>';
			  }elseif($item['c_estado']==2 && $item['n_swtapr']==1){ echo '<strong style="color:#0033FF">Facturado</strong>';} ?></td>
              
              <td align="center">
                
                <?php if($item['n_swtapr']==0 && $item['c_estado']==0 && $mod=='1'){ ?>
                <a href="../MVC_Controlador/cajaC.php?acc=adiciona&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>&udni=<?php echo $_GET['udni'];?>"><img src="" width="25" height="25" title="Aprobar Cotizacion" /></a>     
                
                <?php 			  
				  
				  }?>
              <?php if($item['n_swtapr']==1 && $item['c_estado']==0 && $mod=='1'){ ?>
                <a href="../MVC_Controlador/cajaC.php?acc=rdet02&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>&udni=<?php echo $_GET['udni'];?>"><img src="" width="25" height="25" title="Liberar Cotizacion" /></a>     
                
                <?php 			  
				  
				  }?>    
                
              </td>
              
              
              
              <td align="center"><?php /*?><a href="../MVC_Controlador/cajaC.php?acc=vercoti2&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo (utf8_encode($item['c_obsped'])); ?>&gral=<?php echo (utf8_encode($item['c_desgral']))?>&udni=<?php echo $_GET['udni'];?>"><img src="../images/icono-descargas.jpg" width="25" height="25" title="Generar Cotizacion" /></a><?php */?></td>
              
              
              
              <!-- aqui vizualizar cotizacion -->
              <td align="left">
              
               <?php if($item['n_swtapr']==0 && $item['c_estado']==0 ){ ?>
              
          <?php 
		  
		  
		  ?>  
           
          <?php /*?> <a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/doc.png" width="16" height="16" title="Ver Cotizacion en Pantalla" /></a><?php ?><?php */?>&nbsp;&nbsp;
                <!-- fin vizualizar cotizacion -->
                <!-- aqui editar cotizacion -->
                <a href="../MVC_Controlador/cajaC.php?acc=vercoti&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral']))) ?>&udni=<?php echo $_GET['udni'];?>"><img src="" width="16" height="16" title="Editar Cotizacion" /></a>&nbsp;
                <!-- fin editar cotizacion -->
                
                <!-- ver cotizacion en PDF -->
                <a href="../MVC_Controlador/PDF.php?acc=imprimirpdf&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/pdf.gif" width="16" height="16" title="Imprimir PDF" /></a>&nbsp;
                <!-- fin ver cotizacion en PDF -->
                <!-- ELIMINAR COTIZACION -->
                <a href="#" onclick="eliminarcoti(<?php echo $item["c_numped"];?>)"><img src="" width="16" height="16" onclick="" title="Eliminar Cotizacion" /></a>
                <!--FIN ELIMINAR COTIZACION -->
                <!--ver cotizacion en PDF CON CAMPO DESCUENTO -->
                
                &nbsp;<a href="../MVC_Controlador/PDF.php?acc=imprimirpdf2&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="" width="16" height="16" title="Ver Cotizacion" /></a>
                   <?php 
				   }
				  ?>
                  
<a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>
&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/search.png" width="16" height="16" title="Ver Cotizacion en Pantalla" /></a>&nbsp;&nbsp;
                <!-- fin ver cotizacion en PDF CON CAMPO DESCUENTO --></td>
            </tr>
            <?php
                     $i += 1;
                    }
            ?>
          </tbody>
        </table></td>
    </tr>

    <?php } ?>
  </table>
  <p>&nbsp;</p>
</form>
<div id="apDiv1"></div>
</body>
</html>