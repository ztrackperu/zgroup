<?php
//ini_set('error_reporting',0);//para xamp
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/admin/adminequipoM.php';

class adminequipoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new adminequipo();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
	public function adminequibloque(){		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/admin/AdminEquiposBloqueados.php';
		require_once 'view/principal/footer.php';
		
	}
	public function DesbloEqui(){
		$c_idequipo=$_REQUEST['c_idequipo'];
		$this->model->DesbloEqui($c_idequipo);
		//volver
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/admin/AdminEquiposBloqueados.php';
		require_once 'view/principal/footer.php';
	}
	
}