<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/reporteinventarioM.php';
require_once 'model/inventario/procesosliquiM.php';

class reporteinventariodisponiblesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new ReporteInventario();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
	
	public function ProductosDetalladosDisponibles(){
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/reporteprodetalladosdispo.php';
		require_once 'view/principal/footer.php';
		
	}

	public function ProductoDetalladoDisponible()
    {		
		$i=1;
        $data=$this->model->BuscarProductoTodos();
		//producto		
		if(count($data)>0){
				for ($i=0; $i < count($data); $i++) {
					$resultadodetallado = array();						
					$udni=$_REQUEST["dni"];			
					//cantidad producto disponible
						$ObtenerCantidadProdDispo=$this->model->ObtenerCantidadProdSitMDTodos($data[$i]->IN_CODI,'D');
						$cantidadD=$ObtenerCantidadProdDispo->cantidad;				
					//$linkD ='indexinv.php?c=rep01&a=verdetsitequi&mod=1&udni='.$udni.'&IN_CODI='.$data[$i]->IN_CODI.'&sit=D';
					//$linkDf = '<a href="'.$linkD.'"  title="Cantidad Disponible" target="_blank">'.$cantidadD.'</a>';
			
					//link2 = '<a href="#" class="btn btn-info btn-xs open_my_modal2" data-id="'+element.c_idequipo+'" data-ref="'+element.c_fisico2+'" data-pti="'+element.pti+'"data-c_codalm="'+element.c_codalm+'"data-tipo="'+element.tipo+'"data-c_codmar="'+element.c_codmar+'"data-c_anno="'+element.c_anno+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
					array_push($resultadodetallado, utf8_encode($i+1));
					array_push($resultadodetallado, utf8_encode($data[$i]->IN_CODI));
					array_push($resultadodetallado, utf8_encode($data[$i]->IN_ARTI));
					array_push($resultadodetallado, utf8_encode($cantidadD));//											
					$arrayCli['data'][] = $resultadodetallado;			
				}
		echo(json_encode($arrayCli)); 		
		}else{
			  $arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
		}
  
    }

}