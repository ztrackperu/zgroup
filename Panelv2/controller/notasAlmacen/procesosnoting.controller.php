<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/notasAlmacen/procesosnotingM.php';

class ProcesosnotingController{
    
	private $model;
    
	public function __CONSTRUCT(){
		$this->model = new Procesosnoting();
		$this->maestro = new Maestros();
		$this->login = new Login();
	}
    
	public function InicioRegNotaIng(){
		$c_numeoc = (!isset($c_numeoc)?NULL:$c_numeoc);
		$BuscarOc=$this->model->BuscarOcDetallado($c_numeoc);		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/inicioregnotaingreso.php';
		require 'view/principal/footer.php';
	}
	
	public function RegNotasIngresoInsumos(){
		$BuscarOc=$this->model->BuscarOcInsumos($c_numeoc);		
		$BuscarOt=$this->model->BuscarOT($c_numeot);		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/inicioregnotaingreso.php';
		require 'view/principal/footer.php';
    }
	
	public function RegistrarNotaIng(){		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/regnotaingreso.php';
		require 'view/principal/footer.php';
    } 
	
	public function RegistrarNotaIngCompra(){
		$c_codprv=$_REQUEST['c_codcli'];	
		$c_nomprv=$_REQUEST['c_nomcli'];
		$c_numeoc=$_REQUEST['ncoti'];	
			
		if($_REQUEST['c_nroserie']!='sinserie'){ //DETALLADO REGULARIZAR NOTA DE EIR INGRESO O/C
			$ListarCabOc=$this->model->BuscarOcDetallado($c_numeoc);
			$c_numeir=$ListarCabOc->c_numeir;
			$ListarDatosEir=$this->model->ListarDatosEir($c_numeir);
			if($ListarDatosEir!=NULL){ //cabeir
				$fechaeir=vfecha(substr($ListarDatosEir->c_fechora,0,10));
				$NT_FDOC=$NT_FGUI=$NT_FRP=$fechaeir;					
				$transportista=$ListarDatosEir->transportista;					
				$NT_CTR=$ListarDatosEir->c_ructra;
				$NT_SERIR='000';
				$NT_DOCR=$c_numeir;
				$NT_GTR='M'.'/'.'000'.$c_numeir;//numero Guia Transportista
				//guias proveedor				
				$serie='000';
				$numero=$c_numeir;
			}				
			$ListarDetOc=$this->model->ListarDetOcDetallado($c_numeoc,$_REQUEST['c_nroserie']);	
		}else{ //INSUMOS
			$ListarCabOc=$this->model->BuscarOcInsumos($c_numeoc);
			$ListarDetOc=$this->model->ListarDetOcInsumos($c_numeoc);			
				//cabeoc
				$NT_FDOC=$NT_FGUI=$NT_FRP='';
				$transportista=$ListarCabOc->c_nomtran;
				$NT_CTR=$ListarCabOc->c_codtran;
				$NT_SERIR='';
				$NT_DOCR='';
				//guias proveedor					
				$serie='';
				$numero='';
			
		}
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/regnotaingresoCompra.php';
		require 'view/principal/footer.php';
    }

	public function RegistrarNotaIngOrdenTrabajo(){
		$otrabajo=$_REQUEST['otrabajo'];			
			$ListarCabOt=$this->model->BuscarNotasInsumos($otrabajo);
		//INSUMOS
		/* 	$ListarDetOt=$this->model->ListarDetOcInsumos($otrabajo);			
				//cabeoc
				$NT_FDOC=$NT_FGUI=$NT_FRP='';
				$transportista=$ListarCabOc->c_nomtran;
				$NT_CTR=$ListarCabOc->c_codtran;
				$NT_SERIR='';
				$NT_DOCR='';
				//guias proveedor					
				$serie='';
				$numero=''; */
			

		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/regnotaingresoTrabajo.php';
		require 'view/principal/footer.php';
    }	
	
