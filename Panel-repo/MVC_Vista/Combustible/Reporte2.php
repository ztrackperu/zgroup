<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WeAdmin | Dashboard</title>
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
function linkgraba(){
		// sumarcolumnatabla();
		 	 if(confirm("Seguro de Eliminar Registro  ?")){
	
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
 <!--AUTOCOMPLETAR-->
 <script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />

<script type="text/javascript">

$().ready(function() {
//	 acc=Fac03&seg="+seg
	$("#textfield").autocomplete("../MVC_Controlador/LogisticaC.php?acc=at2", {
		width: 260, 
		matchContains: true,
		selectFirst: false
	});
	$("#textfield").result(function(event, data, formatted) {
		//$("#hc").val(data[1]);
		$("#textfield").val(data[3]);
	
	});
})
;
</script> 
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
	if(document.form1.fini.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
	
	if(document.form1.ffin.value!="")
		document.form1.submit();
	else
		alert("Ingrese dato a buscar.");
}
</script>

</head>
<body style="height: 100%; font-weight: bold;" class="control"> 
<form id="form1" name="form1" method="post" action="../MVC_Controlador/CombustibleC.php?acc=m27">
													
    <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">
            
                <?php
       if($reporte == null){
		   
    ?>
    <center>
    <div class="column_left" align="center">
      <div class="header"> <span>LISTADO DE REGISTRO </div>
      <br class="clear"/>
					<div class="content">
					  <table width="85%" border="1" align="center" cellpadding="0" cellspacing="0"  >
					    <tr>
					      <td width="39%" height="39" align="right" >Buscar Unidad </td>
					      <td width="36%" ><label for="textfield"></label>
				            <label for="textfield"></label>
				            <input type="text" name="textfield" id="textfield" />
			                     </td>
					      <td width="25%" ><input name="unidades" type="checkbox" id="unidades" value="1" />
				          <label for="unidades">Todas la Unidades</label></td>
				        </tr>
					    <tr>
					      <td align="right" >Fecha del </td>
					      <td colspan="2" align="left" ><label for="fini"></label>
				          <input name="fini" type="text" id="fini" size="12" /><img src="../images/icon_calendar.png" alt="" name="lanzador" width="16" height="16" border="0" id="lanzador" title="Fecha de Emoci&oacute;n"  />
        <script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "fini",     // id del campo de texto 
     ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador"     // el id del bot&oacute;n que lanzar&aacute; el calendario 
}); 
//document.getElementById("hc").focus();
            </script>					        
				          <label for="unidades"> al </label>
				          <label for="ffin"></label>
				          <input name="ffin" type="text" id="ffin" size="12" /><img src="../images/icon_calendar.png" alt="" name="lanzador2" width="16" height="16" border="0" id="lanzador2" title="Fecha de Emoci&oacute;n"  />
        <script type="text/javascript"> 
   Calendar.setup({ 
    inputField     :    "ffin",     // id del campo de texto 
     ifFormat     :     "%d/%m/%Y",     // formato de la fecha que se escriba en el campo de texto 
     button     :    "lanzador2"     // el id del bot&oacute;n que lanzar&aacute; el calendario 
}); 
//document.getElementById("hc").focus();
            </script></td>
				        </tr>
					    <tr>
					      <td colspan="3" align="center" ><strong>Formato a Exportar</strong></td>
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
					      <td colspan="3" align="center" ><input type="submit" name="button" id="button" value="Consultar"  /></td>
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

                      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data">
                          <thead>
                              <tr align="center">
                                <td colspan="11"><a href="../MVC_Controlador/CombustibleC.php?acc=r2">Retornar</a>&nbsp; <a href="#" target="_parent">Ver Grafico (*)</a></td>
                              </tr>
                              <tr align="center">
                                <td colspan="11" bgcolor="#FFFFFF">del &nbsp;&nbsp; <?php echo $_REQUEST['fini']; ?> al &nbsp;&nbsp;  <?php echo $_REQUEST['ffin']; ?></td>
                              </tr>
                              <tr align="center">
                                <td width="27" bgcolor="#CCCCCC">Nro</td>
      <td width="116" bgcolor="#CCCCCC">Unidad</td>
      <td width="85" bgcolor="#CCCCCC">Kilometraje </td>
      <td width="93" bgcolor="#CCCCCC">Promedio</td>
      <td width="85" bgcolor="#CCCCCC">Nro Comprobante</td>
      <td width="85" bgcolor="#CCCCCC">Galones</td>
      <td width="85" bgcolor="#CCCCCC">Precio</td>
      <td width="85" bgcolor="#CCCCCC">Responsable</td>
      <td width="85" bgcolor="#CCCCCC">Grifo</td>
      <td width="85" bgcolor="#CCCCCC">Fecha Abastecimiento</td>
      <td width="85" bgcolor="#CCCCCC">Administrar</td>
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
      <td align="center"><?php echo $item["unidad"];?></td>
      <td align="center"><?php echo $item["kilometraje"];?></td>
      <td align="center"><?php echo $item["prome"];?></td>
      <td align="center"><?php echo $item["nrodcto"];?></td>
      <td align="center"><?php echo $item["galones"];?></td>
      <td align="center"><?php echo $item["precio"];?></td>
      <td align="center"><?php echo $item["Responsable"];?></td>
      <td align="center"><?php echo $item["ubicaciongrifo"];?></td>
      <td align="center"><?php echo vfecha($item["fechacomb"]);?></td>
      <td align="center"><a href="../MVC_Controlador/CombustibleC.php?acc=delete&id=<?php echo $item['id'] ?>"> <img src="../images/icon_delete.png" width="16" height="16" /></a></td>
      </tr>
                          
                              <?php
                        $i += 1;
                    }
            ?>
                          </tbody>
                      </table>
          </td>
        </tr>
        <?php } ?>
    </table>
    <p>&nbsp;</p>
</form>
</body>
</html>