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
    
   <!--  <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>-->
   <!-- <script type="text/javascript" src="js/jsalert/jquery.alerts.js"></script>-->  
   <!--<link rel="stylesheet" type="text/css" href="js/jsalert/jquery.alerts.css"/>-->
	
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
          	<table width="400" border="0">
  <tr class="fila">
	<td align="center">Ejm:</td>
      <td align="center">A</td>
      <td align="center">B</td>
      <td align="center">C</td>
      <td align="center">D</td>
      <td align="center">1</td>
      <td align="center">2</td>
      <td align="center">3</td>
      <td align="center">4</td>
      <td align="center">5</td>
      <td align="center">6</td>
      <td align="center">-</td>
      <td align="center">7</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <select name="select1" id="select1">
            <option value="A">A</option>                                     
            <option value="B">B</option>                                            
            <option value="C">C</option>                                              
            <option value="D">D</option>                                            
            <option value="E">E</option>                                             
            <option value="F">F</option>                                         
            <option value="G">G</option>                                         
            <option value="H">H</option>                                       
            <option value="I">I</option>                                               
            <option value="J">J</option>                                               
            <option value="K">K</option>                                           
            <option value="L">L</option>                                        
            <option value="M">M</option>                                  
            <option value="N">N</option>                                        
            <option value="O">O</option>                                          
            <option value="P">P</option>                                             
            <option value="Q">Q</option>                                             
            <option value="R">R</option>                                             
            <option value="S">S</option>                                             
            <option value="T">T</option>                                             
            <option value="U">U</option>                                            
            <option value="V">V</option>                                              
            <option value="W">W</option>                                           
            <option value="X">X</option>                                          
            <option value="Y">Y</option>                                            
            <option value="Z">Z</option>
      </select>        </td>
      <td>
        <select name="select2" id="select2">
        	<option value="A">A</option>                                     
            <option value="B">B</option>                                            
            <option value="C">C</option>                                              
            <option value="D">D</option>                                            
            <option value="E">E</option>                                             
            <option value="F">F</option>                                         
            <option value="G">G</option>                                         
            <option value="H">H</option>                                       
            <option value="I">I</option>                                               
            <option value="J">J</option>                                               
            <option value="K">K</option>                                           
            <option value="L">L</option>                                        
            <option value="M">M</option>                                  
            <option value="N">N</option>                                        
            <option value="O">O</option>                                          
            <option value="P">P</option>                                             
            <option value="Q">Q</option>                                             
            <option value="R">R</option>                                             
            <option value="S">S</option>                                             
            <option value="T">T</option>                                             
            <option value="U">U</option>                                            
            <option value="V">V</option>                                              
            <option value="W">W</option>                                           
            <option value="X">X</option>                                          
            <option value="Y">Y</option>                                            
            <option value="Z">Z</option>
        
        </select>      
      
      </td>
      <td>
        <select name="select3" id="select3">
        	<option value="A">A</option>                                     
            <option value="B">B</option>                                            
            <option value="C">C</option>                                              
            <option value="D">D</option>                                            
            <option value="E">E</option>                                             
            <option value="F">F</option>                                         
            <option value="G">G</option>                                         
            <option value="H">H</option>                                       
            <option value="I">I</option>                                               
            <option value="J">J</option>                                               
            <option value="K">K</option>                                           
            <option value="L">L</option>                                        
            <option value="M">M</option>                                  
            <option value="N">N</option>                                        
            <option value="O">O</option>                                          
            <option value="P">P</option>                                             
            <option value="Q">Q</option>                                             
            <option value="R">R</option>                                             
            <option value="S">S</option>                                             
            <option value="T">T</option>                                             
            <option value="U">U</option>                                            
            <option value="V">V</option>                                              
            <option value="W">W</option>                                           
            <option value="X">X</option>                                          
            <option value="Y">Y</option>                                            
            <option value="Z">Z</option>
        
        </select>       
      </td>
      <td>
        <select name="select4" id="select4">
       	    <option value="A">A</option>                                     
            <option value="B">B</option>                                            
            <option value="C">C</option>                                              
            <option value="D">D</option>                                            
            <option value="E">E</option>                                             
            <option value="F">F</option>                                         
            <option value="G">G</option>                                         
            <option value="H">H</option>                                       
            <option value="I">I</option>                                               
            <option value="J">J</option>                                               
            <option value="K">K</option>                                           
            <option value="L">L</option>                                        
            <option value="M">M</option>                                  
            <option value="N">N</option>                                        
            <option value="O">O</option>                                          
            <option value="P">P</option>                                             
            <option value="Q">Q</option>                                             
            <option value="R">R</option>                                             
            <option value="S">S</option>                                             
            <option value="T">T</option>                                             
            <option value="U">U</option>                                            
            <option value="V">V</option>                                              
            <option value="W">W</option>                                           
            <option value="X">X</option>                                          
            <option value="Y">Y</option>                                            
            <option value="Z">Z</option>
        </select>    
        
      </td>
      <td>
      <input name="codigo1" type="text" id="codigo1"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/></td>
      <td>
      <input name="codigo2" type="text" id="codigo2"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)" /></td>
      <td>
      <input name="codigo3" type="text" id="codigo3"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/></td>
      <td>
      <input name="codigo4" type="text" id="codigo4"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/></td>
      <td>
      <input name="codigo5" type="text" id="codigo5"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/></td>
      <td><input name="codigo6" type="text" id="codigo6"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/></td>
      <td><input name="codigo7" type="text" id="codigo7" value="-" size="1"  /></td>
      <td>
      <input name="codigo8" type="text" id="codigo8"  size="1" maxlength="1" onKeyPress="return ValidaEntero(event)"/>      
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