	public function guardaNotaIngreso(){
		//CABECERA
		// var_dump($_REQUEST);
		$ObtenerId=$this->model->ObtenerIdNotaIngreso();
		$NewId=substr($ObtenerId->maxnotas, -7)+1;
		$alm = new \StdClass();
		$alm->NT_NDOC=$NT_NDOC=$_REQUEST['NT_TDOC'].str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
		$alm->NT_TDOC=$_REQUEST['NT_TDOC'];//I
		$alm->NT_TRAN=$_REQUEST['NT_TRAN'];	// tipo de transaccion 02=compras	
		$alm->NT_TREM=utf8_decode($_REQUEST['NT_TREM']);
		$alm->NT_SERIR=$_REQUEST['NT_SERIR'];
		$alm->NT_DOCR=$_REQUEST['NT_DOCR'];
		$alm->NT_REMI=$NT_REMI=utf8_decode($_REQUEST['NT_TREM']).$_REQUEST['NT_SERIR'].$_REQUEST['NT_DOCR'];		
		$alm->NT_CCLI=$_REQUEST['NT_CCLI'];
		$alm->NT_FDOC=$NT_FDOC=$_REQUEST['NT_FDOC'];
		$alm->NT_OBS=$_REQUEST['NT_OBS'];
		$alm->NT_ESTA='3';
		$alm->NT_TIPO='P';
		$alm->NT_NEXT=NULL;
		$alm->NT_FREG=date("d/m/Y H:i:s");
		$alm->NT_OPER=$_REQUEST['login'];
		
		$ObtenerIdReg=$this->model->ObtenerIdRegNota();
		$NewIdReg=$ObtenerIdReg->maxidreg;
		$alm->n_idreg=$NewIdReg+1;
		
		//$alm->n_id=$_REQUEST['n_id'];//AUTOGENERADO
		$tipdia=$this->maestro->ListaTipoCambioDia($NT_FDOC);
		
		$tcambio=isset($tipdia->TC_VTA)?$tipdia->TC_VTA:NULL;    //tipo de cambio de la NOTA INGRESO
		$tcambioOC=$_REQUEST['NT_TCAMB'];//tipo de cambio con fecha de la ORDEN DE COMPRA
		
		if($tcambio==NULL){
			$tcambio=$tcambioOC;
		}else if($tcambio==NULL && $tcambioOC==NULL){
			$tcambio=0;
		}
		$alm->NT_TCAMB=$tcambio;
		$alm->NT_MONE=$_REQUEST['NT_MONE'];
		$alm->NT_SWOC='1';
		$alm->NT_NOC=$_REQUEST['NT_NOC'];
		$alm->NT_FGUI=$_REQUEST['NT_FGUI'];
		$alm->NT_CTR=$_REQUEST['NT_CTR'];		
		$NT_GTR='G'.'/'.$_REQUEST['seriegt'].$_REQUEST['numerogt'];//numero Guia Transportista
		$alm->NT_GTR=$NT_GTR;		
		$alm->NT_CLAPC='P';		
		$NT_GPRV='G'.$_REQUEST['serieguia'].$_REQUEST['numeroguia'];
		$alm->NT_GPRV=$NT_GPRV;
		//$alm->NT_OPMOD=$_REQUEST['NT_OPMOD'];
		//$alm->NT_FMOD=$_REQUEST['NT_FMOD'];
		$alm->NT_DATE=date("d/m/Y H:i:s");
		$alm->NT_FRP=$_REQUEST['NT_FRP'];
		$alm->NT_TITRA='F';
		$alm->NT_MOTRA=NULL;
		$alm->NT_MONEG='0';
		$alm->NT_MONTO='0';
		$alm->NT_ESTIBA='0';
		$alm->c_codcia='01';
		$alm->c_codtda='000';
		$alm->c_codalm=$_REQUEST['c_codalm'];
		$alm->c_codalm_d='ALMDES';
		// $NT_SERIR = (isset($_REQUEST['NT_SERIR'])?$_REQUEST['NT_SERIR']:'100');
			
		$alm->NT_RESPO=$c_respo=(isset($_REQUEST['NT_RESPO'])?mb_strtoupper(utf8_decode($_REQUEST['NT_RESPO'])):'');
			if($_REQUEST['NT_RESPO']=="ORDEN DE COMPRA"){
				$alm->c_NumOT="";
			}else{
				$alm->c_NumOT=isset($_REQUEST['NT_DOCR'])?'100'.$_REQUEST['NT_DOCR']:'';//PARA SALIDA POR ORDEN DE TRABAJO	
			}
		/*$c_ruccli=$_REQUEST['c_ruccli'];	
		$c_codcli=$_REQUEST['NT_CCLI'];	
		$validarespo=$this->model->ValidarResponsableNotaSal($c_respo,$c_ruccli);
		if($validarespo == NULL){
			$this->model->GuardarResponsableNotaSal($c_respo,$c_ruccli,$c_codcli,date("d/m/Y H:i:s")) ;
		}*/
		
		$this->model->GuardarCabNotaIngreso($alm) ; 
		//actualizar correlativos
		$this->model->UpdateItemNota($alm->n_idreg);//n_idreg
		$c_corre=str_pad($NewId, 7, '0', STR_PAD_LEFT);
		$this->model->UpdateCorrelativoNota($c_corre,'I');//$c_coddoc=I,S, c_corre=numero de NT_NDOC
		//fin actualizar correlativos
		
		//inicio Detalle						 
		$ObtenerIdRegInvmov=$this->model->ObtenerIdRegInvmov();//OBTENER n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
		$NewIdRegInvmov=$ObtenerIdRegInvmov->maxidreg+1;
					
		$maxitem=$_REQUEST['maxitem'];  //maximo item
						
		$n=0;
		for($i=1;$i<=$maxitem;$i++)	{
			//DATOS GUARDAR notmov
			//$alm->NT_NDOC=$_REQUEST['NT_NDOC'];
			//$alm->NT_TDOC=$_REQUEST['NT_TDOC'];
			$alm->NT_CART=$c_codprd=$_REQUEST['c_codprd'.$i];
			$alm->NT_CUND=$_REQUEST['NT_CUND'.$i];
			$alm->NT_CANT=$NT_CANT=$_REQUEST['n_canprd'.$i];
			
			$obtenertipo=$this->model->ValidarTipoProductoM($c_codprd);
			echo $COD_CLASE=$obtenertipo->COD_CLASE;
			$alm->c_producto=$COD_CLASE;
			
			if($COD_CLASE=='010'){ //solo insumos
				$NT_PREC='0'; 
			}else{//producto detallado y repuestos
				$NT_PREC=$_REQUEST['NT_PREC'.$i]; 
			}
			$alm->NT_PREC=$NT_PREC; 
			$alm->NT_COST=$NT_PREC;			 
			$alm->c_observ=$_REQUEST['c_obsprd'.$i];					
			$alm->NT_FREG=date("d/m/Y H:i:s");
			$alm->NT_OPER=$_REQUEST['login'];
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
			$alm->c_idequipo=$_REQUEST['c_codcont'.$i];
			$alm->NT_SERIE=$NT_SERIE=substr($_REQUEST['c_codcont'.$i], 2);
			$alm->NT_LOTE=NULL;
			$alm->C_SITUANT=isset($_REQUEST['C_SITUANT'.$i])?$_REQUEST['C_SITUANT'.$i]:'';
			$alm->n_preciocost=$_REQUEST['NT_PREC'.$i];//CAMPO NUEVO
			$alm->n_preciovta=$_REQUEST['NT_PREC'.$i];//CAMPO NUEVO
			
			//DATOS GUARDAR invmov
			$alm->IN_TRAN=$_REQUEST['NT_TRAN'];
			$alm->IN_CODI=$_REQUEST['c_codprd'.$i];
			$alm->IN_LINE=substr($_REQUEST['c_codprd'.$i],0,3);
			$alm->IN_CUND=$_REQUEST['NT_CUND'.$i];
			$alm->IN_REMI=$NT_REMI;
			$alm->IN_TDOC=$_REQUEST['NT_TDOC'];//S
			$alm->IN_SERI=NULL;
			$alm->IN_DOC=$_REQUEST['NT_TDOC'].str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
			$alm->IN_COST=$NT_PREC;
			$alm->IN_PVTA=$NT_PREC;
			$alm->IN_CANT=$_REQUEST['n_canprd'.$i];
			$alm->IN_FMOV=$_REQUEST['NT_FDOC'];
			$alm->IN_ESTA='1'; //SALIDA 0, INGRESO 1
			$alm->IN_FREG=date("d/m/Y H:i:s");
			$alm->IN_OPER=$_REQUEST['login'];								
			$alm->n_idregInvmov=$NewIdRegInvmov; //n_idreg de invmov (SON LOS MISMOS POR CADA NOTA)				
			//$alm->n_id=$_REQUEST['n_id'];//autonumeracion				
			$alm->IN_NOC=$_REQUEST['NT_NOC'];
			$alm->IN_CPRV=$_REQUEST['NT_CCLI'];
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
			$alm->c_codalm=$_REQUEST['c_codalm'];
			$alm->c_idequipo=$_REQUEST['c_codcont'.$i];
			$alm->n_itemOC=$_REQUEST['n_item'.$i]; 
			//FIN DATOS GUARDAR invmov
			if($_REQUEST['c_codprd'.$i] != ""){
				$n++;						 							   		
				$this->model->GuardarDetNotaIngreso($alm) ;
				$this->model->UpdEstadoCabeOC($_REQUEST['NT_NOC'],'1'); //1 atencion parcial y 2 atencion total 
				
				//ACTUALIZAR CANTIDAD DESPACHADA DE ITEM OC
				$n_item=$_REQUEST['n_item'.$i];
				$this->model->UpdEstadoOC($n_item,$_REQUEST['NT_NOC'],$NT_CANT) ;	
							
				if($COD_CLASE=='001'){ //SOLO CONTENEDORES GRABA EN invmov
					//INICIO ACTUALIZAR DATOS EN invstkalm	
					//obtener stock producto
					$ValidarStock=$this->model->ValidarStockDetaRepuestos($c_codprd) ;
					$IN_STOK=$ValidarStock->IN_STOK; 												
					//aumentar stock	
					$nuevostock=$IN_STOK+$NT_CANT;								
					/////////////inicio solo producto detallado y repuestos
					$IN_COST =$ValidarStock->IN_COST;
					//calcular nuevo costo (costo promedio)	
					if($_REQUEST['NT_MONE']=='0'){ //el precio ya esta en soles						
						$xnuevocosto=($IN_STOK*$IN_COST+($NT_PREC*1))/$nuevostock; //precio en soles
					}else{ //el precio esta en dolares
						$xnuevocosto=($IN_STOK*$IN_COST+($tcambio*$NT_PREC*1))/$nuevostock; //precio en soles
					}
					$nuevocosto=round($xnuevocosto, 2); //nuevo costo redondeado a 2 decimales
					$IN_CTOUC=$NT_PREC;
					$IN_FECUC=$_REQUEST['d_fecoc'];	
					if($IN_FECUC==NULL){
						$$IN_FECUC=NULL;
					}															
					$this->model->UpdStockProdDetaRepuestos($nuevostock,$nuevocosto,$IN_CTOUC,$IN_FECUC,$c_codprd);
					$c_nrodoc='M'.'000'.$_REQUEST['c_numeir'];
					$this->model->UpdNotaInvequipo($NT_SERIE,$NT_NDOC,$c_nrodoc);	//guardar nota de ingreso a invequipo
					$this->model->GuardarInvmovNotaSal($alm);// va al costo(graba inmov)
					$this->model->UpdateCorrelativoInvmov($NewIdRegInvmov);//actualizar correlativo item_tab de invmov
					/////////////fin solo producto detallado y repuestos
					//FIN  ACTUALIZAR DATOS EN invstkalm							 
				}else{ //SOLO INSUMOS $COD_CLASE=='010' 
					//INICIO ACTUALIZAR stock EN invstkalmInsumos	
					$ValidarStockInsumos=$this->model->ValidarStockInsumos($c_codprd) ;
					if($ValidarStockInsumos!=NULL){
						$IN_STOK=$ValidarStockInsumos->IN_STOK; 
						$nuevostock=$IN_STOK+$NT_CANT;	
						$this->model->UpdStockProdInsumos($nuevostock,$c_codprd); 
					}else{
						//AGREGAR NUEVO PRODUCTO A invstkalmInsumos
						$IN_CCIA='01';$IN_CTDA='000';$IN_CALM='000001';
						$IN_CODI=$c_codprd;$IN_COST='0';$IN_STOK=$NT_CANT;
						$IN_CTOUC='0';$IN_FECUC=$_REQUEST['d_fecoc'];$IN_FECUV='NULL';
						$IN_FCREA=date("d/m/Y");$IN_UCREA=$_REQUEST['login'];
						$IN_OPER=$_REQUEST['login'];$IN_FREG=date("d/m/Y");
						$this->model->RegStockProdInsumos($IN_CCIA,$IN_CTDA,$IN_CALM,$IN_CODI,$IN_COST,$IN_STOK,$IN_CTOUC,$IN_FECUC,$IN_FECUV,$IN_FCREA,$IN_UCREA,$IN_OPER,$IN_FREG);
					}
								//FIN ACTUALIZAR stock EN invstkalmInsumos															
				}
							
							/*//obtener tipo producto 
							$tipoprod=$this->model->ValidarTipoProductoM($_REQUEST['c_codprd'.$i]);
							$c_equipo=$tipoprod->c_equipo; ////detallado=1, repuestos=2, insumos=3, herramientas=4
				   			//fin obtener tipo producto 
							if($c_equipo=='1'){ //producto detallado								
								$this->model->UpdNotaInvequipo($NT_SERIE,$NT_NDOC);	//guardar nota de ingreso a invequipo
								$this->model->GuardarInvmovNotaSal($alm);// va al costo(graba inmov)						
							}else if($c_equipo=='2'){ //repuestos
								$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)	
							}*/						
				}
			} //end for 			 
		if($maxitem==$n){//se recibio todos los detalles de oc
			$this->model->UpdEstadoCabeOC($_REQUEST['NT_NOC'],'2'); //1 atencion parcial y 2 atencion total
		}
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/listarNotas.php';
		require 'view/principal/footer.php';
					
	}//fin guardaNotaSalida	 
	
