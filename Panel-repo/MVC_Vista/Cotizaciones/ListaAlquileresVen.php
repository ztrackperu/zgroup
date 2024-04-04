<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php ini_set('memory_limit', '1024M');?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte Compras | ZGROUP</title>
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
<!--<img src="../../images/word.gif" width="30" height="30" />-->
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
<form id="form1" name="form1" method="post" action="../MVC_Controlador/cajaC.php?acc=verrepcont01">
													
  <table width="99%" border="1" align="center" cellpadding="0" cellspacing="0" >
        <tr>
            <td align="center">&nbsp;</td>
        </tr>

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
          LISTA EQUIPO POR VENCER

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000" class="data" style="font-family:Arial, Helvetica, sans-serif; font-size:12px">
                            <thead>
                                <tr align="center">
                                  <td colspan="7"><br />
                                    <a href="../MVC_Controlador/cajaC.php?acc=repcont01">Retornar</a>&nbsp;<a href="#nogo" onclick="window.print();" class="nover"><em class="home nover"></em><b>Imprimir</b></a></td>
                                </tr>
                                <tr align="center">
                                  <td width="26" bgcolor="#CCCCCC">Nro</td>
      <td width="49" bgcolor="#CCCCCC">Cotizacion Padre</td>
      <td width="107" bgcolor="#CCCCCC">Cliente</td>
      <td width="77" bgcolor="#CCCCCC">Equipo</td>
      <td width="77" bgcolor="#CCCCCC">Codigo Equipo</td>
      <td width="82" bgcolor="#CCCCCC">Customer</td>
      <td width="82" bgcolor="#CCCCCC">Fecha Vencimiento</td>
      </tr>
                            </thead>
                            <tbody>
                                <?php 
                    $i = 1;
					// foreach($login as $log){
                    foreach($reporte as $item)
                    { 
					 
					//d.c_numped,c.c_nomcli,c.c_meses,d_fecven,ca.c_opcrea,c_nroped,c_desprd,c_codequipo
            ?>
                                <tr>
      <td align="center"><?php echo $i;?></td>
      <td align="center"><a href="../MVC_Controlador/cajaC.php?acc=xvercronograma&udni=<?php echo $_GET['udni']; ?>&mod=<?php echo $_GET['mod']; ?>&coti=<?php echo !empty($item["c_numped"])?$item["c_numped"]:""; ?>&cli=<?php echo utf8_encode($item["c_nomcli"]);?>&codcli=<?php echo  $item["c_codcli"];?>"><?php echo !empty($item["c_numped"])?$item["c_numped"]:"";?></a></td>
      <td align="center"><?php echo utf8_encode(!empty($item["c_nomcli"])?$item["c_nomcli"]:"");?></td>
      <td align="center"><?php echo !empty($item["c_desprd"])?$item["c_desprd"]:""; ?>&nbsp;</td>
      <td align="center" bgcolor="#FFFF99"><?php echo !empty($item["c_codequipo"])?$item["c_codequipo"]:""; ?>&nbsp;</td>
      <td align="center"><?php if(!empty($item["c_opcrea"])?$item["c_opcrea"]:"" =="40294243"){echo 'MAMENERO';}
	  elseif(!empty($item["c_opcrea"])?$item["c_opcrea"]:""=="41753251"){ echo 'GALFARO';}elseif(!empty($item["c_opcrea"])?$item["c_opcrea"]:""=="43846701"){
		  echo 'HZABARBURU';
		  }elseif(!empty($item["c_opcrea"])?$item["c_opcrea"]:""=="12000100"){ echo 'LESPIRITU';}elseif(!empty($item["c_opcrea"])?$item["c_opcrea"]:""=="45359577"){ echo 'LSANCHEZ';}; ?>&nbsp;</td>
      <td align="center"><?php echo vfecha(substr(!empty($item["d_fecven"])?$item["d_fecven"]:"",0,10));?></td>
      </tr>
                          
                                <?php
                        $i += 1;
                    }//}
            ?>
                            </tbody>
                        </table>
          </td>
        </tr>
      
    </table>
</form>
</body>
</html>