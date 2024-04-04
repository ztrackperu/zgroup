<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  


require_once 'model/inventario/maestrosinvM.php';
require_once 'model/inventario/procesoseirM.php';

class ProcesoseirController{
    
	private $model;
    
	public function __CONSTRUCT(){
		$this->model = new Procesoseir();
		$this->maestroinv = new Maestrosinv();
		$this->maestro = new Maestros();		
		$this->login = new Login();
	}
	public static function array_utf8_encode($dat){
		if(is_null($dat))
			return '';
    if (is_string($dat))
        return utf8_encode($dat);
    if (!is_array($dat))
        return $dat;
    $ret = array();
    foreach ($dat as $i => $d)
        $ret[$i] = self::array_utf8_encode($d);
    return $ret;
	}
	public function VerChoferes(){		
		require_once 'view/inventario/verChoferes.php';	
	}		
	
	/////////PROCESOS DE EIR ENTRADA////////////////////////////////////////////////////////////////////////////////////
	public function ListaEirEntrada(){ //EIR ENTRADA PENDIENTES	
		//$url='?c=inv03&a=BusquedaEquipoSalida';	//url del formulario de busquedaproducto.php
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/listaEirEntraPend.php';
		require_once 'view/principal/footer.php';
	} //fin ListaEirEntrada
	
	public function ListaEirEntradaPendOc(){//EIR ENTRADA PENDIENTES	POR ORDEN DE COMPRA
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/listaEirEntraPendOc.php';
		require_once 'view/principal/footer.php';	
	}//fin ListaEirEntradaPendOc
	
	public function ListaEirEntradaPendOc2(){//EIR ENTRADA PENDIENTES	POR ORDEN DE COMPRA2
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/listaEirEntraPendOc2.php';
		require_once 'view/principal/footer.php';	
	}//fin ListaEirEntradaPendOc
	
	public function InicioRegEirEntrada(){	
		$titulo='BUSCAR PRODUCTO PARA REGISTRAR EIR ENTRADA';	
		$url='?c=inv03&a=BusquedaEquipoEntrada';	//url del formulario de busquedaproducto.php
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/busquedaproducto.php';
		require_once 'view/principal/footer.php';
    }//FIN InicioRegEirEntrada
	public function BusquedaEquipoEntrada(){		    	
			$descripcion=$_REQUEST['in_codi'];	  	    
		   	if($descripcion=='CONTENEDOR DRY'  ){  //contenedores dry
			$cod_tipo='001';    
			}elseif($descripcion=='CONTENEDOR REEFER'){  //contenedores reefer 
			$cod_tipo='002'; 
			}elseif($descripcion=='GENERADOR'){  //generadores
			$cod_tipo='003'; 
			}elseif($descripcion=='CARRETA CONTAINERA'){ //carretas
			$cod_tipo='004'; 
			}elseif($descripcion=='TRANSFORMADOR'){ //transformadores 
			$cod_tipo='012';  
			}					  			
			if($cod_tipo!=NULL){ 
				$titulo='REGISTRAR EIR ENTRADA DE '.$descripcion;	
				$url='?c=inv03&a=RegEirEntrada'; //url del formulario de busquedaequipo.php	
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php'; 		
			}
    }   //fin  BusquedaEquipoEntrada
	