	public function AnularNotaIngreso(){ //solo insumos
		$NT_NDOC=$_REQUEST['NT_NDOC'];	//numero nota	
		$c_numeoc=$_REQUEST['NT_NOC']; //oc
		$this->model->UpdEstadoCabeOC($c_numeoc,'1'); //1 atencion parcial y 2 atencion total
		
		$ListarDetNotaIngreso=$this->model->ListarDetNotaIngreso($NT_NDOC);
		if($ListarDetNotaIngreso!=NULL){
			foreach($ListarDetNotaIngreso as $itemdetnota){
				$n_item=$itemdetnota->n_item;
							
				//INICIO ACTUALIZAR stock EN invstkalmInsumos	
				$c_codprd=$itemdetnota->c_codprd;
				$NT_CANT=$itemdetnota->NT_CANT;
				$ValidarStockInsumos=$this->model->ValidarStockInsumos($c_codprd) ;
				$IN_STOK=$ValidarStockInsumos->IN_STOK; 
				$nuevostock=$IN_STOK-$NT_CANT; //QUITAR	
				$this->model->UpdStockProdInsumos($nuevostock,$c_codprd); 
				//FIN ACTUALIZAR stock EN invstkalmInsumos
				
				//CAMBIAR ESTADO ALMACEN
				$n_canprd=0;		
				$this->model->UpdEstadoOC($n_item,$c_numeoc,$n_canprd);//ACTUALIZAR CANTIDAD detaoc ALMACEN=0 
			}
		}
		$nt_obs=$_REQUEST['motivo'].' '.$_REQUEST['login'].' '.date("d/m/Y H:i:s");
		$this->model->EliminarNota($NT_NDOC,$nt_obs); //update c.NT_ESTA='4'
		$this->model->EliminarInvmov($NT_NDOC); //delete invmov de la nota
		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/adminNotasInsumos.php';
		require 'view/principal/footer.php';		
	}	
	
