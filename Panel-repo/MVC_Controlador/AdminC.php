<?php
require("../MVC_Modelo/MaestrosM.php"); 
require("../MVC_Modelo/usuariosM.php"); 
require('../php/Funciones/Funciones.php');
require("../MVC_Modelo/AdminM.php"); 
if($_GET["acc"] == "verusuario") 
{    
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=!empty($_REQUEST['des'])?$_REQUEST['des']:"";
	$sw=$_REQUEST['sw'];
	$pag=!empty($_GET['pag'])?$_GET['pag']:"";	
	$resulos=BusquedaUsuarioM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaUsuarioM($descripcion,$sw,$pag);		
	//$resulos=BusquedaUsuarioM($descripcion,$sw,$pag);			
	//$totxlet1=pie($descripcion,$sw,$pag);	
include('../MVC_Vista/Admin/AdminUsuario.php');
}
if($_GET["acc"] == "nuevousuario") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Admin/RegistrarUsuario.php');
}
if($_GET["acc"] == "nuevorol") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Admin/RegistrarRol.php');
}
function listarRolC(){ return  listarRolM();}
if($_GET["acc"] == "guardarol") 
{	
$nombre=utf8_decode($_REQUEST["nombre"]);

guardarolC($nombre);
$mensaje="Rol ingresado";
print "<script>alert('$mensaje')</script>"; 	
	 $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['IdRol'];	
	$pag=$_GET['pag'];	 
	$resulos=BusquedaMenurolM($descripcion,$pag,"not true");
	$totxlet1=BusquedaMenurolM($descripcion,$pag);		
	include('../MVC_Vista/Admin/AdminMenuRol.php');
	
	//$resulos=verultimorolingresadoM();			
	//include('../MVC_Vista/Admin/AsignarRolalUsuario.php');

}
function guardarolC($nombre){$resultado=guardarolM($nombre);}


if($_GET["acc"] == "guardarusuario") 
{	
$udni=$_REQUEST["dni"];
$usuario=$_REQUEST["usuario"];
$clave=$_REQUEST["clave"];

$paterno=utf8_decode(strtoupper($_REQUEST["paterno"]));
$materno=utf8_decode(strtoupper($_REQUEST["materno"]));
$nombres=utf8_decode(strtoupper($_REQUEST["nombres"]));

$IdRol=$_REQUEST["IdRol"];


$servicio=utf8_decode(strtoupper($_REQUEST["servicio"]));
$login=utf8_decode(strtoupper($_REQUEST["login"]));
$clave2=$_REQUEST["clave2"];
$clave3=$_REQUEST["clave3"];

guardarusuarioC($udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol,$servicio,$login,$clave2,$clave3);
$mensaje="Usuario ingresado";
print "<script>alert('$mensaje')</script>";
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$pag=$_GET['pag'];		
	$resulos=BusquedaUsuarioM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaUsuarioM($descripcion,$sw,$pag);
	include('../MVC_Vista/Admin/AdminUsuario.php');

}

function guardarusuarioC($udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol,$servicio,$login,$clave2,$clave3){ $resultado=guardarusuarioM($udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol,$servicio,$login,$clave2,$clave3);}

if($_GET["acc"] == "updateusu") 
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$id=$_GET['id'];
	$resultado=listaactualizarusuM($id);
	include('../MVC_Vista/Admin/updateusu.php');
}


if($_GET["acc"] == "guardarupdateusu") // MOSTRAR: Formulario Actualizar OC
{	
	

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];

$udni=$_REQUEST["dni"];
$usuario=$_REQUEST["usuario"];
$clave=$_REQUEST["clave"];

$paterno=utf8_decode(strtoupper($_REQUEST["paterno"]));
$materno=utf8_decode(strtoupper($_REQUEST["materno"]));
$nombres=utf8_decode(strtoupper($_REQUEST["nombres"]));

$IdRol=$_REQUEST["IdRol"];


guardarupdateusuC($id,$udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol);
$mensaje="Usuario actualizado";
print "<script>alert('$mensaje')</script>";

	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$pag=$_GET['pag'];		
	$resulos=BusquedaUsuarioM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaUsuarioM($descripcion,$sw,$pag);
	include('../MVC_Vista/Admin/AdminUsuario.php');
	
}
function guardarupdateusuC($id,$udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol){ $resultado=guardarupdateusuM($id,$udni,$usuario,$clave,$paterno,$materno,$nombres,$IdRol);}