	public function RegEirEntrada(){	
		$tipoDoc='ENTRADA';
		$serie=$_REQUEST['cadena1'];		
		$ListarEquipos=$this->maestroinv->ListarEquiposSerie($serie);
		if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($serie);	
			$cod_tipo=$equi->COD_TIPO;
			$sitalm=$equi->c_codsitalm;	
			if($sitalm=="D" || $sitalm=="V" || $sitalm=="T"){
				$mensaje="El Equipo tiene Estado de Almacen ".$sitalm;
				print "<script>alert('$mensaje')</script>";					
				$descripcion=$_REQUEST['descripcion'];	
				$cod_tipo=$_REQUEST['cod_tipo'];	
				$titulo='REGISTRAR EIR ENTRADA DE '.$descripcion;
				$url='?c=inv03&a=RegEirEntrada'; //url del formulario de busquedaequipo.php	
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php';
			}else{
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/regeir-updequipo.php';
			require_once 'view/principal/footer.php'; 
			}
		}else{
		$descripcion=$_REQUEST['descripcion'];
		$cod_tipo=$_REQUEST['cod_tipo'];
		    if($cod_tipo=='001'  ){  //contenedores dry
			 $c_idequipo='C-'.$serie;    
			}else if($cod_tipo=='002'){  //contenedores reefer 
			 $c_idequipo='C-'.$serie;  
			}else if($cod_tipo=='003'){  //generadores
			 $c_idequipo='G-'.$serie;  
			}else if($cod_tipo=='004'){ //carretas
			 $c_idequipo='S-'.$serie;  
			}else if($cod_tipo=='012'){ //transformadores 
			 $c_idequipo='T-'.$serie;    
			}			
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/regeir-regequipo.php';
		require_once 'view/principal/footer.php';
		}
    }//FIN RegEirEntrada
	
	
	/////////PROCESOS DE EIR SALIDA////////////////////////////////////////////////////////////////////////////////////
	public function ListaEirSalida(){
		/*$tipo='SALIDA';	
		$url='?c=inv03&a=InicioRegEirSalida';
		$url2='?c=inv03&a=InicioRegEirSalidaPendientes';
		$c_tipoio='2';		
		$listaeir=$this->model->ListarEir($c_tipoio);			
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/admineir.php';
		require_once 'view/principal/footer.php';
		*/
		$titulo='LISTADO DE EIR SALIDA';	
		$url='?c=inv03&a=BusquedaEquipoSalida';	//url del formulario de busquedaproducto.php
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/listaEirSalPend.php';
		require_once 'view/principal/footer.php';
	}	
	public function InicioRegEirSalidaPendientes(){	
		/*$titulo='LISTADO DE EIR SALIDA';	
		$url='?c=inv03&a=BusquedaEquipoSalida';	//url del formulario de busquedaproducto.php
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/listaEirSalPend.php';
		require_once 'view/principal/footer.php';
		*/
		$tipo='SALIDA';	
		$url='?c=inv03&a=InicioRegEirSalida';
		$url2='?c=inv03&a=InicioRegEirSalidaPendientes';
		$c_tipoio='2';		
		$listaeir=$this->model->ListarEir($c_tipoio);			
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/admineir.php';
		require_once 'view/principal/footer.php';
		
		
    }//FIN RegEirEntrada
	public function InicioRegEirSalida(){	
		$titulo='BUSCAR PRODUCTO PARA REGISTRAR EIR SALIDA';	
		$url='?c=inv03&a=BusquedaEquipoSalida';	//url 
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
        require_once 'view/inventario/busquedaproducto.php';
		require_once 'view/principal/footer.php';
    }//FIN InicioRegEirSalida	
	
	public function BusquedaEquipoSalida(){		    	
			$descripcion=$_REQUEST['in_codi'];	  	    
		   	if($descripcion=='CONTENEDOR DRY'  ){  //contenedores dry
			$cod_tipo='001';    
			}elseif($descripcion=='CONTENEDOR REEFER'){  //contenedores reefer 
			$cod_tipo='002'; 
			}elseif($descripcion=='GENERADOR'){  //generadores
			$cod_tipo='003'; 
			}elseif($descripcion=='CARRETA CONTAINERA'){ //carretas
			$cod_tipo='004'; 
			}elseif($descripcion=='TRANSFORMADOR'){ //transformadores 
			$cod_tipo='012';  
			}					  			
			if($cod_tipo!=NULL){ 
				$titulo='REGISTRAR EIR SALIDA DE '.$descripcion;	
				$url='?c=inv03&a=RegEirSalida'; //url del formulario de busquedaequipo.php				
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php'; 		
			}
    }   //fin  BusquedaEquipoSalida
		
	public function RegEirSalida(){			
		$tipoDoc='SALIDA';
		$serie=$_REQUEST['cadena1'];		
		$ListarEquipos=$this->maestroinv->ListarEquiposSerie($serie);
		if($ListarEquipos!=NULL){
		    $equi=$this->maestroinv->ListarEquiposSerie($serie);	
			$cod_tipo=$equi->COD_TIPO;
			$sitalm=$equi->c_codsitalm;	
			if($sitalm=="T"){ //solo transformado porque el equipo ya cambio de estado(V,A,M,R) con la guia
				$mensaje="El Equipo tiene Estado de Almacen ".$sitalm;
				print "<script>alert('$mensaje')</script>";					
				$descripcion=$_REQUEST['descripcion'];	
				$cod_tipo=$_REQUEST['cod_tipo'];	
				$titulo='REGISTRAR EIR SALIDA DE '.$descripcion;
				$url='?c=inv03&a=RegEirEntrada'; //url del formulario de busquedaequipo.php					
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php';
			}else{
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/regeirsal-updequipo.php';
			require_once 'view/principal/footer.php'; 
			}
		}else{
				$mensaje="Equipo no existe";
				print "<script>alert('$mensaje')</script>";					
				$descripcion=$_REQUEST['descripcion'];	
				$cod_tipo=$_REQUEST['cod_tipo'];	
				$titulo='REGISTRAR EIR SALIDA DE '.$descripcion;
				$url='?c=inv03&a=RegEirSalida'; //url del formulario de busquedaequipo.php	
				require_once 'view/principal/header.php';
				require_once 'view/principal/principal.php';
				require_once 'view/inventario/busquedaequipo.php';
				require_once 'view/principal/footer.php';
		}    
    }//FIN RegEirSalida	
	
	public function RegEirSalidaGuia(){			
		$tipoDoc='SALIDA';
		$c_numguia=$_REQUEST['c_numguia'];
		$serie=$_REQUEST['serie'];		
		$listaEirSalGuia=$this->model->listaEirSalGuia($c_numguia,$serie);	
		$c_depentrega=$listaEirSalGuia->c_depentrega; //DEPARTAMENTO DESTINO
		$equi=$this->maestroinv->ListarEquiposSerie($serie);	
		$cod_tipo=$equi->COD_TIPO;		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/regeirsalguia-updequipo.php';
		require_once 'view/principal/footer.php';
	}//FIN RegEirSalidaGuia	
	 
	
	public function GuardarRegEirEntrada(){ //EIR ENTRADA
		// var_dump($_REQUEST);
		// die();
		
		$seguir=false;
		
		$alm = new Procesoseir();
	  		//cabecera
		 //Obtener c_numeir	  
		foreach($this->model->ObtenerIdEir() as $eir):
			$maxeir = $eir->maxeir;	
			$seguir=true;
		endforeach;	   		  
		if($maxeir==''){
			$c_numeir=1;
		}else{
			$c_numeir=$maxeir+1;
			$seguir=true;
		}
		//Fin Obtener c_numeir		
		$alm->c_tipoio = $c_tipoio='1';
		$alm->c_serie = '';
		$alm->c_numeir = $c_numeir;
		if($c_tipoio=='1'){ //ingreso
			$alm->c_nroeiring = $c_numeir;				
			$alm->c_nroeirsal = '0';	
			$seguir=true;
		}/*else if($c_tipoio=='2'){ //salida
			$alm->c_nroeiring = '0';				
			$alm->c_nroeirsal = $c_numeir;		
		}*/
		$alm->c_numguia = isset($_REQUEST['c_numguia'])?$_REQUEST['c_numguia']:"";
		//Ingresos por Orden de compra
		if(!isset($_REQUEST['c_numguia']) || trim($alm->c_numguia)==''){ 
			$alm->c_numguia =$_REQUEST['c_numeoc'];
			$seguir=true;
		}
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
		} //fin Fecha y Hora salida y/o llegada
			
		$alm->c_condicion = $_REQUEST['c_condicion'];	
		$alm->c_tipois = '';
		$alm->c_tipo = $_REQUEST['c_tipo'];	
		$alm->c_tipo2 = $_REQUEST['c_tipo2'];	
		$alm->c_tipo3 = (isset($_REQUEST['c_tipo3'])?$_REQUEST['c_tipo3']:''); /////////aquiiiiiiiiiiii
		$alm->c_obs = utf8_decode(mb_strtoupper($_REQUEST['c_obs']));	
		$alm->c_combu = (isset($_REQUEST['c_combu'])?$_REQUEST['c_combu']:'');	
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;	
		$alm->c_usuario = $login;
		$alm->c_precinto = strtoupper($_REQUEST['c_precinto']);	
		$alm->c_obstip3 = '';
		$alm->c_almacen = (isset($_REQUEST['c_almacen'])?$_REQUEST['c_almacen']:'');		
		
		$alm->c_fechorareg = date("d/m/Y H:i:s");				
		$alm->c_estado =  '';			
		$alm->c_precintocli = strtoupper($_REQUEST['c_precintocli']);	
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
		
		/* inicio 11 02 2019 */
		if($seguir==true){
		$this->model->GuardarCabEir($alm) ; //REGISTRAR CABEIR
		}else{
			
			$mensajegrabar='Error Al Registrar';
			echo '<script>alert($mensajegrabar)</script>';
			return false;
			
		}
			
		/* fin 11 02 2019	*/
			
		//Detalle
		$alm->c_numeir=$c_numeir;
		$alm->c_idequipo=$_REQUEST['c_idequipo'];
		$alm->c_sitalm=$_REQUEST['c_sitalm'];
		$alm->c_codcia='';
		$alm->c_codtda='';
		$alm->c_codprod=$_REQUEST['c_codprod'];
		$alm->c_codprd=$_REQUEST['c_codprd'];
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
		//$alm->c_codmar=$_REQUEST['c_codmar'];
		//$alm->c_codmod=$_REQUEST['c_codmod'];
		//$alm->c_codcol=$_REQUEST['c_codcol'];
		//$alm->c_anno=$_REQUEST['c_anno'];
		//$alm->c_control=$_REQUEST['c_control'];
		//$alm->c_codest=$_REQUEST['c_codest'];
		//$alm->c_codcat=$_REQUEST['c_codcat'];
		$alm->c_codsit=$_REQUEST['c_sitalm'];
		$alm->c_tiprop=isset($_REQUEST['c_tiprop'])?$_REQUEST['c_tiprop']:'';
		/*$alm->n_costo_c=$_REQUEST['n_costo_c'];
		$alm->n_costo_m=$_REQUEST['n_costo_m'];
		$alm->n_deprec=$_REQUEST['n_deprec'];*/
		//$alm->c_mcamaq=$_REQUEST['c_mcamaq'];
		$alm->d_fcrea=$_REQUEST['c_fechora'];//Fecha y Hora salida y/o llegada
		if($alm->d_fcrea==''){
			$alm->d_fcrea=NULL;
		}
		$alm->c_ucrea=$login;
		$alm->d_fecreg=date("d/m/Y H:i:s");
		$alm->c_oper=$login;
		$alm->c_codalm=$_REQUEST['c_sitalm'];
		
		$alm->c_usuario=$login;
		

		//$this->model->GuardarDetEir($alm) ; //REGISTRAR DETEIR
			
		///ACTUALIZAR EQUIPO(invequipo)
		///campos en comun SOLO para Registrar EquipoHistorialEir
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
		
		if((isset($_REQUEST['c_idequipo'])&& $_REQUEST['c_idequipo']!='')){
		$alm->c_idequipo = $_REQUEST['c_idequipo']; //todos		
			$seguir=true;
		}else{
			$seguir=false;
			
		}

		$valor=$_REQUEST['valor']; //D,R,G,C,T
		//echo  $alm->__SET('c_anno',$_REQUEST[$valor.'c_anno']);		
		$alm->c_anno =  $_REQUEST[$valor.'c_anno'];//D,R,G,C,T	
		$alm->c_mes = $_REQUEST[$valor.'c_mes'];	//D,R,G,C,T	
		$alm->c_codcol = $_REQUEST[$valor.'c_codcol'];//D,R,G,C,T		
		$alm->c_codmar = $_REQUEST[$valor.'c_codmar'];//D,R,G,C,T	
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
		
		if($valor=='G' || $valor=='R' || $valor=='C' || $valor=='T' || $valor=='K' ){	
	    	$alm->c_cmodel = isset($_REQUEST[$valor.'c_cmodel'])?$_REQUEST[$valor.'c_cmodel']:"";//R,G,C,T
		}else{
			$alm->c_cmodel = '';//R,G,C,T	
			}
		
		if($valor=='G' || $valor=='R'  || $valor=='T' || $valor=='K' ){	    	
			$alm->c_serieequipo = $_REQUEST[$valor.'c_serieequipo'];//R,G,T
		}else{
			$alm->c_serieequipo ='';
		}
		
		if($valor=='G' || $valor=='T' || $valor=='K' ){	    	
			$alm->c_seriemotor = $_REQUEST[$valor.'c_seriemotor'];//G,T
		}else{
			$alm->c_seriemotor ='';
			}
		if($valor=='C' || $valor=='G'|| $valor=='T' || $valor=='K' ){	
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
//		$alm->c_nacional = (isset($_REQUEST['c_nacional'])?$_REQUEST['c_nacional']:'');
//		$alm->c_refnaci = (isset($_REQUEST['c_refnaci'])?$_REQUEST['c_refnaci']:'');
//		$alm->c_opermod = (isset($_REQUEST['c_opermod'])?$_REQUEST['c_opermod']:'');
//		$alm->c_fecmod = (isset($_REQUEST['c_fecmod'])?$_REQUEST['c_fecmod']:'');
		$alm->c_estaresv = (isset($_REQUEST['c_estaresv'])?$_REQUEST['c_estaresv']:'');
		$alm->c_codanx = (isset($_REQUEST['c_codcli'])?$_REQUEST['c_codcli']:'');
		$alm->alt_piso = (isset($_REQUEST['alt_piso'])?$_REQUEST['alt_piso']:'');
		$alm->categoria = (isset($_REQUEST['categoria'])?$_REQUEST['categoria']:'');
		$alm->c_fisico = date("d/m/Y");
		$alm->Galternadorgenserie =(isset($_REQUEST['Galternadorgenserie'])?$_REQUEST['Galternadorgenserie']:'');
		$alm->Gcontroladorgenserie =(isset($_REQUEST['Gcontroladorgenserie'])?$_REQUEST['Gcontroladorgenserie']:'');
		$alm->c_compresormaq =(isset($_REQUEST['Mc_compresormaq'])?$_REQUEST['Mc_compresormaq']:'');
		$alm->relay =(isset($_REQUEST['Mrelay'])?$_REQUEST['Mrelay']:'');
		$alm->tipocompresor =(isset($_REQUEST['Mtipocompresor'])?$_REQUEST['Mtipocompresor']:'');
		$alm->afam =(isset($_REQUEST['Mafam'])?$_REQUEST['Mafam']:'');

		// var_dump($alm);
		//die();
		
		//* 11 02 2019*/
		if($seguir==true){
		$this->model->GuardarDetEir($alm); //REGISTRAR DETEIR (detalle EIR)
		}else{
			return false;		
		}
		//11 02 2019 */
		
		
		//INGRESO POR EIR SALIDA
		if(isset($_REQUEST['c_numeir']) && $_REQUEST['c_numeir']!=""){
			$this->maestroinv->insertarHistorialEquipo($_REQUEST['c_idequipo'], $login);
			$c_numeirSal=$_REQUEST['c_numeir'];				
			$this->model->UpdCabEirSalida($c_numeirSal,$c_numeir) ; //registrar c_nroeiring al EIR de salida(ACTUALIZAR EIR SALIDA)
			$this->model->ActualizarEquipo2($alm); //ACTUALIZAR EQUIPO EN invequipo	
			$this->model->DesbloquearEquipo($_REQUEST['c_idequipo']); 
			//1. ENVIO DE CORREO ELECTRONICO CUANDO REGISTRO EIR DE INGRESO POR devolucion de EQUIPO	
			$c_numeir=$c_numeir;
			$c_numeirSalida=$c_numeirSal;
			$proveedor=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
			//detalle
			$nombreproducto=$_REQUEST['c_codprd'];	
			$codigoequipo=$_REQUEST['c_idequipo'];
			$usuario=$login; //usuario registra												
			$tipomov='REGISTRO EIR POR DEVOLUCION DE EQUIPO';
			$guiaremision=$_REQUEST['c_numguia'];
			$tipo=$_REQUEST['c_sitalmAntes'];
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/inventario/enviowebsinoc.php';
			require 'view/principal/footer.php';

		//INGRESO POR ORDEN DE COMPRA (EQUIPO NUEVO)								
		}else if(isset($_REQUEST['c_numeoc']) && $_REQUEST['c_numeoc']!=""){
			//Se agrega esta linea ya que $_REQUEST['c_codprod'] es el codigo del equipo, $_REQUEST['c_codprd'] es el nombre
			$alm->c_codprd = $_REQUEST['c_codprod'];
			//validar si existe equipo(si es una regularizacion en adminequipo.php)	
			$BusEquipo=$this->maestroinv->ValidarSerieEquipo($_REQUEST['c_nserie']);
			if($BusEquipo!=NULL){
				$mensaje="Equipo Regularizado Correctamente";
				print "<script>alert('$mensaje')</script>";	
				$this->model->ActualizarEquipo2($alm); //ACTUALIZAR EQUIPO EN invequipo
			}else{
				$mensaje="Equipo Registrado Correctamente";
				print "<script>alert('$mensaje')</script>";	
				$this->model->RegistrarEquipo($alm); //REGISTRAR EQUIPO EN invequipo
			}
			//guardar notmae 
			//CABECERA
			$ObtenerId=$this->model->ObtenerIdNotaIngreso();
			$NewId=substr($ObtenerId->maxnotas, -7)+1;
			$alm->NT_NDOC=$NT_NDOC='I'.str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
			$alm->NT_TDOC='I';//I
			$alm->NT_TRAN='02';			
			$alm->NT_TREM='@';
			$alm->NT_SERIR='000';
			$alm->NT_DOCR=$c_numeir;
			$alm->NT_REMI=$NT_REMI='M'.'000'.$c_numeir;			
			$alm->NT_CCLI=$_REQUEST['c_codcli'];
			$alm->NT_FDOC=$_REQUEST['c_fechora'];
			if($_REQUEST['c_fechora']==''){
				$alm->NT_FDOC=NULL;
			}
			$alm->NT_OBS=" ";
			$alm->NT_ESTA='3';
			$alm->NT_TIPO='P';
			$alm->NT_NEXT=NULL;
			$alm->NT_FREG=date("d/m/Y H:i:s");
			$alm->NT_OPER=$login;
					
			$ObtenerIdReg=$this->model->ObtenerIdRegNota();
			$NewIdReg=$ObtenerIdReg->maxidreg;
			$alm->n_idreg=$NewIdReg+1;
						
			//$alm->n_id=$_REQUEST['n_id'];//AUTOGENERADO
			//OBTENER TIPO DE CAMBIO DE LA FECHA DE EIR
			$fecha=$_REQUEST['c_fechora'];
			$tipdia=$this->maestro->ListaTipoCambioDia($fecha);
			//tipo de cambio del dia: falta
			// $tcambio=0;
			if(isset($tipdia->TC_VTA) && $tipdia->TC_VTA!=NULL){
				$tcambio=$tipdia->TC_VTA;	
			}else{
				$tcambio=$_REQUEST['NT_TCAMB'];	 
			}
			$alm->NT_TCAMB=$tcambio;
			$alm->NT_MONE=$_REQUEST['c_codmon'];
			$alm->NT_SWOC='1';
			$alm->NT_NOC=$_REQUEST['c_numeoc'];
			$alm->NT_FGUI=$_REQUEST['c_fechora'];
			if($_REQUEST['c_fechora']==''){
				$alm->NT_FGUI=NULL;
			}
			$alm->NT_CTR=$_REQUEST['c_ructra'];						
			$NT_GTR='M'.'/'.'000'.$c_numeir;//numero Guia Transportista
			$alm->NT_GTR=$NT_GTR;			
			$alm->NT_CLAPC='P';			
			$NT_GPRV='M'.'000'.$c_numeir;
			$alm->NT_GPRV=$NT_GPRV;
			//$alm->NT_OPMOD=$_REQUEST['NT_OPMOD'];
			//$alm->NT_FMOD=$_REQUEST['NT_FMOD'];
			$alm->NT_DATE=date("d/m/Y H:i:s");
			$alm->NT_FRP=$_REQUEST['c_fechora'];
			if($_REQUEST['c_fechora']==''){
				$alm->NT_FRP=NULL;
			}
			$alm->NT_TITRA='F';
			$alm->NT_MOTRA=NULL;
			$alm->NT_MONEG='0';
			$alm->NT_MONTO='0';
			$alm->NT_ESTIBA='0';
			$alm->c_codcia='01';
			$alm->c_codtda='000';
			$alm->c_codalm='000001';
			$alm->c_codalm_d='ALMDES';
			$alm->c_NumOT = '';
			$alm->NT_RESPO = '';
			$this->model->GuardarCabNotaIngreso($alm); 
				
			//DATOS GUARDAR notmov
			//$alm->NT_NDOC=$_REQUEST['NT_NDOC'];
			//$alm->NT_TDOC='I';
			$alm->NT_CART=$_REQUEST['c_codprod']; 
			$alm->NT_CUND='UND';
			$alm->NT_CANT='1';
			$alm->NT_PREC=$_REQUEST['n_preprd']; //
			$alm->NT_COST=$_REQUEST['n_preprd']; //
			//$alm->c_producto=$c_producto=$_REQUEST['c_producto'.$i]; 
			$alm->c_observ='INGRESO POR EL SISTEMA INTRANET V2';			
			$alm->NT_FREG=date("d/m/Y H:i:s");
			$alm->NT_OPER=$login;			
			$alm->n_idreg=$NewIdReg+1;
			//$alm->n_id=$_REQUEST['n_id'];
			$alm->NT_TMOV='C';
			$alm->NT_TCLAV=NULL;
			$alm->NT_CLAVE=NULL;
			//$alm->NT_OPMOD=$_REQUEST['NT_OPMOD'];
			//$alm->NT_FMOD=$_REQUEST['NT_FMOD'];
			$alm->NT_FLETE='0';
			$alm->c_codcia='01';
			$alm->c_codtda='000';
			$alm->c_codalm='000001';
			$alm->c_idequipo=$_REQUEST['c_idequipo'];
			$alm->NT_SERIE=$NT_SERIE=$_REQUEST['c_nserie'];
			$alm->NT_LOTE=NULL;
			//$alm->C_SITUANT=$_REQUEST['C_SITUANT'.$i];
			$alm->n_preciocost=$_REQUEST['n_preprd'];//CAMPO NUEVO
			$alm->n_preciovta=$_REQUEST['n_preprd'];//CAMPO NUEVO		
			$alm->c_producto = '';				
			$this->model->GuardarDetNotaIngreso($alm);
			//FIN DATOS GUARDAR notmov			
			//DATOS GUARDAR invmov
			$alm->IN_TRAN='02';
			$alm->IN_CODI=$_REQUEST['c_codprod'];
			$alm->IN_CODI;
			$alm->IN_LINE = (isset($i)?substr($_REQUEST['c_codprod'.$i],0,3):substr($_REQUEST['c_codprod'],0,3));
			$alm->IN_CUND='UND';
			$alm->IN_REMI=$NT_REMI;
			$alm->IN_TDOC='I';
			$alm->IN_SERI=NULL;
			$alm->IN_DOC='I'.str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE I0001321;			
			if($_REQUEST['c_codmon']=='0'){ //el precio ya esta en soles	
				$alm->IN_COST=$_REQUEST['n_preprd'];
				$alm->IN_PVTA=$_REQUEST['n_preprd'];
			}else{ //el precio esta en dolares
				$alm->IN_COST=$_REQUEST['n_preprd']*$tcambio;
				$alm->IN_PVTA=$_REQUEST['n_preprd']*$tcambio;
			}			
			$alm->IN_CANT='1';
			$alm->IN_FMOV=$_REQUEST['c_fechora'];
				if($_REQUEST['c_fechora']==''){
					$alm->IN_FMOV=NULL;
				}
			$alm->IN_ESTA='1'; //SALIDA 0, INGRESO 1
			$alm->IN_FREG=date("d/m/Y H:i:s");
			$alm->IN_OPER=$login;	
												
			$ObtenerIdRegInvmov=$this->model->ObtenerIdRegInvmov();//OBTENER n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
			$NewIdRegInvmov=$ObtenerIdRegInvmov->maxidreg+1;
			$alm->n_idregInvmov=$NewIdRegInvmov; //n_idreg de invmov (SON LOS MISMOS POR CADA NOTA)				
			//$alm->n_id=$_REQUEST['n_id'];//autonumeracion				
			$alm->IN_NOC=$_REQUEST['c_numeoc'];
			$alm->IN_CPRV=$_REQUEST['c_codcli'];
			$alm->IN_TCAM=$tcambio;
			$alm->IN_TMOV='C';
			$alm->C_REMI=NULL;
			$alm->IN_FCLI=NULL;
			$alm->c_anovou=NULL;//
			$alm->c_mesvou=NULL;//
			$alm->c_numvou=NULL;//
			//$alm->IN_OPMOD=$_REQUEST['IN_OPMOD'];
			//$alm->IN_FMOD=$_REQUEST['IN_FMOD'];
			$alm->c_codcia='01';
			$alm->c_codtda='000';
			$alm->c_codalm='000001';
			$alm->c_idequipo=$_REQUEST['c_idequipo'];
			$alm->n_itemOC=$_REQUEST['n_item']; 
			$this->model->GuardarInvmovNotaSal($alm);// va al costo(graba inmov)
			$this->model->UpdateCorrelativoInvmov($NewIdRegInvmov);//actualizar correlativo item_tab de invmov
			//FIN DATOS GUARDAR invmov	
			
			//actualizar correlativos notas agregado 27-10-2016						
			$this->model->UpdateItemNota($alm->n_idreg);//n_idreg
			$c_corre=str_pad($NewId, 7, '0', STR_PAD_LEFT);
			$this->model->UpdateCorrelativoNota($c_corre,'I');//$c_coddoc=I,S, c_corre=numero de NT_NDOC
			//fin actualizar correlativos						
			
			//ACTUALIZAR CANTIDAD DESPACHADA DE ITEM OC
			$this->model->UpdEstadoOC($_REQUEST['n_item'],$_REQUEST['c_numeoc'],'1') ;
			
			//ACTUALIZAR c_estado de cabeoc 
			$validardetaoc=$this->model->ValidarCantAlmOC($_REQUEST['c_numeoc']);
			if($validardetaoc!=NULL){
				$c_estado='1';//1 atencion parcial
			}else{
				$c_estado='2';//2 atencion total
			}
			$this->model->UpdEstadoCabeOC($_REQUEST['c_numeoc'],$c_estado);//1 atencion parcial y 2 atencion total
			//FIN ACTUALIZAR c_estado de cabeoc	
				
			//INICIO ACTUALIZAR DATOS EN invstkalm				
			//obtener stock producto
			$ValidarStock=$this->model->ValidarStock($_REQUEST['c_codprod']) ;
			$IN_STOK=$ValidarStock->IN_STOK;
			$IN_COST =$ValidarStock->IN_COST;						 				
			//aumentar stock	
			$nuevostock=$IN_STOK+1;								
			//calcular nuevo costo (costo promedio)	
			if($_REQUEST['c_codmon']=='0'){ //el precio ya esta en soles						
				$nuevocosto=($IN_STOK*$IN_COST+($_REQUEST['n_preprd']*1))/$nuevostock; //precio en soles
			}else{ //el precio esta en dolares
				$nuevocosto=($IN_STOK*$IN_COST+($tcambio*$_REQUEST['n_preprd']*1))/$nuevostock; //precio en soles
			}
			$IN_CTOUC=$_REQUEST['n_preprd'];
			$IN_FECUC=$_REQUEST['d_fecoc'];	
			if($IN_FECUC==NULL){
				$$IN_FECUC=NULL;
			}						
			$this->model->UpdStockProd($nuevostock,$nuevocosto,$IN_CTOUC,$IN_FECUC,$_REQUEST['c_codprod']);
			//FIN  ACTUALIZAR DATOS EN invstkalm
				
			$c_nrodoc='M'.'000'.$c_numeir;
			$c_nronis=$NT_NDOC; //NOTA DE INGRESO
			$this->model->UpdNotaInvequipo($NT_SERIE,$c_nronis,$c_nrodoc);//guardar nota de ingreso a invequipo								
					
			//2. ENVIO DE CORREO ELECTRONICO CUANDO REGISTRO EIR DE INGRESO POR ORDEN DE COMPRA	
			$c_numeir=$c_numeir;
			$c_numeoc=$_REQUEST['c_numeoc'];
			$proveedor=utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
			//detalle
			$nombreproducto=$_REQUEST['c_codprd'];	
			$codigoequipo=$_REQUEST['c_idequipo'];
			$usuario=$login; //usuario registra												
			$tipomov='REGISTRO EIR POR O/C';
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/inventario/envioweboc.php';
			require 'view/principal/footer.php';
										
		}									
			 //VOLVER    
        	//header('Location: indexinv.php?c=inv03');
			/*require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/vistapreviaeir.php';
			require_once 'view/principal/footer.php';	*/				
				
	}//FIN GuardarRegEir