	public function AnularNotaSalida(){ //solo insumos
		$NT_NDOC=$_REQUEST['NT_NDOC2'];	//numero nota	
		$c_numeoc=$_REQUEST['NT_NOC2']; //oc
		
		$ListarDetNotaTodos=$this->model->ListarDetNotaTodos($NT_NDOC);
		if($ListarDetNotaTodos!=NULL){
			foreach($ListarDetNotaTodos as $itemdetnota){
							
				//INICIO ACTUALIZAR stock EN invstkalmInsumos	
				$c_codprd=$itemdetnota->NT_CART;
				$NT_CANT=$itemdetnota->NT_CANT;
				$ValidarStockInsumos=$this->model->ValidarStockInsumos($c_codprd) ;
				$IN_STOK=$ValidarStockInsumos->IN_STOK; 
				$nuevostock=$IN_STOK+$NT_CANT; //AUMENTAR AL STOCK	
				$this->model->UpdStockProdInsumos($nuevostock,$c_codprd); 
				//FIN ACTUALIZAR stock EN invstkalmInsumos
			}
		}
		$nt_obs=$_REQUEST['motivo2'].' '.$_REQUEST['login2'].' '.date("d/m/Y H:i:s");
		$this->model->EliminarNota($NT_NDOC,$nt_obs); //update c.NT_ESTA='4'
		$this->model->EliminarInvmov($NT_NDOC); //delete invmov de la nota
		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/adminNotasInsumos.php';
		require 'view/principal/footer.php';		
	}	
	