if($_GET["acc"] == "eliminarusu") 
{		

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];


eliminarusuC($id);
$mensaje="Usuario eliminado";
print "<script>alert('$mensaje')</script>";	
	
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$pag=$_GET['pag'];		
	$resulos=BusquedaUsuarioM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaUsuarioM($descripcion,$sw,$pag);
	include('../MVC_Vista/Admin/AdminUsuario.php');
	
}

function eliminarusuC($id){ $resultado=eliminarusuM($id);}



if($_GET["acc"] == "vermenu") 
{	

    $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=!empty($_REQUEST['des'])?$_REQUEST['des']:"";
	$sw=$_REQUEST['sw'];	
	$pag=!empty($_GET['pag'])?$_GET['pag']:"";	
	$resulos=BusquedaMenuM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaMenuM($descripcion,$sw,$pag);		
	//$totxlet1=pie($descripcion,$sw,$pag);	
	
	
	
include('../MVC_Vista/Admin/AdminMenu.php');

}

if($_GET["acc"] == "nuevomenu") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Admin/RegistrarMenu.php');

}

if($_GET["acc"] == "nuevosubmenu") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Admin/RegistrarSubmenu.php');

}


if($_GET["acc"] == "guardamenu") 
{	
	$Nombre=utf8_decode($_REQUEST["Nombre"]);
	//$IdPadre=$_REQUEST["IdPadre"];
	//$Icono=$_FILES["userfile"]["name"];
	$URL=$_REQUEST["URL"];
	

	$status = "";
	
	// obtenemos los datos del archivo
	$tmpName = $_FILES['userfile']['tmp_name'];
	$tamano = $_FILES["userfile"]['size'];
	$tipo = $_FILES["userfile"]['type'];
	$archivo = $_FILES["userfile"]['name'];
		
		// guardamos el archivo a la carpeta files
		$destino = "../images/".$archivo;
		if (copy($_FILES['userfile']['tmp_name'],$destino)) {		
		guardamenuC($Nombre,$destino,$URL);
		$mensaje="Menu ingresado";
		print "<script>alert('$mensaje')</script>";	
		
		$udni=$_GET['udni'];
		$resultado=Obtener_UsuarioM($udni);	
		$descripcion=$_REQUEST['des'];
		$sw=$_REQUEST['sw'];	
		$pag=$_GET['pag'];	
		$resulos=BusquedaMenuM($descripcion,$sw,$pag,"not true");		
		$totxlet1=BusquedaMenuM($descripcion,$sw,$pag);	
		
		include('../MVC_Vista/Admin/AdminMenu.php');
		
	}
}



function guardamenuC($Nombre,$Icono,$URL){$resultado=guardamenuM($Nombre,$Icono,$URL);}


if($_GET["acc"] == "guardasubmenu") 
{	
	$Nombre=utf8_decode($_REQUEST["Nombre"]);
	$IdPadre=$_REQUEST["IdPadre"];
	//$Icono=$_FILES["userfile"]["name"];
	$URL=$_REQUEST["URL"];
	

	$status = "";
	
	// obtenemos los datos del archivo
	$tmpName = $_FILES['userfile']['tmp_name'];
	$tamano = $_FILES["userfile"]['size'];
	$tipo = $_FILES["userfile"]['type'];
	$archivo = $_FILES["userfile"]['name'];


		
		// guardamos el archivo a la carpeta files
		$destino = "../images/".$archivo;
		//if (copy($_FILES['userfile']['tmp_name'],$destino)) {		
		guardasubmenuC($Nombre,$IdPadre,$destino,$URL);
		$mensaje="Sub-menu ingresado";
		print "<script>alert('$mensaje')</script>";
		$udni=$_GET['udni'];
		$resultado=Obtener_UsuarioM($udni);
		$descripcion=$_REQUEST['des'];	
		$sw=$_REQUEST['sw'];	
		$id=$_GET['id'];
		$resulos=BusquedaSubmenuM($descripcion,$sw,$id);
	
		include('../MVC_Vista/Admin/AdminSubmenu.php');
		
	//}
}



