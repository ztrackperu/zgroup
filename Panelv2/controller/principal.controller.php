<?php 
ini_set('error_reporting',0);//para xamp
class PrincipalController{
    
    private $model;
    
    public function __CONSTRUCT(){
     session_start();
    }
    
    public function Index(){
	//echo	$c2=$_POST["usern"];
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';		
		require_once 'view/principal/footer.php';
        
    }
}


  ?>