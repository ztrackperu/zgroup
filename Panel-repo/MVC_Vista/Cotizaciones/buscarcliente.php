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
function checkcoti() {
if(document.form2.check.checked==false){
	document.getElementById('idcheck').value='';
	document.getElementById('idcheck').disabled=true;	//document.getElementById('c_nomtran').disabled=false;
	}else{
		document.getElementById('idcheck').value='1';
		document.getElementById('idcheck').disabled=false;
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



	 

</script>



 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" /> 
</head>

<body style="height: 100%; font-weight: bold;" class="control" onload="activas()" >

<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=listacoticliente&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">
  <table width="105%" border="1" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td align="center"><?php
       if($reporte == NULL)        {
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
              <table width="135%" border="1" align="center" cellpadding="0" cellspacing="0"  >
                <tr>
                  <td height="21" colspan="3" align="center" ><p>
                     
                      
                      <input type="hidden" name="textfield3" id="textfield3" />
                  </p></td>
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
                 
                  Filtro por cliente</td>
                  <td height="24" ><input name="cli"  type="text" id="cli" size="40" /></td>
                  <td height="24" >-Ejm. San Benito</td>
                </tr>
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
               
                <tr>
                  <td height="24" align="right" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                  <td height="24" >&nbsp;</td>
                </tr>
                <tr>
                  <td height="24" align="right" >Codigo Trabajador:</td>
                  <td width="29%" height="24" ><?php echo $_GET['udni']; ?>&nbsp;<?php echo $mod=$_GET['mod']; ?>
                  <input type="hidden" name="hiddenField" id="hiddenField" value="<?php echo $_GET['mod']; ?>" />
                  <input type="hidden" name="codvendedor" id="codvendedor" value="<?php echo $_GET['udni']; ?>" /></td>
                  <td width="52%" height="24" >&nbsp;
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
	
	</table>

</form>
	
	
	
	
    <?php
        if($reporte != NULL  )
        {
    ?>
   <table width="200" border="1">
        <tr>
          <td><?php $nombreempresa;?></td>
          <td><?php echo date("d/m/Y H:m");?></td>
        </tr>
        <tr>
          <td><?php $rucempresa;?></td>
          <td><?php $usuario;?></td>
        </tr>
      </table>
	  
	  
	  
	  <form id="form2" name="form2" method="post" action="../MVC_Controlador/cajaC.php?acc=fusionar&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>">

  
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:14px">
          <thead>
            <tr align="center">
              <td colspan="12">SELECCIONE LAS COTIZACIONES A FUSIONAR <BR /><a href="../MVC_Controlador/cajaC.php?acc=buscarcliente&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>"> Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
            </tr>
            <tr align="center">
              <td width="25" bgcolor="#CCCCCC">Nro</td>
              <td width="88" bgcolor="#CCCCCC">Nro Cotizacion</td>
              <td width="10" bgcolor="#CCCCCC"> </td>
              <td width="101" bgcolor="#CCCCCC">Cliente</td>
              <td width="154" bgcolor="#CCCCCC">Descripcion</td>
              <td width="72" bgcolor="#CCCCCC">Contacto</td>
              <td width="82" bgcolor="#CCCCCC">Fecha</td>
              <td width="76" bgcolor="#FFFFCC">Cronograma ?</td>
              <td width="76" bgcolor="#CCCCCC">Cot. Principal</td>
              <td width="76" bgcolor="#CCCCCC">Estado</td>
             
            </tr>
          </thead>
          <tbody>
            <?php 
                    $i = 1;
					if($reporte!=NULL){
                    foreach($reporte as $item)
                    { 
	
            ?>
            <tr style="font-size:11px" onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
              <td align="center">
			  <?php echo $i;?>
              </td>
              
              <td align="center" >
			  <input name="c_numped"  id="c_numped" type="hidden" value="<?php echo $item['c_numped']?>" />
			  <?php echo $item["c_numped"];?>
              </td>
              
              
              
              
              
              
              <td>
              <input name="<?php  echo 'checka'.$i ?>" type="checkbox"  id="<?php echo 'checka'.$i ?>"  value="<?php echo $item["c_numped"];?>" />
              
              </td>                     
              
              
              <td align="center" >
               <input name="c_codcli"  id="c_codcli" type="hidden" value="<?php echo $item['c_codcli']?>" />
			  <?php echo $item["c_nomcli"];?>
              </td>
              
              <td align="center" >
			  <input name="<?php echo 'c_asunto'.$i ?>"  id="<?php echo 'c_asunto'.$i ?>" type="hidden" value="<?php echo $item['c_asunto']?>" />
			  <?php echo $item["c_asunto"];?>

              </td>
              
              <td align="center">
			  <input name="<?php echo 'c_contac'.$i ?>"  id="<?php echo 'c_contac'.$i ?>" type="hidden" value="<?php echo $item['c_contac']?>" />
			  <?php echo $item["c_contac"];?>
			  </td>
			  
              <td align="center">
			  <?php  $fecha=substr($item["d_fecped"],0,10);
			  echo vfecha($fecha)?>
			  </td>
			  
              <td align="center" bgcolor="#FFFFCC"><?php if($item["c_gencrono"]=='1' and $item['n_swtapr']==1){echo 'SI';}else{echo 'NO';} ;?></td>
              <td align="center"><?php echo $item['c_cotipadre']; ?>&nbsp;</td>
              
              <td align="center">   <strong style="color:#060">Aprobado</strong>
			  </td>
             
            </tr>
			
			
            <?php
                     $i += 1;
                    }
					}
            ?>
			
			 <tr>
                  <td height="39" colspan="12" align="center" ><input type="submit" name="button" id="button" value="FUSIONAR"   /></td>
             </tr>
			 
          </tbody>
      </table>
	  </form>

    <?php } ?>
  
<div id="apDiv1"></div>
</body>
</html>