function guardasubmenuC($Nombre,$IdPadre,$Icono,$URL){$resultado=guardasubmenuM($Nombre,$IdPadre,$Icono,$URL);}

if($_GET["acc"] == "asignarMenu") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];	
	$resultado=Obtener_UsuarioM($udni);
	$IdRol= $_GET["IdRol"];
	$Nombre=obtenerNombreRolM($IdRol);
	$obtenerNombresMenu=BusquedasiexisteMenuM($IdRol);
	
	include('../MVC_Vista/Admin/AsignarMenu.php');

}
function listarMenuC(){ return listarMenuM(); }

if($_GET["acc"] == "guardarmenurol") 
{	
$IdRol=$_REQUEST["IdRol"];
$IdMenu=$_REQUEST["IdMenu"];

	$buscarmenurol=buscarmenurolC($IdRol,$IdMenu);
	if($buscarmenurol!=""){
	$mensaje="Rol y Menu ya asignados";
	print "<script>alert('$mensaje')</script>";
	//include('../MVC_Vista/Admin/AsignarRol.php');	
		
	}else{
	guardarmenurolC($IdRol,$IdMenu);
	$mensaje="Rol Asignado";
	print "<script>alert('$mensaje')</script>";
	//include('../MVC_Vista/Admin/AsignarRol.php');
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['IdRol'];	
	$pag=$_GET['pag'];	 
	$resulos=BusquedaMenurolM($descripcion,$pag,"not true");
	$totxlet1=BusquedaMenurolM($descripcion,$pag);		
	include('../MVC_Vista/Admin/AdminMenuRol.php');
	}
}
function guardarmenurolC($IdRol,$IdMenu){$resultado=guardarmenurolM($IdRol,$IdMenu);}

function buscarmenurolC($IdRol,$IdMenu){$resultado=buscarmenurolM($IdRol,$IdMenu);}

if($_GET["acc"] == "eliminarmenu") 
{		

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];


eliminarmenuC($id);
$mensaje="Menu eliminado";
print "<script>alert('$mensaje')</script>";		

	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];	
	$pag=$_GET['pag'];	
	$resulos=BusquedaMenuM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaMenuM($descripcion,$sw,$pag);	
	include('../MVC_Vista/Admin/AdminMenu.php');
}


if($_GET["acc"] == "eliminarsubmenu") 
{		

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];


eliminarmenuC($id);
$mensaje="Sub-menu eliminado";
print "<script>alert('$mensaje')</script>";		
	
	$udni=$_GET['udni'];	
	$descripcion=$_REQUEST['des'];	
	$sw=$_REQUEST['sw'];	
	$id=$_GET['idmenu'];
	$resulos=BusquedaSubmenuM($descripcion,$sw,$id);
	$resultado=Obtener_UsuarioM($udni);
	
	include('../MVC_Vista/Admin/AdminSubmenu.php');

}


function eliminarmenuC($id){ $resultado=eliminarmenuM($id);}



if($_GET["acc"] == "updatemenu") 
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$id=$_GET['id'];
	$resultado=listaactualizarmenuM($id);
	include('../MVC_Vista/Admin/updatemenu.php');
}
if($_GET["acc"] == "updatesubmenu") 
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$id=$_GET['id'];
	$resultado=listaactualizarmenuM($id);
	include('../MVC_Vista/Admin/updatesubmenu.php');
}

if($_GET["acc"] == "guardarupdatemenu") 
{
$id=$_GET['id'];
$Nombre=utf8_decode($_REQUEST["Nombre"]);
$IdPadre=$_REQUEST["IdPadre"];
$Icono=$_REQUEST["userfile"];
//$Icono=$_FILES["userfile"]["name"];
$URL=$_REQUEST["URL"];



guardarupdatemenuC($id,$Nombre,$IdPadre,$Icono,$URL);
$mensaje="Menu actualizado";
print "<script>alert('$mensaje')</script>";
	
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);	
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];	
	$pag=$_GET['pag'];	
	$resulos=BusquedaMenuM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaMenuM($descripcion,$sw,$pag);	
	
	include('../MVC_Vista/Admin/AdminMenu.php');
	
}

