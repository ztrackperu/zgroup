<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php'; //usuario reg,upd,elim,etc  

require_once 'model/utilitarios/utilitariosM.php';

class UtilitariosController {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Utilitarios();
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
    public function CambioPassword() {
        require 'view/principal/header.php';
        require 'view/principal/principal.php';
        require 'view/utilitarios/CambioPassword.php';
        require 'view/principal/footer.php';
    }   	

    public function actpass() {
        $dniusuario=$_REQUEST['textfield'];
		$clave=$_REQUEST['textfield2'];
		$pass=$_REQUEST['textfield3'];		
		$valida=$this->model->ObtenerUsuarioM($dniusuario,$clave);
	
		if($valida!=NULL){
			$fcampsw=date('Y-m-d');
			$nuevafecha = strtotime ( '+3 month' , strtotime ( $fcampsw ) ) ;
			$fvctopsw=date ( 'Y-m-d' , $nuevafecha );
			$this->model->UpdateUsuarioM($dniusuario,$pass,$fvctopsw,$fcampsw);
			$mensaje="Contraseña Actualizada";
			print "<script>alert('$mensaje')</script>";	
			require 'view/principal/salir.php';
		}else{
			 $mensaje="Dni y/o Clave anterior No es Correcto";
	  		 print "<script>alert('$mensaje')</script>";
			 require 'view/principal/header.php';
			 require 'view/principal/principal.php';
			 require 'view/utilitarios/CambioPassword.php';
			 require 'view/principal/footer.php';
		}       
    }
		public function adminUsers(){
		$controladores = $this->model->getControllers();
		if(!$controladores){
			$controladores = array();
		}
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/utilitarios/AdminModulos.php';
		require 'view/principal/footer.php';
			
	}
	public function adminControllers(){
		$controladores = $this->model->getControllers();
		if(!$controladores){
			$controladores = array();
		}
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/utilitarios/AdminUsuarios.php';
		//require 'view/utilitarios/AdminModulos.php';
		require 'view/principal/footer.php';
		
	}
	public function consultarModulos(){
		$params = (isset($_REQUEST['params'])?$_REQUEST['params']:[]);
		$modulos = $this->model->consultarModulos($params);
		$modulos = $this->array_utf8_encode($modulos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($modulos);
		}else{
			return $modulos;
		}
	}
	public function consultarModulosUsuario(){
		$params = (isset($_REQUEST['params'])?$_REQUEST['params']:[]);
		$modulos = $this->model->consultarModulosUsuario($params);
		$modulos = $this->array_utf8_encode($modulos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($modulos);
		}else{
			return $modulos;
		}
	}
	public function cambiarEstadoModuloUsuario(){
		$params = (isset($_REQUEST['params'])?$_REQUEST['params']:[]);
		if($params['estado'] == 'true'){
			$resultado = $this->model->agregarModuloUsuario($params); 
		}else{
			$resultado = $this->model->borrarModuloUsuario($params); 
		}
		$resultado = $this->array_utf8_encode($resultado); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($resultado);
		}else{
			return $resultado;
		}
	}
	public function guardarModulo(){
		$error = true;
		$msg = '';
		$data = $_POST['data'];
		if(!empty($data)){
			if($data['padre'] == 'Seleccione'){
				$data['padre'] = 'NULL';
			}
			$return = $this->model->guardarModulo($data);
		}else{
			$msg = "Ingresar datos de modulo";
			$return = array('error'=>$error,'msg'=>$msg, 'data' => $data);
		}
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($return);
		}else{
			return $return;
		}
	}
	public function editarModulo(){
		$error = true;
		$msg = '';
		$data = $_POST['data'];
		if(!empty($data)){
			if($data['edit_padre'] == 'Seleccione'){
				$data['edit_padre'] = 'NULL';
			}
			$return = $this->model->editarModulo($data);
		}else{
			$msg = "Ingresar datos de modulo";
			$return = array('error'=>$error,'msg'=>$msg, 'data' => $data);
		}
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($return);
		}else{
			return $return;
		}
	}
}
