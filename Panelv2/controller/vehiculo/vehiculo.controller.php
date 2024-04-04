<?php 
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/vehiculo/vehiculoM.php';

  class VehiculoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesostransporte();	
		$this->maestro = new Maestros();		
		$this->login = new Login();	
    }
	
	public function RegVehiculo() 
    {
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/vehiculo/regvehiculo.php';
		require_once 'view/principal/footer.php';
		
    } 
	
	
}

?>

