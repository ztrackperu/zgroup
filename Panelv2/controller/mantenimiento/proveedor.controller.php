<?php
ini_set('error_reporting',0);//para xamp
date_default_timezone_set('America/Bogota'); 
require_once 'model/mantenimiento/mantproveedorM.php';
require_once 'model/funciones.php';
require_once 'model/maestros/maestrosM.php';
require_once 'model/login/loginM.php';//usuario reg,upd,elim,etc  
//include('assets/scripts/Funciones.php');
class proveedorcontroller
{
	private $model;
	private $maestro;
	public function __CONSTRUCT(){
		$this->model = new Proveedores();
		$this->maestro = new Maestros();
		$this->login = new Login();
	}
	public function ListaProveedor(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/adminproveedores.php';
		require_once 'view/principal/footer.php';
	}
	public function consultarProveedores(){
		$proveedores = $this->model->consultarProveedores();
		$proveedores = $this->array_utf8_encode($proveedores); 
		if(isset($_REQUEST['returnAjax'])){
			header('Content-Type: application/json');
			echo json_encode($proveedores);
		}else{
			return $proveedores;
		}
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
	public function RegistroProveedor(){
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
		require_once 'view/mantenimiento/regproveedor.php';
		require_once 'view/principal/footer.php';
	}	
	public function GuardarProveedor(){
		
		
		$ObtProvereg=$this->model->ObtieneProveedor(ltrim($_REQUEST['PR_RUC']));
		//echo $numguia=$ObtProvereg->pr_ruc;
		if($ObtProvereg==NULL){ //
			$guardarproveedor= new Proveedores();
						$guardarproveedor->PR_RUC=ltrim($_REQUEST['PR_RUC']);
						$guardarproveedor->PR_RAZO=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_RAZO'])));
						$guardarproveedor->PR_NRUC=ltrim($_REQUEST['PR_RUC']);
						$guardarproveedor->PR_DIR1=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_DIR1'])));
						$guardarproveedor->PR_DIR2=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_DIR1'])));
						$guardarproveedor->PR_TELE=$_REQUEST['PR_TELE'];
						$guardarproveedor->PR_EMAI=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_EMAI'])));
						$guardarproveedor->PR_ESTA='1';
						$guardarproveedor->C_CODCIA='01';
						$guardarproveedor->C_CODTDA='000';
						$guardarproveedor->PR_FREG=date("d/m/Y");
						$guardarproveedor->PR_OPER=$_REQUEST['login'];
						$guardarproveedor->c_CodCert=$_REQUEST['c_CodCert'];
						$guardarproveedor->c_DetalleCert=$_REQUEST['c_DetalleCert'];
						$guardarproveedor->PR_RESP=$_REQUEST['PR_RESP'];
						$guardarproveedor->PR_CEL1=$_REQUEST['PR_CEL1'];
						$guardarproveedor->PR_CEL2=$_REQUEST['PR_CEL2'];
						$guardarproveedor->PR_BANCO=$_REQUEST['PR_BANCO'];
						$guardarproveedor->PR_CUENTA=$_REQUEST['PR_CUENTA'];
						$guardarproveedor->PR_TIPO=$_REQUEST['pr_tipo'];
						
						if($_REQUEST['d_fvigdcto']==""){
							$d_fvigdcto=NULL;
							}else{
							$d_fvigdcto=$_REQUEST['d_fvigdcto'];
								}
						$guardarproveedor->d_fvigdcto=$d_fvigdcto;
						$this->model->GuardarProveedor($guardarproveedor);
				
				if($_REQUEST['filas']!=1){
					 
					$guardatransporte=new Proveedores();
					$i = 1;		
						do{
							$guardatransporte->C_RUCTRA=$_REQUEST['PR_RUC'];
							$guardatransporte->C_NONTRA=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_RAZO'])));
							$guardatransporte->C_CHOFER=ltrim(utf8_decode(mb_strtoupper($_REQUEST['c_chofer'.$i])));
							$guardatransporte->C_PLACA=ltrim(utf8_decode(mb_strtoupper($_REQUEST['c_placa'.$i])));
							if($_REQUEST['carreta'.$i]!=''){
							$carreta=$_REQUEST['carreta'.$i];
						}else{
							$carreta=NULL;
							}
							
							$guardatransporte->C_CARRETA=ltrim(utf8_decode(mb_strtoupper($carreta)));
							$guardatransporte->C_BREVETE=ltrim(utf8_decode(mb_strtoupper($_REQUEST['c_brevete'.$i])));
							
							
							if($_REQUEST['C_MTC'.$i]!=''){
							$mtc=$_REQUEST['C_MTC'.$i];
						}else{
							$mtc=NULL;
							}
							
							$guardatransporte->C_MTC=ltrim(utf8_decode(mb_strtoupper($mtc)));
							
							if($_REQUEST['c_marca'.$i]!=''){
							$marca=$_REQUEST['c_marca'.$i];
						}else{
							$marca=NULL;
							}
							
							$guardatransporte->C_MARCA=ltrim(utf8_decode(mb_strtoupper($marca)));
							$guardatransporte->c_estado='1';
							
								if($_REQUEST['c_chofer'.$i] != "")
								{
								$this->model->GuardarTransportistas($guardatransporte); 					 					
								$i +=1;
								$seguir = true;
								}else{
									$i -=1;
								$seguir = false;
								}
						}while($seguir);
								
							
				
				}
				
			$mensaje="Proveedor Grabado Correctamente";
			print "<script>alert('$mensaje')</script>";		
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/mantenimiento/regproveedor.php';
			require_once 'view/principal/footer.php';		
			
	}else if($ObtProvereg!=NULL){
		
		
		$mensaje="Proveedor Existe Actualize sus datos";
			print "<script>alert('$mensaje')</script>";	
			require_once 'view/principal/header.php';
			require_once 'view/principal/principal.php';
			require_once 'view/mantenimiento/adminproveedores.php';
			require_once 'view/principal/footer.php';
			}
		
		
	}
	
	public function UpdProveedor(){
	$ruc=$_GET['id'];
	
	$obprov=$this->model->ObtieneProveedor($ruc);
	
		
		require_once 'view/principal/header.php';		
		require_once 'view/principal/principal.php';
        require_once 'view/mantenimiento/updproveedor.php';
		require_once 'view/principal/footer.php';
		}	
	public function ActualizarProveedor(){		
		$actualizaproveedor= new Proveedores();						
				$actualizaproveedor->PR_RAZO=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_RAZO'])));
				$actualizaproveedor->PR_NRUC=$_REQUEST['PR_RUC'];
				$actualizaproveedor->PR_DIR1=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_DIR1'])));
				$actualizaproveedor->PR_DIR2=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_DIR1'])));
				$actualizaproveedor->PR_TELE=$_REQUEST['PR_TELE'];
				$actualizaproveedor->PR_EMAI=ltrim(utf8_decode(mb_strtoupper($_REQUEST['PR_EMAI'])));
				$actualizaproveedor->PR_ESTA='1';
				$actualizaproveedor->C_CODCIA='01';
				$actualizaproveedor->C_CODTDA='000';
				$actualizaproveedor->PR_FREG=date("d/m/Y");
				$actualizaproveedor->PR_OPER=$_REQUEST['login'];
				$actualizaproveedor->c_CodCert=$_REQUEST['c_CodCert'];
				$actualizaproveedor->c_DetalleCert=$_REQUEST['c_DetalleCert'];
				$actualizaproveedor->PR_RESP=$_REQUEST['PR_RESP'];
				$actualizaproveedor->PR_CEL1=$_REQUEST['PR_CEL1'];
				$actualizaproveedor->PR_CEL2=$_REQUEST['PR_CEL2'];
				$actualizaproveedor->PR_BANCO=$_REQUEST['PR_BANCO'];
				$actualizaproveedor->PR_CUENTA=$_REQUEST['PR_CUENTA'];
				$actualizaproveedor->PR_TIPO=$_REQUEST['PR_TIPO'];
				
							if($_REQUEST['d_fvigdcto']==""){
							$d_fvigdcto=NULL;
							}else{
							$d_fvigdcto=$_REQUEST['d_fvigdcto'];
							}
						$actualizaproveedor->d_fvigdcto=$d_fvigdcto;
				
				$actualizaproveedor->PR_RUC=$_REQUEST['PR_RUC'];
					$this->model->ActualizarProveedor($actualizaproveedor);
						
						
					$this->model->EliminaTransportistas($_REQUEST['PR_RUC']);
					$guardatransporte=new Proveedores();
					for($i=1;$i<=500;$i++){
					$guardatransporte->C_RUCTRA=$_REQUEST['PR_RUC'];
					$guardatransporte->C_NONTRA=(utf8_decode(mb_strtoupper($_REQUEST['PR_RAZO'])));
					$guardatransporte->C_CHOFER=(utf8_decode(mb_strtoupper($_REQUEST['c_chofer'.$i])));
					$guardatransporte->C_PLACA=ltrim(utf8_decode(mb_strtoupper($_REQUEST['c_placa'.$i])));
						
						if($_REQUEST['carreta'.$i]!=''){
							$carreta=$_REQUEST['carreta'.$i];
						}else{
							$carreta=NULL;
							}
							
				$guardatransporte->C_CARRETA=(utf8_decode(mb_strtoupper($carreta)));
				$guardatransporte->C_BREVETE=(utf8_decode(mb_strtoupper($_REQUEST['c_brevete'.$i])));
							
							
						if($_REQUEST['c_mtc'.$i]!=''){
							$mtc=$_REQUEST['c_mtc'.$i];
						}else{
							$mtc=NULL;
							}
							
						$guardatransporte->C_MTC=$mtc;
							
						if($_REQUEST['c_marca'.$i]!=''){
							$marca=$_REQUEST['c_marca'.$i];
						}else{
							$marca=NULL;
						}
							
							$guardatransporte->C_MARCA=(utf8_decode(mb_strtoupper($marca)));
							$guardatransporte->c_estado='1';
							
								if($_REQUEST['c_chofer'.$i] != "")
								{
									
								$this->model->GuardarTransportistas($guardatransporte);
								}
							
						}
							$mensaje="Datos Actualizados Correctamente";
							print "<script>alert('$mensaje')</script>";		
							require_once 'view/principal/header.php';
							require_once 'view/principal/principal.php';
							require_once 'view/mantenimiento/adminproveedores.php';
							require_once 'view/principal/footer.php';
						
						
						
			
		}
		

	
}
?>