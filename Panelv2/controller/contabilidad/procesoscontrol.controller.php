<?php
//c=inv01
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota');
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  

require_once 'model/contabilidad/procesoscontrolM.php';

class ProcesoscontrolController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Procesoscontrol();
		$this->maestro = new Maestros();
		$this->login = new Login();
    }
    
    public function AperturarMes(){		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/aperturarmes.php';
		require 'view/principal/footer.php';
    }
	
	public function guardaApertura(){
		//
		$c_anno=$_REQUEST['c_anno'];
		$c_mes=$_REQUEST['c_mes'];
		$c_userape=$_REQUEST['c_userape'];
		$d_fecapecont=$_REQUEST['d_fecapecont'];
		$c_obsape=$_REQUEST['c_obsape'];
		$d_fecreg=date("d/m/Y H:i:s");
		
		$ValidarTodoCerrado=$this->model->ValidarTodoCerrado();//validar que todos esten cerrados antes de generar uno nuevo
		
		$valida=$this->model->ValidarControlMes($c_anno,$c_mes);
		
		if($ValidarTodoCerrado==NULL){
			if($valida!=NULL){	
			$mensaje="El Periodo ya fue Aperturado";
			print "<script>alert('$mensaje')</script>";				
			}else if($c_mes<date('m')){	
				$mensaje="No es posible Aperturar meses anteriores";
				print "<script>alert('$mensaje')</script>";				
			}else{
				$this->model->GuardarApertura($c_anno,$c_mes,$c_userape,$d_fecapecont,$c_obsape,$d_fecreg);
			}			
			//volver		
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/contabilidad/aperturarmes.php';
			require 'view/principal/footer.php';	
								
		}else{
			$mensaje="Tiene un Periodo abierto";
			print "<script>alert('$mensaje')</script>";	
			//ir al listado	
			require 'view/principal/header.php';
			require 'view/principal/principal.php';
			require 'view/contabilidad/inicioguardarstock.php';
			require 'view/principal/footer.php';			
		} 
    }
	
	public function CerrarMes(){		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/cerrarmes.php';
		require 'view/principal/footer.php';
    }
	
	public function InicioGuardarStock(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/inicioguardarstock.php';
		require 'view/principal/footer.php';		
	}
	
	public function GuardarCerrarMes(){
		//
		$c_anno=$_REQUEST['c_anno'];
		$c_mes=$_REQUEST['c_mes'];
		$c_usercie=$_REQUEST['c_usercie'];
		$d_fecciecont=$_REQUEST['d_fecciecont'];
		$c_obscie=$_REQUEST['c_obscie'];
		$d_fecregcie=date("d/m/Y H:i:s");
		
		$valida=$this->model->ValidarControlMes($c_anno,$c_mes);
		$validarcerrado=$this->model->ValidarControlMesCerrado($c_anno,$c_mes); //validar que no este cerrado
		$validarprocesado=$this->model->ValidarControlMesProcesado($c_anno,$c_mes); //validar que no este cerrado
		if($valida==NULL){		
			$mensaje="El Periodo No fue Aperturado";
			print "<script>alert('$mensaje')</script>";	
		}else if($validarcerrado!=NULL){		
			$mensaje="El Periodo Ya se encuentra cerrado";
			print "<script>alert('$mensaje')</script>";	
		}else if($validarprocesado!=NULL){		
			$mensaje="El Periodo No puede cerrarse porque falta procesar";
			print "<script>alert('$mensaje')</script>";	
		}else{
			$this->model->CerrarMes($c_anno,$c_mes,$c_usercie,$d_fecciecont,$c_obscie,$d_fecregcie);
			
		}		
		
		//volver		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/cerrarmes.php';
		require 'view/principal/footer.php';
    }
	
	public function ProcesarStockMensual(){
		$ObtenerUsuarios=$this->login->Obtener_UsuarioM($_GET['udni']);
		$login=$ObtenerUsuarios->login; 
		
		$IN_ANIO=$_REQUEST['c_anno'];
		$IN_MES=$_REQUEST['c_mes'];				
		
		$IN_ANIOANT=$_REQUEST['c_anno'];
		$xIN_MESANT=$_REQUEST['c_mes']-1;
		
		if($xIN_MESANT=='0'){
			$xIN_MESANT='12'; //diciembre
			$IN_ANIOANT=$_REQUEST['c_anno']-1;//1 anno antes
		}
		$IN_MESANT=str_pad($xIN_MESANT, 2, '0', STR_PAD_LEFT);
		$IN_DATE = date("d/m/Y H:i:s");	
		$xIN_FESTK = cal_days_in_month(CAL_GREGORIAN, $IN_MES, $IN_ANIO);
		$IN_FESTK=$xIN_FESTK.'/'.$IN_MES.'/'.$IN_ANIO;
		$IN_OPER=$login;
		
		//$listas=$this->model->ListarStockProcesados($IN_ANIO,$IN_MES);		
		$this->model->UpdMesProcesado($IN_ANIO,$IN_MES);//CAMBIAR ESTADO PROCESADO AL MES
		
		//BORRAR STOCK MENSUAL
		$this->model->DeleteStockMensual($IN_ANIO,$IN_MES);		
		//GUARDAR STOCK MENSUAL
		$this->model->GuardarStockMensual($IN_ANIO,$IN_MES,$IN_ANIOANT,$IN_MESANT,$IN_DATE,$IN_FESTK,$IN_OPER);
		
				//listar todas las notas agregadas del mes		
				$ListarStockAgregados=$this->model->ListarStockAgregados($IN_ANIO,$IN_MES);
				if($ListarStockAgregados!=NULL){
					$i=0;
					foreach ($ListarStockAgregados as $itemagregados){
					$i++;	
					    $NT_CART=$itemagregados->NT_CART; //productos de notmov
						$cantagre=$itemagregados->cantagre;
						
						//validar que el producto de notmov estea tambien en invstktdaInsumos 
						$ListarStockProceProd=$this->model->ListarStockProcesadosProducto($IN_ANIO,$IN_MES,$NT_CART);
							
							if($ListarStockProceProd!=NULL){
								//echo $i.'iguales '.$ListarStockProceProd->IN_CODI.'<br>';//productos que estan en notmov y invstktdaInsumos
								//modificar STOCK
								$this->model->UpdStockMensual($IN_ANIO,$IN_MES,$NT_CART,$cantagre);
							}else{	
								//echo $i.'nuevos '.$NT_CART.' '.$cantagre.'<br>';//productos nuevos solo estan notmov					
								//agregar productos nuevos
								$IN_CCIA='01';
								$IN_CTDA='000';
								$IN_CALM='3';//INSUMOS
								$IN_COST='0';
								$IN_STOK='0';								
								$this->model->RegistrarStockMensual($IN_CCIA,$IN_CTDA,$IN_CALM,$IN_COST,$IN_STOK,$IN_ANIO,$IN_MES,$NT_CART,$IN_DATE,$IN_FESTK,$IN_OPER);
								//modificar	STOCK
								$this->model->UpdStockMensual($IN_ANIO,$IN_MES,$NT_CART,$cantagre);
							}//fin else	
					}//fin foreach
				}//fin if ListarStockAgregados	
		
		/*$mensaje="Stock Mensual Procesado Correctamente";
		print "<script>alert('$mensaje')</script>";		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/inicioguardarstock.php';
		require 'view/principal/footer.php';*/	
		header('Location: indexalm.php?c=cont01&a=InicioGuardarStock&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	
	
	}//FIN function
	
	public function VerStockActual(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/VerStockActual.php';
		require 'view/principal/footer.php';			
	}//fin VerStockActual
	
	public function VerStockMensual(){
		$IN_ANIO=$_REQUEST['c_anno'];
		$IN_MES=$_REQUEST['c_mes'];	
		$ListarStockMesInsumos=$this->model->ListarStockMesInsumos($IN_ANIO,$IN_MES);
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/VerStockMensual.php';
		require 'view/principal/footer.php';		
	}
	
	public function Abrirmescerrado(){
		$IN_ANIO=$_REQUEST['c_anno'];
		$IN_MES=$_REQUEST['c_mes'];	
		$c_obsape=$_REQUEST['c_obsape'];	
		$ListarStockMesInsumos=$this->model->Abrirmescerrado($IN_ANIO,$IN_MES,$c_obsape);
		header('Location: indexalm.php?c=cont01&a=InicioGuardarStock&mod='.$_GET['mod'].'&udni='.$_GET['udni']);	
	
	}//FIN function
	
	public function VerUtimasOCInsumos(){
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/VerUtimasOCInsumos.php';
		require 'view/principal/footer.php';
	}
	
	public function VerUltimasOCInsumoSel(){
		$IN_CODI=$_REQUEST['IN_CODI'];	
		
		require 'view/principal/header.php';
		require 'view/principal/principal.php';
		require 'view/contabilidad/VerUltimasOCInsumoSel.php';
		require 'view/principal/footer.php';
	}
	
}