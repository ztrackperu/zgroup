<?php
class Database
{
    public static function Conectar()
    {
        //$pdo = new PDO('mysql:host=localhost;dbname=colegio;charset=utf8', 'root', '');
       // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	    //  $db = 'D:\Aplicaciones\DBZ\DBZ.mdb';
		$db = 'D:\Aplicaciones\DBZ\DBZ.mdb';	
		$pdo = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)};DBQ=$db;Uid='';Pwd=CIAD876");	
		
        return $pdo;
    }
	
	
	public static function ConectarSql()
    {	   
        $pdo = new PDO("mssql:host=SZGROUP;dbname=bdpscargo", "sa_zgroup", "123456");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
        return $pdo;
    }
	
}
