<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script src="../SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/funciones2.js"></script>
<script src="../js/calendar.js" type="text/javascript"></script>
<script src="../js/calendar-es.js" type="text/javascript"></script>
<script src="../js/calendar-setup.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/FechaMasck.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<script type="text/javascript" src="../js/jquery.js"></script>   
<script type="text/javascript" src="../js/main.js"></script>
<script src="../js/jquery-1.5.1.min.js" type="text/javascript"></script>
<script src="../js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script src="../js/jquery.html5form-1.5-min.js"></script>




 <link rel="stylesheet" media="screen" type="text/css" href="../css/datepicker.css" />
<script type="text/javascript" src="../js/datepicker.js"></script>

<link rel="stylesheet" type="text/css" href="../css/formulario.css">




<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">

<link href="../css/estilos.css" type="text/css" rel="stylesheet">

<style type="text/css">
textarea {
	resize: none;
}
</style>
<link rel="stylesheet" type="text/css" href="../../css/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../css/formulario.css">
<link href="../css/calendario.css" type="text/css" rel="stylesheet">
<link href="../css/estilos.css" type="text/css" rel="stylesheet">


<script type="text/javascript"> 
	//$(function() {
		
		
	
		
		function numdias()
		{
	
			var fecha1= document.getElementById("fini").value.split('/');   //%d/%m/%Y
			var fecha2 = document.getElementById("ffin").value.split('/');
			//calcular la diferencia
			var dif = FechaDif(fecha1[0], fecha1[1], fecha1[2],
								fecha2[0], fecha2[1], fecha2[2]);
		
			document.getElementById("ndias").value=dif;
			//document.form1.ndias.value=dif;
		}
		
		
		
		//funciones
		function FechaDif(dia1,mes1,anio1,dia2,mes2,anio2)
		{
			/* Meses con 31:
		*	*	Enero(1) Marzo(3) Mayo(5) Julio(7) Agosto(8) Octubre(10) Diciembre(12)
		*	*	
		*	*	Meses con 30:
		*	*	Abril(4) Junio(6) Setiembre(9) Noviembre(11)
		*	*	
		*	*	Meses con 28:
		*	*	Febrero(2)
		*	*/
			var dias1,dias2,dif;
			//convertir a numeros
			dia1 = parseInt(dia1,10);
			mes1 = parseInt(mes1,10);
			anio1 = parseInt(anio1,10);
			dia2 = parseInt(dia2,10);
			mes2 = parseInt(mes2,10);
			anio2 = parseInt(anio2,10);
			
			//Chequear valores.
			if((mes1>12)||(mes2>12)){ return -1;}
			
			if((mes1==1)||(mes1==3)||(mes1==5)||(mes1==7)||(mes1==8)||(mes1==10)||(mes1==12)){
		if(dia1>31){
			return -1;}
			}
			if((mes2==1)||(mes2==3)||(mes2==5)||(mes2==7)||(mes2==8)||(mes2==10)||(mes2==12)){
			if(dia2>31){
			return -1;}
			}
			if((mes1==4)||(mes1==6)||(mes1==9)||(mes1==11)){
		if(dia1>30){
		return -1;}
			}
			if((mes2==4)||(mes2==6)||(mes2==9)||(mes2==11)){
		if(dia2>30){
			return -1;}
			}
			if(mes1==2 && dia1>29){
			return -1;}
			if(mes2==2 && dia2>29){
			return -1;}
		
			dias1 = FechaADias(dia1,mes1,anio1);
			dias2 = FechaADias(dia2,mes2,anio2);
			//devolver la diferencia positiva
			dif = dias2 - dias1;
			if(dif<0){
				return ((-1*dif));}
			return dif;
		}
		
		function FechaADias(dia, mes, anno){
		/*Devuelve la cantidad de días desde el 1/01/1904
		*	No verifica datos. Llamada desde FechaDif()
		*	intervalo permitido: 1904-2099
		*	**/
			
			dia = parseInt(dia,10);
			mes = parseInt(mes,10);
			anno = parseInt(anno,10);
			var cant_bic,cant_annos,cant_dias, no_es_bic;
		
			
			//verificar la cantidad de biciestos en el periodo (div entera)
			//+1 p/contar 1904
			cant_bic = parseInt((anno-1904)/4 + 1);
			no_es_bic = parseInt((anno % 4));
			//calcular dias transcurridos hasta el 31 de dic del año anterior
			cant_annos = parseInt(anno-1904);
			cant_dias = parseInt(cant_annos*365 + cant_bic);
			
			//calcular dias transcurridoes desde el 31 de dic del año anterior
			//hasta el mes anterior al ingresado
			var i;
			for(i=1;i<=mes;i++){
				if((i==1)||(i==3)||(i==5)||(i==7)||(i==8)||(i==10)||(i==12)){
			cant_dias+=31;}
			if((i==4)||(i==6)||(i==9)||(i==11)){
			cant_dias+=30;}
			if(i==2)
		{
			if(no_es_bic){
		cant_dias+=28;}
			else{
			cant_dias+=29;}
			}
			}	
			//sumarle los dias transcurridos en el mes
			cant_dias+=dia;
			return cant_dias;
		}
		
//});
	
	</script> 





</head>


<body>
<form id="form1" name="form1" method="post" action="../MVC_Controlador/rrhhC.php?acc=guardarvaca" >
<table border="1" bgcolor="#D3F7FE" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center"><strong>Registro de Vacaciones</strong></td>
  </tr>
  <tr>
    <td width="62">Fecha</td>
    <td width="144">  <input type="text" name="fecha_reg" id="fecha_reg" value="<?php  echo date("Y/m/d");?>" /></td>
    <td width="144">Usuario</td>
    <td width="172"><input type="text" name="autoriza" id="autoriza" class="texto" value="<?php echo $_GET["udni"] ?>"/></td>
    
  </tr>
  <tr>
    <td>Empleado</td>
    <td><?php $ven = listarEmpleadoC(); ?>
      <select name="emple" id="emple" class="Combos texto"  >
        <option value="0">.::SELECCIONE::.</option>
        <?php foreach($ven as $item){?>
        <option value="<?php echo $item["Cod_person"]?>"><?php echo $item["ApePat"].' '.$item["NomC"]?></option>
        <?php }	?>
      </select></td>
    
    <td>Observacion</td>
    <td><textarea name="observacion" cols="18" rows="3" id="observacion" class="texto"></textarea></td>
   
  </tr>
  
  <tr>
    <td>Periodo</td>
    <td> del
    <input name="fini" type="text" id="fini" size="10" value="" class='texto'/>
    <img src="../images/calendario.jpg" id="Image1" name="Image1" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'" />
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "fini",
					ifFormat   : "%d/%m/%Y",
					button     : "Image1"
					  }
					);
		 </script>
         
         </td>
    <td>  al <input name="ffin" type="text" id="ffin" size="10"  value="" class='texto'  onchange="numdias()"/>
      <img src="../images/calendario.jpg" name="Images" id="Images" width="16" height="16" border="0" onmouseover="this.style.cursor='pointer'"/>
      <script type="text/javascript">
					Calendar.setup(
					  {
					inputField : "ffin",
					ifFormat   : "%d/%m/%Y",
					button     : "Images"
					  }
					);
		 </script>
         
      
         
     <!--
         <p><button id="calcular" >Calcular</button></p>-->
         
         </td>
    <td>N° dias <input type="text" name="ndias" id="ndias" class="texto" value="" readonly="readonly" /> </td>

  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="button" id="button" value="Guardar"   /></td>
   

  </tr>
</table>
</form>
</body>
</html>