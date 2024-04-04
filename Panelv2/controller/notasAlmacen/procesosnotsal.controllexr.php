<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/notasAlmacen/procesosnotsalM.php';

class ProcesosnotsalController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosnotsal();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
    
    public function Registrar(){		
		//require 'view/principal/header.php';
		//require 'view/principal/principal.php';
		require 'view/notasAlmacen/regnotasalida.php';
	//	require 'view/principal/footer.php';
    } 	
	

	
	
}