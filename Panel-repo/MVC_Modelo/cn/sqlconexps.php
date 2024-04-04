<?php
 try {
	   $serverName = "192.168.0.5";

	   
	   $uid = "sa_zgroup";
       $pwd = "123456";
	   
       $database = "bdpscargo";
	   $conn = new PDO("sqlsrv:server=$serverName;database=$database", $uid, $pwd);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
       $conn->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY , true);
         }
		  
	  catch (PDOException $e) {
		 echo "Error de Conexion:".$e->getMEssage();
		 exit();
	  }
?>