//FIN MATENIMIENTOS EQUIPOS

/////******************* maly *******////

	public function RegEirEntradaEirSal(){
		$serie=$_REQUEST['c_nserie'];	
		//DATOS EQUIPO
		$equi=$this->maestroinv->ListarEquiposSerie($serie);	
		$cod_tipo=$equi->COD_TIPO;		
		//DATOS DOCUMENTO EIR SALIDA
		$c_numeir=$_REQUEST['c_numeir']; //EIR SALIDA
		$ObtenerDatos=$this->model->ObtenerDatosEirEntraPend($c_numeir);
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/regeirEntrada-updequipo.php'; 
		require_once 'view/principal/footer.php'; 	
	}
	public function RegEirEntradaOc(){	
		$serie=$_REQUEST['serie'];
		//DATOS PRODUCTO(invmae) 
		$equi=$this->model->ListarOcEquipo($serie);
		$cod_tipo=$equi->COD_TIPO;
		//DATOS DOCUMENTO ORDEN DE COMPRA			
		$c_codequipo=substr($equi->IN_ARTI,0,1).'-'.$serie;//codigo equipo
		$ObtenerDatos=$this->model->ListarOcEquipo($serie);
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/regeirEntrada-regequipo.php';
		require_once 'view/principal/footer.php';	
	}

