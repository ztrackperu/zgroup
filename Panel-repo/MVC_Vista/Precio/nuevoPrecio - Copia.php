<?php 
if($resultado1!=NULL)
{
	foreach ($resultado1 as $item1)
	{
		$udni=$item1['login'];
	}
}
?>
<?php 
if($resultado!=NULL)
{
	foreach ($resultado as $item)
	{
	$c_numpre=$item['c_numpre'];
	
	$c_codprd=$item['c_codprd'];
	$c_desprd=$item['c_desprd'];
	$c_partnum=$item['c_partnum'];
	$c_catprd=$item['c_catprd'];
	$c_conprd=$item['c_conprd'];
	$c_codmon=$item['c_codmon'];
	$n_preprd=$item['n_preprd'];
	$n_dscto=$item['n_dscto'];
	$n_ultpre=$item['n_ultpre'];
	$c_obspre=$item['c_obspre'];	
	$d_fecreg=$item['d_fecreg'];
		
	$c_oper=$udni;
	$marca=$item['c_mcamaq'];
	$modelo=$item['c_cmodel'];
	}
}




 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Registro de Precios</title>
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
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/classAjax_Listar.js"></script>
<script type="text/javascript" src="../js/jquery-autocomplete.js"></script>
<script type='text/javascript' src='../js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>

<script type="text/javascript">	
//$("#descripcion").autocomplete("../MVC_Controlador/cajaC.php?acc=at1&seguro="+seguro, {
$().ready(function() {
	//realiza la funcion de autocompletar mientras se digita
	$("#c_desprd").autocomplete("../MVC_Controlador/PrecioC.php?acc=proautocoti", {
		width: 300, 
		matchContains: true,
		selectFirst: false
	});	
	
	//coloca los datos en el formulario
	$("#c_desprd").result(function(event, data, formatted) {
		$("#c_desprd").val(data[2]);
		$("#codigo").val(data[1]);
		$("#medida").val(data[4]);
		//$("#tipo").val(data[5]);
		
	});
	
});

function Cambiamoneda(){
document.getElementById('idmoneda').value=document.form1.moneda.options[document.form1.moneda.selectedIndex].value;
	}
       function ventanaArticulos(){
		var moneda=document.getElementById("moneda").value;	
			if (moneda=="" ) {
				jAlert('debe seleccionar un tipo de moneda', 'Mensaje del Sistema')
				document.getElementById("c_desprd").value="";
	   			
			}else{
					miPopup = window.open("../MVC_Controlador/PrecioC.php?acc=verarti&udni=<?php echo $udni;?>","miwin","width=700,height=500,scrollbars=yes");
					miPopup.focus();
			}
			
		}	
		

   function validarmoneda(){
	   var moneda=document.getElementById("moneda").value;	
		if (moneda=="" ) {
		jAlert('debe seleccionar un tipo de moneda', 'Mensaje del Sistema')
		document.getElementById("c_desprd").value="";	
		}		
				
	}
		
		
		function guardar(){
		
		
		
if(document.getElementById('precio').value==''){
		jAlert ('Ingrese Precio', 'Mensaje del Sistema');
		return 0;
		}	
		
/*if(document.getElementById('precio2').value==''){
		jAlert ('Falta Selecionar ultimo precio', 'Mensaje del Sistema');
		return 0;
		}	*/	

jConfirm("¿Seguro de Grabar el Nuevo Precio del Producto?", "Mensaje Confirmacion", function(r) {
			if(r) {
				//document.form1.submit();
				document.getElementById("form1").submit();
			} else {
				return 0;
			}
		});


	}
	
	function ultimosprecios(){
			var codigo=document.getElementById("codigo").value;
			if (codigo=="") {
				jAlert ("debe introducir un producto", 'Mensaje del Sistema');
			} else {
				miPopup = window.open("../MVC_Controlador/PrecioC.php?acc=ver_ultimosprecios&udni=<?php echo $udni;?>&cod="+codigo,"miwin","width=700,height=500,scrollbars=yes");
				miPopup.focus();
			}
	   }

function cancelar(){
location.href="../MVC_Controlador/PrecioC.php?acc=AdminPrecio"; 
}

		
				
</script>


<script type="text/javascript">
//VALIDACIONES

function ValidarPrecio(){
	var valor = document.getElementById("precio").value;
    if( isNaN(valor) ) {		
    //var val= false;				
				
			jAlert('El numero ingresado no es valido', 'Mensaje del Sistema');
			
		     document.getElementById("precio").value="";
			 document.getElementById("precio").focus();
			
    }else{
	//var val= true;	
	        //document.getElementById("precio").value=valor;
	}
	
	
}
function ValidarDes(){
	var valor = document.getElementById("dscto").value;
    if( isNaN(valor) ) {		
    //var val= false;				
				
			jAlert('El numero ingresado no es valido', 'Mensaje del Sistema');
			
		     document.getElementById("dscto").value="0";
			 document.getElementById("dscto").focus();
			
    }else{
	//var val= true;	
	        //document.getElementById("precio").value=valor;
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
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	var myajax_Listar=new classAjax_Listar();
	myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo.php',{op:'showdepa'},'c_mcamaq');
	$("#c_mcamaq").change(function(){

		var dep=$("#c_mcamaq").val();
		myajax_Listar.loadCmbJson_L('../MVC_Modelo/cn/combo.php',{op:'showprov',depa:dep},'c_cmodel');	
	});	
	});
