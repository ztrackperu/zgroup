<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc 
require_once 'model/inventario/procesoseirM.php';
require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesodevolucionesM.php';

class procesodevolucionesController{
    
	private $model;
	private $modelEIR;
    
	public function __CONSTRUCT(){
		$this->model = new procesodevoluciones();
		$this->modelEIR = new Procesoseir();
		$this->maestroinv = new Maestrosinv();
		$this->maestro = new Maestros();		
		$this->login = new Login();
	}
	public function Devoluciones(){		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/admindevoluciones.php';
		require_once 'view/principal/footer.php';		
	}
	
	public function validarNumGuiaDev(){//validar cuando ingresas un numero de guia en admindevoluciones.php
		$xc_nume =$_REQUEST["cod"]; 
		$xserie =$_REQUEST["serie"]; 
		$udni = $_GET['udni'];
		if($xc_nume =='G07'){
			$c_nume=str_pad($xc_nume, 8, '0', STR_PAD_LEFT);
		}else{
			$c_nume=str_pad($xc_nume, 7, '0', STR_PAD_LEFT);
		}
		
		if($c_nume!=''){
			$validarCT=$this->model->ValidarGuiaM($c_nume,$xserie);
			if($validarCT != NULL){
				echo $mensaje= "<div class='alert_info'>Guia del cliente ".utf8_encode($validarCT->c_nomdes)."</div>";
				/*if($validarCT->c_estado == '4' || $validarCT->c_estado == '2'){
					//40294243-41753251-43377015 matilde - gladis - sistemas
					if(($udni == '40294243' || $udni == '41753251' || $udni == '43377015') && $validarCT->c_estado){
						echo $mensaje= "<div class='alert_info'>Guia del cliente ".utf8_encode($validarCT->c_nomdes)."</div>";	
					}else{
						echo $mensaje= "<div class='alert_error'>Cotizacion Facturada</div>";
					}
				}else{
					echo $mensaje= "<div class='alert_info'>Guia del cliente ".utf8_encode($validarCT->c_nomdes)."</div>";
				}	*/
				//echo $seguir="0";
			}else{
					echo $mensaje= "<div class='alert_error'>Guia no existe</div>";
					//echo $seguir="1";
			}
		}
	}	
	
	public function RegEirEntradaGuia(){			
		$tipoDoc='SALIDA';
		$c_nume=$_REQUEST['c_nume'];
		$c_serdoc=$_REQUEST['c_serdoc'];	
		$c_numguia='G'.$c_serdoc.$c_nume;
		$serie=$_REQUEST['serie'];
		$listaEirSalGuia=$this->model->listaEirSalGuia($c_nume,$serie);	
		$c_depentrega=$listaEirSalGuia->c_depentrega; //DEPARTAMENTO DESTINO
		$equi=$this->maestroinv->ListarEquiposSerie($serie);	
		$cod_tipo=$equi->COD_TIPO;
		if($equi==NULL){
			$mensaje="El equipo no existe";
			print "<script>alert('$mensaje')</script>";
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/admindevoluciones.php';
			require_once 'view/principal/footer.php';
		}else{
			if($listaEirSalGuia==NULL){
				$mensaje="El equipo no esta Registrado en la guia o no cumple las condiciones";
				print "<script>alert('$mensaje')</script>";
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/admindevoluciones.php';
				require_once 'view/principal/footer.php';
			}else{
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/regeirentradacambio.php';
				require_once 'view/principal/footer.php';
			}
		}
	}//FIN RegEirSalidaGuia
	