	public function ListarNotas(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/listarNotas.php';
		require 'view/principal/footer.php';
	}
	public function ListarNotasFechas(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/ListarNotasFiltro.php';
		require 'view/principal/footer.php';
	}
	public function AdminNotasInsumos(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/adminNotasInsumos.php';
		require 'view/principal/footer.php';		
	}
	
	public function OrdenCompraBuscar(){
		$NT_CCLI=$_REQUEST['NT_CCLI'];
		 print_r(json_encode(
            $this->model->ProveedorBuscar($_REQUEST['criterio'],$NT_CCLI)
        ));
	}//fin
	
	public function imprimirNotaSalida(){		
		$NT_NDOC=$_REQUEST['NT_NDOC'];
		$NT_TDOC=$_REQUEST['NT_TDOC'];
		if($NT_TDOC=='S'){
			$resulos=$this->model->cabeceraNotaSalidaM($NT_NDOC);
		}else{ //NOTA INGRESO
			$resulos=$this->model->cabeceraNotaIngresoM($NT_NDOC);
		}
		$resulos1=$this->model->detalleNotaM($NT_NDOC);
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/reporteEstandar.php';
		require 'view/principal/footer.php';		
	}
	
	public function imprimirticket(){		
		$NT_NDOC=$_REQUEST['NT_NDOC'];
		$NT_TDOC=$_REQUEST['NT_TDOC'];
		if($NT_TDOC=='S'){
			$resulos=$this->model->cabeceraNotaSalidaM($NT_NDOC);
		}else{ //NOTA INGRESO
			$resulos=$this->model->cabeceraNotaIngresoM($NT_NDOC);
		}
		$resulos1=$this->model->detalleNotaM($NT_NDOC);
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/reporteTicket.php';
		require 'view/principal/footer.php';		
	}	
	