if($_GET["acc"] == "guardarupdatesubmenu") 
{	
	

$resultado1=Obtener_UsuarioM($udni);

$id=$_GET['id'];
$Nombre=utf8_decode($_REQUEST["Nombre"]);
$IdPadre=$_REQUEST["IdPadre"];
$Icono=$_REQUEST["userfile"];
//$Icono=$_FILES["userfile"]["name"];
$URL=$_REQUEST["URL"];



guardarupdatemenuC($id,$Nombre,$IdPadre,$Icono,$URL);
$mensaje="sub-menu actualizado";
print "<script>alert('$mensaje')</script>";

	$udni=$_GET['udni'];	
	$descripcion=$_REQUEST['des'];	
	$sw=$_REQUEST['sw'];	
	//$idmenu=$_GET['idmenu'];
	$resulos=BusquedaSubmenuM($descripcion,$sw,$IdPadre);
	$resultado=Obtener_UsuarioM($udni);
	
	include('../MVC_Vista/Admin/AdminSubmenu.php');
	
}

function guardarupdatemenuC($id,$Nombre,$IdPadre,$Icono,$URL){ $resultado=guardarupdatemenuM($id,$Nombre,$IdPadre,$Icono,$URL);}

if($_GET["acc"] == "verrol") 
{	
	//$idr=$_REQUEST['IdRol'];
    $udni=!empty($_GET['udni'])?$_REQUEST['sw']:"";
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=!empty($_REQUEST['IdRol'])?$_REQUEST['IdRol']:"";	
	$pag=!empty($_GET['pag'])?$_GET['pag']:"";	 
	$resulos=BusquedaMenurolM($descripcion,$pag,"not true");
	$totxlet1=BusquedaMenurolM($descripcion,$pag);	
	include('../MVC_Vista/Admin/AdminMenuRol.php');

}


if($_GET["acc"] == "eliminarmenurol") 
{		
$udni=$_GET['udni'];
$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];
eliminarmenurolC($id);
$mensaje="Asignacion del rol eliminado";
print "<script>alert('$mensaje')</script>";		
	
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['IdRol'];	
	$pag=$_GET['pag'];	 
	$resulos=BusquedaMenurolM($descripcion,$pag,"not true");
	$totxlet1=BusquedaMenurolM($descripcion,$pag);		
	include('../MVC_Vista/Admin/AdminMenuRol.php');

	
	
}

function eliminarmenurolC($id){ $resultado=eliminarmenurolM($id);}

if($_GET["acc"] == "versubmenu") 
{	

	$udni=$_GET['udni'];	
	$descripcion=!empty($_REQUEST['des'])?$_REQUEST['des']:"";	
	$sw=!empty($_REQUEST['sw'])?$_REQUEST['sw']:"";	
	$id=$_GET['id'];
	$resulos=BusquedaSubmenuM($descripcion,$sw,$id);
	$resultado=Obtener_UsuarioM($udni);
	
	include('../MVC_Vista/Admin/AdminSubmenu.php');

}

if($_GET["acc"] == "updateRol") 
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$id=$_GET['id'];
	$resultado=listaactualizarrolM($id);
	include('../MVC_Vista/Admin/updateRol.php');
}

if($_GET["acc"] == "guardarupdatemenurolM") 
{	
$IdRol=$_REQUEST["IdRol"];
$IdMenu=$_REQUEST["IdMenu"];
$id=$_GET["id"];
	if($IdRol!=0 && $IdMenu!=0){
	guardarupdatemenurolC($IdRol,$IdMenu,$id);
	$mensaje="Rol ingresado";
	print "<script>alert('$mensaje')</script>";
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaMenurolM($descripcion,$sw);
	$resultado=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/Admin/AdminRol.php');
	
	}else{
	$mensaje1="Falta seleccionar rol y/o menu";
	print "<script>alert('$mensaje1')</script>";
	include('../MVC_Vista/Admin/AsignarRol.php');	
	}
}

function guardarupdatemenurolC($IdRol,$IdMenu,$id){ $resultado=guardarupdatemenurolM($IdRol,$IdMenu,$id);}