public function RegEirEntradaReguOc(){ //llamado de adminequipo.php	
		$serie=$_REQUEST['serie'];
		//DATOS EQUIPO
		$equi=$this->maestroinv->ListarEquiposSerie($serie);	
		$cod_tipo=$equi->COD_TIPO;
		//DATOS DOCUMENTO ORDEN DE COMPRA			
		$c_codequipo=substr($equi->IN_ARTI,0,1).'-'.$serie;//codigo equipo
		$ObtenerDatos=$this->model->ListarOcEquipo($serie);		
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/regeirEntradaRegu-updequipo.php';
		require_once 'view/principal/footer.php';			
		/* $url='?c=inv01';
		echo "<a href=$url>Volver</a>";	*/	
}
/// fin maly*****////
public function consultarEirEntradaOC(){
	$listado = $this->model->consultarEirEntradaOC();
	$listado = $this->array_utf8_encode($listado); 
	if(isset($_REQUEST['returnAjax'])){
		header('Content-Type: application/json');
		echo json_encode($listado);
	}else{
		return $listado;
	}
}
public function consultarEirEntrada(){
	$listado = $this->model->consultarEirEntrada();
	$listado = $this->array_utf8_encode($listado); 
	if(isset($_REQUEST['returnAjax'])){
		header('Content-Type: application/json');
		echo json_encode($listado);
	}else{
		return $listado;
	}
}

