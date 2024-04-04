<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">
<!--<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all">-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>

<script type="text/javascript">
	function vistaprevia(system = ''){
		var mes=document.getElementById('mes').value;
		var ano=document.getElementById('ano').value;
		//alert(fechainicio);
		  if(ano!=""){
			location.href="../MVC_Controlador/ReporteC.php?acc=verreporteLibroDiario&mes="+mes+"&ano="+ano+"&system="+system; 	
		  }else{
		    alert('Ingrese año');			
		  }
	}
	
	function vercuentas(system = ''){	
		var mes=document.getElementById('mes').value;
		var ano=document.getElementById('ano').value;
		  if(ano!=""){	
			location.href="../MVC_Controlador/ReporteC.php?acc=verreporteCuentas&mes="+mes+"&ano="+ano+"&system="+system; 	
		  }else{
		    alert('Ingrese año');
		  }
	}
	
	function generarcuentas(system = ''){
		var mes=document.getElementById('mes').value;
		var ano=document.getElementById('ano').value;
		  if(ano!=""){	
			location.href="../MVC_Controlador/ReporteC.php?acc=txtlecuentas&mes="+mes+"&ano="+ano+"&system="+system; 
		  }else{
		    alert('Ingrese año');
		  }
	}
	
	function ValidaEntero(e){
			tecla = (document.all) ? e.keyCode : e.which;
		
			//Tecla de retroceso para borrar, siempre la permite
			if (tecla==8){
				return true;
			}
				
			// Patron de entrada, en este caso solo acepta numeros
			patron =/[0-9]/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}

</script>
</head>

<body>
<?php
	if(isset($_GET['system']) && $_GET['system'] != ''){
		$system = $_GET['system'];
	}else{
		$system = '';
	}
?>
<?php if($system == 'foodz') :?>
<h2>REPORTE DE LIBRO DIARIO FOODZ</h2>
<?php elseif($system == 'psc') :?>
<h2>REPORTE DE LIBRO DIARIO PSCARGO</h2>
<?php else:?>
<h2>REPORTE DE LIBRO DIARIO</h2>
<?php endif;?>

<form action="../MVC_Controlador/ReporteC.php?acc=txtlediario&system=<?=$system?>" method="post">

    <table width="400" border="0">
      <tr>
        <td>Mes Periodo</td>
        <td>
        <input name="mes"  type="text" class="texto"  id="mes" size="16" maxlength="2" value="" required="required" onKeyPress="return ValidaEntero(event)"  />
       ejemplo 02
        <?php /*?><?php 	
		$meses = array('','ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO',
	    'AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE');			   
	    $nombre = 'meses';
	$resultado = lista($nombre, $meses);
	echo $resultado;

	function lista($nombre, $meses){
		$array = $meses;
		//$nmes1=date("m");// Mes actual en 2 dígitos y con 0, de 01 a 12.  
		//$nmes2=date("n");// Mes actual en digitos sin 0 inicial, de 1 a 12
		$txt= "<select name='mes' id='mes' style='width:125px;' class='Combos texto'>";
	
		for ($i=1; $i<sizeof($array); $i++){
			$nmes=str_pad($i, 2, '0', STR_PAD_LEFT);
			 //if (date("m") == $i){ 		
				//$txt .= "<option value=\"$nmes\" selected>".$array[$i]."</option>";	
			//}else{
				$txt .= "<option value=\"$nmes\" >".$array[$i]."</option>";	
			//}
		}
		$txt .= '</select>';
		return $txt;
	}	 
		?> <?php */?>
			 </td>
      </tr>
      <tr>
        <td>Año Periodo</td>
        <td><input name="ano"  type="text" class="texto"  id="ano" size="16" maxlength="4" value="" required="required" onKeyPress="return ValidaEntero(event)" /> 
			ejemplo 2014</td>
      </tr>    
      
      <tr>
        <td colspan="2" > 
        <input name="cuentas" type="button" value="GENERAR ARCHIVO CUENTAS" onclick="generarcuentas('<?= $system?>');" />
        <input name="genera" type="button" value="VISTA PREVIA CUENTAS" onclick="vercuentas('<?= $system?>');" />
        </td>      
      </tr>
      
      <tr>
        <td colspan="2"><input name="genera" type="submit" value="GENERAR ARCHIVO LDIARIO" />
        <input name="genera" type="button" value="VISTA PREVIA LIBRO LDIARIO" onclick="vistaprevia('<?= $system?>');" />
        </td>      
      </tr>
      
    </table>



</form>








</body>
</html>
