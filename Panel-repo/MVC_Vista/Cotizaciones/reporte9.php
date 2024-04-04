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


<script type="text/javascript">	
	$().ready(function() {
	$("#cli").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#cli").result(function(event, data, formatted) {
		//$("#material").val(data[2]);
		$("#cli").val(data[0]);
		$("#codequipo1").val(data[1]);
	//	$("#hiddenField3").val(data[1]);
	//document.formElem.precio.focus();
	});
	
});
</script>


<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body style="height: 100%; font-weight: bold;" class="control" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=verrep09&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header">COTIZACIONES X ORDENES SERVICIO</div>
            <span> <br class="clear"/>
            <div class="content">
              <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                  <tr> </tr>
              </table>
              <span style="text-align: left" height="39" colspan="3" align="right"></span>
              <table width="135%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" ><p>
                     
                      <label for="textfield3"></label>
                      <input type="hidden" name="textfield3" id="textfield3" />
                  </p></td>
                </tr>
                <tr>
                  <td width="33%" height="24" align="right" >&nbsp;</td>
                  <td height="24" colspan="2" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" ><!--<input type="radio" name="radio2" id="radio" value="1"  />
				          Por Producto (
				          <input type="checkbox" name="checkbox" id="checkbox" onclick="juego()" />
				          <label for="checkbox"></label>
				          Rango de Fechas) (
				          <input type="checkbox" name="checkbox2" id="checkbox2" />
				          <label for="checkbox2"></label>
				          Ver Todos Los Registros)-->
                 <!-- <input name="radio2" type="radio" id="radio2" onclick="hab2();activa1()" value="1" checked="checked" />-->Ingrese Nro Cotizacion&nbsp;</td>
                  <td height="24" ><div id="apDiv2" ><input name="ncoti"  type="text" id="ncoti" size="25" /></div></td>
                  <td height="24" >-Ejm. 10020162525</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" ><input type="hidden" name="codequipo1" id="codequipo1" /></td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="21%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;<?php echo $mod=$_GET['mod']; ?>
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
        if($reporte != NULL  )
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
              <td colspan="7">Cotizacion x Ordenes Servicio<?php echo $_POST['cli']; ?><BR /><a href="../MVC_Controlador/cajaC.php?acc=rep06">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="33" bgcolor="#CCCCCC">Nro</td>
              <td width="94" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="102" bgcolor="#CCCCCC">Nro Orden Servicio</td>
              <td bgcolor="#CCCCCC">Cliente</td>
              <td width="120" bgcolor="#CCCCCC">Fecha Cotizacion</td>
              <td width="134" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="134" bgcolor="#CCCCCC">&nbsp;</td>
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
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["c_numos"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo $item["c_nomcli"];?></td>
              <td align="center" bgcolor="#CCFFFF"><?php echo vfecha(substr($item["d_fecped"],0,10));?></td>
              <td align="center">&nbsp;</td>
              
              <td align="center">&nbsp;</td>
              <!-- aqui vizualizar cotizacion -->
            </tr>
            <?php
                     $i += 1;
                    }
            ?>
          </tbody>
        </table></td>
    </tr>

    <?php }else{
		
		
		
		
		} ?>
  </table>
  <p>&nbsp;</p>
</form>
<div id="apDiv1"></div>
</body>
</html>