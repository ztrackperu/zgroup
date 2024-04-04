<?php
ini_set('error_reporting',0);//para xamp
require_once 'model/database.php';

$controller = 'principal';
//$c1=$c1;
// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
	//echo $c1=$_REQUEST["usern"];
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
?>