public function consultarEirTodos(){
	$listado = $this->model->consultarEirTodos();
	$listado = $this->array_utf8_encode($listado); 
	if(isset($_REQUEST['returnAjax'])){
		header('Content-Type: application/json');
		echo json_encode($listado);
	}else{
		return $listado;
	}
}
/////******************* luis *******////
public function GuardarRegEirSalida(){ //EIR ENTRADA
		//echo 'hola';
		// var_dump($_REQUEST);
		// die();
		$alm = new Procesoseir();     
		//Obtener c_numeir	  
		foreach($this->model->ObtenerIdEir() as $eir):
			$maxeir = $eir->maxeir;	
		endforeach;	   		  
		if($maxeir==''){
			$c_numeir=1;
		}else{
			$c_numeir=$maxeir+1;//proximo EIR
		}
		
		
		
		$alm->c_tipoio = $c_tipoio='2';
		$alm->c_serie = '';
		$alm->c_numeir = $c_numeir;
		if($c_tipoio=='2'){ //SALIDA
			$alm->c_nroeiring = '0';			
			$alm->c_nroeirsal = $c_numeir;	
		}
		//Datos de cabecera
		$alm->c_numeoc= $_REQUEST['c_numeoc']; //REGISTRO EIR POR ORDEN DE COMPRA
		$item=$_REQUEST['item'];
		$alm->c_numguia = $_REQUEST['c_numguia'];
		$alm->c_motivo= $_REQUEST['c_motivo'];
		$alm->c_condicion = $_REQUEST['c_condicion'];	
		$alm->c_nomcli = utf8_decode(mb_strtoupper($_REQUEST['c_nomcli']));
		$alm->c_codcli = $_REQUEST['c_codcli'];
		$alm->c_tipo = $_REQUEST['c_tipo'];
		//Datos Transporte
		$alm->transportista = utf8_decode(mb_strtoupper($_REQUEST['transportista']));	
		$alm->c_ructra =  $_REQUEST['c_ructra'];
		$alm->c_chofer = utf8_decode(mb_strtoupper($_REQUEST['c_chofer']));
		$alm->c_licencia =  $_REQUEST['c_licenci'];	//el mismo que c_licenci de cabguia		
		$alm->c_fechora=$_REQUEST['c_fechora']." ".$_REQUEST['hora'];//Fecha y Hora salida y/o llegada
		if($_REQUEST['c_fechora']==''){
			$alm->c_fechora=NULL;
		}
		$alm->c_placa2 = $_REQUEST['c_placa2'];	//el mismo que c_placa2 de cabguia
		$alm->c_placa1 = $_REQUEST['c_placa'];	//el mismo que c_placa de cabguia
		$alm->c_nomtec =  utf8_decode(mb_strtoupper($_REQUEST['c_nomtec']));	
		$alm->psalida = $_REQUEST['psalida'];	
		$alm->pllegada = $_REQUEST['pllegada'];
		$alm->c_obseir = utf8_decode(mb_strtoupper($_REQUEST['c_obseir']));			
		$alm->c_depsal= $_REQUEST['c_depsal'];
		$alm->c_deping= $_REQUEST['c_deping'];
		$alm->c_obs = utf8_decode(mb_strtoupper($_REQUEST['c_obs']));	
		$alm->ptosalida = $_REQUEST['ptosalida'];	
		$alm->ptollegada = $_REQUEST['ptollegada'];
		//Datos Detalle
		$alm->c_codprd=$_REQUEST['c_codprd'];
		$alm->c_codprod=$_REQUEST['c_codprod'];
		$alm->c_idequipo=$_REQUEST['c_idequipo'];
		$alm->c_tipo2 = $_REQUEST['c_tipo2'];
		$alm->c_precinto = $_REQUEST['c_precinto'];	
		$alm->c_precintocli = $_REQUEST['c_precintocli'];	
		//Datos Permisos ******No es tomada en cuenta

		$alm->c_fecdoc =  date("d/m/Y H:i:s");//fecha eir	
		$alm->c_tipois = '';			
		$alm->c_tipo3 = (isset($_REQUEST['c_tipo3'])?$_REQUEST['c_tipo3']:''); /////////aquiiiiiiiiiiii
		$alm->c_combu = (isset($_REQUEST['c_combu'])?$_REQUEST['c_combu']:'');	
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login;	
		$alm->c_usuario =  $login;		
		$alm->c_obstip3 = '';
		$alm->c_almacen = (isset($_REQUEST['c_almacen'])?$_REQUEST['c_almacen']:'');		
		$alm->c_fechorareg = date("d/m/Y H:i:s");				
		$alm->c_estado =  '';		
		$alm->tipoclase = (isset($_REQUEST['tipoclase'])?$_REQUEST['tipoclase']:'');	
		$alm->c_est = '1';	//1 activo y 4 eliminado
		$alm->c_coddepi = '';
		$alm->c_desdepi = '';
		$alm->c_coddepf = '';
		$alm->c_desdepf = '';		
		
		$this->model->GuardarCabEir($alm) ; //REGISTRAR CABEIR
		//
		echo 'luis';
		$alm->c_numeir=$c_numeir;		
		$alm->c_sitalm=$_REQUEST['c_sitalm'];
		$alm->c_codcia='';
		$alm->c_codtda='';		
		$alm->c_nserie=$_REQUEST['c_nserie'];
		$alm->c_codtra=$_REQUEST['c_ructra'];
		$alm->c_codanx='';
		$alm->d_fecing=$_REQUEST['c_fechora'];	//Fecha y Hora salida y/o llegada
		if($alm->d_fecing==''){
			$alm->d_fecing=NULL;
		}
		$alm->c_nrodoc=$_REQUEST['c_numeoc'];//REGISTRO EIR POR ORDEN DE COMPRA
		$alm->c_nronis='';
		$alm->c_nroot='';
		//$alm->c_codmar=$_REQUEST['c_codmar'];
		//$alm->c_codmod=$_REQUEST['c_codmod'];
		//$alm->c_codcol=$_REQUEST['c_codcol'];
		//$alm->c_anno=$_REQUEST['c_anno'];
		//$alm->c_control=$_REQUEST['c_control'];
		//$alm->c_codest=$_REQUEST['c_codest'];
		//$alm->c_codcat=$_REQUEST['c_codcat'];
		$alm->c_codsit=$_REQUEST['c_sitalm'];
		$alm->c_tiprop=isset($_REQUEST['c_tiprop'])?$_REQUEST['c_tiprop']:'';
		/*$alm->n_costo_c=$_REQUEST['n_costo_c'];
		$alm->n_costo_m=$_REQUEST['n_costo_m'];
		$alm->n_deprec=$_REQUEST['n_deprec'];*/
		//$alm->c_mcamaq=$_REQUEST['c_mcamaq'];
		$alm->d_fcrea=$_REQUEST['c_fechora'];//Fecha y Hora salida y/o llegada
		if($alm->d_fcrea==''){
			$alm->d_fcrea=NULL;
		}
		$alm->c_ucrea=isset($_REQUEST['c_ucrea'])?$_REQUEST['c_ucrea']:'';
		$alm->d_fecreg=date("d/m/Y H:i:s");
		$alm->c_oper=$login;
		$alm->c_codalm=$_REQUEST['c_sitalm'];

		$alm->c_usuario=$login;

		
			
			
		///ACTUALIZAR EQUIPO(invequipo)
		///campos en comun SOLO para Registrar EquipoHistorialEir
		$alm->c_codprd=$_REQUEST['c_codprd'];//TODOS
		$alm->c_ucrea = $login;//TODOS
		$alm->d_fcrea = date("d/m/Y H:i:s");//TODOS	
		$alm->c_oper = $login;//TODOS
		$alm->d_fecreg = date("d/m/Y H:i:s");//TODOS
		
		$alm->c_codcia='01';//TODOS
		$alm->c_codtda='000';//TODOS
		$alm->d_fecing=date("d/m/Y H:i:s");	//TODOS
		//FIN campos en comun SOLO para Registrar EquipoHistorialEir
			
		$alm->c_numeir=$c_numeir;//TODOS CUANDO INGRESA POR EIR SALIDA
		$alm->c_numeoc=$_REQUEST['c_numeoc'];//TODOS CUANDO INGRESA POR UNA ORDEN DE COMPRA
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
		//$alm->c_codsit = $_REQUEST[$valor.'c_sitalm'];//D,R,G,C,T
		//$alm->c_codsitalm = $_REQUEST[$valor.'c_sitalm'];//D,R,G,C,T
		//$alm->c_nacional = $_REQUEST[$valor.'c_nacional'];//D,R,G,C,T
		//$alm->c_refnaci = $_REQUEST[$valor.'c_refnaci'];//D,R,G,C,T
		//$alm->c_fecnac = $_REQUEST[$valor.'c_fecnac'];//D,R,G,C,T
		
		
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
		$alm->c_fisico = date("d/m/Y");
//		$alm->c_nacional = (isset($_REQUEST['c_nacional'])?$_REQUEST['c_nacional']:'');
//		$alm->c_refnaci = (isset($_REQUEST['c_refnaci'])?$_REQUEST['c_refnaci']:'');
//		$alm->c_opermod = (isset($_REQUEST['c_opermod'])?$_REQUEST['c_opermod']:'');
//		$alm->c_fecmod = (isset($_REQUEST['c_fecmod'])?$_REQUEST['c_fecmod']:'');
		$alm->c_estaresv = (isset($_REQUEST['c_estaresv'])?$_REQUEST['c_estaresv']:'');
		// var_dump($alm);
		//die();
		$this->model->GuardarDetEir($alm); //REGISTRAR DETEIR (detalle EIR)
		$c_numguia=$_REQUEST['c_numguia'];
		$this->model->UpdateDatosGuiaEirSal($c_numeir,$c_numguia,$item);
		$this->maestroinv->insertarHistorialEquipo($_REQUEST['c_idequipo'], $login);
		$this->model->ActualizarEquipoSalida($alm);
		//VOLVER    
		//header('Location: indexinv.php?c=inv03');
		require_once 'view/principal/header.php';
		require_once 'view/principal/principal.php';
		require_once 'view/inventario/Reportes/vistapreviaeir.php';
		require_once 'view/principal/footer.php';	
				
}//FIN GuardarRegEir