	public function GuardarRegEirEntradaDev(){ //EIR ENTRADA POR DEVOLUCION
		$alm = new procesodevoluciones();     
		//cabecera
		//Obtener c_numeir	  
		foreach($this->model->ObtenerIdEir() as $eir):
			$maxeir = $eir->maxeir;	
		endforeach;	   		  
		if($maxeir==''){
			$c_numeir=1;
		}else{
			$c_numeir=$maxeir+1;
		}
		//Fin Obtener c_numeir
		//campos solo EIR ENTRADA POR CAMBIO
		$alm->sw_cambio='1';
		$alm->c_numped = $_REQUEST['c_numped'];	
		////fin campos solo EIR ENTRADA POR CAMBIO
		
		$alm->c_tipoio = $c_tipoio='1'; //ENTRADA
		$alm->c_serie = '';
		$alm->c_numeir = $c_numeir;
		if($c_tipoio=='1'){ //INGRESO
			$alm->c_nroeiring = $c_numeir;				
			$alm->c_nroeirsal = '0';
		}/*else if($c_tipoio=='2'){ //salida
			$alm->c_nroeiring = '0';				
			$alm->c_nroeirsal = $c_numeir;		
		}*/
		$alm->c_numguia = isset($_REQUEST['c_numguia'])?$_REQUEST['c_numguia']:"";
		$alm->c_codcli = $_REQUEST['c_codcli'];	
		$alm->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));	
		$alm->c_nomtec =  utf8_decode(mb_strtoupper($_REQUEST['c_nomtec']));			
		$alm->c_fecdoc =  date("d/m/Y H:i:s");//fecha eir
		$alm->transportista = utf8_decode(mb_strtoupper($_REQUEST['transportista']));	
		$alm->c_ructra =  $_REQUEST['c_ructra'];
		$alm->c_placa1 = $_REQUEST['c_placa'];	//el mismo que c_placa de cabguia
		$alm->c_placa2 = $_REQUEST['c_placa2'];	//el mismo que c_placa2 de cabguia

		$alm->c_chofer = utf8_decode(mb_strtoupper($_REQUEST['c_chofer']));				
		$alm->c_licencia =  $_REQUEST['c_licenci'];	//el mismo que c_licenci de cabguia		
		/*$alm->c_fechora = $_REQUEST['c_fechora'];	//Fecha y Hora salida y/o llegada
		if($alm->c_fechora==''){
			$alm->c_fechora=NULL;
		}*/
		$alm->c_fechora=$_REQUEST['c_fechora']." ".$_REQUEST['hora'];//Fecha y Hora salida y/o llegada
		if($_REQUEST['c_fechora']==''){
			$alm->c_fechora=NULL;
		}
		$alm->c_condicion = $_REQUEST['c_condicion'];	
		$alm->c_tipois = '';
		$alm->c_tipo = $_REQUEST['c_tipo'];	
		$alm->c_tipo2 = $_REQUEST['c_tipo2'];	
		$alm->c_tipo3 = (isset($_REQUEST['c_tipo3'])?$_REQUEST['c_tipo3']:''); /////////aquiiiiiiiiiiii
		$alm->c_obs = utf8_decode(mb_strtoupper($_REQUEST['c_obs']));	
		$alm->c_combu = (isset($_REQUEST['c_combu'])?$_REQUEST['c_combu']:'');	
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;	
		$alm->c_usuario =  $login;
		$alm->c_precinto = $_REQUEST['c_precinto'];	
		$alm->c_obstip3 = '';
		$alm->c_almacen = (isset($_REQUEST['c_almacen'])?$_REQUEST['c_almacen']:'');
		
		$alm->c_fechorareg = date("d/m/Y H:i:s");				
		$alm->c_estado =  '';			
		$alm->c_precintocli = $_REQUEST['c_precintocli'];	
		$alm->psalida = $_REQUEST['psalida'];	
		$alm->pllegada = $_REQUEST['pllegada'];
		$alm->ptosalida = $_REQUEST['ptosalida'];	
		$alm->ptollegada = $_REQUEST['ptollegada'];	
		$alm->c_obseir = utf8_decode(mb_strtoupper($_REQUEST['c_obseir']));			
		$alm->tipoclase = (isset($_REQUEST['tipoclase'])?$_REQUEST['tipoclase']:'');	
		$alm->c_est = '1';	//1 activo y 4 eliminado
		$alm->c_coddepi = '';
		$alm->c_desdepi = '';
		$alm->c_coddepf = '';
		$alm->c_desdepf = '';
		$alm->c_motivo= $_REQUEST['c_motivo'];
		$alm->c_numeoc= (isset($_REQUEST['c_numeoc'])?$_REQUEST['c_numeoc']:''); //REGISTRO EIR POR ORDEN DE COMPRA
		$alm->c_depsal= $_REQUEST['c_depsal'];
		$alm->c_deping= $_REQUEST['c_deping'];
		$this->model->GuardarCabEir($alm) ; //REGISTRAR CABEIR			
		//Detalle
		$alm->c_numeir=$c_numeir;
		$alm->c_idequipo=$_REQUEST['c_idequipo'];
		$alm->c_codcia='';
		$alm->c_codtda='';
		$alm->c_codprod=$_REQUEST['c_codprod'];//CODIGO
		$alm->c_codprd=$_REQUEST['c_codprd'];//DESCRIPCION
		$alm->c_nserie=$_REQUEST['c_nserie'];
		$alm->c_codtra=$_REQUEST['c_ructra'];
		$alm->c_codanx='';
		$alm->d_fecing=$_REQUEST['c_fechora'];	//Fecha y Hora salida y/o llegada
		if($alm->d_fecing==''){
			$alm->d_fecing=NULL;
		}
		$alm->c_nrodoc=(isset($_REQUEST['c_numeoc'])?$_REQUEST['c_numeoc']:'');//REGISTRO EIR POR ORDEN DE COMPRA
		$alm->c_nronis='';
		$alm->c_nroot='';
		$alm->c_sitalm='D';//$_REQUEST['c_sitalm'];//** */
		// $alm->c_codsit=$_REQUEST['c_sitalm'];
		$alm->c_codalm='D';//$_REQUEST['c_sitalm'];//*** */
		$alm->c_tiprop=isset($_REQUEST['c_tiprop'])?$_REQUEST['c_tiprop']:'';
		$alm->d_fcrea = date("d/m/Y H:i:s");			
		$alm->c_ucrea=$login;
		$alm->d_fecreg=date("d/m/Y H:i:s");
		$alm->c_oper=$login;
		$alm->c_usuario=$login;
			
		///ACTUALIZAR EQUIPO(invequipo)
		///campos en comun SOLO para Registrar EquipoHistorialEir
		$alm->c_codprod=$_REQUEST['c_codprod'];//TODOS//CODIGO
		$alm->c_ucrea = $login;//TODOS
		$alm->d_fcrea = date("d/m/Y H:i:s");//TODOS	
		$alm->c_oper = $login;//TODOS
		$alm->d_fecreg = date("d/m/Y H:i:s");//TODOS
		
		$alm->c_codcia='01';//TODOS
		$alm->c_codtda='000';//TODOS
		$alm->d_fecing=date("d/m/Y H:i:s");	//TODOS
		//FIN campos en comun SOLO para Registrar EquipoHistorialEir
			
		$alm->c_numeir=$c_numeir;//TODOS CUANDO INGRESA POR EIR SALIDA
		$alm->c_numeoc=(isset($_REQUEST['c_numeoc'])?$_REQUEST['c_numeoc']:'');//TODOS CUANDO INGRESA POR UNA ORDEN DE COMPRA
		$alm->c_idequipo = $_REQUEST['c_idequipo']; //todos		
		
		$valor=$_REQUEST['valor']; //D,R,G,C,T
		//echo  $alm->__SET('c_anno',$_REQUEST[$valor.'c_anno']);		
		$alm->c_anno =  $_REQUEST[$valor.'c_anno'];//D,R,G,C,T	
		$alm->c_mes = $_REQUEST[$valor.'c_mes'];	//D,R,G,C,T	
		$alm->c_codcol = $_REQUEST[$valor.'c_codcol'];//D,R,G,C,T		
		$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];//D,R,G,C,T	
		$alm->c_procedencia = $_REQUEST[$valor.'c_procedencia'];//D,R,G,C,T
		
		$alm->c_tara = $_REQUEST[$valor.'c_tara'];//D,R,G,C,T
		$alm->c_peso = $_REQUEST[$valor.'c_peso'];//D,R,G,C,T

		$alm->c_codsit = 'D';//$_REQUEST['c_sitalm'];
		$alm->c_codsitalm = 'D';//$_REQUEST['c_sitalm'];
		/*$alm->c_nacional = $_REQUEST[$valor.'c_nacional'];//D,R,G,C,T
		$alm->c_refnaci = $_REQUEST[$valor.'c_refnaci'];//D,R,G,C,T
		$alm->c_fecnac = $_REQUEST[$valor.'c_fecnac'];//D,R,G,C,T*/
		
		
		if($valor=='D' || $valor=='R'){	//dry y reefer
	    	$alm->c_fabcaja = $_REQUEST[$valor.'c_fabcaja'];//D,R
			$alm->c_material = $_REQUEST[$valor.'c_material'];//D,R		
		}else{
			$alm->c_fabcaja = '';//D,R
			$alm->c_material = '';//D,R	
		}
		
		if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' ){	
	    	$alm->c_cmodel = isset($_REQUEST[$valor.'c_cmodel'])?$_REQUEST[$valor.'c_cmodel']:"";//R,G,C,T
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
		$alm->c_codmod = (isset($_REQUEST['c_codmod'])?$_REQUEST['c_codmod']:'');
		$alm->c_control = (isset($_REQUEST['c_control'])?$_REQUEST['c_control']:'');
		$alm->c_codest = (isset($_REQUEST['c_codest'])?$_REQUEST['c_codest']:'');
		$alm->c_codcat = (isset($_REQUEST['c_codcat'])?$_REQUEST['c_codcat']:'');
		$alm->n_costo_c = (isset($_REQUEST['n_costo_c'])?$_REQUEST['n_costo_c']:0);
		$alm->n_costo_m = (isset($_REQUEST['n_costo_m'])?$_REQUEST['n_costo_m']:0);
		$alm->n_deprec = (isset($_REQUEST['n_deprec'])?$_REQUEST['n_deprec']:0);
		$alm->c_costadu = (isset($_REQUEST['c_costadu'])?$_REQUEST['c_costadu']:0);
		$alm->c_costmar = (isset($_REQUEST['c_costmar'])?$_REQUEST['c_costmar']:0);
		$alm->c_costage = (isset($_REQUEST['c_costage'])?$_REQUEST['c_costage']:0);
		$alm->c_costalm = (isset($_REQUEST['c_costalm'])?$_REQUEST['c_costalm']:0);
		$alm->c_costotr = (isset($_REQUEST['c_costotr'])?$_REQUEST['c_costotr']:0);
		$alm->c_preclist = (isset($_REQUEST['c_preclist'])?$_REQUEST['c_preclist']:0);
		$alm->c_precvent = (isset($_REQUEST['c_precvent'])?$_REQUEST['c_precvent']:0);
		$alm->c_serieant = (isset($_REQUEST['c_serieant'])?$_REQUEST['c_serieant']:'');
		$alm->c_costgute = (isset($_REQUEST['c_costgute'])?$_REQUEST['c_costgute']:0);
		$alm->c_equipoesta = (isset($_REQUEST['c_equipoesta'])?$_REQUEST['c_equipoesta']:'');
		$alm->C_SITUANT = (isset($_REQUEST['C_SITUANT'])?$_REQUEST['C_SITUANT']:'');
		$alm->n_tara = (isset($_REQUEST[''])?$_REQUEST['']:'');
		$alm->n_maxpeso = (isset($_REQUEST['n_tara'])?$_REQUEST['n_tara']:'');
		$alm->c_nacional = (isset($_REQUEST['c_nacional'])?$_REQUEST['c_nacional']:'');
		$alm->c_refnaci = (isset($_REQUEST['c_refnaci'])?$_REQUEST['c_refnaci']:'');
		$alm->c_opermod = (isset($_REQUEST['c_opermod'])?$_REQUEST['c_opermod']:'');
		$alm->c_fecmod = (isset($_REQUEST['c_fecmod'])?$_REQUEST['c_fecmod']:'');
		$alm->c_estaresv = (isset($_REQUEST['c_estaresv'])?$_REQUEST['c_estaresv']:'');

		$this->model->GuardarDetEir($alm) ; //REGISTRAR DETEIR	
		$c_numeirSal=$_REQUEST['c_numeir'];		
		$this->model->UpdCabEirSalida($c_numeirSal,$c_numeir) ; //registrar c_nroeiring al EIR de salida(ACTUALIZAR EIR SALIDA)
		$this->maestroinv->insertarHistorialEquipo($_REQUEST['c_idequipo'], $login);
		$this->modelEIR->ActualizarEquipo2($alm);
		//VOLVER    
		//header('Location: indexinv.php?c=inv03');
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/Reportes/vistapreviaeir.php';
		require_once 'view/principal/footer.php';
				
	}//FIN GuardarRegEir
	
	public function BuscarEirDevolucion(){		
		print_r(json_encode($this->model->BuscarEirDevolucion($_REQUEST['criterio'])));
	}	
}