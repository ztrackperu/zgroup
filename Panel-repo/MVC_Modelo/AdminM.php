<?php

//BUSCAR USUARIO



	function BusquedaUsuarioM($descripcion,$sw,$pag,$blahblah=true){
		require('cn/db_conexion.php');	
		
		
		if($sw=='1'){
			
			$sql="SELECT * FROM usuario u,rol r where r.idrol=u.idrol and estado='1' and udni  like '%$descripcion%' order by idUsuario asc";
			
			

}elseif($sw=='2'){
	$sql="SELECT * FROM usuario u,rol r where r.idrol=u.idrol and estado='1' and usuario  like '%$descripcion%' order by idUsuario asc";
	}else{
		
		$sql="SELECT * FROM usuario u,rol r where r.idrol=u.idrol and estado='1'  order by idUsuario asc";
		
		}
		include("paginator.inc.php");
		$cant=$_pagi_totalReg;
		$resultl=$_pagi_result;
			
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultl))
	{
	$ven[] = $fila;
	}
	//return $ven;
	if($blahblah === true) {
		  return $cant;
		}		 
		  return $ven;
}



function listarRolM(){
require('cn/db_conexion.php');
	$sql="SELECT * FROM rol  where estado_rol='1'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	
	
function guardarolM($nombre){
require('cn/db_conexion.php');
$sql="insert into rol(nombre,estado_rol) VALUES ('$nombre','1')";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}
	
	
function guardarusuarioM($udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol,$servicio,$login,$clave2,$clave3){
require('cn/db_conexion.php');
$sql="insert into usuario(udni,usuario,clave,paterno,materno,nombres,IdRol,estado,servicio,login,clave2,clave3)
values('$udni','$usuario','$clave','$paterno','$materno','$nombres','$IdRol','1','$servicio','$login','$clave2','$clave3');";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;
	
		
}

function listaactualizarusuM($id){
	require('cn/db_conexion.php');
	$sql="select * from usuario where idUsuario='$id'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	





function guardarupdateusuM($id,$udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol){
require('cn/db_conexion.php');
$sql="update usuario  set udni='$udni',usuario='$usuario',clave='$clave',paterno='$paterno',materno='$materno',nombres='$nombres',idRol='$IdRol' where idUsuario='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}
	function eliminarusuM($id){
require('cn/db_conexion.php');
$sql="update usuario  set estado='0' where idUsuario='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

//BUSCAR MENU






	function BusquedaMenuM($descripcion,$sw,$pag,$blahblah=true){
		require('cn/db_conexion.php');
		
//SELECT id, name, address FROM table ORDER BY id ASC $pages->limit
		if($sw=='1'){
			
			$sql="SELECT * from menu where activo='1' and idclave='1' and nombre  like '%$descripcion%'";				

}elseif($sw=='2'){
	$sql="SELECT * from menu where activo='1' and idclave='1' and Icono  like '%$descripcion%' ";	
	
	}else{		
		$sql="SELECT * from menu where activo='1' and idclave='1'";	
		
		}
		
	include("paginator.inc.php");
	$cant=$_pagi_totalReg;
	$resultl=$_pagi_result;
		
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error());
	

	while ($fila=mysqli_fetch_array($resultl))
	{
	$ven[] = $fila;
	}	
	//return $ven;
		 if($blahblah === true) {
		  return $cant;
		}		 
		  return $ven;
		 
}
	




function guardamenuM($Nombre,$Icono,$URL){
require('cn/db_conexion.php');
$sql="SELECT  MAX(IdMenu) as id  FROM menu";
$rs = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));

if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);
}

$nuevoid=$id+1;

$sql="insert into menu(IdMenu,Posicion,Nombre,IdPadre,Icono,URL,activo,idclave)
values($nuevoid,$nuevoid,'$Nombre',$nuevoid,'$Icono','$URL','1','1')";

$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;
	
		
}

function guardasubmenuM($Nombre,$IdPadre,$Icono,$URL){
require('cn/db_conexion.php');
$sql="SELECT  MAX(IdMenu) as id  FROM menu";
$rs = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));

if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);
}

$nuevoid=$id+1;

$sql="insert into menu(IdMenu,Posicion,Nombre,IdPadre,Icono,URL,activo,idclave)
values($nuevoid,$nuevoid,'$Nombre',$IdPadre,'$Icono','$URL','1','0')";

$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;
	
		
}

function listarMenuM(){
require('cn/db_conexion.php');
	$sql="SELECT * FROM menu  where Activo='1'";
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}	
return $ven;	
	}
	


