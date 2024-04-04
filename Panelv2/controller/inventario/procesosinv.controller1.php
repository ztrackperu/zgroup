<?php
//c=inv01
//ini_set('error_reporting',0);//para xamp
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
    
	//MATENIMIENTOS EQUIPOS
    public function ListaEquipos(){
		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';
    } 	 
	
    public function Editar(){
        //$alm = new Procesosinv();
        
        if(isset($_REQUEST['id'])){
            $equi = $this->model->ObtenerDatosEquipo($_REQUEST['id']);			
        }
        $cod_tipo=$_GET['cod_tipo'];
        require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		$c='inv01';
        require_once 'view/inventario/equipo-editar.php';
		require_once 'view/principal/footer.php';
       
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
		header('Location: indexinv.php?c=inv01&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	  
        /*require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipo.php';
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
		//echo 'hola';
        $alm = new Procesosinv();        
        
		///campos en comun
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
	    	$alm->c_cmodel = $_REQUEST[$valor.'c_cmodel'];//R,G,C,T			
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
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';			
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
        $cod_tipo=$_GET['cod_tipo'];
        require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		$c='inv01';
        require_once 'view/inventario/equipo-imprimir.php';
		require_once 'view/principal/footer.php';
       
    }
	
	/////proceso para actualizr estado de equipo en formulario
	//mantenimiento de equipo opcion reg estado
	public function ActualizaEstadoEquipo(){
		$idequipo=$_REQUEST['codrod'];
		$estaant=$_REQUEST['estadoanterior'];
		$user=$_REQUEST['login'];
		$newesta=$_REQUEST['estadonew'];
		$fecha=date("d/m/Y H:i:s");
		$updatecodsitalmM = new Procesosinv(); 
		$updatecodsitalmM->c_codsitalm=$newesta;					
		$updatecodsitalmM->d_feccamest=$fecha;                       
		$updatecodsitalmM->c_usercamest=$user;
		$updatecodsitalmM->c_idequipo=$idequipo;
		$this->model->updatecodsitalmM($updatecodsitalmM);
		$registratemcodigoM = new Procesosinv();
		$registratemcodigoM->codigo=$idequipo;
		$registratemcodigoM->est_ant=$estaant;
		$registratemcodigoM->new_est=$newesta;
		$registratemcodigoM->user=$user;
		$registratemcodigoM->fecreg=$fecha;
		$this->model->registratemcodigoM($registratemcodigoM);
		$mensaje="Se actualizo El estado del equipo";
		print "<script>alert('$mensaje')</script>";	
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/adminequipo.php';
		require_once 'view/principal/footer.php';
	}	
}


//FIN MATENIMIENTOS EQUIPOS