<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/notasAlmacen/procesosnotsalM.php';

class ProcesosnotsalController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosnotsal();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
    
    public function Registrar(){		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/regnotasalida.php';
		require 'view/principal/footer.php';
    } 	
	
	 public function validarNumGuia(){//validar cuando ingresas un numero de guia
			 $xNT_DOCR =$_REQUEST["cod"]; 
			 $NT_DOCR=str_pad($xNT_DOCR, 9, '0', STR_PAD_LEFT);//DEVUELVE 000000984
			 if($NT_DOCR!=''){
			 $validarCT=$this->model->ValidarGuiaM('1'.$NT_DOCR);
				if($validarCT != NULL){
					echo $mensaje= "<div class='alert_info'>Continue</div>";					
					//echo $seguir="0";
				}else{
				   echo $mensaje= "<div class='alert_error'>Orden No existe</div>";
				   //echo $seguir="1";
				}
			 }
	}	
	
	  public function ProveedorBuscar()
    {
		
        print_r(json_encode(
            $this->maestro->BuscarProveedor($_REQUEST['criterio'])
        ));
    }//FIN BuscarProveedor	
	
	public function ProductoBuscar()
    {
		
        print_r(json_encode(
            $this->model->ProductoBuscar($_REQUEST['criterio'],$_REQUEST['alm'])
        ));
    }//FIN ProductoBuscar
	
	public function ResponsableBuscar()
    {		
        print_r(json_encode(
            $this->model->ResponsableBuscar($_REQUEST['criterio'],$_REQUEST['c_ruccli'])
        ));
    }//FIN ProductoBuscar
	
	public function ProveedorBuscarOT(){
		$XNT_DOCR=$_REQUEST['NT_DOCR'];
		$NT_DOCR='100'.$XNT_DOCR;
		 print_r(json_encode(
            $this->model->ProveedorBuscar($_REQUEST['criterio'],$NT_DOCR)
        ));
	}
	
	public function verEquiposDispo()
    {
		require 'view/notasAlmacen/verEquiposDispo.php';
    }//FIN verEquiposDispo
	
	public function VerProductosDispo(){
		$ProductoBuscar="";
		if(!empty($_REQUEST["criterio"])){
			$ProductoBuscar=$this->model->ProductoBuscar($_REQUEST["criterio"],$_REQUEST["alm"]);
		}
		require 'view/notasAlmacen/VerProductosDispo.php';
    }//FIN verEquiposDispo
	
	public function ActualizarEstEquipo(){
	    $d_temfec=date("d/m/Y H:i:s");
		$this->model->DesbloquearEquipo($_REQUEST['c_codcont']);//c_estedit= '', c_temcot = '',c_temfec=NULL			
        $this->model->BloquearEquipo($_REQUEST['idequipo'],$_REQUEST['ncoti'],$d_temfec);//c_estedit= '1', c_temcot = 'c_numped' 			
		
    }
	
	public function guardaNotaSalida(){
		//CABECERA
		$ObtenerId=$this->model->ObtenerIdNotaSalida();
		$NewId=substr($ObtenerId->maxnotas, -7)+1;
		$alm = new \StdClass();
		$alm->NT_NDOC=$_REQUEST['NT_TDOC'].str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
		$alm->NT_TDOC=$_REQUEST['NT_TDOC'];//S
		$alm->NT_TRAN=$_REQUEST['NT_TRAN'];
		
		$alm->NT_TREM=utf8_decode($_REQUEST['NT_TREM']);
		$alm->NT_SERIR=$_REQUEST['NT_SERIR'];
		$alm->NT_DOCR=$_REQUEST['NT_DOCR'];
	    $alm->NT_REMI=$NT_REMI=utf8_decode($_REQUEST['NT_TREM']).$_REQUEST['NT_SERIR'].$_REQUEST['NT_DOCR'];
		
		$alm->NT_CCLI=$_REQUEST['NT_CCLI'];
		$alm->NT_FDOC=$NT_FDOC=$_REQUEST['NT_FDOC'];
		$alm->c_motivo=$NT_FDOC=$_REQUEST['c_motivo'];
		$alm->NT_OBS=$_REQUEST['NT_OBS'];
		$alm->NT_ESTA='3';
		$alm->NT_TIPO='C';
		$alm->NT_NEXT=NULL;
		$alm->NT_FREG=date("d/m/Y H:i:s");
		$alm->NT_OPER=$_REQUEST['login'];
		
		$ObtenerIdReg=$this->model->ObtenerIdRegNota();
		$NewIdReg=$ObtenerIdReg->maxidreg;
		$alm->n_idreg=$NewIdReg+1;
		//$alm->n_id=$_REQUEST['n_id'];//AUTOGENERADO		
		
		$tipdia=$this->maestro->ListaTipoCambioDia($NT_FDOC);
		$tcambio=0;
		if(isset($tipdia->TC_VTA) && $tipdia->TC_VTA!=NULL){
			$tcambio=$tipdia->TC_VTA;
		}
		$alm->NT_TCAMB=$tcambio;		
		//$alm->NT_TCAMB=$_REQUEST['NT_TCAMB'];
		
		$alm->NT_MONE=$_REQUEST['NT_MONE'];
		$alm->C_COSTO=$_REQUEST['ccosto'];
		$alm->NT_SWOC='0';
		$alm->NT_NOC=NULL;
		$alm->NT_FGUI=$_REQUEST['NT_FGUI'];
		$alm->NT_CTR=$_REQUEST['NT_CTR'];
		$alm->NT_GTR=utf8_decode($_REQUEST['NT_TREM']).'/'.$_REQUEST['NT_SERIR'].$_REQUEST['NT_DOCR'];
		$alm->NT_CLAPC='P';
		$alm->NT_GPRV=$NT_REMI;
		//$alm->NT_OPMOD=$_REQUEST['NT_OPMOD'];
		//$alm->NT_FMOD=$_REQUEST['NT_FMOD'];
		$alm->NT_DATE=date("d/m/Y H:i:s");
		$alm->NT_FRP=NULL;
		$alm->NT_TITRA='F';
		$alm->NT_MOTRA=NULL;
		$alm->NT_MONEG='0';
		$alm->NT_MONTO='0';
		$alm->NT_ESTIBA='0';
		$alm->c_codcia='01';
		$alm->c_codtda='000';
		$alm->c_codalm=$_REQUEST['c_codalm'];
		$alm->c_codalm_d='ALMDES';
		$alm->c_NumOT='100'.$_REQUEST['NT_DOCR'];
		$alm->NT_RESPO=$c_respo=mb_strtoupper(utf8_decode($_REQUEST['NT_RESPO']));	
		$c_ruccli=$_REQUEST['c_ruccli'];	
		$c_codcli=$_REQUEST['NT_CCLI'];	
		$validarespo=$this->model->ValidarResponsableNotaSal($c_respo,$c_ruccli);
		if($validarespo == NULL){
			$this->model->GuardarResponsableNotaSal($c_respo,$c_ruccli,$c_codcli,date("d/m/Y H:i:s")) ;
		}
		$this->model->GuardarCabNotaSalida($alm) ; 		
		//actualizar correlativos
		$this->model->UpdateItemNota($alm->n_idreg);//n_idreg
		$c_corre=str_pad($NewId, 7, '0', STR_PAD_LEFT);
		$this->model->UpdateCorrelativoNota($c_corre,'S');//$c_coddoc=I,S, c_corre=numero de NT_NDOC
		//fin actualizar correlativos
		
		//inicio Detalle
		$i = 1;	
		$ObtenerIdRegInvmov=$this->model->ObtenerIdRegInvmov();//OBTENER n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
		$NewIdRegInvmov=$ObtenerIdRegInvmov->maxidreg+1;
		$prodnoregistrados = NULL;
		do{	
			if(isset($_REQUEST['c_codprd'.$i]) && $_REQUEST['c_codprd'.$i] != ""){
				//DATOS GUARDAR notmov
				//$alm->NT_NDOC=$_REQUEST['NT_NDOC'];
				//$alm->NT_TDOC=$_REQUEST['NT_TDOC'];
				$alm->NT_CART=$c_codprd=$_REQUEST['c_codprd'.$i];
				$alm->NT_CUND=$_REQUEST['NT_CUND'.$i];
				$alm->NT_CANT=$NT_CANT=$_REQUEST['n_canprd'.$i];					
				$alm->c_producto=$c_producto=$_REQUEST['COD_CLASE'.$i];

				if($c_producto=='010'){ //solo insumos
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
				$alm->C_SITUANT = (isset($_REQUEST['C_SITUANT'.$i])?$_REQUEST['C_SITUANT'.$i]:'');
				$alm->n_preciocost=$NT_PREC;//CAMPO NUEVO
				$alm->n_preciovta=$NT_PREC;//CAMPO NUEVO
				
				//DATOS GUARDAR invmov
				$alm->IN_TRAN=$_REQUEST['NT_TRAN'];
				$alm->IN_CODI=$_REQUEST['c_codprd'.$i];
				$alm->IN_LINE=substr($_REQUEST['c_codprd'.$i],0,3);
				$alm->IN_CUND=$_REQUEST['NT_CUND'.$i];
				$alm->IN_REMI=$NT_REMI;
				$alm->IN_TDOC=$_REQUEST['NT_TDOC'];//S
				$alm->IN_SERI=NULL;
				$alm->IN_DOC=$_REQUEST['NT_TDOC'].str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
				$alm->IN_COST='0';
				$alm->IN_PVTA='0';
				$alm->IN_CANT='-'.$_REQUEST['n_canprd'.$i];
				$alm->IN_FMOV=$_REQUEST['NT_FDOC'];
				$alm->IN_ESTA='0'; //SALIDA 0, INGRESO 1
				$alm->IN_FREG=date("d/m/Y H:i:s");
				$alm->IN_OPER=$_REQUEST['login'];								
				
				$alm->n_idregInvmov=$NewIdRegInvmov; //n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
				//$alm->n_id=$_REQUEST['n_id'];//autonumeracion				
				$alm->IN_NOC=NULL;
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
				$alm->n_itemOC='0';							
				
				//validar stock producto
				$ValidarStock=$this->model->ValidarStock($c_codprd) ;
				$IN_STOK=$ValidarStock->IN_STOK; 					
				if($NT_CANT<=$IN_STOK){
					//disminuir stock	
					$nuevostock=$IN_STOK-$NT_CANT;	
					$this->model->UpdStockProd($nuevostock,$c_codprd) ;		
					$this->model->GuardarDetNotaSalida($alm) ; 
					//$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)
					
					if($c_producto!='010'){ //producto detallado y repuestos							
						$this->model->UpdEstadoEquipo($NT_SERIE);//actualizar estado de equipo a M
						$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)
						
						$this->model->UpdateCorrelativoInvmov($NewIdRegInvmov);//actualizar correlativo item_tab de invmov							
					}
					//$this->model->UpdateCorrelativoInvmov($NewIdRegInvmov);//actualizar correlativo item_tab de invmov	
					/*if($c_producto=='1'){ //producto detallado							
							$this->model->UpdEstadoEquipo($NT_SERIE);//actualizar estado de equipo a M
							$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)								
					}else if($c_producto=='2'){ //repuestos
							$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)	
					}*/
				}else{
					//acumular los productos no registrados
					$prodnoregistrados=nl2br($prodnoregistrados.$_REQUEST['c_desprd'.$i].' '.$NT_SERIE.'\n');					
				}								
				$i +=1;
				$seguir = true;
			}else{
				$seguir = false;
			}
		} while($seguir);
		if($prodnoregistrados!=NULL){
			$mensaje="Los detalles que no se guardaron por problemas de stock son: ".'\n'.$prodnoregistrados;
			print "<script>alert('$mensaje')</script>";	
		}
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/listarNotas.php';
		require 'view/principal/footer.php';
	}//fin guardaNotaSalida
	
	public function DesbloquearEquiposQuit(){
		$this->model->DesbloquearEquipo($_REQUEST['c_codcont']);//c_estedit= '', c_temcot = '',c_temfec=NULL		
    }
	
	public function ListarNotas(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/listarNotas.php';
		require 'view/principal/footer.php';
	}
        
        public function ConsultaProductos(){
            $ProductoBuscar="";
            //$calm = "000002";
                if(!empty($_REQUEST["criterio"])){
                    $ProductoBuscar=$this->model->BuscarProducto($_REQUEST["criterio"]);
                }
                require 'view/principal/header.php';
                require 'view/principal/principal.php';
            require 'view/principal/ConsultaProductos.php';
                require 'view/principal/footer.php';
        }//FIN verEquiposDispo

}