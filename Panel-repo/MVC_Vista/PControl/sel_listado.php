<?php
  include ("session_dedometro.php");
 

	//$inicia_session = mysql_session_inicia(true);
?>	

<html>
<head>
<title>Untitled</title>
</head>
<body bgcolor="#FFFFFF">

<?php 
  //valida_session($inicia_session);

  include ("fechas/fecha.php");
	
  include("conexion.php");
  $conexion= conectarBD();
  
  list($dia,$mes,$ano) = explode("-",date("d-m-Y"));

?>
	 <center>
	 <h2>Asistencia Diaria</h2>
	 </center>
	 <br>
	 
   <form action="asisthoy.php" method="get" name="sel_listado">
		 <input type = "hidden" name = "fecha" value = "<?php echo date("Y-m-d"); ?>">
		 <table align="center">
	   <tr>
		 		  <td>
				    <strong>Dependencia : </strong>
				 </td>	
				  <td>
  				 <select name="dependencia" style = "width: 400px">
  				 <option value = "">Todos</option>
    				 <?php
    				    // consultar la base de datos
								// hacer el select
    						// recorrer el select
    						// crear el combo con los option ..
    						// ver asistencia ...  campo de dependencia ..*/
								
								$consulta= "SELECT * FROM dependencia order by nombre";
						    $resultado= mysql_query($consulta);
						    echo mysql_error();
						
				        while($arr_asoc = mysql_fetch_array($resultado))
				        {
				 		      $codigo= $arr_asoc['cod_dependencia'];
						      $selected="";		
						      if ($codigo == $depen)
						 			    $selected="selected";			
								 
  								$nombre= $arr_asoc['nombre'];
  								 
  								echo "<option value=\"$codigo\" $selected>$nombre</option>";					
						   }
    				 ?>
  		     </select>
				 </td>
		 <tr>
		    <td>
			     <font><strong>Fecha : </strong></font>
			  </td>
			   <td>
    		  <?php
    			  	LeeFecha("dia","mes","ano",$dia,$mes,$ano);
      		?>
	  	  </td>
		 <tr>
			   <td>
				    <font><strong>Tipo de Personal : </strong></font>
				</td>
		     <td>
      		 <select name = "tipo_pers">
      	   <option value = "">Todos</option>
      	   <option value = "P">Nombrado</option>
      	   <option value = "B">Contratado</option>
      	   </select> 
			  </td>
		 </tr>
		 </table>
		 
		<br><br>
		<center>
		<input type="submit" name = "Consultar" value = "Consultar">
		<input type="reset" name = "Limpiar" value = "Limpiar">
		
  </form>
</body>
</html>