</script>




<style>
#tablaDiagnostico td, th { padding: 0.2em; }
#tablaDiagnostico tr:nth-child(even) {background: #6CC }
#tablaDiagnostico tr:nth-child(odd) {background: #FFF}
</style>

</head>
<body>

 <strong>REGISTRAR NUEVO PRECIO AL:</strong> <strong style="color:#F00;"> <?php echo $c_desprd ; ?> </strong>
 <form id="form1" name="form1" method="post" action="../MVC_Controlador/PrecioC.php?acc=grabarnuevoPrecio&mod=<?php echo $_GET['mod'] ?>&udni=<?php echo $_GET['udni']; ?>">
    <fieldset class="fieldset legend">
    <legend style="color:#00F"><strong>Encabezado del Registro de Precio</strong></legend>
   
   <table width="984" height="80" border="0" cellpadding="0" cellspacing="0" >
  
		<tr>
		  <td width="90" height="30">Nro Orden:</td>
		  <td width="248">	
          	<input name="c_numpreant" type="hidden" class="texto" id="c_numpreant" value="<?php echo $c_numpre;  ?>" readonly="readonly"/>		
			<input name="c_numpre" type="text" disabled="disabled"  class="texto" id="c_numpre" value="Autogenerado" readonly="readonly"/>
            			
		  </td>
			
		  <td width="90">Fecha:</td>
		  <td width="202">			
           
			<input name="fecha"  type="text" class="texto"  id="fecha" size="15" maxlength="12" value="<?php echo date('d/m/Y');?>" readonly="readonly"  /><!--value=" //echo vfecha(substr($d_fecreg,0,10)) "-->  <img src="../images/calendario.jpg" name="Image1" id="Image1" width="16" height="16" border="0"   onMouseOver="this.style.cursor='pointer'">
			<script type="text/javascript">
						Calendar.setup(
						  {
						inputField : "fecha",
						ifFormat   : "%d/%m/%Y",
						button     : "Image1"
						  }
						);
			 </script>
			
			
			
            
		  </td>
		 
		  <td width="100">Usuario:</td>
		  <td><label for="select">
		    <input name="c_oper" type="text" id="c_oper" value="<?php echo $udni; ?>" readonly="readonly" class="texto" size="10"/>
		  </label></td>  
		</tr>
        
		<tr>
		  <td height="24">Moneda:</td>
		  <td>
			 <?php $ven = ListaMonedaC();  
			  ?>
               <select name="moneda" id="moneda" class="Combos texto" onchange="Cambiamoneda()" >
			    <option value="">.::SELECCIONE::.</option>
				<?php foreach($ven as $item){
				 $nombremoneda=$item["c_desitm"];
			     $idmoneda=$item["c_numitm"];	
				?>
			   
				<option value="<?php echo $idmoneda?>"<?php if( $idmoneda==$c_codmon){?>selected<?php }?>><?php echo $nombremoneda?></option>
				<?php }	?>
			  </select>
			 	  
              <input type="hidden" name="idmoneda" id="idmoneda" value="<?php echo $c_codmon ; ?>"  />          
              
            
              
		  </td>
		  
		  <td>T/Cambio:</td>
		  <td>
           <?php 
			 $tcambio = ListatipocambioC();
			foreach($tcambio as $item){
			 $tipocambio=$item["tc_cmp"];
			}
			?>
            <input name="nomtipo" class="texto" type="text" id="nomtipo" value="<?php echo $tipocambio ?>" size="14" readonly="readonly" />   
						
		  </td> 
          <td>Observacion</td>
 		  <td width="254">
          <textarea name="c_obspre" id="c_obspre" cols="25" rows="1"><?php echo $c_obspre ; ?></textarea>
				
          </td> 
	  </tr>
          
		 
	  </table>
	
	</fieldset>		

       
  
