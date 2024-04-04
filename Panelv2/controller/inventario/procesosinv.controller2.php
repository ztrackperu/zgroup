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
		$equipos = $this->model->consultarTodosEquipos();
		$equipos = $this->array_utf8_encode($equipos); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($equipos);
		}else{
			return $equipos;
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
    public function CambiarTipoNac(){
        //$alm = new Procesosinv();
        if(isset($_REQUEST['id'])){
            $equi = $this->model->CambiarTipoNac($_REQUEST['id']);
			//$historial_equipo = $this->maestroinv->getHistorialEditarEquipo($equi->c_idequipo);
			// var_dump($historial_equipo);
            header('Location: index.php?c=Clientes&a=Clientes&IdListItem=' . @$_GET["IdListItem"].'&token=' . @$_GET['token']);
        }
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
    
    public function GuardarUpdEquipo(){
        $alm = new Procesosinv();        
		///campos en comun
		// var_dump($_REQUEST);
		// die();
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
		$alm->c_fecmod = date('d/m/Y h:i:s A');
		$alm->c_opermod = $udni;
		$alm->fec_mod = $alm->c_fecmod;		
		$alm->usr_mod = $c_login;
		// var_dump($alm);
		$this->maestroinv->insertarHistorialEquipo($_REQUEST['c_idequipo'], $c_login);
		// die();
		//REGISTRAR HISTORIAL EQUIPO
		// $this->maestroinv->insertarEquipoModificadoM($_REQUEST['c_idequipo']);
		$this->model->ActualizarEquipo($alm); 
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
		header('Location: indexinv.php?mod='.$_GET['mod'].'&udni='.$udni.'&c='.$c);
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
        //$alm = new Procesosinv();
        
        if(isset($_REQUEST['id'])){
            $equi = $this->model->ObtenerDatosEquipo($_REQUEST['id']);			
        }
        $cod_tipo=$_REQUEST['cod_tipo'];
        require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		$c='inv01';
        require_once 'view/inventario/equipo-imprimir.php';
		require_once 'view/principal/footer.php';
       
    }
	
	public function VerDetalle(){
		// $situacion=$_GET['situ'];
		$idequipo=$_GET['cod'];		
		//$reporte=buscaequipocliente2C($idequipo);
		$reportehistorialequipo=$this->model->buscahistorialequipoM($idequipo);
		$reporteguiarem=$this->model->buscaequipoguiaremM($idequipo);
		$reporteeir=$this->model->buscaequipoeirM($idequipo);	
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
	public function InventariarEquipo(){			 
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/inventariarEquipos.php';
		require_once 'view/principal/footer.php';		 
	}	
}


//FIN MATENIMIENTOS EQUIPOS