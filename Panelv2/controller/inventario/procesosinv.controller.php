<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesosinvM.php';

class ProcesosinvController{
    
    private $model;
    
    public function __CONSTRUCT(){
		session_start();
        $this->model = new Procesosinv();
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
	public function consultarTodosEquipos(){
		
		$combo=$_REQUEST['v'];
		$equipos = $this->model->consultarTodosEquipos($combo);
		$equipos = $this->array_utf8_encode($equipos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($equipos);
		}else{
			return $equipos;
		}
	}
	public function RegistrarAlmacenaje(){
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/inventario/regAlmacenaje.php';
        require_once 'view/principal/footer.php';	
    }
	 public function GuardarAlmacenaje(){
        $data = new Maestrosinv();
        $xf=$_REQUEST['txtFecha'];
		$variable = explode ('/',$xf); //división de la fecha utilizando el separador -
        //$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		$data->txtFecha= $variable [1].'/'.$variable [0].'/'.$variable [2];
		
        $data->cboTecnicos=$_REQUEST['cboTecnicos'];
        $data->txtCodigoE=$_REQUEST['txtCodigoE'];
        $data->txtCodigoM=$_REQUEST['txtCodigoM'];
        $data->txtTs2=$_REQUEST['txtTs2'];
        $data->txtTs6=$_REQUEST['txtTs6'];
        $data->txtTs10=$_REQUEST['txtTs10'];
        $data->txtTs14=$_REQUEST['txtTs14'];
        $data->txtTs18=$_REQUEST['txtTs18'];
        $data->txtTs22=$_REQUEST['txtTs22'];
        $data->txtR2=$_REQUEST['txtR2'];
        $data->txtR6=$_REQUEST['txtR6'];
        $data->txtR10=$_REQUEST['txtR10'];
        $data->txtR14=$_REQUEST['txtR14'];
        $data->txtR18=$_REQUEST['txtR18'];
        $data->txtR22=$_REQUEST['txtR22'];

        $this->model->GuardarAlmacenaje($data);
    }
	
	public function VerAlmacenaje2()
    {		
        $data=$this->model->VerAlmacenaje();
		if(count($data)>0){
			//ECHO $cant=count($data);
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();	
			
			//link2 = '<a href="#" class="btn btn-info btn-xs open_my_modal2" data-id="'+element.c_idequipo+'" data-ref="'+element.c_fisico2+'" data-pti="'+element.pti+'"data-c_codalm="'+element.c_codalm+'"data-tipo="'+element.tipo+'"data-c_codmar="'+element.c_codmar+'"data-c_anno="'+element.c_anno+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			array_push($resultadodetallado, utf8_encode($data[$i]->fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->tecnico));
			array_push($resultadodetallado, utf8_encode($data[$i]->cod_equipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->cod_maquina));
			array_push($resultadodetallado, utf8_encode($data[$i]->sup2));														
			array_push($resultadodetallado, utf8_encode($data[$i]->ret2));					
			array_push($resultadodetallado, utf8_encode($data[$i]->sup6));					
			array_push($resultadodetallado, utf8_encode($data[$i]->ret6));					
			array_push($resultadodetallado, utf8_encode($data[$i]->sup10));								
			array_push($resultadodetallado, utf8_encode($data[$i]->ret10));
			array_push($resultadodetallado, utf8_encode($data[$i]->sup14));	
			array_push($resultadodetallado, utf8_encode($data[$i]->ret14));
			array_push($resultadodetallado, utf8_encode($data[$i]->sup18));	
			array_push($resultadodetallado, utf8_encode($data[$i]->ret18));
			array_push($resultadodetallado, utf8_encode($data[$i]->sup22));	
			array_push($resultadodetallado, utf8_encode($data[$i]->ret22));			
			$arrayCli['data'][] = $resultadodetallado;			
			}
		 echo(json_encode($arrayCli)); 	
		}else{
			  $arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
		}
  
    }
	
