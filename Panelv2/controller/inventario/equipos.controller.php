<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc
require_once 'model/inventario/maestrosinvM.php';
require_once 'model/equipos/equiposM.php';
require_once 'controller/utilitarios/basicos.controller.php';

class EquiposController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Equipos();
		$this->maestroinv = new Maestrosinv();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
	public function busquedaequipo(){		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/equipos/busquedaequipo.php';
		require 'view/principal/footer.php';
		
	}
	public function VerListadoequipos(){
		$serie=trim($_REQUEST['cadena1']);     
	    $ListarEquipos=$this->model->ListarEquiposSerie($serie);
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/equipos/updequipo.php';
		require 'view/principal/footer.php';
	}
	public function VerListadoEquiposPorNacionalizar(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
        require 'view/equipos/equiposPorRegularizar.php';
		require 'view/principal/footer.php';
	}
	public function equiposPorNacionalizar(){
		$params = (isset($_REQUEST['params'])?$_REQUEST['params']:[]);
		$equipos = $this->maestroinv->equiposPorNacionalizar($params);
		$equipos = BasicosController::array_utf8_encode($equipos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($equipos);
		}else{
			return $equipos;
		}
	}
	public function Editar(){
        //$alm = new Procesosinv();        
        if(isset($_REQUEST['id'])){
            $equi = $this->model->ObtenerDatosEquipo($_REQUEST['id']);			
        }
        $cod_tipo=$_GET['cod_tipo'];
        require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		$c='equi01';
        require_once 'view/inventario/equipo-editar.php';
		require_once 'view/principal/footer.php';       
    }
	
	public function GuardarUpdEquipo(){
		//echo 'hola';
        $alm = new Equipos();        
        
		///campos en comun
		 $alm->c_idequipo = $_REQUEST['c_idequipo']; //todos
		
		
		//luis
		
		$alm->c_nserie=$_REQUEST['c_nserie'];
		$alm->c_serieant=$_REQUEST['c_nseriex'];
		//$alm->c_idequipoNEW=$_REQUEST['valor'].'-'.$_REQUEST['c_nserie'];
		
		


		
	    $valor=$_REQUEST['valor']; //D,R,G,C,T
	   //echo  $alm->__SET('c_anno',$_REQUEST[$valor.'c_anno']);	
	   if($valor!='M'){	//TODOS MENOS MAQUINA REEFER	
			$alm->c_anno =  $_REQUEST[$valor.'c_anno'];//D,R,G,C,T	
			$alm->c_mes = $_REQUEST[$valor.'c_mes'];	//D,R,G,C,T	
			$alm->c_codcol = $_REQUEST[$valor.'c_codcol'];//D,R,G,C,T		
			$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];//D,R,G,C,T
		}	
		$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//D,R,G,C,T
	   
		$alm->c_tara = $_REQUEST[$valor.'c_tara'];//D,R,G,C,T
		$alm->c_peso = $_REQUEST[$valor.'c_peso'];//D,R,G,C,T
		$alm->c_codsit = $_REQUEST[$valor.'c_codsit'];//D,R,G,C,T
		$alm->c_codsitalm = $_REQUEST[$valor.'c_codsitalm'];//D,R,G,C,T
		$alm->c_nacional = $_REQUEST[$valor.'c_nacional'];//D,R,G,C,T
		$alm->c_refnaci = $_REQUEST[$valor.'c_refnaci'];//D,R,G,C,T
		$alm->c_fecnac = $_REQUEST[$valor.'c_fecnac'];//D,R,G,C,T
		
		
		if($valor=='D' || $valor=='R'){	//dry y reefer
	    	$alm->c_fabcaja = $_REQUEST[$valor.'c_fabcaja'];//D,R
			$alm->c_material = $_REQUEST[$valor.'c_material'];//D,R		
		}else{
			$alm->c_fabcaja = '';//D,R
			$alm->c_material = '';//D,R	
		}
		
		if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' || $valor=='K'){	
	    	$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//R,G,C,T			
		}else{
			$alm->c_cmodel = '';//R,G,C,T	
			}
		
		if($valor=='G' || $valor=='R'  || $valor=='T' || $valor=='K'){	    	
			$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//R,G,T
		}else{
			$alm->c_serieequipo ='';
		}
		
		if($valor=='G' || $valor=='T' || $valor=='K'){	    	
			$alm->c_seriemotor = $_REQUEST[$valor.'c_seriemotor'];//G,T
		}else{
			$alm->c_seriemotor ='';
			}
		if($valor=='C' || $valor=='G'|| $valor=='T' || $valor=='K'){	
	    	$alm->c_cfabri = $_REQUEST[$valor.'c_cfabri'];//G,C,T			
		}else{
			$alm->c_cfabri ='';
		}	
		
		if($valor=='R'){ //solo reefer
	   		$alm->c_canofab = $_REQUEST['c_canofab'];//R
			$alm->c_cmesfab = $_REQUEST['c_cmesfab'];//R			
			$alm->c_mcamaq = $_REQUEST['c_mcamaq'];//R				
			$alm->c_ccontrola = $_REQUEST['c_ccontrola'];//R
			$alm->c_tipgas = $_REQUEST['c_tipgas'];//R			
		}else{
			$alm->c_canofab = '';//R
			$alm->c_cmesfab = '';//R			
			$alm->c_mcamaq = '';//R				
			$alm->c_ccontrola = '';//R
			$alm->c_tipgas = '';//R			
		}
						
		if($valor=='C'){ //solo carreta    	
			$alm->c_tamCarreta = $_REQUEST['c_tamCarreta'];//C
			$alm->c_vin = $_REQUEST['c_vin'];//C
			$alm->c_nroejes = $_REQUEST['c_nroejes'];//C
		}else{
			$alm->c_tamCarreta = '';//C
			$alm->c_vin = '';//C
			$alm->c_nroejes = '';//C
		}
		 if($valor=='M'){ //solo maquina    
				$alm->c_canofab = $_REQUEST[$valor.'c_canofab'];//M
				$alm->c_cmesfab = $_REQUEST[$valor.'c_cmesfab'];//M			
				$alm->c_mcamaq = $_REQUEST[$valor.'c_mcamaq'];//M
				$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//M
				$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//M				
				$alm->c_ccontrola = $_REQUEST[$valor.'c_ccontrola'];//M
				$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//M //TODOS
				$alm->c_tipgas = $_REQUEST[$valor.'c_tipgas'];//M	
			}else{
				/*$alm->c_canofab = '';//M
				$alm->c_cmesfab = '';//M			
				$alm->c_mcamaq = '';//M
				$alm->c_cmodel = '';//M
				$alm->c_serieequipo = '';//M				
				$alm->c_ccontrola = '';//M
				$alm->c_procedencia = '';//M
				$alm->c_tipgas = '';//M*/
			}
		   $this->maestroinv->insertarEquipoModificadoM($_REQUEST['c_idequipo']);//REGISTRAR HISTORIAL EQUIPO		
           $this->model->ActualizarEquipo($alm) ; 
		//VOLVER    
        //header('Location: indexinv.php?c=inv01');	   		
		//require_once 'view/principal/header.php';
		//require_once 'view/principal/principal.php';
        //require_once 'view/equipos/busquedaequipo.php';
		//require_once 'view/principal/footer.php';			
    }
	
}