<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/procesosliquiM.php';

class ProcesosliquiController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosliqui();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
    
    public function Reportes(){
		if($_REQUEST['c_numped']!=""){
		$c_numped=$_REQUEST['c_numped'];
		}else{
		$c_numped=$_GET['ncoti'];	
			}
		$ListarDatosDetCoti=$this->model->ListarDatosDetCoti($c_numped);
		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/inventario/reporteliquidacion.php';
		require 'view/principal/footer.php';
    } 	
	
	public function verHistorialLiqui(){
		$c_numeir=$_REQUEST['c_numeir'];		
		require 'view/inventario/verHistorialLiquidacion.php';		
	}
	
	 public function ReportesTotalAsig(){
		//$c_numped=$_REQUEST['c_numped'];
		$ListarDatosDetAsig=$this->model->ListarDatosAsigTodos();		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/inventario/reporteliquidaciontotal.php';
		require 'view/principal/footer.php';
    } 
	
	public function ExportarExcelLiquidacion(){
		$name='RepLiquidacionAsignaciones';
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=$name.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			echo $_POST['datos_a_enviar'];
		//$ListarDatosDetAsig=$this->model->ListarDatosAsigTodos();
		//require 'view/inventario/reporteliquidaciontotal.php';
		//volver
		/*$ListarDatosDetAsig=$this->model->ListarDatosAsigTodos();		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/inventario/reporteliquidaciontotal.php';
		require 'view/principal/footer.php';*/
	}
	
}