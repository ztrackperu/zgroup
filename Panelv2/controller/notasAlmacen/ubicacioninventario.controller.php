<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/notasAlmacen/procesosubicacioninvM.php';

class UbicacioninventarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosubicacioninv();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
  	public function UbicacionInventario(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/adminUbicaciones.php';
		require 'view/principal/footer.php';
	}

	public function verHistorialUbicaciones(){
		$equipo=$_GET['equipo'];
		$serieant=$_GET['serieant'];
		$cod=$_GET['cod'];	  
		$reporte=$this->model->EquiposBuscarxHistorial($cod,$equipo,$serieant);		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/notasAlmacen/verHistorialUbicaciones.php';
		require_once 'view/principal/footer.php';
	}	
	
	function EquiposBuscarxZona(){
		$c_zona=$_REQUEST['c_zona'];
		$dni=$_REQUEST['dni'];
		$arrayCli=array(); 	  
		$data=$this->model->EquiposBuscarxZonaM($c_zona);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {									
			$c_idequipo=$data[$i]->c_idequipo;	
			$c_codprd=$data[$i]->c_codprd;	
			$IN_ARTI=$data[$i]->IN_ARTI;	
			$c_serieant=$data[$i]->c_serieant;	
			$c_codsit=$data[$i]->c_codsit;	
			$c_codsitalm=$data[$i]->c_codsitalm;	
			$categoria=$data[$i]->categoria;	
			$u_tipo_corte=$data[$i]->u_tipo_corte;	
			$u_maquina=$data[$i]->u_maquina;	
			$u_estado_maquina=$data[$i]->u_estado_maquina;	
			$u_destino=$data[$i]->u_destino;	
			$u_luminaria=$data[$i]->u_luminaria;	
			$u_cortinas=$data[$i]->u_cortinas;	
			$u_circulina=$data[$i]->u_circulina;	
			$des_ubicacion=$data[$i]->des_ubicacion;	
			$id_ubicacion=$data[$i]->id_ubicacion;	
			$zona_actual=$data[$i]->zona;	
			$cliente=$this->model->ObtenerClienteAlquilado($c_idequipo);
			$cliente_alquilado=$cliente->c_nomcli;
			$codigo_cliente_alquilado=$cliente->c_codcli;
			$btn_data_a = 'data-c_idequipo="'.$c_idequipo.'" data-c_codprd="'.$c_codprd.'"data-producto="'.$IN_ARTI.'" data-c_serieant="'.$c_serieant.'"data-c_codsit="'.$c_codsit.'"data-c_codsitalm="'.$c_codsitalm.'"data-categoria="'.$categoria.'"
									data-u_tipo_corte="'.$u_tipo_corte.'"data-u_maquina="'.$u_maquina.'"data-u_estado_maquina="'.$u_estado_maquina.'"data-u_destino="'.$u_destino.'"data-u_luminaria="'.$u_luminaria.'"data-u_cortinas="'.$u_cortinas.'"
									data-u_circulina="'.$u_circulina.'"data-des_ubicacion="'.$des_ubicacion.'"data-cliente="'.$cliente_alquilado.'"data-codigo_cliente_alquilado="'.$codigo_cliente_alquilado.'"data-id_ubicacion="'.$id_ubicacion.'"data-zona_actual="'.$zona_actual.'"';
			$btn_h='&udni='.$dni.'&mod=1&equipo='.$c_idequipo.'&serieant='.$c_serieant.'&cod='.$c_codprd.'';
			$btn_historial = '<a type="button" class="btn btn-primary btn-xs" href="?c=con3&a=verHistorialUbicaciones'.$btn_h.'" target="_black">Ver historial</a>';	
				if($data[$i]->c_codsit =='A' || $data[$i]->c_codsit =='V' || $data[$i]->c_codsit =='Z'){						
						$btn_actualizar ='<a href="#" class="btn btn-info btn-xs open_my_modal5" data-toggle="modal" data-target="#open_my_modal5" '.$btn_data_a.'>Actualizar</a>'.' '. '<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#open_my_modal4"'.$btn_data_a.'>Liberar Ubicacion</button>';						
						//$btn_actualizar2='<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="'.$IN_ARTI.'"'.$btn_data_a.'>Open modal for @mdo</button>';					
				}else{				
					$btn_actualizar = '<a href="#" class="btn btn-info btn-xs open_my_modal5" data-toggle="modal" data-target="#open_my_modal5" '.$btn_data_a.'>Actualizar</a>';
				}			
			$resultadodetallado = array();	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($c_idequipo));
			array_push($resultadodetallado, utf8_encode($IN_ARTI));
			array_push($resultadodetallado, utf8_encode($c_serieant));
			array_push($resultadodetallado, utf8_encode($c_codsit));
			array_push($resultadodetallado, utf8_encode($c_codsitalm));
			array_push($resultadodetallado, utf8_encode($categoria));
			array_push($resultadodetallado, utf8_encode($u_tipo_corte));
			array_push($resultadodetallado, utf8_encode($u_maquina));				
			array_push($resultadodetallado, utf8_encode($u_estado_maquina));
			array_push($resultadodetallado, utf8_encode($u_destino));
			array_push($resultadodetallado, utf8_encode($u_luminaria));
			array_push($resultadodetallado, utf8_encode($u_cortinas));										
			array_push($resultadodetallado, utf8_encode($u_circulina));										
			array_push($resultadodetallado, utf8_encode($des_ubicacion));																																			
			array_push($resultadodetallado, utf8_encode($btn_actualizar."".$btn_historial));																		
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
	
	function CargarUbicaciones(){
		$arrayCli=array(); 	  
		$data=$this->model->CargarUbicacionesM();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {									
			$zona=$data[$i]->zona;	
			$des_ubicacion=$data[$i]->des_ubicacion;	
			$estado_ubicacion=$data[$i]->estado_ubicacion;	
			if($estado_ubicacion=="0"){
				$estado='<span class="label label-success">Disponible</span>';
			}
			else{
				$estado='<span class="label label-danger">No Disponible</span>';
			}
			
			$resultadodetallado = array();	
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($zona));
			array_push($resultadodetallado, utf8_encode($des_ubicacion));
			array_push($resultadodetallado, utf8_encode($estado));																	
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }
	
		

	function ListarUbicacionesDisponiblesxZona(){
		header('Content-Type: application/json');
		$dctos = $this->maestro->ListarUbicacionesDisponiblesxZona($_POST['id']);
		print_r( json_encode ( $dctos ) );
	}
	
	
	function ActualizarUbicacion(){
		$ubicacion=new Procesosubicacioninv();		
		$ubicacion->c_idequipo=$_REQUEST['c_idequipo'];
		$ubicacion->c_codprd=$_REQUEST['c_codprd'];
		$ubicacion->c_serieant=$_REQUEST['c_serieant'];
		$ubicacion->c_codsit=$_REQUEST['c_codsit'];
		$ubicacion->c_codsitalm=$_REQUEST['c_codsitalm'];
		$ubicacion->categoria=$_REQUEST['categoria'];
		$ubicacion->u_tipo_corte=$_REQUEST['u_tipo_corte'];
		$ubicacion->u_maquina=$_REQUEST['u_maquina'];
		$ubicacion->u_estado_maquina=$_REQUEST['u_estado_maquina'];
		$ubicacion->u_destino=$_REQUEST['u_destino'];
		$ubicacion->u_luminaria=$_REQUEST['u_luminaria'];
		$ubicacion->u_cortinas=$_REQUEST['u_cortinas'];
		$ubicacion->u_circulina=$_REQUEST['u_circulina'];
		$ubicacion->id_ubicacion=$_REQUEST['id_ubicacion'];
		$ubicacion->producto=$_REQUEST['producto'];
		$ubicacion->des_ubicacion=$_REQUEST['des_ubicacion'];
		$ubicacion->c_ubicacion=$_REQUEST['c_ubicacion'];
		$ubicacion->c_ubicacion_cambiar=$_REQUEST['c_ubicacion_cambiar'];
		$ubicacion->motivo_cambio=$_REQUEST['motivo_cambio'];
		$ubicacion->c_zona_cambiar=$_REQUEST['c_zona_cambiar'];
		$ubicacion->c_zona_origen=$_REQUEST['zona_actual'];
		$ubicacion->fecha=date("d/m/Y H:i:s");		
		$des_ubicacion_cambiar=$this->model->ObtenerDesUbicacion($_REQUEST['c_ubicacion_cambiar']);
		$des_ubicacion_cam=$des_ubicacion_cambiar->des_ubicacion;
		$ubicacion->des_ubicacion_cambiar=$des_ubicacion_cam;
		
		$this->model->ActualizarUbicacionM($ubicacion);
		$this->model->LiberarUbicacionM($ubicacion);
		$this->model->LiberarUbicacion2M($ubicacion);
		$this->model->insertarHistorialUbicacionM($ubicacion);
	}
	
	function liberarUbicacionEquipoNoDisponible(){
		$ubicacion=new Procesosubicacioninv();		
		$ubicacion->c_idequipo=$_REQUEST['c_idequipo'];
		$ubicacion->c_codprd=$_REQUEST['c_codprd'];
		$ubicacion->c_serieant=$_REQUEST['c_serieant'];
		$ubicacion->c_codsit=$_REQUEST['c_codsit'];
		$ubicacion->c_codsitalm=$_REQUEST['c_codsitalm'];
		$ubicacion->categoria=$_REQUEST['categoria'];
		$ubicacion->u_tipo_corte=$_REQUEST['u_tipo_corte'];
		$ubicacion->u_maquina=$_REQUEST['u_maquina'];
		$ubicacion->u_estado_maquina=$_REQUEST['u_estado_maquina'];
		$ubicacion->u_destino=$_REQUEST['u_destino'];
		$ubicacion->u_luminaria=$_REQUEST['u_luminaria'];
		$ubicacion->u_cortinas=$_REQUEST['u_cortinas'];
		$ubicacion->u_circulina=$_REQUEST['u_circulina'];
		$ubicacion->id_ubicacion=$_REQUEST['id_ubicacion'];
		$ubicacion->producto=$_REQUEST['producto'];
		$ubicacion->des_ubicacion=$_REQUEST['des_ubicacion'];
		$ubicacion->c_ubicacion=$_REQUEST['c_ubicacion'];
		$ubicacion->c_ubicacion_cambiar=0;
		$ubicacion->motivo_cambio='EQUIPO CON ESTADO '.$_REQUEST['c_codsit'];
		$ubicacion->c_zona_cambiar='CLIENTE';
		$ubicacion->c_zona_origen=$_REQUEST['zona_actual'];
		$ubicacion->fecha=date("d/m/Y H:i:s");
		
		//$des_ubicacion_cambiar=$this->model->ObtenerDesUbicacion($_REQUEST['c_ubicacion_cambiar']);
		//$des_ubicacion_cam=$des_ubicacion_cambiar->des_ubicacion;
		$ubicacion->des_ubicacion_cambiar=$_REQUEST['codigo_cliente_alquilado']. " ". $_REQUEST['cliente_alquilado'];
		
		$this->model->ActualizarUbicacionM($ubicacion);
		$this->model->LiberarUbicacionM($ubicacion);
		$this->model->LiberarUbicacion2M($ubicacion);
		$this->model->insertarHistorialUbicacionM($ubicacion);
	}
	
	function registrarUbicacion(){
		
		$ubicacion=new Procesosubicacioninv();		
		$ubicacion->txtZona=strtoupper($_REQUEST['txtZona']);
		$ubicacion->txtUbicacion=strtoupper($_REQUEST['txtUbicacion']);
		$ubicacion->estado_ubicacion='0';
		
		$this->model->registrarUbicacionM($ubicacion);
	}
	

}