<!-------------------------------------------------------------------------------------------------------------- -->


  
  <fieldset class="fieldset legend">
  <legend style="color:#C33"><strong>Datos del Producto</strong></legend>
  <table width="985"  border="0" cellpadding="1" cellspacing="1">
	 <tr>
      <td width="121" height="52">Descripcion: </td>
	  <td width="268">        
          <input name="c_desprd" type="text" id="c_desprd" size="30" class="texto" onclick="validarmoneda();"  value="<?php echo $c_desprd ; ?>" />
        <a href="#">  <img src="../images/search.png" width="15" height="15"  border="0"  title="Buscar Articulo"  onClick="ventanaArticulos()" onMouseOver="style.cursor=cursor"/></a>
      </td>
	  <td colspan="2" >Codigo :
	 
          <input name="codigo" type="text"  id="codigo" size="15" readonly="readonly" class="texto" value="<?php echo $c_codprd ; ?>" />
       <!--   <input name="tipo" type="text" id="tipo" size="2" class="texto" />-->
          
		 
		</td>
	  <td width="176" align="center">Categoria:	         
          <input name="categoria" type="hidden"  id="categoria" size="15"  class="texto" value="<?php echo $c_catprd ; ?>" />
           
         <select name="categoriax" id="categoriax" class="Combos texto" disabled="disabled">	
          
          	        
                 <?php
					$var = $c_catprd;
					if($var == "A"){
						$sA = "selected";
					}
					if($var == "B"){
						$sB = "selected";
					}
					if($var == "C"){
						$sC = "selected";
					}
					if($var == "D"){
						$sD = "selected";
					}
				 ?>  
                <option value="">.::SELECCIONE::.</option>	                 	   
				<option name="cate" value="A"<?php echo $sA;?>>A</option>
				<option name="cate" value="B"<?php echo $sB;?>>B</option>
                <option name="cate" value="C"<?php echo $sC;?>>C</option>
                <option name="cate" value="D"<?php echo $sD;?>>D</option>
				
		  </select>
      
      
      </td >
		<td width="189" align="center">Condicion: 
        <input name="condicion" type="hidden"  id="condicion" size="15"  class="texto" value="<?php echo $c_conprd ; ?>" />
               
            <select name="condicionx" id="condicionx" class="Combos texto" disabled="disabled">
            
            	<?php
					$seleccionar = $c_conprd;					
				?>   
			    <option value="">.::SELECCIONE::.</option>					   
				<option value="NUEVO"<?php if ($seleccionar == 'NUEVO'){echo 'selected';}; ?>>NUEVO</option>
				<option value="USADO"<?php if ($seleccionar == 'USADO'){echo 'selected';}; ?>>USADO</option>              
				
		  </select>
        
        </td>
	  
	  

	  </tr>
	  
	<tr>
	   <td>	Part Number:	</td>					  
		<td> <br /> 			
			  <input name="c_partnum" type="text" class="texto" id="c_partnum" size="23" value="<?php echo $c_partnum ; ?>" />
			  <input type="button" value="Refrescar" onclick="location.reload();" style="width: 90px; height: 25px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>
	    </td> 
		<td width="93" align="center"><label for="cantidad">Precio: <br /> 
		  <input name="precio" type="text" id="precio" size="5"  class="texto"  onkeypress="return ValidarPrecio(event)" onclick="return ValidarPrecio(event)"  value="<?php echo $n_preprd ; ?>" />
		  </label></td>
		<td width="119" align="center">%Dscto: <br /> 
		  <input name="dscto" type="text"  class="texto" id="dscto"  size="5" onkeypress="return ValidarDes(event)" onclick="return ValidarDes(event)"  value="<?php echo $n_dscto ; ?>" /></td>
		<!--<td align="center" >
		  Ult. Precio:
		  <input name="precio2" type="text" id="precio2" size="5"  class="texto"   readonly="readonly"  value="<?php echo $n_ultpre ; ?>" />
		  <img src="../images/search.png" width="15" height="15"  border="0"  title="Seleccionar Ultimo Precio"  onClick="ultimosprecios()" onMouseOver="style.cursor=cursor"/>
	    </td>-->   
      
      <td align="center" >Marca:<br />
        <select name="c_mcamaq" id="c_mcamaq" class="texto">
            <option value="SELECCIONE">SELECCIONE</option>
                <?php 
                 $ListaMarcaMaqM = ListaMarcaMaqM();
       foreach($ListaMarcaMaqM as $mmaq){              
               ?>                                   
       <option value="<?php echo $mmaq['C_NUMITM']; ?>"<?php if($item["C_NUMITM"]==$marca){?>selected<?php }?>  > <?php echo $mmaq['C_DESITM']; ?> 
       </option>
          <?php } ?>
          
          
          
          
        </select></td>
      <td align="center" >Modelo:<br />
        <select name="c_cmodel" id="c_cmodel" class="texto" >
                          <option value="SELECCIONE">SELECCIONE</option>  
                <?php $ListaMarcaMaqM = ListarModeloM($marca);
              foreach($ListaMarcaMaqM as $modelo){  ?>                                               
                <option value="<?php echo $modelo['C_NUMITM']; ?>" <?php if($item["C_NUMITM"]==$modelo){?>selected<?php }?>    > <?php echo $modelo['C_DESITM']; ?> </option>
                <?php } ?>            

        </select></td>
      
     </tr>
	 
    </table>
  </fieldset>
  

  
  
  
  
  
  
  <table width="996" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="24">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td> <div class="buttons">
    <button type="button" class="positive" name="save" onclick="guardar()">
        <img src="../images/icon_accept.png" alt=""/>
        Guardar
    </button>
   

 <?php /*?>   <a href="" class="regular"><!-- class="regular"-->
        <img src="images/textfield_key.png" alt=""/>
        Change Password
    </a><?php */?>

    <button type="button" class="negative" name="cancel" onClick="cancelar();">
        <img src="../images/icon_delete.png" alt=""/>
        Cancelar
       </button>
       
       </div>  
    </tr>
  </table>
   
   
   
</form>
</body>
</html>