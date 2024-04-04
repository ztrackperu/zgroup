<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="../css/blue/screen.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="../css/imprimir.css">
</head>
<script language="javascript">
function pon_prefijo(idequipo,serie) {
	parent.opener.document.form1.idserie.value=idequipo;
	parent.opener.document.form1.serie.value=idequipo;
	//parent.opener.actualizar_importe();
	parent.window.close();
}

function mensaje(){
	
	alert("PRODUCTO UNICO");
	parent.opener.document.form1.idserie.value="";
	parent.opener.document.form1.serie.value="";
	parent.window.close();
	
	
	
	
	
	}



</script>
<body>

<div id="tituloForm2" class="header">
<form id="form1" name="form1">

 <fieldset class="fieldset legend">
    <legend style="color:#03C"><strong></strong></legend>
   
    
    
		<table class="fuente8" width="560" cellspacing=1 cellpadding=1 border="1"> 
        
         <tr>
		  <td bgcolor="#CCCCCC"><b>Producto</b></td> 
          
          
          
		  <td bgcolor="#CCCCCC">
          	<input name="descripcion" type="text" id="codigo" size="50" readonly value="<?php echo $_GET['descripcion'];?>"> 
            <input name="codigo" type="hidden" id="codigo" size="50" readonly value="<?php echo $_GET['codigo'];?>">    
           </td>
           
           <td>&nbsp; </td>
                
           
	  </tr>    
      
      
		  <tr  onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';" height="2">
		    <td bgcolor="#FFFFFF" height="2" >&nbsp;</td>
		    <td bgcolor="#FFFFFF">&nbsp;</td>
		    <td align="center" nowrap="nowrap" bgcolor="#FFFFFF">&nbsp;</td>
	      </tr>
          
          
          
		  <tr  onMouseOver="this.style.backgroundColor='#FFFF99';" onMouseOut="this.style.backgroundColor='#ffffff';">
			<td width="10%" bgcolor="#0099FF"><div align="center"><b>Codigo</b></div></td>
			<td width="35%" bgcolor="#0099FF"><div align="center"><b>Descripci&oacute;n</b></div></td>
			<td width="20%" bgcolor="#0099FF">
			<strong> <div align="center"> Select</div></strong>
			</td>
		  </tr>
				<?php
				if($resultado!=0) {
				foreach($resultado as $item){			
				?>
        
            
				<tr  style="font-size:11px" onMouseOver="this.style.backgroundColor='#00FF66';" onMouseOut="this.style.backgroundColor='#ffffff';">
					<td>
					  <div align="center"><?php echo $idequipo=$item["c_idequipo"];?></div></td>
					<td><div align="center"><?php echo $serie=$item["c_nserie"];?></div></td>
					<td align="center" ><a href="javascript:pon_prefijo('<?php echo $idequipo?>','<?php echo $serie?>')"><img src="../images/icon_accept.png" border="0" title="Seleccionar"></a></td>					
				</tr>
			<?php 
			}			
			}else{
				print "<script>mensaje()</script>";
			}
				
				 ?>				
						
		
  </table>
  </fieldset>
		
<iframe id="frame_datos" name="frame_datos" width="0%" height="0" frameborder="0">
	<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
</iframe>
<input type="hidden" id="accion" name="accion">

</form>
</div>
</body>
</html>