	function BuscarNotasxFechas(){
		$xfi=$_REQUEST['txtFechaI'];
		$xff=$_REQUEST['txtFechaF'];
		$variable = explode ('/',$xfi); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $fi = $variable [1].'/'.$variable [0].'/'.$variable [2];
		$variable2 = explode ('/',$xff); //división de la fecha utilizando el separador -
		//$fecha = $variable [2].-$variable [1].-$variable [0]; //alteramos el orden de la variable
		 $ff = $variable2 [1].'/'.$variable2 [0].'/'.$variable2 [2];	
		$arrayCli=array(); 	  
		$data=$this->model->ListarNotasFechas($fi,$ff);	
		if(count($data)>0){
			for ($i=0; $i < count($data); $i++) {

			$resultadodetallado = array();	
			 $c_codmon=$data[$i]->c_codmon;
			 
			  if($c_codmon==0){
				 $moneda="SOLES";
			 }else{
				 $moneda="DOLARES";
			 } 

			array_push($resultadodetallado, utf8_encode($i+1));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_CODI));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_ARTI));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_idequipo));
			array_push($resultadodetallado, utf8_encode($data[$i]->C_DESITM));
			array_push($resultadodetallado, utf8_encode($data[$i]->IN_UVTA));
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_CANT));
			array_push($resultadodetallado, utf8_encode($moneda));
			array_push($resultadodetallado, utf8_encode($data[$i]->n_preciocost));			
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_CANT * $data[$i]->n_preciocost));			
			array_push($resultadodetallado, utf8_encode($data[$i]->c_NumOT));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_refcot));
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomcli));
			array_push($resultadodetallado, vfecha(substr($data[$i]->NT_FDOC,0,10)));
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_TRAN));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_TDOC));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_NDOC));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_GPRV));										
			array_push($resultadodetallado, utf8_encode($data[$i]->c_nomprv));										
			array_push($resultadodetallado, utf8_encode($data[$i]->c_codprv));										
			array_push($resultadodetallado, utf8_encode($data[$i]->c_ejecuta));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_NOC));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_CCLI));										
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_OPER));										
			array_push($resultadodetallado, utf8_encode($data[$i]->c_motivo));										
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