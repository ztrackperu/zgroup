<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesosasigM.php';
require_once 'model/ventas/procesosvtaM.php"';
require_once 'model/inventario/procesoseirM.php';
require_once 'model/inventario/reporteinventarioM.php';

require_once 'model/facturadorelectronico/FacElecM.php';

require_once 'model/login/loginM.php';  

class PostVentaController{
	    
	public function __CONSTRUCT(){
		$this->login = new Login();
		$this->model = new Procesosasig();
		$this->maestrosinvM = new Maestrosinv();
		$this->model2=new Procesoseir();
		$this->model3=new Cotizaciones();
		$this->model4=new ReporteInventario();
		$this->model5 = new FacElectonica();
		$this->maestros = new Maestros();
	}
	
	public function Index(){
		require_once 'view/principal/headerInicio.php';
		require_once 'view/login/index.php';
		require_once 'view/principal/footer.php';	
	}

	/*** ACCIONES ***/ 	
	 //if($_GET["acc"] == "validar"){
	public function validar(){
		$user = $_REQUEST["usern"];
		$pwd = $_REQUEST["passwd"];
		//$validar = Validar_UsuarioC($user, $pwd);
		$validar=$this->login->Validar_UsuarioM($user, $pwd);

		if($validar == NULL){
			$mensaje = "Usuario y/o Contraseña no Coinside";
			print "<script>alert('$mensaje')</script>";
			//include ("../MVC_Vista/login/loginV.php");
			require_once 'view/principal/headerInicio.php';
			require_once 'view/login/index.php';
			require_once 'view/principal/footer.php';			
		}else{
			foreach($validar as $item){
				$estado = $item->estado;
				//$id = $item->IdUsuario;
				$udni = $item->udni;
				$modx=$item->clave2;
				$nomuser=$item->login;
				$fcampsw=$item->fcampsw;
				$fvctopsw=$item->fvctopsw;
			}
			if($estado == 1){	
				$udni=$udni;
				$zmod=$modx;	
				$name=$nomuser;
				if($fvctopsw<=date('Y-m-d')){ //&& $fvctopsw!=NULL
					include('view/principal/header.php');
					include('view/utilitarios/CambioPassword.php');
					include('view/principal/footer.php');						
				}else{
					include('view/principal/header.php');
					include('view/principal/frameprincipal.php');
					include('view/principal/footer.php');				 
				}
			}else{
				$mensaje = "Usuario inactivo.";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/login/index.php';
				require_once 'view/principal/footer.php';
			}
		}		
	}//fin function validar
	
	public function inicio(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/principal/notificaciones.php';
		
		if(($_REQUEST['udni']=='43377015') || ($_REQUEST['udni']=='45847891') || ($_REQUEST['udni']=='41753251') || ($_REQUEST['udni']=='46865470')|| ($_REQUEST['udni']=='47623322') ){
			
			
			//1: en caso la factura este anulada que se actualize x la reciente generado		
                               
           /* foreach($this->model3->ListarDataCronograma() as $itemcrono): 
                $xc_nroped=$itemcrono->c_nroped;
                $xn_idreg=$itemcrono->n_idreg;
                if($xc_nroped!=NULL){ // si el nro pedido es diferente a null
                    foreach($this->model3->ObtieneFacturaAnulada($xc_nroped) as $itemfac):
                        $zpe_ndoc=$itemfac->pe_ndoc;
                        $zc_nroped=$xc_nroped;//$itemcrono->c_nroped;
                        $upddetfaccrono = new Cotizaciones();

                        $upddetfaccrono->c_swcob='0';
                        $upddetfaccrono->c_nrofac=NULL;
                        $upddetfaccrono->c_nroped=$zc_nroped;
                        $this->model3->UpdFacDetCronograma($upddetfaccrono);
                    endforeach;
                }
            endforeach;
        
        // 2.- EN CASO LA FACTURA SE ENCUENTRE ACTIVA
       
            foreach($this->model3->ListarDataCronograma() as $itemcrono): 
                $yc_nroped=$itemcrono->c_nroped;
                $yn_idreg=$itemcrono->n_idreg;
                if($yc_nroped!=NULL){
                    foreach($this->model3->ObtieneFacturavalida($yc_nroped) as $itemfacv):
                        $ype_ndoc=$itemfacv->pe_ndoc;
                        $yc_nroped=$itemcrono->c_nroped;
                        $updcobrodetfaccrono = new Cotizaciones();

                        $updcobrodetfaccrono->c_swcob='1';
                        $updcobrodetfaccrono->c_nrofac=$ype_ndoc;
                        $updcobrodetfaccrono->c_nroped=$yc_nroped;
                        $this->model3->UpdCobroFacDetCronograma($updcobrodetfaccrono);
                    endforeach;
                }
            endforeach;*/
    	
			
			
			
			
			require_once 'view/facturadorelectronico/CronogramaVcto.php';
		}
		
		
		if(isset($_REQUEST['udni']) && ($_REQUEST['udni']=='41753251' || $_REQUEST['udni']=='43377015')){
			$equipos_x_regularizar = $this->maestrosinvM->equiposPorNacionalizar();
			if(!$equipos_x_regularizar['error'] && !empty($equipos_x_regularizar['data'])){
			 	$equipos_x_regularizar = count($equipos_x_regularizar['data']);
				require_once 'view/utilitarios/notificacionEquiposPorRegularizar.php';
			}
		}
		require_once 'view/principal/footer.php';	
	}
		public function Alertas(){
			echo 'hola';
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/principal/cargarnotificaciones.php';
		if(isset($_REQUEST['udni']) && ($_REQUEST['udni']=='41753251' || $_REQUEST['udni']=='43377015')){
			$equipos_x_regularizar = $this->maestrosinvM->equiposPorNacionalizar();
			if(!$equipos_x_regularizar['error'] && !empty($equipos_x_regularizar['data'])){
			 	$equipos_x_regularizar = count($equipos_x_regularizar['data']);
				require_once 'view/utilitarios/notificacionEquiposPorRegularizar.php';
			}
		}
		require_once 'view/principal/footer.php';	
	}
	/*public function ValidaC($sw,$val)
	{
		//return ValidaM($sw,$val);			
		return $this->login->ValidaM($sw,$val);			
	}*/	
	
	public function VerPasswordExcel(){
		$usern=$_REQUEST['usern'];
		$ListarDatosUsuario=$this->login->ListarDatosUsuario($usern);		
		require 'view/principal/header.php';
		//require 'view/principal/principal.php';
		require 'view/login/VerPasswordExcel.php';
		require 'view/principal/footer.php';
	}
	
	/*public function VerPasswordExportarExcel(){
		$name='PasswordUsuario';
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=$name.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $_POST['datos_a_enviar'];
	}*/	
	public function consultarUsuario(){
		$params = (isset($_REQUEST['params'])?$_REQUEST['params']:[]);
		$modulos = $this->login->consultarUsuario($params);
		// $modulos = $this->array_utf8_encode($modulos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($modulos);
		}else{
			return $modulos;
		}
	}
	
	public function CotPreAprobadas(){   
		$annio=$_REQUEST['anio'];    
		$arrayCli=array(); 
	  
	  $data=$this->maestros->ListarCotPreAprobadas($annio);
		echo(json_encode($data)); 
    }
	public function CotPreAprobadasxUsuario(){   
		$annio=$_REQUEST['anio'];    
		$login=$_REQUEST['login'];    
		
		$arrayCli=array(); 
	  
	  $data=$this->maestros->ListarCotPreAprobadasxUsuario($annio,$login);
		echo(json_encode($data)); 
    }
}

?>