public function ListaEir(){
	//$verFiltroEIR=$this->model->ListarEirGeneral();
	$buscar=trim($_REQUEST['buscar']);
	$verFiltroEIR=$this->model->verFiltroEIR($buscar);
	require_once 'view/principal/header.php';
	require_once 'view/principal/principal.php';
	require_once 'view/inventario/ListaEirGeneral.php';
	require_once 'view/principal/footer.php';
}
public function EditarEir(){
	$c_numeir=$_GET['c_numeir'];
	$ListarEirUpd=$this->model->ListarEirUpd($c_numeir);
	if($ListarEirUpd->c_tipoio=='1'){
	 	$tipo='INGRESO';	
	}else if($ListarEirUpd->c_tipoio=='2'){
		$tipo='SALIDA';		
	}
	require_once 'view/principal/header.php';
	require_once 'view/principal/principal.php';
	require_once 'view/inventario/updeirEntrada.php';
	require_once 'view/principal/footer.php';
}
/// fin luis*****////
public function VerEir(){	
	$c_numeir=$_GET['neir'];
	$idequipo=isset($_GET['eq'])?$_GET['eq']:'';
	$c_nserie=isset($_GET['eq'])?$_GET['eq']:'';
	//require_once 'view/principal/header.php';
	//	require_once 'view/principal/principal.php';
	require_once 'view/inventario/Reportes/verpdf.php';
	///require_once 'view/principal/footer.php';
}


