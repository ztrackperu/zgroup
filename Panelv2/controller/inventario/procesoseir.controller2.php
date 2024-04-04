<?php
//ini_set('error_reporting',0);//para xamp
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
		//echo 'hola';
        $alm = new Procesoseir();     
	  		//cabecera
		 //Obtener c_numeir	  
		foreach($this->model->ObtenerIdEir() as $eir):
			$maxeir = $eir->maxeir;	
		endforeach;	   		  
	   	 if($maxeir==''){$c_numeir=1;}else{$c_numeir=$maxeir+1;}
	   	//Fin Obtener c_numeir		
			$alm->c_tipoio = $c_tipoio='1';
			$alm->c_serie = '';
			$alm->c_numeir = $c_numeir;
			if($c_tipoio=='1'){ //ingreso
				$alm->c_nroeiring = $c_numeir;				
				$alm->c_nroeirsal = '0';	
			}/*else if($c_tipoio=='2'){ //salida
				$alm->c_nroeiring = '0';				
				$alm->c_nroeirsal = $c_numeir;		
			}*/
			$alm->c_numguia = $_REQUEST['c_numguia'];		
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
			$alm->c_fechora = $_REQUEST['c_fechora'];	//Fecha y Hora salida y/o llegada
			if($alm->c_fechora==''){
				$alm->c_fechora=NULL;
			}
			$alm->c_condicion = $_REQUEST['c_condicion'];	
			$alm->c_tipois = '';
			$alm->c_tipo = $_REQUEST['c_tipo'];	
			$alm->c_tipo2 = $_REQUEST['c_tipo2'];	
			$alm->c_tipo3 = $_REQUEST['c_tipo3']; /////////aquiiiiiiiiiiii			
			$alm->c_obs = utf8_decode(mb_strtoupper($_REQUEST['c_obs']));	
			$alm->c_combu = $_REQUEST['c_combu'];
			$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
			$login=$ObtenerUsuarios->login;	
			$alm->c_usuario = $login;
			$alm->c_precinto = $_REQUEST['c_precinto'];	
			$alm->c_obstip3 = '';
			$alm->c_almacen = $_REQUEST['c_almacen'];	
			
			$alm->c_fechorareg = date("d/m/Y H:i:s");				
			$alm->c_estado =  '';			
			$alm->c_precintocli = $_REQUEST['c_precintocli'];	
			$alm->psalida = $_REQUEST['psalida'];	
			$alm->pllegada = $_REQUEST['pllegada'];
			$alm->ptosalida = $_REQUEST['ptosalida'];	
			$alm->ptollegada = $_REQUEST['ptollegada'];	
			$alm->c_obseir = utf8_decode(mb_strtoupper($_REQUEST['c_obseir']));			
			$alm->tipoclase = $_REQUEST['tipoclase'];	
			$alm->c_est = '1';	//1 activo y 4 eliminado
			$alm->c_coddepi = '';
			$alm->c_desdepi = '';
			$alm->c_coddepf = '';
			$alm->c_desdepf = '';
			$alm->c_motivo= $_REQUEST['c_motivo'];
			$alm->c_numeoc= $_REQUEST['c_numeoc']; //REGISTRO EIR POR ORDEN DE COMPRA
			$alm->c_depsal= $_REQUEST['c_depsal'];
			$alm->c_deping= $_REQUEST['c_deping'];
			$this->model->GuardarCabEir($alm) ; //REGISTRAR CABEIR
			
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
			$alm->c_tiprop=$_REQUEST['c_tiprop'];
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
			/*$alm->c_costadu=$_REQUEST['c_costadu'];
			$alm->c_costmar=$_REQUEST['c_costmar'];
			$alm->c_costage=$_REQUEST['c_costage'];
			$alm->c_costalm=$_REQUEST['c_costalm'];
			$alm->c_costotr=$_REQUEST['c_costotr'];
			$alm->c_preclist=$_REQUEST['c_preclist'];
			$alm->c_precvent=$_REQUEST['c_precvent'];
			$alm->c_serieant=$_REQUEST['c_serieant'];
			$alm->c_condicion=$_REQUEST['c_condicion'];
			$alm->c_costgute=$_REQUEST['c_costgute'];
			$alm->c_equipoesta=$_REQUEST['c_equipoesta'];*/
			$alm->c_usuario=$login;
			/*$alm->C_SITUANT=$_REQUEST['C_SITUANT'];
			$alm->n_tara=$_REQUEST['n_tara'];
			$alm->n_maxpeso=$_REQUEST['n_maxpeso'];
			$alm->c_procedencia=$_REQUEST['c_procedencia'];
			$alm->c_nacional=$_REQUEST['c_nacional'];
			$alm->c_refnaci=$_REQUEST['c_refnaci'];
			$alm->c_nroejes=$_REQUEST['c_nroejes'];
			$alm->c_tamCarreta=$_REQUEST['c_tamCarreta'];
			$alm->c_serieequipo=$_REQUEST['c_serieequipo'];
			$alm->c_peso=$_REQUEST['c_peso'];
			$alm->c_tara=$_REQUEST['c_tara'];
			$alm->c_seriemotor=$_REQUEST['c_seriemotor'];
			$alm->c_canofab=$_REQUEST['c_canofab'];
			$alm->c_cmesfab=$_REQUEST['c_cmesfab'];
			$alm->c_cfabri=$_REQUEST['c_cfabri'];
			$alm->c_cmodel=$_REQUEST['c_cmodel'];
			$alm->c_ccontrola=$_REQUEST['c_ccontrola'];
			$alm->c_tipgas=$_REQUEST['c_tipgas'];
			$alm->c_opermod=$_REQUEST['c_opermod'];
			$alm->c_fecmod=$_REQUEST['c_fecmod'];
			$alm->c_estaresv=$_REQUEST['c_estaresv'];
			$alm->c_material=$_REQUEST['c_material'];
			$alm->c_vin=$_REQUEST['c_vin'];*/

			$this->model->GuardarDetEir($alm) ; //REGISTRAR DETEIR
			
			///ACTUALIZAR EQUIPO(invequipo)
		///campos en comun SOLO para Registrar EquipoHistorialEir
		$alm->c_codprd=$_REQUEST['c_codprod'];//TODOS
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
				
           $this->model->RegistrarEquipoHistorialEir($alm) ;//REGISTRAR HISTORIAL EQUIPO		   
			if($_REQUEST['c_numeir']!=""){ //INGRESO POR EIR SALIDA
				$c_numeirSal=$_REQUEST['c_numeir'];				
				$this->model->UpdCabEirSalida($c_numeirSal,$c_numeir) ; //registrar c_nroeiring al EIR de salida(ACTUALIZAR EIR SALIDA)
				$this->model->ActualizarEquipo($alm); //ACTUALIZAR EQUIPO EN invequipo
			}else if($_REQUEST['c_numeoc']!=""){ //INGRESO POR ORDEN DE COMPRA (EQUIPO NUEVO)							
				//validar si existe equipo(si es una regularizacion en adminequipo.php)	
					$BusEquipo=$this->maestroinv->ValidarSerieEquipo($_REQUEST['c_nserie']);
						if($BusEquipo!=NULL){
							$mensaje="Equipo Regularizado Correctamente";
							print "<script>alert('$mensaje')</script>";	
							$this->model->ActualizarEquipo($alm); //ACTUALIZAR EQUIPO EN invequipo
						}else{
							$mensaje="Equipo Registrado Correctamente";
							print "<script>alert('$mensaje')</script>";	
							$this->model->RegistrarEquipo($alm); //REGISTRAR EQUIPO EN invequipo
						}				
			}						
			 //VOLVER    
        	//header('Location: indexinv.php?c=inv03');
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/vistapreviaeir.php';
			require_once 'view/principal/footer.php';	
				
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


