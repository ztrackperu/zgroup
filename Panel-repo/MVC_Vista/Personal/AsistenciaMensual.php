<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeAdmin | ZGROUP</title>
<meta name="Description" content="" />
<meta name="Keywords" content="" />
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="../js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/tipsy.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<script type="text/javascript" src="js/excanvas.js"></script>
<![endif]-->


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


function anadir(obj) {
  if (obj.checked)
    obj.form1.txtfin.value += obj.value;
  else {
    texto = obj.form1.txtfin.value;
    texto = texto.split(obj.value).join('');
    obj.form1.txtfin.value = texto;
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
     
    </style>
    
    <script type="text/javascript">

function getReglas() {
    return document.styleSheets[0].cssRules;
}

function getRegla(selector) {
    var reglas = getReglas();
    for(var i=0, l=reglas.length; i<l; i++) {
        if( (reglas[i].selectorText) && (reglas[i].selectorText==selector) ) {
            return reglas[i];
        }
    }
    return false;
}


var elSel = document.getElementById("elSel");
function actualizaImgSelect() {
    var i = elSel.selectedIndex + 1;
    var laRegla = getRegla("#opcion"+i);    
    if( laRegla ) {
        elSel.style.backgroundImage = laRegla.style.backgroundImage;
    }
}

window.onload = actualizaImgSelect;
elSel.onchange = actualizaImgSelect;



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

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/MisturaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[1]);
	document.formElem.descripcion.focus();
	});
})
;
</script>   
</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/PersonalC.php?acc=r2">
													
    <table width="178%" height="346" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reporte == null)        {
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header">ASISTENCIA MENSUAL</div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td height="24" align="right" >SELECCIONE AÑO:</td>
					      <td ><label for="select"></label>
					        <select name="select" id="select">
<option value="2013">2013</option>
					          <option value="2014">2014</option>
					          <option value="2015">2015</option>
		                  </select></td>
					      <td width="25%" rowspan="2" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
				        </tr>
					    <tr>
					      <td width="39%" height="24" align="right" >SELECCIONE MES:</td>
					      <td width="36%" ><label for="textfield"></label>
				           <label for="select2"></label>
            <select name="select2" id="select2">
            			<option value="1">Enero</option>
					           <option value="2">Febrero</option>
					           <option value="3">Marzo</option>
					           <option value="4">Abril</option>
					           <option value="5">Mayo</option>
					           <option value="6">Junio</option>
					           <option value="7">Julio</option>
					           <option value="8">Agosto</option>
					           <option value="9">Septiembre</option>
					           <option value="10">Octubre</option>
					           <option value="11">Noviembre</option>
					           <option value="12">Diciembre</option>
            </select></td>
				        </tr>
					    <tr>
					      <td align="right" > SELECCIONE GRUPO:</td>
					      <td align="left" ><label for="select3"></label>
					        <select name="select3" id="select3">
					          <option value="ZGROUP">ZGROUP</option>
					          <option value="PSCARGO">PSCARGO</option>
                              <option value="TODOS">TODOS</option>
		                    </select></td>
					    <td align="center" >&nbsp;</td>
				        </tr>
					    <tr>
					    <td height="28" colspan="3" align="center" ><strong>Formato a Exportar</strong></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><select name="tipoexporta" id="elSel">
					<option value="WEB" id="opcion4"> WEB </option>
  <option value="EXCEL" id="opcion1">EXCEL </option>
  <option value="WORD" id="opcion2">WORD </option>
  <option value="PDF" id="opcion3">PDF </option>
				          </select></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" >&nbsp;</td>
				        </tr>
				      </table>
					  
					  
		  </div>
		  </div>
                </center>
    <?php }?>
                </td>
        </tr>
        <?php
        if($reporte != null  )
        {
    ?>
        <tr>
          <td> <table width="200" border="1">
  <tr>
    <td><?php $nombreempresa;?></td>
    <td><?php echo date("d/m/Y H:m");?></td>
  </tr>
  <tr>
    <td><?php $rucempresa;?></td>
    <td><?php $usuario;?></td>
  </tr>
            </table>

                      <table width="75%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:10px">
                          <thead>
                              <tr align="center">
                                <td colspan="28">ASISTENCIA DEL MES: <?php $m=$_REQUEST['select2'];
								           if($m=='1'){
									        echo "Enero";
									       }elseif($m=='2'){
										    echo "Febrero";
										   }elseif($m=='3'){
											echo "Marzo";
										    }elseif($m=='4'){
												echo 'Abril';
											}elseif($m=='5'){
												echo 'Mayo';
											}elseif($m=='6'){
												echo 'Junio';
											}elseif($m=='7'){
												echo 'Julio';
											}elseif($m=='8'){
												echo 'Agosto';
											}elseif($m=='9'){
												echo 'Setiembre';
											}elseif($m=='10'){
												echo 'Octubre';
											}elseif($m=='11'){
												echo 'Noviembre';
												}else{
												echo "Diciembre";
													} ?></td>
                              </tr>
<tr align="center">
<td colspan="28"><a href="../MVC_Controlador/PersonalC.php?acc=v1">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
      </tr>
      <tr align="center">
      <td width="46" bgcolor="#CCCCCC">Nro</td>
      <td width="38" bgcolor="#CCCCCC">Día</td>
      <td width="21"  bgcolor="#CCCCCC">Mes</td>
      <td width="51"  bgcolor="#CCCCCC">Dni</td>
      <td width="110"  bgcolor="#CCCCCC">Personal</td>
      <td width="61"  bgcolor="#CCCCCC">Entrada</td>
      <td width="180"  bgcolor="#CCCCCC">Salida</td>
      <td width="486"  bgcolor="#CCCCCC">Refrigerio Inicio</td>
      <td width="207"  bgcolor="#CCCCCC">Refrigerio Fin</td>
      </tr>
                          </thead>
                          <tbody>
                              <?php 
                    $i = 1;
					
                    foreach($reporte as $item)
                    { 
					
            ?>
                              <tr>
                                 <td align="center"><?php echo $i;?></td>
      <td align="center"><?php echo $item["dia"];?></td>
      <td align="center"><?php echo $item["mes"];?></td>
      <td align="center"><?php echo $item["udni"];?></td>
      <td align="center"><?php echo $item["nombre"];?></td>
      <td align="center"><?php echo $item["entrada"];?></td>
      <td align="center"><?php echo $item["salida"];?></td>
      <td align="center"><?php echo $item["refrini"];?></td>
      <td align="center"><?php echo $item["refrifin"];?></td>
     </tr>
        <?php
        $i += 1;
        }
        ?>
        </tbody>
        </table>
        </td>
        </tr>
        <?php 
		} 
		?>
    </table>
</form>
</body>
</html>