	//MATENIMIENTOS EQUIPOS
    public function ListaEquipos(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';
    } 	 
	public function excel(){
		header("Content-type: application/vnd.ms-excel; name='excel'");
		header("Content-Disposition: filename=ficheroExcel.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $_POST['datos_a_enviar'];
    } 	
    public function Editar(){
        //$alm = new Procesosinv();
        $historial_equipo = array();
        if(isset($_REQUEST['id'])){
            $equi = $this->model->ObtenerDatosEquipo($_REQUEST['id']);
			if($_GET['cod_tipo']=="021"){
				 $equi_inspection = $this->model->ObtenerDatosEquipoInspection($_REQUEST['id']);
			}
			//else{}
           
			//$historial_equipo = $this->maestroinv->getHistorialEditarEquipo($equi->c_idequipo);
			// var_dump($historial_equipo);
        }
        $cod_tipo=$_GET['cod_tipo'];
        require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		$c='inv01';
        require_once 'view/inventario/equipo-editar.php';
		require_once 'view/principal/footer.php';
       
    }
	public function consultarMaquinasAsignadas(){
		$data = array();
		if(isset($_REQUEST['id_equipo'])){
			$data['id_equipo'] = $_REQUEST['id_equipo'];
		}
		$maq_asignadas = $this->maestroinv->getMaquinasAsignadas($data);
		$maq_asignadas = $this->array_utf8_encode($maq_asignadas); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($maq_asignadas);
		}else{
			return $maq_asignadas;
		}
	}
	public function consultarHistorialMaquinasAsignadas(){
		$data = array();
		if(isset($_REQUEST['id_equipo'])){
			$data['id_equipo'] = $_REQUEST['id_equipo'];
		}
		if(isset($_REQUEST['id_equipo_asignado'])){
			$data['id_equipo_asignado'] = $_REQUEST['id_equipo_asignado'];
		}
		$historial = $this->maestroinv->getHistorialMaquinasAsignadas($data);
		$maq_asihistorialgnadas = $this->array_utf8_encode($historial); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($historial);
		}else{
			return $historial;
		}
	}
	public function agregarMaquinaAEquipo(){
		if(isset($_REQUEST['id_equipo']) && isset($_REQUEST['id_maquina'])){
			$data['id_equipo'] = $_REQUEST['id_equipo'];
			$data['id_equipo_asignado'] = $_REQUEST['id_maquina'];
			$insert = $this->maestroinv->agregarMaquinaAEquipo($data);
		}else{
			$insert = array('error'=>true,'msg'=>'Los datos del equipo y/o maquina no fueron recibidos');
		}
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($insert);
		}else{
			return $insert;
		}
	}
	public function liberarMaquinaEquipo(){
		if(isset($_REQUEST['id_equipo']) && isset($_REQUEST['id_equipo_asignado']) && isset($_REQUEST['fecha_registro']) && isset($_REQUEST['observacion'])){
			$data['id_equipo'] = $_REQUEST['id_equipo'];
			$data['id_equipo_asignado'] = $_REQUEST['id_equipo_asignado'];
			$data['fecha_registro'] = $_REQUEST['fecha_registro'];
			$data['observacion'] = $_REQUEST['observacion'];
			$delete = $this->maestroinv->liberarMaquinaEquipo($data);
		}else{
			$delete = array('error'=>true,'msg'=>'Los datos del equipo y/o maquina no fueron recibidos');
		}
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($delete);
		}else{
			return $delete;
		}
	}
	public function EliminarEquipoTemporal(){
        //$alm = new Procesosinv();        
	    $serie= $_REQUEST['serie'];		
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;
		$c_usuelim = $login;
		$d_fecelim = date("d-m-Y H:i:s");
		$c_motivoelim= utf8_decode(mb_strtoupper($_REQUEST['c_motivoelim'])).'. ELIMINADO POR: '.$c_usuelim.'. EL DIA: '.$d_fecelim;
			$this->model->EliminarEquipoTemporal($serie,$c_motivoelim);	
			$mensaje="El equipo fue eliminado correctamente";
			print "<script>alert('$mensaje')</script>";	
		header('Location: indexinv.php?c=inv00&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	  
        /*require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';*/
		/*require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipotemporal.php';
		require_once 'view/principal/footer.php';*/
       
    }
	
	 public function ModeloPorMarca()
    {
        header('Content-Type: application/json');
        
        $cursos = $this->maestro->ListarModeloPorMarca($_POST['id']);
        print_r( json_encode ( $cursos ) );
    }
	
	public function Buscar()
    {
        print_r(json_encode(
            $this->maestro->BuscarProductoDetallado($_REQUEST['criterio'])
        ));
    }
	public function actualizar_inspection(){
		if(isset($_REQUEST['c_idequipo'])){
			$data['c_idequipo'] = $_REQUEST['c_idequipo'];
			$data['power_cable'] = $_REQUEST['power_cable'];
			$data['mt_power_cable'] = $_REQUEST['mt_power_cable']; 	
			$data['plug_receptable'] = $_REQUEST['plug_receptable']; 	
			$data['st_plug_receptable'] = $_REQUEST['st_plug_receptable']; 	
			$data['circuit_breaker'] = $_REQUEST['circuit_breaker']; 	
			$data['st_circuit_breaker'] = $_REQUEST['st_circuit_breaker']; 	
			$data['trans_220'] = $_REQUEST['trans_220']; 	
			$data['v_trans_220'] = $_REQUEST['v_trans_220']; 	
			$data['st_trans_220'] = $_REQUEST['st_trans_220']; 	
			$data['trans_440'] = $_REQUEST['trans_440']; 	
			$data['v_trans_440'] = $_REQUEST['v_trans_440']; 	
			$data['st_trans_440'] = $_REQUEST['st_trans_440']; 	
			$data['l1v_electric_line'] = $_REQUEST['l1v_electric_line']; 	
			$data['l2v_electric_line'] = $_REQUEST['l2v_electric_line']; 	
			$data['l1v_electric_charged'] = $_REQUEST['l1v_electric_charged']; 	
			$data['l2v_electric_charged'] = $_REQUEST['l2v_electric_charged']; 	
			$data['l3v_electric_charged'] = $_REQUEST['l3v_electric_charged']; 	
			$data['eh_main_contactor'] = $_REQUEST['eh_main_contactor']; 	
			$data['el_main_contactor'] = $_REQUEST['el_main_contactor']; 	
			$data['c_main_contactor'] = $_REQUEST['c_main_contactor']; 	
			$data['co_main_contactor'] = $_REQUEST['co_main_contactor']; 	
			$data['h_main_contactor'] = $_REQUEST['h_main_contactor']; 	
			$data['controller'] = $_REQUEST['controller']; 	
			$data['t_controller'] = $_REQUEST['t_controller']; 	
			$data['s_controller'] = $_REQUEST['s_controller']; 	
			$data['software_version'] = $_REQUEST['software_version']; 	
			$data['config'] = $_REQUEST['config']; 	
			$data['ensure']= $_REQUEST['ensure']; 	
			$data['s_ensure'] = $_REQUEST['s_ensure']; 	
			$data['board_relay'] = $_REQUEST['board_relay']; 		
			$data['t_boar_relay'] = $_REQUEST['t_boar_relay']; 		
			$data['s_boar_relay'] = $_REQUEST['s_boar_relay']; 		
			$data['sr_air_sensors'] = $_REQUEST['sr_air_sensors']; 		
			$data['sl_air_sensors']= $_REQUEST['sl_air_sensors']; 		
			$data['r_air_sensors'] = $_REQUEST['r_air_sensors']; 		
			$data['a_air_sensors'] = $_REQUEST['a_air_sensors']; 		
			$data['c_air_sensors'] = $_REQUEST['c_air_sensors']; 		
			$data['defrost_start'] = $_REQUEST['defrost_start']; 		
			$data['defrost_end'] = $_REQUEST['defrost_end']; 	
			$data['usda_1'] = $_REQUEST['usda_1']; 	
			$data['usda_2'] = $_REQUEST['usda_2']; 	
			$data['usda_3'] = $_REQUEST['usda_3']; 	
			$data['sda_cargo'] = $_REQUEST['usda_cargo']; 	
			$data['defrost_timer'] = $_REQUEST['defrost_timer']; 	
			$data['l1a_evap_motor1'] = $_REQUEST['l1a_evap_motor1']; 	
			$data['l2a_evap_motor1'] = $_REQUEST['l2a_evap_motor1']; 	
			$data['l3a_evap_motor1'] = $_REQUEST['l3a_evap_motor1']; 	
			$data['m_evap_motor1'] = $_REQUEST['m_evap_motor1']; 	
			$data['l1a_evap_motor2'] = $_REQUEST['l1a_evap_motor2']; 	
			$data['l2a_evap_motor2'] = $_REQUEST['l2a_evap_motor2']; 	
			$data['l3a_evap_motor2'] = $_REQUEST['l3a_evap_motor2']; 	
			$data['m_evap_motor2'] = $_REQUEST['m_evap_motor2']; 	
			$data['l1a_con_fan'] = $_REQUEST['l1a_con_fan']; 	
			$data['l2a_con_fan'] = $_REQUEST['l2a_con_fan']; 	
			$data['l3a_con_fan'] = $_REQUEST['l3a_con_fan']; 	
			$data['m_con_fan'] = $_REQUEST['m_con_fan']; 	
			$data['l1a_compresor'] = $_REQUEST['l1a_compresor']; 	
			$data['l2a_compresor'] = $_REQUEST['l2a_compresor']; 	
			$data['l3a_compresor'] = $_REQUEST['l3a_compresor']; 	
			$data['m_compresor'] = $_REQUEST['m_compresor']; 	
			$data['l1a_heater'] = $_REQUEST['l1a_heater']; 	
			$data['l2a_heater'] = $_REQUEST['l2a_heater']; 	
			$data['l3a_heater'] = $_REQUEST['l3a_heater']; 	
			$data['m_heater'] = $_REQUEST['m_heater']; 	
			$data['coil_condenser'] = $_REQUEST['coil_condenser']; 	
			$data['st_coil_condenser'] = $_REQUEST['st_coil_condenser']; 	
			$data['liq_solenoid'] = $_REQUEST['liq_solenoid']; 	
			$data['st_liq_solenoid'] = $_REQUEST['st_liq_solenoid']; 	
			$data['water_condenser'] = $_REQUEST['water_condenser']; 	
			$data['st_water_condenser'] = $_REQUEST['st_water_condenser']; 	
			$data['modulation_valve']= $_REQUEST['modulation_valve']; 	
			$data['st_modulation_valve'] = $_REQUEST['st_modulation_valve']; 	
			$data['expansion_valve'] = $_REQUEST['expansion_valve']; 	
			$data['st_expansion_valve'] = $_REQUEST['st_expansion_valve']; 	
			$data['level_refri'] = $_REQUEST['level_refri']; 	
			$data['st_level_refri'] = $_REQUEST['st_level_refri']; 	
			$data['compresor_oil'] = $_REQUEST['compresor_oil']; 	
			$data['st_compresor_oil'] = $_REQUEST['st_compresor_oil']; 	
			$data['filter_drier'] = $_REQUEST['filter_drier']; 	
			$data['st_filter_drier'] = $_REQUEST['st_filter_drier']; 	
			$data['low_pressure'] = $_REQUEST['low_pressure']; 	
			$data['high_pressure']= $_REQUEST['high_pressure']; 	
			$data['keypad'] = $_REQUEST['keypad']; 	
			$data['st_keypad'] = $_REQUEST['st_keypad']; 	
			$data['humidity_sensor'] = $_REQUEST['humidity_sensor']; 	
			$data['st_humidity_sensor'] = $_REQUEST['st_humidity_sensor']; 	
			$data['observaciones'] = $_REQUEST['observaciones']; 	
			$data['customer'] = $_REQUEST['customer']; 	
			$data['technician']= $_REQUEST['technician']; 	
			
			$insert = $this->model->actualizar_inspection($data);
			$udni = $_REQUEST['udni'];	
			$cod_tipo = $_REQUEST['cod_tipo'];	
		header('Location: indexinv.php?c=inv01&a=Editar&mod=1&udni='.$udni.'&id='.$_REQUEST['c_idequipo'].'&cod_tipo='.$cod_tipo);
		}else{
			$insert = array('error'=>true,'msg'=>'Los datos del equipo y/o maquina no fueron recibidos');
		}
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($insert);
		}else{
			return $insert;
		}
	}
	
	
    public function actualizar_inspection2(){
        $alm = new Procesosinv();        
	
		$udni = $_REQUEST['udni'];		
		$alm->c_idequipo = $_REQUEST['id']; 	
		$alm->power_cable = $_REQUEST['power_cable']; 	
		$alm->mt_power_cable = $_REQUEST['mt_power_cable']; 	
		$alm->plug_receptable = $_REQUEST['plug_receptable']; 	
		$alm->st_plug_receptable = $_REQUEST['st_plug_receptable']; 	
		$alm->circuit_breaker = $_REQUEST['circuit_breaker']; 	
		$alm->st_circuit_breaker = $_REQUEST['st_circuit_breaker']; 	
		$alm->trans_220 = $_REQUEST['trans_220']; 	
		$alm->v_trans_220 = $_REQUEST['v_trans_220']; 	
		$alm->st_trans_220 = $_REQUEST['st_trans_220']; 	
		$alm->trans_440 = $_REQUEST['trans_440']; 	
		$alm->v_trans_440 = $_REQUEST['v_trans_440']; 	
		$alm->st_trans_440 = $_REQUEST['st_trans_440']; 	
		$alm->l1v_electric_line = $_REQUEST['l1v_electric_line']; 	
		$alm->l2v_electric_line = $_REQUEST['l2v_electric_line']; 	
		$alm->l1v_electric_charged = $_REQUEST['l1v_electric_charged']; 	
		$alm->l2v_electric_charged = $_REQUEST['l2v_electric_charged']; 	
		$alm->l3v_electric_charged = $_REQUEST['l3v_electric_charged']; 	
		$alm->eh_main_contactor = $_REQUEST['eh_main_contactor']; 	
		$alm->el_main_contactor = $_REQUEST['el_main_contactor']; 	
		$alm->c_main_contactor = $_REQUEST['c_main_contactor']; 	
		$alm->co_main_contactor = $_REQUEST['co_main_contactor']; 	
		$alm->h_main_contactor = $_REQUEST['h_main_contactor']; 	
		$alm->controller = $_REQUEST['controller']; 	
		$alm->t_controller = $_REQUEST['t_controller']; 	
		$alm->s_controller = $_REQUEST['s_controller']; 	
		$alm->software_version = $_REQUEST['software_version']; 	
		$alm->config = $_REQUEST['config']; 	
		$alm->ensure = $_REQUEST['ensure']; 	
		$alm->s_ensure = $_REQUEST['s_ensure']; 	
		$alm->board_relay = $_REQUEST['board_relay']; 		
		$alm->t_boar_relay = $_REQUEST['t_boar_relay']; 		
		$alm->s_boar_relay = $_REQUEST['s_boar_relay']; 		
		$alm->sr_air_sensors = $_REQUEST['sr_air_sensors']; 		
		$alm->sl_air_sensors = $_REQUEST['sl_air_sensors']; 		
		$alm->r_air_sensors = $_REQUEST['r_air_sensors']; 		
		$alm->a_air_sensors = $_REQUEST['a_air_sensors']; 		
		$alm->c_air_sensors = $_REQUEST['c_air_sensors']; 		
		$alm->defrost_start = $_REQUEST['defrost_start']; 		
		$alm->defrost_end = $_REQUEST['defrost_end']; 	
		$alm->usda_1 = $_REQUEST['usda_1']; 	
		$alm->usda_2 = $_REQUEST['usda_2']; 	
		$alm->usda_3 = $_REQUEST['usda_3']; 	
		$alm->usda_cargo = $_REQUEST['usda_cargo']; 	
		$alm->defrost_timer = $_REQUEST['defrost_timer']; 	
		$alm->l1a_evap_motor1 = $_REQUEST['l1a_evap_motor1']; 	
		$alm->l2a_evap_motor1 = $_REQUEST['l2a_evap_motor1']; 	
		$alm->l3a_evap_motor1 = $_REQUEST['l3a_evap_motor1']; 	
		$alm->m_evap_motor1 = $_REQUEST['m_evap_motor1']; 	
		$alm->l1a_evap_motor2 = $_REQUEST['l1a_evap_motor2']; 	
		$alm->l2a_evap_motor2 = $_REQUEST['l2a_evap_motor2']; 	
		$alm->l3a_evap_motor2 = $_REQUEST['l3a_evap_motor2']; 	
		$alm->m_evap_motor2 = $_REQUEST['m_evap_motor2']; 	
		$alm->l1a_con_fan = $_REQUEST['l1a_con_fan']; 	
		$alm->l2a_con_fan = $_REQUEST['l2a_con_fan']; 	
		$alm->l3a_con_fan = $_REQUEST['l3a_con_fan']; 	
		$alm->m_con_fan = $_REQUEST['m_con_fan']; 	
		$alm->l1a_compresor = $_REQUEST['l1a_compresor']; 	
		$alm->l2a_compresor = $_REQUEST['l2a_compresor']; 	
		$alm->l3a_compresor = $_REQUEST['l3a_compresor']; 	
		$alm->m_compresor = $_REQUEST['m_compresor']; 	
		$alm->l1a_heater = $_REQUEST['l1a_heater']; 	
		$alm->l2a_heater = $_REQUEST['l2a_heater']; 	
		$alm->l3a_heater = $_REQUEST['l3a_heater']; 	
		$alm->m_heater = $_REQUEST['m_heater']; 	
		$alm->coil_condenser = $_REQUEST['coil_condenser']; 	
		$alm->st_coil_condenser = $_REQUEST['st_coil_condenser']; 	
		$alm->liq_solenoid = $_REQUEST['liq_solenoid']; 	
		$alm->st_liq_solenoid = $_REQUEST['st_liq_solenoid']; 	
		$alm->water_condenser = $_REQUEST['water_condenser']; 	
		$alm->st_water_condenser = $_REQUEST['st_water_condenser']; 	
		$alm->modulation = $_REQUEST['modulation']; 	
		$alm->st_modulation_valve = $_REQUEST['st_modulation_valve']; 	
		$alm->expansion_valve = $_REQUEST['expansion_valve']; 	
		$alm->st_expansion_valve = $_REQUEST['st_expansion_valve']; 	
		$alm->level_refri = $_REQUEST['level_refri']; 	
		$alm->st_level_refri = $_REQUEST['st_level_refri']; 	
		$alm->compresor_oil = $_REQUEST['compresor_oil']; 	
		$alm->st_compresor_oil = $_REQUEST['st_compresor_oil']; 	
		$alm->filter_drier = $_REQUEST['filter_drier']; 	
		$alm->st_filter_drier = $_REQUEST['st_filter_drier']; 	
		$alm->low_pressure = $_REQUEST['low_pressure']; 	
		$alm->high_pressure = $_REQUEST['high_pressure']; 	
		$alm->keypad = $_REQUEST['keypad']; 	
		$alm->st_keypad = $_REQUEST['st_keypad']; 	
		$alm->humidity_sensor = $_REQUEST['humidity_sensor']; 	
		$alm->st_humidity_sensor = $_REQUEST['st_humidity_sensor']; 	
		$alm->observaciones = $_REQUEST['observaciones']; 	
		$alm->customer = $_REQUEST['customer']; 	
		$alm->technician = $_REQUEST['technician']; 	
		
		//$alm->c_fecmod = date('d/m/Y h:i:s A');
		//$alm->c_opermod = $udni;
		//$alm->fec_mod = $alm->c_fecmod;		
		//$alm->usr_mod = $c_login;
		

		$this->model->actualizar_inspection($alm); 
		header('Location: indexinv.php?c=inv01&a=Editar&mod='.$_GET['mod'].'&udni='.$udni.'&id='.$_GET['id'].'&cod_tipo='.$_GET['cod_tipo']);
    }
    public function GuardarUpdEquipo(){
        $alm = new Procesosinv();        
		///campos en comun
		// var_dump($_REQUEST);
		// die();
		
		//luis
		
		$alm->c_nserie=$_REQUEST['c_nserie'];
		$alm->c_serieant=$_REQUEST['c_nseriex'];
		$alm->c_newCod=substr($_REQUEST['c_idequipo'],0,1)."-".$_REQUEST['c_nserie'];
		//$alm->c_idequipoNEW=$_REQUEST['valor'].'-'.$_REQUEST['c_nserie'];
		
		$udni = $_REQUEST['udni'];
		$datos_usuario = $this->maestroinv->obtenerDatosUsuarioPorDNI($udni);
		if(!empty($datos_usuario['data'])){
			$datos_usuario['c_login'] = $datos_usuario['data']['c_login'];
		}else{
			$datos_usuario['c_login'] = "";
		}
		$c_login = $datos_usuario['c_login'];
		$alm->c_idequipo = $_REQUEST['c_idequipo']; //todos		
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
		if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' ){	
			if(!isset($_REQUEST[$valor.'c_cmodel'])){
				$alm->c_cmodel = '';//R,G,C,T
			}else{
	    		$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//R,G,C,T			
			}
		}else{
			$alm->c_cmodel = '';//R,G,C,T	
		}	
		if($valor=='G' || $valor=='R'  || $valor=='T' ){	    	
			$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//R,G,T
		}else{
			$alm->c_serieequipo ='';
		}		
		if($valor=='G' || $valor=='T'){	    	
			$alm->c_seriemotor = $_REQUEST[$valor.'c_seriemotor'];//G,T

		}else{
			$alm->c_seriemotor ='';	
		}		
		//lcruzado
		if($valor=='G' ){	    	
			$alm->controladorgenserie = $_REQUEST[$valor.'controladorgenserie'];//G,T
			$alm->motorgenserie = $_REQUEST[$valor.'motorgenserie'];//G,T
			$alm->alternadorgenserie = $_REQUEST[$valor.'alternadorgenserie'];//G,T
		}else{
			$alm->controladorgenserie ='';
			$alm->motorgenserie ='';
			$alm->alternadorgenserie ='';			
		}		
		if($valor=='C' || $valor=='G'|| $valor=='T'){	
	    	$alm->c_cfabri = $_REQUEST[$valor.'c_cfabri'];//G,C,T			
		}else{
			$alm->c_cfabri ='';
		}			
		if($valor=='R'){ //solo para reefer
	   		$alm->c_canofab = $_REQUEST['c_canofab'];//R
			$alm->c_cmesfab = $_REQUEST['c_cmesfab'];//R			
			$alm->c_mcamaq = $_REQUEST['c_mcamaq'];//R				
			$alm->c_ccontrola = $_REQUEST['c_ccontrola'];//R
			$alm->c_tipgas = $_REQUEST['c_tipgas'];//R
			$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];
			$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];
			$alm->alt_piso = $_REQUEST['alt_piso'];
			$alm->categoria = $_REQUEST['categoria'];
		}else{
			$alm->c_canofab = '';//R
			$alm->c_cmesfab = '';//R			
			$alm->c_mcamaq = '';//R				
			$alm->c_ccontrola = '';//R
			$alm->c_tipgas = '';//R			
			$alm->alt_piso = '';//R			
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
			
			$alm->c_compresormaq= $_REQUEST[$valor.'c_compresormaq'];//M	
			$alm->relay= $_REQUEST[$valor.'relay'];//M	
			$alm->afam= $_REQUEST[$valor.'afam'];//M	
			
		   $alm->tipocompresor= $_REQUEST[$valor.'tipocompresor'];//M 14122018			
		}else{
			$alm->tipocompresor= "";//M 14122018
			/*$alm->c_canofab = '';//M
			$alm->c_cmesfab = '';//M			
			$alm->c_mcamaq = '';//M
			$alm->c_cmodel = '';//M
			$alm->c_serieequipo = '';//M				
			$alm->c_ccontrola = '';//M
			$alm->c_procedencia = '';//M
			$alm->c_tipgas = '';//M*/
		}
		$alm->c_fecmod = date('d/m/Y h:i:s A');
		$alm->c_opermod = $udni;
		$alm->fec_mod = $alm->c_fecmod;		
		$alm->usr_mod = $c_login;
		
		//$alm->c_compresormaq= $_REQUEST[$valor.'c_compresormaq'];//M
		// var_dump($alm);
		$this->maestroinv->insertarHistorialEquipo($_REQUEST['c_idequipo'], $c_login);
		// die();
		//REGISTRAR HISTORIAL EQUIPO
		$this->maestroinv->insertarEquipoModificadoM($_REQUEST['c_idequipo']);
		$this->model->ActualizarEquipo($alm); 
		$this->model->updateEquipoAsigMaquina($alm); 
		//VOLVER
		if(isset($_REQUEST['retorno'])){
			$retorno = $_REQUEST['retorno'];
			switch($retorno){
				case 'busquedaequipo':
					$c = 'equi01';
					break;
				default:
					$c = 'inv01';
					break;
			}
		}else{
			$c = 'inv01';
		}
		/*require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/'.$retorno.'.php';
		require_once 'view/principal/footer.php';*/
		// var_dump($_REQUEST);
		// die();
		header('Location: indexa.php?c=16&udni='.$udni.'&mod='.$_GET['mod']);
    }
	public function consultarEquiposDisponibles(){
		/**/
		$equipos = $this->maestroinv->getEquiposDisponibles();
		$equipos = $this->array_utf8_encode($equipos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($equipos);
		}else{
			return $equipos;
		}
	}
	public function consultarHistorialEquipo(){
		$id_equipo = $_REQUEST['id_equipo'];
		$equipos = $this->maestroinv->consultarHistorialEquipo($id_equipo);
		$equipos = $this->array_utf8_encode($equipos);
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
        	echo json_encode($equipos);
		}else{
			return $equipos;
		}
	}
    public function asignarMaquina(){
		
	}
   /************************PROCESO FILTRA CLIENTE*/
      public function ClienteBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarCliente($_REQUEST['criterio'])
        ));
    }//FIN ClienteBuscar
	
	/************************PROCESO FILTRA Proveedor*/
      public function ProveedorBuscar()
    {
        print_r(json_encode(
            $this->maestro->BuscarProveedor($_REQUEST['criterio'])
        ));
    }//FIN BuscarProveedor	
	
	/************************PROCESO FILTRA PRODUCTO*/
      public function ProductoBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarProductos($_REQUEST['criterio'])
        ));
    }//FIN ProductoBuscar	
	
	 public function ImprimirEquipo(){
		if(!empty($_SESSION['activo'])){ 
			//$alm = new Procesosinv();
			
			if(isset($_REQUEST['id'])){
				$equi = $this->model->ObtenerDatosEquipo($_REQUEST['id']);			
			}
			$cod_tipo=$_GET['cod_tipo'];
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			$c='inv01';
			require_once 'view/inventario/equipo-imprimir.php';
			require_once 'view/principal/footer.php';
		}else{
			$ruta = $_GET['c'];
				$mensaje = "Usuario inactivo...".$_GET['c'];
				print "<script>alert('$mensaje')</script>";
				//header("http://148.102.22.93:2531/PANELV2/index.php");
				header("Location: http://148.102.22.93:2531/PANELV2/index.php", TRUE, 301);
                exit();
				require_once 'view/principal/header.php';
				require_once 'view/login/index.php';
				require_once 'view/principal/footer.php';
				
				//$ruta = $_GET['url'];
		}
    }
	
	public function VerDetalle(){
		// $situacion=$_GET['situ'];
		$idequipo=$_GET['cod'];		
		$anterior=$idequipo[0].'-'.$_GET['anterior'];		
		//$reporte=buscaequipocliente2C($idequipo);
		$reportehistorialequipo=$this->model->buscahistorialequipoM($idequipo,$anterior);
		$reporteguiarem=$this->model->buscaequipoguiaremM($idequipo,$anterior);
		$reporteeir=$this->model->buscaequipoeirM($idequipo,$anterior);	
		
		$reporteASig=$this->model->obtenerequipoAsigM($idequipo,$anterior);	
		
		
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/detallesituequipo.php';
		require_once 'view/principal/footer.php';		
		//include('../MVC_Vista/Cotizaciones/detallesituequipo.php');
	}
	
	/////proceso para actualizr estado de equipo en formulario
	//mantenimiento de equipo opcion reg estado
	public function ActualizaEstadoEquipo(){
		$idequipo=$_REQUEST['codrod'];
		$estaant=$_REQUEST['estadoanterior'];
		$user=$_REQUEST['login'];
		$newesta=$_REQUEST['estadonew'];
		$fecha=date("d/m/Y H:i:s");

		$this->maestroinv->insertarHistorialEquipo($idequipo,$user);
		$datos = new \StdClass(); 
		$datos->codigo=$idequipo;
		$datos->est_ant=$estaant;
		$datos->new_est=$newesta;
		$datos->user=$user;
		$datos->fecreg=$fecha;
		$this->model->registratemcodigoM($datos);
		$this->model->updatecodsit($datos);
		$mensaje="Se actualizo El estado del equipo";
		print "<script>alert('$mensaje')</script>";	
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';	
	}  

   public function ExportarExcelEquipos(){
		$tipoexporta='EXCEL';
		$name='RepListadoEquipos'.date('Y-m-d');
		if($tipoexporta=="EXCEL"){
			header("Content-type: application/vnd.ms-excel; name='excel'");
			header("Content-Disposition: filename=$name.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			//echo $_REQUEST['datos_a_enviar'];
   		}
		require 'view/inventario/equipo-excel.php';
	}
	public function inventariartemp(){		
		if($_REQUEST['fechainv']==NULL){
			$c_fisico=date("d/m/Y");
		}else{
			$c_fisico=$_REQUEST['fechainv'];
		}
		if($_REQUEST['referencia']==NULL){
			$c_fisico2="NINGUNO";
		}else{
			$c_fisico2=$_REQUEST['referencia'];
		}
		$inventariar = new Procesosinv(); 
		$inventariar->c_fisico=$c_fisico;
		$inventariar->c_fisico2=$c_fisico2;
		$inventariar->usr_mod=$_REQUEST['login'];
		$inventariar->fec_mod=date("d/m/Y");
                $inventariar->fec_mod=date("d/m/Y");
                $inventariar->pti=$_REQUEST['pti'];
                
                $inventariar->c_codalm=$_REQUEST['c_codalm'];
                $inventariar->tipo=$_REQUEST['tipo'];
                $inventariar->c_codmar=$_REQUEST['c_codmar'];
                
		$inventariar->c_idequipo=$_REQUEST['idequipo'];
		$this->model->InventariarM($inventariar);
		$mensaje="Se Inventario El equipo";
		print "<script>alert('$mensaje')</script>";	
		//header('Location: indexinv.php?c=inv01&mod='.$_GET['mod'].'&udni='.$_GET['udni']);		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';		
	}
	public function inventariartemp2(){		
		if($_REQUEST['fechainv']==NULL){
			$c_fisico=date("d/m/Y");
		}else{
			$c_fisico=$_REQUEST['fechainv'];
		}
		if($_REQUEST['referencia']==NULL){
			$c_fisico2="NINGUNO";
		}else{
			$c_fisico2=$_REQUEST['referencia'];
		}
		$inventariar = new Procesosinv(); 
		$inventariar->c_fisico=$c_fisico;
		$inventariar->c_fisico2=$c_fisico2;
		$inventariar->usr_mod=$_REQUEST['login'];
		$inventariar->fec_mod=date("d/m/Y");
                $inventariar->fec_mod=date("d/m/Y");
                $inventariar->pti=$_REQUEST['pti'];
                
                $inventariar->c_codalm=$_REQUEST['c_codalm'];
                $inventariar->tipo=$_REQUEST['tipo'];
                $inventariar->c_codmar=$_REQUEST['c_codmar'];
                
		$inventariar->c_idequipo=$_REQUEST['idequipo'];
		$this->model->InventariarM($inventariar);
		$mensaje="Se Inventario El equipo";
		print "<script>alert('$mensaje')</script>";	
		header('Location:indexa.php?c=16&mod='.$_GET['mod'].'&udni='.$_GET['udni']);
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		//require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';		
	}
	public function InventariarEquipo(){			 
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/inventariarEquipos.php';
		require_once 'view/principal/footer.php';		 
	}
	
	public function buscarOt(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/principal/Ordenes.php';
		require_once 'view/principal/footer.php';	
	}
	public function crearOt(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/principal/crearOrdent.php';
		require_once 'view/principal/footer.php';	
	}
	function BuscarOrdenesT(){		
		$busqueda=$_REQUEST["busqueda"]; 
		$arrayCli=array(); 	  
	  $data=$this->model->BuscarOrdenesT($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();				
			 $moneda=$data[$i]->c_codmon;
			 $n_swtapr=$data[$i]->n_swtapr;
			 $c_estado=$data[$i]->c_estado;
			 $fecha=date("d-m-Y",strtotime($data[$i]->d_fecdcto));
			 if($moneda==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 }
			$check="<input type='checkbox' value='".$data[$i]->id."' name='idOrden[]' id='idOrden".$data[$i]->id."' onclick='marcar(this);'>
					<input type='hidden' value='".$data[$i]->id."' name='Orden' id='Orden".$data[$i]->id."'>"; 
			 if($n_swtapr==0 && $c_estado==1){
				 $estado= '<strong style="color:#0D1FC6">Generado</strong>'; 
            }elseif($n_swtapr==1 && $c_estado==2){
				$estado= '<strong style="color:#060">Cerrado</strong>';
            }elseif($c_estado==4 && $n_swtapr==0){ 
				$estado= '<strong style="color:#FF0000">Anulado</strong>';}
		
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numot));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->concepto));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_desequipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->unidad));
			array_push($resultadodetallado, utf8_encode($data[$i]->monto));
			array_push($resultadodetallado, utf8_encode($moneda));						
			array_push($resultadodetallado, utf8_encode($data[$i]->c_refcot));						
			array_push($resultadodetallado, utf8_encode($data[$i]->c_ejecuta));						
			array_push($resultadodetallado, utf8_encode($estado));						
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
			echo(json_encode("<div class='loading' style='text-align:center;'>No hay datos con ese numero de documento</div>"));
		}		 	
    }
	public function GestionOrdenServicio(){
		echo $txtRucProveedor=$_REQUEST['txtRucProveedor'];
		echo $txtcadena=$_REQUEST['txtcadena'];
		$fecha=date("d/m/Y H:i:s");

		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/principal/OrdenServicio.php';
		require_once 'view/principal/footer.php';	
	}
	
	function Buscar_Proveedor(){   
		$descripcion=$_REQUEST["term"];  
		$arrayCli=array(); 
	  
	  $data=$this->maestro->BuscarProveedor($descripcion);
		for ($i=0; $i < count($data); $i++) { 	
			
			$resultadodetallado_json = array(
				'PR_RAZO'		 	  => $data[$i]->PR_RAZO,
				'PR_NRUC'		 	  => $data[$i]->PR_NRUC
			 );		
		
		 array_push($arrayCli, $resultadodetallado_json);	
		}
		 echo(json_encode($arrayCli)); 
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
	
	function BuscarCodigos(){
    
		$codigo=$_REQUEST["codigo"];  
		$arrayCli=array(); 
		
		$data=$this->model->codigoEquipos($codigo);
		if(count($data)>0){
		for ($i=0; $i < count($data); $i++) { 	
		$resultadodetallado = array();
		
		
		$seleccion='<a href="javascript:pon_prefijo('."'".$data[$i]->c_idequipo."',"."'".$data[$i]->id_equipo_asignado."'".')" type="button" class="btn btn-success" aria-label="Left Align">
		  <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
		</a>';
		array_push($resultadodetallado, utf8_encode($data[$i]->c_idequipo));
		array_push($resultadodetallado, utf8_encode($data[$i]->in_arti));
		array_push($resultadodetallado, utf8_encode($data[$i]->c_refnaci));
		array_push($resultadodetallado, utf8_encode($data[$i]->c_nserie));
		array_push($resultadodetallado, utf8_encode($data[$i]->id_equipo_asignado));
		array_push($resultadodetallado, utf8_encode($data[$i]->c_codsitalm));
		array_push($resultadodetallado, utf8_encode($seleccion));
		$arrayCli['data'][] = $resultadodetallado;
		}
		}else{
			$arrayCli['data'][] = [ "", "", "","", "", ""," "];
				echo(json_encode($arrayCli));
			
		}
	  
	 echo(json_encode($arrayCli));; 
    }
	function MostrarSimboloMoneda(){   
		$descripcion=$_REQUEST["Moneda"];  
		$data=$this->model->MonedaBuscarPorId($descripcion);
		echo $Simbolo=$data[0]->tm_simb;	
    }
	function BuscarTecnico(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
    $data=$this->maestro->BuscarTecnico($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'C_NUMITM'		 	  => $data[$i]->C_NUMITM,
			'C_DESITM'		 	  => $data[$i]->C_DESITM
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
	
	function BuscarDetallesT(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarDetalleT($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'id_detallet'		 	  => $data[$i]->id_detallet,
			'descripcion'		 	  => $data[$i]->descripcion,
			'precio'		 	      => $data[$i]->precio
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
	function BuscarCotiA(){
    
    $descripcion=$_REQUEST["term"];  
	$arrayCli=array(); 
  
  $data=$this->maestro->BuscarCotiA($descripcion);
	for ($i=0; $i < count($data); $i++) { 	
		
		$resultadodetallado_json = array(
			'c_numped'		 	  => $data[$i]->c_numped,
			'c_nomcli'		 	  => $data[$i]->c_nomcli
		 );		
	
	 array_push($arrayCli, $resultadodetallado_json);	
	}
	 echo(json_encode($arrayCli)); 
    }
	//$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		//$login=$ObtenerUsuarios->login;
	
	public function VerDetalleGuiaxCotizacion(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/detalleguiaxcot.php';
		require_once 'view/principal/footer.php';	
	}
	public function ListadoGeneralGuia(){
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/detalleguiaxcot.php';
		require_once 'view/principal/footer.php';	
	}
	public function BuscarCotizacion()
    {		
        print_r(json_encode(
            $this->maestro->BuscarCotizacion($_REQUEST['criterio'])
        ));
    }
	
	function BuscarGuiaxCot(){		
		$busqueda=$_REQUEST["busqueda"]; 
		$udni=$_REQUEST["dni"];
		$arrayCli=array(); 	  
		$data=$this->model->BuscarGuiaxCot($busqueda);
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();	
			$c_numguia=$data[$i]->c_numguia;
			
			$fecha=date("d-m-Y",strtotime($data[$i]->d_fecgui));
			$guia='<a target="_blank" href="?c=inv04&a=ImprimirGuia&c_numguia='.$c_numguia.'&mod=1&udni='.$udni.'">'.$c_numguia.'</a>';
			//$btnImprimir='<a target="_blank" class="btn btn-xs btn-default" title="Imprimir" href="?c=03&a=ImpCotizaciones&ncoti='.$c_numped.'&mod=1&udni='.$udni.'&valor='.$c_codcli.'&sw=1"><span class="glyphicon glyphicon glyphicon-print"></span></a>';
			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($guia));
			array_push($resultadodetallado, utf8_encode($fecha));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomdes));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numeir));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_codequipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->n_canprd));	
			array_push($resultadodetallado, utf8_encode($data[$i]->c_desprd));					
			array_push($resultadodetallado, utf8_encode($data[$i]->c_obsprd));					
																		
			$arrayCli['data'][] = $resultadodetallado;
			}
			//echo(json_encode($arrayCli));
		
		//}
		 echo(json_encode($arrayCli)); 	
		}else{
		$arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
			//echo "no hay datos";
		}		 	
    }

}


//FIN MATENIMIENTOS EQUIPOS