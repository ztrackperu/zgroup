<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

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
function eliminar(coti,clie){
	
	var nro=coti;
	var cli=clie
	var mensaje='Seguro de Eliminar Cotizacion Nro: '+nro;
		 if(confirm(mensaje)){
location.href="../MVC_Controlador/cajaC.php?acc=eliminacoti&cod="+cli+"&coti="+nro;
 }else{
	 return false;
 }
 
 
 
	}
</script>
<style type="text/css">
    #elSel {
		font-size: 20px;
        font-family: Arial, Helvetica, sans-serif; 
        padding-left: 45px;
        background-repeat: no-repeat;
        background-position: 3px 50&#37;;
    }
    #elSel option {
        padding-left: 35px;
        background-repeat: no-repeat;
        background-position: 3px 50%;
    }
    #opcion1 {
        background-image: url(../images/excel.gif);
    }
    #opcion2 {
        background-image: url(../images/word.gif);
    }
    #opcion3 {
        background-image: url(../images/pdf.gif);
    }
    #opcion4 {
        background-image: url(../images/icono-explorer.gif);
    }    
	

.fila_0 { background-color: #FFFFFF;}
.fila_1 { background-color: #E1E8F1;}

    </style>    

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

	 
	 }
else
 {
	 document.getElementById("cli").disabled=false;
	 document.getElementById("asunto").disabled=true;
	 document.getElementById("asunto").value='';
	 document.getElementById("cli").focus();
	// document.getElementById("prov").value="PROVE";

//	 document.getElementById('apDiv1').style.display = 'block'; 
	 
	 }}
	 
function activas(){
	document.getElementById("cli").focus();
	}
</script>



 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>
    <style>
.textos {
	background-color:transparent;
	border:none;
}
.control #form1 table tr td center .column_left span .content table tr td #apDiv2 {
}


table#t1 tr:nth-child(odd) td {
   background-color: #ddd;
}

table#t1 tr:nth-child(even) td {
   background-color: #f6f6f6;
}
    </style>
<body style="height: 100%; font-weight: bold;" class="control" onload="activas()">

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=rep02&udni=<?php echo $_GET['udni']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == null)        {
    ?>
        <center>
          <div class="column_left" align="center">
            <div class="header"> <span>ADMINISTRAR COTIZACIONES</span></div>
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
                  <!--<td width="26%"  height="24" align="right" > <input name="radio2" type="radio" id="radio2" value="2" onclick="hab1();activa1()" />
                     
                      Filtar por  Asunto &nbsp;</td>
                  <td colspan="2" >
                  
                  <div id="apDiv4"><input name="asunto" type="text" id="asunto" size="40" /></div></td>-->
                </tr>
                <tr>
                  <td height="24" align="right" >Usuario Vendedor</td>
                  <td height="24" colspan="2" ><label for="textfield"></label>
                  <input name="usuario" type="text" id="usuario" value="<?php echo $_GET['udni']; ?>" readonly="readonly"/>
                  <label for="select"></label><?php $ven = Ver_Estadistica3C();?>
                  <select name="select" id="select">
                  
                  <?php foreach($ven as $item){
					  $usuario=$_GET['udni'];
					  ?>
                           <option  value="<?php echo $item["udni"]?>"<?php if($item["udni"]==$usuario){?>selected<?php }?>><?php echo $item["usuario"]?></option>
                           <?php }	?>
                  </select></td>
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
                  <!--<input name="radio2" type="radio" id="radio2" onclick="hab2();activa1()" value="1" checked="checked" />
                  Por Cliente&nbsp;--></td>
                  <td height="24" colspan="2" ><div id="apDiv2" ><!--<input name="cli" type="text" id="cli" size="40" />--></div></td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="28%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;</td>
                  <td width="46%" height="24" >&nbsp;
                  </td>
                </tr>
                <tr>
                  <td height="21" colspan="3" align="right" >
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
              <td colspan="8"><a href="../MVC_Controlador/cajaC.php?acc=r01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="44" bgcolor="#CCCCCC">Nro</td>
              <td width="117" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="200" bgcolor="#CCCCCC">Cliente</td>
              <td width="181" bgcolor="#CCCCCC">Descripcion</td>
              <td width="176" bgcolor="#CCCCCC">Contacto</td>
              <td width="83" bgcolor="#CCCCCC">Fecha</td>
              <td width="197" align="left" bgcolor="#CCCCCC">Estado</td>
              <td width="197" align="left" bgcolor="#CCCCCC">&nbsp;</td>
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
              <td align="center"><?php echo vfecha(substr($item["d_fecped"],0,10));?></td>
              <td align="left"><?php echo $item["c_estado"];?></td>
              <!-- aqui vizualizar cotizacion -->
              <td align="left"><?php /*?><a href="../MVC_Controlador/cajaC.php?acc=rdet01&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&obs=<?php echo nl2br(strip_tags(utf8_encode($item['c_obsped'])));?>&gral=<?php echo nl2br(strip_tags(utf8_encode($item['c_desgral'])))?>"><img src="../images/search.png" width="16" height="16" title="Ver Cotizacion en Pantalla" /></a>&nbsp;&nbsp;
                <!-- fin vizualizar cotizacion -->&nbsp;
                <!-- fin editar cotizacion -->
                
                <!-- ver cotizacion en PDF -->
                <a href="../MVC_Controlador/PDF.php?acc=imprimirpdf&cod=<?php echo $item["c_codcli"];?>&coti=<?php echo $item["c_numped"];?>&cli=<?php echo $item['c_nomcli']?>&obs=<?php echo ((utf8_encode($item['c_obsped'])));?>&gral=<?php echo ((utf8_encode($item['c_desgral'])))?>" target="_parent"><img src="../images/pdf.gif" width="16" height="16" title="Imprimir PDF" /></a>&nbsp;<?php */?>
                <!-- fin ver cotizacion en PDF -->
                <!-- ELIMINAR COTIZACION --><!--FIN ELIMINAR COTIZACION -->
                <!--ver cotizacion en PDF CON CAMPO DESCUENTO -->
                
                &nbsp;<!-- fin ver cotizacion en PDF CON CAMPO DESCUENTO --></td>
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