<?php
//ini_set('error_reporting',0);//para xamp

//session_start();
require('../MVC_Modelo/usuariosM.php');
require('../php/Funciones/Funciones.php');  


/*** ACCIONES ***/
  
  $user = !empty($_REQUEST['txtUsuario'])?$_REQUEST['txtUsuario']:"";
   $pwd = !empty($_REQUEST['txtClave'])?$_REQUEST['txtClave']:"";


if($_GET["acc"] == "login")
{
		$clave= !empty($_GET['cod'])?$_GET['cod']:"";
  		$ip  = $_SERVER['REMOTE_ADDR'];		
  		$mac =DireccionMAC($ip);
  		$xmac =strtoupper($mac);
  		$ext =substr($ip,0,3);
 		$zmac=str_replace("-",":",$xmac);
if($ext=='192'){
	$sw='0';
	$valor=$zmac;
	//$clave='0';
	}else{
	$sw='1';
	$valor=$ip;
	//$clave=$cla;
	}
 
//echo $sw; echo $valor; echo $clave;
if($clave==NULL){
   $validaacceso=ValidaM($sw,$valor);
}else{
	$validaacceso=Valida2M($clave);
	}
 	//$xx=$validaacceso;
 
	if($validaacceso != NULL){
         foreach($validaacceso as $item){
			 
			 $v=$item["nombrepc"];
		 }	
//					
}
 //echo $v;
 	if($v == NULL)  {  
	//include ("../MVC_Vista/Alert.php");
	include ("../MVC_Vista/Alert.php");
	//echo $v;
	}else{
	
	include ("../MVC_Vista/login/loginV.php");
	}				
}
if($_GET["acc"] == "validar"){
	$validar = Validar_UsuarioC($user, $pwd);
if($validar == NULL)
	{
		$mensaje = "Usuario y/o Contraseña no Coinside";
		/*echo  "<SCRIPT LANGUAGE='javascript'>location.href = '../index.php';</SCRIPT>";*/
		include ("../MVC_Vista/login/loginV.php");
		
	}
	else
	{
		foreach($validar as $item)
		{
			$estado = $item["estado"];
			$id = $item["IdUsuario"];
			$udni = $item["udni"];
			$mod=$item["clave2"];
		}
		if($estado == 1)
		{
			$usuario = Obtener_UsuarioC($udni);
			include("../MVC_Vista/inicio.php");		
		}
		else
		{
			$mensaje = "Usuario inactivo.";
			/*echo  "<SCRIPT LANGUAGE='javascript'>location.href = '../index.php';</SCRIPT>";*/
			include ("../MVC_Vista/login/loginV.php");
		}
	}
	
}

if($_GET["acc"] == "obtener")
{
	$usuario = Obtener_UsuarioC($_GET["udni"]);
}


// FUNCIONES/
function Validar_UsuarioC($user, $pwd)
{
	return Validar_UsuarioM($user, $pwd);	
}

function Obtener_UsuarioC($udni)
{
	return Obtener_UsuarioM($udni);	
}

function ValidaC($sw,$val)
{
	return ValidaM($sw,$val);	
}

?>