if($_GET["acc"] == "eliminarSelMenurol")
{
	
for($i=1;$i<=500;$i++){

$idmr=$_REQUEST['re'.$i];

if($idmr != "")
		{
$arreglo [$i]=array('id1'=>$idmr);			

	
	}
	}
	
foreach($arreglo as $item){
	 $id=$item['id1'];
	 
	// echo $id;		
$b=eliminarmenurolC($id);
//MOSTRAR 
	 $udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	$descripcion=$_REQUEST['IdRol'];	
	$pag=$_GET['pag'];	 
	$resulos=BusquedaMenurolM($descripcion,$pag,"not true");
	$totxlet1=BusquedaMenurolM($descripcion,$pag);	
	
	}
	include('../MVC_Vista/Admin/AdminMenuRol.php');	
}





if($_GET["acc"] == "veracceso") 
{	

	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);

	$descripcion=!empty($_REQUEST['des'])?$_REQUEST['des']:"";
	$sw=$_REQUEST['sw'];
	
	//$resulos=BusquedaAccesoM($descripcion,$sw);
            $pag='';
        $resulos=BusquedaAccesoM($descripcion,$sw,$pag,"not true");		
	$totxlet1=BusquedaAccesoM($descripcion,$sw,$pag);	
	
	
include('../MVC_Vista/Admin/AdminAccesos.php');

}

if($_GET["acc"] == "nuevoacceso") // MOSTRAR: Formulario Nuevo usuario
{
	$udni=$_GET['udni'];
	$resultado=Obtener_UsuarioM($udni);
	include('../MVC_Vista/Admin/RegistrarAcceso.php');

}

if($_GET["acc"] == "guardaracceso") 
{
	
$local=utf8_decode(strtoupper($_REQUEST["local"]));	
$nombrepc=utf8_decode($_REQUEST["pc"]);
$usuario=utf8_decode($_REQUEST["usuario"]);

$ippublica=$_REQUEST["ippublica"];
$iplocal=$_REQUEST["iplocal"];
$mac=$_REQUEST["mac"];


guardaraccesoC($local,$nombrepc,$usuario,$ippublica,$iplocal,$mac);
$mensaje="Acceso ingresado";
print "<script>alert('$mensaje')</script>";
$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaAccesoM($descripcion,$sw);
	$resultado=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/Admin/AdminAccesos.php');

}

function guardaraccesoC($local,$nombrepc,$usuario,$ippublica,$iplocal,$mac){ $resultado=guardaraccesoM($local,$nombrepc,$usuario,$ippublica,$iplocal,$mac);
}

if($_GET["acc"] == "eliminaracceso") 
{		

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];
eliminaraccesoC($id);

$mensaje="Acceso eliminado";
print "<script>alert('$mensaje')</script>";	
	
	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaAccesoM($descripcion,$sw);
	$resultado=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/Admin/AdminAccesos.php');
	
}
function eliminaraccesoC($id){ $resultado=eliminaraccesoM($id);}




if($_GET["acc"] == "updateacceso") 
{	
	
	$udni=$_GET['udni'];
	$resultado1=Obtener_UsuarioM($udni);
	$id=$_GET['id'];
	$resultado=listaactualizaraccesoM($id);
	include('../MVC_Vista/Admin/updateAcceso.php');
}


if($_GET["acc"] == "guardarupdateacceso") 
{		

$resultado1=Obtener_UsuarioM($udni);
$id=$_GET['id'];

$local=utf8_decode(strtoupper($_REQUEST["local"]));	
$nombrepc=utf8_decode($_REQUEST["pc"]);
$usuario=utf8_decode($_REQUEST["usuario"]);

$ippublica=$_REQUEST["ippublica"];
$iplocal=$_REQUEST["iplocal"];
$mac=$_REQUEST["mac"];

guardarupdateaccesoC($id,$local,$nombrepc,$usuario,$ippublica,$iplocal,$mac);
$mensaje="Acceso actualizado";
print "<script>alert('$mensaje')</script>";

	$descripcion=$_REQUEST['des'];
	$sw=$_REQUEST['sw'];
	$resulos=BusquedaAccesoM($descripcion,$sw);
	$resultado=Obtener_UsuarioM($udni);	
	include('../MVC_Vista/Admin/AdminAccesos.php');
	
}

function guardarupdateaccesoC($id,$local,$nombrepc,$usuario,$ippublica,$iplocal,$mac){ $resultado=guardarupdateaccesoM($id,$local,$nombrepc,$usuario,$ippublica,$iplocal,$mac);}







?>