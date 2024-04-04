<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/notasAlmacen/procesosajusteinvM.php';

class AjusteinventarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesosajusteinv();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
  	public function AjusteInventario(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/notasAlmacen/ajusteInventario.php';
		require 'view/principal/footer.php';
	}
	
	/************************PROCESO FILTRA Proveedor*/
      public function ProductoBuscar()
    {
        print_r(json_encode(
            $this->model->ProductoBuscar($_REQUEST['criterio'])
        ));
    }//FIN BuscarProveedor	
	
	function BuscarNotasxCodigo(){
		$txtCodigo=$_REQUEST['txtCodigo'];
		$txtStockActual=$_REQUEST['txtStockActual'];
		$txtStockAjuste=$_REQUEST['txtStockAjuste'];
		$stock_insert=$_REQUEST['stock_insert'];
		$txtUnidadMedida=$_REQUEST['txtUnidadMedida'];
		$txtClase=$_REQUEST['txtClase'];

		//CABECERA
		$ObtenerId=$this->model->ObtenerIdNotaAjuste();
		$NewId=substr($ObtenerId->maxnotas, -7)+1;
		$alm = new \StdClass();
		$alm->NT_NDOC='X'.str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE X0000001; CLI00000298
		$alm->NT_TDOC='X';//X
		if($txtStockActual > $txtStockAjuste)
			{
				$alm->NT_TRAN='99'; //restar stock
			}
			else{
				$alm->NT_TRAN='98';//sumar stock
			}	
		$alm->NT_TREM='X';
		$alm->NT_SERIR='000';
		$alm->NT_DOCR='AJUS';
	    $alm->NT_REMI=$NT_REMI='X000AJUS';
		
		$alm->NT_CCLI='CLI00000298';
		$alm->NT_FDOC=date("d/m/Y");
		$NT_FDOC=date("d/m/Y");
		$alm->c_motivo='AJUSTE';
		$alm->NT_OBS='AJUSTE DE INVENTARIO REG. EL: '.date("d/m/Y H:i:s");
		$alm->NT_ESTA='3';
		$alm->NT_TIPO='C';
		$alm->NT_NEXT=NULL;
		$alm->NT_FREG=date("d/m/Y H:i:s");
		$alm->NT_OPER=$_REQUEST['login'];
		
		$ObtenerIdReg=$this->model->ObtenerIdRegNota();
		$NewIdReg=$ObtenerIdReg->maxidreg;
		$alm->n_idreg=$NewIdReg+1;
		
		$tipdia=$this->maestro->ListaTipoCambioDia($NT_FDOC);
		$tcambio=0;
		if(isset($tipdia->TC_VTA) && $tipdia->TC_VTA!=NULL){
			$tcambio=$tipdia->TC_VTA;
		}
		$alm->NT_TCAMB=$tcambio;
		
		$alm->NT_MONE='0';
		$alm->C_COSTO='0';
		$alm->NT_SWOC='0';
		$alm->NT_NOC=NULL;
		$alm->NT_FGUI=date("d/m/Y");
		$alm->NT_CTR='20521180774';
		$alm->NT_GTR='X000AJUS';
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
		$alm->c_codalm='000001';
		$alm->c_codalm_d='ALMDES';
		$alm->c_NumOT='';
		$alm->NT_RESPO=$c_respo=$_REQUEST['login'];	
		$c_ruccli='20521180774';	
		$c_codcli='ZGROUP S.A.C.';	

		$this->model->GuardarCabNotaSalida($alm) ; 
		
		
		//inicio Detalle
		$ObtenerIdRegInvmov=$this->model->ObtenerIdRegInvmov();//OBTENER n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
		$NewIdRegInvmov=$ObtenerIdRegInvmov->maxidreg+1;
		$prodnoregistrados = NULL;
			if(isset($txtCodigo)!= ""){
				//DATOS GUARDAR notmov
				//$alm->NT_NDOC=$_REQUEST['NT_NDOC'];
				//$alm->NT_TDOC=$_REQUEST['NT_TDOC'];
				$alm->NT_CART=$c_codprd=$txtCodigo;
				$alm->NT_CUND=$txtUnidadMedida;
				$alm->NT_CANT=$stock_insert;					
				$alm->c_producto=$txtClase;

				if($txtClase=='010'){ //solo insumos
					$NT_PREC='0'; 
				}else{//producto detallado y repuestos
					$NT_PREC='0'; 
				}
				$alm->NT_PREC=$NT_PREC;
				$alm->NT_COST=$NT_PREC;					
				$alm->c_observ='AJUSTE DE INVENTARIO';					
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
				$alm->c_idequipo='';
				$alm->NT_SERIE=$NT_SERIE='000';
				$alm->NT_LOTE=NULL;
				$alm->C_SITUANT = '0';
				$alm->n_preciocost=$NT_PREC;//CAMPO NUEVO
				$alm->n_preciovta=$NT_PREC;//CAMPO NUEVO
				
				//DATOS GUARDAR invmov
				$alm->IN_TRAN='000';
				$alm->IN_CODI=$txtCodigo;
				$alm->IN_LINE=substr($txtCodigo,0,3);
				$alm->IN_CUND=$txtUnidadMedida;
				$alm->IN_REMI=$NT_REMI;
				$alm->IN_TDOC='X';//S
				$alm->IN_SERI=NULL;
				$alm->IN_DOC='X'.str_pad($NewId, 7, '0', STR_PAD_LEFT);//DEVUELVE S0001321;
				$alm->IN_COST='0';
				$alm->IN_PVTA='0';
				$alm->IN_CANT=$stock_insert;
				$alm->IN_FMOV=date("d/m/Y");
				$alm->IN_ESTA='0'; //SALIDA 0, INGRESO 1
				$alm->IN_FREG=date("d/m/Y H:i:s");
				$alm->IN_OPER=$_REQUEST['login'];								
				
				$alm->n_idregInvmov=$NewIdRegInvmov; //n_idreg de invmov (SON LOS MISMOS POR CADA NOTA DE SALIDA)				
				//$alm->n_id=$_REQUEST['n_id'];//autonumeracion				
				$alm->IN_NOC=NULL;
				$alm->IN_CPRV='CLI00000298';
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
				$alm->c_idequipo=$txtCodigo;
				$alm->n_itemOC='0';							
				
				//validar stock producto
				$ValidarStock=$this->model->ValidarStock($txtCodigo) ;
				$IN_STOK=$ValidarStock->IN_STOK; 					

					$this->model->UpdStockProd($txtStockAjuste,$txtCodigo) ;		
					$this->model->GuardarDetNotaSalida($alm) ; 
					//$this->model->GuardarInvmovNotaSal($alm);// va al costo (graba inmov)
				$seguir = true;
			}else{
				$seguir = false;
			}

				
		$arrayCli=array(); 	  
		$data=$this->model->ListarNotasCodigo($txtCodigo);	
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
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_OBS));
			array_push($resultadodetallado, utf8_encode($moneda));
			array_push($resultadodetallado, utf8_encode($data[$i]->n_preciocost));				
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
	
	
	function BuscarSoloNotasxCodigo(){
		$txtCodigo=$_REQUEST['txtCodigo'];
		$arrayCli=array(); 	  
		$data=$this->model->ListarNotasCodigo($txtCodigo);	
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
			array_push($resultadodetallado, utf8_encode($data[$i]->NT_OBS));
			array_push($resultadodetallado, utf8_encode($moneda));
			array_push($resultadodetallado, utf8_encode($data[$i]->n_preciocost));				
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