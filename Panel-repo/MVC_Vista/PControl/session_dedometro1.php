<?php
//  include ("../modulos/session/mysql_session.php");
	
  function mysql_session_inicia($valida = false, $usuario = "null")
  {
		session_set_save_handler("mysql_session_abrir", "mysql_session_cerrar", 
                             "mysql_session_leer", "mysql_session_escribir", 
                             "mysql_session_destruir","mysql_session_limpiar");
    session_start();	
		mysql_session_limpiar();
		
		if ($valida == true)
		{
				$id_session = mysql_session_lee_data("id_session");
				
				if ($id_session == session_id())
				{
				    if ($usuario != "null")
						{
								$usuario_data = mysql_session_lee_data("usuario");
        				
        				if ($usuario_data == "" || $usuario_data != $usuario)
        				{
        						mysql_session_destruir(session_id());
    								return 0;
        				}
						}
				}
				else
				{
				   mysql_session_destruir(session_id());
				   return 0;
				}
		}
		else
		   mysql_session_inserta_data("id_session",session_id());
			 
		return 1;
  }

  function valida_session($inicia_session)
	{
		 
		 if ($inicia_session == 0)
		 {
		     $mensaje = "Lo siento, no existe un sesi� v�ida,<br>".
				            "No ha iniciado una sesi� o su sesi� ya expir�!!!";
		     ?>
    		 <script type="text/javascript">
				    if (parent.mainframe)
				        parent.mainframe.location = "portada.php?mensaje=<?php echo $mensaje ?>";
         </script>
				 
				 <br><br>
				 <center>
				   <?php echo $mensaje ?>
					 <br><br>
					 <a href="index.htm">Iniciar Sesi�</a>
				 </center>	 
				<?php
				
				exit();  
		 }
	}
?>
