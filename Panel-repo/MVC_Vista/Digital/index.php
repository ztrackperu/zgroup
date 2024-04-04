<?php 
if($_GET['sw']=='1'){
	
	$nombre=$_GET['equipo'];
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>GUARDAR FOTOS EN EL SERVIDOR</title>
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="images/iconos/icon.jpg" />	
    <link rel="stylesheet" type="text/css" href="../css/style_intranet.css" />     
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jsalert/jquery.alerts.js"></script>
<link rel="stylesheet" type="text/css" href="../js/jsalert/jquery.alerts.css"/>
   <script type='text/javascript'>
    	function cambiarvalor(){
			document.getElementById('valor').value='1';
		}
   		function concatenar(){		
		var select1=document.getElementById('select1').value;
		var select2=document.getElementById('select2').value;
		var select3=document.getElementById('select3').value;
		var select4=document.getElementById('select4').value;
		var codigo1=document.getElementById('codigo1').value;
		var codigo2=document.getElementById('codigo2').value;
		var codigo3=document.getElementById('codigo3').value;
		var codigo4=document.getElementById('codigo4').value;
		var codigo5=document.getElementById('codigo5').value;
		var codigo6=document.getElementById('codigo6').value;
		var codigo7=document.getElementById('codigo7').value;
		var codigo8=document.getElementById('codigo8').value;		
		var cadena1=select1+select2+select3+select4+codigo1+codigo2+codigo3+codigo4+codigo5+codigo6+codigo7+codigo8;
			 if(cadena1.length<7){
				if(document.getElementById('nombrex').value=="")
				jAlert('El codigo ingresado debe tener mas de 6 digitos', 'Mensaje del Sistema');				
					return 0;
			}
		    if(document.getElementById('nombrex').value==""){
			var cadena=select1+select2+select3+select4+codigo1+codigo2+codigo3+codigo4+codigo5+codigo6+codigo7+codigo8;
			document.getElementById('nombrex').value=cadena;				
			}else{			
				document.getElementById('nombrex').value=cadena1;
			}	
		}
function guardar(){
			
			 if(document.getElementById('valor').value=='0'){
				jAlert('Falta tomar una foto', 'Mensaje del Sistema');
				return 0;
				}
				
		var letras=document.getElementById('letras').value;
		var numeros=document.getElementById('numeros').value;
		var guion=document.getElementById('guion').value;
		var numero=document.getElementById('numero').value;		
		var cadena1=letras+numeros+guion+numero;
		  if(cadena1.length<7 && document.getElementById('nombrex').value==""){
		     if(document.getElementById('nombrex').value=="")
				jAlert('El codigo ingresado debe tener mas de 6 digitos', 'Mensaje del Sistema');				
					return 0;
			 }
				if(document.getElementById('nombrex').value==""){
				document.getElementById('nombrex').value=cadena1;
				}
			
				jConfirm("¿Seguro de Publicar la foto?", "Mensaje Confirmacion", function(r) {
				if(r) {
					//document.form1.submit();
					document.getElementById("form1").submit();
				} else {
					return 0;
				}
			});
		  
		}
		
		function limpiar(){
			document.getElementById('nombrex').value="";
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
		
		
		function ValidaLetras(e){
			tecla = (document.all) ? e.keyCode : e.which;
		
			//Tecla de retroceso para borrar, siempre la permite
			if (tecla==8){
				return true;
			}
				
			// Patron de entrada, en este caso solo acepta numeros
			patron =/[A-Z]/;
			tecla_final = String.fromCharCode(tecla);
			return patron.test(tecla_final);
		}
	</script>  
    
      
</head>
<body>
<form name="form1" id="form1" enctype="multipart/form-data" action="../MVC_Controlador/DigitalC.php?acc=guardarfoto&udni=<?php echo $_GET['udni'] ?>" method="POST">
<table class="tabla"  >
    <tr align="center">
            <td height="70" align="center">Fotos para EIR </td>
            <td align="center"><button class="myButton" type="button"  onClick="guardar();">Publicar</button></td>
          </tr>
    <tr align="center">
            <td width="50%"><div class='pintar'><img src="../images/iconos/busqueda.png"><br>Ver fotos<br> 
			<?php if($nombre !=""){?><a href="../MVC_Controlador/DigitalC.php?acc=verimagen&buscar=<?php echo $nombre; ?>"><?php echo $nombre; ?> </a>
			<?php }else{?> aqui<?php }?></div></td>
            <td width="50%"><div class='pintar'><a href="../MVC_Controlador/DigitalC.php?acc=verimagenes&nombreimagen=<?php echo $nombre; ?>"><br><img src="../images/iconos/vertodo.png"><br>Ver Galeria</a></div></td>
          </tr>
          <tr align="center">
            <td colspan="2"><hr></td>
          </tr>
           <tr align="center">
            <td colspan="2"><strong>Vista</strong></td>
          </tr>
          <tr align="center">
            <td  colspan="2">
                <select name="vista" id="vista">
                  <option value="1" selected="selected">Vista lateral</option>
                  <option value="2">Vista frontal</option>
                  <option value="3">Vista trasera</option>
                </select>
            </td>
          </tr>
          <tr align="center">
            <td colspan="2"><strong>Codigo Equipo</strong></td>
          </tr>
          
          <tr>
          <td colspan="2">
          	<table width="300" border="0" align="center" class="codigoequipo">
  <tr class="fila">
	<td align="center">Ejm:</td>
      <td align="center">ABCD</td>
      <td align="center">123456</td>
      <td align="center">-</td>
      <td align="center">7</td>
    </tr>
    <tr align="center">
      <td>&nbsp;</td>
      <td><input type="text" name="letras" id="letras" size="5" maxlength="4" onKeyPress="return ValidaLetras(event)" /></td>
      <td><input type="text" name="numeros" id="numeros" size="7" maxlength="6" onKeyPress="return ValidaEntero(event)" /></td>
      <td><input type="text" name="guion"	id="guion"  value="-" size="1" maxlength="1"  /></td>
      <td>
      <input type="text" name="numero"  id="numero"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/>      
       </td>
</tr>
</table>
</td>

          		
          </tr>	
          
          <tr align="center">
            <td colspan="2">
                <input name="nombrex" id="nombrex" type="text" size="20"  value="<?php echo $nombre;?>" readonly  >
                <input name="valor" type="hidden" id="valor" value="0"> 
                <button type="button" onClick="limpiar();">Limpiar</button>
            </td>       
         </tr>
         
          <tr align="center">           
            <td height="35" colspan="2"><div class="fileinputs">
                    <input name="userfile" value="Foto" type="file" class="file" onClick="cambiarvalor();" />
                    <div class="fakefile">
                        <!--<input />-->
                        <img src="../images/iconos/camera.png" />
                    </div>
                </div></td> 
                         
          </tr>
           
          <tr>
            <td colspan="2" align="center"></td>
          </tr>
           
       </table>   
	 <br>   
  <br>
	 <input name="descripcion" id="descripcion" type="hidden" placeholder="Ingrese una descripcion" >
     
    
</form><br>

	
	
</body>
</html>