function eliminarmenuM($id){
require('cn/db_conexion.php');
$sql="update menu  set Activo='0' where IdMenu='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

function listaactualizarmenuM($id){
	require('cn/db_conexion.php');
	$sql="select * from menu where idMenu='$id'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	


function guardarupdatemenuM($id,$Nombre,$IdPadre,$Icono,$URL){
require('cn/db_conexion.php');
$sql="update menu  set Nombre='$Nombre',IdPadre='$IdPadre',Icono='$Icono',URL='$URL' where IdMenu='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}


//BUSCAR MENUROL

/*
function BusquedaMenurolM($descripcion,$sw){
		require('cn/db_conexion.php');
		
		if($sw=='1'){
			
			$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and r.Nombre  like '%$descripcion%' and Activo='1' and estado_menurol='1' order by IdmenuRol asc";
			
			

}elseif($sw=='2'){
	$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and m.Nombre  like '%$descripcion%' and Activo='1' and 
 estado_menurol='1' order by IdmenuRol asc";
	}else{
		
		$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and Activo='1' and estado_menurol='1'  order by IdmenuRol asc";
		
		}
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}*/

function BusquedaMenurolM($descripcion,$pag,$blahblah=true){
		require('cn/db_conexion.php');
		
		if($descripcion!=""){
			
			$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and r.IdRol='$descripcion' and Activo='1' and estado_menurol='1' order by mr.IdMenuRol asc";
			
			
	}else{
		
		$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and Activo='1' and estado_menurol='1'  order by mr.IdMenuRol asc";
		
		
		}
		   include("paginator.inc.php");
		   $cant=$_pagi_totalReg;
		   $resultl=$_pagi_result;
		   
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultl))
	{
	$ven[] = $fila;
	}
	//return $ven;
	 if($blahblah === true) {
		  return $cant;
		}		 
		  return $ven;
}






function eliminarmenurolM($id){
require('cn/db_conexion.php');
$sql="update  menurol set estado_menurol='0' where IdMenuRol='$id'";
//$sql="delete from  menurol  where IdMenuRol='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

//BUSCAR MENU
	function BusquedaSubmenuM($descripcion,$sw,$id){
		require('cn/db_conexion.php');
		
		if($sw=='1'){
			
			$sql="SELECT * from menu where activo='1' and idclave='0' and  IdPadre='$id' and nombre  like '%$descripcion%'";	

}elseif($sw=='2'){
	$sql="SELECT * from menu where activo='1' and idclave='0' and  IdPadre='$id' and Icono  like '%$descripcion%' ";
	}else{
		
		$sql="SELECT * from menu where activo='1' and idclave='0' and  IdPadre='$id'";
		
		}
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
	
function listaactualizarrolM($id){
	require('cn/db_conexion.php');
	$sql="SELECT * FROM menurol mr,menu m,rol r where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and mr.IdMenuRol='$id'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}

	function guardarupdatemenurolM($IdRol,$IdMenu,$id){
require('cn/db_conexion.php');
$sql="update menurol  set IdRol='$IdRol',IdMenu='$IdMenu' where IdMenuRol='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

/*function verultimorolingresadoM(){
	require('cn/db_conexion.php');
	$sql="SELECT * FROM rol r  ORDER BY r.idRol DESC LIMIT 1  ";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}*/

function listarolM($id){
	require('cn/db_conexion.php');
	$sql="select * from rol where idRol='$id'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}
function buscarmenurolM($IdRol,$IdMenu){
require('cn/db_conexion.php');
$resultado1 = mysqli_query($conexion, "call usp_buscarMenurol('.$idRol.','.$idMenu.');")or die("Error: ".mysqli_error($conexion));
while ($fila=mysqli_fetch_array($resultado1))
	{
	$ven[] = $fila;
	}
	return $ven;
}


function guardarmenurolM($IdRol,$IdMenu){
require('cn/db_conexion.php');	
	$sql="insert into menurol(IdRol,IdMenu,estado_menurol) VALUES ($IdRol,$IdMenu,'1')";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	

}

function obtenerNombreRolM($IdRol){
	require('cn/db_conexion.php');
	$sql="select Nombre from rol where idRol='$IdRol'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}




function BusquedasiexisteMenuM($descripcion){
		require('cn/db_conexion.php');		
	
			
			$sql="SELECT m.Nombre,m.IdMenu FROM menurol mr,menu m,rol r
where mr.IdRol=r.IdRol and mr.IdMenu=m.IdMenu and r.IdRol='$descripcion' and Activo='1' and estado_menurol='1' order by IdmenuRol asc";
			
		
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}

//BUSCAR ACCESOS
	function BusquedaAccesoM($descripcion,$sw,$pag,$blahblah=true){
            $pag="";
		require('cn/db_conexion.php');
		
		if($sw=='1'){
			
			$sql="SELECT * FROM accesoip where estado='1' and local  like '%$descripcion%'  order by correlativo asc";	

}elseif($sw=='2'){
	$sql="SELECT * FROM accesoip where estado='1' and usuario  like '%$descripcion%'  order by correlativo asc";
	}else{
		
		$sql="SELECT * FROM accesoip where estado='1'  order by correlativo asc";
		
		}
		include("paginator.inc.php");
		$cant=$_pagi_totalReg;
		$resultl=$_pagi_result;
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultl))
	{
	$ven[] = $fila;
	}
	//return $ven;
	 if($blahblah === true) {
		  return $cant;
		}		 
		  return $ven;
}

function guardaraccesoM($local,$nombrepc,$usuario,$ippublica,$iplocal,$mac){
require('cn/db_conexion.php');
$sql="insert into accesoip(local,nombrepc,usuario,ippublica,iplocal,mac,estado)
values('$local','$nombrepc','$usuario','$ippublica','$iplocal','$mac','1');";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
		
}


function eliminaraccesoM($id){
require('cn/db_conexion.php');
$sql="update accesoip  set estado='0' where correlativo='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}

function listaactualizaraccesoM($id){
	require('cn/db_conexion.php');
	$sql="select * from accesoip where correlativo='$id'";
	
	$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	while ($fila=mysqli_fetch_array($resultado))
	{
	$ven[] = $fila;
	}
	return $ven;
}	

function guardarupdateaccesoM($id,$local,$nombrepc,$usuario,$ippublica,$iplocal,$mac){
require('cn/db_conexion.php');
$sql="update accesoip  set local='$local',nombrepc='$nombrepc',usuario='$usuario',ippublica='$ippublica',iplocal='$iplocal',mac='$mac' where correlativo='$id'";
$resultado = mysqli_query($conexion, $sql)or die("Error: ".mysqli_error($conexion));
	return $resultado;	
}


?>