public function VerEirVistaPrevia(){
	
	$c_numeir=$_GET['neir'];
	$idequipo=$_GET['eq'];
	$c_nserie=$_GET['eq'];
	require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			//require_once 'view/inventario/Reportes/verpdf.php';
			require_once 'view/inventario/Reportes/vistapreviaeir.php';
			require_once 'view/principal/footer.php';
	}

public function AnularEir(){
	
	$c_numeir=$_REQUEST['c_numeir'];	
	$tipodoc=$_REQUEST['tipodoc'];	
	
	if($tipodoc=='2'){//EIR SALIDA
		$ListarEirUpd=$this->model->ListarEirUpd($c_numeir);	
		$c_numguia=$ListarEirUpd->c_numguia;
		$this->model->AnularDatosEirSalida($c_numguia);		
	}else if($tipodoc=='1'){//EIR ENTRADA		
		$ListarIdEirSalida=$this->model->ListarIdEirSalida($c_numeir);
		$Id=$ListarIdEirSalida->Id;
		$c_idequipo=$ListarIdEirSalida->Id;
		$c_sitalm=$ListarIdEirSalida->c_sitalm;
		$this->model->CambiarEstadoEqui($c_idequipo,$c_sitalm);
		$this->model->AnularDatosEirEntrada($Id);	
	}
	$c_usuanula=$_REQUEST['login'];
	$c_fecanula=date("d/m/Y H:i:s");
	$this->model->AnularEir($c_numeir,$c_usuanula,$c_fecanula);
	
	/*require_once 'view/principal/header.php';
	require_once 'view/principal/principal.php';
	require_once 'view/inventario/ListaEirGeneral.php';
	require_once 'view/principal/footer.php';*/
	header('Location: indexinv.php?c=inv06&mod='.$_GET['mod'].'&udni='.$_GET['udni']);
}

