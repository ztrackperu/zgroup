<?php 
require('cn/db_conexionhosting.php');
function ListaContactoM(){
		
	$sql="select * from Contacto  where c_estado='0' order by id desc";
	$resultado = mysql_query($sql);
	while ($fila=mysql_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
}
function UpdateContacto($id){
	require('cn/db_conexionhosting.php');	
		$sql="update Contacto set c_estado='2' where id=$id ";
		$resultado = mysql_query($sql)or die(exit("Error en odbc_exec()<br>$sql"));		
		return $resultado;
	}
function RegistroContactoweb($c_empresa,$c_nombre,$c_fono,$c_email,$c_ruc,$c_producto,$c_consulta,$c_estado,$fecsol,$c_derivado,
$c_usrderivo,
$c_fecderiva,
$c_usrderiva){
	include('cn/dbconex.php');		
		$sql="insert into Contactoweb (c_empresa,c_nombre,c_fono,c_email,c_ruc,c_producto,c_consulta,c_estado,c_fecsol,c_derivado,c_usrderivo,c_fecderiva,c_usrderiva)values ('$c_empresa','$c_nombre','$c_fono','$c_email','$c_ruc','$c_producto','$c_consulta','$c_estado','$fecsol','$c_derivado','$c_usrderivo','$c_fecderiva','$c_usrderiva') ";
		$resultado = odbc_exec($cid, $sql)or die(exit("Error en odbc_exec()<br>$sql"));		
		return $resultado;
	
	}
function ListaDerivacionesM(){
		include('cn/dbconex.php');	
	$sql="select * from Contactoweb  where c_estado='2' order by id desc";
$resultado = odbc_exec($cid, $sql)or die("Error: ".odbc_error($cid));
	while ($fila=odbc_fetch_array($resultado)){$ven[] = $fila;}	return $ven;
}

?>