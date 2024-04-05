<?php

$defconexion = true;  

function conectarBD()
{
   $host_conexion="localhost:33066";
   $login_conexion="root";
   $passwd_conexion="1234";
   $db_conexion="bdventas";
   
   $conex = mysql_connect($host_conexion,$login_conexion,$passwd_conexion);
   echo mysql_error();
	 
   mysql_select_db($db_conexion);
	 echo mysql_error();
	 
   return $conex;
}


?>
												