public function AgregarEir(){
	$c_numeir=$_REQUEST['c_numeir'];
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/inventario/ListaEirGeneral.php';
        require_once 'view/principal/footer.php';
}

public function UpdateEir(){
	echo $c_numeir=$_REQUEST['c_numeir'];
        echo $c_obseir=$_REQUEST['c_obs'];
        $AddObsEir = new Procesoseir();
            $AddObsEir->c_numeir=$c_numeir;
            $AddObsEir->c_obs=$c_obseir;
        $this->model->UpdateEirM($c_numeir, $c_obseir);
            $mensaje="Se Actualizo la Observacion";
        print "<script>alert('$mensaje')</script>";	
        //header('Location: indexinv.php?c=inv01&mod='.$_GET['mod'].'&udni='.$_GET['udni']);		
        require_once 'view/principal/header.php';
        require_once 'view/principal/principal.php';
        require_once 'view/inventario/ListaEirGeneral.php';
        require_once 'view/principal/footer.php';
}

	public function BuscarEircompra()
    {		
        $data=$this->model->consultarEirEntradaOC2();
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {
			$resultadodetallado = array();	
			$d_fecoc=date("d-m-Y",strtotime($data[$i]->d_fecoc));
			$serie=$data[$i]->c_codequipo;			
			$udni=$_REQUEST["dni"];	
			$equipo=substr($data[$i]->c_desprd,0,1)."-".$data[$i]->c_codequipo;
			
			$link ='indexinv.php?c=inv03&a=RegEirEntradaOc&mod=1&udni='.$udni.'&serie='.$data[$i]->c_codequipo;
			$linkf = '<a href="'.$link.'" class="btn btn-success btn-xs" title="Editar" target="_blank"><span class="glyphicon glyphicon-ok" aria-hidden="true">Generar</span></a>';
			//$link1 = 'indexinv.php?c=inv01&a=Editar&mod=1&udni='.$udni.'&id='.$data[$i]->c_idequipo.'&cod_tipo='.$data[$i]->COD_TIPO;
			//$linkf1 = '<a href="'.$link1.'" class="btn btn-warning btn-xs" title="Editar" target="_blank"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			
			//$link2 = 'data-id="'.$equipo.'" data-ref="'.$data[$i]->c_fisico2.'"data-pti="'.$data[$i]->pti.'" data-c_codalm="'.$data[$i]->c_codalm.'"data-tipo="'.$data[$i]->tipo.'"data-c_codmar="'.$data[$i]->c_codmar.'"data-c_anno="'.$data[$i]->c_anno.'"';
			//$linkf2 = '<a href="#" class="btn btn-info btn-xs open_my_modal4" data-toggle="modal" data-target="#open_my_modal4" '.$link2.'><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';
			
			//link2 = '<a href="#" class="btn btn-info btn-xs open_my_modal2" data-id="'+element.c_idequipo+'" data-ref="'+element.c_fisico2+'" data-pti="'+element.pti+'"data-c_codalm="'+element.c_codalm+'"data-tipo="'+element.tipo+'"data-c_codmar="'+element.c_codmar+'"data-c_anno="'+element.c_anno+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
			array_push($resultadodetallado, utf8_encode($data[$i]->n_item));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_numeoc));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomdes));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_desprd));
			array_push($resultadodetallado, utf8_encode($equipo));
			array_push($resultadodetallado, utf8_encode($d_fecoc));					
			array_push($resultadodetallado, utf8_encode($linkf));												
			$arrayCli['data'][] = $resultadodetallado;		
			}
		echo(json_encode($arrayCli)); 		
		}else{
			  $arrayCli['data'][]=["SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO","SIN REGISTRO"]	;
			echo(json_encode($arrayCli));
		}
  
    }

}