<?php
ini_set('memory_limit', '1024M');

//c=inv01
//ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
require_once 'model/Programacion/ProgramacionM.php';
class programacioncontroller{  
    private $model;
    public function __CONSTRUCT(){
        $this->model = new Programacion();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
    public function ListaEventos(){		
		//require 'view/principal/header.php';
		//require 'view/principal/principal.php';
		require 'view/Programacion/index.php';
		//require 'view/principal/footer.php';
    }
	
	  public function Eventos(){		
		//require 'view/principal/header.php';
//		require 'view/principal/principal.php';
		require 'view/Programacion/descripcion_evento.php';
	//	require 'view/principal/footer.php';
    }
	
	
}