/////******************* luis *******////
public function GuardarRegEirSalida(){ //EIR ENTRADA
		//echo 'hola';
        $alm = new Procesoseir();     
	  		//cabecera
		 //Obtener c_numeir	  
		foreach($this->model->ObtenerIdEir() as $eir):
			$maxeir = $eir->maxeir;	
		endforeach;	   		  
	   	 if($maxeir==''){$c_numeir=1;}else{$c_numeir=$maxeir+1;}
	   	//Fin Obtener c_numeir		
			$alm->c_tipoio = $c_tipoio='2';
			$alm->c_serie = '';
			$alm->c_numeir = $c_numeir;
			if($c_tipoio=='2'){ //SALIDA
				$alm->c_nroeiring = '0';			
				$alm->c_nroeirsal = $c_numeir;	
			}/*else if($c_tipoio=='2'){ //salida
				$alm->c_nroeiring = '0';				
				$alm->c_nroeirsal = $c_numeir;		
			}*/
			$alm->c_numguia = $_REQUEST['c_numguia'];		
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
			$alm->c_fechora = $_REQUEST['c_fechora'];	//Fecha y Hora salida y/o llegada
			if($alm->c_fechora==''){
				$alm->c_fechora=NULL;
			}
			$alm->c_condicion = $_REQUEST['c_condicion'];	
			$alm->c_tipois = '';
			$alm->c_tipo = $_REQUEST['c_tipo'];	
			$alm->c_tipo2 = $_REQUEST['c_tipo2'];	
			$alm->c_tipo3 = $_REQUEST['c_tipo3']; /////////aquiiiiiiiiiiii			
			$alm->c_obs = utf8_decode(mb_strtoupper($_REQUEST['c_obs']));	
			$alm->c_combu = $_REQUEST['c_combu'];	
			$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
			$login=$ObtenerUsuarios->login;	
			$alm->c_usuario =  $login;
			$alm->c_precinto = $_REQUEST['c_precinto'];	
			$alm->c_obstip3 = '';
			$alm->c_almacen = $_REQUEST['c_almacen'];	
			
			$alm->c_fechorareg = date("d/m/Y H:i:s");				
			$alm->c_estado =  '';			
			$alm->c_precintocli = $_REQUEST['c_precintocli'];	
			$alm->psalida = $_REQUEST['psalida'];	
			$alm->pllegada = $_REQUEST['pllegada'];
			$alm->ptosalida = $_REQUEST['ptosalida'];	
			$alm->ptollegada = $_REQUEST['ptollegada'];	
			$alm->c_obseir = utf8_decode(mb_strtoupper($_REQUEST['c_obseir']));			
			$alm->tipoclase = $_REQUEST['tipoclase'];	
			$alm->c_est = '1';	//1 activo y 4 eliminado
			$alm->c_coddepi = '';
			$alm->c_desdepi = '';
			$alm->c_coddepf = '';
			$alm->c_desdepf = '';
			$alm->c_motivo= $_REQUEST['c_motivo'];
			$alm->c_numeoc= $_REQUEST['c_numeoc']; //REGISTRO EIR POR ORDEN DE COMPRA
			$alm->c_depsal= $_REQUEST['c_depsal'];
			$alm->c_deping= $_REQUEST['c_deping'];
			$this->model->GuardarCabEir($alm) ; //REGISTRAR CABEIR
			
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
			$alm->c_tiprop=$_REQUEST['c_tiprop'];
			/*$alm->n_costo_c=$_REQUEST['n_costo_c'];
			$alm->n_costo_m=$_REQUEST['n_costo_m'];
			$alm->n_deprec=$_REQUEST['n_deprec'];*/
			//$alm->c_mcamaq=$_REQUEST['c_mcamaq'];
			$alm->d_fcrea=$_REQUEST['c_fechora'];//Fecha y Hora salida y/o llegada
			if($alm->d_fcrea==''){
				$alm->d_fcrea=NULL;
			}
			$alm->c_ucrea=$_REQUEST['c_ucrea'];
			$alm->d_fecreg=date("d/m/Y H:i:s");
			$alm->c_oper=$login;
			$alm->c_codalm=$_REQUEST['c_sitalm'];
			/*$alm->c_costadu=$_REQUEST['c_costadu'];
			$alm->c_costmar=$_REQUEST['c_costmar'];
			$alm->c_costage=$_REQUEST['c_costage'];
			$alm->c_costalm=$_REQUEST['c_costalm'];
			$alm->c_costotr=$_REQUEST['c_costotr'];
			$alm->c_preclist=$_REQUEST['c_preclist'];
			$alm->c_precvent=$_REQUEST['c_precvent'];
			$alm->c_serieant=$_REQUEST['c_serieant'];
			$alm->c_condicion=$_REQUEST['c_condicion'];
			$alm->c_costgute=$_REQUEST['c_costgute'];
			$alm->c_equipoesta=$_REQUEST['c_equipoesta'];*/ 
			$alm->c_usuario=$login;
			/*$alm->C_SITUANT=$_REQUEST['C_SITUANT'];
			$alm->n_tara=$_REQUEST['n_tara'];
			$alm->n_maxpeso=$_REQUEST['n_maxpeso'];
			$alm->c_procedencia=$_REQUEST['c_procedencia'];
			$alm->c_nacional=$_REQUEST['c_nacional'];
			$alm->c_refnaci=$_REQUEST['c_refnaci'];
			$alm->c_nroejes=$_REQUEST['c_nroejes'];
			$alm->c_tamCarreta=$_REQUEST['c_tamCarreta'];
			$alm->c_serieequipo=$_REQUEST['c_serieequipo'];
			$alm->c_peso=$_REQUEST['c_peso'];
			$alm->c_tara=$_REQUEST['c_tara'];
			$alm->c_seriemotor=$_REQUEST['c_seriemotor'];
			$alm->c_canofab=$_REQUEST['c_canofab'];
			$alm->c_cmesfab=$_REQUEST['c_cmesfab'];
			$alm->c_cfabri=$_REQUEST['c_cfabri'];
			$alm->c_cmodel=$_REQUEST['c_cmodel'];
			$alm->c_ccontrola=$_REQUEST['c_ccontrola'];
			$alm->c_tipgas=$_REQUEST['c_tipgas'];
			$alm->c_opermod=$_REQUEST['c_opermod'];
			$alm->c_fecmod=$_REQUEST['c_fecmod'];
			$alm->c_estaresv=$_REQUEST['c_estaresv'];
			$alm->c_material=$_REQUEST['c_material'];
			$alm->c_vin=$_REQUEST['c_vin'];*/

			$this->model->GuardarDetEir($alm) ; //REGISTRAR DETEIR
			
			$item=$_REQUEST['item'];
			$c_numguia=$_REQUEST['c_numguia'];
			$this->model->UpdateDatosGuiaEirSal($c_numeir,$c_numguia,$item);
			///ACTUALIZAR EQUIPO(invequipo)
		///campos en comun SOLO para Registrar EquipoHistorialEir
		$alm->c_codprd=$_REQUEST['c_codprod'];//TODOS
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
				
			
			$this->model->RegistrarEquipoHistorialEir($alm) ;
		    $this->model->ActualizarEquipoSalida($alm) ; 
				
						
			 //VOLVER    
        	//header('Location: indexinv.php?c=inv03');
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/inventario/Reportes/vistapreviaeir.php';
			require_once 'view/principal/footer.php';	
				
    }//FIN GuardarRegEir

public function ListaEir(){
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
	$idequipo=$_GET['eq'];
	$c_nserie=$_GET['eq'];
	require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
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


}