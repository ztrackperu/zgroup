<?php
class Database{
    public static function Conectar(){
        //$pdo = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '');
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		/*
		Desde Host
		$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
		Servidor local
		$db = 'D:\DBZPRUEBAv2\DBZPRUEBA.mdb';
		*/
		try {
			$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
			$pdo = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)};DBQ=$db;Uid='';Pwd=CIAD876");
			return $pdo;
		} catch (PDOException $e) {
			echo 'SQL Connection failed: ' . $e->getMessage();
		}		
    }
	
	public static function ConectarPruebas(){
		$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
		$pdo = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)};DBQ=$db;Uid='';Pwd=CIAD876");	
        return $pdo;
    }
			
    public static function ConectarSql(){
		//$pdo = new PDO("mssql:host=SZGROUP;dbname=bdpscargo", "sa_zgroup", "123456"); //servidor	   
     	//   $pdo = new PDO("odbc:host=SZGROUP;dbname=bdpscargo", "sa_zgroup", "123456"); //prueba		
       	// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
        //return $pdo;		
		try {	   
			$serverName = "192.168.0.5";
			$uid = 'sa_zgroup';
			$pwd = '123456';
			$database = "bdpscargo";
			$pdo = new PDO("sqlsrv:server=$serverName;database=$database", $uid, $pwd);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$pdo->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY , true);
	   		return $pdo;
		}catch (PDOException $e) {
		 	echo "Error de Conexion:".$e->getMEssage();
		 	exit();
	  	}		
    }
	
	public static function ConectarMySQL(){	   
        $pdo = new PDO('mysql:host=localhost;dbname=zgroup;charset=utf8', 'root', ''); //servidor
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, PDO::ERRMODE_EXCEPTION);		
        return $pdo;
    }
}