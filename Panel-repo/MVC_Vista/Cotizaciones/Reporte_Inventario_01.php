<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Reporte Inventarios</title>

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
	document.getElementById("codprd").disabled=true;
	document.getElementById("codprd").value='';
	document.getElementById("prov").disabled=false;
	document.getElementById("prov").focus();
	 
	document.getElementById("serie").disabled=true;
	document.getElementById("serie").value='';

	 
	 }
 if(t=='1'){
	 document.getElementById("codprd").disabled=false;
	  document.getElementById("codprd").value='';
	 document.getElementById("prov").disabled=true;
	 document.getElementById("prov").value='';
	 document.getElementById("codprd").focus();
	 document.getElementById("serie").disabled=true;
	 document.getElementById("serie").value='';
	 
	// document.getElementById("prov").value="PROVE";

//	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }
	 
 if(t=='3'){
	document.getElementById("codprd").disabled=true;
	document.getElementById("codprd").value='';
	document.getElementById("prov").disabled=true;
	 document.getElementById("prov").value='';
	 document.getElementById("serie").disabled=false;
	 document.getElementById("serie").value='';
	  document.getElementById("serie").focus();
	 
	// document.getElementById("prov").value="PROVE";

//	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }
	 
}
	 
function activas(){
	document.getElementById("codprd").focus();
	}
</script>
<script type="text/javascript">
$().ready(function() {
	$("#prov").autocomplete("../MVC_Controlador/cajaC.php?acc=proveauto", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	$("#prov").result(function(event, data, formatted) {
		$("#prov").val(data[2]);
		$("#xprov").val(data[1]);
	});
});
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#codprd").autocomplete("../MVC_Controlador/cajaC.php?acc=proauto", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#codprd").result(function(event, data, formatted) {
		$("#codprd").val(data[2]);
		$("#xcodprd").val(data[1]);
	});
	
});
			
</script>
<script type="text/javascript">	
$().ready(function() {
	$("#serie").autocomplete("../MVC_Controlador/cajaC.php?acc=serieautoapro", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});	
	$("#serie").result(function(event, data, formatted) {
//		$("#material").val(data[2]);
		$("#serie").val(data[0]);
		$("#xserie").val(data[1]);
	
	});
	
});
			
</script>
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=repinvdet01&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header"> <span>REPORTE EQUIPOS KARDEX DETALLADO</span></div>
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
                  <td width="19%"  height="24" align="right" > <input name="radio2" type="radio" id="radio2" value="2" onclick="hab1();activa1()" />
                     
                      Filtar por  Proveedor &nbsp;</td>
                  <td >
                  
                  <div id="apDiv4"><input name="prov" type="text" id="prov" size="40" />
                    <input type="hidden" name="xprov" id="xprov" />
                  </div></td>
                  <td >-Ejm. SEA CUBE</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
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
                  <input name="radio2" type="radio" id="radio2" onclick="hab2();activa1()" value="1" checked="checked" />
                  Por Clase  producto&nbsp;</td>
                  <td height="24" ><div id="apDiv2" ><input name="codprd" onclick="hab3();activa1()" type="text" id="codprd" size="40" />
                    <input type="hidden" name="xcodprd" id="xcodprd" />
                  </div></td>
                  <td height="24" >-Ejm. CONTENEDOR</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" ><input type="radio" name="radio2" onclick="hab3();activa1()" id="radio2" value="3" />
                  Por Serie de Equipo
                    <label for="radio"></label></td>
                  <td height="24" >
                  <input name="serie" type="text" id="serie" size="40" />
                  <input type="hidden" name="xserie" id="xserie" /></td>
                  <td height="24" >-Ejm. ZGRU123456-7</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="38%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;<?php echo $mod=$_GET['mod']; ?>
                  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['mod']; ?>" /></td>
                  <td width="43%" height="24" >&nbsp;
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
              <td colspan="15">LISTADO <BR /><a href="../MVC_Controlador/cajaC.php?acc=r01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="32" bgcolor="#CCCCCC">Nro</td>
              <td width="98" bgcolor="#CCCCCC">Nro Dcto</td>
              <td width="96" bgcolor="#CCCCCC">Nro Nota Ingreso</td>
              <td width="258" bgcolor="#CCCCCC">Descripcion</td>
              <td width="138" bgcolor="#CCCCCC">Serie</td>
              <td width="83" bgcolor="#CCCCCC">Fecha Ingreso </td>
              <td width="73" bgcolor="#CCCCCC">Manf. fecha</td>
              <td width="69" bgcolor="#CCCCCC">Marca</td>
              <td width="69" bgcolor="#CCCCCC">Modelo</td>
              <td width="69" bgcolor="#CCCCCC">&nbsp;</td>
              <td width="69" bgcolor="#CCCCCC">Tip Cambio</td>
              <td width="69" bgcolor="#CCCCCC">Precio ($)</td>
              <td width="69" bgcolor="#CCCCCC">Nuevo Precio ($)</td>
              <td width="69" bgcolor="#CCCCCC">Situacion</td>
              <td width="78" bgcolor="#CCCCCC">&nbsp;</td>
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center"><?php echo $i;?></td>
              <td align="center" ><?php echo $item["c_nrodoc"];?></td>
              <td align="center" ><?php echo $item["c_nronis"];?></td>
              <td align="center" ><?php echo $item["in_arti"];?></td>
              <td align="center"><?php echo $item["c_nserie"];?></td>
              <td align="center"><?php  $fecha=substr($item["d_fecing"],0,10);
			  echo vfecha($fecha)?></td>
              
              <td align="center"> <?php  $fecha=substr($item["c_anno"],0,10);
			  echo vfecha($fecha)?> </td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">
              <input type="text" id="<?php echo "tcam".$i; ?>"  name="<?php echo "tcam".$i; ?>"  size="4" value="<?php echo $item["in_tcam"]; ?>" class="texto" /></td>
              <td align="center"><?php  $precio= $item["precio"];
			  echo number_format($precio,2)?></td>
              <td align="center"><input type="text" id="<?php echo "nprecio".$i; ?>"  name="<?php echo "nprecio".$i; ?>"  size="7" value="<?php  $item["nprecio"]; echo number_format($precio,2); ?>" class="texto" /></td>
              <td align="center"><?php  echo $item["c_codsit"];
			  ?></td>
              <td align="center">&nbsp;</td>
              <!-- aqui vizualizar cotizacion -->            </tr>
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