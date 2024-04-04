<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesosocM.php';

class ProcesosocController{   
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosoc();
		$this->maestroinv = new Maestrosinv();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }

    public static function array_utf8_encode($dat){
		if (is_string($dat))
			return utf8_encode($dat);
		if (!is_array($dat))
			return $dat;
		$ret = array();
		foreach ($dat as $i => $d)
			$ret[$i] = self::array_utf8_encode($d);
		return $ret;
	}
	public function CrearOrdenCompra(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/crearOc.php';
		require_once 'view/principal/footer.php';
    } 

	function Buscar_Proveedor(){   
		$descripcion=$_REQUEST["term"];  
		$arrayCli=array(); 
	  
	  $data=$this->maestro->BuscarProveedor($descripcion);
		for ($i=0; $i < count($data); $i++) { 	
			
			$resultadodetallado_json = array(
				'PR_RAZO'		 	  => $data[$i]->PR_RAZO,
				'PR_DECL'		 	  => $data[$i]->PR_DECL,
				'PR_NRUC'		 	  => $data[$i]->PR_NRUC,
				'PR_TELE'		 	  => $data[$i]->PR_TELE,
				'PR_RESP'		 	  => $data[$i]->PR_RESP,
				'PR_EMAI'		 	  => $data[$i]->PR_EMAI
			 );		
		
		 array_push($arrayCli, $resultadodetallado_json);	
		}
		 echo(json_encode($arrayCli)); 
    }
	function MostrarSimboloMoneda(){   
		$descripcion=$_REQUEST["Moneda"];  
		$data=$this->model->MonedaBuscarPorId($descripcion);
		echo $Simbolo=$data[0]->tm_simb;	
    }
	function BuscarProducto(){
    
		$descripcion=$_REQUEST["term"];  
		$arrayCli=array(); 
	  
		$data=$this->maestro->BuscarProducto_v($descripcion);
		for ($i=0; $i < count($data); $i++) { 	
			
			$resultadodetallado_json = array(
				'IN_CODI'		 	  => $data[$i]->IN_CODI,
				'IN_ARTI'		 	  => $data[$i]->IN_ARTI
			 );		
		
		 array_push($arrayCli, $resultadodetallado_json);	
		}
		 echo(json_encode($arrayCli)); 
    }

		
	

}


//FIN MATENIMIENTOS EQUIPOS